<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MidwifeController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\QueueController;
use App\Http\Controllers\ScheduleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});
Route::get('/queuelatest', [PatientController::class, 'queuelatest'])->name(
    'queuelatest'
);

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name(
        'dashboard'
    );
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('/patient', PatientController::class);
    Route::resource('/doctor', DoctorController::class);
    Route::resource('schedule', ScheduleController::class);
    Route::post('/add', [DoctorController::class, 'add'])->name('add');
    Route::resource('queue', QueueController::class);
    Route::resource('midwife', MidwifeController::class);
    Route::post('/addmid', [MidwifeController::class, 'addmid'])->name(
        'addmid'
    );
});
