@extends('dashboard.layout')

@php
    $index = 1;
@endphp

@section('content')
    <section class="p-3">
        <div class="bg-[#343A40] p-3 rounded text-white">
            <h4 class="text-[20px]">Enquires Message | Total {{$total}} | Unread {{$unread}}</h4>
        </div>

        @if ($enquire)
        <div>
            <table class="w-full mt-4">
                <tr class=" border bg-[#343A40] text-white">
                    <th class="py-3 px-3">#</th>
                    <th class="py-3 px-3">Date</th>
                    <th class="py-3 px-3">Name</th>
                    <th class="py-3 px-3">Email</th>
                    <th class="py-3 px-3">Slug</th>
                    <th class="py-3 px-3 text-center">Action</th>
                </tr>
                @foreach ($enquire as $item)
                    <tr class=" hover:bg-slate-100 border cursor-pointer {{ $item->status == '1' ? 'bg-slate-200' : 'bg-white font-semibold' }}">
                        <td onclick="viewMessage('<?php echo $item->id; ?>')" class="py-2 px-3">{{ $index++ }}. </td>
                        <td onclick="viewMessage('<?php echo $item->id; ?>')" class="py-2 px-3">{{ $item->created_at->format('d M Y, g:i A') }}</td>
                        <td onclick="viewMessage('<?php echo $item->id; ?>')" class="py-2 px-3">{{ $item->name }}</td>
                        <td onclick="viewMessage('<?php echo $item->id; ?>')" class="py-2 px-3">{{ $item->email }}</td>
                        <td onclick="viewMessage('<?php echo $item->id; ?>')" class="py-2 px-3">{{ substr($item->source, 0, 50) }}{{ strlen($item->message) > 50 ? '...' : '' }}</td>
                        <td class="text-center">
                            <a href="/dashboard/dir/enquires/{{$item->id}}" class="btn btn-sm btn-primary"><i class="fa-solid fa-eye"></i></a>
                            <button data-toggle="modal" data-target="#exampleModal{{ $item->id }}" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                        </td>
                    </tr>
                    <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-slate-700 text-white">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                   Are you sure ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <form method="POST" action="/dasboard/enquire/delete/{{ $item->id }}">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-orange">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </table>
            <div class="my-5">
                {{ $enquire->links() }}
            </div>
        </div>
    @else
        <div>
            <h2 class="text-xl font-bold text-slate-600">No Data Found</h2>
        </div>
    @endif


    <script>
        const viewMessage = (id)=>{
            console.log(id)
            window.location.href = `/dashboard/dir/enquires/${id}`

        }
    </script>

    </section>
@endsection