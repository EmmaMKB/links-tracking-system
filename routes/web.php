<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ConvoyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TruckController;
use App\Http\Controllers\EmployeeController;
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
    return redirect('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/add_truck', [TruckController::class, 'add_truck'])->name('add_truck');
    Route::post('/edit_truck', [TruckController::class, 'edit_truck'])->name('truck:edit');
    Route::get('/trucks', [TruckController::class, 'index'])->name('trucks');
    Route::get('/trucks/drc-routes', [TruckController::class, 'drc_routes'])->name('drc_routes');
    Route::get('/teams/ground', [EmployeeController::class, 'ground_team'])->name('ground_team');
    Route::post('/add_employee', [EmployeeController::class, 'add_employee'])->name('add_employee');
    Route::get('/teams/controllers', [EmployeeController::class, 'controllers'])->name('controllers');
    Route::get('/convoys/drcroutes', [ConvoyController::class, 'drc_routes'])->name('drc_convoys');
    Route::post('/add_convoy', [ConvoyController::class, 'create'])->name('add_convoy');
    Route::post('/update_convoy', [ConvoyController::class, 'update'])->name('update_convoy');
    Route::post('/delete_convoy', [ConvoyController::class, 'delete'])->name('delete_convoy');
});

Route::middleware(['guest'])->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
});

require __DIR__.'/auth.php';
