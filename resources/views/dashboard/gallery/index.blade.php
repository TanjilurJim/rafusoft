@extends('dashboard.layout')

@section('content')
    <div class="p-3 relative">
        <div class="bg-[#343A40] p-3 rounded text-white">
            <h2 class="text-[20px] ">Add Gallery</h2>
        </div>

        <form method="POST" class="mt-5">
            @csrf
            <div class="form-group">
                <label for="name">Title</label>
                <input type="text" name="title" placeholder="Enter title" class="form-control">
            </div>
            <div class="form-group">
                <label for="post">Short Paragraph (In 15 Word)</label>
                <input type="text" name="short_paragraph" placeholder="Enter post name" class="form-control">
            </div>
            <div class="form-group">
                <label for="photo">Photo<a target="_blank" class="ms-5 text-blue-500" href="/dashboard/file/gallery">Get Photo</a></label>
                <input type="text" name="photo" placeholder="Enter photo url" class="form-control">
            </div>

            <button class="btn btn-orange">Submit</button>
        </form>
    </div>
@endsection
