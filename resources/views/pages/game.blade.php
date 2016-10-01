@extends('layouts.app')

@section('content')
    <div id="pagebody">

        <div id="breadcrumbs" class="breadcrumbs">
            <script type="text/javascript">
                try { ace.settings.check('breadcrumbs', 'fixed') } catch (e) { }
            </script>
            <ul class="breadcrumb">

                <li><a href="../../../index.html"><i class="sp sp50"></i><span class="hidden-480">Football</span></a></li>
                <li><a href="../../index.html"><i class="fa flag flag-br"></i><span class="hidden-480">Brazil</span></a></li>
                <li><a href="../index.html">Serie B</a></li>
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
                                    <div class="team-name">{{ $p1 }}</div>
                                </td>
                                <td class="center match-info">
                                    <div>
                                        <div> Aug 30</div>
                                        <div> 22:15</div>
                                    </div>
                                </td>
                                <td class="center team away">
                                    {{--<div class="logo-container">--}}
                                        {{--<div style="background-image: url('http://res.bmbets.com//Images/teams/50/70x70/56143.png');" class="img70"> </div>--}}
                                    {{--</div>--}}
                                    <div class="team-name">{{ $p2 }}</div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>            <div class="space-4"></div>
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
                    <div class="space-14"> </div>
                    <div class="alert alert-warning">
                        <strong>IMPORTANT!</strong>
                        As different bookmakers have different betting rules we recommend you check bookmaker’s site rules and review its safety before placing a bet.
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
                                <tfoot>
                                <tr class="average">
                                    <td>Average</td>
                                </tr>
                                <tr class="highest">
                                    <td>Highest</td>
                                </tr>
                                </tfoot>
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="bm-block">
                                            <a rel="nofollow" class="name" title="Go to Betfair website!" target="_blank" href="/bookmakers/betfair/web/">
                                                <i class="bms bms-1"></i>
                                                <span class="hidden-480">Betfair</span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="bm-block">
                                            <a rel="nofollow" class="name" title="Go to Betdaq website!" target="_blank" href="/bookmakers/betdaq/web/">
                                                <i class="bms bms-47"></i>
                                                <span class="hidden-480">Betdaq</span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="bm-block">
                                            <a rel="nofollow" class="name" title="Go to 5Dimes website!" target="_blank" href="/bookmakers/5dimes/web/">
                                                <i class="bms bms-29"></i>
                                                <span class="hidden-480">5Dimes</span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="bm-block">
                                            <a rel="nofollow" class="name" title="Go to Sportbet website!" target="_blank" href="/bookmakers/sportbet/web/">
                                                <i class="bms bms-35"></i>
                                                <span class="hidden-480">Sportbet</span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="bm-block">
                                            <a rel="nofollow" class="name" title="Go to PinnacleSports website!" target="_blank" href="/bookmakers/pinnaclesports/web/">
                                                <i class="bms bms-2"></i>
                                                <span class="hidden-480">PinnacleSports</span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="bm-block">
                                            <a rel="nofollow" class="name" title="Go to Marathon website!" target="_blank" href="/bookmakers/marathon/web/">
                                                <i class="bms bms-17"></i>
                                                <span class="hidden-480">Marathon</span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="bm-block">
                                            <a rel="nofollow" class="name" title="Go to VitalBet website!" target="_blank" href="/bookmakers/vitalbet/web/">
                                                <i class="bms bms-108"></i><span class="hidden-480">VitalBet</span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="bm-block"><a rel="nofollow" class="name" title="Go to bet365 website!" target="_blank" href="/bookmakers/bet365/web/">
                                                <i class="bms bms-43"></i>
                                                <span class="hidden-480">bet365</span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="bm-block">
                                            <a rel="nofollow" class="name" title="Go to Ladbrokes website!" target="_blank" href="/bookmakers/ladbrokes/web/">
                                                <i class="bms bms-31"></i>
                                                <span class="hidden-480">Ladbrokes</span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="bm-block">
                                            <a rel="nofollow" class="name" title="Go to 1xBet website!" target="_blank" href="/bookmakers/1xbet/web/">
                                                <i class="bms bms-105"></i><span class="hidden-480">1xBet</span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr><td><div class="bm-block"><a rel="nofollow" class="name" title="Go to BetVictor website!" target="_blank" href="/bookmakers/betvictor/web/"><i class="bms bms-65"></i><span class="hidden-480">BetVictor</span></a></div></td></tr><tr><td><div class="bm-block"><a rel="nofollow" class="name" title="Go to Bet3000 website!" target="_blank" href="/bookmakers/bet3000/web/"><i class="bms bms-63"></i><span class="hidden-480">Bet3000</span></a></div></td></tr><tr><td><div class="bm-block"><a rel="nofollow" class="name" title="Go to Winner website!" target="_blank" href="/bookmakers/winner/web/"><i class="bms bms-96"></i><span class="hidden-480">Winner</span></a></div></td></tr><tr><td><div class="bm-block"><a rel="nofollow" class="name" title="Go to Bet City website!" target="_blank" href="/bookmakers/bet-city/web/"><i class="bms bms-5"></i><span class="hidden-480">Bet City</span></a></div></td></tr><tr><td><div class="bm-block"><a rel="nofollow" class="name" title="Go to Fonbet website!" target="_blank" href="/bookmakers/fonbet/web/"><i class="bms bms-71"></i><span class="hidden-480">Fonbet</span></a></div></td></tr><tr><td><div class="bm-block"><a rel="nofollow" class="name" title="Go to Titanbet website!" target="_blank" href="/bookmakers/titanbet/web/"><i class="bms bms-81"></i><span class="hidden-480">Titanbet</span></a></div></td></tr><tr><td><div class="bm-block"><a rel="nofollow" class="name" title="Go to Toto website!" target="_blank" href="/bookmakers/toto/web/"><i class="bms bms-6"></i><span class="hidden-480">Toto</span></a></div></td></tr><tr><td><div class="bm-block"><a rel="nofollow" class="name" title="Go to Unibet website!" target="_blank" href="/bookmakers/unibet/web/"><i class="bms bms-16"></i><span class="hidden-480">Unibet</span></a></div></td></tr><tr><td><div class="bm-block"><a rel="nofollow" class="name" title="Go to 888sport website!" target="_blank" href="/bookmakers/888sport/web/"><i class="bms bms-44"></i><span class="hidden-480">888sport</span></a></div></td></tr><tr><td><div class="bm-block"><a rel="nofollow" class="name" title="Go to Betkurus website!" target="_blank" href="/bookmakers/betkurus/web/"><i class="bms bms-106"></i><span class="hidden-480">Betkurus</span></a></div></td></tr><tr><td><div class="bm-block"><a rel="nofollow" class="name" title="Go to Winlinebet website!" target="_blank" href="/bookmakers/winlinebet/web/"><i class="bms bms-107"></i><span class="hidden-480">Winlinebet</span></a></div></td></tr><tr><td><div class="bm-block"><a rel="nofollow" class="name" title="Go to 188Bet website!" target="_blank" href="/bookmakers/188bet/web/"><i class="bms bms-42"></i><span class="hidden-480">188Bet</span></a></div></td></tr><tr><td><div class="bm-block"><a rel="nofollow" class="name" title="Go to BetRedKings website!" target="_blank" href="/bookmakers/betredkings/web/"><i class="bms bms-50"></i><span class="hidden-480">BetRedKings</span></a></div></td></tr><tr><td><div class="bm-block"><a rel="nofollow" class="name" title="Go to Tipico website!" target="_blank" href="/bookmakers/tipico/web/"><i class="bms bms-64"></i><span class="hidden-480">Tipico</span></a></div></td></tr><tr><td><div class="bm-block"><a rel="nofollow" class="name" title="Go to 138.com website!" target="_blank" href="/bookmakers/138com/web/"><i class="bms bms-114"></i><span class="hidden-480">138.com</span></a></div></td></tr><tr><td><div class="bm-block"><a rel="nofollow" class="name" title="Go to BWin website!" target="_blank" href="/bookmakers/bwin/web/"><i class="bms bms-7"></i><span class="hidden-480">BWin</span></a></div></td></tr><tr><td><div class="bm-block"><a rel="nofollow" class="name" title="Go to Betclic website!" target="_blank" href="/bookmakers/betclic/web/"><i class="bms bms-13"></i><span class="hidden-480">Betclic</span></a></div></td></tr><tr><td><div class="bm-block"><a rel="nofollow" class="name" title="Go to William Hill website!" target="_blank" href="/bookmakers/william-hill/web/"><i class="bms bms-14"></i><span class="hidden-480">William Hill</span></a></div></td></tr><tr><td><div class="bm-block"><a rel="nofollow" class="name" title="Go to Smart Live website!" target="_blank" href="/bookmakers/smart-live/web/"><i class="bms bms-98"></i><span class="hidden-480">Smart Live</span></a></div></td></tr><tr><td><div class="bm-block"><a rel="nofollow" class="name" title="Go to Jetbull website!" target="_blank" href="/bookmakers/jetbull/web/"><i class="bms bms-57"></i><span class="hidden-480">Jetbull</span></a></div></td></tr><tr><td><div class="bm-block"><a rel="nofollow" class="name" title="Go to Noxwin website!" target="_blank" href="/bookmakers/noxwin/web/"><i class="bms bms-24"></i><span class="hidden-480">Noxwin</span></a></div></td></tr><tr><td><div class="bm-block"><a rel="nofollow" class="name" title="Go to Netbet website!" target="_blank" href="/bookmakers/netbet/web/"><i class="bms bms-97"></i><span class="hidden-480">Netbet</span></a></div></td></tr><tr><td><div class="bm-block"><a rel="nofollow" class="name" title="Go to 10Bet website!" target="_blank" href="/bookmakers/10bet/web/"><i class="bms bms-30"></i><span class="hidden-480">10Bet</span></a></div></td></tr><tr><td><div class="bm-block"><a rel="nofollow" class="name" title="Go to Intertops website!" target="_blank" href="/bookmakers/intertops/web/"><i class="bms bms-18"></i><span class="hidden-480">Intertops</span></a></div></td></tr><tr><td><div class="bm-block"><a rel="nofollow" class="name" title="Go to Interwetten website!" target="_blank" href="/bookmakers/interwetten/web/"><i class="bms bms-22"></i><span class="hidden-480">Interwetten</span></a></div></td></tr><tr><td><div class="bm-block"><a rel="nofollow" class="name" title="Go to Mybet website!" target="_blank" href="/bookmakers/mybet/web/"><i class="bms bms-25"></i><span class="hidden-480">Mybet</span></a></div></td></tr><tr><td><div class="bm-block"><a rel="nofollow" class="name" title="Go to 18Bet website!" target="_blank" href="/bookmakers/18bet/web/"><i class="bms bms-103"></i><span class="hidden-480">18Bet</span></a></div></td></tr><tr><td><div class="bm-block"><a rel="nofollow" class="name" title="Go to Sbobet website!" target="_blank" href="/bookmakers/sbobet/web/"><i class="bms bms-88"></i><span class="hidden-480">Sbobet</span></a></div></td></tr><tr><td><div class="bm-block"><a rel="nofollow" class="name" title="Go to 1Bet website!" target="_blank" href="/bookmakers/1bet/web/"><i class="bms bms-82"></i><span class="hidden-480">1Bet</span></a></div></td></tr><tr><td><div class="bm-block"><a rel="nofollow" class="name" title="Go to Dafabet website!" target="_blank" href="/bookmakers/dafabet/web/"><i class="bms bms-77"></i><span class="hidden-480">Dafabet</span></a></div></td></tr><tr><td><div class="bm-block"><a rel="nofollow" class="name" title="Go to Betsafe website!" target="_blank" href="/bookmakers/betsafe/web/"><i class="bms bms-27"></i><span class="hidden-480">Betsafe</span></a></div></td></tr><tr><td><div class="bm-block"><a rel="nofollow" class="name" title="Go to Betsson website!" target="_blank" href="/bookmakers/betsson/web/"><i class="bms bms-51"></i><span class="hidden-480">Betsson</span></a></div></td></tr><tr><td><div class="bm-block"><a rel="nofollow" class="name" title="Go to M88 website!" target="_blank" href="/bookmakers/m88/web/"><i class="bms bms-85"></i><span class="hidden-480">M88</span></a></div></td></tr><tr><td><div class="bm-block"><a rel="nofollow" class="name" title="Go to SkyBet website!" target="_blank" href="/bookmakers/skybet/web/"><i class="bms bms-100"></i><span class="hidden-480">SkyBet</span></a></div></td></tr><tr><td><div class="bm-block"><a rel="nofollow" class="name" title="Go to Bethard website!" target="_blank" href="/bookmakers/bethard/web/"><i class="bms bms-117"></i><span class="hidden-480">Bethard</span></a></div></td></tr><tr><td><div class="bm-block"><a rel="nofollow" class="name" title="Go to youwin website!" target="_blank" href="/bookmakers/youwin/web/"><i class="bms bms-55"></i><span class="hidden-480">youwin</span></a></div></td></tr><tr><td><div class="bm-block"><a rel="nofollow" class="name" title="Go to Betrally website!" target="_blank" href="/bookmakers/betrally/web/"><i class="bms bms-95"></i><span class="hidden-480">Betrally</span></a></div></td></tr><tr><td><div class="bm-block"><a rel="nofollow" class="name" title="Go to DOXXbet website!" target="_blank" href="/bookmakers/doxxbet/web/"><i class="bms bms-54"></i><span class="hidden-480">DOXXbet</span></a></div></td></tr><tr><td><div class="bm-block"><a rel="nofollow" class="name" title="Go to Betfair SP website!" target="_blank" href="/bookmakers/betfair-sp/web/"><i class="bms bms-109"></i><span class="hidden-480">Betfair SP</span></a></div></td></tr><tr><td><div class="bm-block"><a rel="nofollow" class="name" title="Go to SportingBet website!" target="_blank" href="/bookmakers/sportingbet/web/"><i class="bms bms-113"></i><span class="hidden-480">SportingBet</span></a></div></td></tr><tr><td><div class="bm-block"><a rel="nofollow" class="name" title="Go to BetAtHome website!" target="_blank" href="/bookmakers/betathome/web/"><i class="bms bms-8"></i><span class="hidden-480">BetAtHome</span></a></div></td></tr></tbody></table></div><div class="timediv"><table class="odds-table"><thead><tr><th></th></tr></thead><tfoot><tr class="average"><td></td></tr><tr class="highest"><td></td></tr></tfoot><tbody><tr><td class="odd-time t3"></td></tr><tr><td class="odd-time t3"></td></tr><tr><td class="odd-time t3"></td></tr><tr><td class="odd-time t3"></td></tr><tr><td class="odd-time t3"></td></tr><tr><td class="odd-time t3"></td></tr><tr><td class="odd-time t3"></td></tr><tr><td class="odd-time t3"></td></tr><tr><td class="odd-time t3"></td></tr><tr><td class="odd-time t3"></td></tr><tr><td class="odd-time t3"></td></tr><tr><td class="odd-time t3"></td></tr><tr><td class="odd-time t3"></td></tr><tr><td class="odd-time t3"></td></tr><tr><td class="odd-time t3"></td></tr><tr><td class="odd-time t3"></td></tr><tr><td class="odd-time t3"></td></tr><tr><td class="odd-time t3"></td></tr><tr><td class="odd-time t3"></td></tr><tr><td class="odd-time t3"></td></tr><tr><td class="odd-time t3"></td></tr><tr><td class="odd-time t3"></td></tr><tr><td class="odd-time t3"></td></tr><tr><td class="odd-time t3"></td></tr><tr><td class="odd-time t3"></td></tr><tr><td class="odd-time t3"></td></tr><tr><td class="odd-time t3"></td></tr><tr><td class="odd-time t3"></td></tr><tr><td class="odd-time t3"></td></tr><tr><td class="odd-time t3"></td></tr><tr><td class="odd-time t3"></td></tr><tr><td class="odd-time t3"></td></tr><tr><td class="odd-time t3"></td></tr><tr><td class="odd-time t3"></td></tr><tr><td class="odd-time t3"></td></tr><tr><td class="odd-time t3"></td></tr><tr><td class="odd-time t3"></td></tr><tr><td class="odd-time t3"></td></tr><tr><td class="odd-time t3"></td></tr><tr><td class="odd-time t3"></td></tr><tr><td class="odd-time t3"></td></tr><tr><td class="odd-time t3"></td></tr><tr><td class="odd-time t3"></td></tr><tr><td class="odd-time t3"></td></tr><tr><td class="odd-time t3"></td></tr><tr><td class="odd-time t3"></td></tr><tr><td class="odd-time t3"></td></tr><tr><td class="odd-time t3"></td></tr><tr><td class="odd-time t3"></td></tr><tr><td class="odd-time t3"></td></tr><tr><td class="odd-time t3"></td></tr></tbody></table></div><div class="odddiv"><table class="odds-table"><thead><tr><th></th><th class="sort center">1</th><th class="sort center">X</th><th class="sort center">2</th><th class="sort center hidden-480 sortASC">Payout</th></tr></thead><tfoot><tr class="average"><td></td><td></td><td></td><td></td><td class="odd-pay hidden-480">-</td></tr><tr class="highest"><td></td><td></td><td></td><td></td><td class="odd-pay hidden-480">-</td></tr></tfoot><tbody><tr><td></td><td class="odd-v up lock">2.20</td><td class="odd-v up lock">2.96</td><td class="odd-v down lock">4.60</td><td class="odd-pay hidden-480">99.03%</td></tr><tr><td></td><td class="odd-v up lock">2.16</td><td class="odd-v down lock">2.92</td><td class="odd-v up lock">4.40</td><td class="odd-pay hidden-480">96.83%</td></tr><tr><td></td><td class="odd-v up lock">2.13</td><td class="odd-v up lock">2.97</td><td class="odd-v down lock">4.39</td><td class="odd-pay hidden-480">96.71%</td></tr><tr><td></td><td class="odd-v up lock">2.13</td><td class="odd-v down lock">2.96</td><td class="odd-v up lock">4.40</td><td class="odd-pay hidden-480">96.66%</td></tr><tr><td></td><td class="odd-v down lock">2.15</td><td class="odd-v down lock">2.79</td><td class="odd-v down lock">4.69</td><td class="odd-pay hidden-480">96.45%</td></tr><tr><td></td><td class="odd-v up lock">2.20</td><td class="odd-v down lock">2.63</td><td class="odd-v up lock">4.85</td><td class="odd-pay hidden-480">96.07%</td></tr><tr><td></td><td class="odd-v down lock">2.10</td><td class="odd-v up lock">2.73</td><td class="odd-v up lock">4.59</td><td class="odd-pay hidden-480">94.31%</td></tr><tr><td></td><td class="odd-v up lock">2.05</td><td class="odd-v lock">3.10</td><td class="odd-v lock">4.00</td><td class="odd-pay hidden-480">94.31%</td></tr><tr><td></td><td class="odd-v up lock">2.10</td><td class="odd-v down lock">2.75</td><td class="odd-v up lock">4.50</td><td class="odd-pay hidden-480">94.16%</td></tr><tr><td></td><td class="odd-v down lock">2.14</td><td class="odd-v down lock">2.66</td><td class="odd-v down lock">4.48</td><td class="odd-pay hidden-480">93.77%</td></tr><tr><td></td><td class="odd-v down lock">2.05</td><td class="odd-v up lock">3.10</td><td class="odd-v down lock">3.90</td><td class="odd-pay hidden-480">93.74%</td></tr><tr><td></td><td class="odd-v up lock">2.05</td><td class="odd-v down lock">3.00</td><td class="odd-v up lock">4.00</td><td class="odd-pay hidden-480">93.36%</td></tr><tr><td></td><td class="odd-v up lock">2.10</td><td class="odd-v down lock">2.85</td><td class="odd-v up lock">4.00</td><td class="odd-pay hidden-480">92.84%</td></tr><tr><td></td><td class="odd-v up lock">2.10</td><td class="odd-v down lock">2.80</td><td class="odd-v up lock">4.10</td><td class="odd-pay hidden-480">92.83%</td></tr><tr><td></td><td class="odd-v up lock">2.00</td><td class="odd-v down lock">2.90</td><td class="odd-v down lock">4.20</td><td class="odd-pay hidden-480">92.34%</td></tr><tr><td></td><td class="odd-v up lock">2.05</td><td class="odd-v down lock">2.80</td><td class="odd-v up lock">4.20</td><td class="odd-pay hidden-480">92.33%</td></tr><tr><td></td><td class="odd-v up lock">2.06</td><td class="odd-v down lock">2.80</td><td class="odd-v up lock">4.15</td><td class="odd-pay hidden-480">92.29%</td></tr><tr><td></td><td class="odd-v lock">1.90</td><td class="odd-v lock">3.10</td><td class="odd-v lock">4.00</td><td class="odd-pay hidden-480">91.00%</td></tr><tr><td></td><td class="odd-v lock">1.90</td><td class="odd-v lock">3.10</td><td class="odd-v lock">4.00</td><td class="odd-pay hidden-480">91.00%</td></tr><tr><td></td><td class="odd-v up lock">2.02</td><td class="odd-v down lock">2.91</td><td class="odd-v up lock">3.84</td><td class="odd-pay hidden-480">90.98%</td></tr><tr><td></td><td class="odd-v up lock">2.03</td><td class="odd-v down lock">2.84</td><td class="odd-v up lock">3.93</td><td class="odd-pay hidden-480">90.98%</td></tr><tr><td></td><td class="odd-v up lock">2.13</td><td class="odd-v down lock">2.92</td><td class="odd-v up lock">3.45</td><td class="odd-pay hidden-480">90.76%</td></tr><tr><td></td><td class="odd-v up lock">2.02</td><td class="odd-v down lock">2.90</td><td class="odd-v lock">3.80</td><td class="odd-pay hidden-480">90.66%</td></tr><tr><td></td><td class="odd-v up lock">2.05</td><td class="odd-v down lock">3.00</td><td class="odd-v down lock">3.50</td><td class="odd-pay hidden-480">90.35%</td></tr><tr><td></td><td class="odd-v up lock">2.00</td><td class="odd-v down lock">2.75</td><td class="odd-v up lock">4.10</td><td class="odd-pay hidden-480">90.29%</td></tr><tr><td></td><td class="odd-v up lock">1.95</td><td class="odd-v down lock">2.95</td><td class="odd-v down lock">3.90</td><td class="odd-pay hidden-480">90.24%</td></tr><tr><td></td><td class="odd-v up lock">2.05</td><td class="odd-v down lock">2.65</td><td class="odd-v up lock">4.10</td><td class="odd-pay hidden-480">90.17%</td></tr><tr><td></td><td class="odd-v up lock">2.00</td><td class="odd-v down lock">2.88</td><td class="odd-v lock">3.80</td><td class="odd-pay hidden-480">90.06%</td></tr><tr><td></td><td class="odd-v up lock">2.04</td><td class="odd-v down lock">2.80</td><td class="odd-v lock">3.80</td><td class="odd-pay hidden-480">90.05%</td></tr><tr><td></td><td class="odd-v up lock">2.04</td><td class="odd-v down lock">2.80</td><td class="odd-v lock">3.80</td><td class="odd-pay hidden-480">90.05%</td></tr><tr><td></td><td class="odd-v up lock">2.04</td><td class="odd-v down lock">2.80</td><td class="odd-v lock">3.80</td><td class="odd-pay hidden-480">90.05%</td></tr><tr><td></td><td class="odd-v up lock">2.00</td><td class="odd-v down lock">2.75</td><td class="odd-v up lock">4.05</td><td class="odd-pay hidden-480">90.05%</td></tr><tr><td></td><td class="odd-v up lock">2.00</td><td class="odd-v down lock">2.75</td><td class="odd-v up lock">4.05</td><td class="odd-pay hidden-480">90.05%</td></tr><tr><td></td><td class="odd-v up lock">2.00</td><td class="odd-v down lock">2.80</td><td class="odd-v up lock">3.90</td><td class="odd-pay hidden-480">89.80%</td></tr><tr><td></td><td class="odd-v up lock">2.00</td><td class="odd-v down lock">2.80</td><td class="odd-v up lock">3.90</td><td class="odd-pay hidden-480">89.80%</td></tr><tr><td></td><td class="odd-v lock">2.00</td><td class="odd-v lock">3.10</td><td class="odd-v lock">3.40</td><td class="odd-pay hidden-480">89.55%</td></tr><tr><td></td><td class="odd-v up lock">2.10</td><td class="odd-v down lock">2.73</td><td class="odd-v up lock">3.63</td><td class="odd-pay hidden-480">89.45%</td></tr><tr><td></td><td class="odd-v up lock">2.09</td><td class="odd-v down lock">2.73</td><td class="odd-v down lock">3.65</td><td class="odd-pay hidden-480">89.39%</td></tr><tr><td></td><td class="odd-v up lock">2.11</td><td class="odd-v down lock">2.75</td><td class="odd-v up lock">3.55</td><td class="odd-pay hidden-480">89.34%</td></tr><tr><td></td><td class="odd-v up lock">2.11</td><td class="odd-v down lock">2.75</td><td class="odd-v up lock">3.55</td><td class="odd-pay hidden-480">89.34%</td></tr><tr><td></td><td class="odd-v lock">1.96</td><td class="odd-v lock">3.05</td><td class="odd-v lock">3.55</td><td class="odd-pay hidden-480">89.30%</td></tr><tr><td></td><td class="odd-v lock">1.96</td><td class="odd-v lock">3.05</td><td class="odd-v lock">3.55</td><td class="odd-pay hidden-480">89.30%</td></tr><tr><td></td><td class="odd-v up lock">2.10</td><td class="odd-v lock">3.20</td><td class="odd-v down lock">3.02</td><td class="odd-pay hidden-480">89.30%</td></tr><tr><td></td><td class="odd-v up lock">2.00</td><td class="odd-v down lock">2.80</td><td class="odd-v up lock">3.80</td><td class="odd-pay hidden-480">89.26%</td></tr><tr><td></td><td class="odd-v up lock">2.00</td><td class="odd-v down lock">2.70</td><td class="odd-v up lock">4.00</td><td class="odd-pay hidden-480">89.26%</td></tr><tr><td></td><td class="odd-v up lock">2.05</td><td class="odd-v down lock">2.80</td><td class="odd-v down lock">3.60</td><td class="odd-pay hidden-480">89.07%</td></tr><tr><td></td><td class="odd-v up lock">2.00</td><td class="odd-v down lock">2.70</td><td class="odd-v up lock">3.95</td><td class="odd-pay hidden-480">89.00%</td></tr><tr><td></td><td class="odd-v up lock">2.00</td><td class="odd-v down lock">2.95</td><td class="odd-v down lock">3.50</td><td class="odd-pay hidden-480">88.91%</td></tr><tr><td></td><td class="odd-v down lock">2.00</td><td class="odd-v down lock">2.87</td><td class="odd-v up lock">3.60</td><td class="odd-pay hidden-480">88.79%</td></tr><tr><td></td><td class="odd-v lock">1.95</td><td class="odd-v down lock">2.85</td><td class="odd-v up lock">3.80</td><td class="odd-pay hidden-480">88.74%</td></tbody></table>
                        </div>
                    </div>
                </div>

    </div>

@endsection
