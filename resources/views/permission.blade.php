@extends('layouts.main')

@section('container')
    <div style="">
        <div class="page-header min-height-150 border-radius-xl mt-0"
            style="background-image: url({{ asset('img/curved-images/curved0.jpg') }}'); background-position-y: 50%;">
            <span class="mask bg-gradient-primary opacity-6"></span>
        </div>
        <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="{{ config('storage.base_url') . $data['tenant']->company_logo }}" alt="profile_image"
                            class="p-2 w-100 border-radius-lg shadow-sm" style="width: 90px !important">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5>
                            {{ $data['tenant']->company_name }}
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="text-dark">Role Permission</h5>
            <p class="text-sm text-dark">Choose the permission your Company needs.</p>

        </div>
        <div class="card-body pt-0">
            <div class="accordion-1">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 mx-auto">
                            <div class="accordion" id="accordion-leevel">
                                <?php $no = 1; ?>
                                @foreach ($permissions as $permission)
                                    <div class="accordion-item mb-3">
                                        <div class="accordion-header" id="heading-level-2">
                                            <table width="100%">
                                                <tr style="border-bottom: 1px solid rgb(210, 210, 210)">
                                                    <td width="10%" class="text-sm text-dark font-weight-bold">
                                                        LEVEL&nbsp;{{ $permission['role_level'] }}</td>
                                                    <td width="40%" class="text-sm position-relative">
                                                        <input type="text" placeholder="Role Name..."
                                                            onchange="changeRoleName(this.value, {{ $permission['id'] }})"
                                                            style="width: 100%; border:0.5px solid rgb(210, 210, 210)"
                                                            class="rounded" value="{{ $permission['role_name'] }}"
                                                            id="tesLabel">

                                                        <label for="tesLabel"
                                                            style="position: absolute; top:15px;right:10px"
                                                            data-bs-toggle="tooltip" data-bs-title="Edit">
                                                            <i class="fa-solid fa-pen-to-square text-secondary"></i>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <button class="accordion-button font-weight-bold collapsed"
                                                            type="button" data-bs-toggle="collapse"
                                                            data-bs-target="#collapse-level-{{ $no }}"
                                                            aria-expanded="false"
                                                            aria-controls="collapse-level-{{ $no }}">
                                                            <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3"
                                                                aria-hidden="true"></i>
                                                            <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3"
                                                                aria-hidden="true"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div id="collapse-level-{{ $no }}" class="accordion-collapse collapse"
                                            aria-labelledby="heading-level-2" data-bs-parent="#accordion-level-2"
                                            style="">
                                            <div class="accordion-body text-sm ">
                                                @if ($permission['role_level'] != '2')
                                                    <div class="table-responsive">
                                                        <form action="">
                                                            <table class="table mb-0">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center text-dark">
                                                                            <p class="mb-0 text-dark">Manage Budget</p>
                                                                        </th>
                                                                        <th class="text-center text-dark">
                                                                            <p class="mb-0 text-dark">Manage User</p>
                                                                        </th>
                                                                        <th class="text-center text-dark">
                                                                            <p class="mb-0 text-dark">Approval Expense</p>
                                                                        </th>
                                                                        <th class="text-center text-dark">
                                                                            <p class="mb-0 text-dark">Approval Topup</p>
                                                                        </th>
                                                                        {{-- <th class="text-center text-dark">
                                                                        <p class="mb-0 text-dark">Approval PreBudget</p>
                                                                    </th> --}}
                                                                        {{-- <th class="text-center text-dark">
                                                                        <p class="mb-0 text-dark">Manage Tenant</p>
                                                                    </th> --}}
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <div
                                                                                class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"
                                                                                    onchange="changePermission('manage_budget', this, '{{ $permission['id'] }}')"
                                                                                    {{ $permission['permission'][0]['manage_budget'] ? 'checked' : '' }}>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div
                                                                                class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"
                                                                                    onchange="changePermission('manage_user', this, '{{ $permission['id'] }}')"
                                                                                    {{ $permission['permission'][0]['manage_user'] ? 'checked' : '' }}>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div
                                                                                class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"
                                                                                    onchange="changePermission('approval_expense', this, '{{ $permission['id'] }}')"
                                                                                    {{ $permission['permission'][0]['approval_expense'] ? 'checked' : '' }}>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div
                                                                                class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"
                                                                                    onchange="changePermission('approval_topup', this, '{{ $permission['id'] }}')"
                                                                                    {{ $permission['permission'][0]['approval_topup'] ? 'checked' : '' }}>
                                                                            </div>
                                                                        </td>
                                                                        {{-- <td>
                                                                        <div
                                                                            class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                                                            <input class="form-check-input" type="checkbox"
                                                                                onchange="changePermission('approval_prebudget', this, {{ $permission['id'] }})"
                                                                                {{ $permission['permission'][0]['approval_prebudget'] ? 'checked' : '' }}>
                                                                        </div>
                                                                    </td> --}}
                                                                        {{-- <td>
                                                                        <div
                                                                            class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                                                            <input class="form-check-input" type="checkbox"
                                                                                onchange="changePermission('manage_tenant', this, {{ $permission['id'] }})"
                                                                                {{ $permission['permission'][0]['manage_tenant'] ? 'checked' : '' }}
                                                                                value="{{ $permission['permission'][0]['manage_tenant'] ? 'on' : 'off' }}">
                                                                        </div>
                                                                    </td> --}}
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </form>
                                                    </div>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                    <?php $no++; ?>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('jsBottom')
    <script>
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success-cstm mx-2",
                cancelButton: "btn btn-danger-cstm mx-2",
            },
            buttonsStyling: false,
        });

        function changePermission(permission, e, roleId) {
            var newValue = e.checked;

            swalWithBootstrapButtons
                .fire({
                    title: "<h5>Are you sure want to process?</h5>",

                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    reverseButtons: false,
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        console.log('update')
                        $.ajaxSetup({
                            headers: {
                                "Authorization": "Bearer " + AUTH_TOKEN,
                                "Accept": "application/json",
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            type: "PUT",
                            url: "{{ route('permissions.change') }}",
                            data: {
                                permission: permission,
                                value: newValue ? 1 : 0,
                                role_id: roleId,
                            },
                            success: function(response) {
                                const {
                                    success,
                                    status,
                                    message
                                } = response;
                                if (success) {
                                    swalWithBootstrapButtons.fire(
                                        "success!",
                                        "Permission updated !",
                                        "success"
                                    );
                                } else {
                                    swalWithBootstrapButtons.fire(
                                        "!",
                                        message,
                                        "error"
                                    );
                                }
                            }

                        });
                    } else {
                        e.checked = !e.checked
                        result.dismiss === Swal.DismissReason.cancel
                    }
                });



        }

        function changeRoleName(value, roleId) {
            console.log(value);
            $.ajaxSetup({
                headers: {
                    "Authorization": "Bearer " + AUTH_TOKEN,
                    "Accept": "application/json",
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "PUT",
                url: "{{ route('permissions.role-name.change') }}",
                data: {
                    new_role_name: value,
                    role_id: roleId,
                },
                success: function(response) {
                    const {
                        success,
                        status,
                        message
                    } = response;
                    if (success) {
                        swalWithBootstrapButtons.fire(
                            "success!",
                            "Role name updated !",
                            "success"
                        );
                    } else {
                        swalWithBootstrapButtons.fire(
                            "!",
                            message,
                            "error"
                        );
                    }

                }

            });
        }
    </script>
@endpush
