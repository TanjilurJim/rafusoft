<!DOCTYPE html>
    <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf_token_name" content="ci_csrf_token" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('assets/img/favicon.png') }}">
    <meta name="theme-color" content="#F15A29">
    <meta name="version" content="5.1.9"> 
    <meta name="release-date" content="2024-05-18">

    <?php
    // Get PHP version
    $php_version = phpversion();
    ?>

    <meta name="php-version" content="<?php echo $php_version; ?>">

    <?php
    // Get PHP version
    $php_version = phpversion();
    ?>

    <meta name="php-version" content="<?php echo $php_version; ?>">

    {{-- <meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'self' https://cdnjs.cloudflare.com; style-src 'self' https://fonts.googleapis.com; style-src 'self' https://cdn.tailwindcss.com;"> --}}

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}
        <script src="{{asset('css/tailwind.js')}}"></script>
    <script src="{{asset('css/all.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/all.css')}}">
    <script src="https://unpkg.com/html5-qrcode/minified/html5-qrcode.min.js"></script>

    <script src="https://unpkg.com/qr-code-styling/lib/qr-code-styling.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Slick script from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>


    @yield('meta')

    {{-- font  --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    {{-- font  --}}

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
                
    <link rel="stylesheet" href="{{asset('editor/font.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Lobster|Montserrat|Poppins">


<style>
    :root {
  --text-color: #212529;
  --bar-color: #ff4d6d;
  --transition-effect: all 200ms linear;
}



#loader {
  width: 100%;
  height: 25px;
  display: flex;
  align-items: center;
  gap: 10%;
  position: relative;
}

#text {
  font-family: var(--font-fam);
  color: var(--text-color);
  font-size: 20px;
  /* padding: 0 10px; */
  font-weight: 500;
}
#percent {
  font-family: var(--font-fam);
  color: #070303;
  transition: var(--transition-effect);
  font-size: 16px;
  padding: 0 10px;
  font-weight: 500;
}
#bar {
  position: absolute;
  height: 20px;
  width: 100%;
  z-index: -1;
  /* border-radius: 10px; */
  padding-top: 2rem; 
  border-top: 5px solid #F15A29;
  /* background-color: #F15A29; */
  transform-origin: left;
  transform: scalex(0%);
  transition: var(--transition-effect);
}
#help {
  font-family: var(--font-fam);
  color: var(--text-color);
  font-size: 20px;
  position: absolute;
  top: 20px;
  font-weight: 600;
}

</style>

    <script type="application/ld+json">
            {
              "@context": "https://schema.org",
              "@type": "Article",
              "headline": "<?php echo isset($headline) ? $headline : 'Rafusoft software company in bangladesh'; ?>",
              "image": "https://rafusoft.com/schema_image/rafusoft-software-company-in-bangladesh.jpg",
              "author": {
                "@type": "Person",
                "name": "SM Rafeat Hossian"
              },
              "publisher": {
                "@type": "Organization",
                "name": "Rafusoft",
                "logo": {
                  "@type": "ImageObject",
                  "url": "https://rafusoft.com/assets/img/rafusoft-logo.svg"
                }
              },
              "datePublished": "2024-04-30T06:00:00+08:00",
              "dateModified": "2024-04-30T06:00:00+08:00"
            }
    </script>

    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "LocalBusiness",
          "address": {
            "@type": "PostalAddress",
            "addressLocality": "Dinajpur",
            "addressRegion": "Bangladesh",
            "streetAddress": "Nimnagar , Balubari Dinajpur"
          },
          "description": "<?php echo isset($headline) ? $headline : 'Rafusoft software company in bangladesh'; ?>",
          "name": "Rafusoft",
          "telephone": "+8801744333888"
        }
        </script>
        
        
        <script type="text/javascript">
		var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
		(function(){
		var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
		s1.async=true;
		s1.src='https://embed.tawk.to/57c57119e56cab650c797a59/default';
		s1.charset='UTF-8';
		s1.setAttribute('crossorigin','*');
		s0.parentNode.insertBefore(s1,s0);
		})();
	</script>
        
