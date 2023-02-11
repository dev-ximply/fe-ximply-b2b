<style>
    #password-strength-status {
        padding: 5px 10px;
        color: #ffffff;
        border-radius: 4px;
        margin-top: -10px;
        margin-bottom: 10px;
        font-size: 10px;
    }

    .medium-password {
        background-color: #ff720c;
        border: #ff720c 1px solid;
    }

    .weak-password {
        background-color: #D42A34;
        border: #D42A34 1px solid;
        margin-bottom: 10px;
    }

    .strong-password {
        background-color: #62ca50;
        border: #62ca50 1px solid;
        margin-bottom: 10px;

    }
</style>
<div class="modal fade" id="change-password" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
<<<<<<< HEAD
        <div class="modal-content" style="border-radius: 5px">
            <div class="modal-header">
                <h6 class="modal-title fs-6 ms-3 text-dark">Change Password</h6>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
=======
        <div class="modal-content" style="border-radius: 16px">
            <div class="modal-header" style="background: #191a4d">
                <h6 class="modal-title fs-6 ms-3 text-white">Change Password</h6>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    {{-- <i class="fa-solid fa-xmark"></i> --}}
>>>>>>> 573a3f5f6b65b0a4f844edc5634624112d65920c
                </button>
            </div>
            <form action="javascript:void(0)" method="POST" onsubmit="changePassword()">
                <div class="modal-body">
                    <div class="card-body p-3">
                        <label class="form-label text-dark" style="font-weight: 600">Current password</label>
                        <div class="form-group input-group">
                            <input class="form-control" type="password" id="current_password"
                                placeholder="Current password"
                                style="border-top-right-radius:0 !important;border-bottom-right-radius:0 !important"
                                required>
                            <span class="input-group-text position-relative bg-gray"
                                style="border-left: 1px solid rgb(228, 228, 228)" onclick="password_show_hide();">
                                <i class="fas fa-eye" style="font-size: 11px" id="show_eye"></i>
                                <i class="fas fa-eye-slash d-none " id="hide_eye" style="font-size: 11px"></i>
                            </span>
                        </div>
                        <label class="form-label text-dark" style="font-weight: 600">New password</label>
                        <div class="form-group input-group">
                            <input class="form-control" type="password" id="new_password" placeholder="New password"
                                style="border-top-right-radius:0 !important;border-bottom-right-radius:0 !important"
                                required>
                            <span class="input-group-text position-relative bg-gray"
                                style="border-left: 1px solid rgb(228, 228, 228)" onclick="new_password_show_hide();">
                                <i class="fas fa-eye" style="font-size: 11px" id="new_show_eye"></i>
                                <i class="fas fa-eye-slash d-none " id="new_hide_eye" style="font-size: 11px"></i>
                            </span>
                        </div>
                        <div id="password-strength-status"></div>
                        <label class="form-label text-dark" style="font-weight: 600">Confirm new password</label>
                        <div class="form-group input-group">
                            <input class="form-control" type="password" id="confirm_new_password"
                                placeholder="Confirm password"
                                style="border-top-right-radius:0 !important;border-bottom-right-radius:0 !important"
                                required>
                            <span class="input-group-text position-relative bg-gray"
                                style="border-left: 1px solid rgb(228, 228, 228)"
                                onclick="confirm_new_password_show_hide();">
                                <i class="fas fa-eye" style="font-size: 11px" id="confirm_show_eye"></i>
                                <i class="fas fa-eye-slash d-none " id="confirm_hide_eye" style="font-size: 11px"></i>
                            </span>
                        </div>
                        <button class="btn  w-100 mb-0 text-white" style="background-color: #191a4d">Update
                            password</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function changePassword() {
        var current_password = $("#current_password").val();
        var new_password = $("#new_password").val();
        var confirm_new_password = $("#confirm_new_password").val();

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

                    var formChangePass = new FormData();

                    formChangePass.append('user_id', user_id);
                    formChangePass.append('current_password', current_password);
                    formChangePass.append('password', new_password);
                    formChangePass.append('password_confirmation', confirm_new_password);

                    $.ajaxSetup({
                        headers: {
                            "Authorization": "Bearer " + AUTH_TOKEN,
                            "Accept": "application/json"
                        }
                    });

                    $.ajax({
                        url: API_URL + "api/user/password/change",
                        type: 'post',
                        data: formChangePass,
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

<!-- Jquery Password-->
<script>
    var inputPassword = document.getElementById('new_password');
    $(document).ready(function() {
        $("#new_password").on('keyup', function() {
            var number = /([0-9])/;
            var alphabets = /([a-zA-Z])/;
            var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
            if ($('#new_password').val().length < 6) {
                $('#password-strength-status').removeClass();
                $('#password-strength-status').addClass('weak-password');
                $('#password-strength-status').html("Weak (should be at least 8 characters, one capital letter, and one number.)");
                inputPassword.onfocus = function() {
                    document.getElementById('password-strength-status').style.display = "block";
                }
                inputPassword.onblur = function() {
                    document.getElementById('password-strength-status').style.display = "none";
                }

            } else {
                if ($('#new_password').val().match(number) && $('#new_password').val().match(
                        alphabets) && $(
                        '#new_password').val().match(special_characters)) {
                    $('#password-strength-status').removeClass();
                    $('#password-strength-status').addClass('strong-password');
                    $('#password-strength-status').html("Strong");
                } else {
                    $('#password-strength-status').removeClass();
                    $('#password-strength-status').addClass('medium-password');
                    $('#password-strength-status').html(
                        "Medium (should include alphabets, numbers and special characters or some combination.)"
                    );
                }
            }
        });
    });
</script>

<script>
    function password_show_hide() {
        var x = document.getElementById("current_password");
        var show_eye = document.getElementById("show_eye");
        var hide_eye = document.getElementById("hide_eye");
        hide_eye.classList.remove("d-none");
        if (x.type === "password") {
            x.type = "text";
            show_eye.style.display = "none";
            hide_eye.style.display = "block";
        } else {
            x.type = "password";
            show_eye.style.display = "block";
            hide_eye.style.display = "none";
        }
    }

    function new_password_show_hide() {
        var x = document.getElementById("new_password");
        var show_eye = document.getElementById("new_show_eye");
        var hide_eye = document.getElementById("new_hide_eye");
        hide_eye.classList.remove("d-none");
        if (x.type === "password") {
            x.type = "text";
            show_eye.style.display = "none";
            hide_eye.style.display = "block";
        } else {
            x.type = "password";
            show_eye.style.display = "block";
            hide_eye.style.display = "none";
        }
    }

    function confirm_new_password_show_hide() {
        var x = document.getElementById("confirm_new_password");
        var show_eye = document.getElementById("confirm_show_eye");
        var hide_eye = document.getElementById("confirm_hide_eye");
        hide_eye.classList.remove("d-none");
        if (x.type === "password") {
            x.type = "text";
            show_eye.style.display = "none";
            hide_eye.style.display = "block";
        } else {
            x.type = "password";
            show_eye.style.display = "block";
            hide_eye.style.display = "none";
        }
    }
</script>
