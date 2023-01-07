@extends('layouts.frontend.master')
@section('content')

<main>
	<!--    breadcrumb-area start    -->
	<section class="breadcrumb-area pt-180 pb-180 pt-md-120 pb-md-120 pt-xs-100 pb-xs-100 bg-fix" data-overlay="black"
	         data-opacity="7" data-background="{{asset('frontend/assets/img/bg/breadcrumb-bg-2.jpg')}}">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8 text-center">
					<div class="breadcrumb-content">
						<h3 class="title">Trang gói tập</h3>
						<ul>
							<li><a href="{{route('home')}}">Trang chủ</a></li>
							<li class="active">Gói tập</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--    breadcrumb-area end    -->

	<!-- pricing-area start -->
	<div class="pricing-area bg-off-white pt-130 pb-100">
		<div class="container">
			<div class="row justify-content-center align-items-center">
				<div class="col-xl-12">
					<div class="section-title-2 bar-theme-color text-center mb-35">
						<h3>
							Top 3 Gói Tập Được Mua Nhiều Nhất
						</h3>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
				@foreach($popular as $i)
				<div class="col-lg-4 col-md-7">
					<div class="pricing-wrap mt-30 mb-30">
						<h3 style="color: white;">{{$i->package_name}}</h3>
						<p style="color: white;">
							{{$i->short_description}}
						</p>
						<span class="price">{{number_format($i->into_price,0,'.','.')}} VNĐ</span>
						<a href="{{route('package_client.detail', $i->id)}}" class="order-btn">
							Xem gói tập <i class="fas fa-angle-double-right"></i>
						</a>
						<div class="shape">
							<img src="{{asset($i->avatar)}}" alt="shape">
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
	<!-- pricing-area end -->

	<!-- pricing-area-2 start -->
	<div class="pricing-area-2 pt-130 pb-100">
		<div class="container">
			<div class="row justify-content-center align-items-center">
				<div class="col-xl-12">
					<div class="section-title-2 bar-theme-color text-center mb-35">
						<h3>
							Gói Tập
						</h3>
						{{-- <span>Pricing</span> --}}
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-12">
					<form class="row m-auto">
						<div class="col-md-3 mb-50">
							<h5 class="">Loại gói tập</h5>
							<select class="form-control select2" aria-placeholder="Gói" aria-valuemax="gói">
								<option>Gói tập thường</option>
								<option>Gói tập theo lộc trình (có pt)</option>
							</select>
						</div>
						<div class="col-md-3 mb-50">
							<h5 class="">Bộ môn</h5>
							<select class="form-control select2">
								<option>Gym</option>
								<option>Boxing</option>
							</select>
						</div>
						<div class="col-md-3 mb-50">
							<h5 class="">Giá gói tập</h5>
							<select class="form-control select2">
								<option>100 - 200 K</option>
								<option>200 - 500 K</option>
								<option>> 500 K</option>
							</select>
						</div>
						<div class="col-md-1 mb-20 mt-30">
							<button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Search</button>
						</div>
					</form>
					@php
					$i=0;
					@endphp
					@foreach($packages as $item)

					<div class="{{$i++ % 2 == 0 ? 'pricing-wrap-2 mb-80' : 'pricing-wrap-2 active mb-80'}}">
						<div class="row no-gutters align-items-center">
							<div class="col-lg-4">
								<div class="pricing-title">
									<h3>{{$item->package_name}}</h3>
									<span>{{number_format($item->into_price, 0, '.','.')}} <sup>đ</sup></span>
									<p style="color: black;">Giảm {{$item->price_sale}} %</p>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="pricing-list">
									<ul>
										<li><i class="far fa-check-circle"></i> Môn tập : {{$item->subject->subject_name}}</li>
										@if($item->set_pt == 1)
										<li><i class="far fa-check-circle"></i> {{$item->total_session_pt }} buổi tập có PT </li>
										<li><i class="far fa-check-circle"></i> {{$item->week_session_pt}} buổi PT / tuần</li>
										@else
										<li><i class="far fa-check-circle"></i> Gói tập không PT</li>
										@endif
									</ul>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="pricing-content">
									<a href="{{route('package_client.detail', $item->id)}}" class="btn btn-gra mt-30">
										Xem gói tập <i class="fas fa-angle-double-right"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<!-- pricing-area-2 end -->


</main>

@endsection