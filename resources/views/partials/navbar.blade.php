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
        background-color: #b7d60a;
        border: #bbb418 1px solid;
    }

    .weak-password {
        background-color: #ce1d14;
        border: #aa4502 1px solid;
        margin-bottom: 10px;
    }

    .strong-password {
        background-color: #12cc1a;
        border: #0fa015 1px solid;
        margin-bottom: 10px;
    }

    .input-groups {
        display: flex;
        align-items: center;
        width: 100%;
        position: relative;
    }

    .eye {
        position: absolute;
        right: 25px;
        z-index: 1;
        cursor: pointer;
    }

    <style>h1 {
        font-family: helvetica;
        text-align: center;
    }

    .pin-code {
        padding: 0;
        margin: 0 auto;
        display: flex;
        justify-content: center;

    }

    .pin-code input {
        border: none;
        text-align: center;
        width: 48px;
        height: 48px;
        font-size: 25px;
        background-color: #F3F3F3;
        margin-right: 5px;
    }

    .pin-code input:focus {
        border: 1px solid #573D8B;
        outline: none;
    }

    .check-pin-code {
        padding: 0;
        margin: 0 auto;
        display: flex;
        justify-content: center;

    }

    .check-pin-code input {
        border: none;
        text-align: center;
        width: 48px;
        height: 48px;
        font-size: 25px;
        background-color: #F3F3F3;
        margin-right: 5px;
    }

    .check-pin-code input:focus {
        border: 1px solid #573D8B;
        outline: none;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>
<nav class="navbar navbar-main navbar-expand-lg position-sticky mt-3 top-1 px-0 shadow-none border-radius-xl"
    id="navbarBlur" data-scroll="true" style="z-index: 1;">
    <form action="">
        <input type="text" class="text-dark" id="navbar_uid" value="{{ Auth::user()['id'] }}" hidden>
    </form>
    <div class="container-fluid py-1 ">
        <nav aria-label="breadcrumb">
            <div class="sidenav-toggler sidenav-toggler-inner d-xl-block d-none">
                <a href="javascript:;" class="nav-link text-body p-0">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </a>
            </div>
            <div class="d-xl-none d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </a>
            </div>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <ul class="navbar-nav justify-content-center me-auto">
                <li class="nav-item ms-4">
                    <div class="d-sm-inline d-none text-lg font-weight-normal" style="color: black">
                        <span id="navbar_fullname" class="text-capitalize" style="font-size: 16px"></span>
                    </div>
                    <div>
                        <span id="navbar_group_Name" class="text-capitalize"
                            style="font-weight:500;font-size:13px"></span>
                    </div>
                </li>
            </ul>
            <div id="show_hide_subs" style="display: none">
                <div class="d-md-block d-none ">
                    <button class="btn"
                        style="padding: 5px 10px 5px 10px; border: 1px solid #ff720c; margin-top:6px;"
                        onclick="location.href = 'payment/subscription'"><span
                            style="color: black">Upgrade&nbsp;Pro</span></button>
                </div>
                <div class="d-md-none d-block position-absolute">
                    <button class="btn"
                        style="padding: 5px 10px 5px 10px; border: 1px solid #ff720c; margin-right:160px; margin-top:-16px; top:0;right:0"
                        onclick="location.href = 'payment/subscription'"><span
                            style="color: black">Upgrade&nbsp;Pro</span></button>
                </div>
            </div>
            <ul class="navbar-nav justify-content-end">
                <style>
                    .notif-badge {
                        font-size: 10px;
                        position: absolute;
                        padding: 1px 6px;
                        top: -8px;
                        right: -3px;
                        border-radius: 50%;
                        background: red;
                        color: white;
                    }

                    @media only screen and (max-width:768px) {
                        .notif-badge {
                            font-size: 10px;
                            position: absolute;
                            padding: 1px 6px;
                            top: -8px;
                            right: 53px;
                            border-radius: 50%;
                            background: red;
                            color: white;
                        }
                    }
                </style>
                <li class="nav-item dropdown pe-2 d-flex align-items-center ms-2">
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                        <li class="mb-2">
                            <a class="dropdown-item border-radius-md" href="javascript:;">
                                <div class="d-flex py-1">
                                    <div class="my-auto">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a class="dropdown-item border-radius-md" href="javascript:;">
                                <div class="d-flex py-1">
                                    <div class="my-auto">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown d-flex align-items-center">
                    @if (session()->get('is_superadmin') == true)
                        <a href="javascript:;" class="nav-link text-body p-0 d-flex flex-row mb-2 ms-2"
                            id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            &nbsp;
                            <img id="navbar_profilepict_admin" src="{{ asset('img/team-2.jpg') }}" alt=""
                                class="img-fluid"
                                style="width: 2em; height: 2em; border-radius:50%; border: 1px solid grey">
                        </a>
                    @else
                        <a href="javascript:;" class="nav-link text-body p-0 d-flex flex-row mb-2 ms-2"
                            id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            &nbsp;
                            <img id="navbar_profilepict" src="{{ asset('img/team-2.jpg') }}" alt=""
                                class="img-fluid"
                                style="width: 2em; height: 2em; border-radius:50%; border: 1px solid grey">
                        </a>
                    @endif
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                        @if (session()->get('is_superadmin') == false)
                            <li class="mb-0">
                                <a class="dropdown-item border-radius-md" href="/profile">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="text-sm font-weight-normal mb-1">
                                            <span class="font-weight-bold"><i
                                                    class="fa-solid fa-user me-sm-1"></i></i></span><span
                                                class="font-weight-bold">Profile</span>
                                        </h6>
                                    </div>
                                </a>
                            </li>
                        @else
                            <li class="mb-0">
                                <a class="dropdown-item border-radius-md" href="/tenant">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="text-sm font-weight-normal mb-1">
                                            <span class="font-weight-bold"><i
                                                    class="fa-solid fa-user me-sm-1"></i></i></span><span
                                                class="font-weight-bold"> Corporate Info</span>
                                        </h6>
                                    </div>
                                </a>
                            </li>
                        @endif
                        <li class="mb-0">
                            <a class="dropdown-item border-radius-md" href="{{ route('logout_action') }}"
                                onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="text-sm font-weight-normal mb-1">
                                        <span class="font-weight-bold"><i
                                                class="fa-solid fa-right-from-bracket me-sm-1"></i></span><span
                                            class="font-weight-bold"> Logout</span>
                                    </h6>
                                </div>
                            </a>
                            <form id="logout-form" action="{{ route('logout_action') }}" method="POST"
                                class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
                <li class="nav-item ms-3 no position-relative" style="margin-top: 4px">
                    <a href="/activity" class="nav-link text-body p-0 ">
                        <i class="fa-solid fa-clock-rotate-left fa-xl" data-bs-toggle="tooltip"
                            data-bs-title="Latest Activity"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
{{-- Modal New Password --}}
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width: 400px">
        <div class="modal-content" style="border-radius:5px">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel" style="color: black;font-weight:600">Set New
                    Password</h1>
            </div>
            <div id="loader_nav"
                style="display:none; text-align: center; z-index: 5000; position: absolute; width: 100%; top: 40%">
                <img height="100px" src="{{ asset('img/loader.gif') }}">
            </div>
            <form id="your-modal-form">
                <input type="text" name="user_id" value="{{ Auth::user()['id'] }}" hidden>
                <div class="modal-body">
                    <div id="alertModal"></div>
                    <div class="row">
                        <label for="" style="color: black">Current Password</label>
                        <div class="input-groups mb-3">
                            <input type="password" class="form-control form-control-lg" id="curent_password"
                                placeholder="Password" aria-label="Password" aria-label="Password"
                                name="current_password">
                            <span class="eye" onclick="password_show_current_hide_modal();">
                                <i class="fas fa-eye" style="font-size: 11px" id="show_eye_current"></i>
                                <i class="fas fa-eye-slash d-none " id="hide_eye_new" style="font-size: 11px"></i>
                            </span>
                        </div>
                        <label for="" style="color: black">New Password</label>
                        <div class="input-groups mb-3">
                            <input type="password" class="form-control form-control-lg" id="password_new"
                                placeholder="Password" aria-label="Password" aria-label="Password" name="password"
                                autocomplete="password" required>
                            <span class="eye" onclick="password_show_hide_modal();">
                                <i class="fas fa-eye" style="font-size: 11px" id="show_eye_new"></i>
                            </span>
                        </div>
                        <div class="" style="padding: 0 10px">
                            <div id="password-strength-status"></div>
                        </div>
                        <label for="" style="color: black">Confirm New Password</label>
                        <div class="input-groups mb-3">
                            <input type="password" class="form-control form-control-lg" id="confirm_password"
                                placeholder="Password" aria-label="Password" aria-label="Password"
                                name="password_confirmation" autocomplete="password" required>
                            <span class="eye" onclick="confirm_password_show_hide_modal();">
                                <i class="fas fa-eye" style="font-size: 11px" id="confirm_show_eye_new"></i>
                            </span>
                        </div>
                    </div>
                    <script>
                        function toggleEye(idInput, idEye) {
                            var x = document.getElementById(idInput);
                            var show_eye = document.getElementById(idEye);
                            show_eye.classList.toggle('fa-eye-slash')
                            show_eye.classList.toggle('fa-eye')
                            if (show_eye.classList.contains("fa-eye-slash")) return x.setAttribute("type", "text")
                            x.setAttribute("type", "password")
                        }

                        function password_show_current_hide_modal() {
                            toggleEye("curent_password", "show_eye_current");
                        }

                        function password_show_hide_modal() {
                            toggleEye("password_new", "show_eye_new");
                        }

                        function confirm_password_show_hide_modal() {
                            toggleEye("confirm_password", "confirm_show_eye_new");
                        }
                        $("#password_new").on('keyup', function() {
                            var number = /([0-9])/;
                            var alphabets = /([a-zA-Z])/;
                            var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
                            if ($('#password_new').val().length < 6) {
                                $('#password-strength-status').removeClass();
                                $('#password-strength-status').addClass('weak-password');
                                $('#password-strength-status').html("Weak (should be atleast 6 characters.)");
                            } else {
                                if ($('#password_new').val().match(number) && $('#password_new').val().match(
                                        alphabets) && $(
                                        '#password_new').val().match(special_characters)) {
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
                    </script>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" class="btn text-white w-100" id="confirm"
                        style="background: #191a4b">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- Modal New Password --}}
{{-- Modal New Pin --}}
<div class="modal fade" id="setPin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width: 400px; z-index:99">
        <div class="modal-content" style="border-radius:5px">
            <div id="loader_nav"
                style="display:none; text-align: center; z-index: 5000; position: absolute; width: 100%; top: 40%">
                <img height="100px" src="{{ asset('img/loader.gif') }}">
            </div>

            <div class="modal-header d-flex justify-content-center">

                <h3 class="modal-title fs-5" id="staticBackdropLabel" style="color: black;font-weight:600">Set
                    New
                    Pin</h3>
            </div>
            <div id="alertModalPin"></div>
            <div class="modal-body">
                <form id='set_new_pin'>
                    <div class="row">
                        <div class="input-group mb-3">
                            <div class="pin-code">
                                <input class="setInput" name="pin[]" type="number" maxlength="1" autofocus>
                                <input class="setInput" name="pin[]" type="number" maxlength="1" required>
                                <input class="setInput" name="pin[]" type="number" maxlength="1" required>
                                <input class="setInput" name="pin[]" type="number" maxlength="1" required>
                                <input class="setInput" name="pin[]" type="number" maxlength="1" required>
                                <input class="setInput" name="pin[]" type="number" maxlength="1" required>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            {{-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cance</button> --}}
                            <button type="submit" class="btn text-white "
                                style="width:314px; background: #191a4b">Submit</button>
                        </div>
                    </div>
                </form>
                <script>
                    //var pinContainer = document.getElementsByClassName("pin-code")[0];
                    var pinContainer = document.querySelector(".pin-code");
                    // console.log('There is ' + pinContainer.length + ' Pin Container on the page.');

                    pinContainer.addEventListener('keyup', function(event) {
                        var target = event.srcElement;

                        var maxLength = parseInt(target.attributes["maxlength"].value, 10);
                        var myLength = target.value.length;

                        if (myLength >= maxLength) {
                            var next = target;
                            while (next = next.nextElementSibling) {
                                if (next == null) break;
                                if (next.tagName.toLowerCase() == "input") {
                                    next.focus();
                                    break;
                                }
                            }
                        }

                        if (myLength === 0) {
                            var next = target;
                            while (next = next.previousElementSibling) {
                                if (next == null) break;
                                if (next.tagName.toLowerCase() == "input") {
                                    next.focus();
                                    break;
                                }
                            }
                        }
                    }, false);

                    pinContainer.addEventListener('keydown', function(event) {
                        var target = event.srcElement;
                        target.value = "";
                    }, false);
                </script>
            </div>

        </div>
    </div>
</div>
{{-- Modal new Pin --}}
{{-- Modal Check Pin Pin --}}
<div class="modal fade" id="checkPin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width: 400px">
        <div class="modal-content" style="border-radius:5px">
            <div class="modal-header d-flex justify-content-center">

                <h3 class="modal-title fs-5" style="color: black;font-weight:600">Check
                    Pin</h3>
                <button type="button" class="btn-close  text-white"
                    style="margin-top: -50px;
                          margin-right: 20px;
                      "
                    data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        <font style="font-size:40px; color:black">??</font>
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <form id='set_check_pin'>
                    <div class="row">
                        <div class="input-group mb-3">
                            <div class="check-pin-code">
                                <input class="setInput" name="pinCheck[]" type="number" maxlength="1" autofocus>
                                <input class="setInput" name="pinCheck[]" type="number" maxlength="1" required>
                                <input class="setInput" name="pinCheck[]" type="number" maxlength="1" required>
                                <input class="setInput" name="pinCheck[]" type="number" maxlength="1" required>
                                <input class="setInput" name="pinCheck[]" type="number" maxlength="1" required>
                                <input class="setInput" name="pinCheck[]" type="number" maxlength="1" required>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn text-white "
                                style="width:314px; background: #191a4b">Submit</button>
                        </div>
                    </div>
                </form>
                <script>
                    var pinContainer = document.querySelector(".check-pin-code");;

                    pinContainer.addEventListener('keyup', function(event) {
                        var target = event.srcElement;

                        var maxLength = parseInt(target.attributes["maxlength"].value, 10);
                        var myLength = target.value.length;

                        if (myLength >= maxLength) {
                            var next = target;
                            while (next = next.nextElementSibling) {
                                if (next == null) break;
                                if (next.tagName.toLowerCase() == "input") {
                                    next.focus();
                                    break;
                                }
                            }
                        }

                        if (myLength === 0) {
                            var next = target;
                            while (next = next.previousElementSibling) {
                                if (next == null) break;
                                if (next.tagName.toLowerCase() == "input") {
                                    next.focus();
                                    break;
                                }
                            }
                        }
                    }, false);

                    pinContainer.addEventListener('keydown', function(event) {
                        var target = event.srcElement;
                        target.value = "";
                    }, false);
                </script>
            </div>

        </div>
    </div>
</div>


{{-- get logo profile compnay --}}
<script>
    $(document).ready(function() {
        let tenant = TENANT_CODE;
        let userId = USR_ID;


        $.ajaxSetup({
            headers: {
                "Authorization": "Bearer " + AUTH_TOKEN,
                "Accept": "application/json"
            }
        });
        $.ajax({
            type: "GET",
            url: API_URL + "api/tenant/info/" + tenant + '/' + userId,
            success: function(res) {
                if (document.getElementById('navbar_profilepict_admin')) {
                    if (res['success'] == true) {
                        var response = res['data'];
                        document.getElementById('navbar_profilepict_admin').src = STORAGE_URL +
                            response['company_logo'];
                    } else {
                        document.getElementById('navbar_profilepict_admin').src =
                            'img/team-2.png';
                    }
                }
            }
        });

    });
</script>
{{-- get logo profile compnay --}}
{{-- Modal check Pin --}}
<script>
    $(document).ready(function() {
        const getDataCheck = async function(userId, pin) {
            try {
                var formData = new FormData();
                formData.append('user_id', userId);
                formData.append('access_pin', pin);
                const response = await fetch(API_URL + "api/user/pin/use", {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'Authorization': 'Bearer ' + AUTH_TOKEN
                    },
                    body: formData,
                });
                const data = await response.json();
                return await data;
            } catch (error) {
                throw error;
            }
        }
        window.checkPin = async function(idPopup, callback) {
            try {
                if (idPopup != "") {
                    $(`${idPopup}`).modal('hide');
                }
                $("#checkPin").modal('show');
                const user_id = document.getElementById('navbar_uid').value;
                const form = document.getElementById('set_check_pin');
                form.addEventListener('submit', function(event) {
                    event.preventDefault();
                    const pin = $('input[name^=pinCheck]').map(function(idx, elem) {
                        return $(elem).val();
                    }).get().join('');
                    const data = getDataCheck(user_id, pin);
                    data.then((response) => {
                        if (response['status'] == 200 || response['success'] == true ||
                            response.is_correct == true) {
                            $("#checkPin").modal('hide');
                            callback();
                        } else {
                            Swal.fire(
                                "FAIlED!",
                                response['message'],
                                "error"
                            )
                            $("#checkPin").modal('hide');
                            setTimeout(function() {
                                window.location.reload(true);
                            }, 1500)
                        }
                    }).catch((error) => {});
                });
                // lakukan sesuatu dengan data di sini
            } catch (error) {
                console.error('Error:', error);
                // lakukan sesuatu dengan error di sini
            }
        };
    })
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                "Authorization": "Bearer " + AUTH_TOKEN,
                "Accept": "application/json"
            }
        });
        $.ajax({
            type: "GET",
            url: API_URL + "api/user/profile/info?user_id=" + USR_ID,
            success: function(res) {
                if (res) {
                    var response = res['data'];
                    document.getElementById('navbar_fullname').innerHTML = "Welcome, " + response[
                        'full_name'];
                    if (document.getElementById('navbar_profilepict')) {
                        document.getElementById('navbar_profilepict').src = STORAGE_URL + response[
                            'profile_picture'];
                    }
                    if(ADMIN_SESSION == true){
                        document.getElementById('navbar_group_Name').innerHTML = " " + response['group_name'];
                    }else{
                        document.getElementById('navbar_group_Name').innerHTML =  "Group - " + response['group_name'];
                    }
                    $subscription_type = response['subscription_type'];
                    if ($subscription_type == "trial") {
                        document.getElementById('show_hide_subs').style.display = "block";
                    }

                    if (res.data.change_password == true) {
                        $("#staticBackdrop").modal('show');
                        $('#your-modal-form').on('submit', function(e) {
                            e.preventDefault();
                            $.ajax({
                                url: API_URL + "api/user/password/change",
                                type: "POST",
                                data: $(this).serialize(),
                                before: function(data) {
                                    if ($("#loader_nav")) {
                                        $("#loader_nav").show();
                                    }
                                },
                                success: function(response) {
                                    $("#loader_nav").hide();
                                    if (response.status == 200) {
                                        $('#alertModal').html(`<div class="alert alert-success text-white text-capitalize" role="alert">
                                            Success change your password
                                        </div>`)
                                        setTimeout(function() {
                                            if (res.data
                                                .have_access_pin ==
                                                false) {
                                                $("#staticBackdrop")
                                                    .modal('hide');
                                                $("#setPin").modal(
                                                    'show');
                                                // createPin();
                                            } else {
                                                window.location.reload(
                                                    true);
                                            }
                                        }, 1500);
                                    }else{
                                        $('#alertModal').html(`<div class="alert alert-danger text-white text-capitalize" role="alert">
                                           ${response.message}
                                         </div>`)
                                    }
                                    // {
                                    //     $('#alertModal').html(`<div class="alert alert-danger text-white text-capitalize" role="alert">
                                    //     ${response.message}
                                    //     </div>`)
                                    // }


                                },
                                error: function(xhr, status, error) {}
                            });
                        });
                    }
                    if (res.data.have_access_pin == false && res.data.change_password == false) {
                        $("#setPin").modal('show');
                    }

                    $("#set_new_pin").submit(function(event) {
                        event.preventDefault();

                        const pin = $('input[name^=pin]').map(function(idx, elem) {
                            return $(elem).val();
                        }).get().join('');
                        const dataPin = pin;

                        $.ajax({
                            type: "POST",
                            url: API_URL + "api/user/pin/create",
                            headers: {
                                'Accept': 'application/json',
                                'Authorization': 'Bearer ' +
                                    AUTH_TOKEN
                            },
                            data: {
                                user_id: USR_ID,
                                new_access_pin: dataPin,
                                confirm_access_pin: dataPin
                            },
                            success: function(response) {

                                const {
                                    success,
                                    status,
                                    message
                                } = response;

                                if (success === true) {
                                    Swal.fire(
                                        'Good job!',
                                        'Success update password and set new pin',
                                        'success'
                                    )
                                    setTimeout(function() {
                                        window.location.reload(true);
                                    }, 1000);
                                }
                            }

                        });

                        // async function getData() {
                        //         try {
                        //             const response = await fetch(API_URL +
                        //                 "api/user/pin/create", {
                        //                     method: 'POST',
                        //                     headers: {
                        //                         'Accept': 'application/json',
                        //                         'Authorization': 'Bearer ' +
                        //                             AUTH_TOKEN
                        //                     },
                        //                     body: {
                        //                         "user_id": USR_ID,
                        //                         "new_access_pin": dataPin,
                        //                         "confirm_access_pin": dataPin
                        //                     },
                        //                 });
                        //             const data = await response.json();
                        //             return data;
                        //         } catch (error) {
                        //             console.error('Error:', error);
                        //             throw error;
                        //         }
                        //     }
                        //     (async function() {
                        //         try {
                        //             const data = await getData();
                        //             if (data.status == 200) {
                        //                 $('#alertModalPin').html(`<div class="alert alert-success"   role="alert">
                        //                   congratulations, your pin has been created
                        //               </div>`)
                        //                 setTimeout(function() {
                        //                     window.location.reload(
                        //                         true);
                        //                 }, 1500)
                        //             } {
                        //                 $('#alertModalPin').html(`<div class="alert alert-danger"   role="alert">
                        //                  ${data.message}
                        //               </div>`)
                        //             }
                        //             // lakukan sesuatu dengan data di sini
                        //         } catch (error) {
                        //             console.error('Error:', error);
                        //             // lakukan sesuatu dengan error di sini
                        //         }
                        //     })();

                    });

                    // function createPin() {
                    //     const form = document.getElementById('set_new_pin');
                    //     const user_id = document.getElementById('navbar_uid').value;
                    //     form.addEventListener('submit', function(event) {
                    //         event.preventDefault();
                    //         // const pin = $('input[name^=pin]').map(function(idx, elem) {
                    //         //     return $(elem).val();
                    //         // }).get().join('');
                    //         // const dataPin = pin;
                    //         // console.log(pin);
                    //         // async function getData() {
                    //         //         try {
                    //         //             const response = await fetch(API_URL +
                    //         //                 "api/user/pin/create", {
                    //         //                     method: 'POST',
                    //         //                     headers: {
                    //         //                         'Accept': 'application/json',
                    //         //                         'Authorization': 'Bearer ' +
                    //         //                             AUTH_TOKEN
                    //         //                     },
                    //         //                     body: `{
                    //         //                                 "user_id": "${user_id}",
                    //         //                                 "new_access_pin": "${dataPin}",
                    //         //                                 "confirm_access_pin": "${dataPin}"
                    //         //                             }`,
                    //         //                 });
                    //         //             const data = await response.json();
                    //         //             return data;
                    //         //         } catch (error) {
                    //         //             console.error('Error:', error);
                    //         //             throw error;
                    //         //         }
                    //         //     }
                    //         //     (async function() {
                    //         //         try {
                    //         //             const data = await getData();
                    //         //             if (data.status == 200) {
                    //         //                 $('#alertModalPin').html(`<div class="alert alert-success"   role="alert">
                    //         //             congratulations, your pin has been created
                    //         //         </div>`)
                    //         //                 setTimeout(function() {
                    //         //                     window.location.reload(
                    //         //                     true);
                    //         //                 }, 1500)
                    //         //             } {
                    //         //                 $('#alertModalPin').html(`<div class="alert alert-danger"   role="alert">
                    //         //            ${data.message}
                    //         //         </div>`)
                    //         //             }
                    //         //             // lakukan sesuatu dengan data di sini
                    //         //         } catch (error) {
                    //         //             console.error('Error:', error);
                    //         //             // lakukan sesuatu dengan error di sini
                    //         //         }
                    //         //     })();
                    //     });
                    // }

                } else {
                    document.getElementById('navbar_fullname').innerHTML = "not login!";
                    if (document.getElementById('navbar_profilepict')) {
                        document.getElementById('navbar_profilepict').src = 'img/team-2.png';
                    }
                }
            }
        });
    });
</script>
