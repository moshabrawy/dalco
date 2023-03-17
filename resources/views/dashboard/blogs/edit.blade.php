@extends('dashboard.layout')

@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-bookmark-outline"></i>
            </span>
            @lang('news.edit.title')
        </h3>
    </div>
    @auth
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">@lang('news.edit.title') " {{ $blog->title_en }} "
                        </h4><br>
                        <form method="POST" action="{{ route('blogs.update', ['blog' => $blog->id]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title_en">@lang('news.edit.input_labels.0')</label>
                                        <input required type="text" class="form-control" id="title_en" name="title_en"
                                            value="{{ $blog->title_en }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="description_en">@lang('news.edit.input_labels.1')</label>
                                        <textarea required rows="5" class="form-control" id="description_en" name="description_en">
                                        {{ $blog->description_en }}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 arabic">
                                    <div class="form-group">
                                        <label for="title_ar">@lang('news.edit.input_labels.2')</label>
                                        <input required type="text" class="form-control" id="title_ar" name="title_ar"
                                            value="{{ $blog->title_ar }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="description_ar">@lang('news.edit.input_labels.3')</label>
                                        <textarea required rows="5" class="form-control" id="description_ar" name="description_ar">
                                        {{ $blog->description_ar }}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="image">@lang('news.edit.input_labels.4')</label>
                                        <div style="display: flex">
                                            <a href="{{ $blog->image }}" target="_blank">
                                                <img style="width: 45px; height: 45px" src="{{ $blog->image }}"
                                                    alt="Blog Image">
                                            </a>
                                            <input type="file" class="form-control" id="image" name="image" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-gradient-primary mr-2">@lang('news.edit.action.0')</button>
                                <a href="{{ route('blogs.index') }}" class="btn btn-gradient-light ml-2">@lang('news.edit.action.1')</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endauth
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [{
                    value: 'First.Name',
                    title: 'First Name'
                },
                {
                    value: 'Email',
                    title: 'Email'
                },
            ]
        });
    </script>
@endsection
