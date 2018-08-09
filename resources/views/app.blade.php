<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ Config::get('logbook.name') }}</title>

    <!-- Font awesome css -->
    <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}">

    <!-- Bootstrap Core CSS -->
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ URL::asset('admin/css/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ URL::asset('admin/css/sb-admin-2.css') }}" rel="stylesheet">

    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/css/dataTables.bootstrap.css') }}" />
    <!-- Datepicker -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/css/datepicker.css') }}" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
    <script src="{{ URL::asset('admin/js/jquery.min.js') }}"></script>
</head>
<body>
	<nav class="navbar navbar-inverse" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">{{ Config::get('logbook.name') }}</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="{{ url('/') }}"> Home</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
                        <li><a href="{{ url('/auth/login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
						<li><a href="{{ url('/auth/register') }}" style="display:none;"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> {{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('#') }}"><span class="glyphicon glyphicon-user"></span> User Profile</a></li>
                                <li><a href="{{ url('#') }}"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
                                <li class="divider"></li>
                                <li><a href="{{ url('/auth/logout') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

	<div class="container-fluid">        	
	    @if (!Auth::guest())
	    <div class="col-sm-2">
	        <aside class="left-panel">
		    	<nav class="navigation">
		            <ul class="list-unstyled">
		            	<li>
				            <a href="{!! url('survey') !!}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
				        </li>
				        <li>
				            <a href="{!! url('user') !!}"><i class="fa fa-user"></i> Users<span class="fa arrow"></span></a>		            
				        </li>
		            </ul>
		        </nav>
	      	</aside>
	    </div>
			@endif
	    <div class="col-sm-10">
	        @yield('content')
	    </div>
    </div>

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<!-- Use vue to load frontend -->
    <script src="{{ asset('js/vue.js') }}"></script>
    <!-- use vue resource to communicate to api using Vue.http-->
    <script src="{{ asset('js/vue-resource.min.js') }}"></script>

    <script src="{{ asset('js/vee-validate.js') }}"></script>
    <script>
        Vue.use(VeeValidate); // good to go. 
    </script>

     <!--Check which view is loading to load its vuejs -->
    @if(Request::segment(1)==strtolower('user'))
    <script src="{{ asset('controllers/user.js') }}"></script>
    @endif

</body>
</html>
