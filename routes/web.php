<?php

use App\Http\Controllers\Web\WebController;
use Illuminate\Support\Facades\Route;


## Registration Page
Route::get('/', function () {
    return view('Web.Authentication.register');
});

## After Register Page
Route::get('/after_register', function () {
    return view('Web.Authentication.after_register');
})->name('afterRegister');

## Mobile Number Verification
Route::get('/mobile_number_verification', function () {
    return view('Web.mobile_number_verification');
})->name('first_page');

Route::post('mobile_number_verification', [WebController::class, 'storeMobileNumber'])->name('storeMobileNumber');


Route::group(['middleware' => 'auth'], function () {
    ## Second Page
    Route::get('/second_page', function () {
        return view('Web.second_page');
    })->name('second_page');
    Route::post('user_information', [WebController::class, 'storeUserInformation'])->name('storeUserInformation');

    ## Third Page
    Route::get('/third_page', function () {
        return view('Web.third_page');
    })->name('third_page');
    Route::post('user_booking', [WebController::class, 'storeUserBooking'])->name('storeUserBooking');

    ## Fourth Page
    Route::get('/fourth_page', function () {
        return view('Web.fourth_page');
    })->name('fourth_page');
    Route::get('show_user_information/{id}', [WebController::class, 'getUserInformation'])->name('getUserInformation');
    Route::post('confirm_visa/{id}', [WebController::class, 'confirmVisa'])->name('confirmVisa');

    ## Final Page
    Route::get('/final_page', function () {
        return view('Web.final_page');
    })->name('final_page');
});


require __DIR__ . '/auth.php';
