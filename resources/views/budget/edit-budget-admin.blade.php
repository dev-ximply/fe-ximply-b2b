<div class="modal fade" id="editBudgetAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #19194B; color:white">
                <h5 class="modal-title text-white" id="exampleModalLabel">Edit Budget</h5>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form>
                    @csrf
                    <div class="row">
                        <input type="text" id="edit_user_id" hidden>
                        <div class="col-md my-2" hidden>
                            <label for="projectName" class="form-label text-dark" style="font-weight: 600">Name</label>
                            <input type="text" class="form-control" id="edit_budget_name" disabled>
                        </div>
                        <div class="col-md my-2">
                            <label for="projectName" class="form-label text-dark" style="font-weight: 600">Spending
                                Budget Limit</label>
                            <input type="text" class="form-control number_separator" id="spending_budget_admin"
                                disabled>
                            <script>
                                new NumericInput(document.getElementById('spending_budget_admin'), 'en-CA');
                            </script>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 w-100">
                            <label class="form-label text-dark" style="font-weight: 600">Topup Budget Limit</label>
                            <input type="text" class="form-control number-separator number_separator"
                                id="edit_budget_limit_admin" name="edit_budget_limit_admin" value="0">
                            {{-- <script>
                                new NumericInput(document.getElementById('edit_budget_limit_avail_topup'), 'en-CA');
                            </script> --}}
                        </div>

                        <div class="col-md-6" hidden>
                            <label class="form-label text-dark " style="font-weight: 600">Auto Approve Amount</label>
                            <input type="text" class="form-control number-separator number_separator"
                                id="auto_approve_edit" name="auto_approve_edit" value="0">
                        </div>

                        <div class="col-md-6" hidden>
                            <label class="form-label text-dark" style="font-weight: 600">Period</label>
                            <select class="form-control" name="frequency" id="edit_frequency">
                                <option value="onetime">Onetime</option>
                                <option value="monthly">Monthly</option>
                            </select>
                        </div>
                        <div class="col-6" hidden>
                            <label class="form-label text-dark" style="font-weight: 600">Expire Date</label>
                            <input type="date" class="form-control" id="expire_date" name="expire_date"
                                value="{{ old('expire_date') }}">
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <button type="button" name="button" class="btn btn-danger-cstm m-0"
                            data-bs-dismiss="modal">Cancel</button>
                        <input type="button" onclick="postAdminBudgett('{{ Auth::user()['id'] }}')" name="button"
                            value="Submit" class="btn btn-success-cstm m-0 ms-2">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function postAdminBudgett(id) {

        var tenant = TENANT_CODE;
        var user_id = USR_ID;
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


                    formData.append('user_id', user_id);
                    formData.append('tenant_code', tenant);
                    formData.append('assign_user_id', document.getElementById('edit_user_id').value);
                    formData.append('limit', document.getElementById('edit_budget_limit_avail_topup').value);
                    formData.append('auto_approve_limit', document.getElementById('auto_approve_edit').value);
                    formData.append('expire_date', document.getElementById('expire_date').value);
                    formData.append('frequency', document.getElementById('edit_frequency').value);

                    for (const value of formData.values()) {
                        console.log(value);
                    }


                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        // url: "{{ route('add_spend') }}",
                        url: API_URL + 'api/spend/member/assign',
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
                                // console.log()
                                swalWithBootstrapButtons.fire(
                                    "Error!",
                                    "Your request Failed.",
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
</script>
