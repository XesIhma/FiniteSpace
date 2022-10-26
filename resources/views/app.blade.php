<!DOCTYPE html >
<html lang="pl">
<head>
  <title>@yield('title')</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/style_app.css">
  <link rel="stylesheet" href=@yield('site_css')>
  <link rel="Shortcut icon" href="img/favicon.ico" />
  <link href="https://fonts.googleapis.com/css?family=Poppins:100, 200,300,400,500,600,700&amp;subset=latin-ext" rel="stylesheet">
  
  <script src="js/jquery.js"></script>
  <script src="js/script.js"></script>
</head>
<body>
<div id="wrapper">
  <header>
    <div id="avatar_box">
      <div id="avatar_img"></div>
    </div>
    <div id="info_box">
      <b>Adeus</b><br>
      <b>Lvl:</b> 31<br>
      <b>Exp:</b> 1023/1500<br>
      <b>UPD:</b> 13003<br>
    </div>
    <div id="action_box">
      <div id="action_gif"></div>
      <b>Lot międzyplanetarny</b><br>
      <b>Postęp:</b> 21%<br>
      <b>Pozostały czas:</b> 3:51:03<br>
    </div>
    <div id="player_box">
      <b>Gracz:</b> {{session('login')}}<br>
      <b>Klan:</b> Incredible<br>
      <b>Dni w grze:</b> 116<br>
      <b>PP:</b>58<br>
    </div>
  </header>
  <div id="main">
    <div id="nav_left" class="nav_box">
      <nav>
        <ul>
          <a href="profile"><li>Postać</li></a>
          <a href="ship"><li>Statek</li></a>
          <a href="nopage"><li>Pojazd</li></a>
          <a href="shopping"><li>Zakupy</li></a>
          <a href="nopage"><li>Planeta</li></a>
          <a href="nopage"><li>Układ</li></a>
          <a href="nopage"><li>Klan</li></a>
          <a href="nopage"><li>Praca</li></a>
          <a href="nopage"><li>Walka</li></a>
          <a href="nopage"><li>Eventy</li></a>
          <a href="nopage"><li>Firma</li></a>
        </ul>
      </nav>
    </div>
    <div id="nav_right" class="nav_box">
      <nav>
        <ul>
          <a href="account"><li>Konto</li></a>
          <a href="nopage"><li>Ustawienia</li></a>
          <a href="nopage"><li>Pomoc</li></a>
          <a href="nopage"><li>Premium</li></a>
          <a href="/" style="background-image: url(img/logout_background.png)"><li>Wyloguj</li></a>
        </ul>
      </nav>
    </div>
    <main>

      @yield('content')

    </main>
  </div>
  <footer>
    
  </footer>
</div>
@if ($message = Session::get('nopage'))
  <div class="alert_box">{{$message}}</div>
@endif
</body>
</html>