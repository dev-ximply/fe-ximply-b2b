<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

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

        body {
            background: #f1f5f9;
        }

        .container-fluid {
            background: #f1f5f9;
        }

        .image_rounded {
            border-radius: 50%;
            background-color: white;
            border: 5px solid #f1f5f9;
            position: absolute;
            top: 0px;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .image_rounded img {
            width: 100px;
            height: 80px;
            padding: 20px;
        }

        label {
            font-size: 16px;
            font-weight: 600;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-sm bg-light navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('img/logos/logo-new/logo-companyy.png') }}" class="navbar-brand-img" alt="main_logo"
                    width="50px">
            </a>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row justify-content-center align-items-center h-100 vh-100">
            <div class="col-md-4 bg-white  position-relative shadow" style="border-top: 5px solid #19194b">
                <div class="text-center image_rounded ">
                    <img src="{{ asset('img/logos/logo-new/logo-companyy.png') }}" alt="">
                </div>
                <div class="d-flex flex-column w-100 p-3">
                    <div class="text-center mt-5 ">
                        <p style="font-size:20px; font-weight:600">{{ $data['payment']->payment_status }}</p>
                    </div>
                    <div class="d-flex flex-column flex-md-row">
                        <div class="w-100 border py-2 px-3">
                            <p>Reference Number</p>
                            <label>{{ $data['payment']->payment_code }}</label>
                        </div>
                        <div class="w-100 border py-2 px-3">
                            <p>Date</p>
                            <label>{{ $data['payment']->bill_date }}</label>
                        </div>
                    </div>
                    <div class="d-flex flex-column flex-md-row">
                        <div class="w-100 py-2 border px-3">
                            <p>Customer Name</p>
                            <label>{{ $data['payment']->full_name }}</label>
                        </div>
                        <div class="w-100 border py-2 px-3">
                            <p>Number Phone</p>
                            <label>{{ $data['payment']->phone_number }}</label>
                        </div>
                    </div>
                    <div class="d-flex flex-column flex-md-row">
                        <div class="w-100 py-2 px-3 border ">
                            <p>Total Bill</p>
                            <label>Rp {{ number_format($data['payment']->total_amount, 2) }}</label>
                        </div>
                    </div>
                    <div class="d-flex flex-column flex-md-row">
                        <div class="w-100 border py-2 px-3">
                            <p>Transaction Status</p>
                            <label>{{ $data['payment']->payment_status }}</label>
                        </div>
                    </div>
                    @if ($data['payment']->payment_status_class == 'not-paid')
                        <a class="btn w-100 mb-0 text-white mt-2" style="background-color: #191a4d"
                            href="{{ $data['payment']->faspay_redirect }}" target="_blank">How&nbsp;To&nbsp;Pay</a>
                        <form action="{{ route('cancel_payment') }}" method="post">
                            @csrf
                            <input type="text" name="payment_code" value="{{ $data['payment']->payment_code }}"
                                hidden>
                            <input type="submit" class="btn w-100 mb-0 text-white mt-2"
                                style="background-color: #D42A34" value="Cancel&nbsp;Payment">
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

</body>

</html>
