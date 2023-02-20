@extends('layouts.main')



@section('container')
    @include('approval.popUpimage')
    @include('expenses.view-expense-detail')

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
            <div class="card" style="border-radius: 5px">
                <!-- Card header -->
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
                                    {{-- <div class="col-md mt-2">
                                        <button type="submit" value="submit"
                                            style="line-height:10px; height:25px; font-size:9px;background:#19194b;color:white"
                                            class="form-control text-bold d-flex justify-content-center" id="filter_button">

                                            <span>FILTER&nbsp;<i class="fa-solid fa-magnifying-glass"></i></span>

                                        </button>
                                    </div> --}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md pb-0">
                    <div class="table-responsive">
                        <table class="table table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-uppercase  text-xxs font-weight-bolder opacity-9" style="color:black">
                                        Expenses
                                    </th>
                                    <th class="text-uppercase  text-xxs font-weight-bolder opacity-9" style="color:black">
                                        Expenses
                                        Type</th>
                                    <th class="text-uppercase  text-xxs font-weight-bolder opacity-9" style="color:black">
                                        Purpose
                                    </th>
                                    <th class="text-uppercase  text-xxs font-weight-bolder opacity-9" style="color:black">
                                        Merchant
                                    </th>
                                    <th class="text-uppercase  text-xxs font-weight-bolder opacity-9" style="color:black">
                                        Amount
                                    </th>
                                    <th class="text-uppercase  text-xxs font-weight-bolder opacity-9" style="color:black">
                                        Status
                                    </th>
                                    <th class="text-uppercase  text-xxs text-center font-weight-bolder opacity-9"
                                        style="color:black">Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                                @foreach ($data['expense_approval'] as $expense_approval)
                                    <tr>
                                        <td class="align-middle text-start text-capitalize text-xs">
                                            <div class="d-flex">
                                                <img  src="{{ config('storage.base_url') . $expense_approval->receipt_picture_directory }}"
                                                    class="img-fluid ms-3" alt="receipt" style="width: 50px">
                                                <div class="ms-3 my-auto show-modal">
                                                    <div>
                                                        <span class="text-xs text-dark text-bold">
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
                                                            {{ $expense_approval->date }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle text-start text-xs text-capitalize text-dark">
                                            {{ $expense_approval->category_name }}
                                        </td>
                                        <td class="align-middle text-start text-xs text-dark">
                                            {{ $expense_approval->purpose_name }}
                                        </td>
                                        <td class="align-middle text-start text-xs text-dark">
                                            {{ $expense_approval->merchant }}
                                        </td>
                                        <td class="align-middle text-start text-xs text-dark">
                                            {{ number_format($expense_approval->total_amount, 2) }}
                                        </td>
                                        <td class="align-middle text-start text-xs">
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
                                        <td class="text-sm align-middle text-center">
                                            @if ($expense_approval->status == 'pending')
                                                <div class="d-flex flex-row pt-3 d-flex justify-content-center">
                                                    <button
                                                        onclick="getExpenseData('{{ $expense_approval->receipt_picture_directory }}', '{{ $expense_approval->additional_picture_directory }}', '{{ $expense_approval->receipt_date }}', '{{ $expense_approval->merchant }}', '{{ $expense_approval->total_amount }}', '{{ $expense_approval->location }}', '{{ $expense_approval->category_name }}', '{{ $expense_approval->sub_category_name }}', '{{ $expense_approval->client_name }}', '{{ $expense_approval->purpose_name }}', '{{ $expense_approval->expense_of }}', '{{ $expense_approval->status }}', '{{ $expense_approval->approval_id }}')"
                                                        class="mx-1
                                                        btn text-white d-flex align-items-center d-flex
                                                        justify-content-center"
                                                        data-bs-original-title="approve" data-toggle="tooltip"
                                                        data-placement="left" title="Review"
                                                        style="width: 60px; height:25px; background-color:#FFCF23"
                                                        data-bs-toggle="modal" data-bs-target="#viewExpenseDetail">
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
                                                        <i class="fas fa-circle-check text-white text-md me-1"></i>
                                                        <span style="font-size: 0.6em">Approve</span>
                                                    </button>
                                                    <button
                                                        onclick="approvalDecision('{{ Auth::user()['id'] }}', '{{ $expense_approval->approval_id }}', 'rejected')"
                                                        data-bs-toggle="tooltip"
                                                        class="mx-1 btn  text-white d-flex align-items-center d-flex justify-content-center"
                                                        data-bs-original-title="reject" data-toggle="tooltip"
                                                        data-placement="left" title="Reject this expenses"
                                                        style="width: 60px; height:25px; background-color:#E40909">
                                                        <i class="fas fa-circle-xmark text-white text-md me-1"></i>
                                                        <span style="font-size: 0.6em">Reject</span>
                                                    </button>
                                                </div>
                                            @else
                                                <div class="pt-3 d-flex justify-content-center">
                                                    <button
                                                        onclick="getExpenseData('{{ $expense_approval->receipt_picture_directory }}', '{{ $expense_approval->additional_picture_directory }}', '{{ $expense_approval->receipt_date }}', '{{ $expense_approval->merchant }}', '{{ $expense_approval->total_amount }}', '{{ $expense_approval->location }}', '{{ $expense_approval->category_name }}', '{{ $expense_approval->sub_category_name }}', '{{ $expense_approval->client_name }}', '{{ $expense_approval->purpose_name }}', '{{ $expense_approval->expense_of }}', '{{ $expense_approval->status }}', '{{ $expense_approval->approval_id }}')"
                                                        data-bs-toggle="modal" data-bs-target="#viewExpenseDetail"
                                                        class="mx-1 btn  text-white d-flex align-items-center d-flex justify-content-center"
                                                        style="width: 60px; height:25px; background-color:#FFCF23">
                                                        <i class="fas fa-circle-check text-white text-md me-1"></i>
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
        function getExpenseData(receipt_picture_directory, additional_picture_directory, receipt_date, merchant, total_amount, location,
            category, sub_category, partner, purpose, expense_of, status, approval_id) {
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
            document.getElementById('dataExpenseOf').value = expense_of;
            approvalID = approval_id;
            if (status == "pending") {
                document.getElementById('decisionButton').style.display = "block";
            } else {
                document.getElementById('decisionButton').style.display = "none";
            }
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
                        var formData = new FormData();
                        formData.append('tenant_code', TENANT_CODE);
                        formData.append('user_id', userId);
                        formData.append('approval_id', approval_id);
                        formData.append('decision', decision);

                        $.ajaxSetup({
                            headers: {
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
                                // setTimeout(function() {
                                //     location.reload();
                                // }, 1000);
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

    <script>
        function handleChangeStatus(event) {
            event.submit();
        }
    </script>


  
{{-- filter untuk category --}}
<script>
    $(document).ready(function() {
        var tenant_code = TENANT_CODE;
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
                urlSearch = API_URL + "api/expense/approval/list/" + tenant_code  + '/?user_id=' +
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
                            // totalAmount = totalAmount + parseFloat(obj.total_amount);
                            // console.log(totalAmount);
                            tableOut += '<tr>'+
                                        '<td class="align-middle text-start text-capitalize text-xs">'+
                                            '<div class="d-flex">'+
                                                '<img src="`' + obj.receipt_picture_directory + '`"'+
                                                    'class="img-fluid ms-3" alt="receipt" style="width: 50px">'+
                                                '<button onclick="console.log(receipt_picture_directory)">Tes</button>'+
                                                '<div class="ms-3 my-auto show-modal">'+
                                                    '<div>'+
                                                        '<span class="text-xs text-dark text-bold">'+
                                                            obj.sub_category_name +
                                                       '</span>'+
                                                    '</div>'+
                                                    '<div>'+
                                                        '<span class="text-xs text-dark">'+
                                                            obj.full_name +
                                                        '</span>'+
                                                    '</div>'+
                                                    '<div>'+
                                                        '<span class="text-xxs text-dark">'+
                                                            obj.date +
                                                        '</span>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</td>'

                            tableOut += '<td class="align-middle text-start text-xs text-capitalize text-dark">'+
                                             obj.category_name +
                                        '</td>'
                            tableOut += '<td class="align-middle text-start text-xs text-dark">'+
                                            obj.purpose_name +
                                        '</td>'
                            tableOut += '<td class="align-middle text-start text-xs text-dark">'+
                                            obj.merchant +
                                        '</td>'
                            tableOut += '<td class="align-middle text-start text-xs text-dark">'+
                                            obj.total_amount +
                                        '</td>'
                       
                                     
                           if (obj.status == 'pending'){
                            tableOut += '<td class="align-middle text-start text-xs">'+
                                                '<span class="badge badge-xs d-flex justify-content-center"'+
                                                    'style="border:1px solid #FFCF23; color:#FFCF23; width: 55px">pending</span>'+
                                            '</td>'
                           }else if(obj.status == 'approved'){
                            tableOut += '<td class="align-middle text-start text-xs">'+
                                '<span class="badge badge-xs d-flex justify-content-center"'+
                                    'style="border:1px solid #50B720; color:#50B720; width: 55px">approved</span>'+
                            '</td>'
                           }else if(obj.status == 'rejected'){
                            tableOut +=  '<td class="align-middle text-start text-xs">'+
                                '<span class="badge badge-xs d-flex justify-content-center"'+
                                                    'style="border:1px solid #E40909; color:#E40909; width: 55px">rejected</span>'+
                            '</td>'
                           }else{
                            tableOut += '<td class="align-middle text-start text-xs">'+
                               '<span class="badge badge-secondary badge-xs">unknown</span>'+
                            '</td>'
                           }

                          
                            if(obj.status == 'pending'){
                                tableOut +=  '<td class="text-sm align-middle text-center">'+
                                                '<div class="d-flex flex-row pt-3 d-flex justify-content-center">'+
                                                    '<button onclick="getExpenseData(`' + obj.receipt_picture_directory  + '`,`' + obj.additional_picture_directory + '`,`' + obj.receipt_date + '`,`' + obj.merchant + '`, `' + obj.total_amount + '`,`' + obj.location + '`,`' + obj.category_name + '`,`' + obj.sub_category_name + '`,`' +  obj.client_name + '`,`' +  obj.purpose_name + '`,`' + obj.expense_of + '`,`' + obj.status + '`,`' + obj.approval_id + '`)"'+
                                                        'class="mx-1 btn text-white d-flex align-items-center d-flex justify-content-center"'+
                                                        'data-bs-original-title="approve" data-toggle="tooltip"'+
                                                        'data-placement="left" title="Review"'+
                                                        'style="width: 60px; height:25px; background-color:#FFCF23"'+
                                                        'data-bs-toggle="modal" data-bs-target="#viewExpenseDetail">'+
                                                        '<i class="fa-sharp fa-solid fa-pen-to-square text-white text-md me-1"></i>'+
                                                        '<span style="font-size: 0.6em">Review</span>'+
                                                    '</button>'+
                                                    '<button onclick="approvalDecision(`' + USR_ID + '`,`'  + obj.approval_id + '`,`approved`)"' +
                                                        'data-bs-toggle="tooltip"'+
                                                        'class="mx-1 btn  text-white d-flex align-items-center d-flex justify-content-center"'+
                                                        'data-bs-original-title="Approve" data-toggle="tooltip"'+
                                                        'data-placement="left" title="Approve this expenses"'+
                                                        'style="width: 60px; height:25px; background-color:#50B720">'+
                                                        '<i class="fas fa-circle-check text-white text-md me-1"></i>'+
                                                        '<span style="font-size: 0.6em">Approve</span>'+
                                                    '</button>'+
                                                    '<button onclick="approvalDecision(`' + USR_ID + '`,'  + '`' + obj.approval_id + '`,`rejected`)"'+
                                                        'data-bs-toggle="tooltip"'+
                                                        // '<button onclick="getExpenseData(' + '`' + expense.id + '`' + ')"' +
                                                        'class="mx-1 btn  text-white d-flex align-items-center d-flex justify-content-center"'+
                                                        'data-bs-original-title="reject" data-toggle="tooltip"'+
                                                        'data-placement="left" title="Reject this expenses"'+
                                                        'style="width: 60px; height:25px; background-color:#E40909">'+
                                                        '<i class="fas fa-circle-xmark text-white text-md me-1"></i>'+
                                                        '<span style="font-size: 0.6em">Reject</span>'+
                                                    '</button>'+
                                                '</div>'+
                                            '</td>'
                            }else{
                                tableOut += 
                                '<td class="text-sm align-middle text-center">'+
                                   '<div class="pt-3 d-flex justify-content-center">'+
                                      '<button onclick="getExpenseData(`' + obj.receipt_picture_directory + '`,`' + obj.additional_picture_directory + '`,`' + obj.receipt_date + '`,`' + obj.merchant + '`,`' + obj.total_amount + '`,`' + obj.location + '`,`' + obj.category_name + '`,`' + obj.sub_category_name + '`,`' + obj.client_name + '`,`' + obj.purpose_name + '`,`' + obj.expense_of + '`,`' + obj.status + '`,`' + obj.approval_id + '`)"'+
                                          'data-bs-toggle="modal" data-bs-target="#viewExpenseDetail"'+
                                              'class="mx-1 btn  text-white d-flex align-items-center d-flex justify-content-center"'+
                                                    'style="width: 60px; height:25px; background-color:#FFCF23">'+
                                                        '<i class="fas fa-circle-check text-white text-md me-1"></i>'+
                                                    '<span style="font-size: 0.6em">Detail</span>'+
                                                    '</button>'+
                                      '</div>'+
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
@endsection
