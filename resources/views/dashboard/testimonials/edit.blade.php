@extends('dashboard.layout')

@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-bookmark-outline"></i>
            </span>
            @lang('testimonials.edit.title')
        </h3>
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
                        <h4 class="card-title">@lang('testimonials.edit.title') " {{ $testimonial->client_name_en }} "
                        </h4><br>
                        <form method="POST" action="{{ route('testimonials.update', ['testimonial' => $testimonial->id]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="image">@lang('testimonials.edit.input_labels.0')</label>
                                        <div style="display: flex">
                                            <input type="file" class="form-control" id="image" name="image" />
                                            <a href="{{ $testimonial->image }}" target="_blank">
                                                <img style="width: 45px; height: 45px" src="{{ $testimonial->image }}"
                                                    alt="testimonial Image">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="client_name_en">@lang('testimonials.edit.input_labels.1')</label>
                                        <input required type="text" class="form-control" id="client_name_en"
                                            name="client_name_en" value="{{ $testimonial->client_name_en }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="title_en">@lang('testimonials.edit.input_labels.2')</label>
                                        <input required type="text" class="form-control" id="title_en"
                                            name="client_title_en" value="{{ $testimonial->client_title_en }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="description_en">@lang('testimonials.edit.input_labels.3')</label>
                                        <textarea required rows="5" class="form-control" id="description_en" name="description_en">
                                        {{ $testimonial->description_en }}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 arabic">
                                    <div class="form-group">
                                        <label for="client_name_ar">@lang('testimonials.edit.input_labels.4')</label>
                                        <input required type="text" class="form-control" id="client_name_ar"
                                            name="client_name_ar" value="{{ $testimonial->client_name_ar }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="title_ar">@lang('testimonials.edit.input_labels.5')</label>
                                        <input required type="text" class="form-control" id="title_ar"
                                            name="client_title_ar" value="{{ $testimonial->client_title_ar }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="description_ar">@lang('testimonials.edit.input_labels.6')</label>
                                        <textarea required rows="5" class="form-control" id="description_ar" name="description_ar">
                                        {{ $testimonial->description_ar }}
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-gradient-primary mr-2">@lang('testimonials.edit.action.0')</button>
                                <a href="{{ route('testimonials.index') }}"
                                    class="btn btn-gradient-light ml-2">@lang('testimonials.edit.action.1')</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endauth
@endsection
