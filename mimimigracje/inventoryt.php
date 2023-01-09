function organiseInventory($items){
    $uans = [];
    foreach($items as $item){
      if(isset($item->UAN)){
        $uans[] = $item->UAN;
        dump($item->UAN);
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