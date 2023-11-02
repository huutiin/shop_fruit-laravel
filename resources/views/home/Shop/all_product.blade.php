@extends('home/Shop/shop')
@section('shop')
<div class="row product-lists">
	@foreach($all_product as $key => $product)
	<div class="col-lg-4 col-md-6 text-center strawberry">
		<div class="single-product-item">
			<div class="product-image">
				<a href="{{ route('product_detail',['product_id' => $product -> id_product]) }}"><img src="{{ asset('uploads/products/' . $product->images) }}" alt=""></a>
			</div>
			<h3>{{$product -> name_product}}</h3>
			<p class="product-price"><span>Per Kg</span> {{$product -> price}} VND</p>
			<a href="{{ route('product_detail',['product_id' => $product -> id_product]) }}" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
		</div>
	</div>
	@endforeach
</div>
@stop