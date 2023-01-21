@extends('dashboard.layout')

@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-bookmark-outline"></i>
            </span>
            Edit About
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
                    @if (session()->has('success update'))
                        <div class="card card-inverse-success" id="context-menu-open">
                            <div class="card-body">
                                <p class="card-text"> Greate! Updateed Successfully</p>
                            </div>
                        </div>
                    @elseif (session()->has('error'))
                        <div class="card card-inverse-danger" id="context-menu-open">
                            <div class="card-body">
                                <p class="card-text"> oops! Updateed Fail</p>
                            </div>
                        </div>
                    @endif
                    <div class="card-body">
                        <h4 class="card-title">Edit About
                        </h4><br>
                        <form method="POST" id="create" action="{{ route('about.update', ['about' => $about->id]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title_en">Title EN</label>
                                        <input type="text" class="form-control" id="title_en" name="title_en"
                                            value="{{ $about->title_en }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="address_en">Address EN</label>
                                        <input type="text" class="form-control" id="address_en" name="address_en"
                                            value="{{ $about->address_en }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="video">Video URL</label>
                                        <input type="text" class="form-control" id="video" name="video"
                                            value="{{ $about->video }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="desc_en">Description EN</label>
                                        <textarea rows="5" class="form-control" id="desc_en" name="desc_en">
                                        {{ $about->desc_en}}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 arabic">
                                    <div class="form-group">
                                        <label for="title_ar">Title AR</label>
                                        <input required type="text" class="form-control" id="title_ar" name="title_ar"
                                            value="{{ $about->title_ar }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="address_ar">Address AR</label>
                                        <input required type="text" class="form-control" id="address_ar" name="address_ar"
                                            value="{{ $about->address_ar }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Site Logo</label>
                                        <div style="display: flex">
                                            <a href="{{ $about->image }}" target="_blank">
                                                <img style="width: 100px; height: 45px" src="{{ $about->image }}"
                                                    alt="Blog Image">
                                            </a>
                                            <input type="file" class="form-control" id="image" name="image" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="desc_ar">Description AR</label>
                                        <textarea required rows="5" class="form-control" id="desc_ar" name="desc_ar">
                                        {{ $about->desc_ar }}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="facebook">Facebook URL</label>
                                        <input type="text" class="form-control" id="facebook" name="facebook"
                                            value="{{$about->social['facebook'][0]}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="twitter">Twitter URL</label>
                                        <input type="text" class="form-control" id="twitter" name="twitter"
                                            value="{{$about->social['twitter'][0]}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="linkedin">Linkedin URL</label>
                                        <input type="text" class="form-control" id="linkedin" name="linkedin"
                                            value="{{$about->social['linkedin'][0]}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="youtube">Youtube URL</label>
                                        <input type="text" class="form-control" id="youtube" name="youtube"
                                            value="{{$about->social['youtube'][0]}}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div style="display: flex; justify-content: space-between;">
                                            <div style="width: 30%">
                                                <label for="projects">Done Projects</label>
                                                <input type="text" class="form-control" id="projects"
                                                    name="projects" value="{{$about->projects_info['done_projects'][0]}}">
                                            </div>
                                            <div style="width: 30%">
                                                <label for="designs">Done Designs</label>
                                                <input type="text" class="form-control" id="designs"
                                                    name="designs" value="{{$about->projects_info['done_designs'][0]}}">
                                            </div>
                                            <div style="width: 30%">
                                                <label for="awards">Given Awards</label>
                                                <input type="text" class="form-control" id="awards"
                                                    name="awards" value="{{$about->projects_info['given_awards'][0]}}">
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-gradient-primary mr-2">Create</button>
                                <a href="{{ route('about.edit', ['about' => 1]) }}"
                                    class="btn btn-gradient-light ml-2">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endauth
@endsection
