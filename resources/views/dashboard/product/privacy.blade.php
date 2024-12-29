@extends('dashboard.layout')

@section('content')
    <section class="p-3">


        <div class="bg-[#343A40] p-3 rounded text-white flex justify-between items-center mb-4">
            <h1 class="text-[20px]">Privacy Policy</h1>
            <a href="/dashboard/product/setting" class="btn btn-orange">Back</a>
        </div>



        <section>
            <form action="/dashboard/product/setting/privacy-policy" method="POST">
              @csrf
              <textarea name="privacy" class="tinymce " cols="30" rows="10">{!! $privacy ?  $privacy->privacy : "" !!}</textarea>
              <button class="btn btn-orange mt-3">Save</button>
            </form>
        </section>

    </section>
@endsection
