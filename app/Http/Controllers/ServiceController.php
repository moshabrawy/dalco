<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    public function index()
    {
        $datas = Service::select('id', 'icon', 'title_' . App::getLocale() . ' As title', 'description_' . App::getLocale() . ' As desc', 'created_at')
            ->paginate(10);
        return view('dashboard.services.manage', compact('datas'));
    }

    public function create()
    {
        return view('dashboard.services.create');
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            "title_en" => "required",
            "title_ar" => "required",
        ]);

        if ($validation->fails()) {
            notify()->error('Oops, Please, fill all Inputs and try again.');
            return redirect()->route('services.create')->with('error', $validation->errors());
        } else {
            Service::create([
                'title_en' => $request->title_en,
                'title_ar' => $request->title_ar,
                'description_en' => $request->description_en,
                'description_ar' => $request->description_ar,
                'icon' => 'icon-service',
            ]);
        }
        notify()->success('You are awesome, your data was Created successfully.');
        return redirect()->route('services.create')->with('success', 'Done!');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $datas = Service::where('title_' . App::getLocale(), 'like', '%' . $search . '%')
            ->select('id', 'icon', 'title_' . App::getLocale() . ' As title', 'description_' . App::getLocale() . ' As desc', 'created_at')
            ->paginate(10);
        return view('dashboard.services.manage', compact('datas'));
    }

    public function edit(Service $service)
    {
        return view('dashboard.services.edit', compact('service'));
    }

    public function update(Service $service, Request $request)
    {
        $validation = Validator::make($request->all(), [
            "title_en" => "required",
            "title_ar" => "required",
        ]);
        if ($validation->fails()) {
            notify()->error('Oops, Please, fill all Inputs and try again.');
            return redirect()->route('services.edit', ['service' => $service->id])->with('error', $validation->errors());
        } else {
            $service->update([
                'title_en' => $request->title_en,
                'title_ar' => $request->title_ar,
                'description_en' => $request->description_en,
                'description_ar' => $request->description_ar
            ]);
        }
        notify()->success('You are awesome, your data was Updated successfully.');
        return redirect()->route('services.index');
    }
    public function destroy(Service $service)
    {
        $service->delete();
        notify()->success('You are awesome, Deleted successfully.');
        return redirect()->route('services.index');
    }

    // EndPoints
    public function get_all_services(Request $request)
    {
        $lang = !empty($request->lang) ? $request->lang : 'en';
        $services = Service::select('id', 'icon', 'title_' . $lang . ' As title', 'description_' . $lang . ' As desc')->get();
        return response()->json(['status_code' => 200, 'services' => $services]);
    }
}
