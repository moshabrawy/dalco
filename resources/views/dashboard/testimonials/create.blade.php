@extends('dashboard.layout')

@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-bookmark-outline"></i>
            </span>
            @lang('testimonials.add.title')
        </h3>
    </div>
    @auth
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">@lang('testimonials.add.sub_title')</h4><br>
                        <form id="create" method="POST" action="{{ route('testimonials.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="image">@lang('testimonials.add.input_labels.0')</label>
                                        <input type="file" class="form-control" id="image" name="image" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name_en">@lang('testimonials.add.input_labels.1')</label>
                                        <input required type="text" class="form-control" id="name_en" name="client_name_en">
                                    </div>
                                    <div class="form-group">
                                        <label for="title_en">@lang('testimonials.add.input_labels.2')</label>
                                        <input required type="text" class="form-control" id="title_en" name="client_title_en">
                                    </div>
                                    <div class="form-group">
                                        <label for="description_en">@lang('testimonials.add.input_labels.3')</label>
                                        <textarea required maxlength="250" rows="5" class="form-control" id="description_en" name="description_en">
                                        </textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 arabic">
                                    <div class="form-group">
                                        <label for="name_ar">@lang('testimonials.add.input_labels.4')</label>
                                        <input required type="text" class="form-control" id="name_ar" name="client_name_ar">
                                    </div>
                                    <div class="form-group">
                                        <label for="title_ar">@lang('testimonials.add.input_labels.5')</label>
                                        <input required type="text" class="form-control" id="title_ar" name="client_title_ar">
                                    </div>
                                    <div class="form-group">
                                        <label for="description_ar">@lang('testimonials.add.input_labels.6')</label>
                                        <textarea required maxlength="250" rows="5" class="form-control" id="description_ar" name="description_ar">
                                        </textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-gradient-primary mr-2">@lang('testimonials.add.action.0')</button>
                                <button type="reset" id="reset-form" class="btn btn-gradient-light btn-icon-text">
                                    <i class="mdi mdi-reload btn-icon-prepend"></i> @lang('testimonials.add.action.1') </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endauth
@endsection
