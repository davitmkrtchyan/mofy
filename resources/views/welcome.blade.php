@extends('layouts.app')

@section('content')
    <div id="pagebody">
        <div class="page-content">

            <!-- <form action="/" method="post"><input name="__RequestVerificationToken" type="hidden" value="3yu3t4_9JxQhcFnHMp-H__IVXx8g8iKmu0ELdq3ylKyS4Q2b3D2j95MT9vrWvN6cu7DQk2j2HmcKi8F3FamhylJpQ2jA2daETcnfMq0JE5I1" />                <ul class="social-links social-signin  circle">
                <li class="google">
                    <button type="submit"  id="Google" name="provider" value="Google" title="Log in using your Google account">
                        <i class="fa fa-google-plus"></i><i class="fa fa-sign-in"></i>
                    </button>
                </li>
                <li class="facebook">
                    <button type="submit"  id="Facebook" name="provider" value="Facebook" title="Log in using your Facebook account">
                        <i class="fa fa-facebook"></i><i class="fa fa-sign-in"></i>
                    </button>
                </li>
        </ul>
</form>
-->


            <!-- /.page-header -->
            <!-- /.row -->
            @if(isset($showLiveEventsURL))
            <div class="page-header">
                <h1 class="text-ellipsis">Upcoming Events.</h1>

            </div>
                <a href="{{url('/home/liveEvents')}}" class="blue-butt-event">Live Events</a>
            @else
            <div class="page-header">
                <h1 class="text-ellipsis">Live Events.</h1>

            </div>
               <a href="{{url('/home/matches')}}" class="blue-butt-event">Upcoming Events</a>
            @endif
            <div class="row">
                <div class="col-xs-12 col-md-9 widget-container-col ui-sortable">
                    <div class="widget-box transparent">
                        <div class="alert">
                            <!-- Slideshow 1 -->
                            {{--<ul class="rslides" id="slider1" style="height: 360px;">--}}
                                {{--@foreach($sliders as $slider)--}}
                                    {{--<li>--}}
                                        {{--<a href="{{$slider->gameLink}}">--}}
                                            {{--<img src="{{ URL::asset('assets/images/bm/admin-slider/'.$slider->imageName) }}" alt="">--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                {{--@endforeach--}}

                            {{--</ul>--}}

                        </div>

                        {{--<a href="{{ url('/home/loadGamesByGroupAndCountry', ['sport'=>'FOOTBALL','country' => 'England', 'group' => 'League Two'])}}">--}}
                        {{--<b style="color: #00b800">TEST</b>--}}
                        {{--</a>--}}

                        <div class="widget-body">
                            <div class="widget-main no-padding main-table-wrapper table-tab">
                                <ul class="nav nav-tabs sports-tab" role="tablist">
                                    @foreach($model['eventsGroups'] as $eventGroupName=>$eventGroupContent)
                                        <?php
                                        $sportClass = \App\Utils\UnibetUtils::resolveSportNameClass($eventGroupName);
                                        $properties = $sportClass::getViewProperties();
                                        ?>
                                        <li role="presentation"
                                            class="{{$properties['aria-controls']=='footballTab'?'active':''}}">
                                            <a id='{{$properties['id']}}'
                                               href='index.html#{{$properties['aria-controls']}}'
                                               aria-controls='{{$properties['aria-controls']}}'
                                               role='{{$properties['role']}}' data-toggle="tab">
                                                <i class="sp {{$properties['icon']}}"></i>
                                                <span>{{$properties['tabLabel']}}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>

                                <div class="tab-content">

                                    @foreach($model['eventsGroups'] as $eventGroupName=>$eventGroupContent)
                                        <?php
                                        $sportClass = \App\Utils\UnibetUtils::resolveSportNameClass($eventGroupName);
                                        $properties = $sportClass::getViewProperties();
                                        ?>
                                        <div class="table-wrapper tab-pane {{$properties['aria-controls']=='footballTab'?'active':''}}"
                                             id='{{$properties['aria-controls']}}'>
                                            <table class="table">
                                                <tbody class="main-table">
                                                @include('home._events',['events' => $eventGroupContent])
                                                </tbody>
                                            </table>
                                        </div>
                                    @endforeach

                                </div><!-- /.widget-main -->
                            </div><!-- /.widget-body -->

                        </div>

                    </div>
                </div>

@endsection
