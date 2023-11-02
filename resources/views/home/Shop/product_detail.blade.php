@extends('main_layout/main')
@section('content')
<div class="breadcrumb-section breadcrumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="breadcrumb-text">
					<p>See more Details</p>
					<h1>Single Product</h1>
				</div>
			</div>
		</div>
	</div>
</div>
	<!-- end breadcrumb section -->

	<!-- single product -->
	<div class="single-product mt-150 mb-150">
		<div class="container">
			@foreach($product_detail as $key => $detail)
			<div class="row">
				<div class="col-md-5">
					<div class="single-product-img">
						<img src="{{ asset('uploads/products/'.$detail->images) }}" width="500px" height="350px" alt="">
					</div>
				</div>
				<div class="col-md-7">
					<div class="single-product-content">
						<form action="{{route('add_cart')}}" method="post">
							@csrf
							<h3>{{$detail -> name_product}}</h3>
							<input type="hidden" name="product_id" value="{{$detail -> id_product}}">
							<p class="single-product-pricing" name="price"><span>Per Kg</span> {{$detail -> price}} VNĐ</p>
							<p>{{$detail -> discription}}</p>
							<div class="single-product-form">
								<input type="number" name="quantity" min="1" placeholder="1">
								<br>
								<button type="submit" name="add_cart" class="cart-btn"><i class="fas fa-shopping-cart"></i>Add to Cart</button>
								<p><strong>Categories: </strong>{{$detail -> name_category}}</p>
							</div>
						</form>
							<h4>Share:</h4>
							<ul class="product-share">
								<li><a href=""><i class="fab fa-facebook-f"></i></a></li>
								<li><a href=""><i class="fab fa-twitter"></i></a></li>
								<li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
								<li><a href=""><i class="fab fa-linkedin"></i></a></li>
							</ul>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
	<!-- end single product -->

	<!-- more products -->
	<div class="more-products mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Related</span> Products</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
					</div>
				</div>
			</div>
			<div class="row">
				@foreach($related_product as $key => $related)
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="{{asset('uploads/products/'.$related->images)}}" alt=""></a>
						</div>
						<h3>{{$related->name_product}}</h3>
						<p class="product-price"><span>Per Kg</span> {{$related->price}} </p>
						<a href="{{ route('product_detail',['product_id' => $related -> id_product]) }}" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
@stop()