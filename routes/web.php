<?php


use App\Http\Controllers\TrafficController;
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
Route::get('/traffic', [TrafficController::class, 'index']);
Route::get('/traffic/create', [TrafficController::class, 'create']);
Route::get('/traffic/{traffic}', [TrafficController::class, 'show']);
Route::get('/traffic/{traffic}/edit', [TrafficController::class, 'edit']);
Route::patch('/traffic/{traffic}', [TrafficController::class, 'update']);

//Livewire traffic
Route::get('/t/create', [TrafficController::class, 'createnew']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
