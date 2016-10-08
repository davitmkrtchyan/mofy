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
                                                <label class="block clearfix">
                                            <span class="block input-icon input-icon-right">
                                             <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">
                                            <i class="ace-icon fa fa-user"></i>
                                            </span>
                                                </label>
                                                <label class="block clearfix">
                                            <span class="block input-icon input-icon-right">
                                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                                                <i class="ace-icon fa fa-envelope-o"></i>
                                            </span>
                                                </label>
                                                <label class="block clearfix">
                                            <span class="block input-icon input-icon-right">
                                            <input id="password" type="password" class="form-control" name="password">
                                                <i class="ace-icon fa fa-unlock-alt"></i>
                                            </span>
                                                </label>

                                                <label class="block clearfix">
                                            <span class="block input-icon input-icon-right">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                                <i class="ace-icon fa fa-unlock"></i>
                                            </span>
                                                </label>
                                                <label class="block clearfix">
                                                    <!--   <input type="checkbox" class="ace ace-switch" checked=&quot;checked&quot; value="true" name="Gender" />
                                                    <span class="lbl" data-lbl="Male&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Female"></span> -->
                                                    <input type="radio" name="male" value="male"><label class="ace-icon fa fa-male"> Male</label>
                                                    <input type="radio" name="male" value="female"><label class="ace-icon fa fa-female"> Female</label>

                                                </label>
                                                <label class="block">
                                                    <input type="checkbox" class="ace"  value="true" name="TermsOfUse" />
                                                    <span class="lbl">
                                                I accept the
                                                <a href="/">User Agreement</a>
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
                                            <li class="item-blue"> <a href="/" data-target="#login-box" class="">Login</a></li>
                                            <li class="item-red"> <a href="/" data-target="#forgot-box" class="">Forgot password? </a></li>
                                        </ul>
                                    </div>
                                </div><!-- /.widget-body -->
                            </div><!-- /.signup-box -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection