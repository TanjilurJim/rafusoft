@extends('ui.layout.common')


@section('meta')
    <meta name="description" content="Discover how Rafusoft can bring your ideas to life with custom software development. Get quotes today and unlock the potential of your project">
    <meta name="keywords"  content="Software development quotes, Custom software quotes, Development cost estimates, Project pricing, Software development consultation, Development proposal, Quote request, Software development inquiry, Custom solution estimation, Development budget evaluation" />
    <meta name="author" content="Developed by rafusoft.com">
    <title>Software Development Quotes: Transform Your Ideas | Rafusoft</title>
    <link rel="canonical" href="https://rafusoft.com/get-quote" />



    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}" type="img/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/css/about.css') }}">

    <meta property="og:title" content="Software Development Quotes: Transform Your Ideas | Rafusoft">
    <meta property="og:site_name" content="Rafusoft">
    <meta property="og:url" content="https://rafusoft.com/get-quote">
    <meta property="og:description" content="Discover how Rafusoft can bring your ideas to life with custom software development. Get quotes today and unlock the potential of your project">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('assets/img/favicon.png') }}">

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>




    <meta name="twitter:card"  content="summary_large_image" />
    <meta name="twitter:site" content="@rafusoft" />
    <meta name="twitter:title" content="Software Development Quotes: Transform Your Ideas | Rafusoft" />
    <meta name="twitter:description" content=" ights and innovative solutions." />
    <meta name="twitter:image" content="{{ asset('assets/img/favicon.png') }}" />
@endsection


