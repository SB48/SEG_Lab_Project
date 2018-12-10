@extends('layouts.app')

@section('content')
    <a href ="/games" class = "btn btn-default"> Back to Collection </a>
    <h1> {!!$game->description!!}</h1>
    <img class="card-img-top" src="/storage/thumbnails/{{$game->thumbnail}}" alt="Could not display image">
    <br><br>
    @if(!Auth::guest() && Auth::user()->privilegeLevel == 'Secretary')
        <a href="/games/{{$game->gameID}}/edit" class="btn btn-default"> Edit this game</a>
        {!!Form::open(['action' => ['GamesController@destroy', $game->gameID], 'method' => 'POST', 'class' => 'float-right'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
        {!!Form::close()!!}
    @endif
@endsection

