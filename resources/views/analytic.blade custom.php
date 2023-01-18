<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{-- <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/logos/logo-company-sq.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/logos/logo-company-sq.png') }}"> --}}

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
    {{-- 
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" /> --}}

    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0/dist/chartjs-plugin-datalabels.min.js">
    </script>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="http://code.highcharts.com/highcharts-more.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>

    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

    {{-- card slider --}}
    <script src="https://kenwheeler.github.io/slick/slick/slick.js"></script>
    <script src="{{ asset('js/js-image-zoom.js') }}"></script>


    {{-- voucher --}}
    <link rel="stylesheet" href="{{ asset('js/splide-4.1.3/dist/css/splide.min.css') }}">
    <script src="{{ asset('js/splide-4.1.3/dist/js/splide.min.js') }}"></script>

    {{-- GLOBAL VARIABEL --}}
    <script src="{{ asset('js/env-javascript.js') }}"></script>


    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>


    <style>
        #expensesClient {
            height: 100%;
            min-height: 11em;
        }

        #topFiveMembers {
            height: 100%;
            min-height: 11em;
        }

        #department {
            height: 100%;
            min-height: 11em;
        }

        #client {
            height: 100%;
            min-height: 11em;
        }

        #cardReimburse {
            height: 100%;
            min-height: 11em;
        }

        .e_client {
            border-radius: 5px;
            width: 115px !important;
            padding: 2px 10px;
            border: 1px solid gray;
            font-size: 12px;

        }

        .e_department {
            border-radius: 5px;
            width: 115px !important;
            padding: 2px 10px;
            border: 1px solid gray;
            font-size: 12px;
        }



        option {
            width: 190px !important;
            padding: 5px 20px;
            background: rgb(255, 255, 255);
            border-radius: 10px !important;
        }


        /* #fullscreen{
            width: 100%;
            height: 500px;
        } */

        /* :fullscreen {
            background-color: yellow;
            box-sizing: border-box;
            height:200px !important;
        } */
        body {
            margin: 0;
            font-family: "Lato", sans-serif;
        }

        .sidebar {
            margin: 0;
            padding: 0;
            width: 200px;
            background-color: #19194b;
            position: fixed;
            height: 100%;
            overflow: auto;

        }

        .sidebar p {
            color: white;
        }

        .sidebar a {
            display: block;
            color: black;
            padding: 16px;
            text-decoration: none;
            justify-content: center;
        }

        .sidebar a.active {
            background-color: #04AA6D;
            color: white;
        }

        /* .sidebar a:hover:not(.active) {
            background-color: #ff720c;
            color: white;
        } */

        .sidebar .side_hover:hover {
            background: #ff720c;
        }

        div.content {
            margin-left: 200px;
            padding: 1px 16px;
            height: 100%;
            min-height: 100vh;
        }

        @media screen and (min-width: 401px) and (max-width: 438px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .sidebar a {
                float: left;
            }

            .title__side {
                font-size: 11px !important;
            }

            div.content {
                margin-left: 0;
            }
        }

        @media screen and (min-width: 401px) and (max-width: 438px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .sidebar a {
                float: left;
                width: 100%;
            }

            .title__side {
                font-size: 11px !important;
            }

            div.content {
                margin-left: 0;
            }
        }

        @media screen and (min-width: 469px) and (max-width: 499px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .sidebar a {
                float: left;
                width: 100%;
            }

            .title__side {
                font-size: 13px !important;
            }

            div.content {
                margin-left: 0;
            }
        }

        @media screen and (min-width: 469px) and (max-width: 530px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .sidebar a {
                float: left;
                width: 100%;
            }

            .title__side {
                font-size: 14px !important;
            }

            div.content {
                margin-left: 0;
            }
        }

        @media screen and (min-width: 531px) and (max-width: 560px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .sidebar a {
                float: left;
                width: 100%;
            }

            .title__side {
                font-size: 15px !important;
            }

            div.content {
                margin-left: 0;
            }
        }

        @media screen and (min-width: 561px) and (max-width: 600px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .sidebar a {
                float: left;
                width: 100%;
            }

            .title__side {
                font-size: 10px !important;
                font-weight: 700;
            }

            div.content {
                margin-left: 0;
            }
        }

        @media screen and (min-width: 601px) and (max-width: 699px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .sidebar a {
                float: left;
                width: 100%;
            }

            .title__side {
                font-size: 10px !important;
                font-weight: 700;
            }

            div.content {
                margin-left: 0;
            }
        }

        @media screen and (max-width: 992px) and (max-width: 1114px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                text-align: center;
            }

            .sidebar a {
                float: left;
                width: 25%;
            }

            .title__side {
                font-size: 12px;
                font-weight: 600;
            }

            .number_side {
                font-weight: 500;
            }

            div.content {
                margin-left: 0;
            }
        }


        @media screen and (max-width: 400px) {
            .sidebar a {
                text-align: center;
                float: none;
                width: 100%;
            }

            .title__side {
                font-size: 15px;
                font-weight: 800;
            }
        }

        .vertical-center {
            margin: 0;
            position: absolute;
            top: 50%;
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
        }
    </style>
