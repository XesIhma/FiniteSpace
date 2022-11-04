<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{   
    
    use HasFactory;
    protected $fillable = ['name', 'image', 'user_id'];

    public function lvl(){
        return ceil($this->exp / 30);
    }
    public function expMax(){
        return $this->lvl()*30;
    }
}
