<?php
use App\Http\Controllers\CareerController;
use App\Http\Controllers\ContactController;

Route::middleware(['contact'])->group(function () {
    Route::get('/dasboard/inbox/contact', [ContactController::class, 'index']);
    Route::get('/dasboard/inbox/contact/view/{id}', [ContactController::class, 'view']);
    Route::post('/dasboard/inbox/contact/status/{id}', [ContactController::class, 'update']);
    Route::delete('/dasboard/inbox/contact/delete/{id}', [ContactController::class, 'delete']);
    Route::get('/dasboard/inbox/contact/great/{id}/{great}', [ContactController::class, 'great_update']);
    Route::delete('/dasboard/inbox/contact/delete-groupby', [ContactController::class, 'delete_groupby']);
    
    Route::get('/dasboard/inbox/general', [ContactController::class, 'general']);
    Route::get('/dasboard/inbox/general/view/{id}', [ContactController::class, 'generalview']);
    Route::post('/dasboard/inbox/general/status/{id}', [ContactController::class, 'generalupdate']);
    Route::delete('/dasboard/inbox/general/delete/{id}', [ContactController::class, 'generaldelete']);
    Route::get('/dasboard/inbox/general/great/{id}/{great}', [ContactController::class, 'generalgreat_update']);
    Route::delete('/dasboard/inbox/general/delete-groupby', [ContactController::class, 'generaldelete_groupby']);
    

});



//    career 
Route::middleware(['career'])->group(function () {
    Route::get('/dasboard/inbox/career', [CareerController::class, 'index']);
    Route::get('/dasboard/inbox/career/view/{id}', [CareerController::class, 'view']);
    Route::post('/dasboard/inbox/career/status/{id}', [CareerController::class, 'update']);
    Route::delete('/dasboard/inbox/career/delete/{id}', [CareerController::class, 'delete']);
    Route::get('/dasboard/inbox/career/great/{id}/{great}', [CareerController::class, 'great_update']);
    Route::delete('/dasboard/inbox/career/delete-groupby', [CareerController::class, 'delete_groupby_career']);
});

Route::middleware(['quote'])->group(function () {
    Route::get('/dasboard/inbox/quote', [CareerController::class, 'quote_admin']);
    Route::delete('/dasboard/inbox/quote/delete/{id}', [CareerController::class, 'delete_quote']);
    Route::get('/dasboard/inbox/quote/changestatus/{id}', [CareerController::class, 'status_quote']);
    Route::get('/dasboard/inbox/quote/view/{id}', [CareerController::class, 'quote_view']);
    Route::post('/dasboard/inbox/quote/status/{id}', [CareerController::class, 'status_quote']);
    Route::get('/dasboard/inbox/quote/great/{id}/{great}', [CareerController::class, 'great_update_quote']);

    Route::delete('/dasboard/inbox/quote/delete-groupby', [CareerController::class, 'delete_groupby_quote']);
});



Route::get('/get-quote', [CareerController::class, 'quote']);
Route::post('/get-quote', [CareerController::class, 'quote_store']);