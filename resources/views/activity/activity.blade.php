@extends('layouts.main')

@section('container')
    <div class="row">
        <div class="col-md mx-auto">
            <div class="m-auto d-flex justify-content-end">
                <button onclick="history.back()" class="btn  btn-sm ms-auto text-white "
                    type="button" style="background: #702DFF">back</button>
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
                                        class="text-uppercase text-dark text-xs font-weight-bolder opacity-7 text-center">
                                        Time
                                    </th>
                                    <th
                                        class="text-uppercase text-dark text-xs font-weight-bolder opacity-7 ps-2 text-center">
                                        Activity</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($data_activity as $item) --}}
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-xs text-dark"></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0"><b></b></p>
                                            <p class="text-xs font-weight-bold mb-0"></p>
                                            <p class="text-xs font-weight-bold mb-0"></p>
                                            <p class="text-xs font-weight-bold mb-0"><span></span></p>
                                        </td>
                                    </tr>
                                {{-- @endforeach                                 --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
