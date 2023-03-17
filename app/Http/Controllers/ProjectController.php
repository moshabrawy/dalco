<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Traits\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use App\Http\Resources\ProjectResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ProjectDescResource;

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
            "title_en"       => "required",
            "title_ar"       => "required",
            "owner_en"       => "required",
            "owner_ar"       => "required",
            "duration_en"    => "required",
            "duration_ar"    => "required",
            "date"           => "required",
            "price"          => "required",
            "description_en" => "required",
            "description_ar" => "required",
            "type_en"        => "required",
            "status_en"      => "required",
            "image"          => "required",
        ]);

        if ($validation->fails()) {
            notify()->error('Oops, Please, ' . $validation->errors()->first());
            return redirect()->back();
        } else {
            Project::create([
                'title_en' => $request->title_en,
                'title_ar' => $request->title_ar,
                'owner_en' => $request->owner_en,
                'owner_ar' => $request->owner_ar,
                'status_en' => $request->status_en,
                'status_ar' => $request->status_en == 'Done' ? 'منتهية' : 'جارية',
                'type_en' => $request->type_en,
                'type_ar' => $request->type_en == 'In Direct' ? 'غير مباشر' : 'مباشر',
                'duration_en' => $request->duration_en,
                'duration_ar' => $request->duration_ar,
                'date' => $request->date,
                'price' => $request->price,
                'description_en' => $request->description_en,
                'description_ar' => $request->description_ar,
                'image' => $this->UploudImage($request->image, 'projects'),
                'gallery' => $request->has('image_gallery') ? $this->UploudFiles($request->image_gallery, 'projects/gallery') : null
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
            "title_en"       => "required",
            "title_ar"       => "required",
            "owner_en"       => "required",
            "owner_ar"       => "required",
            "duration_en"    => "required",
            "duration_ar"    => "required",
            "date"           => "required",
            "price"          => "required",
            "description_en" => "required",
            "description_ar" => "required",
            "type_en"        => "required",
            "status_en"      => "required",
        ]);
        if ($validation->fails()) {
            notify()->error('Oops, Please, ' . $validation->errors()->first());
            return redirect()->route('projects.edit', ['project' => $project->id])->with('error', $validation->errors());
        } else {
            if ($request->file('image')) {
                $project->update(['image' => $this->UploudImage($request->image, 'projects')]);
            }

            $project->update([
                'title_en' => $request->title_en,
                'title_ar' => $request->title_ar,
                'owner_en' => $request->owner_en,
                'owner_ar' => $request->owner_ar,
                'status_en' => $request->status_en,
                'status_ar' => $request->status_en == 'Done' ? 'منتهية' : 'جارية',
                'type_en' => $request->type_en,
                'type_ar' => $request->type_en == 'In Direct' ? 'غير مباشر' : 'مباشر',
                'duration_en' => $request->duration_en,
                'duration_ar' => $request->duration_ar,
                'date' => $request->date,
                'price' => $request->price,
                'description_en' => $request->description_en,
                'description_ar' => $request->description_ar,
                'gallery' => $request->has('image_gallery') ? $this->UploudFiles($request->image_gallery, 'projects/gallery') : null,
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
        $sort_by = $request->sort;
        $projects = Project::query()
            ->when($sort_by && $sort_by != 'all', function ($q) use ($sort_by) {
                $q->where('status_en', $sort_by);
            })
            ->select('id', 'image', 'title_' . $lang . ' As title', 'status_' . $lang . ' As status', 'description_' . $lang . ' As desc')
            ->paginate(10);
        $all_data = ProjectResource::collection($projects);
        return response()->json(['status_code' => 200, 'count_pages' => $projects->lastPage(), 'projects' => $all_data]);
    }
    public function get_recent_projects(Request $request)
    {
        $lang = !empty($request->lang) ? $request->lang : 'en';
        $projects = Project::select('id', 'image', 'title_' . $lang . ' As title', 'type_' . $lang . ' As type', 'description_' . $lang . ' As desc')
            ->limit(4)
            ->get();
        $all_data = ProjectResource::collection($projects);
        return response()->json(['status_code' => 200, 'projects' => $all_data]);
    }
    public function get_project_by_id(Request $request)
    {
        $lang = !empty($request->lang) ? $request->lang : 'en';
        $project = Project::where('id', $request->id)
            ->select(
                'id',
                'image',
                'title_' . $lang . ' As title',
                DB::raw('DATE_FORMAT(date, "%d.%m.%Y") as date'),
                'owner_' . $lang . ' As owner',
                'duration_' . $lang . ' As duration',
                'status_' . $lang . ' As status',
                'type_' . $lang . ' As type',
                'description_' . $lang . ' As desc',
                'gallery'
            )->get();
        if ($project) {
            $data = ProjectDescResource::collection($project);
            return response()->json(['status_code' => 200, 'data' => $data]);
        } else {
            return response()->json(['status_code' => 400, 'error' => 'Project not found']);
        }
    }
}
