@extends('layouts.app')

@section('content')
    <div class="page-content" id="accordion-wrapper">
        <div class="row">
            <div class="col-xs-12 col-md-9">

                <div id="bookmakers">
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">


                    <div class="col-xs-12 col-md-12 bookmakersBlock">
                        <div class="col-xs-1 col-md-1 bookmakerNumber">1</div>
                        <div class="col-xs-3 col-md-3 bookmakerName">
                            <img src="{{ URL::asset('assets/images/bm/48x24/43.png') }}" alt="">

                            <p><br><br>More odds for You <br> rating</p>
                        </div>
                        <div class="col-xs-3 col-md-3 bookmakerRating">
                            <p class="bookmakerRatingText">0.00</p>
                            <div id="rateYo"></div>
                        </div>
                        <div class="col-xs-2 col-md-2 bookmakerProperties"></div>
                        <div class="col-xs-3 col-md-3 bookmakerComments"></div>
                    </div>

                </div>
            </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#rateYo").rateYo({
                ratedFill: "#E74C3C",
                starWidth: "24px",
                onSet: function (rating, rateYoInstance) {

                    $.ajax({
                        type: 'POST',
                        url: '/admin/stars/save',
                        data: {
                            "_token": $('#token').val(),
                            "bookmaker": "1xbet",
                            "rating": rating
                        },
                        dataType: 'json',
                        success: function (data) {
                            $(".bookmakerRatingText").text(rating);
                        }
                    });

                }

            });
        })
    </script>

@endsection