@extends('app')

@section('title', "Twój statek")
@section('site_css', "css/style_ship.css")


@section('content')
<div id="ship" class="panel">
	<p class="bar"><b>@yield('ship_name')</b></p>
	<div class="content, content_ship">
		<div class="nav_box">
			<nav>
				<ul>
					<a href="ship"><li>Ogólne</li></a>
					<a href="ship_drive"><li>Napęd</li></a>
					<a href="ship_armor"><li>Osłony</li></a>
					<a href="ship_weapon"><li>Uzbrojenie</li></a>
					<a href="nopage"><li>Układy</li></a>
					<a href="cargohold"><li>Ładownia</li></a>
				</ul>
			</nav>
		</div>
		<div class="main_ship">
		
		@yield('content_ship')

		</div>

	</div>
</div>
<div id="other_ships" class="panel">
	<p class="bar"><b>Pozostałe statki</b></p>
	<div class="content">
		<p>Nie masz więcej statków.</p><br>
	</div>
</div>
      @endsection