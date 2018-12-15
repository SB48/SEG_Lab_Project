@extends('layouts.app')

@section('content')
    <h1>Active Rentals for {{$data['memberName']}}</h1>
    @if($currentlyRenting = \App\Http\Controllers\RentalsController::numOfActiveRentals($data['memberID']))
        <table class ="table table-striped">
            <tr>
                <th>Game Name</th>
                <th>Game Platform
                <th>Return Date</th>
                <th>extensions</th>
            </tr>
        
        @foreach($data['rentals'] as $rental)
            @php 
            $gameName = \App\Http\Controllers\GamesController::getGameName($rental['gameID']);
            $gamePlatform = \App\Http\Controllers\GamesController::getGamePlatform($rental['gameID']);
            @endphp
            <tr>
                <th>{{$gameName}}</th>
                <th>{{$gamePlatform}}</th>
                <th>{{$rental['returnDate']}}</th>
                <th>{{$rental['extensions']}}</th>
                @if($rental['extensions'] < $data['numExtensions'])
                <th>
                    {!! Form::open(['action' => ['RentalsController@extend', $rental['id']], 'method' => 'POST']) !!}
                    {{Form::hidden('_method', 'PUT')}}
                    {{Form::submit('Extend Deadline', ['class' => 'btn btn-success'])}}
                    {!! Form::close() !!}
                </th>
                @else <th><a class="btn btn-secondary" disabled>Can't Extend Further</a></th>
                @endif

                <th>
                    {!! Form::open(['action' => ['RentalsController@returnGame', $rental['id']], 'method' => 'POST']) !!}
                    {{Form::hidden('_method', 'PUT')}}
                    {{Form::submit('Return', ['class' => 'btn btn-success'])}}
                    {!! Form::close() !!}
                </th>

                <th>
                    {!!Form::open(['action' => ['RentalsController@destroy', $rental['id']], 'method' => 'POST'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Damaged Game', ['class' => 'btn btn-danger', 'onclick'=>"return confirm('This will ban the Member, and charge them. It will also remove this rental. Are you sure?')"])}}
                    {!!Form::close()!!}
                </th>
        
            </tr>
        @endforeach
    </table> 
    @else
        <p>No Rentals Found </p>
    @endif
@endsection

