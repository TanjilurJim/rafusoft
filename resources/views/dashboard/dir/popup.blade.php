@extends('dashboard.layout')


@section('meta')
    <link rel="stylesheet" href="{{ asset('assets/css/faq.css') }}">
@endsection

@section('content')
    <section class="p-3">

        <div class="bg-[#343A40] p-3 rounded text-white">
            <h5 class="text-[20px]">Pop Up Notification <strong class="text-green-500">({{ $dir->slug }})</strong></h5>
        </div>


        <form method="POST" class="mt-5" action="/dashboard/dir/pop-up/toggle/{{ $dir->id }}" id="faqForm">
            @csrf

            <div class="custom-control custom-switch  custom-switch-on-orange border-0">
                <input  onchange="handleFormSubmit()" {{ $dir->pop_up == 'off' ? '' : 'checked' }}  type="checkbox"
                    class="custom-control-input" id="customSwitch1{{ $dir->pop_up }}">
                <label class="custom-control-label" for="customSwitch1{{ $dir->pop_up }}">Active</label>
            </div>
        </form>

        

        <div class="my-4">
            <form method="POST">
                @csrf
                <div class="form-group">
                    <label for="img">Image url (665x345px)</label>
                    <input type="text" value="{{$notice ? $notice->img : ''}}" class="form-control" onchange="handleView()" id="img-url" name="img" placeholder="Enter Image URL">
                    @error('img')
                        <p class="text-red-500 my-3">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="text">Button Text</label>
                    <input type="text" value="{{$notice ? $notice->text : ''}}" class="form-control" name="text" placeholder="Enter Button Text">
                    @error('text')
                        <p class="text-red-500 my-3">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="link">Button Link</label>
                    <input type="link" value="{{$notice ? $notice->link : ''}}" class="form-control" name="link" placeholder="Enter Button Link">
                    @error('link')
                        <p class="text-red-500 my-3">{{$message}}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-orange font-medium">Submit</button>
            </form>
        </div>

        <div class="flex justify-center items-center  p-4">
            <img src="" class="border-2  border-white rounded-md" id="img-preview">
        </div>

    </section>

    <script>
        // Define the function within the script tag
        const handleFormSubmit = () => {
            console.log("clicked");
            const form = document.getElementById('faqForm');
            form.submit();
        };


        const handleView =()=>{
            const img_url = document.getElementById('img-url').value;
            const img = new Image();
            console.log(img_url);
            img.src = img_url;
            img.onload = () => {
            const width = img.width;
            const height = img.height;

            if(width != 665 && height != 345){
                console.log(width, height)
                document.getElementById('img-url').value =''   
            }else{
                document.getElementById('img-preview').src = img_url;
            }
    };

        }


        document.querySelectorAll(".accordion-item").forEach((item) => {
            item.querySelector(".accordion-item-header").addEventListener("click", () => {
                item.classList.toggle("open");
            });
        });
    </script>
@endsection
