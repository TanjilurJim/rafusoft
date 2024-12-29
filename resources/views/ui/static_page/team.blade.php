@extends('ui.layout.common')


@section('meta')
    <meta name="description"
        content="We&#039;re a skilled team of developers and QA engineers, your tech partner for custom software and tech consulting.">
    <meta name="keywords" content="Cobra Antivirus, Antivirus SDK,Anti Malware Tools" />
    <meta name="author" content="Developed by rafusoft.com">
    <title>Our dedicated talented team at your service - Rafusoft</title>
    <link rel="canonical" href="https://rafusoft.com/cms/our-team" />


    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}" type="img/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/css/about.css') }}">

    <meta property="og:title" content="Our dedicated talented team at your service - Rafusoft">
    <meta property="og:site_name" content="Rafusoft">
    <meta property="og:url" content="https://rafusoft.com/cms/our-team">
    <meta property="og:description"
        content="We&#039;re a skilled team of developers and QA engineers, your tech partner for custom software and tech consulting.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('assets/img/favicon.png') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/team.css') }}">



    <meta name="twitter:card"  content="summary_large_image" />
    <meta name="twitter:site" content="@rafusoft" />
    <meta name="twitter:title" content="Our dedicated talented team at your service - Rafusoft" />
    <meta name="twitter:description" content="We&#039;re a skilled team of developers and QA engineers, your tech partner for custom software and tech consulting." />
    <meta name="twitter:image" content="{{ asset('assets/img/favicon.png') }}" />
@endsection


@section('content')
    <section>
        <div class="hire-bg pt-20 pb-2">
            <h1 class="text-white  text-4xl mt-32 text-center">Get to Know Our Team</h1>
            <h2 class="text-center text-white mt-5  text-3xl">Expert Developers & Designers Team</h2>
            <div class="text-center my-10 ">
                <a href="#content" class="bg-[#F15A29] block px-4 py-2 w-14 mx-auto rounded"><img class="animate-bounce"
                        src="{{ asset('assets/img/arrow.png') }}" alt="scroll down image" /></a>
            </div>
        </div>

        <section class="max-w-6xl mx-auto my-10">



            @foreach ($category as $item)
                <div>
                    <div class="w-60 py-3 my-10 text-white relative bg-orange-600  px-5 overflow-hidden rounded">
                        {{ $item->category }}
                        <div class=" absolute right-0 top-0 rotate-45 bg-[white]  h-60  w-24">
                        </div>
                    </div>

                    <div class="grid  md:grid-cols-4 grid-cols-1  gap-5">

                        @foreach ($item->teamMembers as $member)
                            <div class="speaker-block-three wow fadeInUp">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <figure class="image">
                                            <img src="{{ $member->photo }}"
                                                alt="{{ $member->name . ' ' . $member->photo }}" />
                                        </figure>
                                    </div>
                                    <div class="info-box">
                                        <h4 class="name"><a href="#">{{ $member->name }}</a></h4>
                                        <span class="designation">{{ $member->post }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach


        </section>
    </section>
@endsection
