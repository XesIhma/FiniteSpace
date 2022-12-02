@extends('ship')

@section('ship_name', "$ship->name")

@section('content_ship')
<div class="ship_image" style="background-image: url('ship_image');">
</div>
<div class="eq_box">
  <div class="eq_item">
    <div class="eq_img" style="background-image: url(img/engine1.jpg)">
      <div class="meter">
        <div class="meter_value" style="width: 92%"></div>
      </div>
    </div>
    <div class="eq_stats">
      <div>
        <b>SIlnik rakietowy</b><br>
        <span>Siła ciągu: 550kN</span><br>
        <span>Kons. paliwa: 100l/s</span>
      </div>
      <div>
        <span>Stan: 110/120</span><br>
        <span>Pobór mocy: 300W/s</span><br>
        <span>Masa: 0.6t</span>
      </div>
    </div>
  </div>
  <div class="eq_item">
    <div class="eq_img" style="background-image: url(img/engine1.jpg)">
      <div class="meter">
        <div class="meter_value" style="width: 83%"></div>
      </div>
    </div>
    <div class="eq_stats">
      <div>
        <b>SIlnik rakietowy</b><br>
        <span>Siła ciągu: 550kN</span><br>
        <span>Kons. paliwa: 100l/s</span>
      </div>
      <div>
        <span>Stan: 100/120</span><br>
        <span>Pobór mocy: 300W/s</span><br>
        <span>Masa: 0.6t</span>
      </div>
    </div>
  </div>
  <div class="eq_item">
    <div class="eq_img" style="background-image: url(img/tank1.jpg)">
      <div class="meter">
        <div class="meter_value" style="width: 100%"></div>
      </div>
    </div>
    <div class="eq_stats">
      <div>
        <b>Zbiornik wodoru</b><br>
        <span>Pojemność: 100m3</span><br>
      </div>
      <div>
        <span>Stan: 200/200</span><br>
        <span>Masa: 2t</span>
      </div>
    </div>
  </div>
  <div class="eq_item">
    <div class="eq_img" style="background-image: url(img/tank2.jpg)">
      <div class="meter">
        <div class="meter_value" style="width: 100%"></div>
      </div>
    </div>
    <div class="eq_stats">
      <div>
        <b>Zbiornik tlenu</b><br>
        <span>Pojemność: 100m3</span><br>
      </div>
      <div>
        <span>Stan: 200/200</span><br>
        <span>Masa: 2t</span>
      </div>
    </div>
  </div>
  <div class="eq_item">
    <div class="eq_img" style="background-image: url(img/rcs_thruster.png)">
      <div class="meter">
        <div class="meter_value" style="width: 83%"></div>
      </div>
    </div>
    <div class="eq_stats">
      <div>
        <b>Silniczki sterujące</b><br>
        <span>Siła ciągu: 440N</span><br>
      </div>
      <div>
        <span>Stan: 5/6</span><br>
        <span>Masa: 0.2t</span>
      </div>
    </div>
  </div>
</div>
        
@endsection