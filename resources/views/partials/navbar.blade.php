{{-- 

<style>

    @media only screen and(max-width:600px){

        .upgradePro{

            position: absolute;

            top: 0;

            right: 40px;

            margin-top: -1px;

        }

    }

</style> --}}

<nav class="navbar navbar-main navbar-expand-lg position-sticky mt-3 top-1 px-0  shadow-none border-radius-xl"

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

                    <span class="d-sm-inline d-none text-lg font-weight-normal" style="color: black">

                        <span id="navbar_fullname" class="text-capitalize"></span>

                    </span>

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

                    {{-- <a href="javascript:;" class="nav-link text-body p-0 mb-1" id="dropdownMenuButton"

                        data-bs-toggle="dropdown" aria-expanded="false">

                        <span class="notif-badge">2</span>

                        <i class="fa fa-bell cursor-pointer "></i>

                    </a> --}}

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

                    <a href="javascript:;" class="nav-link text-body p-0 d-flex flex-row mb-2 ms-2"

                        id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">

                        &nbsp;

                        <img id="navbar_profilepict" src="{{ asset('img/team-2.jpg') }}" alt=""

                            class="img-fluid"

                            style="width: 2em; height: 2em; border-radius:50%; border: 1px solid grey">

                    </a>

                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                        @if (session()->get('is_superadmin') == false)
                        <li class="mb-0">

                            <a class="dropdown-item border-radius-md" href="/tenant">

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
                        {{-- <li class="mb-0">

                            <a class="dropdown-item border-radius-md" href="/setting">

                                <div class="d-flex flex-column justify-content-center">

                                    <h6 class="text-sm font-weight-normal mb-1">

                                        <span class="font-weight-bold"><i

                                                class="fa-solid fa-cog me-sm-1"></i></i></span><span

                                            class="font-weight-bold"> Setting</span>

                                    </h6>

                                </div>

                            </a>

                        </li> --}}

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

                            <form id="logout-form" action="{{ route('logout_action') }}" method="POST" class="d-none">

                                @csrf

                            </form>

                        </li>

                    </ul>

                </li>

                {{-- <li class="nav-item ms-2 no position-relative" style="margin-top: 4px">

                    <a href="/activity" class="nav-link text-body p-0 ">

                        <i class="fa-solid fa-clock-rotate-left" data-bs-toggle="tooltip"

                            data-bs-title="Latest Activity"></i>

                    </a>

                </li> --}}

            </ul>

        </div>

    </div>

</nav>



<input type="text" id="have_manager" hidden>

<input type="text" id="have_member" hidden>



<script>

    $(document).ready(function() {

        $.ajaxSetup({

            headers: {

                "Authorization": "Bearer " + AUTH_TOKEN,

                "Accept": "application/json"

            }

        });

        $.ajax({

            type: "GET",

            url: API_URL + "api/user/profile/info?user_id=" + document.getElementById(

                'navbar_uid').value,

            success: function(res) {

                if (res) {

                    var response = res['data'];
                    document.getElementById('navbar_fullname').innerHTML = "Welcome, " + response[

                        'full_name'];

                    document.getElementById('navbar_profilepict').src = STORAGE_URL + response[

                        'profile_picture'];

                    document.getElementById('have_manager').value = response['have_manager'];

                    document.getElementById('have_member').value = response['have_member'];

                    $subscription_type = response['subscription_type'];



                    if($subscription_type == "trial"){

                        document.getElementById('show_hide_subs').style.display = "block";

                    }



                } else {

                    document.getElementById('navbar_fullname').innerHTML = "not login!";

                    document.getElementById('navbar_profilepict').src = 'img/team-2.png';

                }

            }

        });

    });

</script>

