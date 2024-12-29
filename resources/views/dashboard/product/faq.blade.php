@extends('dashboard.layout')

@section('meta')
    <link rel="stylesheet" href="{{ asset('assets/css/faq.css') }}">
@endsection

@section('content')
    <div class="p-3">
        

        <div class="bg-[#343A40] p-3 rounded text-white">
          <h1 class="text-[20px]">Add FAQ  ({{$product->slug}})</h1>
      </div>



        
        <div class="accordion mt-5">
            @foreach ($faq as $item)
            <div class="flex justify-between gap-4 items-center">
                <div class="accordion-item border w-full">
                    <div class="accordion-item-header">
                        <span class="accordion-item-header-title">{{$item->question}}</span>
                        <i class="fa-solid fa-chevron-down lucide lucide-chevron-down accordion-item-header-icon"></i>
                    </div>
                <div class="accordion-item-description-wrapper">
                    <div class="accordion-item-description">
                        <hr>
                        <p>{{$item->ans}}</p>
                    </div>
                </div>
            </div>
            <div class="flex gap-4">
                <a href="/dashboard/product/faq/{{$item->product_id}}/{{$item->id}}" class="btn btn-orange">Edit</a>
                <button class="btn btn-orange" data-toggle="modal" data-target="#delete{{$item->id}}">Delete</button>
            </div>
            </div>

            <div class="modal fade" id="delete{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">{{$item->question}}</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Are you Sure ?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-orange" data-dismiss="modal">Close</button>
                      <form action="/dashboard/product/faq/delete/{{$item->id}}" method="POST">
                        @method("DELETE")
                        @csrf
                        <button type="submit" class="btn btn-orange">Delete</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
        </div>


    <form method="POST" class="mt-5">
        @csrf

        <div class="form-group">
            <label for="question">Question</label>
            <input type="text" class="form-control" name="question">
        </div>
        <div class="form-group">
            <label for="question">Answer</label>
           <textarea name="ans" rows="5" class="form-control"></textarea>
        </div>
        <button class="btn btn-orange">Submit</button>
    </form>


    <script>
        document.querySelectorAll(".accordion-item").forEach((item) => {
            item.querySelector(".accordion-item-header").addEventListener("click", () => {
                item.classList.toggle("open");
            });
        });
    </script>

@endsection