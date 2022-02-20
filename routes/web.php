<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

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
})->name("start-page");

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get('/dashboard/create_invite', [DashboardController::class, 'create_invite'])->middleware(['auth'])->name('dashboard_create_invite');

require __DIR__.'/auth.php';
