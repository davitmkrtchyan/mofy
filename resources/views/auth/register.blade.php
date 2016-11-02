@extends('layouts.app_forms')
@section('content')

    <div id="signup-box" class="signup-box widget-box no-border visible">
        <div class="widget-body">
            <div class="widget-main">
                <h4 class="header green lighter bigger">
                    <i class="ace-icon fa fa-users blue"></i>
                    New User Registration
                </h4>

                <div class="space-6"></div>
                <p> Enter your details to begin: </p>
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                    {{ csrf_field() }}

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}
                        <div class="validation-summary-valid text-danger" data-valmsg-summary="true">
                            <ul>
                                <li style="display:none"></li>
                            </ul>
                        </div>
                        <input id="Country" name="Country" type="hidden" value="AM" />
                        <input id="GMT" name="GMT" type="hidden" value="4" />
                        <fieldset>
                            <!--*******************************************-->

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                {{--<label for="name" class="col-md-4 control-label">Name</label>--}}

                                <div class="col-md-12 icon-container input-icon input-icon-right">
                                    <i class="ace-icon fa fa-user"></i>
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                                @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                {{--<label for="email" class="col-md-4 control-label">E-Mail Address</label>--}}

                                <div class="col-md-12 icon-container input-icon input-icon-right">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                    <i class="ace-icon fa fa-envelope-o"></i>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                {{--<label for="password" class="col-md-4 control-label">Password</label>--}}

                                <div class="col-md-12 icon-container input-icon input-icon-right">
                                    <input id="password" type="password" class="form-control" name="password" required>
                                    <i class="ace-icon fa fa-unlock-alt"></i>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}" required>
                                {{--<label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>--}}

                                <div class="col-md-12 icon-container input-icon input-icon-right">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                    <i class="ace-icon fa fa-unlock"></i>
                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                            <label class="block clearfix">
                                <!--   <input type="checkbox" class="ace ace-switch" checked=&quot;checked&quot; value="true" name="Gender" />
                                <span class="lbl" data-lbl="Male&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Female"></span> -->
                                <input type="radio" name="male" value="male" required><label class="ace-icon fa fa-male"> Male</label>
                                <input type="radio" name="male" value="female"><label class="ace-icon fa fa-female"> Female</label>

                            </label>
                            <label class="block">
                                <input type="checkbox" class="ace"  value="true" name="TermsOfUse" required/>
                                <span class="lbl">
                            I accept the
                            <a href="/" class="blue-text">User Agreement</a>
                            </span>
                            </label>


                            <div class="space-4"></div>

                            <div class="clearfix">
                                <button type="reset" class="width-30 pull-left btn btn-sm">
                                    <i class="ace-icon fa fa-refresh"></i>
                                    <span class="bigger-110">Reset</span>
                                </button>

                                <button type="submit" class="width-65 pull-right btn btn-sm btn-success">
                                    <span class="bigger-110">Register</span>
                                    <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                                </button>
                            </div>

                        </fieldset>
                    </form>
                    <div class="space-4"></div>
                    <ul class="toolbar item-list ui-sortable">
                        <li class="item-blue"> <a href="/" data-target="#login-box" class="blue-text">Login</a></li>
                        <li class="item-red"> <a href="{{ url('/password/reset') }}" data-target="#forgot-box" class="blue-text">Forgot password? </a></li>
                    </ul>
            </div>
        </div><!-- /.widget-body -->
    </div><!-- /.signup-box -->
    </form>

@endsection