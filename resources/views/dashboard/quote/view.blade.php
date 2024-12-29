@extends('dashboard.layout')


@php

    $no = request('no');
    $index = 1;
@endphp

@section('content')
    <section class="p-3">

        <div class="bg-[#343A40] p-3 rounded text-white flex justify-between items-center">
            <h1 class="text-[20px]"><strong>Quote Request:</strong> Message  || No. {{$no}}</h1>
            <button class="btn btn-danger" data-toggle="modal" data-target="#exampleModal"><i class="fa-solid fa-trash-can"></i></button>
        </div>

        <div class="mt-4">
            <p class="my-2 text-[18px]"><strong>Name:</strong> {{$quote->name}}</p>
            <p class="my-2 text-[18px]"><strong>Email:</strong> {{$quote->email}}</p>
            <p class="my-2 text-[18px]"><strong>Phone:</strong> {{$quote->phone}}</p>
            <p class="my-2 text-[18px]"><strong>WhatsApp:</strong> {{$quote->whatsapp}} <a class="ms-5 btn btn-success btn-sm" target="_blank"  href="https://wa.me/{{$quote->whatsapp}}"><i class="fa-brands fa-whatsapp"></i></a></p>
            <p class="my-2 text-[18px]"><strong>Quote Type:</strong> {{$quote->type}}</p>
            <p class="my-2 text-[18px]"><strong>Supported Devices:</strong> {{$quote->device}}</p>
            <p class="my-2 text-[18px]"><strong>Timeline:</strong> {{$quote->timeline}}</p>
            <p class="my-2 text-[18px]"><strong>Budget Range:</strong> {{$quote->budget}}  {{$quote->currency}}</p>
            <p class="my-2 text-[18px]"><strong>Address:</strong> {{$quote->address}}</p>
            <hr class="mt-5">
            <p class=" text-[18px] bg-white p-3 rounded mt-3"><strong>About Quote:</strong> {{$quote->about}}</p>
            <p class="text-[18px]  bg-white p-3 rounded mt-3"><strong>More Brief:</strong> {{$quote->brief}}</p>
            <p class="text-[18px]  bg-white p-3 rounded mt-3"><strong>Describe More:</strong>{{$quote->describe}}</p>

            <hr class="my-3">

            <div class="flex items-center gap-4 mb-10">
                <a href="/dasboard/inbox/quote" class="btn btn-orange">Back</a>
                <form action="/dasboard/inbox/quote/status/{{ $quote->id }}" method="POST">
                    @csrf
                    <button id="back-button" disabled type="submit" class="btn btn-orange">{{$quote->status == "read" ? "Unread":"Read"}} & Back</button>
                </form>

                <div class="flex gap-5">
                    <button onclick="handlegreat(<?php echo $quote->id; ?> , 1, this)"><i class="fa-solid   text-green-500 fa-circle"></i></button>
                    <button onclick="handlegreat(<?php echo $quote->id; ?> , 2, this)"><i class="fa-solid  text-yellow-500 fa-circle"></i></button>
                    <button onclick="handlegreat(<?php echo $quote->id; ?> , 3, this)"><i class="fa-solid  text-red-500 fa-circle"></i></button>
                </div>
            </div>
        </div>



        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Delete Message || No. {{$no}}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Are you Sure ?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-orange" data-dismiss="modal">Close</button>
                  <form method="POST" action="/dasboard/inbox/quote/delete/{{ $quote->id }}">
                      @csrf @method('DELETE')
                      <button type="submit" class="btn btn-orange">Delete</button>
                  </form>
              </div>
              </div>
            </div>
          </div>


        <script>

            const handlegreat =(id, great, button)=>{
                fetch(`/dasboard/inbox/quote/great/${id}/${great}`)
                document.getElementById('back-button').removeAttribute('disabled');
                const buttons = document.querySelectorAll('button');
            buttons.forEach(btn => btn.classList.remove('scale-150'));
            button.classList.add('scale-150');
            }
        </script>
    </section>
@endsection
