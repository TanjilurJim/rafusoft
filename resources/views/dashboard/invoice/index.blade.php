@extends('dashboard.layout')


@php
    $index = 1;
@endphp

@section('content')
    <section class="p-3">

        <div class="bg-[#343A40] p-3 rounded text-white flex justify-between items-center">
            <h1 class="text-[20px] flex items-center">Client List <p class="px-2">|</p> <a href="/dashboard"
                    class="text-white">Dashboard</a></h1>
            @if ($profile)
                <div class="flex gap-3">
                    <a href="{{ route('client.downloadPDF') }}" class="btn btn-orange">Download Client Data</a>
                    <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Add Client</button>
                </div>
            @endif
        </div>


        @if (!$profile)
            <div class="mt-4 text-center">
                <h3 class="text-xl my-10 text-slate-400">Create Setting For Add client</h3>
                <a href="/dashboard/my-invoice-profile/create" class="btn btn-primary">Create setting</a>
            </div>
        @endif


        @if ($profile)
            <table class="w-full mt-4 border rounded overflow-hidden">
                <tr class=" bg-[#343A40] text-white ">
                    <td class=" py-2 ps-3">#</td>
                    <td class=" py-2 ">Id</td>
                    <td class=" py-2 ">Client</td>
                    <td class=" py-2 ">Phone</td>
                    <td class=" py-2 ">Total</td>
                    <td class=" py-2 ">Due</td>
                    <td class=" py-2 ">Paid</td>
                    <td class=" py-2 ">Issue</td>
                    <td class="p-1 py-2 text-center">Invoice</td>
                    <td class=" py-2 text-center">Status</td>
                    <td class=" py-2 text-center">Action</td>
                </tr>
                @foreach ($invoices as $item)
                    <tr class="border">
                        <td class=" py-1 text-center">{{ $index++ }}.</td>
                        <td class=" py-1 ">{{ $item->_id . $item->id }}</td>
                        <td class=" py-1 ">{{ $item->name }}</td>
                        <td class=" py-1 flex"> 
                            <form action="/dashboard/due-notice" method="POST">
                                @csrf
                                <input type="text" name="name" class="hidden" value="{{$item->name}}">
                                <input type="text" name="email" class="hidden" value="{{$item->u_email}}">
                                <input type="text" name="due" class="hidden" value="{{$item->due}}">
                                <input type="text" name="currency" class="hidden" value="{{$item->currency}}">
                                <button  type="{{$item->u_email ? "submit" : "button"}}"  class="pr-3"><i class="fa-solid fa-envelope scale-125  {{$item->u_email ? "text-[#e6b933]" : "text-[#b2b1b1]"}}" title="{{$item->u_email ? "Send due notice" : "Please add email"}}"></i></button>
                            </form>
                            <a target="_blank" href="https://wa.me/{{ $item->phone }}?text=Dear {{$item->name}}, your current due {{$item->due.$item->currency}}. Please pay your due.">
                                <i class="fa-brands scale-125 text-success fa-square-whatsapp"></i>
                            </a>
                            
                        <span class="ps-2">{{ $item->phone }}</span></td>
                        <td class=" py-1 ">{{ $item->total }} {{ $item->currency }}</td>
                        <td class=" py-1 ">{{ $item->due }} {{ $item->currency }}</td>
                        <td class=" py-1 ">{{ $item->paid }} {{ $item->currency }}</td>
                        <td class=" py-1 ">{{ $item->issu_date }}</td>
                        <td class="text-center">{{ count($item->totalInvoice) }}</td>
                        <td class=" py-1  text-center ">
                            <span class=" text-center">
                                @if ($item->total)
                                <span class="{{ $item->due == 0 ? 'bg-success' : 'bg-danger' }} block w-full h-full py-1">{{ $item->due == 0 ? "Paid": "Unpaid"}}</span>
                                @else
                                <span class="{{ $item->due == 0 ? 'bg-orange-600 text-white' : 'bg-danger' }} block w-full text-sm py-1">New</span>
                                @endif
                            </span>
                        </td>
                        <td class=" py-1 flex justify-center items-center gap-3">
                            <a href="/dashboard/invoice/view/{{ $item->id }}" class="btn btn-primary btn-sm" title="Go Invoice"><i  class="fa-solid fa-arrow-right-to-bracket"></i></a>
                            <a  href="/dashboard/invoice/edit/{{$item->id}}" title="Edit Client"  class="btn btn-success btn-sm"><i class="fa-regular fa-pen-to-square"></i></a>
                            <a href="/dashboard/invoice/create/{{ $item->id }}?currency={{ $item->currency }}" title="Create Invoice"  class="btn btn-primary btn-sm"><i class="fa-regular fa-file-lines"></i></a>
                            <button data-toggle="modal" data-target="#exampleModal{{ $item->id }}" title="Delete Client"  class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can "></i></button>
                        </td>
                    </tr>



                    {{-- Delete modal invoice  --}}
                    <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-slate-800 text-white">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Client</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span class="text-white" aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Name : {{ $item->name }}</p>
                                    <h4 class="mt-4">To confirm, type <strong>"DELETE"</strong> in the box below</h4>
                                    <input type="text" id="delete-input{{ $item->id }}"
                                        onkeyup="handleCheckDelete(<?php echo $item->id; ?>)" class="form-control mt-2">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <form action="/dashboard/client/delete/{{ $item->id }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" id="delete-button{{ $item->id }}" disabled
                                            class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </table>






            {{-- create invoice  --}}
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form method="POST" class="modal-content">
                        @csrf
                        <div class="modal-header bg-slate-800 text-white">
                            <h5 class="modal-title" id="exampleModalLabel">Add New Client</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span class="text-white" aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Name<span class="text-red-500">*</span></label>
                                <input type="text" placeholder="Enter Customer  Name" name="name" required
                                    class="form-control">
                            </div>
                            <input type="text" class="hidden" name="code" id="code">
                            <div>
                                <label for="phone" class='text-[16px]'>Mobile (WhatsApp):</label>
                                <input type="number" name='phone' id="mobile_code" onkeyup="conutryCode(this)"
                                    class='form-control' style="width: 100% !importent;" placeholder='Mobile' required />
                                @error('phone')
                                    <div class="text-red-500 mt-1">{{ $message }}</div>
                                @enderror
                                <p id="error-message" style="color: red;"></p>
                            </div>


                            <div class="from-group mt-3">
                                <label for="email">Email (optional)</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter your email">
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" id="add_button" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        @endif

        @error('phone')
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    toastr.error('{{ $message }}');
                });
            </script>
        @enderror


        <script>
            $("#mobile_code").intlTelInput({
                initialCountry: "bd",
                separateDialCode: true,
            });



            function validatePhoneNumber(phoneInput) {
                const errorMessage = document.getElementById('error-message');

                try {
                    const phoneNumber = libphonenumber.parsePhoneNumber(phoneInput);
                    if (phoneNumber.isValid()) {
                        errorMessage.textContent = '';
                        document.getElementById('add_button').removeAttribute("disabled");
                    } else {
                        errorMessage.textContent = 'Invalid phone number';
                        document.getElementById('add_button').addAttribute("disabled");
                    }
                } catch (error) {
                    errorMessage.textContent = 'Invalid phone number format';

                    const button = document.getElementById('add_button')
                    button.setAttribute("disabled", "true");
                }
            }



            const conutryCode = (input) => {
                const text = document.getElementsByClassName('iti__selected-dial-code')?.[0].innerText;
                console.log(text)
                console.log(input.value)

                document.getElementById('code').value = text;

                validatePhoneNumber(text + input.value)

                console.log(text + input.value);

                if (input.value.startsWith('0')) {
                    const errorMessage = document.getElementById('error-message');
                    errorMessage.textContent = 'Invalid phone number format';
                    document.getElementById('add_button').addAttribute("disabled");
                }
            }





            const handleCheckDelete = (id) => {

                const deleteButton = document.getElementById('delete-button' + id);
                const deleteInput = document.getElementById('delete-input' + id).value;

                if (deleteInput === "DELETE") {
                    deleteButton.removeAttribute('disabled');
                } else {
                    deleteButton.setAttribute('disabled', 'true');

                }

                console.log(deleteInput)
            }
        </script>

    </section>
@endsection
