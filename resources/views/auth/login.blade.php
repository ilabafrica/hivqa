@extends('NEW_THEME.layouts.auth')

@section('title', 'Login')

@section('content')
    <div class="cls-content">
        <div class="cls-content-sm panel">
            <div class="panel-body">

                <div class="mar-ver pad-btm">

                    <img class="img-circle img-lg" src="{{asset('logo.png')}}" alt="Logo">

                    <p>Access to the administration portal</p>
                </div>

                <form method="POST" action="{{ route('login') }}">

                    {{ csrf_field() }}

                    <div class="form-group">

                        <input type="text" class="form-control" name="email" value="{{ old('email') }}"
                               placeholder="Email" required autofocus>

                        @if ($errors->has('email'))
                            <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group">

                        <input type="password" class="form-control" name="password" placeholder="Password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                             <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="checkbox pad-btm text-left">
                        <input id="remember-me-checkbox" class="magic-checkbox" type="checkbox"
                               name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember-me-checkbox">Remember me</label>
                    </div>
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Sign In</button>
                </form>
            </div>

            <div class="pad-all">
                <a href="{{ route('password.request') }}" class="btn-link mar-rgt">Forgot password ?</a>
                {{--<a href="#" class="btn-link mar-lft">Create a new account</a>--}}
            </div>
        </div>
    </div>

@endsection
