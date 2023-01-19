<div class="modal fade" id="edit_modal_users" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #19194b">
                <h6 class="font-weight-bolder text-white" style="font-weight: 600">Edit Employee</h6>
                <button type="button" class="btn-close  text-white" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="card-text mt-4" id="basic-info">
                    <div class="card-body pt-0">
                        <form onsubmit="updateEmploye(event)">
                            <div class="row">
                                <input type="hidden" name="test" id="user_id">
                                <div class="col-6">
                                    <label class="form-label mt-2"
                                        style="color: black; font-weight:500">Department</label>
                                    <div class="">
                                        <select class="form-control " name="edit_department_id" id="edit_department_id">
                                            <option value="" selected>Select</option>
                                            @foreach ($data['list_department'] as $item_departement)
                                            <option value="{{ $item_departement->id }}">
                                                {{ $item_departement->group_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label class="form-label mt-2" style="color: black; font-weight:500">Role</label>
                                    <div class="">
                                        <select class="form-control " name="edit_role_id" id="edit_role_id">
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

<script src="{{ asset('js/plugins/choices.min.js') }}"></script>
<script src="{{ asset('js/plugins/flatpickr.min.js') }}"></script>

<script>
    //send invitation
    function change(user_id, assign_user, department_id, role_id) {
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
                    if (department_id != "" || department_id != null) {
                        formNewMember.append('department_id', department_id);
                    }
                    if (role_id != "" || role_id != null) {
                        formNewMember.append('role_id', role_id);
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
                                    "something wrong",
                                    "please contact Beazy support!",
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
<script>
    function updateEmploye(e){
        e.preventDefault();


        let departementId = event.target.querySelector("#edit_department_id").value;
        let roleId = event.target.querySelector("#edit_role_id").value;
        let userId = event.target.querySelector("#user_id").value;
        console.log(roleId);
        console.log(departementId);
        console.log('submit')

        $.ajax({
                type: "PUT",
                url: "{{ route('employees.update') }}",
                data: {
                    role_id: roleId,
                    departement_id: departementId,
                    user_id: userId,
                },
                success: function(response) {

                    const {
                        success,
                        status,
                        message
                    } = response;

                    if(success===true){
                        setTimeout(function() {
                            window.location.reload(true);
                        }, 1000);
                    }
                }

            });

    }
</script>
