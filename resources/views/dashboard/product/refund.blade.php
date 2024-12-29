@extends('dashboard.layout')

@section('content')
    <section class="p-3">


        <div class="bg-[#343A40] p-3 rounded text-white flex justify-between items-center mb-3">
            <h1 class="text-[20px]">Refund Policy</h1>
              <a class="btn btn-sm btn-orange" href="/dashboard/product/setting">Back</a>
        </div>
        <section>
            <form action="/dashboard/product/setting/refund" method="POST">
              @csrf
              <textarea name="refund" class="tinymce " cols="30" rows="10">{!! $refund ? $refund->refund : "" !!}</textarea>
              <button class="btn btn-orange mt-3">Save</button>
            </form>
        </section>

    </section>
@endsection
