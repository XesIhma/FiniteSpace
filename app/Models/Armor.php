<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Armor extends Item
{
    use HasFactory;

    protected $guarded = [];

    public function armorType()
    {
        return $this->belongsTo(ArmorType::class);
    }
}