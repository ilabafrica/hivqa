<div class="navbar-content clearfix">

    <ul class="nav navbar-top-links">


        <!--User dropdown-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <li id="dropdown-user" class="dropdown">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                                <span class="ic-user pull-right">
                                    <i class="pli-male"></i>
                                </span>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--You can also display a user name in the navbar.-->
                <div class="username hidden-xs">

                    @if(auth()->check())

                        {{auth()->user()->name()}}

                    @endif

                </div>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            </a>


            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right panel-default">
                <ul class="head-list">
                    <li>
                        <a href="#"><i class="pli-profile icon-lg icon-fw"></i> Profile</a>
                    </li>
                    <li>
                        <form action="{{route('logout')}}" method="POST" name="logOutForm">
                            {{ csrf_field() }}
                            <a href="#" onclick="document.logOutForm.submit();"><i
                                        class="pli-unlock icon-lg icon-fw"></i> Logout</a>
                        </form>
                    </li>
                </ul>
            </div>
        </li>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End user dropdown-->

    </ul>
</div>