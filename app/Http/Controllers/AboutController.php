<?php

namespace App\Http\Controllers;

use App\Http\Resources\AboutUSResource;
use App\Models\About;
use App\Traits\FileUpload;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    use FileUpload;

    public function edit(About $about)
    {
        return view('dashboard.about.edit', compact('about'));
    }

    public function update(About $about, Request $request)
    {
        $social_media = [$request->facebook, $request->twitter, $request->linkedin, $request->youtube];
        $projects_info = [$request->projects, $request->designs, $request->awards];

        if ($request->file('image')) {
            $about->image = $this->UploudImage($request->image, 'about');
        }
        if ($request->file('our_pdf')) {
            $about->our_pdf = $this->UploudPdf($request->our_pdf, 'about');
        }
        $about->title_en      = !empty($request->title_en)   ? $request->title_en : $about->title_en;;
        $about->title_ar      = !empty($request->title_ar)   ? $request->title_ar : $about->title_ar;
        $about->desc_en       = !empty($request->desc_en)    ? $request->desc_en : $about->desc_en;
        $about->desc_ar       = !empty($request->desc_ar)    ? $request->desc_ar : $about->desc_ar;
        $about->video         = !empty($request->video)      ? $request->video : $about->video;
        $about->address_en    = !empty($request->address_en) ? $request->address_en : $about->address_en;
        $about->address_ar    = !empty($request->address_ar) ? $request->address_ar : $about->address_ar;
        $about->email         = !empty($request->email)      ? $request->email : $about->email;
        $about->phone         = !empty($request->phone)      ? $request->phone : $about->phone;
        $about->location      = !empty($request->location)      ? $request->location : $about->location;
        $about->projects_info = !empty($projects_info)       ? $projects_info : $about->projects_info;
        $about->social        = !empty($social_media)        ? $social_media : $about->social_media;
        $about->save();
        notify()->success('You are awesome, your data was Updated successfully.');
        return redirect()->route('about.edit', ['about' => $about->id]);
    }

    // EndPoints
    public function get_social_links()
    {
        $data = About::pluck('social')->first();
        return response()->json(['status_code' => 200, 'data' => $data]);
    }
    public function about_us(Request $request)
    {
        $lang = !empty($request->lang) ? $request->lang : 'en';
        $about = About::select('id', 'title_' . $lang . ' As title', 'desc_' . $lang . ' As desc', 'image', 'video', 'address_' . $lang . ' As address', 'email', 'phone', 'location', 'projects_info')
            ->get();
        $data = AboutUSResource::collection($about);
        return response()->json(['status_code' => 200, 'data' => $data[0]]);
    }
    public function get_our_pdf()
    {
        $our_pdf = About::select('our_pdf')->first();
        return response()->json(['status_code' => 200, 'pdf' => $our_pdf['our_pdf']]);
    }
}
