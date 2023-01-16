<?php

namespace App\Http\Controllers;

use File;

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
            "type_ar" => "required",
            "image" => "required",
        ]);

        if ($validation->fails()) {
            return redirect()->route('projects.create')->with('error', $validation->errors());
        } else {
            Project::create([
                'title_en' => $request->title_en,
                'title_ar' => $request->title_ar,
                'type_en' => $request->type_en,
                'type_ar' => $request->type_ar,
                'description_en' => $request->description_en,
                'description_ar' => $request->description_ar,
                'image' => $this->UploudImage($request->image, 'projects'),
            ]);
        }
        return redirect()->route('projects.create')->with('success', 'Done!');
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

    public function update()
    {
        return view('dashboard.projects.add');
    }


    // EndPoints
    public function get_all_projects(Request $request)
    {
        $projects = Project::select('id', 'image', 'title_' . $request->lang . ' As title', 'type_' . $request->lang . ' As type', 'description_' . $request->lang . ' As desc')->get();
        return response()->json(['projects' => $projects]);
    }
}
