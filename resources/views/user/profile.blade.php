@extends('layouts.main')

@section('container')
    <form action="">
        <input type="text" id="user_id" value="{{ Auth::user()['id'] }}" hidden>
    </form>

    <script>
        var user_id = $("#user_id").val();
    </script>

    @include('account.password-modal')
    @include('account.email-modal')
    @include('account.phone-modal')

    <div class="row">
        <div class="col-12 d-flex justify-content-end">
            <button onclick="history.back()" class="btn  btn-sm  text-white" style="background-color: #191a4d"
                type="button">back</button>
        </div>

        <div class="col-12">
            <div class="card" style="border-radius: 5px">
                <div class="card-body">
                    <div class="col-12">
                        <span class="text-lg font-weight-bolder text-dark">Profile
                            <p class="text-xs text-dark">Your Account Informations</p>
                        </span>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="row justify-content-center">
                                <div class="bg-secondary overflow-hidden d-flex align-items-center justify-content-center mb-2 mt-3"
                                    style="border-radius: 50%; width:156px; height:156px">
                                    <img 
                                    src="{{ config('storage.base_url') . $data['profile']->profile_picture }}"
                                        alt="user image" class=""
                                        style="min-width: 155px !important; min-height:155px !important; border-radius:50%"
                                        id="ava-pic-2">
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
                                    <label for="" class="text-dark text-xs" style="font-weight:600">First
                                        Name</label>
                                    <input onchange="changeInfoProfile(this.value, 'first_name')" type="text"
                                        class="form-control text-dark text-capitalize" placeholder="First Name"
                                        value="{{ $data['profile']->first_name }}">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="" class="text-dark text-xs" style="font-weight:600">Last
                                        Name</label>
                                    <input onchange="changeInfoProfile(this.value, 'last_name')" type="text"
                                        class="form-control text-dark text-capitalize" placeholder="Last Name"
                                        value="{{ $data['profile']->last_name }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md">
                                            <label for="" class="text-dark text-xs" style="font-weight:600">Birthday
                                                Date</label>
                                        </div>
                                    </div>
                                    <div class="col-md mb-2">
                                        <input onchange="changeInfoProfile(this.value, 'birthday_date')" type="date"
                                            onfocus="(this.type='date')" class="form-control bg-white text-dark"
                                            placeholder="add your birthday date"
                                            value="{{ $data['profile']->birthday_date }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md">
                                            <label for="" class="text-dark text-xs text-capitalize"
                                                style="font-weight:600">Birthday Place</label>
                                        </div>
                                    </div>
                                    <div class="col-md mb-2">
                                        <input onchange="changeInfoProfile(this.value, 'birthday_place')" type="text"
                                            class="form-control bg-white text-dark" placeholder="add your birthday place"
                                            value="{{ $data['profile']->birthday_place }}">
                                    </div>
                                </div>

                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md">
                                            <label for="" class="text-dark text-xs"
                                                style="font-weight:600">Gender</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <select onchange="changeInfoProfile(this.value, 'gender')" class="form-select">
                                            @if ($data['profile']->gender == 'nan')
                                                ? <option value='' selected>Choose</option> :
                                            @endif
                                            <option value="m" @if ($data['profile']->gender == 'm') ? selected : @endif>
                                                Male
                                            </option>
                                            <option value="f" @if ($data['profile']->gender == 'f') ? selected : @endif>
                                                Female
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row ">
                                        <div class="col-md">
                                            <label for="" class="text-dark text-xs"
                                                style="font-weight:600">Phone</label>
                                        </div>
                                    </div>
                                    <div class="col-md mb-2">
                                        <input onchange="changeInfoProfile(this.value, 'phone')" type="text"
                                            id="handphone" class="form-control bg-white text-dark"
                                            placeholder="Add your mobile phone number"
                                            value="{{ $data['profile']->handphone }}" readonly>
                                        <script>
                                            new PhoneInput(document.getElementById('handphone'));
                                        </script>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="text-end">
                                    <button class="btn text-white" style="background: #62ca50">Save</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md mb-2">
                                    <label for="" class="text-dark text-xs" style="font-weight:600">Group</label>
                                    <input type="text" class="form-control"
                                        value="{{ $data['profile_role'][0]->group_name }}" disabled>
                                </div>
                                <div class="col-md mb-2">
                                    <label for="" class="text-dark text-xs" style="font-weight:600">Employee
                                        Id</label>
                                    <input type="text" class="form-control" disabled>
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
                                        placeholder="your email" value="{{ $data['profile']->email }}" readonly>
                                </div>
                                <div class="col-md-3">
                                    <button class="btn text-white" style="background: #ff720c; width:100%; min-width:auto"
                                        data-bs-target="#emailModal" data-bs-toggle="modal">Change Email</button>
                                </div>
                            </div>

                            {{-- <div class="row ">
                                <div class="row ">
                                    <div class="col-md">
                                        <label for="" class="text-dark text-xs"
                                            style="font-weight:600">Phone</label>
                                    </div>
                                </div>
                                <div class="col-md-9 mb-2">
                                    <input onchange="changeInfoProfile(this.value, 'phone')" type="text"
                                        id="handphone" class="form-control bg-white text-dark"
                                        placeholder="Add your mobile phone number"
                                        value="{{ $data['profile']->handphone }}" readonly>
                                    <script>
                                        new PhoneInput(document.getElementById('handphone'));
                                    </script>
                                </div>
                                <div class="col-md-3">
                                    <button class="btn text-white" style="background: #ff720c; width:100%;min-width:auto"
                                        data-bs-target="#phoneModal" data-bs-toggle="modal">Change Phone</button>
                                </div>
                            </div> --}}
                            <div class="row">
                                <div class="row">
                                    <div class="col-md">
                                        <label for="" class="text-dark text-xs"
                                            style="font-weight:600">Password</label>
                                    </div>
                                </div>
                                <div class="col-md-9 mb-2">
                                    <input type="password" class="form-control bg-white text-dark" placeholder=""
                                        value="john@email.com" readonly>
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

                formChangePhotoProfile.append('user_id', user_id);
                formChangePhotoProfile.append('profile_picture', picture_file[0]);

                $.ajaxSetup({
                    headers: {
                        "Authorization": "Bearer " + AUTH_TOKEN,
                        "Accept": "application/json"
                    }
                });

                $.ajax({
                    url: API_URL + "api/user/profile/update-profile-picture",
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
                                "success!",
                                "Your profile updated.",
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
    </script>
@endsection
