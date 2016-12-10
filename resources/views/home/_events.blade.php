<?php
$isSureBets = isset($surebets) && $surebets == true
?>
@foreach($events as $event)
    <tr class="match-info">
        <td colspan="2">
            <div class="text-ellipsis">
                <span class="countryLogo">{{$event->countryName}}>></span>
                <a href="{{url('/home/loadByEventID',['id'=>$event->id])}}">
                    <i class="flag menu-icon fa"></i>{{$event->name}}
                </a>
                <i class="fa fa-angle-double-right"></i>
                <a href="{{url('/home/loadByEventID',['id'=>$event->id])}}">{{$event->group}}</a>
            </div>

        </td>
        <td class="odds-name hidden-xs">1</td>
        <td class="odds-name hidden-xs">X</td>
        <td class="odds-name hidden-xs">2</td>
        @if($isSureBets)
        <td class="odds-name hidden-xs">Profit</td>
        @endif
    </tr>
    <tr class="main-table-row">
        <td class="date-col">
            <div class="day">{{date("M j",strtotime($event->start))}}</div>
            <div class="hour">{{date("H:i",strtotime($event->start))}}</div>
        </td>
        <td class="players-name-col">
            <div class="player-1 text-scroll">
                {{--<div class="img"--}}
                {{--style="background-image: url('http://res.bmbets.com/images/teams/50/18x18/65940.png');"></div>--}}

                <a href="{{url('/home/loadByEventID',['id'=>$event->id])}}">{{$event->homeName}}</a>
            </div>
            <div class="player-2 text-scroll">
                {{--<div class="img"--}}
                {{--style="background-image: url('http://res.bmbets.com/images/teams/50/18x18/56143.png');"></div>--}}

                <a href="{{url('/home/loadByEventID',['id'=>$event->id])}}">
                    {{$event->awayName}}
                </a>
            </div>
        </td>
        <td class='odds-col3'>
            <a href="toGameWebsite">
                <span class="mobile-bet-type">1</span>
                <!--example: class="b-logo logo-firstName"-->
                @if($isSureBets)
                <span class='b-logo logo-{{$event->oddsFirstName}}'></span>
                @endif
                   <p>{{$event->oddsFirst}}</p>
            </a>
        </td>
        <td class='odds-col3'>
            <a href="toGameWebsite">
                <span class="mobile-bet-type">X</span>
                @if($isSureBets)
                    <span class='b-logo logo-{{$event->oddsCrossName}}'></span>
                @endif
                <p>{{$event->oddsCross}}</p>
            </a>
        </td>
        <td class='odds-col3'>
        <a href="toGameWebsite">
            <span class="mobile-bet-type">2</span>
            @if($isSureBets)
                <span class='b-logo logo-{{$event->oddsSecondName}}'></span>
            @endif
                <p>{{$event->oddsSecond}}</p>
        </a>
        </td>
        @if($isSureBets)
        <td class='odds-col3'>
        <span class="mobile-bet-type">Profit</span>
        <span>
            <a href="#" onclick="window.open('calculator', 'newwindow', 'width=650, height=350'); return false;">
                <i class="fa fa-calculator block"></i>
            </a>
        </span>
            <p>{{$event->profitPercentage}}%</p>
        </td>
        @endif
    </tr>
@endforeach
