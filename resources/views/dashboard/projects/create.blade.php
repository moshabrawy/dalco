@extends('dashboard.layout')

@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-bookmark-outline"></i>
            </span>
            @lang('projects.add.title')
        </h3>
    </div>
    @auth
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">@lang('projects.add.sub_title')</h4><br>
                        <form id="create" method="POST" action="{{ route('projects.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title_en">@lang('projects.add.input_labels.0')</label>
                                        <input required type="text" class="form-control" id="title_en" name="title_en">
                                    </div>
                                    <div class="form-group">
                                        <label for="owner_en">@lang('projects.add.input_labels.1')</label>
                                        <input required type="text" class="form-control" id="owner_en" name="owner_en">
                                    </div>
                                    <div class="form-group">
                                        <label for="duration_en">@lang('projects.add.input_labels.2')</label>
                                        <input required type="text" class="form-control" id="duration_en" name="duration_en">
                                    </div>
                                    <div class="form-group">
                                        <label for="status_en">@lang('projects.add.input_labels.3')</label>
                                        <select required name="status_en" id="status_en" class="form-control">
                                            <option value="In Process">In Process</option>
                                            <option value="Done">Done</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="date">@lang('projects.add.input_labels.4')</label>
                                        <input required type="date" class="form-control" id="date" name="date">
                                    </div>
                                    <div class="form-group">
                                        <label for="description_en">@lang('projects.add.input_labels.5')</label>
                                        <textarea required rows="5" class="form-control" id="description_en" name="description_en">
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="project_image">@lang('projects.add.input_labels.6')</label>
                                        <input type="file" class="form-control" id="project_image" name="image" />
                                    </div>
                                </div>
                                <div class="col-md-6 arabic">
                                    <div class="form-group">
                                        <label for="title_ar">@lang('projects.add.input_labels.7')</label>
                                        <input required type="text" class="form-control" id="title_ar" name="title_ar">
                                    </div>
                                    <div class="form-group">
                                        <label for="owner_ar">@lang('projects.add.input_labels.8')</label>
                                        <input required type="text" class="form-control" id="owner_ar" name="owner_ar">
                                    </div>
                                    <div class="form-group">
                                        <label for="duration_ar">@lang('projects.add.input_labels.9')</label>
                                        <input required type="text" class="form-control" id="duration_ar" name="duration_ar">
                                    </div>
                                    <div class="form-group">
                                        <label for="type_en">@lang('projects.add.input_labels.10')</label>
                                        <select required name="type_en" id="type_en" class="form-control">
                                            <option value="Direct">Direct</option>
                                            <option value="In Direct">In Direct</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="price">@lang('projects.add.input_labels.11')</label>
                                        <input required type="text" class="form-control" id="price" name="price">
                                    </div>
                                    <div class="form-group">
                                        <label for="description_ar">@lang('projects.add.input_labels.12')</label>
                                        <textarea required rows="5" class="form-control" id="description_ar" name="description_ar">
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="project_image">@lang('projects.add.input_labels.13')</label>
                                        <input type="file" multiple accept="image/jpeg, image/png, image/jpg"
                                            class="form-control" id="project_image" name="image_gallery[]" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-gradient-primary mr-2">@lang('projects.add.action.0')</button>
                                <button type="reset" id="reset-form" class="btn btn-gradient-light btn-icon-text">
                                    <i class="mdi mdi-reload btn-icon-prepend"></i> @lang('projects.add.action.1') </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endauth
@endsection
