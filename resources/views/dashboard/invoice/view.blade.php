@extends('dashboard.layout')



@section('meta')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
@endsection


@php

    $currency = request('currency');

    $partial_request = request('partial');

    $product = json_decode($invoice->product, true);

    $total_partial_pay = 0;
    $partial_pay_step = 0;

    foreach ($partial as $payment) {
        $total_partial_pay += $payment->partial_pay;
    }
    foreach ($partial_number as $payment) {
        $partial_pay_step += $payment->partial_pay;
    }

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
            overflow-x: hidden;
            resize: none;
            padding: 10px;
            font-size: 16px;
            line-height: 1.5;
            color: black !important;
        }


        input{
            color: black !important;
        }


        select::-ms-expand {
            display: none;
        }
    </style>

    <section class="w-full p-3">
        <section id="extra-head">
            <div class="bg-[#343A40] rounded px-4">
            <div class="flex justify-between gap-2 py-3">
                
                <button id="print" onclick="reprint()" class="btn btn-success flex items-center justify-center"><i
                    class="fa-solid fa-print mr-2"></i> Print</button>
                <div class=" w-full">
                    <div
                        class="p-2 flex gap-3 border-[1px] border-dashed text-white text-center  rounded {{ $invoice->due + $total_partial_pay - $partial_pay_step > 0 ? 'border-red-500 bg-[#ee000067]' : 'border-green-500 bg-[#08f95887]' }}">
                        @if ($partial_request == 1)
                            <p>1st Partial  Paid
                                <strong>{{ $invoice->paid_value - $total_partial_pay + $partial_pay_step }}
                                </strong>{{ $currency }} Due <strong>
                                    {{ $invoice->due + $total_partial_pay - $partial_pay_step }}</strong> {{ $currency }}
                            </p>
                            <input type="number" class="hidden" name="partial_length" value="1">
                        @elseif($partial_request == 2)
                            <p>2nd Partial Paid
                                <strong>{{ $invoice->paid_value - $total_partial_pay + $partial_pay_step }}
                                </strong>{{ $currency }} Due <strong>
                                    {{ $invoice->due + $total_partial_pay - $partial_pay_step }}</strong> {{ $currency }}
                            </p>
                            <input type="number" class="hidden" name="partial_length" value="2">
                        @elseif($partial_request == 3)
                            <p>3rd Partial  Paid
                                <strong>{{ $invoice->paid_value - $total_partial_pay + $partial_pay_step }}
                                </strong>{{ $currency }} Due <strong>
                                    {{ $invoice->due + $total_partial_pay - $partial_pay_step }}</strong>
                                {{ $currency }}</p>
                            <input type="number" class="hidden" name="partial_length" value="3">
                        @elseif($partial_request > 3)
                            <p>{{ $partial_request }}th Partial  Paid
                                <strong>{{ $invoice->paid_value - $total_partial_pay + $partial_pay_step }}
                                </strong>{{ $currency }} Due
                                <strong>{{ $invoice->due + $total_partial_pay - $partial_pay_step }}</strong>{{ $currency }}
                            </p>
                            <input type="number" class="hidden" name="partial_length" value="{{ $partial_request }}">
                        @endif

                        <p class="text-center">
                            @if ($partial_request == '')
                                Paid <strong>{{ $invoice->paid_value - $total_partial_pay + $partial_pay_step }}</strong> {{ $currency }} | Due  <strong>{{ $invoice->due + $total_partial_pay - $partial_pay_step }}</strong> {{ $currency }}
                            @endif

                        </p>

                    </div>
                </div>

                <div class="flex justify-end gap-4 items-center">
                    
                            <a href="/dashboard/invoice/partial-view/{{$invoice->id}}" class="btn btn-orange block" >Back</a>
                    
                    @if (!$invoice->refund)
                    @if ($invoice->due > 0)
                    <a href="/dashboard/invoice/partial-pay/{{ $invoice->id }}/{{ $invoice->user_id }}?currency={{ $currency }}"
                        class="btn btn-success flex items-center py-2"><i class="fa-regular fa-money-bill-1 mr-2"></i><span
                            class="w-20">Prtial Pay</span></a>
                @endif
                    @endif

                   
                </div>
            </div>
            </div>


            {{-- setting modal  --}}
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Setting</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div>
                                <select id="curencyinput" onchange="curencyChange()" class="form-control">
                                    <option value="">Select Curency</option>
                                    <option value="USD ">US Dollar (USD)</option>
                                    <option value="EUR ">Euro (EUR)</option>
                                    <option selected value="BDT ">Bangladeshi (BDT)</option>
                                    <option selected value="TK ">Bangladeshi (TK)</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <form class="mt-4" id="content-form" enctype="multipart/form-data" method="POST">
            @csrf

            <div class="hidden">
                <input type="text" name="product" id="product">
                <input type="text" name="logo" id="logo-base">
            </div>


            <div id="content" class=" container left-0 bg-white right-0  w-full p-5 mt-3 px-5">
                <div class="flex justify-between items-start">
                    <div class="w-1/2">

                        <label for="logo" class="h-[80px] w-[200px] flex justify-start overflow-hidden items-start "
                            id="logo-label">
                            <img src="{{ $invoice->logo_path }}">
                        </label>
                        <textarea rows="1" id="autoResizeTextarea" name="billto_value"
                            class="resize-none p-2 border-0 focus:outline-none  border-slate-100 w-full  rounded"
                            placeholder="Who is this invoice to? (required)" readonly>{!! $invoice->form !!}</textarea>
                    </div>
                    <div class="text-end">
                        <h2 class="text-xl ">INVOICE</h2>
                        <div class="mt-3 ">{{ $invoice->invoice_id }}@if ($partial_request == 1)
                                A
                            @elseif($partial_request == 2)
                                B
                            @elseif($partial_request == 3)
                                C
                            @elseif($partial_request == 4)
                                D
                            @elseif($partial_request == 5)
                                E
                            @elseif($partial_request == 6)
                                F
                            @elseif($partial_request == 7)
                                G
                            @elseif($partial_request == 8)
                                H
                            @elseif($partial_request == 9)
                                I
                            @elseif($partial_request == 10)
                                J
                            @elseif($partial_request == 11)
                                K
                            @elseif($partial_request == 12)
                                L
                            @elseif($partial_request == 13)
                                M
                            @elseif($partial_request == 14)
                                N
                            @elseif($partial_request == 15)
                                O
                            @elseif($partial_request == 16)
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
                            class="resize-none p-2 border-0 focus:outline-none text-gray-500 border-slate-100 w-full  rounded"
                            placeholder="Who is this invoice to? (required)"> {!! $invoice->billto_value !!}</textarea>
                    </div>
                    <div class="w-1/3">

                        @if ( $invoice->shiftto_value)
                        <input type="text" value="Shift To" name="shiftto_text" readonly
                        class="focus:outline-0  p-2 rounded focus:border hover:border-gray-200 border-white border w-full mb-1">
                    <textarea rows="1" name="shiftto_value" readonly
                        class="resize-none auto-rows-auto p-2 border-0 focus:outline-none text-gray-500 border-slate-100 w-full  rounded"
                        placeholder="Optional">{!! $invoice->shiftto_value !!}</textarea>
                        @endif
                        
                    </div>
                    <div class="w-1/3">
                        <div class="grid grid-cols-2">
                            <input type="text" name="date_text"
                                class="px-3 rounded border-0 focus:outline-0 border-white hover:border-gray-500" readonly
                                value="{!! $invoice->date_text !!}">
                            <input type="text" name="date_value"
                                class="p-2 border-0 focus:outline-none text-gray-500 border-slate-100  rounded"
                                value="{{ $partial_date ? DateTime::createFromFormat('Y-m-d', $partial_date->pay_date)->format('F j, Y') : DateTime::createFromFormat('Y-m-d', $invoice->date_value)->format('F j, Y') }}"
                                readonly>
                        </div>
                        <div class="my-2 grid grid-cols-2">
                            <input type="text" name="payment_term_text"
                                class="px-3 rounded border-0 focus:outline-0 border-white hover:border-gray-500" readonly
                                value="{!! $invoice->payment_term_text !!}">
                            <input type="text" name="payment_term_value"
                                class="p-2 text-gray-500 border-0 border-slate-100 w-full  rounded focus:outline-none"
                                readonly value="{!! $invoice->payment_term_value !!}">
                        </div>

                        <div class="grid grid-cols-2">
                            <input type="text" name="due_date_text" readonly
                                class="px-3 rounded border-0 focus:outline-0 border-white hover:border-gray-500"
                                value="{!! $invoice->due_date_text !!}">
                            <input type="text" name="due_date_value"
                                class="p-2 border-0 focus:outline-none text-gray-500 border-slate-100   rounded" readonly
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

                            @foreach ($product as $item)
                                <tr class="border-b">
                                    <td>
                                        <textarea rows="1" readonly class=" focus:outline-none border-slate-100 w-full text-gray-500  rounded"
                                            placeholder="Description of service or product...">{{ $item['description'] }}</textarea>
                                    </td>
                                    <td class="w-16"><input value="{{ $item['quantity'] }} {{ isset($item['type']) ? $item['type'] : "" }}" readonly type="text"
                                            class="p-2 mt-2  focus:outline-none text-gray-500 border-slate-100  rounded"
                                            autocomplete="off"></td>
                                    <td class="w-16"><input type="number" readonly value="{{ $item['rate'] }}"
                                            class="p-2 mt-2  focus:outline-none border-slate-100 text-gray-500 rounded"
                                            autocomplete="off"></td>
                                    <td class="text-end  p-2">
                                        <p class="flex justify-end items-center gap-3">
                                            <span>{{ $item['quantity'] * $item['rate'] }}</span>
                                            <span>{{ $currency }}</span></p>
                                    </td>
                                </tr>
                            @endforeach

                        </table>
                        <div class="hidden">
                            <button onclick="addItemline()" type="button" id="item-button"
                                class="border hidden text-blue-900 btn mt-3 hover:text-white hover:bg-blue-900">More Item
                                +</button>
                        </div>
                    </div>
                </div>
                <div class="mt-10 grid grid-cols-2 gap-5">
                    <div class="flex flex-col items-center justify-center text-xl  text-zinc-300 -rotate-45">
                        @if ($partial_request == 1)
                            <p>1st Partial payment</p>
                            <input type="number" class="hidden" name="partial_length" value="1">
                        @elseif($partial_request == 2)
                            <p>2nd Partial payment</p>
                            <input type="number" class="hidden" name="partial_length" value="2">
                        @elseif($partial_request == 3)
                            <p>3rd Partial payment</p>
                            <input type="number" class="hidden" name="partial_length" value="3">
                        @elseif($partial_request > 3)
                            <p>{{ $partial_request }}th Partial payment</p>
                            <input type="number" class="hidden" name="partial_length" value="{{ $partial_request }}">
                        @endif

                        <p class="mt-3">
                            {{ $invoice->due + $total_partial_pay - $partial_pay_step > 0 ? 'Unpaid' : 'Paid' }}</p>
                    </div>
                    <div class="">
                        <div class="flex justify-end gap-20 px-2">
                            <p>Sub Total</p>
                            <p class="w-32 text-end flex gap-3 justify-end"><span
                                    id="sub-total">{{ $invoice->sub_total }}</span> <span>{{ $currency }}</span></p>
                        </div>

                        @if ($invoice->shiping_value > 0)
                            <div class="flex justify-end items-center gap-20 px-2 py-1">
                                <input type="text" name="total_text" readonly
                                    class="focus:outline-0   rounded focus:border border text-end  border-white hover:border-gray-500"
                                    value="{!! $invoice->shiping_text !!} ">
                                <p class="w-32 text-end flex gap-3 justify-end"><input value="{!! $invoice->shiping_value !!}"
                                        readonly type="text" name="total"
                                        class="text-end focus:outline-none bg-white" id="total" readonly>
                                    <span>{{ $currency }}</span></span></p>
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
                                <span>{{ $currency }}</span></p>
                        </div>
                        
                        <div class="flex justify-end gap-20 px-2">
                            <input type="text" name="paid_text"
                                class="focus:outline-0  rounded focus:border border text-end  border-white hover:border-gray-500"
                                value="{!! $invoice->paid_text !!}" readonly>
                            <p class="w-32 text-end flex justify-end gap-3"> <span>{!! $invoice->paid_value - $total_partial_pay + $partial_pay_step !!}</span>
                                <span>{{ $currency }}</span></p>
                        </div>



                        @foreach ($partial_number as $item)
                            <div class="flex justify-end gap-20 px-2">
                                @if ($item->partial_length == 1)
                                    <input type="text"
                                        class="focus:outline-0 rounded focus:border border text-end py-1 border-white hover:border-gray-500"
                                        value="1st Partial Payment" readonly>
                                    <input type="hidden" name="partial_length" value="1">
                                @elseif ($item->partial_length == 2)
                                    <input type="text"
                                        class="focus:outline-0 rounded focus:border border text-end py-1 border-white hover:border-gray-500"
                                        value="2nd Partial Payment" readonly>
                                    <input type="hidden" name="partial_length" value="2">
                                @elseif ($item->partial_length == 3)
                                    <input type="text"
                                        class="focus:outline-0 rounded focus:border border text-end py-1 border-white hover:border-gray-500"
                                        value="3rd Partial Payment" readonly>
                                    <input type="hidden" name="partial_length" value="3">
                                @elseif ($item->partial_length > 3)
                                    <input type="text"
                                        class="focus:outline-0 rounded focus:border border text-end py-1 border-white hover:border-gray-500"
                                        value="{{ $item->partial_length }}th Partial Payment" readonly>
                                    <input type="hidden" name="partial_length" value="{{ $item->partial_length }}">
                                @endif
                                <p class="w-32 text-end  flex justify-end gap-3"> <input id="paid" name="paid_value"
                                        onchange="totalAmount()" readonly
                                        class="w-20 border-0 text-end focus:outline-none" type="text"
                                        value="{{ $item->partial_pay }}"> {{ $currency }}</p>
                            </div>
                        @endforeach


                        <div class="flex justify-end gap-20 px-2">
                            <input name="due_text" type="text"
                                class="focus:outline-0   rounded focus:border border text-end  border-white hover:border-gray-500"
                                value="{!! $invoice->due_text !!}" readonly>
                            <p class="w-32 text-end flex justify-end gap-3">
                                <span>{{ $invoice->due + $total_partial_pay - $partial_pay_step }}</span>
                                <span>{{ $currency }}</span></p>
                        </div>
                    </div>
                </div>
                <div>
                    <input type="text" name="note_text" readonly
                        class="focus:outline-0 px-2 rounded focus:border font-semibold hover:border-gray-200 border-white border"
                        value="{!! $invoice->note_text !!}">
                    <textarea rows="1" readonly name="note_value"
                        class="border-0 focus:outline-none text-gray-500 border-slate-100 w-full  rounded">{!! $invoice->note_value !!}</textarea>
                    <input type="text" readonly name="term_text"
                        class="focus:outline-0 px-2 rounded font-semibold focus:border hover:border-gray-200 border-white border"
                        value="{!! $invoice->term_text !!}">
                    <textarea rows="1" readonly name="term_value"
                        class="border-0  focus:outline-none text-gray-500 border-slate-100 w-full  rounded">{!! $invoice->term_value !!}</textarea>
                </div>
            </div>


        </form>
    </section>

    <script>
        const hnadleInvoiceList = () => {
            const currentInvoice = document.getElementById('invoice-list');
            document.getElementById('partial-filter').submit();
        }
    </script>




    <script src="{{ asset('assets/js/invoice.js') }}"></script>
@endsection
