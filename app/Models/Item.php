<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function owner(){
        $profile = Profile::where('id', $this->profile_id)->first();
        if($profile) return $profile;
        return null;
    }

    public function sameLocation($other){
        
        return true;
    }
}
