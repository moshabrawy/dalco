@extends('dashboard.layout')

@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-bookmark-outline"></i>
            </span>
            New Project
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
                    <div class="card-body">
                        <h4 class="card-title">Add New Project</h4><br>
                        <form id="create" method="POST" action="{{ route('projects.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title_en">Title EN</label>
                                        <input required type="text" class="form-control" id="title_en" name="title_en">
                                    </div>
                                    <div class="form-group">
                                        <label for="type_en">Project Type</label>
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
                                <div class="col-md-6 arabic">
                                    <div class="form-group">
                                        <label for="title_ar">Title AR</label>
                                        <input required type="text" class="form-control" id="title_ar" name="title_ar">
                                    </div>
                                    <div class="form-group">
                                        <label for="project_image">Project Image</label>
                                        <input type="file" class="form-control" id="project_image" name="image" />
                                    </div>
                                    <div class="form-group">
                                        <label for="description_ar">Description AR</label>
                                        <textarea required rows="5" class="form-control" id="description_ar" name="description_ar">
                                        </textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="project_image">Project Gallary</label>
                                        <input type="file" multiple accept="image/jpeg, image/png, image/jpg" class="form-control" id="project_image" name="image_gallery[]" />
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
