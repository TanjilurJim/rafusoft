@extends('ui.layout.common')


@section('meta')
    <meta name="description"
        content="We provide Software, Mobile App Development, Website Development, Graphic Design, Offshore Development, Web Hosting, etc.">
    <meta name="keywords"
        content="IT Solution Dinajpur, Software Company, IT Training, Software Services, Firmware Development, ICT Courses" />
    <meta name="author" content="Developed by (www.rafusoft.com)">
    <title>Rafusoft provides all IT Services</title>
    <link rel="canonical" href="https://rafusoft.com/services2" />
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}" type="img/x-icon">

    <meta property="og:title" content="Rafusoft provides all IT Services">
    <meta property="og:site_name" content="Rafusoft">
    <meta property="og:url" content="https://rafusoft.com/services2">
    <meta property="og:description"
        content="We provide Software, Mobile App Development, Website Development, Graphic Design, Offshore Development, Web Hosting, etc.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('assets/img/jim/rafusoft-403.png') }}">
    
    <meta property="og:logo" content="{{ asset('assets/img/jim/logo.webp') }}" />



    <meta name="twitter:card"  content="summary_large_image" />
    <meta name="twitter:site" content="@rafusoft" />
    <meta name="twitter:title" content="Rafusoft provides all IT Services" />
    <meta name="twitter:description" content="We provide Software, Mobile App Development, Website Development, Graphic Design, Offshore Development, Web Hosting, etc." />
    <meta name="twitter:image" content="{{ asset('assets/img/favicon.png') }}" />
@endsection


@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <div class="bradcamp-keyboard pt-20 pb-2">
        <h1 class="text-white  text-4xl mt-32 text-center">Our Range of Services</h1>
        <h2 class="text-center text-white mt-5  text-3xl">Software Development & Consulting Services</h2>
        <div class="text-center my-10 ">
            <a href="#content" class="bg-[#F15A29] block px-4 py-2 w-14 mx-auto rounded"><img class="animate-bounce"
                    src="{{ asset('assets/img/arrow.png') }}" alt="scroll down image" /></a>
        </div>
    </div>

