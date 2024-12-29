@extends('dashboard.layout')

@section('content')
    <div class="p-3">
        <div class="bg-[#343A40] p-3 rounded text-white">
            <h1 class="text-[20px]">Edit Review</h1>
          </div>


        <div class="mt-3">
            <form method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" placeholder="Enter your name" value="{{$review->name}}" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" placeholder="Enter your name" class="form-control" value="{{$review->date}}" name="date">
                </div>
                <div class="form-group">
                    <label for="date">Description</label>
                    <textarea name="description" rows="5" class="form-control">{{$review->description}}"</textarea>
                </div>
                <button class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
@endsection
