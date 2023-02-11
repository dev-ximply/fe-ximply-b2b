{{-- modal subscriber --}}
<div class="col-md-4">
    <div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification"
        aria-hidden="true">
        <div class="modal-dialog modal-danger modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="d-flex justify-content-end p-3">
                    <button type="button" class="btn-close text-dark text-lg" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="py-2 text-center">
                        <h4 class="text-dark ">Go to Ximply Pro!</h4>
                        <span class="text-dark px-3" style="font-size: 14px">Intelligent Scan usage exceeds the limit
                        </span>
                    </div>
                </div>
                <div class=" d-flex justify-content-around">
                    <a type="button" class="btn btn-blue-cstm" href="https://beazy.io" target="_blank">Subscribe</a>
                    <button type="button" class="btn btn-orange-cstm text-white" data-bs-toggle="modal"
                        data-bs-target="#manualForm" onclick="handlingModalForm(false)">Manual Form</button>
                </div>
            </div>
        </div>
    </div>
</div>

<input type="button" data-bs-toggle="modal" data-bs-target="#modal-notification" hidden id="modal-subscribe-show">

<!-- Modal -->
<div class="modal fade text-dark" id="manualForm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl text-dark">
        <div class="modal-content">
            <div class="modal-header px-4" style="background: #19194b">
                <h6 class="modal-title fs-6 text-white" id="staticBackdropLabel">New Expense</h6>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close">
                    {{-- <i class="fa-solid fa-xmark"></i> --}}
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="text" id="user_id" value="{{ Auth::user()['id'] }}" hidden>
                </form>
                <div id="scan-receipt-body">
                    <form action="javascript:void(0)" method="POST" enctype="multipart/form-data">
                        <div class="row" style="cursor: pointer">
                            <div class="col-md px-4">
                                <div class="col-md mt-2  d-flex align-items-center justify-content-center">
                                    <div class="position-relative mt-2" style="height:350px; min-height:auto">
                                        <div id="btn-scan-receipt-nanonets"
                                            class="ava-upload-button  my-3 d-flex flex-column align-items-center justify-content-center"
                                            style="vertical-align: middle; height: 350px; width:350px; min-height:100%; min-width:300px;">
                                            <img id="ava-pic-2" class="ava-pic"
                                                src="{{ asset('img/icons/receipt.png') }}" style="margin-top:-80px">
                                            <span class="text-xs text-dark mt-2" id="sub-title-avapict">Upload your
                                                receipt.
                                            </span>
                                        </div>
                                        <input required name="file_receipt" id="scan-receipt-nanonets"
                                            class="ava-file-upload" type="file" accept="image/*" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="create-receipt-body">
                    <form action="javascript:void(0)" method="POST" enctype="multipart/form-data"
                        onsubmit="NewExpenses()">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 px-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="" class="text-dark" style="font-weight:500">Date</label>
                                        <input type="date" class="form-control" name="receipt_date" id="receipt_date"
                                            required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="text-dark" style="font-weight:500">Merchant</label>
                                        <input type="text" name="merchant" id="merchant"
                                            placeholder="Merchant..." class="form-control " required>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <label for="" class="text-dark" style="font-weight:500">Total
                                            Amount</label>
                                        <input type="text" name="total_amount" id="total_amount"
                                            class="form-control" placeholder="Amount" step="1.0" required>
                                        <script>
                                            new NumericInput(document.getElementById('total_amount'), 'en-CA');
                                        </script>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="text-dark"
                                            style="font-weight:500">Location</label>
                                        <input type="text" placeholder="merchant location" name="location"
                                            id="location" class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md mb-2">
                                        <label for="" class="text-dark" style="font-weight:500">Expense
                                            Type</label>
                                        <select class="form-select text-dark" aria-label="Default select example"
                                            name="category" id="category">
                                            <option class="text-dark" selected>Expense Type</option>
                                        </select>
                                    </div>
                                    <div class="col-md mb-2">
                                        <label for="" class="text-dark"
                                            style="font-weight:500">Category</label>
                                        <select class="form-select  text-dark" aria-label="Default select example"
                                            name="sub_category" id="sub_category">
                                            <option class="text-dark" selected>Category</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md mb-2">
                                        <label for="" class="text-dark"
                                            style="font-weight:500">Purpose</label>
                                        <select class="form-select text-dark" aria-label="Default select example"
                                            name="purpose" id="purpose">
                                            <option selected>Purpose</option>
                                        </select>
                                    </div>
                                    <div class="col-md mb-2">
                                        <label for="" class="text-dark"
                                            style="font-weight:500">Client/Vendor</label>
                                        <select class="form-select text-dark" aria-label="Default select example"
                                            name="client" id="client_id">
                                            <option selected>Select</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 px-4">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active text-xs" data-bs-toggle="tab"
                                            href="#home">Upload&nbsp;Receipt</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-xs" data-bs-toggle="tab"
                                            href="#additionalPhoto">Additional Photo</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="home" class="tab-pane active">
                                        <div class="col-md mt-2  d-flex align-items-center justify-content-center h-100 border overflow-hidden"
                                            style="border-radius: 5px;cursor:pointer">
                                            <div style="">
                                                <div id="file_receipt_upload"
                                                    class=" ava-upload-button  my-3 d-flex align-items-center justify-content-center"
                                                    style="vertical-align: middle; height: auto;width:auto; min-height:240px; min-width:300px">
                                                    <img id="ava-pic-4" class="ava-pic"
                                                        src="{{ asset('img/icons/receipt.png') }}">
                                                </div>
                                                <input required name="file_receipt" id="file_receipt"
                                                    class="ava-file-upload" type="file" accept="image/*" />
                                            </div>
                                        </div>
                                    </div>
                                    <div id="additionalPhoto" class="tab-pane fade">
                                        <div class="col-md mt-2  d-flex align-items-center justify-content-center h-100 border overflow-hidden"
                                            style="border-radius: 5px;cursor:pointer">
                                            <div style="">
                                                <div id="file_additional_upload"
                                                    class=" ava-upload-button  my-3 d-flex align-items-center justify-content-center"
                                                    style="vertical-align: middle; height: auto;width:auto; min-height:240px; min-width:300px">
                                                    <img id="ava-pic-5" class="ava-pic"
                                                        src="{{ asset('img/icons/receipt.png') }}" alt="additional_photo">
                                                </div>
                                                <input name="file_additional" id="file_additional"
                                                    class="ava-file-upload" type="file" accept="image/*" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="text-align: right; margin-top:20px; margin-right:12px">
                            <button type="submit" class="btn text-white" style="background: #62CA50">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // new expense
    function NewExpenses() {
        var user_id = $("#user_id").val();
        var category = $("#category").val();
        var sub_category = $("#sub_category").val();
        var purpose = $("#purpose").val();
        var client_id = $("#client_id").val();
        var receipt_date = $("#receipt_date").val();
        var merchant = $("#merchant").val();
        var location = $("#location").val();
        var total_amount = $("#total_amount").val();
        var fileReceipt = $('#file_receipt')[0].files;
        console.log(fileReceipt);
        var fileAdditional = $('#file_additional')[0].files;

        var formDataExpense = new FormData();

        formDataExpense.append('tenant_code', TENANT_CODE);
        formDataExpense.append('user_id', user_id);
        formDataExpense.append('category', category);
        formDataExpense.append('sub_category', sub_category);
        formDataExpense.append('purpose', purpose);
        formDataExpense.append('client_id', client_id);
        formDataExpense.append('receipt_date', receipt_date);
        formDataExpense.append('merchant', merchant);
        formDataExpense.append('location', location);
        formDataExpense.append('total_amount', total_amount);
<<<<<<< HEAD

=======
        console.log(formDataExpense);
>>>>>>> 573a3f5f6b65b0a4f844edc5634624112d65920c
        if (fileReceipt.length > 0) {
            formDataExpense.append('file_receipt', fileReceipt[0]);
        }

        if (fileAdditional.length > 0) {
            formDataExpense.append('file_additional', fileAdditional[0]);
        }

        // console.log(formDataExpense);

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
                            "Authorization": "Bearer " + AUTH_TOKEN,
                            "Accept": "application/json",
                        }
                    });

                    $.ajax({
                        url: API_URL + "api/expense/create",
                        type: 'post',
                        data: formDataExpense,
                        contentType: false,
                        processData: false,
                        beforeSend: function() {
                            if ($("#main-loader")) {
                                $("#main-loader").show();
                            }
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
                                    "oops!",
                                    res['message'],
                                );
                            }
                        },
                        complete: function(data) {
                            $("#main-loader").hide();
                            if (data.status != 200) {
                                Swal.fire(
                                    "something wrong",
                                    "please contact ximply support!",
                                );
                            }
                        }
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire(
                        "Cancelled",
                        "Your request cancelled :)",
                    );
                }
            });
    }

    //for scan receipt
    $(document).ready(function() {
        var readURL = function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    // change image
                    document.getElementById("sub-title-avapict").style.display = "none";
                    $("#ava-pic-2").attr("src", e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        };

        $("#scan-receipt-nanonets").on("change", function() {

            readURL(this);

            var fileReceipt = $('#scan-receipt-nanonets')[0].files;

            if (fileReceipt.length > 0) {
                // send receipt to nanonets
                setTimeout(function() {
                    var formdata = new FormData();
                    
                    formdata.append("tenant_code", TENANT_CODE);
                    formdata.append("user_id", $("#user_id").val());
                    formdata.append("file_receipt", fileReceipt[0]);

                    $.ajaxSetup({
                        headers: {
                            "Authorization": "Bearer " + AUTH_TOKEN,
                            "Accept": "application/json"
                        }
                    });

                    var result = [];
                    result['usage_exceeds'] = false;

                    $.ajax({
                        url: API_URL + "api/nanonets/receipt/create",
                        method: 'POST',
                        data: formdata,
                        contentType: false,
                        processData: false,
                        beforeSend: function() {
                            $("#main-loader").show();
                        },
                        success: function(result) {
                            if (result['success'] == true) {
                                handlingModalForm(false);

                                var dataNanonets = result['data'];
                                document.getElementById('receipt_date').value =
                                    dataNanonets['date'];
                                document.getElementById('merchant').value =
                                    dataNanonets['merchant'];
                                document.getElementById('location').value =
                                    dataNanonets['location'];
                                document.getElementById('total_amount').value =
                                    dataNanonets['total_amount'].toLocaleString();
                                document.getElementById('ava-pic-4').src =
                                    STORAGE_URL + dataNanonets['file_receipt'];
                                document.getElementById('file_receipt').files =
                                    fileReceipt;

                                Swal.fire(
                                    "wow, great",
                                    "success intelligence scan receipt",
                                    "success"
                                );
                            } else if (result['success'] == false) {
                                if (result['usage_exceeds'] == true) {
                                    document.getElementById('modal-subscribe-show')
                                        .click();
                                } else {
                                    Swal.fire(
                                        "something wrong",
                                        result['message'],
                                    );
                                }
                            }
                        },
                        complete: function(data) {
                            $("#main-loader").hide();
                            if (data.status != 200) {
                                Swal.fire(
                                    "something wrong",
                                    "please contact ximply support!",
                                );
                            }
                        }
                    });
                }, 500)
            };

            // hide loader
            if (document.getElementById('main-loader')) {
                document.getElementById('main-loader').style.display = "none";
            }
        });

        $("#btn-scan-receipt-nanonets").on("click", function() {
            $("#scan-receipt-nanonets").click();
        });
    });

    // for manual form
    $(document).ready(function() {
        var readURL = function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $("#ava-pic-4").attr("src", e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        };

        $("#file_receipt").on("change", function() {
            readURL(this);
        });

        $("#file_receipt_upload").on("click", function() {
            $("#file_receipt").click();
        });
    });

    $(document).ready(function() {
        var readURL = function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $("#ava-pic-5").attr("src", e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        };

        $("#file_additional").on("change", function() {
            readURL(this);
        });

        $("#file_additional_upload").on("click", function() {
            $("#file_additional").click();
        });
    });

    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                "Authorization": "Bearer " + AUTH_TOKEN,
                "Accept": "application/json"
            }
        });

        $.ajax({
            type: "GET",
            url: API_URL + "api/category/list/main?user_id=" + document.getElementById(
                'user_id').value,
            success: function(res) {
                if (res) {
                    var response = res['data'];
                    for (const obj of response) {
                        var CategoryId = obj.id;
                        var CategoryName = obj.category_name;
                        $("#category").append('<option value="' + CategoryId +
                            '">' + CategoryName + '</option>');
                    }
                } else {
                    $("#category").empty();
                }
            }
        });

        $('#category').on('change', function() {
            var categoryId = $(this).val();
            if (categoryId) {
                $.ajax({
                    type: "GET",
                    url: API_URL + "api/category/list/sub?user_id=" + document
                        .getElementById('user_id').value +
                        "&category_id=" + categoryId,
                    success: function(res) {
                        if (res) {
                            var response = res['data'];
                            $("#sub_category").empty();
                            $("#sub_category").append(
                                '<option value="">Select</option>');
                            for (const obj of response) {
                                var SubCategoryId = obj.id;
                                var SubCategoryName = obj.sub_category_name;
                                $("#sub_category").append('<option value="' +
                                    SubCategoryId +
                                    '">' + SubCategoryName + '</option>');
                            }
                        } else {
                            $("#sub_category").empty();
                            $("#sub_category").append(
                                '<option value="">Select</option>');
                        }
                    }
                });
            } else {
                $("#sub_category").empty();
            }
        });

        $.ajax({
            type: "GET",
            url: API_URL + "api/purpose/list/index?user_id=" + document.getElementById(
                'user_id').value,
            success: function(res) {
                if (res) {
                    var response = res['data'];
                    for (const obj of response) {
                        var CategoryId = obj.id;
                        var CategoryName = obj.purpose;
                        $("#purpose").append('<option value="' + CategoryName +
                            '">' + CategoryName + '</option>');
                    }
                } else {
                    $("#purpose").empty();
                }
            }
        });

        $.ajax({
            type: "GET",
            url: API_URL + "api/partner/list/" + TENANT_CODE + "?user_id=" + document.getElementById(
                'user_id').value,
            success: function(res) {
                if (res) {
                    var response = res['data'];
                    for (const obj of response) {
                        var client_id = obj.id;
                        var client_name = obj.company_name;
                        $("#client_id").append('<option value="' + client_id +
                            '">' + client_name + '</option>');
                    }
                } else {
                    $("#client_id").empty();
                }
            }
        });
    })
</script>
