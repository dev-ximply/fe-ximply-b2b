{{-- <style>
    * {
        box-sizing: border-box;
    }

    .img-zoom-container {
        position: relative;
    }

    .img-zoom-lens {
        position: absolute;
        border: 1px solid #d4d4d4;
        /*set the size of the lens:*/
        width: 40px;
        height: 40px;
    }

    .img-zoom-result {
        border: 1px solid #d4d4d4;
        position: absolute;
        top: 0;
        left: -500px;
        width: 300px;
        height: 300px;
        z-index: 1070;
    }
</style>

<script>
    function imageZoom(imgID, resultID) {
      var img, lens, result, cx, cy;
      img = document.getElementById(imgID);
      result = document.getElementById(resultID);
      /*create lens:*/
      lens = document.createElement("DIV");
      lens.setAttribute("class", "img-zoom-lens");
      /*insert lens:*/
      img.parentElement.insertBefore(lens, img);
      /*calculate the ratio between result DIV and lens:*/
      cx = result.offsetWidth / lens.offsetWidth;
      cy = result.offsetHeight / lens.offsetHeight;
      /*set background properties for the result DIV:*/
      result.style.backgroundImage = "url('" + img.src + "')";
      result.style.backgroundSize = (img.width * cx) + "px " + (img.height * cy) + "px";
      /*execute a function when someone moves the cursor over the image, or the lens:*/
      lens.addEventListener("mousemove", moveLens);
      img.addEventListener("mousemove", moveLens);
      /*and also for touch screens:*/
      lens.addEventListener("touchmove", moveLens);
      img.addEventListener("touchmove", moveLens);
      function moveLens(e) {
        var pos, x, y;
        /*prevent any other actions that may occur when moving over the image:*/
        e.preventDefault();
        /*get the cursor's x and y positions:*/
        pos = getCursorPos(e);
        /*calculate the position of the lens:*/
        x = pos.x - (lens.offsetWidth / 2);
        y = pos.y - (lens.offsetHeight / 2);
        /*prevent the lens from being positioned outside the image:*/
        if (x > img.width - lens.offsetWidth) {x = img.width - lens.offsetWidth;}
        if (x < 0) {x = 0;}
        if (y > img.height - lens.offsetHeight) {y = img.height - lens.offsetHeight;}
        if (y < 0) {y = 0;}
        /*set the position of the lens:*/
        lens.style.left = x + "px";
        lens.style.top = y + "px";
        /*display what the lens "sees":*/
        result.style.backgroundPosition = "-" + (x * cx) + "px -" + (y * cy) + "px";
      }
      function getCursorPos(e) {
        var a, x = 0, y = 0;
        e = e || window.event;
        /*get the x and y positions of the image:*/
        a = img.getBoundingClientRect();
        /*calculate the cursor's x and y coordinates, relative to the image:*/
        x = e.pageX - a.left;
        y = e.pageY - a.top;
        /*consider any page scrolling:*/
        x = x - window.pageXOffset;
        y = y - window.pageYOffset;
        return {x : x, y : y};
      }
    }
    </script> --}}


    <div class="modal " data-bs-backdrop="true" id="myModals" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" style="z-index:1060;" data-bs-backdrop="false">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content" style="border-top: 5px solid #19194b; border-radius:5px">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel" style="color: black">Expenses Detail</h6>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="nav-wrapper position-relative end-0">
                            <ul class="nav nav-pills nav-fill p-1" role="tablist">
                                <li class="nav-item tablinks" onclick="openTab(event,'tab1')">
                                    <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab"
                                        href="#profile-tabs-icons" role="tab" aria-controls="preview"
                                        aria-selected="true" style="font-size:12px;">
                                        <i class="ni ni-money-coins  me-2" style="color:black; font-size: 0.8em"></i> Receipt
                                    </a>
                                </li>
                                <li class="nav-item tablinks" onclick="openTab(event,'tab2')">
                                    <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#dashboard-tabs-icons"
                                        role="tab" aria-controls="code" aria-selected="false"
                                        style="font-size:12px">
                                        <i class="ni ni-badge  me-2" style="color:black;font-size: 0.8em"></i> Additional Photo
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div id="tab1" class="tabcontent row " style="display: block">
                            <div id="ava-upload-button-1 "
                                class="ava-circle ava-upload-button border my-3 d-flex align-items-center justify-content-center"
                                style="vertical-align: middle; height: 300px;width:280px">
                                {{-- <img id="receiptImage" class="ava-pic" src="" width="50px"> --}}
                                <div id="img-zoom">
                                    <img id="receiptImage" class="ava-pic" src=""
                                        width="50px">
                                    {{-- <div id="myresult" class="img-zoom-result"></div> --}}
                                </div>
                            </div>
                        </div>
                        <div id="tab2" class="tabcontent accordion-1">
                            <div id="ava-upload-button-1"
                                class="ava-circle ava-upload-button border my-3 d-flex align-items-center justify-content-center"
                                style="vertical-align: middle; height: 300px;width:280px">
                                <img id="additionalImage" class="ava-pic" src="{{ asset('img/marie.jpg') }}"
                                    width="50px">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 mt-5">
                        <table style="font-size: 0.8em" width="100%">
                            <thead>
                                <th width="35%"></th>
                                <th></th>
                                <th></th>
                            </thead>
                            <tr>
                                <td style="vertical-align:top ;color:black;" class="text-bold">Time</td>
                                <td style="vertical-align:top ;color:black;">:</td>
                                <td style="vertical-align:top ;color:black;" id="dataTime"> - </td>
                            </tr>
                            <tr>
                                <td style="vertical-align:top ;color:black;" class="text-bold">Date</td>
                                <td style="vertical-align:top ;color:black;">:</td>
                                <td style="vertical-align:top ;color:black;" id="dataDate"> - </td>
                            </tr>
                            <tr>
                                <td style="vertical-align:top ;color:black;" class="text-bold">Merchant</td>
                                <td style="vertical-align:top ;color:black;">:</td>
                                <td style="vertical-align:top ;color:black;" id="dataMerchant"> - </td>
                            </tr>
                            <tr>
                                <td style="vertical-align:top ;color:black;" class="text-bold">Total Amount</td>
                                <td style="vertical-align:top ;color:black;">:</td>
                                <td style="vertical-align:top ;color:black;">Rp <span id="dataAmount"> - </span></td>
                            </tr>
                            <tr>
                                <td style="vertical-align:top ;color:black;" class="text-bold">Location</td>
                                <td style="vertical-align:top ;color:black;">:</td>
                                <td style="vertical-align:top ;color:black;" id="dataLocation"> - </td>
                            </tr>
                            <tr>
                                <td style="vertical-align:top ;color:black;" class="text-bold">Expenses Type</td>
                                <td style="vertical-align:top ;color:black;">:</td>
                                <td style="vertical-align:top ;color:black;" id="dataExpenseType"> - </td>
                            </tr>
                            <tr>
                                <td style="vertical-align:top ;color:black;" class="text-bold">Category</td>
                                <td style="vertical-align:top ;color:black;">:</td>
                                <td style="vertical-align:top ;color:black;" id="dataCategory"> - </td>
                            </tr>
                            <tr>
                                <td style="vertical-align:top ;color:black;" class="text-bold">Client</td>
                                <td style="vertical-align:top ;color:black;">:</td>
                                <td style="vertical-align:top ;color:black;" id="dataClient"> - </td>
                            </tr>
                            <tr>
                                <td style="vertical-align:top ;color:black;" class="text-bold">Purpose</td>
                                <td style="vertical-align:top ;color:black;">:</td>
                                <td style="vertical-align:top ;color:black;" id="dataPurpose"> - </td>
                            </tr>
                            <tr>
                                <td style="vertical-align:top ;color:black;" class="text-bold">Expenses of</td>
                                <td style="vertical-align:top ;color:black;">:</td>
                                <td style="vertical-align:top ;color:black;" id="dataExpenseOf"> - </td>
                            </tr>

                        </table>
                    </div>

                </div>
            </div>
            <div class="modal-footer" id="decisionButton">
                <button onclick="approvalDecision({{ Auth::user()['id'] }}, expenseId, 1)" type="button"
                    class="btn text-white" style="width: 140px; background-color:#62ca50">
                    <i class="fas fa-circle-check text-white text-lg me-1"></i>
                    Approve
                </button>
                <button onclick="approvalDecision({{ Auth::user()['id'] }}, expenseId, 0)" type="button"
                    class="btn text-white" style="width: 140px; background-color: #E40909">
                    <i class="fas fa-circle-xmark text-white text-lg me-1"></i>
                    Reject
            </div>
        </div>
    </div>
