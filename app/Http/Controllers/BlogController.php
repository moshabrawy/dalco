<?php

namespace App\Http\Controllers;

use App\Http\Resources\BlogResource;
use App\Models\Blog;
use App\Traits\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    use FileUpload;

    public function index()
    {
        $datas = Blog::select('id', 'image', 'title_' . App::getLocale() . ' As title', 'description_' . App::getLocale() . ' As desc', 'created_at')
            ->paginate(10);
        return view('dashboard.blogs.manage', compact('datas'));
    }

    public function create()
    {
        return view('dashboard.blogs.create');
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            "title_en" => "required",
            "title_ar" => "required",
            "image"   => "required",
        ]);

        if ($validation->fails()) {
            return redirect()->route('blogs.create')->with('error', $validation->errors());
        } else {
            Blog::create([
                'title_en' => $request->title_en,
                'title_ar' => $request->title_ar,
                'description_en' => $request->description_en,
                'description_ar' => $request->description_ar,
                'image' => $this->UploudImage($request->image, 'blogs'),
            ]);
        }
        return redirect()->route('blogs.create')->with('success', 'Done!');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $datas = Blog::where('title_' . App::getLocale(), 'like', '%' . $search . '%')
            ->select('id', 'image', 'title_' . App::getLocale() . ' As title', 'description_' . App::getLocale() . ' As desc', 'created_at')
            ->paginate(10);
        return view('dashboard.blogs.manage', compact('datas'));
    }

    public function edit(Blog $blog)
    {
        return view('dashboard.blogs.edit', compact('blog'));
    }

    public function update(Blog $blog, Request $request)
    {
        $validation = Validator::make($request->all(), [
            "title_en" => "required",
            "title_ar" => "required",
        ]);
        if ($validation->fails()) {
            return redirect()->route('blog.edit', ['project' => $blog->id])->with('error', $validation->errors());
        } else {
            $blog->update([
                'title_en' => $request->title_en,
                'title_ar' => $request->title_ar,
                'description_en' => $request->description_en,
                'description_ar' => $request->description_ar,
                'image' => !empty($request->image) ? $this->UploudImage($request->image, 'blogs') : $blog->image,
            ]);
        }
        return redirect()->route('blogs.index',)->with('success update', 'Done!');
    }
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('blog.index')->with('success', 'Done!');
    }

    // EndPoints
    public function get_all_projects(Request $request)
    {
        $lang = !empty($request->lang) ? $request->lang : 'en';
        $blogs = Blog::select('id', 'image', 'title_' . $lang . ' As title', 'description_' . $lang . ' As desc')->paginate(10);
        $all_data = BlogResource::collection($blogs);
        return response()->json(['count_pages' => $blogs->lastPage(), 'blogs' => $all_data]);
    }
}
