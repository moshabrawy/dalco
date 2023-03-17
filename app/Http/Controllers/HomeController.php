<?php

namespace App\Http\Controllers;

use App\Http\Resources\AboutUSResource;
use App\Models\About;
use App\Models\Blog;
use App\Models\Certificate;
use App\Models\Project;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::count();
        $blogs = Blog::count();
        $testimonials = Testimonial::count();
        $certificates = Certificate::count();
        $done_projects = Project::where('type_en', 'done')->count();
        $pending_projects = Project::where('type_en', 'in process')->count();
        return view('dashboard.home', compact(
            'services',
            'blogs',
            'testimonials',
            'certificates',
            'done_projects',
            'pending_projects'
        ));
    }

    public function footer_data(Request $request)
    {
        $lang = $request->lang ?? 'en';
        $data = About::pluck('social')->first();
        $services_name = Service::pluck('title_' . $lang);
        $projects_name = Project::pluck('title_' . $lang);
        $about = About::select('image', 'phone', 'address_' . $lang . ' As address',)
            ->get();
        return response()->json(['status_code' => 200, 'services_name' => $services_name, 'projects_name' => $projects_name, 'about' => $about, 'social' => $data,]);
    }
}
