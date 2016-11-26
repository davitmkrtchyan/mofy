@foreach($eventsGroups as $sportName=>$gameList)
    @if($gameList->count())
        <h5 class="header smaller lighter green">
            <i class="sp {{\App\Utils\UnibetUtils::resolveSportLog($sportName)}}"></i>{{$sportName}}
        </h5>
        <table>
            @foreach($gameList as $game)
                <tr>
                    <td class="date-col">
                        <div>{{date("M j",strtotime($game->start))}}</div>
                        <div>{{date("H:i",strtotime($game->start))}}</div>
                    </td>
                    <td>
                        <div><i class='flag flag-wld menu-icon fa'></i>{{$game->group}}</div>
                        <a href="{{url('/home/loadByEventID',['id'=>$game->id])}}">
                            {!! \App\Utils\Utils::highlight($game->name,$_REQUEST['gameName']) !!}
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    @endif
@endforeach