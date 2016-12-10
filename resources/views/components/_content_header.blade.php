<!-- #section:basics/sidebar.horizontal -->
<div id="sidebarTop" class="sidebar h-sidebar navbar-collapse collapse">
    <script type="text/javascript">
        try { ace.settings.check('sidebarTop', 'fixed') } catch (e) { }
    </script>

    <ul class="nav nav-list">
        <li class="hover">
            <a href="{{action('HomeController@matches')}}">
                <i class="menu-icon fa fa-futbol-o"></i>
                <span class="menu-text">
                    
                        Matches
                    
                                </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
        </li>

        <li class="hover">
            <a href="{{action('HomeController@surebets')}}">
                <i class="menu-icon fa fa-calculator"></i>
                <span class="menu-text">
                 
                        Surebets
                    
                 </span>
            </a>
        </li>

        <li class="hover">
            <a href="/bookmakers">
                <i class="menu-icon fa fa-list"></i>
                <span class="menu-text">
                        Bookmakers
                </span>
            </a>
        </li>

        <li class="hover">
            <a href="http://moreoddsforyou.com/blog">
                <i class="menu-icon fa fa-pencil-square-o"></i>
                <span class="menu-text">
                Blog
                </span>
            </a>
            
        </li>

    </ul>
    <!-- /.nav-list -->
    <script type="text/javascript">
        try { ace.settings.check('sidebarTop', 'collapsed') } catch (e) { }
    </script>
</div>
<!-- /section:basics/sidebar.horizontal -->