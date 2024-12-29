@extends('dashboard.layout')


@section('meta')
    <link rel="stylesheet" href="{{ asset('assets/css/faq.css') }}">
@endsection

@section('content')
    <section class="p-3">

        <div class="bg-[#343A40] p-3 rounded text-white">
            <h5 class="text-[20px]">Faq <strong class="text-orange-600">({{ $dir->slug }})</strong></h5>
        </div>


        <form method="POST" class="mt-5" action="/dashboard/dir/faq/toggle/{{ $dir->id }}" id="faqForm">
            @csrf

            <div class="custom-control custom-switch  custom-switch-on-orange border-0">
                <input  onchange="handleFormSubmit()" {{ $dir->faq == 'off' ? '' : 'checked' }}  type="checkbox"
                    class="custom-control-input" id="customSwitch1{{ $dir->id }}">
                <label class="custom-control-label" for="customSwitch1{{ $dir->id }}">Active</label>
            </div>
        </form>




        {{-- Faq --}}
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
                <a href="/dashboard/dir/faq/edit/{{$item->id}}/{{$dir->id}}" class="btn btn-orange">Edit</a>
                <button class="btn btn-orange" data-toggle="modal" data-target="#delete">Delete</button>
            </div>
            </div>



            {{-- delete modal  --}}
            <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">{{$item->question}}</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Are You Sure to Delete ?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-orange" data-dismiss="modal">Cancel</button>
                      <form method="POST" action="/dashboard/dir/faq-delete/{{$item->id}}">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-orange">Delete</button>
                    </form>                    
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
        </div>

        {{-- Faq --}}


        <div class="my-4">
            <form method="POST">
                @csrf
                <div class="form-group">
                    <label for="question">Question</label>
                    <input type="text" class="form-control" name="question" placeholder="Enter Question">
                    @error('question')
                        <p>{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="ans">Ans</label>
                    <textarea type="text" name="ans" class="form-control" rows="6" placeholder="Enter Question"></textarea>
                    @error('question')
                        <p>{{$ans}}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-orange font-medium">Submit</button>
            </form>
        </div>
    </section>

    <script>
        // Define the function within the script tag
        const handleFormSubmit = () => {
            console.log("clicked");
            const form = document.getElementById('faqForm');
            form.submit();
        };


        document.querySelectorAll(".accordion-item").forEach((item) => {
            item.querySelector(".accordion-item-header").addEventListener("click", () => {
                item.classList.toggle("open");
            });
        });
    </script>
@endsection
