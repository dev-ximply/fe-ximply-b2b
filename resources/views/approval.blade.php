@extends('layouts.main')



@section('container')
    @include('approval.popUpimage')
    @include('expenses.view-expense-detail')
    @include('expenses.view-expense-review-detail')


    <div class="row">
        <div class="col-12">
            <div class="row mb-4 mx-1">
                <div class="col-md mt-2 px-0 mx-0">
                    <h5 class="mb-0 text-dark text-uppercase font-weight-bolder">All Approval Data</h5>
                    <p class="text-sm mb-0 text-dark">
                        Expenses data that required a decision from you.
                    </p>
                </div>
                <div class="col-md text-md-end text-start mt-2 px-0 mx-0">
                    @if (session()->get('is_superadmin') == false)
                        <p class="mb-0 text-xs text-uppercase font-weight-bolder" style="color:black">Remain Budget</p>
                        <h5 class=" mb-0  font-weight-bolder" style="color:black">
                            Rp <span>
                                {{ $data['limit'] != null ? number_format($data['limit']['remain_limit'], 2) : '0' }}
                            </span>
                        </h5>
                    @endif
                </div>
            </div>

            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#approval">List Expense</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#history">History</a>
                </li>
            </ul>
            <div class="card" style="border-radius: 5px">
                <!-- Card header -->
                <div class="card-body pb-0 px-0">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="approval" class="container tab-pane active "><br>
                            <div class="row">
                                <div class="d-flex mb-4 justify-content-start justify-content-md-end">
                                    <form id="formSearch" action="" style="z-index: 0"
                                        onsubmit="handleChangeStatuss(event)">
                                        <div class="row">
                                            <div class="col-md mt-2">

                                                <input type="date" class="form-control rounded text-dark px-2"
                                                    name="start" value="{{ old(isset($_GET['start'])) }}"
                                                    style="font-size:12px; height: 30px; width: 130px; background:#fbfbfb">
                                            </div>
                                            <div class="col-md mt-2">

                                                <input type="date" class="form-control rounded text-dark px-2"
                                                    name="end" value="{{ old(isset($_GET['end'])) }}"
                                                    style="font-size:12px; height: 30px; width: 130px; background:#fbfbfb">
                                            </div>
                                            <div class="col-md mt-2">
                                                <select name="filter_user" id="filter_user"
                                                    class="form-select text-capitalize text-dark"
                                                    style="font-size:12px; line-height: 13px; width:130px; background:#fbfbfb">
                                                    {{-- <option value="" >All</option> --}}


                                                    @foreach ($data['list_group_users'] as $members)
                                                        <option {{ isset($_GET['filter_user']) }}
                                                            value="{{ $members->id }}" class="text-capitalize">
                                                            {{ $members->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            {{-- <div class="col-md mt-2">
                                                <select name="statusT" id="" class="text-secondary "
                                                    style="font-size:12px; height: 30px; width:120px; max-width:120px; border:1px solid #efefef; border-radius:8px;background:#fbfbfb">
                                                    <option value="">Status</option>
                                                    <option
                                                        {{ isset($_GET['statusT']) && $_GET['statusT'] == 'pending' ? 'selected' : '' }}
                                                        value="pending">Pending</option>
                                                    <option
                                                        {{ isset($_GET['statusT']) && $_GET['statusT'] == 'rejected' ? 'selected' : '' }}
                                                        value="rejected">Rejected</option>
                                                    <option
                                                        {{ isset($_GET['statusT']) && $_GET['statusT'] == 'approved' ? 'selected' : '' }}
                                                        value="approved">Approved</option>
                                                    <option
                                                        {{ isset($_GET['statusT']) && $_GET['statusT'] == 'done' ? 'selected' : '' }}
                                                        value="done">Done</option>
                                                </select>
                                            </div> --}}

                                            {{-- <div class="col-md mt-2 position-relative">
                                                <input type="text" class="px-2 border" placeholder="Search member..."
                                                    style="width:180px; border-radius:8px; height:35px; background:#fbfbfb;font-size:12px">
                                                <div class="position-absolute" style="top:5px;right:25px">
                                                    <button type="submit" id="filter_button" class="" style="background:transparent">
                                                        <i class="fa-solid fa-magnifying-glass" style="font-size:15px;color:gray"></i>
                                                    </button>
                                                </div>
                                            </div> --}}
                                            <div class="col-md mt-2">
                                                <button type="submit" value="submit"
                                                    style="line-height:10px; height:30px; font-size:11px;background:#19194b;color:white"
                                                    class="form-control text-bold d-flex justify-content-center align-items-center"
                                                    id="filter_button">

                                                    <span>FILTER&nbsp;<i class="fa-solid fa-magnifying-glass"
                                                            style="font-size:9px"></i></span>

                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md pb-0">
                                <div class="table-responsive">
                                    <table class="table table-flush">
                                        <thead class="thead-light">
                                            <tr>
                                                <th class="text-uppercase  text-xxs font-weight-bolder opacity-9"
                                                    style="color:black">
                                                    Expenses
                                                </th>
                                                <th class="text-uppercase  text-xxs font-weight-bolder opacity-9"
                                                    style="color:black">
                                                    Submit Date
                                                </th>
                                                <th class="text-uppercase  text-xxs font-weight-bolder opacity-9"
                                                    style="color:black">
                                                    Expenses
                                                    Type</th>
                                                <th class="text-uppercase  text-xxs font-weight-bolder opacity-9"
                                                    style="color:black">
                                                    Purpose
                                                </th>
                                                <th class="text-uppercase  text-xxs font-weight-bolder opacity-9"
                                                    style="color:black">
                                                    Merchant
                                                </th>
                                                <th class="text-uppercase  text-xxs font-weight-bolder opacity-9"
                                                    style="color:black">
                                                    Amount
                                                </th>
                                                <th class="text-uppercase  text-xxs font-weight-bolder opacity-9"
                                                    style="color:black">
                                                    Note
                                                </th>
                                                <th class="text-uppercase  text-xxs font-weight-bolder opacity-9"
                                                    style="color:black">
                                                    Status
                                                </th>
                                                <th class="text-uppercase  text-xxs text-start ps-3 font-weight-bolder opacity-9"
                                                    style="color:black">Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data['expense_approval'] as $expense_approval)
                                                <tr>
                                                    <td class="align-middle text-start text-capitalize text-xs pe-4">
                                                        <div class="d-flex">
                                                            <img src="{{ config('storage.base_url') . $expense_approval->receipt_picture_directory }}"
                                                                class="img-fluid ms-3" alt="receipt" style="width: 50px">
                                                            <div class="ms-3 my-auto show-modal">
                                                                <div>
                                                                    <span
                                                                        class="text-xs text-dark text-bold text-break text-wrap">
                                                                        {{ $expense_approval->sub_category_name }}
                                                                    </span>
                                                                </div>
                                                                <div>
                                                                    <span class="text-xs text-dark">
                                                                        {{ $expense_approval->full_name }}
                                                                    </span>
                                                                </div>
                                                                <div>
                                                                    <span class="text-xxs text-dark">
                                                                        {{ $expense_approval->receipt_date }}
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="ps-4 align-middle text-start text-xs text-capitalize text-dark text-break text-wrap">
                                                        {{-- {{ $expense_approval->created_at }} --}}
                                                        {{ Carbon\Carbon::parse($expense_approval->created_at)->format('Y-m-d') }}

                                                    </td>
                                                    <td
                                                        class="ps-4 align-middle text-start text-xs text-capitalize text-dark text-break text-wrap">
                                                        {{ $expense_approval->category_name }}
                                                    </td>
                                                    <td
                                                        class="ps-4 align-middle text-start text-xs text-dark text-break text-wrap">
                                                        {{ $expense_approval->purpose_name }}
                                                    </td>
                                                    <td
                                                        class="ps-4 align-middle text-start text-xs text-dark text-break text-wrap">
                                                        {{ $expense_approval->merchant }}
                                                    </td>
                                                    <td class="ps-4 align-middle text-start text-xs text-dark">
                                                        {{ number_format($expense_approval->total_amount, 2) }}
                                                    </td>
                                                    <td class="ps-4 align-middle text-start text-xs text-dark">
                                                        <span class="text-break text-wrap">
                                                            {{ $expense_approval->note }}
                                                        </span>
                                                    </td>
                                                    <td class="ps-4 align-middle text-start text-xs">
                                                        @if ($expense_approval->status == 'pending')
                                                            <span class="badge badge-xs d-flex justify-content-center"
                                                                style="border:1px solid #FFCF23; color:#FFCF23; width: 55px">pending</span>
                                                        @elseif ($expense_approval->status == 'approved')
                                                            <span class="badge badge-xs d-flex justify-content-center"
                                                                style="border:1px solid #50B720; color:#50B720; width: 55px">approved</span>
                                                        @elseif ($expense_approval->status == 'rejected')
                                                            <span class="badge badge-xs d-flex justify-content-center"
                                                                style="border:1px solid #E40909; color:#E40909; width: 55px">rejected</span>
                                                        @else
                                                            <span class="badge badge-secondary badge-xs">unknown</span>
                                                        @endif
                                                    </td>
                                                    <td class="ps-md-2 text-sm align-middle text-center">
                                                        @if ($expense_approval->status == 'pending')
                                                            <div
                                                                class="d-flex flex-row pt-3 d-flex justify-content-center">
                                                                <button
                                                                    onclick="getExpenseApprovalData('{{ $expense_approval->receipt_picture_directory }}', '{{ $expense_approval->additional_picture_directory }}', '{{ $expense_approval->receipt_date }}', `{{ $expense_approval->merchant }}`, '{{ $expense_approval->total_amount }}', '{{ $expense_approval->location }}', '{{ $expense_approval->category_name }}', '{{ $expense_approval->sub_category_name }}', '{{ $expense_approval->client_name }}', '{{ $expense_approval->purpose_name }}', '{{ $expense_approval->expense_of }}', '{{ $expense_approval->note }}', '{{ $expense_approval->status }}', '{{ $expense_approval->approval_id }}')"
                                                                    class="mx-1
                                                                    btn text-white d-flex align-items-center d-flex
                                                                    justify-content-center"
                                                                    data-bs-original-title="approve" data-toggle="tooltip"
                                                                    data-placement="left" title="Review"
                                                                    style="width: 60px; height:25px; background-color:#FFCF23"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#viewExpenseDetailReview">
                                                                    <i
                                                                        class="fa-sharp fa-solid fa-pen-to-square text-white text-md me-1"></i>
                                                                    <span style="font-size: 0.6em">Review</span>
                                                                </button>
                                                                <button
                                                                    onclick="approvalDecision('{{ Auth::user()['id'] }}', '{{ $expense_approval->approval_id }}', 'approved')"
                                                                    data-bs-toggle="tooltip"
                                                                    class="mx-1 btn  text-white d-flex align-items-center d-flex justify-content-center"
                                                                    data-bs-original-title="Approve" data-toggle="tooltip"
                                                                    data-placement="left" title="Approve this expenses"
                                                                    style="width: 60px; height:25px; background-color:#50B720">
                                                                    <i
                                                                        class="fas fa-circle-check text-white text-md me-1"></i>
                                                                    <span style="font-size: 0.6em">Approve</span>
                                                                </button>
                                                                <button
                                                                    onclick="approvalDecision('{{ Auth::user()['id'] }}', '{{ $expense_approval->approval_id }}', 'rejected')"
                                                                    data-bs-toggle="tooltip"
                                                                    class="mx-1 btn  text-white d-flex align-items-center d-flex justify-content-center"
                                                                    data-bs-original-title="reject" data-toggle="tooltip"
                                                                    data-placement="left" title="Reject this expenses"
                                                                    style="width: 60px; height:25px; background-color:#E40909">
                                                                    <i
                                                                        class="fas fa-circle-xmark text-white text-md me-1"></i>
                                                                    <span style="font-size: 0.6em">Reject</span>
                                                                </button>
                                                            </div>
                                                        @else
                                                            <div class="ps-md-0 pt-3 d-flex justify-content-start">
                                                                <button
                                                                    onclick="getExpenseData('{{ $expense_approval->receipt_picture_directory }}', '{{ $expense_approval->additional_picture_directory }}', '{{ $expense_approval->receipt_date }}', `{{ $expense_approval->merchant }}`, '{{ $expense_approval->total_amount }}', '{{ $expense_approval->location }}', '{{ $expense_approval->category_name }}', '{{ $expense_approval->sub_category_name }}', '{{ $expense_approval->client_name }}', '{{ $expense_approval->purpose_name }}', '{{ $expense_approval->expense_of }}', '{{ $expense_approval->note }}', '{{ $expense_approval->status }}', '{{ $expense_approval->approval_id }}')"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#viewExpenseDetail"
                                                                    class="mx-1 btn  text-white d-flex align-items-center d-flex justify-content-center"
                                                                    style="width: 60px; height:25px; background-color:#FFCF23">
                                                                    <i
                                                                        class="fas fa-circle-check text-white text-md me-1"></i>
                                                                    <span style="font-size: 0.6em">Detail</span>
                                                                </button>
                                                            </div>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="history" class="container tab-pane fade"><br>
                            <div class="row">
                                <div class="d-flex mb-4 justify-content-start justify-content-md-end">
                                    <form id="formSearch" action="" style="z-index: 0"
                                        onsubmit="handleChangeStatus(event)">
                                        <div class="row">

                                            {{-- <div class="col-md mt-2">

                                                <input type="date" class="form-control rounded text-secondary px-2"
                                                    name="start" value="{{ old(isset($_GET['start'])) }}"
                                                    style="font-size:12px; height: 30px; width: 130px; background:#fbfbfb">
                                            </div>
                                            <div class="col-md mt-2">

                                                <input type="date" class="form-control rounded text-secondary px-2"
                                                    name="end" value="{{ old(isset($_GET['end'])) }}"
                                                    style="font-size:12px; height: 30px; width: 130px; background:#fbfbfb">
                                            </div>
                                            <div class="col-md mt-2">
                                                <select name="filter_user" id="filter_user"
                                                    class="form-select text-capitalize"
                                                    style="font-size:12px; line-height: 13px; width:130px; background:#fbfbfb">
                                                    @foreach ($data['list_group_users'] as $members)
                                                        <option {{ isset($_GET['filter_user']) }}
                                                            value="{{ $members->id }}" class="text-capitalize">
                                                            {{ $members->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div> --}}

                                            <div class="col-md mt-2">
                                                <select name="statusType" id="status"
                                                    class="text-dark border-secondary"
                                                    style="font-size:12px; height: 30px; width:130px; max-width:120px; border:1px solid #efefef; border-radius:8px;background:#fbfbfb">
                                                    <option
                                                        {{ isset($_GET['statusType']) && $_GET['statusType'] == 'done' ? 'selected' : '' }}
                                                        value="done">Status</option>
                                                    <option
                                                        {{ isset($_GET['statusType']) && $_GET['statusType'] == 'done' ? 'selected' : '' }}
                                                        value="done">Done</option>
                                                    <option
                                                        {{ isset($_GET['statusType']) && $_GET['statusType'] == 'rejected' ? 'selected' : '' }}
                                                        value="rejected">Rejected</option>
                                                    <option
                                                        {{ isset($_GET['statusType']) && $_GET['statusType'] == 'approved' ? 'selected' : '' }}
                                                        value="approved">Approved</option>

                                                </select>
                                            </div>

                                            {{-- <div class="col-md mt-2">
                                                <button type="submit" value="submit"
                                                    style="line-height:10px; height:30px; font-size:11px;background:#19194b;color:white"
                                                    class="form-control text-bold d-flex justify-content-center align-items-center"
                                                    id="filter_button">

                                                    <span>FILTER&nbsp;<i class="fa-solid fa-magnifying-glass"
                                                            style="font-size:9px"></i></span>

                                                </button>
                                            </div> --}}

                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md pb-0">
                                <div class="table-responsive">
                                    <table class="table table-flush">
                                        <thead class="thead-light">
                                            <tr>
                                                <th class="text-uppercase  text-xxs font-weight-bolder opacity-9"
                                                    style="color:black">
                                                    Expenses
                                                </th>
                                                <th class="text-uppercase  text-xxs font-weight-bolder opacity-9"
                                                    style="color:black">
                                                    Submit Date
                                                </th>
                                                <th class="text-uppercase  text-xxs font-weight-bolder opacity-9"
                                                    style="color:black">
                                                    Expenses
                                                    Type</th>
                                                <th class="text-uppercase  text-xxs font-weight-bolder opacity-9"
                                                    style="color:black">
                                                    Purpose
                                                </th>
                                                <th class="text-uppercase  text-xxs font-weight-bolder opacity-9"
                                                    style="color:black">
                                                    Merchant
                                                </th>
                                                <th class="text-uppercase  text-xxs font-weight-bolder opacity-9"
                                                    style="color:black">
                                                    Amount
                                                </th>
                                                <th class="text-uppercase  text-xxs font-weight-bolder opacity-9"
                                                    style="color:black">
                                                    Note
                                                </th>
                                                <th class="text-uppercase  text-xxs font-weight-bolder opacity-9"
                                                    style="color:black">
                                                    Status
                                                </th>
                                                <th class="text-uppercase  text-xxs text-start ps-3 font-weight-bolder opacity-9"
                                                    style="color:black">Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="tableBody">
                                            @foreach ($data['history_approval'] as $history_approval)
                                                <tr>
                                                    <td class="align-middle text-start text-capitalize text-xs pe-4">
                                                        <div class="d-flex">
                                                            <img src="{{ config('storage.base_url') . $history_approval->receipt_picture_directory }}"
                                                                class="img-fluid ms-3" alt="receipt"
                                                                style="width: 50px">
                                                            <div class="ms-3 my-auto show-modal">
                                                                <div>
                                                                    <span
                                                                        class="text-xs text-dark text-bold text-break text-wrap">
                                                                        {{ $history_approval->sub_category_name }}
                                                                    </span>
                                                                </div>
                                                                <div>
                                                                    <span class="text-xs text-dark">
                                                                        {{ $history_approval->full_name }}
                                                                    </span>
                                                                </div>
                                                                <div>
                                                                    <span class="text-xxs text-dark">
                                                                        {{ $history_approval->receipt_date }}
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="ps-4 align-middle text-start text-xs text-capitalize text-dark text-break text-wrap">

                                                        {{ Carbon\Carbon::parse($history_approval->created_at)->format('Y-m-d') }}

                                                    </td>
                                                    <td
                                                        class="ps-4 align-middle text-start text-xs text-capitalize text-dark text-break text-wrap">
                                                        {{ $history_approval->category_name }}
                                                    </td>
                                                    <td
                                                        class="ps-4 align-middle text-start text-xs text-dark text-break text-wrap">
                                                        {{ $history_approval->purpose_name }}
                                                    </td>
                                                    <td
                                                        class="ps-4 align-middle text-start text-xs text-dark text-break text-wrap">
                                                        {{ $history_approval->merchant }}
                                                    </td>
                                                    <td class="ps-4 align-middle text-start text-xs text-dark">
                                                        {{ number_format($history_approval->total_amount, 2) }}
                                                    </td>
                                                    <td class="ps-4 align-middle text-start text-xs text-dark">
                                                        <span class="text-break text-wrap">
                                                            {{ $history_approval->note }}
                                                        </span>
                                                    </td>
                                                    <td class="ps-4 align-middle text-start text-xs">
                                                        {{-- @if ($history_approval->status == 'pending')
                                                            <span class="badge badge-xs d-flex justify-content-center"
                                                                style="border:1px solid #FFCF23; color:#FFCF23; width: 55px">pending</span> --}}
                                                        @if ($history_approval->status == 'approved')
                                                            <span class="badge badge-xs d-flex justify-content-center"
                                                                style="border:1px solid #50B720; color:#50B720; width: 55px">approved</span>
                                                        @elseif ($history_approval->status == 'rejected')
                                                            <span class="badge badge-xs d-flex justify-content-center"
                                                                style="border:1px solid #E40909; color:#E40909; width: 55px">rejected</span>
                                                        @else
                                                            <span class="badge badge-secondary badge-xs">unknown</span>
                                                        @endif
                                                    </td>
                                                    <td class="ps-md-2 text-sm align-middle text-center">
                                                        @if ($history_approval->status == 'pending')
                                                            <div
                                                                class="d-flex flex-row pt-3 d-flex justify-content-center">
                                                                <button
                                                                    onclick="getExpenseApprovalData('{{ $history_approval->receipt_picture_directory }}', '{{ $history_approval->additional_picture_directory }}', '{{ $history_approval->receipt_date }}', `{{ $history_approval->merchant }}`, '{{ $history_approval->total_amount }}', '{{ $history_approval->location }}', '{{ $history_approval->category_name }}', '{{ $history_approval->sub_category_name }}', '{{ $history_approval->client_name }}', '{{ $history_approval->purpose_name }}', '{{ $history_approval->expense_of }}', '{{ $history_approval->note }}', '{{ $history_approval->status }}', '{{ $history_approval->approval_id }}')"
                                                                    class="mx-1
                                                                    btn text-white d-flex align-items-center d-flex
                                                                    justify-content-center"
                                                                    data-bs-original-title="approve" data-toggle="tooltip"
                                                                    data-placement="left" title="Review"
                                                                    style="width: 60px; height:25px; background-color:#FFCF23"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#viewExpenseDetailReview">
                                                                    <i
                                                                        class="fa-sharp fa-solid fa-pen-to-square text-white text-md me-1"></i>
                                                                    <span style="font-size: 0.6em">Review</span>
                                                                </button>
                                                                <button
                                                                    onclick="approvalDecision('{{ Auth::user()['id'] }}', '{{ $history_approval->approval_id }}', 'approved')"
                                                                    data-bs-toggle="tooltip"
                                                                    class="mx-1 btn  text-white d-flex align-items-center d-flex justify-content-center"
                                                                    data-bs-original-title="Approve" data-toggle="tooltip"
                                                                    data-placement="left" title="Approve this expenses"
                                                                    style="width: 60px; height:25px; background-color:#50B720">
                                                                    <i
                                                                        class="fas fa-circle-check text-white text-md me-1"></i>
                                                                    <span style="font-size: 0.6em">Approve</span>
                                                                </button>
                                                                <button
                                                                    onclick="approvalDecision('{{ Auth::user()['id'] }}', '{{ $history_approval->approval_id }}', 'rejected')"
                                                                    data-bs-toggle="tooltip"
                                                                    class="mx-1 btn  text-white d-flex align-items-center d-flex justify-content-center"
                                                                    data-bs-original-title="reject" data-toggle="tooltip"
                                                                    data-placement="left" title="Reject this expenses"
                                                                    style="width: 60px; height:25px; background-color:#E40909">
                                                                    <i
                                                                        class="fas fa-circle-xmark text-white text-md me-1"></i>
                                                                    <span style="font-size: 0.6em">Reject</span>
                                                                </button>
                                                            </div>
                                                        @else
                                                            <div class="ps-md-0 pt-3 d-flex justify-content-start">
                                                                <button
                                                                    onclick="getExpenseApprovalData('{{ $history_approval->receipt_picture_directory }}', '{{ $history_approval->additional_picture_directory }}', '{{ $history_approval->receipt_date }}', `{{ $history_approval->merchant }}`, '{{ $history_approval->total_amount }}', '{{ $history_approval->location }}', '{{ $history_approval->category_name }}', '{{ $history_approval->sub_category_name }}', '{{ $history_approval->client_name }}', '{{ $history_approval->purpose_name }}', '{{ $history_approval->expense_of }}', '{{ $history_approval->note }}', '{{ $history_approval->status }}', '{{ $history_approval->approval_id }}')"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#viewExpenseDetailReview"
                                                                    class="mx-1 btn  text-white d-flex align-items-center d-flex justify-content-center"
                                                                    style="width: 60px; height:25px; background-color:#FFCF23">
                                                                    <i
                                                                        class="fas fa-circle-check text-white text-md me-1"></i>
                                                                    <span style="font-size: 0.6em">Detail</span>
                                                                </button>
                                                            </div>
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

                </div>


            </div>
        </div>
    </div>

    <script src="{{ asset('js/plugins/datatables.js') }}"></script>

    <script>
        if (document.querySelector('#products-list')) {
            const dataTableSearch = new simpleDatatables.DataTable("#products-list", {
                searchable: false,
                fixedHeight: false,
                perPageSelect: false
            });
        }
    </script>

    {{-- <script>
        $('#exampleModal').modal();
        $('#exampleModal').on('shown.bs.modal', function() {
            $(document).off('focusin.modal');
        });
    </script> --}}

    <script>
        function getExpenseData(receipt_picture_directory, additional_picture_directory, receipt_date, merchant,
            total_amount, location,
            category, sub_category, partner, purpose, expense_of, note, status, approval_id) {
            document.getElementById('detail_receipt_file').src = STORAGE_URL + receipt_picture_directory;
            document.getElementById('detail_additional_file').src = STORAGE_URL + additional_picture_directory;
            document.getElementById('detail_date').value = receipt_date;
            document.getElementById('detail_merchant').value = merchant;
            document.getElementById('detail_total_amount').value = total_amount;
            document.getElementById('detail_location').value = location;
            document.getElementById('detail_category').value = category;
            document.getElementById('detail_sub_category').value = sub_category;
            document.getElementById('detail_partner').value = partner;
            document.getElementById('detail_purpose').value = purpose;
            document.getElementById('detail_note').value = note;
            document.getElementById('dataExpenseOf').value = expense_of;
            approvalID = approval_id;
            if (status == "pending") {
                document.getElementById('decisionButton').style.display = "block";
            } else {
                document.getElementById('decisionButton').style.display = "none";
            }
        }

        function getExpenseApprovalData(receipt_picture_directory, additional_picture_directory, receipt_date, merchant,
            total_amount, location,
            category, sub_category, partner, purpose, expense_of, note, status, approval_id) {

            $.ajax({
                beforeSend: function() {
                    $('#main-loader').show();
                },
                success: function() {

                    document.getElementById('detail_receipt_file_review').src = STORAGE_URL +
                        receipt_picture_directory;
                    document.getElementById('detail_additional_file_review').src = STORAGE_URL +
                        additional_picture_directory;
                    document.getElementById('detail_date_review').value = receipt_date;
                    document.getElementById('detail_merchant_review').value = merchant;
                    document.getElementById('detail_total_amount_review').value = total_amount;
                    document.getElementById('detail_location_review').value = location;
                    document.getElementById('detail_category_review').value = category;
                    document.getElementById('detail_sub_category_review').value = sub_category;
                    document.getElementById('detail_partner_review').value = partner;
                    document.getElementById('detail_purpose_review').value = purpose;
                    document.getElementById('detail_note_review').value = note;
                    document.getElementById('dataExpenseOf_review').value = expense_of;
                    approvalID = approval_id;
                    if (status == "pending") {
                        document.getElementById('decisionButton_review').style.display = "block";
                    } else {
                        document.getElementById('decisionButton_review').style.display = "none";
                    }
                },
                complete: function() {

                    $('#main-loader').hide();
                }
            });

        }


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

                        let check = checkPin("", function() {
                            Approval();
                        });

                        function Approval() {
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

                        }

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

    <script>
        function handleChangeStatuss(event) {
            event.submit();
        }
    </script>



    {{-- filter untuk category --}}
    <script>
        $(document).ready(function() {
            // var tenant_code = TENANT_CODE;
            $.ajaxSetup({
                headers: {
                    "Authorization": "Bearer " + AUTH_TOKEN,
                    "Accept": "application/json",
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $(document).ready(function() {
                var urlSearch = "";
                $('#status').on('change', function() {
                    var status = $('#status').val();
                    urlSearch = API_URL + "api/expense/approval/list/" + TENANT_CODE +
                        '/?user_id=' + USR_ID + "&status=" + status;

                    new getDataExpenses(urlSearch);
                });
            });


            function getDataExpenses(urlSearch) {
                $("#tableBody").html("");
                // $("#totalAmount").html("0.00");
                $.ajaxSetup({
                    headers: {
                        "Authorization": "Bearer " + AUTH_TOKEN,
                        "Accept": "application/json",
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
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
                            var storage = [];
                            // var newDate = Carbon::parse($date)->now()->format('Y-m-d H:i:s');
                            // var totalAmount = 0;

                            for (const obj of response) {
                                // totalAmount = totalAmount + parseFloat(obj.total_amount);
                                // console.log(totalAmount);


                                tableOut += '<tr>' +
                                    // '<td class="align-middle text-start text-capitalize text-xs">' +
                                    // '<div class="d-flex">' + '<img  src="' + STORAGE_URL + obj
                                    // .receipt_picture_directory + '"' +
                                    // 'class="img-fluid ms-3" alt="receipt" style="width: 50px">' +
                                    // '<div class="ms-3 my-auto show-modal">' + 
                                    // '<div> <span class="text-xs text-dark text-bold text-break text-wrap">' + obj
                                    // .sub_category_name + '</span>' + '</div>' + '<div>' +
                                    // '<span class="text-xs text-dark">' + obj.full_name + '</span>' +
                                    // '</div>' + '<div>' +
                                    // '<span class="text-xxs text-dark">' + obj.date + '</span>' +
                                    // '</div>' + '</div>' + '</div>' + '</td>';

                                    '<td class="align-middle text-start text-capitalize text-xs pe-4">' +
                                    '<div class="d-flex">' +
                                    '<img src="' + STORAGE_URL + obj.receipt_picture_directory +
                                    '" class="img-fluid ms-3" alt="receipt" style="width: 50px">' +
                                    '<div class="ms-3 my-auto show-modal">' +
                                    '<div> <span class="text-xs text-dark text-bold text-break text-wrap">' +
                                    obj.sub_category_name +
                                    '</span>' +
                                    '</div>' +
                                    '<div>' +
                                    '<span class="text-xs text-dark">' +
                                    obj.full_name +
                                    '</span>' +
                                    '</div>' +
                                    '<div>' +
                                    '<span class="text-xxs text-dark">' +
                                    obj.receipt_date +
                                    '</span>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '</td>'

                                tableOut +=
                                    '<td class="ps-4 align-middle text-start text-xs text-capitalize text-dark text-break text-wrap">' +
                                    moment(obj.created_at).format("YYYY-MM-DD") +
                                    '</td>'

                                tableOut +=
                                    '<td class="ps-4 align-middle text-start text-xs text-capitalize text-dark text-break text-wrap">' +
                                    obj.category_name +
                                    '</td>';
                                tableOut +=
                                    '<td class="ps-4 align-middle text-start text-xs text-dark text-break text-wrap">' +
                                    obj.purpose_name +
                                    '</td>';
                                tableOut +=
                                    '<td class="ps-4 align-middle text-start text-xs text-dark text-break text-wrap">' +
                                    obj.merchant +
                                    '</td>';
                                tableOut +=
                                    '<td class="ps-4 align-middle text-start text-xs text-dark">' +
                                    obj.total_amount.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g,
                                        "$1,") +
                                    '</td>';

                                tableOut +=
                                    '<td class="ps-4 align-middle text-start text-xs text-dark"><span class="text-break text-wrap">' +
                                    obj.note +
                                    '</span></td>';
                                if (obj.status == 'pending') {
                                    tableOut += '<td class="ps-4 align-middle text-start text-xs">' +
                                        '<span class="badge badge-xs d-flex justify-content-center"' +
                                        'style="border:1px solid #FFCF23; color:#FFCF23; width: 55px">pending</span>' +
                                        '</td>';
                                } else if (obj.status == 'approved') {
                                    tableOut += '<td class="ps-4 align-middle text-start text-xs">' +
                                        '<span class="badge badge-xs d-flex justify-content-center"' +
                                        'style="border:1px solid #50B720; color:#50B720; width: 55px">approved</span>' +
                                        '</td>';
                                } else if (obj.status == 'rejected') {
                                    tableOut += '<td class="ps-4 align-middle text-start text-xs">' +
                                        '<span class="badge badge-xs d-flex justify-content-center"' +
                                        'style="border:1px solid #E40909; color:#E40909; width: 55px">rejected</span>' +
                                        '</td>';
                                } else {
                                    tableOut += '<td class="ps-4 align-middle text-start text-xs">' +
                                        '<span class="badge badge-secondary badge-xs">unknown</span>' +
                                        '</td>';
                                }


                                if (obj.status == 'pending') {
                                    tableOut += '<td class="ps-2 text-sm align-middle text-center">' +
                                        '<div class="d-flex flex-row pt-3 d-flex justify-content-center">' +
                                        '<button onclick="getExpenseData(`' + obj
                                    .receipt_picture_directory + '`,`' + obj
                                    .additional_picture_directory + '`,`' + obj.receipt_date +
                                    '`,`' + obj.merchant + '`, `' + obj.total_amount + '`,`' + obj
                                    .location + '`,`' + obj.category_name + '`,`' + obj
                                    .sub_category_name + '`,`' + obj.client_name + '`,`' + obj
                                    .purpose_name + '`,`' + obj.expense_of + '`,`' + obj.note +
                                    '`,`' + obj.status + '`,`' + obj.approval_id + '`)"' +
                                        'class="mx-1 btn text-white d-flex align-items-center d-flex justify-content-center"' +
                                        'data-bs-original-title="approve" data-toggle="tooltip"' +
                                        'data-placement="left" title="Review"' +
                                        'style="width: 60px; height:25px; background-color:#FFCF23"' +
                                        'data-bs-toggle="modal" data-bs-target="#viewExpenseDetail">' +
                                        '<i class="fa-sharp fa-solid fa-pen-to-square text-white text-md me-1"></i>' +
                                        '<span style="font-size: 0.6em">Review</span>' +
                                        '</button>' +
                                        '<button onclick="approvalDecision(`' + USR_ID + '`,`' + obj
                                    .approval_id + '`,` approved`)"' +
                                        'data-bs-toggle="tooltip"' +
                                        'class="mx-1 btn  text-white d-flex align-items-center d-flex justify-content-center"' +
                                        'data-bs-original-title="Approve" data-toggle="tooltip"' +
                                        'data-placement="left" title="Approve this expenses"' +
                                        'style="width: 60px; height:25px; background-color:#50B720">' +
                                        '<i class="fas fa-circle-check text-white text-md me-1"></i>' +
                                        '<span style="font-size: 0.6em">Approve</span>' +
                                        '</button>' +
                                        '<button onclick="approvalDecision(`' + USR_ID + '`,' + '`' +
                                    obj.approval_id + '`,`rejected`)"' +
                                        'data-bs-toggle="tooltip"' +
                                        // '<button onclick="getExpenseData(' + '`' + expense.id + '`' + ')"' +
                                        'class="mx-1 btn  text-white d-flex align-items-center d-flex justify-content-center"' +
                                        'data-bs-original-title="reject" data-toggle="tooltip"' +
                                        'data-placement="left" title="Reject this expenses"' +
                                        'style="width: 60px; height:25px; background-color:#E40909">' +
                                        '<i class="fas fa-circle-xmark text-white text-md me-1"></i>' +
                                        '<span style="font-size: 0.6em">Reject</span>' +
                                        '</button>' +
                                        '</div>' +
                                        '</td>'
                                } else {
                                    tableOut += '<td class="ps-2 text-sm align-middle text-center">' +
                                        '<div class="pt-3 d-flex justify-content-center">' +
                                        '<button onclick="getExpenseData(`' + obj
                                    .receipt_picture_directory + '`,`' + obj
                                    .additional_picture_directory + '`,`' + obj.receipt_date +
                                    '`,`' + obj.merchant + '`,`' + obj.total_amount + '`,`' + obj
                                    .location + '`,`' + obj.category_name + '`,`' + obj
                                    .sub_category_name + '`,`' + obj.client_name + '`,`' + obj
                                    .purpose_name + '`,`' + obj.expense_of + '`,`' + obj.note +
                                    '`,`' + obj.status + '`,`' + obj.approval_id + '`)"' +
                                        'data-bs-toggle="modal" data-bs-target="#viewExpenseDetail"' +
                                        'class="mx-1 btn  text-white d-flex align-items-center d-flex justify-content-center"' +
                                        'style="width: 60px; height:25px; background-color:#FFCF23">' +
                                        '<i class="fas fa-circle-check text-white text-md me-1"></i>' +
                                        '<span style="font-size: 0.6em">Detail</span>' +
                                        '</button>' +
                                        '</div>' +
                                        '</td>'
                                }




                            }
                            $("#tableBody").append(tableOut);
                            // $("#totalAmount").html(Intl.NumberFormat().format(totalAmount));
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.js"></script>
@endsection
