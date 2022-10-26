<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    function descriptionRequest(Request $req){
        $data = $req->input('description');
        $req->session()->flash('description', $data);
        return redirect('account');
    }
}
