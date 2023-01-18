<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="card card-plain">
                    <div class="card-header pb-0 text-left">
                        <div class="text-center">
                            <p class="font-weight-bolder text-md" style="color: #000000">Your Remain
                                Budget</p>
                        </div>
                        <div class="text-center text-secondary"><span class="font-weight-bolder text-md"
                                style="color: #3A8DDA; font-size:30px">Rp
                                <span>{{ number_format($data['limit']->remain_limit, 2) }}</span></span>
                        </div>
                        <hr class="horizontal dark mb-1" style="margin-top: 9px;">
                    </div>
                    <div class="card-body pb-3">
                        <form role="form text-left">
                            <input type="text" id="topup-id" hidden>
                            <label>Topup Request</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="topup-amount" disabled step="1.0"
                                    style="font-weight: bold">
                                <script>
                                    new NumericInput(document.getElementById('topup-amount', 'en-CA'));
                                </script>
                            </div>
                            <label>Topup Approve</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="topup-approved" step="1.0"
                                    style="color: #3A8DDA; font-weight: bold">
                                <script>
                                    new NumericInput(document.getElementById('topup-approved', 'en-CA'));
                                </script>
                            </div>
                            <div class="d-flex flex-row justify-content-between">
                                <button
                                    onclick="approval(document.getElementById('topup-id').value, 'approved', document.getElementById('topup-approved').value)"
                                    type="button" class="btn btn-sm btn-rounded btn-success-cstm mt-2 mb-0 text-white"
                                    style="width: 120px;">Approve</button>
                                <button type="button"
                                    class="btn btn-sm btn-danger-cstm btn-rounded mt-2 mb-0 text-white"
                                    style="width: 120px;" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
