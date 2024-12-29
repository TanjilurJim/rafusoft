@extends('dashboard.layoutdownload')



@section('meta')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>


    <style>
        textarea{
            color: black !important;

        }

        input{
            color: black !important;
        }
    </style>

@endsection


@php
    $product = json_decode($invoicelist->product, true);
    $index = 1;

    $total_partial_pay = 0;

    foreach ($partial as $payment) {
        $total_partial_pay += $payment->partial_pay;
    }
    $amountPaid = $invoicelist->paid_value - $total_partial_pay;



@endphp




@section('content')
    <style>
        #remove-data {
            visibility: hidden;
        }

        .invoice-data:hover #remove-data {
            visibility: visible;
        }


        textarea {
            width: 100%;
            box-sizing: border-box;
            overflow-y: hidden;
            /* Hide vertical scrollbar */
            overflow-x: hidden;
            /* Hide horizontal scrollbar */
            resize: none;
            /* min-height: 50px; */
            padding: 10px;
            font-size: 16px;
            line-height: 1.5;
        }


        select::-ms-expand {
            display: none;
        }



        @media print {
            @page {
                size: A4;
                margin: 10mm;
            }
            body {
                margin: 0;
                padding: 0;
            }
        }

    </style>



<form class="min-h-[1300px]" id="content-form" enctype="multipart/form-data" method="POST">
    @csrf
    <div id="content" class=" container left-0 bg-white right-0  w-full p-5 mt-3 px-5">
        <div class="flex justify-between items-start">
            <div class="w-1/2">

                <label for="logo"
                    class="h-[80px] w-[200px] flex justify-start overflow-hidden items-start "
                    id="logo-label">
                    <img src="{{ $invoice->logo_path }}" >
                </label>
                <textarea rows="1" id="autoResizeTextarea" name="billto_value"
                    class="resize-none p-2 border-0 focus:outline-none  border-slate-100 w-full  rounded"
                    placeholder="Who is this invoice to? (required)" readonly>{!! $invoice->form !!}</textarea>
            </div>
            <div class="text-end">
                <h2 class="text-xl text-black">INVOICE</h2>
                <div class="mt-3 text-black">{{ $invoice->invoice_id }}</div>
            </div>
        </div>
        <div class="flex justify-between gap-10 mt-4">
            <div class="w-1/3">
                <input type="text" value="Bill To" name="billto_text" readonly
                    class="focus:outline-0  p-2 rounded focus:border hover:border-gray-200 border-white border w-full mb-1">
                <textarea rows="1" id="autoResizeTextarea" name="billto_value" readonly
                    class="resize-none p-2 border-0 focus:outline-none  border-slate-100 w-full  rounded"
                    placeholder="Who is this invoice to? (required)"> {!! $invoice->billto_value !!}</textarea>
            </div>
            <div class="w-1/3">
               @if ( $invoice->shiftto_value)
               <input type="text" value="Shift To" name="shiftto_text" readonly
               class="focus:outline-0  p-2 rounded focus:border hover:border-gray-200 border-white border w-full mb-1">
           <textarea rows="1" name="shiftto_value" readonly
               class="resize-none auto-rows-auto p-2 border-0 focus:outline-none text-black border-slate-100 w-full  rounded"
               placeholder="Optional">{!! $invoice->shiftto_value !!}</textarea>
               @endif
            </div>
            <div class="w-1/3">
                <div class="grid grid-cols-2">
                    <input type="text" name="date_text"
                        class="px-3 rounded border-0 focus:outline-0 border-white hover:border-gray-500"
                        readonly value="{!! $invoice->date_text !!}">
                    <input type="text" name="date_value"
                        class="p-2 border-0 focus:outline-none  border-slate-100  rounded"
                        value="{{ DateTime::createFromFormat('Y-m-d', $invoice->date_value)->format('F j, Y') }}"
                        readonly>
                </div>
                <div class="my-2 grid grid-cols-2">
                    <input type="text" name="payment_term_text"
                        class="px-3 rounded border-0 focus:outline-0 border-white hover:border-gray-500"
                        readonly value="{!! $invoice->payment_term_text !!}">
                    <input type="text" name="payment_term_value"
                        class="p-2 text-black border-0 border-slate-100 w-full  rounded focus:outline-none"
                        readonly value="{!! $invoice->payment_term_value !!}">
                </div>

                <div class="grid grid-cols-2">
                    <input type="text" name="due_date_text" readonly
                        class="px-3 rounded border-0 focus:outline-0 border-white hover:border-gray-500"
                        value="{!! $invoice->due_date_text !!}">
                    <input type="text" name="due_date_value"
                        class="p-2 border-0 focus:outline-none  border-slate-100   rounded"
                        readonly
                        value="{{ DateTime::createFromFormat('Y-m-d', $invoice->due_date_value)->format('F j, Y') }}">
                </div>
            </div>
        </div>
        <div class="mt-5">
            <div>
                <table class="w-full">
                    <thead>
                        <tr>
                            <td class="bg-blue-950 text-white p-2 rounded-l">Item</td>
                            <td class="bg-blue-950 text-white p-2">Quantity</td>
                            <td class="bg-blue-950 text-white p-2">Rate</td>
                            <td class="bg-blue-950 text-white p-2 rounded-r   text-end">Amount</td>
                        </tr>
                    </thead>

                    @foreach ($product as $it)
                        <tr class="border-b">
                            <td>
                                <textarea rows="1" readonly class=" focus:outline-none border-slate-100 w-full   rounded"
                                    placeholder="Description of service or product...">{{ $it['description'] }}</textarea>
                            </td>
                            <td class="w-16"><input value="{{ $it['quantity'] }}  {{ isset($it['type']) ? $it['type'] : "" }}" readonly type="text"
                                    class="p-2 mt-2  focus:outline-none  border-slate-100  rounded"
                                    autocomplete="off"></td>
                            <td class="w-16"><input type="number" readonly value="{{ $it['rate'] }}"
                                    class="p-2 mt-2  focus:outline-none border-slate-100 text-black rounded"
                                    autocomplete="off"></td>
                            <td class="text-end   p-2">
                                <p class="flex justify-end items-center gap-3">
                                    <span>{{ $it['quantity'] * $it['rate'] }}</span>
                                    <span>{{ $client->currency }}</span></p>
                            </td>
                        </tr>
                    @endforeach

                </table>
            </div>
        </div>


        <section class="grid grid-cols-2">

            <div class="flex flex-col items-center justify-center text-xl  text-zinc-300 -rotate-45 w-1/2">
                {{ $invoice->total  ==  $invoice->paid_value ? 'Unpaid' : 'Paid' }}
            </div>

            <div>
                <div class="flex justify-end gap-20 px-2">
                    <p>Sub Total</p>
                    <p class="w-32 text-end flex gap-3 justify-end"><span
                            id="sub-total">{{ $invoice->sub_total }}</span> <span>{{ $client->currency }}</span></p>
                </div>
    
                @if ($invoice->shiping_value > 0)
                    <div class="flex justify-end items-center gap-20 px-2 py-1">
                        <input type="text" name="total_text" readonly
                            class="focus:outline-0   rounded focus:border border text-end border-white hover:border-gray-500"
                            value="{!! $invoice->shiping_text !!}">
                        <p class="w-32 text-end flex gap-3 justify-end"><input value="{!! $invoice->shiping_value !!}"
                                readonly type="text" name="total"
                                class="text-end focus:outline-none bg-white" id="total" readonly>
                            <span>{{ $client->currency }}</span></span></p>
                    </div>
                @endif
                @if ($invoice->discount_value > 0)
                    <div class="flex justify-end items-center gap-20 px-2">
                        <input type="text" name="total_text" readonly
                            class="focus:outline-0   rounded focus:border border text-end  border-white hover:border-gray-500"
                            value="{!! $invoice->discount_text !!}">
                        <p class="w-32 text-end  flex"><input value="{!! $invoice->discount_value !!}" readonly
                                type="number" name="total" class="w-full text-end focus:outline-none bg-white"
                                id="total" readonly> <span
                                class="w-[25px]">{{ $invoice->discount_type }}</span></p>
                    </div>
                @endif
    
                @if ($invoice->tax_value > 0)
                    <div class="flex justify-end items-center gap-20 px-2">
                        <input type="text" name="total_text" readonly
                            class="focus:outline-0   rounded focus:border border text-end  border-white hover:border-gray-500"
                            value="{!! $invoice->tax_text !!}">
                        <p class="w-32 text-end flex"><input value="{!! $invoice->tax_value !!}" readonly
                                type="number" name="total" class="w-full text-end focus:outline-none bg-white"
                                id="total" readonly> <span class="w-[25px]">{{ $invoice->tax_type }}</span>
                        </p>
                    </div>
                @endif
    
                <div class="flex justify-end items-center gap-20 p-2">
                    <input type="text" name="total_text"
                        class="focus:outline-0   rounded focus:border border text-end  border-white hover:border-gray-500"
                        value="{!! $invoice->total_text !!}">
                    <p class="w-32 text-end flex justify-end gap-3"><span>{!! $invoice->total !!}</span>
                        <span>{{ $client->currency }}</span></p>
                </div>
                
                <div class="flex justify-end gap-20 px-2">
                    <input type="text" name="paid_text"
                        class="focus:outline-0  rounded focus:border border text-end  border-white hover:border-gray-500"
                        value="{!! $invoice->paid_text !!}" readonly>
                    <p class="w-32 text-end flex justify-end gap-3"> <span>{!! $invoice->paid_value - $total_partial_pay !!}</span>
                        <span>{{ $client->currency }}</span></p>
                </div>
    
    
    
                <div class="flex justify-end gap-20 px-2">
                    <input name="due_text" type="text"
                        class="focus:outline-0   rounded focus:border border text-end  border-white hover:border-gray-500"
                        value="{!! $invoice->due_text !!}" readonly>
                    <p class="w-32 text-end flex justify-end gap-3">
                        <span>{{ $invoice->due + $total_partial_pay  }}</span>
                        <span>{{ $client->currency }}</span></p>
                </div>
            </div>
        </section>

        


        <div>
            <input type="text" name="note_text" readonly
                class="focus:outline-0 px-2 rounded focus:border font-semibold hover:border-gray-200 border-white border"
                value="{!! $invoice->note_text !!}">
            <textarea rows="1" readonly name="note_value"
                class="border-0 focus:outline-none text-black border-slate-100 w-full  rounded">{!! $invoice->note_value !!}</textarea>
            <input type="text" readonly name="term_text"
                class="focus:outline-0 px-2 rounded font-semibold focus:border hover:border-gray-200 border-white border"
                value="{!! $invoice->term_text !!}">
            <textarea rows="1" readonly name="term_value"
                class="border-0  focus:outline-none text-black border-slate-100 w-full  rounded">{!! $invoice->term_value !!}</textarea>
        </div>
    </div>
