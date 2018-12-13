@extends('layouts.app')

@section('content')
    <p>Active Rentals</p>
    @if(count($rentals) > 1)
        <table class ="table table-striped">
            <tr>
                <th>Rental ID</th>
                <th>Member</th>
                <th>Game</th>
                <th>Platform</th>
                <th>Return Date</th>
                <th>Extensions</th>
            </tr>
        
        @foreach($rentals as $rental)
            @if(!$rental->returned)
            <tr>
                <th>{{$member->id}}</th>
                <th>{{$member->name}}</th>
                <th>{{$member->dob}}</th>
                <th>@if($member->normalBan)
                    Yes
                    @else No
                    @endif
                </th>
                <th>@if($member->damageBan)
                    Yes <a class="btn btn-success">Pay Back</a>
                    @else No
                    @endif
                </th>
                <th>{{$member->banBeginDate}}</th>
                <th>{{$member->amountDue}}</th>
                @if(!$member->normalBan)
                <th>
                    {!! Form::open(['action' => ['MembersController@ban', $member->id], 'method' => 'POST']) !!}
                    {{Form::hidden('_method', 'PUT')}}
                    {{Form::submit('Ban Member', ['class' => 'btn btn-danger'])}}
                    {!! Form::close() !!}
                </th>
                @else 
                <th>
                    {!! Form::open(['action' => ['MembersController@unban', $member->id], 'method' => 'POST']) !!}
                    {{Form::hidden('_method', 'PUT')}}
                    {{Form::submit('Unban Member', ['class' => 'btn btn-success'])}}
                    {!! Form::close() !!}
                </th>
                @endif

                @if(Auth::user()->privilegeLevel == 'Secretary')
                    <th><a href="/members/{{$member->id}}/edit" class="btn btn-default">Edit</a></th>
                    <th>
                    {!!Form::open(['action' => ['MembersController@destroy', $member->id], 'method' => 'POST'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick'=>"return confirm('Are you sure?')"])}}
                    {!!Form::close()!!}
                    </th>
                @endif
            </tr>
            @endif
        @endforeach
    </table> 
        {{$members->links()}}
    @else
        <p>No Members found </p>
    @endif
@endsection