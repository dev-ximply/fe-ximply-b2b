@extends('layouts.main')

@section('container')
    {{-- @include('expenses.edit-scan-receipt') --}}
    @include('expenses.new-expense')
    @include('expenses.view-expense-detail')
    @include('voucher.side-voucher')
    <script src={{ asset('js/image-zoom/jquery.zoom.js') }}></script>

    <style>
        ::-ms-scrollbar {
            width: 12px;
        }

        ::-ms-scrollbar-track {
            background: #f90;
        }

        ::-ms-scrollbar-thumb {
            background: blue;
        }

        ::-ms-scrollbar-button:start:decrement,
        ::-ms-scrollbar-button:end:increment {
            background: black;
        }

        /* table */
        table {
            border: 1px solid #ccc;
            border-radius: 5px;
            border-collapse: collapse;
            margin: 0;
            padding: 0;
            width: 100%;
            table-layout: fixed;
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
    </style>

    <div class="col-12 d-flex justify-content-end">
        <button onclick="history.back()" class="btn  btn-sm  text-white" style="background-color: #191a4d"
            type="button">back</button>
    </div>
    <div class="d-sm-flex justify-content-between mt-4 mb-0">
        <div class="row p-0 mb-2">
            <div class="text-dark">Member Balance</div>
            <div><span
                    class="text-md font-weight-bolder text-dark fs-5">{{ number_format($data['balance']->remain_limit, 2) }}</span>
            </div>
        </div>
        <div class="row p-0 mb-2 text-end">
            <div class="text-dark">Member Name</div>
            <div><span class="text-md font-weight-bolder text-dark fs-5">{{ ucwords(strtolower($data['member']->full_name)) }}</span>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-10">
            <form action="" method="get">
                <div class="row row-cols-md-5 row-cols-1 justify-content-end">
                    <div class="col-md mt-2">
                        <div class="col-md input-group">
                            <span for="" class="input-group-text z-index-1 font-weight-bold text-dark"
                                id="basic-addon1"
                                style="border-right: 1px solid #adadadad; font-size:11px;height:35px;border-top-left-radius:5px;border-bottom-left-radius:5px">From</span>
                            <input type="date" class="form-control px-2 text-dark" id="form" name="start_date"
                                style="font-size:11px;height:35px; border-top-right-radius:5px !important;border-bottom-right-radius:5px !important">
                        </div>
                    </div>
                    <div class="col-md mt-2">
                        <div class="input-group">
                            <span for="" class="input-group-text z-index-1 font-weight-bold text-dark"
                                style="border-right: 1px solid #adadadad; font-size:11px;height:35px;border-top-left-radius:5px;border-bottom-left-radius:5px">To</span>
                            <input type="date" class="form-control px-2 text-dark" id="form" name="end_date"
                                style="font-size:11px;height:35px; border-top-right-radius:5px !important;border-bottom-right-radius:5px !important">
                        </div>
                    </div>
                    <div class="col-md mt-2">
                        <select name="category" id="" class="form-select text-dark"
                            style="font-size:11px;line-height:16px !important;border-radius:5px !important">
                            <option value="" class="text-dark" selected>Expense Type</option>
                            <option value="" class="text-dark">Meal</option>
                            <option value="" class="text-dark">Transportstion</option>
                        </select>
                    </div>
                    <div class="col-md mt-2 d-flex align-items-end">
                        <input type="search" name="" id="" placeholder="Search..."
                            class="form-control w-100"
                            style="font-size:11px;line-height:16px !important;border-radius:5px !important">
                    </div>
                    <div class="col-md-2 mt-2 d-flex" style="width: 70px">
                        <button type="submit" style="line-height:16px;" class="form-control" value="Search">
                            <i class="fa-sharp fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @if (count($data['expenses']) != 0)
        <div class="row mt-4 position-relative">
            <div class="col-12">
                <div class="card" style="border-radius: 5px">
                    <div class="table-responsive">
                        <table class="table table-borderless text-dark">
                            <thead>
                                <tr>
                                    <th class="col font-weight-bold text-dark" style="color: #000000; font-size:13px">Date
                                    </th>
                                    <th class="col font-weight-bold text-dark" style="color: #000000; font-size:13px">
                                        Merchant
                                    </th>
                                    <th class="col font-weight-bold text-dark" style="color: #000000; font-size:13px">
                                        Amount
                                    </th>
                                    <th class="col font-weight-bold text-dark" style="color: #000000; font-size:13px">
                                        Expense
                                    </th>
                                    <th class="col font-weight-bold text-dark" style="color: #000000; font-size:13px">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['expenses'] as $item)
                                    <tr>
                                        <td style="color: #000000;font-weight:600;font-size:13px;"><span
                                                class="mx-2 text-break text-wrap text-dark font-weight-bold"
                                                style="font-size: 13px">{{ $item->long_date }}</span></td>
                                    </tr>
                                    @foreach ($item->expenses as $expense)
                                        <tr class="">
                                            <td class="text-sm" data-label="Date" style="color: #000000">
                                                {{-- <span class="mx-2 text-break text-wrap text-dark" style="font-size: 13px"> --}}
                                                {{ $expense->receipt_date }}
                                                {{-- </span> --}}
                                            </td>
                                            <td class="text-sm" data-label="Merchant" style="color: #000000">
                                                {{-- <div class="d-flex align-items-center text-break text-wrap text-dark">
                                                <span class="text-dark text-capitalize"
                                                    style="font-size: 13px"> --}}
                                                {{ $expense->merchant }}
                                                {{-- </span>
                                            </div> --}}
                                            </td>
                                            <td class="text-sm" data-label="Total Amount" style="color: #000000">
                                                {{-- <div class="d-flex align-items-center text-dark"> --}}
                                                <span class="text-dark fw-bold" style="font-size: 15px">
                                                    {{ number_format($expense->total_amount, 2) }}
                                                </span>
                                                {{-- </div> --}}
                                            </td>
                                            <td class="text-sm" data-label="Expense" style="color: #000000">
                                                {{-- <div class="d-flex align-items-center">
                                                <span class="text-dark text-capitalize"
                                                    style="font-size: 13px"> --}}
                                                {{ $expense->category }}
                                                {{-- </span>
                                            </div> --}}
                                            </td>
                                            {{-- <td class="text-xs pt-4 pb-0" style="width: 200px">
                                            <div class="d-flex align-items-center">
                                                <span class="text-dark text-capitalize"
                                                    style="font-size: 13px">{{ $expense->purpose }}</span>
                                            </div>
                                        </td> --}}
                                            <td class="text-sm d-flex justify-content-md-center justify-content-between"
                                                data-label="Action">
                                                <button onclick="getExpenseData({{ $expense->id }})"
                                                    class="btn text-white d-flex  justify-content-center align-items-center text-capitalize"
                                                    data-bs-toggle="modal" data-bs-target="#viewExpenseDetail"
                                                    style="background-color: #ff720c;width:65px;height:25px;font-size:12px;font-weight:500">
                                                    View</button>
                                            </td>
                                        </tr>
                                    @endforeach
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
                <h6 class="font-weight-bold text-dark py-0">Member don't have expense</h6>
                <span class="text-xs" style="text-align: center">Scan your recepit or create new expense form the button
                    above</span>
            </div>
        </div>
    @endif

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
                        // document.getElementById('detail_sub_category').value = response['sub_category'];
                        // document.getElementById('detail_purpose').value = response['purpose'];

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

    <!-- side voucher-->
    <script>
        function openNav() {
            document.getElementById("mySidebar").style.width = "250px";
            document.getElementById("btnSide").style.marginRight = '250px';
        }

        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
            document.getElementById("btnSide").style.marginRight = '0';
        }

        // function openBtn() {
        //     document.getElementById('btnSide').innerHTML = 'Close'
        // }

        // function closeBtn() {
        //     document.getElementById('btnSide').innerHTML = 'Open'
        // }

        function toggleNav() {
            var x = document.getElementById("mySidebar");

            if (x.style.width == "250px" || x.style.width == "50px") {

                closeNav();
                // closeBtn();
            } else {

                openNav();
                // openBtn();
            }
        }
    </script>
    <!-- side voucher-->
@endsection
