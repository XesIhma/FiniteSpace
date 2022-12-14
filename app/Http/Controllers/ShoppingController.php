<?php

namespace App\Http\Controllers;

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

        $offers = Offer::where('status', 0)->get();

        $data = [];
        //App\User::where('is_admin',true)->get();
        // $data[0] = ["Statki", Ship::where('price', '>', 0)->get()];
        // $data[1] = ["Bronie", Weapon::where('price', '>', 0)->get()];
        // $data[2] = ["Pancerze", Armor::where('price', '>', 0)->get()];
        // $data[3] = ["Silniki", Engine::where('price', '>', 0)->get()];

        $data["Statki"] = new \Illuminate\Database\Eloquent\Collection;
        $data["Bronie"] = new \Illuminate\Database\Eloquent\Collection;
        $data["Pancerze"] = new \Illuminate\Database\Eloquent\Collection;
        $data["Silniki"] = new \Illuminate\Database\Eloquent\Collection;

        foreach($offers as $offer){
            $data[$offer->category][] = findItem($offer->category, $offer->item_id);
        }


        $purchases = Offer::where('buyer_id', currentProfile()->id)->get();
        
        return view('shopping', ['categories'=>$data, 'purchases'=>$purchases]);
    }

    function purchase(Request $request){
        $offer = Offer::where('id', $request->input('offer_id'))->first();
        $item = findItem($offer->category, $offer->item_id);

        if($item){
            $seller = $item->owner();
            $buyer = currentProfile();
            $price = $offer->price;
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
                $item->cargo_id = suitableCargo($item)->id;
                $item->save();
                $offer->update([
                    'buyer_id' => $buyer->id,
                    'status' => 1
                ]);
                return back()->with('success', "Udało Ci się zakupić ten przedmiot za $price UDP");
            }
            return back()->with('error', 'Nie masz wystarczająco pieniędzy');
            
        }
        return back()->with('error', 'Coś poszło nie tak');
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
        $count = $request->input('count');
        $item = $item->unstack($count);
        $hours = (int)$request->input('time');
        $expirationDate = Carbon::now()->addHours($hours)->format('Y-m-d H:i:s');
        if($item){
            $offer = Offer::create([
                'seller_id' => currentProfile()->id,
                'item_id' => $item->id,
                'category' => $category,
                'count' => $count,
                'price' => $request->input('price'),
                'expires_at' => $expirationDate
            ]);
            
            $market = Ship::where('name', "Ahmar")->first();
            $marketCargo = suitableCargo($item, $market->id);
            $item->price = $request->input('price');
            $item->cargo_id = $marketCargo->id;
            $item->save();


            return redirect()->action([ShoppingController::class, 'offerPage'])->with('success', "Udało Ci się skutecznie wysłać zgłoszenie!");
        
        }return back()->with('error', 'Nie znaleziono przedmiotu');
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
