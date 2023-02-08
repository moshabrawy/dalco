<?php

namespace App\Http\Controllers;

use App\Mail\ContactUsMail;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactUsController extends Controller
{

    public function contact_us_mail(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);
        if ($validation->fails()) {
            return response()->json(['error' => $validation->errors(), 'status_code' => 400], 400);
        } else {
            ContactUs::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone != '' ? $request->phone : null,
                'subject' => $request->subject,
                'message' => $request->message,
            ]);
            $mailData = [
                'title' => $request->name . '/' . $request->email,
                'subject' => $request->subject,
                'body' => $request->message
            ];
            // return $mailData;
            Mail::send(new ContactUsMail($mailData));
            return response()->json(['message' => 'Email send successfully', 'status_code' => 200], 200);
        }
    }
}
