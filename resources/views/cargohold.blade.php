@extends('ship')

@section('ship_name', "$ship->model")
@section('ship_image', "img/$ship->image")


@section('content_ship')

<div class="cargo" style="border: 1px solid white">

  
  @foreach ($cargoHolds as $cargo)
  @php 
    $items = $cargo->items();
  @endphp
  <table class="cargo">
    @for ($i = 0; $i < 3; $i++)
      <tr>
      @for ($j = 0; $j < 5; $j++)
        @if (isset($items[$i*5 + $j]))
        <td style="background-image: url(img/{{$items[$i*5 + $j]->image}})" title="{{$items[$i*5 + $j]->model}}"></td>
        @else
        <td></td>
        @endif
      @endfor
      </tr>
    @endfor
  </table>
  @endforeach
</div>
  
@endsection