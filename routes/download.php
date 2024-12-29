<?php
use App\Http\Controllers\DownloadFromController;


Route::middleware(['admin'])->group(function () {
    Route::get('/dashboard/download-from/add', [DownloadFromController::class, 'add']);
    Route::post('/dashboard/download-from/add', [DownloadFromController::class, 'store']);
    Route::get('/dashboard/download-from/list', [DownloadFromController::class, 'list']);
    Route::get('/dashboard/download-from/edit/{id}', [DownloadFromController::class, 'edit']);
    Route::post('/dashboard/download-from/edit/{id}', [DownloadFromController::class, 'edit_store']);
    Route::delete('/dashboard/downloadfrom-delete/{id}', [DownloadFromController::class, 'download_ddelete']);
});


Route::get('/download-form', [DownloadFromController::class, 'index']);