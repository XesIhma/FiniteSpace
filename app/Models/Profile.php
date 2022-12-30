<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{   
    
    protected $guarded = [];

    public function lvl(){
        return ceil($this->exp / 30);
    }
    public function expMax(){
        return $this->lvl()*30;
    }

    public function sameLocation($other){
        
        return true;
    }
}
