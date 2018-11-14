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

                                        ROLE HERE

                                    @endif
                                </p>

                            </a>
                        </div>
                    </div>


                    <ul id="mainnav-menu" class="list-group">

                        <!--Menu list item-->
                        <li {!! checkActiveLink('dashboard') !!}>
                            <a href="{{route('dashboard')}}">
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
                                <li {!! checkActiveLinkExact('entities.clients') !!}><a href="">All</a></li>
                                <li {!! checkActiveLink('entities.clients.active') !!}><a href="">Active</a></li>
                                <li {!! checkActiveLink('entities.clients.dormant') !!}><a href="">Dormant</a></li>
                                <li {!! checkActiveLink('entities.clients.flagged') !!}><a href="">Flagged</a></li>
                            </ul>
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