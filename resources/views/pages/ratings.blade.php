@extends('layouts.app')

@section('content')
    <div class="page-content" id="bookmakers-wrapper">
        <h2 class="bookmakers-wrapper-title">Our Bookmakers</h2>
        <form action="/bookmakers/sortby" name="name" type="POST" class="sortByForm">
            <input type="hidden" name="name" value="true">
            <input type="submit" class="blue-butt bookmaker-sort" value="Sort by Name">
        </form>
        <form action="/bookmakers/sortby" name="rank" type="POST" class="sortByForm">
            <input type="hidden" name="rank" value="true">
            <input type="submit" class="blue-butt bookmaker-sort" value="Sort by Rank">
        </form>
        <br>
        <hr>
        <br>
        <div class="row">
            <div class="col-xs-12 col-md-9">

                <div id="bookmakers">



                    @foreach($bookmakers as $bookmaker)
                        <div class="col-xs-12 col-md-12 bookmakersBlock">
                            <div class="col-xs-1 col-md-1 bookmakerNumber">{{ ++$count }}</div>
                            <div class="col-xs-3 col-md-3 bookmakerName">
                                <a href="/bookmakers/{{$bookmaker->id}}" data-id="{{$bookmaker->bookmaker_id}}" class="bookmakerLink">
                                    <img src="{{ URL::asset('assets/images/bm/admin-bookmakers/'.$bookmaker->logo) }}" alt="{{$bookmaker->logo}}"
                                         style="width: 100%;; height: auto;">
                                </a>
                                <p><br>{{ $bookmaker->bookmaker }}</p>
                            </div>
                            <div class="col-xs-2 col-md-2 bookmakerRating">
                                <p class="bookmakerRatingText">{{round($bookmaker->total_sum, 1)}}</p>
                                <div id="rateYo" class="rateYo{{ $count }}" data-rate="{{round($bookmaker->total_sum, 1)}}" data-id="{{$bookmaker->bookmaker_id}}"></div>
                                @if(Auth::guest())
                                <script type="text/javascript">
                                    var cnt = 0;
                                    var rateyo;
                                    var rate;
                                    $(document).ready(function () {
                                        rateyo = $(".rateYo"+(++cnt));
                                        rate = rateyo.data('rate');
                                        rateyo.rateYo({rating: rate, readOnly: true, ratedFill: "#E74C3C", starWidth: "15px" });
                                    });
                                </script>
                                    @else
                                    <script type="text/javascript">
                                        var cnt = 0;
                                        var rateyo;
                                        var rate;
                                        $(document).ready(function () {
                                            rateyo = $(".rateYo"+(++cnt));
                                            rate = rateyo.data('rate');
                                            rateyo.rateYo({rating: rate, readOnly: false, ratedFill: "#E74C3C", starWidth: "15px" }).on('rateyo.set',
                                                    function(e, data){
                                                        var target = $(e.target), article;
                                                        $.ajax({
                                                            type : "post",
                                                            url : "/bookmakers/vote",
                                                            data : {
                                                                "value" : data.rating,
                                                                "bookmaker_id" : target.data('id')
                                                            },
                                                            dataType : "json",
                                                            success : function(response){
                                                            }
                                                        });
                                                    });

                                        });
                                    </script>
                                    @endif
                            </div>
                            <div class="col-xs-3 col-md-3 bookmakerProperties">
                                <table class="bookmakerPropertiesList">
                                    <tr>
                                        <td>*Support </td>
                                        <td>
                                        <span class="bookmakerPropertiesVotes">
                                            0 votes
                                        </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>*Support</td>
                                        <td>
                                        <span class="bookmakerPropertiesVotes">
                                            0 votes
                                        </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>*Support</td>
                                        <td>
                                        <span class="bookmakerPropertiesVotes">
                                            0 votes
                                        </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>*Support</td>
                                        <td>
                                        <span class="bookmakerPropertiesVotes">
                                            0 votes
                                        </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>*Support</td>
                                        <td>
                                        <span class="bookmakerPropertiesVotes">
                                            0 votes
                                        </span>
                                        </td>
                                    </tr>


                                </table>
                            </div>
                            <div class="col-xs-3 col-md-3 bookmakerComments">
                                <button class="blue-butt">Rate/Comment</button>
                                <button class="blue-butt">View Comment(s)</button>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-md-12 align-center">
                        {!! $bookmakers->links() !!}
                    </div>

                </div>
            </div>

    {{--<script type="text/javascript">--}}
    {{--$(document).ready(function () {--}}

    {{--$(".rateYo2").rateYo({--}}
    {{--rating: 3.2,--}}
    {{--readOnly: true,--}}
    {{--ratedFill: "#E74C3C",--}}
    {{--starWidth: "24px"--}}
    {{--});--}}
    {{--$(".rateYo3").rateYo({--}}
    {{--rating: 3.2,--}}
    {{--readOnly: true,--}}
    {{--ratedFill: "#E74C3C",--}}
    {{--starWidth: "24px"--}}
    {{--});--}}
    {{--});--}}
    {{--</script>--}}
@endsection