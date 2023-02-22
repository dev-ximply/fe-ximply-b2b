<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon/favicon-16x16.png') }}">
    {{-- <link rel="manifest" href="/site.webmanifest"> --}}
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <title>
        Ximply
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('css/soft-ui-dashboard.css?v=1.0.9') }}" rel="stylesheet" />

    <script src="{{ asset('js/env-javascript.js') }}"></script>

    <!--Jquery-->
    <script src="{{ asset('js/plugins/jquery-3.6.1.min.js') }}"></script>


    <style>
        #password-strength-status {
            /* padding: 5px 10px; */
            color: #ffffff;
            border-radius: 4px;
            /* margin-top: -10px;
            margin-bottom: 10px; */
            font-size: 10px;
        }

        #password-strength-status-confirm {
            padding: 5px 10px;
            color: #ffffff;
            border-radius: 4px;
            margin-top: -10px;
            margin-bottom: 10px;
            font-size: 10px;
        }

        .medium-password {
            /* background-color: #b7d60a; */
            background-color: #ff720c;
            border: #ff720c 1px solid;
            margin-bottom: 10px;

        }

        .weak-password {
            background-color: #D42A34;
            border: #D42A34 1px solid;
            margin-bottom: 10px;
        }

        .strong-password {
            background-color: #62ca50;
            border: #62ca50 1px solid;
            margin-bottom: 10px;

        }
    </style>
</head>

