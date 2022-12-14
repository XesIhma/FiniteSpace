@extends('ship')

@section('ship_name', "$ship->name")


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
          {{-- TODO --}}
          <td class="td_item" style="background-image: url(img/{{$items[$i*5 + $j][0]->image}})" title="{{$items[$i*5 + $j][0]->name}}" data-showid="{{$cargo->type}}{{$i*5 + $j}}">
            @if(getCount($items[$i*5 + $j]) > 1)
              <div class="item_count">
                {{getCount($items[$i*5 + $j])}}
              </div>
            @endif
          </td>
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
        <div class="image" style="background-image: url(img/{{$item[0]->image}})"></div>
        <div class="info">
          <h4 class="position_name">{{$item[0]->name}}</h4>
          <span>Typ: {{$item[0]->type}}</span><br>
          <span>Masa: {{$item[0]->mass}}</span><br>
          <span>Wymiary: </span><span>{{$item[0]->size}}</span><br>
          <span>HP: </span><span>{{$item[0]->hp_max}}</span><br>
          @if($item[0]->resistance)
            <span>Odporność: {{$item[0]->resistance}}</span><br>
          @endif
          @if($item[0]->deuter_usage_max)
            <span>Pobór paliwa: <span title="Wodór">{{$item[0]->deuter_usage_max}}</span> / <span title="Tlen">{{$item[0]->oxygen_usage_max}}</span></span><br>
          @endif
          @if($item[0]->power_max)
            <span>Moc: {{$item[0]->power_max}}</span><br>
          @endif
          @if($item[0]->thrust_max)
            <span>Moc: {{$item[0]->thrust_max}}</span><br>
          @endif
          @if($item[0]->damage)
            <span>Obrażenia: {{$item[0]->damage}}</span><br>
          @endif
          @if($item[0]->ammo_type)
            <span>Rodzaj amunicji: {{$item[0]->ammo_type}}</span><br>
          @endif

          
          
        </div>
      </div>

      @endforeach
    </div>

    

  </div>

  @endforeach


  
@endsection