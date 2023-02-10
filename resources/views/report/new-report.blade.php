<div class="modal fade" id="newReport" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content" >
            <div class="modal-header px-4" style="background:#19194b;">
                <h6 class="modal-title fs-6 text-white" id="staticBackdropLabel">New Report</h6>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close">
                    {{-- <i class="fa-solid fa-xmark"></i> --}}
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md px-4">
                        <form action="javascript:void(0)" method="POST">
                            @csrf
                            <input type="text" id="user_id" value="'{{ Auth::user()['id'] }}'" hidden>
                            <div class="row">
                                <div class="col-md-6 d-flex flex-md-row flex-column">
                                    <div class="row">
                                        <label for="" class="text-dark"
                                            style="font-weight: 500;font-size:13px">Date</label>
                                        <div class="col-md mb-2 d-flex align-items-center">
                                            <div class="col-md input-group">
                                                <span for=""
                                                    class="input-group-text z-index-1 font-weight-bold text-dark"
                                                    id="basic-addon1"
                                                    style="border-right: 1px solid #adadadad; font-size:11px;height:35px;border-top-left-radius:5px;border-bottom-left-radius:5px">From</span>
                                                <input type="date" class="form-control px-2 text-dark"
                                                    id="date_start" name="date_start"
                                                    style="font-size:11px;height:35px; border-top-right-radius:5px !important;border-bottom-right-radius:5px !important">
                                            </div>
                                        </div>
                                        <div class="col-md mb-2  d-flex align-items-center">
                                            <div class="input-group">
                                                <span for=""
                                                    class="input-group-text z-index-1 font-weight-bold text-dark"
                                                    style="border-right: 1px solid #adadadad; font-size:11px;height:35px;border-top-left-radius:5px;border-bottom-left-radius:5px">To</span>
                                                <input type="date" class="form-control px-2 text-dark" id="date_end"
                                                    name="date_end"
                                                    style="font-size:11px;height:35px; border-top-right-radius:5px !important;border-bottom-right-radius:5px !important">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="row">
                                        <label for="" class="text-dark"
                                            style="font-weight: 500;font-size:13px">Expense Type</label>
                                        <div class="col-md mb-2">
                                            <select name="category" id="category" class="form-select text-dark"
                                                style="font-size:12px;line-height:17px !important;border-radius:5px !important">
                                                <option value="" selected>Select All...</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label for="" class="text-dark" style="font-weight: 500;font-size:13px">Title
                                    <span class="text-secondary">(optional)</span></label>
                                <div class="col-md mb-2">
                                    <input type="text" placeholder="your report title"
                                        class="form-control px-2 text-dark" id="report_title" name="report_title"
                                        style="font-size:11px;height:35px; border-top-right-radius:5px !important;border-bottom-right-radius:5px !important">
                                </div>
                            </div>
                        </form>
                        <div class="row my-3">
                            <div class="" style="border-radius: 0">
                                <div style="text-align: right; font-size:15px" class="text-dark mb-2">
                                    Total : <span class="fw-bold" id="totalAmount">0.00</span>
                                </div>
                                <div class="table-responsive" style="max-height: 250px; min-height: 250px">
                                    <table class="table table-flush border text-dark">
                                        <thead class="thead-light">
                                            <tr>
                                                <th class="text-xs px-2 text-dark">Date</th>
                                                <th class="text-xs px-0 text-dark">Merchant</th>
                                                <th class="text-xs px-0 text-dark">Expense Type</th>
                                                <th class="text-xs px-0 text-dark">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tableBody">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div style="text-align: right">
                            <button onclick="createReport()" type="submit" class="btn text-white"
                                style="background: #62CA50">Create
                                Report</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function createReport() {

        var user_id = $("#user_id").val();
        var report_title = $("#report_title").val();
        var date_start = $("#date_start").val();
        var date_end = $("#date_end").val();
        var category = $("#category").val();

        if ((date_start != "" && date_end != "") || category != "") {
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

                        var formDataReport = new FormData();

                        formDataReport.append('user_id', user_id);

                        if (report_title != "") {
                            formDataReport.append('report_title', report_title);
                        }

                        if (date_start != "" && date_end != "") {
                            formDataReport.append('date_start', date_start);
                            formDataReport.append('date_end', date_end);
                        }

                        if (category != "") {
                            formDataReport.append('category', category);
                        }

                        $.ajaxSetup({
                            headers: {
                                "Authorization": "Bearer " + AUTH_TOKEN,
                                "Accept": "application/json"
                            }
                        });

                        $.ajax({
                            url: API_URL + "api/report/create",
                            type: 'post',
                            data: formDataReport,
                            contentType: false,
                            processData: false,
                            beforeSend: function() {
                                $("#main-loader").show();
                            },
                            success: function(res) {
                                if (res['success'] == true) {
                                    swalWithBootstrapButtons.fire(
                                        "Success!",
                                        "Your request success.",
                                        "success"
                                    );
                                } else {
                                    swalWithBootstrapButtons.fire(
                                        "Error!",
                                        res['message'],
                                        "error"
                                    );
                                }
                            },
                            complete: function(data) {
                                $("#main-loader").hide();
                                setTimeout(function() {
                                    window.location.reload(true);
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
        } else {
            Swal.fire(
                "oops!",
                "please select range date or categories",
                "error"
            );
        }
    }

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
                        $("#category").append('<option value="' + CategoryName +
                            '">' + CategoryName + '</option>');
                    }
                } else {
                    $("#category").empty();
                }
            }
        });

        $(document).ready(function() {
            var urlSearch = "";

            $('#date_end').on('change', function() {
                var date_start = $('#date_start').val();
                var date_end = $('#date_end').val();
                urlSearch = API_URL + "api/expense/list/basic?user_id=" +
                    $('#user_id').val() +
                    "&date_start=" + date_start +
                    "&date_end=" + date_end;
                if ($('#category').val() != "") {
                    var category = $('#category').val();
                    urlSearch = API_URL + "api/expense/list/basic?user_id=" +
                        $('#user_id').val() +
                        "&category=" + category +
                        "&date_start=" + date_start +
                        "&date_end=" + date_end;
                }
                new getDataExpenses(urlSearch);
            });

            $('#category').on('change', function() {
                var category = $('#category').val();
                urlSearch = API_URL + "api/expense/list/basic?user_id=" +
                    $('#user_id').val() +
                    "&category=" + category;
                if ($('#date_start').val() != "" && $('#date_end').val() != "") {
                    var date_start = $('#date_start').val();
                    var date_end = $('#date_end').val();
                    urlSearch = API_URL + "api/expense/list/basic?user_id=" +
                        $('#user_id').val() +
                        "&category=" + category +
                        "&date_start=" + date_start +
                        "&date_end=" + date_end;
                }
                new getDataExpenses(urlSearch);
            });

            function getDataExpenses(urlSearch) {
                $("#tableBody").html("");
                $("#totalAmount").html("0.00");
                $.ajaxSetup({
                    headers: {
                        "Authorization": "Bearer " + AUTH_TOKEN,
                        "Accept": "application/json"
                    }
                });
                $.ajax({
                    type: "GET",
                    url: urlSearch,
                    beforeSend: function() {
                        $("#main-loader").show();
                    },
                    success: function(res) {
                        if (res) {
                            var response = res['data'];
                            var tableOut = "";
                            var totalAmount = 0;
                            for (const obj of response) {
                                totalAmount = totalAmount + obj.total_amount;
                                tableOut +=
                                    '<tr><td class="font-weight-bold pt-3">';
                                tableOut +=
                                    '<p class="text-sm text-dark">' + obj.date +
                                    ', ' + obj
                                    .time + '</p></td>';
                                tableOut +=
                                    '<td class="text-xs font-weight-bold pt-3 px-0"><p class="text-sm text-dark">' +
                                    obj.merchant + '</p></td>';
                                tableOut +=
                                    '<td class="text-xs font-weight-bold pt-3 px-0"><p class="text-sm text-dark">' +
                                    obj.category + '</p></td>';
                                tableOut +=
                                    '<td class="text-xs font-weight-bold pt-3 px-0"><p class="text-sm text-dark">' +
                                    Intl.NumberFormat().format(obj.total_amount) +
                                    '</p></td></tr>';                                
                            }
                            $("#tableBody").append(tableOut);
                            $("#totalAmount").html(Intl.NumberFormat().format(
                                totalAmount));
                        } else {
                            $("#tableBody").empty();
                        }
                    },
                    complete: function(data) {
                        $("#main-loader").hide();
                    }
                });
            }
        });
    });
</script>
