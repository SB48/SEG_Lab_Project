
{!! Form::open(['action' => 'GamesController@search', 'method' => 'GET']) !!}
<table class ="table table-striped">
        <tr>
        <th>
        <div class="form-group">
            {{Form::label('game', 'Game')}}
            {{Form::text('name', '',['class' => 'form-control', 'placeholder' => ''])}}   
        </div>
    </th>
    <th>
        <div class="form-group">
                {{Form::label('ageRatings', 'Age Rating')}}
                <select name="ageRating" class="form-control">
                    <option value = "{{NULL}}"></option>
                    @foreach($data['ageRatings'] as $ageRating)    
                    <option value= "{{$ageRating}}">{{$ageRating}}</option>
                    @endforeach
    
                </select>            
            </div>
        </th>
            <th>
            <div class="form-group">
                    {{Form::label('genre', 'Genre')}}
                    <select name="genre" class="form-control">
                        <option value = "{{NULL}}"></option>
                        @foreach($data['genres'] as $genre) 
                        <option value= "{{$genre['genre']}}">{{$genre['genre']}}</option>
                        @endforeach
        
                    </select>            
                </div>
            </th>
            <th>
        <div class="form-group">
                {{Form::label('platform', 'Platform')}}
                <select name="platform" class="form-control">
                    <option value = "{{NULL}}"></option>
                    @foreach($data['platforms'] as $platform)
                    <option value="{{$platform['platform']}}">{{$platform['platform']}}</option>
                    @endforeach
    
                </select>            
            </div>
        </th>
        <th>
        <br>
        {{Form::submit('Search', ['class' => 'btn btn-primary'])}}
    </th>
    </tr>
</table>
{!! Form::close() !!}