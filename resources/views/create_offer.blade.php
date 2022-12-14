@extends('app')

@section('title', "Zakupy")
@section('site_css', "css/style_shopping.css")

@section('content')


<div class="column">
  <div id="create_offer" class="panel">
    <p class="bar"><b>Dodaj swoją ofertę</b></p>
    <div class="content">
      <form action="create_offer" method="post">
        @csrf
        Przedmiot: <select name="item" id="offer">
          @foreach($items as $item)
            <option class="item_option" value="{{$item[0]->category()}}::{{$item[0]->id}}" data-showid="{{$item[0]->category()}}{{$item[0]->id}}">{{$item[0]->name}}</option>
          @endforeach
        </select><br><br>
        Cena: <input type="text" name="price"> (za sztukę)<br><br>
        Ilość: <input type="text" name="count" value="1">
        @foreach($items as $item)
          <span class="span_count" id="{{$item[0]->category()}}{{$item[0]->id}}" style="display:none">(Max: {{getCount($item)}})</span>
        @endforeach<br><br>
        Czas: <select name="time">
          <option value="3">3 godziny</option>
          <option value="6">6 godzin</option>
          <option value="12">12 godzin</option>
          <option value="24" selected="selected">24 godziny</option>
          <option value="48">2 dni</option>
          <option value="168">7 dni</option>
        </select><br><br>
        <input type="submit" value="Dodaj"><br><br>
      </form>

      <div class="item_info">
        @foreach($items as $item)
          <div class="item" id="{{$item[0]->category()}}{{$item[0]->id}}">
            <div class="image" style="background-image: url(img/{{$item[0]->image}})"></div>
            <div class="info">
              <p><b>{{$item[0]->name}}</b></p>
              <p>Ostatnia cena: {{$item[0]->last_price}}</p>
            </div>
          </div>
        @endforeach
      </div>
      
    </div>   
  </div>
</div>

<div class="column">
  <div id="shopping" class="panel">
    <p class="bar"><b>Twoje oferty</b></p>
    <div class="content">
    @if(!$offers->first())
      <p>Nic w tym momencie nie wystawiasz</p>
    @else
    <br>
    <div class="item_info">
      @foreach ($offers as $offer)
          @php 
            $item = findItem($offer->category, $offer->item_id)
          @endphp
          <div class="item" style="display: block">
            <div class="image" style="background-image: url(img/{{$item->image}})"></div>
            <div class="info">
              <p><b>{{$item->name}}</b></p>
              <p>Twoja cena: {{$offer->price}}</p>
              <p>Ilość: {{$offer->count}}</p>
              <p>Wygasa: {{$offer->expires_at}}</p>
              <a href="delete_offer?offer_id={{$offer->id}}">Usuń ofertę</a>
            </div>
          </div>
      @endforeach
    </div>
    @endif

    </div>
  </div>
</div>






@endsection