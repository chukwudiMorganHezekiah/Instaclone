<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Following;
use App\User;

class HomeController extends Controller
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

    public function home(){
        $user=auth()->user()->id;

        $select=Following::all()->pluck('user_id');
        $users=User::whereIn('id',$select)->get();




        return view('welcome',compact('users'));


    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('homeprofilesetting');
    }

    public function dashoard(){
        return view('home.index');
    }
}
