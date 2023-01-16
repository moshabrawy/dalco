<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ProjectController extends Controller
{
    public function index()
    {
        $datas = Project::select('id', 'image', 'title_' . App::getLocale() . ' As title', 'type_' . App::getLocale() . ' As type', 'description_' . App::getLocale() . ' As desc', 'created_at')->paginate(10);
        return view('dashboard.projects.manage', compact('datas'));
    }

    public function create()
    {
        return view('dashboard.projects.add');
    }
    

    public function edit()
    {
        return view('dashboard.projects.edit');
    }

    public function update()
    {
        return view('dashboard.projects.add');
    }

    public function get_all_projects(Request $request)
    {
        $projects = Project::select('id', 'image', 'title_' . $request->lang . ' As title', 'type_' . $request->lang . ' As type', 'description_' . $request->lang . ' As desc')->get();
        return response()->json(['projects' => $projects]);
    }
}
