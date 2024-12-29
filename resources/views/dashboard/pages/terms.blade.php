@extends('dashboard.layout')



@section('content')
    <section class="p-3">
        
        <div class="bg-[#343A40] p-3 rounded text-white">
            <h1 class="text-[20px]">Terms & Condition</h1>
        </div>


        <form class="my-5" method="POST">
            @csrf
            <div class="form-group">
                <label for="heading">Heading (h1)</label>
                <input value="{{ $terms->headingone }}" name="headingone" type="text" class="form-control"
                    placeholder="Enter Heading (h1)">
            </div>
            <div class="form-group">
                <label for="heading">Heading (h2)</label>
                <input value="{{ $terms->headingtwo }}" name="headingtwo" type="text" class="form-control"
                    placeholder="Enter Heading (h2)">
            </div>
            <textarea name="content" class="tinymce" >{!! $terms->content !!}</textarea>

            <button type="submit" class="btn  btn-orange mt-4">Submit</button>
        </form>
    </section>
@endsection
