@extends('app')

@section('title', "Zakupy")
@section('site_css', "css/style_shopping.css")

@section('content')
<div id="shopping" class="panel">
	<p class="bar"><b>Zakupy</b></p>
	<div class="content">
		<br>

		@foreach ($categories as $name=>$category)
		<div id="ships" class="panel category">
			<p class="bar"><b>{{$name}}</b></p>
				<div class="hover_scroll flex100 scroll_left">
					<img src="../img/left_arrow.png" alt="">
				</div>
				<div class="category_wraper" id="wraper1">
					<div class="category_roller">

						@foreach ($category as $position)

						<div class="position">
							<div class="top">
								<div class="image" style="background-image: url(img/{{$position->image}})"></div>
								<div class="info">
									<h4 class="position_name">{{$position->name}}</h4><br>
									<span>Typ: {{$position->type}}</span><br>
									<span>Masa: {{$position->getMass()}}</span><br>
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
											<a href="purchase?offer_id={{$position->offerId()}}" class="active">KUP</a>
										@else
											<a href="#" class="inactive" title="Masz za mało pieniędzy">KUP</a>
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


<div id="purchase" class="panel">
	<p class="bar"><b>Twoje zakupy</b></p>
	<div class="content">
		@foreach($offers as $position)
		<div class="position">
			<div class="image" style="background-image: url(img/{{$position->image}})"></div>
			<div class="info">
				<div>
					<h4 class="position_name">{{$position->name}}</h4>
					<span>{{ $position->created_at->format('d.m.Y') }}</span><br>
					<span>Kupiono od: {{getProfileName($position->seller_id)}}</span><br>
					<span>Cena: {{$position->price}}</span><br><br>
					@if($position->is_taken)
						<a href="#" class="inactive">ODEBRANO</a>
					@else
						<a href="take?offer_id={{$position->id}}" class="active">ODBIERZ</a>
					@endif
				</div>
				
				
			</div>
							
		</div>
		@endforeach
	</div>
</div>



<div id="offer" class="panel">
	<p class="bar"><b>Stwórz ofertę</b></p>
	<div class="content">
		
		<a href="create_offer">Stwórz ofertę</a>

		
	</div>
</div>





@endsection