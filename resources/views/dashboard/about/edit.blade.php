@extends('dashboard.layout')

@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-bookmark-outline"></i>
            </span>
            Edit About
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
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    @if (session()->has('appointmentUpdated'))
                        <div class="card card-inverse-success" id="context-menu-open">
                            <div class="card-body">
                                <p class="card-text"> Greate! Updateed Successfully</p>
                            </div>
                        </div>
                    @elseif (session()->has('error'))
                        <div class="card card-inverse-danger" id="context-menu-open">
                            <div class="card-body">
                                <p class="card-text"> oops! Updateed Fail</p>
                            </div>
                        </div>
                    @endif
                    <div class="card-body">
                        <h4 class="card-title">Edit About
                        </h4><br>
                        <form method="POST" id="create" action="{{ route('about.edit', ['about' => $about->id]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title_en">Title EN</label>
                                        <input required type="text" class="form-control" id="title_en" name="title_en"
                                            value="{{ $about->title_en }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="address_en">Address EN</label>
                                        <input required type="text" class="form-control" id="address_en" name="address_en"
                                            value="{{ $about->address_en }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="title_en">Video URL</label>
                                        <input required type="text" class="form-control" id="title_en" name="title_en"
                                            value="{{ $about->title_en }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="description_en">Description EN</label>
                                        <textarea required rows="5" class="form-control" id="description_en" name="description_en">
                                        {{ $about->description_en }}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 arabic">
                                    <div class="form-group">
                                        <label for="title_ar">Title AR</label>
                                        <input required type="text" class="form-control" id="title_ar" name="title_ar"
                                            value="{{ $about->title_ar }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="address_ar">Address AR</label>
                                        <input required type="text" class="form-control" id="address_ar" name="address_ar"
                                            value="{{ $about->address_ar }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="title_en">Image</label>
                                        <input required type="file" class="form-control" id="title_en" name="title_en"
                                            value="{{ $about->title_en }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="description_ar">Description AR</label>
                                        <textarea required rows="5" class="form-control" id="description_ar" name="description_ar">
                                        {{ $about->description_ar }}
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="address_ar">Address</label>
                                        <input required type="text" class="form-control" id="address_ar" name="address_ar"
                                            value="{{ $about->address_ar }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-gradient-primary mr-2">Create</button>
                                <a href="{{ route('about.edit', ['about' => 1]) }}"
                                    class="btn btn-gradient-light ml-2">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endauth
@endsection
