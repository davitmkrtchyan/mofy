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
                    @foreach($groups as $sportName=>$sportInformation)
                        {{--@foreach($sportInformation['countryList'] as $countryName=>$leagues)--}}
                            {{--@foreach($leagues as $league)--}}
                            {{--@endforeach--}}
                        {{--@endforeach--}}
                        <?php $isCountriesExists=$sportInformation['countryList']->count()>0?>
                        <li class="">
                            <a href="/" class="{{$sportInformation['logo']}} dropdown-toggle">
                                <i class="menu-icon fa"></i>
                                <span class="menu-text" data-original-title="1130">{{$sportName}}</span>
                                @if($isCountriesExists)
                                <b class="arrow fa fa-angle-down"></b>
                                @endif
                            </a>

                            @if($isCountriesExists)
                            <ul style="" class="submenu nav-hide">
                                @foreach($sportInformation['countryList'] as $countryName=>$leagues)
                                    <?php $isLeaguesExists=$leagues->count()>0?>
                                <li class="">
                                    <a href="/" class="dropdown-toggle">
                                        <b></b>
                                        <i class="menu-icon fa">
                                            @if (file_exists(public_path('assets/images/Country/16/'.$countryName.'.png')))
                                                <img src="{{URL::asset('assets/images/Country/16/'.$countryName.'.png')}}" onError="this.onerror = '';this.style.display='none';" alt="{{$countryName}}">
                                            @else
                                                
                                            @endif
                                        </i>
                                        {{$countryName}}
                                        @if($isLeaguesExists)
                                        <b class="arrow fa fa-angle-down"></b>
                                        @endif
                                    </a>

                                    @if($isLeaguesExists)
                                    <ul style="display: none;" class="submenu nav-hide">
                                        @foreach($leagues as $league)
                                        <li class="">
                                            <a title="{{$league['leagueName']}}" class="l-item"
                                               href="{{ url('/home/loadGroupEvents', ['id'=>$league['id']])}}">
                                                {{$league['leagueName']}}
                                                <span class="badge badge-primary">1</span>
                                            </a>

                                        </li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                    @endforeach
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


