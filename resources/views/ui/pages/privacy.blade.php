@extends('ui.layout.common')

@section('meta')
<meta name="description" content="Explore Rafusoft's commitment to safeguarding your personal data. Transparency and compliance ensure secure handling of your information">
<meta name="keywords" content="Data protection, Personal information security, Privacy assurance, Transparent data handling, Confidentiality guarantee, Privacy compliance, Secure data management, Privacy commitment, Information security measures, Data privacy policy"/>
<meta name="author" content="Developed by rafusoft.com">
<title>Secure Privacy Policy: Your Information Protected | Rafusoft</title>
<link rel="canonical" href="https://rafusoft.com/privacy-policy" />


<link rel="shortcut icon" href="{{asset('assets/img/favicon.png')}}" type="img/x-icon">
<link rel="stylesheet" href="{{asset('assets/css/about.css')}}">

<meta property="og:title" content="Privacy Policy | Rafusoft">
<meta property="og:site_name" content="Rafusoft">
<meta property="og:url" content="https://rafusoft.com/privacy-policy">
<meta property="og:description" content="Rafusoft: more than a software company, a dream for Bangladeshi developers. Empowering aspirations, fostering innovation in the tech landscape.">
<meta property="og:type" content="website">
<meta property="og:image" content="{{asset('assets/img/favicon.png')}}">

<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:site" content="@rafusoft" />
<meta name="twitter:title" content="Data protection, Personal information security, Privacy assurance, Transparent data handling, Confidentiality guarantee, Privacy compliance, Secure data management, Privacy commitment, Information security measures, Data privacy policy" />
<meta name="twitter:description" content="Data protection, Personal information security, Privacy assurance, Transparent data handling, Confidentiality guarantee, Privacy compliance, Secure data management, Privacy commitment, Information security measures, Data privacy policy" />
<meta name="twitter:image" content="{{asset('assets/img/favicon.png')}}" />
@endsection


@section('content')
    <section>
        <div class="hire-bg pt-10 pb-3">
            <h1 class="text-white mt-32 text-5xl text-center font-medium">{{$privacy->headingone}}</h1>
            <h3 class="text-center mt-5 text-white text-3xl">{{$privacy->headingtwo}}</h3>
            
            <div class="text-center my-20 ">
              <a href="#content" class="bg-[#F15A29] block px-4 py-2 w-14 mx-auto rounded"><img  class="animate-bounce" src="{{asset('assets/img/arrow.png')}}" alt="scroll down image" /></a>
            </div>
          </div>

          <div class="max-w-6xl mx-auto shadow-lg py-10 p-5 my-10">
            {!!$privacy->content!!}
          </div>
    </section>
@endsection