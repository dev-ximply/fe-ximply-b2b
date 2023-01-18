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
                            {{-- <input type="text" id="user_idTopup" value="{{ Auth::user()['id'] }}" hidden> --}}
                            <label style="color: #000000">Amount</label>
                            <div class="input-group mb-3 autocomplete">
                                <span class="input-group-text border" id="basic-addon1">Rp</span>
                                <input type="text" class="form-control px-2" placeholder="0" aria-label="Username"
                                    aria-describedby="basic-addon1" id="topupAmount" required>
                            </div>
                            <label style="color: #000000">Client</label>
                            <div class=" mb-3 w-100">
                                <select class="w-100 form-select" name="choices-category" id="choices-category-client"  required>
                                    {{-- @foreach($data['list_client'] as $item3) --}}
                                        {{-- <option value="{{ $item3['id'] }}">{{ $item3['company_name'] }}</option> --}}
                                    {{-- @endforeach --}}
                                    <option value="" >Tes</option>
                                </select>
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
                                <input type="text" id="topupNote" placeholder="Some Notes" class="form-control">
                            </div>
                            <div class="d-flex text-center justify-content-end">
                                <div>
                                    <button
                                        onclick="topupRequest({{ Auth::user()['id'] }}, document.getElementById('topupAmount').value, document.getElementById('choices-category-client').value, document.getElementById('topupPurpose').value, document.getElementById('topupNote').value)"
                                        type="button" class="btn  btn-round me-1 mt-4 mb-0 text-white topUp"
                                        style="background-color: #62ca50">Top
                                        Up</button>
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
 
    function topupRequest(userId, topupAmount, clientId, purpose, note) {
 
        // console.log(userId);
        // console.log(topupAmount);
        // console.log(clientId);
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
 
                    formData.append('user_id', userId);
                    formData.append('amount', topupAmount);
                    formData.append('client_id', clientId);
                    formData.append('purpose', purpose);
                    formData.append('note', note);
 
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
 
                    $.ajax({
                        url: API_URL + "api/limitation/topup",
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
                                    "Your request can't processed.",
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
                        var CategoryName = obj.business_purpose;
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
        /*the autocomplete function takes two arguments,
        the text field element and an array of possible autocompleted values:*/
        var currentFocus;
        /*execute a function when someone writes in the text field:*/
        inp.addEventListener("input", function(e) {
            var a, b, i, val = this.value;
            /*close any already open lists of autocompleted values*/
            closeAllLists();
            if (!val) {
                return false;
            }
            currentFocus = -1;
            /*create a DIV element that will contain the items (values):*/
            a = document.createElement("DIV");
            a.setAttribute("id", this.id + "autocomplete-list");
            a.setAttribute("class", "autocomplete-items");
            /*append the DIV element as a child of the autocomplete container:*/
            this.parentNode.appendChild(a);
            /*for each item in the array...*/
            for (i = 0; i < arr.length; i++) {
                /*check if the item starts with the same letters as the text field value:*/
                if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                    /*create a DIV element for each matching element:*/
                    b = document.createElement("DIV");
                    /*make the matching letters bold:*/
                    b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                    b.innerHTML += arr[i].substr(val.length);
                    /*insert a input field that will hold the current array item's value:*/
                    b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                    /*execute a function when someone clicks on the item value (DIV element):*/
                    b.addEventListener("click", function(e) {
                        /*insert the value for the autocomplete text field:*/
                        inp.value = this.getElementsByTagName("input")[0].value;
                        /*close the list of autocompleted values,
                        (or any other open lists of autocompleted values:*/
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
                /*If the arrow DOWN key is pressed,
                increase the currentFocus variable:*/
                currentFocus++;
                /*and and make the current item more visible:*/
                addActive(x);
            } else if (e.keyCode == 38) { //up
                /*If the arrow UP key is pressed,
                decrease the currentFocus variable:*/
                currentFocus--;
                /*and and make the current item more visible:*/
                addActive(x);
            } else if (e.keyCode == 13) {
                /*If the ENTER key is pressed, prevent the form from being submitted,*/
                e.preventDefault();
                if (currentFocus > -1) {
                    /*and simulate a click on the "active" item:*/
                    if (x) x[currentFocus].click();
                }
            }
        });
 
        function addActive(x) {
            /*a function to classify an item as "active":*/
            if (!x) return false;
            /*start by removing the "active" class on all items:*/
            removeActive(x);
            if (currentFocus >= x.length) currentFocus = 0;
            if (currentFocus < 0) currentFocus = (x.length - 1);
            /*add class "autocomplete-active":*/
            x[currentFocus].classList.add("autocomplete-active");
        }
 
        function removeActive(x) {
            /*a function to remove the "active" class from all autocomplete items:*/
            for (var i = 0; i < x.length; i++) {
                x[i].classList.remove("autocomplete-active");
            }
        }
 
        function closeAllLists(elmnt) {
            /*close all autocomplete lists in the document,
            except the one passed as an argument:*/
            var x = document.getElementsByClassName("autocomplete-items");
            for (var i = 0; i < x.length; i++) {
                if (elmnt != x[i] && elmnt != inp) {
                    x[i].parentNode.removeChild(x[i]);
                }
            }
        }
        /*execute a function when someone clicks in the document:*/
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
 