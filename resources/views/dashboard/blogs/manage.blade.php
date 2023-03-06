@extends('dashboard.layout')

@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-bookmark-outline"></i>
            </span>
            @lang('news.title')
        </h3>
    </div>
    <div class="row">
        <!-- Table Content -->
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h4 class="card-title">@lang('news.sub_title')</h4>
                        </div>
                        <div class="col-md-4">
                            <div class="search-field d-none d-md-block">
                                <form class="align-items-center h-100" action="{{ route('blogSearch') }}" method="GET">
                                    <div class="input-group">
                                        <input required type="text" class="form-control bg-transparent border-0"
                                            placeholder="@lang('dashboard.search_text')" name="search">
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
                            <h3 class="text-center">@lang('dashboard.not_found')</h3>
                        </div>
                    @else
                        <table class="table table-striped text-center">
                            <thead class="blue-edit">
                                <tr>
                                    <th> @lang('news.table_heading.0') </th>
                                    <th> @lang('news.table_heading.1') </th>
                                    <th> @lang('news.table_heading.2') </th>
                                    <th> @lang('news.table_heading.3') </th>
                                    <th> @lang('news.table_heading.4') </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $data)
                                    <tr>
                                        <td> {{ $data->id }} </td>
                                        <td> {{ $data->title }}</td>
                                        <td>
                                            <img src="{{ $data->image }}" alt="News">
                                        </td>
                                        <td> {{ Str::substr($data->desc, 0, 50) }}</td>
                                        <td>
                                            <a href="{{ route('blogs.edit', ['blog' => $data->id]) }}"
                                                class="btn btn-inverse-warning btn-sm">
                                                <i class="mdi mdi-lead-pencil"></i>
                                            </a>
                                            <form class="del_form"
                                                action="{{ route('blogs.destroy', ['blog' => $data->id]) }}" method="POST">
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
