@extends('dashboard.layout')




@php
    $product = json_decode($invoicelist->product, true);
    $index = 2;

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
    </style>


    <section class="p-3">
        <div class="bg-[#343A40] p-3 rounded text-white flex justify-between items-center">
            <h1 class="text-[20px]">Partial Invoice List | ID: {{ $invoicelist->invoice_id }}</h1>

            <div class="flex gap-4 justify-end">


                @if (!$invoicelist->refund)
                    @if ($invoicelist->total - $invoicelist->paid_value > 0)
                        <a href="/dashboard/invoice/partial-pay/{{ $invoicelist->id }}/{{ $invoicelist->user_id }}?currency={{ $client->currency }}"
                            class="btn btn-success flex items-center"><i class="fa-regular fa-money-bill-1 mr-2"></i><span
                                class="w-20">Pay Due</span></a>
                    @endif
                @endif


                <a href="/dashboard/invoice" class="btn btn-orange">Back</a>
            </div>
        </div>

        <section>
            <table class="w-full  mt-4 table rounded overflow-hidden">
                <tr class="bg-[#343A40] text-white">
                    <td class=" py-2 text-center">#</td>
                    <td class=" py-2 ">Partial Type</td>
                    <td class=" py-2 ">Name</td>
                    <td class=" py-2 ">Invoice Id</td>
                    <td class=" py-2 ">Amount Paid</td>
                    <td class=" py-2 ">Due</td>
                    <td class=" py-2 ">Date</td>
                    <td class=" py-2 text-center">Action</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Main Invoice</td>
                    <td>{{ $client->name }}</td>
                    <td> {{ $invoicelist->invoice_id }}
                    </td>
                    <td>{{ $invoicelist->paid_value - $total_partial_pay }} {{ $client->currency }}</td>
                    <td>{{ $invoicelist->total - $amountPaid }} {{ $client->currency }}</td>
                    <td>{{ DateTime::createFromFormat('Y-m-d', $invoicelist->date_value)->format('F j, Y') }}</td>
                    <td class="text-center"><a
                            href="/dashboard/invoice/single-view/{{ $invoicelist->id }}?partial=&currency={{ $client->currency }}"
                            class="btn btn-sm btn-primary"><i class="fa-solid fa-right-to-bracket"></i></a></td>
                </tr>
                @foreach ($partial as $item)
                    <tr>
                        <td>{{ $index++ }}</td>
                        <td>
                            @if ($item->partial_length == 1)
                                <p>1st</p>
                                <input type="number" class="hidden" name="partial_length" value="1">
                            @elseif($item->partial_length == 2)
                                <p>2nd</p>
                                <input type="number" class="hidden" name="partial_length" value="2">
                            @elseif($item->partial_length == 3)
                                <p>3rd</p>
                                <input type="number" class="hidden" name="partial_length" value="3">
                            @elseif($item->partial_length > 3)
                                <p>{{ $item->partial_length }}th</p>
                                <input type="number" class="hidden" name="partial_length"
                                    value="{{ $item->partial_length + 1 }}">
                            @endif
                        </td>
                        <td>{{ $client->name }}</td>
                        <td>
                            @if ($item->partial_length >= 1 && $item->partial_length <= 26)
                                @php
                                    $letter = chr(64 + $item->partial_length);
                                @endphp
                                {{ $invoicelist->invoice_id . $letter }}
                            @endif
                        </td>
                        <td>{{ $item->partial_pay }} {{ $client->currency }}</td>
                        <td>{{ $item->current_due }} {{ $client->currency }}</td>
                        <td>{{ DateTime::createFromFormat('Y-m-d', $item->pay_date)->format('F j, Y') }}</td>
                        <td class="text-center"><a
                                href="/dashboard/invoice/single-view/{{ $invoicelist->id }}?partial={{ $item->partial_length }}&currency={{ $client->currency }}"
                                class="btn btn-sm btn-primary"><i class="fa-solid fa-right-to-bracket"></i></a></td>
                    </tr>
                @endforeach


                <tr class="border-t-2 border-black pt-3">
                    <td class="border-t-2 border-black pt-3"></td>
                    <td class="border-t-2 border-black pt-3"></td>
                    <td class="border-t-2 border-black pt-3"></td>
                    <td class="border-t-2 border-black pt-3"></td>
                    <td class="border-t-2 border-black pt-3 font-semibold">Total Paid = {{ $invoicelist->paid_value }}
                        {{ $client->currency }}</td>
                    <td class="border-t-2 border-black pt-3 font-semibold">
                        @if ($invoicelist->total - $invoicelist->paid_value > 0)
                            Total Due = {{ $invoicelist->total - $invoicelist->paid_value }} {{ $client->currency }}
                        @endif
                    </td>
                    <td class="border-t-2 border-black pt-3"></td>
                    <td class="text-center">
                        <button data-toggle="modal" data-target="#exampleModal" onclick="handleShare(<?php echo $invoicelist->id; ?>)"
                            class="btn btn-sm btn-primary"><i class="fa-solid fa-share-nodes mr-2"></i> Share</button>
                        <button onclick="handleDownload(<?php echo $invoicelist->id; ?>)" class="btn btn-sm btn-success"><i
                                class="fa-solid fa-download mr-2"></i> Download All</button>
                    </td>
                </tr>

            </table>
        </section>


        <div id="pdf-loader"
            class="h-[100vh] w-full fixed bg-[#ffffff13] left-0 top-0 z-50 hidden justify-center items-center">
            <img class="w-16"
                src="https://raw.githubusercontent.com/Codelessly/FlutterLoadingGIFs/master/packages/cupertino_activity_indicator.gif"
                alt="">
            <a id="download_link" target="_blank" download="invoice.pdf"
                href="http://localhost:3001/invoice/1723555607764.pdf"></a>
        </div>


        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Share as PDF</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img id="loader_img" class="w-16 mx-auto hidden"
                            src="https://raw.githubusercontent.com/Codelessly/FlutterLoadingGIFs/master/packages/cupertino_activity_indicator.gif"
                            alt="">
                        <div id="link-from" class="form-group flex gap-3 hidden">
                            <input id="input-box" type="text" class="form-control">
                            <button onclick="handleCopy()" id="copyButton" class="btn btn-primary"><i
                                    class="fa-solid fa-copy"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </section>

    <script>
        const downloadPDF = (url) => {
            const link = document.getElementById('download_link');
            link.href = url;
            link.download = true;
            link.click();
        };




        const handleShare = (id) => {
            const loader = document.getElementById('loader_img');
            const linkBox = document.getElementById('link-from');
            const inputBox = document.getElementById('input-box');
            const copyButton = document.getElementById('copyButton');

            loader.classList.remove('hidden');

            const url = `https://api.rafusoft.com/generate-pdf`;
            const download_url = `https://rafusoft.com/invoice/download/${id}`;

            fetch(url, {
                    method: "POST",
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        url: download_url
                    })

                })
                .then(res => res.json())
                .then(data => {
                    console.log(data)
                    loader.classList.add('hidden')
                    linkBox.classList.remove('hidden')
                    inputBox.value = data.url;
                })
                .catch(error => console.error('Error:', error));
        }


        const handleCopy = () => {
            const url = document.getElementById('input-box').value;


            navigator.clipboard.writeText(url)
                .then(() => {
                    
                })
                .catch(err => {

                });


            copyButton.classList.add('btn-success');
            copyButton.classList.remove('btn-primary');
            copyButton.innerText = "Copied"

        }


        const handleDownload = (id) => {
            const loader = document.getElementById('pdf-loader');

            loader.classList.remove('hidden')
            loader.classList.add('flex')
            console.log('loading....');
            const url = `https://api.rafusoft.com/generate-pdf`;
            const download_url = `https://rafusoft.com/invoice/download/${id}`;

            fetch(url, {
                    method: "POST",
                    headers: { // Fixed spelling here
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        url: download_url
                    })

                })
                .then(res => res.json())
                .then(data => {
                    console.log(data)
                    loader.classList.add('hidden')
                    loader.classList.remove('flex')
                    downloadPDF(data.url)
                })
                .catch(error => console.error('Error:', error));
        }
    </script>



    <script src="{{ asset('assets/js/invoice.js') }}"></script>
@endsection
