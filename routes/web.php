<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\ConnectionController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\MemoController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ShareController;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Passwords\Confirm;
use App\Http\Livewire\Auth\Passwords\Email;
use App\Http\Livewire\Auth\Passwords\Reset;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\Verify;
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

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)
        ->name('login');

    Route::get('register', Register::class)
        ->name('register');
});

Route::get('password/reset', Email::class)
    ->name('password.request');

Route::get('password/reset/{token}', Reset::class)
    ->name('password.reset');

Route::get('share/{memo}',[ShareController::class, 'show'])->name('share');
Route::get('export/{memo}',[ExportController::class, 'show'])->name('export.show');

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return redirect()->route('memos.index');
    })->name('home');

    Route::get('help', function () {
        return view('help');
    })->name('help');

    Route::resource('memos', MemoController::class);
    Route::get('memosAddUser/{user}/{memo}', [MemoController::class, 'addUser'])->name('add_user');
    Route::get('memosRemoveUser/{user}/{memo}', [MemoController::class, 'removeUser'])->name('remove_user');
    Route::resource('connections', ConnectionController::class)->only(['index']);
    Route::post('connections/{user}', [ConnectionController::class, 'store'])->name('connections.store');
    Route::delete('connections/{user}', [ConnectionController::class, 'destroy'])->name('connections.destroy');

    Route::get('email/verify', Verify::class)
        ->middleware('throttle:6,1')
        ->name('verification.notice');

    Route::get('password/confirm', Confirm::class)
        ->name('password.confirm');

    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

    Route::get('logout', LogoutController::class)
        ->name('logout');

    Route::get('export',[ExportController::class, 'index'])->name('export');

    Route::get('search',[SearchController::class, 'show'])->name('search');
    Route::get('searchConnections',[SearchController::class, 'showConnections'])->name('searchConnections');
});
