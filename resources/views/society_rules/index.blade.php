@extends('layouts.app')

@section('content')
    <h1>List of Rules</h1>
    @if(count($society_rules) > 1)
    <table class ="table table-striped">
        <tr>
            <th>Society Rule</th>
            <th>Associated Value</th>
        </tr>
    
    @foreach($society_rules as $society_rule)
        <tr>
            <th>{{$society_rule->society_rule}}</th>
            <th>{{$society_rule->ruleVal}}</th>
            @if(Auth::user()->privilegeLevel == 'Secretary')
            <th>
                <a href="/society_rules/{{$society_rule->society_rule}}/edit">
                    Edit Value    
                </a>
            </th>
            @endif
        </tr>
    @endforeach
    {{$society_rules->links()}}
    @else
        <p>No rules found </p>
    @endif
@endsection