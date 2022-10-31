<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Weapon;
use App\Models\Armor;
use App\Models\Engine;
use App\Models\Ship;

class ShoppingController extends Controller
{
    function show(){
        $data = [];
        //App\User::where('is_admin',true)->get();
        $data[0] = ["Statki", Ship::where('price', '>', 0)->get()];
        $data[1] = ["Bronie", Weapon::where('price', '>', 0)->get()];
        $data[2] = ["Pancerze", Armor::where('price', '>', 0)->get()];
        $data[3] = ["Silniki", Engine::where('price', '>', 0)->get()];
        


        return view('shopping', ['categories'=>$data]);
    }
}
