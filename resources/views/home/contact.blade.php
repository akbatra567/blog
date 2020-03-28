@extends('layouts.main')
@section('title', '| Contact')
@section('content')
    <h2> Contact Form </h2>
    <form action=" {{ url('contact') }} " method="POST">
        @csrf
        <div class="form-group">
            <label name="email">Email:</label>
            <input type="email" id="email" name="email" class="form-control"/>
        </div>

        <div class="form-group">
            <label name="subject">Subject:</label>
            <input id="subject" name="subject" class="form-control"/>
        </div>
        <div class="form-group">
            <label name="message">Message:</label>
            <textarea id="message" name="message" class="form-control"></textarea>
        </div>
        <input type="submit" value="Send Message" class="btn btn-success"/>
    </form>
@endsection
