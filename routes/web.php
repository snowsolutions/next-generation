<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('lead.index');
});
Route::group(['prefix' => 'auth'], function () {
    Route::get('refresh_token', [\Src\Infrastructure\Laravel\Controllers\Auth\RefreshTokenController::class, '__invoke'])->name('auth.refresh_token');
});
Route::group(['prefix' => 'leads'], function () {
    Route::get('/', [\Src\Infrastructure\Laravel\Controllers\Lead\ListController::class, '__invoke'])->name('lead.index');
    Route::get('/delete/{id}', [\Src\Infrastructure\Laravel\Controllers\Lead\DeleteController::class, '__invoke'])->name('lead.delete');
    Route::get('/view/{id}', [\Src\Infrastructure\Laravel\Controllers\Lead\ViewController::class, '__invoke'])->name('lead.view');
    Route::patch('/ajax/update', [\Src\Infrastructure\Laravel\Controllers\Lead\Ajax\UpdateController::class, '__invoke'])->name('lead.ajax.update');
});

Route::group(['prefix' => 'accounts'], function () {
    Route::get('/', [\Src\Infrastructure\Laravel\Controllers\Account\ListController::class, '__invoke'])->name('account.index');
    Route::get('/delete/{id}', [\Src\Infrastructure\Laravel\Controllers\Account\DeleteController::class, '__invoke'])->name('account.delete');
    Route::get('/view/{id}', [\Src\Infrastructure\Laravel\Controllers\Account\ViewController::class, '__invoke'])->name('account.view');
    Route::patch('/ajax/update', [\Src\Infrastructure\Laravel\Controllers\Account\Ajax\UpdateController::class, '__invoke'])->name('account.ajax.update');
});

Route::group(['prefix' => 'campaigns'], function () {
    Route::get('/', [\Src\Infrastructure\Laravel\Controllers\Campaign\ListController::class, '__invoke'])->name('campaign.index');
    Route::get('/delete/{id}', [\Src\Infrastructure\Laravel\Controllers\Campaign\DeleteController::class, '__invoke'])->name('campaign.delete');
    Route::get('/view/{id}', [\Src\Infrastructure\Laravel\Controllers\Campaign\ViewController::class, '__invoke'])->name('campaign.view');
    Route::patch('/ajax/update', [\Src\Infrastructure\Laravel\Controllers\Campaign\Ajax\UpdateController::class, '__invoke'])->name('campaign.ajax.update');
    Route::get('/bulk/insert', [\Src\Infrastructure\Laravel\Controllers\Campaign\InsertBulkViewController::class, '__invoke'])->name('campaign.bulk.insert_view');
    Route::post('/bulk/insert', [\Src\Infrastructure\Laravel\Controllers\Campaign\InsertBulkController::class, '__invoke'])->name('campaign.bulk.insert');
});
