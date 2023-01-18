@extends('layouts.main')

@section('container')
    @include('modal-budget.edit')

    <form action="">
        <input type="text" id="user_id" value="{{ Auth::user()['id'] }}" hidden>
    </form>

    <script>
        var user_id = $("#user_id").val();
    </script>

    <div class="col-md">
        <div class="d-sm-flex justify-content-between mt-4 mb-0">
            <div class="row p-0 mb-2">
                <div class="text-dark">Available Balance</div>
                <div><span
                        class="text-md font-weight-bolder text-dark fs-5">{{ number_format($data['limit']->remain_limit, 2) }}</span>
                </div>
            </div>
        </div>
        <div class="row mt-3 justify-content-center">
            <div class="col-12">
                <p class="text-sm font-weight-bold text-dark">Manage Limit</p>
            </div>
            <div class="col-12">
                <div class="card" style="border-radius: 5px">
                    <div class="card-body">
                        <form action="javascript:void(0)" method="POST" onsubmit="manageSelf()">
                            @csrf
                            <div class="col-md">
                                <div class="row justify-content-center">
                                    <div class="col-md">
                                        <label for="" class="text-sm text-capitalize px-0 mx-0 text-dark">Top Up
                                            your
                                            limit</label>
                                        <input type="text" class="form-control fw-bolder" id="limit_set" value="0">
                                        <script>
                                            new NumericInput(document.getElementById('limit_set'), 'en-CA');
                                        </script>
                                    </div>
                                    <div class="col-md">
                                        <label for="" class="text-sm text-capitalize px-0 mx-0 text-dark">Expire
                                            Date</label>
                                        <input type="date" class="form-control text-dark" id="expire_date_set"
                                            value="{{ $data['limit']->expire_date }}">
                                    </div>

                                </div>
                                <div class="row mt-2">
                                    <div class="col-md">
                                        <button class="btn text-white" style="background: #62CA50">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md">
        <div class="row mt-3 justify-content-center">
            <div class="col-12">
                <p class="text-sm font-weight-bold text-dark">Limit Member</p>
            </div>
            <div class="col-12">
                @if (count($data['members']) != 0)
                    <div class="row mt-2">
                        <div class="col-12">
                            <div class="card" style="border-radius: 5px">
                                <div class="table-responsive">
                                    <table class="table table-flush text-dark" id="datatable-search">
                                        <thead class="thead-light">
                                            <tr>
                                                <th class="text-sm px-2" style="font-weight: 600">Name</th>
                                                <th class="text-sm px-0" style="font-weight: 600">Email</th>
                                                <th class="text-sm px-0" style="font-weight: 600">Limit</th>
                                                <th class="text-sm px-0" style="font-weight: 600">Used</th>
                                                <th class="text-sm px-0" style="font-weight: 600">Expire Date</th>
                                                <th class="text-sm px-0 text-center" style="font-weight: 600">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data['members'] as $item)
                                                <tr class="align-middle">
                                                    <td class="text-xs font-weight-bold text-capitalize px-2 pb-0 pt-3">
                                                        <p class="text-dark" style="font-size: 13px">
                                                            {{ $item->full_name }}
                                                        </p>
                                                    </td>
                                                    <td class="text-xs font-weight-bold px-0 pt-3 pb-0">
                                                        <p class="text-dark" style="font-size: 13px">
                                                            {{ $item->email }}
                                                        </p>
                                                    </td>
                                                    <td class="text-xs font-weight-bold px-0 pt-3 pb-0">
                                                        <p class="text-dark font-weight-bold" style="font-size: 13px">
                                                            {{ number_format($item->balance->remain_limit, 2) }}
                                                        </p>
                                                    </td>
                                                    <td class="text-xs font-weight-bold px-0 pt-3 pb-0">
                                                        <p class="text-dark font-weight-bold" style="font-size: 13px">
                                                            {{ number_format($item->balance->used_limit, 2) }}
                                                        </p>
                                                    </td>
                                                    <td class="text-xs font-weight-bold px-0 pt-3 pb-0">
                                                        <p class="text-dark" style="font-size: 13px">
                                                            {{ $item->balance->expire_date }}
                                                        </p>
                                                    </td>
                                                    <td class="text-xs font-weight-bold">
                                                        <div class="pt-3 d-flex justify-content-center">
                                                            <button onclick="getMemberData({!! $item->id !!})"
                                                                class="btn text-white d-flex justify-content-center align-items-center text-capitalize"
                                                                data-bs-toggle="modal" data-bs-target="#manageLimit"
                                                                style="background-color: #ff720c;width:65px;height:25px;font-size:12px; font-weight:500">Manage</button>
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
                            <img src="{{ asset('img/icons/bill.png') }}" class="img-fluid" alt=""
                                style="width: 100px">
                            <h6 class="font-weight-bold text-dark py-0">You don't have member</h6>
                            <span class="text-xs" style="text-align: center">Create your members with click the button
                                above</span>
                        </div>
                    </div>
                @endif

                @if (count($data['members']) > 0)
                    @if (count($data['approval']) > 0)
                        <div class="row mt-3">
                            <div class="col-12">
                                <p class="text-sm font-weight-bold text-dark">Top Up Member</p>
                            </div>
                            <div class="col-12">
                                <div class="bg-white p-3" style="border-radius:5px !important">
                                    <div class="table-responsive-lg  table-responsive-md table-responsive-sm"
                                        style="width: 100%">
                                        <table class="table table-flush text-dark" id="datatable-search">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th class="text-sm px-2" style="font-weight: 600">Date</th>
                                                    <th class="text-sm px-2" style="font-weight: 600">Member Info</th>
                                                    <th class="text-sm px-2" style="font-weight: 600">Amount</th>
                                                    <th class="text-sm px-2" style="font-weight: 600">Reason</th>
                                                    <th class="text-sm px-2" style="font-weight: 600">Status</th>
                                                    <th class="text-sm px-2 text-center" style="font-weight: 600">Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data['approval'] as $approval)
                                                    <tr class="align-start">
                                                        <td class="px-2">
                                                            <div
                                                                class="d-flex  pt-2 d-flex align-items-start font-weight-normal">
                                                                <span class="text-start text-xs ">
                                                                    {{ $approval->date }}
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td class="px-2">
                                                            <span
                                                                class="text-xs text-start text-capitalize">{{ $approval->full_name }}
                                                                <p class="text-xs text-start" style="color: black">Remain
                                                                    Limit :
                                                                    <span class="font-weight-bolder"
                                                                        style="font-size: 13px">{{ number_format($approval->remain_limit, 2) }}</span>
                                                                </p>
                                                            </span>
                                                        </td>
                                                        <td class="px-2">
                                                            <span class="text-xs text-start">
                                                                Top Up : <span class="font-weight-bolder"
                                                                    style="font-size: 13px">{{ number_format($approval->amount, 2) }}</span>
                                                                {{-- <p class="text-xs text-start" style="color: black">Approved : 200,000.00</p> --}}
                                                            </span>
                                                        </td>
                                                        <td class="px-2">
                                                            <span class="text-xs text-start" style="color: black">Note :
                                                                {{ $approval->note }}</span>
                                                        </td>
                                                        <td class="px-2">
                                                            <div class="text-center text-xs d-flex justify-content-start">
                                                                @if ($approval->status == 'pending')
                                                                    <p class="badge badge-xs d-flex justify-content-center"
                                                                        style="background-color: #ff720c; width: 60px; margin-top:20px">
                                                                        pending</p>
                                                                @elseif($approval->status == 'rejected')
                                                                    <p class="badge badge-xs d-flex justify-content-center"
                                                                        style="background-color: #D42A34; width: 60px; margin-top:20px">
                                                                        rejected</p>
                                                                @else
                                                                    <p class="badge badge-xs d-flex justify-content-center"
                                                                        style="background-color: #62CA50; width: 60px; margin-top:20px">
                                                                        approved</p>
                                                                @endif
                                                            </div>
                                                        </td>
                                                        <td class="align-middle">
                                                            @if ($approval->status == 'pending')
                                                                <div class="d-flex flex-row justify-content-center pt-3">
                                                                    <button
                                                                        onclick="passing_approval({{ $approval->topup_id }}, {{ $approval->amount }})"
                                                                        class="mx-1 btn text-white d-flex align-items-center  d-flex justify-content-center "
                                                                        data-toggle="tooltip" data-placement="left"
                                                                        title="Edit"
                                                                        style="width: 60px; height:25px; background-color:#FFCF23
                                                "
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#edit-modal">
                                                                        <i
                                                                            class="fa-sharp fa-solid fa-pen-to-square text-white text-xs me-1"></i>
                                                                        <span style="font-size: 0.6em">Edit</span>
                                                                    </button>
                                                                    <button
                                                                        onclick="approval({{ $approval->topup_id }}, 'approved')"
                                                                        class="mx-1 btn text-white d-flex align-items-center d-flex justify-content-center"
                                                                        data-toggle="tooltip" data-placement="left"
                                                                        title="Approve"
                                                                        style="width: 60px; height:25px; background-color:#62CA50">
                                                                        {{-- data-bs-toggle="modal" data-bs-target="#approve"> --}}
                                                                        <i
                                                                            class="fa-solid fa-circle-check text-white text-xs me-1"></i>
                                                                        <span style="font-size: 0.6em">Approve</span>
                                                                    </button>
                                                                    <button
                                                                        onclick="approval({{ $approval->topup_id }}, 'rejected')"
                                                                        class="mx-1 btn text-white d-flex align-items-center  d-flex justify-content-center"
                                                                        data-toggle="tooltip" data-placement="left"
                                                                        title="Reject"
                                                                        style="width: 60px; height:25px; background-color: #D42A34">
                                                                        {{-- data-bs-toggle="modal" data-bs-target="#rejects"> --}}
                                                                        <i
                                                                            class="fas fa-circle-xmark text-white text-xs me-1"></i>
                                                                        <span style="font-size: 0.6em">Reject</span>
                                                                    </button>
                                                                </div>
                                                            @else
                                                                <div
                                                                    class="text-center text-xs d-flex justify-content-center">
                                                                    <p onclick="console.log(document.getElementById('have_member').value)"
                                                                        class="badge badge-xs d-flex justify-content-center"
                                                                        style="background-color: #7c7c7c; width: 60px; margin-top:20px">
                                                                        done</p>
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
                    @else
                        <div class="row mt-3">
                            <div class="col-12">
                                <p class="text-sm font-weight-bold text-dark">Top Up Member</p>
                            </div>
                            <div class="col-12">
                                <div class="row justify-content-center h-100 align-items-center">
                                    <div class="d-flex align-items-center justify-content-center flex-column py-5">
                                        <img src="{{ asset('img/icons/bill.png') }}" class="img-fluid" alt=""
                                            style="width: 100px">
                                        <h6 class="font-weight-bold text-dark py-0">You don't have Approval</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>

    <div class="modal fade" id="manageLimit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content" style="border-radius: 5px !important">
                <div class="modal-header px-4">
                    <h6 class="modal-title fs-6 text-dark" id="staticBackdropLabel">Manage Limit</h6>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form action="javascript:void(0)" method="POST" onsubmit="manageMember()">
                    @csrf
                    <input type="text" id="member_id" hidden>
                    <div class="modal-body px-4">
                        <div class="row justify-content-center">
                            <div class="col-md">
                                <label for="" class="text-xs text-capitalize px-0 mx-0 text-dark"
                                    style="font-weight: 600">Top Up member limit</label>
                                <input type="text" id="member_limit" class="form-control" step="1.0">
                                <script>
                                    new NumericInput(document.getElementById('member_limit', 'en-CA'));
                                </script>
                            </div>
                            <div class="col-md">
                                <label for="" class="text-xs text-capitalize px-0 mx-0 text-dark"
                                    style="font-weight: 600">Expire Date</label>
                                <input type="date" id="member_expire_date" class="form-control text-dark">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="submit" class="btn text-white" style="background: #62CA50">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function getMemberData(member_id) {
            $.ajaxSetup({
                headers: {
                    "Authorization": "Bearer " + AUTH_TOKEN,
                    "Accept": "application/json"
                }
            });
            $.ajax({
                type: "GET",
                url: API_URL + "api/spend/balance?user_id=" + member_id,
                success: function(res) {
                    if (res['success'] == true) {
                        var response = res['data'];
                        var member_id_set = document.getElementById('member_id').value = member_id;
                        var member_limit_set = document.getElementById('member_limit').value = 0;
                        var member_expire_date_set = document.getElementById('member_expire_date').value = res[
                            'data']['expire_date'];
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

        function manageSelf() {
            var limit_set = $("#limit_set").val();
            var expire_date_set = $("#expire_date_set").val();

            var url = "api/spend/manage-self";

            if (document.getElementById('have_manager').value == true) {
                url = "api/topup/request";
            }

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success-cstm mx-2 font-size",
                    cancelButton: "btn btn-danger-cstm mx-2 font-size",
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

                        var formManageSelf = new FormData();

                        if (document.getElementById('have_manager').value == true) {
                            formManageSelf.append('user_id', user_id);
                            formManageSelf.append('amount', limit_set);
                            formManageSelf.append('note', "top up");
                        } else {
                            formManageSelf.append('user_id', user_id);
                            formManageSelf.append('limit', limit_set);
                            formManageSelf.append('expire_date', expire_date_set);
                        }

                        $.ajaxSetup({
                            headers: {
                                "Authorization": "Bearer " + AUTH_TOKEN,
                                "Accept": "application/json"
                            }
                        });

                        $.ajax({
                            url: API_URL + url,
                            type: 'post',
                            data: formManageSelf,
                            contentType: false,
                            processData: false,
                            beforeSend: function() {
                                $("#main-loader").show();
                            },
                            success: function(res) {
                                if (res['success'] == true) {
                                    swalWithBootstrapButtons.fire(
                                        "Success!",
                                        "Your top up has been submited",
                                        "success"
                                    );
                                    setTimeout(function() {
                                        window.location.reload(true);
                                    }, 1000);
                                } else {
                                    if (res['member']) {
                                        swalWithBootstrapButtons.fire(
                                            "oops!",
                                            res['message']
                                        );
                                    } else {
                                        swalWithBootstrapButtons.fire(
                                            "oops!",
                                            res['message']
                                        );
                                    }
                                    setTimeout(function() {
                                        window.location.reload(true);
                                    }, 1000);
                                }
                            },
                            complete: function(data) {
                                $("#main-loader").hide();
                                if (data.status != 200) {
                                    Swal.fire(
                                        "oops",
                                        "please contact Ximply support!",
                                        "error"
                                    );
                                }
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

        //manage member
        function manageMember(member_id) {

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

                        var formManageMember = new FormData();

                        formManageMember.append('user_id', $("#user_id").val());
                        formManageMember.append('member_id', $("#member_id").val());
                        formManageMember.append('limit', $("#member_limit").val());
                        formManageMember.append('expire_date', $("#member_expire_date").val());

                        $.ajaxSetup({
                            headers: {
                                "Authorization": "Bearer " + AUTH_TOKEN,
                                "Accept": "application/json"
                            }
                        });

                        $.ajax({
                            url: API_URL + "api/spend/manage-member",
                            type: 'post',
                            data: formManageMember,
                            contentType: false,
                            processData: false,
                            beforeSend: function() {
                                $("#main-loader").show();
                            },
                            success: function(res) {
                                if (res['success'] == true) {
                                    swalWithBootstrapButtons.fire(
                                        "Success!",
                                        "Your request success.",
                                        "success"
                                    );
                                    setTimeout(function() {
                                        window.location.reload(true);
                                    }, 1000);
                                } else {
                                    swalWithBootstrapButtons.fire(
                                        "oops!",
                                        res['message'],
                                        "error"
                                    );
                                    setTimeout(function() {
                                        window.location.reload(true);
                                    }, 1000);
                                }
                            },
                            complete: function(data) {
                                $("#main-loader").hide();
                                if (data.status != 200) {
                                    Swal.fire(
                                        "something wrong",
                                        "please contact Ximply support!",
                                        "error"
                                    );
                                }
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

        function passing_approval(topup_id, amount) {
            document.getElementById('topup-id').value = topup_id
            document.getElementById('topup-amount').value = amount
            document.getElementById('topup-approved').value = amount
        }

        function approval(topup_id, decision, amount = false) {

            if (decision == "approved") {
                decision_text = "Approve";
            } else {
                decision_text = "Reject";
            }

            var limit_set = $("#limit_set").val();
            var expire_date_set = $("#expire_date_set").val();

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success-cstm mx-2 font-size",
                    cancelButton: "btn btn-danger-cstm mx-2 font-size",
                },
                buttonsStyling: false,
            });

            swalWithBootstrapButtons
                .fire({
                    title: "<h5>Are you sure you want to " + decision_text + "?</h5>",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    reverseButtons: false,
                })
                .then((result) => {
                    if (result.isConfirmed) {

                        var formManageSelf = new FormData();

                        formManageSelf.append('user_id', user_id);
                        formManageSelf.append('topup_id', topup_id);
                        formManageSelf.append('decision', decision);

                        if (amount != false) {
                            formManageSelf.append('amount_approved', amount);
                        }

                        $.ajaxSetup({
                            headers: {
                                "Authorization": "Bearer " + AUTH_TOKEN,
                                "Accept": "application/json"
                            }
                        });

                        $.ajax({
                            url: API_URL + "api/topup/approval",
                            type: 'post',
                            data: formManageSelf,
                            contentType: false,
                            processData: false,
                            beforeSend: function() {
                                $("#main-loader").show();
                            },
                            success: function(res) {
                                if (res['success'] == true) {
                                    swalWithBootstrapButtons.fire(
                                        "Success!",
                                        "Your request success.",
                                        "success"
                                    );
                                    setTimeout(function() {
                                        window.location.reload(true);
                                    }, 1000);
                                } else {
                                    swalWithBootstrapButtons.fire(
                                        "oops!",
                                        res['message']
                                    );
                                    setTimeout(function() {
                                        window.location.reload(true);
                                    }, 1000);
                                }
                            },
                            complete: function(data) {
                                $("#main-loader").hide();
                                if (data.status != 200) {
                                    Swal.fire(
                                        "oops",
                                        "please contact Ximply support!",
                                        "error"
                                    );
                                }
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
