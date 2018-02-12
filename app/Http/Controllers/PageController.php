<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth', ['except' => ['home']]);
    }
    public function dashboard(){
        return view('dashboard');
    }
    
    public function browse(){

        $users = User::all();
        return view('browse', compact('users'));
    }
    
    public function home(){
        return view('welcome');
    }
}
