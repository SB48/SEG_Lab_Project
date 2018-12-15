@extends('layouts.app')

@section('content')
    <p>Members Table</p>
    @if(count($members) > 0)
        <table class ="table table-striped">
            <tr>
                <th>Member ID</th>
                <th>Name</th>
                <th>Date of Birth</th>
                <th>Active Rentals</th>
                <th>NormalBan?</th>
                <th>DamageBan?</th>
                <th>Ban Start Date</th>
                <th>Amount Due</th>
            </tr>
        
        @foreach($members as $member)
            @php $currentlyRenting = \App\Http\Controllers\RentalsController::numOfActiveRentals($member->id)@endphp
            <tr>
                <th>{{$member->id}}</th>
                <th>{{$member->name}}</th>
                <th>{{$member->dob}}</th>
                <th>
                    @if($currentlyRenting != 0)
                    <a href="/members/{{$member->id}}">
                        {{$currentlyRenting}}
                    </a>
                    @else 0
                    @endif
                </th>
                <th>@if($member->normalBan)
                    Yes
                    @else No
                    @endif
                </th>
                <th>@if($member->damageBan)
                        {!! Form::open(['action' => ['MembersController@payback', $member->id], 'method' => 'POST']) !!}
                        {{Form::hidden('_method', 'PUT')}}
                        {{Form::submit('Pay Back', ['class' => 'btn btn-success'])}}
                        {!! Form::close() !!}
                    @else No
                    @endif
                </th>
                <th>{{$member->banBeginDate}}</th>
                <th>{{$member->amountDue}}</th>
                @if(\App\Http\Controllers\MembersController::isBanned($member->id) || !\App\Http\Controllers\RentalsController::underRentalLimit($member->id) || \App\Http\Controllers\GamesController::numOfGames() == 0)
                    <th><a class="btn btn-primary disabled">Rent Game</a></th>
                @else
                    <th><a href="/members/{{$member->id}}/rent" class="btn btn-primary">Rent Game</a></th>
                @endif
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
        @endforeach
    </table> 
        {{$members->links()}}
    @else
        <p>No Members found </p>
    @endif
@endsection

