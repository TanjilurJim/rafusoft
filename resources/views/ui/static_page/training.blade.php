@extends('ui.layout.common')


@section('meta')
    <meta name="description"
        content="We are the best IT Institute, where we teach our students about core technologies to create IT Professionals.">
    <meta name="keywords"
        content="Android Training, Web Designing, PHP Training, Javascript, Jquery Training, Java Training, Microsoft .NET Training, IOT Training, Digital Marketing, SEO Training" />
    <meta name="author" content="Developed by rafusoft.com">
    <title>Best ICT Computer professional Training Center in Dinajpur</title>
    <link rel="canonical" href="https://rafusoft.com/training" />


    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}" type="img/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/css/about.css') }}">

    <meta property="og:title" content="Best ICT Computer professional Training Center in Dinajpur">
    <meta property="og:site_name" content="Rafusoft">
    <meta property="og:url" content="https://rafusoft.com/training">
    <meta property="og:description"
        content="We are the best IT Institute, where we teach our students about core technologies to create IT Professionals.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('assets/img/favicon.png') }}">



    <meta name="twitter:card"  content="summary_large_image" />
    <meta name="twitter:site" content="@rafusoft" />
    <meta name="twitter:title" content="Best ICT Computer professional Training Center in Dinajpur" />
    <meta name="twitter:description" content="We are the best IT Institute, where we teach our students about core technologies to create IT Professionals." />
    <meta name="twitter:image" content="{{ asset('assets/img/favicon.png') }}" />
@endsection



