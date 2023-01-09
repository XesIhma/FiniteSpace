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
        if(get_class($this) == "App\Models\Ammo") return "Amunicja";
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

    public function itemType(){
        if($this->category() == "Statki")           return $this->shipType;
        else if($this->category() == "Bronie")      return $this->weaponType;
        else if($this->category() == "Pancerze")    return $this->armorType;
        else if($this->category() == "Silniki")     return $this->engineType;
        else if($this->category() == "Materiały")   return $this->materialType;
        else if($this->category() == "Amunicja")    return $this->ammoType;
    }

    public function getNameAttribute(){
        return $this->itemType()->name;
    }
    public function getTypeAttribute(){
        return $this->itemType()->type;
    }
    public function getUanAttribute(){
        return $this->itemType()->UAN;
    }
    public function getDescriptionAttribute(){
        return $this->itemType()->description;
    }
    public function getImageAttribute(){
        return $this->itemType()->image;
    }
    public function getHpMaxAttribute(){
        return $this->itemType()->hp_max;
    }
    public function getDeuterMaxAttribute(){
        return $this->itemType()->deuter_max;
    }
    public function getStackSizeAttribute(){
        return $this->itemType()->stack_size;
    }

    
    public function getMassAttribute(){
        return $this->itemType()->mass;
    }
    public function getSizeAttribute(){
        return $this->itemType()->size_x."m ".$this->itemType()->size_y."m ".$this->itemType()->size_z."m ";
    }
    public function getVolumeAttribute(){
        return $this->itemType()->size_x * $this->itemType()->size_y * $this->itemType()->size_z;
    }

}
