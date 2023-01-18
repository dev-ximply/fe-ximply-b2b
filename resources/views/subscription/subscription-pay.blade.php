<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

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

    <div class="container">
        <div class="row justify-content-center mt-1">
            <div class="col-md-8 p-3 rounded-sm" style="background: white">
                <div class="mb-4">
                    <div class="subscription">
                        <h4 style="color: black">Subscription</h4>
                    </div>
                </div>
                <div class="premium_account" style="">
                    <div class="d-flex justify-content-between">
                        <span>Premium Individual <p style="color: black;">1
                                Pro Account </p></span>
                        <span style="text-align: right">1 Month <p style="color: black;">Only
                                Rp. 25.000,00</p></span>
                    </div>
                </div>
                <div class="promo d-flex align-content-center justify-content-between my-2 pt-2 px-2"
                    style="background:#19194b; border-radius:5px">
                    <label style="color: white">Start Today</label>
                    <label style="color: white">Rp. 25.000,00 for 1 Month</label>
                </div>
                <div class="listPromo">
                    <ul style="color: #000; font-size:14px">
                        <li>
                            Start Price Rp. 25.000/Month.
                        </li>
                        <li>
                            You will get 40 pages Automatic Scan Receipt.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row justify-content-center my-0 py-0">
            <div class="col-md-8 p-3 bg-white rounded-sm">
                <div class="list-group" style="max-height: 300px; overflow-y:auto">
                    @php
                        $iterate = 0;
                    @endphp
                    @foreach ($data['list_channel'] as $payment_channel)
                        @php
                            $iterate = $iterate + 1;
                        @endphp
                        <div class="list-group-item list-group-item-action mb-2 rounded"
                            style="border: 1px solid rgb(212, 212, 212)">
                            <div class="form-check">
                                <input
                                    onchange="get_channel({{ $payment_channel->pg_code }}, '{{ $payment_channel->pg_name }}')"
                                    class="form-check-input" type="radio" name="payment_channel"
                                    id="payment_channel{{ $iterate }}" value="{{ $payment_channel->pg_code }}">
                                <label class="form-check-label fw-bolder" for="payment_channel{{ $iterate }}"
                                    style="width: 100%">
                                    {{ $payment_channel->pg_name }}
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-8 bg-white rounded-sm p-3" id="show_submit_detail" style="display: none">
                <div class="p-3" style="background-color: rgb(230, 230,230)">
                    <div class="text-center mb-3" style="color: black">
                        you choose <span id="channel_name" class="fw-bolder">nan!</span> payment
                        <br>
                        This action will redirect to payment information page for finish the payment.
                    </div>
                    <form action="{{ route('post_payment') }}" method="post">
                        @csrf
                        <input type="text" name="user_id" value="{{ Auth::user()['id'] }}" hidden>
                        <input type="text" name="currency" value="idr" hidden>
                        <input type="text" name="total_amount" value="25000" hidden>
                        <input type="text" name="object_type" value="subscription" hidden>
                        <input type="text" name="object_id" value="10001" hidden>
                        <input type="text" name="payment_channel" id="post_channel" hidden>
                        <div class="text-center">
                            <input type="submit" class="btn text-white py-2 px-3"
                                style="min-width:90px; background-color: #19194b; border-radius:30px; border:none"
                                value="Continue Payment">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/core/popper.min.js') }}"></script>
    <script src="{{ asset('js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/soft-ui-dashboard.min.js?v=1.0.9') }}"></script>
</body>

<script>
    function get_channel(code, channel_name) {
        document.getElementById("post_channel").value = code;
        document.getElementById("show_submit_detail").style.display = "none";
        document.getElementById("show_submit_detail").style.display = "block";
        document.getElementById("channel_name").innerHTML = channel_name;
    }
</script>

</html>
