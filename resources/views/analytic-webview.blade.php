<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon/favicon-16x16.png') }}">
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
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
</head>

<body>
    <input type="text" id="user_id" value="{{ $user_id }}" hidden>
    <div class="row">
        <div class="card">
            <div class="card-body">
                <form action="" method="get">
                    <div class="row mb-5">
                        <div class="d-flex col-md-7 flex-row">
                            <div class="col-md me-4 mb-2 w-100">
                                <div class="input-group">
                                    <span for="" class="input-group-text z-index-1 font-weight-bold text-dark"
                                        id="basic-addon1"
                                        style="border-right: 1px solid #adadadad; font-size:11px;height:35px;border-top-left-radius:5px;border-bottom-left-radius:5px">From</span>
                                    <input type="text" class="form-control px-2 text-dark" id="filter_start_date"
                                        name="filter_start_date"
                                        style="font-size:11px;height:35px; border-top-right-radius:5px !important;border-bottom-right-radius:5px !important">
                                </div>
                            </div>
                            <div class="col-md mb-2 w-100">
                                <div class="input-group">
                                    <span for="" class="input-group-text z-index-1 font-weight-bold text-dark"
                                        style="border-right: 1px solid #adadadad; font-size:11px;height:35px;border-top-left-radius:5px;border-bottom-left-radius:5px">To</span>
                                    <input type="text" class="form-control px-2 text-dark" id="filter_end_date"
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
                        <div class="col-md-1 mb-2 d-flex" style="">
                            <button type="submit" value="submit" style="line-height:16px; font-size:10px"
                                class="form-control text-bold" id="filter_button">
                                F&nbsp;I&nbsp;L&nbsp;T&nbsp;E&nbsp;R</button>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-6">
                        <div class="chart">
                            <p class="px-3 text-sm text-capitalize font-weight-bold text-dark">Your Expenses</p>
                            <figure class="highcharts-figure" style="margin-top: 0px">
                                <div id="expenses" style="min-height:220px"></div>
                            </figure>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="chart" style="height: 246px" id="myContainer">
                            <p class="px-3 text-sm text-capitalize font-weight-bold text-dark">Category Expenses</p>
                            <div class="d-flex justify-content-center">
                                <div style="width: 550px">
                                    <figure class="highcharts-figure " style="margin-top:-15px">
                                        <div id="expensesCategory"
                                            style="min-height: 240px; min-width: 300px; margin: 0 auto">
                                        </div>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<input type="text" value="{{ config('api.base_url') }}" id="api_endpoint" hidden>

</html>
<script src="{{ asset('js/core/popper.min.js') }}"></script>
<script src="{{ asset('js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('js/plugins/smooth-scrollbar.min.js') }}"></script>

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

<script>
    const API_URL = document.getElementById('api_endpoint').value;

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
                // Swal.fire('failed<br>Please contact ximply support');
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
                        // theme
                        'rgba(255,255,255,0.25)'
                },
                series: [{
                        name: '',
                        type: 'column',
                        yAxis: 1,
                        data: total_amount,
                        color: '#ff720c'

                        // tooltip: {
                        //     valueSuffix: ' mm'
                        // }


                    },
                    //  {
                    //     name: '',
                    //     type: 'spline',
                    //     data: total_amount,
                    //     color: '#000'

                    //     // tooltip: {
                    //     //     valueSuffix: '°C'
                    //     // }
                    // }
                ]
            });
        },
        complete: function(data) {
            if (data.status != 200) {
                Swal.fire('failed<br>Please contact ximply support');
            }
        }
    });


    $.ajaxSetup({
        headers: {
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
                // Swal.fire('failed<br>Please contact ximply support');
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
                                    ' </span></div>';
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
                Swal.fire('failed<br>Please contact ximply support');
            }
        }
    });

    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
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
