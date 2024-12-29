@extends('dashboard.layout')

@section('content')
    <div class="p-3">
        

        <div class="bg-[#343A40] p-3 rounded text-white">
          <h1 class="text-[20px]">Add Review "{{$product->slug}}"</h1>
        </div>



        <div class="mt-3">
            <form method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" placeholder="Enter your name" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" placeholder="Enter your name" class="form-control" name="date">
                </div>
                <div class="form-group">
                    <label for="date">Description</label>
                    <textarea name="description" rows="5" class="form-control"></textarea>
                </div>
                <button class="btn btn-success">Submit</button>
            </form>
        </div>

        <h2 class="text-center my-5 text-xl ">Review List</h2>

        <div class="mt-5">
            @foreach ($review as $item)
                <div class="bg-white p-3 mt-3">
                    <h4 class="text-[20px] font-semibold">{{$item->name}}</h4>
                    <p class="my-3">{{$item->date}}</p>
                    <p>{{$item->description}}</p>
                    <div class="mt-3">
                        <a href="/dashboard/product/review/edit/{{$item->product_id}}/{{$item->id}}" class="btn btn-success">Edit</a>
                        <button type="button" data-toggle="modal" data-target="#exampleModal{{$item->id}}" class="btn btn-danger">Delete</button>
                    </div>
                </div>

                <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">{{$item->name}}</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                         <p>{{$item->description}}</p>
                         <p>{{$item->date}}</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <form action="/dashboard/product/review/delete/{{$item->id}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-primary">Delete</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
            @endforeach
        </div>
    </div>
@endsection
