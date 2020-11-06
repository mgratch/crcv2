<?php


use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TrafficController;
use App\Http\Controllers\TruckingController;
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

Route::get('/', function () {
    return view('welcome');
});


//traffic
Route::get('/traffic', [TrafficController::class, 'store']);
Route::get('/traffic', [TrafficController::class, 'index'])->name('traffic.index');
Route::get('/traffic/create', [TrafficController::class, 'create'])->name('traffic.create');
Route::get('/traffic/{traffic}', [TrafficController::class, 'show'])->name('traffic.show');
Route::get('/traffic/{traffic}/pdf', [TrafficController::class, 'pdf'])->name('traffic.pdf');
Route::get('/traffic/{traffic}/edit', [TrafficController::class, 'edit'])->name('traffic.edit');
Route::patch('/traffic/{traffic}', [TrafficController::class, 'update']);

//trucking
Route::get('/trucking', [TruckingController::class, 'index'])->name('trucking.index');
Route::get('/trucking/deleted', [TruckingController::class, 'deleted'])->name('trucking.deleted');
Route::middleware(['auth:sanctum', 'verified'])->get('/trucking/overview', [TruckingController::class, 'overview'])->name('trucking.overview');

//dashboard
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
