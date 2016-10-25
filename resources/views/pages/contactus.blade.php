@extends('layouts.app')

@section('content')
    <div class="page-content" id="accordion-wrapper">
        <div class="row">
            <div class="col-xs-12 col-md-9">

                <div id="contactus">
                    <h2>Contact Us</h2>
                    <form action="#" method="post">
                        <div class="form-group">
                            <label for="name">Your name:</label>
                            <input type="text" class="form-control contact-fields" id="name">
                            <i class="fa fa-user contact-form-icon" aria-hidden="true"></i>
                        </div>
                        <div class="form-group">
                            <label for="email">Your email:</label>
                            <input type="email" class="form-control contact-fields" id="email">
                            <i class="fa fa-envelope contact-form-icon" aria-hidden="true"></i>
                        </div>
                        <div class="form-group">
                            <label for="message">Your message:</label>
                            <textarea class="form-control" id="message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-default">Send</button>
                    </form>
                </div>
            </div>

@endsection