@extends('dashboard.layout')

@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-bookmark-outline"></i>
            </span>
            Clients
        </h3>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                </li>
            </ul>
        </nav>
    </div>
    <div class="row">
        <!-- Table Content -->
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h4 class="card-title">All Clients</h4>
                        </div>
                        <div class="col-md-4">
                            <div class="search-field d-none d-md-block">
                                <form class="align-items-center h-100" action="{{ route('clientSearch') }}" method="GET">
                                    <div class="input-group">
                                        <input required type="text" class="form-control bg-transparent border-0"
                                            placeholder="Type search here..." name="search">
                                        <button type="submit" class="badge badge-gradient-success search">
                                            <i class="search_icon mdi mdi-magnify"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    @if (session()->has('success'))
                        <div class="alert alert-info">Delete Successfull !</div>
                    @elseif (session()->has('error'))
                        <div class="alert alert-danger">Delete Fail !</div>
                    @elseif (session()->has('success update'))
                        <div class="alert alert-success">Update Success !</div>
                    @endif
                    @if ($datas->isEmpty())
                        <div class="no_results  text-center">
                            <div class=" py-3">
                                <img src="{{ asset('assets/images/no-results.png') }}" alt="No Results">
                            </div>
                            <h3 class="text-center">Sorry, We couldn't find any results</h3>
                        </div>
                    @else
                        <table class="table table-striped text-center">
                            <thead class="blue-edit">
                                <tr>
                                    <th> ID </th>
                                    <th> Client Name </th>
                                    <th> Image</th>
                                    <th> action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $data)
                                    <tr>
                                        <td> {{ $data->id }} </td>
                                        <td> {{ $data->client_name }}</td>
                                        <td>
                                            <img src="{{ $data->image }}" alt="Client">
                                        </td>
                                        <td>
                                            <a href="{{ route('clients.edit', ['client' => $data->id]) }}"
                                                class="btn btn-inverse-warning btn-sm">
                                                <i class="mdi mdi-lead-pencil"></i>
                                            </a>
                                            <form class="del_form"
                                                action="{{ route('clients.destroy', ['client' => $data->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-inverse-danger btn-sm">
                                                    <i class="mdi mdi-delete"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
                <div class="card-body">
                    <nav>
                        <ul class="pagination flat pagination-success">
                            {{ $datas->links('pagination::bootstrap-4') }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- end col-lg-12 -->
    </div>

@endsection
