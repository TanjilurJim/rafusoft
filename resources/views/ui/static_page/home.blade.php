@extends('ui.layout.common')

@section('meta')
    <meta name="description"
        content="Top Best Software Company in Bangladesh for IOS And Android Development, Professional SEO Service. 100% Free Support">
    <meta name="keywords"
        content="Top Best Software Company in Bangladesh, IT Solution Dinajpur, IT Training Online, Software Services, Firmware Development, Ai Development" />
    <meta name="author" content="Developed by rafusoft.com">
    <title>Rafusoft: Top Best Software Company in Bangladesh</title>
    <link rel="canonical" href="https://rafusoft.com" />
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}" type="img/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/css/rain.css') }}">

    <meta property="og:title" content="Rafusoft: Top Best Software Company in Bangladesh">
    <meta property="og:site_name" content="Rafusoft">
    <meta property="og:url" content="https://rafusoft.com">
    <meta property="og:description"
        content="Top Best Software Company in Bangladesh for IOS And Android Development, Professional SEO Service. 100% Free Support">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('assets/img/favicon.png') }}">



    <meta name="twitter:card"  content="summary_large_image" />
    <meta name="twitter:site" content="@rafusoft">
    <meta name="twitter:title" content="Rafusoft: Top Best Software Company in Bangladesh">
    <meta name="twitter:description" content="Top Best Software Company in Bangladesh for IOS And Android Development, Professional SEO Service. 100% Free Support">
    <meta name="twitter:image" content="{{ asset('assets/img/favicon.png') }}">
@endsection

{{-- style="font-size: 20px;font-weight: 400;line-height:inherit;color: #D5D5D5;margin-bottom: 24px;margin-top: 10px;" --}}


