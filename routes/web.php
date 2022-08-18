<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController as HomeCon;
use App\Http\Controllers\SystemController as SystemCon;
use App\Http\Controllers\SessionController as SessionCon;

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

Auth::routes();

Route::get('/home', [HomeCon::class, 'index'])->name('home');

//systems
Route::prefix('systems')->name('systems-')->group(function () {
    Route::get('', [SystemCon::class, 'index'])->name('index')->middleware('role:user');
    Route::get('create', [SystemCon::class, 'create'])->name('create')->middleware('role:admin');
    Route::post('', [SystemCon::class, 'store'])->name('store')->middleware('role:admin');
    Route::get('edit/{system}', [SystemCon::class, 'edit'])->name('edit')->middleware('role:admin');
    Route::put('{system}', [SystemCon::class, 'update'])->name('update')->middleware('role:admin');
    Route::delete('{system}', [SystemCon::class, 'destroy'])->name('delete')->middleware('role:admin');
    Route::get('show/{id}', [SystemCon::class, 'show'])->name('show')->middleware('role:user');
    Route::get('show', [SystemCon::class, 'link'])->name('show-route');
});

//sessions
Route::prefix('sessions')->name('sessions-')->group(function () {
    Route::get('', [SessionCon::class, 'index'])->name('index')->middleware('role:user');
    Route::get('create', [SessionCon::class, 'create'])->name('create')->middleware('role:admin');
    Route::post('', [SessionCon::class, 'store'])->name('store')->middleware('role:admin');
    Route::get('edit/{system}', [SessionCon::class, 'edit'])->name('edit')->middleware('role:admin');
    Route::put('{system}', [SessionCon::class, 'update'])->name('update')->middleware('role:admin');
    Route::delete('{system}', [SessionCon::class, 'destroy'])->name('delete')->middleware('role:admin');
    Route::get('show/{id}', [SessionCon::class, 'show'])->name('show')->middleware('role:user');
    Route::get('show', [SessionCon::class, 'link'])->name('show-route');
});