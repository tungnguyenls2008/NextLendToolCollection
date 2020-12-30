<?php

use App\Http\Controllers\FormController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::get('/form-builder', function () {
    return view('tools.form_builder.create');
})->middleware(['auth'])->name('form-builder');
Route::get('/forms', [FormController::class,'index'])->middleware(['auth'])->name('forms');
Route::get('/new-data/{id}', [FormController::class,'show'])->middleware(['auth'])->name('new_data');
Route::post('/save_form',[FormController::class,'saveJsonFromFormBuilder'])->middleware(['auth'])->name('save_form');

require __DIR__.'/auth.php';
