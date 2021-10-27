<?php

use App\Http\Controllers\ApplicantsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DevController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\MySqlController;
use App\Http\Controllers\ScholarController;
use App\Http\Controllers\ScreeningController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => '/'], function(){

    Route::view('/', 'welcome')->name('homepage');
    Route::view('/privacy-policy', 'privacy-policy')->name('pripol');

    Route::group(['prefix' => 'apply', 'as' => 'apply.'], function(){
        Route::get('/', [FormController::class, 'index'])->name('form');
        Route::post('/', [FormController::class, 'submit'])->name('submit');
    
    });

    Route::get('track', TrackingController::class)->name('track');

});


// Protected routes
Route::group(['middleware' => 'auth:web'], function(){

    Route::get('dashboard', DashboardController::class)->name('dashboard');

    Route::group(['prefix' => 'applicants', 'as' => 'applicant.'], function(){
        Route::get('/', [ApplicantsController::class, 'index'])->name('index');
        Route::get('/{id}/show', [ApplicantsController::class, 'show'])->name('show');
        Route::post('/{id}/assess', [ApplicantsController::class, 'assess'])->name('assess');
        Route::get('/{id}/print', [ApplicantsController::class, 'print'])->name('print');
    });

    Route::get('/screening/{type}', ScreeningController::class)->name('screen');

    Route::group(['prefix' => 'scholars', 'as' => 'scholar.'], function(){
        Route::get('/', [ScholarController::class, 'index'])->name('index');
    });

    Route::group(['prefix' => 'users', 'as' => 'user.'], function(){
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::post('/', [UserController::class, 'store'])->name('store');
    });


    Route::group(['prefix' => 'dev', 'as' => 'dev.'], function() {
        Route::get('reds', [DevController::class, 'reds'])->name('reds');
        Route::get('email', [DevController::class, 'email'])->name('email');
    });
    
});





require __DIR__.'/auth.php';
