@extends('ui.layout.dynamic')

@section('meta')
    <meta name="description" content="{{ $dir->meta_description }}">
    <meta name="keywords" content="{{ $dir->meta_keyword }}" />
    <meta name="author" content="Developed by (www.rafusoft.com)">
    <title>{{ $dir->title }}</title>
    <link rel="canonical" href="{{ URL::current() }}" />
    <link rel="shortcut icon" href="{{ $dir->favicon }}" type="img/x-icon">
    <meta property="og:title" content="{{ $dir->title }}">
    <meta property="og:site_name" content="Rafusoft">
    <meta property="og:url" content="{{ URL::current() }}">
    <meta property="og:description" content="{{ $dir->meta_description }}">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ $dir->og }}">



    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@rafusoft" />
    <meta name="twitter:title" content="{{ $dir->title }}" />
    <meta name="twitter:description" content="{{ $dir->meta_description }}" />
    <meta name="twitter:image" content="{{ $dir->og }}" />

    <link rel="stylesheet" href="{{ asset('assets/css/faq.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/ref.css') }}">


    <style>
        ul {
            @apply;
            list-style: revert !important;
        }

        ol {
            @apply;
            list-style: revert !important;
        }


        .bg-global {
            @apply;
            list-style: revert !important;
        }


        li {
            @apply;
            list-style: revert !important;
        }
    </style>

    <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "Article",
        "headline": "{{$dir->artical_headline}}",
        "image": "{{$dir->schema_image_url}}",
        "author": {
          "@type": "Person",
          "name": "SM Rafeat Hossian"
        },
        "publisher": {
          "@type": "Organization",
          "name": "Rafusoft",
          "logo": {
            "@type": "ImageObject",
            "url": "{{asset('assets/img/rafusoft-logo.svg')}}"
          }
        },
        "datePublished": "{{$dir->published_date}}T06:00:00+08:00",
        "dateModified": "{{$dir->modified_date}}T06:00:00+08:00"
      }
      </script>



    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "LocalBusiness",
          "address": {
            "@type": "PostalAddress",
            "addressLocality": "Dinajpur",
            "addressRegion": "Bangladesh",
            "streetAddress": "Namnagar , Balubari Dinajpur"
          },
          "description": "{{$dir->schema_description}}",
          "name": "{{$dir->schema_company_name}}",
          "telephone": "+8801744333888"
        }
        </script>
@endsection


@section('content')
    <div class="list-outside">


        @if ($dir->pop_up == "on")
        <div id="notice-container" class="fixed h-[100vh] w-full flex justify-center items-center z-50 bg-[#000000ad] px-5">
            <div class="relative">
                <button onclick="hiddenNotice()" class="h-8 w-8 bg-white rounded-full absolute top-3 right-3 flex items-center justify-center"><i class="fa-solid fa-xmark"></i></button>
                <img  src="{{$notice->img}}" class="rounded w-96 md:w-[50rem] shadow-xl" alt="{{$notice->img}}">
            </div>
        </div>
        @endif


        <div class="bg-global pt-10 pb-3">
            <h1 class="text-white mt-32 text-5xl text-center font-medium">{{ $dir->banner_head }}</h1>
            <h3 class="text-center mt-5 text-white text-3xl">{{ $dir->banner_head_two }}</h3>

            <div class="text-center my-20 ">
                <a href="#content" class="bg-[#F15A29] block px-4 py-2 w-14 mx-auto rounded"><img class="animate-bounce"
                        src="{{ asset('assets/img/arrow.png') }}" alt="scroll down image" /></a>
            </div>
        </div>
        <section class="p-5 md:px-10 max-w-6xl mx-auto shadow-xl my-10">
            {!! $dir->content !!}


            @if ($dir->faq == 'on')
                <div class="accordion mt-5">
                    @foreach ($faq as $item)
                    <div class="accordion-item   border-faq  w-full">
                      <div class="accordion-item-header">
                          <span class="accordion-item-header-title">{{ $item->question }}</span>
                          <i
                              class="fa-solid fa-chevron-down lucide lucide-chevron-down accordion-item-header-icon"></i>
                      </div>
                      <div class="accordion-item-description-wrapper">
                          <div class="accordion-item-description">
                              <hr>
                              <p>{{ $item->ans }}</p>
                          </div>
                      </div>
                  </div>
                    @endforeach
                </div>
            @endif

            @if ($dir->maps)
                <iframe src="{{ $dir->maps }}" class="w-full mt-10 h-96 rounded" style="border:0;"
                    allowfullscreen="true" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            @endif
        </section>


        <script>
           document.querySelectorAll(".accordion-item").forEach((item) => {
            item.querySelector(".accordion-item-header").addEventListener("click", () => {
                item.classList.toggle("open");
            });
        });

        const hiddenNotice =()=>{
               $('#notice-container').hide();
            }
        </script>

    </div>
@endsection
