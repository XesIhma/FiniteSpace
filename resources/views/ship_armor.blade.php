@extends('ship')

@section('ship_name', "$ship->name")

@section('content_ship')
<div class="eq_box">
  @for ($i = 0; $i < $ship->armor_slots; $i++)
    
    <div class="eq_item">
      @if(isset($armors[$i]))
      <div class="eq_img" style="background-image: url(img/{{$armors[$i]->image}})">
        <div class="meter">
          <div class="meter_value" style="width: {{($armors[$i]->hp/$armors[$i]->hp_max)*100}}%"></div>
        </div>
      </div>
      <div class="eq_stats">
        <div>
          <b>{{$armors[$i]->name}}</b><br>
          <span>Odporność: {{$armors[$i]->resistance}}</span><br>
        </div>
        <div>
          <span>Stan: {{$armors[$i]->hp}}/{{$armors[$i]->hp_max}}</span><br>
          <span>Masa: {{$armors[$i]->getMass()}}</span>
        </div>
      </div>
      @endif
    </div>
    
  @endfor
  
</div>
        
@endsection