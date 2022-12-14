<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function category(){
        if(get_class($this) == "App\Models\Ship") return "Statki";
        if(get_class($this) == "App\Models\Weapon") return "Bronie";
        if(get_class($this) == "App\Models\Armor") return "Pancerze";
        if(get_class($this) == "App\Models\Engine") return "Silniki";
        if(get_class($this) == "App\Models\Material") return "Materiały";
        return "Bagno";
        
    }

    public function owner(){
        $profile = Profile::where('id', $this->profile_id)->first();
        if($profile) return $profile;
        return null;
    }

    public function getCount(){
        //TODO
        if (isset($this->count)) return $this->count;
        return 1;
    }

    public function sameLocation($other){
        //TODO
        return true;
    }

    public function offerId(){
        $offer = Offer::where([
            ['category', '=', $this->category()],
            ['item_id', '=', $this->id]])->first();
        
        if($offer) return $offer->id;
        return abort(404);
    }

    public function getMass(){
        $mass = $this->mass;
        if ($mass < 1000) return $mass."kg";
        return round($mass/1000,1,PHP_ROUND_HALF_EVEN)."t";
    }

    public function unstack($amount){
        if (isset($this->count)){
            $new = Material::create([
                'name' => $this->name,
                'image' => $this->image,
                'count' => $amount,
                'stack_size' => $this->stack_size,
                'cargo_id' => $this->cargo_id
            ]);
            $this->count = $this->count - $amount;
            $this->save();
            return $new;
        }
        return $this;
    }

}
