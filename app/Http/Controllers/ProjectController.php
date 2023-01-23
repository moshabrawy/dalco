<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectResource;

use App\Models\Project;
use App\Traits\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    use FileUpload;

    public function index()
    {
        $datas = Project::select('id', 'image', 'title_' . App::getLocale() . ' As title', 'type_' . App::getLocale() . ' As type', 'description_' . App::getLocale() . ' As desc', 'created_at')
            ->paginate(10);
        return view('dashboard.projects.manage', compact('datas'));
    }

    public function create()
    {
        return view('dashboard.projects.create');
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            "title_en" => "required",
            "title_ar" => "required",
            "type_en" => "required",
            "image"   => "required",
        ]);

        if ($validation->fails()) {
            notify()->error('Oops, Please, fill all Inputs and try again.');
            return redirect()->route('projects.create')->with('error', $validation->errors());
        } else {
            Project::create([
                'title_en' => $request->title_en,
                'title_ar' => $request->title_ar,
                'type_en' => $request->type_en,
                'type_ar' => $request->type_en == 'Done' ? 'منتهية' : 'جارية',
                'description_en' => $request->description_en,
                'description_ar' => $request->description_ar,
                'image' => $this->UploudImage($request->image, 'projects'),
            ]);
        }
        notify()->success('You are awesome, your data was Created successfully.');
        return redirect()->route('projects.create');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $datas = Project::where('title_' . App::getLocale(), 'like', '%' . $search . '%')
            ->select('id', 'image', 'title_' . App::getLocale() . ' As title', 'type_' . App::getLocale() . ' As type', 'description_' . App::getLocale() . ' As desc', 'created_at')
            ->paginate(10);
        return view('dashboard.projects.manage', compact('datas'));
    }

    public function edit(Project $project)
    {
        return view('dashboard.projects.edit', compact('project'));
    }

    public function update(Project $project, Request $request)
    {
        $validation = Validator::make($request->all(), [
            "title_en" => "required",
            "title_ar" => "required",
            "type_en" => "required",
        ]);
        if ($validation->fails()) {
            notify()->error('Oops, Please, fill all Inputs and try again.');
            return redirect()->route('projects.edit', ['project' => $project->id])->with('error', $validation->errors());
        } else {
            if ($request->file('image')) {
                $project->update(['image' => $this->UploudImage($request->image, 'projects')]);
            }

            $project->update([
                'title_en' => $request->title_en,
                'title_ar' => $request->title_ar,
                'type_en' => $request->type_en,
                'type_ar' => $request->type_en == 'Done' ? 'منتهية' : 'جارية',
                'description_en' => $request->description_en,
                'description_ar' => $request->description_ar,

            ]);
        }
        notify()->success('You are awesome, your data was Updated successfully.');
        return redirect()->route('projects.index');
    }
    public function destroy(Project $project)
    {
        $project->delete();
        notify()->success('You are awesome, Deleted successfully.');
        return redirect()->route('projects.index');
    }

    // EndPoints
    public function get_all_projects(Request $request)
    {
        $lang = !empty($request->lang) ? $request->lang : 'en';
        $projects = Project::select('id', 'image', 'title_' . $lang . ' As title', 'type_' . $lang . ' As type', 'description_' . $lang . ' As desc')->paginate(10);
        $all_data = ProjectResource::collection($projects);
        return response()->json(['count_pages' => $projects->lastPage(), 'projects' => $all_data]);
    }
}
