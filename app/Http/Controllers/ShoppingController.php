<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Weapon;
use App\Models\Armor;
use App\Models\Engine;
use App\Models\Ship;
use App\Models\Bought;

class ShoppingController extends Controller
{
    function show(){
        $data = [];
        //App\User::where('is_admin',true)->get();
        $data[0] = ["Statki", Ship::where('price', '>', 0)->get()];
        $data[1] = ["Bronie", Weapon::where('price', '>', 0)->get()];
        $data[2] = ["Pancerze", Armor::where('price', '>', 0)->get()];
        $data[3] = ["Silniki", Engine::where('price', '>', 0)->get()];

        $boughts = Bought::where('profile_id', auth()->user()->profiles()[0]->id)->get();
        
        return view('shopping', ['categories'=>$data, 'boughts'=>$boughts]);
    }
    function purchase(Request $request){
        $item_id = $request->input('item_id');
        switch($request->input('category')){
            case "Statki": 
                $item = Ship::where('id', $item_id)->first();
                break;
            case "Bronie": 
                $item = Weapon::where('id', $item_id)->first();
                break;
            case "Pancerze": 
                $item = Armor::where('id', $item_id)->first();
                break;
            case "Silniki": 
                $item = Engine::where('id', $item_id)->first();
                break;
        }

        if($item){
            $seller = $item->owner();
            $buyer = auth()->user()->profiles()[0];
            $price = $item->price;
            if(!$seller){
                return back()->with('error', 'Nie znaleziono sprzedawcy');
            }
            if($buyer->money >= $price){

                $buyer->money -= $price;
                $buyer->save();

                $seller->money += $price;
                $seller->save();

                $item->profile_id = $buyer->id;
                $item->last_price = $price;
                $item->price = 0;
                $item->save();
                $bought = Bought::create([
                    'profile_id' => $buyer->id,
                    'seller_id' => $seller->id,
                    'item_id' => $item->id,
                    'category' => $request->input('category'),
                    'name' => $item->name,
                    'image' => $item->image,
                    'price' => $price

                ]);
                return back()->with('success', "Udało Ci się zakupić ten przedmiot za $price UDP");
            }
            return back()->with('error', 'Nie masz wystarczająco pieniędzy');
            
        }
        return back()->with('error', 'Coś poszło nie tak');



    }
}
