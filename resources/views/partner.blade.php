@extends('layouts.main')

@section('container')
    @include('manage-teams.add_modal_partner')
    @include('manage-teams.edit_modal_partner')

    <style>
        /* table */
        table {
            /* border: 1px solid #ccc; */
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
                /* border-bottom: 3px solid #ddd; */
                display: block;
                margin-bottom: .625em;
            }

            table td {
                /* border-bottom: 1px solid #ddd; */
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

    <div class="row">
        <div>
            <button class="btn  text-md text-white @if ($section == 'add user') active @endif" data-bs-toggle="modal"
                data-bs-target="#addModalPartner" style="background-color: #19194b">Add Partner
                <i class="fa-solid fa-user-plus ms-2" style="font-size: 1em"></i>
            </button>
        </div>
    </div>
    <div class="col-12">
        <div class="card" style="border-radius: 5px">
            <div class="table-responsive">
                <table class="table  text-dark">
                    <thead>
                        <tr>
                            <th class="col font-weight-bold text-dark" style="color: #000000; font-size:13px">Company Name
                            </th>
                            <th class="col font-weight-bold text-dark" style="color: #000000; font-size:13px">
                                Contact Name
                            </th>
                            <th class="col font-weight-bold text-dark" style="color: #000000; font-size:13px">
                                Contact Info
                            </th>
                            <th class="col font-weight-bold text-dark" style="color: #000000; font-size:13px">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($data['partners']) > 0)
                            @foreach ($data['partners'] as $item)
                                <tr class="">
                                    <td class="text-sm" data-label="Company Name" style="color: #000000">
                                        {{ $item->company_name }}
                                    </td>
                                    <td class="text-sm" data-label="Contact Name" style="color: #000000">
                                        {{ $item->contact_name }}
                                    </td>
                                    <td class="text-sm" data-label="Contact Info" style="color: #000000">
                                        {{ $item->email }}
                                        <span class="text-dark" style="font-size: 15px">
                                            {{ $item->handphone }}
                                        </span>
                                    </td>

                                    <td class="text-sm d-flex justify-content-md-center justify-content-between"
                                        data-label="Action">
                                        <button onclick=""
                                            class="btn text-white d-flex  justify-content-center align-items-center text-capitalize"
                                            data-bs-toggle="modal" data-bs-target="#editModalPartner"
                                            style="background-color: #ff720c;width:65px;height:25px;font-size:12px;font-weight:500">
                                            Edit</button>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4" style="font-size: 12px">
                                    data empty
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function getData(id) {
            $.ajax({
                type: "GET",
                url: "/api/client/select-single?id=" + id,
                success: function(response) {
                    if (response['success'] == true) {
                        var data = response['data'];
                        document.getElementById('editcompanyName').value = data['company_name'];
                        document.getElementById('editclientName').value = data['client_name'];
                        document.getElementById('editHandphone').value = data['handphone'];
                        document.getElementById('editEmail').value = data['email'];
                    } else {
                        // todo do something
                    }
                }

            });
        }
    </script>
@endsection
