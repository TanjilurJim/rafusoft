@extends('dashboard.layout')


@section('meta')
    <link rel="stylesheet" href="{{ asset('assets/css/faq.css') }}">
@endsection

@section('content')
    <section class="p-3">

        <div class="bg-[#343A40] p-3 rounded text-white">
            <h5 class="text-[20px]">Pop Up Notification <strong class="text-orange-600">({{ $ref->slug }})</strong></h5>
        </div>


        <form method="POST" class="mt-5" action="/dashboard/ref/pop-up/toggle/{{ $ref->id }}" id="faqForm">
            @csrf

            <div class="custom-control custom-switch  custom-switch-on-orange border-0">
                <input  onchange="handleFormSubmit()" {{ $ref->pop_up == 'off' ? '' : 'checked' }}  type="checkbox"
                    class="custom-control-input" id="customSwitch1{{ $ref->pop_up }}">
                <label class="custom-control-label" for="customSwitch1{{ $ref->pop_up }}">Active</label>
            </div>
        </form>

        

        <div class="my-4">
            <form method="POST">
                @csrf
                <div class="form-group">
                    <label for="img">Image url</label>
                    <input type="text" value="{{$notice ? $notice->img : ''}}" class="form-control" name="img" placeholder="Enter Question">
                    @error('img')
                        <p class="text-red-500 my-3">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="text">Button Text</label>
                    <input type="text" value="{{$notice ? $notice->text : ''}}" class="form-control" name="text" placeholder="Enter Question">
                    @error('text')
                        <p class="text-red-500 my-3">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="link">Button Link</label>
                    <input type="link" value="{{$notice ? $notice->link : ''}}" class="form-control" name="link" placeholder="Enter Question">
                    @error('link')
                        <p class="text-red-500 my-3">{{$message}}</p>
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-orange font-medium">Submit</button>
            </form>
        </div>
    </section>

    <script>
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
