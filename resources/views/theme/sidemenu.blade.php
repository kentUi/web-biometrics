@if (empty($user->name))
    <script>
        window.location.href = '/'
    </script>
@endif
<div class="nk-sidebar" data-content="sidebarMenu">
    <div class="nk-sidebar-bar">
        <div class="nk-apps-brand">
            <a href="#" class="logo-link" style="padding-top: 65px; padding-bottom: 0px">
                <img class="logo-light logo-img" src="./logo.png" srcset="./logo.png 2x" alt="logo"
                    style="border-radius: 10px">
                <img class="logo-dark logo-img" src="./logo.png" srcset="./logo.png 2x" alt="logo-dark"
                    style="border-radius: 10px; border: 1px solid #fff; ">
            </a>
        </div>
        <div class="nk-sidebar-element">
            <div class="nk-sidebar-body">
                <div class="nk-sidebar-content" data-simplebar>
                    <div class="nk-sidebar-menu">
                        <!-- Menu -->
                        <ul class="nk-menu apps-menu">
                            <li class="nk-menu-item active">
                                <a href="#" class="nk-menu-link nk-menu-switch " data-target="navHospital">
                                    <span class="nk-menu-icon"><em class="icon ni ni-plus-medi"></em></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                {{-- <div class="nk-sidebar-profile nk-sidebar-profile-fixed dropdown">
                    <a href="#" data-bs-toggle="dropdown" data-offset="50,-50">
                        <div class="user-avatar">
                            <span>AB</span>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-md ms-4">
                        <div class="dropdown-inner user-card-wrap d-none d-md-block">
                            <div class="user-card">
                                <div class="user-avatar">
                                    <span>AB</span>
                                </div>
                                <div class="user-info">
                                    <span class="lead-text">Abu Bin Ishtiyak</span>
                                    <span class="sub-text text-soft">info@softnio.com</span>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-inner">
                            <ul class="link-list">
                                <li><a href="html/user-profile.html"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                                <li><a href="html/user-profile.html"><em class="icon ni ni-setting-alt"></em><span>Account Setting</span></a></li>
                                <li><a href="html/user-profile.html"><em class="icon ni ni-activity-alt"></em><span>Login Activity</span></a></li>
                            </ul>
                        </div>
                        <div class="dropdown-inner">
                            <ul class="link-list">
                                <li><a href="./logout"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="nk-sidebar-main is-light">
        <div class="nk-sidebar-inner" data-simplebar>
            <div class="nk-menu-content menu-active" data-content="navHospital">
                <h5 class="title">
                    <b style="color: #8e44ad">LGU - TAGOLOAN</b> <br>
                    <small style="font-size: 13px">TAGOLOAN, MISAMIS ORIENTAL</small>
                </h5>

                <li class="nk-menu-hr"></li>
                <ul class="nk-menu">
                    <li class="nk-menu-item">
                        <a href="/user/#" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-dashboard"></em></span>
                            <span class="nk-menu-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="/user/dtr-generate" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-monitor"></em></span>
                            <span class="nk-menu-text">Daily Time Records</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="/user/#" class="nk-menu-link">
                            <span class="nk-menu-icon">
                                <em class="icon ni ni-eye"></em>
                            </span>
                            <span class="nk-menu-text">View Individual Dtr/Logs</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="/user/logs-import" class="nk-menu-link">
                            <span class="nk-menu-icon">
                                <em class="icon ni ni-upload"></em>
                            </span>
                            <span class="nk-menu-text">Import Attendance Logs</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="/user/#" class="nk-menu-link">
                            <span class="nk-menu-icon">
                                <em class="icon ni ni-ticket-plus"></em>
                            </span>
                            <span class="nk-menu-text">Manual Attendance Logs</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="/user/#" class="nk-menu-link">
                            <span class="nk-menu-icon">
                                <em class="icon ni ni-wallet-out"></em>
                            </span>
                            <span class="nk-menu-text">Apply Leave Application</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="/user/#" class="nk-menu-link">
                            <span class="nk-menu-icon">
                                <em class="icon ni ni-link-group"></em>
                            </span>
                            <span class="nk-menu-text">Display Configuration</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="/user/#" class="nk-menu-link">
                            <span class="nk-menu-icon">
                                <em class="icon ni ni-calendar"></em>
                            </span>
                            <span class="nk-menu-text">Shift Schedules</span>
                        </a>
                    </li>
                    <li class="nk-menu-hr"></li>
                    <li class="nk-menu-item">
                        <a href="/user/#" class="nk-menu-link">
                            <span class="nk-menu-icon">
                                <em class="icon ni ni-growth-fill"></em>
                            </span>
                            <span class="nk-menu-text">Generate Records</span>
                        </a>
                    </li>
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-user-list-fill"></em></span>
                            <span class="nk-menu-text">Manage Employees</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="/user/employee-list" class="nk-menu-link">
                                    <span class="nk-menu-icon">
                                        <em class="icon ni ni-users"></em>
                                    </span>
                                    <span class="nk-menu-text">List of Employees</span>
                                </a>
                            </li>

                            <li class="nk-menu-item">
                                <a href="/user/employee-new" class="nk-menu-link">
                                    <span class="nk-menu-icon">
                                        <em class="icon ni ni-user-add"></em>
                                    </span>
                                    <span class="nk-menu-text">Register Employee</span>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle" >
                            <span class="nk-menu-icon"><em class="icon ni ni-account-setting-fill"></em></span>
                            <span class="nk-menu-text">Manage Accounts</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="/user/account-list" class="nk-menu-link">
                                    <span class="nk-menu-icon">
                                        <em class="icon ni ni-users"></em>
                                    </span>
                                    <span class="nk-menu-text">List of Accounts</span>
                                </a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="/user/account-new" class="nk-menu-link">
                                    <span class="nk-menu-icon">
                                        <em class="icon ni ni-user-add"></em>
                                    </span>
                                    <span class="nk-menu-text">Register Accounts</span>
                                </a>
                            </li>

                        </ul>
                    </li>


                    <li class="nk-menu-hr"></li>
                    <li class="nk-menu-item">
                        <a href="/user/#" class="nk-menu-link">
                            <span class="nk-menu-icon">
                                <em class="icon ni ni-setting"></em>
                            </span>
                            <span class="nk-menu-text">Accounts Settings</span>
                        </a>
                    </li>

                    <li class="nk-menu-item">
                        <a href="/logout" class="nk-menu-link">
                            <span class="nk-menu-icon">
                                <em class="icon ni ni-power"></em>
                            </span>
                            <span class="nk-menu-text">Sign-out</span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</div>
