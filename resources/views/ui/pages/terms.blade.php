@extends('ui.layout.common')

@section('meta')
<meta name="description" content="Rafusoft&#039;s software is protected by International Copyright law. Accepting this license grants you specific usage rights.">
<meta name="keywords" content="IT Solution Dinajpur, Software Company, IT Training, Software Services, Firmware Development, ICT Courses"/>
<meta name="author" content="Developed by (www.rafusoft.com)">
<title>Terms and Conditions | Rafusoft</title>
<link rel="canonical" href="https://rafusoft.com/terms-and-conditions" />


<link rel="shortcut icon" href="{{asset('assets/img/favicon.png')}}" type="img/x-icon">
<link rel="stylesheet" href="{{asset('assets/css/about.css')}}">

<meta property="og:title" content="Terms and Conditions | Rafusoft">
<meta property="og:site_name" content="Rafusoft">
<meta property="og:url" content="https://rafusoft.com/terms-and-conditions">
<meta property="og:description" content="Rafusoft&#039;s software is protected by International Copyright law. Accepting this license grants you specific usage rights.">
<meta property="og:type" content="website">
<meta property="og:image" content="{{asset('assets/img/favicon.png')}}">


<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:site" content="@rafusoft" />
<meta name="twitter:title" content="Terms and Conditions | Rafusoft" />
<meta name="twitter:description" content="Rafusoft&#039;s software is protected by International Copyright law. Accepting this license grants you specific usage rights." />
<meta name="twitter:image" content="{{asset('assets/img/favicon.png')}}" />
@endsection


@section('content')
    <section>
        <div class="hire-bg pt-10 pb-3">
            <h1 class="text-white mt-32 text-5xl text-center font-medium">{{$terms->headingone}}</h1>
            <h3 class="text-center mt-5 text-white text-3xl">{{$terms->headingtwo}}</h3>
            <div class="text-center my-20 ">
              <a href="#content" class="bg-[#F15A29] block px-4 py-2 w-14 mx-auto rounded"><img  class="animate-bounce" src="{{asset('assets/img/arrow.png')}}" alt="scroll down image" /></a>
            </div>
          </div>
          <div class="max-w-6xl mx-auto shadow-lg my-10 p-5">
            {!!$terms->content!!}
          </div>
    </section>
@endsection