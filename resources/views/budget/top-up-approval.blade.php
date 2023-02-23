@extends('layouts.main')

@section('container')
    <div class="modal fade" id="approve-ask-dialog" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card card-plain">
                        @if (session()->get('is_superadmin') == false)
                            <div class="card-header pb-0 text-left">
                                <div class="text-center"><span class="font-weight-bolder  text-md" style="color: #5e5e5e">
                                        Remain Budget</span>
                                </div>
                                <div class="text-center text-secondary"><span class="font-weight-bolder text-md"
                                        style="color: #3A8DDA; font-size:30px">
                                        <span>
                                            Rp <span>
                                                {{ $data['top_up'] != null ? number_format($data['top_up']->remain_limit, 2) : '0' }}
                                            </span></span>
                                </div>
                                <hr class="horizontal dark mb-1" style="margin-top: 9px;">
                            </div>
                        @endif
                        <div class="card-body pb-3">
                            <form role="form text-left" onsubmit="handleSubmitApprove(event)">
                                <input type="hidden" id="topUpId">
                                <label class="text-dark">Topup Request</label>
                                <div class="input-group mb-3">
                                    <input type="text" class=" number_separator w-100 px-2" id="topupAmount" disabled
                                        style="font-weight: bold; border-radius:10px; height:45px; border:1px solid black">
                                </div>
                                <label class="text-dark">Topup Approve</label>
                                <div class="input-group mb-3">
                                    <input type="text" class=" number_separator number-separator w-100 px-2"
                                        id="topupAmountApprove"
                                        style="color: #3A8DDA; font-weight: bold; border-radius:10px; height:45px; border:1px solid black">
                                    {{-- <script>
                                        new NumericInput(document.getElementById('topupAmountApprove'))
                                    </script> --}}

                                </div>
                                <div class="d-flex flex-row justify-content-between">
                                    <button type="submit" class="btn btn-sm btn-rounded mt-2 mb-0 text-white"
                                        style="width: 120px; background-color:#50B720">
                                        Approve
                                    </button>
                                    <button type="button" class="btn btn-sm btn-rounded mt-2 mb-0 text-white"
                                        style="width: 120px; background-color:#E40909" data-bs-dismiss="modal">
                                        Cancel
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="row mb-4 mx-1 justify-content-between">
                <div class="col-md mt-2 px-0 mx-0">
                    <h5 class="mb-0 text-dark text-uppercase font-weight-bolder">TOPUP APPROVAL</h5>
                    <p class="text-sm mb-0 text-dark">
                        Data that required a decision from you.
                    </p>
                </div>
                <div class="col-md text-md-end text-start mt-2 px-0 mx-0">
                    @if (session()->get('is_superadmin') == false)
                        <p class="mb-0 text-xs text-uppercase font-weight-bolder" style="color: black">Remain Budget</p>
                        <h5 class=" mb-0  font-weight-bolder" style="color: black">
                            Rp <span>
                                {{ $data['top_up'] != null ? number_format($data['top_up']->remain_limit, 2) : '0' }}
                            </span>
                        </h5>
                    @endif
                </div>
            </div>
            <div class="card">
                <!-- Card header -->
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="d-flex mb-4 justify-content-start justify-content-md-end">
                            <form id="formSearch" action="" style="z-index: 0" onsubmit="handleChangeStatus(event)">
                                <div class="row">
                                    <div class="col-md mt-2">
                                        <select name="statusType" id="status"
                                            class="rounded border border-secondary text-secondary mb-4"
                                            style="font-size:12px; height: 25px; width: 150px">
                                            <option value="">Status</option>
                                            <option class=""
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
                <div class="col-md px-2">
                    <div class="card-text pb-0">
                        <div class="table-responsive">
                            <table class="table table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th
                                            class="text-uppercase text-dark  text-xxs font-weight-bolder opacity-9 text-start">
                                            Time
                                        </th>
                                        <th
                                            class="text-uppercase text-dark  text-xxs font-weight-bolder opacity-9 text-start ">
                                            Member&nbsp;Info</th>
                                        <th
                                            class="text-uppercase text-dark  text-xxs font-weight-bolder opacity-9 text-start ">
                                            Amount
                                        </th>
                                        <th
                                            class="text-uppercase text-dark  text-xxs font-weight-bolder opacity-9 text-start ">
                                            Reason
                                        </th>
                                        <th
                                            class="text-uppercase text-dark  text-xxs font-weight-bolder opacity-9 text-center">
                                            Status
                                        </th>
                                        <th
                                            class="text-uppercase text-dark  text-xxs font-weight-bolder opacity-9 text-center ">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="tableBody">
                                    @if (count($approvals) > 0)
                                        @foreach ($approvals as $approval)
                                            <tr>
                                                <td class="align-middle text-start text-xs text-dark">
                                                    <span>
                                                        {{ $approval['date'] }}
                                                    </span>
                                                </td>
                                                <td class="align-middle text-start text-capitalize text-xs text-dark">
                                                    <div><span class="font-weight-bold">
                                                            {{ $approval['full_name'] }}
                                                        </span></div>
                                                    <div><span>
                                                        </span></div>
                                                    <div><span>Remain Limit : </span><span class="text-xs font-weight-bold">
                                                            {{ number_format($approval['remain_limit'], 2) }}
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-start text-xs text-dark text-break text-wrap">
                                                    <span class="text-xs">Top Up : </span><span class="font-weight-bold">
                                                        {{ number_format($approval['amount'], 2) }}
                                                    </span><br>
                                                    <span class="text-xs">
                                                        Approved :
                                                        <span class="fw-bold">
                                                            {{ number_format($approval['approval_amount'], 2) }}
                                                        </span>
                                                    </span>
                                                </td>
                                                <td class="align-middle text-start text-xs text-dark">
                                                    <div class="" style="max-width: 300px">
                                                        <div><span>Purpose : </span><span class="font-weight-bold text-wrap"
                                                                style="text-align: justify">
                                                               {{ $approval['purpose'] }}
                                                            </span></div>
                                                        <div><span>Note : </span><span class="font-weight-bold text-wrap"
                                                                style="text-align: justify">
                                                                {{ $approval['note'] }}
                                                            </span></div>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center text-xs d-flex justify-content-center">
                                                    @if ($approval['status'] == 'pending')
                                                        <span class="badge badge-xs d-flex justify-content-center mb-4"
                                                            style="border:1px solid #FFCF23; color:#FFCF23; width: 60px; margin-top:20px">pending</span>
                                                    @elseif ($approval['status'] == 'approved')
                                                        <span class="badge badge-xs d-flex justify-content-center mb-4"
                                                            style="border: 1px solid #50B720; color:#50B720; width: 60px; margin-top:20px">approved</span>
                                                    @elseif ($approval['status'] == 'rejected')
                                                        <span class="badge badge-xs d-flex justify-content-center mb-4"
                                                            style="border:1px solid #E40909; color:#E40909; width: 60px; margin-top:20px">rejected</span>
                                                    @else
                                                        <span class="badge badge-secondary badge-xs">unknown</span>
                                                    @endif
                                                </td>
                                                <td class="align-middle text-center text-xs">
                                                    @if ($approval['status'] == 'pending')
                                                        <div class="d-flex flex-row justify-content-center pt-3">
                                                            <button
                                                                onclick="getDetail('{{ $approval['topup_id'] }}', '{{ $approval['amount'] }}')"
                                                                class="mx-1 btn text-white d-flex align-items-center  d-flex justify-content-center "
                                                                data-toggle="tooltip" data-placement="left"
                                                                title="Edit"
                                                                style="width: 60px; height:25px; background-color:#FFCF23"
                                                                data-topup-id={{ $approval['topup_id'] }}
                                                                data-topup-request={{ $approval['amount'] }}
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#approve-ask-dialog">
                                                                <i
                                                                    class="fa-sharp fa-solid fa-pen-to-square text-white text-md me-1"></i>
                                                                <span style="font-size: 0.6em">Edit</span>
                                                            </button>
                                                            <button
                                                                onclick="topupDecision('{{ $approval['topup_id'] }}', '{{ $approval['amount'] }}', 'approved')"
                                                                class="mx-1 btn text-white d-flex align-items-center  d-flex justify-content-center approved"
                                                                data-toggle="tooltip" data-placement="left"
                                                                title="Approve"
                                                                style="width: 60px; height:25px; background-color:#50B720">
                                                                <i
                                                                    class="fa-solid fa-circle-check text-white text-lg me-1"></i>
                                                                <span style="font-size: 0.6em">Approve</span>
                                                            </button>
                                                            <button data-bs-toggle="tooltip"
                                                                onclick="topupDecision('{{ $approval['topup_id'] }}', '{{ $approval['amount'] }}', 'rejected')"
                                                                class="mx-1 btn text-white d-flex align-items-center  d-flex justify-content-center rejected"
                                                                data-bs-original-title="reject" data-toggle="tooltip"
                                                                data-placement="left" title="Reject"
                                                                style="width: 60px; height:25px; background-color: #E40909">
                                                                <i class="fas fa-circle-xmark text-white text-lg me-1"></i>
                                                                <span style="font-size: 0.6em">Reject</span>
                                                            </button>
                                                        </div>
                                                    @else
                                                        <span class="badge badge-secondary badge-xs mt-3">done</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr class="text-center">
                                            <td colspan="6">
                                                <div class="row justify-content-center h-100 align-items-center">
                                                    <div
                                                        class="d-flex align-items-center justify-content-center flex-column py-5">
                                                        <img src="{{ asset('img/icons/bill.png') }}" class="img-fluid"
                                                            alt="" style="width: 100px">
                                                        <h6 class="font-weight-bold text-dark py-0">no have topup request
                                                        </h6>
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
        </div>
    </div>

    <script src="{{ asset('js/plugins/datatables.js') }}"></script>


    {{-- number separator --}}
    <script>
        $("input.number_separator").each((i, ele) => {
            let clone = $(ele).clone(false)
            clone.attr("type", "text")
            let ele1 = $(ele)
            console.log('TESSS', ele1);

            clone.val(Number(ele1.val()))
            $(ele).after(clone)
            $(ele).hide()
            clone.mouseenter(() => {
                ele1.show()
                clone.hide()
            });
            setInterval(() => {
                let newv = Number(ele1.val())
                let nfobject = new Intl.NumberFormat('en-CA');
                let output = nfobject.format(newv);

                if (clone.val() != output) {
                    clone.val(output)
                }
            }, 10);

            // clone.mouseleave(() => {
            //     ele.show()
            //     ele1.hide()
            // });

            // $(ele).mouseleave(() => {
            //     $(clone).show()
            //     $(ele1).hide()
            // });

        });
    </script>

    <script>
        easyNumberSeparator({
            selector: '.number-separator',
            separator: ',',
            decimalSeparator: '.',
            resultInput: '#result_input',
        })
    </script>

    <script>
        function getDetail(topup_id, amount, idfunction) {
            if (idfunction != "") {
                $(idfunction).modal('show')
            }

            document.getElementById('topUpId').value = topup_id;
            document.getElementById('topupAmount').value = amount;
            document.getElementById('topupAmountApprove').value = amount;

        }

        function handleSubmitApprove(event) {
            event.preventDefault();

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success-cstm mx-2",
                    cancelButton: "btn btn-danger-cstm mx-2",
                },
                buttonsStyling: false,
            });

            var topUpId = document.getElementById("topUpId").value;
            var topupAmount = document.getElementById("topupAmount").value;
            var topupAmountApprove = document.getElementById("topupAmountApprove").value;

            console.log(topupAmount, topupAmountApprove);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{ route('approves.action') }}",
                data: {
                    topup_id: topUpId,
                    decision: 'approved',
                    amount_approved: topupAmountApprove,
                },
                success: function(response) {
                    const {
                        success,
                        status,
                        message
                    } = response;

                    if (success === true) {
                        swalWithBootstrapButtons
                            .fire(
                                "Success!",
                                "Your request success.",
                                "success"
                            );

                        setTimeout(function() {
                            window.location.reload(true);
                        }, 1000);
                    } else {
                        swalWithBootstrapButtons
                            .fire(
                                "Error!",
                                message,
                                "error"
                            );
                    }
                }

            });

        }



        function topupDecision(topupId, amountApproved, decision) {

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
                            topUpApproval();
                        });

                        function topUpApproval() {
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            $.ajax({
                                type: "POST",
                                url: "{{ route('approves.action') }}",
                                data: {
                                    topup_id: topupId,
                                    decision: decision,
                                    amount_approved: amountApproved,
                                },
                                success: function(response) {
                                    const {
                                        success,
                                        status,
                                        message
                                    } = response;
                                    if (success === true) {
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
                                            "Error!",
                                            message,
                                            "error"
                                        );
                                    }
                                }
                            });
                        }

                    } else {
                        swalWithBootstrapButtons.fire(
                            "Cancelled",
                            "Your request cancelled :)",
                            "error"
                        );
                    }
                });
        }

        if (document.querySelector('#ask')) {
            const dataTableSearch = new simpleDatatables.DataTable("#ask", {
                searchable: false,
                fixedHeight: false,
                perPageSelect: false
            });
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
                    urlSearch = API_URL + "api/topup/approval/list/" +
                        USR_ID +
                        "?status=" + status;
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
                                console.log(obj);
                                tableOut += '<tr>' +
                                    '<td class="align-middle text-start text-xs text-dark">' +
                                    obj.date +
                                    '</td>'
                                tableOut +=
                                    '<td class="align-middle text-start text-capitalize text-xs text-dark">' +
                                    '<div><span class="font-weight-bold">' +
                                    obj.full_name +
                                    '</span></div>' +
                                    '<div><span>' +
                                    '</span></div>' +
                                    '<div><span>Remain Limit : </span><span class="text-xs font-weight-bold">' +
                                    obj.remain_limit +
                                    '</span>' +
                                    '</div>' +
                                    '</td>'
                                tableOut += '<td class="align-middle text-start text-xs text-dark">' +
                                    '<span class="text-xs">Top Up : </span><span class="font-weight-bold">' +
                                    obj.amount +
                                    '</span><br/>' +
                                    '<span class="text-xs">Approved :'+
                                        '<span class="fw-bold">'+
                                            obj.approval_amount +
                                        '</span>'+
                                    '</span>'+
                                    '</td>' +
                                    '<td class="align-middle text-start text-xs text-dark">' +
                                    '<div class="" style="max-width: 300px">' +
                                    '<div><span>Purpose : </span><span' +
                                    'class="font-weight-bold text-wrap"' +
                                    'style="text-align: justify">' +
                                    obj.purpose +

                                    '</span></div>' +
                                    '<div><span>Note : </span><span class="font-weight-bold text-wrap"' +
                                    'style="text-align: justify">' +
                                    obj.note +
                                    '</span></div>' +
                                    '</div>' +
                                    '</td>'
                                if (obj.status == 'pending') {
                                    tableOut +=
                                        '<td class="align-middle text-center text-xs d-flex justify-content-center">' +
                                        '<span class="badge badge-xs d-flex justify-content-center mb-4"' +
                                        'style="border:1px solid #FFCF23; color:#FFCF23; width: 60px; margin-top:20px">pending</span>' +
                                        '</td>'
                                } else if (obj.status == 'approved') {
                                    tableOut +=
                                        '<td class="align-middle text-center text-xs d-flex justify-content-center">' +
                                        '<span class="badge badge-xs d-flex justify-content-center mb-4"' +
                                        'style="border: 1px solid #50B720; color:#50B720; width: 60px; margin-top:20px">approved</span>' +
                                        '</td>'
                                } else if (obj.status == 'rejected') {
                                    tableOut +=
                                        '<td class="align-middle text-center text-xs d-flex justify-content-center">' +
                                        '<span class="badge badge-xs d-flex justify-content-center mb-4"' +
                                        'style="border:1px solid #E40909; color:#E40909; width: 60px; margin-top:20px">rejected</span>' +
                                        '</td>'
                                } else {
                                    '<td class="align-middle text-center text-xs d-flex justify-content-center">' +
                                    '<span class="badge badge-secondary badge-xs">unknown</span>' +
                                    '</td>'
                                }

                                if (obj.status == 'pending') {
                                    tableOut += '<td class="align-middle text-center text-xs">' +
                                        '<div class="d-flex flex-row justify-content-center pt-3">' +
                                        '<button onclick="getDetail(`' + obj.topup_id + '`,`' + obj.amount + '`,`' + '#approve-ask-dialog' + '`)"' +
                                        'class="mx-1 btn text-white d-flex align-items-center  d-flex justify-content-center"' +
                                        'data-toggle="tooltip" data-placement="left"' +
                                        'title="Edit"' +
                                        'style="width: 60px; height:25px; background-color:#FFCF23"' +
                                        'data-topup-id=`' + obj.topup_id + '`' +
                                        'data-topup-request=`' + obj.amount + '`' +
                                        'data-bs-toggle="modal" data-bs-target="#approve-ask-dialog">' +
                                        '<i class="fa-sharp fa-solid fa-pen-to-square text-white text-md me-1"></i>' +
                                        '<span style="font-size: 0.6em">Edit</span>' +
                                        '</button>' +
                                        '<button onclick="topupDecision(`' + obj.topup_id + '`,`' + obj.amount + '`,`approved`)"' +
                                        'class="mx-1 btn text-white d-flex align-items-center  d-flex justify-content-center approved"' +
                                        'data-toggle="tooltip" data-placement="left"' +
                                        'title="Approve"' +
                                        'style="width: 60px; height:25px; background-color:#50B720">' +
                                        '<i class="fa-solid fa-circle-check text-white text-lg me-1"></i>' +
                                        '<span style="font-size: 0.6em">Approve</span>' +
                                        '</button>' +
                                        '<button data-bs-toggle="tooltip" onclick="topupDecision(`' +
                                    obj.topup_id + '`,`' + obj.amount + '`,`rejected`)"' +
                                        'class="mx-1 btn text-white d-flex align-items-center  d-flex justify-content-center rejected"' +
                                        'data-bs-original-title="reject" data-toggle="tooltip"' +
                                        'data-placement="left" title="Reject"' +
                                        'style="width: 60px; height:25px; background-color: #E40909">' +
                                        '<i class="fas fa-circle-xmark text-white text-lg me-1"></i>' +
                                        '<span style="font-size: 0.6em">Reject</span>' +
                                        '</button>' +
                                        '</div>' +
                                        '</td>'
                                } else {
                                    tableOut += '<td class="align-middle text-center text-xs">' +
                                        '<span class="badge badge-secondary badge-xs mt-3">done</span>' +
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

    <script>
        function handleChangeStatus(event) {
            event.submit();
        }
    </script>
@endsection
