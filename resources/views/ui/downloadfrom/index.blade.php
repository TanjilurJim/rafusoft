@extends('ui.layout.common')


@section('meta')
<meta name="description" content="Download interaction forms with Rafusoft here. Seamlessly engage with us by accessing the necessary forms for a streamlined and efficient interaction process.">
<meta name="keywords" content="NDA form, Leave form, Real Trading form"/>
<meta name="author" content="Developed by rafusoft.com">
<title>Agreements and NDAs can be downloaded here</title>
<link rel="canonical" href="https://rafusoft.com/download-form" />	


<link rel="shortcut icon" href="{{asset('assets/img/favicon.png')}}" type="img/x-icon">
<link rel="stylesheet" href="{{asset('assets/css/about.css')}}">

<meta property="og:title" content="Agreements and NDAs can be downloaded here">
<meta property="og:site_name" content="Rafusoft">
<meta property="og:url" content="https://rafusoft.com/download-form">
<meta property="og:description" content="Download interaction forms with Rafusoft here. Seamlessly engage with us by accessing the necessary forms for a streamlined and efficient interaction process.">
<meta property="og:type" content="website">
<meta property="og:image" content="{{asset('assets/img/favicon.png')}}">


<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:site" content="@rafusoft" />
<meta name="twitter:title" content="Agreements and NDAs can be downloaded here" />
<meta name="twitter:description" content="Download interaction forms with Rafusoft here. Seamlessly engage with us by accessing the necessary forms for a streamlined and efficient interaction process." />
<meta name="twitter:image" content="{{asset('assets/img/favicon.png')}}" />
@endsection


@section('content')
<section>
    <div class="bg-global pt-20 pb-2">
        <h1 class="text-white  text-4xl  mt-32 text-center">Agreements and NDAS Can Be Downloaded Here</h1>
        <h2 class="text-center text-white mt-5   text-3xl">Secure Your Documents with Ease</h2>
        <div class="text-center my-10 ">
            <a href="#content" class="bg-[#F15A29]  block px-4 py-2 w-14 mx-auto rounded"><img  class="animate-bounce" src="{{asset('assets/img/arrow.png')}}" alt="scroll down image" /></a>
        </div>
    </div>


    <section class="max-w-6xl mx-auto my-5">
        @foreach ($downloadFrom as $item)
        <div   class='p-5 shadow rounded mt-5'>
            <h2 class='text-xl font-bold text-[#F15A29]'>{{$item->title}}</h2>
            <p class='my-5'>{{$item->description}}</p>
            <a target='_blank' href="{{$item->url}}" class='button'>Download <span class='uppercase'>{{$item->title}}</span></a>
        </div>
        @endforeach
    </section>
</section>
@endsection