@extends('dashboard.layout')

@section('content')
    <section class="p-3">
       


        <div class="bg-[#343A40] p-3 rounded text-white">
            <h4 class="text-[20px]">Category Edit</h4>
        </div>


        @php
            $index= 1;
        @endphp

        <section class="grid md:grid-cols-2 gap-10 mt-10">
            <div>
                <form method="POST">
                    @csrf

                    <div class="from-group mt-5">
                        <label for="name">Category Name</label>
                        <input value="{{$cat->name}}" name="name" type="text" placeholder="Category Name" class="form-control">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button class="btn btn-orange mt-4">Submit</button>
                </form>
            </div>
        </section>
    </section>
@endsection
