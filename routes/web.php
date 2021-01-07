<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\DataPackController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\JoinedFormController;
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
Route::get('/forms', [FormController::class, 'index'])->middleware(['auth'])->name('forms');
Route::get('/joined-forms', [JoinedFormController::class, 'index'])->middleware(['auth'])->name('joined-forms');
Route::get('/new-data/{id}', [FormController::class, 'show'])->middleware(['auth'])->name('new_data');
Route::any('/form-edit/{id}', [FormController::class, 'edit'])->middleware(['auth'])->name('form_edit');
Route::any('/joined-form-edit/{id}', [JoinedFormController::class, 'edit'])->middleware(['auth'])->name('joined_form_edit');
Route::post('/save_form', [FormController::class, 'store'])->middleware(['auth'])->name('save_form');
Route::post('/save_edited_form', [FormController::class, 'saveEditedJsonFromFormBuilder'])->middleware(['auth'])->name('save_edited_form');
Route::post('/save_edited_joined_form', [JoinedFormController::class, 'saveEditedJsonFromFormBuilder'])->middleware(['auth'])->name('save_edited_joined_form');
Route::any('/save_data', [DataController::class, 'store'])->middleware(['auth'])->name('save_data');
Route::get('/data', [DataPackController::class, 'index'])->middleware(['auth'])->name('data');
Route::get('/data-detail/{id}', [DataPackController::class, 'show'])->middleware(['auth'])->name('data_detail');
Route::any('/image_display/{id}',function ($id){
    return asset('uploads/'.$id);
})->name('image_display');
require __DIR__ . '/auth.php';
Route::any('/join-form', [JoinedFormController::class, 'join_form'])->middleware(['auth'])->name('join-form');
