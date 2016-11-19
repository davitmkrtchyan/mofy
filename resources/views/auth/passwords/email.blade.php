@extends('layouts.app_forms')

<!-- Main Content -->
@section('content')

    <div id="forgot-box" class="forgot-box no-border">
        <div class="widget-body">
            <div class="widget-main">
                <h4 class="header red lighter bigger">
                    <i class="ace-icon fa fa-key"></i>
                    Retrieve Password
                </h4>

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="space-6"></div>
                <p>
                    Enter your email and to receive instructions
                </p>
                <form action="{{ url('/password/email') }}" class="form-horizontal" method="post" role="form">
                    {{ csrf_field() }}
                    <fieldset>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <!--<label for="email" class="col-md-4 control-label">E-Mail Address</label>-->

                            <div class="col-md-12 input-icon input-icon-right">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                <i class="ace-icon fa fa-envelope-o"></i>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="clearfix">
                            <button type="submit" class=" width-35 pull-right btn btn-sm btn-danger">
                                <i class="ace-icon fa fa-lightbulb-o"></i>
                                <span class="bigger-110">Send Me!</span>
                            </button>
                        </div>
                    </fieldset>
                </form>
                <div class="space-4"></div>
                <ul class="toolbar item-list ui-sortable">
                    <li class="item-blue"> <a href="/" data-target="#login-box" class="blue-text">Login</a></li>
                    <li class="item-green"> <a href="{{ url('/register') }}" data-target="#signup-box" class="blue-text">Register </a></li>
                </ul>
            </div><!-- /.widget-main -->
        </div><!-- /.widget-body -->
    </div><!-- /.forgot-box -->


    </form>

@endsection