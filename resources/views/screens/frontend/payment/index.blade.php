@extends('layouts.frontend.master')
@section('title', 'Trang chủ')

@section('content')
<br/>
<div class="container">

    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class=" d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Giỏ hàng</span>
                <span class="badge badge-secondary badge-pill">1</span>
            </h4>
            <ul class="list-group mb-3 sticky-top">
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Tên sản phẩm</h6>
                        <div>
                        <img src="https://thethaodonga.com/wp-content/uploads/2022/01/Sergi-Constance-4.jpg" alt="" width="70px">
                        </div>
                        <div>
                            <small class="text-muted">Gói tập áp dụng dành cho những người muốn giảm cân và có 1 cơ thể săn chắc</small>
                        </div>
                        <div>
                            <div class="text-black">
                                <label for="firstName">Số lượng</label>
                                <input type="number" class="form-control" id="firstName" placeholder="" value="" required="">
                                <div class="invalid-feedback"> Valid first name is required. </div>
                            </div>
                        </div>
                    </div>
                    <span class="text-muted">$12</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Tổng tiền</span>
                    <strong>$12</strong>
                </li>
            </ul>
            <form class="card p-2">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Mã giảm giá">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-secondary">Áp dụng</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Thanh toán gói tập</h4>
            <form class="needs-validation" novalidate="">
                <div class="row">
                   
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Họ và tên</label>
                        <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
                        <div class="invalid-feedback"> Valid last name is required. </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="username">Email</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">@</span>
                        </div>
                        <input type="text" class="form-control" id="username" placeholder="" required="">
                        <div class="invalid-feedback" style="width: 100%;"> Your username is required. </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="username">Địa chỉ</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="username" placeholder="" required="">
                        <div class="invalid-feedback" style="width: 100%;"> Your username is required. </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email">Số điện thoại<span class="text-muted"></span></label>
                    <input type="email" class="form-control" id="email" placeholder="">
                    <div class="invalid-feedback"> Please enter a valid email address for shipping updates. </div>
                </div>
                <div class="mb-3">
                    <label for="email">Chọn ca tập<span class="text-muted"></span></label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="email">Chọn huấn luyện viên<span class="text-muted"></span></label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="username">Thời gian bắt đầu</label>
                    <div class="input-group">
                        <input type="date" class="form-control" id="username" placeholder="" required="">
                        <div class="invalid-feedback" style="width: 100%;"> Your username is required. </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email">Chọn thứ tập có PT<span class="text-muted"></span></label>
                    <select multiple class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="save-info">
                    <label class="custom-control-label" for="save-info">Bạn đồng ý với điều kiện của chúng tôi ? </label>
                </div>

                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Tiếp tục thanh toán</button>
            </form>
        </div>
    </div> 
</div>
<br>
@endsection