<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>@yield('title') | {{config('app.name')}}</title>


    <!--STYLESHEET-->
    <!--=================================================-->

    <!--Open Sans Font [ OPTIONAL ] -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;subset=latin" rel="stylesheet">


    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="{{assetUrl('css/bootstrap.min.css')}}" rel="stylesheet">


    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="{{assetUrl('css/nifty.min.css')}}" rel="stylesheet">

    <!--Premium Icons [ OPTIONAL ]-->
    <link href="{{assetUrl('premium/icon-sets/icons/line-icons/premium-line-icons.min.css')}}" rel="stylesheet">
    <link href="{{assetUrl('premium/icon-sets/icons/solid-icons/premium-solid-icons.min.css')}}" rel="stylesheet">


    <!--=================================================-->


    <!--Page Load Progress Bar [ OPTIONAL ]-->
    <link href="{{assetUrl('css/pace.min.css')}}" rel="stylesheet">
    <script src="{{assetUrl('js/pace.min.js')}}"></script>

    <!--Additional Header Includes [ OPTIONAL ]-->
    @yield('headers')

</head>

<body>
<div id="container" class="effect aside-float aside-bright mainnav-lg">

    <!--NAVBAR-->
    <!--===================================================-->
    <header id="navbar">
        <div id="navbar-container" class="boxed">

            <!--Brand logo & name-->
            <!--================================-->
            <div class="navbar-header">
                <a href="{{route('home')}}" class="navbar-brand">

                    <div class="brand-title">
                        <span class="brand-text">{{config('app.name')}}</span>
                    </div>
                </a>
            </div>
            <!--================================-->
            <!--End brand logo & name-->


            <!--Navbar Dropdown-->
            <!--================================-->
            @include('layouts.includes.navbar')
            <!--================================-->
            <!--End Navbar Dropdown-->

        </div>
    </header>
    <!--===================================================-->
    <!--END NAVBAR-->

    <div class="boxed">

        <!--CONTENT CONTAINER-->
        <!--===================================================-->
        <div id="content-container">

            <div id="page-head">

                <!--Page Title-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <div id="page-title">
                    <h1 class="page-header text-overflow">@yield('title')</h1>
                </div>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End page title-->


                <!--Breadcrumb-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                @include('layouts.includes.breadcrumb')
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End breadcrumb-->


            </div>


            <!--Page content-->
            <!--===================================================-->
            <div id="page-content">
                @yield('content')
            </div>
            <!--===================================================-->
            <!--End page content-->


        </div>
        <!--===================================================-->
        <!--END CONTENT CONTAINER-->


        @include('layouts.includes.sidemenu')


    </div>


    <!-- FOOTER -->
    <!--===================================================-->
    <footer id="footer">

        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <!-- Remove the class "show-fixed" and "hide-fixed" to make the content always appears. -->
        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

        <p class="pad-lft">&#0169; 2018 {{config('app.name')}}</p>


    </footer>
    <!--===================================================-->
    <!-- END FOOTER -->


    <!-- SCROLL PAGE BUTTON -->
    <!--===================================================-->
    <button class="scroll-top btn">
        <i class="pci-chevron chevron-up"></i>
    </button>
    <!--===================================================-->
</div>
<!--===================================================-->
<!-- END OF CONTAINER -->


<!--JAVASCRIPT-->
<!--=================================================-->

<!--jQuery [ REQUIRED ]-->
<script src="{{assetUrl('js/jquery.min.js')}}"></script>


<!--BootstrapJS [ RECOMMENDED ]-->
<script src="{{assetUrl('js/bootstrap.min.js')}}"></script>


<!--Nifty Admin [ RECOMMENDED ]-->
<script src="{{assetUrl('js/nifty.min.js')}}"></script>

<!--Additional Footer Includes [ OPTIONAL ]-->
@yield('footer')

</body>
</html>