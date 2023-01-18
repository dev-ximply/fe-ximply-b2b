<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <meta http-equiv="X-Frame-Options" content="*"> --}}

    <link id="pagestyle" href="{{ asset('css/soft-ui-dashboard.css?v=1.0.9') }}" rel="stylesheet" />
    <script src="{{ asset('js/plugins/jquery-3.6.1.min.js') }}"></script>

    {{-- font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200&display=swap"
        rel="stylesheet">

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/5c2c5b6638.js" crossorigin="anonymous"></script>
    <script src="{{ asset('fontawesome-kit.js') }}" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <link href="{{ asset('css/nucleo-svg.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/nucleo-icons.css') }}" rel="stylesheet">
    <title>{{ $title }}</title>
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>

    <input type="text" id="user_id" value="{{ Auth::user()['id'] }}" hidden>

    <nav class="navbar navbar-expand-sm bg-light navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('img/logos/logo-new/logo-companyy.png') }}" class="navbar-brand-img" alt="main_logo"
                    width="50px">
            </a>
        </div>
    </nav>

    {{-- <div class="container"> --}}
        <iframe
            src="https://debit-sandbox.faspay.co.id/pws/100003/0830000010100000/e4005965b1ad61b14e263a636269101349698296?trx_id=3509240288271870&merchant_id=35092&bill_no=001672710889"
            title="description"></iframe>
    {{-- </div> --}}

    <script src="{{ asset('js/core/popper.min.js') }}"></script>
    <script src="{{ asset('js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/soft-ui-dashboard.min.js?v=1.0.9') }}"></script>
</body>

</html>
