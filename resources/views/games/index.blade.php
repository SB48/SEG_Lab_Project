@extends('layouts.app')

@section('content')
    @if(count($games) > 0)
    @php 
        $data = \App\Http\Controllers\GamesController::getGameAttributes();
    @endphp
    @include('inc.searchbar', $data)

    <div class="row">
    @foreach($games as $game)    
    <div class="card" style="width: 12rem;">
                <a href="/games/{{$game->gameID}}">
                <img class="card-img-top" style="height: 12rem;" src="/storage/thumbnails/{{$game->thumbnail}}" alt="Could not display image">
                    <div class="card-body">
                      <h5 class="card-title">{{$game->name}}</h5>
                      <p class="card-text">
                            @if($game->copies > 0)
                            Available
                        @else Not Available
                        @endif   
                      </p>
                    </div>
                </a>
            </div>
            @if ($loop->iteration % 4 == 0)
            </div>
            <div class="row">
            @endif
        @endforeach
            </div>
        {{$games->links()}}
    @else
        <p>No games found </p>
    @endif
@endsection

