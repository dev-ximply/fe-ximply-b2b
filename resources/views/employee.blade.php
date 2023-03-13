@extends('layouts.main')

@section('container')
    @include('manage-teams.add-modal-user')
    @include('manage-teams.edit-modal-user')
    @include('manage-teams.info-member')
    <div class="d-flex justify-content-between">
        <div id="loader"
            style="display:none; text-align: center; z-index: 5000; position: absolute; width: 100%; top: 40%">
            <img height="100px" src="{{ asset('img/loader.gif') }}">
        </div>
        <div class="mt-2">
            <button class="btn text-white" data-bs-toggle="modal" data-bs-target="#add_modal_users"
                style="background-color: #19194b">
                <span>Add Employee</span>&nbsp;
                <i class="fa-solid fa-user-plus ms-2"></i>
            </button>

        </div>
        <div class="d-flex justify-content-end flex-column text-end mb-2">
            <h6 class="text-dark fs-6">Total Member</h6>
            <p class="text-dark font-weight-bold fs-5">{{ count($data['employee']) }} <span
                    style="font-weight:400; font-size:14px">Members</span></p>
        </div>

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
        @php
            $i = 1;
        @endphp
        <div class="row mt-1">
            <div class="col-12">
                <div class="card" style="border-radius: 5px">
                    <div class="card-body">
                        @if(session()->get('is_superadmin') == true)
                        <div class="d-flex justify-content-end  mb-3">
                            <div class="col-md-2">
                                {{-- <form action=""> --}}
                                    <select name="select_group" id="select_group" class="form-select">
                                        <option value="0">Filter Group</option>
                                        @foreach ($data['list_department'] as $item)
                                            <option value="{{ $item->id }}" class="text-dark">{{ $item->group_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                {{-- </form> --}}
                            </div>
                        </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-flush text-dark" id="datatable-search">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-sm ps-5" style="font-weight: 600">Name</th>
                                        <th class="text-sm px-0" style="font-weight: 600">Contact Member</th>
                                        <th class="text-sm px-0" style="font-weight: 600">Group</th>
                                        <th class="text-sm px-0" style="font-weight: 600">Role</th>
                                        <th class="text-sm px-0" style="font-weight: 600">Approver</th>
                                        <th class="text-sm px-0" style="font-weight: 600">Created</th>
                                        <th class="text-sm px-0 text-center" style="font-weight: 600">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tableBody">
                                    @foreach ($data['employee'] as $item)
                                        <tr class="align-middle">
                                            <td class="text-xs font-weight-bold text-capitalize ps-5 pb-0 pt-3">
                                                <p class="text-dark" style="font-size: 13px">
                                                    {{ $item->full_name }}
                                                </p>
                                            </td>
                                            <td class="text-xs font-weight-bold px-0 pt-3 pb-0">
                                                <p class="text-dark" style="font-size: 13px">
                                                    {{ $item->email }}
                                                </p>
                                                <p class="text-dark" style="font-size: 13px">
                                                    {{ $item->handphone != '' ? $item->handphone : '-' }}
                                                </p>
                                            </td>
                                            <td class="text-xs font-weight-bold px-0 pt-3 pb-0">
                                                <p class="text-dark" style="font-size: 13px">
                                                    {{ $item->group_name != '' ? $item->group_name : '-' }}
                                                </p>
                                            </td>
                                            <td class="text-xs font-weight-bold px-0 pt-3 pb-0">
                                                <p class="text-dark" style="font-size: 13px">
                                                    {{ $item->role_name != '' ? $item->role_name : '-' }}
                                                </p>
                                            </td>
                                            <td class="text-xs font-weight-bold px-0 pt-3 pb-0">
                                                <p class="text-dark" style="font-size: 13px">
                                                    {{ $item->approver != '' ? $item->approver : '-' }}
                                                </p>
                                            </td>
                                            <td class="text-xs font-weight-bold px-0 pt-3 pb-0">
                                                <p class="text-dark" style="font-size: 13px">
                                                    {{ $item->created_date }}
                                                </p>
                                            </td>

                                            <td class="text-xs font-weight-bold">
                                                <div class="d-flex justify-content-center pb-0 mt-3">
                                                    @if (session()->get('is_superadmin') == false)
                                                        @if ($item->is_activate == 0)
                                                            <p class="p-1"
                                                                style="background:#efefef; color:black; border-radius:8px; font-size:12px">
                                                                Inactive
                                                            </p>
                                                        @else
                                                            <button
                                                                class="btn text-white d-flex justify-content-center align-items-center text-capitalize btn-update me-1"
                                                                style="background-color: #85cdfd;width:60px;height:25px;font-size:11px; font-weight:500;"
                                                                data-bs-target="#modalInfoMember" data-bs-toggle="modal"
                                                                onclick="getInfoMember('{{ $item->id }}','{{ $item->first_name }}', '{{ $item->last_name }}', '{{ $item->email }}', '{{ $item->employee_id }}','{{ $item->group_name }}', '{{ $item->role_name }}')">
                                                                Info
                                                            </button>
                                                        @endif
                                                    @else
                                                        @if ($item->is_activate == 0)
                                                            <p class="p-1"
                                                                style="background:#efefef; color:black; border-radius:8px; font-size:12px">
                                                                Inactive
                                                            </p>
                                                        @else
                                                            <button
                                                                class="btn text-white d-flex justify-content-center align-items-center text-capitalize btn-update me-2"
                                                                data-bs-title="Edit" data-bs-toggle="modal"
                                                                data-id="'{{ $item->id }}'"
                                                                data-bs-target="#edit_modal_users"
                                                                style="background-color: #ff720c;width:60px;height:25px;font-size:11px; font-weight:500;"
                                                                onclick="getDataMember('{{ $item->id }}', '{{ $item->first_name }}',  '{{ $item->last_name }}', '{{ $item->email }}', '{{ $item->employee_id }}' ,  '{{ $item->group_name }}', '{{ $item->role_name }}' )">
                                                                Edit
                                                            </button>
                                                            <button
                                                                class="btn text-white d-flex justify-content-center align-items-center me-2 text-capitalize btn-update"
                                                                data-bs-title="View Your Expense Member"
                                                                data-bs-toggle="modal" data-id="'{{ $item->id }}'"
                                                                data-bs-target="#editModalPartner"
                                                                style="background-color: #E40909;width:60px;height:25px;font-size:11px; font-weight:500;"
                                                                onclick="deactivedMember('{{ $item->id }}')">
                                                                Deactived
                                                            </button>
                                                        @endif
                                                    @endif
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
    @else
        <div class="row justify-content-center h-100 align-items-center">
            <div class="d-flex align-items-center justify-content-center flex-column py-5">
                <img src="{{ asset('img/icons/bill.png') }}" class="img-fluid" alt="" style="width: 100px">
                <h6 class="font-weight-bold text-dark py-0">You don't have member</h6>
                <span class="text-xs" style="text-align: center">Create your member with click the button above</span>
            </div>
        </div>
    @endif


    <script>
        // $(document).ready(function() {
        //     var tenant = TENANT_CODE;
        //     var userId = USR_ID;
        //     $.ajaxSetup({
        //         headers: {
        //             "Authorization": "Bearer " + AUTH_TOKEN,
        //             "Accept": "application/json"
        //         }
        //     });

        //     $.ajax({
        //         type: "GET",
        //         url: API_URL + "api/member/list/" + tenant + "?user_id=" + userId,
        //         success: function(res) {
        //             if (res) {
        //                 var response = res['data'];
        //                 for (const obj of response) {
        //                     var groupId = obj.id;
        //                     var groupName = obj.group_name;
        //                     $('#select_group').append('<option value"' + groupId + '">' + groupName +
        //                         '</option>');
        //                 }
        //             } else {
        //                 $('select_group').empty();
        //             }
        //         }

        //     });
        // });

        $(document).ready(function() {
            var urlSearch = "";
            $('#select_group').on('change', function() {
                var group_id = $('#select_group').val();
                urlSearch = API_URL + "api/member/list/" + TENANT_CODE +  "?user_id=" + USR_ID +
                    "&group_id=" + group_id;
                new getDataGroup(urlSearch);
            });
            // });

            function getDataGroup(urlSearch) {
                $("#tableBody").html("");
                $.ajaxSetup({
                    headers: {
                        "Authorization": "Bearer " + AUTH_TOKEN,
                        "Accept": "application/json"
                    }
                });

                $.ajax({
                    type: "GET",
                    url: urlSearch,
                    beforeSend: function() {
                        $("#main-loader").show();
                    },
                    success: function(res) {
                        if (res) {
                            console.log(res);
                            var response = res['data'];
                            var tableOut = "";
                            var empty = "Empty";
                            for (const obj of response) {
                                tableOut += '<tr class="align-middle">' +
                                    '<td class="text-xs font-weight-bold text-capitalize ps-5 pb-0 pt-3">' +
                                    '<p class="text-dark" style="font-size: 13px">' +
                                    obj.full_name +
                                    '</p>' +
                                    '</td>'
                                tableOut +=
                                    '<td class="text-xs font-weight-bold px-0 pt-3 pb-0">' +
                                    '<p class="text-dark" style="font-size: 13px">' +
                                    obj.email +
                                    '</p>' +
                                    '<p class="text-dark" style="font-size: 13px">' +
                                    obj.handphone +
                                    '</p>' +
                                    '</td>'
                                tableOut +=
                                    '<td class="text-xs font-weight-bold px-0 pt-3 pb-0">' +
                                    '<p class="text-dark" style="font-size: 13px">' +
                                    obj.group_name +
                                    '</p>' +
                                    '</td>'
                                tableOut +=
                                    '<td class="text-xs font-weight-bold px-0 pt-3 pb-0">' +
                                    '<p class="text-dark" style="font-size: 13px">' +
                                    obj.role_name +
                                    '</p>' +
                                    '</td>'
                                tableOut +=
                                    '<td class="text-xs font-weight-bold px-0 pt-3 pb-0">' +
                                    '<p class="text-dark" style="font-size: 13px">' +
                                    obj.approver +
                                    '</p>' +
                                    '</td>'
                                tableOut +=
                                    '<td class="text-xs font-weight-bold px-0 pt-3 pb-0">' +
                                    '<p class="text-dark" style="font-size: 13px">' +
                                    obj.created_date +
                                    '</p>' +
                                    '</td>'
                                

                                if( ADMIN_SESSION == false){
                                    
                                    if(obj.is_activate == 0){
                                        tableOut +=  '<td class="text-xs font-weight-bold">'+
                                                '<div class="d-flex justify-content-center pb-0 mt-3">'+
                                                    '<p class="p-1"'+
                                                        'style="background:#efefef; color:black; border-radius:8px; font-size:12px">'+
                                                                'Inactive'+
                                                    '</p>'+
                                                    '</div>'+
                                                    '</td>'
                                    }else{
                                        tableOut +=  '<td class="text-xs font-weight-bold">'+
                                                '<div class="d-flex justify-content-center pb-0 mt-3">'+
                                                         '<button class="btn text-white d-flex justify-content-center align-items-center text-capitalize btn-update me-1"'+
                                                            'style="background-color: #85cdfd;width:60px;height:25px;font-size:11px; font-weight:500;"'+
                                                            'data-bs-target="#modalInfoMember" data-bs-toggle="modal"'+
                                                            'onclick="getInfoMember(`' + obj.id  + '`,`'  + obj.first_name + '`, `' + obj.last_name + '`, `'  + obj.email + '`, `' +  obj.employee_id + '`,`' + obj.group_name + '`,`' + obj.role_name + '`)">'+
                                                            'Info'+
                                                        '</button>'
                                                            '</div>'+
                                                    '</td>'
                                    }
                                }else{
                                    if(obj.is_activate == 0){
                                      tableOut +=  '<td class="text-xs font-weight-bold">'+
                                                '<div class="d-flex justify-content-center pb-0 mt-3">'+
                                                    '<p class="p-1"'+
                                                        'style="background:#efefef; color:black; border-radius:8px; font-size:12px">'+
                                                                'Inactive'+
                                                    '</p>'+
                                        '</div>'+
                                        '</td>'
                                    }else{
                                        tableOut += '<td class="text-xs font-weight-bold">'+
                                                '<div class="d-flex justify-content-center pb-0 mt-3">'+
                                                    '<button class="btn text-white d-flex justify-content-center align-items-center text-capitalize btn-update me-2"'+
                                                        'data-bs-title="Edit" data-bs-toggle="modal"'+
                                                                'data-bs-target="#edit_modal_users"'+
                                                                'style="background-color: #ff720c;width:60px;height:25px;font-size:11px; font-weight:500;"'+
                                                                'onclick="getDataMember(`' + obj.id + '`,`'  + obj.first_name + '`, `' + obj.last_name + '`,`' + obj.email + '`,`' +  obj.employee_id + '`,`' + obj.group_name + '`,`' + obj.role_name + '`)">'+
                                                                'View'+
                                                            '</button>'+
                                                            '<button class="btn text-white d-flex justify-content-center align-items-center me-2 text-capitalize btn-update"'+
                                                                'data-bs-title="View Your Expense Member"'+
                                                                'data-bs-toggle="modal"'+
                                                                'data-bs-target="#editModalPartner"'+
                                                                'style="background-color: #E40909;width:60px;height:25px;font-size:11px; font-weight:500;"'+
                                                                'onclick="deactivedMember(`' + obj.id + '`)">' +
                                                                'Deactived'+
                                                            '</button>'+
                                                            '</div>'+
                                                    '</td>'
                                    }
                                }
                            }
                            $("#tableBody").append(tableOut);
                        } else {
                            $("#tableBody").append(empty);
                        }

                    },
                    complete: function() {
                        $('#main-loader').hide();
                    }
                });
            }
        });
        // });
    </script>

    <script>
        function changeEmploye(value) {
            console.log(value)
            document.getElementById('user_id').value = value;
        }
    </script>
    <script>
        function getInfoMember(id, first_name, last_name, email, employee_id, group_name, role_name) {
            document.getElementById('info_role_id');
            document.getElementById('info_first_name').value = first_name;
            document.getElementById('info_last_name').value = last_name;
            document.getElementById('info_email').value = email;
            document.getElementById('info_employee_code').value = employee_id;
            document.getElementById('info_department').value = group_name;
            document.getElementById('info_role_name').value = role_name;
        }

        function getDataMember(id, first_name, last_name, email, employee_id, group_name, role_name) {
            document.getElementById('edit_user_id').value = id;
            document.getElementById('edit_first_name').value = first_name;
            document.getElementById('edit_last_name').value = last_name;
            document.getElementById('edit_email').value = email;
            document.getElementById('edit_employee_id').value = employee_id;
            document.getElementById('edit_department_name').innerHTML = group_name;
            document.getElementById('edit_department_name').value = group_name;
            document.getElementById('edit_role_name').innerHTML = role_name;
            document.getElementById('edit_role_name').value = role_name;
        }

        function deactivedMember(id_member) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success-cstm mx-2",
                    cancelButton: "btn btn-danger-cstm mx-2",
                },
                buttonsStyling: false,
            });
            swalWithBootstrapButtons
                .fire({
                    title: "<h5>Are you sure you want to Deactived Member?</h5>",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    reverseButtons: false,
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url: API_URL + "api/members/" + id_member + "/deactived",
                            type: 'post',
                            contentType: false,
                            processData: false,
                            beforeSend: function() {
                                if ($("#loader")) {
                                    $("#loader").show();
                                }
                            },
                            success: function(res) {
                                if (res['success'] == "true" || res['success'] == true) {
                                    swalWithBootstrapButtons.fire(
                                        "success!",
                                        "your request success.",
                                        "success"
                                    );
                                } else {
                                    swalWithBootstrapButtons.fire(
                                        "error!",
                                        "your request failed.",
                                        "error"
                                    );
                                }
                            },
                            complete: function(data) {
                                if ($("#loader")) {
                                    $("#loader").hide();
                                }
                                setTimeout(function() {
                                    location.reload();
                                }, 1000);
                            }
                        });
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        swalWithBootstrapButtons.fire(
                            "cancelled",
                            "your request cancelled :)",
                            "error"
                        );
                    }
                });
        }
    </script>
@endsection
