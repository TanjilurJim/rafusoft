@extends('dashboard.layout')

@section('content')
    <section class="p-3">
        <div class="bg-[#343A40] p-3 rounded text-white">
            <h5 class="text-[20px]">Faq Edit</h5>
        </div>

        <div class="my-4">
            <form method="POST">
                @csrf
                <div class="form-group">
                    <label for="question">Question</label>
                    <input type="text" class="form-control" name="question" value="{{$faq->question}}" placeholder="Enter Question">
                    @error('question')
                        <p>{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="ans">Ans</label>
                    <textarea type="text" name="ans"  class="form-control" rows="6" placeholder="Enter Question">{{$faq->ans}}</textarea>
                    @error('question')
                        <p>{{$ans}}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-orange font-medium">Submit</button>
            </form>
        </div>
    </section>
@endsection
