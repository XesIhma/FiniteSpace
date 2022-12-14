@extends('ship')

@section('ship_name', "$ship->name")

@section('content_ship')
<div class="ship_image" style="background-image: url('ship_image');">
</div>
<div class="eq_box">
  @foreach($engines as $engine)

  <div class="eq_item">
    <div class="eq_img" style="background-image: url(img/{{$engine->image}})">
      <div class="meter">
        <div class="meter_value" style="width: 92%"></div>
      </div>
    </div>
    <div class="eq_stats">
      <div>
        <b>Silnik rakietowy</b><br>
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

  @endforeach
  
</div>
        
@endsection