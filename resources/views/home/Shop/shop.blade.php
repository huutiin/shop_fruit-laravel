@extends('main_layout/main')
@section('content')
<div class="breadcrumb-section breadcrumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="breadcrumb-text">
					<p>Fresh and Organic</p>
					<h1>Shop</h1>
				</div>
			</div>
		</div>
	</div>
</div>
	<!-- end breadcrumb section -->

	<!-- products -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>
							<li class="active" data-filter="*"><a style="color: white;" href="{{route('shop')}}">All</a></li>
							@foreach($category as $key => $cate)
                            <li class="active" data-filter="*"><a style="color: white;" href="{{route('product_in_category',['category_id' => $cate -> id_product_category])}}">{{$cate -> name_category}}</a></li>
							@endforeach
                        </ul>
                    </div>
                </div>
            </div>
			@yield('shop')
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="pagination-wrap">
						<ul>
							<li><a href="#">Prev</a></li>
							<li><a class="active" href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">Next</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop()