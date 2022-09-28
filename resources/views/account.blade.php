@extends('app')

@section('title', "Profil")
@section('site_css', "css/style_profile.css")

@section('content')

<div id="account" class="panel">
  <p class="bar"><b>Twoje konto</b></p>
  <div class="content">
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
  </div>
</div>

@endsection