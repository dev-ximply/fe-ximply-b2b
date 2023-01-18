@extends('layouts.main')

@section('container')
    <style>
        * {
            /* font-family: 'Roboto', sans-serif; */
            font-family: 'Poppins', sans-serif;
        }

        .coloumn__info {
            border: 1px solid #ffffff;
            box-shadow: 0px 10px 5px 0px rgba(0, 0, 0, 0.09);
            -webkit-box-shadow: 0px 10px 5px 0px rgba(0, 0, 0, 0.09);
            -moz-box-shadow: 0px 10px 5px 0px rgba(0, 0, 0, 0.09);
            border-radius: 5px;
            background-color: #ffffff;
            margin: 10px 0;
            padding: 5px;
            color: black;
            height: 150px;
            max-height: 15em;
        }

        .coloumn__info p {
            color: black;
            font-size: 9px;
        }

        .coloumn__info label {
            color: black;
            font-size: 20px;
        }

        .coloumn__card {
            background-color: #19194b;
            margin: 10px 0;
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0px 10px 5px 0px rgba(0, 0, 0, 0.09);
            -webkit-box-shadow: 0px 10px 5px 0px rgba(0, 0, 0, 0.09);
            -moz-box-shadow: 0px 10px 5px 0px rgba(0, 0, 0, 0.09);
            height: 100%;
            max-height: 14em;
        }

        .coloumn__expense {
            border: 1px solid #ffffff;
            box-shadow: 0px 10px 5px 0px rgba(0, 0, 0, 0.09);
            -webkit-box-shadow: 0px 10px 5px 0px rgba(0, 0, 0, 0.09);
            -moz-box-shadow: 0px 10px 5px 0px rgba(0, 0, 0, 0.09);
            border-radius: 5px;
            background-color: #ffffff;
            margin: 10px 0;
            padding: 20px;
            color: black;
            height: 100%;
            min-height: 10em;
        }

        .coloumn__expense__category {
            border: 1px solid #ffffff;
            box-shadow: 0px 10px 5px 0px rgba(0, 0, 0, 0.09);
            -webkit-box-shadow: 0px 10px 5px 0px rgba(0, 0, 0, 0.09);
            -moz-box-shadow: 0px 10px 5px 0px rgba(0, 0, 0, 0.09);
            border-radius: 5px;
            background-color: #ffffff;
            margin: 10px 0;
            padding: 20px;
            color: black;
            height: 100%;
            min-height: 10em;
        }

        #expenses {
            height: 100%;
            min-height: 10em;
        }

        .coloumn__recent__expense {
            background-color: #ffffff;
            margin: 10px 0;
            padding: 20px;
            border-radius: 10px;
            color: black;
            box-shadow: 0px 10px 5px 0px rgba(0, 0, 0, 0.09);
            -webkit-box-shadow: 0px 10px 5px 0px rgba(0, 0, 0, 0.09);
            -moz-box-shadow: 0px 10px 5px 0px rgba(0, 0, 0, 0.09);
            height: 100%;
            min-height: 10em;

        }

        .coloumn__recent__expense p {
            color: black;
            font-weight: 700;
            font-size: 15px;
        }

        .coloumn__quick__access {
            background-color: #ffffff;
            margin: 10px 0;
            padding: 20px;
            border-radius: 10px;
            color: black;
            box-shadow: 0px 10px 5px 0px rgba(0, 0, 0, 0.09);
            -webkit-box-shadow: 0px 10px 5px 0px rgba(0, 0, 0, 0.09);
            -moz-box-shadow: 0px 10px 5px 0px rgba(0, 0, 0, 0.09);
        }

        .coloumn__quick__access p {
            color: black;
            font-weight: 700;
        }
    </style>


    <div class="modal" tabindex="-1" id="modalExpenses">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Expense</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-center align-items-center flex-column text-center">

                        <a class="text-dark" href="#" data-bs-toggle="modal" data-bs-target="#manualForm"
                            onclick="handlingModalForm(false)">
                            <span class="" style="background: #191a4d;border-radius:50%;">
                                <div class="d-flex align-items-center" id="ava-upload-button-1">
                                    <span class="overflow-hidden d-flex align-items-center justify-content-center"
                                        style="border-radius: 50%;background: #191a4d; width:20px; height:20px">
                                        <i class="fa-solid fa-pen-to-square text-white p-1" style=""></i>
                                    </span>
                                    &nbsp;<span id="ava-pic-1" class="text-dark">Manual Form</span>
                                </div>
                        </a>
                        <a class="text-dark" href="#" data-bs-toggle="modal" data-bs-target="#manualForm"
                            onclick="handlingModalForm(true)">
                            <span class="" style="background: #191a4d;border-radius:50%;">
                                <div class="d-flex align-items-center" id="ava-upload-button-2">
                                    <span class="overflow-hidden d-flex align-items-center justify-content-center"
                                        style="border-radius: 50%;background: #191a4d; width:20px; height:20px">
                                        <i class="fa-solid fa-receipt text-white "></i>
                                    </span>
                                    &nbsp;<span id="ava-pic-2" class="text-dark">Scan Receipt</span>
                                </div>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-5">
        {{-- quick accesss --}}
        <div class="col-md d-md-none d-block">
            <div class="coloumn__quick__access">
                <p>Quick Access</p>
                <div class="d-flex justify-content-between">
                    <a href="" class="" type="button" data-bs-toggle="modal" data-bs-target="#modalExpenses"
                        aria-controls="new-expense-form" id="myBtn">
                        {{-- <a href="" class="" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> --}}
                        <div class="col-lg-3 col-md-3 col-sm-3 mb-1 mx-2 py-1" style="cursor:pointer">
                            <div class="icon icon-shape  shadow text-center border-radius-md"
                                style="min-height: 65px; max-height: 65px; min-width: 80px; max-width: 80px;background-color:#19194b">
                                <i class="ni ni-bag-17 text-lg opacity-10" aria-hidden="true"></i>
                                <div class="mt-1">
                                    <span class="text-white" style="font-size: 10px">New&nbsp;Expenses</span>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="" class="" data-bs-toggle="modal" data-bs-target="#topUp">
                        {{-- <a href="" class="" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> --}}
                        <div class="col-lg-3 col-md-3 col-sm-3 mb-1 mx-2 py-1" style="cursor:pointer">
                            <div class="icon icon-shape shadow text-center border-radius-md"
                                style="min-height: 65px; max-height: 65px; min-width: 80px; max-width: 80px;background-color:#19194b">
                                <i class="ni ni-credit-card text-lg opacity-10" aria-hidden="true"></i>
                                <div class="mt-1">
                                    <span class="text-white" style="font-size: 10px">Top&nbsp;Up</span>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="">
                        <div class="col-lg-3 col-md-3 col-sm-3 mb-1 mx-2 py-1" style="cursor:pointer">
                            <div class="icon icon-shape bg-gradient-secondary-cstm shadow text-center border-radius-md"
                                style="min-height: 65px; max-height: 65px; min-width: 80px; max-width: 80px;">
                                <i class="ni ni-fat-add text-lg opacity-10" aria-hidden="true"></i>
                                <div class="mt-1">
                                    <span class="text-white" style="font-size: 10px">Add</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        {{-- end quick access --}}

        {{-- card --}}
        {{-- <div class="col-md d-block d-md-none mb-3">
            <div class="coloumn__card pb-2">
                <label class="d-flex justify-content-end">
                    <select name="" id="" class="" style="background-color:#ff720c;color:white">
                        <option value="">My Card </option>
                        <option value="">Debit</option>
                        <option value="">Credit</option>
                    </select>
                </label>
                <div class="image_card mb-2">
                    <img src="{{ asset('img/logos/logo-new/logo-company-white.png') }}" style="width: 30px" alt="">
                </div>
                <span class="text-white">Balance <p class="text-white">
                        {{ number_format($data['data_expenses']->remain_limit, 2) }}</p></span>
                <div class="d-flex justify-content-between text-white">
                    <p class="text-white">Jack</p>
                    <p class="text-white">03/23</p>
                </div>
            </div>
        </div> --}}
        {{-- end card --}}
        <div class="col-md-8 mb-3">
            <div class="row">
                <div class="col-md-5">
                    <div class="coloumn__card">
                        <label class="d-flex justify-content-end" style="color: #ffffff">
                            {{-- <select name="" id="" class=""
                                style="background-color:#ff720c;color:white">
                                <option value="">My Card </option>
                                <option value="">Debit</option>
                                <option value="">Credit</option>
                            </select> --}}
                            My Card
                        </label>
                        <div class="image_card mb-2">
                            <img src="{{ asset('img/logos/logo-new/logo-company-white.png') }}" style="width: 30px"
                                alt="">
                        </div>
                        <span class="text-white">Balance <p class="text-white">
                                {{ number_format($data['data_expenses']->remain_limit, 2) }}</p></span>
                        <div class="d-flex justify-content-between text-white">
                            <p class="text-white">Jack</p>
                            <p class="text-white">03/23</p>
                        </div>
                    </div>
                </div>
                <div class="col-md row pt-0">
                    {{-- <div class="col-md row"> --}}
                    <div class="col-md w-100">
                        <div class="coloumn__info text-center pt-2  pb-0">
                            <span style="font-weight: 600; font-size:10px;">Remain Budget <p>(Remain Expense)</p></span>
                            <span style="font-size: 10px">from <span
                                    style="font-weight: 700">{{ number_format($data['data_expenses']->assign_limit, 2) }}</span></span>
                            <hr style="border: 2px solid #000000;margin-top:0">
                            <label class="text-center"
                                style="font-weight: 700; font-size:14px">{{ number_format($data['data_expenses']->remain_limit, 2) }}</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="coloumn__info text-center pt-2  pb-0">
                            <span style="font-weight: 600; font-size:10px">Budget Spending <p>Amount Spending</p></span>
                            {{-- <span style="font-size: 15px">from <span style="font-weight: 700">10,000,000</span></span> --}}
                            <hr style="border: 2px solid #000000;margin-top:40px">
                            <label class="text-center"
                                style="font-size: 14px">{{ number_format($data['data_expenses']->budget_spending, 2) }}</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="coloumn__info text-center pt-2  pb-0">
                            <span style="font-weight: 600; font-size:10px">Used Expense <p>Limit has been used</p></span>

                            {{-- <span style="font-size: 15px">from <span style="font-weight: 700">10,000,000</span></span> --}}
                            <hr style="border: 2px solid #000000;margin-top:40px">
                            <label class="text-center"
                                style="font-size: 14px">{{ number_format($data['data_expenses']->used_limit, 2) }}</label>
                        </div>
                    </div>
                    {{-- </div> --}}
                    <div class="row justify-content-center mx-auto">
                        <div class="progress-wrapper bg-white shadow rounded">
                            <div class="progress-info">
                                <div class="progress-percentage">
                                    <span class="text-sm font-weight-bold">60%</span>
                                </div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="60"
                                    aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="row flex-column">
                <div class="col-md">
                    <div class="coloumn__expense ">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row">
                                <div class="icon icon-shape  shadow text-center border-radius-md" style="background: #19194b">
                                    <i class="fas fa-shopping-cart text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                                <div class="d-flex flex-column ms-2">
                                    <span style="font-size: 16px;color:black;font-weight:700">Expense</span>
                                    <span style="font-size: 16px;color:black;font-weight:700">
                                        {{ number_format($data['data_expenses']->used_limit, 2) }}</span>
                                </div>
                            </div>

                            <div class="row flex-column ms-auto">
                                <div class="col-md">
                                    <input type="date" class="mb-1" style="width: 130px">
                                    <select name="" id="" style="width: 130px">
                                        <option value="">Week</option>
                                    </select>
                                </div>
                                <div class="col-md">
                                    <select name="" id="" style="width: 130px">
                                        <option value="">Category</option>
                                    </select>
                                    <select name="" id="" style="width: 130px">
                                        <option value="">Client</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="chart">
                            <figure class="highcharts-figure">
                                <div id="expenses"></div>
                            </figure>
                        </div>
                    </div>

                </div>
                <div class="col-md">
                    <div class="coloumn__expense__category ">
                        <p style="font-size: 16px;color:black;font-weight:700">Expense Category</p>
                        <div class="chart">
                            <figure class="highcharts-figure">
                                <div id=""></div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="row mb-3 flex-column">
                {{-- <div class="col-md d-none d-md-block">
                    <div class="coloumn__card pb-2">
                        <label class="d-flex justify-content-end">
                            <select name="" id="" class=""
                                style="background-color:#ff720c;color:white">
                                <option value="">My Card </option>
                                <option value="">Debit</option>
                                <option value="">Credit</option>
                            </select>
                        </label>
                        <div class="image_card mb-2">
                            <img src="{{ asset('img/logos/logo-new/logo-company-white.png') }}" style="width: 30px"
                                alt="">
                        </div>
                        <span class="text-white">Balance <p class="text-white">
                                {{ number_format($data['data_expenses']->remain_limit, 2) }}</p></span>
                        <div class="d-flex justify-content-between text-white">
                            <p class="text-white">Jack</p>
                            <p class="text-white">03/23</p>
                        </div>
                    </div>
                </div> --}}
                {{-- </div>
            <div class="row"> --}}
                <div class="col-md">
                    <div class="coloumn__quick__access d-md-block d-none">
                        <p>Quick Access</p>
                        <div class="d-flex justify-content-between" style="overflow-x: scroll">
                            <a href="" class="" type="button" data-bs-toggle="modal"
                                data-bs-target="#modalExpenses" aria-controls="new-expense-form" id="myBtn">
                                {{-- <a href="" class="" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> --}}
                                <div class="col-lg-3 col-md-3 col-sm-3 mb-1 mx-2 py-1" style="cursor:pointer">
                                    <div class="icon icon-shape  shadow text-center border-radius-md"
                                        style="min-height: 65px; max-height: 65px; min-width: 80px; max-width: 80px;background-color:#19194b">
                                        <i class="ni ni-bag-17 text-lg opacity-10" aria-hidden="true"></i>
                                        <div class="mt-1">
                                            <span class="text-white" style="font-size: 10px">New&nbsp;Expenses</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="" class="" data-bs-toggle="modal" data-bs-target="#topUp">
                                {{-- <a href="" class="" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> --}}
                                <div class="col-lg-3 col-md-3 col-sm-3 mb-1 mx-2 py-1" style="cursor:pointer">
                                    <div class="icon icon-shape shadow text-center border-radius-md"
                                        style="min-height: 65px; max-height: 65px; min-width: 80px; max-width: 80px;background-color:#19194b">
                                        <i class="ni ni-credit-card text-lg opacity-10" aria-hidden="true"></i>
                                        <div class="mt-1">
                                            <span class="text-white" style="font-size: 10px">Top&nbsp;Up</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="">
                                <div class="col-lg-3 col-md-3 col-sm-3 mb-1 mx-2 py-1" style="cursor:pointer">
                                    <div class="icon icon-shape bg-gradient-secondary-cstm shadow text-center border-radius-md"
                                        style="min-height: 65px; max-height: 65px; min-width: 80px; max-width: 80px;">
                                        <i class="ni ni-fat-add text-lg opacity-10" aria-hidden="true"></i>
                                        <div class="mt-1">
                                            <span class="text-white" style="font-size: 10px">Add</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="coloumn__recent__expense d-flex justify-content-between">
                        <p>Recent Expense</p>
                        <button class="btn text-white d-flex align-items-center justify-content-center"
                            style="background: #19194b;border-radius:10px;width:65px;height:30px;font-size:13px">
                            <span style="font-size: 10px">
                                View&nbsp;All
                            </span>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        // expenses this month

        Highcharts.setOptions({
            lang: {
                thousandsSep: ','
            }
        });
        Highcharts.chart('expenses', {
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
                color: '#19194b'

                // tooltip: {
                //     valueSuffix: ' mm'
                // }


            }, {
                name: '',
                type: 'spline',
                data: [100000, 200000, 300000, 200000, 100000, 200000, 300000],
                color: '#000'

                // tooltip: {
                //     valueSuffix: '°C'
                // }
            }]
        });
    </script>
@endsection
