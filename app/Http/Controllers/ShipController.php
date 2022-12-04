<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ship;
use App\Models\Cargo;

class ShipController extends Controller
{
    function show(){
        $ship = currentShip();

        if($ship) return view('ship_general', ['ship' => $ship]);
        
        return view('noship');
        
    }

    function cargoHold(){
        $ship = currentShip();
        $cargoHolds = Cargo::where('ship_id',  $ship->id)->get();

        if($cargoHolds) return view('cargohold', compact('ship', 'cargoHolds'));

        return view('ship_general', ['ship' => $ship])->with('error', "Nie masz dostępu do ładowni");

    }

}
