@extends('layouts.main')

@section('container')
    @include('budget.edit-budget')
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


    @if (session()->get('is_superadmin') != 1)
        <div class="row justify-content-center mb-4">
            <div class="col-md d-flex  justify-content-center">
                <div class="col-md d-flex align-items-center">
                    {{-- <div class="col-md-7 me-3">
                        <label for="" class="text-dark">Input your budget</label>
                        <div class="form-group d-flex">
                            <input type="text" placeholder="Set your budget" class="form-control" style="height: 42px">
                            <button class="btn text-white ms-3" style="background: #62ca50">Submit</button>
                        </div>
                    </div> --}}
                </div>
                <div class="col-md text-end">
                    <div class="form-group">
                        <label for="" class="text-dark">Your budget</label>
                        <p class="text-dark" style="font-size:20px; font-weight: 800">Rp. 100.000.000</p>
                    </div>
                </div>
            </div>
        </div>
    @endif
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
        <div class="col-md text-md-end text-start mt-2 px-0 mx-0">
            @if (session()->get('is_superadmin') == false)
                <p class="mb-0 text-xs text-uppercase font-weight-bold text-dark">Remain Budget</p>
                <h5 class=" mb-0 text-dark font-weight-bolder">
                    Rp
                    <span>{{ $data['limit']->remain_limit != null ? number_format($data['limit']->remain_limit, 2) : '0' }}</span>
                </h5>
            @endif
        </div>
    </div>


    <div class="row" style="margin-left: -5px;">
        @foreach ($data['members'] as $item)
            <div class="col-md-3">
                <div class="card mb-3">
                    <div class="card-body p-2">
                        <div class="d-flex">
                            <div class="my-auto">
                                <h6 class="text-capitalize text-dark">
                                    {{ $item->full_name }}
                                </h6>
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
                                            onclick="getDetailBudgets('{{ $item->id }}', '{{ $item->full_name }}', '{{ $item->limit->remain_limit }}', '{{ $item->limit->auto_approve }}', '{{ $item->limit->expire_date }}' )">Edit</a>
                                        <a class="dropdown-item">
                                            <span onclick="deleteBudget('{{ $item->limit->spend_id }}')">
                                                Delete
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-100 mt-1">
                            <span class="me-2 font-weight-normal " style="font-size: 0.8em">Department : <span
                                    class="text-capitalize">
                                    {{ $item->group_name != null || $item->group_name != '' ? $item->group_name : '*' }}
                                </span></span>
                        </div>
                        <div class="w-100 mt-1">
                            <span class="me-2 font-weight-normal" style="font-size: 0.8em">Set Limit : Rp
                                {{ number_format($item->limit->assign_limit) }}</span>
                        </div>
                        <div class="w-100 mt-1">
                            <span class="me-2 font-weight-normal" style="font-size: 0.8em">Remain : Rp
                                {{ number_format($item->limit->remain_limit) }}</span>
                        </div>
                        <div class="w-100 mt-1">
                            <span class="me-2 font-weight-normal" style="font-size: 0.8em">Auto Approve : Rp
                                {{ number_format($item->limit->auto_approve) }}</span>
                        </div>
                        <div class="w-100 mt-1">
                            <span class="me-2 font-weight-normal" style="font-size: 0.8em">Created :
                                {{ $item->limit->created_date }}
                            </span>
                        </div>
                        <hr class="horizontal dark">
                        <div class="w-100 mt-1">
                            <div class="d-flex mb-2">
                                <span class="me-2 text-sm font-weight-normal">Used : Rp
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
            console.log(auto_approve);

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
