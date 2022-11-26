<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bought extends Model
{
    use HasFactory;

    protected $fillable = ['profile_id', 'seller_id', 'item_id', 'category', 'name', 'image', 'is_taken', 'price'];

}
