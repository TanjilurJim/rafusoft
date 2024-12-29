@extends('ui.layout.common')


@section('meta')
    <meta name="description"
        content="Enhance your offering with top-tier security. Integrate our Cobra Antivirus SDK to meet all your security needs.">
    <meta name="keywords" content="Cobra Antivirus, Antivirus SDK,Anti Malware Tools" />
    <meta name="author" content="Developed by www.rafusoft.com">
    <title>Cobra Antivirus SDK - Robust Anti Malware Tools | Rafusoft</title>
    <link rel="canonical" href="https://rafusoft.com/cms/cobra-antivirus-sdk" />


    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}" type="img/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/css/about.css') }}">

    <meta property="og:title" content="Cobra Antivirus SDK - Robust Anti Malware Tools | Rafusoft">
    <meta property="og:site_name" content="Rafusoft">
    <meta property="og:url" content="https://rafusoft.com/cms/cobra-antivirus-sdk">
    <meta property="og:description"
        content="Enhance your offering with top-tier security. Integrate our Cobra Antivirus SDK to meet all your security needs.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('assets/img/favicon.png') }}">



    <meta name="twitter:card"  content="summary_large_image" />
    <meta name="twitter:site" content="@rafusoft" />
    <meta name="twitter:title" content="Cobra Antivirus SDK - Robust Anti Malware Tools | Rafusoft" />
    <meta name="twitter:description" content="Enhance your offering with top-tier security. Integrate our Cobra Antivirus SDK to meet all your security needs." />
    <meta name="twitter:image" content="{{ asset('assets/img/favicon.png') }}" />
@endsection



@section('content')
    <div>
        <div class="bg-cobra-sdk pt-20 pb-2">
            <h1 class="text-white  text-4xl mt-32 text-center">Security Software Development Kit</h1>
            <h2 class="text-center text-white mt-5   text-3xl">Build Your Antivirus With Our Robust Antivirus SDK</h2>
            <div class="text-center my-10 ">
                <a href="#content" class="bg-[#F15A29] block px-4 py-2 w-14 mx-auto rounded"><img class="animate-bounce"
                        src="{{ asset('assets/img/arrow.png') }}" alt="scroll down image" /></a>
            </div>
        </div>

        <div class="max-w-6xl mx-auto md:flex justify-between items-center py-4 px-5">
            <div class="flex justify-between gap-4">
                <a href="#" class="button">GO TO
                    STORE</a>
                <a href="#" class="button">SUBMIT
                    MALWARE</a>
            </div>
            <div class="flex gap-5 items-center justify-between md:mt-0 mt-4">
                <a href="#"
                    class="button">GO
                    TO DATASHEET</a>
                <a href="/contact"
                    class="button">CONTACT US</a>
            </div>
        </div>
        <div class="py-10 bg-zinc-100">

            <div class="max-w-6xl mx-auto">
                <h3 class="text-center my-4 text-2xl">Integrate Our Antivirus Software Development Kit's SDK to Meet All
                    Your Security Needs</h3>
                <p class="mt-5 text-zinc-700 text-center">Looking to integrate a best-in-class security solution into your
                    existing offer? Want to customize or even create a new product? Rafusoft’s licensing models provide you
                    with full flexibility and the best price-performance ratio.</p>
                <p class="mt-5 text-zinc-700 text-center">With 11 years of technology integration experience and over 150
                    active partners, Rafusoft has one of the broadest portfolios in the industry, with more than 20 SDKs for
                    all types of hardware, software, or web-based platforms.</p>
            </div>


            <div class="max-w-6xl mx-auto mt-10 px-5">
                <div class="md:flex justify-between items-center gap-10">
                    <div>
                        <h3 class="text-2xl mb-5">Cobra Antivirus Engine SDK</h3>
                        <p>Cobra Antivirus Engine SDK is a set of: Antivirus Engine with Antivirus Databases and regular
                            updates. It detects and cures all types of malware, connects antivirus functionality to
                            applications. It also allows You to create Your own antivirus software without the need to have
                            a personal virus laboratory.</p>
                    </div>
                    <img src="{{ asset('assets/img/sdk/Antivirus-eng-SDK-packet.png') }}" alt="Antivirus-eng-SDK-packet">
                </div>
                <div class="md:flex md:flex-row-reverse justify-between items-center gap-10">
                    <div>
                        <h3 class="text-2xl mb-5">Cobra WEB Filter System SDK</h3>
                        <p>Cobra WEB Filtering System SDK is a set of software modules (drivers, necessary libraries, and
                            filters) for intercepting and filtering WEB traffic; regularly updated database of WEB-resources
                            that contains information about potentially dangerous sites (and sites with inappropriate
                            content) that are divided into categories; required accompanying documentation to connect/create
                            WEB filtering SDK module with the source code of examples in different programming languages.
                        </p>
                    </div>
                    <img src="{{ asset('assets/img/sdk/File-Filter-System-packet.png') }}" alt="Antivirus-eng-SDK-packet">
                </div>
                <div class="md:flex  justify-between items-center gap-10">
                    <div>
                        <h3 class="text-2xl mb-5">Cobra Updater SDK</h3>
                        <p>The client-server organization of server updates (on the basis of WEB) and the client for loading
                            necessary updates. Cobra Antivirus updater update soundlessly and automatically updates its
                            detection files, most users never need to install their virus definition updates as well.</p>
                    </div>
                    <img src="{{ asset('assets/img/sdk/Updater-system-packet.png') }}" alt="Antivirus-eng-SDK-packet">
                </div>

                <div class="md:flex md:flex-row-reverse justify-between items-center gap-10">
                    <div>
                        <h3 class="text-2xl mb-5">Cobra File filter System SDK</h3>
                        <p>The engine that consists of a driver and interfaces library; allows any application to control
                            access to the file filtering System SDK by intercepting requests, to allow or deny access to any
                            of the files on the logical basis, implemented by Your software. It is ideal for creating virus
                            file filters or access control for files on the local computer.</p>
                    </div>
                    <img src="{{ asset('assets/img/sdk/File-Filter-System-packet-1.png') }}" alt="Antivirus-eng-SDK-packet">
                </div>

                <div class="md:flex justify-between items-center gap-10">
                    <div>
                        <h3 class="text-2xl mb-5">Cobra Threat Intelligent</h3>
                        <p>By Cobra Threat intelligence anyone can access our giant virus repository to detect whether the
                            file is trustable or not. Cobra Threat Intelligence collects data from various sources across
                            the World through honeypots. Our Rafusoft Virus Labs analyst hundreds of thousands of Indicators
                            of the sample and turn objects into actionable.</p>
                    </div>
                    <img src="{{ asset('assets/img/sdk/Threat-API-packet.png') }}" alt="Antivirus-eng-SDK-packet">
                </div>
            </div>

        </div>
    </div>
@endsection
