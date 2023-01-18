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

    <!-- css table-->
    <link rel="stylesheet" href="{{ asset('css/table/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/table/style.css') }}">
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/5c2c5b6638.js" crossorigin="anonymous"></script>
    <script src="{{ asset('fontawesome-kit.js') }}" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <link href="{{ asset('css/nucleo-svg.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/nucleo-icons.css') }}" rel="stylesheet">
    {{-- Custom Styling --}}
    <link rel="stylesheet" href="{{ asset('css/core-style.css') }}">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('css/soft-ui-dashboard.css?v=1.0.9') }}" rel="stylesheet" />
    <script src="{{ asset('js/plugins/jquery-3.6.1.min.js') }}"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

    {{-- card slider --}}
    <script src="https://kenwheeler.github.io/slick/slick/slick.js"></script>
    <script src="{{ asset('js/js-image-zoom.js') }}"></script>

    {{-- GLOBAL VARIABEL --}}
    <script src="{{ asset('js/env-javascript.js') }}"></script>
</head>

<body class="">

    <div id="main-loader"
        style="display:none; text-align: center; z-index: 5000; position: absolute; width: 100%; top: 40%">
        <img height="100px" src="{{ asset('img/loader.gif') }}">
    </div>    
    <main class="main-content  mt-0" style="background-color: #ffff">        
        <section>
            <div class="page-header min-vh-100">                
                <div class="container">
                    <a class="btn btn-sm" style="margin-top: -100px; margin-left: 25px" href="/">Home</a>
                    <div class="row">                        
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">                        
                            <div class="card card-plain">
                                <div style="width: 200px" align="center" class="my-0 px-4">
                                    <img src="{{ asset('img/logos/logo-new/logo-companyy.png') }}" alt=""
                                        class="w-100">
                                </div>
                                <div class="card-header pb-0 text-left" style="background-color: #ffff">
                                    <h4 class="font-weight-bolder text-dark">Reset password</h4>
                                    <p class="mb-0 text-dark text-sm">You will receive an e-mail in maximum 60 seconds
                                    </p>
                                </div>
                                <div class="card-body">
                                    @if (session('error'))
                                        <div class="alert alert-danger">
                                            <b>Opps!</b> {{ session('error') }}
                                        </div>
                                    @endif
                                    <form action="javascript:void(0)" method="POST" onsubmit="sendPasswordReset()">
                                        <div class="mb-3">
                                            <input required type="email" name="email" id="email"
                                                class="form-control form-control-lg" placeholder="Your Email"
                                                aria-label="Email">
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-lg w-100 my-4 text-white"
                                                style="background-color: #191a4d">Send Reset Link</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column"
                            style="border-top-left-radius:30px; border-bottom-left-radius:30px;background-image: url('{{ asset('img/curved-images/sidebar.png') }}');background-size:cover">
                            <div
                                class="position-relative  h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center">
                                <img src="{{ asset('img/shapes/pattern-lines.svg') }}" alt="pattern-lines"
                                    class="position-absolute opacity-4 start-0">
                                <div class="position-relative">
                                    <img class="max-width-200 w-100 position-relative z-index-2"
                                        src="{{ asset('img/logos/logo-new/logo-companyyy.png') }}" alt="logo-company">
                                </div>
                                <h4 class="mt-3 text-dark font-weight-bolder text-uppercase">"beware of little
                                    expenses. <br> a small leak will sink a great ship."</h4>
                                <p class="text-dark text-capitalize">a budget is more than just a series of numbers on
                                    a page; it is an embodiment of our values.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

<script>
    function sendPasswordReset() {
        var email = $("#email").val();

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success-cstm mx-2",
                cancelButton: "btn btn-danger-cstm mx-2",
            },
            buttonsStyling: false,
        });

        swalWithBootstrapButtons
            .fire({
                title: "<h5>Are you sure you want to process?</h5>",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes",
                cancelButtonText: "No",
                reverseButtons: false,
            })
            .then((result) => {
                if (result.isConfirmed) {

                    console.log('tes');

                    var formsendreset = new FormData();

                    formsendreset.append('email', email);

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: API_URL + "api/auth/send-password-reset",
                        type: 'post',
                        data: formsendreset,
                        contentType: false,
                        processData: false,
                        beforeSend: function() {
                            $("#main-loader").show();
                        },
                        success: function(res) {
                            if (res['success'] == true) {
                                swalWithBootstrapButtons.fire(
                                    "success",
                                    "check your email for reset password link",
                                    "success"
                                );
                            } else {
                                swalWithBootstrapButtons.fire(
                                    "error",
                                    res['message'],
                                    "error"
                                );
                            }
                        },
                        complete: function(data) {
                            $("#main-loader").hide();
                            if (data.status != 200) {
                                Swal.fire(
                                    "something wrong",
                                    "please contact Beazy support!",
                                    "error"
                                );
                            }
                        }
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire(
                        "cancelled",
                        "Your request cancelled :)",
                        "error"
                    );
                }
            });
    }
</script>
<!-- JS Table -->
<script src="{{ asset('js/table/main.js') }}"></script>
<script src="{{ asset('js/table/popper.min.js') }}"></script>

<!-- Sweet Alert JS -->
<script src="{{ asset('js/plugins/sweetalert.min.js') }}"></script>

<!-- Core JS Files -->
<script src="{{ asset('js/core/popper.min.js') }}"></script>
<script src="{{ asset('js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('js/plugins/smooth-scrollbar.min.js') }}"></script>

<!-- Animation Selected -->
<script src="{{ asset('js/plugins/choices.min.js') }}"></script>

<!-- Custom javascript-->
<script src="{{ asset('js/core-javascript.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }

    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
<!-- Github buttons -->
{{-- <script async defer src="https://buttons.github.io/buttons.js"></script> --}}
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
{{-- <script src="{{ asset('js/soft-ui-dashboard.min.js?v=1.0.9') }}"></script> --}}

</html>
