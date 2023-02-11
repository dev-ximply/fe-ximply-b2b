<!-- Modal Email-->
<div class="modal fade" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
<<<<<<< HEAD
        <div class="modal-content modal-md" style="border-radius: 10px !important">
            <div class="modal-header">
                <p class="modal-title font-weight-bold text-dark">Change Email</p>
                <button type="button" class="btn-close text-dark text-lg" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="width: 30px">&times;</span>
=======
        <div class="modal-content modal-md" style="border-radius: 16px !important">
            <div class="modal-header" style="background:#191a4d">
                <p class="modal-title font-weight-bold text-white">Change Email</p>
                <button type="button" class="btn-close text-dark text-lg" data-bs-dismiss="modal" aria-label="Close">
                    {{-- <span aria-hidden="true" style="width: 30px">&times;</span> --}}
>>>>>>> 573a3f5f6b65b0a4f844edc5634624112d65920c
                </button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0)" method="POST" onsubmit="changeEmail()">
                    @csrf
                    <div class="d-flex justify-content-between mb-2">
                        <div>
                            <input type="text" placeholder="OTP" class="form-control text-dark" maxlength="6"
                                id="change_email_otp">
                            <script>
                                new NumberInput(document.getElementById('change_email_otp'));
                            </script>
                        </div>
                        <div>
                            <div class="align-items-center" style="cursor: pointer;" id="otp_handler"><a onclick="sendOtpEmail()"
                                    class="btn text-white d-flex justify-content-center" style="background: #191a4d; display: block; width:105px;">Request&nbsp;OTP</a></div>
                        </div>
                    </div>
                    <div class="d-flex flex-column">
                        <div class="col-md-12">
                            <input type="email" placeholder="Input New email" class="form-control text-dark"
                                id="change_email_new">
                            <p id="result_email" style="font-size: 10px"></p>
                        </div>
                        <div class="col-md-12 text-end mt-3">
                            <button type="submit" class="btn text-white text-center"
                                style="background:#191a4d; width: 105px">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function changeEmail() {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success-cstm mx-2",
                cancelButton: "btn btn-danger-cstm mx-2",
            },
            buttonsStyling: false,
        });

        swalWithBootstrapButtons
            .fire({
                title: "<h5>are you sure change your email?</h5>",
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
                    formManageMember.append('onetime_password', $("#change_email_otp").val());
                    formManageMember.append('new_email', $("#change_email_new").val());

                    $.ajaxSetup({
                        headers: {
                            "Authorization": "Bearer " + AUTH_TOKEN,
                            "Accept": "application/json"
                        }
                    });

                    $.ajax({
                        url: API_URL + "api/user/email/change",
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
                                    "success change your email!",
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

    function sendOtpEmail() {
        sendOTP();
    }

    function sendOTP() {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success-cstm mx-2",
                cancelButton: "btn btn-danger-cstm mx-2",
            },
            buttonsStyling: false,
        });

        var formManageMember = new FormData();

        formManageMember.append('user_id', user_id);

        $.ajaxSetup({
            headers: {
                "Authorization": "Bearer " + AUTH_TOKEN,
                "Accept": "application/json"
            }
        });

        $.ajax({
            url: API_URL + "api/otp/send/email",
            type: 'post',
            data: formManageMember,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $("#main-loader").show();
            },
            success: function(res) {
                if (res['success'] == true) {
                    otpHandler();
                    swalWithBootstrapButtons.fire(
                        "Success!",
                        "success send otp, check your email",
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
                if (data.status != 200) {
                    Swal.fire(
                        "something wrong",
                        "please contact Beazy support!",
                        "error"
                    );
                }
            }
        });
    }

    timeLeft = 61;

    function otpHandler() {
        timeLeft--;
        document.getElementById("otp_handler").innerHTML = String("<div style='margin-top: 7px'>Resend : <span class='fw-bold'>" + timeLeft +
            "</span></div>");
        if (timeLeft > 0) {
            setTimeout(otpHandler, 1000);
        } else {
            document.getElementById("otp_handler").innerHTML = '<a onclick="sendOtpEmail()" class="btn text-white" style="background: #62CA50; display: block; width:105px">Resend&nbsp;OTP</a>';
        }
    };
</script>

<script>
    // check validation email
    var myInput = document.getElementById('change_email_new');
    const validateEmail = (email) => {
        return email.match(
            /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        );
    };

    const validate = () => {
        const $result = $('#result_email');
        const email = $('#change_email_new').val();
        $result.text('');
        myInput.onfocus = function() {
            document.getElementById('result_email').style.display = "block";
        }
        myInput.onblur = function() {
            document.getElementById('result_email').style.display = "none";
        }

        if (validateEmail(email)) {
            $result.text(email + ' is valid :)');
            $result.css('color', 'white');
            $result.css('margin', '13px 0');
            $result.css('background-color', '#62ca50');
            $result.css('padding', '10px 13px');
            $result.css('border-radius', '5px');

        } else {
            $result.text(email + ' is not valid :(');
            $result.css('color', 'white');
            $result.css('margin', '13px 0');
            $result.css('background-color', '#D42A34');
            $result.css('padding', '10px 13px');
            $result.css('border-radius', '5px');



        }
        return false;
    }

    $('#change_email_new').on('input', validate);
</script>
