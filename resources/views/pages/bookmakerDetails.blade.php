@extends('layouts.app')

@section('content')
    <div class="page-content" id="bookmakers-wrapper">
        <div class="row">
            <div class="col-xs-12 col-md-9">

                <div id="bookmakers">
                    <div class="col-xs-12 col-md-12 align-center bookmakerLogo">
                        <img src="{{ URL::asset('assets/images/bm/admin-bookmakers/'.$bookmaker->logo) }}" alt="{{$bookmaker->logo}}"
                             style="width: 200px;; height: auto;">
                        <br><br>
                        <h3>
                            <b>
                                {{$bookmaker->bookmaker}}
                            </b>
                        </h3>
                    </div>
                    <!--Details block-->
                    <div class="col-md-12">
                        <div class="col-md-12 bookmakerDetailsTitle align-center">
                            <p>
                                <b>Review</b>
                            </p>
                        </div>
                        <div class="col-md-12">
                            <p class="bookmakerDetailsContent">{{ $bookmaker->review }}</p>
                        </div>
                    </div>
                    <!--End details block-->
                    <div class="col-md-12">
                        <div class="col-md-12 bookmakerDetailsTitle align-center">
                            <p>
                                <b>Bonuses</b>
                            </p>
                        </div>
                        <div class="col-md-12">
                            <p class="bookmakerDetailsContent">{{ $bookmaker->bonuses }}</p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-12 bookmakerDetailsTitle align-center">
                            <p>
                                <b>Advantages</b>
                            </p>
                        </div>
                        <div class="col-md-12">
                            <p class="bookmakerDetailsContent">{{ $bookmaker->advantages }}</p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-12 bookmakerDetailsTitle align-center">
                            <p>
                                <b>Languages</b>
                            </p>
                        </div>
                        <div class="col-md-12">
                            <p class="bookmakerDetailsContent">{{ $bookmaker->languages }}</p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-12 bookmakerDetailsTitle align-center">
                            <p>
                                <b>Deposit methods</b>
                            </p>
                        </div>
                        <div class="col-md-12">
                            <p class="bookmakerDetailsContent">{{ $bookmaker->depositmethods }}</p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-12 bookmakerDetailsTitle align-center">
                            <p>
                                <b>Withdrawal methods</b>
                            </p>
                        </div>
                        <div class="col-md-12">
                            <p class="bookmakerDetailsContent">{{ $bookmaker->withdrawalmethods }}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="col-md-12 bookmakerDetailsTitle align-center">
                            <p>
                                <b>Live betting</b>
                            </p>
                        </div>
                        <div class="col-md-12 align-center">
                            <p class="bookmakerDetailsContent">
                                @if($bookmaker->livebetting == "on")
                                    <i class="fa fa-check bookmakerDetailsIconChecked" aria-hidden="true"></i>
                                    @else
                                    <i class="fa fa-times bookmakerDetailsIconNotchecked" aria-hidden="true"></i>
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="col-md-12 bookmakerDetailsTitle align-center">
                            <p>
                                <b>Live streaming</b>
                            </p>
                        </div>
                        <div class="col-md-12 align-center">
                            <p class="bookmakerDetailsContent">
                                @if($bookmaker->livestreaming == "on")
                                <i class="fa fa-check bookmakerDetailsIconChecked" aria-hidden="true"></i>
                                @else
                                    <i class="fa fa-times bookmakerDetailsIconNotchecked" aria-hidden="true"></i>
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="col-md-12 bookmakerDetailsTitle align-center">
                            <p>
                                <b>Casino</b>
                            </p>
                        </div>
                        <div class="col-md-12 align-center">
                            <p class="bookmakerDetailsContent">
                                @if($bookmaker->casino == "on")
                                    <i class="fa fa-check bookmakerDetailsIconChecked" aria-hidden="true"></i>
                                @else
                                    <i class="fa fa-times bookmakerDetailsIconNotchecked" aria-hidden="true"></i>
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="col-md-12 bookmakerDetailsTitle align-center">
                            <p>
                                <b>Poker</b>
                            </p>
                        </div>
                        <div class="col-md-12 align-center">
                            <p class="bookmakerDetailsContent">
                                @if($bookmaker->poker == "on")
                                    <i class="fa fa-check bookmakerDetailsIconChecked" aria-hidden="true"></i>
                                @else
                                    <i class="fa fa-times bookmakerDetailsIconNotchecked" aria-hidden="true"></i>
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-12 bookmakerDetailsTitle align-center">
                            <p>
                                <b>Support</b>
                            </p>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-4 align-center">
                                <p>Live chat</p>
                                <p class="bookmakerDetailsContent">
                                    @if($bookmaker->livechat == "on")
                                        <i class="fa fa-check bookmakerDetailsIconChecked" aria-hidden="true"></i>
                                    @else
                                        <i class="fa fa-times bookmakerDetailsIconNotchecked" aria-hidden="true"></i>
                                    @endif
                                </p>
                            </div>
                            <div class="col-md-4 align-center">
                                <p>Email</p>
                                <p class="bookmakerDetailsContent">
                                    @if($bookmaker->liveemail == "on")
                                        <i class="fa fa-check bookmakerDetailsIconChecked" aria-hidden="true"></i>
                                    @else
                                        <i class="fa fa-times bookmakerDetailsIconNotchecked" aria-hidden="true"></i>
                                    @endif
                                </p>
                            </div>
                            <div class="col-md-4 align-center">
                                <p>Telephone</p>
                                <p class="bookmakerDetailsContent">
                                    @if($bookmaker->telephone == "on")
                                        <i class="fa fa-check bookmakerDetailsIconChecked" aria-hidden="true"></i>
                                    @else
                                        <i class="fa fa-times bookmakerDetailsIconNotchecked" aria-hidden="true"></i>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-12 bookmakerDetailsTitle align-center">
                            <p>
                                <b>Currencies / Limits</b>
                            </p>
                        </div>
                        <div class="col-md-12">
                            <p class="bookmakerDetailsContent">{{ $bookmaker->currencieslimits }}</p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-12 bookmakerDetailsTitle align-center">
                            <a href="{{ $bookmaker->affiliatelink }}">Go to website</a>
                        </div>
                    </div>
                </div>
            </div>


@endsection