@section('content')
    <section>
        <div class="thunder bg-[black]">
            <canvas id="canvas1"></canvas>
            <canvas id="canvas2"></canvas>
            <canvas id="canvas3"></canvas>

            <div class="wave_area">
                <div class="inner_wave_area inner_wave_flex">

                    <div class="container inner_wave_text p-5">
                        <div class="max-w-7xl mx-auto">
                            <h3 class="font-extrabold">We are Professionals <br> @ our service </h3>
                            <h4 class="text-[20px] font-[400] text-white mb-[24px] mt-[10px] leading-7 tracking-wider"> Expert Software Company:<br>Business Collaborations for Excellent Software Solutions</h4>
                            <div class="video_service_btn">
                                <a href="/services" class="boxed-btn3-white mr-0 mr-sm-1">Services</a>
                                <a href="#" class="boxed-btn3-white mr-0 mr-sm-1">Store</a>
                                <a href="https://rafusoft.com/career-at-rafusoft" class="boxed-btn3-white mr-0 mr-sm-1">Apply Job</a>
                            </div>
                        </div>
                    </div>

                </div>
                <div>
                    <svg class="waves" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
                        <defs>
                            <path id="gentle-wave"
                                d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                        </defs>
                        <g class="wave_parallax">
                            <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7)" />
                            <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
                            <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.6)" />
                            <use xlink:href="#gentle-wave" x="48" y="7" fill="rgba(255,255,255,1)" />
                        </g>
                    </svg>
                </div>

            </div>
        </div>



        <div>
            <div>
                <div class='max-w-6xl mx-auto md:flex justify-between items-center mb-10 p-5 -z-0'>
                    <div class='md:w-1/2'>
                        <h1 class='md:text-3xl font-medium'>Delivering Software for Over 14 Years: On Time and On Budget</h1>
                        <p class='mt-4  text-[#212529]'> 
                            <strong>Rafusoft: </strong> Your Top Best Trusted <strong>Software Company in Bangladesh </strong>. As the leading <strong> Software Development Company </strong>In Bangladesh, we have a representative office in the USA, India, Belgium. Our mission is to realize all customer ideas using the latest technology, helping them save time and costs while increasing productivity to the highest level. With a focus on both quality and cost, we offer end-to-end custom software development, team augmentation, and offshore development center (ODC) services. Our 
                            <strong>expert team </strong> comprising over 10+ dedicated engineers has successfully delivered 70+ projects. Whether you need <strong>mobile app development, web app development</strong> or <strong>full-stack advancement</strong>, Rafusoft has you covered. We specialize in developing. <strong>native iOS and Android apps, mobile hybrid apps, </strong>  and <strong>web apps. </strong> Our core values—  <strong>Honesty, Excellence, Experience, Cost efficiency,</strong> and <strong>Support</strong> drive us to be one of the top 10 software development companies in Asia by 2024. Partner with rafusoft to get your software done right!
                        </p>

                        <p class='mt-4  text-[#212529]'>Located in Dinajpur City, our excellent product outsourcing company
                            provides superior full-stack development as well as offshore development center (ODC) services
                            to meet the demand of various associations and organizations. We cover Bangladesh, Belgium,
                            India, Portugal and Vietnam.</p>

                        <p class='mt-5 text-[#212529]'>We not only focus on the quality and cost of our service but also
                            advise the best solutions to meet customer&apos;s specific markets. Our incessant effort,
                            improvement, and innovative ideas made our expert team the trusted software offshore center
                            provider amongst our esteemed clients.</p>

                        <div class='flex items-start gap-5 mt-5'>
                            <img src="{{ asset('assets/img/icon1.png') }}" width={50} height={50} alt='icon 1 '></img>
                            <div>
                                <h3>Our Mission</h3>
                                <p>Realize all the ideas of customers using the latest technology, thereby helping them save
                                    time and costs, increase productivity to the highest level. We want to give customer the
                                    best outsourcing software development services.</p>
                            </div>
                        </div>
                        <div class='flex items-start gap-5 mt-5'>
                            <img src="{{ asset('assets/img/icon2.png') }}" width={50} height={50} alt='icon 1 '></img>
                            <div>
                                <h3>Our Vision</h3>
                                <p>To be on top 10 software development companies in Asia in 2020. Providing excellent
                                    outsourcing software development services and perfect mobile apps development and web
                                    development.</p>
                            </div>
                        </div>
                        <div class='flex items-start gap-5 mt-5'>
                            <img src="{{ asset('assets/img/icon3.png') }}" width={50} height={50} alt='icon 1 '></img>
                            <div>
                                <h3>Our Core Values</h3>
                                <p>Honesty - Excellence - Experience - Cost efficiency - Support.</p>
                            </div>
                        </div>
                    </div>
                    <img class='md:block hidden' src="{{ asset('assets/img/rocket.png') }}" width={500} height={500}
                        alt='rocket project rafusoft'></img>
                </div>




                <div>
                    <div class='max-w-6xl mx-auto p-5'>
                        <h3 class='text-center text-3xl font-semibold'>Top IT Services for Quality Work!</h3>
                        <p class='text-center text-[16px] mt-5'>We provide outsourcing software development service and
                            offshore software development center to customers. We develop innovative mobile apps and web
                            to make complex things to become simple.</p>
                    </div>

                    <section class='max-w-6xl mx-auto py-10 grid md:grid-cols-3 grid-cols-1 gap-10 p-5'>
                        <div>
                            <div class='mobile-app relative'>
                                <img src="{{ asset('assets/img/1.png') }}" width={500} height={500} class='h-[300px]'
                                    alt="Mobile App Development" />
                                <div class='absolute w-full h-full top-0 bg-[#000000c8] flex justify-center items-center '>
                                </div>
                                <div class='absolute mobile-app-child w-full h-full top-0 p-4 '>
                                    <h2 class=' text-white font-bold mt-4'>Mobile App Development</h2>
                                    <hr class='my-2' />
                                    <p class='text-sm text-white'>We simplify complicated things by designing the best
                                        mobile apps products and delivering the most
                                        innovative mobile apps and web apps to our valued customers. We have an expert team
                                        of the most
                                        senior developers with accumulated experience of over 5 years in iOS and Android
                                        applications. They
                                        ensure the innovative technology included in the producing products.</p>
                                </div>
                            </div>
                            <div class='mobile-app relative mt-8'>
                                <img src="{{ asset('assets/img/2.png') }}" width={500} height={500} class='h-[300px]'
                                    alt="Mobile App Development" />
                                <div class='absolute w-full h-full top-0 bg-[#000000c8] flex justify-center items-center '>

                                </div>
                                <div class='absolute mobile-app-child w-full h-full top-0 p-4'>
                                    <h2 class='  text-white font-bold mt-4'>Web Development</h2>
                                    <hr class='my-2' />
                                    <p class='text-sm text-white'>We offer fully functional and extremely practical web
                                        applications as per the industry standard and our services are fully customized that
                                        meet your business needs, objectives, and specifications.</p>
                                </div>
                            </div>

                        </div>
                        <img src="{{ asset('assets/img/phone.png') }}" height={600} width={350}
                            alt='Service and feature img'></img>
                        <div>
                            <div class='mobile-app relative'>
                                <img src="{{ asset('assets/img/2.png') }}" width={500} height={500} class='h-[300px]'
                                    alt="Mobile App Development" />
                                <div class='absolute w-full h-full top-0 bg-[#000000c8] flex justify-center items-center '>

                                </div>
                                <div class='absolute mobile-app-child w-full h-full top-0 p-4'>
                                    <h2 class=' text-white font-bold mt-4'>Graphic Design</h2>
                                    <hr class='my-2' />
                                    <p class='text-sm text-white'>As part of your design package, we accumulate visual and
                                        verbal brand communications guidelines. These guidelines are the major tactical
                                        statements that aid in dealing with brand strategically by all stakeholders.</p>
                                </div>
                            </div>
                            <div class='mobile-app relative mt-8'>
                                <img src="{{ asset('assets/img/1.png') }}" width={500} height={500} class='h-[300px]'
                                    alt="Mobile App Development" />
                                <div class='absolute w-full h-full top-0 bg-[#000000c8] flex justify-center items-center '>

                                </div>
                                <div class='absolute mobile-app-child w-full h-full top-0 p-4 '>
                                    <h2 class=' text-white font-bold mt-4'>Offshore Development</h2>
                                    <hr class='my-2' />
                                    <p class='text-sm text-white'>Rafusoft has a proven track record of lead offshore
                                        development service, providing excellent offshore center, delivering effective
                                        software solutions to organizations worldwide. We’re a team of highly experienced
                                        and qualified software developers in Bangladesh that works in accordance with
                                        standardized methods and procedures.</p>
                                </div>
                            </div>


                        </div>
                    </section>
                </div>

                <section class='py-20 bg-process'>
                    <h3 class='text-center text-3xl font-semibold text-white '>Our Process</h3>
                    <p class='text-center text-white font-medium md:w-1/2 mx-auto'>Check out the outline here that will
                        define how we typically approach each new project in software development, including mobile apps
                        development, and web development</p>


                    <div class='max-w-6xl mx-auto grid md:grid-cols-3 grid-cols-1 gap-10 mt-10 p-5'>
                        <div class='p-10 border-mini rounded'>
                            <div class='flex justify-center py-5'>
                                <img src="{{ asset('assets/img/GATHER-SPECS-icon.png') }}" width={50} height={50}
                                    alt='/img/GATHER-SPECS-icon.png'></img>
                            </div>
                            <div>
                                <h4 class='text-white font-medium text-xl'>Gather Specs</h4>
                                <p class='my-3 text-white'>➔ Clarify requirements</p>
                                <p class='my-3 text-white'>➔ Confirm requirements</p>
                                <p class='my-3 text-white'>➔ List features base on priority</p>
                                <p class='my-3 text-white'>➔ Create stories on JIRA</p>
                            </div>
                        </div>
                        <div class='p-10 border-mini rounded'>
                            <div class='flex justify-center py-5'>
                                <img src="{{ asset('assets/img/GATHER-SPECS-icon.png') }}" width={50} height={50}
                                    alt='/img/GATHER-SPECS-icon.png'></img>
                            </div>
                            <div>
                                <h4 class='text-white font-medium text-xl'>Development</h4>
                                <p class='my-3 text-white'>➔ Build wireframe</p>
                                <p class='my-3 text-white'>➔ Gather client feedback</p>
                                <p class='my-3 text-white'>➔ Code development</p>
                                <p class='my-3 text-white'>➔ Marketing review</p>
                            </div>
                        </div>
                        <div class='p-10 border-mini  rounded'>
                            <div class='flex justify-center py-5'>
                                <img src="{{ asset('assets/img/GATHER-SPECS-icon.png') }}" width={50} height={50}
                                    alt='/img/GATHER-SPECS-icon.png'></img>
                            </div>
                            <div>
                                <h4 class='text-white font-medium text-xl'>QA & Support</h4>
                                <p class='my-3 text-white'>➔ Quality Assurance</p>
                                <p class='my-3 text-white'>➔ Deploy apps</p>
                                <p class='my-3 text-white'>➔ Fixing bugs</p>
                                <p class='my-3 text-white'>➔ Maintain apps</p>
                            </div>
                        </div>
                    </div>
                </section>





                <section class='my-28 px-5'>
                    <h2 class='text-center font-medium text-3xl '>Best Stats & Case Studies</h2>
                    <h2 class='text-center mt-4 font-medium'>Here&apos;s our valuable customers trusted us.</h2>


                    <div class='max-w-6xl mx-auto grid md:grid-cols-4 gap-10 grid-cols-1 mt-16'>
                        <div class='flex items-center gap-5'>
                            <img src="{{ asset('assets/img/stats/counter-1.png') }}" height={50} width={50}
                                alt="Count 1" />
                            <div>
                                <h5 class='text-4xl font-medium'>150 +</h5>
                                <p class='text-xl '>Web Development</p>
                            </div>
                        </div>
                        <div class='flex items-center gap-5'>
                            <img src="{{ asset('assets/img/stats/counter-2.png') }}" height={50} width={50}
                                alt="Count 1" />
                            <div>
                                <h5 class='text-4xl font-medium'>50 +</h5>
                                <p class='text-xl '> App Development</p>
                            </div>
                        </div>
                        <div class='flex items-center gap-5'>
                            <img src="{{ asset('assets/img/stats/counter-3.png') }}" height={50} width={50}
                                alt="Count 1" />
                            <div>
                                <h5 class='text-4xl font-medium'>100 +</h5>
                                <p class='text-xl '>Customers</p>
                            </div>
                        </div>
                        <div class='flex items-center gap-5'>
                            <img src="{{ asset('assets/img/stats/counter-4.png') }}" height={50} width={50}
                                alt="Count 1" />
                            <div>
                                <h5 class='text-4xl font-medium'>100 %</h5>
                                <p class='text-xl '>Satisfaction</p>
                            </div>
                        </div>
                    </div>
                </section>


                <section class='quote-bg py-20 mt-20 px-5'>
                    <h3 class='md:text-5xl font-bold text-white text-center mx-auto leading-8'><i
                            class="fa-solid fa-quote-left scale-150  text-[#FF9800]"></i> We Believe : Technology Brings
                        Transformative <br /> <br /> Changes to Business <i
                            class="fa-solid fa-quote-right scale-150  text-[#FF9800]"></i></h3>

                    <div class='max-w-6xl mx-auto mt-10 grid md:grid-cols-4 grid-cols-1 gap-5 '>
                        <div class='bg-[#444444] p-10 text-center'>
                            <HandshakeIcon class="text-white font-bold scale-150"></HandshakeIcon>
                            <div class='text-center shadow-xl py-3 text-xl text-white font-medium mt-4'>
                                27 +
                            </div>
                            <p class='text-xl text-white mt-4'>Years of Trust</p>
                        </div>
                        <div class='bg-[#444444] p-10 text-center'>
                            <StorageIcon class="text-white font-bold scale-150"></StorageIcon>
                            <div class='text-center shadow-xl py-3 text-xl text-white font-medium mt-4'>
                                950 +
                            </div>
                            <p class='text-xl text-white mt-4'>Projects</p>
                        </div>
                        <div class='bg-[#444444] p-10 text-center'>
                            <Person3Icon class="text-white font-bold scale-150"></Person3Icon>
                            <div class='text-center shadow-xl py-3 text-xl text-white font-medium mt-4'>
                                3.5k +
                            </div>
                            <p class='text-xl text-white mt-4'>Subscriber</p>
                        </div>
                        <div class='bg-[#444444] p-10 text-center'>
                            <FaceIcon class="text-white font-bold scale-150"></FaceIcon>
                            <div class='text-center shadow-xl py-3 text-xl text-white font-medium mt-4'>
                                300 +
                            </div>
                            <p class='text-xl text-white mt-4'>Happy Clients</p>
                        </div>
                    </div>
                </section>


                <div class='mt-20 p-5'>
                    <h3 class='text-center text-4xl font-medium mt-5'>From Idea to Proof of Concept</h3>
                    <p class='mt-3 text-center text-xl'>It takes more than a team to realise a game changing idea,
                        it&apos;s domain expertise and that&apos;s what we possess.</p>

                    <div class='flex justify-center mt-16'>
                        <img src="{{ asset('assets/img/stats/ideation.png') }}" width={1000} height={800}
                            alt="ideation" />
                    </div>
                </div>
            </div>
        </div>

        <section class="max-w-6xl mx-auto mt-20">
            <div class="slick-slider">
                <div class="element element-1">
                    <img src="{{ asset('assets/img/stats/a2i.png') }}" alt="a2i">
                </div>
                <div class="element element-1">
                    <img src="{{ asset('assets/img/stats/alibaba.png') }}" alt="alibaba">
                </div>
                <div class="element element-1">
                    <img src="{{ asset('assets/img/stats/basis.png') }}" alt="basis">
                </div>
                <div class="element element-1">
                    <img src="{{ asset('assets/img/stats/comodo.png') }}" alt="comodo">
                </div>
                <div class="element element-1">
                    <img src="{{ asset('assets/img/stats/download.png') }}" alt="download">
                </div>
                <div class="element element-1">
                    <img src="{{ asset('assets/img/stats/dtalk.png') }}" alt="dtalk">
                </div>
                <div class="element element-1">
                    <img src="{{ asset('assets/img/stats/govt.png') }}" alt="govt">
                </div>
                <div class="element element-1">
                    <img src="{{ asset('assets/img/stats/microsoft.png') }}" alt="microsoft">
                </div>
                <div class="element element-1">
                    <img src="{{ asset('assets/img/stats/govt.png') }}" alt="govt">
                </div>
            </div>
        </section>



        <script>
            $(".slick-slider").slick({
                slidesToShow: 5,
                infinite: false,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000
            });
        </script>

    </section>
@endsection
