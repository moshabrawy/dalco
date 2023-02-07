<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use App\Traits\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;

class TestimonialController extends Controller
{
    use FileUpload;

    public function index()
    {
        $datas = Testimonial::select('id', 'image', 'client_title_' . App::getLocale() . ' As client_title', 'client_name_' . App::getLocale() . ' As client_name', 'description_' . App::getLocale() . ' As desc')
            ->paginate(10);
        return view('dashboard.Testimonials.manage', compact('datas'));
    }

    public function create()
    {
        return view('dashboard.Testimonials.create');
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            "client_name_en" => "required",
            "client_name_ar" => "required",
            "client_title_en" => "required",
            "client_title_ar" => "required",
            "image"         => "required",
        ]);

        if ($validation->fails()) {
            notify()->error('Oops, Please, fill all Inputs and try again.');
            return redirect()->route('testimonials.create')->with('error', $validation->errors());
        } else {
            Testimonial::create([
                'client_name_en' => $request->client_name_en,
                'client_name_ar' => $request->client_name_ar,
                'client_title_en' => $request->client_title_en,
                'client_title_ar' => $request->client_title_ar,
                'description_en' => $request->description_en,
                'description_ar' => $request->description_ar,
                'image' => $this->UploudImage($request->image, 'testimonials'),
            ]);
        }
        notify()->success('You are awesome, your data was Created successfully.');
        return redirect()->route('testimonials.create')->with('success', 'Done!');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $datas = Testimonial::where('title_' . App::getLocale(), 'like', '%' . $search . '%')
            ->select('id', 'image', 'client_title_' . App::getLocale() . ' As client_title', 'client_name_' . App::getLocale() . ' As client_name', 'description_' . App::getLocale() . ' As desc')
            ->paginate(10);
        return view('dashboard.Testimonials.manage', compact('datas'));
    }

    public function edit(Testimonial $testimonial)
    {
        return view('dashboard.testimonials.edit', compact('testimonial'));
    }

    public function update(Testimonial $testimonial, Request $request)
    {
        $validation = Validator::make($request->all(), [
            "client_name_en" => "required",
            "client_name_ar" => "required",
            "client_title_en" => "required",
            "client_title_ar" => "required",
        ]);
        if ($validation->fails()) {
            notify()->error('Oops, Please, fill all Inputs and try again.');
            return redirect()->route('testimonials.edit', ['testimonial' => $testimonial->id])->with('error', $validation->errors());
        } else {
            if ($request->file('image')) {
                $testimonial->update(['image' => $this->UploudImage($request->image, 'testimonials')]);
            }
            $testimonial->update([
                'client_name_en' => $request->client_name_en,
                'client_name_ar' => $request->client_name_ar,
                'client_title_en' => $request->client_title_en,
                'client_title_ar' => $request->client_title_ar,
                'description_en' => $request->description_en,
                'description_ar' => $request->description_ar,
            ]);
        }
        notify()->success('You are awesome, your data was Updated successfully.');
        return redirect()->route('testimonials.index',);
    }
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        notify()->success('You are awesome, Deleted successfully.');
        return redirect()->route('testimonials.index');
    }

    // EndPoints
    public function get_all_testimonials(Request $request)
    {
        $lang = !empty($request->lang) ? $request->lang : 'en';
        $testimonials = Testimonial::select('id', 'image', 'client_name_' . $lang . ' As client_name', 'client_title_' . $lang . ' As client_title', 'description_' . $lang . ' As desc')
            ->get();
        return response()->json(['testimonials' => $testimonials]);
    }
}
