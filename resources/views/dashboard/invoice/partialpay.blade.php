@extends('dashboard.layout')



@section('meta')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
@endsection


@php
$product = json_decode($invoice->product, true);
$currency = request('currency')
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

    <section class="w-full p-3">
        <section id="extra-head">
            <div class="bg-[#343A40] flex justify-between items-center py-3 px-3 rounded">
                <h1 class="text-[20px] text-white">Create New Invoice</h1>
            <div class=" flex justify-end items-end gap-5">
                <a href="/dashboard/invoice/partial-view/{{$invoice->id}}" class="btn btn-orange" onclick="goBack()">Back</a>
                <button  data-toggle="modal" data-target="#exampleModal"  class="btn btn-success py-2">Pay <span id="amount-pay"></span> {{$currency}}</button>
            </div>
            </div>



        <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-slate-800 text-white">
              <h5 class="modal-title" id="exampleModalLabel">Payment Information</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="text-white" aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Partial Pay: <span id="_p_pay">0</span> {{$currency}}</p>
              <p>Current Due: <span id="_c_due">0</span> {{$currency}}</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button"  onclick="handleSavePartial()" class="btn btn-success">Pay</button>
        </div>
      </div>
    </div>
    </div>




        <form id="partial-pay-form" enctype="multipart/form-data" method="POST">
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
                            <img src="{{$invoice->logo_path}}">
                        </label>
                        <textarea rows="1" id="autoResizeTextarea" name="billto_value"
                        class="resize-none p-2 border-0 focus:outline-none text-gray-500 border-slate-100 w-full  rounded"
                        placeholder="Who is this invoice to? (required)" readonly>{!!$invoice->form!!}</textarea>
                    </div>
                    <div class="text-end">
                        <h2 class="text-xl text-gray-500">INVOICE</h2>
                        <div class="mt-3 text-gray-500">{{$invoice->invoice_id}}
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
                        @if ($invoice->shiftto_value)
                        <input type="text" value="Shift To" name="shiftto_text" readonly
                        class="focus:outline-0  p-2 rounded focus:border hover:border-gray-200 border-white border w-full mb-1">
                    <textarea rows="1" name="shiftto_value" readonly
                        class="resize-none auto-rows-auto p-2 border-0 focus:outline-none text-gray-500 border-slate-100 w-full  rounded"
                        placeholder="Optional">{!!$invoice->shiftto_value!!}</textarea>
                        @endif
                       
                    </div>
                    <div class="w-1/3">
                        <div class="grid grid-cols-2">
                            <input type="text" name="date_text"
                                class="px-3 rounded border-0 focus:outline-0 border-white hover:border-gray-500" readonly
                                value="{!!$invoice->date_text!!}">
                            <input type="date" name="pay_date" class="p-2 border focus:outline-none text-gray-500   rounded" required>
                        </div>

                        @error('pay_date')
                            <p class="text-red-500 ps-5">{{$message}}</p>
                        @enderror
                        <div class="my-2 grid grid-cols-2">
                            <input type="text" name="payment_term_text" class="px-3 rounded border-0 focus:outline-0 border-white hover:border-gray-500" readonly  value="{!!$invoice->payment_term_text!!}">
                            <input type="text" name="payment_term_value"
                                class="p-2 text-gray-500 border-0 border-slate-100 w-full  rounded focus:outline-none" readonly value="{!!$invoice->payment_term_value!!}">
                        </div>

                        <div class="grid grid-cols-2">
                            <input type="text" name="due_date_text" readonly
                                class="px-3 rounded border-0 focus:outline-0 border-white hover:border-gray-500"
                                value="{!!$invoice->due_date_text!!}">
                            <input type="date" name="due_date_value" class="p-2 border-0 focus:outline-none text-gray-500 border-slate-100   rounded" readonly value="{!!$invoice->due_date_value!!}">
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
                                    <td class="bg-blue-950 text-white p-2 rounded-r text-end">Amount</td>
                                </tr>
                            </thead>

                            @foreach ($product as $item)
                           <tr class="border-b">
                            <td><textarea rows="1" readonly class=" focus:outline-none border-slate-100 w-full text-gray-500  rounded"  placeholder="Description of service or product...">{{$item['description']}}</textarea></td>
                            <td class="w-16"><input value="{{$item['quantity']}} {{ isset($item['type']) ? $item['type'] : "" }}" readonly  type="text"  class="p-2 mt-2  focus:outline-none text-gray-500 border-slate-100  rounded" autocomplete="off"></td>
                            <td class="w-16"><input  type="number" readonly  value="{{$item['rate']}}"  class="p-2 mt-2  focus:outline-none border-slate-100 text-gray-500 rounded"  autocomplete="off"></td>
                            <td class="text-end text-gray-500  p-2"><p class="flex justify-end items-center gap-3"> <span>{{$item['quantity']*$item['rate']}}</span> <span>{{$currency}}</span></p></td> 
                           </tr>
                            @endforeach
                            
                        </table>
                        <button onclick="addItemline()" type="button" id="item-button"
                            class="border hidden text-blue-900 btn mt-3 hover:text-white hover:bg-blue-900">More Item +</button>
                    </div>
                </div>
                <div class="mt-10 grid grid-cols-2 gap-5">
                    <div class="flex flex-col items-center justify-center text-xl  text-zinc-300 -rotate-45">
                       
                        @if ($invoice->partial_type == 1)
                        <p>1st Partial payment</p>
                        <input type="number" class="hidden" name="partial_length" value="1">
                        @elseif($invoice->partial_type == 2)
                        <p>2nd Partial payment</p>
                        <input type="number" class="hidden" name="partial_length" value="2">
                        @elseif($invoice->partial_type == 3)
                        <p>3rd Partial payment</p>
                        <input type="number" class="hidden" name="partial_length" value="3">
                        @elseif($invoice->partial_type > 3)
                        <p>{{$invoice->partial_type}}th partial payment</p>
                        <input type="number" class="hidden"  name="partial_length" value="{{$invoice->partial_type}}">
                        @endif 
                        <input class="text-center focus:outline-none mt-2" name="payment_status" readonly id="payment_status" type="text" value="">
            
                    </div>
                    <div class="">
                        <div class="flex justify-end gap-20 px-2 pb-2">
                            <p>Sub Total</p>
                            <p class="w-32 text-end flex justify-end gap-3"><span id="sub-total">{{$invoice->sub_total}}</span> {{$currency}}</p>
                        </div>


                        
                        @if ($invoice->shiping_value > 0)
                        <div class="flex justify-end gap-20 px-2">
                            <p>{!!$invoice->shiping_text!!}</p>
                            <p class="w-32 text-end flex justify-end gap-3"><span id="sub-total">{!!$invoice->shiping_value!!}</span> {{$currency}}</p>
                        </div>
                        @endif
                        @if ($invoice->discount_value > 0)
                        <div class="flex justify-end items-center gap-20 px-2">
                            <input type="text" name="total_text" readonly  class="focus:outline-0   rounded focus:border border text-end py-2 border-white hover:border-gray-500"  value="{!!$invoice->discount_text!!}">
                            <p class="w-32 text-end flex justify-end gap-3 "><input value="{!!$invoice->discount_value!!}" readonly type="text" name="total" class="w-full text-end focus:outline-none bg-white"  id="total" readonly> <span class="w-10 text-start">{{$invoice->discount_type}}</span></p>
                        </div>
                        @endif

                        @if ($invoice->tax_value > 0)
                        <div class="flex justify-end items-center gap-20 px-2">
                            <input type="text" name="total_text" readonly  class="focus:outline-0   rounded focus:border border text-end  border-white hover:border-gray-500"  value="{!!$invoice->tax_text!!}">
                            <p class="w-32 text-end flex justify-end gap-3"><input value="{!!$invoice->tax_value!!}" readonly type="text" name="total" class="w-full text-end focus:outline-none bg-white"  id="total" readonly> <span class="w-10 text-start">{{$invoice->tax_type}}</span></p>
                        </div>
                        @endif

                        <div class="flex justify-end items-center gap-20 px-2">
                            <input type="text" name="total_text"  readonly class="focus:outline-0   rounded focus:border border text-end py-2 border-white hover:border-gray-500"  value="{!!$invoice->total_text!!}">
                            <p class="w-32 text-end flex justify-end gap-3"><input value="{!!$invoice->total!!}" readonly type="text" name="total" class="w-full text-end focus:outline-none bg-white"  id="total" readonly> {{$currency}}</p>
                        </div>
                        <div class="flex justify-end gap-20 px-2">
                            <input type="text" name="paid_text"  class="focus:outline-0  rounded focus:border border text-end py-2 border-white hover:border-gray-500"  value="{!!$invoice->paid_text!!}" readonly>
                            <p class="w-32 text-end"> <input id="paid" name="paid_value" onchange="totalAmount()" readonly class="w-20 border-0 text-end focus:outline-none" type="number" value="{!!$invoice->paid_value!!}"> {{$currency}}</p>
                        </div>
                        <div class="flex justify-end gap-20 px-2">
                            <input name="due_text" type="text"  class="focus:outline-0   rounded focus:border border text-end border-white hover:border-gray-500"  value="{!!$invoice->due_text!!}" readonly >
                            <p class=" w-32 text-end"><i onclick="adjustDue()" class="fa-solid cursor-pointer fa-turn-down"></i><input readonly id="due-blance" name="due" class="w-20 border-0 text-end focus:outline-none" type="number" value="{!!$invoice->due!!}"> {{$currency}}</p>
                        </div>
                        <div class="flex justify-end gap-20 px-2 ">
                            <input type="text"  class="focus:outline-0   rounded focus:border border text-end py-2 border-white  hover:border-gray-500" name="partial_text"  value="Partial Pay">
                            <p class="py-2 w-32 text-end"><input  onchange="handlePartialPay()" id="partial_pay" name="partial_pay" class="w-20  text-end border focus:outline-none" type="number" value="0"> {{$currency}}</p>
                        </div>
                        <div class="flex justify-end gap-20 px-2">
                            <input type="text"  class="focus:outline-0   rounded focus:border border text-end py-2 border-white hover:border-gray-500"  value="Current Due">
                            <p class="py-2 w-32 text-end"><input   id="current_due" name="current_due" readonly class="w-20 border-0 text-end focus:outline-none" type="number" value="0"> {{$currency}}</p>
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
        const adjustDue =()=>{
            const partialPay = document.getElementById('partial_pay');
            const dueBlance = document.getElementById('due-blance');
            partialPay.value = dueBlance.value;
            handlePartialPay();
        }
    </script>

    <script>

    </script>




    <script src="{{ asset('assets/js/invoice.js') }}"></script>
@endsection
