<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    function descriptionRequest(Request $req){
        return $req->input();
    }
}
