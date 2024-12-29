<?php
use App\Http\Controllers\userController;
Route::middleware(['admin'])->group(function () {
Route::get('/dashboard/user-management', [userController::class, 'index']);
Route::put('/dashboard/user-management/update/{id}', [userController::class, 'update']);
Route::delete('/dashboard/user-management/delete/{id}', [userController::class, 'delete']);
});