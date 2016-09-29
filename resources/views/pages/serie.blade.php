@extends('layouts.app')

@section('content')
    <div class="page-content">
    <div class="page-header">
        <h1><img src="{{ URL::asset('assets/images/Country/BRA.png') }}" /> Serie {{ $s1 }} <i data-league="1637" onclick="$.favourites.click(this)" class="fa fa-star favourite light-grey"></i></h1>

    </div><!-- /.page-header -->
    <div class="row">
        <div class="col-xs-12 col-md-9 widget-container-col ui-sortable">

            <a class="btn btn-sm btn-primary" href="http://dev.bmbets.com/sports/League">
                <i class="ace-icon fa fa-book"></i>
                <span class="hidden-580">Beting Odds</span>
            </a>
            <a class="btn btn-sm btn-danger disabled" href="http://dev.bmbets.com/football/brazil/serie-a/tables">
                <i class="ace-icon fa fa-sitemap"></i>
                <span class="hidden-580">Standings</span>
            </a>
            <a class="btn btn-sm btn-success disabled" href="http://dev.bmbets.com/football/brazil/serie-a/results-fixtures">
                <i class="ace-icon fa fa-calendar"></i>
                <span class="hidden-580">Results/Fixtures</span>
            </a>
            <div class="space-4"></div>

            <div class="main-table-wrapper table-tab">
                <div class="table-wrapper">

                    <table class="table table-striped">
                        <tbody class="main-table">
                        <tr class="match-info">
                            <td colspan="2">
                                Saturday, September 03, 2016
                            </td>
                            <td class="odds-name hidden-xs">1 </td>
                            <td class="odds-name hidden-xs">X </td>
                            <td class="odds-name hidden-xs">2 </td>
                            <td class="center  hidden-xs">B&#39;s</td>
                        </tr>
                        <tr class="main-table-row">
                            <td class="date-col">
                                <div class="hour">19:00</div>
                                <div class="period badge badge-important"></div>
                            </td>
                            <td class="players-name-col">
                                <div class="player-1 text-scroll">
                                    <div class="img" style="background-image: url('http://res.bmbets.com/Images/teams/50/18x18/56164.png');"></div>

                                    <a title="Go to Fluminense - Figueirense odds comparisons" href="fluminense-v-figueirense-1618135/index.html">Fluminense</a>
                                </div>
                                <div class="player-2 text-scroll">
                                    <div class="img" style="background-image: url('http://res.bmbets.com/Images/teams/50/18x18/56163.png');"></div>
                                    <a title="Go to Fluminense - Figueirense odds comparisons" href="fluminense-v-figueirense-1618135/index.html">Figueirense</a>
                                </div>
                            </td>

                            <td class='odds-col4'><span class="mobile-bet-type">1</span>1.71</td>
                            <td class='odds-col4'><span class="mobile-bet-type">X</span>3.84</td>
                            <td class='odds-col4'><span class="mobile-bet-type">2</span>5.90</td>
                            <td class='bk-count odds-col4'><span class="mobile-bet-type">B&#39;s</span><span class="badge badge-primary">29</span></td>
                        </tr><tr class="main-table-row">
                            <td class="date-col">
                                <div class="hour">19:00</div>
                                <div class="period badge badge-important"></div>
                            </td>
                            <td class="players-name-col">
                                <div class="player-1 text-scroll">
                                    <div class="img" style="background-image: url('http://res.bmbets.com/Images/teams/50/18x18/56164.png');"></div>

                                    <a title="Go to Fluminense - Figueirense odds comparisons" href="fluminense-v-figueirense-1618135/index.html">Fluminense</a>
                                </div>
                                <div class="player-2 text-scroll">
                                    <div class="img" style="background-image: url('http://res.bmbets.com/Images/teams/50/18x18/56163.png');"></div>
                                    <a title="Go to Fluminense - Figueirense odds comparisons" href="fluminense-v-figueirense-1618135/index.html">Figueirense</a>
                                </div>
                            </td>

                            <td class='odds-col4'><span class="mobile-bet-type">1</span>1.71</td>
                            <td class='odds-col4'><span class="mobile-bet-type">X</span>3.84</td>
                            <td class='odds-col4'><span class="mobile-bet-type">2</span>5.90</td>
                            <td class='bk-count odds-col4'><span class="mobile-bet-type">B&#39;s</span><span class="badge badge-primary">29</span></td>
                        </tr>
                        <tr class="match-info">
                            <td colspan="2">
                                Sunday, September 04, 2016
                            </td>
                            <td class="odds-name hidden-xs">1 </td>
                            <td class="odds-name hidden-xs">X </td>
                            <td class="odds-name hidden-xs">2 </td>
                            <td class="center  hidden-xs">B&#39;s</td>
                        </tr>
                        <tr class="main-table-row">
                            <td class="date-col">
                                <div class="hour">21:30</div>
                                <div class="period badge badge-important"></div>
                            </td>
                            <td class="players-name-col">
                                <div class="player-1 text-scroll">
                                    <div class="img" style="background-image: url('http://res.bmbets.com/Images/teams/50/18x18/56144.png');"></div>

                                    <a title="Go to Botafogo RJ - Gremio odds comparisons" href="botafogo-rj-v-gremio-1618136/index.html">Botafogo RJ</a>
                                </div>
                                <div class="player-2 text-scroll">
                                    <div class="img" style="background-image: url('http://res.bmbets.com/Images/teams/50/18x18/56168.png');"></div>
                                    <a title="Go to Botafogo RJ - Gremio odds comparisons" href="botafogo-rj-v-gremio-1618136/index.html">Gremio</a>
                                </div>
                            </td>

                            <td class='odds-col4'><span class="mobile-bet-type">1</span>2.87</td>
                            <td class='odds-col4'><span class="mobile-bet-type">X</span>3.36</td>
                            <td class='odds-col4'><span class="mobile-bet-type">2</span>2.74</td>
                            <td class='bk-count odds-col4'><span class="mobile-bet-type">B&#39;s</span><span class="badge badge-primary">47</span></td>
                        </tr>
                        <tr class="match-info">
                            <td colspan="2">
                                Wednesday, September 07, 2016
                            </td>
                            <td class="odds-name hidden-xs">1 </td>
                            <td class="odds-name hidden-xs">X </td>
                            <td class="odds-name hidden-xs">2 </td>
                            <td class="center  hidden-xs">B&#39;s</td>
                        </tr>
                        <tr class="main-table-row">
                            <td class="date-col">
                                <div class="hour">22:30</div>
                                <div class="period badge badge-important"></div>
                            </td>
                            <td class="players-name-col">
                                <div class="player-1 text-scroll">
                                    <div class="img" style="background-image: url('http://res.bmbets.com/Images/teams/50/18x18/56139.png');"></div>

                                    <a title="Go to Atletico MG - Vitoria odds comparisons" href="atletico-mg-v-vitoria-1618901/index.html">Atletico MG</a>
                                </div>
                                <div class="player-2 text-scroll">
                                    <div class="img" style="background-image: url('http://res.bmbets.com/Images/teams/50/18x18/56162.png');"></div>
                                    <a title="Go to Atletico MG - Vitoria odds comparisons" href="atletico-mg-v-vitoria-1618901/index.html">Vitoria</a>
                                </div>
                            </td>

                            <td class='odds-col4'><span class="mobile-bet-type">1</span>1.30</td>
                            <td class='odds-col4'><span class="mobile-bet-type">X</span>3.65</td>
                            <td class='odds-col4'><span class="mobile-bet-type">2</span>5.80</td>
                            <td class='bk-count odds-col4'><span class="mobile-bet-type">B&#39;s</span><span class="badge badge-primary">1</span></td>
                        </tr>
                        <tr class="match-info">
                            <td colspan="2">
                                Saturday, September 03, 2016
                            </td>
                            <td class="odds-name hidden-xs">1 </td>
                            <td class="odds-name hidden-xs">X </td>
                            <td class="odds-name hidden-xs">2 </td>
                            <td class="center  hidden-xs">B&#39;s</td>
                        </tr>
                        <tr class="main-table-row">
                            <td class="date-col">
                                <div class="hour">19:00</div>
                                <div class="period badge badge-important"></div>
                            </td>
                            <td class="players-name-col">
                                <div class="player-1 text-scroll">
                                    <div class="img" style="background-image: url('http://res.bmbets.com/Images/teams/50/18x18/56164.png');"></div>

                                    <a title="Go to Fluminense - Figueirense odds comparisons" href="fluminense-v-figueirense-1618135/index.html">Fluminense</a>
                                </div>
                                <div class="player-2 text-scroll">
                                    <div class="img" style="background-image: url('http://res.bmbets.com/Images/teams/50/18x18/56163.png');"></div>
                                    <a title="Go to Fluminense - Figueirense odds comparisons" href="fluminense-v-figueirense-1618135/index.html">Figueirense</a>
                                </div>
                            </td>

                            <td class='odds-col4'><span class="mobile-bet-type">1</span>1.71</td>
                            <td class='odds-col4'><span class="mobile-bet-type">X</span>3.84</td>
                            <td class='odds-col4'><span class="mobile-bet-type">2</span>5.90</td>
                            <td class='bk-count odds-col4'><span class="mobile-bet-type">B&#39;s</span><span class="badge badge-primary">29</span></td>
                        </tr>
                        <tr class="match-info">
                            <td colspan="2">
                                Saturday, September 03, 2016
                            </td>
                            <td class="odds-name hidden-xs">1 </td>
                            <td class="odds-name hidden-xs">X </td>
                            <td class="odds-name hidden-xs">2 </td>
                            <td class="center  hidden-xs">B&#39;s</td>
                        </tr>
                        <tr class="main-table-row">
                            <td class="date-col">
                                <div class="hour">19:00</div>
                                <div class="period badge badge-important"></div>
                            </td>
                            <td class="players-name-col">
                                <div class="player-1 text-scroll">
                                    <div class="img" style="background-image: url('http://res.bmbets.com/Images/teams/50/18x18/56164.png');"></div>

                                    <a title="Go to Fluminense - Figueirense odds comparisons" href="fluminense-v-figueirense-1618135/index.html">Fluminense</a>
                                </div>
                                <div class="player-2 text-scroll">
                                    <div class="img" style="background-image: url('http://res.bmbets.com/Images/teams/50/18x18/56163.png');"></div>
                                    <a title="Go to Fluminense - Figueirense odds comparisons" href="fluminense-v-figueirense-1618135/index.html">Figueirense</a>
                                </div>
                            </td>

                            <td class='odds-col4'><span class="mobile-bet-type">1</span>1.71</td>
                            <td class='odds-col4'><span class="mobile-bet-type">X</span>3.84</td>
                            <td class='odds-col4'><span class="mobile-bet-type">2</span>5.90</td>
                            <td class='bk-count odds-col4'><span class="mobile-bet-type">B&#39;s</span><span class="badge badge-primary">29</span></td>
                        </tr>
                        <tr class="match-info">
                            <td colspan="2">
                                Saturday, September 03, 2016
                            </td>
                            <td class="odds-name hidden-xs">1 </td>
                            <td class="odds-name hidden-xs">X </td>
                            <td class="odds-name hidden-xs">2 </td>
                            <td class="center  hidden-xs">B&#39;s</td>
                        </tr>
                        <tr class="main-table-row">
                            <td class="date-col">
                                <div class="hour">19:00</div>
                                <div class="period badge badge-important"></div>
                            </td>
                            <td class="players-name-col">
                                <div class="player-1 text-scroll">
                                    <div class="img" style="background-image: url('http://res.bmbets.com/Images/teams/50/18x18/56164.png');"></div>

                                    <a title="Go to Fluminense - Figueirense odds comparisons" href="fluminense-v-figueirense-1618135/index.html">Fluminense</a>
                                </div>
                                <div class="player-2 text-scroll">
                                    <div class="img" style="background-image: url('http://res.bmbets.com/Images/teams/50/18x18/56163.png');"></div>
                                    <a title="Go to Fluminense - Figueirense odds comparisons" href="fluminense-v-figueirense-1618135/index.html">Figueirense</a>
                                </div>
                            </td>

                            <td class='odds-col4'><span class="mobile-bet-type">1</span>1.71</td>
                            <td class='odds-col4'><span class="mobile-bet-type">X</span>3.84</td>
                            <td class='odds-col4'><span class="mobile-bet-type">2</span>5.90</td>
                            <td class='bk-count odds-col4'><span class="mobile-bet-type">B&#39;s</span><span class="badge badge-primary">29</span></td>
                        </tr>
                        <tr class="match-info">
                            <td colspan="2">
                                Saturday, September 03, 2016
                            </td>
                            <td class="odds-name hidden-xs">1 </td>
                            <td class="odds-name hidden-xs">X </td>
                            <td class="odds-name hidden-xs">2 </td>
                            <td class="center  hidden-xs">B&#39;s</td>
                        </tr>
                        <tr class="main-table-row">
                            <td class="date-col">
                                <div class="hour">19:00</div>
                                <div class="period badge badge-important"></div>
                            </td>
                            <td class="players-name-col">
                                <div class="player-1 text-scroll">
                                    <div class="img" style="background-image: url('http://res.bmbets.com/Images/teams/50/18x18/56164.png');"></div>

                                    <a title="Go to Fluminense - Figueirense odds comparisons" href="fluminense-v-figueirense-1618135/index.html">Fluminense</a>
                                </div>
                                <div class="player-2 text-scroll">
                                    <div class="img" style="background-image: url('http://res.bmbets.com/Images/teams/50/18x18/56163.png');"></div>
                                    <a title="Go to Fluminense - Figueirense odds comparisons" href="fluminense-v-figueirense-1618135/index.html">Figueirense</a>
                                </div>
                            </td>

                            <td class='odds-col4'><span class="mobile-bet-type">1</span>1.71</td>
                            <td class='odds-col4'><span class="mobile-bet-type">X</span>3.84</td>
                            <td class='odds-col4'><span class="mobile-bet-type">2</span>5.90</td>
                            <td class='bk-count odds-col4'><span class="mobile-bet-type">B&#39;s</span><span class="badge badge-primary">29</span></td>
                        </tr>
                        <tr class="match-info">
                            <td colspan="2">
                                Saturday, September 03, 2016
                            </td>
                            <td class="odds-name hidden-xs">1 </td>
                            <td class="odds-name hidden-xs">X </td>
                            <td class="odds-name hidden-xs">2 </td>
                            <td class="center  hidden-xs">B&#39;s</td>
                        </tr>
                        <tr class="main-table-row">
                            <td class="date-col">
                                <div class="hour">19:00</div>
                                <div class="period badge badge-important"></div>
                            </td>
                            <td class="players-name-col">
                                <div class="player-1 text-scroll">
                                    <div class="img" style="background-image: url('http://res.bmbets.com/Images/teams/50/18x18/56164.png');"></div>

                                    <a title="Go to Fluminense - Figueirense odds comparisons" href="fluminense-v-figueirense-1618135/index.html">Fluminense</a>
                                </div>
                                <div class="player-2 text-scroll">
                                    <div class="img" style="background-image: url('http://res.bmbets.com/Images/teams/50/18x18/56163.png');"></div>
                                    <a title="Go to Fluminense - Figueirense odds comparisons" href="fluminense-v-figueirense-1618135/index.html">Figueirense</a>
                                </div>
                            </td>

                            <td class='odds-col4'><span class="mobile-bet-type">1</span>1.71</td>
                            <td class='odds-col4'><span class="mobile-bet-type">X</span>3.84</td>
                            <td class='odds-col4'><span class="mobile-bet-type">2</span>5.90</td>
                            <td class='bk-count odds-col4'><span class="mobile-bet-type">B&#39;s</span><span class="badge badge-primary">29</span></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
@endsection