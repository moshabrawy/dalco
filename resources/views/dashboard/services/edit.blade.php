@extends('dashboard.layout')

@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-bookmark-outline"></i>
            </span>
            @lang('services.edit.title')
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
                        <h4 class="card-title">@lang('services.edit.title') " {{ $service->title_en }} "
                        </h4><br>
                        <form method="POST" action="{{ route('services.update', ['service' => $service->id]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="form-group">
                                        <label for="icon">@lang('services.edit.input_labels.0')</label>
                                        <input type="text" class="form-control" id="icon" name="icon"
                                            value="{{ $service->icon }}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title_en">@lang('services.edit.input_labels.1')</label>
                                        <input required type="text" class="form-control" id="title_en" name="title_en"
                                            value="{{ $service->title_en }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="description_en">@lang('services.edit.input_labels.2')</label>
                                        <textarea required rows="5" class="form-control" id="description_en" name="description_en">
                                        {{ $service->description_en }}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 arabic">
                                    <div class="form-group">
                                        <label for="title_ar">@lang('services.edit.input_labels.3')</label>
                                        <input required type="text" class="form-control" id="title_ar" name="title_ar"
                                            value="{{ $service->title_ar }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="description_ar">@lang('services.edit.input_labels.4')</label>
                                        <textarea required rows="5" class="form-control" id="description_ar" name="description_ar">
                                        {{ $service->description_ar }}
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-gradient-primary mr-2">@lang('services.edit.action.0')</button>
                                <a href="{{ route('services.index') }}" class="btn btn-gradient-light ml-2">@lang('services.edit.action.1')</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endauth
@endsection
