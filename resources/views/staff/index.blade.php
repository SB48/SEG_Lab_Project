@extends('layouts.app')

@section('content')
    <h1>Staff Area</h1>
    @if(count($users) > 1)
        <table class ="table table-striped">
            <tr>
                <th>Staff ID</th>
                <th>Name</th>
                <th>email</th>
                <th>Privilege Level</th>
            </tr>
        
        @foreach($users as $user)
            <tr>
                <th>{{$user->id}}</th>
                <th>{{$user->name}}</th>
                <th>{{$user->email}}</th>
                <th>{{$user->privilegeLevel}}</th>
                @if(Auth::user()->privilegeLevel == 'Secretary' && $user->privilegeLevel == 'Volunteer')
                <th>
                    {!! Form::open(['action' => ['UsersController@promote', $user->id], 'method' => 'POST']) !!}
                    {{Form::hidden('_method', 'PUT')}}
                    {{Form::submit('Promote to Secretary', ['class' => 'btn btn-success', 'onclick'=>"return confirm('This is an irreversable action that will transfer secretary privileges. Are you sure?')"])}}
                    {!! Form::close() !!}    
                </th>

                <th>
                    {!!Form::open(['action' => ['UsersController@destroy', $user->id], 'method' => 'POST'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick'=>"return confirm('Are you sure?')"])}}
                    {!!Form::close()!!}
                </th>
                @endif
            </tr>
        @endforeach
    </table> 
        {{$users->links()}}
    @else
        <p>You are the only user</p>
    @endif
@endsection