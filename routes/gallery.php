<?php
use App\Http\Controllers\GalleryController;

Route::middleware(['admin'])->group(function () {

Route::get('/dashboard/gallery', [GalleryController::class,'create']);
Route::post('/dashboard/gallery', [GalleryController::class,'store_image']);
Route::get('/dashboard/gallery/list', [GalleryController::class,'image_list']);
Route::post('/dashboard/gallery/list/{id}', [GalleryController::class,'update_image']);
Route::post('/dashboard/gallery/list/update-status/{id}', [GalleryController::class,'update_status']);

Route::get('/dashboard/gallery/list/delete/{id}', [GalleryController::class,'delete_gallery']);
});