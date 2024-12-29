@extends('dashboard.layout')



@section('meta')
    <style>
         @media print {
            @page {
                size: A4;
                margin: 5mm;
            }}
    </style>

@endsection


@php
    $nextNumber = $invoice->invoice_id + 1;
    $currentNumber =str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
    $currency = request('currency');
@endphp



@section('content')
    <style>

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

            color: black !important;
        }


        select::-ms-expand {
            display: none;
        }


        select{
            appearance: none ;
        }



        input{
            color: black !important;
        }

    </style>

    <section class="w-full p-3">


        


        <span class="hidden" id="currency-value">{{$currency}}</span>

        <div class="bg-[#343A40] p-3 rounded text-white flex justify-between items-center">
            <h1 class="text-[20px]">Create New Invoice</h1>
            <div class="flex gap-4">
                <button onclick="saveFileInDB()" class="btn btn-success">Pay <span id="amount-pay">0</span> {{$currency}}</button>
                <button class="btn btn-orange" onclick="goBack()">Back</button>
            </div>
        </div>

        <section id="extra-head">
            <h1 class="text-[20px]"></h1>
        </section>
        <form id="content-form" enctype="multipart/form-data" method="POST">
            @csrf

            <div class="hidden">
                <input type="text" name="product" id="product">
            </div>


            <div id="content" class=" container left-0 bg-white right-0  w-full p-5 mt-3 px-5">
                <div class="flex justify-between items-start">
                    <div class="w-1/2">

                        <label for="logo" class="h-[80px] w-[200px] flex justify-start overflow-hidden items-start "
                            id="logo-label">
                            <img src="{{$invoice->logo}}">
                            <input type="text" value="{{$invoice->logo}}" class="hidden" name="logo" id="logo">
                        </label>
                        <textarea id="form" name="form" rows="1"
                            class="resize-none p-2 border focus:outline-none mt-4 text-gray-500 border-slate-100 w-full  rounded"
                            placeholder="Who is this invoice from? (required)">{!!$invoice->from!!}</textarea>
                    </div>
                    <div class="text-end">
                        <h2 class="text-xl text-gray-500">INVOICE</h2>
                        <div class="mt-3 text-gray-500">
                            <input type="text" class="text-end focus:outline-none" name="invoice_id" readonly value="#{{$currentNumber}}">
                        </div>
                    </div>
                </div>
                <div class="flex justify-between gap-10 mt-4">
                    <div class="w-1/3">
                        <input type="text" value="Bill To" name="billto_text"
                            class="focus:outline-0 focus:shadow p-2 rounded focus:border hover:border-gray-200 border-white border w-full mb-1">
                        <textarea rows="1" id="autoResizeTextarea" name="billto_value"
                            class="resize-none p-2 border focus:outline-none text-gray-500 border-slate-100 w-full  rounded"
