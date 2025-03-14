@extends('layouts.app')

@section('content')

	<div class="products">
		@foreach($products as $product)
			<a class="product-row no-link" href="{{ route('products.show', $product) }}">
				<img src="{{ url($product->image ?? 'img/placeholder.jpg') }}" alt="{{ $product->title }}" class="rounded">
				<div class="product-body">
					<div>
						<h5 class="product-title"><span>{{ $product->title }}</span><em>&euro;{{ $product->price}}</em></h5><!-- gets the right price from the array $product->price (look at product model) -->
						@unless(empty($product->description))
							<p>{{ $product->description }}</p>
						@endunless
						@if($product->discount > 0)
							<p class="discount">Nu <span>{{ $product->discount }}%</span> korting!</p>
							<p class="discount-price">&euro; {{ $product->original_price }} </p>
						@endif	
					</div>
					<button class="btn btn-primary">Meer info &amp; bestellen</button>
				</div>
			</a>
		@endforeach
	</div>

@endsection