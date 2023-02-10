<div class="modal fade" id="editModalPartner" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #19194b">
                <h6 class="font-weight-bolder" style="color: white">Edit Client Vendor</h6>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="pertner_id">
                <div class="row">
                    <div class="col-6">
                        <label class="form-label" style="color: black; font-weight:500">Company Name</label>
                        <div class="input-group">
                            <input name="editcompanyName" class="form-control" type="text" id="editcompanyName"
                                required="required">
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="form-label" style="color: black; font-weight:500">Contact Name</label>
                        <div class="input-group">
                            <input name="editPartnerName" class="form-control" type="text" id="editPartnerName"
                                required="required">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label class="form-label mt-4" style="color: black; font-weight:500">Email</label>
                        <div class="input-group">
                            <input name="editEmail" class="form-control" type="email" id="editEmail">
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="form-label mt-4" style="color: black; font-weight:500">Handphone</label>
                        <div class="input-group">
                            <input name="editHandphone" class="form-control" type="text" id="editHandphone">
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-6">

                        <input type="hidden" id="partner_assign_id">

                        <label class="form-label mt-4" style="color: black; font-weight:500">User</label>

                        <select class="form-control " name="user_assign_id" id="edituser_assign_id">

                            <option value="" selected>Pilih User</option>

                            @foreach ($data['a_partner'] as $member)
                            <option value="{{ $member->id }}">{{ $member->full_name }}</option>
                            @endforeach

                        </select>

                    </div>

                    <div class="col-6">
                        <label class="form-label mt-4" style="color: black; font-weight:500">Group</label>
                        <select class="form-select " name="group_id" id="editgroup_id">
                            <option value="" selected>Pilih Group</option>
                            @foreach ($data['partners'] as $item_group)
                            <option value="'{{ $item_group->id }}'">{{ strtolower($item_group->group_name) }}
                            </option>
                            @endforeach
                        </select>
                    </div>


                </div>
                <div class="row">
                    <div class="d-flex justify-content-end mt-4">
                        <div>
                            <button class="btn text-white" data-bs-dismiss="modal" style="background-color: #D42A34">
                                Cancel
                            </button>
                            <button type="button" class="btn text-white" style="background-color: #62ca50" onclick="updatePartner(
                                    document.getElementById('pertner_id').value,
                                    document.getElementById('editcompanyName').value,
                                    document.getElementById('editPartnerName').value,
                                    document.getElementById('editEmail').value,
                                    document.getElementById('editHandphone').value,
                                    document.getElementById('edituser_assign_id').value,
                                    document.getElementById('editgroup_id').value,
                                )">
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
    function updatePartner(partnerId, companyName, partnerName,  email, phone, assignUserId, groupId) {

        console.log(partnerId, companyName, partnerName,  email, phone, assignUserId, groupId)
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
                        type: "PUT",
                        url: "{{ route('partners.update') }}",
                        data: {
                            partner_id: partnerId,
                            company_name: companyName,
                            contact_name: partnerName,
                            handphone: phone,
                            email: email,
                            group_id: groupId,
                            assign_user_id: assignUserId,
                        },

                        success: function(response) {

                            const {
                                success,
                                status,
                                message
                            } = response;

                            console.log(response)

                            if (success === true) {

                                setTimeout(function() {
                                    window.location.reload(true);
                                }, 1000);
                            }else{
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
