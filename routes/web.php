<?php

use App\Http\Controllers\LocationController;
use App\Http\Controllers\PageController;
use App\Http\Livewire\CreateLocationWizard;
use App\Http\Livewire\EditLocationWizard;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::group(['prefix' =>  LaravelLocalization::setLocale()], function() {
    Route::controller(PageController::class)->group(function() {
        Route::get('/', 'index')->name('home');
        Route::get('/about', 'about')->name('about');
        Route::get('/cookies', 'cookies')->name('cookies');
        Route::get('/privacy', 'privacy')->name('privacy');
    });

    Route::get('/location/create', CreateLocationWizard::class)->name('create-location');
    Route::get('/location/{id}/edit', EditLocationWizard::class)->name('edit-location');

    Route::get('/location/{id}', [LocationController::class, 'show'])->name('show-location');

    Route::get('/location/create/result', [LocationController::class, 'create_result'])->name('create-result');
    Route::get('/location/edit/result', [LocationController::class, 'edit_result'])->name('edit-result');
});
