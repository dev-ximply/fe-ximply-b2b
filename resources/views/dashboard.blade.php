@extends('layouts.main')
@section('container')
    <link rel="stylesheet" href="{{ asset('css/dashboard/dashboard.css') }}">
    @include('expenses.new-expense')
    @include('budget.modal-top-up-approval')
    <div class="modal" tabindex="-1" id="modalExpenses">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header" style="background: #19194b">
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

    <section class="min-vh-100 mb-5 pb-5">

        <div class="row flex-md-row flex-column" style="margin-top:-50px">
            @if (session()->get('is_superadmin') == false)
                {{-- quick accesss --}}
                <div class="col-md d-md-none d-block">
                    <div class="coloumn__quick__access">
                        <p>Quick Access</p>
                        <div class="d-flex justify-content-between" style="overflow-x: scroll;">
                            <a href="" class="" type="button" data-bs-toggle="modal"
                                data-bs-target="#modalExpenses" aria-controls="new-expense-form" id="myBtn">
                                <div class="col-lg-3 col-md-3 col-sm-3 mb-1 mx-2 py-1" style="cursor:pointer">
                                    <div>
                                        <img src="{{ asset('img/icons/dashboard/new-expenses.png') }}" alt=""
                                            class="" style="width:85px">
                                    </div>
                                </div>
                            </a>
                            <a href="" class="" data-bs-toggle="modal" data-bs-target="#topUp">
                                <div class="col-lg-3 col-md-3 col-sm-3 mb-1 mx-2 py-1" style="cursor:pointer">
                                    <div>
                                        <img src="{{ asset('img/icons/dashboard/top-up.png') }}" alt=""
                                            class="" style="width:85px">
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
            @endif
            <form action="">
                <input type="text" class="text-dark" id="fullname_uid" value="{{ Auth::user()['id'] }}" hidden>
            </form>
            {{-- end card --}}
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-5 mt-3">
                        <div class="coloumn__card d-flex align-items-center justify-content-between position-relative  overflow-hidden"
                            style="background: url('img/curved-images/card-background-img.jpg'); background-size:130%;background-blend-mode: lighten;">
                            {{-- <label class="d-flex justify-content-end" style="color: #ffffff">
                                My Card
                            </label> --}}

                            <div class="text-dark">Balance <p class="text-dark">
                                    {{ number_format($data['limit']['remain_limit'], 2) }}</p>
                            </div>
                            <div class="image_card mb-2 text-end position-absolute" style=" right:-40px; top:-5px">
                                <img src="{{ asset('img/logos/logo-new/logo-companyyy.png') }}" style="width: 200px"
                                    alt="">
                            </div>
                            {{-- <div class="d-flex justify-content-between text-dark">
                                <p class="text-dark" id="fullName"></p>
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-md pt-0 mt-3">
                        <div class="row justify-content-between">
                            <div class="col-md column_info  text-center">
                                <div class="column_content_info card pt-4" style="">
                                    <span class="title__amount" style="font-weight: 600;">Remain Budget <p>(Remain
                                            Expense)
                                        </p>
                                    </span>
                                    <span id="form_number_format">from <span id="number_format" style="font-weight: 700">
                                            {{ number_format($data['limit']['assign_limit'], 2) }}</span></span>
                                    <hr id="hr_remain" style="">
                                    <p class="total_amount text-center" style="font-weight: 600;">
                                        {{ number_format($data['limit']['remain_limit'], 2) }}</p>
                                </div>
                            </div>
                            @if (session()->get('manage_budget') == 1)
                                <div class="col-md column_info text-center">
                                    <div class="column_content_info card pt-4">
                                        <span class="title__amount" style="font-weight: 600;">Budget Spending <p>Amount
                                                Spending
                                            </p>
                                        </span>
                                        <hr id="hr_budget" style="">
                                        <p class="total_amount text-center" style="font-weight:600">
                                            {{ number_format($data['limit']['budget_spending'], 2) }}</p>
                                    </div>
                                </div>
                            @endif
                            <div class="col-md column_info text-center">
                                <div class="column_content_info card pt-4">
                                    <span class="title__amount" style="font-weight: 600;">Used Expense <p>Limit has been
                                            used
                                        </p>
                                    </span>
                                    <hr id="hr_used" style="">
                                    <p class="total_amount text-center" style="font-weight:600">
                                        {{ number_format($data['limit']['used_limit'], 2) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row flex-column">
                    <div class="col-md">
                        <div class="coloumn__expense ">
                            <form action="" method="get">
                                <div class="d-flex flex-md-row flex-column justify-content-between">
                                    <div class="d-flex flex-row me-3 mb-2">
                                        <div>
                                            <img src="{{ asset('img/icons/dashboard/expenses.png') }}" alt=""
                                                class="" style="width:80px">
                                        </div>
                                        <div class="d-flex flex-column ms-2">
                                            <span style="font-size: 16px;color:black;font-weight:400">Expenses</span>
                                        </div>
                                    </div>
                                    <div class="d-flex wrapper_expense flex-column ms-auto">
                                        <div class="d-flex w-100 ">
                                            <div class="me-2 mb-2" style="width: 100%; ">
                                                <div class="input-group">
                                                    <span for=""
                                                        class="input-group-text z-index-1 font-weight-bold text-dark px-1"
                                                        id="basic-addon1"
                                                        style="border-right: 1px solid #adadadad; color:black; font-size:9px;height:25px;border-top-left-radius:5px;border-bottom-left-radius:5px">From</span>
                                                    <input type="date" class="form-control px-1"
                                                        id="filter_start_date" name="filter_start_date"
                                                        value='{{ isset($_GET['filter_start_date']) ? $_GET['filter_start_date'] : '' }}'
                                                        style="font-size:10px;height:25px; border-top-right-radius:5px !important;border-bottom-right-radius:5px !important">
                                                </div>
                                            </div>
                                            <div class="mb-2" style="width: 100%; ">
                                                <div class="input-group">
                                                    <span for=""
                                                        class="input-group-text z-index-1 font-weight-bold"
                                                        style="border-right: 1px solid #adadadad; color:black; font-size:9px;height:25px;border-top-left-radius:5px;border-bottom-left-radius:5px">To</span>
                                                    <input type="date" class="form-control px-1" id="filter_end_date"
                                                        name="filter_end_date"
                                                        value='{{ isset($_GET['filter_end_date']) ? $_GET['filter_end_date'] : '' }}'
                                                        style="font-size:10px; height:25px; border-top-right-radius:5px !important;border-bottom-right-radius:5px !important">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-md-row flex-column w-100 w-md-100">
                                            <div class="me-2 mb-3" style="width: 100%; height:15px">
                                                <select name="filter_group" id="filter_group"
                                                    class="form-select text-dark text-capitalize"
                                                    style="font-size:9px; line-height:10px !important;border-radius:5px !important; ">
                                                    <option value="" class="text-dark px-1" selected>Group
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="me-2 mb-3" style="width: 100%; height:15px">
                                                <select name="filter_member" id="filter_member"
                                                    class="form-select text-dark text-capitalize"
                                                    style="font-size:9px; line-height:10px !important;border-radius:5px !important;">
                                                    @if (session()->get('is_superadmin') == false)
                                                        <option value="{{ Auth::user()['id'] }}" class="text-dark px-1"
                                                            selected>
                                                            Your Data</option>
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="mb-3" style="width: 100%; height:15px">
                                                <select name="filter_expense_type" id="filter_expense_type"
                                                    class="form-select text-dark"
                                                    style="font-size:9px; line-height:10px !important;border-radius:5px !important; ">
                                                    <option value="" class="text-dark px-1" selected>Expense Type
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end ms-auto  mt-1"
                                            style="width: 100%; max-width:65px">
                                            <button type="submit" value="submit"
                                                style="line-height:10px; height:25px; font-size:9px;background:#19194b;color:white"
                                                class="form-control text-bold d-flex justify-content-center"
                                                id="filter_button">
                                                <span>FILTER&nbsp;<i class="fa-solid fa-magnifying-glass"></i></span>
                                            </button>
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
                                    <div id="expensesCategory"
                                        style="min-height: 240px; min-width: 300px; margin: 0 auto">
                                    </div>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @if (session()->get('is_superadmin') == false)
                        <div class="col-md-6 mb-3">
                            <div class="coloumn_top_3">
                                <p style="font-weight: 500; font-size:16px; color:black">Top 3 Expense</p>
                                @foreach ($data['top_user_expense'] as $topUser)
                                    <div class="d-flex justify-content-between align-items-center">

                                        <div class="d-flex align-items-center">

                                            <div class="mt-2" style="">
                                                @if ($topUser->profile_picture == true)
                                                    <img src="{{ config('storage.base_url') . $topUser->profile_picture }}"
                                                        class="img-fluid"
                                                        style="border:1px solid gray; border-radius:50%; width:40px; height:40px"
                                                        alt="" id="imgUser">
                                                @else
                                                    <img src="{{ asset('img/team-2.jpg') }}" class="img-fluid"
                                                        style="border:1px solid gray; border-radius:50%; width:40px"
                                                        alt="" id="imgUser">
                                                @endif
                                            </div>
                                            <div class="ms-3">
                                                <span class="text-dark text-sm"
                                                    id="full_Name">{{ $topUser->full_name }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md mt-2 text-end">
                                            <span style="font-size:12px;">Total Amount
                                                <p class="text-sm text-dark" id="amountUser" style="font-weight:600">
                                                    {{ number_format($topUser->total_amount, 2) }}</p>
                                            </span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="coloumn_top_3">
                                <p style="font-weight: 500; font-size:16px;color:#000000">Most Visited Merchants</p>
                                @php
                                    $num = 1;
                                @endphp
                                <div class="table-responsive" style="max-height:200px;overflow-y:auto">
                                    <table class="table table-borderless">
                                        <thead>
                                            <th class="text-dark" style="font-size:13px;font-weight:600">No</th>
                                            <th class="text-dark" style="font-size:13px;font-weight:600">Merchant Name
                                            </th>
                                            <th class="text-dark" style="font-size:13px;font-weight:600">Visited</th>
                                            <th class="text-dark" style="font-size:13px;font-weight:600">Total Amount</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($data['top_merchant_expense'] as $topMerchant)
                                                <tr>
                                                    <td class="align-middle">
                                                        <div class="d-flex justify-content-center text-dark"
                                                            style="font-size:13px;">
                                                            {{ $num++ }}
                                                        </div>
                                                    </td>
                                                    <td class="align-middle">
                                                        <div class="d-flex justify-content-center text-dark"
                                                            style="font-size:13px;">
                                                            {{ $topMerchant->merchant }}
                                                        </div>
                                                    </td>
                                                    <td class="align-middle">
                                                        <div class="d-flex justify-content-center text-dark"
                                                            style="font-size:13px;">

                                                            {{ $topMerchant->count }}
                                                        </div>
                                                    </td>
                                                    <td class="align-middle">
                                                        <div class="d-flex justify-content-center text-dark"
                                                            style="font-size:13px;font-weight:600">
                                                            {{ number_format($topMerchant->total_amount, 2) }}
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endif


                </div>
            </div>
            <div class="col-md-4 mt-3">
                <div class="row flex-column">
                    @if (session()->get('is_superadmin') == false)
                        <div class="col-md" style="margin-bottom:10px">
                            <div class="coloumn__quick__access d-md-block d-none pt-4" style="margin-top:10px">
                                <p style="font-weight: 500; font-size:13px ; ">Quick Access</p>
                                <div class="d-flex " style="overflow-x: scroll;">
                                    <a type="button" data-bs-toggle="modal" data-bs-target="#modalExpenses"
                                        aria-controls="new-expense-form" id="myBtn">
                                        <div class="col-lg-3 col-md-3 col-sm-3 mb-1 mx-2 py-1" style="cursor:pointer">
                                            <div>
                                                <img src="{{ asset('img/icons/dashboard/new-expenses.png') }}"
                                                    alt="" class="" style="width:85px">
                                            </div>
                                        </div>
                                    </a>
                                    <a data-bs-toggle="modal" data-bs-target="#topUp">
                                        <div class="col-lg-3 col-md-3 col-sm-3 mb-1 mx-2 py-1" style="cursor:pointer">
                                            <div>
                                                <img src="{{ asset('img/icons/dashboard/top-up.png') }}" alt=""
                                                    class="" style="width:85px">
                                            </div>
                                        </div>
                                    </a>
                                    <a href="" hidden>
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
                    @endif
                    <div class="col-md">
                        <div class="coloumn__quick__access overflow-hidden"
                            style="margin:9px 0; min-height: 150px; border-radius:5px">
                            <div class="card-body">
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
                                                        <img src="{{ config('storage.merchant_url') . $voucher->discount_picture }}"
                                                            class="rounded" style="width: 12em;" alt="">
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
                        @if (session()->get('is_superadmin') == true)
                            <div class="coloumn__recent__expense" style="margin-top: 11px; border-radius:5px">
                                <div class="d-flex justify-content-between">
                                    <p style="font-weight: 500; font-size:13px">Your Recent Expense</p>
                                    <div class="ms-auto">
                                        <span class="text-sm mb-0 text-capitalize font-weight-normal">
                                            <a
                                                href='{{ session()->get('is_superadmin') == true ? '/approval' : '/expense' }}'>View
                                                All&nbsp;<i class="fa-solid fa-chevron-right"></i></a>
                                        </span>
                                    </div>
                                </div>
                                @php
                                    $no = 0;
                                @endphp
                                <div class="table-responsive" style="max-height:330px; overflow-y:auto">
                                    <table class="table">
                                        <tbody>
                                            <tr class="text-start" style="font-size:12px;color:#000000">
                                                <th>Status</th>
                                                <th>Expense</th>
                                                <th>Total</th>
                                            </tr>
                                            @foreach ($data['recent_expenses'] as $recentExpenses)
                                                @php
                                                    $no = $no + 1;
                                                @endphp
                                                @if ($no <= 10)
                                                    <tr class="text-start" style="font-size:12px;color:#000000">
                                                        <td>
                                                            @if ($recentExpenses->status == 'pending')
                                                                <span class="badge badge-xs d-flex justify-content-center"
                                                                    style="border:1px solid #FFCF23; color:#FFCF23; width: 55px">pending</span>
                                                            @elseif ($recentExpenses->status == 'approved')
                                                                <span class="badge badge-xs d-flex justify-content-center"
                                                                    style="border:1px solid #50B720; color:#50B720; width: 55px">approved</span>
                                                            @elseif ($recentExpenses->status == 'rejected')
                                                                <span class="badge badge-xs d-flex justify-content-center"
                                                                    style="border:1px solid #E40909; color:#E40909; width: 55px">rejected</span>
                                                            @else
                                                                <span class="badge badge-secondary badge-xs">unknown</span>
                                                            @endif
                                                        </td>
                                                        <td><span
                                                                class="fw-bold">{{ $recentExpenses->category_name }}</span><br><span
                                                                style="font-size:10px">{{ $recentExpenses->merchant }}</span>
                                                        </td>
                                                        <td class="fw-bold">Rp
                                                            {{ number_format($recentExpenses->total_amount, 2) }}</td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @else
                            <div class="coloumn__recent__expenses" style="margin-top: 10px; border-radius:5px">
                                <div class="d-flex justify-content-between">
                                    <p style="font-weight: 500; font-size:13px">Your Recent Expense</p>
                                    <div class="ms-auto">
                                        <span class="text-sm mb-0 text-capitalize font-weight-normal">
                                            <a
                                                href='{{ session()->get('is_superadmin') == true ? '/approval' : '/expense' }}'>View
                                                All&nbsp;<i class="fa-solid fa-chevron-right"></i></a>
                                        </span>
                                    </div>
                                </div>
                                @php
                                    $no = 0;
                                @endphp
                                <div class="table-responsive" style="max-height:430px; overflow-y:auto">
                                    <table class="table">
                                        <tbody>
                                            <tr class="text-start" style="font-size:12px;color:#000000">
                                                <th>Status</th>
                                                <th>Expense</th>
                                                <th>Total</th>
                                            </tr>
                                            @foreach ($data['recent_expenses'] as $recentExpenses)
                                                @php
                                                    $no = $no + 1;
                                                @endphp
                                                @if ($no <= 10)
                                                    <tr class="text-start" style="font-size:12px;color:#000000">
                                                        <td>
                                                            @if ($recentExpenses->status == 'pending')
                                                                <span class="badge badge-xs d-flex justify-content-center"
                                                                    style="border:1px solid #FFCF23; color:#FFCF23; width: 55px">pending</span>
                                                            @elseif ($recentExpenses->status == 'approved')
                                                                <span class="badge badge-xs d-flex justify-content-center"
                                                                    style="border:1px solid #50B720; color:#50B720; width: 55px">approved</span>
                                                            @elseif ($recentExpenses->status == 'rejected')
                                                                <span class="badge badge-xs d-flex justify-content-center"
                                                                    style="border:1px solid #E40909; color:#E40909; width: 55px">rejected</span>
                                                            @else
                                                                <span class="badge badge-secondary badge-xs">unknown</span>
                                                            @endif
                                                        </td>
                                                        <td><span
                                                                class="fw-bold">{{ $recentExpenses->category_name }}</span><br><span
                                                                style="font-size:10px">{{ $recentExpenses->merchant }}</span>
                                                        </td>
                                                        <td class="fw-bold">Rp
                                                            {{ number_format($recentExpenses->total_amount, 2) }}</td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif

                    </div>
                    @if (session()->get('is_superadmin') == true)
                        <div class="col-md">
                            <div class="coloumn__recent__expense_group"
                                style="margin-top: 11px; border-radius:5px; max-hight:200px; overflow-y:scroll">
                                <div class="d-flex justify-content-between">
                                    <p style="font-weight: 500; font-size:13px">Recent Expense Team</p>
                                    <div class="ms-auto">
                                        <span class="text-sm mb-0 text-capitalize font-weight-normal">
                                            <a
                                                href='{{ session()->get('is_superadmin') == true ? '/approval' : '/expense' }}'>View
                                                All&nbsp;<i class="fa-solid fa-chevron-right"></i></a>
                                        </span>
                                    </div>
                                </div>
                                @php
                                    $no = 0;
                                @endphp
                                @foreach ($data['recent_approval'] as $recentExpenses)
                                    <div class="d-flex" style="">
                                        <div class=" w-100 ">
                                            <div class="d-flex flex-column bg-white border p-2 align-items-center w-100"
                                                style="margin-bottom:10px; border-radius:10px;">

                                                <div class="col-md d-flex w-100 align-items-center">

                                                    <div class="col-md-3" style="">
                                                        {{-- <label for="">Status</label> --}}
                                                        <div>
                                                            @if ($recentExpenses->status == 'pending')
                                                                <span class="badge badge-xs d-flex justify-content-center"
                                                                    style="border:1px solid #FFCF23; color:#FFCF23; width: 55px;font-size:9px">pending</span>
                                                            @elseif ($recentExpenses->status == 'approved')
                                                                <span class="badge badge-xs d-flex justify-content-center"
                                                                    style="border:1px solid #50B720; color:#50B720; width: 55px;font-size:9px">approved</span>
                                                            @elseif ($recentExpenses->status == 'rejected')
                                                                <span class="badge badge-xs d-flex justify-content-center"
                                                                    style="border:1px solid #E40909; color:#E40909; width: 55px;font-size:9px">rejected</span>
                                                            @else
                                                                <span class="badge badge-secondary badge-xs">unknown</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md mx-2 d-flex flex-column">
                                                        <span
                                                            style="font-size:11px;font-weight:600">{{ $recentExpenses->category_name }}</span>
                                                        <span
                                                            style="font-size:11px">{{ $recentExpenses->merchant }}</span>
                                                    </div>
                                                    <div class="col-md d-flex flex-column justify-content-end text-end">
                                                        <span style="font-size:10px;">Total</span>
                                                        <span style="font-size:11px;font-weight:600">Rp
                                                            {{ number_format($recentExpenses->total_amount, 2) }}</span>

                                                    </div>
                                                </div>

                                                <div class="col-md d-flex justify-content-end w-100">
                                                    <div class="col-md">
                                                        @if ($recentExpenses->status == 'pending')
                                                            <div class="d-flex flex-row pt-3 d-flex justify-content-end">
                                                                <button
                                                                    onclick="approvalDecision('{{ Auth::user()['id'] }}', '{{ $recentExpenses->approval_id }}', 'approved')"
                                                                    data-bs-toggle="tooltip"
                                                                    class="mx-0 btn text-white d-flex align-items-center d-flex justify-content-center"
                                                                    data-bs-original-title="Approve" data-toggle="tooltip"
                                                                    data-placement="left" title="Approve this expenses"
                                                                    style="width:65px;height:25px; background-color:#50B720;border:none;border-radius:5px">
                                                                    <i
                                                                        class="fas fa-circle-check text-white text-md me-1"></i>
                                                                    <span style="font-size: 0.6em">Approved</span>
                                                                </button>
                                                                <button
                                                                    onclick="approvalDecision('{{ Auth::user()['id'] }}', '{{ $recentExpenses->approval_id }}', 'rejected')"
                                                                    data-bs-toggle="tooltip"
                                                                    class="ms-2  btn text-white d-flex align-items-center d-flex justify-content-center"
                                                                    data-bs-original-title="reject" data-toggle="tooltip"
                                                                    data-placement="left" title="Reject this expenses"
                                                                    style="width:65px;height:25px; background-color:#E40909;border:none;border-radius:5px">
                                                                    <i
                                                                        class="fas fa-circle-xmark text-white text-md me-1"></i>
                                                                    <span style="font-size: 0.6em;">Reject</span>
                                                                </button>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="col-md">
                            <div class="coloumn__recent__expense_group_manager"
                                style="margin-top: 11px; border-radius:5px; max-hight:200px; overflow-y:scroll">
                                <div class="d-flex justify-content-between">
                                    <p style="font-weight: 500; font-size:13px">Recent Expense Team</p>
                                    <div class="ms-auto">
                                        <span class="text-sm mb-0 text-capitalize font-weight-normal">
                                            <a
                                                href='{{ session()->get('is_superadmin') == true ? '/approval' : '/expense' }}'>View
                                                All&nbsp;<i class="fa-solid fa-chevron-right"></i></a>
                                        </span>
                                    </div>
                                </div>
                                @php
                                    $no = 0;
                                @endphp
                                @foreach ($data['recent_approval'] as $recentExpenses)
                                    <div class="d-flex" style="">
                                        <div class=" w-100 ">
                                            <div class="d-flex flex-column bg-white border p-2 align-items-center w-100"
                                                style="margin-bottom:10px; border-radius:10px;">

                                                <div class="col-md d-flex w-100 align-items-center">

                                                    <div class="col-md-3" style="">
                                                        {{-- <label for="">Status</label> --}}
                                                        <div>
                                                            @if ($recentExpenses->status == 'pending')
                                                                <span class="badge badge-xs d-flex justify-content-center"
                                                                    style="border:1px solid #FFCF23; color:#FFCF23; width: 55px;font-size:9px">pending</span>
                                                            @elseif ($recentExpenses->status == 'approved')
                                                                <span class="badge badge-xs d-flex justify-content-center"
                                                                    style="border:1px solid #50B720; color:#50B720; width: 55px;font-size:9px">approved</span>
                                                            @elseif ($recentExpenses->status == 'rejected')
                                                                <span class="badge badge-xs d-flex justify-content-center"
                                                                    style="border:1px solid #E40909; color:#E40909; width: 55px;font-size:9px">rejected</span>
                                                            @else
                                                                <span class="badge badge-secondary badge-xs">unknown</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md mx-2 d-flex flex-column">
                                                        <span
                                                            style="font-size:11px;font-weight:600">{{ $recentExpenses->category_name }}</span>
                                                        <span
                                                            style="font-size:11px">{{ $recentExpenses->merchant }}</span>
                                                    </div>
                                                    <div class="col-md d-flex flex-column justify-content-end text-end">
                                                        <span style="font-size:10px;">Total</span>
                                                        <span style="font-size:11px;font-weight:600">Rp
                                                            {{ number_format($recentExpenses->total_amount, 2) }}</span>

                                                    </div>
                                                </div>

                                                <div class="col-md d-flex justify-content-end w-100">
                                                    <div class="col-md">
                                                        @if ($recentExpenses->status == 'pending')
                                                            <div class="d-flex flex-row pt-3 d-flex justify-content-end">
                                                                <button
                                                                    onclick="approvalDecision('{{ Auth::user()['id'] }}', '{{ $recentExpenses->approval_id }}', 'approved')"
                                                                    data-bs-toggle="tooltip"
                                                                    class="mx-0 btn text-white d-flex align-items-center d-flex justify-content-center"
                                                                    data-bs-original-title="Approve" data-toggle="tooltip"
                                                                    data-placement="left" title="Approve this expenses"
                                                                    style="width:65px;height:25px; background-color:#50B720;border:none;border-radius:5px">
                                                                    <i
                                                                        class="fas fa-circle-check text-white text-md me-1"></i>
                                                                    <span style="font-size: 0.6em">Approved</span>
                                                                </button>
                                                                <button
                                                                    onclick="approvalDecision('{{ Auth::user()['id'] }}', '{{ $recentExpenses->approval_id }}', 'rejected')"
                                                                    data-bs-toggle="tooltip"
                                                                    class="ms-2  btn text-white d-flex align-items-center d-flex justify-content-center"
                                                                    data-bs-original-title="reject" data-toggle="tooltip"
                                                                    data-placement="left" title="Reject this expenses"
                                                                    style="width:65px;height:25px; background-color:#E40909;border:none;border-radius:5px">
                                                                    <i
                                                                        class="fas fa-circle-xmark text-white text-md me-1"></i>
                                                                    <span style="font-size: 0.6em;">Reject</span>
                                                                </button>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
        @if (session()->get('is_superadmin') == true)
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="coloumn_top_3">
                        <p style="font-weight: 500; font-size:16px; color:black">Top 3 Expense</p>
                        @foreach ($data['top_user_expense'] as $topUser)
                            <div class="d-flex justify-content-between align-items-center">

                                <div class="d-flex align-items-center">

                                    <div class="mt-2" style="">
                                        @if ($topUser->profile_picture == true)
                                            <img src="{{ config('storage.base_url') . $topUser->profile_picture }}"
                                                class="img-fluid"
                                                style="border:1px solid gray; border-radius:50%; width:40px; height:40px"
                                                alt="" id="imgUser">
                                        @else
                                            <img src="{{ asset('img/team-2.jpg') }}" class="img-fluid"
                                                style="border:1px solid gray; border-radius:50%; width:40px"
                                                alt="" id="imgUser">
                                        @endif
                                    </div>
                                    <div class="ms-3">
                                        <span class="text-dark text-sm" id="full_Name">{{ $topUser->full_name }}</span>
                                    </div>
                                </div>
                                <div class="col-md mt-2 text-end">
                                    <span style="font-size:12px;">Total Amount
                                        <p class="text-sm text-dark" id="amountUser" style="font-weight:600">
                                            {{ number_format($topUser->total_amount, 2) }}</p>
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="coloumn_top_3">
                        <p style="font-weight: 500; font-size:16px; color:#000000">Top 3 Group Expense</p>
                        <figure class="highcharts-figure">
                            <div id="top_3_group" style="min-height:220px; height:100%"></div>
                        </figure>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="coloumn_top_3">
                        <p style="font-weight: 500; font-size:16px;color:#000000">Most Visited Merchants</p>
                        @php
                            $num = 1;
                        @endphp
                        <div class="table-responsive" style="max-height:200px;overflow-y:auto">
                            <table class="table table-borderless">
                                <thead>
                                    <th class="text-dark" style="font-size:13px;font-weight:600">No</th>
                                    <th class="text-dark ps-2" style="font-size:13px;font-weight:600">Merchant Name
                                    </th>
                                    <th class="text-dark" style="font-size:13px;font-weight:600">Visited</th>
                                    <th class="text-dark" style="font-size:13px;font-weight:600">Total Amount</th>
                                </thead>
                                <tbody>
                                    @foreach ($data['top_merchant_expense'] as $topMerchant)
                                        <tr>
                                            <td class="align-middle">
                                                <div class="d-flex justify-content-center text-dark"
                                                    style="font-size:13px;">
                                                    {{ $num++ }}
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <div class="d-flex justify-content-start text-start text-dark"
                                                    style="font-size:13px;">
                                                    {{ $topMerchant->merchant }}
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <div class="d-flex justify-content-center text-dark"
                                                    style="font-size:13px; font-weight:600">
                                                    {{ $topMerchant->count }}
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <div class="d-flex justify-content-center text-dark"
                                                    style="font-size:13px;">Rp.
                                                    {{ number_format($topMerchant->total_amount, 2) }}
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                            <thead>
                                <th class="text-dark" style="font-size:13px;font-weight:600">No</th>
                                <th class="text-dark" style="font-size:13px;font-weight:600">Merchant Name</th>
                                <th class="text-dark" style="font-size:13px;font-weight:600">Visited</th>
                                <th class="text-dark" style="font-size:13px;font-weight:600">Total Amont</th>
                            </thead>
                            <tbody>
                                @foreach ($data['top_merchant_expense'] as $topMerchant)
                                    <tr>
                                        <td class="align-middle">
                                            <div class="d-flex justify-content-center text-dark" style="font-size:13px;">
                                                {{ $num++ }}
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <div class="d-flex justify-content-center text-dark" style="font-size:13px;">
                                                {{ $topMerchant->merchant }}
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <div class="d-flex justify-content-center text-dark" style="font-size:13px;">

                                                {{ $topMerchant->count }}
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <div class="d-flex justify-content-center text-dark"
                                                style="font-size:13px;font-weight:600">
                                                {{ number_format($topMerchant->total_amount, 2) }}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif

        @if (session()->get('is_superadmin') == true)
            <div class="row">
                <div class="col-md">
                    <div class="card py-4 px-3" style="border-radius:5px">
                        <div class="d-flex justify-content-between">
                            <div class="text-dark ps-2" style="font-size:16px;font-weight:500">
                                Expense Data
                            </div>
                            <div>
                                <button class="btn text-white btn-sm" style="background:#19194b"
                                    onclick="htmlTableToExcel('xlsx')">export
                                    excel</button>
                            </div>
                        </div>
                        <div class="table-responsive" style="max-height:400px; overflow-y:auto">
                            <table id="reportsToExcel" class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-9">upload
                                            date
                                        </th>
                                        <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-9">upload
                                            time
                                        </th>
                                        <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-9 ps-2">
                                            Group
                                        </th>
                                        <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-9 ps-2"
                                            width="20%">Expense By
                                        </th>
                                        <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-9 ps-2">
                                            Role
                                        </th>
                                        <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-9">receipt
                                            date
                                        </th>
                                        <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-9 ps-2"
                                            width="15%">
                                            Merchant</th>
                                        <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-9 ps-2">
                                            Expense Type</th>
                                        <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-9">
                                            Amount</th>
                                        <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-9">
                                            Status</th>
                                        <th class="text-dark opacity-9"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['reports'] as $reports)
                                        <tr>
                                            <td class="align-middle text-start ps-4">
                                                <span
                                                    class="text-dark text-xs fw-semibold">{{ date('Y-m-d', strtotime($reports->created_at)) }}</span>
                                            </td>
                                            <td class="align-middle text-start ps-4">
                                                <span
                                                    class="text-dark text-xs fw-semibold">{{ date('H:i:s', strtotime($reports->created_at)) }}</span>
                                            </td>
                                            <td class="align-middle text-start ps-2">
                                                <p class="text-xs text-dark fw-semibold mb-0">{{ $reports->group_name }}
                                                </p>
                                            </td>
                                            <td>
                                                <p class="text-xs text-dark fw-semibold mb-0">{{ $reports->expense_by }}
                                                </p>
                                            </td>
                                            <td>
                                                <p class="text-xs text-dark fw-semibold mb-0">{{ $reports->role_name }}
                                                </p>
                                            </td>
                                            <td class="align-middle text-start ps-4">
                                                <span
                                                    class="text-dark text-xs fw-semibold">{{ $reports->receipt_date }}</span>
                                            </td>
                                            <td>
                                                <p class="text-xs text-dark fw-semibold mb-0">{{ $reports->merchant }}</p>
                                            </td>
                                            <td class="align-middle text-start text-break text-wrap text-xs">
                                                <span class="text-dark">{{ $reports->expense_type }}</span>
                                            </td>
                                            <td class="align-middle text-start ps-4">
                                                <span
                                                    class="text-dark text-xs fw-semibold">{{ number_format($reports->total_amount, 2) }}</span>
                                            </td>
                                            <td class="align-middle text-start text-sm ps-4">
                                                @if ($reports->status == 'approved')
                                                    <span class="badge badge-xs d-flex justify-content-center text-center"
                                                        style="border:1px solid #50B720; color:#50B720; width: 70px">{{ $reports->status }}</span>
                                                @elseif ($reports->status == 'rejected')
                                                    <span class="badge badge-xs d-flex justify-content-center text-center"
                                                        style="border:1px solid #dc2424; color:#dc2424; width: 70px">{{ $reports->status }}</span>
                                                @else
                                                    <span class="badge badge-xs d-flex justify-content-center text-center"
                                                        style="border:1px solid #d6cb00; color:#d6cb00; width: 70px">{{ $reports->status }}</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </section>

    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>

    <script>
        $(document).ready(function() {

            var imgUser = document.getElementById('imgUser').value;
            var fullName = document.getElementById('fullName').value;
            var amountUser = document.getElementById('amountUser').value;

            var formData = new FormData();

            formData.append('profile_picture', imgUser);
            formData.append('full_name', fullName);
            formData.append('total_amount', amountUser);

            $.ajaxSetup({
                headers: {
                    "Authorization": "Bearer " + AUTH_TOKEN,
                    "Accept": "application/json"
                }
            });

            $.ajax({
                type: "GET",
                url: API_URL + "analytics/most/amount/user?limit=3",
                data: formData,
            });
        });
    </script>



    {{-- approval  --}}
    <script>
        function approvalDecision(userId, approval_id, decision) {
            console.log(userId);
            console.log(approval_id);
            console.log(decision);
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success-cstm mx-2",
                    cancelButton: "btn btn-danger-cstm mx-2",
                },
                buttonsStyling: false,
            });
            swalWithBootstrapButtons
                .fire({
                    title: "<h5>Are you sure you want to process?</h5>",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    reverseButtons: false,
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        var formData = new FormData();
                        formData.append('tenant_code', TENANT_CODE);
                        formData.append('user_id', userId);
                        formData.append('approval_id', approval_id);
                        formData.append('decision', decision);

                        $.ajaxSetup({
                            headers: {
                                "Authorization": "Bearer " + AUTH_TOKEN,
                                "Accept": "application/json",
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $.ajax({
                            url: API_URL + "api/expense/approval",
                            type: 'post',
                            data: formData,
                            contentType: false,
                            processData: false,
                            beforeSend: function() {
                                if ($("#loader")) {
                                    $("#loader").show();
                                }
                            },
                            success: function(res) {
                                if (res['success'] == "true" || res['success'] == true) {
                                    swalWithBootstrapButtons.fire(
                                        "Success!",
                                        "Your request success.",
                                        "success"
                                    );
                                } else {
                                    swalWithBootstrapButtons.fire(
                                        "Error!",
                                        "Your request can't processed.",
                                        "error"
                                    );
                                }
                            },
                            complete: function(data) {
                                if ($("#loader")) {
                                    $("#loader").hide();
                                }
                                setTimeout(function() {
                                    location.reload();
                                }, 1000);
                            }
                        });
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        swalWithBootstrapButtons.fire(
                            "Cancelled",
                            "Your request cancelled :)",
                            "error"
                        );
                    }
                });
        }
    </script>
    {{-- approval  --}}


    <script>
        // Data retrieved from https://gs.statcounter.com/browser-market-share#monthly-202201-202201-bar

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    "Authorization": "Bearer " + AUTH_TOKEN,
                    "Accept": "application/json"

                }
            });

            $.ajax({
                type: "GET",
                url: API_URL + "api/analytics/most/amount/group",
                // formData:
                success: function(res) {
                    if (res) {
                        var response = res['data'];
                        var dataBar = [];
                        var iterate = 0;
                        for (const objx of response) {
                            dataBar[iterate] = {
                                'name': objx.group_name,
                                'y': parseInt(objx.total_amount),
                                'drilldown': objx.group_name
                            }
                            iterate++;
                        }
                        console.log(dataBar);
                    } else {

                    }
                    // Create the chart
                    Highcharts.chart('top_3_group', {
                        chart: {
                            type: 'bar'
                        },
                        title: {
                            align: '',
                            text: ''
                        },
                        exporting: false,
                        // subtitle: {
                        //     align: 'left',
                        //     text: 'Click the columns to view versions. Source: <a href="http://statcounter.com" target="_blank">statcounter.com</a>'
                        // },
                        credits: {
                            enabled: false
                        },
                        colors: [
                            '#191a4d', '#ff720c', '#563379'
                        ],
                        accessibility: {
                            announceNewData: {
                                enabled: true
                            }
                        },
                        xAxis: {
                            type: 'category',
                            title: {
                                text: ''
                            }
                        },
                        yAxis: {
                            title: {
                                text: ''
                            }

                        },
                        legend: {
                            enabled: false
                        },
                        plotOptions: {
                            series: {
                                borderWidth: 0,
                                dataLabels: {
                                    enabled: true,
                                    formatter: function() {
                                        return 'Rp.' + Highcharts.numberFormat(this.y, 0);
                                    }
                                }
                            }
                        },

                        // tooltip: {
                        //     headerFormat: '',
                        //     pointFormat: ''
                        // },

                        series: [{
                            name: "Total Amount",
                            colorByPoint: true,
                            data: dataBar
                        }],

                    });

                }
            });


        });
    </script>

    <script>
        function htmlTableToExcel(type) {
            var data = document.getElementById('reportsToExcel');
            var excelFile = XLSX.utils.table_to_book(data, {
                sheet: "sheet1"
            });
            XLSX.write(excelFile, {
                bookType: type,
                bookSST: true,
                type: 'base64'
            });
            XLSX.writeFile(excelFile, 'ExpenseData ' + getNow() + '.' + type);
        }

        function getNow() {
            var today = new Date();
            var dd = today.getDate();

            var mm = today.getMonth() + 1;
            var yyyy = today.getFullYear();
            if (dd < 10) {
                dd = '0' + dd;
            }

            if (mm < 10) {
                mm = '0' + mm;
            }

            today = mm + '-' + dd + '-' + yyyy;
            return today;
        }
    </script>

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
                url: API_URL + "api/user/profile/info?user_id=" + document.getElementById(
                    'fullname_uid').value,
                success: function(res) {
                    if (res) {
                        var response = res['data'];
                        // console.log(res);
                        document.getElementById('fullName').innerHTML = response[
                            'full_name'];
                    }
                }
            });
        });
    </script>
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
                        title: "<h5>are you sure want to process?</h5>",
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
                gap: 10,
                speed: 1500,
                perPage: 1,
            }).mount();
        });
    </script>
    <script>
        var FilterExpenseType = "";
        var FilterStartDate = "";
        var FilterEndDate = "";
        var FilterGroup = "";
        var FilterMember = "";
        if (window.location.search) {
            const queryString = window.location.search;
            if (queryString != "" || queryString != null || queryString > 0) {
                const urlParams = new URLSearchParams(queryString);
                FilterExpenseType = urlParams.get('filter_expense_type');
                FilterStartDate = urlParams.get('filter_start_date');
                FilterEndDate = urlParams.get('filter_end_date');
                FilterGroup = urlParams.get('filter_group');
                FilterMember = urlParams.get('filter_member');
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
            url: API_URL + "api/v2/analytics/series/" + USR_ID +
                "?expense_type=" + FilterExpenseType +
                "&start_date=" + FilterStartDate +
                "&end_date=" + FilterEndDate +
                "&group_id=" + FilterGroup +
                "&member_id=" + FilterMember,
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
                            // format: '{value}Â°C',
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
                        maxPointWidth: 20,
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
                    Swal.fire('failed<br>please contact ximply support');
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
            url: API_URL + "api/v2/analytics/pie/" + document.getElementById('user_id').value +
                "?expense_type=" + FilterExpenseType +
                "&start_date=" + FilterStartDate +
                "&end_date=" + FilterEndDate +
                "&group_id=" + FilterGroup +
                "&member_id=" + FilterMember,
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
                                        distance: 35,
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
                    Swal.fire('failed<br>please contact ximply support');
                }
            }
        });

        const params = getQueryParams();

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
                            $("#filter_expense_type").append('<option value="' + CategoryId +
                                '"' + (CategoryId == params.filter_expense_type ? 'selected' :
                                    '') + '>' + CategoryName + '</option>');
                        }
                    } else {
                        $("#filter_expense_type").empty();
                    }
                }
            });
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
                url: API_URL + "api/list/groups",
                success: function(res) {
                    if (res) {
                        var response = res['data'];
                        for (const obj of response) {
                            $("#filter_group").append('<option value="' + obj.id +
                                '"' + (obj.id == params.filter_group ? 'selected' :
                                    '') + '>' + obj.group_name + '</option>');
                        }
                    } else {
                        $("#filter_group").empty();
                    }
                }
            });
        });

        $('#filter_group').on('change', function() {
            var group_id = $(this).val();
            if (group_id) {
                $.ajaxSetup({
                    headers: {
                        "Authorization": "Bearer " + AUTH_TOKEN,
                        "Accept": "application/json"
                    }
                });
                $.ajax({
                    type: "GET",
                    url: API_URL + "api/list/users/" + group_id,
                    success: function(res) {
                        if (res) {
                            var response = res['data'];
                            $("#filter_member").empty();
                            for (const obj of response) {
                                $("#filter_member").append('<option value="' + obj.id +
                                    '"' + (obj.id == params.filter_member ? 'selected' :
                                        '') + '>' + obj.name + '</option>');
                            }
                        } else {
                            $("#filter_member").empty();
                        }
                    }
                });
            } else {
                $("#filter_member").empty();
            }
        });
    </script>
@endsection
