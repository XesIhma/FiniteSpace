@extends('app')

@section('title', "Strona Główna")
@section('site_css', "css/home.css")

@section('content')

      <div id="welcome" class="panel">
        <p class="bar"><b>Witaj XesIhma</b></p>
        <div class="content"><p>Witaj Xesihma! Udało Ci się skutecznie zalogować. Poniżej możesz przejrzeć aktualności odnośnie konta, statków, klanu itd. Życzymy Ci miłej gry. </p></div>
      </div>
      <div class="column">
        <div id="space_ship" class="panel">
          <p class="bar"><b>Statek kosmiczny</b></p>
          <div class="content"><p>Obecnie nie posiadasz statku kosmicznego. Udaj się do zakładki Zakupy aby zdobyć jeden. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam incidunt facilis sed accusamus? Hic iusto beatae, perspiciatis illum. Hic iusto libero tempora, ut laborum ad laudantium aperiam dolores tempore, soluta.</p></div>
        </div>
        <div id="vehicle" class="panel">
          <p class="bar"><b>Pojazd</b></p>
          <div class="content"><p>Obecnie nie posiadasz pojazdu. Udaj się do zakładki zakupy aby Zdobyć jeden.</p></div>
        </div>
      </div>
      <div class="column">
        <div id="clan" class="panel">
          <p class="bar"><b>Klan</b></p>
          <div class="content"><p>Obecnie nie należysz do żadnego klanu. Udaj się do zakładki klan aby odlaleźć jakiś lub założyć swój.</p></div>
        </div>
        <div id="stats" class="panel">
          <p class="bar"><b>Statystyki</b></p>
          <div class="content"><p>Twoje statystyki: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia suscipit corporis, voluptas quod reiciendis accusantium laborum doloribus, neque porro, placeat totam facere ut, dolorem tempora doloremque perferendis eius officia. Maiores. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis quam nisi natus eum eligendi. Quos doloremque, quaerat recusandae nulla eum quisquam ducimus deserunt pariatur, at ipsam itaque, excepturi assumenda possimus.</p></div>
        </div>
      </div>

@endsection