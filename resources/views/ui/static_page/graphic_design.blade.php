@extends('ui.layout.common')


@section('meta')
    <meta name="description"
        content="Craft modern and eye-catching graphic designs with our expert services. Transform your ideas into visually stunning creations that captivate and resonate.">
    <meta name="keywords" content="figma, photoshop, illustrator" />
    <meta name="author" content="Developed by (www.rafusoft.com)">
    <title>An eye-catching graphic design service</title>
    <link rel="canonical" href="https://rafusoft.com/graphic-design" />


    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}" type="img/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/css/about.css') }}">

    <meta property="og:title" content="An eye-catching graphic design service">
    <meta property="og:site_name" content="Rafusoft">
    <meta property="og:url" content="https://rafusoft.com/graphic-design">
    <meta property="og:description"
        content="Craft modern and eye-catching graphic designs with our expert services. Transform your ideas into visually stunning creations that captivate and resonate.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('assets/img/favicon.png') }}">



    <meta name="twitter:card"  content="summary_large_image" />
    <meta name="twitter:site" content="@rafusoft" />
    <meta name="twitter:title" content="An eye-catching graphic design service" />
    <meta name="twitter:description" content="Craft modern and eye-catching graphic designs with our expert services. Transform your ideas into visually stunning creations that captivate and resonate." />
    <meta name="twitter:image" content="{{ asset('assets/img/favicon.png') }}" />
@endsection


@section('content')
    <section>
        <div class="bg-global pt-20 pb-2">
            <h1 class="text-white  text-4xl  mt-32 text-center">Our Graphic Design Service</h1>
            <h2 class="text-center text-white mt-5   text-3xl">Elevate Your Brand with Creative Designs</h2>
            <div class="text-center my-10 ">
                <a href="#content" class="bg-[#F15A29] block px-4 py-2 w-14 mx-auto rounded"><img class="animate-bounce"
                        src="{{ asset('assets/img/arrow.png') }}" alt="scroll down image" /></a>
            </div>
        </div>

        <div class='p-5 max-w-6xl my-10 mx-auto'>
            <section class='md:flex gap-10'>
                <div>
                    <h3 class='text-xl font-semibold text-[#F15A29]'>Graphic Design</h3>
                    <p class='my-4'>At Rafusoft, we strive to provide you with a visually consistent, cohesive image. As
                        part of your design package, we include visual and verbal brand communications guidelines. They are
                        a major tactical declaration that offersa standard for the strategic controlling of the brand by all
                        stakeholders.</p>


                    <h3 class='text-xl font-semibold text-[#F15A29]'>Web Site Graphic Design And Mobile Application Mock-ups
                    </h3>
                    <p class='my-4'>We often need to figure this out before starts your website design, creating a general
                        sample of what your website might look like.</p>

                    <h5 class='my-4 font-semibold'>We will prepare for wireframes, layouts, workflows, site maps and so on.
                    </h5>

                    <p class='my-4'>These 1-2 pages of design partnered with a website flow chart/sitemap will provide you
                        a basic knowledge of the design and flow we are considering for yourwebsite or application. We then
                        can go back and forth on any general changes you want before we start your actual application design
                        and development.</p>
                </div>
                <img src='{{ asset('assets/img/graphic/Bangladesh-Branding-Identity-Mockup.jpg') }}'
                    alt='Bangladesh-Branding-Identity-Mockup' />
            </section>


            <section>
                <h4 class='text-xl font-semibold my-5 text-[#F15A29]'>Services</h4>

                <p>Brand Design</p>
                <p>Mobile App Design</p>
                <p>Web Template Design</p>


                <h4 class='text-xl my-5 font-semibold text-[#F15A29]'>Technical Capabilities</h4>

                <p>Adobe Photoshop</p>
                <p>Adobe Lightroom</p>
                <p>Adobe Illustrator</p>
                <p>CorelDraw (assuming this is what you meant by Corel)</p>
                <p>Sketch</p>
            </section>
        </div>
    </section>
@endsection
