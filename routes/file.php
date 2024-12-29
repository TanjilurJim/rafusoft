<?php
use App\Http\Controllers\DirImageController;
use App\Http\Controllers\FaviconController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\IconController;
use App\Http\Controllers\OgImageController;
use App\Http\Controllers\PNGController;
use App\Http\Controllers\PublisherImageController;
use App\Http\Controllers\RefImageController;
use App\Http\Controllers\SchemaImageController;
use App\Http\Controllers\StaticImageController;



Route::middleware(['file'])->group(function () {

    Route::get('/dashboard/file/icon', [IconController::class, 'index']);
    Route::post('/dashboard/file/icon', [IconController::class, 'store']);
    Route::post('/dashboard/file/icon/rename', [IconController::class, 'rename']);
    Route::post('/dashboard/file/icon/delete', [IconController::class, 'delete']);
    // og image 

    Route::get('/dashboard/file/og-image', [OgImageController::class, 'index']);
    Route::post('/dashboard/file/og-image', [OgImageController::class, 'store']);
    Route::post('/dashboard/file/og_image/rename', [OgImageController::class, 'rename']);
    Route::post('/dashboard/file/og_imge/delete', [OgImageController::class, 'delete']);

    // schema_image
    Route::get('/dashboard/file/schema-image', [SchemaImageController::class, 'index']);
    Route::post('/dashboard/file/schema-image', [SchemaImageController::class, 'store']);
    Route::post('/dashboard/file/schema-image/rename', [SchemaImageController::class, 'rename']);
    Route::post('/dashboard/file/schema-image/delete', [SchemaImageController::class, 'delete']);

    // publisher logo 
    Route::get('/dashboard/file/publisher-image', [PublisherImageController::class, 'index']);
    Route::post('/dashboard/file/publisher-image', [PublisherImageController::class, 'store']);
    Route::post('/dashboard/file/publisher-image/rename', [PublisherImageController::class, 'rename']);
    Route::post('/dashboard/file/publisher-image/delete', [PublisherImageController::class, 'delete']);

    // publisher logo 
    Route::get('/dashboard/file/favicon', [FaviconController::class, 'index']);
    Route::post('/dashboard/file/favicon', [FaviconController::class, 'store']);
    Route::post('/dashboard/file/favicon/rename', [FaviconController::class, 'rename']);
    Route::post('/dashboard/file/favicon/delete', [FaviconController::class, 'delete']);

    // dir image 
    Route::get('/dashboard/file/dir-image', [DirImageController::class, 'index']);
    Route::post('/dashboard/file/dir-image', [DirImageController::class, 'store']);
    Route::post('/dashboard/file/dir-image/rename', [DirImageController::class, 'rename']);
    Route::post('/dashboard/file/dir-image/delete', [DirImageController::class, 'delete']);

    // ref image 
    Route::get('/dashboard/file/ref-image', [RefImageController::class, 'index']);
    Route::post('/dashboard/file/ref-image', [RefImageController::class, 'store']);
    Route::post('/dashboard/file/ref-image/rename', [RefImageController::class, 'rename']);
    Route::post('/dashboard/file/ref-image/delete', [RefImageController::class, 'delete']);


    // ref image 
    Route::get('/dashboard/file/static-image', [StaticImageController::class, 'index']);
    Route::post('/dashboard/file/static-image', [StaticImageController::class, 'store']);
    Route::post('/dashboard/file/static-image/rename', [StaticImageController::class, 'rename']);
    Route::post('/dashboard/file/static-image/delete', [StaticImageController::class, 'delete']);


    // gallery image 
    Route::get('/dashboard/file/gallery', [GalleryController::class, 'index']);
    Route::post('/dashboard/file/gallery', [GalleryController::class, 'store']);
    Route::post('/dashboard/file/gallery/rename', [GalleryController::class, 'rename']);
    Route::post('/dashboard/file/gallery/delete', [GalleryController::class, 'delete']);



    // PNG 
    Route::get('/dashboard/file/png', [PNGController::class, 'index']);
    Route::post('/dashboard/file/png', [PNGController::class, 'store']);
    Route::post('/dashboard/file/png/rename', [PNGController::class, 'rename']);
    Route::post('/dashboard/file/png/delete', [PNGController::class, 'delete']);
});