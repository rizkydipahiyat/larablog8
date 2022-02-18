<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/localization/{language}', \App\Http\Controllers\LocalizationController::class)->name('localization.switch');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'register' => false
]);

Route::group(['prefix' => 'dashboard', 'middleware' => ['web', 'auth']], function () {
    // Kenapa hanya '/' saja? Karena sudah disetting pada app/Providers/RouteService.php line 20
    Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index'); // Method 'index' diambil dari function pada DashboardController
});
