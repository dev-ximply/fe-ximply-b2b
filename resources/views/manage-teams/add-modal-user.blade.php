<div class="modal fade" id="add_modal_users" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #19194b">
                <h6 class="font-weight-bolder text-white" style="font-weight: 600">Add Member</h6>
                <button type="button" class="btn-close  text-white" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="card-text mt-4" id="basic-info">
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label" style="color: black; font-weight:500">Firstname</label>
                                <div class="input-group">
                                    <input id="first_name" placeholder="Firstname" name="first_name"
                                        class="form-control" type="text" required="required">
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label" style="color: black; font-weight:500">Lastname</label>
                                <div class="input-group">
                                    <input id="last_name" placeholder="Lastname" name="last_name" class="form-control"
                                        type="text" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label mt-2" style="color: black; font-weight:500">Email</label>
                                <div class="input-group">
                                    <input id="email" placeholder="Email" name="email" class="form-control"
                                        type="email">
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label mt-2" style="color: black; font-weight:500">Employee
                                    Id</label>
                                <div class="input-group">
                                    <input id="employee_code" placeholder="Employee Code" name="employee_code"
                                        class="form-control" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            @if (session()->get('is_superadmin') == true)
                                <div class="col-6">
                                    <label class="form-label mt-2" style="color: black; font-weight:500">Group</label>
                                    <div class="">
                                        <select class="form-control " name="department_id" id="department_id">
                                            <option value="" selected>Select</option>
                                            @foreach ($data['list_department'] as $item_departement)
                                                <option value="{{ $item_departement->id }}">
                                                    {{ $item_departement->group_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endif

                            <div class="col-6">
                                <label class="form-label mt-2" style="color: black; font-weight:500">Role</label>
                                <div class="">
                                    <select class="form-control " name="role_id" id="role_id">
                                        <option value="" selected>Select</option>
                                        @foreach ($data['list_role'] as $item_role)
                                            <option value="{{ $item_role->id }}">{{ $item_role->role_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2 ">
                            <div class="d-flex mt-4 justify-content-end mb-0">
                                <div class="mb-0">
                                    <button class="btn text-white" data-bs-dismiss="modal"
                                        style="background-color: #D42A34">Cancel</button>

                                    @if (session()->get('is_superadmin') == true)
                                        <button type="sumbit" class="btn text-white" style="background-color: #62ca50"
                                            onclick="sendInvitation('{{ Auth::user()['id'] }}', document.getElementById('email').value, document.getElementById('first_name').value, document.getElementById('last_name').value, document.getElementById('department_id').value)">Submit</button>
                                    @else
                                        <button type="sumbit" class="btn text-white" style="background-color: #62ca50"
                                            onclick="sendInvitation('{{ Auth::user()['id'] }}', document.getElementById('email').value, document.getElementById('first_name').value, document.getElementById('last_name').value)">Submit</button>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/plugins/choices.min.js') }}"></script>
<script src="{{ asset('js/plugins/flatpickr.min.js') }}"></script>

<script>
    //send invitation
    function sendInvitation(user_id, email, first_name, last_name, role_id, group_id = null) {
        console.log(user_id);
        var tenant_code = TENANT_CODE;
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

                    var formNewMember = new FormData();

                    formNewMember.append('tenant_code', tenant_code);
                    formNewMember.append('user_id', user_id);
                    formNewMember.append('email', email);
                    formNewMember.append('first_name', first_name);
                    formNewMember.append('last_name', last_name);
                    if (role_id != "" || role_id != null) {
                        formNewMember.append('role_id', role_id);
                    }
                    if (group_id != "" || group_id != null) {
                        formNewMember.append('group_id', group_id);
                    }




                    $.ajaxSetup({
                        headers: {
                            "Authorization": "Bearer " + AUTH_TOKEN,
                            "Accept": "application/json"
                        }
                    });

                    $.ajax({
                        url: API_URL + "api/invitation/created",
                        type: 'post',
                        data: formNewMember,
                        contentType: false,
                        processData: false,
                        beforeSend: function() {
                            $("#main-loader").show();
                        },
                        success: function(res) {
                            if (res['success'] == true) {
                                swalWithBootstrapButtons.fire(
                                    "Success!",
                                    "Your request success.",
                                    "success"
                                );
                                setTimeout(function() {
                                    window.location.reload(true);
                                }, 1000);
                            } else {
                                swalWithBootstrapButtons.fire(
                                    "Error!",
                                    res['message'],
                                    "error"
                                );
                                setTimeout(function() {
                                    window.location.reload(true);
                                }, 1000);
                            }
                        },
                        complete: function(data) {
                            $("#main-loader").hide();
                            if (data.status != 200) {
                                Swal.fire(
                                    "opps!",
                                    data.message,
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

<script>
    function getMultiple(data) {
        var selected = [];
        for (var option of data) {
            if (option.selected) {
                selected.push(option.value);
            }
        }
        return selected;
    }

    if (document.querySelector('.datetimepicker')) {
        flatpickr('.datetimepicker', {
            allowInput: true
        });
    }

    if (document.getElementById('choices-multiple-remove-button')) {
        var element = document.getElementById('choices-multiple-remove-button');
        const example = new Choices(element, {
            removeItemButton: true
        });

        example.setChoices(
            [

            ],
            'value',
            'label',
            false,
        );
    }

    //dropdwown
    if (document.getElementById('departmant_id')) {
        var departmentChoice = document.getElementById('departmant_id');
        const example = new Choices(departmentChoice);
    }

    if (document.getElementById('role_id')) {
        var roleChoice = document.getElementById('role_id');
        const example = new Choices(roleChoice);
    }
</script>
