<aside class="sidenav navbar navbar-vertical navbar-expand-xs  border-0 border-radius-xl  fixed-start" id=""
    style="border-radius: 0 !important; background:#19194b">
    <div class="sidenav-header d-flex justify-content-center">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="/">
            <img src="{{ asset('img/logos/logo-new/ximply-white.png') }}" class="navbar-brand-img" alt="main_logo">
        </a>
        <a href="javascript:;" onclick="closeSidenav()" class="nav-link text-body p-0"
            style="position: absolute; top: 10px; right: 15px; cursor: pointer">
            <i class="fa fa-close d-xl-none" style="font-size:24px"></i>
        </a>
        <script>
            function closeSidenav() {
                document.getElementsByTagName('body')[0].classList.remove('g-sidenav-pinned');
                setTimeout(function() {
                    document.getElementById('sidenav-main').classList.remove('bg-white');
                }, 100);
                document.getElementById('sidenav-main').classList.remove('bg-transparent');
            }
        </script>
    </div>
    <hr class="horizontal white">
    <div class="collapse navbar-collapse w-auto h-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            @if (session()->get('is_superadmin') == false)
                <li class="nav-item">
                    <a class="nav-link @if ($section == 'dashboard') active @endif" href="/">
                        <div
                            class="icon icon-sm shadow border-radius-md  text-center  me-2 d-flex align-items-center justify-content-center {{ $section == 'dashboard' ? 'bg-orange' : 'bg-purple' }}">
                            <i class="fa-solid fa-home {{ $section == 'dashboard' ? 'text-white' : 'text-white' }}"
                                style="font-size:15px"></i>
                        </div>
                        <span
                            class="nav-link-text ms-1 {{ $section == 'dashboard' ? 'text-orange' : 'text-white' }}">Dashboard</span>
                    </a>
                </li>
            @endif

            @if (session()->get('approval_expense') == 1 &&
                    session()->get('approval_topup') == 1 &&
                    session()->get('manage_budget') == 1)
                <li class="nav-item">
                    <a class="nav-link @if ($section == 'analytic') active @endif" href="/analytic">
                        <div
                            class="icon icon-sm shadow border-radius-md  text-center  me-2 d-flex align-items-center justify-content-center {{ $section == 'analytic' ? 'bg-orange' : 'bg-purple' }}">
                            <i class="fa-solid fa-bar-chart {{ $section == 'analytic' ? 'text-white' : 'text-white' }}"
                                style="font-size:15px"></i>
                        </div>
                        <span
                            class="nav-link-text ms-1 {{ $section == 'analytic' ? 'text-orange' : 'text-white' }}">Analytics</span>
                    </a>
                </li>
            @endif

            @if (session()->get('is_superadmin') == false)
                <li class="nav-item">
                    <a class="nav-link @if ($section == 'expense') active @endif" href="/expense">
                        <div
                            class="icon icon-sm shadow border-radius-md  text-center  me-2 d-flex align-items-center justify-content-center {{ $section == 'expense' ? 'bg-orange' : 'bg-purple' }}">
                            <i class="fa-sharp fa-solid fa-basket-shopping {{ $section == 'expense' ? 'text-white' : 'text-white' }}"
                                style="font-size:15px"></i>
                        </div>
                        <span
                            class="nav-link-text ms-1 {{ $section == 'expense' ? 'text-orange' : 'text-white' }}">Expenses</span>
                    </a>
                </li>
            @endif

            @if (session()->get('approval_expense') == 1)
                <li class="nav-item">
                    <a class="nav-link @if ($section == 'approval') active @endif" href="/approval">
                        <div
                            class="icon icon-sm shadow border-radius-md  text-center  me-2 d-flex align-items-center justify-content-center {{ $section == 'approval' ? 'bg-orange' : 'bg-purple' }}">
                            <i class="fa-solid fa-handshake {{ $section == 'approval' ? 'text-white' : 'text-white' }}"
                                style="font-size:15px"></i>
                        </div>
                        <span
                            class="nav-link-text ms-1 {{ $section == 'approval' ? 'text-orange' : 'text-white' }}">Approval</span>
                    </a>
                </li>
            @endif

            @if (session()->get('manage_user') == 1)
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#manage-teams"
                        class="nav-link  @if ($section == 'employee' || $section == 'group' || $section == 'partner') active @endif" aria-controls="manage-teams"
                        role="button" aria-expanded="false">
                        <div
                            class="icon icon-sm shadow border-radius-md  text-center  me-2 d-flex align-items-center justify-content-center {{ $section == 'employee' || $section == 'group' || $section == 'partner' ? 'bg-orange' : 'bg-purple' }}">
                            <i class="fa-solid fa-users {{ $section == 'employee' || $section == 'group' || $section == 'partner' ? 'text-white' : 'text-white' }}"
                                style="font-size:15px"></i>
                        </div>
                        <span
                            class="nav-link-text ms-1 {{ $section == 'employee' || $section == 'group' || $section == 'partner' ? 'text-orange' : 'text-white' }}">Manage
                            Teams</span>
                    </a>
                    <div class="collapse @if ($section == 'employee' || $section == 'group' || $section == 'partner') show @endif" id="manage-teams">
                        <ul class="nav ms-4 ps-3">
                            <li class="nav-item ">
                                @if (session()->get('is_superadmin') == true)
                                    <a class="nav-link @if ($section == 'group') active @endif "
                                        href="/group">
                                        <span class="sidenav-mini-icon text-white"> O </span>
                                        <span class="nav-link-text ms-1  text-white">Group</span>
                                    </a>
                                @endif
                                <a class="nav-link @if ($section == 'employee') active @endif" href="/employee">
                                    <span class="sidenav-mini-icon text-white"> O </span>
                                    <span class="nav-link-text ms-1 text-white">Member</span>
                                </a>
                                <a class="nav-link @if ($section == 'partner') active @endif " href="/partner">
                                    <span class="sidenav-mini-icon text-white"> O </span>
                                    <span class="nav-link-text ms-1  text-white">Client/Vendor</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endif

            @if (session()->get('manage_budget') == 1 || session()->get('approval_topup') == 1)
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#ecommerceExamples"
                        class="nav-link  @if ($section == 'budget' || $section == 'top_up_approval' || $section == 'pre-approval') active @endif"
                        aria-controls="ecommerceExamples" role="button" aria-expanded="false">
                        <div
                            class="icon  icon-sm shadow border-radius-md  text-center  me-2 d-flex align-items-center justify-content-center {{ $section == 'budget' || $section == 'top_up_approval' || $section == 'pre-approval' ? 'bg-orange' : 'bg-purple' }}">
                            <i class="fa-sharp fa-solid fa-circle-dollar-to-slot {{ $section == 'budget' || $section == 'top_up_approval' ? 'text-white' : 'text-white' }}"
                                style="font-size:15px;"></i>
                        </div>
                        <span
                            class="nav-link-text ms-1 {{ $section == 'budget' || $section == 'top_up_approval' || $section == 'pre-approval' ? 'text-orange' : 'text-white' }}">Manage
                            Budget</span>
                    </a>
                    <div class="collapse @if ($section == 'budget' || $section == 'top_up_approval' || $section == 'pre-approval') show @endif" id="ecommerceExamples">
                        <ul class="nav ms-4 ps-3">
                            <li class="nav-item ">
                                @if (session()->get('manage_budget') == 1)
                                    <a class="nav-link @if ($section == 'budget') active @endif"
                                        href="/budget">
                                        <span class="sidenav-mini-icon text-white"> O </span>
                                        <span class="nav-link-text ms-1 text-white">Budget</span>
                                    </a>
                                @endif
                                @if (session()->get('approval_topup') == 1)
                                    <a class="nav-link @if ($section == 'top_up_approval') active @endif "
                                        href="/spend/request">
                                        <span class="sidenav-mini-icon text-white"> O </span>
                                        <span class="nav-link-text ms-1  text-white">Approval Top Up</span>
                                    </a>
                                @endif
                            </li>
                        </ul>
                    </div>
                </li>
            @endif

            @if (session()->get('is_superadmin') == true)
                <li class="nav-item">
                    <a class="nav-link @if ($section == 'card') active @endif" href="/card">
                        <div
                            class="icon icon-sm shadow border-radius-md  text-center  me-2 d-flex align-items-center justify-content-center {{ $section == 'card' ? 'bg-orange' : 'bg-purple' }}">
                            <i class="fa-solid fa-credit-card {{ $section == 'card' ? 'text-white' : 'text-white' }}"
                                style="font-size:15px"></i>
                        </div>
                        <span
                            class="nav-link-text ms-1 {{ $section == 'card' ? 'text-orange' : 'text-white' }}">Card</span>
                    </a>
                </li>
            @endif

            @if (session()->get('is_superadmin') == false)
                <li class="nav-item">
                    <a class="nav-link @if ($section == 'report') active @endif" href="/report">
                        <div
                            class="icon icon-sm shadow border-radius-md  text-center  me-2 d-flex align-items-center justify-content-center {{ $section == 'report' ? 'bg-orange' : 'bg-purple' }}">
                            <i class="fa-solid fa-file-lines {{ $section == 'report' ? 'text-white' : 'text-white' }}"
                                style="font-size:15px"></i>
                        </div>
                        <span
                            class="nav-link-text ms-1 {{ $section == 'report' ? 'text-orange' : 'text-white' }}">Report</span>
                    </a>
                </li>
            @endif

            @if (session()->get('policies') == 1)
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#settings"
                        class="nav-link  @if ($section == 'settings' || $section == 'permission' || $section == 'tenant') active @endif"
                        aria-controls="ecommerceExamples" role="button" aria-expanded="false">
                        <div
                            class="icon  icon-sm shadow border-radius-md  text-center  me-2 d-flex align-items-center justify-content-center {{ $section == 'settings' || $section == 'permission' || $section == 'tenant' ? 'bg-orange' : 'bg-purple' }}">
                            <i class="fa-sharp fa-solid fa-sliders {{ $section == 'settings' || $section == 'permission' ? 'text-white' : 'text-white' }}"
                                style="font-size:15px;"></i>
                        </div>
                        <span
                            class="nav-link-text ms-1 {{ $section == 'settings' || $section == 'permission' || $section == 'tenant' ? 'text-orange' : 'text-white' }}">Settings</span>
                    </a>
                    <div class="collapse @if ($section == 'settings' || $section == 'permission' || $section == 'tenant') show @endif" id="settings">
                        <ul class="nav ms-4 ps-3">
                            <li class="nav-item ">
                                <a class="nav-link @if ($section == 'permission') active @endif "
                                    href="/permission">
                                    <span class="sidenav-mini-icon text-white"> O </span>
                                    <span class="nav-link-text ms-1  text-white">Permission</span>
                                </a>
                                <a class="nav-link @if ($section == 'tenant') active @endif " href="/tenant">
                                    <span class="sidenav-mini-icon text-white"> O </span>
                                    <span class="nav-link-text ms-1  text-white">Corporate Info</span>
                                </a>

                            </li>
                        </ul>
                    </div>
                </li>
            @endif
        </ul>
    </div>
    <div class="sidenav-footer mx-3 mt-5">
        <div class="card card-background shadow-none " id="sidenavCard" style="border: 1px solid #dddddd">
            <div class="card-body text-start p-3 w-100">
                <div class="icon icon-shape icon-sm  shadow text-center mb-3 d-flex align-items-center justify-content-center border-radius-md"
                    style="background-color: #e9ecef">
                    <i class="fa-solid fa-phone text-purple  text-lg top-0" id="sidenavCardIcon"></i>
                </div>
                <div class="docs-info">
                    <h6 class="text-purple up mb-0 text-md font-weight-bold" style="color:#191a4d">Need help?</h6>
                    <span class="text-xs font-weight-bold text-purple" style="color:#191a4d">Please call us</span>
                    <a href="https://api.whatsapp.com/send?phone=6281388837989&text=Hello%2C%20thank%20you%20for%20contacting%20Ximply.%20We%20will%20reply%20your%20message%20shortly.%20%0A%0AThank%20you"
                        target="_blank" class="btn  btn-sm w-100 mb-0 text-white text-sm"
                        style="background:#191a4d">Contact
                        Us</a>
                </div>
            </div>
        </div>
    </div>
</aside>
