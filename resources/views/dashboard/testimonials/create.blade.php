@extends('dashboard.layout')

@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-bookmark-outline"></i>
            </span>
            @lang('testimonials.title')
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
                    @if (session()->has('success'))
                        <div class="card card-inverse-success" id="context-menu-open">
                            <div class="card-body">
                                <p class="card-text"> Greate! Created Successfully</p>
                            </div>
                        </div>
                    @elseif (session()->has('error'))
                        <div class="card card-inverse-danger" id="context-menu-open">
                            <div class="card-body">
                                <p class="card-text"> oops! Created Fail</p>
                            </div>
                        </div>
                    @endif
                    <div class="card-body">
                        <h4 class="card-title">Add New Testimonials</h4><br>
                        <form id="create" method="POST" action="{{ route('testimonials.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="image">Client Image</label>
                                        <input type="file" class="form-control" id="image" name="image" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name_en">Client Name EN</label>
                                        <input required type="text" class="form-control" id="name_en" name="client_name_en">
                                    </div>
                                    <div class="form-group">
                                        <label for="title_en">Client Title EN</label>
                                        <input required type="text" class="form-control" id="title_en" name="client_title_en">
                                    </div>
                                    <div class="form-group">
                                        <label for="description_en">Review EN</label>
                                        <textarea required rows="5" class="form-control" id="description_en" name="description_en">
                                        </textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 arabic">
                                    <div class="form-group">
                                        <label for="name_ar">Client Name AR</label>
                                        <input required type="text" class="form-control" id="name_ar" name="client_name_ar">
                                    </div>
                                    <div class="form-group">
                                        <label for="title_ar">Client Title AR</label>
                                        <input required type="text" class="form-control" id="title_ar" name="client_title_ar">
                                    </div>
                                    <div class="form-group">
                                        <label for="description_ar">Review AR</label>
                                        <textarea required rows="5" class="form-control" id="description_ar" name="description_ar">
                                        </textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-gradient-primary mr-2">Create</button>
                                <button type="reset" id="reset-form" class="btn btn-gradient-light btn-icon-text">
                                    <i class="mdi mdi-reload btn-icon-prepend"></i> Reset </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endauth
@endsection
