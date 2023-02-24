@extends('layouts.main')

@section('container')
    <form action="">
        <input type="text" id="user_id" value="{{ Auth::user()['id'] }}" hidden>
    </form>

    <script>
        var user_id = $("#user_id").val();
    </script>
    @include('account-settings.email-settings')
    @include('account-settings.password-settings')
    @include('account-settings.phone-settings')
    <div id="loader" style="display:none; text-align: center; z-index: 5000; position: absolute; width: 100%; top: 40%">
        <img height="100px" src="{{ asset('img/loader.gif') }}">
    </div>
    <div class="row">
        <div class="col-12 d-flex justify-content-end">
            <button onclick="history.back()" class="btn  btn-sm  text-white" style="background-color: #191a4d"
                type="button">back</button>
        </div>

        <div class="col-12">
            <div class="card" style="border-radius: 5px">
                <div class="card-body">
                    <div class="col-12">
                        <span class="text-lg font-weight-bolder text-dark">Account Settings
                            <p class="text-xs text-dark">Your Account Informations</p>
                        </span>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="row justify-content-center">
                                <div class="overflow-hidden d-flex align-items-center justify-content-center mb-2 mt-3"
                                    style="border-radius: 50%; width:156px; height:156px; background:#efefef">
                                    <?php
                                    $logo = $data['tenant']->company_logo ?? '';
                                    ?>

                                    @if ($data['tenant']->company_logo == true)
                                        <img src="{{ config('storage.base_url') . $logo }}" alt="Company Logo"
                                            class=""
                                            style="min-width: 155px !important; min-height:155px !important; border-radius:50%;"
                                            id="ava-pic-2">
                                    @else
                                        <img src="{{ asset('img/team-2.jpg') }}" alt="Company Logo" class=""
                                            style="min-width: 155px !important; min-height:155px !important; border-radius:50%;"
                                            id="ava-pic-2">
                                    @endif
                                    {{-- <img src="{{ config('storage.base_url') . $logo }} " alt="user image" class=""
                                        style="min-width: 155px !important; min-height:155px !important; border-radius:50%"
                                        id="ava-pic-2"> --}}
                                </div>
                                <div class="mx-2 text-center">
                                    <div class="dropdown-item text-dark">
                                        <div class="" id="ava-upload-button-2">
                                            &nbsp;<button class="btn text-white" style="background: #ff720c"
                                                id="ava-pic-2">Change Photo</button>
                                        </div>
                                        <form action="javascript:void(0)" method="POST" enctype="multipart/form-data"
                                            onsubmit="changePhotoProfile()">
                                            <input required name="photo_identity" id="photo_profile_file"
                                                class="ava-file-upload" type="file" accept="image/*" />
                                            <input type="submit" id="submitChangeProfile" hidden>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-10">
                            <div class="row mb-2">
                                <div class="col-md-6 mt-3">
                                    <label for="" class="text-dark text-xs" style="font-weight:600">Company
                                        Name
                                    </label>
                                    <input type="text" class="form-control text-dark text-capitalize"
                                        placeholder="Company Name" id="company_name"
                                        value="{{ $data['tenant']->company_name }}">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="" class="text-dark text-xs" style="font-weight:600">Industrial
                                        Company</label>
                                    <input type="text" class="form-control text-dark text-capitalize"
                                        placeholder="Industrial Company" id="industrial_name"
                                        value="{{ $data['tenant']->industry }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md">
                                            <label for="" class="text-dark text-xs" style="font-weight:600">Address
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md mb-2">
                                        <input type="text" class="form-control bg-white text-dark" placeholder="Address"
                                            value="{{ $data['tenant']->country }}" id="address">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md">
                                            <label for="" class="text-dark text-xs" style="font-weight:600">Contact
                                                Company</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <?php
                                        $contact = $data['tenant']->company_contact ?? '';
                                        ?>
                                        <input type="text" value="{{ $contact }}" id="contact_company"
                                            class="form-control">
                                    </div>
                                </div>

                            </div>
                            <input type="hidden" id="id_user" value="{{ Auth::user()['id'] }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md">
                                            <label for="" class="text-dark text-xs text-capitalize"
                                                style="font-weight:600">First Name</label>
                                        </div>
                                    </div>

                                    <div class="col-md mb-2">
                                        <input type="text" class="form-control bg-white text-dark"
                                            placeholder="Firstname Admin" id="firstname"
                                            value="{{ $data['user']->first_name }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md">
                                            <label for="" class="text-dark text-xs text-capitalize"
                                                style="font-weight:600">Last Name</label>
                                        </div>
                                    </div>

                                    <div class="col-md mb-2">
                                        <input type="text" class="form-control bg-white text-dark"
                                            placeholder="Lastname Admin" id="lastname"
                                            value="{{ $data['user']->last_name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6 mb-2">
                                    <div class="row ">
                                        <div class="col-md">
                                            <label for="" class="text-dark text-xs" style="font-weight:600">Admin
                                                Phone</label>
                                        </div>
                                    </div>
                                    <div class="col-md mb-2">
                                        <input onchange="changeInfoProfile(this.value, 'phone')" type="text"
                                            id="handphone" class="form-control bg-white text-dark"
                                            placeholder="Add your mobile phone number"
                                            value="{{ $data['user']->handphone }}" readonly>
                                        <script>
                                            new PhoneInput(document.getElementById('handphone'));
                                        </script>
                                    </div>

                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md mb-0">
                                    <div class="text-end">
                                        <button type="submit" onclick="changeAccount()" class="btn text-white"
                                            style="background: #62ca50">Save</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md mb-2">
                                    <label for="" class="text-dark text-xs" style="font-weight:600">Role</label>
                                    {{-- <input type="text" class="form-control" value="{{$data['user']->role->define_role_name}}" disabled> --}}
                                    <input type="text" class="form-control"
                                        value="{{ $data['user']->role_name }}"disabled>
                                </div>
                                <div class="col-md mb-2">
                                    <label for="" class="text-dark text-xs" style="font-weight:600">Employee
                                        Id</label>
                                    <input type="text" class="form-control" value="{{ $data['user']->employee_id }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="row">
                                    <div class="col-md">
                                        <label for="" class="text-dark text-xs" style="font-weight:600">Member
                                            Total</label>
                                    </div>
                                </div>
                                <div class="col-md mb-2">
                                    <input type="text" class="form-control " placeholder="Member Total"
                                        value="{{ $data['member']->remainder_user }}" disabled>
                                </div>

                            </div>
                            <div class="row">
                                <div class="row">
                                    <div class="col-md">
                                        <label for="" class="text-dark text-xs"
                                            style="font-weight:600">Email</label>
                                    </div>
                                </div>
                                <div class="col-md-9 mb-2">
                                    <input type="email" class="form-control bg-white text-dark"
                                        placeholder="your email" value="{{ $data['user']->email }}" disabled>
                                </div>
                                <div class="col-md-3">
                                    <button class="btn text-white" style="background: #ff720c; width:100%; min-width:auto"
                                        data-bs-target="#emailModal" data-bs-toggle="modal">Change Email</button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="row">
                                    <div class="col-md">
                                        <label for="" class="text-dark text-xs"
                                            style="font-weight:600">Password</label>
                                    </div>
                                </div>
                                <div class="col-md-9 mb-2">
                                    <input type="password" class="form-control bg-white text-dark" placeholder=""
                                        value="john@email.com" disabled>
                                </div>
                                <div class="col-md-3">
                                    <button class="btn text-white w-100" style="background: #ff720c; font-size:11px"
                                        data-bs-target="#change-password" data-bs-toggle="modal">Change Password</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function changeInfoProfile(value, field) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success-cstm mx-2",
                    cancelButton: "btn btn-danger-cstm mx-2",
                },
                buttonsStyling: false,
            });

            var formChangeProfile = new FormData();

            formChangeProfile.append('user_id', user_id);
            formChangeProfile.append(field, value);

            $.ajaxSetup({
                headers: {
                    "Authorization": "Bearer " + AUTH_TOKEN,
                    "Accept": "application/json"
                }
            });

            $.ajax({
                url: API_URL + "api/user/profile/update",
                type: 'post',
                data: formChangeProfile,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $("#main-loader").show();
                },
                success: function(res) {
                    if (res['success'] == true) {
                        swalWithBootstrapButtons.fire(
                            "Success!",
                            "Your profile updated.",
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
                            "please contact ximply support!",
                            "error"
                        );
                    }
                }
            });
        }

        // for change photo
        $(document).ready(function() {
            var readURL = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $("#ava-pic-2").attr("src", e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            };

            $("#photo_profile_file").on("change", function() {
                readURL(this);
                document.getElementById('submitChangeProfile').click();
            });

            $("#ava-upload-button-2").on("click", function() {
                $("#photo_profile_file").click();
            });
        });

        function changePhotoProfile() {

            let tenant = TENANT_CODE;
            let userId = USR_ID;

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success-cstm mx-2",
                    cancelButton: "btn btn-danger-cstm mx-2",
                },
                buttonsStyling: false,
            });

            var picture_file = $('#photo_profile_file')[0].files;

            // console.log(picture_file);

            if (picture_file.length == 0) {
                swalWithBootstrapButtons.fire('!', 'please choose image', 'error');
            } else {
                var formChangePhotoProfile = new FormData();


                formChangePhotoProfile.append('tenant_code', tenant);
                formChangePhotoProfile.append('user_id', userId);
                formChangePhotoProfile.append('company_logo', picture_file[0]);

                $.ajaxSetup({
                    headers: {
                        "Authorization": "Bearer " + AUTH_TOKEN,
                        "Accept": "application/json"
                    }
                });

                $.ajax({
                    url: API_URL + "api/tenant/info/update",
                    type: 'post',
                    data: formChangePhotoProfile,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        $("#main-loader").show();
                    },
                    success: function(res) {
                        if (res['success'] == true) {
                            swalWithBootstrapButtons.fire(
                                "Success!",
                                "Your logo company success updated.",
                                "success"
                            );
                        } else {
                            swalWithBootstrapButtons.fire(
                                "!",
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
                        if (data.status != 200) {
                            Swal.fire(
                                "something wrong",
                                "please contact ximply support!",
                                "error"
                            );
                        }
                    }
                });
            }
        }

        function changeAccount() {
            const company = document.getElementById('company_name').value;
            const industrial_name = document.getElementById('industrial_name').value;
            const address = document.getElementById('address').value;
            const firstname = document.getElementById('firstname').value;
            const lastname = document.getElementById('lastname').value;
            const contact_company = document.getElementById('contact_company').value;
            const admin_phone = document.getElementById('handphone').value;
            const id_user = document.getElementById('id_user').value;
            const tenant = TENANT_CODE;

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
                }).then((result) => {
                    if (result.isConfirmed) {

                        var formData = new FormData();

                        formData.append('tenant_code', tenant);
                        formData.append('user_id', id_user);
                        formData.append('company_name', company);
                        formData.append('industry', industrial_name);

                        $.ajax({
                            url: API_URL + "api/tenant/info/update",
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
                                return res['success'];
                            },
                            error: function(xhr, status, error) {
                                var errorMessage = xhr.status + ': ' + xhr.statusText;
                                console.log(errorMessage);
                                return errorMessage
                            }

                        });

                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        swalWithBootstrapButtons.fire(
                            "Cancelled",
                            "Your request cancelled :)",
                            "error"
                        );
                    }
                })
                .then((res) => {
                    console.log(id_user);
                    var formDataProfile = new FormData();

                    formDataProfile.append('user_id', id_user);
                    formDataProfile.append('first_name', firstname);
                    formDataProfile.append('last_name', lastname);

                    $.ajax({
                        url: API_URL + "api/user/profile/update",
                        type: 'post',
                        data: formDataProfile,
                        contentType: false,
                        processData: false,
                        success: function(res) {
                            if (res['success'] == "true" || res['success'] == true) {
                                swalWithBootstrapButtons.fire(
                                    "Success!",
                                    "Your request success.",
                                    "success"
                                );

                                if ($("#loader")) {
                                    $("#loader").hide();
                                }

                                setTimeout(function() {
                                    location.reload();
                                }, 1000);
                            } else {
                                swalWithBootstrapButtons.fire(
                                    "Error!",
                                    "Your request Failed",
                                    "error"
                                );
                            }
                        },
                        error: function(xhr, status, error) {
                            var errorMessage = xhr.status + ': ' + xhr.statusText;
                            console.log(errorMessage);
                            return errorMessage
                        }
                    });
                });
            // .then((rest) => {
            //     var formDatahandphone = new FormData();

            //     formDatahandphone.append('user_id', id_user);
            //     formDatahandphone.append('new_handphone', admin_phone);

            //     $.ajax({
            //             url: API_URL + "api/user/handphone/change",
            //             type: 'post',
            //             data: formDatahandphone,
            //             contentType: false,
            //             processData: false,
            //             success: function(res) {
            //                 if (res['success'] == "true" || res['success'] == true) {
            //                     swalWithBootstrapButtons.fire(
            //                         "Success!",
            //                         "Your request success.",
            //                         "success"
            //                     );


            //                     setTimeout(function() {
            //                         location.reload();
            //                     }, 1500);
            //                 } else {
            //                     swalWithBootstrapButtons.fire(
            //                         "Error!",
            //                         "Your request Failed",
            //                         "error"
            //                     );
            //                 }
            //             },
            //             error: function(xhr, status, error) {
            //                     var errorMessage = xhr.status + ': ' + xhr.statusText;
            //                     console.log(errorMessage);
            //                     return errorMessage
            //              }
            //         });
            // })
        }
    </script>
@endsection
