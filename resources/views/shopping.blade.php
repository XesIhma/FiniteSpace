@extends('app')

@section('title', "Zakupy")
@section('site_css', "css/style_shopping.css")

@section('content')
<div id="shopping" class="panel">
	<p class="bar"><b>Zakupy</b></p>
	<div class="content">
		<br>

		@foreach ($categories as $category)
		<div id="ships" class="panel category">
			<p class="bar"><b>{{$category[0]}}</b></p>
				<div class="hover_scroll flex100 scroll_left">
					<img src="../img/left_arrow.png" alt="">
				</div>
				<div class="category_wraper" id="wraper1">
					<div class="category_roller">

						@foreach ($category[1] as $position)

						<div class="position">
							<div class="image" style="background-image: url(img/{{$position->image}})"></div>
							<div class="info">
								<h4 class="position_name">{{$position->model}}</h4>
								<span>Masa: {{$position->mass}}</span><br>
								<span>Cena: {{$position->price}}</span><br>
							</div>
						</div>
						
						@endforeach
						

					</div>
				</div>
					<div class="hover_scroll flex100 scroll_right" style="right: 0">
						<img src="../img/right_arrow.png" alt="">
					</div>
		</div>
		@endforeach
			
	</div>
</div>
<div id="other_ships" class="panel">
	<p class="bar"><b>Pozostałe statki</b></p>
	<div class="content">

		<div class="position">
			<div class="image" style="background-image: url(img/fighter1.jpg)"></div>
			<div class="info">
				<h4 class="position_name">Hurricane</h4>
				<span>Lekki myśliwiec</span><br>
				<span>Masa: 13t</span><br>
				<span>Wymiary: </span><br><span>10m x 7m x 3m</span><br>
				<span>Siła ciągu: 1100kN</span><br>
				<span>Max v2: 5km/s</span><br>
			</div>
		</div>

		<div class="position">
			<div class="image" style="background-image: url(img/laser_beam.jpg)"></div>
			<div class="info">
				<h4 class="position_name">Laser Beam v1</h4>
				<span>Masa: 100kg</span><br>
				<span>Pobór mocy: 300</span><br>
				<span>Obrażenia: 100</span><br>
				<span>Cena: 8000</span><br>
				<span>Slot: A</span><br>
			</div>
		</div>

		<div class="position">
			<div class="image" style="background-image: url(img/plasma_caster.png)"></div>
			<div class="info">
				<h4 class="position_name">Plasma Caster</h4>
				<span>Masa: 100kg</span><br>
				<span>Pobór mocy: 300</span><br>
				<span>Obrażenia: 100</span><br>
				<span>Cena: 8000</span><br>
				<span>Slot: A</span><br>
			</div>
		</div>
	</div>
</div>
      @endsection