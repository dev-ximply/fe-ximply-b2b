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
                                    Have Partner
                                </th>
                                <th class="col font-weight-bold text-dark" style="color: #000000; font-size:13px">
                                    Member
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
                                        {{ $item->group_name }}
                                    </td>
                                    <td class="text-sm" data-label="Have Partner" style="color: #000000">
                                        {{ ($item->have_partnership == '1' ? 'yes' : 'no') }}
                                    </td>
                                    <td class="text-sm" data-label="Member" style="color: #000000">
                                        <span class="text-dark" style="font-size: 15px">
                                            {{ $item->count_members }} members
                                        </span>
                                    </td>
                                    <td class="text-sm d-flex justify-content-md-center justify-content-between"
                                        data-label="Action">
                                        {{-- <button onclick=""
                                            class="btn text-white d-flex  justify-content-center align-items-center text-capitalize"
                                            data-bs-toggle="modal" data-bs-target="#editModalGroup"
                                            style="background-color: #ff720c;width:65px;height:25px;font-size:12px;font-weight:500">
                                            Edit
                                        </button> --}}
                                        <button class="btn text-white d-flex justify-content-center align-items-center text-capitalize btn-update"
                                            data-bs-title="View Your Expense Member" data-bs-toggle="modal" data-id="{{ $item->id }}" data-bs-target="#editModalGroup"
                                            style="background-color: #ff720c;width:65px;height:25px;font-size:12px; font-weight:500;" onclick="changeGroup(this.getAttribute('data-id'))">
                                            Edit
                                        </button>
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
        function changeGroup(value){
                console.log(value)
                document.getElementById('group_id').value=value;
            }
    </script>
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
