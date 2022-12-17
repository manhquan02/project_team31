<?php

use App\Http\Controllers\Admin\AttendanceController;
use App\Http\Controllers\Admin\AttendanceMemberController;
use App\Http\Controllers\Admin\ContractController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PtMyStudentController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\SchedulePtController;
use App\Http\Controllers\Admin\TimeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Client\OrderController as ClientOrderController;
use App\Http\Controllers\Client\PaymentController;
use App\Http\Controllers\Client\ScheduleCoachController;
use App\Http\Controllers\Client\ScheduleMemberController as ClientScheduleMemberController;
use App\Http\Controllers\Client\ScheduleUsserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::prefix('admin/')->name('admin.')->group(function () {
    Route::prefix('user/')->name('user.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('listUser');
        Route::get('/list-admin', [UserController::class, 'listAdmin'])->name('listAdmin');
        Route::get('/list-pt', [UserController::class, 'listPt'])->name('listPt');
        Route::get('/list-member', [UserController::class, 'listMember'])->name('listMember');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/post-user', [UserController::class, 'store'])->name('postUser');
        Route::get('/edit-status', [UserController::class, 'status'])->name('editStatus');
        Route::post('/edit-role', [UserController::class, 'editRole'])->name('editRole');
        Route::get('bmi/{id}', [UserController::class, 'bmi'])->name('bmi');
        Route::patch('bmi/{id}', [UserController::class, 'updateBMI'])->name('updateBMI');
    });


    Route::prefix('discount/')->name('discount.')->group(function () {
        Route::get('/', [DiscountController::class, 'index'])->name('list');
        Route::get('/create', [DiscountController::class, 'create'])->name('create');
        Route::post('/post-discount', [DiscountController::class, 'store'])->name('postDiscount');
        Route::get('edit/{id}', [DiscountController::class, 'edit'])->name('edit');
        Route::patch('edit/{id}', [DiscountController::class, 'update'])->name('postEdit');
    });

    Route::prefix('order/')->name('order.')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('list');
        Route::get('/create', [OrderController::class, 'create'])->name('create');
        Route::post('/post-order', [OrderController::class, 'store'])->name('postOrder');
        Route::get('/add', [OrderController::class, 'add'])->name('add');

        Route::get('/create-multi', [OrderController::class, 'createMulti'])->name('createMulti');
        Route::post('/post-orderMulti', [OrderController::class, 'postOrderMulti'])->name('postOrderMulti');

        Route::get('/set-package', [OrderController::class, 'setPackage'])->name('setPackage');
        Route::get('/total-money', [OrderController::class, 'setTotalMoney'])->name('setTotalMoney');
        Route::get('/set-coach', [OrderController::class, 'setCoach'])->name('setCoach');
        Route::get('pdf', [OrderController::class, 'pdf'])->name('pdf');

        Route::post('/momo_payment', [OrderController::class, 'momoPayment'])->name('momoPayment');
        Route::get('checkPayment', [OrderController::class, 'returnUrl'])->name('returnUrl');

    });



    Route::prefix('contract/')->name('contract.')->group(function () {
        Route::get('/', [ContractController::class, 'index'])->name('list');
        Route::get('/create/{id}', [ContractController::class, 'create'])->name('create');
        Route::post('/post-time', [ContractController::class, 'store'])->name('postTime');
    });

    // Route::prefix('schedule/')->name('schedule.')->group(function () {
    //     Route::get('', [SchedulePtController::class, 'index'])->name('list');
    // });
    Route::prefix('schedule')->name('schedule.')->group(function () {
        Route::get('list', [\App\Http\Controllers\Admin\ScheduleController::class, 'show'])->name('list');
    });


    Route::prefix('attendance/')->name('attendance.')->group(function () {
        Route::get('/{id}', [AttendanceMemberController::class, 'index'])->name('list');
        Route::get('/edit-status', [AttendanceMemberController::class, 'editStatus'])->name('editStatus');
    });


});

Route::prefix('coach/')->name('coach.')->group(function () {
    Route::prefix('my-student/')->name('my_student.')->group(function () {
        Route::get('/', [PtMyStudentController::class, 'index'])->name('list');
    });
    
});

// client 

Route::prefix('payment/')->name('payment.')->group(function () {
    Route::get('/{id}', [PaymentController::class, 'index'])->name('index');
    Route::post('create/{id}', [PaymentController::class, 'store'])->name('store');
    
    Route::get('checkPayment', [PaymentController::class, 'returnUrl'])->name('returnUrl');
});

// Route::prefix('account/')->name('account.')->group(function () {
//     Route::get('/', [ScheduleUserController::class, 'index'])->name('index');
    
// });

Route::prefix('order/')->name('order.')->group(function () {
    Route::get('create/{id}', [ClientOrderController::class, 'index'])->name('index');
    Route::post('postOrder/{id}', [ClientOrderController::class, 'store'])->name('postOrder');
    Route::get('checkPayment', [ClientOrderController::class, 'returnUrl'])->name('returnUrl');
    Route::get('checkWeekdayPt', [ClientOrderController::class, 'checkWeekdayPt'])->name('checkWeekdayPt');
    Route::get('test', [ClientOrderController::class, 'test'])->name('test');
    Route::get('create/{orderId}', [ClientOrderController::class, 'create'])->name('create');
});

Route::prefix('account/')->name('account.')->group(function () {
    Route::get('profile', [ClientScheduleMemberController::class, 'profile'])->name('profile');
    Route::get('schedule', [ClientScheduleMemberController::class, 'scheduleMember'])->name('schedule');
});

Route::prefix('account-pt/')->name('accountPt.')->group(function () {
    Route::get('/', [ScheduleCoachController::class, 'profile'])->name('index');
    Route::get('profile', [ScheduleCoachController::class, 'profile'])->name('profile');
    Route::get('schedule', [ScheduleCoachController::class, 'scheduleCoach'])->name('scheduleCoach');
    Route::get('attendance-member/{scheduleId}', [ScheduleCoachController::class, 'attendanceMember'])->name('attendanceMember');
    Route::post('postAttendance/{scheduleId}', [ScheduleCoachController::class, 'postAttendance'])->name('postAttendance');
});



