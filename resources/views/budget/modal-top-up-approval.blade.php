<style>
    /*the container must be positioned relative:*/
    .autocomplete {
        position: relative;
        display: flex;
    }

    input {
        /* border: 1px solid transparent; */
        /* background-color: #f1f1f1; */
        padding: 10px;
        font-size: 16px;
    }

    input[type=text] {
        /* background-color: #f1f1f1; */
        width: 100%;
    }

    input[type=submit] {
        background-color: DodgerBlue;
        color: #fff;
        cursor: pointer;
    }

    .autocomplete-items {
        position: absolute;
        border: 1px solid #d4d4d4;
        border-bottom: none;
        border-top: none;
        z-index: 99;
        /*position the autocomplete items to be the same width as the container:*/
        top: 100%;
        left: 0;
        right: 0;
    }

    .autocomplete-items div {
        padding: 10px;
        cursor: pointer;
        background-color: #fff;
        border-bottom: 1px solid #d4d4d4;
    }

    /*when hovering an item:*/
    .autocomplete-items div:hover {
        background-color: #e9e9e9;
    }

    /*when navigating through the items using the arrow keys:*/
    .autocomplete-active {
        background-color: DodgerBlue !important;
        color: #ffffff;
    }

    /* select{
       width: 100%;
       height: 30px;
    } */

    /* .form-control{
       border: #e293d3 !important;
    } */
</style>

<div class="modal fade" id="topUp" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content " style="width: 300px !important">
            <div class="modal-header" style="background: #19194b">
                <h6 class="font-weight-bolder text-white" style="font-weight: 600">Top Up</h6>
                <button type="button" class="btn-close  text-white" data-bs-dismiss="modal" aria-label="Close">
                    {{-- <span aria-hidden="true">×</span> --}}
                </button>
            </div>
            <div class="modal-body p-0">
                <div class="card card-plain">

                    <div class="card-body">
                        <form role="form text-left">
                            @csrf
                            <label style="color: #000000">Amount</label>
                            <div class="input-group mb-3 autocomplete">
                                <span class="input-group-text border" id="basic-addon1">Rp</span>
                                <input type="text" class="form-control px-2" placeholder="0" aria-label="Username"
                                    aria-describedby="basic-addon1" id="topupAmount" required>
                                <script>
                                    new NumericInput(document.getElementById('topupAmount'), 'en-CA');
                                </script>
                            </div>
                            <label style="color: #000000">Purpose</label>
                            <div class="mb-3 w-100">
                                <select class="w-100 text-capitalize form-select" name="topupPurpose" id="topupPurpose"
                                    required>
                                    <option value="" selected>Select</option>
                                </select>
                            </div>
                            <label style="color: #000000">Note</label>
                            <div class="input-group ">
                                <input type="text" id="topupNote" placeholder="Some Notes" class="form-control"
                                    required>
                            </div>
                            <div class="d-flex text-center justify-content-end">
                                <div>
                                    <button type="button" class="btn  btn-round me-1 mt-4 mb-0 text-white topUp"
                                        onclick="topupRequest({{ Auth::user()['id'] }}, document.getElementById('topupAmount').value, document.getElementById('topupPurpose').value, document.getElementById('topupNote').value)"
                                        style="background-color: #62ca50">Top Up</button>
                                    <button type="button" class="btn btn-danger btn-round text-white  ms-1 mt-4 mb-0"
                                        data-bs-dismiss="modal" style="background-color: #D42A34">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function topupRequest(userId, amount, purpose, note) {

        // console.log(userId);
        // console.log(amount);
        // console.log(purpose);
        // console.log(note);

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
                    formData.append('amount', amount);
                    formData.append('purpose', purpose);
                    formData.append('note', note);

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: API_URL + "api/topup/request",
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
                                    "success!",
                                    "Your request success.",
                                    "success"
                                );
                            } else {
                                swalWithBootstrapButtons.fire(
                                    "sorry!",
                                    "system is busy, please contact ximply",
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

    $(document).ready(function() {
        $.ajax({
            type: "GET",
            url: API_URL + "api/purpose/list/index?user_id=" + {{ Auth::user()['id'] }},
            success: function(res) {
                if (res) {
                    var response = res['data'];
                    for (const obj of response) {
                        var CategoryId = obj.id;
                        var CategoryName = obj.purpose;
                        $("#topupPurpose").append('<option value="' + CategoryName +
                            '">' + CategoryName + '</option>');
                    }
                } else {
                    $("#topupPurpose").empty();
                    $("#topupPurpose").append('<option value="">Select</option>');
                }
            }
        });
    });

    function autocomplete(inp, arr) {
        var currentFocus;
        inp.addEventListener("input", function(e) {
            var a, b, i, val = this.value;
            closeAllLists();
            if (!val) {
                return false;
            }
            currentFocus = -1;
            a = document.createElement("DIV");
            a.setAttribute("id", this.id + "autocomplete-list");
            a.setAttribute("class", "autocomplete-items");
            this.parentNode.appendChild(a);
            for (i = 0; i < arr.length; i++) {
                if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                    b = document.createElement("DIV");
                    b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                    b.innerHTML += arr[i].substr(val.length);
                    b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                    b.addEventListener("click", function(e) {
                        inp.value = this.getElementsByTagName("input")[0].value;
                        closeAllLists();
                    });
                    a.appendChild(b);
                }
            }
        });

        /*execute a function presses a key on the keyboard:*/
        inp.addEventListener("keydown", function(e) {
            var x = document.getElementById(this.id + "autocomplete-list");
            if (x) x = x.getElementsByTagName("div");
            if (e.keyCode == 40) {
                currentFocus++;
                addActive(x);
            } else if (e.keyCode == 38) {
                currentFocus--;
                addActive(x);
            } else if (e.keyCode == 13) {
                e.preventDefault();
                if (currentFocus > -1) {
                    if (x) x[currentFocus].click();
                }
            }
        });

        function addActive(x) {
            if (!x) return false;
            removeActive(x);
            if (currentFocus >= x.length) currentFocus = 0;
            if (currentFocus < 0) currentFocus = (x.length - 1);
            x[currentFocus].classList.add("autocomplete-active");
        }

        function removeActive(x) {
            for (var i = 0; i < x.length; i++) {
                x[i].classList.remove("autocomplete-active");
            }
        }

        function closeAllLists(elmnt) {
            var x = document.getElementsByClassName("autocomplete-items");
            for (var i = 0; i < x.length; i++) {
                if (elmnt != x[i] && elmnt != inp) {
                    x[i].parentNode.removeChild(x[i]);
                }
            }
        }
        document.addEventListener("click", function(e) {
            closeAllLists(e.target);
        });
    }
    /*An array containing all the country names in the world:*/
    var countries = ["100000", "200000", "300000", "400000", "500000", "600000", "700000", "800000", "900000",
        "1000000"
    ];
    autocomplete(document.getElementById("topupAmount"), countries);
</script>
