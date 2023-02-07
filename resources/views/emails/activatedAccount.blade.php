<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('email_design/bootstrap-5.0.2-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('email_design/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <title>Activation Email</title>
</head>

<body>
    <div class="container-fluid">
        <div>
            <div class="row">
                <div class="col-lg-12 col-md-12 p-3 col-sm-12">
                    <div class="ground p-3">
                        <table class="table-responsive" width="100%">
                            <tr>
                                <td>
                                    <p class="p1">Forget Password Verification Mail</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table class="table-responsive">
                                        <tr>
                                            <td style="padding-bottom: 10px;">
                                                <table class="table-responsive">
                                                    <tr>
                                                        <td>
                                                            <a href="#">
                                                                <img src="{{ asset('email_design/img/Group 3359.svg') }}"
                                                                    alt="">
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <p class="p2">AffSquare</p>
                                                            <p class="p2" id="user">To : {{ $data->name }}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td height="12" style="background-color: #f9f9f9;"></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="ground1 p-2">
                                        <table class="table-responsive" width="100%">
                                            <tr>
                                                <td>
                                                    <table class="table-responsive">
                                                        <tr>
                                                            <td>
                                                                <a href="#">
                                                                    <img src="{{ asset('email_design/img/Group 3359.svg') }}"
                                                                        alt="">
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <p class="p3">AffSquare Network</p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="line"></td>
                            </tr>
                            <tr>
                                <td height="12" style="background-color: #f9f9f9;"></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="ground1 p-2">
                                        <table class="table-responsive" width="100%">
                                            <tr>
                                                <td>
                                                    <table class="table-responsive">
                                                        <tr>
                                                            <td>
                                                                <p class="p4">Dear <span
                                                                        class="username">{{ $data->name }},</span></p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p class="p5">You have requested to reset the
                                                                    password of your AFFSQHARE account.</p>
                                                                <p class="para-5">Your verification code is : <span
                                                                        id="otpNum">{{ $data->verification_code }}</span>
                                                                </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="#">
                                                                    <img class="d-block" style="padding: 10px 15px;"
                                                                        src="{{ asset('email_design/img/6333055-ai 1.svg') }}"
                                                                        alt="">
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td height="12" style="background-color: #f9f9f9;"></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="ground2 p-2">
                                        <table class="table-responsive" width="100%">
                                            <tr>
                                                <td>
                                                    <table class="table-responsive">
                                                        <tr>
                                                            <td class="d-flex">
                                                                <a href="#">
                                                                    <img src="{{ asset('email_design/img/Group 3359.svg') }}"
                                                                        alt="">
                                                                </a>
                                                                <p class="p7">AffSquare Network</p>
                                                            </td>
                                                            <td class="line1">
                                                                <img src="{{ asset('email_design/img/Line 69.svg') }}"
                                                                    alt="">
                                                            </td>
                                                            <td class="d-flex">
                                                                <a href="#">
                                                                    <img src="{{ asset('email_design/img/Group 3365.svg') }}"
                                                                        alt="" title="facebook">
                                                                </a>
                                                                <a href="#" class="img1">
                                                                    <img src="{{ asset('email_design/img/Group 3367.svg') }}"
                                                                        alt="" title="instgram">
                                                                </a>
                                                                <a href="#">
                                                                    <img src="{{ asset('email_design/img/Group 3366.svg') }}"
                                                                        alt="" title="youtube">
                                                                </a>
                                                            </td>
                                                            <td class="line2">
                                                                <img src="{{ asset('email_design/img/Line 69.svg') }}"
                                                                    alt="">
                                                            </td>
                                                            <td class="d-flex">
                                                                <a href="#">
                                                                    <img src="{{ asset('email_design/img/Group1.svg') }}"
                                                                        alt="">
                                                                </a>
                                                                <a href="#" class="img1">
                                                                    <img src="{{ asset('email_design/img/Got Questions_.svg') }}"
                                                                        alt="">
                                                                </a>
                                                                <p class="p9">+201101166111</p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('email_design/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
