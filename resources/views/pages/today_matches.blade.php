@extends('layouts.app')

@section('content')
    <div class="page-content matches">
        <div class="page-header">
            <h1>Football 08 30 2016 Matches</h1>
            <h2>
                Betting odds displayed are averages across all our bookmakers. Along with betting odds we display live scores for live events and final results for the finished events.
                Click on matches' headers to see all avalaible betting odds. You may filter matches using the 'Live', 'Finished', 'Upcoming' and 'All'.
            </h2>
        </div>

        <!-- /.page-header -->
        <div class="row">
            <div class="col-xs-12 col-md-9 widget-container-col ui-sortable">
                <div id="typetabs">
                    <div class="ui-tabs2"></div>
                </div>

                <div class="tab-content padding-4">

                    <ul class="nav nav-pills ">
                        <li>
                            <a class="btn btn-sm btn-primary" href="all">
                                <i class="ace-icon fa fa-flag-o"></i>
                                <span class="hidden-580">All Matches</span>
                            </a>
                        </li>
                        <li>
                            <a class="btn btn-sm " href="finished">
                                <i class="ace-icon fa fa-square"></i>
                                <span class="hidden-580">Finished</span>
                            </a>
                        </li>
                        <li>
                            <a class="btn btn-sm btn-success" href="live">
                                <i class="ace-icon fa fa-square"></i>
                                <span class="hidden-580">Live</span>
                            </a>
                        </li>
                        <li>
                            <a class="btn btn-sm btn-warning" href="scheduled">
                                <i class="ace-icon fa fa-square"></i>
                                <span class="hidden-580">Scheduled</span>
                            </a>
                        </li>
                        <li id="calendar">
                            <a id="datepicker" class="btn btn-sm btn-purple" data-date="08/30/2016" >
                                <i class="ace-icon fa fa-calendar icon-on-right"></i>
                                <span class="hidden-580">
                Today &nbsp;
            </span>
                            </a>
                        </li>
                        <li class="pull-right">
                            <a class="btn btn-sm btn-danger dropdown-toggle" data-toggle="dropdown" href="index.html#">
                                <i class="ace-icon fa fa-sort"></i>
                                <span class="hidden-580">
                Order By &nbsp;
                <i class="ace-icon fa fa-angle-down icon-on-right"></i>
            </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="index.html" onclick="ace.cookie.set('ot', 'T');">
                                        Kick off date
                                    </a>
                                </li>
                                <li>
                                    <a href="index.html" onclick="ace.cookie.set('ot', 'G');">
                                        League Name
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>



                    <div class="space-4"></div>
                    <div class="main-table-wrapper table-tab" id="matchesData">


                        <div class="table-wrapper tab-pane" id="footballTab">
                            <table class="table">
                                <tbody class="main-table">
                                <tr class="match-info">
                                    <td colspan="2">


                                        <div class="text-ellipsis">
                                            <a href="../../football/argentina/index.html">
                                                <i class="flag flag-ar menu-icon fa"></i>Argentina
                                            </a>
                                            <i class="fa fa-angle-double-right"></i>
                                            <a href="../../football/argentina/primera-nacional-b/index.html">Primera Nacional B</a>
                                            <i data-league="9" onclick="$.favourites.click(this)" class="fa fa-star favourite light-grey"></i>
                                        </div>

                                    </td>
                                    <td class="odds-name hidden-xs">1</td>
                                    <td class="odds-name hidden-xs">X</td>
                                    <td class="odds-name hidden-xs">2</td>
                                    <td class="hidden-xs">B&#39;s</td>
                                </tr>
                                <tr class="main-table-row  deactivate">
                                    <td class="date-col">
                                        <div class="hour">00:05</div>
                                        <div class="period badge badge-success">FIN</div>
                                    </td>
                                    <td class="players-name-col">
                                        <div class="player-1 text-scroll">
                                            <a title=Go to Crucero del Norte - Nueva Chicago odds comparisons href="../../football/argentina/primera-nacional-b/crucero-del-norte-v-nueva-chicago-1613776/index.html">Crucero del Norte</a>
                                            <div class="score">
                                        <span class="primary">
                                            2
                                        </span>
                                                <span>1</span>
                                            </div>

                                        </div>
                                        <div class="player-2 text-scroll">
                                            <a title=Go to Crucero del Norte - Nueva Chicago odds comparisons href="../../football/argentina/primera-nacional-b/crucero-del-norte-v-nueva-chicago-1613776/index.html">Nueva Chicago</a>
                                            <div class="score">
                                                <span class="primary">2 </span>
                                                <span>1</span>
                                            </div>

                                        </div>
                                    </td>
                                    <td class='odds-col4'><span class="mobile-bet-type">1</span>2.16</td>
                                    <td class='odds-col4'><span class="mobile-bet-type">X</span>3.25</td>
                                    <td class='odds-col4'><span class="mobile-bet-type">2</span>4.90</td>
                                    <td class='odds-col4 bk-count'><span class="mobile-bet-type">B&#39;s</span><span class="badge badge-primary">59</span></td>

                                </tr>
                                <tr class="match-info">
                                    <td colspan="2">


                                        <div class="text-ellipsis">
                                            <a href="../../football/argentina/index.html">
                                                <i class="flag flag-ar menu-icon fa"></i>Argentina
                                            </a>
                                            <i class="fa fa-angle-double-right"></i>
                                            <a href="../../football/argentina/primera-division/index.html">Primera Division</a>
                                            <i data-league="10" onclick="$.favourites.click(this)" class="fa fa-star favourite light-grey"></i>
                                        </div>

                                    </td>
                                    <td class="odds-name hidden-xs">1</td>
                                    <td class="odds-name hidden-xs">X</td>
                                    <td class="odds-name hidden-xs">2</td>
                                    <td class="hidden-xs">B&#39;s</td>
                                </tr>
                                <tr class="main-table-row  deactivate">
                                    <td class="date-col">
                                        <div class="hour">00:15</div>
                                        <div class="period badge badge-success">FIN</div>
                                    </td>
                                    <td class="players-name-col">
                                        <div class="player-1 text-scroll">
                                            <a title=Go to Temperley - Patronato odds comparisons href="../../football/argentina/primera-division/temperley-v-patronato-1601297/index.html">Temperley</a>
                                            <div class="score">
                                        <span class="primary">
                                            1
                                        </span>
                                                <span>1</span>
                                            </div>

                                        </div>
                                        <div class="player-2 text-scroll">
                                            <a title=Go to Temperley - Patronato odds comparisons href="../../football/argentina/primera-division/temperley-v-patronato-1601297/index.html">Patronato</a>
                                            <div class="score">
                                                <span class="primary">0 </span>
                                                <span>0</span>
                                            </div>

                                        </div>
                                    </td>
                                    <td class='odds-col4'><span class="mobile-bet-type">1</span>2.68</td>
                                    <td class='odds-col4'><span class="mobile-bet-type">X</span>3.10</td>
                                    <td class='odds-col4'><span class="mobile-bet-type">2</span>3.35</td>
                                    <td class='odds-col4 bk-count'><span class="mobile-bet-type">B&#39;s</span><span class="badge badge-primary">67</span></td>

                                </tr>
                                <tr class="match-info">
                                    <td colspan="2">


                                        <div class="text-ellipsis">
                                            <a href="../../football/paraguay/index.html">
                                                <i class="flag flag-py menu-icon fa"></i>Paraguay
                                            </a>
                                            <i class="fa fa-angle-double-right"></i>
                                            <a href="../../football/paraguay/primera-division/index.html">Primera Division</a>
                                            <i data-league="155" onclick="$.favourites.click(this)" class="fa fa-star favourite light-grey"></i>
                                        </div>

                                    </td>
                                    <td class="odds-name hidden-xs">1</td>
                                    <td class="odds-name hidden-xs">X</td>
                                    <td class="odds-name hidden-xs">2</td>
                                    <td class="hidden-xs">B&#39;s</td>
                                </tr>
                                <tr class="main-table-row  deactivate">
                                    <td class="date-col">
                                        <div class="hour">00:30</div>
                                        <div class="period badge badge-success">FIN</div>
                                    </td>
                                    <td class="players-name-col">
                                        <div class="player-1 text-scroll">
                                            <a title=Go to Sportivo Luqueno - Deportivo Capiata odds comparisons href="../../football/paraguay/primera-division/sportivo-luqueno-v-deportivo-capiata-1612595/index.html">Sportivo Luqueno</a>
                                            <div class="score">
                                        <span class="primary">
                                            0
                                        </span>
                                                <span>0</span>
                                            </div>

                                        </div>
                                        <div class="player-2 text-scroll">
                                            <a title=Go to Sportivo Luqueno - Deportivo Capiata odds comparisons href="../../football/paraguay/primera-division/sportivo-luqueno-v-deportivo-capiata-1612595/index.html">Deportivo Capiata</a>
                                            <div class="score">
                                                <span class="primary">4 </span>
                                                <span>3</span>
                                            </div>

                                        </div>
                                    </td>
                                    <td class='odds-col4'><span class="mobile-bet-type">1</span>2.27</td>
                                    <td class='odds-col4'><span class="mobile-bet-type">X</span>4.00</td>
                                    <td class='odds-col4'><span class="mobile-bet-type">2</span>3.60</td>
                                    <td class='odds-col4 bk-count'><span class="mobile-bet-type">B&#39;s</span><span class="badge badge-primary">58</span></td>

                                </tr>

                                <tr class="match-info">
                                    <td colspan="2">


                                        <div class="text-ellipsis">
                                            <a href="../../football/argentina/index.html">
                                                <i class="flag flag-ar menu-icon fa"></i>Argentina
                                            </a>
                                            <i class="fa fa-angle-double-right"></i>
                                            <a href="../../football/argentina/primera-b-metropolitana/index.html">Primera B Metropolitana</a>
                                            <i data-league="308" onclick="$.favourites.click(this)" class="fa fa-star favourite light-grey"></i>
                                        </div>

                                    </td>
                                    <td class="odds-name hidden-xs">1</td>
                                    <td class="odds-name hidden-xs">X</td>
                                    <td class="odds-name hidden-xs">2</td>
                                    <td class="hidden-xs">B&#39;s</td>
                                </tr>
                                <tr class="main-table-row  deactivate">
                                    <td class="date-col">
                                        <div class="hour">18:30</div>
                                        <div class="period badge badge-success">FIN</div>
                                    </td>
                                    <td class="players-name-col">
                                        <div class="player-1 text-scroll">
                                            <a title=Go to Villa San Carlos - Almirante Brown odds comparisons href="../../football/argentina/primera-b-metropolitana/villa-san-carlos-v-almirante-brown-1617512/index.html">Villa San Carlos</a>
                                            <div class="score">
                                        <span class="primary">
                                            2
                                        </span>
                                                <span>1</span>
                                            </div>

                                        </div>
                                        <div class="player-2 text-scroll">
                                            <a title=Go to Villa San Carlos - Almirante Brown odds comparisons href="../../football/argentina/primera-b-metropolitana/villa-san-carlos-v-almirante-brown-1617512/index.html">Almirante Brown</a>
                                            <div class="score">
                                                <span class="primary">1 </span>
                                                <span>0</span>
                                            </div>

                                        </div>
                                    </td>
                                    <td class='odds-col4'><span class="mobile-bet-type">1</span>2.82</td>
                                    <td class='odds-col4'><span class="mobile-bet-type">X</span>3.15</td>
                                    <td class='odds-col4'><span class="mobile-bet-type">2</span>3.30</td>
                                    <td class='odds-col4 bk-count'><span class="mobile-bet-type">B&#39;s</span><span class="badge badge-primary">48</span></td>

                                </tr>
                                <tr class="match-info">
                                    <td colspan="2">


                                        <div class="text-ellipsis">
                                            <a href="../../football/argentina/index.html">
                                                <i class="flag flag-ar menu-icon fa"></i>Argentina
                                            </a>
                                            <i class="fa fa-angle-double-right"></i>
                                            <a href="../../football/argentina/primera-d-metropolitana/index.html">Primera D Metropolitana</a>
                                            <i data-league="6984" onclick="$.favourites.click(this)" class="fa fa-star favourite light-grey"></i>
                                        </div>

                                    </td>
                                    <td class="odds-name hidden-xs">1</td>
                                    <td class="odds-name hidden-xs">X</td>
                                    <td class="odds-name hidden-xs">2</td>
                                    <td class="hidden-xs">B&#39;s</td>
                                </tr>
                                <tr class="main-table-row  deactivate">
                                    <td class="date-col">
                                        <div class="hour">18:30</div>
                                        <div class="period badge badge-success">FIN</div>
                                    </td>
                                    <td class="players-name-col">
                                        <div class="player-1 text-scroll">
                                            <a title=Go to Central Ballester - Yupanqui odds comparisons href="../../football/argentina/primera-d-metropolitana/central-ballester-v-yupanqui-1618111/index.html">Central Ballester</a>
                                            <div class="score">
                                        <span class="primary">
                                            1
                                        </span>
                                                <span>0</span>
                                            </div>

                                        </div>
                                        <div class="player-2 text-scroll">
                                            <a title=Go to Central Ballester - Yupanqui odds comparisons href="../../football/argentina/primera-d-metropolitana/central-ballester-v-yupanqui-1618111/index.html">Yupanqui</a>
                                            <div class="score">
                                                <span class="primary">0 </span>
                                                <span>0</span>
                                            </div>

                                        </div>
                                    </td>
                                    <td class='odds-col4'><span class="mobile-bet-type">1</span>2.41</td>
                                    <td class='odds-col4'><span class="mobile-bet-type">X</span>3.08</td>
                                    <td class='odds-col4'><span class="mobile-bet-type">2</span>3.10</td>
                                    <td class='odds-col4 bk-count'><span class="mobile-bet-type">B&#39;s</span><span class="badge badge-primary">8</span></td>

                                </tr>
                                <tr class="match-info">
                                    <td colspan="2">


                                        <div class="text-ellipsis">
                                            <a href="../../football/argentina/index.html">
                                                <i class="flag flag-ar menu-icon fa"></i>Argentina
                                            </a>
                                            <i class="fa fa-angle-double-right"></i>
                                            <a href="../../football/argentina/primera-d-metropolitana/index.html">Primera D Metropolitana</a>
                                            <i data-league="6984" onclick="$.favourites.click(this)" class="fa fa-star favourite light-grey"></i>
                                        </div>

                                    </td>
                                    <td class="odds-name hidden-xs">1</td>
                                    <td class="odds-name hidden-xs">X</td>
                                    <td class="odds-name hidden-xs">2</td>
                                    <td class="hidden-xs">B&#39;s</td>
                                </tr>
                                <tr class="main-table-row  deactivate">
                                    <td class="date-col">
                                        <div class="hour">18:30</div>
                                        <div class="period badge badge-success">FIN</div>
                                    </td>
                                    <td class="players-name-col">
                                        <div class="player-1 text-scroll">
                                            <a title=Go to Victoriano Arenas - Deportivo Paraguayo odds comparisons href="../../football/argentina/primera-d-metropolitana/victoriano-arenas-v-deportivo-paraguayo-1618112/index.html">Victoriano Arenas</a>
                                            <div class="score">
                                        <span class="primary">
                                            0
                                        </span>
                                                <span>0</span>
                                            </div>

                                        </div>
                                        <div class="player-2 text-scroll">
                                            <a title=Go to Victoriano Arenas - Deportivo Paraguayo odds comparisons href="../../football/argentina/primera-d-metropolitana/victoriano-arenas-v-deportivo-paraguayo-1618112/index.html">Deportivo Paraguayo</a>
                                            <div class="score">
                                                <span class="primary">0 </span>
                                                <span>0</span>
                                            </div>

                                        </div>
                                    </td>
                                    <td class='odds-col4'><span class="mobile-bet-type">1</span>2.36</td>
                                    <td class='odds-col4'><span class="mobile-bet-type">X</span>2.97</td>
                                    <td class='odds-col4'><span class="mobile-bet-type">2</span>3.20</td>
                                    <td class='odds-col4 bk-count'><span class="mobile-bet-type">B&#39;s</span><span class="badge badge-primary">8</span></td>

                                </tr>
                                <tr class="match-info">
                                    <td colspan="2">


                                        <div class="text-ellipsis">
                                            <a href="../../football/argentina/index.html">
                                                <i class="flag flag-ar menu-icon fa"></i>Argentina
                                            </a>
                                            <i class="fa fa-angle-double-right"></i>
                                            <a href="../../football/argentina/primera-d-metropolitana/index.html">Primera D Metropolitana</a>
                                            <i data-league="6984" onclick="$.favourites.click(this)" class="fa fa-star favourite light-grey"></i>
                                        </div>

                                    </td>
                                    <td class="odds-name hidden-xs">1</td>
                                    <td class="odds-name hidden-xs">X</td>
                                    <td class="odds-name hidden-xs">2</td>
                                    <td class="hidden-xs">B&#39;s</td>
                                </tr>
                                <tr class="main-table-row  deactivate">
                                    <td class="date-col">
                                        <div class="hour">18:30</div>
                                        <div class="period badge badge-success">FIN</div>
                                    </td>
                                    <td class="players-name-col">
                                        <div class="player-1 text-scroll">
                                            <a title=Go to Deportivo Muniz - Argentino Rosario odds comparisons href="../../football/argentina/primera-d-metropolitana/deportivo-muniz-v-argentino-rosario-1618113/index.html">Deportivo Muniz</a>
                                            <div class="score">
                                        <span class="primary">
                                            0
                                        </span>
                                                <span>0</span>
                                            </div>

                                        </div>
                                        <div class="player-2 text-scroll">
                                            <a title=Go to Deportivo Muniz - Argentino Rosario odds comparisons href="../../football/argentina/primera-d-metropolitana/deportivo-muniz-v-argentino-rosario-1618113/index.html">Argentino Rosario</a>
                                            <div class="score">
                                                <span class="primary">2 </span>
                                                <span>1</span>
                                            </div>

                                        </div>
                                    </td>
                                    <td class='odds-col4'><span class="mobile-bet-type">1</span>3.10</td>
                                    <td class='odds-col4'><span class="mobile-bet-type">X</span>3.10</td>
                                    <td class='odds-col4'><span class="mobile-bet-type">2</span>2.65</td>
                                    <td class='odds-col4 bk-count'><span class="mobile-bet-type">B&#39;s</span><span class="badge badge-primary">17</span></td>

                                </tr>
                                <tr class="match-info">
                                    <td colspan="2">


                                        <div class="text-ellipsis">
                                            <a href="../../football/world/index.html">
                                                <i class="flag flag-wld menu-icon fa"></i>World
                                            </a>
                                            <i class="fa fa-angle-double-right"></i>
                                            <a href="../../football/world/friendly-internationals/index.html">Friendly Internationals</a>
                                            <i data-league="404" onclick="$.favourites.click(this)" class="fa fa-star favourite light-grey"></i>
                                        </div>

                                    </td>
                                    <td class="odds-name hidden-xs">1</td>
                                    <td class="odds-name hidden-xs">X</td>
                                    <td class="odds-name hidden-xs">2</td>
                                    <td class="hidden-xs">B&#39;s</td>
                                </tr>
                                <tr class="main-table-row  deactivate">
                                    <td class="date-col">
                                        <div class="hour">18:30</div>
                                        <div class="period badge badge-success">FIN</div>
                                    </td>
                                    <td class="players-name-col">
                                        <div class="player-1 text-scroll">
                                            <a title=Go to Egypt - Guinea odds comparisons href="../../football/world/friendly-internationals/egypt-v-guinea-1614906/index.html">Egypt</a>
                                            <div class="score">
                                        <span class="primary">
                                            1
                                        </span>
                                                <span>1</span>
                                            </div>

                                        </div>
                                        <div class="player-2 text-scroll">
                                            <a title=Go to Egypt - Guinea odds comparisons href="../../football/world/friendly-internationals/egypt-v-guinea-1614906/index.html">Guinea</a>
                                            <div class="score">
                                                <span class="primary">1 </span>
                                                <span>0</span>
                                            </div>

                                        </div>
                                    </td>
                                    <td class='odds-col4'><span class="mobile-bet-type">1</span>1.49</td>
                                    <td class='odds-col4'><span class="mobile-bet-type">X</span>5.80</td>
                                    <td class='odds-col4'><span class="mobile-bet-type">2</span>11.00</td>
                                    <td class='odds-col4 bk-count'><span class="mobile-bet-type">B&#39;s</span><span class="badge badge-primary">59</span></td>

                                </tr>
                                <tr class="match-info">
                                    <td colspan="2">


                                        <div class="text-ellipsis">
                                            <a href="../../football/world/index.html">
                                                <i class="flag flag-wld menu-icon fa"></i>World
                                            </a>
                                            <i class="fa fa-angle-double-right"></i>
                                            <a href="../../football/world/club-friendlies/index.html">Club Friendlies</a>
                                            <i data-league="512" onclick="$.favourites.click(this)" class="fa fa-star favourite light-grey"></i>
                                        </div>

                                    </td>
                                    <td class="odds-name hidden-xs">1</td>
                                    <td class="odds-name hidden-xs">X</td>
                                    <td class="odds-name hidden-xs">2</td>
                                    <td class="hidden-xs">B&#39;s</td>
                                </tr>
                                <tr class="main-table-row  deactivate">
                                    <td class="date-col">
                                        <div class="hour">18:30</div>
                                        <div class="period badge badge-success">FIN</div>
                                    </td>
                                    <td class="players-name-col">
                                        <div class="player-1 text-scroll">
                                            <a title=Go to Pinoso - Alcoyano B odds comparisons href="../../football/world/club-friendlies/pinoso-v-alcoyano-b-1618726/index.html">Pinoso</a>
                                            <div class="score">
                                        <span class="primary">
                                            2
                                        </span>
                                                <span>0</span>
                                            </div>

                                        </div>
                                        <div class="player-2 text-scroll">
                                            <a title=Go to Pinoso - Alcoyano B odds comparisons href="../../football/world/club-friendlies/pinoso-v-alcoyano-b-1618726/index.html">Alcoyano B</a>
                                            <div class="score">
                                                <span class="primary">0 </span>
                                                <span>0</span>
                                            </div>

                                        </div>
                                    </td>
                                    <td class='odds-col4'><span class="mobile-bet-type">1</span>4.33</td>
                                    <td class='odds-col4'><span class="mobile-bet-type">X</span>4.20</td>
                                    <td class='odds-col4'><span class="mobile-bet-type">2</span>1.67</td>
                                    <td class='odds-col4 bk-count'><span class="mobile-bet-type">B&#39;s</span><span class="badge badge-primary">8</span></td>

                                </tr>
                                <tr class="match-info">
                                    <td colspan="2">


                                        <div class="text-ellipsis">
                                            <a href="../../football/uruguay/index.html">
                                                <i class="flag flag-uy menu-icon fa"></i>Uruguay
                                            </a>
                                            <i class="fa fa-angle-double-right"></i>
                                            <a href="../../football/uruguay/primera-division/index.html">Primera Division</a>
                                            <i data-league="207" onclick="$.favourites.click(this)" class="fa fa-star favourite light-grey"></i>
                                        </div>

                                    </td>
                                    <td class="odds-name hidden-xs">1</td>
                                    <td class="odds-name hidden-xs">X</td>
                                    <td class="odds-name hidden-xs">2</td>
                                    <td class="hidden-xs">B&#39;s</td>
                                </tr>
                                <tr class="main-table-row  deactivate">
                                    <td class="date-col">
                                        <div class="hour">18:30</div>
                                        <div class="period badge badge-success">FIN</div>
                                    </td>
                                    <td class="players-name-col">
                                        <div class="player-1 text-scroll">
                                            <a title=Go to Fenix M - Cerro odds comparisons href="../../football/uruguay/primera-division/fenix(uru)-v-cerro-1616508/index.html">Fenix M</a>
                                            <div class="score">
                                        <span class="primary">
                                            0
                                        </span>
                                                <span>0</span>
                                            </div>

                                        </div>
                                        <div class="player-2 text-scroll">
                                            <a title=Go to Fenix M - Cerro odds comparisons href="../../football/uruguay/primera-division/fenix(uru)-v-cerro-1616508/index.html">Cerro</a>
                                            <div class="score">
                                                <span class="primary">1 </span>
                                                <span>0</span>
                                            </div>

                                        </div>
                                    </td>
                                    <td class='odds-col4'><span class="mobile-bet-type">1</span>2.34</td>
                                    <td class='odds-col4'><span class="mobile-bet-type">X</span>3.44</td>
                                    <td class='odds-col4'><span class="mobile-bet-type">2</span>3.40</td>
                                    <td class='odds-col4 bk-count'><span class="mobile-bet-type">B&#39;s</span><span class="badge badge-primary">59</span></td>

                                </tr>
                                <tr class="match-info">
                                    <td colspan="2">


                                        <div class="text-ellipsis">
                                            <a href="../../football/england/index.html">
                                                <i class="flag flag-gb menu-icon fa"></i>England
                                            </a>
                                            <i class="fa fa-angle-double-right"></i>
                                            <a href="../../football/england/checkatrade-trophy/index.html">Checkatrade Trophy</a>
                                            <i data-league="7829" onclick="$.favourites.click(this)" class="fa fa-star favourite light-grey"></i>
                                        </div>

                                    </td>
                                    <td class="odds-name hidden-xs">1</td>
                                    <td class="odds-name hidden-xs">X</td>
                                    <td class="odds-name hidden-xs">2</td>
                                    <td class="hidden-xs">B&#39;s</td>
                                </tr>
                                <tr class="main-table-row  deactivate">
                                    <td class="date-col">
                                        <div class="hour">18:30</div>
                                        <div class="period badge badge-success">FIN</div>
                                    </td>
                                    <td class="players-name-col">
                                        <div class="player-1 text-scroll">
                                            <a title=Go to Gillingham - Luton Town odds comparisons href="../../football/england/checkatrade-trophy/gillingham-v-luton-town-1616789/index.html">Gillingham</a>
                                            <div class="score">
                                        <span class="primary">
                                            1
                                        </span>
                                                <span>0</span>
                                            </div>

                                        </div>
                                        <div class="player-2 text-scroll">
                                            <a title=Go to Gillingham - Luton Town odds comparisons href="../../football/england/checkatrade-trophy/gillingham-v-luton-town-1616789/index.html">Luton Town</a>
                                            <div class="score">
                                                <span class="primary">2 </span>
                                                <span>2</span>
                                            </div>

                                        </div>
                                    </td>
                                    <td class='odds-col4'><span class="mobile-bet-type">1</span>2.12</td>
                                    <td class='odds-col4'><span class="mobile-bet-type">X</span>4.20</td>
                                    <td class='odds-col4'><span class="mobile-bet-type">2</span>5.90</td>
                                    <td class='odds-col4 bk-count'><span class="mobile-bet-type">B&#39;s</span><span class="badge badge-primary">63</span></td>

                                </tr>
                                <tr class="match-info">
                                    <td colspan="2">


                                        <div class="text-ellipsis">
                                            <a href="../../football/england/index.html">
                                                <i class="flag flag-gb menu-icon fa"></i>England
                                            </a>
                                            <i class="fa fa-angle-double-right"></i>
                                            <a href="../../football/england/checkatrade-trophy/index.html">Checkatrade Trophy</a>
                                            <i data-league="7829" onclick="$.favourites.click(this)" class="fa fa-star favourite light-grey"></i>
                                        </div>

                                    </td>
                                    <td class="odds-name hidden-xs">1</td>
                                    <td class="odds-name hidden-xs">X</td>
                                    <td class="odds-name hidden-xs">2</td>
                                    <td class="hidden-xs">B&#39;s</td>
                                </tr>
                                <tr class="main-table-row  deactivate">
                                    <td class="date-col">
                                        <div class="hour">18:30</div>
                                        <div class="period badge badge-success">FIN</div>
                                    </td>
                                    <td class="players-name-col">
                                        <div class="player-1 text-scroll">
                                            <a title=Go to Peterborough United - Norwich City U23 odds comparisons href="../../football/england/checkatrade-trophy/peterborough-united-v-norwich-city-u23-1616807/index.html">Peterborough United</a>
                                            <div class="score">
                                        <span class="primary">
                                            1
                                        </span>
                                                <span>0</span>
                                            </div>

                                        </div>
                                        <div class="player-2 text-scroll">
                                            <a title=Go to Peterborough United - Norwich City U23 odds comparisons href="../../football/england/checkatrade-trophy/peterborough-united-v-norwich-city-u23-1616807/index.html">Norwich City U23</a>
                                            <div class="score">
                                                <span class="primary">6 </span>
                                                <span>4</span>
                                            </div>

                                        </div>
                                    </td>
                                    <td class='odds-col4'><span class="mobile-bet-type">1</span>1.50</td>
                                    <td class='odds-col4'><span class="mobile-bet-type">X</span>5.00</td>
                                    <td class='odds-col4'><span class="mobile-bet-type">2</span>7.60</td>
                                    <td class='odds-col4 bk-count'><span class="mobile-bet-type">B&#39;s</span><span class="badge badge-primary">52</span></td>

                                </tr>
                                <tr class="match-info">
                                    <td colspan="2">


                                        <div class="text-ellipsis">
                                            <a href="../../football/wales/index.html">
                                                <i class="flag flag-wales menu-icon fa"></i>Wales
                                            </a>
                                            <i class="fa fa-angle-double-right"></i>
                                            <a href="../../football/wales/welsh-premier-league/index.html">Welsh Premier League</a>
                                            <i data-league="213" onclick="$.favourites.click(this)" class="fa fa-star favourite light-grey"></i>
                                        </div>

                                    </td>
                                    <td class="odds-name hidden-xs">1</td>
                                    <td class="odds-name hidden-xs">X</td>
                                    <td class="odds-name hidden-xs">2</td>
                                    <td class="hidden-xs">B&#39;s</td>
                                </tr>
                                <tr class="main-table-row  deactivate">
                                    <td class="date-col">
                                        <div class="hour">18:45</div>
                                        <div class="period badge badge-important">92&#39;</div>
                                    </td>
                                    <td class="players-name-col">
                                        <div class="player-1 text-scroll">
                                            <a title=Go to Llandudno - Airbus UK odds comparisons href="../../football/wales/welsh-premier-league/llandudno-v-airbus-uk-1616148/index.html">Llandudno</a>

                                        </div>
                                        <div class="player-2 text-scroll">
                                            <a title=Go to Llandudno - Airbus UK odds comparisons href="../../football/wales/welsh-premier-league/llandudno-v-airbus-uk-1616148/index.html">Airbus UK</a>

                                        </div>
                                    </td>
                                    <td class='odds-col4'><span class="mobile-bet-type">1</span>2.29</td>
                                    <td class='odds-col4'><span class="mobile-bet-type">X</span>3.90</td>
                                    <td class='odds-col4'><span class="mobile-bet-type">2</span>3.42</td>
                                    <td class='odds-col4 bk-count'><span class="mobile-bet-type">B&#39;s</span><span class="badge badge-primary">61</span></td>

                                </tr>
                                <tr class="match-info">
                                    <td colspan="2">


                                        <div class="text-ellipsis">
                                            <a href="../../football/wales/index.html">
                                                <i class="flag flag-wales menu-icon fa"></i>Wales
                                            </a>
                                            <i class="fa fa-angle-double-right"></i>
                                            <a href="../../football/wales/welsh-premier-league/index.html">Welsh Premier League</a>
                                            <i data-league="213" onclick="$.favourites.click(this)" class="fa fa-star favourite light-grey"></i>
                                        </div>

                                    </td>
                                    <td class="odds-name hidden-xs">1</td>
                                    <td class="odds-name hidden-xs">X</td>
                                    <td class="odds-name hidden-xs">2</td>
                                    <td class="hidden-xs">B&#39;s</td>
                                </tr>
                                <tr class="main-table-row  deactivate">
                                    <td class="date-col">
                                        <div class="hour">18:45</div>
                                        <div class="period badge badge-success">FIN</div>
                                    </td>
                                    <td class="players-name-col">
                                        <div class="player-1 text-scroll">
                                            <a title=Go to Bala Town - Carmarthen Town odds comparisons href="../../football/wales/welsh-premier-league/bala-town-v-carmarthen-town-1616149/index.html">Bala Town</a>
                                            <div class="score">
                                        <span class="primary">
                                            0
                                        </span>
                                                <span>0</span>
                                            </div>

                                        </div>
                                        <div class="player-2 text-scroll">
                                            <a title=Go to Bala Town - Carmarthen Town odds comparisons href="../../football/wales/welsh-premier-league/bala-town-v-carmarthen-town-1616149/index.html">Carmarthen Town</a>
                                            <div class="score">
                                                <span class="primary">0 </span>
                                                <span>0</span>
                                            </div>

                                        </div>
                                    </td>
                                    <td class='odds-col4'><span class="mobile-bet-type">1</span>1.59</td>
                                    <td class='odds-col4'><span class="mobile-bet-type">X</span>4.90</td>
                                    <td class='odds-col4'><span class="mobile-bet-type">2</span>8.00</td>
                                    <td class='odds-col4 bk-count'><span class="mobile-bet-type">B&#39;s</span><span class="badge badge-primary">60</span></td>

                                </tr>
                                <tr class="match-info">
                                    <td colspan="2">


                                        <div class="text-ellipsis">
                                            <a href="../../football/england/index.html">
                                                <i class="flag flag-gb menu-icon fa"></i>England
                                            </a>
                                            <i class="fa fa-angle-double-right"></i>
                                            <a href="../../football/england/checkatrade-trophy/index.html">Checkatrade Trophy</a>
                                            <i data-league="7829" onclick="$.favourites.click(this)" class="fa fa-star favourite light-grey"></i>
                                        </div>

                                    </td>
                                    <td class="odds-name hidden-xs">1</td>
                                    <td class="odds-name hidden-xs">X</td>
                                    <td class="odds-name hidden-xs">2</td>
                                    <td class="hidden-xs">B&#39;s</td>
                                </tr>
                                <tr class="main-table-row  deactivate">
                                    <td class="date-col">
                                        <div class="hour">18:45</div>
                                        <div class="period badge badge-important">92&#39;</div>
                                    </td>
                                    <td class="players-name-col">
                                        <div class="player-1 text-scroll">
                                            <a title=Go to Yeovil Town - Portsmouth odds comparisons href="../../football/england/checkatrade-trophy/yeovil-town-v-portsmouth-1616786/index.html">Yeovil Town</a>

                                        </div>
                                        <div class="player-2 text-scroll">
                                            <a title=Go to Yeovil Town - Portsmouth odds comparisons href="../../football/england/checkatrade-trophy/yeovil-town-v-portsmouth-1616786/index.html">Portsmouth</a>

                                        </div>
                                    </td>
                                    <td class='odds-col4'><span class="mobile-bet-type">1</span>3.70</td>
                                    <td class='odds-col4'><span class="mobile-bet-type">X</span>3.45</td>
                                    <td class='odds-col4'><span class="mobile-bet-type">2</span>2.86</td>
                                    <td class='odds-col4 bk-count'><span class="mobile-bet-type">B&#39;s</span><span class="badge badge-primary">63</span></td>

                                </tr>
                                <tr class="match-info">
                                    <td colspan="2">


                                        <div class="text-ellipsis">
                                            <a href="../../football/england/index.html">
                                                <i class="flag flag-gb menu-icon fa"></i>England
                                            </a>
                                            <i class="fa fa-angle-double-right"></i>
                                            <a href="../../football/england/checkatrade-trophy/index.html">Checkatrade Trophy</a>
                                            <i data-league="7829" onclick="$.favourites.click(this)" class="fa fa-star favourite light-grey"></i>
                                        </div>

                                    </td>
                                    <td class="odds-name hidden-xs">1</td>
                                    <td class="odds-name hidden-xs">X</td>
                                    <td class="odds-name hidden-xs">2</td>
                                    <td class="hidden-xs">B&#39;s</td>
                                </tr>
                                <tr class="main-table-row  deactivate">
                                    <td class="date-col">
                                        <div class="hour">18:45</div>
                                        <div class="period badge badge-important">95&#39;</div>
                                    </td>
                                    <td class="players-name-col">
                                        <div class="player-1 text-scroll">
                                            <a title=Go to Milton Keynes Dons - Barnet odds comparisons href="../../football/england/checkatrade-trophy/milton-keynes-dons-v-barnet-1616787/index.html">Milton Keynes Dons</a>

                                        </div>
                                        <div class="player-2 text-scroll">
                                            <a title=Go to Milton Keynes Dons - Barnet odds comparisons href="../../football/england/checkatrade-trophy/milton-keynes-dons-v-barnet-1616787/index.html">Barnet</a>

                                        </div>
                                    </td>
                                    <td class='odds-col4'><span class="mobile-bet-type">1</span>1.71</td>
                                    <td class='odds-col4'><span class="mobile-bet-type">X</span>4.40</td>
                                    <td class='odds-col4'><span class="mobile-bet-type">2</span>6.10</td>
                                    <td class='odds-col4 bk-count'><span class="mobile-bet-type">B&#39;s</span><span class="badge badge-primary">63</span></td>

                                </tr>
                                <tr class="match-info">
                                    <td colspan="2">


                                        <div class="text-ellipsis">
                                            <a href="../../football/england/index.html">
                                                <i class="flag flag-gb menu-icon fa"></i>England
                                            </a>
                                            <i class="fa fa-angle-double-right"></i>
                                            <a href="../../football/england/checkatrade-trophy/index.html">Checkatrade Trophy</a>
                                            <i data-league="7829" onclick="$.favourites.click(this)" class="fa fa-star favourite light-grey"></i>
                                        </div>

                                    </td>
                                    <td class="odds-name hidden-xs">1</td>
                                    <td class="odds-name hidden-xs">X</td>
                                    <td class="odds-name hidden-xs">2</td>
                                    <td class="hidden-xs">B&#39;s</td>
                                </tr>
                                <tr class="main-table-row  deactivate">
                                    <td class="date-col">
                                        <div class="hour">18:45</div>
                                        <div class="period badge badge-success">FIN</div>
                                    </td>
                                    <td class="players-name-col">
                                        <div class="player-1 text-scroll">
                                            <a title=Go to Leyton Orient - Stevenage Borough odds comparisons href="../../football/england/checkatrade-trophy/leyton-orient-v-stevenage-borough-1616788/index.html">Leyton Orient</a>
                                            <div class="score">
                                        <span class="primary">
                                            3
                                        </span>
                                                <span>1</span>
                                            </div>

                                        </div>
                                        <div class="player-2 text-scroll">
                                            <a title=Go to Leyton Orient - Stevenage Borough odds comparisons href="../../football/england/checkatrade-trophy/leyton-orient-v-stevenage-borough-1616788/index.html">Stevenage Borough</a>
                                            <div class="score">
                                                <span class="primary">1 </span>
                                                <span>0</span>
                                            </div>

                                        </div>
                                    </td>
                                    <td class='odds-col4'><span class="mobile-bet-type">1</span>1.98</td>
                                    <td class='odds-col4'><span class="mobile-bet-type">X</span>3.98</td>
                                    <td class='odds-col4'><span class="mobile-bet-type">2</span>4.60</td>
                                    <td class='odds-col4 bk-count'><span class="mobile-bet-type">B&#39;s</span><span class="badge badge-primary">62</span></td>

                                </tr>
                                <tr class="match-info">
                                    <td colspan="2">


                                        <div class="text-ellipsis">
                                            <a href="../../football/england/index.html">
                                                <i class="flag flag-gb menu-icon fa"></i>England
                                            </a>
                                            <i class="fa fa-angle-double-right"></i>
                                            <a href="../../football/england/checkatrade-trophy/index.html">Checkatrade Trophy</a>
                                            <i data-league="7829" onclick="$.favourites.click(this)" class="fa fa-star favourite light-grey"></i>
                                        </div>

                                    </td>
                                    <td class="odds-name hidden-xs">1</td>
                                    <td class="odds-name hidden-xs">X</td>
                                    <td class="odds-name hidden-xs">2</td>
                                    <td class="hidden-xs">B&#39;s</td>
                                </tr>
                                <tr class="main-table-row  deactivate">
                                    <td class="date-col">
                                        <div class="hour">18:45</div>
                                        <div class="period badge badge-success">FIN</div>
                                    </td>
                                    <td class="players-name-col">
                                        <div class="player-1 text-scroll">
                                            <a title=Go to Shrewsbury Town - Cambridge United odds comparisons href="../../football/england/checkatrade-trophy/shrewsbury-town-v-cambridge-united-1616790/index.html">Shrewsbury Town</a>
                                            <div class="score">
                                        <span class="primary">
                                            0
                                        </span>
                                                <span>0</span>
                                            </div>

                                        </div>
                                        <div class="player-2 text-scroll">
                                            <a title=Go to Shrewsbury Town - Cambridge United odds comparisons href="../../football/england/checkatrade-trophy/shrewsbury-town-v-cambridge-united-1616790/index.html">Cambridge United</a>
                                            <div class="score">
                                                <span class="primary">1 </span>
                                                <span>1</span>
                                            </div>

                                        </div>
                                    </td>
                                    <td class='odds-col4'><span class="mobile-bet-type">1</span>2.02</td>
                                    <td class='odds-col4'><span class="mobile-bet-type">X</span>3.80</td>
                                    <td class='odds-col4'><span class="mobile-bet-type">2</span>4.70</td>
                                    <td class='odds-col4 bk-count'><span class="mobile-bet-type">B&#39;s</span><span class="badge badge-primary">61</span></td>

                                </tr>
                                <tr class="match-info">
                                    <td colspan="2">


                                        <div class="text-ellipsis">
                                            <a href="../../football/england/index.html">
                                                <i class="flag flag-gb menu-icon fa"></i>England
                                            </a>
                                            <i class="fa fa-angle-double-right"></i>
                                            <a href="../../football/england/checkatrade-trophy/index.html">Checkatrade Trophy</a>
                                            <i data-league="7829" onclick="$.favourites.click(this)" class="fa fa-star favourite light-grey"></i>
                                        </div>

                                    </td>
                                    <td class="odds-name hidden-xs">1</td>
                                    <td class="odds-name hidden-xs">X</td>
                                    <td class="odds-name hidden-xs">2</td>
                                    <td class="hidden-xs">B&#39;s</td>
                                </tr>
                                <tr class="main-table-row  deactivate">
                                    <td class="date-col">
                                        <div class="hour">18:45</div>
                                        <div class="period badge badge-important">93&#39;</div>
                                    </td>
                                    <td class="players-name-col">
                                        <div class="player-1 text-scroll">
                                            <a title=Go to Mansfield Town - Doncaster Rovers odds comparisons href="../../football/england/checkatrade-trophy/mansfield-town-v-doncaster-rovers-1616791/index.html">Mansfield Town</a>

                                        </div>
                                        <div class="player-2 text-scroll">
                                            <a title=Go to Mansfield Town - Doncaster Rovers odds comparisons href="../../football/england/checkatrade-trophy/mansfield-town-v-doncaster-rovers-1616791/index.html">Doncaster Rovers</a>

                                        </div>
                                    </td>
                                    <td class='odds-col4'><span class="mobile-bet-type">1</span>3.22</td>
                                    <td class='odds-col4'><span class="mobile-bet-type">X</span>3.45</td>
                                    <td class='odds-col4'><span class="mobile-bet-type">2</span>2.56</td>
                                    <td class='odds-col4 bk-count'><span class="mobile-bet-type">B&#39;s</span><span class="badge badge-primary">63</span></td>

                                </tr>
                                <tr class="match-info">
                                    <td colspan="2">


                                        <div class="text-ellipsis">
                                            <a href="../../football/england/index.html">
                                                <i class="flag flag-gb menu-icon fa"></i>England
                                            </a>
                                            <i class="fa fa-angle-double-right"></i>
                                            <a href="../../football/england/checkatrade-trophy/index.html">Checkatrade Trophy</a>
                                            <i data-league="7829" onclick="$.favourites.click(this)" class="fa fa-star favourite light-grey"></i>
                                        </div>

                                    </td>
                                    <td class="odds-name hidden-xs">1</td>
                                    <td class="odds-name hidden-xs">X</td>
                                    <td class="odds-name hidden-xs">2</td>
                                    <td class="hidden-xs">B&#39;s</td>
                                </tr>
                                <tr class="main-table-row  deactivate">
                                    <td class="date-col">
                                        <div class="hour">18:45</div>
                                        <div class="period badge badge-success">FIN</div>
                                    </td>
                                    <td class="players-name-col">
                                        <div class="player-1 text-scroll">
                                            <a title=Go to Northampton Town - Wycombe Wanderers odds comparisons href="../../football/england/checkatrade-trophy/northampton-town-v-wycombe-wanderers-1616792/index.html">Northampton Town</a>
                                            <div class="score">
                                        <span class="primary">
                                            0
                                        </span>
                                                <span>0</span>
                                            </div>

                                        </div>
                                        <div class="player-2 text-scroll">
                                            <a title=Go to Northampton Town - Wycombe Wanderers odds comparisons href="../../football/england/checkatrade-trophy/northampton-town-v-wycombe-wanderers-1616792/index.html">Wycombe Wanderers</a>
                                            <div class="score">
                                                <span class="primary">3 </span>
                                                <span>1</span>
                                            </div>

                                        </div>
                                    </td>
                                    <td class='odds-col4'><span class="mobile-bet-type">1</span>1.86</td>
                                    <td class='odds-col4'><span class="mobile-bet-type">X</span>4.00</td>
                                    <td class='odds-col4'><span class="mobile-bet-type">2</span>4.80</td>
                                    <td class='odds-col4 bk-count'><span class="mobile-bet-type">B&#39;s</span><span class="badge badge-primary">63</span></td>

                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

    <script src="#"></script>
@endsection