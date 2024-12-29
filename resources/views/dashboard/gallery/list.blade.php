@extends('dashboard.layout')




@section('content')
    <div class="p-3">
       

        <div class="bg-[#343A40] p-3 rounded text-white">
          <h1 class="text-[20px]">Gallery List</h1>
      </div>

        <div class="grid lg:grid-cols-3 xl:grid-cols-4 md:grid-cols-2 grid-cols-1 gap-5 mt-3">
            @foreach ($gallery as $item)
                <div class="text-center p-2 bg-slate-50 border-4 border-white">
                    <img class="mx-auto" src="{{$item->photo}}" alt="">
                    <h3 class="my-4">{{$item->title}}</h3>
                    <p>{{$item->short_paragraph}}</p>
                    <div class="flex justify-center gap-5 mt-4">
                        <button data-toggle="modal" data-target="#editmodal{{$item->id}}" class="btn btn-orange"><i class="fa-solid fa-pen-to-square"></i></button>
                        <button data-toggle="modal" data-target="#deletemodal{{$item->id}}" class="btn btn-orange"><i class="fa-solid fa-trash-can"></i></button>
                        <form action="/dashboard/gallery/list/update-status/{{$item->id}}" method="POST">
                          @csrf
                          <button class="btn {{$item->status == "Active" ? "btn-secondary":"btn-orange"}}">{{$item->status == "Active" ? "Deactive" : "Active"}}</button>
                        </form>
                    </div>
                </div>


                {{-- /dashboard/gallery/list/delete/{id} --}}



                {{-- edit moddal  --}}
                <div class="modal fade" id="editmodal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Update Gallery</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <form action="/dashboard/gallery/list/{{$item->id}}" method="POST">
                                @csrf
                                <div>
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" name="title" value="{{$item->title}}">
                                </div>
                                <div>
                                    <label for="title">Short Paragraph</label>
                                    <input type="text" class="form-control" name="short_paragraph" value="{{$item->short_paragraph}}">
                                </div>
                                <div>
                                    <label for="title">Photo url</label>
                                    <input type="text" class="form-control" name="photo" value="{{$item->photo}}">
                                </div>
                                <div class="mt-5">
                                    <button type="button" class="btn btn-orange" data-dismiss="modal">Close</button>
                                    <button class="btn btn-orange">Save</button>
                                </div>
                            </form>
                        </div>
                      </div>
                    </div>
                  </div>


                {{-- edit moddal  --}}
                <div class="modal fade" id="deletemodal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Update Gallery</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <p>{{$item->title}}</p>
                            <p>{{$item->short_paragraph}}</p>
                            <img src="{{$item->photo}}" alt="">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-orange" data-dismiss="modal">Close</button>
                          <a href="/dashboard/gallery/list/delete/{{$item->id}}" type="button" class="btn btn-orange">Delete</a>
                        </div>
                      </div>
                    </div>
                  </div>
            @endforeach
        </div>
    </div>
@endsection