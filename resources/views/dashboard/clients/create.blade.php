@extends('dashboard.layout')

@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-bookmark-outline"></i>
            </span>
            New Client
        </h3>
    </div>
    @auth
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add New Client</h4><br>
                        <form id="create" method="POST" action="{{ route('clients.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="client_name_en">Client Name EN</label>
                                        <input required type="text" class="form-control" id="client_name_en" name="client_name_en">
                                    </div>
                                </div>
                                <div class="col-md-6 arabic">
                                    <div class="form-group">
                                        <label for="client_name_ar">Client Name AR</label>
                                        <input required type="text" class="form-control" id="client_name_ar" name="client_name_ar">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="image">Client Image</label>
                                        <input type="file" class="form-control" id="image" name="image" />
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
