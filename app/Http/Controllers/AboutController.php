<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Traits\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;

class AboutController extends Controller
{
    use FileUpload;

    public function edit(About $about)
    {
        return view('dashboard.about.edit', compact('about'));
    }

    public function update(About $about, Request $request)
    {
        $social_media = [];
        $projects_info = [];
        array_merge($social_media, $social_media['facebook'] = [$request->facebook ?? $about->social['facebook']]);
        array_merge($social_media, $social_media['twitter']  = [$request->twitter ?? $about->social['twitter']]);
        array_merge($social_media, $social_media['linkedin'] = [$request->linkedin ?? $about->social['linkedin']]);
        array_merge($social_media, $social_media['youtube']  = [$request->youtube ?? $about->social['youtube']]);

        array_merge($projects_info, $projects_info['done_projects'] = [$request->projects ?? $about->projects_info['done_projects']]);
        array_merge($projects_info, $projects_info['done_designs']  = [$request->designs ?? $about->projects_info['done_designs']]);
        array_merge($projects_info, $projects_info['given_awards']  = [$request->awards ?? $about->projects_info['given_awards']]);

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
            'image'         => !empty($request->image)      ? $this->UploudImage($request->image, 'about') : $about->image,
        ]);

        return redirect()->route('about.edit', ['about' => $about->id])->with('success update', 'Done!');
    }

    // EndPoints
    public function get_all_projects(Request $request)
    {
        $lang = !empty($request->lang) ? $request->lang : 'en';
        $clients = About::select('id', 'image', 'title_' . $lang . ' As title', 'description_' . $lang . ' As desc')->paginate(10);
        return response()->json(['count_pages' => $clients->lastPage(), 'blogs' => $clients]);
    }
}
