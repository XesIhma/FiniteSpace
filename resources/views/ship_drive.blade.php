@extends('ship')

@section('ship_name', "$ship->name")

@section('content_ship')
<div class="eq_box">
  @foreach($slots as $slot)
    @if(isset($slot->item))
    @php $engine = $slot->item @endphp
    <div class="eq_item">
      <div class="eq_img" style="background-image: url(img/{{$engine->image}})">
        <div class="meter">
          <div class="meter_value" style="width: {{($engine->hp/$engine->hp_max)*100}}%"></div>
        </div>
      </div>
      <div class="eq_stats">
        <div>
          <b>{{$engine->name}}</b><br>
          <span>Siła ciągu: {{$engine->thrust_max}}kN</span><br>
          <span>Kons. paliwa: {{$engine->deuter_usage_max}}l/s</span>
        </div>
        <div>
          <span>Stan: 
            {{$engine->hp}}
            /
            {{$engine->hp_max}}

            
          
          </span><br>
          <span>Pobór mocy: {{$engine->power_max}}W/s</span><br>
          <span>Masa: {{$engine->getMass()}}</span>
        </div>
      </div>
    </div>
    @endif
  @endforeach
  
</div>
        
@endsection