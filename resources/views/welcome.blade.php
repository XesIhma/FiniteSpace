<!DOCTYPE html>
<html>
<head>
  <title>FiniteSpace - Online Game</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/style_welcome.css">
  <link rel="Shortcut icon" href="img/favicon.ico" />
  <link href="https://fonts.googleapis.com/css?family=Poppins:100, 200,300,400,500,600,700&amp;subset=latin-ext" rel="stylesheet">
  
  <script src="js/jquery.js"></script>
  <script src="js/script.js"></script>
</head>
<body>

<div id="wrapper">
  <header>
    <div id="logo"></div>
    <div id="login_box">
      <form action="/login" method="post">
        @csrf
        <div class="box">
          <label for="login">Login:</label><br>
          <input type="text" id="name" name="name" value='{{old("name")}}'><br>
          <span class="error">@error('login'){{$message}}@enderror</span>
        </div>
        <div class="box">
          <label for="password">Hasło:</label><br>
          <input type="password" id="password" name="password" value=''><br>
          <span class="error">@error('password'){{$message}}@enderror</span>
        </div>
        <div class="box" style="flex-grow: 1">
          <br><input type="submit" value="Zaloguj">
        </div>
      </form>
    </div>
  </header>
  <div id="main">
   <section id="main_section">
      <div id="promotion_box" class="box">
        <div id="promotion">
          <h2>Gra FiniteSpace</h2>
          <p>FiniteSpace to gra online w której wcielasz się w rolę kolonizatora w obcym układzie planetarnym. Czeka cię wiele możliwości rozwoju, możesz obrać ścieżkę pilota, żołnierza, górnika i wiele innych, wszystko w twoich rękach.</p>
          <p>FiniteSpace jest grą hard sci-fi, w której rozgrywka odbywa sięw kontekscie praw fizyki. Gracze tworzą i sprzedają praktycznie kazde dobro dostępne na rynku.</p>
        </div>
      </div>

      <div id="register_box" class="box">
        <form action="/register" method="post">
          @csrf
          <label for="login">Login:</label><br>
          <input type="text" id="name" name="name" value="{{old("login")}}"><br>
          <label for="email">E-mail:</label><br>
          <input type="text" id="email" name="email" value="{{old("email")}}"><br>
          <label for="password">Hasło:</label><br>
          <input type="password" id="password" name="password" value=""><br>
          <label for="password_1">Powtóz hasło:</label><br>
          <input type="password" id="password_1" name="password_1" value=""><br><br>
          <input type="submit" value="Zarejestruj">
        </form>
      </div>
    </section>
    <section id="gallery_section">
      <div id="gallery_box">
        
      </div>
    </section>
  </div>
  <footer>
    
  </footer>
</div>
@if ($message = Session::get('success'))
  <div class="alert_box">{{$message}}</div>
@endif
@if ($message = Session::get('error'))
  <div class="alert_box red">{{$message}}</div>
@endif
</body>
</html>