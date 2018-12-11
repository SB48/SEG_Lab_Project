@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(Auth::user()->privilegeLevel == 'Secretary')
                        <p>Welcome Queen of Westeros</p>
                        <p>You are the Secretary</p>       
                        <a href="{{ route('register') }}" class="btn btn-primary">Register a Volunteer</a>
                        <a href="/games/create" class="btn btn-primary"> Add A New Game </a>
                        <a href="/games" class="btn btn-primary"> Manage Games in Collection </a>
                        <a href="/rules/edit" class="btn btn-primary"> TODO EDIT RULES </a>
                        <a href="/members/edit" class="btn btn-primary"> TODO EDIT MEMBER </a>
                    @endif
                    <br><br>
                    <p> Default Actions </p>        
                    <a href="/members" class="btn btn-primary">View Members</a>
                    <a href="/members/create" class="btn btn-primary"> Register Member </a>
                    <a href="/rentals" class="btn btn-primary"> TODO Active Rentals </a>
                           
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