</form>


@foreach ($partial as $item)
<form class="min-h-[1350px]" id="content-form" enctype="multipart/form-data" method="POST">
    @csrf

    <div id="content" class=" container left-0 bg-white right-0  w-full p-5 mt-3 px-5">
        <div class="flex justify-between items-start">
            <div class="w-1/2">

                <label for="logo"
                    class="h-[80px] w-[200px] flex justify-start overflow-hidden items-start "
                    id="logo-label">
                    <img src="{{ $invoice->logo_path }}" >
                </label>
                <textarea rows="1" id="autoResizeTextarea" name="billto_value"
                    class="resize-none p-2 border-0 focus:outline-none text-black border-slate-100 w-full  rounded"
                    placeholder="Who is this invoice to? (required)" readonly>{!! $invoice->form !!}</textarea>
            </div>
            <div class="text-end">
                <h2 class="text-xl text-black">INVOICE</h2>
                <div class="mt-3 text-black">{{ $invoice->invoice_id }}@if ($item->partial_length == 1)
                    A
                @elseif($item->partial_length == 2)
                    B
                @elseif($item->partial_length == 3)
                    C
                @elseif($item->partial_length == 4)
                    D
                @elseif($item->partial_length == 5)
                    E
                @elseif($item->partial_length == 6)
                    F
                @elseif($item->partial_length == 7)
                    G
                @elseif($item->partial_length == 8)
                    H
                @elseif($item->partial_length == 9)
                    I
                @elseif($item->partial_length == 10)
                    J
                @elseif($item->partial_length == 11)
                    K
                @elseif($item->partial_length == 12)
                    L
                @elseif($item->partial_length == 13)
                    M
                @elseif($item->partial_length == 14)
                    N
                @elseif($item->partial_length == 15)
                    O
                @elseif($item->partial_length == 16)
                    P
                @endif
            </div>
            </div>
        </div>
        <div class="flex justify-between gap-10 mt-4">
            <div class="w-1/3">
                <input type="text" value="Bill To" name="billto_text" readonly
                    class="focus:outline-0  p-2 rounded focus:border hover:border-gray-200 border-white border w-full mb-1">
                <textarea rows="1" id="autoResizeTextarea" name="billto_value" readonly
                    class="resize-none p-2 border-0 focus:outline-none text-black border-slate-100 w-full  rounded"
                    placeholder="Who is this invoice to? (required)"> {!! $invoice->billto_value !!}</textarea>
            </div>
            <div class="w-1/3">
                <input type="text" value="Shift To" name="shiftto_text" readonly
                    class="focus:outline-0  p-2 rounded focus:border hover:border-gray-200 border-white border w-full mb-1">
                <textarea rows="1" name="shiftto_value" readonly
                    class="resize-none auto-rows-auto p-2 border-0 focus:outline-none text-black border-slate-100 w-full  rounded"
                    placeholder="Optional">{!! $invoice->shiftto_value !!}</textarea>
            </div>
            <div class="w-1/3">
                <div class="grid grid-cols-2">
                    <input type="text" name="date_text"
                        class="px-3 rounded border-0 focus:outline-0 border-white hover:border-gray-500"
                        readonly value="{!! $invoice->date_text !!}">
                    <input type="text" name="date_value"
                        class="p-2 border-0 focus:outline-none text-black border-slate-100  rounded"
                        value="{{ DateTime::createFromFormat('Y-m-d', $item->pay_date)->format('F j, Y') }}"
                        readonly>
                </div>
                <div class="my-2 grid grid-cols-2">
                    <input type="text" name="payment_term_text"
                        class="px-3 rounded border-0 focus:outline-0 border-white hover:border-gray-500"
                        readonly value="{!! $invoice->payment_term_text !!}">
                    <input type="text" name="payment_term_value"
                        class="p-2 text-black border-0 border-slate-100 w-full  rounded focus:outline-none"
                        readonly value="{!! $invoice->payment_term_value !!}">
                </div>

                <div class="grid grid-cols-2">
                    <input type="text" name="due_date_text" readonly
                        class="px-3 rounded border-0 focus:outline-0 border-white hover:border-gray-500"
                        value="{!! $invoice->due_date_text !!}">
                    <input type="text" name="due_date_value"
                        class="p-2 border-0 focus:outline-none text-black border-slate-100   rounded"
                        readonly
                        value="{{ DateTime::createFromFormat('Y-m-d', $invoice->due_date_value)->format('F j, Y') }}">
                </div>
            </div>
        </div>
        <div class="mt-5">
            <div>
                <table class="w-full">
                    <thead>
                        <tr>
                            <td class="bg-blue-950 text-white p-2 rounded-l">Item</td>
                            <td class="bg-blue-950 text-white p-2">Quantity</td>
                            <td class="bg-blue-950 text-white p-2">Rate</td>
                            <td class="bg-blue-950 text-white p-2 rounded-r   text-end">Amount</td>
                        </tr>
                    </thead>

                    @foreach ($product as $it)
                        <tr class="border-b">
                            <td>
                                <textarea rows="1" readonly class=" focus:outline-none border-slate-100 w-full text-black  rounded"
                                    placeholder="Description of service or product...">{{ $it['description'] }}</textarea>
                            </td>
                            <td class="w-16"><input value="{{ $it['quantity'] }}  {{ isset($it['type']) ? $it['type'] : "" }}" readonly type="text"
                                    class="p-2 mt-2  focus:outline-none text-black border-slate-100  rounded"
                                    autocomplete="off"></td>
                            <td class="w-16"><input type="number" readonly value="{{ $it['rate'] }}"
                                    class="p-2 mt-2  focus:outline-none border-slate-100 text-black rounded"
                                    autocomplete="off"></td>
                            <td class="text-end text-black  p-2">
                                <p class="flex justify-end items-center gap-3">
                                    <span>{{ $it['quantity'] * $item['rate'] }}</span>
                                    <span>{{ $client->currency }}</span></p>
                            </td>
                        </tr>
                    @endforeach

                </table>
                
            </div>
        </div>



        <div class="mt-10 grid grid-cols-2 gap-5">
            <div class="flex flex-col items-center justify-center text-xl  text-zinc-300 -rotate-45">
                @if ($item->partial_length == 1)
                    <p>1st Partial Payment</p>
                    <input type="number" class="hidden" name="partial_length" value="1">
                @elseif($item->partial_length == 2)
                    <p>2nd Partial Payment</p>
                    <input type="number" class="hidden" name="partial_length" value="2">
                @elseif($item->partial_length == 3)
                    <p>3rd Partial Payment</p>
                    <input type="number" class="hidden" name="partial_length" value="3">
                @elseif($item->partial_length > 3)
                    <p>{{ $item->partial_length }}th Partial Payment</p>
                    <input type="number" class="hidden" name="partial_length"
                        value="{{ $item->partial_length }}">
                @endif

                <p class="mt-3"> {{ $item->payment_status }}</p>
            </div>
            <div>
                <div class="flex justify-end gap-20 px-2">
                    <p>Sub Total</p>
                    <p class="w-32 text-end flex gap-3 justify-end"><span
                            id="sub-total">{{ $invoice->sub_total }}</span>
                        <span>{{ $client->currency }}</span></p>
                </div>
                @if ($invoice->shiping_value > 0)
                    <div class="flex justify-end items-center gap-20 px-2 py-1">
                        <input type="text" name="total_text" readonly
                            class="focus:outline-0   rounded focus:border border text-end border-white hover:border-gray-500"
                            value="{!! $invoice->shiping_text !!}">
                        <p class="w-32 text-end flex gap-3 justify-end"><input
                                value="{!! $invoice->shiping_value !!}" readonly type="text" name="total"
                                class="text-end focus:outline-none bg-white" id="total" readonly>
                            <span>{{ $client->currency }}</span></span>
                        </p>
                    </div>
                @endif

                @if ($invoice->discount_value > 0)
                    <div class="flex justify-end items-center gap-20 px-2">
                        <input type="text" name="total_text" readonly
                            class="focus:outline-0   rounded focus:border border text-end  border-white hover:border-gray-500"
                            value="{!! $invoice->discount_text !!}">
                        <p class="w-32 text-end  flex"><input value="{!! $invoice->discount_value !!}" readonly
                                type="number" name="total"
                                class="w-full text-end focus:outline-none bg-white" id="total"
                                readonly> <span class="w-[25px]">{{ $invoice->discount_type }}</span></p>
                    </div>
                @endif

                @if ($invoice->tax_value > 0)
                    <div class="flex justify-end items-center gap-20 px-2">
                        <input type="text" name="total_text" readonly
                            class="focus:outline-0   rounded focus:border border text-end  border-white hover:border-gray-500"
                            value="{!! $invoice->tax_text !!}">
                        <p class="w-32 text-end flex"><input value="{!! $invoice->tax_value !!}" readonly
                                type="number" name="total"
                                class="w-full text-end focus:outline-none bg-white" id="total"
                                readonly> <span class="w-[25px]">{{ $invoice->tax_type }}</span>
                        </p>
                    </div>
                @endif

                <div class="flex justify-end items-center gap-20 p-2">
                    <input type="text" name="total_text"
                        class="focus:outline-0   rounded focus:border border text-end  border-white hover:border-gray-500"
                        value="{!! $invoice->total_text !!}">
                    <p class="w-32 text-end flex justify-end gap-3"><span>{!! $invoice->total !!}</span>
                        <span>{{ $client->currency }}</span></p>
                </div>


                <div class="flex justify-end gap-20 px-2">
                    <input type="text" name="paid_text"
                        class="focus:outline-0  rounded focus:border border text-end  border-white hover:border-gray-500"
                        value="{!! $invoice->paid_text !!}" readonly>
                    <p class="w-32 text-end flex justify-end gap-3"> 
                        
                   
                        <span>
                            @php
                        
                                if(empty($item->partial_length)) {
                                    $partial_number = [];
                                } else {
                                    $partial_number = App\Models\PartialInvoice::where('invoice_id', $invoice->id)->take($item->partial_length)->get();
                                }
                        
                                $partial_pay_step = 0; 
                                foreach ($partial_number as $payment) {
                                    $partial_pay_step += $payment->partial_pay;
                                }
                            @endphp
                        
                            {{ $invoice->paid_value - $total_partial_pay + $partial_pay_step }}
                        </span>

                        <span>{{ $client->currency }}</span></p>
                </div>

                @foreach ( $partial_number as $partial)
                <div class="flex justify-end gap-20 px-2">
                    @if ($partial->partial_length == 1)
                        <input type="text"
                            class="focus:outline-0 rounded focus:border border text-end py-1 border-white hover:border-gray-500"
                            value="1st Partial Payment" readonly>
                        <input type="hidden" name="partial_length" value="1">
                    @elseif ($partial->partial_length == 2)
                        <input type="text"
                            class="focus:outline-0 rounded focus:border border text-end py-1 border-white hover:border-gray-500"
                            value="2nd Partial Payment" readonly>
                        <input type="hidden" name="partial_length" value="2">
                    @elseif ($partial->partial_length == 3)
                        <input type="text"
                            class="focus:outline-0 rounded focus:border border text-end py-1 border-white hover:border-gray-500"
                            value="3rd Partial Payment" readonly>
                        <input type="hidden" name="partial_length" value="3">
                    @elseif ($partial->partial_length > 3)
                        <input type="text"
                            class="focus:outline-0 rounded focus:border border text-end py-1 border-white hover:border-gray-500"
                            value="{{ $partial->partial_length }}th Partial Payment" readonly>
                        <input type="hidden" name="partial_length" value="{{ $partial->partial_length }}">
                    @endif
                    <p class="w-32 text-end  flex justify-end items-center gap-3"> <input id="paid" name="paid_value"
                            onchange="totalAmount()" readonly
                            class="w-20 border-0 text-end focus:outline-none" type="text"
                            value="{{ $partial->partial_pay }}"> {{ $client->currency }}</p>
                </div>
            @endforeach

            <div class="flex justify-end gap-20 px-2">
                <input name="due_text" type="text"
                    class="focus:outline-0   rounded focus:border border text-end  border-white hover:border-gray-500"
                    value="{!! $invoice->due_text !!}" readonly>
                <p class="w-32 text-end flex justify-end gap-3">
                    <span>{{ $invoice->due + $total_partial_pay - $partial_pay_step }}</span>
                    <span>{{ $client->currency }}</span></p>
            </div>

            </div>
        </div>


        <div>
            <input type="text" name="note_text" readonly
                class="focus:outline-0 px-2 rounded focus:border font-semibold hover:border-gray-200 border-white border"
                value="{!! $invoice->note_text !!}">
            <textarea rows="1" readonly name="note_value"
                class="border-0 focus:outline-none text-black border-slate-100 w-full  rounded">{!! $invoice->note_value !!}</textarea>
            <input type="text" readonly name="term_text"
                class="focus:outline-0 px-2 rounded font-semibold focus:border hover:border-gray-200 border-white border"
                value="{!! $invoice->term_text !!}">
            <textarea rows="1" readonly name="term_value"
                class="border-0  focus:outline-none text-black border-slate-100 w-full  rounded">{!! $invoice->term_value !!}</textarea>
        </div>
    </div>


</form>
@endforeach

    </section>
    <script src="{{ asset('assets/js/invoice.js') }}"></script>

    {{-- <script>
        window.addEventListener('load', function() {
           const print =  window.print();
        });
    </script> --}}
@endsection
