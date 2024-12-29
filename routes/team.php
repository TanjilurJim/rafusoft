<?php
use App\Http\Controllers\TeamController;


Route::middleware(['admin'])->group(function () {
    Route::get('/dashboard/tean/category', [TeamController::class, 'category']);
    Route::post('/dashboard/tean/category', [TeamController::class, 'category_store']);
    Route::post('/dashboard/team/category/delete/{id}', [TeamController::class, 'delete']);
    Route::get('/dashboard/team/create', [TeamController::class, 'create']);
    Route::post('/dashboard/team/create', [TeamController::class, 'create_store']);
    Route::get('/dashboard/team/team-members', [TeamController::class, 'show']);
    Route::get('/dashboard/team/team-members/edit/{id}', [TeamController::class, 'edit']);
    Route::post('/dashboard/team/team-members/edit/{id}', [TeamController::class, 'edit_store']);
    Route::post('/dashboard/team/team-members/update-status/{id}', [TeamController::class, 'update_status']);


    Route::get('/dashboard/delete/team/{id}', [TeamController::class, 'delete_team']);



    Route::post('/dashboard/team/category/edit/{id}', [TeamController::class, 'updated_category']);
    Route::post('/dashboard/team/category/edit/{id}', [TeamController::class, 'updated_category']);
});