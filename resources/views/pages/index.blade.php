@extends('layouts.app')

@section('content')
        <div class="jumbotron text-center">
            <h1>{{$title}}</h1>
            <p>Browse our collection and view all the games available to rent!</p>
            <p><a class="btn btn-primary btn-lg" href='/games' role="button"> Take a look</a> 
        </div>
        @endsection
