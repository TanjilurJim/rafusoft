@extends('dashboard.layout')

@section('content')

<section class="p-3">
   

    <div class="bg-[#343A40] p-3 rounded text-white">
      <h1 class="text-[20px]">Product Page List</h1>
    </div>


    <div class="mt-4">
       <table class="table table-border">
            <tr>
                <th>Slug</th>
                <th>Title</th>
                <th>Action</th>
            </tr>

            @foreach ($products as $item)
                <tr>
                    <td>{{$item->slug}}</td>
                    <td>{{$item->title}}</td>
                    <td>
                        <a target="_blank" href="/product/{{$item->slug}}" class="btn btn-success">View</a>
                        <a href="/dashboard/product/edit/{{$item->id}}" class="btn btn-secondary">Edit</a>
                        <a href="/dashboard/product/review/{{$item->id}}" class="btn bg-orange-600 hover:bg-orange-700 text-white font-medium">Review</a>
                        <a href="/dashboard/product/faq/{{$item->id}}" class="btn bg-primary text-white font-medium">FAQ</a>
                        <button type="button" class="btn btn-orange"  data-toggle="modal" data-target="#exampleModal{{$item->id}}">Delete</button>
                    </td>
                </tr>

                <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">{{$item->slug}}</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                         Are you Sure
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-orange" data-dismiss="modal">Close</button>
                          <form action="/dashboard/product/delete/{{$item->id}}" method="POST" >
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-orange">Delete</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
            @endforeach
       </table>
    </div>
</section>

@endsection