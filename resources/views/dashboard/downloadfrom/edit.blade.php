@extends('dashboard.layout')

@section('content')
    <section class="p-3">
        <div class="bg-[#343A40] p-3 rounded text-white">
            <h1 class="text-[20px]">Download From Edit</h1>
        </div>

        <form class="mt-5" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input  value="{{$from->title}}" type="text" class="form-control" id="title" name="title" placeholder="Enter Title">
                @error('title')
                    <span class="alert error">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="url">Download Link</label>
                <input value="{{$from->url}}" type="text" class="form-control" id="url" name="url" placeholder="Enter Download Link">
                @error('url')
                    <span class="alert error">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" rows="5">{{$from->description}}</textarea>
                @error('description')
                    <span class="alert error">{{ $message }}</span>
                @enderror
            </div>
            <button class="btn-orange rounded">Save</button>
        </form>
    </section>
@endsection
