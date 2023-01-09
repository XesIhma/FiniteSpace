<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ship extends Item
{
    protected $guarded = [];

    public function shipType(){
        return $this->belongsTo(ShipType::class);
    }

    public function cargos(){
        return $this->hasMany(Cargo::class);
    }

    public function slots(){
        return $this->hasMany(Slot::class);
    }

    public function engineSlots(){
        $engines = [];
        foreach($this->slots as $slot){
            if($slot->type == "engine") $engines[] = $slot;
        } 
        return $engines;
    }

    public function weaponSlots(){
        $weapons = [];
        foreach($this->slots as $slot){
            if($slot->type == "weapon") $weapons[] = $slot;
        } 
        return $weapons;
    }

    public function armorSlots(){
        $armors = [];
        foreach($this->slots as $slot){
            if($slot->type == "armor") $armors[] = $slot;
        } 
        return $armors;
    }

   


}
