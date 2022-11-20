<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ship;
use App\Models\Cargo;

class ShipController extends Controller
{
    function show(){
        $ship = Ship::where('profile_id',  auth()->user()->profiles()[0]->id)->first();

        if($ship) return view('ship_general', ['ship' => $ship]);
        
        return view('noship');
        
    }

    function cargoHold(){
        $ship = Ship::where('profile_id',  auth()->user()->profiles()[0]->id)->first();
        $cargoHolds = Cargo::where('ship_id',  $ship->id)->get();
        if($cargoHolds) return view('cargohold', ['ship' => $ship, 'cargoHolds' => $cargoHolds]);
        return view('ship_general', ['ship' => $ship])->with('error', "Nie masz dostępu do ładowni");

    }

}