</head>

<body class="relative">

    <div class="loader">
        <div class="h-[100vh] w-full flex justify-center items-center">
            <div>
                <img width="280" class="mb-5" src="{{ asset('assets/img/rafusoft-logo.svg') }}"
                    alt="rafusoft-loader">
                
                    <div id="loader">
                        <span style="font-size: 18px;" id="text">Loading...</span>
                        <span style="font-size: 18px;" id="percent"></span>
                            <div id="bar" ></div>
                      </div>

            </div>
        </div>
    </div>


    @php
        $public_menu = Menu::getByName('main');
    @endphp




    <div id="app" class="hidden">
        <nav class="w-full bg-[#02020238] absolute top-0 z-50 md:block hidden">
            <div class="max-w-7xl mx-auto p-3 flex gap-10">
                <div class="flex gap-3 items-center">
                    <a href="https://www.facebook.com/rafusoft"><i
                            class="fa-brands scale-90 hover:text-orange-600 text-white fa-facebook-f"></i></a>
                    <a href="https://twitter.com/rafusoft"><i
                            class="fa-brands scale-90 hover:text-orange-600 text-white fa-x-twitter"></i></a>
                    <a href="https://www.instagram.com/rafusoft"><i
                            class="fa-brands scale-90 hover:text-orange-600 text-white fa-instagram"></i></a>
                    <a href="https://www.youtube.com/rafusoft"><i
                            class="fa-brands scale-90 hover:text-orange-600 text-white fa-youtube"></i></a>
                    <a href="https://www.linkedin.com/in/rafusoft/"><i
                            class="fa-brands scale-90 hover:text-orange-600 text-white fa-linkedin-in"></i></a>
                </div>
                <div class="flex gap-4 items-center text-sm">
                    <a class="text-white font hover:text-orange-600 flex items-center gap-2" href="#"><i
                            class="fa-solid text-orange-600  fa-envelope"></i>
                        info@rafusoft.com</a>
                    <p class="text-white font flex items-center gap-2 hover:text-orange-600"><img class="h-3"
                            src="{{ asset('assets/img/belgium.svg') }}" alt="Belgium Rafusoft"> +32498464176</p>
                    <p class="text-white font flex items-center gap-2 hover:text-orange-600"><img class="h-3"
                            src="{{ asset('assets/img/vietnam.svg') }}" alt="Vietnam Rafusift"> +84385402004</p>
                    <p class="text-white font flex items-center gap-2 hover:text-orange-600"><img class="h-3"
                            src="{{ asset('assets/img/portugal.svg') }}" alt="Portugal Rafusoft"> +351920330982</p>
                    <a class="text-white font flex items-center gap-2 hover:text-orange-600" target="_blank"
                        rel="noopener noreferrer" href="https://wa.me/+8801712552009"><img class="h-4"
                            src="{{ asset('assets/img/whatsapp2.png') }}" alt="whatsapp Rafusoft"> +8801712552009</a>
                    <p class="text-white font flex items-center gap-2 hover:text-orange-600"><img class="h-3"
                            src="{{ asset('assets/img/bangladesh.svg') }}" alt="bangladesh Rafusoft"> +8801744333888
                    </p>
                </div>
            </div>
        </nav>

        <nav class="absolute md:top-12 top-0 z-50 md:bg-transparent bg-[#171718]  w-full">
            <div class="max-w-7xl mx-auto flex justify-between items-center p-5">
                <a href="/"><img width="180px" src="{{ asset('assets/img/rafusoft-logo.svg') }}"
                        alt="Rafusoft-logo"></a>





                <div class="nav-wrap hidden md:block">
                    <div class="btn-menu">
                        <span></span>
                    </div>
                    <nav id="mainnav" class="mainnav">

                        @if ($public_menu)
                            <ul class="menu">
                                @foreach ($public_menu as $menu)
                                    <li class="parent">
                                        <a href="{{ $menu['link'] }}" class="link-item "
                                            title="">{{ $menu['label'] }}</a>

                                        @if (!empty($menu['child']))
                                            @include('ui.layout.child_menu', [
                                                'children' => $menu['child'],
                                            ])
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        @endif

                        </ul>
                    </nav>
                </div>
                <div>
                    <a href="/get-quote"
                        class="button  hidden md:block">Get Quote</a>
                    <button id="buttonnav" class="md:hidden"><i class="fa-solid text-white  fa-bars"></i></button>
                </div>
            </div>



            <section id="mobilenav" class="hidden">
                @if ($public_menu)
                    <ul>
                        @foreach ($public_menu as $menu)
                            <li class="py-4 border-t border-zinc-800">
                                <div class="flex justify-between items-center px-5">
                                    <a class="text-white" href="{{ $menu['link'] }}">{{ $menu['label'] }}</a>

                                    @if (!empty($menu['child']))
                                        <button class="text-white child-toggle">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    @endif

                                </div>

                                @if (!empty($menu['child']))
                                    @include('ui.layout.child_menu_mobile', [
                                        'children' => $menu['child'],
                                    ])
                                @endif
                            </li>
                        @endforeach
                    </ul>
                @endif
            </section>
        </nav>











        @yield('content')


        <div id="bottom-content" class="hidden">
            <div class="bg-[#F15A29] p-2 py-10  text-center">
                <h3 class="text-center text-4xl font-medium mt-16 text-white">Do you Have any Project?</h3>
                <p class="text-center text-white mt-3">We believe in client satisfaction and we deliver projects that
                    can
                    successfully meet or exceed the prospects of the stakeholders.</p>

                <div class="mt-8 text-center mb-16">
                    <a href='/contact'
                        class="px-5 py-2 border rounded  hover:text-[#F15A29] duration-700 hover:bg-white text-white text-center">Contact
                        Us</a>
                </div>
            </div>



            <footer>
                <div class="bg-[#1F1F1F] pt-10 pb-3 px-5">
                    <div class="text-center flex justify-center items-center gap-4">
                        <a class="bg-[#7e7a7a] hover:bg-[#F15A29] text-white hover:text-[#fffffe]  h-10 w-10 flex justify-center items-center rounded-full p-2"
                            href="https://www.facebook.com/rafusoft"><i class="fa-brands fa-facebook-f"></i></a>
                        <a class="bg-[#7e7a7a] hover:bg-[#F15A29] text-white hover:text-[#fffffe] h-10 w-10 flex justify-center items-center rounded-full p-2"
                            href="https://twitter.com/rafusoft"><i class="fa-brands fa-x-twitter"></i></a>
                        <a class="bg-[#7e7a7a] hover:bg-[#F15A29] text-white hover:text-[#fffffe] h-10 w-10 flex justify-center items-center rounded-full p-2"
                            href="https://www.instagram.com/rafusoft"><i class="fa-brands fa-instagram"></i></a>
                        <a class="bg-[#7e7a7a] hover:bg-[#F15A29] text-white hover:text-[#fffffe] h-10 w-10 flex justify-center items-center rounded-full p-2"
                            href="https://www.youtube.com/rafusoft"><i class="fa-brands fa-youtube"></i></a>
                        <a class="bg-[#7e7a7a] hover:bg-[#F15A29] text-white hover:text-[#fffffe] h-10 w-10 flex justify-center items-center rounded-full p-2"
                            href="https://www.linkedin.com/in/rafusoft/"><i class="fa-brands fa-linkedin-in"></i></a>
                    </div>

                    <div class='text-center my-4'>
                        <a href='/top-most-software-company-in-bangladesh'
                            class="text-center my-4 hover:text-[#F15A29] text-white">Top Most Software Company in
                            Bangladesh</a>
                    </div>
                    <div class="text-center  my-4">
                        <a href="/dir/software-company-in-bangladesh"
                            class="text-white hover:text-orange-600">সফটওয়্যার কোম্পানি বাংলাদেশ</a>
                    </div>

                    <div class='flex justify-center '>
                        <a href="https://g.page/r/CV46CyoD9xEVEB0/review">
                        </a>

                        <a target="_blank" rel="noopener noreferrer"
                            href="https://maps.app.goo.gl/o78NzK3CyHwFKx8dA">
                            <img width="180px" src="{{ asset('assets/img/stats/rafusoft-review.svg') }}"
                                alt="Rafusoft review" />
                        </a>
                    </div>

                    <div class="facebook-like-button text-center mb-2 flex justify-center mt-10">
                        <iframe
                            src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Frafusoft&width=174&layout=button_count&action=like&size=large&share=true&height=46&appId=951450788914496"
                            width="174" height="30" scrolling="no" frameBorder="0" allowFullScreen="true"
                            allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                    </div>

                    <div class='flex justify-center flex-wrap items-center text-sm gap-2 mt-5'>
                        <a href='/privacy-policy' class='text-[#F15A29] hover:text-white'>Privacy Policy</a>
                        <p class='text-white'>|</p>
                        <a href='/terms-and-conditions' class='text-[#F15A29] hover:text-white'>Terms & Conditions</a>
                        <p class='text-white'>|</p>
                        <a href='/refund-policy' class='text-[#F15A29] hover:text-white'>Refund Policy</a>
                        <p class='text-white'>|</p>
                        <p class='text-white hover:text-white'>© 2024 Rafusoft.com | Trade License: 525</p>
                        <p class='text-white'>|</p>
                        <a href='https://basis.org.bd/company-profile/18-12-992'
                            class='text-[#F15A29] hover:text-white'>Basis
                            License: G992</a>
                    </div>

                </div>
            </footer>
        </div>
    </div>




    <script>
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

    </script>




    <script>
        $(document).ready(function() {
            $("#buttonnav").click(function() {
                $("#mobilenav").toggle();
            });

            $(".child-toggle").click(function() {
                $(this).closest('li').find('.child-menu').toggle();
            });
            $(".sub-child-toggle").click(function() {
                $(this).closest('li').find('.sub-child-menu').toggle();
            });
        });
    </script>




    <script>
        // Hide loader spinner when the page is fully loaded
        window.addEventListener('load', function() {
            var loader = document.querySelector('.loader');
            var content = document.querySelector('#app');
            var bcontent = document.querySelector('#bottom-content');
            loader.style.display = 'none';
            content.classList.remove('hidden')
            bcontent.classList.remove('hidden')
        });
    </script>


    <style>
        .menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .menu li {
            position: relative;
            display: inline-block;
        }

        .menu a {
            display: block;
            padding: 10px 10px;
            text-decoration: none;
            color: #ffffff;

        }

        .sub-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            /* background-color: #fff; */
            /* background-color: #1a1a1b */
        }

        .submenu-item {
            background-color: #1a1a1b;
        }

        .sub-menu li {
            border-bottom: 1px solid rgba(0, 0, 0, 0.699);
        }

        .menu li:hover>.sub-menu {
            display: block;

        }

        .menu li:hover {
            background-color: #F15A29;
        }

        .sub-menu li {
            display: block;

        }

        .sub-menu a {
            padding: 10px 20px;
            width: 260px;
            color: #ffffff;
        }

        .sub-menu a:hover {
            color: white !importent;
        }


        .sub-menu .sub-menu {
            top: 0;
            left: 100%;
        }


        .link-item {
            color: white !importen;
            font-size: 16px;
        }

        .link-item:hover {
            background-color: #F15A29;
            color: white !importent;
        }
    </style>

    <script>
        $('.menu li').hover(
            function() {
                $(this).children('.sub-menu').stop(true, true).slideDown('fast');
            },
            function() {
                $(this).children('.sub-menu').stop(true, true).slideUp('fast');
            }
        );
    </script>


    <script src="{{ asset('assets/js/rain.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    @yield('footer-script')
</body>

</html>
