@extends('layouts.app')

@section('content')
    <div id="pagebody">

        <div id="breadcrumbs" class="breadcrumbs">
            <script type="text/javascript">
                try {
                    ace.settings.check('breadcrumbs', 'fixed')
                } catch (e) {
                }
            </script>
            <ul class="breadcrumb">

                <li><a href="#"><i class="sp sp50"></i><span class="hidden-480">{{$sportName}}</span></a>
                </li>
                <li><a href="#"><i class="fa flag flag-br"></i><span class="hidden-480">{{$countryName}}</span></a>
                </li>
                <li><a href="#">{{$group}}</a></li>
            </ul><!-- /.breadcrumb -->
        </div>

        <div class="page-content">
            <div class="row">
                <div class="col-xs-12 col-md-9 widget-container-col ui-sortable">
                    <div class="statistics" data-sport="50">
                        <table>
                            <tbody>
                            <tr>
                                <td class="center team home">
                                    {{--<div class="logo-container">--}}
                                    {{--<div style="background-image: url('http://res.bmbets.com//Images/teams/50/70x70/65940.png');" class="img70"> </div>--}}
                                    {{--</div>--}}
                                    <div class="team-name">{{ $homeName }}</div>
                                </td>
                                <td class="center match-info">
                                    <div>
                                        <div>{{date("M j",strtotime($start))}}</div>
                                        <div>{{date("H:i",strtotime($start))}}</div>
                                    </div>
                                </td>
                                <td class="center team away">
                                    {{--<div class="logo-container">--}}
                                    {{--<div style="background-image: url('http://res.bmbets.com//Images/teams/50/70x70/56143.png');" class="img70"> </div>--}}
                                    {{--</div>--}}
                                    <div class="team-name">{{ $awayName }}</div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="space-4"></div>
                    <a class="btn btn-sm btn-primary disabled" href="../joinville-v-bahia-1616530.1">
                        <i class="ace-icon fa fa-book"></i>
                        <span class="hidden-580">Current Odds</span>
                    </a>
                    <a class="btn btn-sm btn-danger disabled">
                        <i class="ace-icon fa fa-area-chart"></i>
                        <span class="hidden-580">Historical Odds</span>
                    </a>
                    <a class="btn btn-sm btn-success disabled">
                        <i class="ace-icon fa fa-calendar"></i>
                        <span class="hidden-580">Passed Matches</span>
                    </a>
                    <div class="space-4"></div>
                    <div id="typetabs">
                        <div class="ui-tabs2"></div>
                        <div class="ui-toolbar"></div>
                    </div>
                    <div id="oddsContent" class="clearfix">
                    </div>
                    <div class="space-14"></div>
                    <div class="alert alert-warning">
                        <strong>IMPORTANT!</strong>
                        As different bookmakers have different betting rules we recommend you check bookmaker’s site
                        rules and review its safety before placing a bet.
                    </div>


                    <div id="oddsContent" class="clearfix oddsViewer">
                        <div>
                            <div class="bmdiv">
                                <table class="odds-table">
                                    <thead>
                                    <tr>
                                        <th class="sort">Bookmaker</th>
                                    </tr>
                                    </thead>
                                    {{--<tfoot>--}}
                                    {{--<tr class="average">--}}
                                    {{--<td>Average</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr class="highest">--}}
                                    {{--<td>Highest</td>--}}
                                    {{--</tr>--}}
                                    {{--</tfoot>--}}
                                    <tbody>


                                    @foreach($eventDetails as $event=>$key)
                                        <tr>
                                            <td>
                                                <div class="bm-block">
                                                    <a rel="nofollow" class="name"
                                                       title="Go to website"
                                                       target="_blank"
                                                       href="{{$key['url']}}">
                                                        <i class="bms bms-109"></i>
                                                        <span class="hidden-480">{{$event}}</span>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    {{--<tr>--}}
                                    {{--<td>--}}
                                    {{--<div class="bm-block"><a rel="nofollow" class="name"--}}
                                    {{--title="Go to BetAtHome website!" target="_blank"--}}
                                    {{--href="/bookmakers/betathome/web/"><i--}}
                                    {{--class="bms bms-8"></i><span--}}
                                    {{--class="hidden-480">BetAtHome</span></a></div>--}}
                                    {{--</td>--}}
                                    {{--</tr>--}}
                                    </tbody>
                                </table>
                            </div>
                            <div class="timediv">
                                <table class="odds-table">
                                    <thead>
                                    <tr>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    {{--<tfoot>--}}
                                    {{--<tr class="average">--}}
                                    {{--<td></td>--}}
                                    {{--</tr>--}}
                                    {{--<tr class="highest">--}}
                                    {{--<td></td>--}}
                                    {{--</tr>--}}
                                    {{--</tfoot>--}}
                                    <tbody>

                                    <tr>
                                        <td class="odd-time t3"></td>
                                    </tr>
                                    <tr>
                                        <td class="odd-time t3"></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="odddiv">
                                <table class="odds-table">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th class="sort center">1</th>
                                        <th class="sort center">X</th>
                                        <th class="sort center">2</th>
                                        <th class="sort center hidden-480 sortASC">Payout</th>
                                    </tr>
                                    </thead>
                                    {{--<tfoot>--}}
                                    {{--<tr class="average">--}}
                                    {{--<td></td>--}}
                                    {{--<td></td>--}}
                                    {{--<td></td>--}}
                                    {{--<td></td>--}}
                                    {{--<td class="odd-pay hidden-480">-</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr class="highest">--}}
                                    {{--<td></td>--}}
                                    {{--<td></td>--}}
                                    {{--<td></td>--}}
                                    {{--<td></td>--}}
                                    {{--<td class="odd-pay hidden-480">-</td>--}}
                                    {{--</tr>--}}
                                    {{--</tfoot>--}}
                                    <tbody>
                                    @foreach($eventDetails as $event=>$key)
                                        <tr>
                                            <td></td>
                                            <td class="odd-v up">{{$key['odd1']}}</td>
                                            <td class="odd-v up">{{$key['odd2']}}</td>
                                            <td class="odd-v down">{{$key['odd3']}}</td>
                                            <td class="odd-pay hidden-480">99.03%</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

@endsection
