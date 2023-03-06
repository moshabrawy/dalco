@extends('dashboard.layout')

@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-bookmark-outline"></i>
            </span>
            @lang('clients.edit.title')
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
                        <h4 class="card-title">@lang('clients.edit.title') " {{ $client->client_name_en }} "
                        </h4><br>
                        <form method="POST" action="{{ route('clients.update', ['client' => $client->id]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="client_name_en">@lang('clients.edit.input_labels.0')</label>
                                        <input required type="text" class="form-control" id="client_name_en"
                                            name="client_name_en" value="{{ $client->client_name_en }}">
                                    </div>
                                </div>
                                <div class="col-md-6 arabic">
                                    <div class="form-group">
                                        <label for="client_name_ar">@lang('clients.edit.input_labels.1')</label>
                                        <input required type="text" class="form-control" id="client_name_ar"
                                            name="client_name_ar" value="{{ $client->client_name_ar }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="image">@lang('clients.edit.input_labels.2')</label>
                                        <div style="display: flex">
                                            <input type="file" class="form-control" id="image" name="image" />
                                            <a href="{{ $client->image }}" target="_blank">
                                                <img style="width: 100px; height: 45px" src="{{ $client->image }}"
                                                    alt="client Image">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-gradient-primary mr-2">@lang('clients.edit.action.0')</button>
                                <a href="{{ route('clients.index') }}" class="btn btn-gradient-light ml-2">@lang('clients.edit.action.1')</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endauth
@endsection
