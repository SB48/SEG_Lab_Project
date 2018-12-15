@extends('layouts.app')

@section('content')
    <h1>Create a rental for {{$data['member']['name']}}</h1>

    {!! Form::open(['action' => 'RentalsController@store', 'method' => 'POST']) !!}
        
        <div class="form-group">
            {{Form::label('game', 'Game')}}
            <select name="game" class="form-control">
            
                @foreach($data['games'] as $game)
                {{$tempGame = $game['name']}}    
                <option value= "{{$tempGame}}">{{$tempGame}}</option>
                @endforeach
                
            </select>            
        </div>

        <div class="form-group">
                {{Form::label('platform', 'Platform')}}
                <select name="platform" class="form-control">
                
                    @foreach($data['platforms'] as $platform)
                    {{$tempPlatform = $platform['platform']}} 
                    <option value="{{$tempPlatform}}">{{$tempPlatform}}</option>
                    @endforeach
    
                </select>            
            </div>
        {{Form::hidden('memberID', $data['member']['id'])}}
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
@endsection