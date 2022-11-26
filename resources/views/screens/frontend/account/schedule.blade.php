@extends('layouts.frontend.account.account')

@section('content')
<div class="mx-4 bg-white shadow-lg rounded-lg overflow-hidden">
    <div class="relative w-full">
      <img src="https://picsum.photos/1500/352" alt="" />
      <div
        class="w-full absolute bottom-0 left-0 z-10 transform translate-y-3/4 lg:w-auto lg:translate-x-1/2 flex justify-center"
      >
        <img src="https://picsum.photos/160/160" alt="" />
      </div>
    </div>

    <div class="bg-gray-100 pt-[120px] lg:pt-0 lg:pl-[240px] min-h-[120px]">
      <div class="p-4 text-center lg:text-left">
        <h1 class="font-mock text-2xl text-gray-700 mb-2">
          Họ Tên : Nguyễn Tiến Hoàng
        </h1>
        <h2 class="font-mock text-gray-500">Gói Vip</h2>
        <h2 class="font-mock text-gray-500">Ngày Hết Hạn : 30/12/2023</h2>
      </div>
    </div>

    <div class="font-mock px-5 py-8 text-gray-400 ">
        <nav class="bg-gray-800">
            <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
              <div class="relative flex h-16 items-center justify-between">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                  <!-- Mobile menu button-->
                  <button type="button" class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                   
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                  </button>
                </div>
                <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                  <div class="hidden sm:ml-6 sm:block">
                    <div class="flex space-x-4">
                      <a href="./infoUser.html" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium" >Thông tin cá nhân</a>
          
                      <a href="./lich-trinh.html" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Lịch trình tập luyện</a>
          
                    </div>
                  </div>
                </div>
                
                <div class="sm:hidden" id="mobile-menu">
                    <div class="space-y-1 px-2 pt-2 pb-3">
                        <a href="./infoUser.html" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium" >Thông tin cá nhân</a>
          
                        <a href="./lich-trinh.html" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Lịch trình tập luyện</a>
                    </div>
          </nav>
          <aside class=" text-left mx-auto max-w-screen-xl rows">
            <h1 class="text-left font-mock text-2xl text-gray-700 my-5">Lịch Tập</h1>
            <table class=" w-full md:table-fixed">
                <thead>
                  <tr>
                    <th  style="max-width: 25px;">STT</th>
                    <th>Ngày</th>
                    <th>Phòng</th>
                    <th >Tên HLV</th>
                    <th><a href="http://" class="underline text-red-300">Đặt lịch</a></th>
                  </tr>
                </thead>
                <tbody class="text-left">
                  <tr class="py-8" >
                    <td>1</td>
                    <td>01/01/2023</td>
                    <td>phòng gymer</td>
                    <td>Nguyễn Tiến Hoàng</td>
                    <td><input type="text" name="" id=""></td>
                  </tr>
                  <tr class="py-8" >
                    <td>1</td>
                    <td>01/01/2023</td>
                    <td>phòng gymer</td>
                    <td>Nguyễn Tiến Hoàng</td>
                    <td><input type="text" name="" id=""></td>
                  </tr>
                  <tr class="py-8" >
                    <td>1</td>
                    <td>01/01/2023</td>
                    <td>phòng gymer</td>
                    <td>Nguyễn Tiến Hoàng</td>
                    <td><input type="text" name="" id=""></td>
                  </tr>
                  
                </tbody>
              </table>
          </aside>
    </div>
  </div>
@endsection