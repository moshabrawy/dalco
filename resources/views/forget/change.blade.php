<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Dashboard | Dalco System</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/modals.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.jpg') }}" />

</head>

<body>
    @if (session()->has('user'))
        <div class="container-scroller">
            <div class="container-fluid page-body-wrapper full-page-wrapper">
                <div class="content-wrapper d-flex align-items-center auth">
                    <div class="row flex-grow">
                        <div class="col-lg-4 mx-auto">
                            <div class="auth-form-light text-left p-5">
                                <div class="brand-logo">
                                    <img src="{{ asset('assets/images/logo.svg') }}">
                                </div>
                                <h4>Change Password</h4>
                                <form class="pt-3" action="{{ route('change_password') }}" method="POST">
                                    @csrf()
                                    <div class="form-group">
                                        <input type="hidden" name="user_hash" value="{{Session::get('user')}}"><br />
                                        <input type="password" name="password" class="form-control form-control-user"
                                            id="password" placeholder="Enter New Password"><br />
                                        <input type="password" name="password_confirmation"
                                            class="form-control form-control-user" id="password"
                                            placeholder="Confirm New Password"><br />
                                        @if (session()->has('validator'))
                                            <div class="alert alert-danger">
                                                The password confirmation does not match.
                                            </div>
                                        @endif
                                    </div>
                                    <div class="my-2 d-flex justify-content-between align-items-center">
                                        <a href="{{ route('login') }}" class="auth-link text-black">Try Login?</a>
                                    </div>
                                    <div class="mt-3">
                                        <button type="submit"
                                            class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">
                                            SAVE</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
    @else
        <script>
            window.location = "/dashboard";
        </script>
    @endif

</body>

</html>
