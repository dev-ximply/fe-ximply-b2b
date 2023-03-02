<div class="modal fade" id="addModalGroup" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #19194b">
                <h6 class="font-weight-bolder text-md text-white" style="color: black">New Group</h6>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close">
                    {{-- <span aria-hidden="true">×</span> --}}
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" style="color: black; font-weight:500">Group Name</label>
                        <input type="text" class="form-control" id="GroupName" name="Group_name">
                    </div>
                    <div class="form-group ">
                        <label for="message-text" style="color: black; font-weight:500">Have Clients or Vendor</label>
                        <div class="d-flex flex-row mx-2">
                            <div class="form-check me-2">
                                <input class="form-check-input" type="checkbox" id="haveClient" name="have_client">
                                <label class="custom-control-label" for="customCheck1" style="color: black; font-weight:500">Yes</label>
                            </div>

                        </div>
                    </div>
                </form>
                <div class="d-flex justify-content-end">
                    <div>
                        <button type="button" class="btn text-white me-2" data-bs-dismiss="modal"
                            style="background-color: #D42A34">Cancel</button>
                        <button type="button" class="btn text-white ms-2" style="background-color: #62ca50" onclick="addGroup('{{ Auth::user()['id'] }}', document.getElementById('GroupName').value, document.getElementById('haveClient').checked)">Submit</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="{{ asset('js/plugins/choices.min.js') }}"></script>
<script src="{{ asset('js/plugins/flatpickr.min.js') }}"></script>
<script>
    function addGroup(userId, groupName, haveClient) {

        have_client = '0';
        if(haveClient){
            have_client = '1';
        }

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
                    formData.append('user_id', USR_ID);
                    formData.append('group_name', groupName);
                    formData.append('have_partnership', have_client);

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: API_URL + "api/group/add",
                        type: 'post',
                        data: formData,
                        contentType: false,
                        processData: false,
                        beforeSend: function() {
                            // if ($("#loader")) {
                                $("#main-loader").fadeIn(300);
                            // }
                        },
                        success: function(res) {
                            if (res['success'] == "true" || res['success'] == true) {
                                swalWithBootstrapButtons.fire(
                                    "Success!",
                                    "Your request success.",
                                    "success"
                                );
                            } else {
                                swalWithBootstrapButtons.fire(
                                    "Error!",
                                    "Your request can't processed." + res['message'],
                                    "error"
                                );
                            }
                        },
                        complete: function(data) {
                            if ($("#main-loader")) {
                                $("#main-loader").hide();
                            }
                            setTimeout(function() {
                                location.reload();
                            }, 1000);
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

    if (document.getElementById('choiceMember')) {
        var element = document.getElementById('choiceMember');
        const example = new Choices(element, {
            removeItemButton: true
        });
    }
</script>
