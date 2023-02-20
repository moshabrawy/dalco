<?php

namespace App\Http\Controllers;

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
}
