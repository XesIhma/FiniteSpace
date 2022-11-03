<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ship;

class ShipController extends Controller
{
    function show(){
        $ship = Ship::where('profile_id',  auth()->user()->profiles()[0]->id)->first();



        return view('ship_general', ['ship' => $ship]);
    }
}
