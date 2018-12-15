@extends('layouts.app')

@section('content')
    <h1>Edit ID: {{$member->id}} Name:{{$member->name}}</h1>

    {!! Form::open(['action' => ['MembersController@update', $member->id], 'method' => 'POST']) !!}
    <div class="form-group">
            {{Form::label('name', 'Full Name')}}
            {{Form::text('name', '',['class' => 'form-control', 'placeholder' => ''])}}
        </div>

        <div class="form-group">
            {{Form::label('dob', 'Date of Birth')}}
            {{Form::date('dob', \Carbon\Carbon::now())}}            
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
@endsection

