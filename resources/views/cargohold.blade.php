@extends('ship')

@section('ship_name', "$ship->model")
@section('ship_image', "img/$ship->image")


@section('content_ship')



  @foreach ($cargoHolds as $cargo)
  @php 
    $items = $cargo->items();
  @endphp
  <div class="cargo">
    <table class="cargo">
      <tr>
        <th colspan="5">{{$cargo->type}} <span></span></th>
      </tr>
      @for ($i = 0; $i < 3; $i++)
        <tr>
        @for ($j = 0; $j < 5; $j++)
          @if (isset($items[$i*5 + $j]))
          <td class="td_item" style="background-image: url(img/{{$items[$i*5 + $j]->image}})" title="{{$items[$i*5 + $j]->name}}" data-showid="{{$cargo->type}}{{$i*5 + $j}}"></td>
          @else
          <td></td>
          @endif
        @endfor
        </tr>
      @endfor
    </table>

    

    <div class="cargo_item">
      @foreach ($items as $item)

      <div class="position" id="{{$cargo->type}}{{$loop->iteration-1}}">
        <div class="image" style="background-image: url(img/{{$item->image}})"></div>
        <div class="info">
          <h4 class="position_name">{{$item->name}}</h4>
          <span>Typ: {{$item->type}}</span><br>
          <span>Masa: {{$item->mass}}</span><br>
          <span>Wymiary: </span><span>{{$item->size}}</span><br>
          <span>HP: </span><span>{{$item->hp_max}}</span><br>
          @if($item->resistance)
            <span>Odporność: {{$item->resistance}}</span><br>
          @endif
          @if($item->deuter_usage_max)
            <span>Pobór paliwa: <span title="Wodór">{{$item->deuter_usage_max}}</span> / <span title="Tlen">{{$item->oxygen_usage_max}}</span></span><br>
          @endif
          @if($item->power_max)
            <span>Moc: {{$item->power_max}}</span><br>
          @endif
          @if($item->thrust_max)
            <span>Moc: {{$item->thrust_max}}</span><br>
          @endif
          @if($item->damage)
            <span>Obrażenia: {{$item->damage}}</span><br>
          @endif
          @if($item->ammo_type)
            <span>Rodzaj amunicji: {{$item->ammo_type}}</span><br>
          @endif

          
          
        </div>
      </div>

      @endforeach
    </div>

    

  </div>

  @endforeach


  
@endsection