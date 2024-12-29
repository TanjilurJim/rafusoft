@extends('dashboard.layout')

@section('meta')
    <link rel="stylesheet" href="{{ asset('assets/css/faq.css') }}">
@endsection

@section('content')
    <div class="p-3">
       

        <div class="bg-[#343A40] p-3 rounded text-white">
            <h1 class="text-[20px]">Edit FAQ</h1>
        </div>


    <form method="POST" class="mt-5">
        @csrf

        <div class="form-group">
            <label for="question">Question</label>
            <input type="text" value="{{$faq->question}}" class="form-control" name="question">
        </div>
        <div class="form-group">
            <label for="question">Answer</label>
           <textarea name="ans" rows="5" class="form-control">{{$faq->question}}</textarea>
        </div>
        <button class="btn btn-orange">Submit</button>
    </form>


@endsection