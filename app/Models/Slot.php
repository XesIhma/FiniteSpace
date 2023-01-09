<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    protected $guarded = [];

    public function slotType(){
        return $this->belongsTo(SlotType::class);
    }

    public function getTypeAttribute(){
        return $this->slotType->type;
    }
    public function item(){
        if($this->type == "engine") return $this->hasOne(Engine::class);
        else if($this->type == "weapon") return $this->hasOne(Weapon::class);
        else if($this->type == "armor") return $this->hasOne(Armor::class);
    }
}
