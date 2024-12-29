@extends('ui.product.layout')


@section('meta')
    <title>Tearms And Conditions</title>
@endsection

@section('product')
    <section>
        <div class="py-20 text-center" style="background-image: url({{asset('assets/img/privacy.png')}})">
        <h1 class="text-xl font-medium mt-5">Tearms And Conditions</h1>
        <h2 class="text-[20px] mt-2">Our Agreement with You</h2>
        </div>
        <div  class="max-w-6xl mx-auto mt-20 px-5">
            {!!$terms->terms!!}
        </div>
    </section>
@endsection 