placeholder="Who is this invoice to? (required)">{{$client->name}}
{{$client->phone}}</textarea>
                    </div>
                    <div class="w-1/3">
                        <input type="text" value="Shift To" name="shiftto_text"
                            class="focus:outline-0 focus:shadow p-2 rounded focus:border hover:border-gray-200 border-white border w-full mb-1">
                        <textarea rows="1" name="shiftto_value"
                            class="resize-none auto-rows-auto p-2 border focus:outline-none text-gray-500 border-slate-100 w-full  rounded"
                            placeholder="Optional"></textarea>
                    </div>
                    <div class="w-1/3">
                        <div class="grid grid-cols-2">
                            <input type="text" name="date_text"
                                class="focus:outline-0 focus:shadow px-3 rounded focus:border border border-white hover:border-gray-500"
                                value="Date">
                            <input type="date" id="date_value" name="date_value"
                                class="p-2 border focus:outline-none text-gray-500 border-slate-100  rounded">
                        </div>
                        <div class="my-2 grid grid-cols-2">
                            <input type="text" name="payment_term_text" class="focus:outline-0 focus:shadow px-3 rounded focus:border hover:border-gray-200 border-white border" value="Payment Terms">
                            {{-- <input type="text" name="payment_term_value"  id="payment_term_value"  class="p-2  border border-slate-100 w-full  rounded focus:outline-none"> --}}


                            <select name="payment_term_value" id="payment_term_value" class="p-2  border border-slate-100 w-full  rounded focus:outline-none">
                                <option>Cash</option>
                                <option>Bkash</option>
                                <option>Nagad</option>
                                <option>Rocket</option>
                                <option>Bank</option>
                                <option>Other</option>
                            </select>

                        </div>

                        <div class="grid grid-cols-2">
                            <input type="text" name="due_date_text"
                                class="focus:outline-0 focus:shadow px-3 rounded focus:border border border-white hover:border-gray-500"
                                value="Due Date">
                            <input type="date" id="due_date" name="due_date_value"
                                class="p-2 border focus:outline-none text-gray-500 border-slate-100   rounded">
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
                                    <td class="bg-blue-950 text-white p-2">Type</td>
                                    <td class="bg-blue-950 text-white p-2">Rate</td>
                                    <td class="bg-blue-950 text-white p-2 rounded-r text-end pr-2">Amount</td>
                                </tr>
                            </thead>

                            <tbody id="item-parent">
                            </tbody>
                            <tr id="item-form">
                                <td>
                                    <textarea id="description" rows="1"  class=" mt-2 border focus:outline-none border-slate-100 w-full text-gray-500  rounded"  placeholder="Description of service or product..."></textarea>
                                </td>
                                <td class="w-16 align-top">
                                    <input id="quantity" onchange="quentityType()" type="number"  class="p-2 mt-2 border focus:outline-none border-slate-100 text-gray-500  rounded"  value="" placeholder="0" autocomplete="off">
                                </td>
                                <td class="w-16">
                                    <select name="type" id="type" class="focus:outline-none  border p-2">
                                        <option value="Kilograms">Kilograms</option>
                                        <option value="Grams">Grams</option>
                                        <option value="Liters">Liters</option>
                                        <option value="Milliliters">Milliliters</option>
                                        <option value="Meters">Meters</option>
                                        <option value="Centimeters">Centimeters</option>
                                        <option value="Pieces">Pieces</option>
                                        <option value="Units">Units</option>
                                        <option value="Dozens">Dozens</option>
                                        <option value="Boxes">Boxes</option>
                                        <option value="Packs">Packs</option>
                                        <option value="Sets">Sets</option>
                                        <option value="Rolls">Rolls</option>
                                        <option value="Pounds">Pounds</option>
                                        <option value="Tons">Tons</option>
                                        <option value="Gallons">Gallons</option>
                                        <option value="Barrels">Barrels</option>
                                        <option value="Pairs">Pairs</option>
                                        <option value="Hours">Hours</option>
                                        <option value="Bosta">Bosta</option>
                                    </select>
                                </td>
                                <td class="w-16 align-top flex items-center gap-3"><input id="rate" type="number"  class="p-2 mt-2 border focus:outline-none border-slate-100  text-gray-500  rounded"   value="" placeholder="0" autocomplete="off">
                                    <button onclick="addItemline()" type="button" id="item-button" class="border text-blue-900 btn mt-2 hover:text-white hover:bg-blue-900"><i><i class="fa-solid fa-check"></i></i></button>
                                </td>
                                <td class="text-end  text-black pr-2"><span class="pr-3">0</span> <span>{{$currency}}</span></td>
                            </tr>
                        </table>
                        
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-5">
                    <div>

                    </div>
                    <div class="px-2">
                        <div class="flex justify-end items-center gap-1">
                            <p>Sub Total</p>
                            <input id="sub-total" name="sub_total" type="number" readonly  class="focus:outline-0  rounded focus:border border text-end py-2 border-white hover:border-gray-500" value="0">
                            {{$currency}}
                        </div> 
                        <div id="shiping-button-group" class="flex justify-end items-center gap-3">
                            <button type="button" id="shipping-button" onclick="addshiping()"  class="btn btn-success btn-sm">+ Shipping</button>
                            <button type="button" id="tax-button" onclick="addTax()" class="btn btn-success btn-sm">+  Tax</button>
                            <button type="button" id="discount-button" onclick="addDiscount()"  class="btn btn-success btn-sm">+ Discount</button>
                        </div>
                        <div id="shipping-body" class="flex justify-end gap-20 hidden">
                            <input name="shiping_text" type="text"  class="focus:outline-0 focus:shadow  rounded focus:border border text-end py-2 border-white hover:border-gray-500"  value="Shiping">
                            <p class="w-32 text-end py-2 flex gap-1 justify-end"><input id="shipping"  name="shiping_value" onchange="totalAmount()" class="w-10 border-0 text-end focus:outline-none" type="number" value="0"> {{$currency}}</p>
                        </div>
                        <div id="discount-body" class="flex justify-end gap-20 hidden">
                            <input type="text" name="discount_text" class="focus:outline-0 focus:shadow  rounded focus:border border text-end py-2 border-white hover:border-gray-500"  value="Discount">
                            <p class="w-32 text-end py-2 flex gap-1 justify-end"><input id="discount"  name="discount_value" onchange="totalAmount()" class="w-10 border-0 text-end focus:outline-none" type="number" value="0">
                                <select onchange="totalAmount()" id="discountType" name="discount_type" class="focus:outline-none font-semibold">
                                    <option>{{$currency}}</option>
                                    <option>%</option>
                                </select>
                            </p>
                        </div>
                        <div id="tax-body" class="flex justify-end gap-20 hidden">
                            <input type="text" name="tax_text"
                                class="focus:outline-0 focus:shadow  rounded focus:border border text-end py-2 border-white hover:border-gray-500"
                                value="Tax">
                            <p class="w-32 text-end py-2 flex gap-1 justify-end"><input id="tax" name="tax_value"
                                    class="w-10 border-0 text-end focus:outline-none" onchange="totalAmount()"
                                    type="number" value="0">
                                <select onchange="totalAmount()" id="taxType" name="tax_type"
                                    class="focus:outline-none font-semibold">
                                    <option>{{$currency}}</option>
                                    <option>%</option>
                                </select>
                            </p>
                        </div>
                        {{-- http://content.jwplatform.com/manifests/vM7nH0Kl.m3u8 --}}
                        <div class="flex justify-end items-center gap-20">
                            <input type="text" name="total_text"  class="focus:outline-0 focus:shadow  rounded focus:border border text-end py-2 border-white hover:border-gray-500"   value="Total">
                            <p class="w-32 text-end py-2 flex gap-1"> <i onclick="adjustDue()" class="fa-solid cursor-pointer fa-turn-down"></i> <input value="0" type="number" id="total" name="total" class="w-full text-end focus:outline-none bg-white"  id="total" readonly> {{$currency}}</p>
                        </div>
                        <div class="flex justify-end items-center gap-20">
                            <input type="text" name="paid_text"   class="focus:outline-0 focus:shadow  rounded focus:border border text-end py-2 border-white hover:border-gray-500"  value="Paid">
                            <p class="w-32 text-end"> <input id="paid" name="paid_value" onchange="totalAmount()" class="w-20 border border-orange-500 text-end focus:outline-none" type="number" value="0">{{$currency}}</p>
                        </div>
                        <div class="flex justify-end gap-20">
                            <input name="due_text" type="text"  class="focus:outline-0 focus:shadow  rounded focus:border border text-end py-2 border-white hover:border-gray-500"    value="Due">
                            <p class="py-2 w-32 text-end"><input id="due-blance" name="due" class="w-20 border-0 text-end focus:outline-none" type="number" value="0"> {{$currency}}</p>
                        </div>
                    </div>
                </div>
                <div>
                    <input type="text" name="note_text"
                        class="focus:outline-0 px-2 rounded focus:border hover:border-gray-200 border-white border font-semibold"
                        value="Notes">
                    <textarea rows="1" name="note_value"
                        class="border focus:outline-none text-gray-500 border-slate-100 w-full  rounded">{!!$invoice->notes!!}</textarea>
                    <input type="text" name="term_text"
                        class="focus:outline-0 px-2 rounded focus:border hover:border-gray-200 border-white border font-semibold"
                        value="Terms">
                    <textarea rows="1" name="term_value"
                        class="border focus:outline-none text-gray-500 border-slate-100 w-full  rounded">{!!$invoice->terms!!}</textarea>
                </div>
            </div>
        </form>



        <!-- Button trigger modal -->
<button type="button"  id="confirm-modal" class="btn hidden  btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-slate-800 text-white">
          <h5 class="modal-title" id="exampleModalLabel">Payment Information</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="text-white">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <p> Total Amount : <span id="_total">0</span> {{$currency}}</p>
         <p> Paid Amount : <span id="_paid">0</span> {{$currency}}</p>
         <p> Total Due : <span id="_due">0</span> {{$currency}}</p>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" onclick="submitpayment()" class="btn btn-success">Pay</button>
        </div>
      </div>
    </div>
  </div>
    </section>


    <script>
        const adjustDue =()=>{
            const pay = document.getElementById('paid');
            const dueBlance = document.getElementById('due-blance');
            pay.value = dueBlance.value;
            totalAmount();
        }
    </script>



    <script>
        const quentityType = ()=>{
            const quantity = parseInt(document.getElementById('quantity').value);
            const typeSelect = document.getElementById('type');
            const options = typeSelect.options;


            for (let i = 0; i < options.length; i++) {
                let option = options[i];
                let value = option.value;

                let lastCharacter = value.slice(-1);
                console.log(lastCharacter);

                if(quantity == 1  && lastCharacter == 's'){
                    option.text = value.slice(0, -1);
                    option.value = value.slice(0, -1);
                }
                
                if(quantity > 1  && lastCharacter !== 's'){
                    option.text = value+'s';
                    option.value = value+'s';
                }


            }
        }

    </script>

    <script src="{{ asset('assets/js/invoice.js') }}"></script>
@endsection