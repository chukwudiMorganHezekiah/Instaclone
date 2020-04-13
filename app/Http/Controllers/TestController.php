<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;

class TestController extends Controller
{

    public function store(Request $request){

        $data=$request->validate([
            'name'=>'required',
            'email'=>'required|email'
        ]);

        $created=Test::create($data);



        event(new \App\Events\newTestEvent($created));

        return redirect('/login');
    }
}
