@extends('layouts.frontend.master')
@section('title', 'Đăng ký')
@section('content')
<main>
        <!--    breadcrumb-area start    -->
        <section class="breadcrumb-area pt-180 pb-180 pt-md-120 pb-md-120 pt-xs-100 pb-xs-100 bg-fix"
            data-overlay="black" data-opacity="7" data-background="assets/img/bg/breadcrumb-bg-4.jpg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <div class="breadcrumb-content">
                            <h3 class="title">Đăng kí</h3>
                            <ul>
                                <li><a href="index.html">Trang chủ</a></li>
                                <li class="active">Đăng kí</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--    breadcrumb-area end    -->

        <!-- contact-area start -->
        <div class="contact-area-2 pt-130 pb-130">
            <div class="container">
                <div class="row justify-content-between mt-100">
                    <div class="col-md-6 col-lg-5">
                        <div class="contact-text text-left">
                            <div class="about-img-2 mb-70">
                            <img src="{{asset('frontend/assets/img/thumb/thumb-4.jpg')}}" alt="about">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7">
                        <div class="contact-form contact-form-2">
                            <h1 class="text-center">ĐĂNG KÝ</h1>
                            <form action="{{route('postSignup')}}" method="post">
                                @csrf
                                <div class="row" style="margin-bottom: 28px">
                                @if(session()->has('error'))
                                <div class="col-xl-12">
                                    <span class="text-danger"><strong>{{session()->get('error')}}</strong></span>
                                </div>
                                @endif
                                    <div class="col-xl-12">
                                        <div class="input-wrap input-icon icon-msg">
                                        <input type="text" @error('name') style="border: 3px solid red" placeholder="{{$message}}" @enderror placeholder="Nhập vào họ và tên" name="name" value="{{old('name')}}">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="input-wrap input-icon icon-msg">
                                        <input type="text" @error('phone') style="border: 3px solid red" placeholder="{{$message}}" @enderror placeholder="Nhập vào số điện thoại" name="phone" value="{{old('phone')}}">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="input-wrap input-icon icon-msg">
                                        <input type="email" @error('email') style="border: 3px solid red" placeholder="{{$message}}" @enderror placeholder="Nhập vào địa chỉ email" name="email" value="{{old('email')}}">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="input-wrap input-icon icon-msg">
                                        <input type="password" @error('password') style="border: 3px solid red" placeholder="{{$message}}" @enderror placeholder="Nhập vào mật khẩu" name="password">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="input-wrap input-icon icon-msg">
                                        <input type="password" @error('password_confirm') style="border: 3px solid red" placeholder="{{$message}}" @enderror placeholder="Nhập lại mật khẩu" name="password_confirm">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="input-wrap input-icon icon-msg">
                                            <select name="gender" @error('gender') style="border: 3px solid red" @enderror>
                                                <option selected disabled>Chọn giới tính</option>
                                                <option @if(old('gender') == 1 ) selected @endif value="1">Nam</option>
                                                <option @if(old('gender') == 2 ) selected @endif value="2">Nữ</option>
                                                <option @if(old('gender') == 3 ) selected @endif value="3">Khác</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="input-wrap input-icon icon-msg">
                                        <input type="text" @error('address') style="border: 3px solid red" placeholder="{{$message}}" @enderror placeholder="Nhập vào địa chỉ" name="address" value="{{old('address')}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <p className="mb-4 pb-lg-2" style="color: '#393f81'">Bạn đã có tài khoản ? <a
                                            href="{{route('login')}}" style="color: '#393f81'">Đăng nhập</a></p>
                                    <button type="submit" class="btn btn-gra">
                                        ĐĂNG KÝ <i class="fas fa-angle-double-right"></i>
                                    </button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
@endsection