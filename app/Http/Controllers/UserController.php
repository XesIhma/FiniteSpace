<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function getData(Request$req){
        $req->validate([
            'login' => 'required | min: 3 | max:18',
            'password' => 'required | min:8 | max:30'
        ]);


        return $req->input();
    }
}
