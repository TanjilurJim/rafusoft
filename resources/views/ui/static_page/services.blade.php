@extends('ui.layout.common')


@section('meta')
    <meta name="description"
        content="We provide Software, Mobile App Development, Website Development, Graphic Design, Offshore Development, Web Hosting, etc.">
    <meta name="keywords"
        content="IT Solution Dinajpur, Software Company, IT Training, Software Services, Firmware Development, ICT Courses" />
    <meta name="author" content="Developed by (www.rafusoft.com)">
    <title>Rafusoft provides all IT Services</title>
    <link rel="canonical" href="https://rafusoft.com/services" />
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}" type="img/x-icon">

    <meta property="og:title" content="Rafusoft provides all IT Services">
    <meta property="og:site_name" content="Rafusoft">
    <meta property="og:url" content="https://rafusoft.com/services">
    <meta property="og:description"
        content="We provide Software, Mobile App Development, Website Development, Graphic Design, Offshore Development, Web Hosting, etc.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('assets/img/favicon.png') }}">



    <meta name="twitter:card"  content="summary_large_image" />
    <meta name="twitter:site" content="@rafusoft" />
    <meta name="twitter:title" content="Rafusoft provides all IT Services" />
    <meta name="twitter:description" content="We provide Software, Mobile App Development, Website Development, Graphic Design, Offshore Development, Web Hosting, etc." />
    <meta name="twitter:image" content="{{ asset('assets/img/favicon.png') }}" />
@endsection


