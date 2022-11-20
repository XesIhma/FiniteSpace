@extends('ship')

@section('ship_name', "$ship->model")
@section('ship_image', "img/$ship->image")


@section('content_ship')
<div class="ship_image" style="background-image: url(@yield('ship_image'));">
</div>
<div class="info_box">
  <label for="meter_hp"><b>Stan:</b> {{$ship->hp}}/{{$ship->hp_max}}<br></label>
  <meter id="meter_hp" value="{{$ship->hp}}" max="{{$ship->hp_max}}"></meter><br>
  <label for="meter_fuel"><b>Paliwo:</b> {{$ship->deuter}}m3/{{$ship->deuter_max}}m3<br></label>
  <meter id="meter_hp" value="{{$ship->deuter}}" max="{{$ship->deuter_max}}"></meter><br>
  <b>Energetyka:</b><br>
  <label for="meter_gen"><b>Generator:</b> 40%, </label><label for="meter_aku"><b>Akumulatory:</b> 90%<br></label>
  <meter id="meter_gen" value="40" max="100"></meter>  <meter id="meter_aku" value="90" max="100"></meter>
</div>
<div class="stat_box">
  <div class="stat1_box">
    <b>Parametry:</b><br>
    <span>Klasa: </span><span id="class">{{$ship->class}}</span><br>
    <span>Masa: </span><span id="weight">{{$ship->mass/1000}}t</span><br>
    <span>Wymiary: </span><span id="dimensions">{{$ship->size}}</span><br>
    <span>Siła ciągu: </span><span id="thrust">1100kN</span><br>
    <span>Max v2: </span><span id="speed">5km/s</span><br>
  </div>
</div>
  
@endsection