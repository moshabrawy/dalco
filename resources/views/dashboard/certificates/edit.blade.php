@extends('dashboard.layout')

@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-bookmark-outline"></i>
            </span>
            @lang('certificates.edit.title')
        </h3>
    </div>
    @auth
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">@lang('certificates.edit.title') " {{ $certificate->name }} "
                        </h4><br>
                        <form method="POST" action="{{ route('certificates.update', ['certificate' => $certificate->id]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">@lang('certificates.edit.input_labels.0')</label>
                                        <input required type="text" class="form-control" id="name" name="name"
                                            value="{{ $certificate->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="code">@lang('certificates.edit.input_labels.1')</label>
                                        <input required type="text" class="form-control" id="code" name="code"
                                            value="{{ $certificate->code }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="date">@lang('certificates.edit.input_labels.2')</label>
                                        <input required type="date" class="form-control" id="date" name="date"
                                            value="{{ $certificate->date }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="image">@lang('certificates.edit.input_labels.3')</label>
                                        <div style="display: flex">
                                            <input type="file" class="form-control" id="image" name="image" />
                                            <a href="{{ $certificate->image }}" target="_blank">
                                                <img style="width: 100px; height: 45px" src="{{ $certificate->image }}"
                                                    alt="certificate Image">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-gradient-primary mr-2">@lang('certificates.edit.action.0')</button>
                                <a href="{{ route('certificates.index') }}"
                                    class="btn btn-gradient-light ml-2">@lang('certificates.edit.action.1')</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endauth
@endsection
