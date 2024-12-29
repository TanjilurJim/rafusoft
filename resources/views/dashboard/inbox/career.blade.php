@extends('dashboard.layout')


@php
    $index = 1;
@endphp


<style>
    .custom-switch.custom-switch-on-orange .custom-control-input:checked~.custom-control-label::after {
     background-color: #f09a04;
 }


 .hoverButtonWrapper div{
        display: none;
    }

    .hoverButtonWrapper:hover > div{
            display: flex;
            gap: 15px;
        }

 </style>


@section('content')
    <section class="p-3">
        <div class="bg-[#343A40] rounded text-white flex justify-between p-3">
            <h1 class="text-[20px]">Inbox Career  (Inbox {{count($messages)}} | Unread {{$unread}} | Read {{$read}})</h1>
            <div class="flex justify-center items-center gap-3">               
               @if (auth()->user()->role == 'superadmin')
               <select name="great" id="great" onchange="changeData()" class="text-black focus:outline-none">
                <option value="null">-- Select One --</option>
                <option value="3">Red</option>
                <option value="2">Yellow</option>
             </select>
         <button data-toggle="modal"  id="deleteButton" data-target="#exampleModal" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i></button>
               @endif
       </div>
        </div>



        @if ($messages)
            <div>
                <table class="w-full mt-4">
                    <tr class="border bg-[#343A40] text-white">
                        <th class="py-3 px-3">#</th>
                        <th class="py-3 px-3">Date</th>
                        <th class="py-3 px-3">Name</th>
                        <th class="py-3 px-3">Mobile</th>
                        <th class="py-3 px-3">Email</th>
                        <th class="py-3 px-3">Subject</th>
                        <th class="py-3 px-3 text-center">Action</th>
                    </tr>
                    @foreach ($messages as $item)
                        <tr
                            class=" border cursor-pointer {{ $item->status == 'read' ? 'bg-slate-200' : 'bg-white font-semibold' }}">
                            <td onclick="viewMessage('<?php echo $item->id; ?>' ,  '<?php echo $index-1; ?>')" class="py-2 px-3">{{ $index++ }}. </td>
                            <td onclick="viewMessage('<?php echo $item->id; ?>' ,  '<?php echo $index-1; ?>')" class="py-2 px-3">{{ $item->created_at->format('d M Y, g:i A') }} </td>
                            <td onclick="viewMessage('<?php echo $item->id; ?>' ,  '<?php echo $index-1; ?>')" class="py-2 px-3">{{ $item->name }}</td>
                            <td onclick="viewMessage('<?php echo $item->id; ?>' ,  '<?php echo $index-1; ?>')" class="py-2 px-3">{{ $item->mobile }}</td>
                            <td onclick="viewMessage('<?php echo $item->id; ?>' ,  '<?php echo $index-1; ?>')" class="py-2 px-3">{{ $item->email }}</td>
                            <td onclick="viewMessage('<?php echo $item->id; ?>' ,  '<?php echo $index-1; ?>')" class="py-2 px-3"> {{ substr($item->subject, 0, 50) }}{{ strlen($item->subject) > 50 ? '...' : '' }}</td>
                            <td class="flex gap-5 items-center justify-center ">

                                <div class="hoverButtonWrapper relative">
                                    <div class="actionButtonDiv absolute top-[-28px] bg-black  right-0 px-2 py-2 rounded-3xl shadow-sm">
                                        <a href="/dasboard/inbox/career/great/{{$item->id}}/1"><i class="fa-solid  text-green-500 fa-circle"></i></a>
                                        <a href="/dasboard/inbox/career/great/{{$item->id}}/2"><i class="fa-solid  text-yellow-500 fa-circle"></i></a>
                                        <a href="/dasboard/inbox/career/great/{{$item->id}}/3"><i class="fa-solid  text-red-500 fa-circle"></i></a>
                                    </div>
                                    <button><i class="fa-solid  {{$item->great == 1 ? "text-green-500": ""}} {{$item->great == 2 ? "text-yellow-500": ""}} {{$item->great == 3 ? "text-red-500": ""}} fa-circle"></i></button>
                                </div>

                                <a title="view" href="/dasboard/inbox/career/view/{{ $item->id }}?no={{$index-1}}"
                                    class="hover:text-blue-500 btn"><i class="fa-regular fa-eye"></i></a>

                                <form id="updatedfrom{{ $item->id }}"
                                    action="/dasboard/inbox/career/status/{{ $item->id }}" method="POST"
                                    class="form-group mt-3">
                                    @csrf
                                    <div class="custom-control custom-switch  custom-switch-on-orange border-0">
                                        <input {{ $item->status == 'read' ? 'checked' : '' }}
                                            onchange="handleStatus(<?php echo 'updatedfrom' . $item->id; ?>)" type="checkbox"
                                            class="custom-control-input" id="customSwitch1{{ $item->id }}">
                                        <label class="custom-control-label" for="customSwitch1{{ $item->id }}"></label>
                                    </div>
                                </form>


                                <button @disabled(auth()->user()->role !== "superadmin") class="hover:text-red-500 btn" type="button" data-toggle="modal"
                                    data-target="#exampleModal{{ $item->id }}">
                                    <i  class="fa-solid fa-trash-can"></i>
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
                                      <p>{{$item->name}}</p>
                                      <p>{{$item->email}}</p>
                                      <p>{{$item->phone}}</p>
                                      <p>{{$item->subject}}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-orange" data-dismiss="modal">Close</button>
                                        <form method="POST" action="/dasboard/inbox/career/delete/{{$item->id}}">
                                            @csrf                                                @method("DELETE")
                                            <button type="submit" class="btn btn-orange">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </table>


                <div class="my-5">
                    {{ $messages->links() }}
                </div>

            </div>
        @else
            <div>
                <h2 class="text-xl font-bold text-slate-600">No Data Found</h2>
            </div>
        @endif



        
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="/dasboard/inbox/career/delete-groupby" method="POST" class="modal-content">
                            @method('DELETE')
                            @csrf
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Selected: <span id="selected-great"></span></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                         Are you sure ?
        
                        <input type="text" name="great" class="hidden" id="input-great">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Delete</button>
                        </div>
                      </form>
                    </div>
                  </div>


        <script>
            function handleStatus(itemId) {
                console.log("Item ID:", itemId);
                itemId.submit();
            }


             const viewMessage = (id, index) => {
                window.location.href = `/dasboard/inbox/career/view/${id}?no=${index}`
            }



            const deleteButton = document.getElementById('deleteButton');
            deleteButton.disabled = true;


            const changeData = ()=>{
                const selected_great =  document.getElementById('selected-great');
                const great = document.getElementById('great').value;
                document.getElementById('input-great').value=great;
                if(great == 2){
                    selected_great.innerText = "Yellow"
                    deleteButton.disabled = false;
                }else if(great == 3) {
                    selected_great.innerText = "Red"
                    deleteButton.disabled = false;
                }else{
                     selected_great.innerText = ""
                     deleteButton.disabled = true;
                }
            }


        </script>
    </section>
@endsection
