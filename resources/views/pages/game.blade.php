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


                </div>
                {{--<div class="col-xs-12 col-md-3 widget-container-col ui-sortable">--}}



                    {{--<h3 class="header smaller lighter blue">--}}
                        {{--<i class="fa flag flag-br"></i>--}}
                        {{--Brazil--}}
                    {{--</h3>--}}
                    {{--<ul class="list">--}}
                        {{--<li>--}}
                            {{--<a href="../../brazil-cup/index.html">Brazil Cup</a><span class="number"> (4)</span>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="../../league-u20/index.html">League U20</a><span class="number"> (2)</span>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="../index.html">Serie B</a><span class="number"> (18)</span>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="../../serie-a/index.html">Serie A</a><span class="number"> (3)</span>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="../../copa-paulista/index.html">Copa Paulista</a><span class="number"> (1)</span>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="../../brasil-cup-women/index.html">Brasil Cup Women</a><span class="number"> (4)</span>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="../../rio-cup/index.html">Rio Cup</a><span class="number"> (5)</span>--}}
                        {{--</li>--}}
                    {{--</ul>--}}





                    {{--<h3 class="header smaller lighter blue">--}}
                        {{--<i class="ace-icon fa fa-bell blue"></i>--}}
                        {{--Advertisement--}}
                    {{--</h3>--}}
                    {{--<div id="adv-content-right">--}}
                        {{--<ul class="thumbs">--}}
                            {{--<li>--}}
                                {{--<div class="center">--}}
                                    {{--<a target="_blank" href="http://online.titanbet.com/promoRedirect?key=em9uZUlkPTE1NzMyNjAwOTUmbGFuZGluZ1BhZ2VJZD0xNDAzNjc1ODI0JnByb2ZpbGVJZD02MTkwMDI%3D">--}}
                                        {{--<img border="0" title="betting foot" alt="betting foot" src="http://www.bmbets.com/App_Themes/Banners/tbet_Soccer_150x125.gif">--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<div class="center">--}}
                                    {{--<a target="_blank" href="http://imstore.bet365affiliates.com/Tracker.aspx?AffiliateId=35066&amp;AffiliateCode=365_056634&amp;CID=197&amp;DID=156&amp;TID=1&amp;PID=149&amp;LNG=1"><img border="0" src="http://imstore.bet365affiliates.com/?AffiliateCode=365_056634&amp;CID=197&amp;DID=156&amp;TID=1&amp;PID=149&amp;LNG=1"></a>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                        {{--</ul>--}}

                    {{--</div>--}}



                    {{--<h3 class="header smaller lighter blue">--}}
                        {{--<i class="ace-icon fa fa-bullhorn blue"></i>--}}
                        {{--Bonuses--}}
                    {{--</h3>--}}
                    {{--<div class="dialogs">--}}
                        {{--<div class="itemdiv dialogdiv">--}}
                            {{--<div class="user">--}}
                                {{--<img src="../../../../Images/bm/57x54/81.png" alt="Titanbet">--}}
                            {{--</div>--}}
                            {{--<div class="body">--}}
                                {{--<div class="name">--}}
                                    {{--<a href="index.html">&#163;/€/$50 Guaranteed Every Week</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="itemdiv dialogdiv">--}}
                            {{--<div class="user">--}}
                                {{--<img src="../../../../Images/bm/57x54/31.png" alt="Ladbrokes">--}}
                            {{--</div>--}}
                            {{--<div class="body">--}}
                                {{--<div class="name">--}}
                                    {{--<a href="index.html">Register today, enter the promo code F50 and we&#39;ll match your first bet as a free bet up to &#163;50.</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="itemdiv dialogdiv">--}}
                            {{--<div class="user">--}}
                                {{--<img src="../../../../Images/bm/57x54/96.png" alt="Winner">--}}
                            {{--</div>--}}
                            {{--<div class="body">--}}
                                {{--<div class="name">--}}
                                    {{--<a href="index.html">&#163; 5 GET &#163; 20FREE</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="itemdiv dialogdiv">--}}
                            {{--<div class="user">--}}
                                {{--<img src="../../../../Images/bm/57x54/95.png" alt="Betrally">--}}
                            {{--</div>--}}
                            {{--<div class="body">--}}
                                {{--<div class="name">--}}
                                    {{--<a href="index.html">100% up to €100 Welcome Bonus</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="itemdiv dialogdiv">--}}
                            {{--<div class="user">--}}
                                {{--<img src="../../../../Images/bm/57x54/30.png" alt="10Bet">--}}
                            {{--</div>--}}
                            {{--<div class="body">--}}
                                {{--<div class="name">--}}
                                    {{--<a href="index.html">50% up to €200</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="itemdiv dialogdiv">--}}
                            {{--<div class="user">--}}
                                {{--<img src="../../../../Images/bm/57x54/100.png" alt="SkyBet">--}}
                            {{--</div>--}}
                            {{--<div class="body">--}}
                                {{--<div class="name">--}}
                                    {{--<a href="index.html">Free Bet  of up to GBP 30</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                {{--</div>--}}


@endsection
