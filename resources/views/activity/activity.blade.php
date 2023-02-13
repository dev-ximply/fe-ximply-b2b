@extends('layouts.main')

@section('container')
    <div class="row">
        <div class="col-md mx-auto">
            <div class="m-auto d-flex justify-content-end">
                <button onclick="history.back()" class="btn  btn-sm ms-auto text-white "
                    type="button" style="background: #191a4b">back</button>
            </div>
            <div class="card">
                <div class="card-body">
                    <p class="text-center text-lg font-weight-bold text-dark">Latest Activity</p>
                    {{-- <div class="card"> --}}
                    <div class="table-responsive">
                        <table class="table table-striped align-items-center  mb-0  ">
                            <thead>
                                <tr>
                                    <th
                                        class="text-uppercase text-dark text-xs font-weight-bolder opacity-9 text-center">
                                        Time
                                    </th>
                                    <th
                                        class="text-uppercase text-dark text-xs font-weight-bolder opacity-9 ps-2 text-center">
                                        Activity</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['activity'] as $item)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center text-center">
                                                    <span class="mb-0 text-xs text-dark">{{  $item->date  }}

                                                        <p class="text-xs text-dark">{{  $item->time }}</p>
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0 text-dark"><b>{{  $item->title  }}</b></p>
                                            <p class="text-xs font-weight-bold mb-0 text-dark">{{  $item->information  }}</p>
                                  
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
@endsection
