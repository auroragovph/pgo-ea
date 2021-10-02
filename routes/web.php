<?php

use App\Http\Controllers\ApplicantsController;
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => '/'], function(){


    Route::view('/', 'welcome')->name('homepage');
    Route::view('/privacy-policy', 'privacy-policy')->name('pripol');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::group(['prefix' => 'apply', 'as' => 'apply.'], function(){
    Route::get('/', [FormController::class, 'index'])->name('form');
    Route::post('/', [FormController::class, 'submit'])->name('submit');

});


Route::group(['prefix' => 'applicants', 'as' => 'applicant.'], function(){
    Route::get('/', [ApplicantsController::class, 'index'])->name('index');
    Route::get('/{id}/show', [ApplicantsController::class, 'show'])->name('show');
    Route::post('/{id}/assess', [ApplicantsController::class, 'assess'])->name('assess');


});



require __DIR__.'/auth.php';
