<?php

namespace App\Http\Controllers;

use App\Models\Dir;
use App\Models\Invoice;
use App\Models\InvoiceAccount;
use App\Models\InvoiceList;
use App\Models\Ref;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;

use Barryvdh\Snappy\Facades\SnappyPdf as PDF;

class DashboardController extends Controller
{
    public function index(){

        $dir = Dir::all();
        $dir  = count($dir);

        $ref = Ref::all();
        $ref = count($ref);

        $user = User::all();
        $user = count($user);

        $invoice = InvoiceAccount::all();
        $invoice = count($invoice);

        $invoices = Invoice::where('email', auth()->user()->email)->get();
        $invoices = count($invoices); 


        $refund =  InvoiceList::where('creator_email', auth()->user()->email)->where('refund', 1)->get();

        $totalSum = Invoice::where('email', auth()->user()->email)->sum('total');
        $dueSum = Invoice::where('email', auth()->user()->email)->sum('due');

        $today = Carbon::today();

        $todaySum = Invoice::where('email', auth()->user()->email)
                   ->whereDate('created_at', $today)
                   ->sum('total');


        return view("dashboard.index", compact('dir', 'ref', 'user', 'invoice', 'invoices', 'totalSum', 'dueSum', 'todaySum', 'refund'));
    }



    public function clearRouteCache (){
        Artisan::call('cache:clear');
        return redirect()->back()->with('success', 'Cache cleared successfully');
    }





    public function view_as_pdf(){
        $pdf = PDF::loadView('dashboard.invoice.pdf');
        $pdf->setPaper('a4')->setOption('margin-top', 0)->setOption('margin-bottom', 0);
        return $pdf->stream('invoice.pdf');
    }
}
