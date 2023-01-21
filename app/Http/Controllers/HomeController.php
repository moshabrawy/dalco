<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Certificate;
use App\Models\Project;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $projects = Project::count();
        $blogs = Blog::count();
        $testimonials = Testimonial::count();
        $certificates = Certificate::count();
        return view('dashboard.home', compact('projects', 'blogs', 'testimonials', 'certificates'));
    }
}
