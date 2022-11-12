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
                <th>{{$application->user()->name}}</td>
                <th>{{$application->application}}</td>
                <th><a href="accept?user_id={{$application->user()->id}}&positive=1" style="background-color: green">Tak</a></td>
                <th><a href="accept?user_id={{$application->user()->id}}&positive=1" style="background-color: red">Nie</a></td>
              </tr>
              @endforeach
            </table>
          </div>
        </div>

        
      

@endsection