<!--MAIN NAVIGATION-->
<!--===================================================-->
<nav id="mainnav-container">

    <div id="mainnav">


        <!--Menu-->
        <!--================================-->
        <div id="mainnav-menu-wrap">
            <div class="nano">
                <div class="nano-content">

                    <!--Profile Widget-->
                    <!--================================-->
                    <div id="mainnav-profile" class="mainnav-profile">
                        <div class="profile-wrap text-center">

                            <a class="box-block" data-toggle="collapse"
                               aria-expanded="false">

                                <p class="mnp-name">
                                    @if(auth()->check())

                                        {{auth()->user()->roleName()}}

                                    @endif
                                </p>

                            </a>
                        </div>
                    </div>


                    <ul id="mainnav-menu" class="list-group">

                        <!--Menu list item-->
                        <li {!! checkActiveLink('home') !!}>
                            <a href="{{route('home')}}">
                                <i class="pli-dashboard"></i>
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </li>

                        <li class="list-divider"></li>
                        <!--Category name-->
                        <li class="list-header">Entities Management</li>


                        <!--Menu list item-->
                        <li  {!! checkActiveGroupLink(['entities.clients','entities.clients.active','entities.clients.dormant', 'entities.clients.flagged']) !!}>
                            <a href="#">
                                <i class="pli-administrator"></i>
                                <span class="menu-title">Clients</span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse">
                                <li {!! checkActiveLinkExact('entities.clients') !!}><a href="{{route('entities.clients')}}">All</a></li>
                                <li {!! checkActiveLink('entities.clients.active') !!}><a href="{{route('entities.clients.active')}}">Active</a></li>
                                <li {!! checkActiveLink('entities.clients.dormant') !!}><a href="{{route('entities.clients.dormant')}}">Dormant</a></li>
                                <li {!! checkActiveLink('entities.clients.flagged') !!}><a href="{{route('entities.clients.flagged')}}">Flagged</a></li>
                            </ul>
                        </li>




                        <li {!! checkActiveLink('entities.agents') !!}>
                            <a href="{{route('entities.agents')}}">
                                <i class="pli-worker"></i>
                                <span class="menu-title">Agents</span>
                            </a>
                        </li>


                        <li class="list-divider"></li>
                        <!--Category name-->
                        <li class="list-header">Refund Management</li>

                        <!--Menu list item-->
                        <li>
                            <a href="#">
                                <i class="pli-money-2"></i>
                                <span class="menu-title">Requests</span>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="pli-money-2"></i>
                                <span class="menu-title">Successful Transactions</span>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="pli-money-2"></i>
                                <span class="menu-title">Failed Transactions</span>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="pli-money-2"></i>
                                <span class="menu-title">Flagged Transactions</span>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="pli-building"></i>
                                <span class="menu-title">Centers</span>
                            </a>
                        </li>


                        <li class="list-divider"></li>
                        <!--Category name-->
                        <li class="list-header">Stock Control</li>

                        <!--Menu list item-->
                        <li>
                            <a href="#">
                                <i class="pli-chip"></i>
                                <span class="menu-title">Bags</span>
                            </a>
                        </li>


                        <li class="list-divider"></li>
                        <!--Category name-->
                        <li class="list-header">Analytics</li>

                        <!--Menu list item-->
                        <li>
                            <a href="#">
                                <i class="pli-data"></i>
                                <span class="menu-title">Analytics</span>
                            </a>
                        </li>


                        <li class="list-divider"></li>
                        <!--Category name-->
                        <li class="list-header">Configuration Management</li>

                        <!--Menu list item-->
                        <li>
                            <a href="#">
                                <i class="pli-gear"></i>
                                <span class="menu-title">System</span>
                            </a>
                        </li>

                        <!--Menu list item-->
                        <li>
                            <a href="#">
                                <i class="pli-smartphone"></i>
                                <span class="menu-title">App</span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse">
                                <li><a href="#">Refund Instructions</a></li>
                                <li><a href="#">Terms</a></li>
                                <li><a href="#">Keys</a></li>
                            </ul>
                        </li>


                        <!--Menu list item-->
                        <li>
                            <a href="#">
                                <i class="pli-monitor-2"></i>
                                <span class="menu-title">Portal</span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse">
                                <li><a href="#">Users</a></li>
                                <li><a href="#">Roles</a></li>
                                <li><a href="#">Permissions</a></li>
                            </ul>
                        </li>


                        <li class="list-divider"></li>
                        <!--Category name-->
                        <li class="list-header">My account</li>

                        <!--Menu list item-->
                        <li>
                            <a href="#">
                                <i class="pli-lock"></i>
                                <span class="menu-title">Change Password</span>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="pli-profile"></i>
                                <span class="menu-title">Profile</span>
                            </a>
                        </li>

                    </ul>


                </div>
            </div>
        </div>
        <!--================================-->
        <!--End menu-->

    </div>
</nav>
<!--===================================================-->
<!--END MAIN NAVIGATION-->