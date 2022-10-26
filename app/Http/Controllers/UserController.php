<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    function userLogin(Request $req){
        $req->validate([
            'login' => 'required | min: 3 | max:18',
            'password' => 'required | min:8 | max:30'
        ]);


        $data =  $req->input();
        $req->session()->put('login', $data['login']);
        return redirect('home');
    }

    function index(){
        
        return DB::select("SELECT * FROM users");
    }
}
