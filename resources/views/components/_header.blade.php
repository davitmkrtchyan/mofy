<!-- #section:basics/navbar.layout -->
<div id="navbar" class="navbar navbar-default navbar-fixed-top  navbar-collapse  h-navbar">
    <script type="text/javascript">
        try { ace.settings.check('navbar', 'fixed') } catch (e) { }
    </script>

    <div class="navbar-container container" id="navbar-container">
        <div class="navbar-header pull-left">
            <button type="button" class="navbar-toggle menu-toggler pull-left fixed" id="menu-toggler" data-target="#sidebar">
                <span class="sr-only">Toggle sidebar</span>
                <i class="ace-icon fa fa-book white bigger-125"></i>
            </button>
            <!-- #section:basics/navbar.layout.brand -->
            <a href="/" class="navbar-brand">
                <small>
                    <img src="{{ URL::asset('assets/images/logo.png') }}" alt="MoreOddsForYou">
                </small>
            </a>
            <!-- /section:basics/navbar.layout.brand -->
            <!-- #section:basics/navbar.toggle -->
            <button class="pull-right navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".navbar-buttons,.navbar-menu">
                <span class="sr-only">Toggle user menu</span>
                <i class="ace-icon fa  fa-gear white bigger-125"></i>
            </button>

            <button class="pull-right navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#sidebarTop" aria-expanded="false">
                <span class="sr-only">Toggle sidebar</span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>
            </button>

            <!-- /section:basics/navbar.toggle -->
        </div>



        <!-- #section:basics/navbar.dropdown -->
        <div class="navbar-buttons navbar-header pull-right  collapse navbar-collapse" role="navigation">
            <ul class="nav ace-nav">


                <li class="transparent">
                    <a href="index.html#" class="dropdown-toggle" data-toggle="dropdown">
                        EU Odds
                        &nbsp;
                        <i class="ace-icon fa fa-angle-down bigger-110"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-light-blue dropdown-caret">
                        <li>
                            <a href="index.html#" data-call="oddsFormat" data-num="0">
                                EU Odds (2.5)
                            </a>
                        </li>
                        <li>
                            <a href="index.html#" data-call="oddsFormat" data-num="1">
                                UK Odds (3/2)
                            </a>
                        </li>
                        <li>
                            <a href="index.html#" data-call="oddsFormat" data-num="2">
                                US Odds (+150)
                            </a>
                        </li>
                    </ul>
                </li>
                <!--
                                                        <li class="transparent">
                                        <a href="index.html#" class="dropdown-toggle" data-toggle="dropdown">
                                            <i class="flag flag-gb menu-icon fa"></i>
                                            &nbsp;
                                            <i class="ace-icon fa fa-angle-down bigger-110"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-light-blue dropdown-caret">
                                            <li>
                                                <a title="english" href="http://www.bmbets.com/">
                                                    <i class="flag flag-gb menu-icon fa"></i>English
                                                </a>
                                            </li>
                                            <li>
                                                <a title="русский" href="http://www.bmbets.ru/">
                                                    <i class="flag flag-ru menu-icon fa"></i>Русский
                                                </a>
                                            </li>
                                        </ul>
                                    </li> -->

                <li class="transparent" id="timezone">
                    <a href="index.html#" class="dropdown-toggle" data-toggle="dropdown">
                        GMT+00:00
                        &nbsp;
                        <i class="ace-icon fa fa-angle-down bigger-110"></i>
                    </a>
                    <ul class="dropdown-navbar timezone dropdown-menu dropdown-menu-right navbar-pink  dropdown-caret ">
                        <li class="dropdown-header">
                            <i class="ace-icon fa  fa-clock-o bigger-110 blue"></i>Time zone
                            <div class="dropdown-toolbar"><button id="btnGMT" class="btn btn-minier btn-success">Set GMT</button></div>
                        </li>
                        <li class="dropdown-content1 scroll-disabled">
                            <div style="padding: 5px;">
                                <div class="clearfix">
                                    <div id="slider-text" class="center"></div>
                                </div>
                                <div id="slider-gmt" class="ui-slider-green ui-slider-small"></div>
                                <ul id="slider-desc"></ul>
                            </div>
                        </li>
                        <li class="dropdown-footer">
                            <!--button  class="btn btn-info btn-sm" type="button">
                            Apply
                            <i class="ace-icon fa fa-floppy-o bigger-120 blue"></i>
                        </button-->
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

        <!-- /section:basics/navbar.dropdown -->
        <nav role="navigation" class="navbar-menu pull-right collapse navbar-collapse">
            <!-- #section:basics/navbar.form -->
            <div id="nav-search" class="nav-search">
                <form class="form-search" action="#">
                        <span class="input-icon">
                            <input type="search" class="nav-search-input" id="search" name="query" autocomplete="off" placeholder="Search ..." />
                            <i class="ace-icon fa fa-search nav-search-icon"></i>
                        </span>
                </form>
            </div>
            <!-- /section:basics/navbar.form -->
        </nav>
    </div><!-- /.navbar-container -->
</div>