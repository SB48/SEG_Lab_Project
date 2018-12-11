@extends('layouts.app')

@section('content')
    <h1>Register a Member to the Society</h1>

    {!! Form::open(['action' => 'MembersController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('name', 'Full Name')}}
            {{Form::text('name', '',['class' => 'form-control', 'placeholder' => ''])}}
        </div>

        <div class="form-group">
            {{Form::label('dob', 'Date of Birth')}}
            {{Form::date('dob', \Carbon\Carbon::now())}}            
        </div>
        
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
@endsection

