<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ToolsController extends Controller
{
    //
    public function qrcode(){
        return view('ui.tools.qrcode');

    }

    // public function showQRCode(Request $request)
    // {
    //     $qrCodeData = $request->get('qrCode'); // Get the QR code data from the request
    
    //     if (!$qrCodeData || !preg_match('/^data:image\/png;base64,/', $qrCodeData)) {
    //         abort(404, 'QR Code not found or invalid.');
    //     }
    
    //     return view('ui.tools.qrcodeShow', ['qrCode' => $qrCodeData]);
    // }

    public function showQRCode(Request $request)
{
    $data = $request->get('data'); // Get the data for the QR code

    if (!$data) {
        abort(404, 'QR Code data not provided.');
    }

    return view('ui.tools.qrcodeShow', compact('data'));
}

    public function qrcodeScanner(){
        return view('ui.tools.qrcodeScanner');
    }

}
