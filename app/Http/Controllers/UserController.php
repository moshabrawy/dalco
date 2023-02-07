<?php

namespace App\Http\Controllers;

use App\Mail\SendOtpMail;
use App\Models\User;
use App\Traits\FileUpload;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    use FileUpload;

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'email|required',
            'password' => 'required'
        ]);

        $cre = [
            'email'    => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($cre)) {
            session()->flash('success', 'Welcome ' . Auth::user()->name);
            return redirect()->route('Dashboard');
        } else {
            session()->flash('error', 'Sorry! Try Again. It seems your login credential is not correct.');
            return redirect()->back();
        }
    }

    public function update(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'required|unique:users,phone,' . $user->id,
        ]);
        if ($validator->fails()) {
            return $validator->errors();
        } else {
            $user->name  = $request->name ?? $user->name;
            $user->email = $request->email ?? $user->email;
            $user->phone = $request->phone ?? $user->phone;
            //upload user avatar
            if ($request->file('avatar')) {
                $user->avatar = $this->UploudImage($request->avatar, 'avatars');
            }
            //Update password
            if (isset($request->password)) {
                $validator = Validator::make($request->all(), [
                    'current_password' => 'required',
                    'password' => 'required', 'confirmed',
                ]);
                if ($validator->fails()) {
                    return Redirect::back()->with('validator', 'Current password does not match');
                }
                if (!(Hash::check($request->get('current_password'), auth()->user()->password))) {
                    return Redirect::back()->with('current_password', 'Current password does not match');
                }
                if (strcmp($request->get('current_password'), $request->get('password')) == 0) {
                    return Redirect::back()->with('new_password', 'New Password cannot be same as your current password');
                }
                $user->password = Hash::make($request->password);
            }
            $user->save();
            notify()->success('You are awesome, your data was Updated successfully.');
            return redirect()->route('AdminProfile');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function send_verification_code(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'email' => 'required|email|exists:App\Models\User,email',
        ]);
        if ($validation->fails()) {
            return Redirect::back()->with('validator', 'The selected email is not exsist.');
        } else {
            $user = User::where('email', $request->email)->first();
            if ($user) {
                $user->verification_code = random_int(100000, 999999);
                $user->updated_at = Carbon::now()->addMinute(5)->timestamp;
                $user->save();
                Mail::to($user->email)->send(new SendOtpMail($user));
                return Redirect::route('ValidateCode');
            }
        }
    }

    public function validate_verification_code(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'verification_code' => 'required|exists:App\Models\User,verification_code',
        ]);
        if ($validation->fails()) {
            return Redirect::back()->with('validator', 'The selected verification code is invalid.');
        } else {
            $user = User::where('verification_code', $request->verification_code)->where(function ($query) {
                $query->whereDate('updated_at', Carbon::now());
                $query->whereTime('updated_at', '>=', Carbon::now());
            })->first();
            if ($user) {
                return Redirect::route('ChangePassword')->with(['user' => $user->id]);
            } else {
                return Redirect::back()->with('validator', 'The selected verification code is invalid.');
            }
        }
    }

    public function change_password(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'user_hash' => 'required|exists:App\Models\User,id',
            'password' => 'required|confirmed',
        ]);
        if ($validation->fails()) {
            return Redirect::back()->with(['user' => $request->user_hash, 'validator' => 'The password confirmation does not match.']);
        } else {
            $user = User::where('id', $request->user_hash)->first();
            $user->password = Hash::make($request['password']);
            $user->save();
            return redirect()->route('login');
        }
    }
}
