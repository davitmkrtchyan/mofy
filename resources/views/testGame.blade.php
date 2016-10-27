@extends('layouts.app')

@section('content')
    <div class="page-content" id="accordion-wrapper">
        <div class="row">
            <div class="col-xs-12 col-md-9">

                <div class="container">
                    @foreach($games as $game)
                        Name: {{$game->name}}<br>
                        Home:{{$game->homeName}}<br>
                        Away:{{$game->awayName}}<br>
                        Group:{{$game->group}}<br>
                        Country:{{$game->countryName}}<br>
                        oddsFirst:{{$game->oddsFirst}}<br>
                        oddsCross:{{$game->oddsCross}}<br>
                        oddsSecond:{{$game->oddsSecond}}<br>

                        Date: {{date("M j",strtotime($game->start))}}<br>
                        Time: {{date("H:i",strtotime($game->start))}}<br>
                    @endforeach

                </div>

    </div>
@endsection
