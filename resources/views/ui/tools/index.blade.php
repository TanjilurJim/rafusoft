@extends('ui.layout.common')

@section('meta')
    <meta name="description"
        content="Instantly checks domain availability, helping users find the perfect web address for their online presence">
    <meta name="keywords"
        content="IT Solution Dinajpur, Software Company, IT Training, Software Services, Firmware Development, ICT Courses" />
    <meta name="author" content="Developed by rafusoft.com">
    <title>Website Status Checker | Rafusoft</title>
    <link rel="canonical" href="https://rafusoft.com/tools/domain-checker" />


    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}" type="img/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/css/tools.css') }}">

    <meta property="og:title" content="Website Status Checker | Rafusoft">
    <meta property="og:site_name" content="Rafusoft">
    <meta property="og:url" content="https://rafusoft.com/tools/domain-checker">
    <meta property="og:description"
        content="Rafusoft: more than a software company, a dream for Bangladeshi developers. Empowering aspirations, fostering innovation in the tech landscape.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('assets/img/favicon.png') }}">

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@rafusoft" />
    <meta name="twitter:title" content="Website Status Checker | Rafusoft" />
    <meta name="twitter:description"
        content="Rafusoft: more than a software company, a dream for Bangladeshi developers. Empowering aspirations, fostering innovation in the tech landscape." />
    <meta name="twitter:image" content="{{ asset('assets/img/favicon.png') }}" />
@endsection



@section('content')
    <div>
        <div>
            <div class="tools-bg pt-10 pb-3">
                <h1 class="text-white mt-32 text-5xl text-center font-medium">Website Status Checker</h1>
                <h3 class="text-center mt-5 text-white text-3xl">Check whether a website is online or not</h3>

                <div class="text-center my-20 ">
                    <a href="#content" class="bg-[#F15A29] block px-4 py-2 w-14 mx-auto rounded"><img class="animate-bounce"
                            src="{{ asset('assets/img/arrow.png') }}" alt="scroll down image" /></a>
                </div>
            </div>


            <div class="max-w-6xl mx-auto my-20">
                <form method="POST" class="p-5 rounded shadow" id="domainForm">
                    @csrf
                    <label for="domain" class="text-xl font-medium text-zinc-800">Website Domain</label>
                    <input  type="url" required id="domainInput" name="domain" type="text"
                        class="p-3 border block w-full rounded mt-4 focus:outline-none"
                        placeholder="Enter the Website you want to check the status of.">


                        @if (session('error'))
                        <div class="p-5 bg-red-600 text-white rounded flex justify-between items-center mt-4">
                           <p> {{ session('error')}}</p> <p>{{ session('status') }}</p>
                        </div>
                        @endif

                    @if (session('message'))
                        <div class="p-5 bg-green-600 text-white rounded flex justify-between items-center mt-4">
                           <p> {{ session('message')}}</p> <p>{{ session('status') }}</p>
                        </div>
                    @endif

                    <button class="button mt-5">Check Status</button>
                    <h3 class="text-xl font-medium mt-10">Website Status Checker</h3>
                    <p class="mt-4">Website Status Checker is a useful tool that helps you check whether any website is up
                        and running or not. You can use it to check the up-status of your own website or any other website.
                    </p>
                </form>
            </div>
        </div>

        {{-- <script>
            document.getElementById('domainForm').addEventListener('submit', function(event) {
                event.preventDefault();
                var domain = document.getElementById('domainInput').value;
                fetch('/tools/domain-checker', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf_token_name"]').content
                        },
                        body: JSON.stringify({
                            domain: domain
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log(data)
                        document.getElementById('result').classList.remove("hidden")
                        document.getElementById('result').innerHTML = `
                        <div>
                            <p class="text-white">Status: ${data.states}</p>
                            <p class="text-white">Owner: ${data.owner}</p>
                            <p class="text-white">Creation Date: ${data.creation_date}</p>
                            <p class="text-white">Expiration Date: ${data.expiration_date}</p>
                            <p class="text-white">Updated Date: ${data.expiration_date}</p>
                        </div>
                        `
                    })
                    .catch(error => {
                        // console.error('Error:', error);
                    });

                // console.log( document.querySelector('meta[name="csrf_token_name"]').content)

            });
        </script> --}}
    @endsection
