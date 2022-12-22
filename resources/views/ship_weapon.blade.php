@extends('ship')

@section('ship_name', "$ship->name")

@section('content_ship')
<div class="eq_box">
  @foreach($weapons as $weapon)
  @if(isset($weapon))
  <div class="eq_item">
    <div class="eq_img" style="background-image: url(img/{{$weapon->image}})">
      <div class="meter">
        <div class="meter_value" style="width: {{($weapon->hp/$weapon->hp_max)*100}}%"></div>
      </div>
    </div>
    <div class="eq_stats">
      <div>
        <b>{{$weapon->name}}</b><br>
        <span>Obrażenia: {{$weapon->damage}}</span><br>
      </div>
      <div>
        <span>Stan: 
          {{$weapon->hp}}/{{$weapon->hp_max}}
        </span><br>
        <span>Pobór mocy: {{$weapon->power_max}}W/s</span><br>
        <span>Masa: {{$weapon->getMass()}}</span>
      </div>
    </div>
  </div>
  @endif
  @endforeach
  
</div>
        
@endsection