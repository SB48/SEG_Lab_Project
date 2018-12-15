@extends('layouts.app')

@section('content')
    <h1>Edit Rule: {{$society_rule->society_rule}}</h1>

    {!! Form::open(['action' => ['SocietyRulesController@update', $society_rule->society_rule], 'method' => 'POST']) !!}
    <div class="form-group">
            {{Form::label('ruleVal', 'Associated Value')}}
            {{Form::text('ruleVal', '',['class' => 'form-control', 'placeholder' => ''])}}
        </div>

        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
@endsection