<section id="services">
    <div id="content" class="max-w-7xl mx-auto mt-10 px-2">
            <!-- Title -->
            <div class="text-center">
                <h1 class="w-full sm:w-[600px] mx-auto border-b-4 border-orange-500 text-center pb-2 text-4xl font-light text-deepTeal">Services</h1>
            </div>
        
            <!-- Two-Column Section -->
            <div class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Column 1 -->
                <div class="flex items-start space-x-4">
                    <!-- Icon -->
                    {{-- <div class="w-16 h-16 flex items-start justify-center"> --}}
                        <img class="w-16 h-16" src="{{ asset('assets/img/jim/icons8-planner-100.png') }}" alt="Icon 1">
                    {{-- </div> --}}
                    <!-- Text Content -->
                    <div>
                        <h3 class="text-xl font-bold text-deepTeal">Project Discovery</h3>
                        <p class="text-[#00214A] mt-2">
                            This is an important phase that results in the creation of a project charter, outlining the project goals, objectives, and scope.
                        </p>
                    </div>
                </div>
        
                <!-- Column 2 -->
                <div class="flex items-start space-x-4">
                    <!-- Icon -->
                    {{-- <div class="w-12 h-8 flex items-center justify-center "> --}}
                        <img class="w-16 h-16" src="{{ asset('assets/img/jim/icons8-ux-100 (1).png') }}" alt="Icon 1">
                    {{-- </div> --}}
                    <!-- Text Content -->
                    <div>
                        <h3 class="text-xl font-bold text-deepTeal">UX and UI Design</h3>
                        <p class="text-[#00214A] mt-2">

                            This is an important phase that results in the creation of a project charter, outlining the project goals, objectives, and scope.
                        </p>
                    </div>
                </div>
            </div>
        
            <!-- Second Row -->
            <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-8">
            
                <!-- Column 1 -->
                <div class="flex items-start space-x-4">
                    <!-- Icon -->
                    {{-- <div class="w-12 h-8 flex items-center justify-center "> --}}
                        <img class="w-16 h-16" src="{{ asset('assets/img/jim/icons8-prototype-100.png') }}" alt="Icon 1" class="w-6 h-6">
                    {{-- </div> --}}
                    <!-- Text Content -->
                    <div>
                        <h3 class="text-xl font-bold text-deepTeal">Software Prototyping</h3>
                        <p class="text-[#00214A] mt-2">

                            This is an important phase that results in the creation of a project charter, outlining the project goals, objectives, and scope.
                        </p>
                    </div>
                </div>
        
                <!-- Column 2 -->
                <div class="flex items-start space-x-4">
                    <!-- Icon -->
                    {{-- <div class="w-12 h-8 flex items-center justify-center "> --}}
                        <img class="pt-2 w-16 h-16" src="{{ asset('assets/img/jim/icons8-camera-addon-identification-100.png') }}" alt="Icon 1">
                    {{-- </div>  --}}
                    <!-- Text Content -->
                    <div>
                        <h3 class="text-xl font-bold text-deepTeal">Minimum Viable Product (MVP)</h3>
                        <p class="text-[#00214A] mt-2">
                            This is an important phase that results in the creation of a project charter, outlining the project goals, objectives, and scope.
                        </p>
                    </div>
                </div>
            </div>
            {{-- 3rd row --}}
            <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-8">
            
                <!-- Column 1 -->
                <div class="flex items-start space-x-4">
                    <!-- Icon -->
                    {{-- <div class="w-12 h-8 flex items-center justify-center "> --}}
                        <img class="w-16 h-16" src="{{ asset('assets/img/jim/icons8-edit-file-100.png') }}" alt="Icon 1" class="w-6 h-6">
                    {{-- </div> --}}
                    <!-- Text Content -->
                    <div>
                        <h3 class="text-xl font-bold text-deepTeal">Software Development from Scratch</h3>
                        <p class="text-[#00214A] mt-2">
                            This is an important phase that results in the creation of a project charter, outlining the project goals, objectives, and scope.
                        </p>
                    </div>
                </div>
        
                <!-- Column 2 -->
                <div class="flex items-start space-x-4">
                    <!-- Icon -->
                    {{-- <div class="w-12 h-8 flex items-center justify-center "> --}}
                        <img class=" w-16 h-16" src="{{ asset('assets/img/jim/icons8-file-100.png') }}" alt="Icon 1" class="w-6 h-6">
                    {{-- </div> --}}
                    <!-- Text Content -->
                    <div>
                        <h3 class="text-xl font-bold text-deepTeal">Software Components Development</h3>
                        <p class="text-[#00214A] mt-2">
                            This is an important phase that results in the creation of a project charter, outlining the project goals, objectives, and scope.
                        </p>
                    </div>
                </div>
            </div>

            {{-- 4th row --}}
            <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-8">
            
                <!-- Column 1 -->
                <div class="flex items-start space-x-4">
                    <!-- Icon -->
                    {{-- <div class="w-12 h-8 flex items-center justify-center "> --}}
                        <img class=" w-16 h-16" src="{{ asset('assets/img/jim/icons8-imac-100.png') }}" alt="Icon 1" class="w-6 h-6">
                    {{-- </div> --}}
                    <!-- Text Content -->
                    <div>
                        <h3 class="text-xl font-bold text-deepTeal">Legacy Software Modernization</h3>
                        <p class="text-[#00214A] mt-2">
                            This is an important phase that results in the creation of a project charter, outlining the project goals, objectives, and scope.
                        </p>
                    </div>
                </div>
        
                <!-- Column 2 -->
                <div class="flex items-start space-x-4">
                    <!-- Icon -->
                    {{-- <div class="w-12 h-8 flex items-center justify-center "> --}}
                        <img class="w-16 h-16" src="{{ asset('assets/img/jim/icons8-hacker-100.png') }}" alt="Icon 1" class="w-6 h-6">
                    {{-- </div> --}}
                    <!-- Text Content -->
                    <div>
                        <h3 class="text-xl font-bold text-deepTeal">Software Maintenance</h3>
                        <p class="text-[#00214A] mt-2">
                            This is an important phase that results in the creation of a project charter, outlining the project goals, objectives, and scope.
                        </p>
                    </div>
                </div>
            </div>

            {{-- 5th row --}}
            <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-8">
            
                <!-- Column 1 -->
                <div class="flex items-start space-x-4">
                    <!-- Icon -->
                    {{-- <div class="w-12 h-8 flex items-center justify-center "> --}}
                        <img class="w-16 h-16" src="{{ asset('assets/img/jim/icons8-e-learning-100.png') }}" alt="Icon 1" class="w-6 h-6">
                    {{-- </div> --}}
                    <!-- Text Content -->
                    <div>
                        <h3 class="text-xl font-bold text-deepTeal">Proof of Concept (PoC, PoT)</h3>
                        <p class="text-[#00214A] mt-2">
                            This is an important phase that results in the creation of a project charter, outlining the project goals, objectives, and scope.
                        </p>
                    </div>
                </div>
        
                <!-- Column 2 -->
                <div class="flex items-start space-x-4">
                    <!-- Icon -->
                    {{-- <div class="w-12 h-8 flex items-center justify-center "> --}}
                        <img class="w-16 h-16" src="{{ asset('assets/img/jim/icons8-parchment-100.png') }}" alt="Icon 1" class="w-6 h-6">
                    {{-- </div> --}}
                    <!-- Text Content -->
                    <div>
                        <h3 class="text-xl font-bold text-deepTeal">Software Documentation</h3>
                        <p class="text-[#00214A] mt-2">
                            This is an important phase that results in the creation of a project charter, outlining the project goals, objectives, and scope.
                        </p>
                    </div>
                </div>
            </div>
            <br><br>



    </div>