@section('content')
    <section>
        <div class="bg-global pt-20 pb-2">
            <h1 class="text-white  text-4xl mt-32 text-center">IT PROFESSIONAL TRAINING</h1>
            <h2 class="text-center text-white mt-5   text-3xl">Professonal Course & Training for Career</h2>
            <div class="text-center my-10 ">
                <a href="#content" class="bg-[#F15A29] block px-4 py-2 w-14 mx-auto rounded"><img class="animate-bounce"
                        src="{{ asset('assets/img/arrow.png') }}" alt="scroll down image" /></a>
            </div>
        </div>



        <section class='max-w-6xl mx-auto mt-20'>
            <div>
                <h3 class='text-xl font-medium text-center'>
                    <SearchIcon /> SEARCH STUDENT
                </h3>
                <form class='flex justify-center my-10 items-center gap-4 flex-wrap'>
                    <p htmlFor="student_id">Student ID:</p>
                    <input type="text" placeholder='Example:WD60001' class='p-2 border focus:outline-none' />
                    <button class='flex justify-between items-center text-white bg-[#F15A29] rounded px-5 py-2'>
                        <SearchIcon /> Search
                    </button>
                </form>
            </div>

            <div class='px-5'>
                <h4 class='text-[#1F1F1F] text-3xl font-medium'>WHAT WE DO</h4>
                <p class='text-[#1F1F1F]'>Implementing the right marketing strategy in a proper way and handling it
                    correctly is essential in a competitive market.</p>
            </div>

            <div class='mt-10 grid md:grid-cols-3 gap-5 my-5 px-5 grid-cols-1'>
                <div class='border rounded pb-3'>
                    <img src="{{ asset('assets/img/training/android.jpg') }}" class='w-full' alt="scroll down image" />
                    <h5 class='text-xl font-bold text-center my-5 text-[#F15A29]'>Android Training</h5>
                    <p class='text-[#4e4e4e] text-center px-3'>Rafusoft provides best Android training in Dinajpur,
                        Bangladesh</p>
                </div>
                <div class='border rounded pb-3'>
                    <img src="{{ asset('assets/img/training/web-design.jpg') }}" class='w-full' alt="scroll down image" />
                    <h5 class='text-xl font-bold text-center my-5 text-[#F15A29]'>Web Design</h5>
                    <p class='text-[#4e4e4e] text-center px-3'>Rafusoft provides best Web Design Training in Dinajpur,
                        Bangladesh</p>
                </div>
                <div class='border rounded pb-3'>
                    <img src="{{ asset('assets/img/training/php.jpg') }}" class='w-full' alt="scroll down image" />
                    <h5 class='text-xl font-bold text-center my-5 text-[#F15A29]'>PHP Training</h5>
                    <p class='text-[#4e4e4e] text-center px-3'>Rafusoft provides best PHP Training in Dinajpur,
                        Bangladesh</p>
                </div>
                <div class='border rounded pb-3'>
                    <img src="{{ asset('assets/img/training/javascript-jquery.jpg') }}" class='w-full'
                        alt="scroll down image" />
                    <h5 class='text-xl font-bold text-center my-5 text-[#F15A29]'>Javascript, Jquery Training</h5>
                    <p class='text-[#4e4e4e] text-center px-3'>Rafusoft provides best Javascript Jquery Training in
                        Dinajpur, Bangladesh</p>
                </div>
                <div class='border rounded pb-3'>
                    <img src="{{ asset('assets/img/training/java.jpg') }}" class='w-full' alt="scroll down image" />
                    <h5 class='text-xl font-bold text-center my-5 text-[#F15A29]'>Java Training</h5>
                    <p class='text-[#4e4e4e] text-center px-3'>Rafusoft provides best Java Training in Dinajpur,
                        Bangladesh</p>
                </div>
                <div class='border rounded pb-3'>
                    <img src="{{ asset('assets/img/training/net-training.jpg') }}" class='w-full'
                        alt="scroll down image" />
                    <h5 class='text-xl font-bold text-center my-5 text-[#F15A29]'>Microsoft .NET Training</h5>
                    <p class='text-[#4e4e4e] text-center px-3'>Rafusoft provides best Microsoft .NET Training in
                        Dinajpur, Bangladesh</p>
                </div>
                <div class='border rounded pb-3'>
                    <img src="{{ asset('assets/img/training/digital-markrting.jpg') }}" class='w-full'
                        alt="scroll down image" />
                    <h5 class='text-xl font-bold text-center my-5 text-[#F15A29]'>Digital Marketing</h5>
                    <p class='text-[#4e4e4e] text-center px-3'>Rafusoft provides best Digital Marketing Training in
                        Dinajpur, Bangladesh</p>
                </div>
                <div class='border rounded pb-3'>
                    <img src="{{ asset('assets/img/training/seo.jpg') }}" class='w-full' alt="scroll down image" />
                    <h5 class='text-xl font-bold text-center my-5 text-[#F15A29]'>SEO Training</h5>
                    <p class='text-[#4e4e4e] text-center px-3'>Rafusoft provides best SEO Training in Dinajpur,
                        Bangladesh</p>
                </div>
                <div class='border rounded pb-3'>
                    <img src="{{ asset('assets/img/training/iot.jpg') }}" class='w-full' alt="scroll down image" />
                    <h5 class='text-xl font-bold text-center my-5 text-[#F15A29]'>IOT Training</h5>
                    <p class='text-[#4e4e4e] text-center px-3'>Rafusoft provides best IOT Training in Dinajpur,
                        Bangladesh</p>
                </div>
                <div class='border rounded pb-3'>
                    <img src="{{ asset('assets/img/training/rafusoft-graphic-design.jpg') }}" class='w-full'
                        alt="scroll down image" />
                    <h5 class='text-xl font-bold text-center my-5 text-[#F15A29]'>Graphic Design</h5>
                    <p class='text-[#4e4e4e] text-center px-3'>Rafusoft provides best Graphic Design Training in
                        Dinajpur, Bangladesh</p>
                </div>
                <div class='border rounded pb-3'>
                    <img src="{{ asset('assets/img/training/industrial-attachment.jpg') }}" class='w-full'
                        alt="scroll down image" />
                    <h5 class='text-xl font-bold text-center my-5 text-[#F15A29]'>Industrial Attachment</h5>
                    <p class='text-[#4e4e4e] text-center px-3'>Rafusoft provides best Industrial Attachment Training in
                        Dinajpur, Bangladesh</p>
                </div>
                <div class='border rounded pb-3'>
                    <img src="{{ asset('assets/img/training/coming-soon.jpg') }}" class='w-full'
                        alt="scroll down image" />
                    <h5 class='text-xl font-bold text-center my-5 text-[#F15A29]'>Upcoming Training</h5>
                    <p class='text-[#4e4e4e] text-center px-3'>Rafusoft provides best Training in Dinajpur, Bangladesh
                    </p>
                </div>
            </div>
        </section>


        <section class='bg-training-2 mt-10 px-5'>
            <div class='max-w-6xl mx-auto'>
                <section class='md:flex justify-between'>
                    <div class='mt-5 md:w-1/2'>
                        <h3 class='text-3xl font-bold text-white'>Our ethics & strength</h3>
                        <p class='text-white mt-5'>The code of conduct and ethics policy and principle by which SumTech
                            IT all activities are governed</p>
                        <p class='flex gap-2 items-center'>
                            Honesty, punctuality and integrity
                        </p>
                        <p class='flex gap-2 items-center'>
                            Good Quality Insurity
                        </p>
                        <p class='flex gap-2 items-center'>
                            Proper Student Scholarships
                        </p>
                        <p class='flex gap-2 items-center'>
                            Advanced IT Training
                        </p>
                        <p class='flex gap-2 items-center'>
                            Perfect Career Consultancy
                        </p>
                        <p class='flex gap-2 items-center'>
                            Professionalism and confidentially
                        </p>
                        <p class='flex gap-2 items-center'>
                            Equal opportunity for all
                        </p>
                    </div>
                    <iframe class='md:w-1/2 w-full border-2 mt-5' height="315"
                        src="https://www.youtube.com/embed/ZSkeoFX1FRk?si=38m7MdBsOtmoSdy0" title="YouTube video player"
                        frameBorder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </section>
            </div>
        </section>



        <section class='px-5 max-w-6xl mx-auto my-16'>
            <h3 class='font-medium text-3xl mb-4'>Top clients</h3>
            <span class='border-b border-[#F15A29] py-5 text-slate-700 font-medium'>Our honourable working Partners,
                for those we feel proud of a professionalism.</span>

            <Patner />
        </section>

    </section>
@endsection
