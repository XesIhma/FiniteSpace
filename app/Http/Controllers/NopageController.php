<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NopageController extends Controller
{
    
    public function noPageYet(Request $req){
        $req->session()->flash('success', "There's no page yet");
        return redirect()->back();
    }
}
