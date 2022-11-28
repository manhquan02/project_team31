@extends('layouts.frontend.master')
@section('title', 'Trang chủ')

@section('content')

<div class="product-area pt-130 pb-130">
            <div class="container">
                <div class="row mb-50">
                   
                    <div class="col-md-12 col-lg-9 col-xl-6 order--1">
                        <div class="tab-content product-tab-content" id="product-tabs-content">
                            <div class="tab-pane fade active show" id="p-tab-1" role="tabpanel" aria-labelledby="p-tabs-1">
                                <img src="{{asset($package->avatar)}}" alt="product">
                            </div>
                            <div class="tab-pane fade" id="p-tab-2" role="tabpanel" aria-labelledby="p-tabs-2">
                                <img src="{{asset($package->avatar)}}" alt="product">
                            </div>
                            <div class="tab-pane fade" id="p-tab-3" role="tabpanel" aria-labelledby="p-tabs-3">
                                <img src="{{asset($package->avatar)}}" alt="product">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 col-lg-8 col-xl-4">
                        <div class="product-details mt-lg-40 mt-md-40 mt-xs-40">
                            <h3>{{$package->package_name}}</h3>
                            <div class="product-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <span class="price">{{number_format($package->into_price,0,'.','.')}} VND</span>
                            <p>
                               {{$package->short_description}}
                            </p>
                            <div class="product-action-box mb-30">
                                <div class="add-to-cart">
                                    <a href="{{route('order.index', $package->id)}}" class="btn btn-gra">Đăng Ký Ngay</a>
                                </div>
                            </div>
                            <div class="product-share">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-google-plus-g"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-11 col-lg-11">
                        <div class="review-tab-wrapper">
                            <div class="nav review-tab" id="review-tabs" role="tablist">
                                <a class="active show" id="r-tabs-1" data-toggle="tab" href="#r-tab-1" role="tab"
                                   aria-controls="r-tab-1" aria-selected="true">
                                    Mô Tả
                                </a>
                                <a id="r-tabs-3" data-toggle="tab" href="#r-tab-3" role="tab"
                                   aria-controls="r-tab-3" aria-selected="false">
                                    Đánh Giá
                                </a>
                            </div>
                            <div class="tab-content review-tab-content" id="review-tabs-content">
                                <div class="tab-pane fade active show" id="r-tab-1" role="tabpanel"
                                     aria-labelledby="r-tabs-1">
                                    {!!$package->description !!}
                                </div>
                                <div class="tab-pane fade" id="r-tab-2" role="tabpanel" aria-labelledby="r-tabs-2">
                                    <p>
                                        Sorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                        irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                        pariatur xcepteur sint occaecat cupidatat non proident, sunt.
                                    </p>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Nullam varius, turpis et commodo
                                        pharetra, est eros bibendum elit, nec luctus magna felis sollicitudinInteger in
                                        mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec
                                        lobortis risus a elit. Etiam tempor. Ut ullamcorper,
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="r-tab-3" role="tabpanel" aria-labelledby="r-tabs-3">
                                    <p>
                                        Sorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                        irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                        pariatur xcepteur sint occaecat cupidatat non proident, sunt.
                                    </p>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                        irure dolor in reprehenderit in voluptate velit esse cdolore eu fugiat nulla
                                        pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                        deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla
                                        gravida orci a odio.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
