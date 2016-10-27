@extends('layouts.app')

@section('content')
    <div class="page-content" id="accordion-wrapper">
        <div class="row">
            <div class="col-xs-12 col-md-9 widget-container-col ui-sortable">

                <a class="btn btn-sm btn-primary" href="#">
                    <i class="ace-icon fa fa-book"></i>
                    <span class="hidden-580">Beting Odds</span>
                </a>
                <a class="btn btn-sm btn-danger disabled" href="#">
                    <i class="ace-icon fa fa-sitemap"></i>
                    <span class="hidden-580">Standings</span>
                </a>
                <a class="btn btn-sm btn-success disabled" href="#">
                    <i class="ace-icon fa fa-calendar"></i>
                    <span class="hidden-580">Results/Fixtures</span>
                </a>
                <div class="space-4"></div>

                <div class="main-table-wrapper table-tab">
                    <div class="table-wrapper">

                        {{--<div class="container">--}}
                            {{--@foreach($games as $game)--}}
                                {{--Name: {{$game->name}}<br>--}}
                                {{--Home:{{$game->homeName}}<br>--}}
                                {{--Away:{{$game->awayName}}<br>--}}
                                {{--Group:{{$game->group}}<br>--}}
                                {{--Country:{{$game->countryName}}<br>--}}
                                {{--oddsFirst:{{$game->oddsFirst}}<br>--}}
                                {{--oddsCross:{{$game->oddsCross}}<br>--}}
                                {{--oddsSecond:{{$game->oddsSecond}}<br>--}}
                                {{--start:{{$game->start}}<br>--}}
                                {{--eventId:{{$game->id}}<br>--}}

                                {{--Date: {{date("M j",strtotime($game->start))}}<br>--}}
                                {{--Time: {{date("H:i",strtotime($game->start))}}<br>--}}
                            {{--@endforeach--}}
                        {{--</div>--}}

                        <table class="table table-striped">
                            <tbody class="main-table">
                            @foreach($games as $game)
                            <tr class="match-info">
                                <td colspan="2">
                                    {{date("M j",strtotime($game->start))}}
                                    {{--{{$game->start}}--}}
                                </td>
                                <td class="odds-name hidden-xs">1 </td>
                                <td class="odds-name hidden-xs">X </td>
                                <td class="odds-name hidden-xs">2 </td>
                                <td class="center  hidden-xs">B&#39;s</td>
                            </tr>

                            <tr class="main-table-row">
                                <td class="date-col">
                                    <div class="hour">{{date("H:i",strtotime($game->start))}}</div>
                                    <div class="period badge badge-important"></div>
                                </td>
                                <td class="players-name-col">
                                    <div class="player-1 text-scroll">
                                        <div class="img"></div>

                                        <a title="Go to Fluminense - Figueirense odds comparisons" href="/home/loadByEventID/{{$game->id}}">{{$game->homeName}}</a>
                                    </div>
                                    <div class="player-2 text-scroll">
                                        <div class="img"></div>
                                        <a title="Go to Fluminense - Figueirense odds comparisons" href="/home/loadByEventID/{{$game->id}}">{{$game->awayName}}</a>
                                    </div>
                                </td>

                                <td class='odds-col4'><span class="mobile-bet-type">1</span>{{$game->oddsFirst}}</td>
                                <td class='odds-col4'><span class="mobile-bet-type">X</span>{{$game->oddsCross}}</td>
                                <td class='odds-col4'><span class="mobile-bet-type">2</span>{{$game->oddsSecond}}</td>
                                <td class='bk-count odds-col4'><span class="mobile-bet-type">B&#39;s</span><span class="badge badge-primary">29</span></td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>





    </div>
@endsection
