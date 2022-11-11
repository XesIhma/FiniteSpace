@extends('app')

@section('title', "Dołącz do klanu")
@section('site_css', "css/style_clan.css")

@section('content')

      <div class="panel">
        <p class="bar"><b>Klan {{$clan->name}}</b></p>
        <div class="content">
          <p>{{$clan->outer_text}}</p>
        </div>
      </div>
     

        <div class="panel">
          <p class="bar"><b>Wypełnij formularz</b></p>
          <div class="content">
            <p>Powiedz coś o sobie, przekonaj nas abyśmy Cię przyjęli.</p>
            <form action="apply" method="POST">
              @csrf
              <textarea name="application" id="" cols="80" rows="10">Los przeznaczył nas dla siebie. Chciałbym wstąpić w Wasze szeregi i walczyć pod Waszym sztandarem.</textarea>
              <input type="hidden" name="clan_id" value="{{$clan->id}}">
              <input type="submit" value="Zgłoś się">
            </form>

            

          </div>
        </div>
      
      

@endsection