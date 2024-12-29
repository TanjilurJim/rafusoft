@extends('ui.layout.common')


@section('meta')
    <meta name="description"
        content="Shape your career at Rafusoft, a leading software development company in Dinajpur. Join us for innovative opportunities and professional growth.">
    <meta name="keywords" content="career, Dinajpur, Bangladesh, job, software, it " />
    <meta name="author" content="Developed by (www.rafusoft.com)">
    <title>Discover career opportunities for become professional - Rafusoft</title>
    <link rel="canonical" href="https://rafusoft.com/career-at-rafusoft" />



    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}" type="img/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/css/about.css') }}">

    <meta property="og:title" content="Discover career opportunities for become professional - Rafusoft">
    <meta property="og:site_name" content="Rafusoft">
    <meta property="og:url" content="https://rafusoft.com/career-at-rafusoft">
    <meta property="og:description"
        content="Shape your career at Rafusoft, a leading software development company in Dinajpur. Join us for innovative opportunities and professional growth.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('assets/img/favicon.png') }}">

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>



    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@rafusoft" />
    <meta name="twitter:title" content="Discover career opportunities for become professional - Rafusoft" />
    <meta name="twitter:description"
        content="Shape your career at Rafusoft, a leading software development company in Dinajpur. Join us for innovative opportunities and professional growth." />
    <meta name="twitter:image" content="{{ asset('assets/img/favicon.png') }}" />

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/intlTelInput-jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/css/intlTelInput.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/libphonenumber-js/1.9.44/libphonenumber-js.min.js"></script>


    <style>
        .iti--separate-dial-code{
            width: 100%;
        }
    </style>

@endsection


