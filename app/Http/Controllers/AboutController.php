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
        $validation = Validator::make($request->all(), [
            "client_name_en" => "required",
            "client_name_ar" => "required",
        ]);
        if ($validation->fails()) {
            return redirect()->route('about.edit', ['project' => $about->id])->with('error', $validation->errors());
        } else {
            $about->update([
                'client_name_en' => $request->client_name_en,
                'client_name_ar' => $request->client_name_ar,
                'image' => !empty($request->image) ? $this->UploudImage($request->image, 'clients') : $about->image,
            ]);
        }
        return redirect()->route('about.edit',)->with('success update', 'Done!');
    }

    // EndPoints
    public function get_all_projects(Request $request)
    {
        $lang = !empty($request->lang) ? $request->lang : 'en';
        $clients = About::select('id', 'image', 'title_' . $lang . ' As title', 'description_' . $lang . ' As desc')->paginate(10);
        return response()->json(['count_pages' => $clients->lastPage(), 'blogs' => $clients]);
    }
}
