@extends('layouts.app')

@section('content')

    <div class="tab-content">
    <table class="table">
        <tbody class="main-table">
        @include('home._groupEvents')
        </tbody>
    </table>
    </div>

@endsection
