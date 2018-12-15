<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
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
            $users = User::orderBy('privilegeLevel', 'desc')->paginate(24);
            return view('staff.index')->with('users', $users);
        }
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
            return redirect('/users')->with('error', 'Unauthorized attempt');
        }

        // Find the member
        $user = User::find($id);

        if ($user == NULL){return redirect('/users')->with('error', 'User does not exist');}

        // Make sure this is isnt a request to delete themselves - secretary
        if($user->privilegeLevel == 'Secretary'){
            return redirect('/users')->with('error', 'Must first transfer Secretary role before this user can be deleted');
        }
        $user->delete();
        return redirect('/users')->with('success', 'User removed');

    }
    
    /**
     * Transfer secretary privileges to another user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function promote($id)
    {
        if(auth()->user()->privilegeLevel !== 'Secretary'){
            return redirect('/users')->with('error', 'Unauthorized attempt');
        }
        
        $user = User::find($id);
        if ($user == NULL){return redirect('/users')->with('error', 'User does not exist');}

        if($user->privilegeLevel == 'Secretary'){
            return redirect('/users')->with('error', 'Cannot promote the Secretary');
        }

        $currentSecretary = User::where('privilegeLevel','Secretary')->first();
        
        // Update privileges for the users
        $user->privilegeLevel = 'Secretary';
        $currentSecretary->privilegeLevel = 'Volunteer';
        
        
        $user->save();
        $currentSecretary->save();
        return redirect('/users')->with('success', 'Leadership transferred');
        
    }
}
