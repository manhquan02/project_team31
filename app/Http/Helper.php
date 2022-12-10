<?php

use App\Models\Language;
use App\Models\Order;
use App\Models\Translation;


function test_bmi($bmi)
{
    $health = 0;
    if ($bmi < 16) {
        $health = 1;
    } else if ($bmi < 17) {
        $health = 2;
    } else if ($bmi < 18.5) {
        $health = 3;
    } else if ($bmi < 25) {
        $health = 4;
    } else if ($bmi < 30) {
        $health = 5;
    } else if ($bmi < 35) {
        $health = 6;
    } else if ($bmi < 40) {
        $health = 7;
    } else {
        $health = 8;
    }
    return $health;
}

function upload_image($name , $request, $new, $folder)
{
    $image = $request;
    $imageName = $image->hashName();
    $new->$name = $image->storeAs($folder, $imageName);
}

function config_encode($text)
{
    $data = strtoupper(md5(rand(0, 1000)) . "gym") . base64_encode($text);
    return $data;
}

function weekday($weekday)
{
    $weekday_name = "";
    switch ($weekday) {
        case 'Monday':
            $weekday_name = "Thứ 2";
            break;
        case 'Tuesday':
            $weekday_name = "Thứ 3";
            break;
        case 'Wednesday':
            $weekday_name = "Thứ 4";
            break;
        case 'Thursday':
            $weekday_name = "Thứ 5";
            break;
        case 'Friday':
            $weekday_name = "Thứ 6";
            break;
        case 'Saturday':
            $weekday_name = "Thứ 7";
            break;
        case 'Sunday':
            $weekday_name = "Chủ nhật";
            break;
        default:
            # code...
            break;
            return $weekday_name;
    }
}


function st($month, $year)
{  // Thống kê
    $total_turnover = Order::where('status', 1)->get();
    $total = 0;
    foreach ($total_turnover as $item) {
        if (date('m-Y', strtotime($item->date_start)) == "$month" . "-" . "$year") {
            $total += $item->total_money;
        }
    }
    return $total;
}

function sub($month, $year)
{  // Thống kê đăng ký mới
    $total_sub = Order::where('status', 1)->get();
    $total = 0;
    foreach ($total_sub as $item) {
        if (date('m-Y', strtotime($item->date_start)) == "$month" . "-" . "$year") {
            $total += 1;
        }
    }
    return $total;
}

function config_decode($text)
{
    $result = substr($text, 35);
    return (int)base64_decode($result);
}


function typePackage(){
    return [
        '1'=>'Gói ngày',
        '2'=> 'Gói tháng'
    ];
}
function statusWage(){
    return [
        '0'=>'Chưa quyết toán',
        '1'=> 'Đã quyết toán'
    ];
}
