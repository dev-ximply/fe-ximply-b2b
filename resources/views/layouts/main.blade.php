<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon/favicon-16x16.png') }}">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

    {{-- Separator NUmber --}}
    <script src="{{ asset('js/separator/easy-number-separator.js') }}"></script>

    {{-- highchart --}}
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

    {{-- card slider --}}
    <script src="https://kenwheeler.github.io/slick/slick/slick.js"></script>
    <script src="{{ asset('js/js-image-zoom.js') }}"></script>


    {{-- voucher --}}
    <link rel="stylesheet" href="{{ asset('js/splide-4.1.3/dist/css/splide.min.css') }}">
    <script src="{{ asset('js/splide-4.1.3/dist/js/splide.min.js') }}"></script>

    {{-- GLOBAL VARIABEL --}}
    <script src="{{ asset('js/env-javascript.js') }}"></script>
</head>

<body class="g-sidenav-show bg-gray-100" onload="startFCM()">

    @if (Auth::check())
        <input type="text" id="usr_id" value="{{ Auth::user()['id'] }}" hidden>
        <input type="text" id="AuthToken" value="{{ Session::get('AuthToken') }}" hidden>
        <input type="text" id="TenantCode" value="{{ Session::get('TenantCode') }}" hidden>
        <input type="text" id="config_api_url" value="{{ config('api.base_url') }}" hidden>
        <input type="text" id="config_storage_url" value="{{ config('storage.base_url') }}" hidden>
        <input type="text" id="admin_session" value="{{ Session::get('is_superadmin') }}" hidden>
        <script>
            const USR_ID = document.getElementById('usr_id').value;
            const AUTH_TOKEN = document.getElementById('AuthToken').value;
            const TENANT_CODE = document.getElementById('TenantCode').value;
            const API_URL = document.getElementById('config_api_url').value;
            const STORAGE_URL = document.getElementById('config_storage_url').value;
            const ADMIN_SESSION = document.getElementById('admin_session').value;
        </script>
    @else
        <script>
            const USR_ID = "";
            const AUTH_TOKEN = "";
            const TENANT_CODE = "";
            const API_URL = "";
            const STORAGE_URL = "";
            const ADMIN_SESSION = "";
        </script>
    @endif

    <div id="main-loader"
        style="display:none; text-align: center; z-index: 5000; position: absolute; width: 100%; top: 40%">
        <img height="100px" src="{{ asset('img/loader.gif') }}">
    </div>

    @include('partials.sidebar')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        @include('partials.navbar')
        <div class="container-fluid py-4" style="position:relative">
            <div style="min-height: 70vh; height:100%" class="mb-5 position-relative">
                @yield('container')
            </div>
            @include('partials.footer')
        </div>
    </main>
    @include('partials.rightside')






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
    <script src="{{ asset('js/soft-ui-dashboard.min.js?v=1.0.9') }}"></script>

</body>
<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase.js"></script>
<script>
    var firebaseConfig = {
        apiKey: "AIzaSyB-NPjLyqzu_ni0XXr4uktYBRNW5d7nnno",
        authDomain: "push-oneximply.firebaseapp.com",
        projectId: "push-oneximply",
        storageBucket: "push-oneximply.appspot.com",
        messagingSenderId: "253031193034",
        appId: "1:253031193034:web:2b816fe4600ed8f4955733",
        measurementId: "G-7Q1022E523"
    };
    firebase.initializeApp(firebaseConfig);
    var messaging = firebase.messaging();
    messaging.onMessage(function(payload) {
        const title = payload.notification.title;
        const options = {
            body: payload.notification.body,
            icon: payload.notification.icon,
        };
        new Notification(title, options);
    });

    function startFCM() {
        messaging
            .requestPermission()
            .then(function() {
                return messaging.getToken()
            })
            .then(function(response) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: API_URL +
                        'api/notification/fcm-token',
                    type: 'POST',
                    data: {
                        user_id: USR_ID,
                        device_token: response
                    },
                    dataType: 'JSON',
                    success: function(response) {
                        // console.log('success get token');
                    },
                    error: function(error) {
                        // console.log(error);
                    },
                });
            }).catch(function(error) {
                // alert(error);
            });
    }
</script>
@stack('jsBottom')

</html>
