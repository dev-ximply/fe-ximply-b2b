<div class="modal fade" id="editModalPartner" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #19194b">
                {{-- <h5 class="modal-title" id="exampleModalLabel">Add Department</h5> --}}
                <h6 class="font-weight-bolder" style="color: white">Edit Client Vendor</h6>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close">
                    {{-- <span aria-hidden="true">×</span> --}}
                </button>
            </div>
            <div class="modal-body">
                <form onsubmit="handleSubmitChangePartner(event)">
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
                        <div class="d-flex justify-content-end mt-4">
                            <div>
                                <button class="btn text-white" data-bs-dismiss="modal"
                                    style="background-color: #D42A34">Cancel</button>
                                <button type="submit" class="btn text-white" style="background-color: #62ca50">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function handleSubmitChangePartner(event){
        event.preventDefault();

        let partnerId = event.target.querySelector("#pertner_id").value;
        let companyName = event.target.querySelector("#editcompanyName").value;
        let partnerName = event.target.querySelector("#editPartnerName").value;
        let email = event.target.querySelector("#editEmail").value;
        let phone = event.target.querySelector("#editHandphone").value;

        console.log(companyName, partnerName, email, phone)

        $.ajax({
                type: "PUT",
                url: "{{ route('partners.update') }}",
                data: {
                    partner_id: partnerId,
                    company_name: companyName,
                    contact_name: partnerName,
                    handphone: phone,
                    email: email,
                },
                success: function(response) {

                    const {
                        success,
                        status,
                        message
                    } = response;

                    console.log(response)

                    if(success===true){
                        setTimeout(function() {
                            window.location.reload(true);
                        }, 1000);
                    }
                }

            });


    }

</script>
