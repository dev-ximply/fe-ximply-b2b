@extends('layouts.main')

@section('container')
    @include('budget.edit-budget')
    @include('budget.edit-budget-admin')
    <style>
        .slider-wrapper {
            width: 100%;
            overflow: hidden;
            padding: 25px 20px 20px;
            white-space: wrap;
        }

        .prev {
            color: black;
            position: absolute;
            top: 45%;
            left: -10px;
            font-size: 1.5em;

            :hover {
                cursor: pointer;
                color: black;
            }
        }

        .next {
            color: black;
            position: absolute;
            top: 45%;
            right: 10px;
            font-size: 1.5em;

            :hover {
                cursor: pointer;
                color: black;
            }
        }

        .fact {
            vertical-align: top;
            display: inline-block;
            height: auto;
            width: 290px !important;
            background-color: white;
            padding: 10px;
            margin: 0px 10px 0px 5px;
            border-radius: 15px;
        }
    </style>

    <div class="row mb-4 mt-3 mx-1 justify-content-between">
        <div class="col-md d-sm-flex justify-content-start px-0 mx-0">
            <div class="d-flex me-2">
                <a href="/new-budget" class="btn btn-icon text-white d-flex text-xs align-items-center"
                    style="background-color: #19194b;">
                    <span>
                        New Budget
                    </span>
                </a>
            </div>
        </div>
        <div class="col-md text-md-end text-start mt-2 px-0 mx-0 d-flex justify-content-end">

            <div class="">
                <p class="mb-0 text-xs text-uppercase font-weight-bold text-dark">Remain Budget</p>
                <h5 class=" mb-0 text-dark font-weight-bolder">
                    Rp
                    <span>{{ $data['limit']->remain_limit != null ? number_format($data['limit']->remain_limit, 2) : '0' }}</span>
                </h5>
            </div>
            @if (session()->get('is_superadmin') == true)
                <div class="ms-4">
                    <a href="javascript:void(0)" onclick="getAdminBudget('{{ Auth::user()['id'] }}')" data-toggle="tooltip"
                        data-placement="left" title="Edit your budget" data-bs-toggle="modal"
                        data-bs-target="#editBudgetAdmin">
                        <i class="fa-sharp fa-regular fa-pen-to-square fa-2xl"></i>
                    </a>
                </div>
            @endif
        </div>
    </div>

    <script></script>


    <div class="row" style="margin-left: -5px;">
        @foreach ($data['members'] as $item)
            <div class="col-md-3">
                <div class="card mb-3">
                    <div class=" p-2 px-3">
                        <div class="d-flex justify-content-center">
                            <div class="my-auto">
                                <h6 class="text-capitalize text-dark">
                                    {{ $item->full_name }}
                                </h6>
                                @if ($item->role_name == 'member')
                                    <span class="text-capitalize px-3 py-1 "
                                        style="font-size:11px;background:#f3fcf7;color:#62ca50; border-radius:3px">{{ $item->role_name }}</span>
                                @else
                                    <span class="text-capitalize px-3 py-1 "
                                        style="font-size:11px;background:#eff6fe;color:#5695cf; border-radius:3px">{{ $item->role_name }}</span>
                                @endif
                            </div>
                            <div class="ms-auto">
                                <div class="dropdown">
                                    <button class="btn btn-link text-secondary ps-0 pe-2" id="navbarDropdownMenuLink"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v text-lg"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end me-sm-n4 me-n3"
                                        aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#edit_modal_budget"
                                            onclick="getDetailBudgets('{{ $item->id }}', '{{ $item->full_name }}', '{{ $item->limit->remain_limit }}', '{{ $item->limit->auto_approve }}', '{{ $item->limit->expire_date }}')">Edit</a>
                                        <a class="dropdown-item">
                                            <span onclick="deleteBudget('{{ $item->limit->spend_id }}')">
                                                Delete
                                            </span>
                                        </a>
                                        <a class="dropdown-item">
                                            <span onclick="resetToZero('{{ $item->limit->spend_id }}')">
                                                Reset
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-100 mt-1">
                            <span class="me-2 font-weight-normal " style="font-size: 0.8em; color:#000">Department : <span
                                    class="text-capitalize">
                                    {{ $item->group_name != null || $item->group_name != '' ? $item->group_name : '*' }}
                                </span></span>
                        </div>
                        <div class="w-100 mt-1">
                            <span class="me-2 font-weight-normal" style="font-size: 0.8em; color:#000">Set Limit : Rp
                                {{ number_format($item->limit->assign_limit) }}</span>
                        </div>
                        <div class="w-100 mt-1">
                            <span class="me-2 font-weight-normal" style="font-size: 0.8em; color:#000">Remain : Rp
                                {{ number_format($item->limit->remain_limit) }}</span>
                        </div>
                        <div class="w-100 mt-1">
                            <span class="me-2 font-weight-normal" style="font-size: 0.8em; color:#000">Auto Approve : Rp
                                {{ number_format($item->limit->auto_approve) }}</span>
                        </div>
                        <div class="w-100 mt-1">
                            <span class="me-2 font-weight-normal" style="font-size: 0.8em; color:#000">Created :
                                {{ $item->limit->created_date }}
                            </span>
                        </div>
                        <hr class="horizontal dark">
                        <div class="w-100 mt-1">
                            <div class="d-flex mb-2">
                                <span class="me-2 text-sm" style=" color:#000; font-weight:500">Used : Rp
                                    {{ number_format($item->limit->used_limit) }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        function getDetailBudgets(id, full_name, remain_limit, auto_approve, expire_date) {

            document.getElementById('edit_user_id').value = id;
            document.getElementById('edit_budget_name').value = full_name;
            document.getElementById('edit_budget_limit_avail').value = remain_limit;
            document.getElementById('auto_approve_edit').value = auto_approve;
            document.getElementById('expire_date').value = expire_date;
            // document.getElementById('used_limit').value = used_limit;
            console.log(remain_limit);
            console.log(auto_approve);

        }
    </script>


    <script>
        function getAdminBudget() {
            $.ajaxSetup({
                headers: {
                    "Authorization": "Bearer " + AUTH_TOKEN,
                    "Accept": "application/json"
                }
            });
            $.ajax({
                type: "GET",
                url: API_URL + "api/spend/balance?user_id=" + USR_ID,
                success: function(res) {
                    if (res['success'] == true) {
                        var response = res['data'];
                        console.log(response);
                        document.getElementById('spending_budget_admin').value = response['remain_limit'];
                        // document.getElementById('edit_budget_limit_admin').value = response['merchant'];
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
    </script>

    <script>
        function deleteBudget(spendId) {

            var tenant = TENANT_CODE;
            var userId = USR_ID;

            console.log(spendId);

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
                        //delete parner
                        console.log(spendId);
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            type: "DELETE",
                            url: API_URL + "api/spends/" + spendId,

                            // url: "{{ route('partners.delete') }}",
                            data: {
                                spend_id: spendId,
                                user_id: userId,
                                tenant_code: tenant
                            },
                            success: function(response) {

                                const {
                                    success,
                                    status,
                                    message
                                } = response;

                                console.log(response)

                                if (status === true) {
                                    setTimeout(function() {
                                        window.location.reload(true);
                                    }, 1000);
                                } else {
                                    swalWithBootstrapButtons.fire(
                                        "Succees",
                                        message,
                                        "Error"
                                    );
                                    setTimeout(function() {
                                        window.location.reload(true);
                                    }, 1000);
                                }

                            },


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

    {{-- Reset To Zero Budget Member --}}
    <script>
        function resetToZero(spendId) {
            var tenant = TENANT_CODE;
            var userId = USR_ID;

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success-cstm mx-2",
                    cancelButton: "btn btn-danger-cstm mx-2",
                },
                buttonsStyling: false,
            });

            swalWithBootstrapButtons
                .fire({
                    title: "<h5>Are you sure you want to reset?</h5>",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    reverseButtons: false,
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        //delete parner
                        console.log(spendId);
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            type: "POST",
                            url: API_URL + "api/spends/" + spendId + '/tozero',
                            // url: "{{ route('partners.delete') }}",
                            data: {
                                spend_id: spendId,
                                user_id: userId,
                                tenant_code: tenant
                            },
                            success: function(response) {

                                const {
                                    success,
                                    status,
                                    message
                                } = response;

                                console.log(response)

                                if (status === true) {
                                    setTimeout(function() {
                                        window.location.reload(true);
                                    }, 1000);
                                } else {
                                    swalWithBootstrapButtons.fire(
                                        "Succees",
                                        message,
                                        "Error"
                                    );
                                    setTimeout(function() {
                                        window.location.reload(true);
                                    }, 1000);
                                }

                            },


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
    {{-- Reset To Zero Budget Member --}}



    {{-- separate number --}}
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
                let newV = Number(ele1.val())
                let nfobject = new Intl.NumberFormat('en-CA');
                let output = nfobject.format(newV);

                if (clone.val() != output) {
                    clone.val(output)
                }
            }, 10);
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
    {{-- separate number --}}
@endsection
