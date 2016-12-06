<div class="col-xs-12 col-md-3 widget-container-col ui-sortable">
    <div class="username-block">
        @if (Auth::guest())

            @include('components._login_form')

        @else
            <p>Hello, {{ Auth::user()->name }} </p>
            <br>
            <a href="{{ url('/logout') }}">
                <i class="fa fa-btn fa-sign-out"></i>Logout
            </a>
            <br>
            <br>
            <br>
            <a href="{{ url('/password/update') }}"><i class="fa fa-btn fa-unlock-alt"></i> Change password</a>
        @endif
    </div>

    <div id="adv-content-right" class="white">
        {{--Lorem Ipsum is simply dummy text of the printing and typesetting industry.--}}
    </div>



    <a class="twitter-timeline" href="https://twitter.com/MoreOddsForYou">Tweets by MoreOddsForYou</a>
    <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>


    <h3 class="header smaller lighter white">
        <i class="ace-icon fa fa-bell white"></i>
        Advertisement
    </h3>
    <div id="adv-content-right">
        <ul class="thumbs">
            @foreach ($advertisement as $adv)
                <li>
                    <div class="center">
                        <a target="_blank" href="{{ $adv->affLink }}">
                            <img border="0" title="betting foot" class="advertisement-image" alt="betting foot" src="{{ URL::asset('/assets/images/bm/admin-advertisement/'.$adv->imageName) }}">
                        </a>
                    </div>
                </li>
            @endforeach
            <li>
                <div class="center">
                    <a target="_blank" href="http://imstore.bet365affiliates.com/Tracker.aspx?AffiliateId=35066&amp;AffiliateCode=365_056634&amp;CID=197&amp;DID=156&amp;TID=1&amp;PID=149&amp;LNG=1"><img border="0" src="http://imstore.bet365affiliates.com/?AffiliateCode=365_056634&amp;CID=197&amp;DID=156&amp;TID=1&amp;PID=149&amp;LNG=1"></a>
                </div>
            </li>
        </ul>

    </div>




</div>
</div>
</div>
</div>