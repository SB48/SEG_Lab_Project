<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SocietyRule;

class SocietyRulesController extends Controller
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
        $society_rules = SocietyRule::orderBy('society_rule', 'asc')->paginate(24);
        return view('society_rules.index')->with('society_rules', $society_rules);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        if(auth()->user()->privilegeLevel !== 'Secretary'){
            return redirect('/society_rules')->with('error', 'Unauthorized access');
        }

        $society_rule = SocietyRule::find($id);
        if($society_rule == NULL){return redirect('/society_rules')->with('error', 'Cannot find Society Rule');}

        return view('society_rules.edit')->with('society_rule',$society_rule);
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
            'ruleVal' => 'required|integer|gte:1'
        ]);

        // Double check validity
        $society_rule = SocietyRule::find($id);
        if($society_rule == NULL){return redirect('/society_rules')->with('error', 'Cannot find Society Rule');}
        
        // Update the rule value
        $society_rule->ruleVal = $request->input('ruleVal');

        $member->save();
        return redirect('/society_rules')->with('success', 'Society Rule edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
