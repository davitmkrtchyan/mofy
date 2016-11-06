@extends('layouts.app')

@section('content')
    <div class="page-content" id="bookmakers-wrapper">
        <h2 class="bookmakers-wrapper-title">Our Bookmakers</h2>
        <button class="blue-butt bookmaker-sort">Sort by Name</button>
        <button class="blue-butt bookmaker-sort">Sort by Rank</button>
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
                            <a href="/bookmakers/{{$bookmaker->id}}">
                                <img src="{{ URL::asset('assets/images/bm/admin-bookmakers/'.$bookmaker->logo) }}" alt="{{$bookmaker->logo}}"
                                style="width: 100%;; height: auto;">
                            </a>
                            <p><br>{{ $bookmaker->bookmaker }}</p>
                        </div>
                        <div class="col-xs-2 col-md-2 bookmakerRating">
                            <p class="bookmakerRatingText">{{$bookmaker->rating}}</p>
                            <div id="rateYo" class="rateYo{{ $count }}" data-rate="{{$bookmaker->rating}}"></div>
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