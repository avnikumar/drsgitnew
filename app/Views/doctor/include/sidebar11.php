
    <!-- Admin Menu -->
    <div class="admin-menu">
        <!-- Logo -->
        <div class="logo crancy-sidebar-padding pd-right-0">
            <a class="crancy-logo" href="<?= base_url('patient/dashboard') ?>">
                <!-- Logo for Default -->
                <img class="crancy-logo__main" src="/public/inner/images/logo.png" alt="#">
                <img class="crancy-logo__main--dark" src="/public/inner/img/logo-dark.png" alt="#">
                <!-- Logo for Dark Version -->
                <img class="crancy-logo__main--small" style="width:36px;" src="/public/inner/images/logo-icon.png" alt="#">
                <img class="crancy-logo__main--small--dark" src="/public/inner/img/logo-icon-dark.png" alt="#">
            </a>
            <div id="crancy__sicon" class="crancy__sicon close-icon">
                <img src="/public/inner/img/arrow-icon.svg">
            </div>
        </div>

        <!-- Main Menu -->
        <div class="admin-menu__one crancy-sidebar-padding mg-top-20">
            <h4 class="admin-menu__title">Menu</h4>
            <!-- Nav Menu -->
            <div class="menu-bar">
                <ul id="CrancyMenu" class="menu-bar__one crancy-dashboard-menu">
                    <li class="active">
                        <a class="collapsed" href="#!" data-bs-toggle="collapse" data-bs-target="#menu-item__dashboard"><span class="menu-bar__text">
                                <span class="crancy-menu-icon crancy-svg-icon__v1">
                                    <svg class="crancy-svg-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="22" viewBox="0 0 20 22" fill="none">
                                        <path d="M14 21V17C14 14.7909 12.2091 13 10 13C7.79086 13 6 14.7909 6 17V21M19 9.15033V16.9668C19 19.1943 17.2091 21 15 21H5C2.79086 21 1 19.1943 1 16.9668V9.15033C1 7.93937 1.53964 6.7925 2.46986 6.02652L7.46986 1.90935C8.9423 0.696886 11.0577 0.696883 12.5301 1.90935L17.5301 6.02652C18.4604 6.7925 19 7.93937 19 9.15033Z" stroke="#436CFF" stroke-width="1.5"></path>
                                    </svg>
                                </span>
                                <span class="menu-bar__name">Dashboards</span></span>
                            <span class="crancy__toggle"></span></a>
                        <!-- Dropdown Menu -->
                        <div class="collapse crancy__dropdown" id="menu-item__dashboard" data-bs-parent="#CrancyMenu">
                            <ul class="menu-bar__one-dropdown">
                                <li>
                                    <a href="index.html"><span class="menu-bar__text"><span class="menu-bar__name">Sales Analysis</span></span></a>
                                </li>
                                <li>
                                    <a href="index-2.html"><span class="menu-bar__text"><span class="menu-bar__name">eCommerce</span></span></a>
                                </li>
                                <li>
                                    <a href="index-3.html"><span class="menu-bar__text"><span class="menu-bar__name">Marketing</span></span></a>
                                </li>
                                <li>
                                    <a href="index-4.html"><span class="menu-bar__text"><span class="menu-bar__name">Saas Solution</span></span></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a class="collapsed" href="transaction.html"><span class="menu-bar__text">
                        <span class="crancy-menu-icon crancy-svg-icon__v1">
                            <svg class="crancy-svg-icon" width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6 9H14M6 13H14M6 17H10M6 3C6 4.10457 6.89543 5 8 5H12C13.1046 5 14 4.10457 14 3M6 3C6 1.89543 6.89543 1 8 1H12C13.1046 1 14 1.89543 14 3M6 3H5C2.79086 3 1 4.79086 1 7V17C1 19.2091 2.79086 21 5 21H15C17.2091 21 19 19.2091 19 17V7C19 4.79086 17.2091 3 15 3H14" stroke-width="1.5" stroke-linecap="round"></path>
                            </svg>
                        </span>
                        <span class="menu-bar__name">Transaction</span></span></a>
                    </li>
                    <li>
                        <a class="collapsed" href="my-wallet.html"><span class="menu-bar__text">
                        <span class="crancy-menu-icon crancy-svg-icon__v1">
                            <svg class="crancy-svg-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M2 7C2 4.79086 3.79086 3 6 3H18C20.2091 3 22 4.79086 22 7V17C22 19.2091 20.2091 21 18 21H6C3.79086 21 2 19.2091 2 17V7Z" stroke-width="1.5" stroke-linejoin="round"></path>
                                <path d="M22 9L22 15H18C16.3431 15 15 13.6569 15 12C15 10.3431 16.3431 9 18 9L22 9Z" stroke-width="1.5" stroke-linejoin="round"></path>
                            </svg>
                        </span>
                        <span class="menu-bar__name">My Wallet</span></span></a>
                    </li>
                    <li>
                        <a class="collapsed" href="analytics.html"><span class="menu-bar__text">
                        <span class="crancy-menu-icon crancy-svg-icon__v1">
                            <svg class="crancy-svg-icon" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                                <path d="M15 10C13.8954 10 13 10.8954 13 12V14C13 15.1046 13.8954 16 15 16C16.1046 16 17 15.1046 17 14V12C17 10.8954 16.1046 10 15 10Z" stroke-width="1.5"></path>
                                <path d="M7 6C5.89543 6 5 6.89543 5 8L5 14C5 15.1046 5.89543 16 7 16C8.10457 16 9 15.1046 9 14V8C9 6.89543 8.10457 6 7 6Z" stroke-width="1.5"></path>
                                <path d="M1 5C1 2.79086 2.79086 1 5 1H17C19.2091 1 21 2.79086 21 5V17C21 19.2091 19.2091 21 17 21H5C2.79086 21 1 19.2091 1 17V5Z" stroke-width="1.5"></path>
                            </svg>
                        </span>
                        <span class="menu-bar__name">Analytics</span></span></a>
                    </li>
                    <li>
                        <a class="collapsed" href="statistics.html"><span class="menu-bar__text">
                        <span class="crancy-menu-icon crancy-svg-icon__v1">
                            <svg class="crancy-svg-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21.8025 10.0128C21.0104 6.08419 17.9158 2.98956 13.9872 2.19745C12.9045 1.97914 12 2.89543 12 4V10C12 11.1046 12.8954 12 14 12H20C21.1046 12 22.0209 11.0955 21.8025 10.0128Z" stroke-width="1.5" stroke-linejoin="round"></path>
                                <path d="M9 4.22314C4.99202 5.1326 2 8.71695 2 13.0001C2 17.9707 6.02944 22.0001 11 22.0001C15.2832 22.0001 18.8675 19.0081 19.777 15.0001" stroke-width="1.5" stroke-linecap="round"></path>
                            </svg>
                        </span>
                        <span class="menu-bar__name">Statistics</span></span></a>
                    </li>
                    <li>
                        <a class="collapsed" href="inbox.html">
                            <span class="menu-bar__text">
                                <span class="crancy-menu-icon crancy-svg-icon__v1">
                                    <svg class="crancy-svg-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 14H16M8 10H12M21.9664 11.2166C21.9886 11.4748 22 11.7361 22 12C22 16.9706 17.9706 21 13 21H6C3.79086 21 2 19.2091 2 17V12C2 7.02944 6.02944 3 11 3H13C13.2639 3 13.5252 3.01136 13.7834 3.03362M22 6C22 7.65685 20.6569 9 19 9C17.3431 9 16 7.65685 16 6C16 4.34315 17.3431 3 19 3C20.6569 3 22 4.34315 22 6Z" stroke-width="1.5" stroke-linecap="round"></path>
                                    </svg>
                                </span>
                                <span class="menu-bar__name">Inbox</span>
                            </span>
                            <div class="crancy-menu-group">
                                <span href="#"><img src="/public/inner/img/inbox-edit.svg"></span>
                                <span href="#"><img src="/public/inner/img/inbox-author.png"></span>
                                <span class="menu-bar__count crancy-color1__bg">5</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#!" class="collapsed" data-bs-toggle="collapse" data-bs-target="#menu-item__apps"><span class="menu-bar__text">
                                <span class="crancy-menu-icon crancy-svg-icon__v1">
                                    <svg class="crancy-svg-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="22" viewBox="0 0 20 22" fill="none">
                                        <path d="M11 4L11 18M11 4C11 2.34315 9.65686 1 8 1L4 1C2.34315 1 1 2.34315 1 4L1 18C1 19.6569 2.34315 21 4 21H8C9.65686 21 11 19.6569 11 18M11 4H12C15.866 4 19 7.13401 19 11C19 14.866 15.866 18 12 18L11 18M11 8H12C13.6569 8 15 9.34315 15 11C15 12.6569 13.6569 14 12 14H11" stroke-width="1.5"></path>
                                    </svg>
                                </span>
                                <span class="menu-bar__name">External</span></span>
                            <span class="crancy__toggle"></span></a>
                        <!-- Dropdown Menu -->
                        <div class="collapse crancy__dropdown" id="menu-item__apps" data-bs-parent="#CrancyMenu">
                            <ul class="menu-bar__one-dropdown">
                                <li>
                                    <a href="user.html"><span class="menu-bar__text"><span class="menu-bar__name">Users</span></span></a>
                                </li>
                                <li>
                                    <a href="products.html"><span class="menu-bar__text"><span class="menu-bar__name">Products</span></span></a>
                                </li>
                                <li>
                                    <a href="add-product.html"><span class="menu-bar__text"><span class="menu-bar__name">Add New Product</span></span></a>
                                </li>
                                <li>
                                    <a href="order-products.html"><span class="menu-bar__text"><span class="menu-bar__name">Product Orders</span></span></a>
                                </li>
                                <li>
                                    <a href="customers.html"><span class="menu-bar__text"><span class="menu-bar__name">Customers</span></span></a>
                                </li>
                                <li>
                                    <a href="add-customer.html"><span class="menu-bar__text"><span class="menu-bar__name">Customer Detail</span></span></a>
                                </li>
                                <li>
                                    <a href="customer-transactions.html"><span class="menu-bar__text"><span class="menu-bar__name">Customer Transaction</span></span></a>
                                </li>
                                <li>
                                    <a href="my-task.html"><span class="menu-bar__text"><span class="menu-bar__name">My Task</span></span></a>
                                </li>
                                <li>
                                    <a href="profile-overview.html"><span class="menu-bar__text"><span class="menu-bar__name">Profile Overview</span></span></a>
                                </li>
                                <li>
                                    <a href="calendar.html"><span class="menu-bar__text"><span class="menu-bar__name">Calendar</span></span></a>
                                </li>
                                <li>
                                    <a href="coming-soon.html"><span class="menu-bar__text"><span class="menu-bar__name">Coming Soon</span></span></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a class="collapsed" href="projects.html"><span class="menu-bar__text">
                        <span class="crancy-menu-icon crancy-svg-icon__v1">
                            <svg class="crancy-svg-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20 22H5C3.34315 22 2 20.6569 2 19V5C2 3.34315 3.34315 2 5 2H15C16.6569 2 18 3.34315 18 5V8M20 22C18.8954 22 18 21.1046 18 20V8M20 22C21.1046 22 22 21.1046 22 20V10C22 8.89543 21.1046 8 20 8H18M6 7H14M6 12H14M6 17H10" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </span>
                        <span class="menu-bar__name">Project</span></span></a>
                    </li>
                    <li>
                        <a class="collapsed" href="integrations.html"><span class="menu-bar__text">
                        <span class="crancy-menu-icon crancy-svg-icon__v1">
                            <svg class="crancy-svg-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M18 2V6M18 6V10M18 6H14M18 6H22M4 10H8C9.10457 10 10 9.10457 10 8V4C10 2.89543 9.10457 2 8 2H4C2.89543 2 2 2.89543 2 4V8C2 9.10457 2.89543 10 4 10ZM10 18C10 20.2091 8.20914 22 6 22C3.79086 22 2 20.2091 2 18C2 15.7909 3.79086 14 6 14C8.20914 14 10 15.7909 10 18ZM16 22H20C21.1046 22 22 21.1046 22 20V16C22 14.8954 21.1046 14 20 14H16C14.8954 14 14 14.8954 14 16V20C14 21.1046 14.8954 22 16 22Z" stroke-width="1.5" stroke-linecap="round"></path>
                            </svg>
                        </span>
                        <span class="menu-bar__name">Integrations</span></span></a>
                    </li>
                    <li>
                        <a class="collapsed" href="notifications.html"><span class="menu-bar__text">
                        <span class="crancy-menu-icon crancy-svg-icon__v1">
                            <svg class="crancy-svg-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="24" viewBox="0 0 20 24" fill="none">
                                <circle cx="15.3" cy="4.3" r="3.3" stroke-width="1.5"></circle>
                                <path d="M8.77889 3.27627C5.68967 3.74266 3.21907 6.29407 2.8476 9.57327L2.46823 12.9222C2.37397 13.7543 2.03671 14.5374 1.50104 15.1679C0.364295 16.5059 1.28689 18.5998 3.01315 18.5998H16.5869C18.3131 18.5998 19.2357 16.5059 18.099 15.1679C17.5633 14.5374 17.226 13.7543 17.1318 12.9222L16.8811 10.7092" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M13.1 20.8C12.6196 22.0817 11.3235 23 9.8 23C8.27647 23 6.98035 22.0817 6.5 20.8" stroke-width="1.5" stroke-linecap="round"></path>
                            </svg>
                        </span>
                        <span class="menu-bar__name">Notifications</span></span><span class="menu-bar__count crancy-color1__bg">7</span></a>
                    </li>
                    <li>
                        <a href="#!" class="collapsed" data-bs-toggle="collapse" data-bs-target="#menu-item__auth"><span class="menu-bar__text">
                            <span class="crancy-menu-icon crancy-svg-icon__v1">
                                <svg class="crancy-svg-icon" width="18" height="22" viewBox="0 0 18 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="8.77778" cy="17.1111" rx="7.77778" ry="3.88889" stroke-width="1.5" stroke-linejoin="round"></ellipse>
                                    <circle cx="8.77843" cy="5.44444" r="4.44444" stroke-width="1.5" stroke-linejoin="round"></circle>
                                </svg>
                            </span>
                            <span class="menu-bar__name">Authentication</span></span>
                            <span class="crancy__toggle"></span>
                        </a>
                        <!-- Dropdown Menu -->
                        <div class="collapse crancy__dropdown" id="menu-item__auth" data-bs-parent="#CrancyMenu">
                            <ul class="menu-bar__one-dropdown">
                                <li>
                                    <a href="login.html"><span class="menu-bar__text"><span class="menu-bar__name">Login</span></span></a>
                                </li>
                                <li>
                                    <a href="sign-up.html"><span class="menu-bar__text"><span class="menu-bar__name">Sign Up</span></span></a>
                                </li>
                                <li>
                                    <a href="forget-password.html"><span class="menu-bar__text"><span class="menu-bar__name">Forgot Password</span></span></a>
                                </li>
                                <li>
                                    <a href="confirm-password.html"><span class="menu-bar__text"><span class="menu-bar__name">Confirm Passowrd</span></span></a>
                                </li>
                                <li>
                                    <a href="changed-password.html"><span class="menu-bar__text"><span class="menu-bar__name">Changed Password</span></span></a>
                                </li>
                                <li>
                                    <a href="email-verification.html"><span class="menu-bar__text"><span class="menu-bar__name">Email Verification</span></span></a>
                                </li>
                                <li>
                                    <a href="password-success.html"><span class="menu-bar__text"><span class="menu-bar__name">Success Password</span></span></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a class="collapsed" href="history.html"><span class="menu-bar__text">
                                <span class="crancy-menu-icon crancy-svg-icon__v1">
                                    <svg class="crancy-svg-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M20.5 13.5C20.5 18.1944 16.6944 22 12 22C7.30558 22 3.5 18.1944 3.5 13.5C3.5 8.80558 7.30558 5 12 5C16.6944 5 20.5 8.80558 20.5 13.5Z" stroke-width="1.5"></path>
                                        <path d="M15 2.41406C14.0463 2.14433 13.04 2 12 2C10.96 2 9.95366 2.14433 9 2.41406" stroke-width="1.5" stroke-linecap="round"></path>
                                        <path d="M13.5 14C13.5 14.8284 12.8284 15.5 12 15.5C11.1716 15.5 10.5 14.8284 10.5 14C10.5 13.1716 11.1716 12.5 12 12.5C12.8284 12.5 13.5 13.1716 13.5 14Z" stroke-width="1.5"></path>
                                        <path d="M12 12V9" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                                <span class="menu-bar__name">History</span></span></a>
                    </li>
                </ul>
            </div>
            <!-- End Nav Menu -->
        </div>

        <div class="crancy-sidebar-padding pd-btm-40">
            <h4 class="admin-menu__title">Help</h4>
            <!-- Nav Menu -->
            <div class="menu-bar">
                <ul class="menu-bar__one crancy-dashboard-menu" id="CrancyMenu">
                    <li>
                        <a href="support-ticket.html" class="collapsed"><span class="menu-bar__text">
                                <span class="crancy-menu-icon crancy-svg-icon__v1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M7 7V5C7 3.89543 7.89543 3 9 3H20C21.1046 3 22 3.89543 22 5V14C22 15.1046 21.1046 16 20 16H15M11 7.5H18M14 11.5H18M5.58579 16.5858C6.36683 17.3668 7.63317 17.3668 8.41421 16.5858C8.78929 16.2107 9.29799 16 9.82843 16H10C11.1046 16 12 16.8954 12 18V19C12 20.1046 11.1046 21 10 21H4C2.89543 21 2 20.1046 2 19V18C2 16.8954 2.89543 16 4 16H4.17157C4.70201 16 5.21071 16.2107 5.58579 16.5858ZM9 12C9 13.1046 8.10457 14 7 14C5.89543 14 5 13.1046 5 12C5 10.8954 5.89543 10 7 10C8.10457 10 9 10.8954 9 12Z" stroke="#191B23" stroke-width="1.5" stroke-linecap="round"></path>
                                    </svg>
                                </span>
                                <span class="menu-bar__name">Support</span></span></a>
                    </li>
                    <li>
                        <a href="profile-info.html" class="collapsed"><span class="menu-bar__text">
                                <span class="crancy-menu-icon crancy-svg-icon__v1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M21.7155 16.134L21.0758 15.7423L21.7155 16.134ZM20.6548 17.866L21.2945 18.2577V18.2577L20.6548 17.866ZM2.28455 7.86602L1.64493 7.47436L1.64493 7.47436L2.28455 7.86602ZM3.34516 6.13397L3.98477 6.52563H3.98477L3.34516 6.13397ZM6.2428 5.40192L6.60138 4.74319L6.60138 4.74319L6.2428 5.40192ZM3.06097 10.5981L2.70238 11.2568H2.70238L3.06097 10.5981ZM17.7572 18.5981L17.3986 19.2568H17.3986L17.7572 18.5981ZM20.939 13.4019L20.5805 14.0606L20.939 13.4019ZM3.34515 17.866L2.70554 18.2577H2.70554L3.34515 17.866ZM2.28454 16.134L2.92415 15.7423L2.92415 15.7423L2.28454 16.134ZM20.6548 6.13398L21.2945 5.74232V5.74232L20.6548 6.13398ZM21.7155 7.86603L21.0758 8.25769V8.25769L21.7155 7.86603ZM20.939 10.5981L21.2976 11.2568H21.2976L20.939 10.5981ZM17.7572 5.40193L18.1158 6.06066V6.06066L17.7572 5.40193ZM3.06096 13.4019L3.41955 14.0607H3.41955L3.06096 13.4019ZM6.24279 18.5981L5.88422 17.9394L5.88421 17.9394L6.24279 18.5981ZM17.6445 5.46331L17.2859 4.80458V4.80458L17.6445 5.46331ZM6.35556 5.4633L5.99697 6.12202H5.99697L6.35556 5.4633ZM17.6445 18.5367L18.003 17.878L18.003 17.878L17.6445 18.5367ZM6.35556 18.5367L6.71413 19.1954L6.71414 19.1954L6.35556 18.5367ZM10.9394 2.75H13.0606V1.25H10.9394V2.75ZM13.0606 21.25H10.9394V22.75H13.0606V21.25ZM10.9394 21.25C10.1399 21.25 9.56817 20.6494 9.56817 20H8.06817C8.06817 21.5598 9.39585 22.75 10.9394 22.75V21.25ZM14.4318 20C14.4318 20.6494 13.8601 21.25 13.0606 21.25V22.75C14.6042 22.75 15.9318 21.5598 15.9318 20H14.4318ZM13.0606 2.75C13.8601 2.75 14.4318 3.35061 14.4318 4H15.9318C15.9318 2.44025 14.6041 1.25 13.0606 1.25V2.75ZM10.9394 1.25C9.39585 1.25 8.06817 2.44025 8.06817 4H9.56817C9.56817 3.35061 10.1399 2.75 10.9394 2.75V1.25ZM21.0758 15.7423L20.0152 17.4744L21.2945 18.2577L22.3551 16.5256L21.0758 15.7423ZM2.92416 8.25768L3.98477 6.52563L2.70554 5.74231L1.64493 7.47436L2.92416 8.25768ZM3.98477 6.52563C4.35198 5.92594 5.20337 5.69002 5.88421 6.06064L6.60138 4.74319C5.25309 4.00924 3.50985 4.42882 2.70554 5.74231L3.98477 6.52563ZM3.41955 9.93934C2.7621 9.58146 2.57418 8.82922 2.92416 8.25768L1.64493 7.47436C0.823397 8.81599 1.3307 10.5101 2.70238 11.2568L3.41955 9.93934ZM20.0152 17.4744C19.648 18.074 18.7966 18.31 18.1158 17.9393L17.3986 19.2568C18.7469 19.9907 20.4902 19.5712 21.2945 18.2577L20.0152 17.4744ZM22.3551 16.5256C23.1766 15.184 22.6693 13.4899 21.2976 12.7432L20.5805 14.0606C21.2379 14.4185 21.4258 15.1708 21.0758 15.7423L22.3551 16.5256ZM3.98476 17.4744L2.92415 15.7423L1.64493 16.5256L2.70554 18.2577L3.98476 17.4744ZM20.0152 6.52564L21.0758 8.25769L22.3551 7.47437L21.2945 5.74232L20.0152 6.52564ZM21.0758 8.25769C21.4258 8.82923 21.2379 9.58147 20.5805 9.93936L21.2976 11.2568C22.6693 10.5101 23.1766 8.816 22.3551 7.47437L21.0758 8.25769ZM18.1158 6.06066C18.7966 5.69004 19.648 5.92596 20.0152 6.52564L21.2945 5.74232C20.4902 4.42884 18.7469 4.00926 17.3986 4.74321L18.1158 6.06066ZM2.92415 15.7423C2.57417 15.1708 2.7621 14.4185 3.41955 14.0607L2.70238 12.7432C1.3307 13.4899 0.823395 15.184 1.64493 16.5256L2.92415 15.7423ZM2.70554 18.2577C3.50985 19.5712 5.25309 19.9908 6.60138 19.2568L5.88421 17.9394C5.20337 18.31 4.35198 18.0741 3.98476 17.4744L2.70554 18.2577ZM18.003 6.12203L18.1158 6.06066L17.3986 4.74321L17.2859 4.80458L18.003 6.12203ZM5.88421 6.06064L5.99697 6.12202L6.71414 4.80457L6.60138 4.74319L5.88421 6.06064ZM18.1158 17.9393L18.003 17.878L17.2859 19.1954L17.3986 19.2568L18.1158 17.9393ZM5.99698 17.878L5.88422 17.9394L6.60137 19.2568L6.71413 19.1954L5.99698 17.878ZM2.70238 11.2568C3.2912 11.5773 3.29121 12.4227 2.70238 12.7432L3.41955 14.0607C5.05215 13.1719 5.05215 10.8281 3.41955 9.93934L2.70238 11.2568ZM6.71414 19.1954C7.32456 18.8631 8.06817 19.305 8.06817 20H9.56817C9.56817 18.167 7.60692 17.0016 5.99697 17.878L6.71414 19.1954ZM15.9318 20C15.9318 19.305 16.6755 18.8631 17.2859 19.1954L18.003 17.878C16.3931 17.0016 14.4318 18.167 14.4318 20H15.9318ZM21.2976 12.7432C20.7088 12.4227 20.7088 11.5773 21.2976 11.2568L20.5805 9.93936C18.9479 10.8281 18.9479 13.1719 20.5805 14.0606L21.2976 12.7432ZM5.99697 6.12202C7.60692 6.99841 9.56817 5.83303 9.56817 4H8.06817C8.06817 4.695 7.32456 5.13686 6.71414 4.80457L5.99697 6.12202ZM17.2859 4.80458C16.6755 5.13687 15.9318 4.69501 15.9318 4H14.4318C14.4318 5.83303 16.3931 6.99842 18.003 6.12203L17.2859 4.80458ZM14.5833 12C14.5833 13.4267 13.4267 14.5833 12 14.5833V16.0833C14.2552 16.0833 16.0833 14.2552 16.0833 12H14.5833ZM12 14.5833C10.5733 14.5833 9.41668 13.4267 9.41668 12H7.91668C7.91668 14.2552 9.74485 16.0833 12 16.0833V14.5833ZM9.41668 12C9.41668 10.5733 10.5733 9.41667 12 9.41667V7.91667C9.74485 7.91667 7.91668 9.74484 7.91668 12H9.41668ZM12 9.41667C13.4267 9.41667 14.5833 10.5733 14.5833 12H16.0833C16.0833 9.74484 14.2552 7.91667 12 7.91667V9.41667Z" fill="#191B23"></path>
                                    </svg>
                                </span>
                                <span class="menu-bar__name">Settings</span></span></a>
                    </li>
                    <li>
                        <a href="<?= site_url('logout') ?>" class="collapsed"><span class="menu-bar__text">
                                <span class="crancy-menu-icon crancy-svg-icon__v1">
                                    <svg class="crancy-svg-icon" xmlns="http://www.w3.org/2000/svg" width="22" height="18" viewBox="0 0 22 18" fill="none">
                                        <path d="M19 11L20.2929 9.70711C20.6834 9.31658 20.6834 8.68342 20.2929 8.29289L19 7" stroke="#191B23" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M20 9H12M5 17C2.79086 17 1 15.2091 1 13V5C1 2.79086 2.79086 1 5 1M5 17C7.20914 17 9 15.2091 9 13V5C9 2.79086 7.20914 1 5 1M5 17H13C15.2091 17 17 15.2091 17 13M5 1H13C15.2091 1 17 2.79086 17 5" stroke="#191B23" stroke-width="1.5" stroke-linecap="round"></path>
                                    </svg>
                                </span>
                                <span class="menu-bar__name">Logout</span></span></a>
                    </li>
                </ul>
            </div>
            <!-- End Nav Menu -->
            <!-- Support Card -->
            <div class="crancy-support-card crancy-bg-cover" style="background-image: url('/public/inner/img/support-bg.png')">
                <div class="crancy-support-card__sing">
                    <img src="/public/inner/img/support-sign-icon.svg">
                </div>
                <h4 class="crancy-support-card__title">Help Center</h4>
                <p class="crancy-support-card__text">
                    Having trouble Dashboard? Please contact us for more question?
                </p>
                <a href="support-ticket.html" class="crancy-btn crancy-ybcolor mg-top-20">Go To Help Center</a>
            </div>
            <!-- End Support Card -->
        </div>
    </div>
    <!-- End Admin Menu -->
