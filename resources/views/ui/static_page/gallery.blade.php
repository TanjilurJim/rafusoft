@extends('ui.layout.common')


@section('meta')
    <meta name="description"
        content="Rafusoft: Leading Bangladesh&#039;s top software developers, delivering #1 software development services.">
    <meta name="keywords"
        content="software development company in Bangladesh, software company in Bangladesh, software firm in Bangladesh, Software company Bangladesh, Best software Company Bangladesh, Bangladesh Software industries" />
    <meta name="author" content="Developed by (www.rafusoft.com)">
    <title>Gallery | Best Software Firm in Bangladesh | Rafusoft</title>
    <link rel="canonical" href="https://rafusoft.com/cms/gallery" />


    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}" type="img/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/css/about.css') }}">

    <meta property="og:title" content="Gallery | Best Software Firm in Bangladesh | Rafusoft">
    <meta property="og:site_name" content="Rafusoft">
    <meta property="og:url" content="https://rafusoft.com/cms/gallery">
    <meta property="og:description"
        content="Rafusoft: Leading Bangladesh&#039;s top software developers, delivering #1 software development services.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('assets/img/favicon.png') }}">



    <meta name="twitter:card"  content="summary_large_image" />
    <meta name="twitter:site" content="@rafusoft" />
    <meta name="twitter:title" content="Gallery | Best Software Firm in Bangladesh | Rafusoft" />
    <meta name="twitter:description" content="Rafusoft: Leading Bangladesh&#039;s top software developers, delivering #1 software development services." />
    <meta name="twitter:image" content="{{ asset('assets/img/favicon.png') }}" />
@endsection


@section('content')
    <section>
        <div class="hire-bg pt-20 pb-2">
            <h1 class="text-white  text-4xl mt-32 text-center">Rafusoft Gallery</h1>
            <h2 class="text-center text-white mt-5  text-3xl">Explore Our Gallery And Memories</h2>
            <div class="text-center my-10 ">
                <a href="#content" class="bg-[#F15A29] block px-4 py-2 w-14 mx-auto rounded"><img class="animate-bounce"
                        src="{{ asset('assets/img/arrow.png') }}" alt="scroll down image" /></a>
            </div>
        </div>


        

        <section class="max-w-6xl mx-auto my-10 grid grid-cols-3 gap-5">
            @foreach ($gallery as $item)
                <div class="bg-zinc-500">
                    <input type="checkbox" id="pic-{{ $item->id }}" />
                    <label for="pic-{{ $item->id }}" class="lightbox"><img src="{{ $item->photo }}" /></label>

                    <div>
                        <label for="pic-{{ $item->id }}" class="grid-item text-center rounded">
                            <img src="{{ $item->photo }}" />
                            <h4 class="mt-2 text-xl text-white  px-4">{{ $item->title }}</h4>
                            <h4 class="text-white pb-4 px-4">{{ $item->short_paragraph }}</h4>
                        </label>
                    </div>
                </div>
            @endforeach
        </section>

        {{-- editable text --}}

        <div class="bg-slate-200 my-10 py-5">
            <div class="max-w-6xl mx-auto">
                <p>A collection of our most precious and cherished moments, meticulously captured and preserved in frame, showcasing the unforgettable memories we hold and the joyous times we've shared.</p>
            </div>
        </div>


        <style>
            label[for] {
                cursor: pointer;
            }

            input[type="checkbox"] {
                display: none;
            }

            .lightbox {
                width: 100%;
                position: fixed;
                top: 0;
                left: 0;
                min-height: 100%;
                z-index: 1;
                overflow: auto;
                -webkit-transform: scale(0);
                -ms-transform: scale(0);
                transform: scale(0);
                -webkit-transition: -webkit-transform .75s ease-out;
                transition: transform .75s ease-out;
            }

            .lightbox img {
                position: fixed;
                top: 50%;
                left: 50%;
                -webkit-transform: translate(-50%, -50%);
                -ms-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%);
                max-width: 100%;
                max-height: 100%;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.25);
            }

            input[type="checkbox"]:checked+.lightbox {
                -webkit-transform: scale(1);
                -ms-transform: scale(1);
                transform: scale(1);
            }

            input[type="checkbox"]:checked~.grid {
                /* opacity: .125; */
            }
        </style>

    </section>
@endsection