<body class="">
    {{-- <div class="modal fade" id="referal-code" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header border-0  text-center">
                    <p class="modal-title font-weight-bold text-dark " id="exampleModalLabel">Referral Code</p>
                    <button type="button" class="btn-close text-dark text-lg text-dark " data-bs-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true"
                            style="font-size:30px;position:absolute; top:-5px;right:0;padding:6px">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md mx-auto mb-3 pb-0">
                        
                        <label for="name" class="floating-label col-md-12 mx-auto"><span class="floating-span">Enter a referral code</span>
                        </label>
                        <input class="floating-input form-control" type="text" id="name"
                            placeholder="Enter a refferal code">
                    </div>
                    <div class="col-md  text-end d-flex align-items-center justify-content-end">
                        <button class="py-1 px-2  text-white text-sm d-flex align-self-center"
                            style="background-color: #191a4d; border-radius:10px;border:1px solid#191a4d">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                            <div class="card card-plain">
                                <div style="width: 200px" align="center" class="my-0 px-4 pt-4 pb-2">
                                    <img src="{{ asset('img/logos/logo-new/logo-companyy.png') }}" alt=""
                                        class="w-100">
                                </div>
                                <div class="card-header pb-0 pt-1 text-start">
                                    <h5 class="font-weight-bolder text-dark">Sign Up</h5>
                                    <p class="mb-0 text-sm text-dark pb-0">Create your account</p>
                                </div>
                                <div class="card-body">
                                    @if (session('error'))
                                        <div class="alert alert-danger text-white">
                                            <b>Opps!</b> {{ session('error') }}
                                        </div>
                                    @endif
                                    <form role="form" class="pt-0" method="POST"
                                        action="{{ route('register_action') }}">
                                        @csrf

                                        <div class="mb-3">
                                            <input type="text" class="form-control form-control-lg"
                                                placeholder="Token Register (mandatory)" aria-label="tenant_token" name="tenant_token"
                                                value="{{ old('tenant_token') }}" autocomplete="tenant_token" required autofocus>
                                        </div>

                                        <div class="row">
                                            <div class="col-md mb-3">
                                                <input type="text" class="form-control form-control-lg"
                                                    placeholder="First Name" aria-label="firstname" name="firstname"
                                                    id="firstname" value="{{ old('firstname') }}" required
                                                    autocomplete="firstname" autofocus>
                                                <script>
                                                    new AlphabetInput(document.getElementById('firstname'));
                                                </script>
                                            </div>
                                            <div class="col-md mb-3">
                                                <input type="text" class="form-control form-control-lg"
                                                    placeholder="Last Name" aria-label="Lastname" name="lastname"
                                                    id="lastname" value="{{ old('lastname') }}" required
                                                    autocomplete="lastname" autofocus>
                                                <script>
                                                    new AlphabetInput(document.getElementById('lastname'));
                                                </script>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <input type="text" class="form-control form-control-lg"
                                                placeholder="Mobile Phone Number" aria-label="handphone" name="handphone" id="handphone"
                                                id="handphone" value="{{ old('handphone') }}" required
                                                autocomplete="handphone" step="1.0" autofocus maxlength="13">
                                            <script>
                                                new PhoneInput(document.getElementById('handphone'));
                                            </script>
                                        </div>
                                        <p id="result_phone" style="font-size:10px"></p>
                                        <div class="mb-3">
                                            <input type="email" class="form-control form-control-lg" id="email"
                                                placeholder="Email" aria-label="Email" name="email"
                                                value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        </div>
                                        <p id="result_email" style="font-size: 10px"></p>
                                        <div class="mb-3 input-group">
                                            <input type="password" class="form-control form-control-lg" id="password"
                                                placeholder="Password" aria-label="Password" aria-label="Password"
                                                name="password" value="{{ old('password') }}" required
                                                autocomplete="password"
                                                style="border-top-right-radius:0 !important;border-bottom-right-radius:0 !important"
                                                autofocus>
                                            <span class="input-group-text position-relative bg-gray"
                                                style="border-left: 1px solid rgb(228, 228, 228)"
                                                onclick="password_show_hide();">
                                                <i class="fas fa-eye" style="font-size: 11px" id="show_eye"></i>
                                                <i class="fas fa-eye-slash d-none " id="hide_eye"
                                                    style="font-size: 11px"></i>
                                            </span>
                                        </div>

                                        <div id="password-strength-status"></div>

                                        <div class="mb-3 input-group">
                                            <input type="password" class="form-control form-control-lg"
                                                id="confirm_password" placeholder="Confirm Password"
                                                aria-label="Password" aria-label="Password"
                                                name="password_confirmation"
                                                value="{{ old('password_confirmation') }}" required
                                                autocomplete="password"
                                                style="border-top-right-radius:0 !important;border-bottom-right-radius:0 !important"
                                                autofocus>
                                            <span class="input-group-text position-relative bg-gray"
                                                style="border-left: 1px solid rgb(228, 228, 228)"
                                                onclick="confirm_password_show_hide();">
                                                <i class="fas fa-eye" style="font-size: 11px"
                                                    id="confirm_show_eye"></i>
                                                <i class="fas fa-eye-slash d-none " id="confirm_hide_eye"
                                                    style="font-size: 11px"></i>
                                            </span>
                                        </div>

                                        {{-- <div class="mb-3">
                                            <input type="text" class="form-control form-control-lg"
                                                placeholder="Referral Code (optional)" aria-label="referral_code" name="referral_code"
                                                value="{{ old('referral_code') }}" autocomplete="referral_code" autofocus>
                                        </div> --}}

                                        {{-- <div class="alert alert-success text-white d-flex align-items-center justify-content-between"
                                            style="background:#81C6E8; height:80px; display: none !important" role="alert">
                                            <span style="color: #191a4d;font-size:14px"
                                                class="fw-bolder d-flex flex-column mx-2 pt-3 ">Success Use Referral Code
                                                <p class="fw-bold text-xs">mwiv9761 a.n. Kh***l Ka****s</p>
                                            </span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16" style="color: #ff720c">
                                                <path
                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                <path
                                                    d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                            </svg>
                                        </div> --}}

                                        {{-- <div style="display: block">
                                            <p class="text-xs text-start fw-bold" style="color: #ff720c; cursor:pointer" data-bs-target="#referal-code" data-bs-toggle="modal">I have
                                                referral code</p>
                                        </div> --}}

                                        <div>
                                            <input type="checkbox" required name="term" id="term">
                                            <label for="" for="term" style="font-size: 11px">
                                                I agree to the&nbsp;
                                                <a href="/policies/term-condition" style="color: #004cff;" target="_blank"
                                                    onclick="document.getElementById('term').checked = true">Term &
                                                    Conditions</a> and
                                                <a href="/policies/privacy-policy" style="color: #004cff;" target="_blank"
                                                    onclick="document.getElementById('term').checked = true">Privacy
                                                    Policy</a>
                                            </label>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit"
                                                class="btn btn-lg btn-lg w-100 mt-2 mb-0 text-white font-weight-bold"
                                                style="background-color: #191a4d">Sign up </button>
                                        </div>
                                    </form>
                                    {{-- <div class="text-center px-lg-2 px-1">
                                        <div class="font-weight-bold text-sm text-dark my-2 ">OR</div>
                                    </div>
                                    <div class="text-center d-flex">
                                        <button type="submit" class="btn btn-lg btn-lg w-100  mb-0 text-dark d-flex"
                                            value="" style="background-color: #ffffff;border:1px solid #e5e5e5">
                                            <div class="me-auto" style="">
                                                <img src="{{ asset('img/icons/google.png') }}" alt=""
                                                    srcset="" style="width: 18px;margin-left: -30px"
                                                    class="">
                                            </div>
                                            <div class="d-flex justitify-content-center text-nowrap font-weight-bold">
                                                Continue With Google
                                            </div>
                                        </button>
                                    </div> --}}
                                    <div class="text-xs mx-auto text-dark py-3 text-center">
                                        <span class="opacity-9">
                                            Have an account ?
                                        </span>
                                        <a href="/sign-in" class="text-primary text-dark font-weight-bold">Sign
                                            in</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column"
                            style="border-top-left-radius:30px; border-bottom-left-radius:30px;background-image: url('{{ asset('img/curved-images/sidebar.png') }}');background-size:cover">
                            <div
                                class="position-relative  m-3 px-7 border-radius-lg d-flex flex-column justify-content-center">
                                {{-- <div class="position-relative">
                                    <img class="max-width-200 w-100 position-relative z-index-2"
                                        src="{{ asset('img/logos/logo-new/logo-companyyy.png') }}"
                                        alt="logo-company">
                                </div>
                                <h5 class="position-relative mt-1 text-dark font-weight-bolder text-uppercase">"beware
                                    of little
                                    expenses. <br> a small leak will sink a great ship."</h5>
                                <p class="position-relative text-dark text-capitalize">a budget is more than just a
                                    series of numbers on
                                    a page;<br>it is an embodiment of our values.</p> --}}

                                    

                                    <div class="position-relative img_container mb-2">
                                        <img class=" position-relative z-index-2 img-fluid" style="width: 190px"
                                            src="{{ asset('img/logos/logo-new/logo-companyyy.png') }}"
                                            alt="logo-company">
                                    </div>
                                    <h5 class="position-relative mt-1 text-dark font-weight-bolder text-uppercase">"beware
                                        of little
                                        expenses.<br>a small leak will sink a great ship."</h5>
                                    <span class="position-relative text-sm text-dark text-capitalize">a budget is more than
                                        just a
                                        series of numbers&nbsp;on a page;<p class="text-sm text-dark text-capitalize">it is
                                            an embodiment of our values.</p> </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!--   Core JS Files   -->
    <script src="{{ asset('js/core/popper.min.js') }}"></script>
    <script src="{{ asset('js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/plugins/smooth-scrollbar.min.js') }}"></script>
    <!-- Kanban scripts -->
    <script src="{{ asset('js/plugins/dragula/dragula.min.js') }}"></script>
    <script src="{{ asset('js/plugins/jkanban/jkanban.js') }}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    {{-- <script async defer src="https://buttons.github.io/buttons.js"></script> --}}
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    {{-- <script src="{{ asset('js/soft-ui-dashboard.min.js?v=1.0.9') }}"></script> --}}

    <script>
        var myInputs = document.getElementById('handphone');
        // const validatePhone = (phone) => {
        //     return phone.match(
        //         /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        //     );
        // };

        const validates = () => {
            const $resultPhone = $('#result_phone');
            const phone = $('#handphone').val();
            $resultPhone.text('');
            myInputs.onfocus = function() {
                document.getElementById('result_phone').style.display = "block";
            }
            myInputs.onblur = function() {
                document.getElementById('result_phone').style.display = "none";
            }

            if (phone.length >= 10 && phone.length <= 13) {
                $resultPhone.text(phone + ' is valid :)');
                $resultPhone.css('color', 'white');
                $resultPhone.css('margin', '13px 0');
                $resultPhone.css('background-color', '#62ca50');
                $resultPhone.css('padding', '10px 13px');
                $resultPhone.css('border-radius', '5px');

            } else {
                $resultPhone.text(phone + ' is not valid :(');
                $resultPhone.css('color', 'white');
                $resultPhone.css('margin', '13px 0');
                $resultPhone.css('background-color', '#D42A34');
                $resultPhone.css('padding', '10px 13px');
                $resultPhone.css('border-radius', '5px');



            }
            return false;
        }

        $('#handphone').on('input', validates);
    </script>

    <script>
        // check validation email
        var myInput = document.getElementById('email');
        const validateEmail = (email) => {
            return email.match(
                /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
            );
        };

        const validate = () => {
            const $result = $('#result_email');
            const email = $('#email').val();
            $result.text('');
            myInput.onfocus = function() {
                document.getElementById('result_email').style.display = "block";
            }
            myInput.onblur = function() {
                document.getElementById('result_email').style.display = "none";
            }

            if (validateEmail(email)) {
                $result.text(email + ' is valid :)');
                $result.css('color', 'white');
                $result.css('margin', '13px 0');
                $result.css('background-color', '#62ca50');
                $result.css('padding', '10px 13px');
                $result.css('border-radius', '5px');

            } else {
                $result.text(email + ' is not valid :(');
                $result.css('color', 'white');
                $result.css('margin', '13px 0');
                $result.css('background-color', '#D42A34');
                $result.css('padding', '10px 13px');
                $result.css('border-radius', '5px');



            }
            return false;
        }

        $('#email').on('input', validate);
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

    <!--Jquery Password-->
    <script>
        var inputPassword = document.getElementById('password');
        $(document).ready(function() {
            $("#password").on('keyup', function() {
                document.getElementById('password-strength-status').style.padding = " 5px 10px";
                var number = /([0-9])/;
                var alphabets = /([a-zA-Z])/;
                var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
                if ($('#password').val().length < 6) {
                    $('#password-strength-status').removeClass();
                    $('#password-strength-status').addClass('weak-password');
                    $('#password-strength-status').html("Weak (should be at least 8 characters, one capital letter, and one number.)");

                    inputPassword.onfocus = function() {
                        document.getElementById('password-strength-status').style.display = "block";
                    }
                    inputPassword.onblur = function() {
                        document.getElementById('password-strength-status').style.display = "none";
                    }
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
