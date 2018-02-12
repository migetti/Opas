<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Profile;
use App\Skill;
use Hash;
use Session;

class ProfileController extends Controller
{   
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = \Auth::user();
        
        //render profile view and pass with data of authenticated user
        return view('profile', compact('user'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user_id = \Auth::user()->id;
        
        $profile = Profile::find($user_id);
        
        //Validate form request. No empty values allowed.
        
        $this->validate($request, [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            ]);
        if($request->email != $profile->email){
            $this->validate($request, [
                'email' => 'required|email|max:255|unique:profiles',
                ]);
        };
        
        //Save changes to the database
        $profile->fill($request->input())->save();
        return redirect('/profile')->with(Session::flash('update', 'Update was successful'));
    }
    
    //Remove skill relationship from profile
    public function removeOneSkill($id){
        \Auth::user()->skills()->detach($id);
        return redirect('/profile')->with(Session::flash('skill_removed', 'Skill ' . Skill::find($id)->title . ' removed successfully'));
    }
    
    public function changePassword(Request $request){
        $profile = Profile::find(\Auth::user()->id);
        if(!Hash::check($request->password, $profile->password)){
            return redirect('/profile')->with(Session::flash('pw_not_match', 'Current password does not match. Check current password'));
        }
        else{
            $this->validate($request, [
                'password' => 'required',
                'new_password' => 'confirmed|required|min:6',
                ]);
            //Save changes to the database
            $profile->fill(['password' => bcrypt($request->new_password)])->save();
            return redirect('/profile')->with(Session::flash('pw_changed', 'Password changed successfully'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $user_id = \Auth::user()->id;
        
        Profile::destroy($user_id);
    }
}
