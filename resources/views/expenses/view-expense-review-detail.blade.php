<style>
    /* styles unrelated to zoom */
    * {
        border: 0;
        margin: 0;
        padding: 0;
    }

    /* these styles are for the demo, but are not required for the plugin */
    .zoom {
        display: inline-block;
        position: relative;
    }

    /* magnifying glass icon */
    .zoom:after {
        content: '';
        display: block;
        width: 33px;
        height: 33px;
        position: absolute;
        top: 0;
        right: 0;
        /* background: url(icon.png); */

    }

    .zoom img {
        display: block;
    }

    .zoom img::selection {
        background-color: transparent;
    }

    #ex2 img:hover {
        cursor: url(grab.cur), default;
    }

    #ex2 img:active {
        cursor: url(grabbed.cur), default;
    }
</style>

<div class="modal fade" id="viewExpenseDetailReview" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header px-4" style="background: #19194b">
                <h6 class="modal-title fs-6 text-white" id="staticBackdropLabel">Expense Detail</h6>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close">
                    {{-- <i class="fa-solid fa-xmark"></i> --}}
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 px-4">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="" class="text-dark" style="font-weight:500">Date</label>
                                <input type="date" class="form-control bg-white text-dark" id="detail_date_review" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="text-dark" style="font-weight:500">Merchant</label>
                                <input type="text" class="form-control bg-white" id="detail_merchant_review" readonly>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label for="" class="text-dark" style="font-weight:500">Total Amount</label>
                                <input type="text" class="form-control bg-white number_separator"
                                    id="detail_total_amount_review" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="text-dark" style="font-weight:500">Location</label>
                                <input type="text" placeholder="" class="form-control bg-white" id="detail_location_review"
                                    readonly>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md mb-2">
                                <label for="" class="text-dark" style="font-weight:500">Expense Type</label>
                                <input type="text" placeholder="" class="form-control bg-white" id="detail_category_review"
                                    readonly>
                            </div>
                            <div class="col-md mb-2">
                                <label for="" class="text-dark" style="font-weight:500">Category</label>
                                <input type="text" placeholder="" class="form-control bg-white"
                                    id="detail_sub_category_review" readonly>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md mb-2">
                                <label for="" class="text-dark" style="font-weight:500">Client/Vendor</label>
                                <input type="text" placeholder="" class="form-control bg-white" id="detail_partner_review"
                                    readonly>
                            </div>
                            <div class="col-md mb-2">
                                <label for="" class="text-dark" style="font-weight:500">Purpose</label>
                                <input type="text" placeholder="" class="form-control bg-white" id="detail_purpose_review"
                                    readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <label for="dataExpenseOf" class="text-dark" style="font-weight:500">Expense Of</label>
                                <input type="text" placeholder="" class="form-control bg-white" id="dataExpenseOf_review"
                                    readonly>
                            </div>
                            <div class="col-md">
                                <label for="" class="text-dark" style="font-weight:500">Note</label>
                                <textarea name="note" id="detail_note_review" cols="1" rows="1" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 px-4">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active text-xs" data-bs-toggle="tab"
                                    href="#receipt_view_review">Upload&nbsp;Receipt</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-xs" data-bs-toggle="tab" href="#additional_view_review">Additional
                                    Photo</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="receipt_view_review" class="tab-pane active">
                                <div class="col-md mt-2  d-flex align-items-center justify-content-center h-100">
                                    <div>
                                        <div id="ava-upload-button-3"
                                            class="ava-circle ava-upload-button border my-3 d-flex align-items-center justify-content-center"
                                            style="vertical-align: middle; height: auto; width:auto; min-height:370px; min-width:300px; cursor: crosshair;">
                                            <span class="zoom" id="ex1">
                                                <img id="detail_receipt_file_review" class="ava-pic">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="additional_view_review" class="tab-pane fade">
                                <div class="col-md mt-2  d-flex align-items-center justify-content-center h-100">
                                    <div>
                                        <div id="ava-upload-button-4"
                                            class="ava-circle ava-upload-button border my-3 d-flex align-items-center justify-content-center"
                                            style="vertical-align: middle; height: auto; width:auto; min-height:370px; min-width:300px; cursor: crosshair;">
                                            <span class="zoom" id="ex2">
                                                <img id="detail_additional_file_review" class="ava-pic">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer text-end" id="decisionButton_review" style="display: none">
                <button onclick="approvalDecision('{{ Auth::user()['id'] }}', approvalID, 'approved')" type="button" data-bs-dismiss="modal"
                    class="btn text-white" style="width: 140px; background-color:#50B720">
                    <i class="fas fa-circle-check text-white text-lg me-1"></i>
                    Approve
                </button>
                <button onclick="approvalDecision('{{ Auth::user()['id'] }}', approvalID, 'rejected')" type="button"
                    class="btn text-white" style="width: 140px; background-color: #E40909">
                    <i class="fas fa-circle-xmark text-white text-lg me-1"></i>
                    Reject
            </div>
        </div>
    </div>
</div>


<script>
    function getExpenseApprovalData(receipt_picture_directory, additional_picture_directory, receipt_date, merchant,
            total_amount, location,
            category, sub_category, partner, purpose, expense_of, note, status, approval_id) {

            $.ajax({
                beforeSend: function() {
                    $('#main-loader').show();
                },
                success: function() {
                    
                    document.getElementById('detail_receipt_file_review').src = STORAGE_URL +
                    receipt_picture_directory;
                    document.getElementById('detail_additional_file_review').src = STORAGE_URL +
                        additional_picture_directory;
                    document.getElementById('detail_date_review').value = receipt_date;
                    document.getElementById('detail_merchant_review').value = merchant;
                    document.getElementById('detail_total_amount_review').value = total_amount;
                    document.getElementById('detail_location_review').value = location;
                    document.getElementById('detail_category_review').value = category;
                    document.getElementById('detail_sub_category_review').value = sub_category;
                    document.getElementById('detail_partner_review').value = partner;
                    document.getElementById('detail_purpose_review').value = purpose;
                    document.getElementById('detail_note_review').value = note;
                    document.getElementById('dataExpenseOf_review').value = expense_of;
                    approvalID = approval_id;
                    if (status == "pending") {
                        document.getElementById('decisionButton_review').style.display = "block";
                    } else {
                        document.getElementById('decisionButton_review').style.display = "none";
                    }
                },
                complete:function(){
                    
                    $('#main-loader').hide();
                }
            });

        }
        
</script>


<script>
    $("input.number_separator").each((i, ele) => {
        let clone = $(ele).clone(false)
        clone.attr("type", "text")
        let ele1 = $(ele)
        clone.val(Number(ele1.val()).toLocaleString("en-CA"))
        $(ele).after(clone)
        $(ele).hide()
        clone.mouseenter(() => {

            ele1.show()
            clone.hide()
        })
        setInterval(() => {
            let newv = Number(ele1.val()).toLocaleString("en-CA")
            if (clone.val() != newv) {
                clone.val(newv)
            }
        }, 10)

        $(ele).mouseleave(() => {
            $(clone).show()
            $(ele1).hide()
        })


    })
</script>
