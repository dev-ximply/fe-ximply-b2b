@extends('layouts.main')


@section('container')
    <div class="row flex-column">
        <div class="d-flex justify-content-end mb-4">
            <button class="btn text-white" style="background: #191a4b" onclick="history.back()">Back</button>
        </div>

        {{-- modal edit group info --}}
        {{-- <div class="modal fade" id="edit_group_info" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div> --}}
        {{-- modal edit group info --}}



        <div class="modal fade" id="edit_group_info" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background: #19194b">
                        <h6 class="font-weight-bolder text-white" style="font-weight: 600">View Member</h6>
                        <button type="button" class="btn-close  text-white" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-text mt-4" id="basic-info">
                            <div class="card-body pt-0">
                                <form onsubmit="">

                                    <div class="row">
                                        {{-- <input type="hidden" id="user_id"> --}}
                                        <div class="col-6">
                                            <label class="form-label"
                                                style="color: black; font-weight:500">Firstname</label>
                                            <div class="input-group">
                                                <input id="edit_first_name" placeholder="Firstname" name="edit_first_name"
                                                    class="form-control" type="text" required="required">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label" style="color: black; font-weight:500">Lastname</label>
                                            <div class="input-group">
                                                <input id="edit_last_name" placeholder="Lastname" name="edit_last_name"
                                                    class="form-control" type="text" required="required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <label class="form-label mt-2"
                                                style="color: black; font-weight:500">Email</label>
                                            <div class="input-group">
                                                <input id="edit_email" placeholder="Email" name="edit_email"
                                                    class="form-control" type="email">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label mt-2" style="color: black; font-weight:500">Role
                                                Name</label>
                                            <div class="input-group">
                                                <select class="form-select " name="group_role_name" id="group_role_id">
                                                    <option value="" id="group_role_name" hidden selected></option>
                                                    @foreach ($data['group'] as $item_role)
                                                        {{-- <option value="{{ $item_role->id }}">{{ $item_role->role_name }}
                                                        </option> --}}
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <input type="hidden" name="test" id="user_id">
                                        <div class="col-6">
                                            <label class="form-label mt-2"
                                                style="color: black; font-weight:500">Authorization</label>
                                            <div class="">
                                                <ul>
                                                    <li class="text-xs text-dark">Manage Spend</li>
                                                    <li class="text-xs text-dark">Manage User</li>
                                                    <li class="text-xs text-dark">Approval Expense</li>
                                                    <li class="text-xs text-dark">Approval Top Up</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label mt-2" style="color: black; font-weight:500">Budget
                                                Limit</label>
                                            <div class="">
                                                <input id="edit_budget_limit" placeholder="Employee Code"
                                                    name="edit_budget_limit" class="form-control" type="text">
                                            </div>
                                        </div>
                                        {{-- <div class="col-6">
                                    <label class="form-label mt-2" style="color: black; font-weight:500">Email</label>
                                    <div class="">

                                        <input type="text" class="form-control" id="edit_email" name="edit_email" disabled>
                                        
                                    </div>
                                </div> --}}
                                    </div>
                                    <div class="row mt-2 ">
                                        <div class="d-flex mt-4 justify-content-end mb-0">
                                            <div class="mb-0">
                                                <button class="btn text-white" data-bs-dismiss="modal"
                                                    style="background-color: #D42A34">Cancel</button>
                                                <button type="sumbit" class="btn text-white"
                                                    style="background-color: #62ca50">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <div class="col-md mb-3">
            <div class="d-flex justify-content-between mb-3">
                <div class="col-md-8 mb-3">
                    <span>
                        <p class="mb-0 text-xs text-uppercase font-weight-bold text-dark">Group</p>
                        <h5 class=" mb-0 text-dark font-weight-bolder">
                            <span> {{ $data['group_detail']->group_name }} </span>
                        </h5>
                    </span>
                </div>
                <div class="col-md-4 mb-3 text-end">
                    <span>
                        <p class="mb-0 text-xs text-uppercase font-weight-bold text-dark">Have Client</p>
                        <h5 class=" mb-0 text-dark font-weight-bolder">
                            <span>{{ $data['group'][0]->have_partnership }}</span>
                        </h5>
                    </span>
                </div>
            </div>
            <div class="d-flex flex-row justify-content-between">
                <div class="col-md">
                    <p class="mb-0 text-xs text-uppercase font-weight-bold text-dark">Budget Total</p>
                    <h5 class=" mb-0 text-dark font-weight-bolder">
                        Rp
                        <span> {{ number_format($data['group_detail']->total_budget, 0, ',', '.') }} </span>
                    </h5>
                </div>

                <div class="col-md text-end">
                    <p class="mb-0 text-xs text-uppercase font-weight-bold text-dark">Member</p>
                    <h5 class=" mb-0 text-dark font-weight-bolder">
                        <span> {{ $data['group_detail']->count_members }} </span>
                    </h5>
                </div>
            </div>
        </div>

        <div class="col-md">
            <div class="card" style="border-radius: 10px">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-border">
                            <thead>
                                <th class="col font-weight-bolder text-dark text-start text-uppercase text-xxs pt-3"
                                    style="color: #000000; ">
                                    First Name</th>
                                <th class="col font-weight-bolder text-dark text-start text-uppercase text-xxs pt-3"
                                    style="color: #000000; ">
                                    Last Name</th>
                                <th class="col font-weight-bolder text-dark text-start text-uppercase text-xxs pt-3"
                                    style="color: #000000; ">
                                    Role Name</th>
                                <th class="col font-weight-bolder text-dark text-start text-uppercase text-xxs pt-3"
                                    style="color: #000000; ">
                                    Authorization</th>
                                <th class="col font-weight-bolder text-dark text-start text-uppercase text-xxs pt-3"
                                    style="color: #000000; ">
                                    Budget Limit</th>
                                <th class="col font-weight-bolder text-dark text-start text-uppercase text-xxs pt-3"
                                    style="color: #000000; ">
                                    Created</th>
                            </thead>
                            <tbody>
                                {{-- @php
                                    var total = 0;
                                    
                                @endphp --}}
                                @foreach ($data['member_list'] as $member)
                                    <tr class="">
                                        <td class=" ps-md-4 text-sm  justify-content-between text-start pt-4"
                                            style="color: #000000">
                                            <span>
                                                {{ $member->first_name }}
                                            </span>
                                        </td>
                                        <td class=" ps-md-4 text-sm  justify-content-between text-start pt-4" ``
                                            style="color: #000000">
                                            <span>
                                                {{ $member->last_name }}
                                            </span>
                                        </td>
                                        <td class=" ps-md-4 text-sm  justify-content-between text-start pt-4"
                                            style="color: #000000">
                                            {{ $member->role_name }}</td>
                                        <td class=" ps-md-4 text-sm  justify-content-between text-start pt-4"
                                            style="color: #000000">
                                            <ul>

                                                <li>Policies : {{ $member->permission->policies === 0 ? 'No' : 'Yes' }}</li>
                                                <li>Approval Top Up :
                                                    {{ $member->permission->approval_topup === 0 ? 'No' : 'Yes' }}</li>
                                                <li>Approval Expense :
                                                    {{ $member->permission->approval_expense === 0 ? 'No' : 'Yes' }}</li>
                                                <li>Approval Pre Budget :
                                                    {{ $member->permission->approval_prebudget === 0 ? 'No' : 'Yes' }}</li>
                                                <li>Manage User :
                                                    {{ $member->permission->manage_user === 0 ? 'No' : 'Yes' }}</li>
                                                <li>Manage Budget :
                                                    {{ $member->permission->manage_budget === 0 ? 'No' : 'Yes' }}</li>
                                                <li>Manage Tenant :
                                                    {{ $member->permission->manage_tenant === 0 ? 'No' : 'Yes' }}</li>
                                                <li>Manage Cards :
                                                    {{ $member->permission->manage_cards === 0 ? 'No' : 'Yes' }}</li>
                                            </ul>
                                        </td>
                                        <td class=" ps-md-4 text-sm  justify-content-between text-start pt-4"
                                            style="color: #000000">
                                            {{ number_format($member->limit->remain_limit) }}</td>
                                        <td class=" ps-md-4 text-sm  justify-content-between text-start pt-4"
                                            style="color: #000000">
                                            {{ $member->created_date }}
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


    {{-- <script>
        function getEditGroupInfo(id,first_name, last_name, role_name, email, remain_limit ) {
            console.log('tes',edit_budget_limit);

            document.getElementById('user_id').value = id;
            document.getElementById('edit_first_name').value = first_name;
            document.getElementById('edit_last_name').value = last_name;
            document.getElementById('group_role_name').innerHTML = role_name;
            document.getElementById('group_role_name').value = role_name;
            document.getElementById('edit_email').value = email;
            document.getElementById('edit_budget_limit').value = remain_limit;
            // document.getElementById('edit_department_name').innerHTML = group_name;
            // document.getElementById('edit_department_name').value = group_name;
    
        }
    </script> --}}
    {{-- <script>
        function getTime(){


            
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "GET",
            url: "{{ route('groupInfo') }}",
            data: {
               
            },
            success: function(response) {

                const {
                    success,
                    status,
                    message
                } = response;

                if (success === true) {
                    setTimeout(function() {
                        window.location.reload(true);
                    }, 1000);
                }
            }

        });
        }
    </script> --}}
@endsection