</head>

<body class="g-sidenav-show bg-gray-100">
    {{-- <div class="sidebar">
        <div class="row justify-content-center align-items-center text-center w-100">

            <a href="/" class="img">
                <img src="{{ asset('img/logos/logo-new/ximply-white.png') }}" alt="logo ximply" width="70">
            </a>
        </div>
        <hr>
        <div class="d-flex sticky-top">
            <a class="side_hover border-bottom text-center">
                <p class="title__side" style="color: white; font-weight:600">Expenses Transaction</p>
                <div>
                    <p class="number_side">125</p>
                </div>
            </a>
            <a class="side_hover border-bottom text-center">
                <p class="title__side" style="color: white; font-weight:600">Transaction Total</p>
                <div>
                    <p class="number_side">125</p>
                </div>
            </a>
            <a class="side_hover  border-bottom text-center">
                <p class="title__side" style="color: white; font-weight:600">Most Spending Category</p>
                <div>
                    <p class="number_side">125</p>
                </div>
            </a>
            <a class="side_hover border-bottom text-center">
                <p class="title__side" style="color: white; font-weight:600">Total Amount Client</p>
                <div>
                    <p class="number_side">125</p>
                </div>
            </a>
        </div>

    </div> --}}

    <div class="container-fluid overflow-hidden px-0">
        <div class="row vh-100 overflow-auto">
            <div class="col-12 col-sm-3 col-xl-2 px-sm-2 px-0 bg-dark d-flex sticky-top">
                <div
                    class="d-flex flex-sm-column flex-row flex-grow-1 align-items-center align-items-sm-start px-3 pt-2 text-white">
                    <a class=" border-bottom text-center">
                        <p class="title__side" style="color: white; font-weight:600">Expenses Transaction</p>
                        <div>
                            <p class="number_side">125</p>
                        </div>
                    </a>
                    <a class=" border-bottom text-center">
                        <p class="title__side" style="color: white; font-weight:600">Transaction Total</p>
                        <div>
                            <p class="number_side">125</p>
                        </div>
                    </a>
                    <a class="  border-bottom text-center">
                        <p class="title__side" style="color: white; font-weight:600">Most Spending Category</p>
                        <div>
                            <p class="number_side">125</p>
                        </div>
                    </a>
                    <a class=" border-bottom text-center">
                        <p class="title__side" style="color: white; font-weight:600">Total Amount Client</p>
                        <div>
                            <p class="number_side">125</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col d-flex flex-column h-sm-100">
                <main class="row overflow-auto">
                    <div class="col pt-4">
                        <div class="row justify-content-center" id="data-fullscreen">
                            <div class="" style="border-radius: 5px">
                                <div class="card-body">
                                    <div class="row  py-1">
                                        {{-- <div class="col-md-6 px-1">
                                            <div class="bg-white">
                                                <div class="chart" style="height: 200px">
                                                    <p class="px-3 py-2 text-sm text-capitalize font-weight-bold text-dark">Your
                                                        Expenses
                                                    </p>
                                                    <figure class="highcharts-figure" style="margin-top: 0px">
                                                        <div id="expenses" style=""></div>
                                                    </figure>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="col-md-6 px-1">
                                            <div class="bg-white">
                                                <div class="d-flex justify-content-between">
                                                    <p
                                                        class="px-3 py-2 text-sm text-capitalize font-weight-bold text-dark">
                                                        Expenses</p>
                                                </div>
                                                <div class="chart" style="height: 200px">
                                                    <figure class="highcharts-figure">
                                                        <div id="expenses" style="min-height:180px"></div>
                                                    </figure>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-6 px-1">
                                            <div class="bg-white">
                                                <div class="chart" style="height: 246px" id="myContainer">
                                                    <p class="px-3 py-2 text-sm text-capitalize font-weight-bold text-dark">
                                                        Category
                                                        Expenses</p>
                                                    <div class="d-flex justify-content-center">
                                                        <div style="width: 550px">
                                                            <figure class="highcharts-figure " style="">
                                                                <div id="expensesCategory"
                                                                    style="min-height: 240px; min-width: 300px; margin: 0 auto">
                                                                </div>
                                                                <div id="expensesCategory">
                                                                </div>
                                                            </figure>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="col-md-6 px-1">
                                            <div class="bg-white">
                                                <div class="d-flex justify-content-between">
                                                    <p
                                                        class="px-3 py-2 text-sm text-capitalize font-weight-bold text-dark">
                                                        Expenses Category</p>
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <div class="chart" style="height: 200px;width:500px">
                                                        <figure class="highcharts-figure">
                                                            <div id="expensesCategory" style="min-height:180px"></div>
                                                        </figure>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row py-1">
                                        <div class="col-md-6 px-1">
                                            <div class="bg-white">
                                                <div class="d-flex justify-content-between">
                                                    <p
                                                        class="px-3 py-2 text-sm text-capitalize font-weight-bold text-dark">
                                                        Expenses Client</p>
                                                    <div class="text-end px-2 py-2">
                                                        <select class="e_client" name="" id=""
                                                            style="">
                                                            <option value="">Categories</option>
                                                        </select>
                                                        <select class="e_client" name="" id=""
                                                            style="">
                                                            <option value="">Clients</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="chart" style="height: 200px">
                                                    <figure class="highcharts-figure">
                                                        <div id="expensesClient" style=" height:auto"></div>
                                                    </figure>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 px-1">
                                            <div class="bg-white">
                                                <p
                                                    class="px-3 py-2 text-sm text-capitalize font-weight-bold text-dark">
                                                    Top 5
                                                    Members
                                                </p>
                                                <div class="chart" style="height: 200px">
                                                    <figure class="highcharts-figure" style="margin-top: 0px">
                                                        <div id="topFiveMembers" style=""></div>
                                                    </figure>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row py-1 mb-5">
                                        <div class="col-md-4 px-1">
                                            <div class="bg-white">
                                                <div class="d-flex justify-content-between">
                                                    <div class="py-2">
                                                        <p
                                                            class="px-3 text-sm text-capitalize font-weight-bold text-dark">
                                                            Department
                                                        </p>
                                                    </div>
                                                    <div class="px-2 py-2">
                                                        <select class="e_department" name="" id=""
                                                            style="">
                                                            <option value="">All</option>
                                                            <option value="">Sales</option>
                                                            <option value="">Human Resource</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="chart" style="height: 200px">
                                                    <figure class="highcharts-figure" style="margin-top: 0px">
                                                        <div id="department" style=""></div>
                                                    </figure>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 px-1">
                                            <div class="bg-white">
                                                <div class="d-flex justify-content-between">
                                                    <div class="py-2">
                                                        <p
                                                            class="px-3 text-sm text-capitalize font-weight-bold text-dark">
                                                            Client
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="chart" style="height: 200px">
                                                    <figure class="highcharts-figure" style="margin-top: 0px">
                                                        <div id="client" style=""></div>
                                                    </figure>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 px-1">
                                            <div class="bg-white">
                                                <div class="d-flex justify-content-between">
                                                    <div class="py-2">
                                                        <p
                                                            class="px-3 text-sm text-capitalize font-weight-bold text-dark">
                                                            Card or
                                                            Reimburse
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="chart" style="height: 200px">
                                                    <figure class="highcharts-figure" style="margin-top: 0px">
                                                        <div id="cardReimburse" style=""></div>
                                                    </figure>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-4">
                                            <div class="bg-white">
                                                <p class="px-3 text-sm text-capitalize font-weight-bold text-dark">Card or
                                                    Reimburse
                                                </p>
            
                                                <div class="chart">
                                                    <figure class="highcharts-figure">
                                                        <div id="cardReimburse"></div>
                                                    </figure>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="row bg-light py-4 mt-auto">
                    <div class="col"> Footer content here... </div>
                </footer>
            </div>
        </div>
    </div>

    {{-- <div class="content" style="background: rgb(251, 250, 250)">
        <div class="row justify-content-center py-5  vh-100 h-100">
            <input type="text" id="user_id" value="{{ Auth::user()['id'] }}" hidden>
            <div class="d-flex justify-content-between text-end">
                <input class=" btn d-flex align-items-center justify-content-center text-dark p-0"
                    style="height: 25px; width: 160px;background-color:#ffffff;border:1px solid #000000;color:white"
                    type="submit" id="btnFullScreen" name="btnFullScreen" value="Full Screen" />
                <button onclick="history.back()"
                    class="btn text-white d-flex align-items-center justify-content-center"
                    style="background: #19194b; border-radius:20px;border:1px solid #19194b; height:40px;width:100px">
                    Back
                </button>
            </div>
            <form action="" method="get">
                <div class="row mb-3">
                    <div class="d-flex col-md-6 flex-row">
                        <div class="col-md bg-white me-4 mb-2 w-100">
                            <div class="input-group">
                                <span for="" class="input-group-text z-index-1 font-weight-bold text-dark"
                                    id="basic-addon1"
                                    style="border-right: 1px solid #adadadad; color:black; font-size:11px;height:35px;border-top-left-radius:5px;border-bottom-left-radius:5px">From</span>
                                <input type="text" class="form-control px-2 text-dark" id="filter_start_date"
                                    name="filter_start_date"
                                    style="font-size:11px;height:35px; border-top-right-radius:5px !important;border-bottom-right-radius:5px !important">
                            </div>
                        </div>
                        <div class="col-md bg-white mb-2 w-100">
                            <div class="input-group">
                                <span for="" class="input-group-text z-index-1 font-weight-bold"
                                    style="border-right: 1px solid #adadadad; color:black; font-size:11px;height:35px;border-top-left-radius:5px;border-bottom-left-radius:5px">To</span>
                                <input type="text" class="form-control px-2" id="filter_end_date"
                                    name="filter_end_date"
                                    style="font-size:11px;height:35px; border-top-right-radius:5px !important;border-bottom-right-radius:5px !important">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <select name="filter_expense_type" id="filter_expense_type" class="form-select text-dark"
                            style="font-size:11px;line-height:16px !important;border-radius:5px !important">
                            <option value="" class="text-dark" selected>Expense Type</option>
                        </select>
                    </div>
                    <div class="col-md-2 mb-2 d-flex" style="">
                        <button type="submit" value="submit" style="line-height:16px; font-size:10px"
                            class="form-control text-bold" id="filter_button">
                            F&nbsp;I&nbsp;L&nbsp;T&nbsp;E&nbsp;R</button>
                    </div>
                </div>
            </form>
            <div class="row justify-content-center" id="data-fullscreen">
                <div class="" style="border-radius: 5px">
                    <div class="card-body">
                        <div class="row  py-1">
                            <div class="col-md-6 px-1">
                                <div class="bg-white">
                                    <div class="d-flex justify-content-between">
                                        <p class="px-3 py-2 text-sm text-capitalize font-weight-bold text-dark">
                                            Expenses</p>
                                    </div>
                                    <div class="chart" style="height: 200px">
                                        <figure class="highcharts-figure">
                                            <div id="expenses" style="min-height:180px"></div>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 px-1">
                                <div class="bg-white">
                                    <div class="d-flex justify-content-between">
                                        <p class="px-3 py-2 text-sm text-capitalize font-weight-bold text-dark">
                                            Expenses Category</p>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <div class="chart" style="height: 200px;width:500px">
                                            <figure class="highcharts-figure">
                                                <div id="expensesCategory" style="min-height:180px"></div>
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row py-1">
                            <div class="col-md-6 px-1">
                                <div class="bg-white">
                                    <div class="d-flex justify-content-between">
                                        <p class="px-3 py-2 text-sm text-capitalize font-weight-bold text-dark">
                                            Expenses Client</p>
                                        <div class="text-end px-2 py-2">
                                            <select class="e_client" name="" id="" style="">
                                                <option value="">Categories</option>
                                            </select>
                                            <select class="e_client" name="" id="" style="">
                                                <option value="">Clients</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="chart" style="height: 200px">
                                        <figure class="highcharts-figure">
                                            <div id="expensesClient" style=" height:auto"></div>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 px-1">
                                <div class="bg-white">
                                    <p class="px-3 py-2 text-sm text-capitalize font-weight-bold text-dark">Top 5
                                        Members
                                    </p>
                                    <div class="chart" style="height: 200px">
                                        <figure class="highcharts-figure" style="margin-top: 0px">
                                            <div id="topFiveMembers" style=""></div>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row py-1 mb-5">
                            <div class="col-md-4 px-1">
                                <div class="bg-white">
                                    <div class="d-flex justify-content-between">
                                        <div class="py-2">
                                            <p class="px-3 text-sm text-capitalize font-weight-bold text-dark">
                                                Department
                                            </p>
                                        </div>
                                        <div class="px-2 py-2">
                                            <select class="e_department" name="" id=""
                                                style="">
                                                <option value="">All</option>
                                                <option value="">Sales</option>
                                                <option value="">Human Resource</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="chart" style="height: 200px">
                                        <figure class="highcharts-figure" style="margin-top: 0px">
                                            <div id="department" style=""></div>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 px-1">
                                <div class="bg-white">
                                    <div class="d-flex justify-content-between">
                                        <div class="py-2">
                                            <p class="px-3 text-sm text-capitalize font-weight-bold text-dark">Client
                                            </p>
                                        </div>
                                    </div>
                                    <div class="chart" style="height: 200px">
                                        <figure class="highcharts-figure" style="margin-top: 0px">
                                            <div id="client" style=""></div>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 px-1">
                                <div class="bg-white">
                                    <div class="d-flex justify-content-between">
                                        <div class="py-2">
                                            <p class="px-3 text-sm text-capitalize font-weight-bold text-dark">Card or
                                                Reimburse
                                            </p>
                                        </div>
                                    </div>
                                    <div class="chart" style="height: 200px">
                                        <figure class="highcharts-figure" style="margin-top: 0px">
                                            <div id="cardReimburse" style=""></div>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> --}}









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
    <script src="{{ asset('js/soft-ui-dashboard.min.js?v=1.0.9') }}"></script>








    <script>
        // Full Screen
        $(document).ready(function() {
            //Btn Full Screen
            $("#btnFullScreen").click(function() {
                if ($(this).attr('data-fullscreen') === 'true') {
                    if (document.exitFullscreen) {
                        document.exitFullscreen();

                    } else if (document.mozCancelFullScreen) {
                        /* Firefox */
                        document.mozCancelFullScreen();

                    } else if (document.webkitExitFullscreen) {
                        /* Chrome, Safari and Opera */
                        document.webkitExitFullscreen();


                    } else if (document.msExitFullscreen) {
                        /* IE/Edge */

                        document.msExitFullscreen();

                    }
                    $(this).attr('data-fullscreen', '');
                    $(this).attr('value', 'Full Screen');
                } else {
                    var el = document.documentElement,
                        rfs = el.requestFullscreen ||
                        el.webkitRequestFullScreen ||
                        el.mozRequestFullScreen ||
                        el.msRequestFullscreen;

                    rfs.call(el);
                    $(this).attr('data-fullscreen', 'true');
                    $(this).attr('value', 'Exit Fullscreen');
                }
            });
        });
    </script>





    {{-- Expenses --}}
    <script>
        $(function() {
            $('#expenses').highcharts({
                chart: {
                    // backgroundColor: 'rgba(0,0,0,0)'
                },
                lang: {
                    thousandsSep: ','
                },
                title: {
                    text: '',
                    x: -20 //center
                },
                credits: {
                    enabled: false
                },

                subtitle: {
                    text: '',
                    x: -20
                },
                xAxis: {
                    categories: ['01/09', '02/09', '03/09', '04/09', '05/09', '06/09',
                        '07/09'
                    ]
                },
                yAxis: {
                    title: {
                        text: ''
                    },
                    plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }],

                },
                scrollbar: {
                    enabled: true
                },
                exporting: {
                    enabled: true,
                    buttons: {
                        contextButton: {
                            height: 20,
                            width: 20,
                            symbolSize: 12,
                            symbolX: 10,
                            symbolY: 10,
                            symbolStrokeWidth: 1
                        }
                    }
                },
                plotOptions: {
                    line: {
                        dataLabels: {
                            enabled: false
                        },
                        enableMouseTracking: false
                    },
                    series: {
                        showInLegend: false,
                    }

                },
                // tooltip: {
                //     valueSuffix: 'million'
                // },
                // legend: {
                //     layout: 'vertical',
                //     align: 'right',
                //     verticalAlign: 'middle',
                //     borderWidth: 0
                // },
                series: [{
                        type: 'spline',
                        name: 'Budget',
                        data: [700000, 600000, 500000, 100000, 200000, 100000, 400000]
                    },
                    // {
                    //     type: "arearange",
                    //     data: [
                    //         [3.9, 7.0],
                    //         [4.2, 6.9],
                    //         [5.7, 9.5],
                    //         [8.5, 14.5],
                    //         [11.9, 18.2],
                    //         [15.2, 21.5],
                    //         [17.0, 25.5],
                    //     ],

                    // }, 


                    {
                        type: 'spline',
                        name: 'Expenses',
                        data: [600000, 500000, 800000, 500000, 200000, 500000, 300000]
                    },
                    // {
                    //     name: 'Berlin',
                    //     data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
                    // }, 
                    // {
                    //     name: 'London',
                    //     data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
                    // }
                ]
            });
        });
    </script>

    {{-- Expenses Category --}}
    <script>
        $("document").ready(
            function() {
                var total = 0;
                $('#expensesCategory').highcharts({

                    lang: {
                        thousandsSep: ','
                    },

                    chart: {
                        type: 'pie',
                        // backgroundColor: 'rgba(0,0,0,0)'
                    },
                    credits: {
                        enabled: false
                    },
                    colors: [
                        '#563379', '#FF8CC3', '#EFE056', '#4BF2CA', '#8085e9', '#f15c80', '#C490EE',
                        // '#00526F', '#594266', '#cb6828', '#aaaaab', '#a89375'
                    ],
                    title: {
                        text: null
                    },
                    tooltip: {
                        enabled: true,
                        animation: true
                    },
                    plotOptions: {
                        pie: {
                            size: '100%',
                            allowPointSelect: true,
                            animation: true,
                            cursor: 'pointer',
                            showInLegend: true,
                            dataLabels: {
                                enabled: true,
                                distance: -30,
                                style: {
                                    color: 'white',
                                    fontSize: '0.75em'
                                },
                                formatter: function() {
                                    return this.percentage.toFixed(2) + '%';
                                }
                            }
                        }
                    },
                    exporting: {
                        enabled: true,
                        buttons: {
                            contextButton: {
                                height: 20,
                                width: 20,
                                symbolSize: 12,
                                symbolX: 10,
                                symbolY: 0,
                                // padding:20,
                                symbolStrokeWidth: 1
                            }
                        }
                    },
                    legend: {
                        enabled: ($('#myContainer').width() > 400),

                        // enabled: true,
                        // layout: 'vertical',
                        // align: 'right',
                        // width: 250,
                        // verticalAlign: 'top',
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'middle',
                        itemMarginTop: 0,
                        itemMarginBottom: 0,
                        itemMarginRight: 0,
                        borderWidth: 0,
                        useHTML: true,
                        labelFormatter: function() {
                            return '<div style="width:200px"><span style="float:left">' + this.name +
                                '</span><span style="float:right">' + this.y_label +
                                ' </span></div>';
                        },
                        title: {
                            text: '',
                            style: {
                                fontWeight: 'bold'
                            }
                        }
                    },
                    // responsive: {
                    //     rules: [{
                    //         condition: {
                    //             maxWidth: 324
                    //         },
                    //         chartOptions: {
                    //             legend: {
                    //                 align: 'center',
                    //                 verticalAlign: 'bottom',
                    //                 layout: 'horizontal'
                    //             }
                    //         }
                    //     }]
                    // },
                    series: [{
                        type: 'pie',
                        dataLabels: {

                        },
                        data: [{
                                'name': 'Entertain',
                                'y': 12.55,
                                'y_label': 300000
                            },
                            {
                                'name': 'Meal',
                                'y': 12.34,
                                'y_label': 200000
                            },
                            {
                                'name': 'Gift',
                                'y': 12.19,
                                'y_label': 100000
                            },
                            {
                                'name': 'Transport',
                                'y': 7.50,
                                'y_label': 300000
                            },
                            {
                                'name': 'Accomodation',
                                'y': 6.51,
                                'y_label': 100000
                            },
                            {
                                'name': 'Equipment',
                                'y': 5.59,
                                'y_label': 200000
                            },
                            {
                                'name': 'Online Purchase',
                                'y': 5.23,
                                'y_label': 300000
                            },

                        ]
                    }]
                });
            });
    </script>

    {{-- Expenses Client --}}
    <script>
        Highcharts.setOptions({
            lang: {
                thousandsSep: ','
            }
        });
        Highcharts.chart('expensesClient', {
            chart: {
                zoomType: 'xy',
                // backgroundColor:'rgba(255, 255, 255, 0.1)'
            },
            title: {
                text: '',
                align: 'left'
            },
            subtitle: {
                text: ''
            },
            xAxis: [{
                categories: ['01/09', '02/09', '03/09', '04/09', '05/09', '06/09',
                    '07/09'
                ],
                crosshair: true
            }],
            yAxis: [{ // Primary yAxis
                labels: {
                    // format: '{value}°C',
                    style: {
                        color: Highcharts.getOptions().colors[1]
                    }
                },
                title: {
                    text: '',
                    style: {
                        color: Highcharts.getOptions().colors[1]
                    }
                }
            }, { // Secondary yAxis
                title: {
                    text: '',
                    style: {
                        color: Highcharts.getOptions().colors[0]
                    }
                },
                labels: {
                    // format: '',
                    enabled: false,
                    style: {
                        color: Highcharts.getOptions().colors[0]
                    }
                },
                opposite: true
            }],
            tooltip: {
                shared: true
            },
            exporting: {
                enabled: false
            },
            credits: {
                enabled: false
            },

            legend: {
                enabled: false,
                align: 'left',
                x: 50,
                verticalAlign: 'top',
                y: 50,
                floating: true,
                backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || // theme
                    'rgba(255,255,255,0.25)'
            },
            series: [{
                name: '',
                type: 'column',
                yAxis: 1,
                data: [100000, 200000, 300000, 200000, 100000, 200000, 300000],
                color: '#7cb5ec'

                // tooltip: {
                //     valueSuffix: ' mm'
                // }


            }, {
                name: '',
                type: 'spline',
                data: [100000, 200000, 300000, 200000, 100000, 200000, 300000],
                color: '#434348'

                // tooltip: {
                //     valueSuffix: '°C'
                // }
            }]
        });
    </script>

    {{-- top 5 members --}}
    <script>
        //horizontal bar 
        Highcharts.chart('topFiveMembers', {
            chart: {
                type: 'bar',
                // backgroundColor: 'rgba(0,0,0,0)'

            },
            title: {
                text: ''
            },
            credits: {
                enabled: false
            },
            // subtitle: {
            //     text: 'Source: <a ' +
            //         'href="https://en.wikipedia.org/wiki/List_of_continents_and_continental_subregions_by_population"' +
            //         'target="_blank">Wikipedia.org</a>'
            // },
            xAxis: {
                categories: ['Robson', 'Alex', 'Donovan', 'Riko', 'Dea'],
                title: {
                    text: null
                },

            },
            yAxis: {
                min: 0,
                title: {
                    text: '',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                },
            },
            exporting: {
                enabled: true,
                buttons: {
                    contextButton: {
                        height: 20,
                        width: 20,
                        symbolSize: 12,
                        symbolX: 10,
                        symbolY: 10,
                        symbolStrokeWidth: 1
                    }
                }
            },
            // tooltip: {
            //     valueSuffix: ' millions'
            // },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                },
                series: {
                    showInLegend: false
                }
            },
            legend: {
                layout: 'horizontal',
                align: 'center',
                verticalAlign: 'bottom',
                x: 10,
                y: 0,
                // floating: true,
                borderWidth: 1,
                backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
                shadow: true
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Budget',
                data: [100000, 200000, 300000, 400000, 500000]
            }, {
                name: 'Expenses',
                data: [300000, 400000, 300000, 200000, 100000]
            }]
        });
    </script>


    {{-- Deprtement --}}
    <script>
        Highcharts.chart('department', {
            chart: {
                type: 'spline',
                // backgroundColor: 'rgba(0,0,0,0)'
            },
            title: {
                text: ''
            },
            credits: {
                enabled: false
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: ['01/09', '02/09', '03/09', '04/09', '05/09', '06/09', '07/09']
            },
            yAxis: {
                labels: {
                    // enabled:false,
                    format: '',
                    style: {
                        color: Highcharts.getOptions().colors[1]
                    }
                },
                title: {
                    text: ''
                }
            },
            exporting: {
                enabled: true,
                buttons: {
                    contextButton: {
                        height: 20,
                        width: 20,
                        symbolSize: 12,
                        symbolX: 10,
                        symbolY: 10,
                        symbolStrokeWidth: 1
                    }
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: false
                    },
                    enableMouseTracking: false
                },
                series: {
                    showInLegend: false,
                }
            },
            series: [{
                    name: 'Sales',
                    data: [100000, 200000, 100000, 300000, 100000, 2000000, 400000]
                }, {
                    name: 'Human Resource',
                    data: [400000, 300000, 200000, 400000, 100000, 500000, 600000]
                },
                {
                    name: 'Operation',
                    data: [300000, 600000, 700000, 400000, 100000, 200000, 100000]
                }
            ]
        });
    </script>

    {{-- Client --}}
    <script>
        //chart client
        Highcharts.chart('client', {
            lang: {
                thousandsSep: ','
            },
            chart: {
                type: 'bar',
                // backgroundColor: 'rgba(0,0,0,0)'
            },
            title: {
                text: ''
            },
            credits: {
                enabled: false
            },
            // subtitle: {
            //     text: 'Source: <a ' +
            //         'href="https://en.wikipedia.org/wiki/List_of_continents_and_continental_subregions_by_population"' +
            //         'target="_blank">Wikipedia.org</a>'
            // },
            xAxis: {
                categories: ['PT. ABC-1', 'PT. ABC-2', 'PT. ABC-3', 'PT. ABC-4', 'PT. ABC-5'],
                title: {
                    text: null
                },

            },
            yAxis: {
                min: 0,
                title: {
                    text: '',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                },
            },
            exporting: {
                enabled: true,
                buttons: {
                    contextButton: {
                        height: 20,
                        width: 20,
                        symbolSize: 12,
                        symbolX: 10,
                        symbolY: 10,
                        symbolStrokeWidth: 1
                    }
                }
            },
            // tooltip: {
            //     valueSuffix: ' millions'
            // },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                },
                series: {
                    showInLegend: false
                }
            },
            legend: {
                layout: 'horizontal',
                align: 'center',
                verticalAlign: 'bottom',
                x: 10,
                y: 0,
                // floating: true,
                borderWidth: 1,
                backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
                shadow: true
            },
            credits: {
                enabled: false
            },
            series: [{
                    name: 'Budget',
                    data: [100000, 300000, 200000, 400000, 500000]
                },
                // {
                //     name: 'Expenses',
                //     data: [814, 841, 3214, 526, 21]
                // }
            ]
        });
    </script>

    <script>
        Highcharts.chart('cardReimburse', {
            lang: {
                thousandsSep: ','
            },
            chart: {
                type: 'column',
                // backgroundColor: 'rgba(0,0,0,0)'
            },
            title: {
                text: ''
            },
            credits: {
                enabled: false
            },
            // subtitle: {
            //     text: 'Source: <a ' +
            //         'href="https://en.wikipedia.org/wiki/List_of_continents_and_continental_subregions_by_population"' +
            //         'target="_blank">Wikipedia.org</a>'
            // },
            xAxis: {
                // categories: ['Card', 'Reimburse', 'Donovan', 'Riko', 'Dea'],
                title: {
                    text: null
                },

            },
            yAxis: {
                min: 0,
                title: {
                    text: '',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                },
            },
            exporting: {
                enabled: true,
                buttons: {
                    contextButton: {
                        height: 20,
                        width: 20,
                        symbolSize: 12,
                        symbolX: 10,
                        symbolY: 10,
                        symbolStrokeWidth: 1
                    }
                }
            },
            tooltip: {
                valueSuffix: ' '
            },
            plotOptions: {
                column: {
                    dataLabels: {
                        enabled: true,
                        align: 'center',
                        verticalAlign: 'bottom',
                        x: 10,
                        y: 0,
                    }
                },
                series: {
                    showInLegend: false
                }
            },
            legend: {
                layout: 'horizontal',
                align: 'center',
                verticalAlign: 'bottom',
                x: 10,
                y: 0,
                // floating: true,
                borderWidth: 1,
                backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
                shadow: true
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Card',
                data: [100000, 200000, 300000, 200000, 300000]
            }, {
                name: 'Reimburse',
                data: [300000, 100000, 200000, 300000, 200000]
            }]
        });
    </script>

    {{-- datepicker --}}
    <script>
        jQuery(function($) {
            var from = $("#filter_start_date")
                .datepicker({
                    dateFormat: "yy-mm-dd",
                    changeMonth: true
                })
                .on("change", function() {
                    to.datepicker("option", "minDate", getDate(this));
                }),
                to = $("#filter_end_date").datepicker({
                    dateFormat: "yy-mm-dd",
                    changeMonth: true
                })
                .on("change", function() {
                    from.datepicker("option", "maxDate", getDate(this));
                });

            function getDate(element) {
                var date;
                var dateFormat = "yy-mm-dd";
                try {
                    date = $.datepicker.parseDate(dateFormat, element.value);
                } catch (error) {
                    date = null;
                }

                return date;
            }
        });
    </script>

</body>
<!-- The core Firebase JS SDK is always required and must be listed first
    -->
{{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> --}}
<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase.js"></script>

</html>
