<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weapon extends Item
{
    protected $guarded = [];

    public function weaponType()
    {
        return $this->belongsTo(WeaponType::class);
    }
}
