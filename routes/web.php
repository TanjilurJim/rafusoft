<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FrontEndController;

Route::fallback(function () {
    return response()->view('error.404', [], 404);
});


Route::get('/host', [FrontEndController::class, 'rafuHost']);
Route::get('/view_as_pdf', [DashboardController::class, 'view_as_pdf']);



Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
});


Route::middleware(['admin'])->group(function () {
Route::get('/clear-route-cache', [DashboardController::class, 'clearRouteCache'])->name('clear.route.cache');

Route::get('/dashboard/sitemap', [SitemapController::class, 'index']);
Route::post('/dashboard/sitemap', [SitemapController::class, 'store']);
Route::post('/export-sitemap', [SitemapController::class, 'export'])->name('export.sitemap');
Route::post('/dashboard/delete-sitemap/{id}', [SitemapController::class, 'delete']);
Route::get('/dashboard/menu', [MenuController::class,'index']);
});


Route::get('/sitemap.xml', [SitemapController::class,'show']);



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/file.php';
require __DIR__.'/static.php';
require __DIR__.'/ref.php';
require __DIR__.'/dir.php';
require __DIR__.'/download.php';
require __DIR__.'/inbox.php';
require __DIR__.'/page.php';
require __DIR__.'/team.php';
require __DIR__.'/gallery.php';
require __DIR__.'/tools.php';
require __DIR__.'/product.php';
require __DIR__.'/invoice.php';
require __DIR__.'/userpermission.php';
require __DIR__.'/subscribe.php';
