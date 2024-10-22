<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\ResultController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\QuestionController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
    // Route::get('/client/index', function () {
    //     return view('client.index');
    // })->name('client.index');
    // Route::get('/admin/options/create', function () {
    //     return view('admin.options.create');
    // })->name('admin.options.create');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
// category
Route::resource('categories', CategoryController::class);
Route::get('/admin/categories/index', [CategoryController::class, 'index'])->name('admin.categories.index');
Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
Route::post('/admin/categories/store', [CategoryController::class, 'store'])->name('admin.categories.store');
Route::get('admin/categories/{id}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
Route::delete('admin/categories/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
Route::put('admin/categories/{id}', [CategoryController::class, 'update'])->name('admin.categories.update');

// questions
Route::resource('questions', QuestionController::class);
Route::get('/admin/questions/index', [QuestionController::class, 'index'])->name('admin.questions.index');
Route::get('/admin/questions/create', [QuestionController::class, 'create'])->name('admin.questions.create');
Route::post('/admin/questions/store', [QuestionController::class, 'store'])->name('admin.questions.store');
Route::get('admin/questions/{id}/edit', [QuestionController::class, 'edit'])->name('admin.questions.edit');
Route::delete('admin/questions/{id}', [QuestionController::class, 'destroy'])->name('admin.questions.destroy');
Route::put('admin/questions/{id}', [QuestionController::class, 'update'])->name('admin.questions.update');

// options
Route::resource('options', OptionController::class);
Route::get('/admin/options/index', [OptionController::class, 'index'])->name('admin.options.index');
Route::get('/admin/options/create', [OptionController::class, 'create'])->name('admin.options.create');
Route::post('/admin/options/store', [OptionController::class, 'store'])->name('admin.options.store');
Route::get('admin/options/{id}/edit', [OptionController::class, 'edit'])->name('admin.options.edit');
Route::delete('admin/options/{id}', [OptionController::class, 'destroy'])->name('admin.options.destroy');
Route::put('admin/options/{id}', [OptionController::class, 'update'])->name('admin.options.update');

// results
Route::get('/admin/results/index', [ResultController::class, 'index'])->name('admin.results.index');
Route::get('/admin/results/show/{id}', [ResultController::class, 'show'])->name('admin.results.show');
Route::delete('/admin/results/{id}', [ResultController::class, 'destroy'])->name('admin.results.destroy');

});

Route::get('client/index', [\App\Http\Controllers\ResultController::class, 'index'])->name('client.index');


// test
Route::get('dashboard', [TestController::class, 'index'])->name('dashboard');
Route::post('dashboard', [TestController::class, 'store'])->name('client.test.store');
Route::get('results/{result_id}', [\App\Http\Controllers\ResultController::class, 'show'])->name('client.results.show');


