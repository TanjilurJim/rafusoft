@extends('dashboard.layout')

@section('content')
    <div class="p-3 relative">

        <div class="bg-[#343A40] p-3 rounded text-white">
            <h1 class="text-[20px]">Team Members</h1>    
        </div>
        <section class="grid md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-4 grid-cols-1 gap-3 mt-5">
            @foreach ($teams as $item)
                <div class="border">
                    <img class="w-full" src="{{ $item->photo }}" alt="">
                    <p class="text-center">{{ $item->name }}</p>
                    <p class="text-center">{{ $item->post }}</p>
                    <div class="p-2 flex justify-center items-center gap-4">
                        <a href="/dashboard/team/team-members/edit/{{ $item->id }}" class="btn  btn-orange"><i  class="fa-regular fa-pen-to-square"></i></a>
                        <button class="btn  btn-orange" data-toggle="modal" data-target="#exampleModal{{ $item->id }}"><i class="fa-solid fa-trash-can"></i></button>
                        <form action="/dashboard/team/team-members/update-status/{{$item->id}}" method="POST">
                            @csrf
                            <button class="btn {{$item->status == "Active" ? "btn-secondary":"btn-orange"}}">{{$item->status == "Active" ? "Deactive" : "Active"}}</button>
                        </form>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{ $item->name }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <img src="{{ $item->photo }}" alt="">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <form action="/dashboard/delete/team/{{ $item->id }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </section>
    </div>
@endsection
