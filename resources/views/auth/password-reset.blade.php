{{-- @extends('layouts.main')

@section('container') --}}


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon/favicon-16x16.png') }}">
    {{-- <link rel="manifest" href="/site.webmanifest"> --}}
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <title>
        Ximply
    </title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/5c2c5b6638.js" crossorigin="anonymous"></script>
    <script src="{{ asset('fontawesome-kit.js') }}" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <link href="{{ asset('css/nucleo-svg.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/nucleo-icons.css') }}" rel="stylesheet">

     <!--Jquery-->
     <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style>
        #password-strength-status {
            padding: 5px 10px;
            color: #ffffff;
            border-radius: 4px;
            margin-top: -10px;
            margin-bottom: 10px;
            font-size: 10px;
        }

        .medium-password {
            background-color: #b7d60a;
            border: #bbb418 1px solid;
        }

        .weak-password {
            background-color: #ce1d14;
            border: #aa4502 1px solid;
            margin-bottom: 10px;
        }

        .strong-password {
            background-color: #12cc1a;
            border: #0fa015 1px solid;
            margin-bottom: 10px;

        }
    </style>
</head>

<body>
    <!-- Optional JavaScript; choose one of the two! -->
    <div class="container-fluid" style="background: rgb(240, 240, 240)">
        <div class="row justify-content-center align-items-center" style="height: 100vh">
            <div class="col-md-3">
                <div class="text-center">
                    <img src="{{ asset('img/logos/logo-new/logo-companyy.png') }}" alt="" class="img-fluid mb-3"
                        style="width: 200px;">
                    <h6 class="fw-semibold fs-4 my-4 text-dark" style="font-weight: 700">Reset your password</h6>
                </div>
                @if (session('error'))
                    <div class="alert alert-danger">
                        <b>Opps!</b> {{ session('error') }}
                    </div>
                @endif
                <div class="bg-white shadow p-3" style="border-radius: 5px">
                    <form action="{{ route('password_reset_action') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="token" value="{{ $data['token'] }}" hidden>
                        <div class="card-body pb-0">
                            <div class="col-md mb-3 input-group">
                                <input class="form-control" id="password" type="password" name="password"
                                    placeholder="Password"
                                    style="border-top-right-radius:0 !important;border-bottom-right-radius:0 !important">
                                <span class="input-group-text position-relative bg-gray"
                                    style="border-left: 1px solid rgb(228, 228, 228)" onclick="password_show_hide();">
                                    <i class="fas fa-eye" style="font-size: 11px" id="show_eye"></i>
                                    <i class="fas fa-eye-slash d-none " id="hide_eye" style="font-size: 11px"></i>
                                </span>
                            </div>
                            <div id="password-strength-status"></div>

                            <div class="col-md mb-3 input-group">
                                <input class="form-control" type="password" name="password_confirmation"
                                    id="confirm_password" placeholder="Password Confirmation"
                                    style="border-top-right-radius:0 !important;border-bottom-right-radius:0 !important">
                                <span class="input-group-text position-relative bg-gray"
                                    style="border-left: 1px solid rgb(228, 228, 228)"
                                    onclick="confirm_password_show_hide();">
                                    <i class="fas fa-eye" style="font-size: 11px" id="confirm_show_eye"></i>
                                    <i class="fas fa-eye-slash d-none " id="confirm_hide_eye"
                                        style="font-size: 11px"></i>
                                </span>
                            </div>
                            <div class="col-md pb-0  text-center">
                                <div class="" style="font-size: 12px;text-align: justify;">Make sure password
                                    minimum 8 characters
                                    including a number and a lowercase letter.</div>
                            </div>
                            <div class="col-md">
                                <button type="submit" class="btn text-white mt-3 w-100"
                                    style="background: #191a4d">Change
                                    password</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script>
        function password_show_hide() {
            var x = document.getElementById("password");
            var show_eye = document.getElementById("show_eye");
            var hide_eye = document.getElementById("hide_eye");
            hide_eye.classList.remove("d-none");
            if (x.type === "password") {
                x.type = "text";
                show_eye.style.display = "none";
                hide_eye.style.display = "block";
            } else {
                x.type = "password";
                show_eye.style.display = "block";
                hide_eye.style.display = "none";
            }
        }

        function confirm_password_show_hide() {
            var x = document.getElementById("confirm_password");
            var show_eye = document.getElementById("confirm_show_eye");
            var hide_eye = document.getElementById("confirm_hide_eye");
            hide_eye.classList.remove("d-none");
            if (x.type === "password") {
                x.type = "text";
                show_eye.style.display = "none";
                hide_eye.style.display = "block";
            } else {
                x.type = "password";
                show_eye.style.display = "block";
                hide_eye.style.display = "none";
            }
        }


       
    </script>
    <script>
         $(document).ready(function() {
            $("#password").on('keyup', function() {
                var number = /([0-9])/;
                var alphabets = /([a-zA-Z])/;
                var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
                if ($('#password').val().length < 6) {
                    $('#password-strength-status').removeClass();
                    $('#password-strength-status').addClass('weak-password');
                    $('#password-strength-status').html("Weak (should be atleast 6 characters.)");
                } else {
                    if ($('#password').val().match(number) && $('#password').val().match(alphabets) && $(
                            '#password').val().match(special_characters)) {
                        $('#password-strength-status').removeClass();
                        $('#password-strength-status').addClass('strong-password');
                        $('#password-strength-status').html("Strong");
                    } else {
                        $('#password-strength-status').removeClass();
                        $('#password-strength-status').addClass('medium-password');
                        $('#password-strength-status').html(
                            "Medium (should include alphabets, numbers and special characters or some combination.)"
                        );
                    }
                }
            });
        });
    </script>

</body>

</html>
