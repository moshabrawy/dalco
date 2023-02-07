@extends('dashboard.layout')

@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-face-profile"></i>
            </span> Profile
        </h3>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                </li>
            </ul>
        </nav>
    </div>
    @auth
        <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="avatar">
                            @if (auth()->user()->avatar != null)
                                <div class="nav_profile_img">
                                    <img class="profile_img_icon"
                                        src="{{ asset('assets/images/avatars/' . auth()->user()->avatar) }}" alt="profile"
                                        title="profile">
                                    <span class="availability-status online"></span>
                                </div>
                            @else
                                <div class="nav_profile_img">
                                    <img class="profile_img_icon" src="{{ asset('assets/images/avatars/admin.png') }}"
                                        alt="profile" title="profile">
                                    <span class="availability-status online"></span>
                                </div>
                            @endif
                        </div><br>
                        <label class="badge badge-gradient-info">Administraitor</label>
                        <h2 style=" margin: 10px; font-size: 20px;">{{ auth()->user()->name }}</h2>
                        <div class="personal">
                            <p>
                                <i class="mdi mdi-email-outline"></i>
                                {{ auth()->user()->email }}
                            </p>
                            <p>
                                <i class="mdi mdi-cellphone"></i>
                                {{ auth()->user()->phone }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Personal Information</h4><br>
                        <form method="POST" action="{{ route('UpdateAdminProfile', auth()->user()->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="form-group row">
                                <label for="pat_name" class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Full Name" value="{{ auth()->user()->name }}"><br>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email1" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="email1" name="email" placeholder="Email"
                                        value="{{ auth()->user()->email }}"><br>
                                    @error('email')
                                        <div class="alert alert-danger">
                                            {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone1" class="col-sm-3 col-form-label">Mobile</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="phone1" name="phone"
                                        placeholder="Mobile number" value="{{ auth()->user()->phone }}"><br>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password1" class="col-sm-3 col-form-label">Current Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="current_password" id="password1"
                                        placeholder="Current Password"><br>
                                    @if (session()->has('current_password'))
                                        <div class="alert alert-danger">
                                            Current password does not match
                                        </div>
                                    @elseif (session()->has('validator'))
                                        <div class="alert alert-danger">
                                            Current password is requierd
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password2" class="col-sm-3 col-form-label">New Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="password" id="password2"
                                        placeholder="New Password"><br>
                                    @if (session()->has('new_password'))
                                        <div class="alert alert-danger">
                                            New Password cann't be same as your current password
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="profile_photo_path1" class="col-sm-3 col-form-label">Profile
                                    Photo</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" id="profile_photo_path1" name="avatar"
                                        placeholder="Profile Photo"><br>
                                    @error('profilePhoto')
                                        <div class="alert alert-danger">
                                            {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-gradient-primary mr-2">Save</button>
                                <a href="{{ route('AdminProfile') }}" class="btn btn-gradient-light ml-2">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endauth
@endsection
