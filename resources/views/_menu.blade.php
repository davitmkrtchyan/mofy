@foreach($groups as $sportName=>$sportInformation)

    <div data-sidebar-hover="true" data-sidebar-scroll="true" data-auto-hide="true" data-sidebar="true" id="sidebar"
         class="sidebar responsive">
        <div style="z-index: 1;" class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
            <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left"
               data-icon2="ace-icon fa fa-angle-double-right"></i>
        </div>
        <div class="nav-wrap-up pos-rel">
            <div class="nav-wrap">
                <div style="position: relative; top: 0px; transition-property: top; transition-duration: 0.15s;">

                    <ul class="nav nav-list">

                        <!--Foreach starts here-->
                        <li class="highlight">
                            <!--Class s50 has background football ball, s51 hockey image etc-->
                            <a href="/" class="{{$sportInformation['logo']}} dropdown-toggle">
                                <i class="menu-icon fa"></i>
                                <span class="menu-text"
                                      data-original-title="1130">{{$sportInformation['name']}}</span>
                                <b class="arrow fa fa-angle-down"></b>
                            </a>
                            <b class="arrow"></b>
                            <!--Country block-->
                            <ul style="" class="submenu">
                                <li class="">
                                    @foreach($sportInformation['countryList']as $countryName=>$leagueList)
                                        <a href="/" class="dropdown-toggle">
                                            <!--Country flag-->
                                            {{$countryName}}
                                            <b class="arrow fa fa-angle-down"></b>
                                        </a>

                                        <b class="arrow"></b>

                                        <!--Liga block-->
                                        <ul style="display: none;" class="submenu nav-hide">
                                            <li class="">
                                            @foreach($leagueList as $leagueInformation)
                                                <!--Change url parameters-->
                                                    <a title="{{$leagueInformation['leagueName']}}" class="l-item"
                                                       href="{{ url('/home/loadGamesByGroupAndCountry')}}?sport={{$sportName}}&country={{$countryName}}&group={{$leagueInformation['leagueName']}}">
                                                        {{$leagueInformation['leagueName']}}
                                                        <span class="badge badge-primary"> {{$leagueInformation['boCount']}}</span>
                                                    </a>
                                                @endforeach
                                                <b class="arrow"></b>
                                            </li>
                                        </ul>
                                @endforeach

                                <!--End liga block-->
                                </li>
                            </ul>
                            <!--End country block-->

                            <div style="display: none; height: 199px; top: 40px; left: 212px;"
                                 class="scroll-track scroll-detached no-track scroll-thin scroll-margin scroll-visible">
                                <div style="height: 121px; top: 0px;" class="scroll-bar"></div>
                            </div>
                        </li>

                        <!--End foreach here-->

                    </ul>

                </div>
            </div>
            <div class="ace-scroll nav-scroll scroll-disabled">
                <div style="display: none;" class="scroll-track">
                    <div style="top: 0px; transition-property: top; transition-duration: 0.1s;"
                         class="scroll-bar"></div>
                </div>
                <div style="" class="scroll-content">
                    <div></div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            try {
                ace.settings.check('sidebar', 'collapsed')
            } catch (e) {
            }
        </script>
    </div>


@endforeach
