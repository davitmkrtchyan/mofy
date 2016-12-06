<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content='sure bets, odds comparison, betting odds, odds checker, odds,surebets, oddschecker, value bets, valuebets, arbitrage bets, bets, compare odds, UK odds' />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <title>More Odds For You || Odds Comparison Best Service  </title>

    @include('components._header_links')

</head>
<body class="no-skin">

@include("components._header")
<input id="loadCountForGroupsURL" type="hidden" disabled="disabled" value="{{action('HomeController@loadCountForGroups')}}"/>


<!-- /section:basics/navbar.layout -->
<div class="main-container container" id="main-container">
    {{--@include('components._left_sidebar')--}}
    @include('_menu')

    <div class="main-content">
        <div class="main-content-inner">
            @include('components._content_header')

            @yield('content')

            @include('components._advertismentMain_sidebar')
        </div>
    </div>



</div>
@include('components._footer')

@include("components._footer_scripts")
<!-- Start of LiveChat (www.livechatinc.com) code -->
<script type="text/javascript">
    window.__lc = window.__lc || {};
    window.__lc.license = 8461427;
    (function() {
        var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;
        lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
    })();
</script>
<!-- End of LiveChat code -->
</body>
</html>
