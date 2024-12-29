@extends('dashboard.layout')

@section('content')
    @php
        $index = 1;
    @endphp
    <section class="p-3">

       <div class="bg-[#343A40] p-3 rounded text-white">
        <h4 class="text-[20px]">Ref Pages</h4>
        </div>


        <div class="mt-3">
            <table id="example2" class="table table-bordered table-hover" style="width: 100% ; overflow: scroll">
                <thead class="bg-[#343A40] text-white">
                    <tr>
                        <th>#</th>
                        <th>slug</th>
                        <th>Action</th>
                        <th>Authar</th>
                        <th class="w-16">Status</th>
                        <th class="w-16">Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ref as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->slug }}</td>
                            <td>
                                <a target="_blank" href="/dashboard/preview/ref/{{ $item->slug }}" class="btn  btn-secondary btn-sm">Preview</a>
                                <a target="_blank" href="/ref/{{ $item->slug }}" class="btn btn-success btn-sm">View</a>
                                <button onclick="handleCopy('<?php echo $item->slug; ?>')" class="btn btn-secondary btn-sm">Copy</button>
                                <a href="/dashboard/ref/edit-content/{{ $item->id }}" class="btn bg-orange-500 text-white font-medium btn-sm">Edit</a>
                                <a href="/dashboard/ref/faq/{{ $item->id }}"  class="btn bg-primary text-white font-medium btn-sm">Faq</a>
                                <a href="/dashboard/ref/pop-up/{{ $item->id }}" class="btn  bg-teal-500 text-white font-medium btn-sm">Pop Up</a>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal{{ $item->id }}"> Delete</button>
                            </td>
                            <td class="relative overflow-hidden">
                                <span>{{ $item->email }}</span>
                                @if (auth()->user()->email == $item->email)
                                    <span class="absolute top-3 left-[-20px] rotate-45 bg-green-500 h-6 w-6"></span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="mt-1">
                                    @if ($item->status == 'Unpublished')
                                    <i class="fa-solid fa-eye-slash text-red-500"></i>
                                      @else
                                    <i class="fa-solid fa-eye text-green-500"></i>
                                      @endif
                                   </div>
                            </td>
                            <td class="text-center"><button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#operation{{ $item->id }}" class="btn btn-sm"><i class="fa-solid fa-gear"></i></button></td>
                        </tr>
                        <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Are you Sure ?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        {{ $item->slug }}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <form method="POST" action="/dashboard/ref-delete/{{ $item->id }}">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-primary">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>



                         <!-- operation -->
                         <div class="modal fade" id="operation{{ $item->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-slate-700">
                                        <h5 class="modal-title text-white" id="exampleModalLabel">{{ $item->slug }}
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span class="text-white" aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="px-3 pt-2">
                                        <form method="POST" id="updateStatus{{ $item->id }}"
                                            action="/dashboard/ref/updated-status/{{ $item->id }}">
                                            @csrf
                                            <div class="flex gap-3 items-baseline">
                                                <input name="status" type="checkbox" id="publish{{ $item->id }}" @checked($item->status == 'Published') value="1">
                                                <label for="publish{{ $item->id }}">Publish</label>
                                            </div>
                                            <div class="flex gap-3 items-baseline">
                                                <input name="contact" type="checkbox" @checked($item->contact) id="contact{{ $item->id }}" value="1">
                                                <label for="contact{{ $item->id }}">Contact</label>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"  data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-orange">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>



                    @endforeach
            </table>
        </div>
        <script>
            const handleCopy = (slug) => {
                const host = window.location.origin;
                const folder = "icons";
                const path = host + "/" + "ref" + "/" + slug;
                const textarea = document.createElement('textarea');
                textarea.value = path;
                document.body.appendChild(textarea);
                textarea.select();
                document.execCommand('copy');
                document.body.removeChild(textarea);

                Toastify({
                    text: "copyed url",
                    duration: 3000,
                    newWindow: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                }).showToast();
            }
        </script>

    </section>
@endsection
