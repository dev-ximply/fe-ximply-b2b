<div class="modal fade" id="addModalPartner" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #19194b">
                <h6 class="font-weight-bolder" style="color: white">Add Client Vendor</h6>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <label class="form-label" style="color: black; font-weight:500">Company Name</label>
                        <div class="input-group">
                            <input id="companyName" class="form-control" type="text" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="form-label" style="color: black; font-weight:500">Contact Name</label>
                        <div class="input-group">
                            <input id="picName" class="form-control" type="text" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label class="form-label mt-4" style="color: black; font-weight:500">Email Company</label>
                        <div class="input-group">
                            <input id="email" class="form-control" type="email" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="form-label mt-4" style="color: black; font-weight:500">Handphone</label>
                        <div class="input-group">
                            <input id="handphone" class="form-control" type="text" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">

                        <input type="hidden" id="partner_assign_id">

                        <label class="form-label mt-4" style="color: black; font-weight:500">User</label>

                        <select class="form-select" name="user_assign_id" id="user_assign_id">

                            <option hidden selected>Select User</option>

                            @foreach ($data['a_partner'] as $member)
                                <option value="{{ $member->id }}" data-group="{{ $member->group_id }}">
                                    {{ $member->full_name }}</option>
                            @endforeach

                        </select>

                    </div>
                    <div class="col-6">
                        <label class="form-label mt-4" style="color: black; font-weight:500">Group</label>
                        <select class="form-control" name="group_id" id="group_id" style="background-color: white"
                            readonly disabled>
                            <option value="" id="option_group"></option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="d-flex justify-content-end mt-4">
                        <div>
                            <button class="btn text-white me-2" data-bs-dismiss="modal"
                                style="background-color: #D42A34">Cancel</button>
                            <button class="btn text-white ms-2" style="background-color: #62ca50"
                                onclick="addPartner('{{ Auth::user()['id'] }}')">
                                Submit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $("#user_assign_id").change(function() {
        const group_id = $(this).find(':selected').data('group');

        const user_id = '{{ Auth::user()['id'] }}';
        $.get(API_URL + "api/group/list/" + TENANT_CODE, {
            "user_id": user_id,
            "group_id": group_id

        }, function(res, textStatus, jqXHR) {
            $('#option_group').val(res.data.id);
            $("#option_group").text(res.data.group_name);
        });

    });

    function addPartner(userId) {

        const companyName = document.getElementById('companyName').value;
        const picName = document.getElementById('picName').value;
        const email = document.getElementById('email').value;
        const handphone = document.getElementById('handphone').value;
        const group_id = document.getElementById('group_id').value;
        const userAssignId = document.getElementById('user_assign_id').value;
        var tenantCode = TENANT_CODE;
        var userid = USR_ID;
        console.log(userId);
        console.log(companyName);
        console.log(picName);
        console.log(handphone);
        console.log(email);
        console.log(group_id);
        console.log(userAssignId);

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
                        url: API_URL + "api/partner/add",
                        // url: "{{ route('parners.store') }}",
                        data: {
                            user_id: userid,
                            tenant_code: tenantCode,
                            company_name: companyName,
                            contact_name: picName,
                            handphone: handphone,
                            email: email,
                            group_id: group_id,
                            assign_user_id: userAssignId,
                        },
                        beforeSend: function() {
                            $("#main-loader").fadeIn(300);

                        },
                        success: function(response) {

                            const {
                                success,
                                status,
                                message
                            } = response;

                            console.log(response)

                            if (success == true) {
                                setTimeout(function() {
                                    Swal.fire(
                                        'Success',
                                         message,
                                        'success'
                                    )
                                    window.location.reload();

                                }, 1000);
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text:   message,

                                });
                            }
                        },
                        complete: function() {
                            setTimeout(function() {
                                $("#main-loader").hide();
                                // window.location.reload(true);
                            }, 1000)
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
