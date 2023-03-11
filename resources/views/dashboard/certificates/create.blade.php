@extends('dashboard.layout')

@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-bookmark-outline"></i>
            </span>
            @lang('certificates.add.title')
        </h3>
    </div>
    @auth
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">@lang('certificates.add.sub_title')</h4><br>
                        <form id="create" method="POST" action="{{ route('certificates.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">@lang('certificates.add.input_labels.0')</label>
                                        <input required type="text" class="form-control" id="name"
                                            name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="code">@lang('certificates.add.input_labels.1')</label>
                                        <input required type="text" class="form-control" id="code"
                                            name="code">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="date">@lang('certificates.add.input_labels.2')</label>
                                        <input required type="date" class="form-control" id="date"
                                            name="date">
                                    </div>
                                    <div class="form-group">
                                        <label for="image">@lang('certificates.add.input_labels.3')</label>
                                        <input type="file" class="form-control" id="image" name="image" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-gradient-primary mr-2">@lang('certificates.add.action.0')</button>
                                <button type="reset" id="reset-form" class="btn btn-gradient-light btn-icon-text">
                                    <i class="mdi mdi-reload btn-icon-prepend"></i> @lang('certificates.add.action.1') </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endauth
@endsection
