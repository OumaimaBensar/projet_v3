<?php

use Illuminate\Support\Facades\Route;
use Admin\UserController;
use Admin\EmployeeController;
use Admin\CarController;
use Admin\DriverController;
use Redacteur_dem\DemandeController;
use Validate\ValidationController;
use Gestion\GestionMissionController;
use Gestion\AffectationController;

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

Route::get('/', function () {
    return view('index');
});


Route::prefix('admin')->middleware('auth')->name('admin.')->group(function(){
    Route::resource('/users', UserController::class);
    Route::resource('/fonctionnaire', EmployeeController::class);
    Route::resource('/car', CarController::class);
    Route::resource('/driver', DriverController::class);

});

Route::prefix('redacteur_dem')->middleware('auth')->name('redacteur_dem.')->group(function(){
    Route::resource('/users', DemandeController::class);

});

Route::prefix('validation')->middleware('auth')->name('validation.')->group(function(){
     Route::resource('/users', ValidationController::class);

});

Route::prefix('GestionMission')->name('GestionMission.')->group(function(){
    Route::resource('/users', GestionMissionController::class);
    Route::resource('/affectations', AffectationController::class);
});
