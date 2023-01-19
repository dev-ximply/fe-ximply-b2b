@extends('layouts.main')

@section('container')
    {{-- @include('rewards.rewards') --}}
    <div class="col-md-12 text-end">
        <button onclick="history.back()" class="btn  btn-sm  text-white" style="background-color: #191a4d"
            type="button">back</button>
    </div>
    <div class="row">
        <div class="col-lg-12  col-md-12">
            <div class="row">
                <div class="text-center my-2">
                    <p class="font-weight-bold" style="color: #000000">Your Voucher</p>
                </div>

                @php
                    $iterate = 1;
                @endphp
                {{-- {{ json_encode($data['coupon']) }} --}}



                @foreach ($data['coupons'] as $itemCoupon)
                    <div class="col-md-3 mb-2">
                        <a class="" data-bs-toggle="collapse" href="#collapseExample1{{ $iterate }}"
                            role="button" aria-expanded="false" aria-controls="collapseExample1">
                            <div class="w-100">
                                <img src="{{ config('storage.base_url') . $itemCoupon->discount_picture }}" alt=""
                                    class="img-fluid" style="width: 100%" srcset="">
                            </div>
                        </a>
                        @if ($itemCoupon->discount_barcode_picture != 0)
                            <div class="collapse " id="collapseExample1{{ $iterate }}">
                                <div class="card ">
                                    <div class="card-body">
                                        <div class="d-flex flex-column">
                                            {{-- <div>
                                        <span class="text-xs font-weight-bold"><b>Discount at Makanan Ku Up To
                                                15%!!</b></span>
                                    </div> --}}
                                            <div class="d-flex flex-column align-items-center p-0 justify-content-center">
                                                <img src="{{ config('storage.base_url') . $itemCoupon->discount_barcode_picture }}"
                                                    class="img-fluid" alt="" style="width: 90px">

                                                {{-- <span class="text-xs font-weight-bold">Scan QR Code Above</span>
                                        <span class="text-xs font-weight-bold">to Claim this Voucher</span> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @php
                                $iterate++;
                            @endphp
                        @else
                            <div class="collapse " id="collapseExample1{{ $iterate }}">
                                <div class="card ">
                                    <div class="card-body">
                                        <div class="d-flex flex-column">
                                            {{-- <div>
                                    <span class="text-xs font-weight-bold"><b>Discount at Makanan Ku Up To
                                            15%!!</b></span>
                                </div> --}}
                                            <div class="d-flex flex-column align-items-center p-0 justify-content-center">
                                                <p class="text-dark" style="font-size: 20px; font-weight:700">Discount Not Found</p>

                                                {{-- <span class="text-xs font-weight-bold">Scan QR Code Above</span>
                                    <span class="text-xs font-weight-bold">to Claim this Voucher</span> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @php
                                $iterate++;
                            @endphp
                        @endif

                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
