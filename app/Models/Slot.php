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
        return $this->hasOne(Item::class);
    }
}
