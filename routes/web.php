<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDetailController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\AssetsController;
use App\Http\Controllers\VerificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// ホーム画面------
// Route::get('/',[HomeController::class,'index'])->name('home.index');

// 支出管理------
Route::get('/record/{userId}',[RecordController::class,'index'])->name('record.index');
Route::get('/record/{userId}/{year}-{month}-{day}',[RecordController::class,'create'])->name('record.create');
Route::post('/record/{userId}/{year}-{month}-{day}',[RecordController::class,'add_label'])->name('record.add_label');
Route::post('/record/{userId}',[RecordController::class,'add_spending'])->name('record.add_spending');
Route::put('/record/{userId}/{year}-{month}-{day}', [RecordController::class, 'update_spending'])->name('record.update_spending');

// 資産管理------
Route::get('/assets/{userId}',[AssetsController::class,'index'])->name('assets.index');
Route::post('/assets/{userId}',[AssetsController::class,'create'])->name('assets.create');
// Route::post('/assets/{userId}',[AssetsController::class,'store'])->name('assets.store');



// 会員登録------
Route::get('/account', [UserController::class, 'index'])->name('user.index');
Route::post('/account/create',[UserController::class,'create']);
Route::post('/account', [UserController::class, 'store'])->name('user.store');
// Route::get('/account', [UserController::class, 'complete'])->name('create.complete');

// 会員情報入力作成------
Route::get('/account/create/detail/{userId}/{email_token}', [UserDetailController::class, 'index'])->name('user.detail.index');
Route::get('/account/create/detail/{userId}/{email_token}', [UserDetailController::class, 'create'])->name('user.detail.create');
Route::post('/account/create/detail/{userId}', [UserDetailController::class, 'store'])->name('user.detail.store');

Route::get('/error', function () {
    return view('users.create.errors');
})->name('user.detail.error');






Route::get('/account/edit', function () {
    return view('users.edit');
});

Route::get('/account/edit', function () {
    return view('users.edit');
});

// Route::get('record', function () {
//     return view('records.record');
// });

Route::get('record/days', function () {
    return view('records.days');
});

Route::get('plan', function () {
    return view('plans.plan');
});


Route::get('plan/sample', function () {
    return view('plans.plan-sample');
});
