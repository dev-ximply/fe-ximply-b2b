<aside class="sidenav navbar navbar-vertical navbar-expand-xs  border-0 border-radius-xl  fixed-start" id=""
    style="border-radius: 0 !important; background:white">

    <div class="sidenav-header d-flex justify-content-center">

        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>

        <a class="navbar-brand m-0" href="/">

            <img src="{{ asset('img/logos/logo-new/logo-companyy.png') }}" class="navbar-brand-img" alt="main_logo">

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
            <li class="nav-item">

                <a class="nav-link @if ($section == 'dashboard') active @endif" href="/">

                    <div
                        class="icon icon-sm shadow border-radius-md  text-center  me-2 d-flex align-items-center justify-content-center {{ $section == 'dashboard' ? 'bg-orange' : 'bg-purple' }}">

                        <div class="{{ $section == 'dashboard' ? 'text-white' : 'text-white' }}">
                            <img src="{{ asset('img/icons/sidebar/home.png') }}" alt="" style="width:35px">
                        </div>
                    </div>

                    <span
                        class="nav-link-text ms-1 {{ $section == 'dashboard' ? 'text-orange' : 'text-purple' }}">Dashboard</span>

                </a>

            </li>

            @if (session()->get('approval_expense') == 1 &&
                    session()->get('approval_topup') == 1 &&
                    session()->get('manage_budget') == 1 &&
                    session()->get('analytics') == 1)
                <li class="nav-item">

                    <a class="nav-link @if ($section == 'analytic') active @endif" href="/analytic">

                        <div
                            class="icon icon-sm shadow border-radius-md  text-center  me-2 d-flex align-items-center justify-content-center {{ $section == 'analytic' ? 'bg-orange' : 'bg-purple' }}">

                            <div class="{{ $section == 'analytic' ? 'text-white' : 'text-white' }}">
                                <img src="{{ asset('img/icons/sidebar/analytics.png') }}" alt=""
                                    style="width: 35px">
                            </div>
                        </div>

                        <span
                            class="nav-link-text ms-1 {{ $section == 'analytic' ? 'text-orange' : 'text-purple' }}">Analytics</span>

                    </a>

                </li>
            @endif



            @if (session()->get('is_superadmin') == false)
                <li class="nav-item">

                    <a class="nav-link @if ($section == 'expense') active @endif" href="/expense">

                        <div
                            class="icon icon-sm shadow border-radius-md  text-center  me-2 d-flex align-items-center justify-content-center {{ $section == 'expense' ? 'bg-orange' : 'bg-purple' }}">

                            <div class="{{ $section == 'expense' ? 'text-white' : 'text-white' }}">
                                <img src="{{ asset('img/icons/sidebar/expense.png') }}" alt=""
                                    style="width: 35px">
                            </div>
                        </div>

                        <span
                            class="nav-link-text ms-1 {{ $section == 'expense' ? 'text-orange' : 'text-purple' }}">Expenses</span>

                    </a>

                </li>
            @endif



            @if (session()->get('approval_expense') == 1 || session()->get('manage_user') == 1)

                <li class="nav-item">

                    <a data-bs-toggle="collapse" href="#manage-approval"
                        class="nav-link @if ($section == 'approval' || $section == 'top_up_approval') active @endif">

                        <div
                            class="icon icon-sm shadow border-radius-md  text-center  me-2 d-flex align-items-center justify-content-center {{ $section == 'approval' || $section == 'top_up_approval' ? 'bg-orange' : 'bg-purple' }}">

                            <div
                                class="{{ $section == 'approval' || $section == 'top_up_approval' ? 'text-white' : 'text-white' }}">
                                <img src="{{ asset('img/icons/sidebar/approval.png') }}" alt=""
                                    style="width: 35px">
                            </div>
                        </div>

                        <span
                            class="nav-link-text ms-1 {{ $section == 'approval' || $section == 'top_up_approval' ? 'text-orange' : 'text-purple' }}">Approval</span>

                    </a>
                    <div class="collapse @if ($section == 'approval' || $section == 'top_up_approval') show @endif" id="manage-approval">

                        <ul class="nav ms-4 ps-3">

                            <li class="nav-item ">


                                <a class="nav-link @if ($section == 'approval') active @endif " href="/approval">

                                    <span class="sidenav-mini-icon text-purple"> O </span>

                                    <span class="nav-link-text ms-1  text-purple">Expense Approval</span>

                                </a>


                                <a class="nav-link @if ($section == 'top_up_approval') active @endif"
                                    href="/spend/request">

                                    <span class="sidenav-mini-icon text-purple"> O </span>

                                    <span class="nav-link-text ms-1 text-purple">Top Up Approval</span>

                                </a>
                            </li>

                        </ul>

                    </div>

                </li>

                {{-- @endif



            @if (session()->get('manage_user') == 1) --}}

                <li class="nav-item">

                    <a data-bs-toggle="collapse" href="#manage-teams"
                        class="nav-link  @if ($section == 'employee' || $section == 'group' || $section == 'partner') active @endif" aria-controls="manage-teams"
                        role="button" aria-expanded="false">

                        <div
                            class="icon icon-sm shadow border-radius-md  text-center  me-2 d-flex align-items-center justify-content-center {{ $section == 'employee' || $section == 'group' || $section == 'partner' ? 'bg-orange' : 'bg-purple' }}">

                            <div
                                class="{{ $section == 'employee' || $section == 'group' || $section == 'partner' ? 'text-white' : 'text-white' }}">
                                <img src="{{ asset('img/icons/sidebar/manage-teams.png') }}" alt=""
                                    class="" style="width:35px">
                            </div>
                        </div>

                        <span
                            class="nav-link-text ms-1 {{ $section == 'employee' || $section == 'group' || $section == 'partner' ? 'text-orange' : 'text-purple' }}">Manage

                            Teams</span>

                    </a>

                    <div class="collapse @if ($section == 'employee' || $section == 'group' || $section == 'partner') show @endif" id="manage-teams">

                        <ul class="nav ms-4 ps-3">

                            <li class="nav-item ">

                                @if (session()->get('is_superadmin') == true)
                                    <a class="nav-link @if ($section == 'group') active @endif "
                                        href="/group">

                                        <span class="sidenav-mini-icon text-purple"> O </span>

                                        <span class="nav-link-text ms-1  text-purple">Group</span>

                                    </a>
                                @endif

                                <a class="nav-link @if ($section == 'employee') active @endif" href="/employee">

                                    <span class="sidenav-mini-icon text-purple"> O </span>

                                    <span class="nav-link-text ms-1 text-purple">Member</span>

                                </a>
                                <a class="nav-link @if ($section == 'partner') active @endif " href="/partner">

                                    <span class="sidenav-mini-icon text-purple"> O </span>

                                    <span class="nav-link-text ms-1  text-purple">Client/Vendor</span>

                                </a>
                            </li>

                        </ul>

                    </div>

                </li>

            @endif



            @if (session()->get('manage_budget') == 1 || session()->get('approval_topup') == 1)
                <li class="nav-item">

                    <a href="/budget" class="nav-link  @if ($section == 'budget') active @endif"
                        aria-controls="ecommerceExamples" role="button" aria-expanded="false">

                        <div
                            class="icon  icon-sm shadow border-radius-md  text-center  me-2 d-flex align-items-center justify-content-center {{ $section == 'budget' ? 'bg-orange' : 'bg-purple' }}">

                            <div
                                class="{{ $section == 'budget' || $section == 'top_up_approval' ? 'text-white' : 'text-white' }}">
                                <img src="{{ asset('img/icons/sidebar/manage-budgets.png') }}" alt=""
                                    class="" style="width:35px">
                            </div>
                        </div>

                        <span class="nav-link-text ms-1 {{ $section == 'budget' ? 'text-orange' : 'text-purple' }}">
                            Budget</span>

                    </a>
                </li>
            @endif



            @if (session()->get('is_superadmin') == true)
                <li class="nav-item">

                    <a class="nav-link @if ($section == 'card') active @endif" href="/card">

                        <div
                            class="icon icon-sm shadow border-radius-md  text-center  me-2 d-flex align-items-center justify-content-center {{ $section == 'card' ? 'bg-orange' : 'bg-purple' }}">

                            <div class="{{ $section == 'card' ? 'text-white' : 'text-white' }}">
                                <img src="{{ asset('img/icons/sidebar/card.png') }}" alt="" class=""
                                    style="width:35px">
                            </div>
                        </div>

                        <span
                            class="nav-link-text ms-1 {{ $section == 'card' ? 'text-orange' : 'text-purple' }}">Card</span>

                    </a>

                </li>
            @endif



            @if (session()->get('is_superadmin') == false)
                <li class="nav-item">

                    <a class="nav-link @if ($section == 'report') active @endif" href="/report">

                        <div
                            class="icon icon-sm shadow border-radius-md  text-center  me-2 d-flex align-items-center justify-content-center {{ $section == 'report' ? 'bg-orange' : 'bg-purple' }}">

                            <div class="{{ $section == 'report' ? 'text-white' : 'text-white' }}">
                                <img src="{{ asset('img/icons/sidebar/report.png') }}" alt="" class=""
                                    style="width:35px">
                            </div>
                        </div>

                        <span
                            class="nav-link-text ms-1 {{ $section == 'report' ? 'text-orange' : 'text-purple' }}">Report</span>

                    </a>

                </li>
            @endif



            @if (session()->get('policies') == 1)
                <li class="nav-item">

                    <a data-bs-toggle="collapse" href="#settings"
                        class="nav-link  @if ($section == 'settings' || $section == 'permission' || $section == 'account_settings') active @endif"
                        aria-controls="ecommerceExamples" role="button" aria-expanded="false">

                        <div
                            class="icon  icon-sm shadow border-radius-md  text-center  me-2 d-flex align-items-center justify-content-center {{ $section == 'settings' || $section == 'permission' || $section == 'account_settings' ? 'bg-orange' : 'bg-purple' }}">

                            <div
                                class="{{ $section == 'settings' || $section == 'permission' || $section == 'account_settings' ? 'text-white' : 'text-white' }}">
                                <img src="{{ asset('img/icons/sidebar/settings.png') }}" alt=""
                                    class="" style="width:35px">
                            </div>
                        </div>

                        <span
                            class="nav-link-text ms-1 {{ $section == 'settings' || $section == 'permission' || $section == 'account_settings' ? 'text-orange' : 'text-purple' }}">Settings</span>

                    </a>

                    <div class="collapse @if ($section == 'settings' || $section == 'permission' || $section == 'account_settings') show @endif" id="settings">

                        <ul class="nav ms-4 ps-3">

                            <li class="nav-item ">

                                <a class="nav-link @if ($section == 'permission') active @endif " href="/roles">

                                    <span class="sidenav-mini-icon text-purple"> O </span>

                                    <span class="nav-link-text ms-1  text-purple">Roles Name</span>

                                </a>

                                <a class="nav-link @if ($section == 'account_settings') active @endif "
                                    href="/account-settings">

                                    <span class="sidenav-mini-icon text-purple"> O </span>

                                    <span class="nav-link-text ms-1  text-purple">Account Settings</span>

                                </a>



                            </li>

                        </ul>

                    </div>

                </li>
            @endif

        </ul>

    </div>

    <div class="sidenav-footer mx-3 mt-5 pt-5">

        <div class="card card-background shadow-none " id="sidenavCard"
            style="border: 1px solid #dddddd; background:#191a4d">

            <div class="card-body text-start p-3 w-100">

                {{-- <div class="icon icon-shape icon-sm  shadow text-center mb-3 d-flex align-items-center justify-content-center border-radius-md"
                    style="background-color: #e9ecef">

                    <i class="fa-solid fa-phone text-purple  text-lg top-0" id="sidenavCardIcon"></i>

                </div> --}}

                <div class="docs-info">

                    <h6 class="text-white up mb-0 text-md font-weight-bold" style="color:#191a4d">Need help?</h6>

                    <span class="text-xs font-weight-bold text-white" style="color:#191a4d">Please call us</span>

                    <a href="https://api.whatsapp.com/send?phone=6281388837989&text=Hello%2C%20thank%20you%20for%20contacting%20Ximply.%20We%20will%20reply%20your%20message%20shortly.%20%0A%0AThank%20you"
                        target="_blank" class="btn  btn-sm w-100 mb-0 text-purple text-sm"
                        style="background:#fff">Contact

                        Us</a>

                </div>

            </div>

        </div>

    </div>
</aside>
