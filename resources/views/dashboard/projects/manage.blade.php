@extends('dashboard.layout')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800">
        <i class="far fa-dot-circle"></i>
        ALL Projects
    </h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">ALL Projects</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->image }}</td>
                                <td>{{ $data->title }}</td>
                                <td>{{ $data->type }}</td>
                                <td>{{ $data->desc }}</td>
                                <td>
                                    <div style="display: flex">
                                        {{-- <a href="{{ route('editProject', $data->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-pen"></i>
                                        </a> --}}
                                        <a href="#" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="paginate" style="display: flex; justify-content: center;">
                    {{ $datas->links() }}

                </div>
            </div>
        </div>
    </div>
@endsection
