@extends('layouts.app')

@section('content')
    <a href ="/games" class = "btn btn-default"> Back to Collection </a>
    <img class="card-img-top" style="width:100%; max-width:300px; display:lock;" src="/storage/thumbnails/{{$game->thumbnail}}" alt="Could not display image">
  <table class ="table table-striped">
    <tr><th>Genre: {{$game->genre}}</th>
    <th>Platform: {{$game->platform}}</th>
    <th>Pegi rating: {{$game->ageRating}}+</th></tr>
    </table> 
    <p>{!!$game->description!!}</p> 
   

    <br><br>
    @if(!Auth::guest() && Auth::user()->privilegeLevel == 'Secretary')
        <a href="/games/{{$game->gameID}}/edit" class="btn btn-default"> Edit this game</a>
        {!!Form::open(['action' => ['GamesController@destroy', $game->gameID], 'method' => 'POST', 'class' => 'float-right'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick'=>"return confirm('Are you sure?')"])}}
        {!!Form::close()!!}
    @endif
@endsection

