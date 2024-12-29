@extends('dashboard.layout')


@php
    $index = 1;
@endphp



@section('content')
    <div class="p-3">
        <div class="bg-[#343A40] rounded text-white flex justify-between p-3">
            <h1 class="text-[20px]">Subscription</h1>
        </div>


        <section class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4  grid-cols-1 mt-4 gap-5">
            <div class=" overflow-hidden bg-white rounded-lg shadow-lg relative">
                <div class="px-6 py-4 bg-gradient-to-r from-slate-500 to-orange-600">
                    <h2 class="text-2xl font-semibold text-white">Rafusoft Invoice</h2>
                    <small class="text-gray-200">We offers seamless invoicing, for both retail and business ensuring efficiency and accuracy in every transaction.</small>
                </div>
                <div class="px-6 pt-4">
                    <div class="text-4xl font-bold text-gray-800">Free<span class="text-lg text-gray-600">/month</span></div>
                </div>
                <div class="px-6 pt-4 pb-20">
                    <ul class="text-gray-600">
                        <li class="flex items-center">
                            <i class="fa-solid fa-check text-green-500 scale-75 mr-2"></i>
                            Easy To Use
                        </li>
                        <li class="flex items-center">
                            <i class="fa-solid fa-check text-green-500 scale-75 mr-2"></i>
                            Client Manage
                        </li>
                        <li class="flex items-center">
                            <i class="fa-solid fa-check text-green-500 scale-75 mr-2"></i>
                            Report
                        </li>
                        <li class="flex items-center">
                            <i class="fa-solid fa-check text-green-500 scale-75 mr-2"></i>
                            Due & Partial Payment
                        </li>
                        <li class="flex items-center">
                            <i class="fa-solid fa-check text-green-500 scale-75 mr-2"></i>
                            Refund & Sattlement
                        </li>
                        <li class="flex items-center">
                            <i class="fa-solid fa-check text-green-500 scale-75 mr-2"></i>
                            Tax, Discount, Shiping
                        </li>
                        <li class="flex items-center">
                            <i class="fa-solid fa-check text-green-500 scale-75 mr-2"></i>
                            Multi Currency Support
                        </li>
                    </ul>
                </div>
                <div class="px-6  pb-6 text-center absolute bottom-1 w-full">
                    <form method="POST">
                        @csrf
                        <button @disabled(auth()->user()->invoice == 'on') class="btn   {{ auth()->user()->invoice == 'on' ? 'btn-success' : 'btn-orange' }}  text-white">{{ auth()->user()->invoice == 'on' ? 'Active' : 'Subscribe' }}</button>
                        <input type="text" name="subscribe" value="invoice" class="hidden">
                    </form>
                </div>
            </div>
            <div class=" overflow-hidden bg-white rounded-lg shadow-lg relative">
                <div class="px-6 py-4 bg-gradient-to-r from-slate-500 to-orange-600">
                    <h2 class="text-2xl font-semibold text-white">Directory Pages</h2>
                    <small class="text-gray-200">Boost your business with Rafusoft—expert portfolio creation, SEO, and marketing.</small>
                </div>
                <div class="px-6 pt-4">
                    <div class="text-4xl font-bold text-gray-800">Free<span class="text-lg text-gray-600">/month</span></div>
                </div>
                <div class="px-6 py-4">
                    <ul class="text-gray-600">
                        <li class="flex items-center">
                            <i class="fa-solid fa-check text-green-500 scale-75 mr-2"></i>
                           1 Page
                        </li>
                        <li class="flex items-center">
                            <i class="fa-solid fa-check text-green-500 scale-75 mr-2"></i>
                            Free SEO
                        </li>
                        <li class="flex items-center">
                            <i class="fa-solid fa-check text-green-500 scale-75 mr-2"></i>
                            Content Fully Customizeable
                        </li>
                        <li class="flex items-center">
                            <i class="fa-solid fa-check text-green-500 scale-75 mr-2"></i>
                            10 MB File Manager
                        </li>
                    </ul>
                </div>
                <div class="px-6  pb-6 text-center absolute bottom-1 w-full">
                    <form method="POST">
                        @csrf
                        <button @disabled(auth()->user()->dir == 'on') class="btn   {{ auth()->user()->dir == 'on' ? 'btn-success' : 'btn-orange' }}  text-white">{{ auth()->user()->dir == 'on' ? 'Active' : 'Subscribe' }}</button>
                        <input type="text" name="subscribe" value="dir" class="hidden">
                    </form>
                </div>
            </div>
        </section>



    </div>
@endsection





{{-- 

context / {
type        appserver
location    /home/api.rafusoft.com/public_html
binPath     /user/bin/node
appType     node
maxConns    100

rewrite{

}

adddefaultCharset off

}


--}}