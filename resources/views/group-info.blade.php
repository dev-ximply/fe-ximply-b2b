@extends('layouts.main')





@section('container')

    <div class="row flex-column">

        <div class="col-md mb-3">
            <div class="d-flex justify-content-between mb-3">
                <div class="col-md-8 mb-3">
                    <span>
                        <p class="mb-0 text-xs text-uppercase font-weight-bold text-dark">Group</p>
                        <h5 class=" mb-0 text-dark font-weight-bolder">
                            <span>IT Department</span>
                        </h5>
                    </span>
                </div>
                <div class="col-md-4 mb-3 text-end">
                    <span>
                        <p class="mb-0 text-xs text-uppercase font-weight-bold text-dark">Have Client</p>
                        <h5 class=" mb-0 text-dark font-weight-bolder">
                            <span>Yes</span>
                        </h5>
                    </span>
                </div>
            </div>
            <div class="d-flex flex-row justify-content-between">
                <div class="col-md">
                    <p class="mb-0 text-xs text-uppercase font-weight-bold text-dark">Budget Total</p>
                    <h5 class=" mb-0 text-dark font-weight-bolder">
                        Rp <span>0</span>
                    </h5>
                </div>
                <div class="col-md text-end">
                    <p class="mb-0 text-xs text-uppercase font-weight-bold text-dark">Member</p>
                    <h5 class=" mb-0 text-dark font-weight-bolder">                
                        <span>0</span>
                    </h5>
                </div>
            </div>
        </div>
        <div class="col-md">

            <div class="card" style="border-radius: 10px">

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-borderless">

                            <thead>

                                <th class="col font-weight-bolder text-dark text-start text-uppercase text-xxs"

                                    style="color: #000000; ">

                                    Name</th>

                                <th class="col font-weight-bolder text-dark text-start text-uppercase text-xxs"

                                    style="color: #000000; ">

                                    Role Name</th>

                                <th class="col font-weight-bolder text-dark text-start text-uppercase text-xxs"

                                    style="color: #000000; ">

                                    Authorization</th>

                                <th class="col font-weight-bolder text-dark text-start text-uppercase text-xxs"

                                    style="color: #000000; ">

                                    Budget Limit</th>
                                <th class="col font-weight-bolder text-dark text-start text-uppercase text-xxs"
                                    style="color: #000000; ">
                                    Action</th>

                            </thead>

                            <tbody>

                                @foreach ($data['group'] as $group_info)

                                    <tr>

                                        <td class=" ps-md-4 text-sm  justify-content-between text-start" style="color: #000000">

                                            <span>

                                                {{ $group_info->full_name }}

                                            </span>

                                        </td>

                                        <td class=" ps-md-4 text-sm  justify-content-between text-start" style="color: #000000">

                                            {{ $group_info->role_name }}</td>

                                        <td class=" ps-md-4 text-sm  justify-content-between text-start" style="color: #000000">

                                            -</td>

                                        <td class=" ps-md-4 text-sm  justify-content-between text-start" style="color: #000000">

                                            {{ number_format($group_info->limit->remain_limit, 2) }}</td>
                                        <td class="">

                                            <div class="d-flex justify-content-start text-start ps-3">
                                                <button
                                                    class="btn text-white d-flex justify-content-center align-items-center text-capitalize btn-update me-2"
                                                    data-bs-title="Edit" data-bs-toggle="modal" 
                                                    data-bs-target="#edit_modal_users"
                                                    style="background-color: #ff720c;width:50px;height:25px;font-size:12px; font-weight:500;"
                                                    {{-- onclick="getDataMember('{{ $item->id }}','{{ $item->group_name }}', '{{ $item->role_name }}', '{{ $item->email }}')" --}}
                                                    >
                                                    Edit
                                                </button>
                                                <button
                                                    class="btn text-white d-flex justify-content-center align-items-center me-2 text-capitalize btn-update"
                                                    data-bs-title="View Your Expense Member" data-bs-toggle="modal"
                                                     data-bs-target="#editModalPartner"
                                                    style="background-color: #E40909;width:50px;height:25px;font-size:12px; font-weight:500;"
                                                    onclick="">
                                                    Delete
                                                </button>
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



    </div>

@endsection

