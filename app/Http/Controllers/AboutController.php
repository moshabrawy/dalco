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
            $about->update(['image' => $this->UploudImage($request->image, 'about')]);
        }
        // return $request->title_en;
        $about->update([
            'title_en'      => !empty($request->title_en)   ? $request->title_en : $about->title_en,
            'title_ar'      => !empty($request->title_ar)   ? $request->title_ar : $about->title_ar,
            'desc_en'       => !empty($request->desc_en)    ? $request->desc_en : $about->desc_en,
            'desc_ar'       => !empty($request->desc_ar)    ? $request->desc_ar : $about->desc_ar,
            'video'         => !empty($request->video)      ? $request->video : $about->video,
            'address_en'    => !empty($request->address_en) ? $request->address_en : $about->address_en,
            'address_ar'    => !empty($request->address_ar) ? $request->address_ar : $about->address_ar,
            'email'         => !empty($request->email)      ? $request->email : $about->email,
            'phone'         => !empty($request->phone)      ? $request->phone : $about->phone,
            'projects_info' => !empty($projects_info)       ? $projects_info : $about->projects_info,
            'social'        => !empty($social_media)        ? $social_media : $about->social_media,
        ]);
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
        $about = About::select('id', 'title_' . $lang . ' As title', 'desc_' . $lang . ' As desc', 'image', 'video', 'address_' . $lang . ' As address', 'email', 'phone', 'projects_info')
            ->get();
        $data = AboutUSResource::collection($about);
        return response()->json(['status_code' => 200, 'data' => $data[0]]);
    }
}
