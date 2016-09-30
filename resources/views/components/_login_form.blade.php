<h3 class="header smaller lighter white">
    <i class="ace-icon fa fa-sign-in white"></i>
    Login
</h3>

{{--<form action="/login" id="logoutForm" method="post">--}}
{{--<input name="__RequestVerificationToken" type="hidden" value="yTxkxV0LZXeD5SiqjevwyHYjLxevpPLL-2JOBJJQcPV5NnERAXXQ9wGrU0xsMQY9UgkkNWbhMLL5GTETAq9qJ4BVeCVPp08wiDXKTun8quw1" />        <div class="navbar-buttons navbar-header pull-right  collapse navbar-collapse" role="navigation">--}}
{{--<ul class="nav ace-nav">--}}
{{--<li class="transparent hidden-320"><input class="nav-login-input" id="email" name="email" placeholder="E-mail" type="text" value="" /></li>--}}
{{--<li class="transparent hidden-320 pass_w"><input class="nav-pass-input" id="password" name="password" placeholder="Password" type="password" value="" /> </li>--}}

{{--<li class="transparent sign-in"><a data-type="submit" href="account/Login" title="Singnin">Sign in</a></li>--}}
{{--<li class="transparent sign-up"><a href="account/Register" id="registerLink" title="New Account Registration">Sign up</a></li>--}}
{{--</ul>--}}
{{--</div>--}}
{{--</form>--}}

<form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

        <div class="col-xs-12 col-md-12">
            <input id="email" type="email" class="form-control" placeholder="E-mail" name="email" value="{{ old('email') }}">

            @if ($errors->has('email'))
                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

        <div class="col-xs-12 col-md-12">
            <input id="password" type="password" class="form-control" placeholder="Password" name="password">

            @if ($errors->has('password'))
                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <div class="col-xs-12 col-md-11 col-md-offset-1">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember"> Remember Me
                </label>
            </div>
        </div>
    </div>

    <div class="col-xs-4 col-md-6" style="padding-left: 0;">
        <button type="submit" class="sign-in">
            Sign In
        </button>
    </div>
    <div class="col-xs-4 col-md-6">
        <a href="/register"  type="submit" class="sign-up">
            Sign Up
        </a>
    </div>

    <a class="btn btn-link white-text" style="visibility: hidden;" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
</form>