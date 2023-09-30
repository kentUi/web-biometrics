<div class="nk-main">

    <div class="nk-wrap ">
        <div class="nk-header nk-header-fixed nk-header-fluid is-light" style="border-bottom: 1px solid #eee;">
            <div class="container-fluid">
                <div class="nk-header-wrap">
                    <div class="nk-menu-trigger d-xl-none ms-n1">
                        <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em
                                class="icon ni ni-menu"></em></a>
                    </div>
                    <div class="nk-header-brand d-xl-none">
                        <a href="html/index.html" class="logo-link">
                            <img class="logo-light logo-img" src="./images/logo.png" srcset="./images/logo2x.png 2x"
                                alt="logo">
                            <img class="logo-dark logo-img" src="./images/logo-dark.png"
                                srcset="./images/logo-dark2x.png 2x" alt="logo-dark">
                        </a>
                    </div><!-- .nk-header-brand -->
                    <div class="nk-header-search ms-3 ms-xl-0">
                        <em class="icon ni ni-search"></em>
                        <input type="text" class="form-control border-transparent form-focus-none"
                            placeholder="Search anything">
                    </div><!-- .nk-header-news -->
                    <div class="nk-header-tools">
                        <ul class="nk-quick-nav">
                            {{-- <li class="dropdown chats-dropdown hide-mb-xs">
                                <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-bs-toggle="dropdown">
                                    <div class="icon-status icon-status-danger"><em class="icon ni ni-comments"></em>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-xl dropdown-menu-end">
                                    <div class="dropdown-head">
                                        <span class="sub-title nk-dropdown-title">Recent Chats</span>
                                        <a href="#">Setting</a>
                                    </div>
                                    <div class="dropdown-body">
                                        <ul class="chat-list">
                                            <li class="chat-item">
                                                <a class="chat-link" href="#">
                                                    <div class="chat-media user-avatar">
                                                        <span>KR</span>
                                                        <span class="status dot dot-lg dot-gray"></span>
                                                    </div>
                                                    <div class="chat-info">
                                                        <div class="chat-from">
                                                            <div class="name">Dr. Kent Russell Casiño</div>
                                                            <span class="time">Now</span>
                                                        </div>
                                                        <div class="chat-context">
                                                            <div class="text">You: Please confrim if you got my last
                                                                messages.</div>
                                                            <div class="status delivered">
                                                                <em class="icon ni ni-check-circle-fill"></em>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li><!-- .chat-item -->
                                            <li class="chat-item is-unread">
                                                <a class="chat-link" href="#">
                                                    <div class="chat-media user-avatar bg-pink">
                                                        <span>JP</span>
                                                        <span class="status dot dot-lg dot-success"></span>
                                                    </div>
                                                    <div class="chat-info">
                                                        <div class="chat-from">
                                                            <div class="name">Dr. Joniel Padilla</div>
                                                            <span class="time">4:49 AM</span>
                                                        </div>
                                                        <div class="chat-context">
                                                            <div class="text">Hi, I am Joniel Padilla, can you help me
                                                                with this problem ?</div>
                                                            <div class="status unread">
                                                                <em class="icon ni ni-bullet-fill"></em>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li><!-- .chat-item -->
                                        </ul><!-- .chat-list -->
                                    </div><!-- .nk-dropdown-body -->
                                    <div class="dropdown-foot center">
                                        <a href="#">View All</a>
                                    </div>
                                </div>
                            </li> --}}
                            <li class="dropdown notification-dropdown">
                                <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-bs-toggle="dropdown">
                                    {{-- icon-status-danger --}}
                                    <div class="icon-status "><em class="icon ni ni-bell"></em></div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-xl dropdown-menu-end">
                                    <div class="dropdown-head">
                                        <span class="sub-title nk-dropdown-title">Notifications</span>
                                        <a href="#">Mark All as Read</a>
                                    </div>
                                    {{-- <div class="dropdown-body">
                                        <div class="nk-notification-item dropdown-inner">
                                            <div class="nk-notification-icon">
                                                <em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                            </div>
                                            <div class="nk-notification-content">
                                                <div class="nk-notification-text">Your <span>Deposit Order</span> is
                                                    placed</div>
                                                <div class="nk-notification-time">2 hrs ago</div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="dropdown-foot center">
                                        <a href="#">View All</a>
                                    </div>
                                </div>
                            </li>
                            <li class="dropdown user-dropdown">
                                <a href="#" class="dropdown-toggle me-n1" data-bs-toggle="dropdown">
                                    <div class="user-toggle">
                                        <div class="user-avatar sm">
                                            <em class="icon ni ni-user-alt"></em>
                                        </div>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-md dropdown-menu-end">
                                    <div class="dropdown-inner user-card-wrap bg-lighter">
                                        <div class="user-card">
                                            <div class="user-avatar">
                                                @php
                                                    $value = session('info');
                                                    $acc = substr($value['name'], 0, 2);
                                                @endphp
                                                <span style="text-transform: uppercase">{{ $acc }}</span>
                                            </div>
                                            <div class="user-info">

                                                <span class="lead-text">{{ $value['name'] }}</span>
                                                <span class="sub-text">{{ $value['email'] }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dropdown-inner">
                                        {{-- <ul class="link-list">
                                            <li><a href="html/hospital/user-profile.html"><em
                                                        class="icon ni ni-user-alt"></em><span>View Profile</span></a>
                                            </li>
                                            <li><a href="html/hospital/settings.html"><em
                                                        class="icon ni ni-setting-alt"></em><span>Account
                                                        Setting</span></a></li>
                                            <li><a href="html/hospital/settings-account-log.html"><em
                                                        class="icon ni ni-activity-alt"></em><span>Login
                                                        Activity</span></a></li>
                                        </ul> --}}
                                    </div>
                                    <div class="dropdown-inner">
                                        <ul class="link-list">
                                            <li><a href="/logout"><em class="icon ni ni-signout"></em><span>Sign
                                                        out</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div><!-- .nk-header-wrap -->
            </div><!-- .container-fliud -->
        </div>
        <div class="nk-content">

            <div class="container-fluid mt-2">

                <?php
                echo view('pages.' . $page, ['data' => ['ar' => 2]]);
                ?>
            </div>
        </div>
    </div>
</div>
