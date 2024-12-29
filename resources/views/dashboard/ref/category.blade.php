@extends('dashboard.layout')

@section('content')
    <section class="p-3">
        <div class="bg-[#343A40] p-3 rounded text-white">
            <h4 class="text-[20px]">Add New Category</h4>
        </div>
        @php
            $index = 1;
        @endphp

        <section>
            <div>
                <form method="POST">
                    @csrf
                    <div class="from-group mt-5">
                        <label for="name">Category Name</label>
                        <input name="name" type="text" placeholder="Category Name" class="form-control">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button class="btn btn-orange mt-4">Submit</button>
                </form>
            </div>
            <div class="mt-10">
                <table  class="table">
                    <thead>
                        <tr class="bg-slate-900 text-white">
                            <th>#</th>
                            <th>Name</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $item)
                            <tr>
                                <td>{{ $index++ }}</td>
                                <td>{{ $item->name }}</td>
                               
                                <td class="flex justify-center items-center gap-5">
                                    <a  href="/dashboard/ref/edit/{{ $item->id }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <button type="button" data-toggle="modal" data-target="#exampleModal{{$item->id}}"> <i class="fa-solid fa-trash-can"></i> </button>
                                </td>

                            </tr>

                            <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Are you Sure ?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                          {{$item->name}}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-orange" data-dismiss="modal">Close</button>
                                            <form method="POST" action="/dashboard/ref/caregory-delete/{{$item->id}}">
                                                @csrf                                                @method("DELETE")
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

        <!-- Modal -->
        
    </section>
@endsection
