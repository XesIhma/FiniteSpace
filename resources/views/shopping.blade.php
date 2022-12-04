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
							<div class="top">
								<div class="image" style="background-image: url(img/{{$position->image}})"></div>
								<div class="info">
									<h4 class="position_name">{{$position->name}}</h4><br>
									<span>Typ: {{$position->type}}</span><br>
									<span>Masa: {{$position->mass}}</span><br>
									<span>Wymiary: </span><span>{{$position->size}}</span><br>
									<span>HP: </span><span>{{$position->hp_max}}</span><br>
									@if($position->resistance)
										<span>Odporność: {{$position->resistance}}</span><br>
									@endif
									@if($position->deuter_usage_max)
										<span>Pobór paliwa: <span title="Wodór">{{$position->deuter_usage_max}}</span> / <span title="Tlen">{{$position->oxygen_usage_max}}</span></span><br>
									@endif
									@if($position->power_max)
										<span>Moc: {{$position->power_max}}</span><br>
									@endif
									@if($position->thrust_max)
										<span>Moc: {{$position->thrust_max}}</span><br>
									@endif
									@if($position->damage)
										<span>Obrażenia: {{$position->damage}}</span><br>
									@endif
									@if($position->ammo_type)
										<span>Rodzaj amunicji: {{$position->ammo_type}}</span><br>
									@endif
								</div>
							</div>
							<div class="bottom">
								<div class="description">
									Opis: {{$position->description}}
							</div>
								
								<div class="buy">
									<div>
										@if($position->owner())
											<p>Sprzedający: {{$position->owner()->name}}</p>
										@endif
										<p>Cena: {{$position->price}}</p>
										@if (currentProfile()->money >= $position->price)
											<a href="purchase?category={{$category[0]}}&item_id={{$position->id}}" class="active">KUP</a>
										@else
											<a href="#" class="inactive">KUP</a>
										@endif
									</div>
								</div>
									
								
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
<div id="bought" class="panel">
	<p class="bar"><b>Twoje zakupy</b></p>
	<div class="content">
		@foreach($boughts as $position)
		<div class="position">
			<div class="image" style="background-image: url(img/{{$position->image}})"></div>
			<div class="info">
				<div>
					<h4 class="position_name">{{$position->name}}</h4>
					<span>{{ $position->created_at->format('d.m.Y') }}</span><br>
					<span>Kupiono od: {{getProfileName($position->seller_id)}}</span><br>
					<span>Cena: {{$position->price}}</span><br><br>
					@if(!$position->is_taken)
						<a href="take?category={{$category[0]}}&item_id={{$position->id}}" class="active">ODBIERZ</a>
					@else
						<a href="#" class="inactive">ODEBRANO</a>
					@endif
				</div>
				
				</div>
			</div>
							
		</div>
		@endforeach
		
	</div>
</div>
      @endsection