<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Weapon;
use App\Models\Armor;
use App\Models\Engine;
use App\Models\Ship;
use App\Models\Offer;
use App\Models\Cargo;

use Carbon\Carbon; //time

class ShoppingController extends Controller
{
    function show(){
        //TODO expiration
        $offers = Offer::where([
            ['status', '=' , 0],
            ['seller_id', '!=' , currentProfile()->id]
            ])->get();

        $data = [];

        $data["Statki"] = new \Illuminate\Database\Eloquent\Collection;
        $data["Bronie"] = new \Illuminate\Database\Eloquent\Collection;
        $data["Pancerze"] = new \Illuminate\Database\Eloquent\Collection;
        $data["Silniki"] = new \Illuminate\Database\Eloquent\Collection;

        foreach($offers as $offer){
            $data[$offer->category][] = findItem($offer->category, $offer->item_id);
        }


        $offers = Offer::where('buyer_id', currentProfile()->id)->get();
        
        return view('shopping', ['categories'=>$data, 'offers'=>$offers]);
    }

    function offerPage(){
        $cargoHolds = Cargo::where('ship_id',  currentShip()->id)->get();
        $items = new \Illuminate\Database\Eloquent\Collection;
        foreach ($cargoHolds as $cargo){
            $items = $items->concat($cargo->items());
        }
        $offers = Offer::where('seller_id', currentProfile()->id)->get();


        return view('create_offer', compact('items', 'offers'));
    }

    function createOffer(Request $request){
        
        $request->validate([
            //TODO
            'price' => 'required | gt:0',
            'count' => 'required | gt:0',
            'time' => 'required | in: 3, 6, 12, 24, 48, 168',
        ]);
        $category = explode("::",$request->input('item'))[0];
        $item_id = explode("::",$request->input('item'))[1]; //separate category from id by '::' ex. Statki::17
        $item = findItem($category, $item_id);
        $price = $request->input('price');
        $count = $request->input('count'); //TODO
        $hours = (int)$request->input('time');
        $expirationDate = Carbon::now()->addHours($hours)->format('Y-m-d H:i:s');
        $item = $item->unstack($count);
        if(!$item) 
            return back()->with('error', 'Nie znaleziono przedmiotu');

        $market = Ship::where('ship_type_id', 2)->first();
        if(!$market)
            return back()->with('error', 'Nie jesteś w stacji handlowej');
            
        $marketCargo = suitableCargo($item, $market->id);
        
        $result = DB::transaction(function() use($item, $category, $count, $price, $expirationDate, $marketCargo){
            $offer = Offer::create([
                'seller_id' => currentProfile()->id,
                'item_id' => $item->id,
                'category' => $category,
                'count' => $count,
                'price' => $price,
                'expires_at' => $expirationDate
            ]);
            
            $item->price = $price;
            $item->cargo_id = $marketCargo->id;
            $item->save();

            return 1;
        });
             
        if($result) return redirect()->action([ShoppingController::class, 'offerPage'])->with('success', "Udało Ci się skutecznie stworzyć ofertę!");
        else return back()->with('error', 'Wystąpił  prolem z ofertą');
            
    }

    function purchase(Request $request){
        $offer = Offer::where('id', $request->input('offer_id'))->first();
        if(!$offer) return back()->with('error', 'Nie znaleziono oferty');

        $item = findItem($offer->category, $offer->item_id);
        if(!$item) return back()->with('error', 'Nie znaleziono przedmiotu');

        $seller = $item->owner();
        if(!$seller) return back()->with('error', 'Nie znaleziono sprzedawcy');

        $buyer = currentProfile();
        $price = $offer->price;
        if($buyer->money < $price) return back()->with('error', 'Masz za mało pieniędzy');

        $cargo = suitableCargo($item);
        if(!$cargo) return back()->with('error', 'Nie masz odpowiedniej ładowni, lub w ogóle statku');
                
        $result = DB::transaction(function() use($price, $buyer, $seller, $item, $offer, $cargo){
            $buyer->money -= $price;
            $buyer->save();
                    
            $seller->money += $price;
            $seller->save();

            $item->profile_id = $buyer->id;
            $item->last_price = $price;
            $item->price = 0;
            $item->cargo_id = $cargo->id;
            $item->save();
            $offer->update([
                'buyer_id' => $buyer->id,
                'status' => 1
            ]);
            return 1;
        });
        if($result) return back()->with('success', "Udało Ci się zakupić ten przedmiot za $price UDP");
        else return back()->with('error', 'Coś poszło nie tak');

    }

    function take(Request $request){
        $item = findItem($request->input('category'), $request->input('item_id'));
        $purchase = Offer::where('item_id', $item->id)->first();
        if(!$purchase->is_taken){
            if($item){
                $ship = currentShip();
                $cargo = Cargo::where([
                    ['ship_id', '=', $ship->id],
                    ['type', '=', 'general'] //TODO
                ])->first();
                if($cargo){
                    $item->cargo_id = $cargo->id;
                    $purchase->is_taken = 1;
                    $item->save();
                    $purchase->save();
                    return back()->with('success', "Udało Ci się odebrać ten przedmiot");
                }
                return back()->with('error', 'Coś poszło nie tak');
            }
            return back()->with('error', 'Nie znaleziono przedmiotu');
        }
        return back()->with('error', 'Przedmiot został już odebrany');
        
    }

    

    function deleteOffer(Request $request){
        $offer = Offer::where('id', $request->input('offer_id'))->first();
        $item = findItem($offer->category, $offer->item_id);
        if($offer->seller_id == currentProfile()->id){
            $offer = Offer::where('id', $request->input('offer_id'))->first()->delete();
            $cargo = suitableCargo($item);
            $item->cargo_id = $cargo->id;
            $item->price = 0;
            $item->save();
            return redirect()->action([ShoppingController::class, 'offerPage'])->with('success', "Udało Ci się usunąć ofertę!");
        }return back()->with('error', 'Nie możesz usunąć oferty');
        
        

    }






}
