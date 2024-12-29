@extends('ui.layout.common')

@section('meta')
<meta name="description" content="Discover our hassle-free refund policy at Rafusoft. We prioritize customer satisfaction and offer easy returns and reimbursements. Learn more now.">
<meta name="keywords" content="Hassle-free returns, Easy refunds, Customer satisfaction guarantee, Simple return process, Convenient reimbursement, No-fuss refund policy, Quick return procedure, Seamless product returns, Effortless reimbursement process, Hassle-free exchange policy"/>
<meta name="author" content="Developed by rafusoft.com">
<title>Refund Policy: Easy Returns | Rafusoft</title>
<link rel="canonical" href="https://rafusoft.com/refund-policy" />


<link rel="shortcut icon" href="{{asset('assets/img/favicon.png')}}" type="img/x-icon">
<link rel="stylesheet" href="{{asset('assets/css/about.css')}}">

<meta property="og:title" content="Refund Policy | Rafusoft">
<meta property="og:site_name" content="Rafusoft">
<meta property="og:url" content="https://rafusoft.com/refund-policy">
<meta property="og:description" content="We are the best IT Institute, where we teach our students about core technologies to create IT Professionals.">
<meta property="og:type" content="website">
<meta property="og:image" content="{{asset('assets/img/favicon.png')}}">



<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:site" content="@rafusoft" />
<meta name="twitter:title" content="Refund Policy | Rafusoft" />
<meta name="twitter:description" content="We are the best IT Institute, where we teach our students about core technologies to create IT Professionals." />
<meta name="twitter:image" content="{{asset('assets/img/favicon.png')}}" />
@endsection


@section('content')
    <section>
        <div class="hire-bg pt-10 pb-3">
            <h1 class="text-white mt-32 text-5xl text-center font-medium">{{$refund->headingone}}</h1>
            <h3 class="text-center mt-5 text-white text-3xl">{{$refund->headingtwo}}</h3>
            
            <div class="text-center my-20 ">
              <a href="#content" class="bg-[#F15A29] block px-4 py-2 w-14 mx-auto rounded"><img  class="animate-bounce" src="{{asset('assets/img/arrow.png')}}" alt="scroll down image" /></a>
            </div>
          </div>

          <div class="max-w-6xl mx-auto shadow-lg my-10 p-5">
            {!!$refund->content!!}
          </div>
    </section>
@endsection