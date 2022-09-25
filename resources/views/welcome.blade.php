<!DOCTYPE html>
<html>
<head>
  <title>Endurange - Online Game</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/style_welcome.css">
  <link rel="Shortcut icon" href="img/favicon.png" />
  <link href="https://fonts.googleapis.com/css?family=Poppins:100, 200,300,400,500,600,700&amp;subset=latin-ext" rel="stylesheet">
  
  <script src="script/jquery.js"></script>
</head>
<body>

<div id="wrapper">
  <header>
    <div id="logo"></div>
    <div id="login_box">
      <form action="home">
        <div class="box">
          <label for="login">Login:</label><br>
          <input type="text" id="login" name="login" value="">
        </div>
        <div class="box">
          <label for="password">Hasło:</label><br>
          <input type="password" id="password" name="password" value="">
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
          <h2>Gra Endurange</h2>
          <p>Endurange to gra online w której wcielasz się w rolę kolonizatora w obcym układzie planetarnym. Czeka cię wiele możliwości rozwoju, możesz obrać ścieżkę pilota, żołnierza, górnika i wiele innych, wszystko w twoich rękach.</p>
          <p>Endurange jest grą hard sci-fi, w której rozgrywka odbywa sięw kontekscie praw fizyki. Gracze tworzą i sprzedają praktycznie kazde dobro dostępne na rynku.</p>
        </div>
      </div>

      <div id="register_box" class="box">
        <form action="">
          <label for="login">Login:</label><br>
          <input type="text" id="login" name="login" value=""><br>
          <label for="email">E-mail:</label><br>
          <input type="text" id="email" name="email" value=""><br>
          <label for="password">Hasło:</label><br>
          <input type="password" id="password" name="password" value=""><br>
          <label for="password_1">Powtóz hasło:</label><br>
          <input type="password" id="password_1" name="password_1" value=""><br>
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
</body>
</html>