@extends('dashboard.layout')


@php
    $index = 1;
@endphp


@section('content')
    <div class="p-3">

        <div class="bg-[#343A40] p-3 rounded text-white flex justify-between items-center">
            <h1 class="text-[20px]">{{$client->name}} | Invoice List</h1>
            <div class="flex gap-2 items-center">
                <a href="/dashboard/invoice/create/{{$client->id}}?currency={{$client->currency}}" class="btn btn-success">Create Invoice</a>
                <a href="/dashboard/invoice" class="btn btn-orange">Back</a>
            </div>
        </div>

        <table class="w-full  mt-4  rounded overflow-hidden">
            <tr class="bg-[#343A40] text-white border-l-2">
                <td class="p-1 py-2 text-center">#</td>
                <td class="p-1 py-2 ">Name</td>
                <td class="p-1 py-2 ">Invoice Id</td>
                <td class="p-1 py-2 ">Total</td>
                <td class="p-1 py-2 ">Paid</td>
                <td class="p-1 py-2 ">Due</td>
                <td class="p-1 py-2 text-center">Status</td>
                <td class="p-1 py-2"><p class="ps-5">Date</p></td>
                <td class="p-1 py-2 text-center">Action</td>
            </tr>

            @foreach ($invoice as $item)
                <tr class="rounded-xl border-b border-l border-r {{ $item->refund ? 'bg-stone-200' : '' }}">
                    <td class="p-1 text-center">{{ $index++ }}</td>
                    <td class="p-1  {{ $item->refund ? 'opacity-50' : '' }}">{{ $client->name }}</td>
                    <td class="p-1  {{ $item->refund ? 'opacity-50' : '' }}">{{ $item->invoice_id }}</td>
                    <td class="p-1  {{ $item->refund ? 'opacity-50' : '' }}">{{ $item->total }} {{ $client->currency}}</td>
                    <td class="p-1  {{ $item->refund ? 'opacity-50' : '' }}">{{ $item->paid_value }}  {{ $client->currency}}</td>
                    <td class="p-1  {{ $item->refund ? 'opacity-50' : '' }}">{{ $item->due }}</td>
                    
                    @if (!$item->refund)
                    <td> <span class="{{ $item->due > 0 ? 'bg-danger text-center' : 'bg-success text-center'}} block py-1"> {{ $item->due > 0 ? 'Unpaid' : 'Paid' }}</span></td>
                    @else
                    <td ><span class="bg-orange-500 text-center text-white py-1 block w-full">Refund</span></span></td>  
                    @endif

                    <td class="p-1  {{ $item->refund ? 'opacity-50' : '' }}"><p class="ps-5">{{ DateTime::createFromFormat('Y-m-d', $item->date_value)->format('F j, Y') }}</p></td>
                    <td class="p-1 text-center flex justify-center gap-3">
                        <a href="/dashboard/invoice/partial-view/{{ $item->id }}" class="btn btn-primary btn-sm"><i class="fa-solid fa-arrow-right-to-bracket"></i></a>
                        <button @disabled($item->refund) data-toggle="modal" data-target="#refund{{ $item->id }}"  class="btn bg-orange-500 text-white btn-sm"><i class="fa-solid fa-rotate-right"></i></button>
                        <button data-toggle="modal" data-target="#exampleModal{{ $item->id }}"  class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                    </td>


                    {{-- modal  --}}
                    <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-slate-800 text-white">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Invoice</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span class="text-white" aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>{{ $client->name }}</p>
                                    <p>Invoice Id : {{ $item->invoice_id }}</p>
                                    <h4 class="mt-4">To confirm, type <strong>"DELETE"</strong> in the box below</h4>
                                    <input type="text" id="delete-input{{ $item->id }}"
                                        onkeyup="handleCheckDelete(<?php echo $item->id; ?>)" class="form-control mt-2">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <form action="/dashboard/invoice/delete/{{ $item->id }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" disabled id="delete-button{{ $item->id }}"
                                            class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="refund{{ $item->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-slate-800 text-white">
                                    <h5 class="modal-title" id="exampleModalLabel">Refund</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span class="text-white" aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="text-start">
                                        <p>Client Name : {{ $client->name }}</p>
                                        <p>Invoice Id : {{ $item->invoice_id }}</p>
                                    </div>
                                    <h4 class="mt-4">To confirm, type <strong>"REFUND"</strong> in the box below</h4>
                                    <input type="text" id="refund-input{{ $item->id }}"
                                        onkeyup="handleCheckRefund(<?php echo $item->id; ?>)" class="form-control mt-2">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <form method="POST" action="/dashboard/invoice/view/refund/{{ $item->id }}">
                                        @csrf
                                        <button type="submit" id="refund-button{{ $item->id }}" disabled="true"
                                            class="btn btn-success">Refund</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </tr>
            @endforeach
    </div>

    </table>

    <script>
        const handleCheckRefund = (id) => {
            const refundButton = document.getElementById('refund-button' + id);
            const refundInput = document.getElementById('refund-input' + id).value;
            if (refundInput === "REFUND") {
                refundButton.removeAttribute('disabled');
            } else {
                refundButton.setAttribute('disabled', 'true');
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


            console.log(deleteInput);
        }
    </script>

    <script src="{{ asset('assets/js/invoice.js') }}"></script>

    </div>
@endsection
