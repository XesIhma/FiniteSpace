<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ship;
use App\Models\Weapon;
use App\Models\Engine;
use App\Models\Armor;
use App\Models\Cargo;

class ShipController extends Controller
{
    function show(){
        $ship = currentShip();

        if($ship) return view('ship_general', ['ship' => $ship]);
        
        return view('noship');
        
    }

    function showDrive(){
        $ship = currentShip();
        if($ship){
            $engines = Engine::where('ship_id', $ship->id)->get();
            return view('ship_drive', compact('ship', 'engines'));
        }
        return view('noship');
        
    }

    function showArmor(){
        $ship = currentShip();

        if($ship) {
            $armors = Armor::where('ship_id', $ship->id)->get();
            return view('ship_armor', compact('ship', 'armors'));
        }
        return view('noship');
        
    }

    function showWeapon(){
        $ship = currentShip();

        if($ship) {
            $weapons = Weapon::where('ship_id', $ship->id)->get();
            return view('ship_weapon', compact('ship', 'weapons'));
        }
        return view('noship');
        
    }

    function cargoHold(){
        $ship = currentShip();
        $cargoHolds = Cargo::where('ship_id',  $ship->id)->get();

        if($cargoHolds) return view('cargohold', compact('ship', 'cargoHolds'));

        return view('ship_general', ['ship' => $ship])->with('error', "Nie masz dostępu do ładowni");

    }

}
