<?php
use App\Http\Controllers\InvoiceController;


Route::middleware(['invoice'])->group(function () {
    Route::get('/dashboard/invoice', [InvoiceController::class, 'index']);
    Route::get('/dashboard/my-invoice-profile', [InvoiceController::class, 'my_invoice_profile']);  
    Route::get('/dashboard/my-invoice-profile/create', [InvoiceController::class, 'my_invoice_profile_create']); 
    Route::post('/dashboard/my-invoice-profile/create', [InvoiceController::class, 'my_invoice_profile_save']); 
    Route::get('/dashboard/my-invoice-profile/edit', [InvoiceController::class, 'my_invoice_profile_Edit']); 
    Route::post('/dashboard/my-invoice-profile/edit', [InvoiceController::class, 'my_invoice_profile_Edit_store']); 

    Route::post('/dashboard/invoice', [InvoiceController::class, 'create']);
    Route::get('/dashboard/invoice/edit/{id}', [InvoiceController::class, 'update_invoice']);
    Route::post('/dashboard/invoice/edit/{id}', [InvoiceController::class, 'update_invoice_store']);



    Route::post('/dashboard/invoice/view/refund/{id}', [InvoiceController::class, 'refund']);

    Route::post('/dashboard/due-notice', [InvoiceController::class, 'mail_due']);

    
    Route::get('/dashboard/invoice/view/{id}', [InvoiceController::class, 'viewInvoice']);
    Route::get('/dashboard/invoice/create/{id}', [InvoiceController::class, 'create_invoice']);
    Route::post('/dashboard/invoice/create/{id}', [InvoiceController::class, 'store_a_invoice']);

    Route::get('/dashboard/invoice/single-view/{id}', [InvoiceController::class, 'invoice_view']);
    Route::get('/dashboard/invoice/partial-view/{id}', [InvoiceController::class, 'partial_view']);
    Route::get('/dashboard/invoice/partial-view/download/{id}', [InvoiceController::class, 'download_all']);



    Route::get('/dashboard/invoice/partial-pay/{id}/{user_id}', [InvoiceController::class, 'partial_pay']);
    Route::delete('/dashboard/invoice/delete/{id}', [InvoiceController::class, 'delete_invoice']);
    Route::delete('/dashboard/client/delete/{id}', [InvoiceController::class, 'delete_invoice_client']);
    // partial invoice create 

    Route::get('/dashboard/client/download', [InvoiceController::class, 'downloadPDF'])->name('client.downloadPDF');
    
    Route::post('/dashboard/invoice/partial-pay/{id}/{user_id}', [InvoiceController::class, 'partial_save']);
});


Route::get('/invoice/download/{id}', [InvoiceController::class, 'download_all']);