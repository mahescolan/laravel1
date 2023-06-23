<?php

namespace App\Http\Controllers;

use App\Models\employee;
use Illuminate\Http\Request;
use App\Models\User;

class usercontroller extends Controller
{
    public function list(){
       $a=employee::get();
       
        return view('welcome',compact('a'));

    }
}
