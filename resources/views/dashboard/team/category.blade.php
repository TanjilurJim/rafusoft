@extends('dashboard.layout')

@php

    $index = 1;
@endphp


@section('content')
    <div class="p-3 relative">
        <div class="bg-[#343A40] p-3 rounded text-white">
            <h1 class="text-[20px]">Our Team Category</h1>
        </div>


        <form method="POST">
            @csrf
            <div class="form-group my-4">
                <label for="category">Category</label>
                <input type="text" name="category" class="form-control">
                @error('category')
                    <div class="text-red-500 mt-1">{{ $message }}</div>
                @enderror
            <div class="form-group my-4">
                <label for="category_order">Category Order</label>
                <input type="number" name="category_order" class="form-control">
                @error('category_order')
                    <div class="text-red-500 mt-1">{{ $message }}</div>
                @enderror
                <button class="btn my-3 btn-orange">Submit</button>
            </div>
        </form>

        <section>

            <table class="border table rounded overflow-hidden">
                <tr class="bg-slate-900 text-white">
                    <th>#</th>
                    <th>Name</th>
                    <th class="text-center">Action</th>
                </tr>
                @foreach ($categories as $item)
                    <tr>
                        <td>{{ $item->category_order }}</td>
                        <td>{{ $item->category }}</td>
                       
                        <td class="text-center">
                            <button class="mx-3" type="button" data-toggle="modal" data-target="#exampleModal{{$item->id}}"><i class="fa-solid fa-trash-can"></i></button>
                            <button type="button" class="mx-3"  data-toggle="modal" data-target="#edit-modal{{$item->id}}"><i class="fa-solid fa-pen-to-square"></i></button>
                        </td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">{{ $item->category }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                   Are you Sure ?
                                </div>
                                <div class="modal-footer">
                                    <form method="POST" action="/dashboard/team/category/delete/{{$item->id}}">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="edit-modal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Category {{ $item->category }} </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="POST" action="/dashboard/team/category/edit/{{$item->id}}">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="Category">Category</label>
                                            <input type="text" name="category" value="{{$item->category}}" class="form-control">
                                       </div>
                                       <div class="form-group">
                                            <label for="Category">Category Order</label>
                                            <input type="text" name="category_order" value="{{$item->category_order}}" class="form-control">
                                       </div>
                                       <button class="btn btn-success">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </table>

        </section>
    </div>
@endsection
