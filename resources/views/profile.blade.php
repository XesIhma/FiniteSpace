@extends('app')

@section('title', "Profil")
@section('site_css', "css/style_profile.css")

@section('content')

<div id="profile" class="panel">
  <p class="bar"><b>Twoje postacie</b></p>
  <div class="content">
    <p>W tej sekcji możesz zarządzać dostępnymi postaciami.</p><br>
    <div class="panel">
      <p class="bar"><b>{{$profiles[0]->name}}</b></p>
      <div class="content, content_profile">
        <div id="avatar_1" class="avatar_box">
          <div class="avatar_img" style="background-image: url(img/{{$profiles[0]->image}})"></div>
        </div>
        <div class="info_box">
          <b>Lvl:</b> {{$profiles[0]->lvl($profiles[0]->exp)}}<br>
          <label for="meter_exp"><b>Exp:</b> {{$profiles[0]->exp}}/{{$profiles[0]->expMax()}}<br></label>
          <meter id="meter_exp" value="{{$profiles[0]->exp}}" max="{{$profiles[0]->expMax()}}"></meter><br>
          <b>UPD:</b> {{$profiles[0]->money}}<br>
        </div>
        <div class="action_box">
          <div id="action_gif"></div>
          <b>Lot międzyplanetarny</b><br>
          <b>Postęp:</b> 21%<br>
          <b>Pozostały czas:</b> 3:51:03<br>
        </div>
        <div class="stat1_box">
          <b>Podstawowe:</b><br>
          <span>Siła: </span><span id="strength">{{$profiles[0]->strength}}</span><br>
          <span>Zręczność: </span><span id="dexterity">{{$profiles[0]->agility}}</span><br>
          <span>Szybkość: </span><span id="speed">{{$profiles[0]->speed}}</span><br>
          <span>Wytrzymałość: </span><span id="endurance">{{$profiles[0]->endurance}}</span><br>
        </div>
        <div class="stat2_box">
          <b>Umiejętności:</b><br>
          <span>Mechanika: </span><span id="mechanics">{{$profiles[0]->mechanics}}</span><br>
          <span>Budownictwo: </span><span id="building">{{$profiles[0]->building}}</span><br>
          <span>Informatyka: </span><span id="it">{{$profiles[0]->informatics}}</span><br>
          <span>Nawigacja: </span><span id="navigation">{{$profiles[0]->navigation}}</span><br>
        </div>
      </div>
    </div>
  <div class="panel">
    <p class="bar"><b>Nowa postać</b></p>
    <div class="content, content_profile">
      <div id="avatar_2" class="avatar_box">
        <div class="avatar_img"></div>
      </div>
      <div class="info_box">
        <b>Dodaj postać</b><br>
        <p>Co najmniej jedna z twoich postaci ma już wymagany lvl 15. Możesz teraz dodać kolejną postać.</p>
      </div>
    </div>
  </div>
  <div class="panel">
    <p class="bar"><b>Nowa postać</b></p>
    <div class="content, content_profile">
      <div id="avatar_3" class="avatar_box">
        <div class="avatar_img"></div>
      </div>
      <div class="info_box">
        <b>Dodaj postać</b><br>
        <p>Co najmniej jedna z twoich postaci musi mieć co najmniej 25lvl i należeć do klanu, żeby dodać kolejną postać.</p>
      </div>
    </div>
  </div>
  <div class="panel">
    <p class="bar"><b>Nowa postać</b></p>
    <div class="content, content_profile">
      <div id="avatar_4" class="avatar_box">
        <div class="avatar_img"></div>
      </div>
      <div class="info_box">
        <b>Dodaj postać</b><br>
        <p>Co najmniej jedna z twoich postaci musi mieć co najmniej 35lvl, a ty musisz mieć 100PP zey dodać kolejną postać.</p>
      </div>
    </div>
  </div>
  </div>
</div>

@endsection