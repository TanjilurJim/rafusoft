@extends('dashboard.layout')

@section('content')
    <div class="p-3 relative">
        <h2 class="text-[20px] mb-5"></h2>
            <h1 class="text-[20px]">Add Team Member</h1>
        </div>

        <form method="POST">
            @csrf

            @if (session('success'))
                <span class="p-2 text-white bg-success absolute right-5 rounded top-1">
                    {{ session('success') }}
                </span>
            @endif

            <div class="form-group">
                <label for="name">Category</label>
                <select name="category" class="form-control">
                    @foreach ($categories as $item)
                        <option>{{ $item->category }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" placeholder="Enter name" class="form-control">
            </div>
            <div class="form-group">
                <label for="post">Post</label>
                <input type="text" name="post" placeholder="Enter post name" class="form-control">
            </div>
            <div class="form-group">
                <label for="website">Website</label>
                <input type="text" name="website" placeholder="Enter website url" class="form-control">
            </div>
            <div class="form-group">
                <label for="photo">Photo (200*200px) <a target="_blank" class="ms-5 text-blue-500" href="/dashboard/file/publisher-image">Get Photo</a></label>
                <input type="text" name="photo" placeholder="Enter photo url" class="form-control">
            </div>

            <button class="btn btn-orange">Submit</button>
        </form>
    </div>
@endsection
