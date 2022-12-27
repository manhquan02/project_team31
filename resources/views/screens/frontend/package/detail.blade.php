@extends('layouts.frontend.master')
@section('title', 'Trang chủ')
@section('style')
<link rel="stylesheet prefetch" href="https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" />
<style>
    div.stars {
        display: inline-block;
    }

    input.star {
        display: none;
    }

    label.star {
        float: right;
        padding: 10px;
        font-size: 20px;
        color: #444;
        transition: all 0.2s;
    }

    input.star:checked~label.star:before {
        content: "\f005";
        color: #fd4;
        transition: all 0.25s;
    }

    input.star-5:checked~label.star:before {
        color: #fe7;
        text-shadow: 0 0 20px #952;
    }

    input.star-1:checked~label.star:before {
        color: #f62;
    }

    label.star:hover {
        transform: rotate(-15deg) scale(1.3);
    }

    label.star:before {
        content: "\f006";
        font-family: FontAwesome;
    }
</style>
@endsection
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
                        <a class="active show" id="r-tabs-1" data-toggle="tab" href="#r-tab-1" role="tab" aria-controls="r-tab-1" aria-selected="true">
                            Mô Tả
                        </a>
                        <a id="r-tabs-3" data-toggle="tab" href="#r-tab-3" role="tab" aria-controls="r-tab-3" aria-selected="false">
                            Đánh Giá
                        </a>
                    </div>
                    <div class="tab-content review-tab-content" id="review-tabs-content">
                        <div class="tab-pane fade active show" id="r-tab-1" role="tabpanel" aria-labelledby="r-tabs-1">
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
                            <div class="stars container bg-light px-3 py-2">
                                <h4 class="font-weight-bold text-2xl">Bình Luận</h4>

                                <form action="" class="py-3">
                                    <div class="information">
                                        <div class="comment mt-4 text-justify float-left">
                                            <img src="https://picsum.photos/50/50" alt="" class="rounded-circle" width="40" height="40" />
                                            <h4>Jhon Doe</h4>
                                            <br />
                                        </div>
                                    </div>
                                    <div>
                                        <input class="star star-5" id="star-5" type="radio" name="star" />
                                        <label class="star star-5" for="star-5"></label>
                                        <input class="star star-4" id="star-4" type="radio" name="star" />
                                        <label class="star star-4" for="star-4"></label>
                                        <input class="star star-3" id="star-3" type="radio" name="star" />
                                        <label class="star star-3" for="star-3"></label>
                                        <input class="star star-2" id="star-2" type="radio" name="star" />
                                        <label class="star star-2" for="star-2"></label>
                                        <input class="star star-1" id="star-1" type="radio" name="star" />
                                        <label class="star star-1" for="star-1"></label>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="" id="" cols="30" rows="3" class="form-control"></textarea>
                                    </div>
                                    <br />

                                    <button type="submit" style="background-color: #fe7" class="mt-3 font-weight-bold p-2 px-3">
                                        Gửi
                                    </button>
                                </form>

                                <div class="col-sm-8 col-md-10 col-11 position-relative" style="left:30px">
                                    <div class="text-justify darker mt-4 float-right w-full ">
                                        <div class="star">
                                            <input class="star star-5" id="star-5" type="radio" name="star" />
                                            <label class="star star-5" for="star-5"></label>
                                            <input class="star star-4" id="star-4" type="radio" name="star" />
                                            <label class="star star-4" for="star-4"></label>
                                            <input class="star star-3" id="star-3" type="radio" name="star" />
                                            <label class="star star-3" for="star-3"></label>
                                            <input class="star star-2" id="star-2" type="radio" name="star" />
                                            <label class="star star-2" for="star-2"></label>
                                            <input class="star star-1" id="star-1" type="radio" name="star" />
                                            <label class="star star-1" for="star-1"></label>
                                        </div>

                                        <img src="https://picsum.photos/50/50" alt="" class="rounded-circle" width="40" height="40" />
                                        <h4>Rob Simpson</h4>
                                        <span>- 20 October, 2018</span>
                                        <br />
                                        <p>
                                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus
                                            numquam assumenda hic aliquam vero sequi velit molestias doloremque
                                            molestiae dicta?
                                        </p>
                                    </div>
                                    <div class="comment mt-4 text-justify">
                                        <div class="star">
                                            <input class="star star-5" id="star-5" type="radio" name="star" />
                                            <label class="star star-5" for="star-5"></label>
                                            <input class="star star-4" id="star-4" type="radio" name="star" />
                                            <label class="star star-4" for="star-4"></label>
                                            <input class="star star-3" id="star-3" type="radio" name="star" />
                                            <label class="star star-3" for="star-3"></label>
                                            <input class="star star-2" id="star-2" type="radio" name="star" />
                                            <label class="star star-2" for="star-2"></label>
                                            <input class="star star-1" id="star-1" type="radio" name="star" />
                                            <label class="star star-1" for="star-1"></label>
                                        </div>
                                        <img src="https://picsum.photos/50/50" alt="" class="rounded-circle" width="40" height="40" />
                                        <h4>Jhon Doe</h4>
                                        <span>- 20 October, 2018</span>
                                        <br />
                                        <p>
                                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus
                                            numquam assumenda hic aliquam vero sequi velit molestias doloremque
                                            molestiae dicta?
                                        </p>
                                    </div>
                                    <div class="darker mt-4 text-justify">
                                        <div class="star">
                                            <input class="star star-5" id="star-5" type="radio" name="star" />
                                            <label class="star star-5" for="star-5"></label>
                                            <input class="star star-4" id="star-4" type="radio" name="star" />
                                            <label class="star star-4" for="star-4"></label>
                                            <input class="star star-3" id="star-3" type="radio" name="star" />
                                            <label class="star star-3" for="star-3"></label>
                                            <input class="star star-2" id="star-2" type="radio" name="star" />
                                            <label class="star star-2" for="star-2"></label>
                                            <input class="star star-1" id="star-1" type="radio" name="star" />
                                            <label class="star star-1" for="star-1"></label>
                                        </div>
                                        <img src="https://picsum.photos/50/50" alt="" class="rounded-circle" width="40" height="40" />
                                        <h4>Rob Simpson</h4>
                                        <span>- 20 October, 2018</span>
                                        <br />
                                        <p>
                                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus
                                            numquam assumenda hic aliquam vero sequi velit molestias doloremque
                                            molestiae dicta?
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection