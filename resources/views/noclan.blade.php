@extends('app')

@section('title', "Klan")
@section('site_css', "css/style_clan.css")

@section('content')

      <div class="panel">
        <p class="bar"><b>Klan</b></p>
        <div class="content">
          <p>Klan to wspólnota złożona z graczy chących wspólnie osiągnąć swój cel, czy to militarny czy ekonomiczny. Przejrzyj poniżą listę, a może znajdziesz taki, do którego mógłbyś dołączyć.</p>
        </div>
      </div>
      <div class="column">
        <div class="panel">
          <p class="bar"><b>Stwórz własny klan</b></p>
          <div class="content">
            <p>Nie możesz znaleźć dla siebie odpowiedniego klanu? Nic nie stoi na przeszkodzie abyś założył swój. </p>
            <p>Pamiętaj, że ta czynność kosztuje <b>50PP</b>!</p><br>
            <form action="create_clan" method="post">
              @csrf
              <label for="name">Nazwa klanu:</label><br>
              <input type="text" id="name" name="name" value="{{old("name")}}"><br>

              <label for="name">Tag klanu:</label><br>
              <input type="text" id="tag" name="tag" value="{{old("tag")}}"><br><br>
              
              <input type="submit" value="Stwórz klan">

            </form> 
          </div>
        </div>
        <div class="panel">
          <p class="bar"><b>Twoje zaproszenia</b></p>
          <div class="content">
            <table>
              <tr>
                <th colspan="3">Klan</th>
              </tr>
              @foreach ($invitations as $invitation)
              <tr>
                <td>{{$invitation->clan_name()}}</td>
                <td><a href="accept_invitation?clan_id={{$invitation->clan_id}}&positive=1" style="background-color: green">Tak</a></td>
                <td><a href="accept_invitation?clan_id={{$invitation->clan_id}}&positive=0" style="background-color: red">Nie</a></td>
              </tr>
              </tr>
              @endforeach
            </table> 

          </div>
        </div>
      </div>

      <div class="column">
        <div class="panel">
          <p class="bar"><b>Dołącz do klanu</b></p>
          <div class="content">
            <p>Oto lista klanów. Spróbuj zaaplikować do jednego z nich.</p>

            <table>
              <tr>
                <th>Nazwa</th>
                <th>Tag</th>
                <th>Liczba członków</th>
                <th></th>
              </tr>
              @foreach ($clans as $clan)
                <tr>
                  <td>{{$clan->name}}</td>
                  <td>{{$clan->tag}}</td>
                  <td>{{$clan->numberOfMembers()}} / {{$clan->members_limit}}</td>
                  <td class="apply">
                  
                    @if ($clan->apply === 2)
                        <a href="apply?clan_id={{$clan->id}}">DOŁĄCZ</a>
                    @elseif ($clan->apply === 1)
                      <a href="apply?clan_id={{$clan->id}}">APLIKUJ</a>
                    @elseif ($clan->apply === 4)
                    <span style="color:grey">Wysłałeś zgłoszenie</span>
                    @else
                      <span style="color:grey">DOŁĄCZ</span>
                    @endif
                  
                  </td>
                </tr>
              @endforeach
            </table>

        
          </div>
        </div>
      </div>
      

@endsection