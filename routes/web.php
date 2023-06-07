<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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


Route::middleware('auth')->group(function () {

Route::get('/', [AdController::class, 'index'])->name('ads.index');
Route::get('/ads/view/{ad:url}', [AdController::class, 'show'])->name('ads.show');
Route::get('/ads/create', [AdController::class, 'create'])->name('ads.create');
Route::post('/ads', [AdController::class, 'store'])->name('ads.store');
Route::delete('/ads/{ad}/delete', [AdController::class, 'destroy'])->name('ads.destroy');
Route::delete('/ads/{ad}/restore', [AdController::class, 'restore'])->name('ads.restore');
Route::delete('/ads/{ad}/force-delete', [AdController::class, 'forceDelete'])->name('ads.force-delete');


// Route::get('/', [FormController::class, 'index'])->name('forms.index');
Route::get('/forms/{ad:slug}/{form:id}', [ FormController::class, 'show'])->name('forms.show');
// Route::delete('/forms/{form}/delete', [FormController::class, 'destroy'])->name('forms.destroy');

Route::get('/download/{form:id}', [FormController::class, 'download'])->name('download');


});
Route::get('/forms/{ad:url}', [FormController::class, 'create'])->name('forms.create');
Route::post('/forms/{ad}/store', [FormController::class, 'store'])->name('forms.store');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

