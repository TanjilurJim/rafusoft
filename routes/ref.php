<?php
use App\Http\Controllers\RefpageController;

Route::middleware(['ref'])->group(function () {

    Route::get('/dashboard/ref/create', [RefpageController::class, 'create']);
    Route::get('/dashboard/ref/list', [RefpageController::class, 'ref_list']);
    Route::post('/dashboard/ref/create', [RefpageController::class, 'create_store']);
    Route::get('/dashboard/ref/category', [RefpageController::class, 'category']);
    Route::post('/dashboard/ref/category', [RefpageController::class, 'category_store']);
    Route::get('/dashboard/ref/edit/{id}', [RefpageController::class, 'category_edit']);
    Route::post('/dashboard/ref/edit/{id}', [RefpageController::class, 'category_edit_store']);
    Route::delete('/dashboard/ref/caregory-delete/{id}', [RefpageController::class, 'category_ddelete']);
    Route::post('/dashboard/ref/updated-status/{id}', [RefpageController::class, 'update']);
    Route::get('/dashboard/ref/edit-content/{id}', [RefpageController::class, 'edit']);
    Route::post('/dashboard/ref/edit-content/{id}', [RefpageController::class, 'edit_store']);
    Route::delete('/dashboard/ref-delete/{id}', [RefpageController::class, 'delete_ref']);
    Route::get('/dashboard/preview/ref/{slug}', [RefpageController::class,'preview']);


    Route::get('/dashboard/ref/faq/{id}', [RefpageController::class,'faq']);
    Route::get('/dashboard/ref/faq/edit/{id}/{ref_id}', [RefpageController::class,'faq_update']);
    Route::post('/dashboard/ref/faq/edit/{id}/{ref_id}', [RefpageController::class,'faq_update_store']);
    Route::post('/dashboard/ref/faq/{id}', [RefpageController::class,'faq_store']);
    Route::delete('/dashboard/ref/faq-delete/{id}', [RefpageController::class,'faq_delete']);
    Route::post('/dashboard/ref/faq/toggle/{id}', [RefpageController::class,'toggle_status']);


    Route::post('/dashboard/ref/pop-up/toggle/{id}', [RefpageController::class,'toggle_status_popup']);

    Route::get('/dashboard/ref/pop-up/{id}', [RefpageController::class,'pop_up']);
    Route::post('/dashboard/ref/pop-up/{id}', [RefpageController::class,'pop_up_store']);

});