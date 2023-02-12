@extends('layouts.main')



@section('container')
    @include('manage-teams.add_modal_group')

    @include('manage-teams.edit_modal_group')

    {{-- @include('manage-teams.view_modal_members') --}}

    <style>
        table {

            border-radius: 5px;

            border-collapse: collapse;

            margin: 0;

            padding: 0;

            width: 100%;

            table-layout: fixed;

        }



        table caption {

            font-size: 1.5em;

            margin: .5em 0 .75em;

        }



        table tr {

            background-color: #ffffff;

            border: 1px solid #ddd;

            padding: .35em;

        }



        table th,

        table td {

            padding: .625em;

            text-align: center;

        }



        table th {

            font-size: .85em;

            letter-spacing: .1em;

            text-transform: uppercase;

        }



        @media screen and (max-width: 600px) {

            table {

                border: 0;

            }



            table caption {

                font-size: 1.3em;

            }



            table thead {

                border: none;

                clip: rect(0 0 0 0);

                height: 1px;

                margin: -1px;

                overflow: hidden;

                padding: 0;

                position: absolute;

                width: 1px;

            }



            table tr {

                display: block;

                margin-bottom: .625em;

            }



            table td {

                display: block;

                font-size: .8em;

                text-align: right;

            }



            table td::before {

                content: attr(data-label);

                float: left;

                font-weight: bold;

                text-transform: uppercase;

            }



            table td:last-child {

                border-bottom: 0;

            }

        }
    </style>

    <div class="row justify-content-center">

        <div class="">

            <button class="btn text-white" data-bs-toggle="modal" data-bs-target="#addModalGroup"
                style="background-color: #19194b">

                <span>Add Group</span>&nbsp;

                <i class="fa-sharp fa-solid fa-plus text-xs"></i>

            </button>

        </div>

        <div class="col-12">

            <div class="card" style="border-radius: 5px">

                <div class="table-responsive">

                    <table class="table  text-dark">

                        <thead>

                            <tr>

                                <th class="col font-weight-bold text-dark" style="color: #000000; font-size:13px">Group Name

                                </th>

                                <th class="col font-weight-bold text-dark" style="color: #000000; font-size:13px">
                                    Have Client Vendor
                                </th>

                                <th class="col font-weight-bold text-dark" style="color: #000000; font-size:13px">

                                    Member

                                </th>
                                <th class="col font-weight-bold text-dark" style="color: #000000; font-size:13px">
                                    Created
                                </th>

                                <th class="col font-weight-bold text-dark" style="color: #000000; font-size:13px">

                                    Action

                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach ($data['groups'] as $item)
                                <tr class="">

                                    <td class="text-sm" data-label="Group Name" style="color: #000000">
                                        {{ $item->group_name }} <br>

                                    </td>

                                    <td class="text-sm" data-label="Have Partner" style="color: #000000">
                                        {{ $item->have_partnership == '1' ? 'yes' : 'no' }}
                                    </td>

                                    <td class="text-sm" data-label="Member" style="color: #000000">

                                        <span class="text-dark" style="font-size: 15px">

                                            {{ $item->count_members }} members

                                        </span>

                                    </td>
                                    <td>
                                        <span class="text-dark" style="font-size: 15px">

                                            {{-- {{  Carbon\Carbon::parse($item->created_at)->format('m-d-Y') }} --}}
                                            {{ $item->created_date }} <br>
                                            {{ $item->created_time }}

                                        </span>
                                    </td>

                                    <td class="align-middle text-sm d-flex justify-content-md-center justify-content-between pb-4"
                                        data-label="Action">

                                        {{-- <button onclick=""

                                            class="btn text-white d-flex  justify-content-center align-items-center text-capitalize"

                                            data-bs-toggle="modal" data-bs-target="#editModalGroup"

                                            style="background-color: #ff720c;width:65px;height:25px;font-size:12px;font-weight:500">

                                            Edit

                                        </button> --}}

                                        <div class="">
                                            <a href="/group-info/{{ $item->id }}"
                                                class="btn text-white d-flex justify-content-center align-items-center me-2 text-capitalize btn-update"
                                                data-bs-title="View Your Expense Member"
                                                style="background-color: #85CDFD;width:50px;height:25px;font-size:12px; font-weight:500;">
                                                Info
                                            </a>
                                        </div>

                                        <div class="me-2">
                                            <button
                                                class="btn text-white d-flex justify-content-center align-items-center text-capitalize btn-update"
                                                data-bs-title="View Your Expense Member" data-bs-toggle="modal"
                                                data-id="{{ $item->id }}" data-bs-target="#editModalGroup"
                                                style="background-color: #ff720c;width:50px;height:25px;font-size:12px; font-weight:500;"
                                                onclick="getDataGroup('{{ $item->id }}', '{{ $item->group_name }}', '{{ $item->have_partnership }}')">

                                                Edit

                                            </button>
                                        </div>
                                        <div class="me-2">
                                            <button
                                                class="btn text-white d-flex justify-content-center me-2 align-items-center text-capitalize btn-update"
                                                data-bs-title="View Your Expense Member" data-bs-toggle="modal"
                                                data-id="{{ $item->id }}" data-bs-target="#deleteGroup"
                                                style="background-color: #E40909;width:60px;height:25px;font-size:11px; font-weight:500;"
                                                onclick="deleteGroups('{{ $item->id }}')">
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


    <script>
        function getDataGroup(group_id, group_name, have_partnership) {
            console.log('success', group_name);
            console.log('success', have_partnership);

            document.getElementById('group_id').value = group_id;
            document.getElementById('groupName').value = group_name;
            if (have_partnership == 1) {
                document.getElementById('IsHaveClient').checked = true;
            } else {
                document.getElementById('IsHaveClient').checked = false;
            }

        }
    </script>

    <script>
        function changeGroup(value) {

            console.log(value)

            document.getElementById('group_id').value = value;

        }
    </script>


    <script>
        function deleteGroups(id) {

            var tenant = TENANT_CODE;
            var userId = USR_ID;

            console.log(userId);

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success-cstm mx-2",
                    cancelButton: "btn btn-danger-cstm mx-2",
                },
                buttonsStyling: false,
            });

            swalWithBootstrapButtons
                .fire({
                    title: "<h5>Are you sure you want to process?</h5>",
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
                            type: "POST",
                            url: API_URL + "api/group/delete",

                            // url: "{{ route('partners.delete') }}",
                            data: {
                                group_id: id,
                                user_id: userId,
                                tenant_code: tenant
                            },
                            success: function(response) {

                                const {
                                    success,
                                    status,
                                    message
                                } = response;

                                console.log(response)

                                if (status === true) {

                                    setTimeout(function() {
                                        window.location.reload(true);
                                    }, 1000);
                                } else {
                                    swalWithBootstrapButtons.fire(
                                        "gagal",
                                        message,
                                        "error"
                                    );
                                }
                            }

                        });


                    } else if (result.dismiss === Swal.DismissReason.cancel) {

                        swalWithBootstrapButtons.fire(
                            "Cancelled",
                            "Your request cancelled :)",
                            "error"
                        );
                    }
                });
        }
    </script>

    {{-- <script>
        function deleteGroup() {

            $(".deleteRecord").click(function() {
                var id = $(this).data("id");
                var token = $("meta[name='csrf-token']").attr("content");

                $.ajax({
                    url: "users/" + id,
                    type: 'DELETE',
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function() {
                        console.log("it Works");
                    }
                });

            });

        }


    </script> --}}

    <script>
        function getData(id) {

            $.ajax({

                type: "GET",

                url: "/api/Group/select-single?id=" + id,

                success: function(response) {

                    if (response['success'] == true) {

                        var data = response['data'];

                        document.getElementById('groupId').value = data['id'];

                        document.getElementById('groupName').value = data['group_name'];

                        document.getElementById('IsHaveClient').checked = data['is_have_client'];

                        document.getElementById('member').value = data['members_count'];

                    } else {

                        // todo do something

                    }

                }

            });

        }
    </script>
@endsection
