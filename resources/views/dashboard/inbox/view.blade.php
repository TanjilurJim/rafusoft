@extends('dashboard.layout')


@php
    $no = request('no');
    $index = 1;
@endphp

@section('content')
    <section class="p-3">
        <div class="bg-[#343A40] p-3 rounded text-white flex justify-between items-center">
            <h1 class="text-[20px]"><strong>Contact:</strong> Message || No. {{$no}}</h1>
            @if (auth()->user()->roel == 'superadmin')
            <button class="btn btn-danger" data-toggle="modal" data-target="#exampleModal"><i class="fa-solid fa-trash-can"></i></button>
            @endif
        </div>


        <div class="mt-4">
            <p><strong>Name:</strong> {{$message->name}}</p>
            <p><strong>Email:</strong> {{$message->email}}</p>
            <p><strong>Date:</strong> {{$message->created_at}}</p>

            <hr class="my-2">

            <div class="p-3 rounded bg-white my-3">
                {{$message->message}}
            </div>
            <hr>


            <div class="flex items-center gap-5 mt-3 ">
                <a href="/dasboard/inbox/contact/" class="btn btn-orange">Back</a>
                <form action="/dasboard/inbox/contact/status/{{ $message->id }}" method="POST">
                    @csrf
                    <button type="submit" disabled id="back-button" class="btn btn-orange">{{$message->status == "read" ? "Unread":"Read"}} & Back</button>
                </form>
                <div class="flex gap-5">
                    <button onclick="handlegreat(<?php echo $message->id; ?> , 1, this)"><i class="fa-solid   text-green-500 fa-circle"></i></button>
                    <button onclick="handlegreat(<?php echo $message->id; ?> , 2, this)"><i class="fa-solid  text-yellow-500 fa-circle"></i></button>
                    <button onclick="handlegreat(<?php echo $message->id; ?> , 3, this)"><i class="fa-solid  text-red-500 fa-circle"></i></button>
                </div>
            </div>
        </div>



        <!-- Modal -->
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
          <form method="POST" action="/dasboard/inbox/contact/delete/{{ $message->id }}">
              @csrf @method('DELETE')
              <button type="submit" class="btn btn-orange">Delete</button>
          </form>
      </div>
      </div>
    </div>
  </div>


        <script>

            const handlegreat =(id, great, button)=>{
                fetch(`/dasboard/inbox/contact/great/${id}/${great}`)
                document.getElementById('back-button').removeAttribute('disabled');
                const buttons = document.querySelectorAll('button');
            buttons.forEach(btn => btn.classList.remove('scale-150'));
            button.classList.add('scale-150');
            }
        </script>

    </section>
@endsection
