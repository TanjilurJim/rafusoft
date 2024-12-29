@extends('dashboard.layout')

@section('content')


@php
    $index=1;
@endphp

    <section class="p-3">
        <div class="bg-[#343A40] p-3 rounded text-white">
            <h1 class="text-[20px]">Download From List</h1>
        </div>

        <div class="card-body">
            <table class="table" style="width: 100% ; overflow: scroll" >
              <thead>
              <tr class="bg-slate-900 text-white">
                <th>#</th>
                <th>Title</th>
                <th>url</th>
                <th>Description</th>
                <th class="text-center">Action</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($download as $item)
                    <tr>
                        <td>{{$index++}}</td>
                        <td>{{$item->title}}</td>
                        <td>{{$item->url}}</td>
                        <td>{{ strlen($item->description) > 20 ? substr($item->description, 0, 20) . '...' : $item->description }}</td>
                        <td class="flex gap-5 items-center justify-center">
                            <a href="/dashboard/download-from/edit/{{$item->id}}"><i class="fa-solid fa-pen-to-square"></i></a>
                            <button type="button"  data-toggle="modal" data-target="#exampleModal{{$item->id}}">
                                        <i class="fa-solid fa-trash-can"></i>
                            </button>
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
                                  {{$item->title}}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn-orange rounded" data-dismiss="modal">Close</button>
                                    <form method="POST" action="/dashboard/downloadfrom-delete/{{$item->id}}">
                                        @csrf                                                @method("DELETE")
                                        <button type="submit" class="btn-orange rounded">Delete</button>
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