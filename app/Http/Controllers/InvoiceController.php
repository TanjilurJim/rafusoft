<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceAccount;
use App\Models\InvoiceList;
use App\Models\PartialInvoice;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::where('email', auth()->user()->email)->get();
        $profile = InvoiceAccount::where('email', auth()->user()->email)->first();
        return view("dashboard.invoice.index", compact('invoices', 'profile'));
    }



    public function my_invoice_profile()
    {
        $profile = InvoiceAccount::where('email', auth()->user()->email)->first();
        return view("dashboard.invoice.account", compact('profile'));
    }


    public function my_invoice_profile_create()
    {
        return view("dashboard.invoice.my_invoice_profile_create");
    }



    public function my_invoice_profile_Edit()
    {
        $profile = InvoiceAccount::where('email', auth()->user()->email)->first();
        return view('dashboard.invoice.profile_edit', compact('profile'));
    }


    public function my_invoice_profile_save(Request $request)
    {

        $request->validate([
            "from" => "required",
            "notes" => "required",
            "terms" => "required",
        ]);


        $invoiceaccount = new InvoiceAccount();
        $invoiceaccount->logo = $request->input('logo');
        $invoiceaccount->email = auth()->user()->email;
        $invoiceaccount->from = $request->input('from');
        $invoiceaccount->notes = $request->input('notes');
        $invoiceaccount->terms = $request->input('terms');
        $invoiceaccount->save();

        return redirect('/dashboard/invoice')->with('Success', "Profile Created Successfull");

    }
    public function my_invoice_profile_Edit_store(Request $request)
    {

        if ($request->input('logo')) {
            $file = $request->input("logo");

            $invoiceaccount = InvoiceAccount::where('email', auth()->user()->email)->first();
            $invoiceaccount->logo = $file;
            $invoiceaccount->email = auth()->user()->email;
            $invoiceaccount->from = $request->input('from');
            $invoiceaccount->notes = $request->input('notes');
            $invoiceaccount->terms = $request->input('terms');
            $invoiceaccount->save();
        } else {
            $filePath = null;
            $invoiceaccount = InvoiceAccount::where('email', auth()->user()->email)->first();
            $invoiceaccount->email = auth()->user()->email;
            $invoiceaccount->from = $request->input('from');
            $invoiceaccount->notes = $request->input('notes');
            $invoiceaccount->terms = $request->input('terms');
            $invoiceaccount->save();
        }
        return redirect('/dashboard/invoice')->with('Success', "Profile Created Successfull");

    }



    function generateRandomString($length = 4) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        
        return $randomString;
    }


    public function create(Request $request)
    {

        $validate = $request->validate([
            "name" => "required",
            "phone" => "required"
        ]);


        $invoice = Invoice::where('phone', $request->input('phone'))->where('email', auth()->user()->email)->first();


        if ($invoice) {
            return redirect()->back()->with('error', 'This Phone already used');
        }


        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        
        for ($i = 0; $i < 4; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }


        $formattedDate = date("F j, Y");
        $invoice = new Invoice();
        $invoice->_id = $randomString;
        $invoice->name = $request->input('name');
        $invoice->email = auth()->user()->email;
        $invoice->u_email = $request->input('email');
        $invoice->phone = $request->input('code') . $request->input('phone');
        $invoice->total = 0;
        $invoice->paid = 0;
        $invoice->due = 0;
        $invoice->status = "No Transactions";
        $invoice->issu_date = $formattedDate;
        $invoice->save();
        return redirect()->back()->with('success', 'Invoice Created Successfull');
    }


    public function update_invoice($id)
    {
        $invoice = Invoice::find($id);
        return view('dashboard.invoice.editclient', compact('invoice'));
    }


    public function update_invoice_store($id, Request $request)
    {
        $invoice = Invoice::find($id);
        $invoice->name = $request->input('name');
        $invoice->phone = $request->input('code').$request->input('phone');
        $invoice->currency = $request->input('currency');
        $invoice->u_email = $request->input('email');
        $invoice->save();
        return redirect("/dashboard/invoice")->with('success', 'Invoice Created Successfull');
    }



    public function create_invoice($id)
    {
        $invoice = InvoiceAccount::where('email', auth()->user()->email)->firstOrFail();
        $client = Invoice::find($id);
        return view('dashboard.invoice.create', compact('invoice', 'client'));
    }



    public function viewInvoice($id)
    {
        $invoice = InvoiceList::where('user_id', $id)->get();
        $client = Invoice::find($id);
        return view('dashboard.invoice.list', compact('invoice', 'client'));
    }



    public function store_a_invoice($id, Request $request)
    {


        $user = Invoice::find($id);
        $user->total = $user->total + $request->input('total');
        $user->due = $user->due + $request->input('due');
        $user->paid = $user->paid + $request->input('paid_value');
        $user->save();

        $profile = InvoiceAccount::where('email', auth()->user()->email)->first();
        $profile->invoice_id = $profile->invoice_id + 1;
        $profile->save();


        $invoice = new InvoiceList();
        $invoice->invoice_id = $request->input('invoice_id');
        $invoice->product = $request->input('product');
        $invoice->user_id = $id;
        $invoice->creator_email = auth()->user()->email;
        $invoice->logo_path = $request->input('logo');
        $invoice->form = $request->input('form');
        $invoice->billto_value = $request->input('billto_value');
        $invoice->billto_text = $request->input('billto_text');
        $invoice->shiftto_value = $request->input('shiftto_value');
        $invoice->shiftto_text = $request->input('shiftto_text');
        $invoice->date_text = $request->input('date_text');
        $invoice->date_value = $request->input('date_value');
        $invoice->payment_term_value = $request->input('payment_term_value');
        $invoice->payment_term_text = $request->input('payment_term_text');
        $invoice->due_date_value = $request->input('due_date_value');
        $invoice->due_date_text = $request->input('due_date_text');
        $invoice->tax_text = $request->input('tax_text');
        $invoice->tax_value = $request->input('tax_value');
        $invoice->tax_type = $request->input('tax_type');
        $invoice->discount_type = $request->input('discount_type');
        $invoice->discount_text = $request->input('discount_text');
        $invoice->discount_value = $request->input('discount_value');
        $invoice->shiping_text = $request->input('shiping_text');
        $invoice->shiping_value = $request->input('shiping_value');
        $invoice->total_text = $request->input('total_text');
        $invoice->paid_text = $request->input('paid_text');
        $invoice->paid_value = $request->input('paid_value');
        $invoice->total = $request->input('total');
        $invoice->sub_total = $request->input('sub_total');
        $invoice->due_text = $request->input('due_text');
        $invoice->due = $request->input('due');
        $invoice->note_text = $request->input('note_text');
        $invoice->note_value = $request->input('note_value');
        $invoice->term_text = $request->input('term_text');
        $invoice->term_value = $request->input('term_value');
        $invoice->save();

        return redirect('/dashboard/invoice')->with('success', "Payment  Successfull");

    }


    public function invoice_view($id, Request $request)
    {

        $partial_number_length = $request->input('partial');

        if (empty($partial_number_length)) {
            $partial_number = [];
        } else {
            $partial_number = PartialInvoice::where('invoice_id', $id)->take($partial_number_length)->get();
        }
        $partial = PartialInvoice::where('invoice_id', $id)->get();
        $status = PartialInvoice::where('invoice_id', $id)->latest()->first();
        $partial_date = PartialInvoice::where('partial_length', $partial_number_length)->first();
        $invoice = InvoiceList::find($id);
        return view('dashboard.invoice.view', compact('invoice', 'partial', 'status', 'partial_number', 'partial_date'));
    }


    public function partial_view($id, Request $request)
    {

        $partial = PartialInvoice::where('invoice_id', $id)->get();
        $status = PartialInvoice::where('invoice_id', $id)->latest()->first();
        $invoicelist = InvoiceList::find($id);
        $client = Invoice::find($invoicelist->user_id);

        return view('dashboard.invoice.partial_list', compact('invoicelist', 'invoicelist', 'client', 'partial'));
    }


    public function mail_due(Request $request){
        $name = $request->input('name');
        $email = $request->input('email');
        $curr = $request->input('currency');
        $due = $request->input('due');


        $message = "Dear $name, your current due $due $curr . please close your due. Thanks for staying with us.";

        Mail::raw($message, function ($message) use ($email) {
            $message->to($email)
                    ->subject('Payment Due Notice');
        });

        return redirect()->back()->with('success', "Mail Sent Successfull");
    }


    public function download_all($id, Request $request)
    {

        $partial = PartialInvoice::where('invoice_id', $id)->get();
        $status = PartialInvoice::where('invoice_id', $id)->latest()->first();
        $invoicelist = InvoiceList::find($id);
        $client = Invoice::find($invoicelist->user_id);
        $invoice = InvoiceList::find($id);
        return view('dashboard.invoice.download', compact('invoicelist', 'invoicelist', 'client', 'partial', 'invoice'));
}





    public function invoice_view_partial($id, $partial)
    {
        $partial = PartialInvoice::where('invoice_id', $id)->get();
        $status = PartialInvoice::where('invoice_id', $id)->latest()->first();
        $invoice = InvoiceList::find($id);
        return view('dashboard.invoice.view', compact('invoice', 'partial', 'status'));
    }



    public function partial_pay($id)
    {
        $invoice = InvoiceList::find($id);
        return view('dashboard.invoice.partialpay', compact('invoice'));
    }



    public function delete_invoice($id)
    {
        $invoice = InvoiceList::where('id', $id)->where('creator_email', auth()->user()->email)->first();


        if (!$invoice->refund) {
            $clientData = Invoice::where('id', $invoice->user_id)->first();
            $clientData->paid = $clientData->paid - $invoice->paid_value;
            $clientData->due = $clientData->due - $invoice->due;
            $clientData->total = $clientData->total - $invoice->total;
            $clientData->save();
        }


        PartialInvoice::where('invoice_id', $invoice->id)->delete();



        if ($invoice) {
            $invoice->delete();
            return redirect()->back()->with('success', "Invoice Delete Successful");
        } else {
            return redirect()->back()->with('error', "Invoice Not Found");
        }
    }
    public function delete_invoice_client($id)
    {
        $invoice = Invoice::where('id', $id)->where('email', auth()->user()->email)->first();

        if ($invoice) {
            $invoice->delete();
            return redirect()->back()->with('success', "Invoice Delete Successful");
        } else {
            return redirect()->back()->with('error', "Invoice Not Found");
        }
    }



    public function refund($id)
    {
        $invoice = InvoiceList::where('id', $id)->where('creator_email', auth()->user()->email)->first();
        $clientData = Invoice::where('id', $invoice->user_id)->first();
        $clientData->paid = $clientData->paid - $invoice->paid_value;
        $clientData->due = $clientData->due - $invoice->due;
        $clientData->total = $clientData->total - $invoice->total;
        $clientData->save();

        $invoice->refund = true;
        $invoice->save();

        return redirect()->back()->with('success', "Refund Update successfull");
    }




    public function partial_save($id, $user_id, Request $request)
    {

        $validate = $request->validate([
            "pay_date" => "required"
        ]);


        $cr = $request->input('currency');

        $clientInvoice = Invoice::where('id', $user_id)->first();
        $invoicelist = InvoiceList::find($id);

        $invoice = new PartialInvoice();
        $invoice->invoice_id = $id;
        $invoice->partial_pay = $request->input('partial_pay');
        $invoice->current_due = $request->input('current_due');
        $invoice->payment_status = $request->input('payment_status');
        $invoice->partial_text = $request->input('partial_text');
        $invoice->partial_length = $request->input('partial_length');
        $invoice->pay_date = $request->input('pay_date');
        $invoice->save();
        $clientInvoice->due = $clientInvoice->due - $request->input('partial_pay');
        $clientInvoice->paid = $clientInvoice->paid + $request->input('partial_pay');
        $clientInvoice->save();


        $invoicelist->paid_value = $invoicelist->paid_value + $request->input('partial_pay');
        $invoicelist->due = $invoicelist->due - $request->input('partial_pay');
        $invoicelist->partial_type = $invoicelist->partial_type + 1;
        $invoicelist->save();
        return redirect("/dashboard/invoice/partial-view/$id")->with('success', "Payment Successfull Successful");
    }



    public function downloadPDF()
    {
        $clients = Invoice::where('email', auth()->user()->email)->get();

        $data = [
            'clients' => $clients
        ];

        $pdf = Pdf::loadView('dashboard.invoice.client_data', $data);
        return $pdf->download('client_data.pdf');
    }

}
