<?php
use App\Http\Controllers\PagesController;



Route::get('/privacy-policy', [PagesController::class, 'view_privacy']);
Route::get('/terms-and-conditions', [PagesController::class, 'view_terms']);
Route::get('/refund-policy', [PagesController::class, 'view_refund']);


Route::middleware(['admin'])->group(function () {
    Route::get('/dashboard/pages/privacy-policy', [PagesController::class, 'privacy']);
    Route::post('/dashboard/pages/privacy-policy', [PagesController::class, 'privacy_store']);


    Route::get('/dashboard/pages/terms-and-conditions', [PagesController::class, 'terms']);
    Route::post('/dashboard/pages/terms-and-conditions', [PagesController::class, 'terms_store']);


    Route::get('/dashboard/pages/refund', [PagesController::class, 'refund']);
    Route::post('/dashboard/pages/refund', [PagesController::class, 'refund_store']);

});