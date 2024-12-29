<?php 
use App\Http\Controllers\DomainCheckerController;
use App\Http\Controllers\ToolsController;
use Illuminate\Support\Facades\Storage;

Route::get('/tools/domain-checker', [DomainCheckerController::class, 'index']);
Route::get('/tools/qr-code', [ToolsController::class, 'qrcode'])->name('tools.qrcode');
Route::get('/tools/qr-code-scanner', [ToolsController::class, 'qrcodeScanner'])->name('tools.qrcodeScanner');
Route::get('/tools/qr-code-show', [ToolsController::class, 'showQRCode'])->name('tools.qrcodeShow');
// Route::post('/tools/qr-code', [ToolsController::class, 'generateQrCode'])->name('tools.qrcode.generate');
Route::post('/tools/domain-checker', [DomainCheckerController::class, 'check']);

Route::post('/save-qr-code', function (\Illuminate\Http\Request $request) {
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $path = $image->storeAs('assets/img/qr-code-image', 'qr-code-' . time() . '.png', 'public');

        return response()->json(['success' => true, 'path' => asset('storage/' . $path)]);
    }

    return response()->json(['success' => false, 'message' => 'No image uploaded']);
});