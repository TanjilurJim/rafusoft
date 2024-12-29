@extends('ui.layout.common')


@section('meta')
    <meta name="description"
        content="Rafusoft Other Services offers top-notch software solutions and IT services. Experience excellence and innovation for all your technological needs.">
    <meta name="keywords"
        content="IT Solution Dinajpur, Software Company, IT Training, Software Services, Firmware Development, ICT Courses" />
    <meta name="author" content="Developed by (www.rafusoft.com)">
    <title>Other Services | Rafusoft</title>
    <link rel="canonical" href="https://rafusoft.com/others" />


    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}" type="img/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/css/about.css') }}">

    <meta property="og:title" content="Other Services | Rafusoft">
    <meta property="og:site_name" content="Rafusoft">
    <meta property="og:url" content="https://rafusoft.com/others">
    <meta property="og:description"
        content="Rafusoft Other Services offers top-notch software solutions and IT services. Experience excellence and innovation for all your technological needs.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('assets/img/favicon.png') }}">



    <meta name="twitter:card"  content="summary_large_image" />
    <meta name="twitter:site" content="@rafusoft" />
    <meta name="twitter:title" content="Other Services | Rafusoft" />
    <meta name="twitter:description" content="Rafusoft Other Services offers top-notch software solutions and IT services. Experience excellence and innovation for all your technological needs." />
    <meta name="twitter:image" content="{{ asset('assets/img/favicon.png') }}" />
@endsection


@section('content')
    <section>
        <div class="bg-global pt-20 pb-2">
            <h1 class="text-white  text-4xl mt-32 text-center">Key URLs and Other Important Links</h1>
            <h2 class="text-center text-white mt-5   text-3xl">Most Important URLs</h2>
            <div class="text-center my-10 ">
                <a href="#content" class="bg-[#F15A29] block px-4 py-2 w-14 mx-auto rounded"><img class="animate-bounce"
                        src="{{ asset('assets/img/arrow.png') }}" alt="scroll down image" /></a>
            </div>
        </div>


        <section class='max-w-6xl mx-auto my-10'>
            <span class='border-b-2 border-[#F15A29] text-xl font-semibold '>Other Services</span>

            <div class='mt-10 grid md:grid grid-cols-2 gap-5'>
                <a class="hover:text-orange-600" href="" class='shadow-xl  block other_link'>
                    <div class='relative'>
                        <img src="{{ asset('assets/img/others/products.jpg') }}" alt="Your Image" />
                        <div
                            class="h-full w-full bg-[#07050579] hover:bg-[#ffffff00] hover:duration-700 duration-700 ease-linear absolute top-0 rounded-t-sm ">
                        </div>
                    </div>
                    <p class='px-5 my-5'>Store</p>
                </a>
                <a class="hover:text-orange-600" href="/training" class='shadow-xl block other_link'>
                    <div class='relative'>
                        <img src="{{ asset('assets/img/others/training.jpg') }}" alt="Your Image" />
                        <div
                            class="h-full w-full bg-[#07050579] hover:bg-[#ffffff00] hover:duration-700 duration-700 ease-linear absolute top-0 rounded-t-sm ">
                        </div>
                    </div>
                    <p class='px-5 my-5'>Training</p>
                </a>
                <a class="hover:text-orange-600" href="/career-at-rafusoft" class='shadow-xl block other_link'>
                    <div class='relative'>
                        <img src="{{ asset('assets/img/others/career.jpg') }}" alt="Your Image" />
                        <div
                            class="h-full w-full bg-[#07050579] hover:bg-[#ffffff00] hover:duration-700 duration-700 ease-linear absolute top-0 rounded-t-sm ">
                        </div>
                    </div>
                    <p class='px-5 my-5'>Career</p>
                </a>
                <a class="hover:text-orange-600" href="" class='shadow-xl block other_link'>
                    <div class='relative'>
                        <img src="{{ asset('assets/img/others/student-database.jpg') }}" alt="Your Image" />
                        <div
                            class="h-full w-full bg-[#07050579] hover:bg-[#ffffff00] hover:duration-700 duration-700 ease-linear absolute top-0 rounded-t-sm ">
                        </div>
                    </div>
                    <p class='px-5 my-5'>Student Database</p>
                </a>
            </div>
        </section>
    </section>
@endsection
