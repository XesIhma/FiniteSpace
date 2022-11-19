<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ship;

class ShipController extends Controller
{
    function show(){
        $ship = Ship::where('profile_id',  auth()->user()->profiles()[0]->id)->first();

        if($ship) return view('ship_general', ['ship' => $ship]);
        
        return view('noship');


        
    }
}
