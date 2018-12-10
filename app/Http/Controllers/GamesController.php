<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Game;
use DB;

class GamesController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::orderBy('name', 'asc')->paginate(24);
        return view('games.index')->with('games', $games);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->privilegeLevel !== 'Secretary'){
            return redirect('/games')->with('error', 'Unauthorized access');
        }
        return view('games.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'thumbnail' => 'image|nullable|max:1999'
        ]);

        // Handle File Upload
        if($request->hasFile('thumbnail')){
            // Get filename with the extension
            $filenameWithExt = $request->file('thumbnail')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
            // Get just ext
            $extension = $request->file('thumbnail')->getClientOriginalExtension();
            // Filename to store
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('thumbnail')->storeAs('public/thumbnails', $filenameToStore);
        }
        else{
            $filenameToStore = 'noimage.jpg';
        }

        // Add a Game
        $game = new Game;
        $game->name = $request->input('name');
        $game->price = $request->input('price');
        $game->ageRating = $request->input('ageRating');
        $game->genre = $request->input('genre');
        $game->description = $request->input('description');
        $game->copies = $request->input('copies');
        $game->url = $request->input('url');
        $game->thumbnail = $filenameToStore;
        $game->platform = $request->input('platform');
        $game->save();

        return redirect('/games')->with('success', 'Game Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($gameID)
    {
        $game = Game::find($gameID);
        return view('games.show')->with('game',$game);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($gameID)
    {   
        if(auth()->user()->privilegeLevel !== 'Secretary'){
            return redirect('/games')->with('error', 'Unauthorized access');
        }
        $game = Game::find($gameID);
        return view('games.edit')->with('game',$game);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $gameID)
    {
        $this->validate($request, [
            'name' => 'required',
            'thumbnail' => 'image'
        ]);

        // Handle File Upload
        if($request->hasFile('thumbnail')){
            // Get filename with the extension
            $filenameWithExt = $request->file('thumbnail')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
            // Get just ext
            $extension = $request->file('thumbnail')->getClientOriginalExtension();
            // Filename to store
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('thumbnail')->storeAs('public/thumbnails', $filenameToStore);
        }

        // Add a Game
        $game = Game::find($gameID);
        $game->name = $request->input('name');
        $game->price = $request->input('price');
        $game->ageRating = $request->input('ageRating');
        $game->genre = $request->input('genre');
        $game->description = $request->input('description');
        $game->copies = $request->input('copies');
        $game->url = $request->input('url');
        if($request->hasFile('thumbnail')){
            $game->thumbnail = $filenameToStore;
        }
        $game->platform = $request->input('platform');
        $game->save();

        return redirect('/games')->with('success', 'Game Info Changed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($gameID)
    {
        // Check credentials
        if(auth()->user()->privilegeLevel !== 'Secretary'){
            return redirect('/games')->with('error', 'Unauthorized access');
        }

        // Find the game
        $game = Game::find($gameID);

        if($game->thumbnail != 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/thumbnails/'.$game->thumbnail);
        }
        $game->delete();
        return redirect('/games')->with('success', 'Game Removed'); 
    }
}
