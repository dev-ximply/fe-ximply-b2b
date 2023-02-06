@extends('layouts.main')

@section('container')
    @include('report.new-report')

    <style>
        table {
            border: 1px solid #ccc;
            border-collapse: collapse;
            margin: 0;
            padding: 0;
            width: 100%;
            table-layout: fixed;
            border-radius: 10px !important;
        }

        table caption {
            font-size: 1.5em;
            margin: .5em 0 .75em;
        }

        table tr {
            background-color: #ffffff;
            border: 1px solid #ddd;
            padding: .35em;
        }

        table th,
        table td {
            padding: .625em;
            text-align: center;
        }

        table th {
            font-size: .85em;
            letter-spacing: .1em;
            text-transform: uppercase;
        }

        @media screen and (max-width: 600px) {
            table {
                border: 0;
            }

            table caption {
                font-size: 1.3em;
            }

            table thead {
                border: none;
                clip: rect(0 0 0 0);
                height: 1px;
                margin: -1px;
                overflow: hidden;
                padding: 0;
                position: absolute;
                width: 1px;
            }

            table tr {
                border-bottom: 3px solid #ddd;
                display: block;
                margin-bottom: .625em;
            }

            table td {
                border-bottom: 1px solid #ddd;
                display: block;
                font-size: .8em;
                text-align: right;
            }

            table td::before {
                /*
                                                                                                                        * aria-label has no advantage, it won't be read inside a table
                                                                                                                        content: attr(aria-label);
                                                                                                                        */
                content: attr(data-label);
                float: left;
                font-weight: bold;
                text-transform: uppercase;
            }

            table td:last-child {
                border-bottom: 0;
            }
        }

        /* dropdown */
        //dropdown


        /* .dropbtn {
                        background-color: #4CAF50;
                        color: white;
                        padding: 16px;
                        font-size: 16px;
                        border: none;
                        cursor: pointer;
                    }

                    .dropdown {
                        position: relative;
                        display: inline-block;
                    }

                    .dropdown-content {
                        display: none;
                        position: absolute;
                        background-color: #f9f9f9;
                        min-width: 100px;
                        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
                        z-index: 1;
                        right: 1px;
                    }

                    .dropdown-content a {
                        color: black;
                        padding: 12px 16px;
                        text-decoration: none;
                        display: block;
                    }

                    .dropdown-content a:hover {
                        background-color: #f1f1f1
                    }

                    .dropdown:hover .dropdown-content {
                        display: block;
                    }

                    .dropdown:hover .dropbtn {
                        background-color: #3e8e41;
                    } */
    </style>

    {{-- view modal report --}}
    <div class="modal fade" id="viewModalReport" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content" style="border-radius: 5px !important">
                <div class="modal-header px-4">
                    <h6 class="modal-title fs-6 text-dark" id="staticBackdropLabel">View Report</h6>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form action="">
                    <div class="modal-body">
                        <div class="col-12">
                            <div class="" style="border-radius: 5px;">
                                <div class="px-3" style="border-bottom:1px solid #f1f1f1 ">
                                    <div class="row justify-content-between">
                                        <div class="col-md">
                                            <input type="text" class="br font-weight-bold border-0"
                                                value="Expense Report">
                                        </div>
                                        <div class="col-md ">
                                            <p class="text-start text-md-end font-weight-bold text-dark">300,000.<span
                                                    class="text-xs">00</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="table table-responsive">
                                    <table class="table table-flush">
                                        <thead class="thead-light">
                                            <tr>
                                                <th class="text-sm px-3 text-dark" style="font-weight: 600">Date</th>
                                                <th class="text-sm px-2 text-dark" style="font-weight: 600">Merchant</th>
                                                <th class="text-sm px-2 text-dark" style="font-weight: 600">Amount</th>
                                                <th class="text-sm px-2 text-dark" style="font-weight: 600">Expense Type
                                                </th>
                                                <th class="text-sm px-2 text-dark" style="font-weight: 600">Purpose</th>
                                                {{-- <th class="text-xs px-0" style="font-weight: 500">Action</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="pb-0">
                                                <td class="font-weight-bold pt-3 pb-0">
                                                    <p class="text-dark text-xs mx-2 text-break text-wrap">
                                                        2020-10-11, 14:58:35
                                                    </p>
                                                </td>
                                                <td class="text-xs font-weight-bold  pt-3 pb-0">
                                                    <div class="d-flex align-items-center text-break text-wrap">
                                                        <p class="text-xs text-dark">Burger King</p>
                                                    </div>
                                                </td>
                                                <td class="text-xs font-weight-bold  pt-3 pb-0">
                                                    <div class="d-flex align-items-center text-break text-wrap">
                                                        <p class="text-xs text-dark">300,000</p>
                                                    </div>
                                                </td>
                                                <td class="text-xs font-weight-bold  pt-3 pb-0">
                                                    <div class="d-flex align-items-center text-break text-wrap">
                                                        <p class="text-xs text-dark">Meals</p>
                                                    </div>
                                                </td>
                                                <td class="text-xs font-weight-bold  pt-3 pb-0">
                                                    <div class="d-flex align-items-center text-break text-wrap">
                                                        <p class="text-xs text-dark">Customer Meeting</p>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row  mt-4 text-dark">
        <div class="col-md">
            <div class="row p-0">
                <div>Available Balance</div>
                <div><span
                        class="text-md font-weight-bolder text-dark fs-5">{{ number_format($data['limit']['remain_limit'], 2) }}</span>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="text-end">
                <a href="javascript:;" class="btn btn-icon text-white" data-bs-toggle="modal" data-bs-target="#newReport"
                    aria-controls="new-expense-form" style="background-color: #191a4d">
                    New Report &nbsp;<i class="fa-solid fa-file-lines"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="row " style="display: none">
        <div class="col-md-4">
        </div>
        <div class="col-md-8">
            <div class="row row-cols-md-4 row-cols-1 justify-content-end">
                <div class="col-md mt-2 d-flex align-items-center">
                    <div class="col-md input-group">
                        <span for="" class="input-group-text z-index-1 font-weight-bold text-dark" id="basic-addon1"
                            style="border-right: 1px solid #adadadad; font-size:11px;height:35px;border-top-left-radius:5px;border-bottom-left-radius:5px">From</span>
                        <input type="date" class="form-control px-2 text-dark" id="form" name="form"
                            style="font-size:11px;height:35px; border-top-right-radius:5px !important;border-bottom-right-radius:5px !important">
                    </div>
                </div>
                <div class="col-md mt-2 d-flex align-items-center">
                    <div class="input-group">
                        <span for="" class="input-group-text z-index-1 font-weight-bold text-dark"
                            style="border-right: 1px solid #adadadad; font-size:11px;height:35px;border-top-left-radius:5px;border-bottom-left-radius:5px">To</span>
                        <input type="date" class="form-control px-2 text-dark" id="form" name="form"
                            style="font-size:11px;height:35px; border-top-right-radius:5px !important;border-bottom-right-radius:5px !important">
                    </div>
                </div>
                {{-- <div class="col-md mt-2 d-flex align-items-end">
                    <input type="search" name="" id="" placeholder="Search..." class="form-control"
                        style="font-size:11px;line-height:16px !important;border-radius:5px !important">
                </div> --}}
                <div class="col-md mt-2 d-flex align-items-end">
                    <input type="search" name="" id="" placeholder="Search..." class="form-control"
                        style="font-size:11px;line-height:16px !important;border-radius:5px !important">
                </div>
                <div class="col-md-2 mt-2 d-flex" style="width: 70px">
                    <button type="submit" style="line-height:16px;" class="form-control" value="Search">
                        <i class="fa-sharp fa-solid fa-magnifying-glass"></i></button>
                </div>
            </div>
        </div>
    </div>

    @if (count($data['reports']) != 0)
        <div class="row mt-4 position-relative">
            <div class="col-md-12">
                <div class="card" style="border-radius: 5px; border:1 solid #f1f1f1">
                    <div class="table-responsive" style="overflow: hidden">
                        <table class="table table-borderless text-dark" id="datatable-search">
                            <thead class="thead-light">
                                <tr>
                                    <th class="col font-weight-bold text-dark"
                                        style="color: #000000; font-size:13px; width:20%">Title
                                    </th>
                                    <th class="col font-weight-bold text-dark" style="color: #000000; font-size:13px">
                                        Total
                                    </th>
                                    <th class="col font-weight-bold text-dark"
                                        style="color: #000000; font-size:13px; width:15%">Email To
                                    </th>
                                    <th class="col font-weight-bold text-dark"
                                        style="color: #000000; font-size:13px; width:15%">Email CC
                                    </th>
                                    <th class="col font-weight-bold text-dark" style="color: #000000; font-size:13px;">
                                        Submitted
                                    </th>
                                    {{-- <th class="col font-weight-bold text-dark" style="color: #000000; font-size:13px"
                                        width="8%">Status
                                    </th> --}}
                                    <th class="col font-weight-bold text-dark"
                                        style="color: #000000; font-size:13px; width:20%">Action
                                    </th>
                                </tr>
                                <script>
                                    // $('#checkall').change(function() {
                                    //     $('.cb-element').prop('checked', this.checked);
                                    // });

                                    // $('.cb-element').change(function() {
                                    //     if ($('.cb-element:checked').length == $('.cb-element').length) {
                                    //         $('#checkall').prop('checked', true);
                                    //     } else {
                                    //         $('#checkall').prop('checked', false);
                                    //     }
                                    // });
                                </script>
                            </thead>
                            <tbody>
                                @foreach ($data['reports'] as $item)
                                    <tr>
                                        {{-- <td class="text-sm" data-label="" style="color: #000000">
                                        <input type="checkbox" class="cb-element">
                                    </td> --}}
                                        <td class="text-sm" data-label="Title" style="color: #000000;">
                                            {{-- <div class="mx-2 text-capitalize" style="font-size:13px"> --}}
                                            <span class="text-capitalize">
                                                {{ $item->report_title }}
                                            </span>
                                            {{-- </div> --}}
                                        </td>
                                        <td class="text-sm" data-label="Total" style="color: #000000;">
                                            {{-- <div class="d-flex text-dark">
                                            <p class="text-dark fw-bold" style="font-size: 15px"> --}}
                                            <span class="text-dark fw-bold">
                                                {{ number_format($item->total_amount, 2) }}
                                            </span>
                                            {{-- </p>
                                        </div> --}}
                                        </td>
                                        <td class="text-sm text-break text-wrap" data-label="Email To"
                                            style="color: #000000;">
                                            {{-- <div class="d-flex text-wrap text-break">
                                            <p class="text-dark" style="font-size: 13px"> --}}
                                            @if ($item->reported_to_email != null)
                                                {{ $item->reported_to_email }}
                                            @else
                                                -
                                            @endif
                                            {{-- </p>
                                        </div> --}}
                                        </td>
                                        <td class="text-sm text-break text-wrap" data-label="Email CC"
                                            style="color: #000000;">
                                            {{-- <div class="d-flex text-wrap text-break">
                                            <p class="text-dark" style="font-size: 13px"> --}}
                                            <span style="margin-left: 10px">
                                                @if ($item->reported_to_email_cc != null)
                                                    {{ $item->reported_to_email_cc }}
                                                @else
                                                    -
                                                @endif
                                            </span>
                                            {{-- </p>
                                        </div> --}}
                                        </td>
                                        <td data-label="Submitted" style="color: #000000">
                                            <div class="col-md ">
                                                <div class="text-dark" style="font-size: 13px">
                                                    @if ($item->submited_date != null)
                                                        {{ $item->submited_date }}
                                                    @else
                                                        -
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        {{-- <td class="text-sm d-flex justify-content-md-center justify-content-between"
                                            data-label="Status" style="color: #000000">
                                            @if ($item->status == 'open')
                                                <div>
                                                    <p class="px-3 text-white"
                                                        style="background:#191a4d; border-radius:10px;font-size:10px;">Open
                                                    </p>
                                                </div>
                                            @else
                                                <div>
                                                    <p class="px-3 text-white"
                                                        style="background:#484848; border-radius:10px;font-size:10px;">Done
                                                    </p>
                                                </div>
                                            @endif
                                        </td> --}}
                                        <td class="text-sm" data-label="Action" style="color: #000000;">
                                            <div class="d-flex justify-content-end me-6">
                                                <div class="d-flex justify-content-around w-50">
                                                    <div class="me-2">
                                                        {{-- @if ($item->status == 'open') --}}
                                                            <a href="/view-report/{{ $item->id }}"
                                                                class="btn text-white d-flex justify-content-center align-items-center text-capitalize"
                                                                style="background-color:#ff720c;width:80px;height:25px;font-size:12px;font-weight:500">Send
                                                                Report</a>
                                                        {{-- @else
                                                            <a href="/view-report/{{ $item->id }}"
                                                                class="btn text-white d-flex justify-content-center align-items-center text-capitalize"
                                                                style="background-color: #ff720c;width:80px;height:25px;font-size:12px;font-weight:500">
                                                                View</a>
                                                        @endif --}}
                                                    </div>
                                                    {{-- <div class="me-2" data-toggle="tooltip" data-placement="top"
                                                        title="Delete">
                                                        <a class="badge text-white d-flex justify-content-center align-items-center"
                                                            style="background-color: #D42A34; height:25px;font-size:12px;font-weight:500"><i
                                                                class="fa fa-trash" aria-hidden="true"></i></a>
                                                    </div> --}}
                                                    <div class="dropleft">
                                                        <button
                                                            class="btn  badge text-white d-flex justify-content-center align-items-center text-capitalize me-2"
                                                            style="background-color:#191a4d;height:25px;font-size:12px;font-weight:500;border:0"
                                                            type="button" id="dropdownMenu2" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <i class="fa-solid fa-file-export"></i>
                                                        </button>
                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2"
                                                            style="border: 1px solid gray">
                                                            {{-- <li><a  href="{{ config('api.base_url') . 'api/report/export/pdf/' . $item->id }}"
                                                                    download class="text-dark text-start px-3" >Export
                                                                    PDF</a></li> --}}
                                                            <li> <a href="{{ config('api.base_url') . 'api/report/export/excel/' . $item->id }}"
                                                                    download class="text-dark text-start px-3">Export
                                                                    Excel</a></li>
                                                            <li> <a href="{{ env('API_URL') . 'api/report/export/csv/' . $item->id }}"
                                                                    download class="text-dark text-start px-3">Export
                                                                    Csv</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row justify-content-center h-100 align-items-center">
            <div class="d-flex align-items-center justify-content-center flex-column py-5">
                <img src="{{ asset('img/icons/bill.png') }}" class="img-fluid" alt="" style="width: 100px">
                <h6 class="font-weight-bold text-dark py-0">You don't have report</h6>
                <span class="text-xs" style="text-align: center">Choose your expenses to create your new reports</span>
            </div>
        </div>
    @endif

    <script>
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
@endsection
