@extends('dashboard.layout')

@section('content')
    <div class="p-3">
        <div class="bg-[#343A40] p-3 rounded text-white">
            <h1 class="text-[20px]">User List</h1>
        </div>
        <table class="table table-border mt-4">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Last Login</th>
                <th>Created at</th>
                <th>Action</th>
            </tr>
            @foreach ($users as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->role }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->active_at)->diffForHumans() }}</td>
                    <td>{{ $item->created_at->format('d F Y, G:i') }}</td>
                    <td>
                        <button class="px-2 py-1 rounded-sm btn-primary"  data-toggle="modal" data-target="#edit{{$item->id}}"><i class="fa-solid fa-pen-to-square"></i></button>
                        <button data-toggle="modal" data-target="#deleteModal{{ $item->id }}" class="px-2 py-1 rounded-sm btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                    </td>
                </tr>
                <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{ $item->name }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are you sure ?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <form action="/dashboard/user-management/delete/{{ $item->id }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="edit{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">{{$item->name}}</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <form id="form-submit" action="/dashboard/user-management/update/{{$item->id}}" method="POST">
                              @csrf
                              @method('PUT')
                              <div class="form-group"> 
                                <label>Permission</label>
                                <div>
                                  <label for="invoice" class="flex gap-3 items-center justify-start">
                                    <input id="invoice" type="checkbox" @checked($item->invoice == 'on') name="invoice" value="1">  Invoice 
                                  </label>
                                </div>
                                <div>
                                  <label for="ref" class="flex gap-3 items-center justify-start">
                                    <input id="ref" type="checkbox" @checked($item->product == 'on') name="product" value="1">  Product 
                                  </label>
                                </div>
                                <div>
                                  <label for="product" class="flex gap-3 items-center justify-start">
                                    <input id="product" type="checkbox" @checked($item->ref == 'on') name="ref" value="1">  Ref 
                                  </label>
                                </div>
                                <div>
                                  <label for="dir" class="flex gap-3 w-1/3 items-center justify-start">
                                    <input id="dir" type="checkbox" @checked($item->dir == 'on')  name="dir" value="1">  Dir 
                                  </label>
                                  <div class="flex mb-3 gap-3">
                                    <div>
                                      <p>Page Limit</p> <input type="number" name="dir_limit" class="form-control" value="{{$item->dir_limit}}">
                                  </div>
                                  <div>
                                      <p>File Limit</p> <input type="number" name="dir_file_limit" class="form-control" value="{{$item->dir_file_limit}}">
                                  </div>
                                  </div>
                                </div>
                                <div>
                                  <label for="file" class="flex gap-3 items-center justify-start">
                                    <input id="file" type="checkbox" @checked($item->file == 'on')  name="file" value="1">  File Manager 
                                  </label>
                                </div>
                                <label>Inbox</label>
                                <div>
                                  <label for="contact" class="flex gap-3 items-center justify-start">
                                    <input id="contact" type="checkbox" @checked($item->contact == 'on')  name="contact" value="1">Contact
                                  </label>
                                </div>
                                <div>
                                  <label for="career" class="flex gap-3 items-center justify-start">
                                    <input id="career" type="checkbox" @checked($item->career == 'on')  name="career" value="1">Career
                                  </label>
                                </div>
                                <div>
                                  <label for="quote" class="flex gap-3 items-center justify-start">
                                    <input id="quote" type="checkbox" @checked($item->quote == 'on')  name="quote" value="1">Quote
                                  </label>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                              </div>
                            </form>
                          </div>
                        
                      </div>
                    </div>
                  </div>
            @endforeach
        </table>

    </div>
@endsection
