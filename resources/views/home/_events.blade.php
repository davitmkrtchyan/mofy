<?php
$isSureBets = isset($surebets) && $surebets == true
?>
@foreach($events as $event)
    <tr class="match-info">
        <td colspan="2">
            <div class="text-ellipsis">
                <a href="{{url('/home/loadByEventID',['id'=>$event->id])}}">
                    <i class="flag flag-br menu-icon fa"></i>{{$event->name}}
                </a>
                <i class="fa fa-angle-double-right"></i>
                <a href="{{url('/home/loadByEventID',['id'=>$event->id])}}">{{$event->group}}</a>
            </div>

        </td>
        <td class="odds-name hidden-xs">1</td>
        <td class="odds-name hidden-xs">X</td>
        <td class="odds-name hidden-xs">2</td>
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
        <td class='odds-col3'><span
                    class="mobile-bet-type">1</span>
            <b>
                @if($isSureBets)
                    ({{$event->oddsFirstName}})
                @endif
            </b>
            {{\App\Utils\Utils::convertOdd($event->oddsFirst)}}
        </td>
        <td class='odds-col3'><span
                    class="mobile-bet-type">X</span>
            @if($event->oddsCross && $isSureBets)
                <b>
                    ({{$event->oddsCrossName}})---{{$event->profitPercentage}}
                </b>
            @endif
            {{\App\Utils\Utils::convertOdd($event->oddsCross)}}
        </td>
        <td class='odds-col3'><span
                    class="mobile-bet-type">2</span>
            <b>
                @if($isSureBets)
                    ({{$event->oddsSecondName}})
                @endif
            </b>{{\App\Utils\Utils::convertOdd($event->oddsSecond)}}
        </td>
    </tr>
@endforeach
