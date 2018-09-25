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


    <!--=================================================-->


    <!--Page Load Progress Bar [ OPTIONAL ]-->
    <link href="{{assetUrl('css/pace.min.css')}}" rel="stylesheet">
    <script src="{{assetUrl('js/pace.min.js')}}"></script>

</head>


<body>
<div id="container" class="cls-container">

    <!-- BACKGROUND IMAGE -->
    <!--===================================================-->
    <div id="bg-overlay" class="bg-img"></div>


    <!-- LOGIN FORM -->
    <!--===================================================-->

    @yield('content')

    <!--===================================================-->


</div>
<!--===================================================-->
<!-- END OF CONTAINER -->


</body>
</html>