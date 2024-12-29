@extends('ui.layout.dynamic')

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
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ $ref->og }}">



    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@rafusoft" />
    <meta name="twitter:title" content="{{ $ref->title }}" />
    <meta name="twitter:description" content="{{ $ref->meta_description }}" />
    <meta name="twitter:image" content="{{ $ref->og }}" />

    <link rel="stylesheet" href="{{ asset('assets/css/ref.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/faq.css') }}">



    <style>
        a:hover {
            text-decoration: none;
        }

        body {
            background-color: #e5dfdf84;
        }

    </style>


    <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "Article",
        "headline": "{{$ref->artical_headline}}",
        "image": "{{$ref->schema_image_url}}",
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
        "datePublished": "{{$ref->published_date}}T06:00:00+08:00",
        "dateModified": "{{$ref->modified_date}}T06:00:00+08:00"
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
          "description": "{{$ref->schema_description}}",
          "name": "{{$ref->schema_company_name}}",
          "telephone": "+8801744333888"
        }
        </script>
@endsection


@section('content')
    <div>
        @if ($ref->pop_up == "on")
        <div id="notice-container" class="fixed h-[100vh] w-full flex justify-center items-center z-50 bg-[#000000ad] px-5">
            <div class="relative">
                <button onclick="hiddenNotice()" class="h-8 w-8 bg-white rounded-full absolute top-3 right-3 flex items-center justify-center">
                    <i class="fa-solid fa-xmark"></i>
                </button>
                <img src="{{$notice->img}}" class="rounded w-96 md:w-[35rem] shadow-xl" alt="{{$notice->img}}">
                @if ($notice->text)
                <div class="flex justify-center mt-[-5rem] items-center">
                    <a class="button mt-4" href="{{$notice->link}}">{{$notice->text}}</a>
                </div>
                @endif
                
            </div>
        </div>
        @endif


        <!-- banner with custom css -->
        <div class="banner bg-global">
            <h1 class="">{{ $ref->banner_head }}</h1>
            <h3 class="">{{ $ref->banner_head_two }}</h3>

            <div class="banner-content-indicator ">
                <a href="#content" class="">
                    <img class=""
                        src="{{ asset('assets/img/arrow.png') }}" alt="scroll down image" />
                    </a>
            </div>
        </div>
        <!-- banner with custom css -->
        
        <section>
            
            <div class="my-4 bg-white container pt-5">
                {!! $ref->content !!}
            </div>



            @if ($ref->faq == 'on')
                <div class="accordion mt-3 container bg-white p-4 my-4">
                    @foreach ($faq as $item)
                        <div class="accordion-item   border-faq  ">
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


            @if ($ref->maps)
               <div class="mb-4 bg-white container py-3">
                <iframe src="{{ $ref->maps }}"  style="border:0;" height="250" class="container" allowfullscreen="true" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
               </div>
            @endif
        </section>


        @if ($ref->contact)
        <div class="bottom-content-wrapper">
            <h3 class="">Do you Have any Project?</h3>
            <p class="">We believe in client satisfaction and we deliver projects that
                can
                successfully meet or exceed the prospects of the stakeholders.</p>

            <div class="bottom-content-link">
                <a href='/contact' class="">Contact Us</a>
            </div>
        </div>
    @endif


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
