<?php

use App\Models\Profile;
use App\Models\User;

use App\Models\Weapon;
use App\Models\Armor;
use App\Models\Engine;
use App\Models\Ship;
use App\Models\Material;
use App\Models\Cargo;

use Illuminate\Database\Eloquent\Model;



if(!function_exists('getProfileName')){
  function getProfileName($id){
    $profile = Profile::where('id', $id)->first();
    return $profile->name;
  }

}

if(!function_exists('findItem')){
  function findItem($category, $itemId){
    //TODO
    switch($category){
      case "Statki": 
          $item = Ship::where('id', $itemId)->first();
          break;
      case "Bronie": 
          $item = Weapon::where('id', $itemId)->first();
          break;
      case "Pancerze": 
          $item = Armor::where('id', $itemId)->first();
          break;
      case "Silniki": 
          $item = Engine::where('id', $itemId)->first();
          break;
      case "Materiały": 
          $item = Material::where('id', $itemId)->first();
          break;
    }
    return $item;
  }

}

if(!function_exists('findUser')){
  function findUser($userId=0, $profileId=0, $userName=''){
    if($userId){
      return User::where('id', $userId)->first();
    }
    if($profileId){
      $profile = Profile::where('id', $id)->first();
      return User::where('id', $profile->user_id)->first();
    }
    if($userName){
      return User::where('name', $userName)->first();
      
    }
  }

}

if(!function_exists('currentProfile')){
  function currentProfile(){
    //TODO
    return auth()->user()->profiles()[0];
  }
}

if(!function_exists('currentShip')){
  function currentShip(){
    $profile = currentProfile();
    //TODO
    $ship = Ship::where('profile_id', $profile->id)->first();

    return $ship;
  }
}

if(!function_exists('suitableCargo')){
  function suitableCargo($item, $shipId=0){
    //TODO
    if(!$shipId) $cargoHolds = Cargo::where('ship_id', currentShip()->id)->get();
    else $cargoHolds = Cargo::where('ship_id', $shipId)->get();
    

    if ($item->category() == "Statki")
      foreach ($cargoHolds as $cargo)
        if($cargo->type == "hangar") return $cargo;
      
    if ($item->category() == "Materiały")
      foreach ($cargoHolds as $cargo)
          if($cargo->type == "bulk") return $cargo;
    
    if ($item->category() == "Fuel") //TODO
      foreach ($cargoHolds as $cargo)
          if($cargo->type == "tank") return $cargo;

          
    foreach ($cargoHolds as $cargo)
      if($cargo->type == "general") return $cargo;
      
    return abort(404);
  }
}

if(!function_exists('generateUAN')){
  function generateUAN($category){
    //TODO
    //xx-yyy-zz-aaaaa
    //xx planet yyy producent zz class aaa unique number 
    //ex. 01-004-03-00277

    $planet = "01"; //TODO
    $producent = "001"; //TODO

    switch($category){
      case "Statki": 
        $uans = Ship::select('UAN')->get();
        $class = "01";
        break;
      case "Bronie": 
        $uans = Weapon::select('UAN')->get();
        $class = "02";
        break;
      case "Silniki":
        $uans = Engine::select('UAN')->get();
        $class = "03"; 
        break;
      case "Pancerze": 
        $uans = Armor::select('UAN')->get();
        $class = "04";
        break;
    }

    

    $biggestUnique = 0;
    foreach ($uans as $uan){
      try {
        $unique = (int) explode("-", $uan)[3];
        if($unique > $biggestUnique) $biggestUnique = $unique;
      }catch (exception $e) {}
    }
    $biggestUnique++;
    $unique = str_pad($biggestUnique, 3, '0', STR_PAD_LEFT);

    return $planet.'-'.$producent.'-'.$class.'-'.$unique;
  }

}

if(!function_exists('organiseInventory')){
  function organiseInventory($items){
    $uans = [];
    foreach($items as $item){
      if(isset($item->UAN)){
        $uans[] = $item->UAN;
      }
    }
    $numbers = array_count_values($uans);
    $newItems = [];
    foreach($numbers as $uan=>$count){
      $stack = [];
      $iteration = 0;
      
      foreach($items as $key=>$item){
        //echo $item->category()."<br>";
        try{
          if(($item->UAN == $uan) && ($iteration < $item->stack_size)){
            $stack[] = $item;
            $iteration++;
          }
          else if(($item->UAN == $uan) && ($iteration >= $item->stack_size)){
            $newItems[] = $stack;
            $iteration=0;
            $stack = [];
            $stack[] = $item;
          }
        }catch (exception $e) {}
      }
      $newItems[] = $stack;
      
    }

    //Add materials
    foreach($items as $item){
      if($item->category() == "Materiały"){
        $newItems[] = [$item];
      }
    }

    //$items = array_values($items);
    return $newItems;
    
  }
}

if(!function_exists('getCount')){
  function getCount($stack){
    //TODO amunition
    if ($stack[0]->category()=="Materiały"){
      return $stack[0]->count;
    }
    return count($stack);
  }
}
