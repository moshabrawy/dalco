@extends('dashboard.layout')

@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-bookmark-outline"></i>
            </span>
            @lang('about.title')
        </h3>
    </div>
    @auth
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">@lang('about.title')
                        </h4><br>
                        <form method="POST" id="create" action="{{ route('about.update', ['about' => $about->id]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title_en">@lang('about.edit.input_labels.0')</label>
                                        <input type="text" class="form-control" id="title_en" name="title_en"
                                            value="{{ $about->title_en }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="address_en">@lang('about.edit.input_labels.1')</label>
                                        <input type="text" class="form-control" id="address_en" name="address_en"
                                            value="{{ $about->address_en }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="video">@lang('about.edit.input_labels.2')</label>
                                        <input type="text" class="form-control" id="video" name="video"
                                            value="{{ $about->video }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">@lang('about.edit.input_labels.3')</label>
                                        <input required type="email" class="form-control" id="email" name="email"
                                            value="{{ $about->email }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="description_en">@lang('about.edit.input_labels.4')</label>
                                        <textarea rows="5" class="form-control" id="description_en" name="desc_en">
                                        {{ $about->desc_en }}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 arabic">
                                    <div class="form-group">
                                        <label for="title_ar">@lang('about.edit.input_labels.5')</label>
                                        <input required type="text" class="form-control" id="title_ar" name="title_ar"
                                            value="{{ $about->title_ar }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="address_ar">@lang('about.edit.input_labels.6')</label>
                                        <input required type="text" class="form-control" id="address_ar" name="address_ar"
                                            value="{{ $about->address_ar }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="image">@lang('about.edit.input_labels.7')</label>
                                        <div style="display: flex">
                                            <a href="{{ $about->image }}" target="_blank">
                                                <img style="width: 100px; height: 45px" src="{{ $about->image }}"
                                                    alt="Blog Image">
                                            </a>
                                            <input type="file" class="form-control" id="image" name="image" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">@lang('about.edit.input_labels.8')</label>
                                        <input required type="text" class="form-control" id="phone" name="phone"
                                            value="{{ $about->phone }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="description_ar">@lang('about.edit.input_labels.9')</label>
                                        <textarea required rows="5" class="form-control" id="description_ar" name="desc_ar">
                                        {{ $about->desc_ar }}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="facebook">@lang('about.edit.input_labels.10')</label>
                                        <input type="text" class="form-control" id="facebook" name="facebook"
                                            value="{{ $about->social[0] }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="twitter">@lang('about.edit.input_labels.11')</label>
                                        <input type="text" class="form-control" id="twitter" name="twitter"
                                            value="{{ $about->social[1] }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="linkedin">@lang('about.edit.input_labels.12')</label>
                                        <input type="text" class="form-control" id="linkedin" name="linkedin"
                                            value="{{ $about->social[2] }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="youtube">@lang('about.edit.input_labels.13')</label>
                                        <input type="text" class="form-control" id="youtube" name="youtube"
                                            value="{{ $about->social[3] }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div style="display: flex; justify-content: space-between;">
                                            <div style="width: 30%">
                                                <label for="projects">@lang('about.edit.input_labels.14')</label>
                                                <input type="text" class="form-control" id="projects" name="projects"
                                                    value="{{ $about->projects_info[0] }}">
                                            </div>
                                            <div style="width: 30%">
                                                <label for="designs">@lang('about.edit.input_labels.15')</label>
                                                <input type="text" class="form-control" id="designs" name="designs"
                                                    value="{{ $about->projects_info[1] }}">
                                            </div>
                                            <div style="width: 30%">
                                                <label for="awards">@lang('about.edit.input_labels.16')</label>
                                                <input type="text" class="form-control" id="awards" name="awards"
                                                    value="{{ $about->projects_info[2] }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-gradient-primary mr-2">@lang('about.edit.action.0')</button>
                                <a href="{{ route('about.edit', ['about' => 1]) }}"
                                    class="btn btn-gradient-light ml-2">@lang('about.edit.action.1')</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endauth
@endsection
