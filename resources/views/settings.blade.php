@extends('layouts.main')

@section('container')
    <div class="row">
        <div class="col-md-6 mb-4">
            <p class="text-sm font-weight-bold text-dark">Intelligence Scan</p>
            <div class="card d-flex justify-content-center" style="border-radius: 5px; min-height:70px">
                <div class="ms-2">
                    <div class="fw-bold text-dark">
                        Your Remain Usage
                    </div>
                    <div class="fw-bolder" style="color:black;font-size: 20px">
                        {{ $data['profile']->nanonets_usage_remain }}&nbsp;<span class="fw-bold"
                            style="font-size: 15px">scans</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <p class="text-sm font-weight-bold text-dark">Package</p>
            <div class="card d-flex justify-content-center" style="border-radius: 5px; min-height:70px">
                <div class="ms-2">
                    <div class="fw-bold text-dark">
                        Your Package
                    </div>
                    <div class="fw-bolder" style="font-size: 15px;color:black">
                        {{ $data['profile']->subscription_type }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <p class="text-sm font-weight-bold text-dark">Transaction</p>
            <div class="card" style="border-radius: 5px; height:200px; overflow-y:auto; overflow-x:hidden">
                @if (count($data['transactions']) > 0)
                    <div class="row mt-2">
                        <div class="col-12">
                            <div class="card" style="border-radius: 5px">
                                <div class="table-responsive">
                                    <table class="table table-flush text-dark" id="datatable-search">
                                        <thead class="thead-light">
                                            <tr>
                                                <th class="text-sm px-2" style="font-weight: 600">Date</th>
                                                <th class="text-sm px-0" style="font-weight: 600">Product</th>
                                                <th class="text-sm px-0" style="font-weight: 600">Total</th>
                                                <th class="text-sm px-0" style="font-weight: 600">Status</th>
                                                <th class="text-sm px-0 text-center" style="font-weight: 600">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data['transactions'] as $item)
                                                <tr class="align-middle">
                                                    <td class="text-xs font-weight-bold text-capitalize px-2 pb-0 pt-3">
                                                        <p class="text-dark" style="font-size: 13px">
                                                            {{ $item->bill_date }}
                                                        </p>
                                                    </td>
                                                    <td class="text-xs font-weight-bold px-0 pt-3 pb-0">
                                                        <p class="text-dark" style="font-size: 13px">
                                                            {{ $item->product }}
                                                        </p>
                                                    </td>
                                                    <td class="text-xs font-weight-bold px-0 pt-3 pb-0">
                                                        <p class="text-dark font-weight-bold" style="font-size: 13px">
                                                            {{ number_format($item->total_amount, 2) }}
                                                        </p>
                                                    </td>
                                                    <td class="text-xs font-weight-bold px-0 pt-3 pb-0">
                                                        <p class="text-dark font-weight-bold" style="font-size: 13px">
                                                            {{ $item->payment_status }}
                                                        </p>
                                                    </td>
                                                    <td class="text-xs font-weight-bold">
                                                        <div class="pt-3 d-flex justify-content-center">
                                                            <a href="/payment/detail/{{ $item->payment_code }}" target="_blank"
                                                                class="btn text-white d-flex justify-content-center align-items-center text-capitalize"
                                                                style="background-color: #191a4d; width:65px; height:25px; font-size:12px; font-weight:500">detail</a>
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
                    <div class="row justify-content-center align-items-center" style="height: 190px">
                        <div class="d-flex align-items-center justify-content-center flex-column">
                            <img src="{{ asset('img/icons/bill.png') }}" class="img-fluid" style="width: 100px">
                            <h6 class="font-weight-bold text-dark py-0">You don't have transaction</h6>
                            <span class="text-xs" style="text-align: center">please do subscription package</span>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