</section>
    


<section id="devices-section" class="bg-[#7999DB] py-10 h-64">
    <div class="max-w-7xl mx-auto flex justify-center items-center space-x-8 pt-4">
        <!-- Apple Icon -->
        <div class="flex flex-col items-center">
            <img src="{{ asset('assets/img/jim/icons8-iphone-14-100 (1).png') }}" alt="Apple" class="h-12 md:h-16">
            <span class="text-white mt-2 text-sm">iPhone</span>
        </div>

        <!-- Android Icon -->
        <div class="flex flex-col items-center">
            <img src="{{ asset('assets/img/jim/icons8-phone-100.png') }}" alt="Android" class="h-16 md:h-20">
            <span class="text-white mt-2 text-sm">Android</span>
        </div>

        <!-- PC Icon -->
        <div class="flex flex-col items-center">
            <img src="{{ asset('assets/img/jim/icons8-computer-100 (2).png') }}" alt="PC" class="h-24 md:h-32">
            <span class="text-white mt-2 text-sm">PC</span>
        </div>

        <!-- Tablet Icon -->
        <div class="flex flex-col items-center">
            <img src="{{ asset('assets/img/jim/icons8-tablet-100 (1).png') }}" alt="Tablet" class="h-16 md:h-20">
            <span class="text-white mt-2 text-sm">Tablet</span>
        </div>

        <!-- iPad Icon -->
        <div class="flex flex-col items-center">
            <img src="{{ asset('assets/img/jim/icons8-ipad-100 (1).png') }}" alt="iPad" class="h-12 md:h-16">
            <span class="text-white mt-2 text-sm">iPad</span>
        </div>
    </div>
</section>

<section id="software" class="bg-[#243447] py-10 h-auto">
    <div class="max-w-7xl mx-auto text-center px-4">
        <!-- Section Title -->
        <h2 class="text-white text-4xl leading-[52px] font-light border-b-4 border-orange-500 pb-2">
            Software Types We Develop
        </h2>
        <div class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-y-16">
            <!-- Web Applications -->
            <div class="flex flex-col items-center group hover:text-orange-500 transition">
                <img src="{{ asset('assets/img/jim/development.png') }}" alt="Web Applications" 
                     class="h-16 md:h-20 group-hover:scale-110 transition filter invert">
                <h3 class="text-white text-lg font-medium mt-4 group-hover:text-orange-500 transition">
                    Web Applications
                </h3>
            </div>

            <!-- Mobile Applications -->
            <div class="flex flex-col items-center group hover:text-orange-500 transition">
                <img src="{{ asset('assets/img/jim/mobile-development.png') }}" alt="Mobile Applications" 
                     class="h-16 md:h-20 group-hover:scale-110 transition filter invert">
                <h3 class="text-white text-lg font-medium mt-4 group-hover:text-orange-500 transition">
                    Mobile Applications
                </h3>
            </div>
        </div>
    </div>
</section>

