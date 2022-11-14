@extends('app')

@section('title', "Strona Główna")
@section('site_css', "css/style_clan.css")

@section('content')

      
      <div class="column">
        <div class="panel">
          <p class="bar"><b>Zgłoszenia</b></p>
          <div class="content">
            <table>
              <tr>
                <th>Nick</td>
                <th>Treść</td>
                <th colspan="2">Zaakceptuj</td>
              </tr>
              @foreach($applications as $application)
              <tr>
                <td>{{$application->user()->name}}</td>
                <td>{{$application->application}}</td>
                <td><a href="accept?user_id={{$application->user()->id}}&positive=1" style="background-color: green">Tak</a></td>
                <td><a href="accept?user_id={{$application->user()->id}}&positive=0" style="background-color: red">Nie</a></td>
              </tr>
              @endforeach
            </table>
          </div>
        </div>
        <div class="panel">
          <p class="bar"><b>Forma dołączenia</b></p>
          <div class="content">
            <form action="change_way_of_joining">
              <input type="radio" name="option" value="0" @if($clan->apply == 0) checked="checked" @endif> Brak możliwości dołączenia<br>
              <input type="radio" name="option" value="1" @if($clan->apply == 1) checked="checked" @endif> Wysyłanie zgłoszenia<br>
              <input type="radio" name="option" value="2" @if($clan->apply == 2) checked="checked" @endif> Dołączenie w każdej chwili<br><br>
              <input type="submit" value="Zapisz ustawienias">
            </form>
          </div>
        </div>
        <div class="panel">
          <p class="bar"><b>Zaproś gracza</b></p>
          <div class="content">
            <br>
            <form action="invite">
              <input type="text" name="login"><br><br>
              <input type="submit" value="Zaproś">
            </orm>
          </div>
        </div>
      </div>
      <div class="column">
        <div class="panel">
          <p class="bar"><b>Członkowie</b></p>
          <div class="content">
            <table>
              <tr>
                <th>L.p.</th>
                <th>Login</th>
                <th>Ranga</th>
              </tr>
              @php 
                $i=0
              @endphp
              @foreach ($members as $member)
              <tr>
                <td>{{++$i}}</td>
                <td>{{$member->name}}</td>
                <td>{{$member->rank()->name}}</th>
              </tr>
              
              @endforeach
            </table>
          </div>
        </div>
      </div>
      

@endsection