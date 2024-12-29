@extends('dashboard.layout')



@section('meta')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
@endsection


@php
$product = json_decode($invoice->product, true);
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
    </style>

    <section class="w-full">
        <section id="extra-head">
            <div class="container flex justify-between gap-4 py-4">
           

                <div class="flex justify-end gap-4">
                    <button id="print" onclick="reprint()" class="btn btn-orange"><i class="fa-solid fa-print mr-2"></i> Print</button>
                @if ($invoice->due > 0)
                     <a href="/dashboard/invoice/partial-pay/{{$invoice->id}}/{{$invoice->user_id}}" class="btn btn-orange"><i class="fa-regular fa-money-bill-1 mr-2"></i>Prtial Pay</a>
                @else
                <a href="#" class="btn btn-orange"><i class="fa-solid fa-circle-check mx-5"></i> Paid</a>
                @endif
                </div>
            </div>
        </section>




        <form id="content-form" enctype="multipart/form-data" method="POST">
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
                            <img src="{{$invoice->logo_path}}" alt="">
                        </label>
                        <textarea rows="1" id="autoResizeTextarea" name="billto_value"
                        class="resize-none p-2 border-0 focus:outline-none text-gray-500 border-slate-100 w-full  rounded"
                        placeholder="Who is this invoice to? (required)" readonly>{!!$invoice->form!!}</textarea>
                    </div>
                    <div class="text-end">
                        <h2 class="text-xl text-gray-500">INVOICE</h2>
                        <div class="mt-3 text-gray-500">#{{$invoice->invoice_id}}
                        </div>
                    </div>
                </div>
                <div class="flex justify-between gap-10 mt-4">
                    <div class="w-1/3">
                        <input type="text" value="Bill To" name="billto_text" readonly
                            class="focus:outline-0  p-2 rounded focus:border hover:border-gray-200 border-white border w-full mb-1">
                        <textarea rows="1" id="autoResizeTextarea" name="billto_value" readonly
                            class="resize-none p-2 border-0 focus:outline-none text-gray-500 border-slate-100 w-full  rounded"
                            placeholder="Who is this invoice to? (required)"> {!!$invoice->billto_value!!}</textarea>
                    </div>
                    <div class="w-1/3">
                        <input type="text" value="Shift To" name="shiftto_text" readonly
                            class="focus:outline-0  p-2 rounded focus:border hover:border-gray-200 border-white border w-full mb-1">
                        <textarea rows="1" name="shiftto_value" readonly
                            class="resize-none auto-rows-auto p-2 border-0 focus:outline-none text-gray-500 border-slate-100 w-full  rounded"
                            placeholder="Optional">{!!$invoice->shiftto_value!!}</textarea>
                    </div>
                    <div class="w-1/3">
                        <div class="grid grid-cols-2">
                            <input type="text" name="date_text"
                                class="px-3 rounded border-0 focus:outline-0 border-white hover:border-gray-500" readonly
                                value="{!!$invoice->date_text!!}">
                            <input type="date" name="date_value"
                                class="p-2 border-0 focus:outline-none text-gray-500 border-slate-100  rounded" value="{{ DateTime::createFromFormat('Y-m-d',$invoice->date_value)->format('F j, Y')}}" readonly>
                        </div>
                        <div class="my-2 grid grid-cols-2">
                            <input type="text" name="payment_term_text" class="px-3 rounded border-0 focus:outline-0 border-white hover:border-gray-500" readonly  value="{!!$invoice->payment_term_text!!}">
                            <input type="text" name="payment_term_value"
                                class="p-2 text-gray-500 border-0 border-slate-100 w-full  rounded focus:outline-none" readonly value="{!!$invoice->payment_term_value!!}">
                        </div>

                        <div class="grid grid-cols-2">
                            <input type="text" name="due_date_text" readonly
                                class="px-3 rounded border-0 focus:outline-0 border-white hover:border-gray-500"
                                value="{!!$invoice->due_date_text!!}">
                            <input type="date" name="due_date_value"
                                class="p-2 border-0 focus:outline-none text-gray-500 border-slate-100   rounded" readonly value="{!!$invoice->due_date_value!!}">
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
                                    <td class="bg-blue-950 text-white p-2 rounded-r text-end pr-4">Amount</td>
                                </tr>
                            </thead>

                            @foreach ($product as $item)
                           <tr class="border-b">
                            <td><textarea rows="1" readonly class=" focus:outline-none border-slate-100 w-full text-gray-500  rounded"  placeholder="Description of service or product...">{{$item['description']}}</textarea></td>
                            <td class="w-16"><input value="{{$item['quantity']}}" readonly  type="number"  class="p-2 mt-2  focus:outline-none text-gray-500 border-slate-100  rounded" autocomplete="off"></td>
                            <td class="w-16"><input  type="number" readonly  value="{{$item['rate']}}"  class="p-2 mt-2  focus:outline-none border-slate-100 text-gray-500 rounded"  autocomplete="off"></td>
                            <td class="text-end text-gray-500">{{$item['quantity']*$item['rate']}}</span><span class="curency"></td> 
                           </tr>
                            @endforeach
                            
                        </table>
                        <button onclick="addItemline()" type="button" id="item-button"
                            class="border hidden text-blue-900 btn mt-3 hover:text-white hover:bg-blue-900">More Item +</button>
                    </div>
                </div>
                <div class="mt-10 grid grid-cols-2 gap-5">
                    <div class="flex flex-col items-center justify-center text-xl  text-zinc-300 -rotate-45">
                      @if ($status)
                      @if ($status->partial_length == 1)
                      <p>1st Partial Payment</p>
                      <input type="number" class="hidden" name="partial_length" value="1">
                      @elseif($status->partial_length == 2)
                      <p>2nd Partial Payment</p>
                      <input type="number" class="hidden" name="partial_length" value="2">
                      @elseif($status->partial_length == 3)
                      <p>3rd Partial Payment</p>
                      <input type="number" class="hidden" name="partial_length" value="3">
                      @elseif($status->partial_length > 3)
                      <p>{{$status->partial_length+1}}th Partial Payment</p>
                      <input type="number" class="hidden" name="partial_length" value="{{$status->partial_length+1}}">
                      @endif 
                      <p class="mt-3">{{$status->payment_status}}</p>
                      @endif
                    </div>
                    <div class="">
                        <div class="flex justify-end gap-20">
                            <p>Sub Total</p>
                            <p class="w-32 text-end"><span id="sub-total">{{$invoice->sub_total}}</span> <span class="curency"></span></p>
                        </div>


                        
                        @if ($invoice->shiping_value > 0)
                        <div class="flex justify-end items-center gap-20">
                            <input type="text" name="total_text" readonly  class="focus:outline-0   rounded focus:border border text-end py-2 border-white hover:border-gray-500"  value="{!!$invoice->shiping_text!!}">
                            <p class="w-32 text-end py-2 flex"><input value="{!!$invoice->shiping_value!!}" readonly type="number" name="total" class="w-full text-end focus:outline-none bg-white"  id="total" readonly> <span class="">{{$invoice->shiping_type}}</span></p>
                        </div>
                        @endif
                        @if ($invoice->discount_value > 0)
                        <div class="flex justify-end items-center gap-20">
                            <input type="text" name="total_text" readonly  class="focus:outline-0   rounded focus:border border text-end py-2 border-white hover:border-gray-500"  value="{!!$invoice->discount_text!!}">
                            <p class="w-32 text-end py-2 flex"><input value="{!!$invoice->discount_value!!}" readonly type="number" name="total" class="w-full text-end focus:outline-none bg-white"  id="total" readonly> <span class="">{{$invoice->discount_type}}</span></p>
                        </div>
                        @endif

                        @if ($invoice->tax_value > 0)
                        <div class="flex justify-end items-center gap-20">
                            <input type="text" name="total_text" readonly  class="focus:outline-0   rounded focus:border border text-end py-2 border-white hover:border-gray-500"  value="{!!$invoice->tax_text!!}">
                            <p class="w-32 text-end py-2 flex"><input value="{!!$invoice->tax_value!!}" readonly type="number" name="total" class="w-full text-end focus:outline-none bg-white"  id="total" readonly> <span class="">{{$invoice->tax_type}}</span></p>
                        </div>
                        @endif

                        <div class="flex justify-end items-center gap-20">
                            <input type="text" name="total_text"  class="focus:outline-0   rounded focus:border border text-end py-2 border-white hover:border-gray-500"  value="{!!$invoice->total_text!!}">
                            <p class="w-32 text-end py-2 flex"><input value="{!!$invoice->total!!}" readonly type="number" name="total" class="w-full text-end focus:outline-none bg-white"  id="total" readonly> <span class="curency"></span></p>
                        </div>
                        <div class="flex justify-end gap-20">
                            <input type="text" name="paid_text"  class="focus:outline-0  rounded focus:border border text-end py-2 border-white hover:border-gray-500"  value="{!!$invoice->paid_text!!}" readonly>
                            <p class="w-32 text-end"> <input id="paid" name="paid_value" onchange="totalAmount()" readonly class="w-20 border-0 text-end focus:outline-none" type="number" value="{!!$invoice->paid_value!!}"> <span class="curency"></span></p>
                        </div>




                        @foreach ($partial as $item)
                        <div class="flex justify-end gap-20">
                            @if ($item->partial_length == 1)
                            <input type="text" class="focus:outline-0 rounded focus:border border text-end py-1 border-white hover:border-gray-500" value="1st Partial Payment" readonly>
                            <input type="hidden" name="partial_length" value="1">
                        @elseif ($item->partial_length == 2)
                            <input type="text" class="focus:outline-0 rounded focus:border border text-end py-1 border-white hover:border-gray-500" value="2nd Partial Payment" readonly>
                            <input type="hidden" name="partial_length" value="2">
                        @elseif ($item->partial_length == 3)
                            <input type="text" class="focus:outline-0 rounded focus:border border text-end py-1 border-white hover:border-gray-500" value="3rd Partial Payment" readonly>
                            <input type="hidden" name="partial_length" value="3">
                        @elseif ($item->partial_length > 3)
                            <input type="text" class="focus:outline-0 rounded focus:border border text-end py-1 border-white hover:border-gray-500" value="{{$item->partial_length+1}}th Partial Payment" readonly>
                            <input type="hidden" name="partial_length" value="{{$item->partial_length+1}}">
                        @endif                        
                            <p class="w-32 text-end"> <input id="paid" name="paid_value" onchange="totalAmount()" readonly class="w-20 border-0 text-end focus:outline-none" type="number" value="{{$item->partial_pay}}"> <span class="curency"></span></p>
                        </div>
                        @endforeach


                        <div class="flex justify-end gap-20">
                            <input name="due_text" type="text"  class="focus:outline-0   rounded focus:border border text-end py-2 border-white hover:border-gray-500"
                                value="{!!$invoice->due_text!!}" readonly >
                            <p class="py-2 w-32 text-end"><input readonly id="due-blance" name="due" class="w-20 border-0 text-end focus:outline-none" type="number" value="{!!$invoice->due!!}"> <span class="curency"></span></p>
                            {{-- <p class="py-2 w-32 text-end"><span ></span> <span class="curency"></span></p> --}}
                        </div>
                    </div>
                </div>
                <div>
                    <input type="text" name="note_text" readonly
                        class="focus:outline-0 px-2 rounded focus:border hover:border-gray-200 border-white border"
                        value="{!!$invoice->note_text!!}">
                    <textarea rows="1" readonly name="note_value"
                        class="border-0 focus:outline-none text-gray-500 border-slate-100 w-full  rounded">{!!$invoice->note_value!!}</textarea>
                    <input type="text" readonly name="term_text"
                        class="focus:outline-0 px-2 rounded focus:border hover:border-gray-200 border-white border"
                        value="{!!$invoice->term_text!!}">
                    <textarea rows="1" readonly name="term_value"
                        class="border-0  focus:outline-none text-gray-500 border-slate-100 w-full  rounded">{!!$invoice->term_value!!}</textarea>
                </div>
            </div>


        </form>
    </section>

    <script>
       
       const hnadleInvoiceList =()=>{
        const currentInvoice = document.getElementById('invoice-list');
        console.log(currentInvoice.value);
       }
    </script>


    <script src="{{ asset('assets/js/invoice.js') }}"></script>
@endsection
