@extends('dashboard.layout')

@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-bookmark-outline"></i>
            </span>
            Create New Project
        </h3>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                </li>
            </ul>
        </nav>
    </div>
    @auth
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    @if (session()->has('success'))
                        <div class="card card-inverse-success" id="context-menu-open">
                            <div class="card-body">
                                <p class="card-text"> Greate! Created Successfully</p>
                            </div>
                        </div>
                    @elseif (session()->has('error'))
                        <div class="card card-inverse-danger" id="context-menu-open">
                            <div class="card-body">
                                <p class="card-text"> oops! Created Fail</p>
                            </div>
                        </div>
                    @endif
                    <div class="card-body">
                        <h4 class="card-title">Add New Project
                        </h4><br>
                        <form method="POST" action="{{ route('projects.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title_en">Title EN</label>
                                        <input required type="text" class="form-control" id="title_en" name="title_en">
                                    </div>
                                    <div class="form-group">
                                        <label for="type_en">Project Type EN</label>
                                        <select required name="type_en" id="type_en" class="form-control">
                                            <option value="In Process">In Process</option>
                                            <option value="Done">Done</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="description_en">Description EN</label>
                                        <textarea required rows="5" class="form-control" id="description_en" name="description_en">
                                        </textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 arabic" dir="RTL">
                                    <div class="form-group">
                                        <label for="title_ar">عنوان المشروع</label>
                                        <input required type="text" class="form-control" id="title_ar" name="title_ar">
                                    </div>
                                    <div class="form-group">
                                        <label for="type_ar">نوع المشروع</label>
                                        <select required name="type_ar" id="type_ar" class="form-control">
                                            <option value="جارية">جارية</option>
                                            <option value="منتهية">منتهية</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="description_ar">وصف المشروع</label>
                                        <textarea required rows="5" class="form-control" id="description_ar" name="description_ar">
                                        </textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="project_image">Project Image</label>
                                        <input type="file" class="form-control" id="project_image" name="image" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-gradient-primary mr-2">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endauth
@endsection
