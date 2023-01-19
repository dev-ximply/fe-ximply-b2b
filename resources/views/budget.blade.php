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
            {{-- @if (Auth::user()->account_detail()['role_level'] != 0) --}}
                <p class="mb-0 text-xs text-uppercase font-weight-bold text-dark">Remain Budget</p>
                <h5 class=" mb-0 text-dark font-weight-bolder">
                    Rp <span>{{ $data['limit']->remain_limit != null ? number_format($data['limit']->remain_limit, 2) : '0' }}</span>
                </h5>
            {{-- @endif --}}
        </div>
    </div>

    <div class="slider-wrapper px-0 p-0" style="height: 100%">
        <div class="slider">
            <div class="col-md-12 heroSlider-fixed">
                <div class="overlay">
                    <div class="slider responsive">
                        @foreach ($data['members'] as $item)
                            <div class="fact">
                                <div class="card-body p-2">
                                    <div class="d-flex">
                                        <div class="my-auto">
                                            <h6 class="text-capitalize text-dark">
                                                {{ $item->full_name }}
                                            </h6>
                                        </div>
                                        <div class="ms-auto">
                                            <div class="dropdown">
                                                <button class="btn btn-link text-secondary ps-0 pe-2"
                                                    id="navbarDropdownMenuLink" data-bs-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v text-lg"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end me-sm-n4 me-n3"
                                                    aria-labelledby="navbarDropdownMenuLink">
                                                    <a class="dropdown-item">Edit</a>
                                                    {{-- <a class="dropdown-item" href="javascript:;">Retire</a> --}}
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
                                            {{-- <span
                                                class="ms-auto text-sm font-weight-normal">
                                                {{ number_format($item->limit->budget_spending) }} %</span> --}}
                                        </div>
                                </div>
                                    <div class="row mt-2">
                                        <div class="col text-end">
                                            <h6 class="text-sm mb-0">
                                                {{ $item->limit->expire_date }}
                                            </h6>
                                            <p class="text-secondary text-sm font-weight-normal mb-0">Expired Date</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="prev">
                        <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                    </div>
                    <div class="next">
                        <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                    </div>

                </div>
            </div>
        </div>
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
