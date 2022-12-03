@extends('layouts.frontend.master')
@section('content')

<main>
	<!--    breadcrumb-area start    -->
	<section class="breadcrumb-area pt-180 pb-180 pt-md-120 pb-md-120 pt-xs-100 pb-xs-100 bg-fix" data-overlay="black"
	         data-opacity="7" data-background="assets/img/bg/breadcrumb-bg-4.jpg">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8 text-center">
					<div class="breadcrumb-content">
						<h3 class="title">Pricing Plan</h3>
						<ul>
							<li><a href="index.html">Home</a></li>
							<li class="active">Pricing Plan</li>
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
							We Provide A Comfortable Pricing Plan For Our Satisfied Clients
						</h3>
						<span>Pricing</span>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
			<div class="popular-badge" style="text-align: center;">
							<h2 style="color: #e63a34;">Most Popular</h2>
						</div>
				
				@foreach($popular as $i)
				<div class="col-lg-4 col-md-7">
					<div class="pricing-wrap mt-30 mb-30">
						<h3>{{$i->package_name}}</h3>
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
							We Provide A Comfortable Pricing Plan For Our Satisfied Clients
						</h3>
						<span>Pricing</span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-12">
                    @php
                    $i=0;
                    @endphp
                    @foreach($packages as $item)
                    @php
                    $i++;
                    @endphp
					<div class="{{$i++ % 2 == 1 ? 'pricing-wrap-2 mb-80' : 'pricing-wrap-2 active mb-80'}}" >
						<div class="row no-gutters align-items-center">
							<div class="col-lg-4">
								<div class="pricing-title">
									<h3>{{$item->package_name}}</h3>
									<span>{{number_format($item->into_price, 0, '.','.')}} <sup>đ</sup></span>
                                    <p>Giảm {{$item->price_sale}} %</p>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="pricing-list">
									<ul>
										<li><i class="far fa-check-circle"></i> Môn tập : {{$item->subject->subject_name}}</li>
										@if($item->total_session_pt != null)
										<li><i class="far fa-check-circle"></i> {{$item->total_session_pt }} buổi tập có PT </li>
										<li><i class="far fa-check-circle"></i> {{$item->week_session_pt}} buổi PT / tuần</li>
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