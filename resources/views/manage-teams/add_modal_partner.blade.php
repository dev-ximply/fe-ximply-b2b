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

                        {{-- <select class="form-control " name="user_assign_id" id="user_assign_id"> --}}
                        <select class="form-control " name="user_assign_id" id="">

                            <option value="" selected>Pilih User</option>

                            {{-- @foreach ($members as $member)
                                <option value="'{{ $member['id'] }}'">{{ $member['full_name'] }}</option>
                            @endforeach --}}

                        </select>

                    </div>
                    <div class="col-6">
                        <label class="form-label mt-4" style="color: black; font-weight:500">Group</label>
                        <select class="form-control " name="group_id" id="group_id">
                            <option value="" selected>Select</option>
                            @foreach ($data['partners'] as $item_group)
                                <option value="{{ $item_group->id }}">{{ strtolower($item_group->group_name) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="d-flex justify-content-end mt-4">
                        <div>
                            <button class="btn text-white" data-bs-dismiss="modal"
                                style="background-color: #D42A34">Cancel</button>
                            <button class="btn text-white" style="background-color: #62ca50"
                                onclick="addPartner('{{ Auth::user()['id'] }}', document.getElementById('companyName').value, document.getElementById('picName').value, document.getElementById('email').value, document.getElementById('handphone').value, document.getElementById('group_id').value)">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function addPartner(userId, companyName, picName, email, handphone, group_id) {

        console.log(userId);
        console.log(companyName);
        console.log(picName);
        console.log(handphone);
        console.log(email);
        console.log(group_id);

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

                    var formData = new FormData();

                    formData.append('tenant_code', TENANT_CODE);
                    formData.append('user_id', userId);
                    formData.append('company_name', companyName);
                    formData.append('contact_name', picName);
                    formData.append('handphone', handphone);
                    formData.append('email', email);
                    formData.append('group_id', group_id);

                    // $.ajaxSetup({
                    //     headers: {
                    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    //     }
                    // });

                    $.ajax({
                        url: API_URL + "api/partner/add",
                        type: 'post',
                        data: formData,
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
                                    "Success!",
                                    "Your request success.",
                                    "success"
                                );
                                
                                if ($("#loader")) {
                                    $("#loader").hide();
                                }

                                setTimeout(function() {
                                    location.reload();
                                }, 1000);
                            } else {
                                swalWithBootstrapButtons.fire(
                                    "Error!",
                                    "Your request can't processed.<br>" + res['message'],
                                    "error"
                                );
                            }
                        },
                        complete: function(data) {

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
