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
                    <p class="mb-0 text-xs text-uppercase font-weight-bolder" style="color:black">Remain Budget</p>
                    <h5 class=" mb-0  font-weight-bolder" style="color:black">
                        Rp <span>
                            {{ $data['limit'] != null ? number_format($data['limit']['remain_limit'], 2) : '0' }}
                        </span>
                    </h5>
                </div>
            </div>
            <div class="card" style="border-radius: 5px">
                <!-- Card header -->
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="d-flex mb-4 justify-content-start justify-content-md-end">
                            <form action="" style="z-index: 0">
                                <div class="row">
                                    <div class="col-md mt-2">
                                        <select name="2ff" id="2ff" class="rounded border border-secondary"
                                            style="font-size:12px; height: 25px; color:black">
                                            <option value="">Category</option>
                                        </select>
                                    </div>
                                    <div class="col-md mt-2">
                                        <select name="3ff" id="3ff" class="rounded border border-secondary"
                                            style="font-size:12px; height: 25px; color:black">
                                            <option value="">Status</option>
                                            <option value="pending">Pending</option>
                                            <option value="approved">Approved</option>
                                            <option value="rejected">Rejected</option>
                                            <option value="done">Done</option>
                                        </select>
                                    </div>
                                    <div class="col-md mt-2">
                                        <input type="submit" value="Search"
                                            class="px-2 rounded bg-white border border-secondary text-dark"
                                            style="font-size:12px; height: 25px; width: 100px" />
                                    </div>
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
                            <tbody>
                                @foreach ($data['expense_approval'] as $expense_approval)
                                    <tr>
                                        <td class="align-middle text-start text-capitalize text-xs">
                                            <div class="d-flex">
                                                <img src="{{ config('storage.base_url') . $expense_approval->receipt_picture_directory }}"
                                                    class="img-fluid ms-3" alt="receipt" style="width: 50px">
                                                <div class="ms-3 my-auto show-modal">
                                                    <div>
                                                        <span class="text-xs text-dark text-bold">
                                                            {{ $expense_approval->category }}
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
                                            {{ $expense_approval->category }}
                                        </td>
                                        <td class="align-middle text-start text-xs text-dark">
                                            {{ $expense_approval->purpose }}
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
                                                    style="background-color: #FFCF23; width: 50px">pending</span>
                                            @elseif ($expense_approval->status == 'approved')
                                                <span class="badge badge-xs d-flex justify-content-center"
                                                    style="background-color: #50B720; width: 50px">approved</span>
                                            @elseif ($expense_approval->status == 'rejected')
                                                <span class="badge badge-xs d-flex justify-content-center"
                                                    style="background-color: #E40909; width: 50px">rejected</span>
                                            @else
                                                <span class="badge badge-secondary badge-xs">unknown</span>
                                            @endif
                                        </td>
                                        <td class="text-sm align-middle text-center">
                                            @if ($expense_approval->status == 'pending')
                                                <div class="d-flex flex-row pt-3 d-flex justify-content-center">
                                                    <button
                                                        onclick="getExpenseData('{{ $expense_approval->receipt_picture_directory }}', '{{ $expense_approval->additional_picture_directory }}', '{{ $expense_approval->receipt_date }}', '{{ $expense_approval->merchant }}', '{{ $expense_approval->total_amount }}', '{{ $expense_approval->location }}', '{{ $expense_approval->category }}', '{{ $expense_approval->sub_category }}', '{{ $expense_approval->purpose }}', '{{ $expense_approval->expense_of }}', '{{ $expense_approval->status }}', '{{ $expense_approval->approval_id }}')"
                                                        class="mx-1
                                                        btn text-white d-flex align-items-center d-flex
                                                        justify-content-center"
                                                        data-bs-original-title="approve" data-toggle="tooltip"
                                                        data-placement="left" title="approve this expenses"
                                                        style="width: 60px; height:25px; background-color:#FFCF23"
                                                        data-bs-toggle="modal" data-bs-target="#viewExpenseDetail">
                                                        <i
                                                            class="fa-sharp fa-solid fa-pen-to-square text-white text-md me-1"></i>
                                                        <span style="font-size: 0.6em">Review</span>
                                                    </button>
                                                    <button
                                                        onclick="approvalDecision({{ Auth::user()['id'] }}, {{ $expense_approval->approval_id }}, 'approved')"
                                                        data-bs-toggle="tooltip"
                                                        class="mx-1 btn  text-white d-flex align-items-center d-flex justify-content-center"
                                                        data-bs-original-title="reject" data-toggle="tooltip"
                                                        data-placement="left" title="reject this expenses"
                                                        style="width: 60px; height:25px; background-color:#50B720">
                                                        <i class="fas fa-circle-check text-white text-md me-1"></i>
                                                        <span style="font-size: 0.6em">Approve</span>
                                                    </button>
                                                    <button
                                                        onclick="approvalDecision({{ Auth::user()['id'] }}, {{ $expense_approval->approval_id }}, 'rejected')"
                                                        data-bs-toggle="tooltip"
                                                        class="mx-1 btn  text-white d-flex align-items-center d-flex justify-content-center"
                                                        data-bs-original-title="reject" data-toggle="tooltip"
                                                        data-placement="left" title="reject this expenses"
                                                        style="width: 60px; height:25px; background-color:#E40909">
                                                        <i class="fas fa-circle-xmark text-white text-md me-1"></i>
                                                        <span style="font-size: 0.6em">Reject</span>
                                                    </button>
                                                </div>
                                            @else
                                                <div class="pt-3 d-flex justify-content-center">
                                                    <button
                                                        onclick="getExpenseData('{{ $expense_approval->receipt_picture_directory }}', '{{ $expense_approval->additional_picture_directory }}', '{{ $expense_approval->receipt_date }}', '{{ $expense_approval->merchant }}', '{{ $expense_approval->total_amount }}', '{{ $expense_approval->location }}', '{{ $expense_approval->category }}', '{{ $expense_approval->sub_category }}', '{{ $expense_approval->client_name }}', '{{ $expense_approval->purpose }}', '{{ $expense_approval->expense_of }}', '{{ $expense_approval->status }}', '{{ $expense_approval->approval_id }}')"
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
        function getExpenseData(receipt_directory, additional_directory, receipt_date, merchant, total_amount, location,
            category, sub_category, partner, purpose, expense_of, status, approval_id) {
            document.getElementById('detail_receipt_file').src = STORAGE_URL + receipt_directory;
            document.getElementById('detail_additional_file').src = STORAGE_URL + additional_directory;
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
@endsection
