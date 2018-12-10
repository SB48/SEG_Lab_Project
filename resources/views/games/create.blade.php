@extends('layouts.app')

@section('content')
    <h1>Add a game to the library</h1>

    {!! Form::open(['action' => 'GamesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', '',['class' => 'form-control', 'placeholder' => ''])}}
        </div>
        <div class="form-group">
            {{Form::label('price', 'Price')}}
            {{Form::text('price', '',['class' => 'form-control', 'placeholder' => ''])}}
        </div>
        <div class="form-group">
            {{Form::label('ageRating', 'PEGI Rating')}}
            {{Form::text('ageRating', '',['class' => 'form-control', 'placeholder' => 'Age rating can be: 3, 7, 12, 16 or 18'])}}
        </div>
        <div class="form-group">
            {{Form::label('genre', 'Genre')}}
            {{Form::text('genre', '',['class' => 'form-control', 'placeholder' => ''])}}
        </div>
        <div class="form-group">
            {{Form::label('copies', 'Copies')}}
            {{Form::text('copies', '',['class' => 'form-control', 'placeholder' => ''])}}
         </div>
        <div class="form-group">
            {{Form::label('description', 'Description')}}
            {{Form::textarea('description', '',['id' => 'article-ckeditor','class' => 'form-control', 'placeholder' => 'Enter Game description'])}}
        </div>
        <div class="form-group">
            {{Form::label('platform', 'Platform')}}
            {{Form::text('platform', '',['class' => 'form-control', 'placeholder' => ''])}}
        </div>
        <div class="form-group">
            {{Form::label('thumbnail', 'Picture')}}
            {{Form::file('thumbnail')}}
        </div>
        <div class="form-group">
            {{Form::label('url', 'Rating')}}
            {{Form::text('url', '',['class' => 'form-control', 'placeholder' => 'URL for rating'])}}
        </div>
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
@endsection

