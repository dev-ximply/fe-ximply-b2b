@extends('layouts.main')

@section('container')
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

    <div class="modal fade" id="edit_modal_budget" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #19194B; color:white">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Edit Budget</h5>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close">
                        {{-- <span aria-hidden="true">×</span> --}}
                    </button>
                </div>
                <div class="modal-body">
                    {{-- <div class="card card-body mt-3"> --}}
                    {{-- <hr class="horizontal dark my-3"> --}}
                    <form action="" method="post">
                        @csrf
                        <input type="text" id="user_id" name="user_id" value="" hidden>
                        <input type="text" id="form_ui" name="form_ui" value="true" hidden>
                        <div class="my-2">
                            <label for="projectName" class="form-label text-dark" style="font-weight: 600">Name</label>
                            <select class="form-select" name="member_user_id">
                                <option value="" selected>Select</option>
                                {{-- @foreach ($data_person as $item1) --}}
                                <option value="" class="text-capitlize"></option>
                                {{-- @endforeach --}}
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label text-dark" style="font-weight: 600">Budget Limit </label>
                                <input type="number" class="form-control" id="s" name="set_limit">
                            </div>
                            <div class="col-6">
                                <label class="form-label text-dark" style="font-weight: 600">Auto Approve Amount</label>
                                <input type="number" class="form-control" id="f" name="auto_approve_limit">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label text-dark" style="font-weight: 600">Frequency</label>
                                <select class="form-select" name="frequency">
                                    <option value="onetime">Onetime</option>
                                    <option value="monthly">Monthly</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="form-label text-dark" style="font-weight: 600">Expire Date</label>
                                <input class="form-control datetimepicker" type="date" placeholder="Please select date"
                                    data-input name="expire_date">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <label class="form-label text-dark" style="font-weight: 600">Category Exceptions</label>
                                <select class="getcategory form-control" name="except_category_id"
                                    id="choices-multiple-remove-button2" multiple>
                                    {{-- @foreach ($data_category as $item2) --}}
                                    <option value="" class="text-capitlize">
                                        {{-- {{ $item2->category_name }} --}}
                                    </option>
                                    {{-- @endforeach --}}
                                </select>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-3">
                            <button type="button" name="button" class="btn btn-danger-cstm m-0"
                                data-bs-dismiss="modal">Cancel</button>
                            <input type="submit" name="button" value="Submit" class="btn btn-success-cstm m-0 ms-2">
                        </div>
                    </form>
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4 mt-3 mx-1 justify-content-between">
        <div class="col-md d-sm-flex justify-content-start px-0 mx-0">
            <div class="d-flex me-2">
                <a href="/new-budget" class="btn btn-icon text-white d-flex text-xs align-items-center"
                    style="background-color: #19194b;">
                    <span>
                        New Budget
                    </span>
                    {{-- &nbsp;
                    <i class="fas fa-plus text-md"></i> --}}
                </a>
            </div>
            {{-- @if (Auth::user()->account_detail()['role_level'] != 0)
                <div class="d-flex me-2">
                    <a href="/spend/request" class="btn btn-outline-dark btn-icon text-xs d-flex align-items-center">
                        Top Up Requested
                         &nbsp;<i class="fa-solid fa-circle-exclamation text-md text-warning"></i>
                    </a>
                </div>
            @endif --}}
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
                                        <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#edit_modal_budget">Edit</a>
                                        {{-- TEST<a class="dropdown-item" href="javascript:;">Retire</a> --}}
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
                        <hr class="horizontal dark">
                        <div class="w-100 mt-1">
                            <div class="d-flex mb-2">
                                <span class="me-2 text-sm font-weight-normal">Used : Rp
                                    {{ number_format($item->limit->used_limit) }}
                                </span>
                                {{-- TEST<span
                                    class="ms-auto text-sm font-weight-normal">{{ number_format($item->limit->budget_spending) }}
                                    %</span> --}}
                            </div>
                        </div>
                        {{-- <div class="row mt-2">
                            <div class="col text-end">
                                <h6 class="text-sm mb-0">
                                    {{ $item->limit->expire_date }}
                                </h6>
                                <p class="text-secondary text-sm font-weight-normal mb-0">Expired Date</p>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        $(".responsive").slick({
            prevArrow: $(".prev"),
            nextArrow: $(".next"),
            infinite: false,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll: 3,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: false
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    </script>
@endsection
