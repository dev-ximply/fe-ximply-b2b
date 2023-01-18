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


    <style>
        .btns:hover {
            transform: scale(1.05);
            transition: 0.5s ease-in;
        }

        .input__email {
            height: 40px;
            padding: 0 5px;
            width: 100%;
            border-radius: 5px;
            outline: 0px solid #19194b !important;
            border: 1px solid #19194b !important;
        }
        .input__email:focus{
            height: 40px;
            padding: 0 5px;
            width: 100%;
            border-radius: 5px;
            outline: 0px solid #19194b !important;
            border: 2px solid #19194b !important;
        }

        .input__password {
            height: 40px;
            padding: 0 5px;
            /* width: 100%; */
            margin-left: 0;
            float: left;
            border-radius: 5px;
            outline: 0px solid #19194b !important;
            border: 1px solid #19194b !important;
        }
        .input__password:focus{
            height: 40px;
            padding: 0 5px;
            /* width: 100%; */
            margin-left: 0;
            float: left;
            border-radius: 5px;
            outline: 0px solid #19194b !important;
            border: 2px solid #19194b !important;
            border-right: none;
        }
    </style>
</head>

<body class="">
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                            <div class="card card-plain">
                                <div style="width: 230px" align="center" class="px-4 my-0 ">
                                    <img src="{{ asset('img/logos/logo-new/logo-companyy.png') }}" alt=""
                                        class="w-100">
                                </div>
                                <div class="card-header pb-0 pt-1 text-start">
                                    <h4 class="font-weight-bolder text-dark">Sign In</h4>
                                    <p class="mb-0 text-sm text-dark pb-0">Enter your email and password to sign in</p>
                                </div>
                                <div class="card-body">
                                    @if (session('error'))
                                        <div class="alert alert-danger text-white">
                                            <b>Opps!</b> {{ session('error') }}
                                        </div>
                                    @endif
                                    @if (session('success'))
                                        <div class="alert alert-success text-white">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <form role="form" class="pt-0" method="POST"
                                        action="{{ route('login_action') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <input type="email" class="input__email"
                                                placeholder="Email" aria-label="Email" name="email"
                                                @if (Cookie::has('email')) value="{{ Cookie::get('email') }}" @endif
                                                autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3 input-group">
                                            <input type="password" class="input__password form-control form-control-lg" id="password"
                                                placeholder="Password" aria-label="Password" aria-label="Password"
                                                name="password"
                                                @if (Cookie::has('password')) value="{{ Cookie::get('password') }}" @endif
                                                autocomplete="password"
                                                style="border-top-right-radius:0 !important;border-bottom-right-radius:0 !important"
                                                autofocus>
                                            <span class="input-group-text position-relative bg-gray"
                                                style="border: 3px solid #19194b;"
                                                onclick="password_show_hide();">
                                                <i class="fas fa-eye" style="font-size: 11px" id="show_eye"></i>
                                                <i class="fas fa-eye-slash d-none " id="hide_eye"
                                                    style="font-size: 11px"></i>
                                            </span>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <style>
                                            .input-group {
                                                display: flex;
                                                align-content: stretch;
                                            }

                                            .input-group>input {
                                                flex: 1 0 auto;
                                            }

                                            /**
 * Even when I set some dimension-related styles on this
 * element but not on the input or button, they'll still
 * line up.
 */
                                            .input-group-addon {
                                                background: #eee;
                                                border: 1px solid #ccc;
                                                padding: 0.5em 1em;
                                            }
                                        </style>
                                        <div class="input-group">

                                            <input class="input__password" type="password" value="4.99"
                                                id="password">
                                            <span class="input-group-text position-relative bg-gray" onclick="password_show_hide();">
                                                <i class="fas fa-eye" style="font-size: 11px" id="show_eye"></i>
                                                <i class="fas fa-eye-slash d-none " id="hide_eye"
                                                    style="font-size: 11px"></i>
                                            </span>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="rememberMe"
                                                name="rememberMe" @if (Cookie::has('email')) checked @endif>
                                            <label class="form-check-label text-dark" for="rememberMe">Remember
                                                me</label>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit"
                                                class="font-weight-bold btn btn-lg btn-lg w-100 mt-2 mb-0 text-white"
                                                style="background-color: #191a4d">Sign in </button>
                                        </div>
                                        {{-- <div class="text-center px-lg-2 px-1 mt-2">
                                            <div class="font-weight-bold text-sm text-dark mb-2">OR</div>
                                        </div>
                                        <div class="text-center d-flex">
                                            <button id="login-google" type="submit"
                                                class="btn btn-lg btn-lg w-100  mb-0 text-dark d-flex" value=""
                                                style="background-color: #ffffff;border:1px solid #e5e5e5">
                                                <div class="me-auto" style="">
                                                    <img src="{{ asset('img/icons/google.png') }}" alt=""
                                                        srcset="" style="width: 18px;margin-left: -30px"
                                                        class="">
                                                </div>
                                                <div
                                                    class="d-flex justitify-content-center text-nowrap font-weight-bold">
                                                    Continue With Google
                                                </div>
                                            </button>
                                        </div> --}}
                                        <div class="text-center mt-2">
                                            <div>
                                                <span class="text-xs text-dark">Don't have an account? <a
                                                        href="/sign-up" class="text-xs text-dark font-weight-bold">Sign
                                                        Up</a> </span>
                                            </div>
                                            <div class="text-xs mx-auto text-dark py-1">
                                                <a href="/forgot-password"
                                                    class="text-primary text-dark font-weight-bold">Forgot Password</a>
                                            </div>
                                        </div>

                                        {{-- <style>
                                            @media only screen and (min-width:768px){
                                                .login_App{
                                                    display: none;
                                                }
                                            }
                                        </style> --}}
                                        <div class="row row-cols-2 login_App">
                                            <div class="col-md mt-3 d-md-none d-block">
                                                <a class="btn d-flex align-items-center" target="_blank"
                                                    href="https://play.google.com/store/apps/details?id=com.ximply.flutter_beazy"
                                                    style="background: #000000;width:130px;height:40px">
                                                    <div class="d-flex flex-row pt-1" style="width:130px;height:40px">
                                                        <div class="col-md-2 text-start me-3">
                                                            <img src="{{ asset('img/icons/google-play.png') }}"
                                                                alt="" style="width: 30px">
                                                        </div>
                                                        <div class="col-md text-start">
                                                            <div class="text-white">
                                                                <span class="text-white  font-weight-normal"
                                                                    style="font-size: 7px">
                                                                    Get&nbsp;it&nbsp;on
                                                                </span>
                                                            </div>
                                                            <div class="">
                                                                <p class="text-white "
                                                                    style="font-size: 7px; font-weight:500">
                                                                    Google&nbsp;Store
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-md mt-3 d-md-none d-block">
                                                <a class="btn d-flex align-items-center"
                                                    style="background: #000000;width:130px;height:40px">
                                                    <div class="d-flex flex-row pt-1" style="width:130px;height:40px">
                                                        <div class="col-md-2 text-start me-3">
                                                            <img src="{{ asset('img/icons/apple-store.png') }}"
                                                                alt="" style="width: 30px">
                                                        </div>
                                                        <div class="col-md text-start">
                                                            <div class="text-white">
                                                                <span class="text-white  font-weight-normal"
                                                                    style="font-size: 7px">
                                                                    Soon&nbsp;on
                                                                </span>
                                                            </div>
                                                            <div class="">
                                                                <p class="text-white "
                                                                    style="font-size: 0.7em; font-weight:500">
                                                                    App&nbsp;Store
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>

                                        {{-- <div>
                                            <a href="/sign-up" ></a>
                                        </div> --}}
                                    </form>
                                </div>

                            </div>
                        </div>
                        <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column"
                            style="border-top-left-radius:30px; border-bottom-left-radius:30px;background-image: url('{{ asset('img/curved-images/sidebar.png') }}');background-size:cover; -webkit-box-shadow: -5px 3px 12px 4px rgba(173,173,173,0.16);
                            -moz-box-shadow: -5px 3px 12px 4px rgba(173,173,173,0.16);
                            box-shadow: -5px 3px 12px 4px rgba(173,173,173,0.16);">
                            {{-- <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column"
                            style="border-top-left-radius:30px; border-bottom-left-radius:30px;background;background-size:cover; -webkit-box-shadow: -5px 3px 12px 4px rgba(173,173,173,0.16);
                            -moz-box-shadow: -5px 3px 12px 4px rgba(173,173,173,0.16);
                            box-shadow: -5px 3px 12px 4px rgba(173,173,173,0.16);"> --}}
                            <div
                                class="position-relative h-50 m-2 px-5 border-radius-lg d-flex flex-column justify-content-center">
                                {{-- <img src="{{ asset('img/curved-images/sidebar.png') }}" alt="pattern-lines" --}}
                                {{-- <img src="{{ asset('img/curved-images/sidebars.png') }}" alt="pattern-lines"
                                    class="position-absolute opacity-4 start-0"> --}}
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
                            <div class="row justify-content-center mt-1">
                                {{-- <div class="row"> --}}
                                <div class="col-md-4 position-relative text-center">
                                    <img src="{{ asset('img/qr_playstore.jpg') }}" alt="" width="90px">
                                </div>
                                <div class="col-md-4 position-relative text-center">
                                    {{-- <img src="{{ asset('img/qr_playstore.jpg') }}" alt="" width="115px"> --}}
                                    <img src="{{ asset('img/image-data/apple-black.png') }}" alt=""
                                        class="img-fluid" style="width: 90px">
                                </div>
                                {{-- </div> --}}

                            </div>
                            <div class="row mt-2 justify-content-center mb-2">
                                <div class="col-md-4 position-relative d-flex justify-content-center">
                                    {{-- <a class="btn d-flex align-items-center"
                                        href="https://play.google.com/store/apps/details?id=com.ximply.flutter_beazy"
                                        style="background: #000000;width:130px;height:40px" target="_blank">
                                        <div class="d-flex flex-row pt-1" style="width:130px;height:40px">
                                            <div class="col-md-2 text-start me-3">
                                                <img src="{{ asset('img/icons/google-play.png') }}" alt=""
                                                    style="width: 30px; margin-left:-15px">
                                            </div>
                                            <div class="col-md text-start" style="margin-left:-13px; margin-top:-3px">
                                                <div class="text-white">
                                                    <span class="text-white  font-weight-normal"
                                                        style="font-size: 7px">
                                                        Get it on
                                                    </span>
                                                </div>
                                                <div class="">
                                                    <p class="text-white " style="font-size: 11px; font-weight:600">
                                                        Google&nbsp;Store
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </a> --}}
                                    <a class="btns d-flex align-items-center justify-content-center"
                                        href="https://play.google.com/store/apps/details?id=com.ximply.flutter_beazy"
                                        style="width:90px;height:40px" target="_blank">
                                        <div class="d-flex flex-row pt-1 justify-content-center">
                                            <img src="{{ asset('img/icons/Google_Play_Store.png') }}" alt=""
                                                style="width:90px;height:30px">
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    <div class="d-flex justify-content-center">
                                        <a class="btns d-flex align-items-center justify-content-center"
                                            onclick="myFunc()" href="#" style="width:130px;height:40px">
                                            {{-- <div class="d-flex flex-row pt-1" style="width:130px;height:40px">
                                                <div class="col-md-2 text-start me-3">
                                                    <img src="{{ asset('img/icons/apple-store.png') }}"
                                                        alt="" style="width: 30px; margin-left:-15px">
                                                </div>
                                                <div class="col-md text-start"
                                                    style="margin-left:-10px;margin-top:-3px">
                                                    <div class="text-white ">
                                                        <span class="text-white  font-weight-normal"
                                                            style="font-size: 7px">
                                                            Soon on the
                                                        </span>
                                                    </div>
                                                    <div class="">
                                                        <p class=" text-white"
                                                            style="font-size: 11px; font-stretch:expanded; font-weight:600">
                                                            App&nbsp;Store
                                                        </p>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            <div class="d-flex flex-row pt-1 justify-content-center">
                                                <img src="{{ asset('img/icons/btn-app-store.png') }}" alt=""
                                                    style="width:90px;height:30px">
                                            </div>
                                        </a>
                                    </div>
                                    <h4 id="showText" style="display: none;transition:1s ease-out"
                                        class="text-dark">Coming Soon</h4>
                                </div>
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

    <!--Firebase-->
    {{-- <script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-analytics.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-storage.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-firestore.js"></script> --}}
    {{-- <script src="{{ url('public/js/firebase-conf.js') }}"></script>
    <script src="{{ url('public/js/google.js') }}"></script> --}}

    <!--Login-->
    <script>
        // const firebaseConfig = {
        //     apiKey: "AIzaSyDQSb3CSGc7U1tO-imhokdh4TVkZyecG-g",
        //     authDomain: "laravel-login1-f2857.firebaseapp.com",
        //     projectId: "laravel-login1-f2857",
        //     storageBucket: "laravel-login1-f2857.appspot.com",
        //     messagingSenderId: "338380411119",
        //     appId: "1:338380411119:web:8b04ea7ffc0cb58f84cb1a",
        //     measurementId: "G-MDFC6P3652"
        // };

        // // const firebaseConfig = {
        // //     apiKey: "AIzaSyDQSb3CSGc7U1tO-imhokdh4TVkZyecG-g",
        // //     authDomain: "laravel-login1-f2857.firebaseapp.com",
        // //     projectId: "laravel-login1-f2857",
        // //     storageBucket: "laravel-login1-f2857.appspot.com",
        // //     messagingSenderId: "338380411119",
        // //     appId: "1:338380411119:web:8b04ea7ffc0cb58f84cb1a",
        // //     measurementId: "G-MDFC6P3652"
        // // };
        // const app = firebase.initializeApp(firebaseConfig);

        // document.getElementById('login-google').addEventListener('click', function() {
        //     var provider = new firebase.auth.GoogleAuthProvider();
        //     firebase.auth()
        //         .signInWithPopup(provider)
        //         .then((result) => {
        //             /** @type {firebase.auth.OAuthCredential} */
        //             var credential = result.credential;

        //             // This gives you a Google Access Token. You can use it to access the Google API.
        //             var token = credential.accessToken;
        //             // The signed-in user info.
        //             var user = result.user;
        //             window.location.href = "https://e52b-103-79-155-14.ngrok.io"
        //         }).catch((error) => {
        //             // Handle Errors here.
        //             var errorCode = error.code;
        //             var errorMessage = error.message;
        //             // The email of the user's account used.
        //             var email = error.email;
        //             // The firebase.auth.AuthCredential type that was used.
        //             var credential = error.credential;
        //             // ...
        //         });
        //     alert(errorMessage);
        // });
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
    </script>

    {{-- for collapse apple --}}
    <script>
        var x = document.getElementById("showText");

        function myFunc() {
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>



    <!-- Github buttons -->
    {{-- <script async defer src="https://buttons.github.io/buttons.js"></script> --}}
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    {{-- <script src="{{ asset('js/soft-ui-dashboard.min.js?v=1.0.9') }}"></script> --}}
</body>

</html>
