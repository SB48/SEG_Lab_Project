@extends('layouts.app')

@section('content')
    <p>Active Rentals</p>
    @if(count($data) > 0)
        @php 
            $numExtensions = \App\SocietyRule::where('society_rule','numExtensions')->first()->ruleVal;
        @endphp
        <table class ="table table-striped">
            <tr>
                <th>Rental ID</th>
                <th>Member</th>
                <th>Game</th>
                <th>Platform</th>
                <th>Return Date</th>
                <th>Extensions</th>
            </tr>
        
        @foreach($data as $rental)
            <tr>
                <th>{{$rental['id']}}</th>
                <th>{{$rental['memberName']}}</th>
                <th>{{$rental['gameName']}}</th>
                <th>{{$rental['platform']}}</th>
                <th>{{$rental['returnDate']}}</th>
                <th>{{$rental['extensions']}}</th>
                @if($rental['extensions'] < $numExtensions)
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
        {{$data->links()}}
    @else
        <p>No Rentals found </p>
    @endif
@endsection