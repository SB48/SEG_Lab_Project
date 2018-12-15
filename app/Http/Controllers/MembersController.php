<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Carbon\Carbon;
use App\Member;
use App\Rental;
use App\SocietyRule;

class MembersController extends Controller
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
        {
            $members = Member::orderBy('updated_at', 'desc')->paginate(24);
            return view('members.index')->with('members', $members);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('members.create');
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
            'name' => 'required|max:80',
            'dob' => 'required|date|before:today'
        ]);

        $member = new Member;
        $member->name = $request->input('name');
        $member->dob = $request->input('dob');
        
        $existMemberCheck = Member::where('name', $member->name)->where('dob', $member->dob);
        
        if ($existMemberCheck->count() > 0){
            return redirect('/members')->with('error', 'That Member already exists');
  
        }

        else{
            $member->save();
            return redirect('/members')->with('success', 'Member Registered Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = Member::find($id);
        $rentals = Rental::where('memberID',$id)->where('returned', false)->get();
        $numExtensions = SocietyRule::where('society_rule','numExtensions')->first()->ruleVal; 

        $data = [
            'rentals' => $rentals->toArray(),
            'memberID' => $id,
            'memberName' => $member->name,
            'numExtensions' => $numExtensions
        ];

        return view('members.show')->with('data',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(auth()->user()->privilegeLevel !== 'Secretary'){
            return redirect('/members')->with('error', 'Unauthorized access');
        }
        $member = Member::find($id);
        if($member == Null){return redirect('/members')->with('error', 'Cannot find Member');
        }
        return view('members.edit')->with('member',$member);
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
        $this->validate($request, [
            'name' => 'required|max:80',
            'dob' => 'required|date|before:today'
        ]);

        $member = Member::find($id);
        $member->name = $request->input('name');
        $member->dob = $request->input('dob');
        
        $existMemberCheck = Member::where('name', $member->name)->where('dob', $member->dob);
        
        if ($existMemberCheck->count() > 0){
            return redirect('/members')->with('error', 'Either you made no changes, or you cannot morph this Member into an existing one');
  
        }

        $member->save();
        return redirect('/members')->with('success', 'Member edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(auth()->user()->privilegeLevel !== 'Secretary'){
            return redirect('/games')->with('error', 'Unauthorized access');
        }

        // Find the member
        $member = Member::find($id);
        $member->delete();
        return redirect('/members')->with('success', 'Member Removed');

    }

    /**
     * Ban a Member normally.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ban($id)
    {
        $member = Member::find($id);

        if ($member == NULL){return redirect('/members')->with('error', 'Member does not exist');}
        $member->normalBan = true;
        $member->banBeginDate = Carbon::now();
        $member->save();
        return redirect('/members')->with('success', 'Member Banned');
        
    }

    /**
     * Unban a Member normally.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function unban($id)
    {
        $member = Member::find($id);

        if ($member == NULL){return redirect('/members')->with('error', 'Member does not exist');}

        $member->normalBan = false;
        $member->banBeginDate = NULL;
        $member->save();
        return redirect('/members')->with('success', 'Member Unbanned');
        
    }

    /**
     * Check ban status.
     *
     * @param  int  $id
     * @return boolean
     */
    public static function isBanned($id)
    {
        $member = Member::find($id);
        return $member->damageBan || $member->normalBan;
        
    }

    /**
     * Let this Member pay off their debts.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function payback($id)
    {
        $member = Member::find($id);

        if ($member == NULL){return redirect('/members')->with('error', 'Member does not exist');}
        $member->damageBan = false;
        $member->amountDue = 0;
        $member->save();
        return redirect('/members')->with('success', 'Member has paid back what is owed');
        
    }
}