@section('content')
    <section>
        <div class="hire-bg pt-20 pb-2">
            <h1 class="text-white  text-4xl mt-32 text-center">Career Opportunities at Rafusoft</h1>
            <h2 class="text-center text-white mt-5  text-3xl">Build Your Career With Experts</h2>
            <div class="text-center my-10 ">
                <a href="#content" class="bg-[#F15A29] block px-4 py-2 w-14 mx-auto rounded"><img class="animate-bounce"
                        src="{{ asset('assets/img/arrow.png') }}" alt="scroll down image" /></a>
            </div>
        </div>

        <div class="max-w-6xl mx-auto my-20">
            <h3 class='text-2xl font-medium'>Build Your Career With Us</h3>
            <p class='mt-3 text-slate-600'>Are you looking to be a valuable part of our amazing and efficient team? Please
                fill the application below!</p>

            <div class="mt-10">
                <dl>
                    <dt>Life At Rafusoft?</dt>
                    <dd>Welcome to Rafusoft, the team of stimulated professionals working with awesomeness, creativity, and
                        innovation to cheer you everyday.
                    </dd>
                    <dt>We Teamwork To Innovate?</dt>

                    <dd>What delivers innovation to all things we do is teamwork. We help each other develop, solve issues
                        we face, and enjoy sweetened talks. We build up each other's ideas to deliver the best out of them.
                        It's all about teamwork.</dd>


                    <dt>Working At A Fun Loving Comfortable Environment?</dt>
                    <dd>Fun is the fuel and we regard it to be. Our team of fun loving inventive minds are cheered with
                        awesome indoor and outdoor games.</dd>


                    <dt>Dandy, Homey, And Technically Advanced Workplace?</dt>
                    <dd>Our workstation is not only high in look but also it is equipped with all modernized technologies to
                        comfort our efforts and continue work easily.</dd>
                </dl>
            </div>

            <div>
                <h3 class='text-2xl font-medium mt-10'>Application Form</h3>

                <form method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class='mt-5'>
                        <label for="name" class='text-[16px]'>Full Name:</label>
                        <input type="text" id='name' name='name'
                            class='block my-3 w-full p-2 border focus:outline-none rounded' placeholder='Name' required />
                        @error('name')
                            <div class="text-red-500 mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class='mt-5'>
                        <label for="email" class='text-[16px]'>Email Address:</label>
                        <input type="text" name='email' id='email'
                            class='block my-3 w-full p-2 border focus:outline-none rounded' placeholder='Email Address'
                            required />
                        @error('email')
                            <div class="text-red-500 mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class='mt-5'>
                        <label for="mobile" class='text-[16px] mb-3 pb-5'>Mobile (WhatsApp):</label>
                        <br>
                        <div class="my-2">

                        </div>
                        <input type="number" name='mobile' id="mobile_code" onkeyup="conutryCode(this)" class='block w-full py-3 p-2 border focus:outline-none rounded' style="width: 100% !importent;" placeholder='Mobile' required />
                        @error('mobile')
                            <div class="text-red-500 mt-1">{{ $message }}</div>
                        @enderror
                        <p id="error-message" style="color: red;"></p>
                    </div>


                    <input type="text" class="hidden" name="code" id="code">


                    <div class='mt-5'>
                        <label for="subject" class='text-[16px]'>Interested Position:</label>
                        <input type="text" name='subject' id='subject'
                            class='block my-3 w-full p-2 border focus:outline-none rounded' placeholder='Subject'
                            required />
                        @error('subject')
                            <div class="text-red-500 mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class='mt-5'>
                        <label for="cv" class='text-[16px]'>
                            Curriculum Vitae (CV):
                            <br />
                            Allowed formats are .pdf, .doc, .docx | Max File Size: 10 Mega Byte
                        </label>
                        <input type="file" name='cv' id='cv'
                            class='block my-3 w-full p-2 border focus:outline-none rounded' required />
                        @error('cv')
                            <div class="text-red-500 mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class='mt-5'>
                        <label for="message" class='text-[16px]'>
                            Message:
                        </label>
                        <textarea name='message' id='message' class='block my-3 w-full p-2 border focus:outline-none rounded h-40'
                            placeholder='Write your message here ..' required></textarea>
                        @error('message')
                            <div class="text-red-500 mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="g-recaptcha my-4" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                    @if ($errors->has('g-recaptcha-response'))
                        <div class="text-red-500">{{ $errors->first('g-recaptcha-response') }}</div>
                    @endif

                    <button disabled id="apply_button" class='button disabled:opacity-50'>Apply Now</button>
                </form>
            </div>
        </div>


        <script>
            (function() {
                var dd = $('dd');
                dd.filter(':nth-child(n+3)').hide();
                $('dl').on('click', 'dt', function() {
                    $(this)
                        .next()
                        .slideDown(200)
                        .siblings('dd')
                        .slideUp(200);
                })
            })();
        </script>



        <script>
            $("#mobile_code").intlTelInput({
                initialCountry: "bd",
                separateDialCode: true,
            });



            function validatePhoneNumber(phoneInput) {
            const errorMessage = document.getElementById('error-message');
            
            try {
                const phoneNumber = libphonenumber.parsePhoneNumber(phoneInput);
                if (phoneNumber.isValid()) {
                    errorMessage.textContent = '';
                    document.getElementById('apply_button').removeAttribute("disabled");
                } else {
                    errorMessage.textContent = 'Invalid phone number';
                    document.getElementById('apply_button').addAttribute("disabled");
                }
            } catch (error) {
                errorMessage.textContent = 'Invalid phone number format';
                document.getElementById('apply_button').addAttribute("disabled");
            }
        }



            const conutryCode =(input)=>{
                const text = document.getElementsByClassName('iti__selected-dial-code')?.[0].innerText;
                console.log(text)
                console.log(input.value)

                document.getElementById('code').value = text;

                validatePhoneNumber(text+input.value)

                console.log(text+input.value);

                if (input.value.startsWith('0')) {
                    const errorMessage = document.getElementById('error-message');
                    errorMessage.textContent = 'Invalid phone number format';
                    document.getElementById('apply_button').addAttribute("disabled");
                }
            }




        </script>

        @if (session('success'))
            <script>
                Toastify({
                    text: "Applyed Successfull",
                    duration: 3000,
                    newWindow: true,
                    gravity: "bottom", // `top` or `bottom`
                    position: "right", // `left`, `center` or `right`
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                    style: {
                        background: "linear-gradient(to right, #00b09b, #96c93d)",
                    },
                    onClick: function() {}
                }).showToast();
            </script>
        @endif
    @endsection
