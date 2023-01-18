@extends('layouts.main')

@section('container')
    <link rel="stylesheet" href="{{ asset('css/dashboard/dashboard.css') }}">
    @include('expenses.new-expense')
    @include('budget.modal-top-up-approval')

    <div class="modal" tabindex="-1" id="modalExpenses">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header" style="background: #19194b" >
                    <p class="modal-title text-white text-center" style="font-size: 15px;font-weight:600">New Expense</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                 
                    <div class="d-flex py-2 justify-content-center align-items-center flex-column text-center">
                        <a class="new_expense text-white bg-gradient-primary px-3 py-1 rounded mb-2" href="#"
                            data-bs-toggle="modal" data-bs-target="#manualForm" onclick="handlingModalForm(false)"
                            style="background: #19194b">
                            <span class="" style="background: #191a4d;border-radius:50%;">
                                <div class="d-flex align-items-center" id="ava-upload-button-1">
                                    <span class="overflow-hidden d-flex align-items-center justify-content-center"
                                        style="border-radius: 50%;background: #ffffff; width:30px; height:30px">
                                        <i class="fa-solid fa-pen-to-square p-1" style="color:#19194b"></i>
                                    </span>
                                    &nbsp;<span id="ava-pic-1" class="text-white">Manual Form</span>
                                </div>
                            </span>
                        </a>
                        <a class="new_expense text-white  px-3 py-1 rounded mb-2" href="#" data-bs-toggle="modal"
                            data-bs-target="#manualForm" onclick="handlingModalForm(true)" style="background: #19194b">
                            <span class="" style="background: #191a4d;border-radius:50%;">
                                <div class="d-flex align-items-center" id="ava-upload-button-2">
                                    <span class="overflow-hidden d-flex align-items-center justify-content-center"
                                        style="border-radius: 50%;background: #ffffff; width:30px; height:30px">
                                        <i class="fa-solid fa-receipt  " style="color: #19194b"></i>
                                    </span>
                                    &nbsp;<span id="ava-pic-2" class="text-white">Scan Receipt</span>
                                </div>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-5 flex-md-row flex-column">
        {{-- quick accesss --}}
        <div class="col-md d-md-none d-block">
            <div class="coloumn__quick__access">
                <p>Quick Access</p>
                <div class="d-flex justify-content-between" style="overflow-x: scroll;">
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

        {{-- end card --}}
        <div class="col-md-8 mb-3">
            <div class="row mb-3">
                <div class="col-md-5 mt-3">
                    <div class="coloumn__card">
                        <label class="d-flex justify-content-end" style="color: #ffffff">
                            My Card
                        </label>
                        <div class="image_card mb-2">
                            {{-- <img src="{{ asset('img/logos/logo-new/ximply-white.png') }}" style="width: 30px"
                                alt=""> --}}
                        </div>
                        <span class="text-white">Balance <p class="text-white">
                                {{ number_format($data['limit']['remain_limit'], 2) }}</p></span>
                        <div class="d-flex justify-content-between text-white">
                            <p class="text-white">Jack</p>
                            <p class="text-white">03/23</p>
                        </div>
                    </div>
                </div>

                <div class="col-md pt-0 mt-3">
                    <div class="row">
                        <div class="column_info  text-center   pb-0">
                            <div class="column_content_info card">
                                <span class="title__amount" style="font-weight: 600;">Remain Budget <p>(Remain Expense)
                                    </p>
                                </span>
                                <span id="form_number_format">from <span id="number_format" style="font-weight: 700">
                                        {{ number_format($data['limit']['assign_limit'], 2) }}</span></span>
                                <hr id="hr_remain" style="">
                                <p class="total_amount text-center" style="font-weight: 600;">
                                    {{ number_format($data['limit']['remain_limit'], 2) }}</p>
                            </div>
                        </div>
                        <div class="column_info text-center  pb-0">
                            <div class="column_content_info card">
                                <span class="title__amount" style="font-weight: 600;">Budget Spending <p>Amount Spending
                                    </p>
                                </span>
                                <hr id="hr_budget" style="">
                                <p class="total_amount text-center" style="font-weight:600">
                                    {{ number_format($data['limit']['budget_spending'], 2) }}</p>
                            </div>
                        </div>
                        <div class="column_info  text-center  pb-0">
                            <div class="column_content_info card">
                                <span class="title__amount" style="font-weight: 600;">Used Expense <p>Limit has been used
                                    </p>
                                </span>

                                <hr id="hr_used" style="">
                                <p class="total_amount text-center" style="font-weight:600">
                                    {{ number_format($data['limit']['used_limit'], 2) }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center mx-auto">
                        <div class="col-md progress-wrapper bg-white  rounded pb-2">
                            <div class="progress-info">
                                <div class="progress-percentage">
                                    <span class="text-xs font-weight-bold text-dark">60%</span>
                                </div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                                    aria-valuemax="100" style="width: 60%; background:#19194b"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row flex-column">
                <div class="col-md">
                    <div class="coloumn__expense ">
                        <form action="" method="get">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex flex-row">
                                    <div class="icon icon-shape  shadow text-center border-radius-md"
                                        style="background: #19194b">
                                        <i class="fas fa-shopping-cart text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                    <div class="d-flex flex-column ms-2">
                                        <span style="font-size: 16px;color:black;font-weight:400">Expenses</span>
                                        <span style="font-size: 16px;color:black;font-weight:700">
                                            {{ number_format($data['limit']['used_limit'], 2) }}</span>
                                    </div>
                                </div>
                                <div class="row flex-md-row flex-column ms-auto">
                                    <div class="col-md">
                                        <div class="input-group">
                                            <span for=""
                                                class="input-group-text z-index-1 font-weight-bold text-dark"
                                                id="basic-addon1"
                                                style="border-right: 1px solid #adadadad; color:black; font-size:9px;height:25px;border-top-left-radius:5px;border-bottom-left-radius:5px">From</span>
                                            <input type="date" class="form-control px-2 text-dark"
                                                id="filter_start_date" name="filter_start_date"
                                                style="font-size:11px;height:25px; border-top-right-radius:5px !important;border-bottom-right-radius:5px !important">
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="input-group">
                                            <span for="" class="input-group-text z-index-1 font-weight-bold"
                                                style="border-right: 1px solid #adadadad; color:black; font-size:9px;height:25px;border-top-left-radius:5px;border-bottom-left-radius:5px">To</span>
                                            <input type="date" class="form-control px-2" id="filter_end_date"
                                                name="filter_end_date"
                                                style="font-size:11px; height:25px; border-top-right-radius:5px !important;border-bottom-right-radius:5px !important">
                                        </div>
                                    </div>
                                    <div class="col-md mb-2" style="height:15px;">
                                        <select name="filter_expense_type" id="filter_expense_type"
                                            class="form-select text-dark"
                                            style="font-size:9px; line-height:10px !important;border-radius:5px !important; ">
                                            <option value="" class="text-dark" selected>Expense Type</option>
                                        </select>
                                    </div>
                                    <div class="col-md mb-2">
                                        <button type="submit" value="submit"
                                            style="line-height:10px; height:25px; font-size:9px"
                                            class="form-control text-bold" id="filter_button">
                                            F&nbsp;I&nbsp;L&nbsp;T&nbsp;E&nbsp;R</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="chart">
                            <figure class="highcharts-figure" style="margin-top: 0px">
                                <div id="expenses" style="min-height:220px"></div>
                            </figure>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="coloumn__expense__category ">
                        <p style="font-size: 16px;color:black;font-weight:500">Expense Category</p>
                        <div class="chart" id="myContainer">
                            <figure class="highcharts-figure " style="margin-top:-15px">
                                <div id="expensesCategory" style="min-height: 240px; min-width: 300px; margin: 0 auto">
                                </div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3 mt-3">
            <div class="row mb-3 flex-column">
                <div class="col-md mb-3">
                    <div class="coloumn__quick__access d-md-block d-none">
                        <p style="font-weight: 500; font-size:13px ; margin-top:-8px">Quick Access</p>
                        <div class="d-flex " style="overflow-x: scroll; margin-top:-8px">
                            <a href="" class="" type="button" data-bs-toggle="modal"
                                data-bs-target="#modalExpenses" aria-controls="new-expense-form" id="myBtn">
                                <div class="col-lg-3 col-md-3 col-sm-3 mb-1 mx-2 py-1" style="cursor:pointer">
                                    <div class="icon icon-shape  shadow text-center border-radius-md"
                                        style="min-height: 60px; max-height: 60px; min-width: 80px; max-width: 80px;background-color:#19194b">
                                        <i class="ni ni-bag-17 text-lg opacity-10" aria-hidden="true"></i>
                                        <div class="mt-1">
                                            <span class="text-white" style="font-size: 10px">New&nbsp;Expenses</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="" class="" data-bs-toggle="modal" data-bs-target="#topUp">
                                <div class="col-lg-3 col-md-3 col-sm-3 mb-1 mx-2 py-1" style="cursor:pointer">
                                    <div class="icon icon-shape shadow text-center border-radius-md"
                                        style="min-height: 60px; max-height: 60px; min-width: 80px; max-width: 80px;background-color:#19194b">
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
                                        style="min-height: 60px; max-height: 60px; min-width: 80px; max-width: 80px;">
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
                    <div class="card overflow-hidden" style="min-height: 150px; border-radius:5px">
                        <div class="card-body p-3">
                            <div class="d-flex flex-row">
                                <div class="me-auto">
                                    <span class=" mb-0 text-capitalize text-dark"
                                        style="font-size: 13px; font-weight:500">Voucher</span>
                                </div>
                                <div class="ms-auto">
                                    <span class="text-sm mb-0 text-capitalize font-weight-normal">
                                        <a href="/voucher">View All&nbsp;<i class="fa-solid fa-chevron-right"></i></a>
                                    </span>
                                </div>
                            </div>
                            <div class="mx-2" style="overflow-x: hidden">
                                <div id="image-slider" class="splide" aria-label="Beautiful Images">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            @foreach ($data['voucher'] as $voucher)
                                                <li class="splide__slide">
                                                    <img src="{{ env('STORAGE_URL') . $voucher->discount_picture }}"
                                                        class="" style="width: 12em" alt="">
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="coloumn__recent__expense " style="margin-top: 15px; height:400px;border-radius:5px">
                        <div class="d-flex justify-content-between">
                            <p style="font-weight: 500; font-size:13px">Recent Expense</p>
                            <div class="ms-auto">
                                <span class="text-sm mb-0 text-capitalize font-weight-normal">
                                    <a href="/expense">View All&nbsp;<i class="fa-solid fa-chevron-right"></i></a>
                                </span>
                            </div>
                        </div>
                        @php
                            $no = 0;
                        @endphp
                        <div class="table-responsive" style="max-height:300px; overflow-y:auto">
                            <table class="table">
                                <tbody>
                                    <tr class="text-start" style="font-size:12px;color:#000000">
                                        <th>No</th>
                                        <th>Expense</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                    </tr>
                                    @foreach ($data['recent_expenses'] as $recentExpenses)
                                        @php
                                            $no = $no + 1;
                                        @endphp
                                        @if ($no <= 10)
                                            <tr class="text-start" style="font-size:12px;color:#000000">
                                                <td>{{ $recentExpenses->merchant }}</td>
                                                <td>{{ $recentExpenses->category }}</td>
                                                <td class="fw-bold">Rp
                                                    {{ number_format($recentExpenses->total_amount, 2) }}</td>
                                                <td>{{ $recentExpenses->status }}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- OCR --}}
    <script>
        function getExpenseData(expense_id) {
            $.ajaxSetup({
                headers: {
                    "Authorization": "Bearer " + AUTH_TOKEN,
                    "Accept": "application/json"
                }
            });
            $.ajax({
                type: "GET",
                url: API_URL + "api/expense/list/single?expense_id=" + expense_id,
                success: function(res) {
                    if (res['success'] == true) {
                        var response = res['data'];
                        document.getElementById('detail_receipt_file').src = STORAGE_URL + response[
                            'receipt_picture_directory'];

                        document.getElementById('detail_date').value = response['receipt_date'];
                        document.getElementById('detail_merchant').value = response['merchant'];
                        document.getElementById('detail_total_amount').value = response['total_amount']
                            .toLocaleString();
                        document.getElementById('detail_location').value = response['location'];
                        document.getElementById('detail_category').value = response['category'];

                        $('#ex1').zoom();
                    } else {
                        Swal.fire('failed<br>Please contact Beazy support');
                    }
                },
                complete: function(data) {
                    if (data.status != 200) {
                        Swal.fire('failed<br>Please contact Beazy support');
                    }
                }
            });
        }

        function handlingModalForm(isScan = false) {
            if (isScan == true) {
                document.getElementById('scan-receipt-body').style.display = "block";
                document.getElementById('create-receipt-body').style.display = "none";
            } else {
                document.getElementById('scan-receipt-body').style.display = "none";
                document.getElementById('create-receipt-body').style.display = "block";
            }
        }

        //for delete
        if (document.querySelector(".delete")) {

            document.querySelector(".delete").addEventListener("click", function() {
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: "btn btn-success-cstm mx-2",
                        cancelButton: "btn btn-danger-cstm mx-2",
                    },
                    buttonsStyling: false,
                });

                swalWithBootstrapButtons
                    .fire({
                        title: "<h5>Are you sure want to process?</h5>",

                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Yes",
                        cancelButtonText: "No",
                        reverseButtons: false,
                    })
                    .then((result) => {
                        if (result.isConfirmed) {
                            swalWithBootstrapButtons.fire(
                                "Deleted!",
                                "Your request success.",
                                "success"
                            );
                        } else if (

                            result.dismiss === Swal.DismissReason.cancel
                        ) {
                            swalWithBootstrapButtons.fire(
                                "Cancelled",
                                "Your request cancelled :)",
                                "error"
                            );
                        }
                    });
            });
        }
    </script>

    {{-- slider --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new Splide('#image-slider', {
                type: 'loop',
                focus: 'center',
                autoWidth: true,
                autoplay: true,
                gap: 5,
                speed: 1500,
                perPage: 1,
            }).mount();
        });
    </script>

    <script>
        var FilterExpenseType = "";
        var FilterStartDate = "";
        var FilterEndDate = "";

        if (window.location.search) {
            const queryString = window.location.search;
            if (queryString != "" || queryString != null || queryString > 0) {
                const urlParams = new URLSearchParams(queryString);
                FilterExpenseType = urlParams.get('filter_expense_type');
                FilterStartDate = urlParams.get('filter_start_date');
                FilterEndDate = urlParams.get('filter_end_date');
            }
        }

        $.ajaxSetup({
            headers: {
                "Authorization": "Bearer " + AUTH_TOKEN,
                "Accept": "application/json"
            }
        });
        $.ajax({
            type: "GET",
            url: API_URL + "api/analytics/series/" + document.getElementById('user_id').value +
                "?expense_type=" + FilterExpenseType +
                "&start_date=" + FilterStartDate +
                "&end_date=" + FilterEndDate,
            success: function(res) {
                var time = [0];
                var total_amount = [0];

                if (res['success'] == true) {
                    time = [];
                    total_amount = [];
                    var i = 0;
                    for (const obj1 of res['data'].series) {
                        time[i] = obj1.time;
                        total_amount[i] = obj1.total_amount;
                        i++;
                    }
                } else {
                    // Swal.fire('failed<br>Please contact Beazy support');
                }

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
                        categories: time,
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
                        x: 80,
                        verticalAlign: 'top',
                        y: 80,
                        floating: true,
                        backgroundColor: Highcharts.defaultOptions.legend.backgroundColor ||
                            'rgba(255,255,255,0.25)'
                    },
                    series: [{
                        name: '',
                        type: 'column',
                        yAxis: 1,
                        data: total_amount,
                        color: '#ff720c'
                    }]
                });
            },
            complete: function(data) {
                if (data.status != 200) {
                    Swal.fire('failed<br>Please contact Beazy support');
                }
            }
        });


        $.ajaxSetup({
            headers: {
                "Authorization": "Bearer " + AUTH_TOKEN,
                "Accept": "application/json"
            }
        });
        $.ajax({
            type: "GET",
            url: API_URL + "api/analytics/pie/" + document.getElementById('user_id').value +
                "?expense_type=" + FilterExpenseType +
                "&start_date=" + FilterStartDate +
                "&end_date=" + FilterEndDate,
            success: function(res) {
                var arrayPie = [];
                var valuePie = {};
                valuePie['name'] = '';
                valuePie['y'] = 0;
                valuePie['y_label'] = 0;
                arrayPie[0] = valuePie;

                if (res['success'] == true) {
                    var arrayPie = [];
                    var i = 0;
                    for (const objs of res['data'].pie) {
                        var valuePie = {};
                        var expense_type = objs.expense_type;
                        var percentage = objs.percentage;
                        var total_amount = objs.total_amount;
                        valuePie['name'] = expense_type;
                        valuePie['y'] = total_amount;
                        valuePie['y_label'] = (total_amount).toLocaleString('en-US');
                        arrayPie[i] = valuePie;
                        i++;
                    }
                } else {
                    // Swal.fire('failed<br>Please contact Beazy support');
                }
                $("document").ready(
                    function() {
                        var total = 0;
                        $('#expensesCategory').highcharts({

                            lang: {
                                thousandsSep: ','
                            },

                            chart: {
                                type: 'pie'
                            },
                            credits: {
                                enabled: false
                            },
                            exporting: {
                                enabled: false
                            },
                            colors: [
                                '#191a4d', '#ff720c', '#563379', '#FF8CC3', '#EFE056',
                                '#4BF2CA', '#8085e9',
                                '#f15c80', '#C490EE',
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
                                            color: 'white'
                                        },
                                        formatter: function() {
                                            return this.percentage.toFixed(2) + '%';
                                        }
                                    }
                                }
                            },
                            legend: {
                                enabled: ($('#myContainer').width() > 500),
                                layout: 'vertical',
                                align: 'right',
                                verticalAlign: 'middle',
                                itemMarginTop: 0,
                                itemMarginBottom: 0,
                                itemMarginRight: 0,

                                borderWidth: 0,
                                useHTML: true,
                                labelFormatter: function() {
                                    return '<div style="width:200px"><span style="float:left">' +
                                        this.name +
                                        '</span><span style="float:right">' + this.y_label +
                                        '</span></div>';
                                },
                                title: {
                                    text: '',
                                    style: {
                                        fontWeight: 'bold'
                                    }
                                }
                            },
                            series: [{
                                type: 'pie',
                                dataLabels: {},
                                data: arrayPie,
                                name: "Amount"
                            }]
                        });
                    });
            },
            complete: function(data) {
                if (data.status != 200) {
                    Swal.fire('failed<br>Please contact Beazy support');
                }
            }
        });

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    "Authorization": "Bearer " + AUTH_TOKEN,
                    "Accept": "application/json"
                }
            });

            $.ajax({
                type: "GET",
                url: API_URL + "api/category/list/main?user_id=" + document.getElementById(
                    'user_id').value,
                success: function(res) {
                    if (res) {
                        var response = res['data'];
                        for (const obj of response) {
                            var CategoryId = obj.id;
                            var CategoryName = obj.category_name;
                            $("#filter_expense_type").append('<option value="' + CategoryName +
                                '">' + CategoryName + '</option>');
                        }
                    } else {
                        $("#filter_expense_type").empty();
                    }
                }
            });
        });
    </script>
@endsection
