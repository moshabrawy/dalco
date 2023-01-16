@extends('dashboard.layout')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800">
        <i class="far fa-dot-circle"></i>
        New Project
    </h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Create New Project</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form class="user" action="{{ route('PostLogin') }}" method="POST">
                    @csrf()
                    <div class="form-group">
                        <input type="email" name="email" class="form-control form-control-user"
                            id="email" aria-describedby="emailHelp"
                            placeholder="Enter Email Address...">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control form-control-user"
                            id="password" placeholder="Password">
                    </div>
                    {{-- <div class="form-group">
                        <div class="custom-control custom-checkbox small">
                            <input type="checkbox" class="custom-control-input" id="customCheck">
                            <label class="custom-control-label" for="customCheck">Remember
                                Me</label>
                        </div>
                    </div> --}}
                    <button class="btn bg-gradient-primary btn-user btn-block" type="submit">Login</button>
                   
                </form>
            </div>
        </div>
    </div>
@endsection
