@extends('dashboard.layout')


@php 
    $totalRefund = 0;

    foreach ($refund as $refunds) {
        $totalRefund += $refunds->total;
    }
@endphp


@section('content')
    @if (auth()->user()->isActive)
    <div class="p-3">
        <div class="bg-[#343A40] md:p-3 rounded text-white">
            <h1 class="text-[20px]">Main Dashboard</h1>
        </div>
        <section class="py-4">
            @if (auth()->user()->role == 'admin' || auth()->user()->role == 'superadmin')
               <section class="p-3 shadow ">
                <h2 class="text-2xl font-medium mb-3">Admin</h2>
                <div class="grid lg:grid-cols-3 md:grid-cols-3 grid-cols-1  gap-5">
                        <div class="h-40 rounded t shadow-md bg-[#5CA8FF] text-white flex justify-between items-center px-3">
                            <i class="fa-solid fa-file" style="transform: scale(2);"></i>
                            <div>
                                <p class="text-[20px]">Complete Dir Pages</p>
                                <strong class="text-xl">{{ $dir }}</strong>
                            </div>
                        </div>
                        <div class="h-40 rounded t shadow-md bg-[#44DCBE] text-white flex justify-between items-center px-3">
                            <i class="fa-solid fa-file" style="transform: scale(2);"></i>
                            <div>
                                <p class="text-[20px]">Complete Ref Pages</p>
                                <strong class="text-xl">{{ $ref }}</strong>
                            </div>
                        </div>
                        <div
                            class="h-40 rounded t shadow-md bg-[#FFC166] text-white flex justify-between items-center px-3 relative">
                            <i class="fa-solid fa-inbox" style="transform: scale(2);"></i>
                            <div>
                                <p class="text-[20px]">Inbox New Message</p>
                                <strong class="text-xl">{{ $unreadMessages }}</strong>
                            </div>
        
                            <div class="absolute bottom-1 left-4">
                                <a href="/dasboard/inbox/contact" class="btn btn-sm bg-white">Contact ({{ $unreadcontact }})</a>
                                <a href="/dasboard/inbox/career" class="btn btn-sm bg-white">Career ({{ $unreadCareer }})</a>
                                <a href="/dasboard/inbox/quote" class="btn btn-sm bg-white">Quote ({{ $unreadQuote }})</a>
                            </div>
                        </div>
                        <div class="h-40 rounded t shadow-md bg-[#FF7088] text-white flex justify-between items-center px-3">
                            <i class="fa-solid fa-receipt" style="transform: scale(2);"></i>
                            <div>
                                <p class="text-[20px]">Total Invoice Account</p>
                                <strong class="text-xl">{{ $invoice }}</strong>
                            </div>
                        </div>
                        <div class="h-40 rounded t shadow-md bg-[#a834c5] text-white flex justify-between items-center px-3">
                            <i class="fa-solid fa-user" style="transform: scale(2);"></i>
                            <div>
                                <p class="text-[20px]">Total User</p>
                                <strong class="text-xl">{{ $user }}</strong>
                            </div>
                        </div>
                    </div>
               </section>
            @endif

            @if (auth()->user()->invoice == 'on')
                <section class="p-3 shadow mt-4">
                    <h2 class="text-2xl font-medium mb-3">Invoice</h2>
                    <div class="grid lg:grid-cols-4 md:grid-cols-3 grid-cols-1  gap-2">
                        <div class="h-40 rounded t shadow-md bg-[#58A6FF] text-white flex justify-between items-center px-3">
                            <i class="fa-solid fa-user" style="transform: scale(2);"></i>
                            <div>
                                <p class="text-[20px]">Total Client</p>
                                <strong class="text-xl">{{ $invoices }}</strong>
                            </div>
                        </div>
                        <div class="h-40 rounded t shadow-md bg-[#F24D1D] text-white flex justify-between items-center px-3">
                            <i class="fa-solid fa-database" style="transform: scale(2);"></i>
                            <div>
                                <p class="text-[20px]">Total Due</p>
                                <strong class="text-[20px]">{{ $dueSum }} TK</strong>
                            </div>
                        </div>
                        <div class="h-40 rounded t shadow-md bg-[#353ec2] text-white flex justify-between items-center px-3">
                            <i class="fa-solid fa-file-invoice-dollar" style="transform: scale(2);"></i>
                            <div>
                                <p class="text-[20px]"> Total Balance</p>
                                <strong class="text-[20px]">{{ $totalSum }} TK</strong>
                            </div>
                        </div>
                        <div class="h-40 rounded t shadow-md bg-[#0FCF82] text-white flex justify-between items-center px-3">
                            <i class="fa-solid fa-file-invoice-dollar" style="transform: scale(2);"></i>
                            <div>
                                <p class="text-[20px]">Today Sold </p>
                                <strong class="text-[20px]">{{ $todaySum }} TK</strong>
                            </div>
                        </div>
                        <div class="h-40 rounded relative shadow-md bg-[#F97316] text-white flex justify-between items-center px-3">
                            <span class="bg-white text-black px-2 py-1 rounded-sm absolute bottom-1 left-1">Refund Invoice: {{count($refund)}}</span>
                            <i class="fa-solid fa-rotate-left" style="transform: scale(2);"></i>
                            <div>
                                <p class="text-[20px]">Total Refund</p>
                                <strong class="text-[20px]"> {{ $totalRefund}}  TK</strong>
                            </div>
                        </div>
                    </div>
                </section>
            @endif



        </section>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="">
                        <button type="button" class="close p-2" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <i class="fa-solid fa-triangle-exclamation text-danger" style="transform: scale(3);"></i>
                        <p class="mt-3">Please add secondary email to reset your password !</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="/profile" type="button" class="btn btn-orange">Set Email</a>
                    </div>
                </div>
            </div>
        </div>


        @php
            $email = auth()->user()->email;
            $s_email = auth()->user()->s_email;
            $domain = '@rafusoft.com';

            $status = strpos($email, $domain);
        @endphp




        @if ($status && $s_email == null)
            <script>
                $(document).ready(function() {
                    $('#exampleModal').modal('show');
                });
            </script>
        @endif
    </div>

    @else
        <div class="fixed w-full h-[100vh] z-50 top-0 left-0 bg-white flex justify-center items-center">
           <div class="text-center">
               <img class="mx-auto" src="https://media2.giphy.com/media/3osxY4mB281Du0F5E4/200.gif" alt="">
               <h1 class="text-3xl">Hi there,</h1>
               <h2 class="mt-2 text-2xl"> Please check your email from Rafusoft to confirm your account for {{auth()->user()->email}}</h2>
           </div>
        </div>
    @endif
@endsection
