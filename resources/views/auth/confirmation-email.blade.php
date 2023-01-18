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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
</head>

<body>    
    <!-- Optional JavaScript; choose one of the two! -->
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="" style="width:470px ;">
                <div class="card px-2">
                    <div>
                        <img src="" alt="">
                    </div>
                    <div class="card-body">
                        <div class="text-center mb-3">
                            @if ($data['status'] == true)
                                <img src="{{ asset('img/icons/email-success.jpg') }}" alt="" width="120px">
                            @else
                                <img src="{{ asset('img/icons/email-failed.jpg') }}" alt="" width="120px">
                            @endif
                        </div>
                        <div class="text-center mb-3">
                            <h5 class="" style="font-weight:700">{{ $data['message'] }}</h5>
                            <span style="font-size:14px">Please log in.</span>
                        </div>
                        <div class="text-center">
                            <a id="href_controller" href="/" class="btn text-white w-100"
                                style="font-size:18px; font-weight:700; background-color: #0677BA;">Log In</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

<script>
    if(/Android/i.test(navigator.userAgent)){
        document.getElementById("href_controller").href = "intent:#Intent;scheme=customscheme;package=com.ximply.flutter_beazy;end";
    }
</script>

</html>
