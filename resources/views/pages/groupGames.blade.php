@extends('layouts.app')

@section('content')

    <div class="tab-content col-xs-12 col-md-9">
    <table class="table">
        <tbody class="main-table">
        @include('home._groupEvents')
        </tbody>
    </table>
    </div>

@endsection
