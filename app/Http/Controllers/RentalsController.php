<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rental;
use App\Game;
use App\Member;
use App\SocietyRule;
use \Carbon\Carbon;

class RentalsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rentals = Rental::orderBy('updated_at', 'asc')->paginate(24);
        return view('rentals.index')->with('rentals', $rentals);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($memberID)
    {   
        $member = Member::find($memberID);
        $games = Game::select('name')->where('copies', '>', 0)->groupBy('name')->get();
        $platforms = Game::select('platform')->distinct()->get();

        $data = [
            'member' => $member->toArray(),
            'games' => $games->toArray(),
            'platforms' => $platforms->toArray()
        ];

        return view('rentals.create')->with('data', $data);
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
            'game' => 'required',
            'platform' => 'required'
        ]);

        // Retrieve info from request
        $memberID = $request->memberID;
        $gameName = $request->input('game');
        $platform = $request->input('platform');    

        // Check member Exists - if mess around with address bar
        $member = Member::find($memberID);
        if($member == NULL){return redirect('/members')->with('error', 'That person does not exist');}
        
        // Are they Banned
        if($member->damageBan || $member->normalBan){return redirect('/members')->with('error', 'This Member is banned');}

        // Can they actually Rent - double check
        $memberCanRent = Self::underRentalLimit($memberID);
        if(!$memberCanRent){return redirect('/members')->with('error', 'That person is unable to rent more games');}

        // Attempt to get the game from the selections
        $gameToRent = Game::where('name', $gameName)
                            ->where('platform',$platform)->first();
        
        if($gameToRent == NULL){
            return redirect('/members')->with('error', 'That game is unavailable for the chosen platform');
        }

        if($gameToRent->copies < 1){return redirect('/members')->with('error', 'That game has no more copies');}

        $rentalPeriod = SocietyRule::select('ruleVal')->where('society_rule','rentalPeriod')->first()->ruleVal; 
        $calcDate = Carbon::now()->addWeeks($rentalPeriod);
        
        $rental = new Rental;
        $rental->gameID = $gameToRent->gameID;
        $rental->memberID = $memberID;
        $rental->returnDate = $calcDate;

        // Save the rental
        $rental->save();

        // Update the copies for that game
        $gameToRent->copies--;
        $gameToRent->save();

        return redirect('/members')->with('success', 'Rental Added');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rental = Rental::find($id);
        if ($rental == NULL){return redirect('/members')->with('error', 'Rental does not exist');}
        
        // For routing
        $memberID = $rental->memberID;

        Self::damagedGame($memberID,$rental->gameID);
        $rental->delete();
        return redirect('/members/$memberID')->with('success', 'Member incurred a Damage ban');
    }


    /**
     * Number of rentals held by a member.
     *
     * @param  int  $id
     * @return int
     */
    public static function numOfActiveRentals($id)
    {
        return Rental::where('memberID',$id)->where('returned',false)->count();
    }

    /**
     * Checks whether the member has hit the rental limit.
     *
     * @param  int  $id
     * @return boolean
     */
    public static function underRentalLimit($id)
    {
        $rentalLimit = SocietyRule::select('ruleVal')->where('society_rule', 'rentalLimit')->first();
        return Self::numOfActiveRentals($id) < $rentalLimit->ruleVal;  
    }

    /**
     * A Member has damaged a game.
     *
     * @param  int  $id
     * @return void
     */
    public static function damagedGame($memberID,$gameID)
    {
        $member = Member::find($memberID);
        $price = Game::find($gameID)->price;
        
        // Update member - damage ban, date, amountDue
        $member->damageBan = true;
        if(!$member->normalBan){
            $member->banBeginDate = Carbon::now();
        }
        $member->amountDue += $price;
        $member->save();
    }

    /**
     * A Member wants an extension.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function extend($id)
    {
        $rental = Rental::find($id);

        // Check if rental exists
        if($rental == NULL){return redirect('/members')->with('error', 'Rental does not exist');} 
        
        // Are we obeying extension rules
        $maxExtensions = SocietyRule::where('society_rule','numExtensions')->first()->ruleVal;

        if($rental->extensions >= $maxExtensions){
            return redirect('/members')->with('error', 'Cannot extend this rental further');
        }

        // extension period allotted
        $extensionTime = SocietyRule::where('society_rule','extensionTime')->first()->ruleVal;

        // Update the rental
        $rental->extensions++;
        $rental->returnDate = Carbon::parse($rental->returnDate)->addWeeks($extensionTime);  
        $rental->save();

        //$memberID = $rental->memberID;
        return redirect('/members')->with('success', 'Extension Provided');
        
    }

    /**
     * A Return has been made.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function returnGame($id)
    {
        $rental = Rental::find($id);

        // Check if rental exists and if so, make sure it isn't returned
        if($rental == NULL){return redirect('/members')->with('error', 'Rental does not exist');}
        if($rental->returned){return redirect('/members')->with('error', 'Already Returned');} 
        
        // Did we return late
        $inducedViolation = ($rental->returnDate < Carbon::now());

        if($inducedViolation){
            //violations++
            //check if that has now reached numViolationsForBan
        }
        
        // Grab the game in question
        $game = Game::find($rental->gameID);

        // Return the game to the collection
        $rental->returned = true;
        $game->copies++;

        $rental->save();
        $game->save();
        
        //$memberID = $rental->memberID;
        return redirect('/members')->with('success', 'Member has returned a game');
        
    }

}
