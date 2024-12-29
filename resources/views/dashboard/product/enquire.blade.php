@extends('dashboard.layout')


@php
    $index = 1;
@endphp

@section('content')
    <section class="p-3">


        <div class="bg-[#343A40] p-3 rounded text-white flex justify-between items-center mb-3">
            <h1 class="text-[20px]">Enquire List</h1>
            <a href="/dashboard/" class="btn btn-orange">Back</a>
        </div>

        <section>
            <table class="table mt-4">
                <tr class="bg-[#343A40] text-white">
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Product ID</th>
                    <th>Slug</th>
                    <th class="text-center">Action</th>
                </tr>
                @foreach ($enquires as $item)
                    <tr>
                        <td>{{ $index++ }}. </td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->product_id }}</td>
                        <td>{{ $item->slug }}</td>
                        <td class="text-center">
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal{{$item->id}}"><i class="fa-solid fa-trash-can"></i></button>
                        </td>
                    </tr>


                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Quries  #{{$item->id}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Are you Sure ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <form action="/dashboard/product/enquirelist/delete/{{$item->id}}" method="POST">
                                        @method("DELETE")
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </table>
        </section>
    </section>
@endsection
