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
    @include('components._left_sidebar_row')

    <div class="main-content">
        <div class="main-content-inner">
            @include('components._content_header')

            @yield('content')

            @include('components._advertisment_sidebar')
        </div>
    </div>



</div>
@include('components._footer')

@include("components._footer_scripts")
</body>
</html>
