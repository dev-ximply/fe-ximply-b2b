@extends('layouts.main')

@section('container')
    @include('expenses.new-expense')
    @include('expenses.view-expense-detail')
    @include('voucher.side-voucher')
    <script src='{{ asset('js/image-zoom/jquery.zoom.js') }}'></script>

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


        .sidebar {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            right: 0;
            background-color: #ffffff;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidebar a {
            padding: 8px 8px 8px 8px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .sidebar a:hover {
            color: #f1f1f1;
        }

        .sidebar .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }


        #btnSide {
            position: fixed;
            z-index: 1;
            height: 30px;
            background-color: #a99797;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
            font-size: medium;
            cursor: pointer;
            transition: 0.5s;

            top: 50%;
            transform: translateY(-50%);
            right: 0;
        }

        /* table */
        table {
            /* border: 1px solid #ccc; */
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
            /* border: 1px solid #ddd; */
            padding: .35em;
        }

        table th,
        table td {
            padding: .625em;
            text-align: center;
            font-size: 12px;
            font-weight: 500;
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
                /* border-bottom: 3px solid #ddd; */
                display: block;
                margin-bottom: .625em;
            }

            table td {
                /* border-bottom: 1px solid #ddd; */
                display: block;
                font-size: .8em;
                text-align: right;
            }

            table td::before {
                content: attr(data-label);
                float: left;
                font-weight: bold;
                text-transform: uppercase;
            }

            table td:last-child {
                border-bottom: 0;
            }
        }

        /* styles unrelated to zoom */
        * {
            border: 0;
            margin: 0;
            padding: 0;
        }

        /* these styles are for the demo, but are not required for the plugin */
        .zoom {
            display: inline-block;
            position: relative;
        }

        /* magnifying glass icon */
        .zoom:after {
            content: '';
            display: block;
            width: 33px;
            height: 33px;
            position: absolute;
            top: 0;
            right: 0;
            /* background: url(icon.png); */
        }

        .zoom img {
            display: block;
        }

        .zoom img::selection {
            background-color: transparent;
        }

        #ex2 img:hover {
            cursor: url(grab.cur), default;
        }

        #ex2 img:active {
            cursor: url(grabbed.cur), default;
        }
    </style>
    @if (session()->get('is_superadmin') == false)
        <div class="row mt-2 mb-0">
            <div class="col-md">
                <div class="row p-0 mb-2">
                    <div class="text-dark">Available Balance</div>
                    <div><span
                            class="text-md font-weight-bolder text-dark fs-5">{{ number_format($data['limit']['remain_limit'], 2) }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md dropdown text-end">
                <button class="btn text-white" type="button" id="dropDownExpense" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" style="background-color: #191a4d">New Expense</button>
                <ul class="dropdown-menu" aria-labelledby="dropDownExpense">
                    <li>
                        <a class="dropdown-item text-dark" href="#" data-bs-toggle="modal"
                            data-bs-target="#manualForm" onclick="handlingModalForm(false)">
                            <span class="" style="background: #191a4d;border-radius:50%;">
                                <div class="d-flex align-items-center" id="ava-upload-button-1">
                                    <span class="overflow-hidden d-flex align-items-center justify-content-center"
                                        style="border-radius: 50%;background: #191a4d; width:20px; height:20px">
                                        <i class="fa-solid fa-pen-to-square text-white p-1" style=""></i>
                                    </span>
                                    &nbsp;<span id="ava-pic-1" class="text-dark">Manual Form</span>
                                </div>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item text-dark" href="#" data-bs-toggle="modal"
                            data-bs-target="#manualForm" onclick="handlingModalForm(true)">
                            <span class="" style="background: #191a4d;border-radius:50%;">
                                <div class="d-flex align-items-center" id="ava-upload-button-2">
                                    <span class="overflow-hidden d-flex align-items-center justify-content-center"
                                        style="border-radius: 50%;background: #191a4d; width:20px; height:20px">
                                        <i class="fa-solid fa-receipt text-white "></i>
                                    </span>
                                    &nbsp;<span id="ava-pic-2" class="text-dark">Scan Receipt</span>
                                </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    @endif
    <div class="row mt-4 position-relative">
        <div class="col-12">
            <div class="card" style="border-radius: 5px">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="d-flex mb-4 justify-content-start justify-content-md-end">
                            <form id="formSearch" action="" style="z-index: 0" onsubmit="handleChangeStatus(event)">
                                <div class="row">
                                    <div class="col-md mt-2">
                                        <select name="statusType" id="status"
                                            class="rounded border border-secondary text-secondary"
                                            style="font-size:12px; height: 25px; width: 150px">
                                            <option value="">Status</option>
                                            <option
                                                {{ isset($_GET['statusType']) && $_GET['statusType'] == 'pending' ? 'selected' : '' }}
                                                value="pending">Pending</option>
                                            <option
                                                {{ isset($_GET['statusType']) && $_GET['statusType'] == 'rejected' ? 'selected' : '' }}
                                                value="rejected">Rejected</option>
                                            <option
                                                {{ isset($_GET['statusType']) && $_GET['statusType'] == 'approved' ? 'selected' : '' }}
                                                value="approved">Approved</option>
                                            <option
                                                {{ isset($_GET['statusType']) && $_GET['statusType'] == 'done' ? 'selected' : '' }}
                                                value="done">Done</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-borderless text-dark" border="1">
                        <thead>
                            <tr>
                                <th class="col font-weight-bolder text-dark text-start text-uppercase text-xxs"
                                    style="color: #000000; ">Date Receipts
                                </th>
                                <th class="col font-weight-bolder text-dark text-start text-uppercase text-xxs"
                                    style="color: #000000; ">Status
                                </th>
                                <th class="col font-weight-bolder text-dark text-start text-uppercase text-xxs"
                                    style="color: #000000; ">Purpose
                                </th>
                                <th class="col font-weight-bolder text-dark text-start text-uppercase text-xxs"
                                    style="color: #000000; ">
                                    Merchant
                                </th>
                                <th class="col font-weight-bolder text-dark text-start text-uppercase text-xxs"
                                    style="color: #000000; ">
                                    Amount
                                </th>
                                <th class="col font-weight-bolder text-dark text-start text-uppercase text-xxs"
                                    style="color: #000000; ">
                                    Expense
                                </th>
                                <th class="col font-weight-bolder text-dark text-start text-uppercase text-xxs"
                                    style="color: #000000; ">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            @if (count($data['expenses']) != 0)
                                @foreach ($data['expenses'] as $item)
                                    @php
                                        
                                        $i = 1;
                                        
                                    @endphp
                                    <tr class="align-middle">
                                        <td colspan="7" style="color: #000000;font-weight:500;font-size:12px;"
                                            class="text-md-start text-end ps-md-4 text-break text-wrap">
                                            {{-- <span
                                                class="px-md-1 text-break text-wrap text-dark"> --}}
                                            {{ $item->long_date }}
                                            {{-- </span> --}}
                                        </td>
                                    </tr>
                                    @foreach ($item->expenses as $expense)
                                        <tr class="">
                                            <td>{{ '#' . $i++ }}</td>
                                            <td class="align-middle d-flex justify-content-md-start ps-md-4  justify-content-between text-center"
                                                data-label="Status" style="color: #000000;">
                                                @if ($expense->status == 'approved')
                                                    <span class="badge badge-xs d-flex justify-content-center"
                                                        style=" border:1px solid #50B720; color:#50B720; padding:5px; border-radius:5px; width:55px">
                                                        {{ $expense->status }}
                                                    </span>
                                                @elseif($expense->status == 'pending')
                                                    <span class="badge badge-xs d-flex justify-content-center"
                                                        style=" border:1px solid #FFCF23; color:#FFCF23; padding:5px; border-radius:5px; width:55px">
                                                        {{ $expense->status }}
                                                    </span>
                                                @elseif($expense->status == 'rejected')
                                                    <span class="badge badge-xs d-flex justify-content-center"
                                                        style=" border:1px solid #E40909; color:#E40909; padding:5px; border-radius:5px; width:55px">
                                                        {{ $expense->status }}
                                                    </span>
                                                @else
                                                    <span class="badge badge-xs d-flex justify-content-center"
                                                        style=" background:gray; color:gray; padding:5px; border-radius:5px; width:55px">
                                                        {{ $expense->status }}
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="text-md-start ps-md-4 text-end text-break text-wrap"
                                                data-label="Purpose" style="color: #000000">
                                                {{ $expense->purpose_name }}
                                            </td>
                                            <td class="text-break text-wrap text-md-start text-end ps-md-4"
                                                data-label="Merchant" style="color: #000000">
                                                {{ $expense->merchant }}
                                            </td>
                                            <td class="text-break text-wrap ps-md-4 text-md-start text-end"
                                                data-label="Total Amount" style="color: #000000">
                                                <span class="">
                                                    {{ number_format($expense->total_amount, 2) }}
                                                </span>
                                            </td>
                                            <td class="text-break text-wrap ps-md-4 text-md-start text-end"
                                                data-label="Expense" style="color: #000000">
                                                {{ $expense->category_name }}
                                            </td>
                                            <td class="text-sm d-flex justify-content-md-start ps-md-4 justify-content-between"
                                                data-label="Action">
                                                <button onclick="getExpenseData('{{ $expense->id }}' )"
                                                    class="btn text-white d-flex  justify-content-center align-items-center text-capitalize"
                                                    data-bs-toggle="modal" data-bs-target="#viewExpenseDetail"
                                                    style="background-color: #FF720C;width:65px;height:25px;font-size:12px;font-weight:500">
                                                    View</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7">
                                        <div class="row justify-content-center h-100 align-items-center">
                                            <div class="d-flex align-items-center justify-content-center flex-column py-5">
                                                <img src="{{ asset('img/icons/bill.png') }}" class="img-fluid"
                                                    alt="" style="width: 100px">
                                                <h6 class="font-weight-bold text-dark py-0">You don't have expense</h6>
                                                <span class="text-xs" style="text-align: center">Scan your recepit or
                                                    create new
                                                    expense form the button
                                                    above</span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    "Authorization": "Bearer " + AUTH_TOKEN,
                    "Accept": "application/json"
                }
            });

            $.ajax({
                type: "GET",
                url: API_URL + "api/category/list/main?user_id=" + USR_ID,
                success: function(res) {
                    if (res) {
                        var response = res['data'];
                        for (const obj of response) {
                            var CategoryId = obj.category_name;
                            var CategoryName = obj.category_name;
                            $("#list_category").append('<option value="' + CategoryName +
                                '">' + CategoryName + '</option>');
                        }
                    } else {
                        $("#list_category").empty();
                    }
                }
            });
        });

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
                        console.log(response);
                        document.getElementById('detail_receipt_file').src = STORAGE_URL + response[
                            'receipt_picture_directory'];
                        document.getElementById('detail_additional_file').src = STORAGE_URL + response[
                            'additional_picture_directory'];
                        document.getElementById('detail_date').value = response['receipt_date'];
                        document.getElementById('detail_merchant').value = response['merchant'];
                        document.getElementById('detail_total_amount').value = response['total_amount']
                            .toLocaleString();
                        document.getElementById('detail_location').value = response['location'];
                        document.getElementById('detail_category').value = response['category_name'];
                        document.getElementById('detail_sub_category').value = response['sub_category_name'];
                        document.getElementById('detail_partner').value = response['client_name'];
                        document.getElementById('detail_purpose').value = response['purpose_name'];
                        document.getElementById('dataExpenseOf').value = response['expense_of'];
                        $('#ex1').zoom();
                        $('#ex2').zoom();
                    } else {
                        Swal.fire('failed<br>Please contact ximply support');
                    }
                },
                complete: function(data) {
                    if (data.status != 200) {
                        Swal.fire('failed<br>Please contact ximply support');
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
    </script>
    <!-- side voucher-->
    <script>
        function handleChangeStatus(event) {
            event.submit();
        }
    </script>


    {{-- filter untuk category --}}
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    "Authorization": "Bearer " + AUTH_TOKEN,
                    "Accept": "application/json"
                }
            });


            $(document).ready(function() {
                var urlSearch = "";
                $('#status').on('change', function() {
                    var status = $('#status').val();
                    urlSearch = API_URL + "api/expense/list/nested?user_id=" +
                        USR_ID +
                        "&status=" + status;
                    new getDataExpenses(urlSearch);
                });
            });


            function getDataExpenses(urlSearch) {
                $("#tableBody").html("");
                // $("#totalAmount").html("0.00");
                $.ajaxSetup({
                    headers: {
                        "Authorization": "Bearer " + AUTH_TOKEN,
                        "Accept": "application/json"
                    }
                });
                $.ajax({
                    type: "GET",
                    url: urlSearch,
                    beforeSend: function() {
                        $("#main-loader").show();
                    },
                    success: function(res) {
                        if (res) {
                            console.log(res);
                            var response = res['data'];
                            var tableOut = "";
                            // var totalAmount = 0;
                            for (const obj of response) {
                                tableOut += '<tr class="align-middle">' +
                                    '<td colspan="7" style="color: #000000;font-weight:500;font-size:12px;" class="text-md-start text-end ps-md-4 text-break text-wrap">' +
                                    obj.long_date +
                                    '</td> </tr>'
                                for (const expense of obj.expenses) {
                                    tableOut +=
                                        '<tr><td class="font-weight-bold pt-3">';
                                    tableOut +=
                                        '<p class="text-sm text-dark">' + expense.receipt_date +
                                        '</p></td>';
                                    if (expense.status == 'approved') {
                                        tableOut +=
                                            '<td class="align-middle d-flex justify-content-md-start ps-md-4  justify-content-between text-center">' +
                                            '<span class="badge badge-xs d-flex justify-content-center"' +
                                            'style=" border:1px solid #50B720; color:#50B720; padding:5px; border-radius:5px; width:55px">' +
                                                expense.status  
                                             '</span>' +
                                                + '</p></td>';

                                    } else if (expense.status == 'pending') {
                                        tableOut +=
                                            '<td class=""align-middle d-flex justify-content-md-start ps-md-4  justify-content-between text-center">'  +
                                                '<span class="badge badge-xs d-flex justify-content-center"' +
                                                 'style=" border:1px solid #FFCF23; color:#FFCF23; padding:5px; border-radius:5px; width:55px">' +
                                                        expense.status
                                                '</span>'
                                            + '</p></td>';
                                    } else if (expense.status == 'rejected') {
                                        tableOut +=
                                            '<td class=""align-middle d-flex justify-content-md-start ps-md-4  justify-content-between text-center">' +
                                                '<span class="badge badge-xs d-flex justify-content-center"' +
                                                 'style=" border:1px solid #E40909; color:#E40909; padding:5px; border-radius:5px; width:55px">'+
                                                       expense.status
                                                    '</span>' 
                                            + '</td>';

                                    } else {
                                        tableOut +=
                                            '<td class=""align-middle d-flex justify-content-md-start ps-md-4  justify-content-between text-center">' +
                                            expense.status + '</p></td>';

                                    }

                                    tableOut +=
                                        '<td class="text-xs font-weight-bold pt-3 px-0"><p class="text-sm text-dark">' +
                                        expense.purpose_name + '</p></td>';
                                    tableOut +=
                                        '<td class="text-xs font-weight-bold pt-3 px-0"><p class="text-sm text-dark">' +
                                        expense.merchant + '</p></td>';
                                    tableOut +=
                                        '<td class="text-xs font-weight-bold pt-3 px-0"><p class="text-sm text-dark">' +
                                        expense.total_amount + '</p></td>';
                                    tableOut +=
                                        '<td class="text-xs font-weight-bold pt-3 px-0"><p class="text-sm text-dark">' +
                                        expense.category_name + '</p></td>';
                                    tableOut +=
                                        '<td class="text-sm d-flex justify-content-md-start ps-md-4 justify-content-between" data-label="Action">' +
                                        ' <button onclick="getExpenseData(' + '`' + expense.id + '`' +
                                        ')"' +
                                        'class = "btn text-white d-flex  justify-content-center align-items-center text-capitalize"' +
                                        'data-bs-toggle = "modal" data-bs-target = "#viewExpenseDetail"' +
                                        'style ="background-color: #FF720C;width:65px;height:25px;font-size:12px;font-weight:500">' +
                                        ' View' + ' </button> </td></tr>'
                                }

                            }
                            $("#tableBody").append(tableOut);
                        } else {
                            $("#tableBody").empty();
                        }

                    },
                    complete: function(data) {
                        $("#main-loader").hide();
                    }
                });
            }
        });
    </script>
@endsection
