@extends('ship')

@section('ship_image', 'img/fighter1.jpg')

@section('content_ship')

<div class="info_box">
  <label for="meter_hp"><b>Stan:</b> 2418/3000<br></label>
  <meter id="meter_hp" value="2418" max="3000"></meter><br>
  <label for="meter_fuel"><b>Paliwo:</b> 99m3/200m3<br></label>
  <meter id="meter_hp" value="99" max="200"></meter><br>
  <b>Energetyka:</b><br>
  <label for="meter_gen"><b>Generator:</b> 40%, </label><label for="meter_aku"><b>Akumulatory:</b> 90%<br></label>
  <meter id="meter_gen" value="40" max="100"></meter>  <meter id="meter_aku" value="90" max="100"></meter>
</div>
<div class="stat_box">
  <div class="stat1_box">
    <b>Parametry:</b><br>
    <span>Klasa: </span><span id="class">Lekki myśliwiec</span><br>
    <span>Masa: </span><span id="weight">13t</span><br>
    <span>Wymiary: </span><span id="dimensions">10m x 7m x 3m</span><br>
    <span>Siła ciągu: </span><span id="thrust">1100kN</span><br>
    <span>Max v2: </span><span id="speed">5km/s</span><br>
  </div>
</div>
  
@endsection