<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

function organiseInventory($items){
    $types = [];
    foreach($items as $item){
        if(!in_array($item->itemType(), $types)){ 
            $types[] = $item->itemType();
        }
    }
   
    $newItems = [];
    foreach($types as $type){
        $stack = [];
        $iteration = 0;
        foreach($items as $item){
            if(!(($item->category() == "Materiały") || ($item->category() == "Amunicja"))){
                if(($item->itemType() == $type) && ($iteration < $item->stack_size)){
                    $stack[] = $item;
                    $iteration++;
                }
                else if(($item->itemType() == $type) && ($iteration >= $item->stack_size)){
                    $newItems[] = $stack;
                    $iteration=0;
                    $stack = [];
                    $stack[] = $item;
                }
            }
        }
        if($stack) $newItems[] = $stack;
    }
    
    foreach($items as $item){
        //dd($item);
        if(($item->category() == "Materiały") || ($item->category() == "Amunicja")){
            $newItems[] = [$item];
        }
    }
    
    
    
    return $newItems;
    
}


class Cargo extends Model
{
   
    protected $guarded = [];

    
    public function items(){
        $items = new \Illuminate\Database\Eloquent\Collection; //empty collection
        $ships = Ship::where('cargo_id', $this->id)->get();
      
        $weapons = Weapon::where('cargo_id', $this->id)->get();
        $engines = Engine::where('cargo_id', $this->id)->get();
        $armors = Armor::where('cargo_id', $this->id)->get();
        $materials = Material::where('cargo_id', $this->id)->get();


        $items = $items->concat($ships);
        $items = $items->concat($weapons);
        $items = $items->concat($engines);
        $items = $items->concat($armors);
        $items = $items->concat($materials);
        

        $items = organiseInventory($items);
        //dd($items);
        
        return($items);
    }
}