@section('content')
    <div>
        <div class="hire-bg pt-20 pb-2">
            <h1 class="text-white  text-4xl mt-32 text-center">Software Development Quotes: Transform Your Ideas</h1>
            <h2 class="text-center text-white mt-5  text-3xl">Get Quote About Your Software</h2>
            <div class="text-center my-10 ">
                <a href="#content" class="bg-[#F15A29] block px-4 py-2 w-14 mx-auto rounded"><img class="animate-bounce"
                        src="{{ asset('assets/img/arrow.png') }}" alt="scroll down image" /></a>
            </div>
        </div>
        <section>
            <form class="max-w-6xl mx-auto py-10 px-5" method="POST">
                @csrf
                <div>
                    <strong class="flex gap-3 items-center"><i class="fa-solid text-orange-600 rotate-45 fa-location-arrow"></i>Your
                        Name ? (National ID Name)</strong>
                    <input type="text" name="name" class="p-2 my-3 border border-slate-400 rounded w-full">
                    @error('name')
                        <p class="my-3 text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <strong class="flex gap-3 items-center"><i class="fa-solid text-orange-600 rotate-45 fa-location-arrow"></i>Your
                        Email ?</strong>
                    <input type="email" name="email" class="p-2 my-3 border border-slate-400 rounded w-full">
                    @error('email')
                        <p class="my-3 text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <strong class="flex gap-3 items-center"><i class="fa-solid text-orange-600 rotate-45 fa-location-arrow"></i>Your Phone
                        Number ?</strong>
                    <input type="number" name="phone" class="p-2 my-3 border border-slate-400 rounded w-full">
                    @error('phone')
                        <p class="my-3 text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <strong class="flex gap-3 items-center"><i class="fa-solid text-orange-600 rotate-45 fa-location-arrow"></i> Your
                        WhatsApp Number ?</strong>
                    <input type="number" name="whatsapp" class="p-2 my-3 border border-slate-400 rounded w-full">
                    @error('whatsapp')
                        <p class="my-3 text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <strong class="flex gap-3 items-center"><i class="fa-solid text-orange-600 rotate-45 fa-location-arrow"></i>What Type
                        Of Software / Website ? </strong>
                    <input type="text" name="type" class="p-2 my-3 border border-slate-400 rounded w-full">
                    @error('type')
                        <p class="my-3 text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <strong class="flex gap-3 items-center"><i class="fa-solid text-orange-600 rotate-45 fa-location-arrow"></i>Your Current Address ?</strong>
                    <input type="text" name="address" class="p-2 my-3 border border-slate-400 rounded w-full">
                    @error('address')
                        <p class="my-3 text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <strong class="flex gap-3 items-center"><i class="fa-solid text-orange-600 rotate-45 fa-location-arrow"></i> Examples Of Similar Websites, Apps, 
                    Or Mobile Apps That You Want Followed ?</strong>
                    <input type="text" name="about" class="p-2 my-3 border border-slate-400 rounded w-full">
                    @error('about')
                        <p class="my-3 text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <strong class="flex gap-3 items-center"><i class="fa-solid text-orange-600 rotate-45 fa-location-arrow"></i> Brief How
                        It Will Work ?</strong>
                    <input type="text" name="brief" class="p-2 my-3 border border-slate-400 rounded w-full">
                    @error('brief')
                        <p class="my-3 text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <strong class="flex gap-3 items-center"><i class="fa-solid text-orange-600 rotate-45 fa-location-arrow"></i> Your Budget
                        Range ?</strong>
                    <div class="flex gap-3">
                        <input type="text" name="budget" class="p-2 my-3 border border-slate-400 rounded w-full">
                        <select name="currency" class="p-2 my-3 border border-slate-400 rounded w-full">
                            <option value="BDT">BDT</option>
                            <option value="BDT">USD</option>
                            <option value="BDT">EURO</option>
                        </select>
                    </div>
                    @error('budget')
                        <p class="my-3 text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <strong class="flex gap-3 items-center"><i class="fa-solid text-orange-600 rotate-45 fa-location-arrow"></i> What Is
                        Your Timeline About The Project ?</strong>
                    <div class="my-3 flex gap-4 items-center">
                        <input value="Month" name="timeline" type="radio" id="month">
                        <label for="month">Monthly</label>
                    </div>
                    <div class="my-3 flex gap-4 items-center">
                        <input value="Year" name="timeline" type="radio" id="year">
                        <label for="year">Yearly</label>
                    </div>
                    <div class="my-3 flex gap-4 items-center">
                        <input value="Day by Day" name="timeline" type="radio" id="day">
                        <label for="day">Day By Day</label>
                    </div>
                    @error('timeline')
                        <p class="my-3 text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-5">
                    <strong class="flex gap-3 items-center"><i class="fa-solid text-orange-600 rotate-45 fa-location-arrow"></i> What Kind
                        Of Application ?</strong>
                    <div class="mt-4 flex gap-4 items-center">
                        <input value="Android" type="radio" name="device" id="androaid">
                        <label for="androaid">Android</label>
                    </div>
                    <div class="my-3 flex gap-4 items-center">
                        <input value="Desktop" type="radio" name="device" id="desktop">
                        <label for="desktop">Desktop PC</label>
                    </div>
                    <div class="flex gap-4 items-center">
                        <input value="IOS" type="radio" name="device" id="IOS">
                        <label for="IOS">IOS </label>
                    </div>
                    <div class="flex gap-4 items-center my-3">
                        <input value="Website" type="radio" name="device" id="website">
                        <label for="website">Website</label>
                    </div>
                    @error('device')
                        <p class="my-3 text-red-400">{{ $message }}</p>
                    @enderror
                    <div class="my-4">
                        <strong class="flex gap-3 items-center"><i class="fa-solid text-orange-600 rotate-45 fa-location-arrow"></i>More
                            Describe Your Idea ... </strong>
                        <textarea name="describe" id="describe" class="w-full mt-3 border border-slate-400 p-5 rounded" rows="5"></textarea>
                        @error('describe')
                            <p class="my-3 text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    <button class="button">Submit</button>
                </div>
            </form>
        </section>
        @if (session('success'))
            <script>
                Toastify({
                    text: "Requested For Quote",
                    duration: 3000,
                    newWindow: true,
                    gravity: "top", // `top` or `bottom`
                    position: "right", // `left`, `center` or `right`
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                    style: {
                        background: "linear-gradient(to right, #00b09b, #96c93d)",
                    },
                    onClick: function() {}
                }).showToast();
            </script>
        @endif
    </div>
@endsection
