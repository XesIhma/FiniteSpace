<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;

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
        return($items);
    }
}
