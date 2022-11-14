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
                <td><b>{{auth()->user()->rank()->name}}</b></td>
              </tr>
            </table>
          </div>
        </div>

        <div class="panel">
          <p class="bar"><b>Forum</b></p>
          <div class="content">
            <table>
              <tr>
                <td colspan="4">Najnowsze wątki na forum</td>
              </tr>
              <tr>
                <th>Temat</td>
                <th>Forum</td>
                <th>Autor</td>
                <th>Odpowiedzi</td>
              </tr>
              <tr>
                <td>Ostatni atak na hrabiego</td>
                <td>Atak</td>
                <td>kasgt500</td>
                <td>2</td>
              </tr>
              <tr>
                <td>Ma ktoś sprzedać laser beam v1?</td>
                <td>Handel</td>
                <td>kasgt500</td>
                <td>7</td>
              </tr>
              <tr>
                <td>Ważne ogłoszenie</td>
                <td>Ogólne</td>
                <td>XesIhma</td>
                <td>0</td>
              </tr>
            </table>
            <p><a href="#">Przejdź do forum</a></p>
          </div>
        </div>

        <div class="panel">
          <p class="bar"><b>Dziennik</b></p>
          <div class="content">
            <table>
              <tr>
                <th>Czas</td>
                <th>Wydarzenie</td>
              </tr>
              <tr>
                <td>11.11 10:30</td>
                <td>XesIhma zmienił prawa kasgt500</td>
              </tr>
              <tr>
                <td>11.11 8:11</td>
                <td>Ukończono rozbudowę <b>Hangar</b></td>
              </tr>
              <tr>
                <td>10.11 15:42</td>
                <td>XesIhma przyjął do klanu kasgt500</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      
      <div class="column">
        <div class="panel">
          <p class="bar"><b>Stacja kosmiczna</b></p>
          <div class="content clan_image" style="background-image: url(img/{{$clan->spaceStationImage()}})"></div>
        </div>
        <div class="panel">
          <p class="bar"><b>Siedziba</b></p>
          <div class="content clan_image" style="background-image: url(img/capitol.jpg)"></div>
        </div>
        
        @if(auth()->user()->rank()->send_invitations)
        <div class="panel">
          <p class="bar"><b>Rekrutacja</b></p>
          <div class="content"><p><a href="hr">Przejdź do rekrutacji</a></p></div>
        </div>
        @endif
      </div>
      

@endsection