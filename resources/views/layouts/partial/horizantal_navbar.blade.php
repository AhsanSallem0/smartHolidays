<div class="hk-menu">
    <!-- Brand -->
    <div class="menu-header d-xl-none">
        <span>
            <a class="navbar-brand" href="{{url('/home')}}">
                <img class="brand-img img-fluid" style="width: 50%;" src="{{asset('asset/dist/img/logo-light.png')}}" alt="brand" />
            </a>
            <button class="btn btn-icon btn-rounded btn-flush-dark flush-soft-hover navbar-toggle">
                <span class="icon">
                    <span class="svg-icon fs-5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-bar-to-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <line x1="10" y1="12" x2="20" y2="12"></line>
                            <line x1="10" y1="12" x2="14" y2="16"></line>
                            <line x1="10" y1="12" x2="14" y2="8"></line>
                            <line x1="4" y1="4" x2="4" y2="20"></line>
                        </svg>
                    </span>
                </span>
            </button>
        </span>
    </div>
    <!-- /Brand -->

    <!-- Main Menu -->
    <?php $role = Auth::user()->role_as; ?>
    @if($role == 0)
    <div data-simplebar class="nicescroll-bar">
        <div class="menu-content-wrap">
            <div class="container-fluid menu-group">
                <ul class="navbar-nav flex-column">
                    <li class="nav-item {{ Request::is('home') ? 'active':'',}}">
                        <a class="nav-link" href="{{url('/home')}}">
                            <span class="nav-icon-wrap">
                                <span class="svg-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-template" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <rect x="4" y="4" width="16" height="4" rx="1" />
                                        <rect x="4" y="12" width="6" height="8" rx="1" />
                                        <line x1="14" y1="12" x2="20" y2="12" />
                                        <line x1="14" y1="16" x2="20" y2="16" />
                                        <line x1="14" y1="20" x2="20" y2="20" />
                                    </svg>
                                </span>
                            </span>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link" href="{{url('/ticket')}}">
                            <span class="nav-icon-wrap">
                                <span class="svg-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-inbox" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <rect x="4" y="4" width="16" height="16" rx="2" />
                                        <path d="M4 13h3l3 3h4l3 -3h3" />
                                    </svg>
                                </span>
                            </span>
                            <span class="nav-link-text">Tickets</span>
                        </a>
                    </li>

                    <!-- <li class="nav-item">
                        <a class="nav-link" href="email.html">
                            <span class="nav-icon-wrap">
                                <span class="svg-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-inbox" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <rect x="4" y="4" width="16" height="16" rx="2" />
                                        <path d="M4 13h3l3 3h4l3 -3h3" />
                                    </svg>
                                </span>
                            </span>
                            <span class="nav-link-text">Ticket</span>
                        </a>
                    </li> -->

                    <li class="nav-item {{ Request::is('customer') ? 'active':'',}}">
                        <a class="nav-link" href="{{url('/customer')}}">
                            <span class="nav-icon-wrap">
                                <span class="svg-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-inbox" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <rect x="4" y="4" width="16" height="16" rx="2" />
                                        <path d="M4 13h3l3 3h4l3 -3h3" />
                                    </svg>
                                </span>
                            </span>
                            <span class="nav-link-text">Customers</span>
                        </a>
                    </li>

                    <li class="nav-item">
                    <a class="nav-link" href="{{url('/expense')}}">
                            <span class="nav-icon-wrap">
                                <span class="svg-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-inbox" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <rect x="4" y="4" width="16" height="16" rx="2" />
                                        <path d="M4 13h3l3 3h4l3 -3h3" />
                                    </svg>
                                </span>
                            </span>
                            <span class="nav-link-text">Expenses</span>
                        </a>
                    </li>


                    <!-- <li class="nav-item">
                    <a class="nav-link" href="{{url('/supplier')}}">
                            <span class="nav-icon-wrap">
                                <span class="svg-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-inbox" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <rect x="4" y="4" width="16" height="16" rx="2" />
                                        <path d="M4 13h3l3 3h4l3 -3h3" />
                                    </svg>
                                </span>
                            </span>
                            <span class="nav-link-text">Supplier</span>
                        </a>
                    </li> -->

                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/employee')}}">
                            <span class="nav-icon-wrap">
                                <span class="svg-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-inbox" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <rect x="4" y="4" width="16" height="16" rx="2" />
                                        <path d="M4 13h3l3 3h4l3 -3h3" />
                                    </svg>
                                </span>
                            </span>
                            <span class="nav-link-text">Employee</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/target')}}">
                            <span class="nav-icon-wrap">
                                <span class="svg-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-inbox" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <rect x="4" y="4" width="16" height="16" rx="2" />
                                        <path d="M4 13h3l3 3h4l3 -3h3" />
                                    </svg>
                                </span>
                            </span>
                            <span class="nav-link-text">Targets</span>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/report')}}">
                            <span class="nav-icon-wrap">
                                <span class="svg-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-inbox" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <rect x="4" y="4" width="16" height="16" rx="2" />
                                        <path d="M4 13h3l3 3h4l3 -3h3" />
                                    </svg>
                                </span>
                            </span>
                            <span class="nav-link-text">Report</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    @else
    <div data-simplebar class="nicescroll-bar">
        <div class="menu-content-wrap">
            <div class="container-fluid menu-group">
                <ul class="navbar-nav flex-column">
                    <li class="nav-item {{ Request::is('home') ? 'active':'',}}">
                        <a class="nav-link" href="{{url('/home')}}">
                            <span class="nav-icon-wrap">
                                <span class="svg-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-template" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <rect x="4" y="4" width="16" height="4" rx="1" />
                                        <rect x="4" y="12" width="6" height="8" rx="1" />
                                        <line x1="14" y1="12" x2="20" y2="12" />
                                        <line x1="14" y1="16" x2="20" y2="16" />
                                        <line x1="14" y1="20" x2="20" y2="20" />
                                    </svg>
                                </span>
                            </span>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link" href="{{url('/ticket')}}">
                            <span class="nav-icon-wrap">
                                <span class="svg-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-inbox" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <rect x="4" y="4" width="16" height="16" rx="2" />
                                        <path d="M4 13h3l3 3h4l3 -3h3" />
                                    </svg>
                                </span>
                            </span>
                            <span class="nav-link-text">Tickets</span>
                        </a>
                    </li>

                    <!-- <li class="nav-item">
                        <a class="nav-link" href="email.html">
                            <span class="nav-icon-wrap">
                                <span class="svg-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-inbox" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <rect x="4" y="4" width="16" height="16" rx="2" />
                                        <path d="M4 13h3l3 3h4l3 -3h3" />
                                    </svg>
                                </span>
                            </span>
                            <span class="nav-link-text">Ticket</span>
                        </a>
                    </li> -->

                    <li class="nav-item {{ Request::is('customer') ? 'active':'',}}">
                        <a class="nav-link" href="{{url('/customer')}}">
                            <span class="nav-icon-wrap">
                                <span class="svg-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-inbox" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <rect x="4" y="4" width="16" height="16" rx="2" />
                                        <path d="M4 13h3l3 3h4l3 -3h3" />
                                    </svg>
                                </span>
                            </span>
                            <span class="nav-link-text">Customers</span>
                        </a>
                    </li>

                    <!-- <li class="nav-item">
                    <a class="nav-link" href="{{url('/expense')}}">
                            <span class="nav-icon-wrap">
                                <span class="svg-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-inbox" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <rect x="4" y="4" width="16" height="16" rx="2" />
                                        <path d="M4 13h3l3 3h4l3 -3h3" />
                                    </svg>
                                </span>
                            </span>
                            <span class="nav-link-text">Expenses</span>
                        </a>
                    </li> -->


                    <!-- <li class="nav-item">
                    <a class="nav-link" href="{{url('/supplier')}}">
                            <span class="nav-icon-wrap">
                                <span class="svg-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-inbox" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <rect x="4" y="4" width="16" height="16" rx="2" />
                                        <path d="M4 13h3l3 3h4l3 -3h3" />
                                    </svg>
                                </span>
                            </span>
                            <span class="nav-link-text">Supplier</span>
                        </a>
                    </li> -->

                    <!-- <li class="nav-item">
                        <a class="nav-link" href="{{url('/employee')}}">
                            <span class="nav-icon-wrap">
                                <span class="svg-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-inbox" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <rect x="4" y="4" width="16" height="16" rx="2" />
                                        <path d="M4 13h3l3 3h4l3 -3h3" />
                                    </svg>
                                </span>
                            </span>
                            <span class="nav-link-text">Employee</span>
                        </a>
                    </li> -->

                    <!-- <li class="nav-item">
                        <a class="nav-link" href="{{url('/target')}}">
                            <span class="nav-icon-wrap">
                                <span class="svg-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-inbox" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <rect x="4" y="4" width="16" height="16" rx="2" />
                                        <path d="M4 13h3l3 3h4l3 -3h3" />
                                    </svg>
                                </span>
                            </span>
                            <span class="nav-link-text">Targets</span>
                        </a>
                    </li> -->


                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/report')}}">
                            <span class="nav-icon-wrap">
                                <span class="svg-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-inbox" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <rect x="4" y="4" width="16" height="16" rx="2" />
                                        <path d="M4 13h3l3 3h4l3 -3h3" />
                                    </svg>
                                </span>
                            </span>
                            <span class="nav-link-text">Report</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    @endif
    <!-- /Main Menu -->
</div>
<div id="hk_menu_backdrop" class="hk-menu-backdrop"></div>
