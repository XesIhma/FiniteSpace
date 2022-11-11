@extends('app')

@section('title', "Strona Główna")
@section('site_css', "css/style_clan.css")

@section('content')

      <div class="panel">
        <p class="bar"><b>Klan {{$clan->name}}</b></p>
        <div class="content"><p>{{$clan->inner_text}}</p></div>
      </div>
      <div class="column">
        <div class="panel">
          <p class="bar"><b>Stacja kosmiczna</b></p>
          <div class="content clan_image" style="background-image: url(img/{{$clan->spaceStationImage()}})"></div>
        </div>
      </div>
      <div class="column">
        <div class="panel">
          <p class="bar"><b>Siedziba</b></p>
          <div class="content clan_image" style="background-image: url(img/capitol.jpg)"></div>
        </div>
      </div>
      <div class="column">
        <div class="panel">
          <p class="bar"><b>Informacje</b></p>
          <div class="content">
            <table>
              <tr>
                <th>Nazwa: </td>
                <th><b>{{$clan->name}} [ {{$clan->tag}} ]</b></td>
              </tr>
              <tr>
                <td>Założyciel: </td>
                <td><b>{{$clan->founder()}}</b></td>
              </tr>
              <tr>
                <td>Kapitał: </td>
                <td><b>{{$clan->money}}</b></td>
              </tr>
              <tr>
                <td>Członkowie: </td>
                <td><b>{{$clan->numberOfMembers()}} / {{$clan->members_limit}}</b></td>
              </tr>
              <tr>
                <td>Punkty: </td>
                <td><b>1.023</b></td>
              </tr>
              <tr>
                <td>Twoja ranga: </td>
                <td><b>Kadet</b></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="column">
        <div class="panel">
          <p class="bar"><b>Siedziba</b></p>
          <div class="content clan_image" style="background-image: url(img/capitol.jpg)"></div>
        </div>
      </div>
      

@endsection