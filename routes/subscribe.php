<?php
use App\Http\Controllers\SubscribeController;


Route::middleware('auth')->group(function () {
    Route::get('/dashboard/subscribe', [SubscribeController::class, 'index']);
    Route::post('/dashboard/subscribe', [SubscribeController::class, 'subscribe']);
});
