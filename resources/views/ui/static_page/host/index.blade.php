@extends('ui.layout.common')


@section('meta')
<meta name="description" content="Rafusoft: more than a software company, a dream for Bangladeshi developers. Empowering aspirations, fostering innovation in the tech landscape.">
<meta name="keywords" content="IT Solution Dinajpur, Software Company, IT Training, Software Services, Firmware Development, ICT Courses"/>
<meta name="author" content="Developed by (www.rafusoft.com)">
<title>Top Banks in Bangladesh | Rafusoft</title>
<link rel="canonical" href="https://rafusoft.com/tools/top-banks-in-bd" />


<link rel="shortcut icon" href="{{asset('assets/img/favicon.png')}}" type="img/x-icon">
<link rel="stylesheet" href="{{asset('assets/css/about.css')}}">

<meta property="og:title" content="About Us | Rafusoft">
<meta property="og:site_name" content="Rafusoft">
<meta property="og:url" content="https://rafusoft.com/tools/top-banks-in-bd">
<meta property="og:description" content="Rafusoft: more than a software company, a dream for Bangladeshi developers. Empowering aspirations, fostering innovation in the tech landscape.">
<meta property="og:type" content="article">
<meta property="og:img" content="{{asset('assets/img/favicon.png')}}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/3.4.27/vue.global.min.js" integrity="sha512-jDpwxJN+g4BhXLdba5Z1rn2MpR9L5Wp3WVf2dJt5A0mkPHnHLZHZerpyX4JC9bM0pkCL7RmAR8FwOm02h7RKFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<meta name="twitter:card"  content="summary_large_image" />
<meta name="twitter:site" content="@rafusoft" />
<meta name="twitter:title" content="About Us | Rafusoft" />
<meta name="twitter:description" content="Rafusoft: more than a software company, a dream for Bangladeshi developers. Empowering aspirations, fostering innovation in the tech landscape." />
<meta name="twitter:image" content="{{asset('assets/img/favicon.png')}}" />
@endsection


@section('content')


<section>
    <div>
        <div class="hire-bg pt-10 pb-3">

            
            


          <h1 class="text-white mt-32 text-5xl text-center font-medium">Rafu Host</h1>
          <h3 class="text-center mt-5 text-white text-3xl">Your affoardable and reliable Hosing and domain service partner.</h3>
          
          <div class="text-center my-20 ">
            {{-- <a href="#content" class="bg-[#F15A29] block px-4 py-2 w-14 mx-auto rounded"><img  class="animate-bounce" src="{{asset('assets/img/arrow.png')}}" alt="scroll down image" /></a> --}}
          </div>
        </div>


        <div class="max-w-4xl mx-auto my-20">

          <div id="app">

          <div class="p-4">
            <h3 class="text-center text-xl mb-2">Begin the search for your perfect domain name...</h3>
            <form method="POST" action="" class="flex items-center border border-gray-300 rounded-lg">
              @csrf
              <input name="domain" v-model="domain" type="text" placeholder="Search Your Domain" class="py-2 px-4 mr-2 focus:outline-none focus:ring focus:border-blue-300 flex-1">
              <button @click="searchDomain" type="button" class="hover:bg-orange-800 text-white font-semibold py-2 px-4 rounded-lg bg-[#F15A29]">
                Search
              </button>
            </form>

            <div v-if="availableShow" class="mt-4">
              <h1 class="text-green-700 text-center text-xl">@{{ domain }} is available</h1>
              <div class="flex items-center justify-center">
                <div class="text-lg font-semibold text-gray-800 mr-4">৳1400.00 BDT</div>
                <a :href="link" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded shadow">
                  Add to Cart
                </a>
              </div>
            </div>
          </div>

          </div>
        
          
                  

           

        </div>



      </div>
</section>


@endsection



@section('footer-script')

<script>
 document.addEventListener('DOMContentLoaded', function() {
  // Vue app initialization
  const app = Vue.createApp({
    data() {
      return {
        domain: '',
        availableShow: false,
        unAvailableShow: false,
        link: '',
      }
    },
    methods: { // Corrected typo: it should be "methods" instead of "method"
      searchDomain() {
        // Make the POST request
        fetch('https://rafusoft.com/api/domain/search', {
          method: 'POST', // Specify the request method
          headers: {
            'Content-Type': 'application/json' // Specify the content type
          },
          body: JSON.stringify({ domain: this.domain }) // Pass data in JSON format
        })
        .then(response => {
          if (!response.ok) {
            throw new Error('Network response was not ok');
          }
          return response.json();
        })
        .then(data => {
          console.log(data); // Handle the response data

          if(data.result == 'success'){
            console.log("success success success");
            if(data.status == "available"){
              console.log("availableShow availableShow availableShow");
              this.availableShow = true;
              this.unAvailableShow = false;
              this.link = `http://host.rafusoft.com/cart.php?a=add&domain=register&domains[]=${this.domain}&domainsregperiod[${this.domain}]=1`;
            }

            if(data.status == "unavailable"){
              this.unAvailableShow = true;
              this.availableShow = false;
            }

          }
        })
        .catch(error => {
          console.error('There was a problem with the fetch operation:', error);
        });
      }
    }
  });

  app.mount('#app'); // Mount the app to the #app element
});

  
</script>

@endsection