</div>


{{-- <script>
     imageZoom("receiptImage", "myresult");
</script> --}}

<script>
    var options1 = {
        width: 400,
        zoomWidth: 500,
        offset: {
            vertical: 0,
            horizontal: 10
        }
    };

    // If the width and height of the image are not known or to adjust the image to the container of it
    var options2 = {
        fillContainer: true,
        offset: {
            vertical: 0,
            horizontal: 10
        }
    };

    new ImageZoom(document.getElementById("img-zoom"), options2);
</script>

<script>
    // const modal = document.querySelector("#myModals");
    // const body = document.querySelector("body");

    // const showModal = function(e) {
    //     modal.classList.toggle("hidden");

    //     if (!modal.classList.contains("hidden")) {
    //         // Disable scroll
    //         body.style.overflow = "hidden";
    //     } else {
    //         // Enable scroll
    //         body.style.overflow = "auto";
    //     }
    // };

    // if (document.getElementById("myModals")) {

    //     var img = document.getElementById("receiptImage");
    //     var modalImg = document.getElementById("img01");
    //     var captionText = document.getElementById("caption");
    //     img.onclick = function() {
    //         document.getElementById("myModal").style.display = "block";
    //         document.getElementById("myModal").style.zIndex = "1070";
    //         modalImg.src = this.src;
    //         captionText.innerHTML = this.alt;
    //     }

    //     // Get the <span> element that closes the modal
    //     var span = document.getElementsByClassName("close")[0];

    //     // When the user clicks on <span> (x), close the modal
    //     span.onclick = function() {
    //         document.getElementById("myModal").style.display = "none";
    //     }

    // }



    // Initiate zoom effect:



    // When the user clicks the button, open the modal 
    btn.onclick = function() {
        modal.style.display = "block";
        document.body.style.overflow = "hidden"; // ADD THIS LINE
        document.body.style.height = "100%"; // ADD THIS LINE
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
        document.body.style.overflow = "auto"; // ADD THIS LINE
        document.body.style.height = "auto"; // ADD THIS LINE
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
            document.body.style.overflow = "auto"; // ADD THIS LINE
            document.body.style.height = "auto"; // ADD THIS LINE
        }
    }
</script>
