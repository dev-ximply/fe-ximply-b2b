<!-- Modal Phone-->
<div class="modal fade" id="phoneModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-md">
            <div class="modal-header">
                <p class="modal-title font-weight-bold text-dark" id="exampleModalLabel">Change Mobile Phone Number</p>
                <button type="button" class="btn-close text-dark text-lg" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="width: 20px">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0)" method="POST" onsubmit="changePhone()">
                    @csrf
                    {{-- <div class="d-flex flex-column">
                    <div class="col-md-12">
                        <input type="text" placeholder="OTP" class="form-control">
                    </div>
                    <div class="col-md-12 text-start mt-2 d-flex">
                        <div class="d-flex">
                           <p class="text-sm">Send OTP :</p>
                           <p class="text-sm">&nbsp;59</p>
                        </div>
                       <a class="text-sm" style="cursor: pointer; color:rgb(88, 88, 255)">
                           <div class="d-flex">
                              <p class="ms-3 text-sm">Send</p>
                           </div>
                       </a>
                    </div>                    
                </div> --}}
                    <div class="d-flex flex-column">
                        <div class="col-md-12">
                            <input type="text" id="change_handphone_new" placeholder="New mobile phone number"
                                class="form-control" step="1.0" autofocus maxlength="13">
                            <p id="result_phone" style="font-size: 10px"></p>
                        </div>
                        <script>
                            new PhoneInput(document.getElementById('change_handphone_new'));
                        </script>
                        <div class="col-md-12 text-end mt-3">
                            <button type="submit" class="btn text-white text-center"
                                style="background:#191a4d">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function changePhone() {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success-cstm mx-2",
                cancelButton: "btn btn-danger-cstm mx-2",
            },
            buttonsStyling: false,
        });

        swalWithBootstrapButtons
            .fire({
                title: "<h5>are you sure change your phone?</h5>",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes",
                cancelButtonText: "No",
                reverseButtons: false,
            })
            .then((result) => {
                if (result.isConfirmed) {

                    var formManageMember = new FormData();

                    formManageMember.append('user_id', user_id);
                    // formManageMember.append('onetime_password', $("#change_email_otp").val());
                    formManageMember.append('new_handphone', $("#change_handphone_new").val());

                    $.ajaxSetup({
                        headers: {
                            "Authorization": "Bearer " + AUTH_TOKEN,
                            "Accept": "application/json"
                        }
                    });

                    $.ajax({
                        url: API_URL + "api/user/handphone/change",
                        type: 'post',
                        data: formManageMember,
                        contentType: false,
                        processData: false,
                        beforeSend: function() {
                            $("#main-loader").show();
                        },
                        success: function(res) {
                            if (res['success'] == true) {
                                swalWithBootstrapButtons.fire(
                                    "congratulation",
                                    "success change your handphone!",
                                    "success"
                                );
                                setTimeout(function() {
                                    window.location.reload(true);
                                }, 1000);
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
                            if (data.status != 200) {
                                Swal.fire(
                                    "something wrong",
                                    "please contact Beazy support!",
                                    "error"
                                );
                            }
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

<script>
    var myInputs = document.getElementById('change_handphone_new');
    // const validatePhone = (phone) => {
    //     return phone.match(
    //         /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    //     );
    // };

    const validates = () => {
        const $resultPhone = $('#result_phone');
        const phone = $('#change_handphone_new').val();
        $resultPhone.text('');
        myInputs.onfocus = function() {
            document.getElementById('result_phone').style.display = "block";
        }
        myInputs.onblur = function() {
            document.getElementById('result_phone').style.display = "none";
        }

        if (phone.length >= 10 && phone.length <= 13) {
            $resultPhone.text(phone + ' is valid :)');
            $resultPhone.css('color', 'white');
            $resultPhone.css('margin', '13px 0');
            $resultPhone.css('background-color', '#62ca50');
            $resultPhone.css('padding', '10px 13px');
            $resultPhone.css('border-radius', '5px');

        } else {
            $resultPhone.text(phone + ' is not valid :(');
            $resultPhone.css('color', 'white');
            $resultPhone.css('margin', '13px 0');
            $resultPhone.css('background-color', '#D42A34');
            $resultPhone.css('padding', '10px 13px');
            $resultPhone.css('border-radius', '5px');



        }
        return false;
    }

    $('#change_handphone_new').on('input', validates);
</script>
