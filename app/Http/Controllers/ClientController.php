<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Traits\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    use FileUpload;

    public function index()
    {
        $datas = Client::select('id', 'image', 'client_name_' . App::getLocale() . ' As client_name')->paginate(10);
        return view('dashboard.clients.manage', compact('datas'));
    }

    public function create()
    {
        return view('dashboard.clients.create');
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            "client_name_en" => "required",
            "client_name_ar" => "required",
            "image"   => "required",
        ]);

        if ($validation->fails()) {
            return redirect()->route('clients.create')->with('error', $validation->errors());
        } else {
            Client::create([
                'client_name_en' => $request->client_name_en,
                'client_name_ar' => $request->client_name_ar,
                'image' => $this->UploudImage($request->image, 'clients'),
            ]);
        }
        return redirect()->route('clients.create')->with('success', 'Done!');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $datas = Client::where('client_name_' . App::getLocale(), 'like', '%' . $search . '%')
            ->select('id', 'image', 'client_name_' . App::getLocale() . ' As client_name')
            ->paginate(10);
        return view('dashboard.clients.manage', compact('datas'));
    }

    public function edit(Client $client)
    {
        return view('dashboard.clients.edit', compact('client'));
    }

    public function update(Client $client, Request $request)
    {
        $validation = Validator::make($request->all(), [
            "client_name_en" => "required",
            "client_name_ar" => "required",
        ]);
        if ($validation->fails()) {
            return redirect()->route('clients.edit', ['project' => $client->id])->with('error', $validation->errors());
        } else {
            if ($request->file('image')) {
                $client->update(['image' => $this->UploudImage($request->image, 'clients')]);
            }
            $client->update([
                'client_name_en' => $request->client_name_en,
                'client_name_ar' => $request->client_name_ar,
            ]);
        }
        return redirect()->route('clients.index',)->with('success update', 'Done!');
    }
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index')->with('success', 'Done!');
    }

    // EndPoints
    public function get_all_projects(Request $request)
    {
        $lang = !empty($request->lang) ? $request->lang : 'en';
        $clients = Client::select('id', 'image', 'title_' . $lang . ' As title', 'description_' . $lang . ' As desc')->paginate(10);
        return response()->json(['count_pages' => $clients->lastPage(), 'blogs' => $clients]);
    }
}