<section class="bg-[#354358] py-10">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 max-w-7xl mx-auto px-4 text-center">
        <!-- External APIs -->
        <div class="flex flex-col items-center group hover:text-orange-500 transition">
            <i class="fas fa-globe text-white text-3xl sm:text-4xl group-hover:text-orange-500 transition"></i>
            <h3 class="text-white text-sm sm:text-base font-medium mt-2 group-hover:text-orange-500 transition">
                External APIs
            </h3>
        </div>

        <!-- Extension Apps -->
        <div class="flex flex-col items-center group hover:text-orange-500 transition">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
                stroke-width="1.5" stroke="currentColor" 
                class="h-[36px] w-[36px] text-white group-hover:text-orange-500 transition">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
            </svg>
            <h3 class="text-white text-sm sm:text-base font-medium mt-2 group-hover:text-orange-500 transition">
                Extension Apps
            </h3>
        </div>

        <!-- Accessory Apps -->
        <div class="flex flex-col items-center group hover:text-orange-500 transition">
            <i class="fas fa-toolbox text-white text-3xl sm:text-4xl group-hover:text-orange-500 transition"></i>
            <h3 class="text-white text-sm sm:text-base font-medium mt-2 group-hover:text-orange-500 transition">
                Accessory Apps
            </h3>
        </div>

        <!-- Companion Apps -->
        <div class="flex flex-col items-center group hover:text-orange-500 transition">
            <i class="fas fa-handshake text-white text-3xl sm:text-4xl group-hover:text-orange-500 transition"></i>
            <h3 class="text-white text-sm sm:text-base font-medium mt-2 group-hover:text-orange-500 transition">
                Companion Apps
            </h3>
        </div>

        <!-- Desktop Apps -->
        <div class="flex flex-col items-center group hover:text-orange-500 transition">
            <i class="pt-2 fas fa-desktop text-white text-3xl sm:text-4xl group-hover:text-orange-500 transition"></i>
            <h3 class="text-white text-sm sm:text-base font-medium mt-2 group-hover:text-orange-500 transition">
                Desktop Apps
            </h3>
        </div>

        <!-- Browser Extensions -->
        <div class="flex flex-col items-center group hover:text-orange-500 transition">
            <i class="pt-2 fas fa-puzzle-piece text-white text-3xl sm:text-4xl group-hover:text-orange-500 transition"></i>
            <h3 class="text-white text-sm sm:text-base font-medium mt-2 group-hover:text-orange-500 transition">
                Browser Extensions
            </h3>
        </div>

        <!-- Embedded Widgets -->
        <div class="flex flex-col items-center group hover:text-orange-500 transition">
            <i class="pt-2 fas fa-window-restore text-white text-3xl sm:text-4xl group-hover:text-orange-500 transition"></i>
            <h3 class="text-white text-sm sm:text-base font-medium mt-2 group-hover:text-orange-500 transition">
                Embedded Widgets
            </h3>
        </div>

        <!-- Plugins -->
        <div class="flex flex-col items-center group hover:text-orange-500 transition">
            <i class="pt-2 fas fa-code text-white text-3xl sm:text-4xl group-hover:text-orange-500 transition"></i>
            <h3 class="text-white text-sm sm:text-base font-medium mt-2 group-hover:text-orange-500 transition">
                Plug-in / Add-on / Add-ins
            </h3>
        </div>
    </div>
</section>

