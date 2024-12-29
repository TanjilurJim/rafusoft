<?php
use App\Http\Controllers\DirController;
use App\Http\Controllers\EnquireController;

Route::middleware(['dir'])->group(function () {
    Route::get('/dashboard/dir/create', [DirController::class,'create']);
    Route::post('/dashboard/dir/create', [DirController::class,'create_store']);
    Route::get('/dashboard/dir/list', [DirController::class,'list']);
    Route::get('/dashboard/dir/enquires', [DirController::class,'enquires']);
    Route::delete('/dasboard/enquire/delete/{id}', [EnquireController::class,'delete_enquire']);
    Route::get('/dashboard/dir/enquires/{id}', [EnquireController::class,'view']);


    Route::post('/dashboard/dir/updated-status/{id}', [DirController::class,'update']);
    Route::get('/dashboard/dir/edit/{id}', [DirController::class,'edit']);
    Route::post('/dashboard/dir/edit/{id}', [DirController::class,'edit_store']);
    Route::delete('/dashboard/dir-delete/{id}', [DirController::class,'delete_dir']);

    Route::get('/dashboard/preview/dir/{slug}', [DirController::class,'preview']);
    
    
    Route::get('/dashboard/dir/faq/{id}', [DirController::class,'faq']);
    Route::get('/dashboard/dir/faq/edit/{id}/{dir_id}', [DirController::class,'faq_update']);
    Route::post('/dashboard/dir/faq/edit/{id}/{dir_id}', [DirController::class,'faq_update_store']);
    Route::post('/dashboard/dir/faq/{id}', [DirController::class,'faq_store']);
    Route::delete('/dashboard/dir/faq-delete/{id}', [DirController::class,'faq_delete']);
    Route::post('/dashboard/dir/faq/toggle/{id}', [DirController::class,'toggle_status']);
    Route::post('/dashboard/dir/pop-up/toggle/{id}', [DirController::class,'toggle_status_popup']);

    Route::get('/dashboard/dir/pop-up/{id}', [DirController::class,'pop_up']);
    Route::post('/dashboard/dir/pop-up/{id}', [DirController::class,'pop_up_store']);
    
    Route::get('/dashboard/dir/user/files', [DirController::class,'files']);
    Route::get('/dashboard/dir/user/files/{file}', [DirController::class,'files_upload']);
    Route::post('/dashboard/dir/user/files/{file}', [DirController::class,'files_upload_store']);



    Route::post('/dashboard/dir/file/rename/{file}', [DirController::class,'rename']);
    Route::post('/dashboard/file/delete/{file}', [DirController::class, 'delete']);
});