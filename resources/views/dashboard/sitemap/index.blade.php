@extends('dashboard.layout')

@php
    $index = 1;
@endphp

@section('content')
    <div class="p-3">
        <div class="bg-[#343A40] p-3 rounded text-white flex justify-between items-center">
            <h1 class="text-[20px]">Sitemap</h1>

            <form action="{{ route('export.sitemap') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="btn btn-orange">Export</button>
            </form>
        </div>
        <form method="POST">
            @csrf
            <div class="form-group mt-4">
                <label for="">Enter slug (https://rafusoft.com)</label>
                <input type="text" name="slug" placeholder="slug" class="form-control">
                @error('slug')
                    <div class="text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn-orange rounded">Save</button>
        </form>


        <div class="card-body">
            <table class="w-full table-border table  mt-10 rounded overflow-hidden">
                <tr class="bg-slate-900 hover:bg-slate-900 text-white">
                    <th class="p-2">#</th>
                    <th class="p-2">slug</th>
                    <th class="text-center">Action</th>
                </tr>

                @foreach ($sitemaps as $item)
                    <tr class="border-b">
                        <td class="py-3">{{ $index++ }}</td>
                        <td class="py-3">{{ $item->slug }}</td>
                        <td class="text-center flex gap-10  justify-center py-3">
                            <button type="button" data-toggle="modal" data-target="#exampleModal{{ $item->id }}">
                                <i class="fa-regular mx-2 fa-trash-can"></i>
                            </button>
                        </td>
                    </tr>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">{{ $item->slug }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Are you Sure ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn-orange rounded" data-dismiss="modal">Close</button>
                                    <form action="/dashboard/delete-sitemap/{{ $item->id }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn-orange rounded">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </table>
        </div>

    </div>
@endsection
