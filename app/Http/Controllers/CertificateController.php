<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Traits\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;

class CertificateController extends Controller
{
    use FileUpload;

    public function index()
    {
        $datas = Certificate::select('id', 'name', 'code', 'code', 'image')->paginate(10);
        return view('dashboard.certificates.manage', compact('datas'));
    }

    public function create()
    {
        return view('dashboard.certificates.create');
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            "name"   => "required",
            "code"   => "required",
            "date"   => "required",
            "image"  => "required",
        ]);

        if ($validation->fails()) {
            notify()->error('Oops, Please, fill all Inputs and try again.');
            return redirect()->route('certificates.create')->with('error', $validation->errors());
        } else {
            Certificate::create([
                'name' => $request->name,
                'code' => $request->code,
                'date' => $request->date,
                'image' => $this->UploudImage($request->image, 'certificates'),
            ]);
        }
        notify()->success('You are awesome, your data was Created successfully.');
        return redirect()->route('certificates.create')->with('success', 'Done!');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $datas = Certificate::where('name', 'like', '%' . $search . '%')
            ->select('id', 'image', 'name', 'code', 'date')
            ->paginate(10);
        return view('dashboard.certificates.manage', compact('datas'));
    }

    public function edit(Certificate $certificate)
    {
        return view('dashboard.certificates.edit', compact('certificate'));
    }

    public function update(Request $request, Certificate $certificate)
    {
        $validation = Validator::make($request->all(), [
            "name"   => "required",
            "code"   => "required",
            "date"   => "required",
        ]);
        if ($validation->fails()) {
            notify()->error('Oops, Please, fill all Inputs and try again.');
            return redirect()->route('certificates.edit', ['certificate' => $certificate->id])->with('error', $validation->errors());
        } else {
            if ($request->file('image')) {
                $certificate->update(['image' => $this->UploudImage($request->image, 'certificates')]);
            }
            $certificate->update([
                'name' => $request->name,
                'code' => $request->code,
                'code' => $request->date,
            ]);
        }
        notify()->success('You are awesome, your data was Updated successfully.');
        return redirect()->route('certificates.index',);
    }

    public function destroy(Certificate $certificate)
    {
        $certificate->delete();
        notify()->success('You are awesome, Deleted successfully.');
        return redirect()->route('certificates.index');
    }

    // EndPoints
    public function get_all_projects(Request $request)
    {
        // $lang = !empty($request->lang) ? $request->lang : 'en';
        // $blogs = Blog::select('id', 'image', 'title_' . $lang . ' As title', 'description_' . $lang . ' As desc')->paginate(10);
        // $all_data = BlogResource::collection($blogs);
        // return response()->json(['count_pages' => $blogs->lastPage(), 'blogs' => $all_data]);
    }
}
