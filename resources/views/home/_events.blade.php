@foreach($liveEvents as $liveEvent)
    <tr class="match-info">
        <td colspan="2">
            <div class="text-ellipsis">
                <a href="football/brazil/index.html">
                    <i class="flag flag-br menu-icon fa"></i>Brazil
                </a>
                <i class="fa fa-angle-double-right"></i>
                <a href="football/brazil/serie-b/index.html">{{$liveEvent->event->group}}</a>
            </div>

        </td>
        <td class="odds-name hidden-xs">1 </td>
        <td class="odds-name hidden-xs">X </td>
        <td class="odds-name hidden-xs">2 </td>
    </tr>
    <tr class="main-table-row">
        <td class="date-col">
            <div class="day">{{date("M j",strtotime($liveEvent->event->start))}}</div>
            <div class="hour">{{date("H:i",strtotime($liveEvent->event->start))}}</div>
        </td>
        <td class="players-name-col">
            <div class="player-1 text-scroll">
                <div class="img" style="background-image: url('http://res.bmbets.com/images/teams/50/18x18/65940.png');"></div>

                <a title="Go to Joinville - Bahia odds comparisons" href="football/brazil/serie-b/joinville-v-bahia-1616530/index.html">{{$liveEvent->event->homeName}}</a>
            </div>
            <div class="player-2 text-scroll">
                <div class="img" style="background-image: url('http://res.bmbets.com/images/teams/50/18x18/56143.png');"></div>

                <a title="Go to Joinville - Bahia odds comparisons" href="football/brazil/serie-b/joinville-v-bahia-1616530/index.html">{{$liveEvent->event->awayName}}</a>
            </div>
        </td>

        <td class='odds-col3'><span class="mobile-bet-type">1</span>3.25</td>
        <td class='odds-col3'><span class="mobile-bet-type">X</span>3.20</td>
        <td class='odds-col3'><span class="mobile-bet-type">2</span>2.65</td>

    </tr>

@endforeach
