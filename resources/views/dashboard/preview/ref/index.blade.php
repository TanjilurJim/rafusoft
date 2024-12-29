@extends('ui.layout.common')

@section('meta')
    <meta name="description" content="{{ $ref->meta_description }}">
    <meta name="keywords" content="{{ $ref->meta_keyword }}" />
    <meta name="author" content="Developed by (www.rafusoft.com)">
    <title>{{ $ref->title }}</title>
    <link rel="canonical" href="{{ URL::current() }}" />
    <link rel="shortcut icon" href="{{ $ref->favicon }}" type="img/x-icon">
    <meta property="og:title" content="{{ $ref->title }}">
    <meta property="og:site_name" content="Rafusoft">
    <meta property="og:url" content="{{ URL::current() }}">
    <meta property="og:description" content="{{ $ref->meta_description }}">
    <meta property="og:type" content="article">
    <meta property="og:img" content="{{ $ref->og }}">

    <link rel="stylesheet" href="{{asset('assets/css/ref.css')}}">

    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Article",
      "headline": "{{$ref->artical_headline}}",
      "image": "{{$ref->schema_image_url}}",  
      "author": {
        "@type": "{{$ref->author_type}}",
        "name": "{{$ref->author_name}}"
      },  
      "publisher": {
        "@type": "Organaigation",
        "name": "Rafusoft",
        "logo": {
          "@type": "image",
          "url": "{{asset('assets/img/rafusoft-logo.svg')}}"
        }
      },
      "datePublished": "{{$ref->published_date}}T06:00:00+08:00",
      "dateModified": "{{$ref->modified_date}}T06:00:00+08:00",
    }
    </script>


    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "LocalBusiness",
            "name": "{{$ref->schema_company_name}}",
            "description": "{{$ref->schema_description}}",
            "address": {
              "streetAddress": "Nimnagar , Balubari",  // Combined street address
              "addressLocality": "Dinajpur",
              "addressRegion": "Rangpur",
              "postalCode": "5200",
              "addressCountry": "Bangladesh"
            },
            "telephone": "+8801744333888",
            "url": "https://rafusoft.com/",
            "industry": "Software Development",
            "priceRange": "500$ - 2000$",
            "openingHours": [
              "Sut-Th 09:00-17:00"
            ],
        
            "image": "/img/favicon.png"
          }   
    </script>

@endsection


@section('content')
    <div>
        <div class="bg-global pt-10 pb-3">
            <h1 class="text-white mt-32 text-5xl text-center font-medium">{{ $ref->banner_head }}</h1>
            <h3 class="text-center mt-5 text-white text-3xl">{{ $ref->banner_head_two }}</h3>

            <div class="text-center my-20 ">
                <a href="#content" class="bg-[#F15A29] block px-4 py-2 w-14 mx-auto rounded"><img class="animate-bounce"
                        src="{{ asset('assets/img/arrow.png') }}" alt="scroll down image" /></a>
            </div>
        </div>
        <section class="p-5 max-w-6xl mx-auto shadow-xl my-10">
            {!! $ref->content !!}

            @if ($ref->maps)
                <iframe src="{{ $ref->maps }}" class="w-full mt-10 h-96 rounded" style="border:0;" allowfullscreen="true" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            @endif
        </section>

    </div>
@endsection
