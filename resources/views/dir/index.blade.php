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


    <style>
        a:hover {
            text-decoration: none;
        }

        body {
            background-color: #e5dfdf84;
        }

        .grid-md-2 {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }

        @media only screen and (max-width: 600px) {
            .grid-md-2 {
                display: grid;
                grid-template-columns: repeat(1, 1fr);
                gap: 1rem;
            }
        }
    </style>
@endsection


@section('content')
    <div class="list-outside">


        @if ($dir->pop_up == 'on')
            <div id="notice-container"
                class="fixed h-[100vh] w-full flex justify-center items-center z-50 bg-[#000000ad] px-5">
                <div class="relative">
                    <button onclick="hiddenNotice()"
                        class="h-8 w-8 bg-white rounded-full absolute top-3 right-3 flex items-center justify-center">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                    <img src="{{ $notice->img }}" class="rounded w-96 md:w-[35rem] shadow-xl" alt="{{ $notice->img }}">
                    @if ($notice->text)
                        <div class="flex justify-center mt-[-5rem] items-center">
                            <a class="button" href="{{ $notice->link }}">{{ $notice->text }}</a>
                        </div>
                    @endif

                </div>
            </div>
        @endif

        <!-- banner with custom css -->
        <div class="banner bg-global">
            <h1 class="">{{ $dir->banner_head }}</h1>
            <h3 class="">{{ $dir->banner_head_two }}</h3>

            <div class="banner-content-indicator ">
                <a href="#content" class="">
                    <img class="" src="{{ asset('assets/img/arrow.png') }}" alt="scroll down image" />
                </a>
            </div>
        </div>
        <!-- banner with custom css -->
        <section>
            <div class="py-5 bg-white container mt-4 py-5">
                {!! $dir->content !!}
            </div>


            @if ($dir->faq == 'on')
                <div class="accordion mt-4 py-5 container bg-white">
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
                <div class="container py-5 px-3 bg-white my-4">
                    <iframe src="{{ $dir->maps }}" class="rounded" style="width: 100%; height: 300px; border: 0;"
                        allowfullscreen="true" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            @endif

            {{-- enquire  --}}
            @if ($dir->enquire)
                <section class="container bg-white py-5 my-4">
                    <h5 class="">Send your message</h5>
                    <h6 class="mb-3">To: {{ $dir->title }}</h6>

                    <form method="POST">
                        @csrf
                        <section class="grid-md-2">
                            <div class="form-group">
                                <input type="text" name="name" placeholder="Enter your name"
                                    class="form-control w-100">
                                @error('name')
                                    <div class="text-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">

                                <input type="text" name="email" placeholder="Enter your Email" class="form-control">
                                @error('email')
                                    <div class="text-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </section>
                        <div class="form-group">
                            <textarea name="message" class="form-control" placeholder="Message" rows="5"></textarea>
                            @error('message')
                                <div class="text-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button class="btn btn-orange">Send Enquire <i class="fa-solid fa-paper-plane"></i></button>
                    </form>
                </section>
            @endif



            {{-- contact contebt  --}}

            <!-- contact content -->
            @if ($dir->contact)
                <div class="bottom-content-wrapper mt-4">
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

                const hiddenNotice = () => {
                    $('#notice-container').hide();
                }
            </script>

    </div>
@endsection
