<?php
use App\Http\Controllers\ProductController;

Route::get('/product/{slug}', [ProductController::class, 'index']);


Route::middleware(['product'])->group(function () {

    Route::get('/dashboard/product/setting', [ProductController::class, 'setting']);
    Route::post('/dashboard/product/setting', [ProductController::class, 'setting_store']);
    

    Route::post('/dashboard/product/setting/privacy-policy', [ProductController::class, 'privacy']);
    Route::get('/dashboard/product/setting/privacy-policy', [ProductController::class, 'privacy_view']);
    Route::post('/dashboard/product/setting/terms', [ProductController::class, 'terms']);
    Route::get('/dashboard/product/setting/terms', [ProductController::class, 'terms_view']);
    Route::post('/dashboard/product/setting/refund', [ProductController::class, 'refund']);
    Route::get('/dashboard/product/setting/refund', [ProductController::class, 'refund_view']);




    Route::get('/dashboard/product', [ProductController::class, 'create']);
    Route::post('/dashboard/product', [ProductController::class, 'store']);
    Route::get('/dashboard/product/list', [ProductController::class, 'show']);
    Route::get('/dashboard/product/edit/{id}', [ProductController::class, 'edit']);
    Route::post('/dashboard/product/edit/{id}', [ProductController::class, 'Update_store']);
    Route::delete('/dashboard/product/delete/{id}', [ProductController::class, 'delete']);
    
    Route::get('/dashboard/product/review/{id}', [ProductController::class, 'review']);
    Route::post('/dashboard/product/review/{id}', [ProductController::class, 'review_store']);


    Route::get('/dashboard/product/review/edit/{product_id}/{id}', [ProductController::class, 'review_edit']);
    Route::post('/dashboard/product/review/edit/{product_id}/{id}', [ProductController::class, 'review_edit_store']);
    Route::delete('/dashboard/product/review/delete/{id}', [ProductController::class, 'review_delete']);
    
    
    Route::get('/dashboard/product/enquirelist', [ProductController::class, 'enquirelist']);
    Route::delete('/dashboard/product/enquirelist/delete/{id}', [ProductController::class, 'enquirelist_delete']);


    Route::get('/dashboard/product/faq/{id}', [ProductController::class, 'faq']);
    Route::post('/dashboard/product/faq/{id}', [ProductController::class, 'faq_store']);
    
    Route::get('/dashboard/product/faq/{product_id}/{id}', [ProductController::class, 'faq_edit']);
    Route::post('/dashboard/product/faq/{product_id}/{id}', [ProductController::class, 'faq_update_store']);
    Route::delete('/dashboard/product/faq/delete/{id}', [ProductController::class, 'faq_delete']);
});


Route::get('/product/privacy-policy/{id}', [ProductController::class, 'privacy_view_client']);
Route::get('/product/terms-and-condition/{id}', [ProductController::class, 'terms_view_client']);
Route::get('/product/refund-policy/{id}', [ProductController::class, 'refund_view_client']);


Route::post('/product/emquire/{slug}/{id}', [ProductController::class, 'enquire']);