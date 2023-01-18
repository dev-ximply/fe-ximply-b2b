<div class="modal fade" id="editModalGroup" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #19194b">
                <h6 class="font-weight-bolder" style="color: white">Edit Group</h6>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close">
                    {{-- <span aria-hidden="true">×</span> --}}
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="text" id="groupId" hidden>
                    <div class="form-group">
                        <label for="recipient-name" style="color: black; font-weight:500">Group Name</label>
                        <input type="text" class="form-control" value="" id="groupName">
                    </div>
                    <div class="form-group ">
                        <label for="message-text" style="color: black; font-weight:500">Have Clients</label>
                        <div class="d-flex flex-column mx-2">
                            <div class="form-check me-2">
                                <input class="form-check-input" type="checkbox" value="" id="IsHaveClient">
                                <label class="custom-control-label" for="IsHaveClient" style="color: black; font-weight:500">Yes</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" style="display: none">
                        <label for="message-text">Member</label>
                        <select class="form-control" name="edit-choices-multiple-remove-button"
                            id="edit-choices-multiple-remove-button" multiple>
                            <option value="Choice 1">Khairul Kanters</option>
                            <option value="Choice 2">Lukman Budiman</option>
                            <option value="Choice 3">Fauzi Nur Irfan</option>
                            <option value="Choice 1">Rio Ferdian</option>
                        </select>
                    </div>
                </form>
                <div class="d-flex justify-content-end">
                    <div>
                        <button type="button" class="btn text-white" data-bs-dismiss="modal"
                            style="background-color: #D42A34">Cancel</button>
                        <button onclick="editGroup({{ Auth::user()['id'] }}, document.getElementById('groupId').value, document.getElementById('groupName').value, document.getElementById('IsHaveClient').checked, )" type="button" class="btn text-white" style="background-color: #62ca50">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/plugins/choices.min.js') }}"></script>
<script src="{{ asset('js/plugins/flatpickr.min.js') }}"></script>
<script>

    function editGroup(userId,groupId,groupName,IsHaveClient){
        console.log(userId);
        console.log(groupId);
        console.log(groupName);
        console.log(IsHaveClient);

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

                    if(IsHaveClient == true){
                        IsHaveClient = 1;
                    }else{
                        IsHaveClient = 0;
                    }

                    formData.append('user_id', userId);
                    formData.append('group_id', groupId);
                    formData.append('group_new_name', groupName);
                    formData.append('have_client', IsHaveClient);

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: "/api/group/edit",
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
                            } else {
                                swalWithBootstrapButtons.fire(
                                    "Error!",
                                    "Your request can't processed." + res['message'],
                                    "error"
                                );
                            }
                        },
                        complete: function(data) {
                            if ($("#loader")) {
                                $("#loader").hide();
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

    if (document.querySelector('.datetimepicker')) {
        flatpickr('.datetimepicker', {
            allowInput: true
        }); // flatpickr
    }

    if (document.getElementById('edit-choices-multiple-remove-button')) {
        var element = document.getElementById('edit-choices-multiple-remove-button');
        const example = new Choices(element, {
            removeItemButton: true
        });

        example.setChoices(
            [
                // {
                //     value: 'One',
                //     label: 'Meal'
                // },
                // {
                //     value: 'Two',
                //     label: 'Entertaint'
                // },
                // {
                //     value: 'Three',
                //     label: 'Gift'
                // },
            ],
            'value',
            'label',
            false,
        );
    }

    if (document.getElementById('edit-choices-multiple-remove-button2')) {
        var element = document.getElementById('edit-choices-multiple-remove-button2');
        const example = new Choices(element, {
            removeItemButton: true
        });

        example.setChoices(
            [
                // {
                //     value: 'One',
                //     label: 'Meal'
                // },
                // {
                //     value: 'Two',
                //     label: 'Entertaint'
                // },
                // {
                //     value: 'Three',
                //     label: 'Gift'
                // },
            ],
            'value',
            'label',
            false,
        );
    }
</script>