<section id="solutions">
    <div id="content" class="max-w-7xl mx-auto mt-10 px-2">
            <!-- Title -->
            <div class="text-center">
                <h1 class="w-full sm:w-[600px] mx-auto border-b-4 border-orange-500 text-center pb-2 text-4xl font-light text-deepTeal">Solutions</h1>
            </div>

            <div class="text-center mb-10">
                <p class="pt-4 text-gray-600 text-lg">
                    We specialize in developing WebRTC-based Video Conferencing tools with service monetization options. Save time and money with our ready-to-use solutions
                </p>
            </div>
        
            <!-- Two-Column Section -->
            <div class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Column 1 -->
                <div class="flex items-start space-x-4">
                    <!-- Icon -->
                    {{-- <div class="w-12 h-8 flex items-center justify-center "> --}}
                        <img class=" w-16 h-16" src="{{ asset('assets/img/jim/Label.svg') }}" alt="Icon 1" class="w-6 h-6">
                    {{-- </div> --}}
                    <!-- Text Content -->
                    <div>
                        <h3 class="text-xl font-bold text-deepTeal">White Label Video PPM Chat</h3>
                        <p class="text-gray-600 mt-2">
                            This solution is a ready-to-launch live e-counseling business for monetizing expert advice that can either work as a new startup or an extension to corporate digital presence.
                        </p>
                    </div>
                </div>
        
                <!-- Column 2 -->
                <div class="flex items-start space-x-4">
                    <!-- Icon -->
                    {{-- <div class="w-12 h-8 flex items-center justify-center "> --}}
                        <img class=" w-16 h-16" src="{{ asset('assets/img/jim/video.svg') }}" alt="Icon 1" class="w-6 h-6">
                    {{-- </div> --}}
                    <!-- Text Content -->
                    <div>
                        <h3 class="text-xl font-bold text-deepTeal">PPM, PPS Video Chat Core</h3>
                        <p class="text-gray-600 mt-2">
                            Business and startup-oriented real-time voice and video solution that helps monetize online services via Mobile or Web apps while saving money and bypassing rookie mistakes.
                        </p>
                    </div>
                </div>
            </div>
        
            <!-- Second Row -->
            {{-- <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-8"> --}}
            
                <!-- Column 1 -->
                {{-- <div class="flex items-start space-x-4"> --}}
                    <!-- Icon -->
                    {{-- <div class="w-12 h-8 flex items-center justify-center "> --}}
                        {{-- <img class="w-12 h-12" src="{{ asset('assets/img/jim/icons8-monitor-50.png') }}" alt="Icon 1" class="w-6 h-6"> --}}
                    {{-- </div> --}}
                    <!-- Text Content -->
                    {{-- <div>
                        <h3 class="text-xl font-bold text-deepTeal">Project Discovery</h3>
                        <p class="text-gray-600 mt-2">
                            This is an important phase that results in the creation of a project charter, outlining the project goals, objectives, and scope.
                        </p>
                    </div>
                </div>
         --}}
                <!-- Column 2 -->
                {{-- <div class="flex items-start space-x-4"> --}}
                    <!-- Icon -->
                    {{-- <div class="w-12 h-8 flex items-center justify-center "> --}}
                        {{-- <img class="w-12 h-12" src="{{ asset('assets/img/jim/icons8-monitor-50.png') }}" alt="Icon 1" class="w-6 h-6"> --}}
                    {{-- </div>  --}}
                    <!-- Text Content -->
                    {{-- <div>
                        <h3 class="text-xl font-bold text-deepTeal">UX and UI Design</h3>
                        <p class="text-gray-600 mt-2">
                            This is an important phase that results in the creation of a project charter, outlining the project goals, objectives, and scope.
                        </p>
                    </div>
                </div> --}}
            {{-- </div> --}}
    </div>
    <br><br>
</section>

<section id="contact" class="relative bg-[url('{{ asset('assets/img/top-10-software-company-in-bangladesh.jpg') }}')] bg-cover bg-center py-10 px-6">
    <!-- Overlay -->
    <div class="absolute inset-0 bg-[#243447] bg-opacity-70"></div>
    
    <div id="content" class="relative max-w-7xl mx-auto px-6">
        <!-- Title -->
        <div class="text-center mb-8">
            <h1 class="w-full sm:w-[600px] mx-auto text-center pb-2 text-4xl font-light text-white">
                Feel Free to Get Quotation
            </h1>
        </div>
    
        <!-- Button -->
        <div class="text-center">
            <a href="{{ url('/get-quote') }}" class="bg-orange-500 text-white px-6 py-3 rounded-full text-lg font-extralight hover:bg-orange-600 transition">
                Get Quotation
            </a>
        </div>
        <br>
    </div>
</section>


<section id="sdlc-process" class="bg-[#354358] py-10">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <!-- Title -->
        <h2 class="text-white text-2xl sm:text-4xl leading-8 sm:leading-10 font-medium border-b-4 border-orange-500 pb-4">
            End-to-End SDLC Scope Covering
        </h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-6 items-center justify-center pt-10">
            <!-- Requirements -->
            <div class="group flex flex-col items-center">
                <div class="w-20 h-20 md:w-24 md:h-24 border-2 border-gray-500 rounded-full flex items-center justify-center group-hover:border-orange-500 transition">
                    <img src="{{ asset('assets/img/jim/Requirements.svg') }}" alt="Icon 1" class="w-8 h-8 md:w-10 md:h-10 group-hover:scale-110 transition">
                </div>
                <p class="text-white mt-2 text-sm sm:text-base text-center">Requirements</p>
            </div>

            <!-- Design -->
            <div class="group flex flex-col items-center">
                <div class="w-20 h-20 md:w-24 md:h-24 border-2 border-gray-500 rounded-full flex items-center justify-center group-hover:border-orange-500 transition">
                    <img src="{{ asset('assets/img/jim/design.svg') }}" alt="Icon 1" class="w-8 h-8 md:w-10 md:h-10 group-hover:scale-110 transition">
                </div>
                <p class="text-white mt-2 text-sm sm:text-base text-center">Design</p>
            </div>

            <!-- Development -->
            <div class="group flex flex-col items-center">
                <div class="w-20 h-20 md:w-24 md:h-24 border-2 border-gray-500 rounded-full flex items-center justify-center group-hover:border-orange-500 transition">
                    <img src="{{ asset('assets/img/jim/development.svg') }}" alt="Icon 1" class="w-8 h-8 md:w-10 md:h-10 group-hover:scale-110 transition">
                </div>
                <p class="text-white mt-2 text-sm sm:text-base text-center">Development</p>
            </div>

            <!-- Testing -->
            <div class="group flex flex-col items-center">
                <div class="w-20 h-20 md:w-24 md:h-24 border-2 border-gray-500 rounded-full flex items-center justify-center group-hover:border-orange-500 transition">
                    <img src="{{ asset('assets/img/jim/testing.svg') }}" alt="Icon 1" class="w-8 h-8 md:w-10 md:h-10 group-hover:scale-110 transition">
                </div>
                <p class="text-white mt-2 text-sm sm:text-base text-center">Testing</p>
            </div>

            <!-- Deployment -->
            <div class="group flex flex-col items-center">
                <div class="w-20 h-20 md:w-24 md:h-24 border-2 border-gray-500 rounded-full flex items-center justify-center group-hover:border-orange-500 transition">
                    <img src="{{ asset('assets/img/jim/deployment.svg') }}" alt="Icon 1" class="w-8 h-8 md:w-10 md:h-10 group-hover:scale-110 transition">
                </div>
                <p class="text-white mt-2 text-sm sm:text-base text-center">Deployment</p>
            </div>

            <!-- Maintenance -->
            <div class="group flex flex-col items-center">
                <div class="w-20 h-20 md:w-24 md:h-24 border-2 border-gray-500 rounded-full flex items-center justify-center group-hover:border-orange-500 transition">
                    <img src="{{ asset('assets/img/jim/maintenance.svg') }}" alt="Icon 1" class="w-8 h-8 md:w-10 md:h-10 group-hover:scale-110 transition">
                </div>
                <p class="text-white mt-2 text-sm sm:text-base text-center">Maintenance</p>
            </div>
        </div>
    </div>
</section>


<section id="software2" class="bg-[#243447] py-10">
    <div class="max-w-7xl mx-auto text-center px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Card 1 -->
            <div class="flex flex-col items-center group hover:text-orange-500 transition relative">
                <img src="{{ asset('assets/img/jim/checklist.png') }}" alt="Compliances" class="h-12 md:h-16 w-12 md:w-16 group-hover:scale-110 transition filter invert">
                <h3 class="text-white text-base sm:text-lg font-medium mt-4 group-hover:text-orange-500 transition">
                    Compliances
                </h3>
                <p class="text-gray-300 mt-2 text-sm sm:text-base text-center">
                    Includes global & country-specific regulations
                </p>
            </div>

            <!-- Card 2 -->
            <div class="flex flex-col items-center group hover:text-orange-500 transition relative">
                <img src="{{ asset('assets/img/jim/technology.png') }}" alt="Technologies" class="h-12 md:h-16 w-12 md:w-16 group-hover:scale-110 transition filter invert">
                <h3 class="text-white text-base sm:text-lg font-medium mt-4 group-hover:text-orange-500 transition">
                    Technologies
                </h3>
                <p class="text-gray-300 mt-2 text-sm sm:text-base text-center">
                    Based on expertise and time-tested approaches
                </p>
            </div>

            <!-- Card 3 -->
            <div class="flex flex-col items-center group hover:text-orange-500 transition relative">
                <img src="{{ asset('assets/img/jim/ai_ice.svg') }}" alt="AI Technologies" class="h-12 md:h-16 w-12 md:w-16 group-hover:scale-110 transition">
                <h3 class="text-white text-base sm:text-lg font-medium mt-4 group-hover:text-orange-500 transition">
                    AI Technologies
                </h3>
                <p class="text-gray-300 mt-2 text-sm sm:text-base text-center">
                    Advanced solutions tailored to each project
                </p>
            </div>
        </div>
    </div>
</section>

<section id="Contract" class="bg-[#EAECEF] py-10">
    <div id="content" class="max-w-7xl mx-auto px-6">
        <!-- Title -->
        <div class="text-center mb-6">
            <h1 class="w-full sm:w-[600px] mx-auto border-b-4 border-orange-500 text-center pb-2 text-4xl font-light text-deepTeal">
                Contract Models We Use 
            </h1>
        </div>
        <!-- Subtitle -->
        <div class="text-center mb-10">
            <p class="text-gray-600 text-lg">
                Explore our tailored solutions to meet your specific needs and ensure project success.
            </p>
        </div>

        <!-- Three Columns -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Card 1 -->
            <div class="flex flex-col items-center text-center bg-white p-6 shadow-lg rounded-lg hover:shadow-2xl transition">
                <div class="w-16 h-16 flex items-center justify-center bg-blue-100 rounded-full">
                    <img src="{{ asset('assets/img/jim/Fixed-Price.svg') }}" alt="Fixed Price" class="w-8 h-8">
                </div>
                <h3 class="text-deepTeal text-xl font-semibold mt-4">Fixed Price (FP)</h3>
                <p class="text-gray-600 mt-2 text-sm">
                    For well-defined project scope and clearly described requirements. FP does not allow for flexibility in the scope of work or changes in requirements.
                </p>
            </div>

            <!-- Card 2 -->
            <div class="flex flex-col items-center text-center bg-white p-6 shadow-lg rounded-lg hover:shadow-2xl transition">
                <div class="w-16 h-16 flex items-center justify-center bg-blue-100 rounded-full">
                    <img src="{{ asset('assets/img/jim/Time-and-Material.svg') }}" alt="Time and Material" class="w-8 h-8">
                </div>
                <h3 class="text-deepTeal text-xl font-semibold mt-4">Time and Material (T&M)</h3>
                <p class="text-gray-600 mt-2 text-sm">
                    T&M is fit for agile projects accompanied by a flow of changes to the scope of work and requirements as it is implemented.
                </p>
            </div>

            <!-- Card 3 -->
            <div class="flex flex-col items-center text-center bg-white p-6 shadow-lg rounded-lg hover:shadow-2xl transition">
                <div class="w-16 h-16 flex items-center justify-center bg-blue-100 rounded-full">
                    <img src="{{ asset('assets/img/jim/Dedicated-Development-Team.svg') }}" alt="Dedicated Team" class="w-8 h-8">
                </div>
                <h3 class="text-deepTeal text-xl font-semibold mt-4">Dedicated Development Team</h3>
                <p class="text-gray-600 mt-2 text-sm">
                    DDT contract model is best suited for long-term software development projects requiring ongoing development and maintenance.
                </p>
            </div>
        </div>
    </div>
</section>

<section id="Expertise">
    <div id="content" class="max-w-7xl mx-auto mt-10 px-2">
        <!-- Title -->
        <div class="text-center">
            <h1 class="w-full sm:w-[600px] mx-auto border-b-4 border-orange-500 text-center pb-2 text-4xl font-light text-deepTeal">Expertise</h1>
        </div>

        <!-- Subtitle -->
        <div class="text-center mb-10">
            <p class="text-gray-600 text-lg pt-5">
                Our expertise extends across Custom Software Development of the various software types for the specific needs of Businesses and Startups for B2B, B2C, C2C, and industry-wide SaaS solutions, including but not limited to the following:
            </p>
        </div>

        <!-- Three-Column Section -->
        <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Card 1 -->
            <div class="flex flex-col md:items-start items-center group hover:text-orange-500 transition relative">
                <!-- SVG Icon as Image -->
                <img src="{{ asset('assets/img/jim/healthcare.svg') }}" alt="Icon 1" class="h-16 md:h-20 w-16 md:w-20 group-hover:scale-110">
                <h3 class="text-[#03230E] text-lg font-bold mt-4 group-hover:text-orange-500 transition text-center md:text-left">
                    Health Care
                </h3>
                <ul class="mt-2 text-center md:text-left list-disc pl-5">
                    <li class="text-sm text-[#03230E]">Real-time Telemedicine solutions</li>
                    <li class="text-sm text-[#03230E]">Electronic Health Record (EHR)</li>
                    <li class="text-sm text-[#03230E]">Clinic Management Software</li>
                    <li class="text-sm text-[#03230E]">Health Information Exchange apps</li>
                </ul>
            </div>
        
            <!-- Card 2 -->
            <div class="flex flex-col md:items-start items-center group hover:text-orange-500 transition relative">
                <!-- SVG Icon as Image -->
                <img src="{{ asset('assets/img/jim/education.svg') }}" alt="Icon 1" class="h-16 md:h-20 w-16 md:w-20 group-hover:scale-110">
                <h3 class="text-[#03230E] text-lg font-bold mt-4 group-hover:text-orange-500 transition text-center md:text-left">
                    Education
                </h3>
                <ul class="mt-2 text-center md:text-left list-disc pl-5">
                    <li class="text-sm text-[#03230E]">E-learning solutions</li>
                    <li class="text-sm text-[#03230E]">Real-time learning tools for online education</li>
                    <li class="text-sm text-[#03230E]">Learning management systems for universities and schools</li>
                </ul>
            </div>
        
            <!-- Card 3 -->
            <div class="flex flex-col md:items-start items-center group hover:text-orange-500 transition relative">
                <!-- SVG Icon as Image -->
                <img src="{{ asset('assets/img/jim/business.svg') }}" alt="Icon 1" class="h-16 md:h-20 w-16 md:w-20 group-hover:scale-110">
                <h3 class="text-[#03230E] text-lg font-bold mt-4 group-hover:text-orange-500 transition text-center md:text-left">
                    Business
                </h3>
                <ul class="mt-2 text-center md:text-left list-disc pl-5">
                    <li class="text-sm text-[#03230E]">PPM real-time Text, Voice and Video communication tools</li>
                    <li class="text-sm text-[#03230E]">Enterprise Application Integration solutions (EAI)</li>
                    <li class="text-sm text-[#03230E]">Custom eCommerce solutions</li>
                </ul>
            </div>
        </div>
        <br>
</section>

<section id="BusinessModels" class="bg-[#354358] py-10">
    <div id="content" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Title -->
        <div class="text-center mb-6">
            <h1 class="w-full mx-auto border-b-4 border-orange-500 text-center pb-2 text-2xl sm:text-3xl lg:text-4xl font-bold text-white whitespace-normal">
                Business and Software Distribution Models
            </h1>
        </div>
        <!-- Subtitle -->
        <div class="text-center mb-10">
            <p class="text-white text-base sm:text-lg lg:text-xl">
                Explore our tailored solutions to meet your specific needs and ensure project success.
            </p>
        </div>


        <!-- Three Columns -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Card 1 -->
            <div class="flex flex-col items-center text-center bg-gray-600 p-6 shadow-lg rounded-lg hover:shadow-2xl transition">
                <div class="w-16 h-16 flex items-center justify-center ">
                    <img src="{{ asset('assets/img/jim/Team.svg') }}" alt="b2b/c2c/b2c" class="w-12 h-12">
                </div>
                <h3 class="text-white text-xl font-semibold mt-4">B2B / B2C/ C2C </h3>
                <p class=" mt-2 text-sm text-white">
                    Custom-tailored software for various business models to cover the needs of Businesses and Startups
                </p>
            </div>

            <!-- Card 2 -->
            <div class="flex flex-col items-center text-center bg-gray-600 p-6 shadow-lg rounded-lg hover:shadow-2xl transition">
                <div class="w-16 h-16 flex items-center justify-center ">
                    <img src="{{ asset('assets/img/jim/cloud.svg') }}" alt="SaaS" class="w-12 h-12">
                </div>
                <h3 class="text-white text-xl font-semibold mt-4">SaaS</h3>
                <p class=" mt-2 text-sm text-white">
                    Cloud-based or Self-hosted Industry-wide software solutions delivered via flexible and scalable SaaS model
                </p>
            </div>

            <!-- Card 3 -->
            <div class="flex flex-col items-center text-center bg-gray-600 p-6 shadow-lg rounded-lg hover:shadow-2xl transition">
                <div class="w-16 h-16 flex items-center justify-center ">
                    <img src="{{ asset('assets/img/jim/Server-1.svg') }}" alt="On-Premises" class="w-12 h-12 ">
                </div>
                <h3 class="text-white text-xl font-semibold mt-4">On-Premises </h3>
                <p class=" mt-2 text-sm text-white">
                    Autonomy-focused software solutions with supreme security, complete control, and integration
                </p>
            </div>
        </div>
        <br>
    </div>
</section>

<script src="https://cdn.linearicons.com/free/1.0.0/svgembedder.min.js"></script>

{{-- <script>
    const text = document.querySelector("#text");
const replay = document.querySelector("#loader");
const bar = document.querySelector("#bar");
const loader = document.querySelector("#percent");

let load = 0;

setInterval(() => {
load = load + Math.floor(Math.random() * 3 + 1);
if (load < 100) {
loader.textContent = load + "%";
bar.style.transform = `scalex(${load}%)`;
text.textContent = "Loading....";
} else {
bar.style.transform = `scalex(100%)`;
loader.textContent = "";
text.textContent = "Rendering..";
}
}, 200);

</script> --}}

@endsection