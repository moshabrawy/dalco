@extends('dashboard.layout')

@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-bookmark-outline"></i>
            </span>
            Edit Project
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
                        <h4 class="card-title">Edit Project " {{ $project->title_en }} "
                        </h4><br>
                        <form method="POST" action="{{ route('projects.update', ['project' => $project->id]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title_en">Title EN</label>
                                        <input required type="text" class="form-control" id="title_en" name="title_en"
                                            value="{{ $project->title_en }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="type_en">Project Type EN</label>
                                        <select required name="type_en" id="type_en" class="form-control">
                                            <option value="In Process"
                                                {{ $project->type_en === 'In Process' ? 'selected' : '' }}>
                                                In Process
                                            </option>
                                            <option value="Done" {{ $project->type_en === 'Done' ? 'selected' : '' }}>
                                                Done
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="description_en">Description EN</label>
                                        <textarea required rows="5" class="form-control" id="description_en" name="description_en">
                                        {{ $project->description_en }}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 arabic">
                                    <div class="form-group">
                                        <label for="title_ar">Title AR</label>
                                        <input required type="text" class="form-control" id="title_ar" name="title_ar"
                                            value="{{ $project->title_ar }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="project_image">Project Image</label>
                                        <div style="display: flex">
                                            <a href="{{ $project->image }}" target="_blank">
                                                <img style="width: 45px; height: 45px" src="{{ $project->image }}"
                                                    alt="Project Image">
                                            </a>
                                            <input type="file" class="form-control" id="project_image" name="image" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="description_ar">Description AR</label>
                                        <textarea required rows="5" class="form-control" id="description_ar" name="description_ar">
                                        {{ $project->description_ar }}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="project_image">Project Gallary</label>
                                        <input type="file" multiple accept="image/jpeg, image/png, image/jpg"
                                            class="form-control" id="project_image" name="image_gallery[]" />
                                        <div class="gallery">
                                            @if ($project_images->images != [])
                                                @foreach ($project_images->images as $img)
                                                    <a href="{{ asset('assets/images/projects/gallery/' . $img) }}"
                                                        target="_blank">
                                                        <img style="width: 45px; height: 45px"
                                                            src="{{ asset('assets/images/projects/gallery/' . $img) }}"
                                                            alt="Gallery Item Image">
                                                    </a>
                                                @endforeach
                                            @endif

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-gradient-primary mr-2">Save</button>
                                <a href="{{ route('projects.index') }}" class="btn btn-gradient-light ml-2">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endauth
@endsection
