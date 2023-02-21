@extends('dashboard.layout')

@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-home"></i>
            </span> @lang('dashboard.content_titles.0')
        </h3>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <span></span>@lang('dashboard.content_titles.1') <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                </li>
            </ul>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                    <img src="{{ asset('assets/images/dashboard/circle.svg') }}" class="card-img-absolute"
                        alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">
                        @lang('dashboard.services.0')
                        <i class="mdi mdi-settings mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">{{ $services }} @lang('dashboard.services.1')</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                    <img src="{{ asset('assets/images/dashboard/circle.svg') }}" class="card-img-absolute"
                        alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">
                        @lang('dashboard.news.0')
                        <i class="mdi mdi-newspaper mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">{{ $blogs }} @lang('dashboard.news.1')</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">
                    <img src="{{ asset('assets/images/dashboard/circle.svg') }}" class="card-img-absolute"
                        alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">
                        @lang('dashboard.testimonials.0')
                        <i class="mdi mdi-bookmark mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">{{ $testimonials }} @lang('dashboard.testimonials.1')</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">
                    <img src="{{ asset('assets/images/dashboard/circle.svg') }}" class="card-img-absolute"
                        alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">
                        @lang('dashboard.certificates.0')
                        <i class="mdi mdi-book-multiple-variant mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">{{ $certificates }} @lang('dashboard.certificates.1')</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-primary purple-greaiante card-img-holder text-white">
                <div class="card-body">
                    <img src="{{ asset('assets/images/dashboard/circle.svg') }}" class="card-img-absolute"
                        alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">
                        @lang('dashboard.done.0')
                        <i class="mdi mdi-radiobox-marked mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">{{ $done_projects }} @lang('dashboard.done.1')</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                    <img src="{{ asset('assets/images/dashboard/circle.svg') }}" class="card-img-absolute"
                        alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">
                        @lang('dashboard.pending.0')
                        <i class="mdi mdi-radiobox-marked mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">{{ $pending_projects }} @lang('dashboard.pending.1')</h2>
                </div>
            </div>
        </div>
    </div>
@endsection
