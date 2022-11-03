<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NopageController extends Controller
{
    
    public function noPageYet(Request $req){
        $req->session()->flash('nopage', "There's no page yet");
        return redirect()->back();
    }
}
