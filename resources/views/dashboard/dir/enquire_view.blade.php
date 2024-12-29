@extends('dashboard.layout')

@php
    $index = 1;
@endphp

@section('content')
    <section class="p-3">
        <div class="bg-[#343A40] p-3 rounded text-white flex justify-between items-center">
            <h4 class="text-[20px]">View Enquire Message | {{$enquire->name}}</h4>
            <a href="/dashboard/dir/enquires" class="btn btn-orange">Back</a>
        </div>

        <div class="mt-4">
            <p><strong>Name:</strong> {{$enquire->name}}</p>
            <p><strong>Email:</strong> {{$enquire->email}}</p>
            <p><strong>Date:</strong> {{$enquire->created_at}}</p>
            <p><strong>Slug:</strong> <strong class="text-blue-600">{{$enquire->source}}</strong></p>

            <hr class="my-2">

            <div class="p-3 rounded bg-white my-3">
                {{$enquire->message}}
            </div>
            <hr>


            <div class="flex items-center gap-5 mt-3 ">
                
            </div>
        </div>

    </section>
@endsection