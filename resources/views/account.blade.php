@extends('app')

@section('title', "Profil")
@section('site_css', "css/style_profile.css")

@section('content')

<div id="account" class="panel">
  <p class="bar"><b>Twoje konto</b></p>
  <div class="content">
    <p>W tej sekcji możesz edytować swoje konto</p><br>
    <div class="panel">
        <p class="bar"><b>Opis</b></p>
        <div class="content">

          <form action="{{URL::current()}}" method="post">
            <!--{{method_field('PUT')}}-->
            @csrf
            <textarea id="decription" name="description" rows="4" cols="50">Twój nowy opis</textarea><br>
            <input type="submit" value="Zatwierdź">
          </form>
          @if(session('description'))
            <div class="alert_box">Description has been changed</div>
          @endif
        </div>
      </div>
  </div>
</div>

@endsection