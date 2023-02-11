{{-- <div class="modal fade" id="modalInfoMember" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <th class="text-uppercase  text-xxs font-weight-bolder opacity-9"
                                        style="color:black">Name
                                    </th>
                                    <th class="text-uppercase  text-xxs font-weight-bolder opacity-9"
                                        style="color:black">Email
                                    </th>
                                    <th class="text-uppercase  text-xxs font-weight-bolder opacity-9"
                                        style="color:black">
                                        Employee Code</th>
                                    <th class="text-uppercase  text-xxs font-weight-bolder opacity-9"
                                        style="color:black">
                                        Department</th>
                                    <th class="text-uppercase  text-xxs font-weight-bolder opacity-9"
                                        style="color:black">Role
                                    </th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}



<div class="modal fade" id="modalInfoMember" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #19194b">
<<<<<<< HEAD
                <h6 class="font-weight-bolder text-white" style="font-weight: 600">Info Member</h6>
=======
                <h6 class="font-weight-bolder text-white" style="font-weight: 600">View Member</h6>
>>>>>>> 573a3f5f6b65b0a4f844edc5634624112d65920c
                <button type="button" class="btn-close  text-white" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body mb-4">
                <div class="card-text mt-4" id="basic-info">
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label" style="color: black; font-weight:500">Firstname</label>
                                <div class="input-group">
                                    <input id="info_first_name" placeholder="Firstname" name="info_first_name"
                                        class="form-control" type="text" required="required">
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label" style="color: black; font-weight:500">Lastname</label>
                                <div class="input-group">
                                    <input id="info_last_name" placeholder="Lastname" name="info_last_name" class="form-control"
                                        type="text" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label mt-2" style="color: black; font-weight:500">Email</label>
                                <div class="input-group">
                                    <input id="info_email" placeholder="Email" name="info_email" class="form-control"
                                        type="email">
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label mt-2" style="color: black; font-weight:500">Employee
<<<<<<< HEAD
                                    Code</label>
=======
                                    Id</label>
>>>>>>> 573a3f5f6b65b0a4f844edc5634624112d65920c
                                <div class="input-group">
                                    <input id="info_employee_code" placeholder="Employee Code" name="info_employee_code"
                                        class="form-control" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
<<<<<<< HEAD
                                <label class="form-label mt-2" style="color: black; font-weight:500">Department</label>
                                <div class="">
                                   <input type="text" class="form-control" id="info_department">
=======
                                <label class="form-label mt-2" style="color: black; font-weight:500">Group</label>
                                <div class="">
                                   <input type="text" class="form-control" id="info_department">
                    
>>>>>>> 573a3f5f6b65b0a4f844edc5634624112d65920c
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label mt-2" style="color: black; font-weight:500">Role</label>
                                <div class="">
                                    <input type="text" class="form-control" id="info_role_name">
                                </div>
                            </div>
                        </div>
<<<<<<< HEAD
=======
       
>>>>>>> 573a3f5f6b65b0a4f844edc5634624112d65920c
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/plugins/choices.min.js') }}"></script>
<script src="{{ asset('js/plugins/flatpickr.min.js') }}"></script>

<<<<<<< HEAD
<script>
=======
{{-- <script>
>>>>>>> 573a3f5f6b65b0a4f844edc5634624112d65920c
    //send invitation
    function sendInvitation(user_id, email, first_name, last_name, group_id, role_id) {
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
                    if (group_id != "" || group_id != null) {
                        formNewMember.append('group_id', group_id);
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
<<<<<<< HEAD
</script>
=======
</script> --}}
>>>>>>> 573a3f5f6b65b0a4f844edc5634624112d65920c

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

