<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Weapon;
use App\Models\Ship;

class ShoppingController extends Controller
{
    function show(){
        $data = [];
        $data[0] = ["Statki", Ship::all()];
        $data[1] = ["Bronie", Weapon::all()];
        


        return view('shopping', ['categories'=>$data]);
    }
}