@section('content')
    <div class="bradcamp-keyboard pt-20 pb-2">
        <h1 class="text-white  text-4xl mt-32 text-center">Our Range of Services</h1>
        <h2 class="text-center text-white mt-5  text-3xl">Software Development & Consulting Services</h2>
        <div class="text-center my-10 ">
            <a href="#content" class="bg-[#F15A29] block px-4 py-2 w-14 mx-auto rounded"><img class="animate-bounce"
                    src="{{ asset('assets/img/arrow.png') }}" alt="scroll down image" /></a>
        </div>
    </div>



    <div id="content" class="max-w-7xl mx-auto mt-10 px-5">
        <div class="md:flex justify-between items-center gap-10">
            <div class="md:w-3/5">
                <div class="flex gap-4 items-center ">
                    <img src="{{ asset('assets/img/service/setting-service.jpg') }}" alt="setting-icob" />
                    <h4 class="text-xl hover:text-orange-500">Creative Strategy</h4>
                </div>
                <div class="my-5">
                    <p>At our company, we believe in a collaborative approach that involves working closely with our clients
                        to uncover how they effectively communicate their message and design solutions that meet their
                        unique needs. We provide end-to-end solutions that are tailored specifically to our clients'
                        requirements, and this is what sets us apart from others. By doing so, we not only help our clients
                        save costs but also ensure that they have an easy and engaging experience while working with our
                        solutions.</p>
                    <p class="text-xl my-5">Our Creative Strategy Services</p>
                </div>
                <div class="grid md:grid-cols-2 gap-5 grid-cols-1">
                    <div class="info_item">
                        <span class="info_item_img">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                            </svg>
                        </span>
                        <span class=""><span>Collaborative Development</span></span>
                    </div>
                    <div class="info_item">
                        <span class="info_item_img">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                            </svg>
                        </span>
                        <span class=""><span>End-to-End Solution</span></span>
                    </div>
                    <div class="info_item">
                        <span class="info_item_img">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                            </svg>
                        </span>
                        <span class=""><span>Cost-Efficient Engagement</span></span>
                    </div>
                    <div class="info_item">
                        <span class="info_item_img">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                            </svg>
                        </span>
                        <span class=""><span>User-Centric Design</span></span>
                    </div>
                </div>
            </div>
            <img class="md:w-2/5" src="{{ asset('assets/img/service/mobile-development-3391175-2821995.png') }}"
                alt="mobile app" />
        </div>
    </div>

    <div class="max-w-7xl mx-auto my-20 px-5">
        <div class="md:flex justify-between items-center gap-10">
            <img class="md:w-2/5"
                src="{{ asset('assets/img/service/pngtree-modern-flat-design-concept-of-ui-ux-design-with-characters-and-png-image_2157890.jpg') }}"
                alt="interface design" />
            <div class="md:w-3/5">
                <div class="flex gap-4 items-center ">
                    <img src="{{ asset('assets/img/service/setting-service.jpg') }}" alt="services" />
                    <h4 class="text-xl hover:text-orange-500">Interface Design</h4>
                </div>
                <div class="my-5">
                    <p>First impressions matter, even for websites. Nearly 50% of people judge a website's credibility based
                        on its design, and over 90% of information processed by the brain is visual. Having a compelling
                        website design is crucial for building credibility and engaging your audience. A well-designed
                        website can also increase the likelihood of converting visitors into customers or followers. Make a
                        lasting impression with a visually appealing and user-friendly design.</p>
                </div>
                <p class="text-xl my-10">Our Interface Design Services</p>
                <div class="grid md:grid-cols-2 md:gap-10 gap-5 grid-cols-1">
                    <div class="info_item">
                        <span class="info_item_img">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                            </svg>
                        </span>
                        <span class=""><span>Visual Branding</span></span>
                    </div>
                    <div class="info_item">
                        <span class="info_item_img">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                            </svg>
                        </span>
                        <span class=""><span>UX Optimization</span></span>
                    </div>
                    <div class="info_item">
                        <span class="info_item_img">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                            </svg>
                        </span>
                        <span class=""><span>Conversion Focus</span></span>
                    </div>
                    <div class="info_item">
                        <span class="info_item_img">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                            </svg>
                        </span>
                        <span class=""><span>Performance Enhancement</span></span>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="max-w-7xl mx-auto mt-10 px-5">
        <div class="md:flex justify-between items-center gap-10">
            <div class="md:w-3/5">
                <div class="flex gap-4 items-center ">
                    <img src="{{ asset('assets/img/service/setting-service.jpg') }}" alt="setting" />
                    <h4 class="text-xl hover:text-orange-500">Web Development</h4>
                </div>
                <div class="my-5">
                    <p>We're a small team with big passion! Our designers, developers, and internet marketers believe that
                        success comes from enjoying what you do. That's why we pour our hearts into every project. We offer
                        comprehensive solutions, from web design to mobile-friendly development and e-commerce portals. Come
                        join us on the path to success!</p>
                </div>
                <p class="text-xl my-10">Our Web Development Services</p>
                <div class="grid md:grid-cols-2 md:gap-10 gap-5 grid-cols-1">
                    <div class="info_item">
                        <span class="info_item_img">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                            </svg>
                        </span>
                        <span class=""><span>Ecommerce Development</span></span>
                    </div>
                    <div class="info_item">
                        <span class="info_item_img">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                            </svg>
                        </span>
                        <span class=""><span>Parallax Web</span></span>
                    </div>
                    <div class="info_item">
                        <span class="info_item_img">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                            </svg>
                        </span>
                        <span class=""><span>Customize Software</span></span>
                    </div>
                    <div class="info_item">
                        <span class="info_item_img">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                            </svg>
                        </span>
                        <span class=""><span>Custom Application</span></span>
                    </div>
                </div>
            </div>
            <img class="md:w-2/5" src="{{ asset('assets/img/service/3d-illustration-of-web-development-png.webp') }}"
                alt="web development" />
        </div>
    </div>

    <div class="max-w-7xl mx-auto my-20 px-5">
        <div class="md:flex justify-between items-center gap-10 w-full">
            <img class="md:w-2/5"
                src="{{ asset('assets/img/service/501-5010447_mobile-app-development-illustration-mobile-app-png.png') }}"
                alt="mobile app development" />
            <div class="md:w-3/5">
                <div class="flex gap-4 items-center ">
                    <img src="{{ asset('assets/img/service/setting-service.jpg') }}" alt="setting services" />
                    <h4 class="text-xl hover:text-orange-500">User-Centered Design</h4>
                </div>
                <div class="my-5">
                    <p>In business, a picture is worth a thousand words. Competitors know this, and use attractive designs
                        to draw in clients. To succeed, invest in well-designed proposal documents and mailers to catch your
                        target audience's eye. A great design can make all the difference.</p>
                </div>
                <p class="text-xl my-10">Our Mobile App Solution</p>
                <div class="grid md:grid-cols-2 md:gap-10 gap-5 grid-cols-1">
                    <div class="info_item">
                        <span class="info_item_img">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                            </svg>
                        </span>
                        <span class=""><span>User-Centered Design</span></span>
                    </div>
                    <div class="info_item">
                        <span class="info_item_img">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                            </svg>
                        </span>
                        <span class=""><span>Scalability and Performance</span></span>
                    </div>
                    <div class="info_item">
                        <span class="info_item_img">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                            </svg>
                        </span>
                        <span class=""><span>Security and Integration</span></span>
                    </div>
                    <div class="info_item">
                        <span class="info_item_img">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                            </svg>
                        </span>
                        <span class=""><span>User-Friendly Design</span></span>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="max-w-7xl mx-auto my-20 px-5">
        <div class="md:flex justify-between items-center gap-10 w-full">
            <div class="md:w-3/5">
                <div class="flex gap-4 items-center ">
                    <img src="{{ asset('assets/img/service/setting-service.jpg') }}" alt="setting icon" />
                    <h4 class="text-xl hover:text-orange-500">Business Solutions</h4>
                </div>
                <div class="my-5">
                    <p>We collaborate with you to uncover your unique communication style and create custom solutions that
                        deliver your message effectively. Our end-to-end approach, personalized to your needs, sets us
                        apart. It not only saves costs, but also streamlines engagement with our solutions.</p>
                </div>
                <p class="text-xl my-10">Our Business Solutions</p>
                <div class="grid md:grid-cols-2 md:gap-10 gap-5 grid-cols-1">
                    <div class="info_item">
                        <span class="info_item_img">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                            </svg>
                        </span>
                        <span class=""><span>AI Sulation</span></span>
                    </div>
                    <div class="info_item">
                        <span class="info_item_img">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                            </svg>
                        </span>
                        <span class=""><span>API Integration Service</span></span>
                    </div>
                    <div class="info_item">
                        <span class="info_item_img">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                            </svg>
                        </span>
                        <span class=""><span>Robotics And Auto Motion</span></span>
                    </div>
                    <div class="info_item">
                        <span class="info_item_img">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                            </svg>
                        </span>
                        <span class=""><span>Domain Registration And Acquiring</span></span>
                    </div>
                    <div class="info_item">
                        <span class="info_item_img">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                            </svg>
                        </span>
                        <span class=""><span>Hosting Sulation</span></span>
                    </div>
                </div>
            </div>
            <img class="md:w-2/5" src="{{ asset('assets/img/service/Solutions-hero@2x-1000x750.png') }}"
                alt="solution hero" />

        </div>
    </div>


    <div class="max-w-7xl mx-auto my-20 px-5">
        <div class="md:flex justify-between items-center gap-10 w-full">
            <img class="md:w-2/5"
                src="{{ asset('assets/img/service/social-media-and-digital-marketing-3d-illustration-free-png.webp') }}"
                alt="midea and digital" />
            <div class="md:w-3/5">
                <div class="flex gap-4 items-center ">
                    <img src="{{ asset('assets/img/service/setting-service.jpg') }}" alt="setting icon" />
                    <h4 class="text-xl hover:text-orange-500">Digital Branding</h4>
                </div>
                <div class="my-5">
                    <p>Imagine the impact the billion users on one single platform where they gather to interact, share and
                        connect with each other. Will you not want to use such platforms to build your brands? The power of
                        social media optimization cannot be doubted with the immense success of political campaign recently,
                        which made nobody to somebody. Social media optimization has the power to turn a brand into craze.
                    </p>
                </div>
                <p class="text-xl my-10">Our Digital Marketing Services</p>
                <div class="grid md:grid-cols-2 md:gap-10 gap-5 grid-cols-1">
                    <div class="info_item">
                        <span class="info_item_img">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                            </svg>
                        </span>
                        <span class=""><span>Inbound Marketing</span></span>
                    </div>
                    <div class="info_item">
                        <span class="info_item_img">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                            </svg>
                        </span>
                        <span class=""><span>Social Media Marketing</span></span>
                    </div>
                    <div class="info_item">
                        <span class="info_item_img">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                            </svg>
                        </span>
                        <span class=""><span>Content Marketing</span></span>
                    </div>
                    <div class="info_item">
                        <span class="info_item_img">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                            </svg>
                        </span>
                        <span class=""><span>Analytics Consultation</span></span>
                    </div>
                    <div class="info_item">
                        <span class="info_item_img">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                            </svg>
                        </span>
                        <span class=""><span>Online Reputation Management</span></span>
                    </div>
                    <div class="info_item">
                        <span class="info_item_img">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                            </svg>
                        </span>
                        <span class=""><span>Search Engine Optimization SEO</span></span>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="max-w-7xl mx-auto my-20 px-5">
        <div class="md:flex justify-between items-center gap-10 w-full">
            <div class="md:w-3/5">
                <div class="flex gap-4 items-center ">
                    <img src="{{ asset('assets/img/service/setting-service.jpg') }}" alt="setting icon" />
                    <h4 class="text-xl hover:text-orange-500">Enterprise Applications (Specialties)</h4>
                </div>
                <div class="my-5">
                    <p>We craft software to fit your needs, No customization, no time-consuming deeds. Industry-specific,
                        business-unique, Our solutions fully cover and peak.</p>
                </div>
                <p class="text-xl my-10">Our Customized Software Solutions</p>
                <div class="grid md:grid-cols-2 md:gap-10 gap-5 grid-cols-1 text-sm">
                    <div class="info_item">
                        <span class="info_item_img">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                            </svg>
                        </span>
                        <span class=""><span>Corporate & Interorganizational</span></span>
                    </div>
                    <div class="info_item">
                        <span class="info_item_img">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                            </svg>
                        </span>
                        <span class=""><span>Departmental Software</span></span>
                    </div>
                    <div class="info_item">
                        <span class="info_item_img">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                            </svg>
                        </span>
                        <span class=""><span>Specific Business Function</span></span>
                    </div>
                    <div class="info_item">
                        <span class="info_item_img">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                            </svg>
                        </span>
                        <span class=""><span>Customer Self-service Apps</span></span>
                    </div>
                    <div class="info_item">
                        <span class="info_item_img">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                            </svg>
                        </span>
                        <span class=""><span>Operations Management</span></span>
                    </div>
                </div>
            </div>
            <img class="md:w-2/5" src="{{ asset('assets/img/service/enterprise-applications-inner.png') }}"
                alt="enterprise-applications" />
        </div>


    </div>


    <div class="max-w-7xl mx-auto my-20 px-5">
        <div class="md:flex justify-between items-center gap-10 w-full">
            <img class="md:w-2/5" src="{{ asset('assets/img/service/types-cloud-mobile.png') }}" alt="cloud mobile" />
            <div class="md:w-3/5">
                <div class="flex gap-4 items-center ">
                    <img src="{{ asset('assets/img/service/setting-service.jpg') }}" alt="setting icon" />
                    <h4 class="text-xl hover:text-orange-500">Cloud Services</h4>
                </div>
                <div class="my-5">
                    <p>Imagine a billion users on one platform, connecting, sharing, and interacting. Such power can turn a
                        brand into a craze. With the recent success of political campaigns, the impact of social media
                        optimization cannot be ignored. Don't you want to use this platform to build your brand?</p>
                </div>
                <p class="text-xl my-10">Our Cloud Services</p>
                <div class="grid md:grid-cols-2 md:gap-10 gap-5 grid-cols-1 text-sm">
                    <div class="info_item">
                        <span class="info_item_img">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                            </svg>
                        </span>
                        <span class=""><span>Cloud Computing</span></span>
                    </div>
                    <div class="info_item">
                        <span class="info_item_img">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                            </svg>
                        </span>
                        <span class=""><span>Amazon Web Service</span></span>
                    </div>
                    <div class="info_item">
                        <span class="info_item_img">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                            </svg>
                        </span>
                        <span class=""><span>Big Data Services</span></span>
                    </div>
                    <div class="info_item">
                        <span class="info_item_img">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                            </svg>
                        </span>
                        <span class=""><span>Chatbot Service</span></span>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <div class="max-w-7xl mx-auto my-20 px-5">
        <div class="md:flex justify-between items-center gap-10 w-full">

            <div class="md:w-3/5">
                <div class="flex gap-4 items-center ">
                    <img src="{{ asset('assets/img/service/setting-service.jpg') }}" alt="web programming" />
                    <h4 class="text-xl hover:text-orange-500">Technologies</h4>
                </div>
                <div class="my-5">
                    <p>Imagine the impact the billion users on one single platform where they gather to interact, share and
                        connect with each other. Will you not want to use such platforms to build your brands? The power of
                        social media optimization cannot be doubted with the immense success of political campaign recently,
                        which made nobody to somebody. Social media optimization has the power to turn a brand into craze.
                    </p>
                </div>
                <p class="text-xl my-10">Our Technologies</p>
                <div class="grid md:grid-cols-2 md:gap-10 gap-5 grid-cols-1 text-sm">
                    <div class="info_item">
                        <span class="info_item_img">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                            </svg>
                        </span>
                        <span class=""><span>PHP Web Development</span></span>
                    </div>
                    <div class="info_item">
                        <span class="info_item_img">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                            </svg>
                        </span>
                        <span class=""><span>Java</span></span>
                    </div>
                    <div class="info_item">
                        <span class="info_item_img">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                            </svg>
                        </span>
                        <span class=""><span>HTML - 5</span></span>
                    </div>
                    <div class="info_item">
                        <span class="info_item_img">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                            </svg>
                        </span>
                        <span class=""><span>JavaScript Development</span></span>
                    </div>
                    <div class="info_item">
                        <span class="info_item_img">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                            </svg>
                        </span>
                        <span class=""><span>CSS Development</span></span>
                    </div>
                    <div class="info_item">
                        <span class="info_item_img">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                            </svg>
                        </span>
                        <span class=""><span>Python</span></span>
                    </div>
                    <div class="info_item">
                        <span class="info_item_img">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                            </svg>
                        </span>
                        <span class=""><span>Web Server</span></span>
                    </div>
                    <div class="info_item">
                        <span class="info_item_img">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                            </svg>
                        </span>
                        <span class=""><span>Node.js</span></span>
                    </div>
                </div>
            </div>
            <img class="md:w-2/5" src="{{ asset('assets/img/service/web-programming-2602886-2194274.png') }}"
                alt="web programming" />
        </div>
    </div>


    <div class="max-w-7xl mx-auto my-20 px-5">
        <div class="md:flex justify-between items-center gap-10 w-full">
            <img class="md:w-2/5" src="{{ asset('assets/img/service/open-source-software-5950981-4922161.png') }}"
                alt="open sourse software" />
            <div class="md:w-3/5">
                <div class="flex gap-4 items-center ">
                    <img src="{{ asset('assets/img/service/setting-service.jpg') }}" alt="setting icon" />
                    <h4 class="text-xl hover:text-orange-500">Open Source</h4>
                </div>
                <div class="my-5">
                    <p>Our software covers all unique and industry-specific functions, eliminating the need for
                        time-consuming and complicated customization that market-available products require.</p>
                </div>
                <p class="text-xl my-10">Our Customized Software Solutions</p>
                <div class="grid md:grid-cols-2 md:gap-10 gap-5 grid-cols-1 text-sm">
                    <div class="info_item">
                        <span class="info_item_img">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                            </svg>
                        </span>
                        <span class=""><span>Open Source Development</span></span>
                    </div>
                    <div class="info_item">
                        <span class="info_item_img">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                            </svg>
                        </span>
                        <span class=""><span>Joomla</span></span>
                    </div>
                    <div class="info_item">
                        <span class="info_item_img">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                            </svg>
                        </span>
                        <span class=""><span>Laravel</span></span>
                    </div>
                    <div class="info_item">
                        <span class="info_item_img">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                            </svg>
                        </span>
                        <span class=""><span>WordPress</span></span>
                    </div>
                    <div class="info_item">
                        <span class="info_item_img">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                            </svg>
                        </span>
                        <span class=""><span>Shopify</span></span>
                    </div>
                    <div class="info_item">
                        <span class="info_item_img">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                            </svg>
                        </span>
                        <span class=""><span>Magento</span></span>
                    </div>
                </div>
            </div>

        </div>
    </div>


    </div>
@endsection
