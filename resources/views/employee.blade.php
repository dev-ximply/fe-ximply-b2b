@extends('layouts.main')

@section('container')
    @include('manage-teams.add-modal-user')
    @include('manage-teams.edit-modal-user')
    <div class="">
        <button class="btn text-white" data-bs-toggle="modal" data-bs-target="#add_modal_users"
            style="background-color: #19194b">
            <span>Add Employee</span>&nbsp;
            <i class="fa-solid fa-user-plus ms-2"></i>
        </button>
    </div>
    <div class="row " style="display: none">
        <div class="col-md-7">
            <form action="" method="get">
                <div class="row row-cols-md-2 row-cols-1 mt-2 justify-content-end">
                    <div class="col-md-4 mt-2 d-flex align-items-end">
                        <input type="search" name="" id="" placeholder="Search..."
                            class="form-control text-dark"
                            style="font-size:11px;line-height:16px !important;border-radius:5px !important">
                    </div>
                    <div class="col-md-2 mt-2 d-flex" style="width: 70px">
                        <button type="submit" style="line-height:16px;" class="form-control" value="Search">
                            <i class="fa-sharp fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @if (count($data['employee']) != 0)
        <div class="row mt-1">
            <div class="col-12">
                <div class="card" style="border-radius: 5px">
                    <div class="table-responsive">
                        <table class="table table-flush text-dark" id="datatable-search">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-sm px-2" style="font-weight: 600">Name</th>
                                    <th class="text-sm px-0" style="font-weight: 600">Contact Info</th>
                                    <th class="text-sm px-0" style="font-weight: 600">Department</th>
                                    <th class="text-sm px-0" style="font-weight: 600">Role</th>
                                    <th class="text-sm px-0 text-center" style="font-weight: 600">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['employee'] as $item)
                                    <tr class="align-middle">
                                        <td class="text-xs font-weight-bold text-capitalize px-2 pb-0 pt-3">
                                            <p class="text-dark" style="font-size: 13px">
                                                {{ $item->full_name }}
                                            </p>
                                        </td>
                                        <td class="text-xs font-weight-bold px-0 pt-3 pb-0">
                                            <p class="text-dark" style="font-size: 13px">
                                                {{ $item->email }}
                                            </p>
                                            <p class="text-dark" style="font-size: 13px">
                                                {{ ($item->handphone != "" ? $item->handphone : "-") }}
                                            </p>
                                        </td>
                                        <td class="text-xs font-weight-bold px-0 pt-3 pb-0">
                                            <p class="text-dark" style="font-size: 13px">
                                                {{ ($item->group_name != "" ? $item->group_name : "-") }}
                                            </p>
                                        </td>
                                        <td class="text-xs font-weight-bold px-0 pt-3 pb-0">
                                            <p class="text-dark" style="font-size: 13px">
                                                {{ ($item->role_name != "" ? $item->role_name : "-") }}
                                            </p>
                                        </td>
                                        <td class="text-xs font-weight-bold">
                                            <div class="d-flex justify-content-center pb-0 mt-3">
                                                <button class="btn text-white d-flex justify-content-center align-items-center text-capitalize btn-update"
                                                    data-bs-title="View Your Expense Member" data-bs-toggle="modal" data-id="{{ $item->id }}" data-bs-target="#edit_modal_users"
                                                    style="background-color: #ff720c;width:65px;height:25px;font-size:12px; font-weight:500;" onclick="changeEmploye(this.getAttribute('data-id'))">
                                                    Edit
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
    @else
        <div class="row justify-content-center h-100 align-items-center">
            <div class="d-flex align-items-center justify-content-center flex-column py-5">
                <img src="{{ asset('img/icons/bill.png') }}" class="img-fluid" alt="" style="width: 100px">
                <h6 class="font-weight-bold text-dark py-0">You don't have employee</h6>
                <span class="text-xs" style="text-align: center">Create your employee with click the button above</span>
            </div>
        </div>
    @endif

    <script>
        function changeEmploye(value){
            console.log(value)
            document.getElementById('user_id').value=value;
        }
    </script>
@endsection
