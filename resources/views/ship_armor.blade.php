@extends('ship')

@section('ship_name', "$ship->name")

@section('content_ship')
<div class="eq_box">
  @foreach($slots as $slot)
    @if(isset($slot->item))
    @php $armor = $slot->item @endphp
      
      <div class="eq_item">
        @if(isset($armor))
        <div class="eq_img" style="background-image: url(img/{{$armor->image}})">
          <div class="meter">
            <div class="meter_value" style="width: {{($armor->hp/$armor->hp_max)*100}}%"></div>
          </div>
        </div>
        <div class="eq_stats">
          <div>
            <b>{{$armor->name}}</b><br>
            <span>Odporność: {{$armor->resistance}}</span><br>
          </div>
          <div>
            <span>Stan: {{$armor->hp}}/{{$armor->hp_max}}</span><br>
            <span>Masa: {{$armor->getMass()}}</span>
          </div>
        </div>
        @endif
      </div>
    @endif
  @endforeach
  
</div>
        
@endsection