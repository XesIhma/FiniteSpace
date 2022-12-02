<?php

use App\Models\Profile;

use App\Models\Weapon;
use App\Models\Armor;
use App\Models\Engine;
use App\Models\Ship;


if(!function_exists('getProfileName')){
  function getProfileName($id){
    $profile = Profile::where('id', $id)->first();
    return $profile->name;
  }
}

if(!function_exists('findItem')){

  function findItem($category, $item_id){
    switch($category){
      case "Statki": 
          $item = Ship::where('id', $item_id)->first();
          break;
      case "Bronie": 
          $item = Weapon::where('id', $item_id)->first();
          break;
      case "Pancerze": 
          $item = Armor::where('id', $item_id)->first();
          break;
      case "Silniki": 
          $item = Engine::where('id', $item_id)->first();
          break;
    }
    return $item;
  }

}
