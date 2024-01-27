<?php

use App\Http\Controllers\Api\MessageController;
use Illuminate\Support\Facades\Route;

Route::prefix('messages')->name('messages.')->group(function () {
    Route::post('/', [MessageController::class, 'store'])->name('store');
});
