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
            notify()->error('Oops, Please, fill all Inputs and try again.');
            return redirect()->route('blogs.create');
        } else {
            Blog::create([
                'title_en' => $request->title_en,
                'title_ar' => $request->title_ar,
                'description_en' => $request->description_en,
                'description_ar' => $request->description_ar,
                'image' => $this->UploudImage($request->image, 'blogs'),
            ]);
        }
        notify()->success('You are awesome, your data was Created successfully.');
        return redirect()->route('blogs.create');
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
            notify()->error('Oops, Please, fill all Inputs and try again.');
            return redirect()->route('blogs.edit', ['project' => $blog->id]);
        } else {
            if ($request->file('image')) {
                $blog->update(['image' => $this->UploudImage($request->image, 'blogs')]);
            }
            $blog->update([
                'title_en' => $request->title_en,
                'title_ar' => $request->title_ar,
                'description_en' => $request->description_en,
                'description_ar' => $request->description_ar,
            ]);
        }
        notify()->success('You are awesome, your data was Updated successfully.');
        return redirect()->route('blogs.index',);
    }
    public function destroy(Blog $blog)
    {
        $blog->delete();
        notify()->success('You are awesome, Deleted successfully.');
        return redirect()->route('blogs.index');
    }

    // EndPoints
    public function get_all_news(Request $request)
    {
        $lang = !empty($request->lang) ? $request->lang : 'en';
        $blogs = Blog::select('id', 'image', 'title_' . $lang . ' As title', 'description_' . $lang . ' As desc',  'created_at')
            ->orderBy('id', 'DESC')
            ->paginate(10);
        $all_data = BlogResource::collection($blogs);
        return response()->json(['count_pages' => $blogs->lastPage(), 'news' => $all_data]);
    }

    public function get_recent_news(Request $request)
    {
        $lang = !empty($request->lang) ? $request->lang : 'en';
        $blogs = Blog::select('id', 'image', 'title_' . $lang . ' As title', 'description_' . $lang . ' As desc',  'created_at')
            ->limit(3)
            ->orderBy('created_at', 'DESC')
            ->get();
        $all_data = BlogResource::collection($blogs);
        return response()->json(['status_code' => 200, 'news' => $all_data]);
    }
    public function get_news_by_id(Request $request)
    {
        $lang = !empty($request->lang) ? $request->lang : 'en';
        $blog = Blog::select('id', 'image', 'title_' . $lang . ' As title', 'description_' . $lang . ' As desc',  'created_at')
            ->where('id', $request->id)
            ->first();
        if ($blog) {
            return response()->json(['status_code' => 200, 'data' => $blog]);
        } else {
            return response()->json(['status_code' => 400, 'error' => 'Project not found']);
        }
    }
}
