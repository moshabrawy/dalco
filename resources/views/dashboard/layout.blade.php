<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@lang('dashboard.title')</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/modals.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    @if (app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{{ asset('assets/css_rtl/style_rtl.css') }}">
    @endif
    <script src="https://cdn.tiny.cloud/1/16qauf11xnt87szx8k22u1a5zlap8hbfowrjnky67m6ds64r/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.jpg') }}" />
    @notifyCss

    <script>

    </script>

</head>

<body>
    <div class="container-scroller">
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="{{ route('Dashboard') }}"><img
                        src="{{ asset('assets/images/logo.svg') }}" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="{{ route('Dashboard') }}"><img
                        src="{{ asset('assets/images/logo-mini.svg') }}" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>

                <ul class="navbar-nav navbar-nav-left">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" id="langDropdown" href="#" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="mdi mdi-earth me-2 text-primary"></i>
                            @lang('dashboard.lang_title')
                        </a>
                        <div class="dropdown-menu navbar-dropdown lang" aria-labelledby="langDropdown">
                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <a class="dropdown-item" hreflang="{{ $localeCode }}"
                                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    <i class="mdi mdi-google-translate me-2 text-success"></i>
                                    {{ $properties['native'] }}
                                </a>
                            @endforeach
                        </div>
                    </li>
                </ul>

                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            @if (auth()->user()->avatar != null)
                                <div class="nav-profile-img">
                                    <img src="{{ asset('assets/images/avatars/' . auth()->user()->avatar) }}"
                                        alt="profile">
                                    <span class="availability-status online"></span>
                                    <!--change to offline or busy as needed-->
                                </div>
                            @else
                                <div class="nav-profile-img">
                                    <img src="{{ asset('assets/images/avatars/admin.png') }}" alt="profile">
                                    <span class="availability-status online"></span>
                                    <!--change to offline or busy as needed-->
                                </div>
                            @endif
                            <div class="nav-profile-text">
                                <p class="mb-1 text-black">{{ auth()->user()->name }}</p>
                            </div>
                        </a>
                        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="{{ route('AdminProfile') }}">
                                <i class="mdi mdi-account me-2 text-success"></i> @lang('dashboard.profileDropdown.0') </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}">
                                <i class="mdi mdi-logout me-2 text-primary"></i> @lang('dashboard.profileDropdown.1') </a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item nav-profile">
                        <a href="{{ route('AdminProfile') }}" class="nav-link">
                            @if (auth()->user()->avatar != null)
                                <div class="nav-profile-image">
                                    <img src="{{ asset('assets/images/avatars/' . auth()->user()->avatar) }}"
                                        alt="profile">
                                    <span class="availability-status online"></span>
                                </div>
                            @else
                                <div class="nav-profile-image">
                                    <img src="{{ asset('assets/images/avatars/admin.png') }}" alt="profile">
                                    <span class="availability-status online"></span>
                                </div>
                            @endif
                            <div class="nav-profile-text d-flex flex-column">
                                <span
                                    class="font-weight-bold mb-2">{{ substr(auth()->user()->name, 0, 10) . '...' }}</span>
                                <span class="text-secondary text-small">Adminstraitor</span>
                            </div>
                            <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link single" href="{{ route('Dashboard') }}">
                            <span class="menu-title">@lang('dashboard.sidebar.0')</span>
                            <i class="mdi mdi-home menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#projects" aria-expanded="false"
                            aria-controls="projects">
                            <span class="menu-title">@lang('dashboard.sidebar.1')</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-radiobox-marked menu-icon"></i>
                        </a>
                        <div class="collapse" id="projects">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('projects.create') }}">@lang('dashboard.sub_menu.0')</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="{{ route('projects.index') }}">@lang('dashboard.sub_menu.1')</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#news" aria-expanded="false"
                            aria-controls="news">
                            <span class="menu-title">@lang('dashboard.sidebar.2')</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-newspaper menu-icon"></i>
                        </a>
                        <div class="collapse" id="news">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link"
                                        href="{{ route('blogs.create') }}">@lang('dashboard.sub_menu.0')</a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="{{ route('blogs.index') }}">@lang('dashboard.sub_menu.1')</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#services" aria-expanded="false"
                            aria-controls="services">
                            <span class="menu-title">@lang('dashboard.sidebar.3')</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-settings menu-icon"></i>
                        </a>
                        <div class="collapse" id="services">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link"
                                        href="{{ route('services.create') }}">@lang('dashboard.sub_menu.0')</a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="{{ route('services.index') }}">@lang('dashboard.sub_menu.1')</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#certificates" aria-expanded="false"
                            aria-controls="certificates">
                            <span class="menu-title">@lang('dashboard.sidebar.4')</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-book-multiple-variant menu-icon"></i>
                        </a>
                        <div class="collapse" id="certificates">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link"
                                        href="{{ route('certificates.create') }}">@lang('dashboard.sub_menu.0')</a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="{{ route('certificates.index') }}">@lang('dashboard.sub_menu.1')</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#clients" aria-expanded="false"
                            aria-controls="clients">
                            <span class="menu-title">@lang('dashboard.sidebar.6')</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-account-multiple menu-icon"></i>
                        </a>
                        <div class="collapse" id="clients">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link"
                                        href="{{ route('clients.create') }}">@lang('dashboard.sub_menu.0')</a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="{{ route('clients.index') }}">@lang('dashboard.sub_menu.1')</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link single" href="{{ route('about.edit', ['about' => 1]) }}">
                            <span class="menu-title">@lang('dashboard.sidebar.7')</span>
                            <i class="mdi mdi-information menu-icon"></i>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
                <!-- content-wrapper ends -->
                <footer class="footer">
                    <div class="container-fluid d-flex justify-content-between">
                        <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">
                            @lang('dashboard.copyrights')
                        </span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <x:notify-messages />
    @notifyJs

    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->

    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/js/misc.js') }}"></script>
    <!-- endinject -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <!-- End custom js for this page -->

</body>

</html>
