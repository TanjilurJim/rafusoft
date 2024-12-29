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

    @yield('meta')

    <?php
        $php_version = phpversion();
    ?>
    <meta name="php-version" content="<?php echo $php_version; ?>">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">


    <style>
        .btn-orange {
            background: #F15A29;
            color: rgb(255, 255, 255);
            font-size: 1.05em;
            border: none;
            transition: all 0.3s ease-out;
            padding: .5rem 1rem;
        }

        .btn-orange {
            box-shadow: inset 0 0 #F15A29;
            transition: all 0.3s ease-out;
        }

        .btn-orange:hover {
            box-shadow: inset 12em 0 #BB411A;
            cursor: pointer;
            color: rgb(255, 255, 255);
        }
    </style>


    @yield('meta')

    {{-- toster  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    <script src="https://unpkg.co/gsap@3/dist/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/zepto/1.2.0/zepto.min.js"></script>
    <script src="https://unpkg.com/gsap@3/dist/ScrollTrigger.min.js"></script>
    <script src="https://unpkg.com/gsap@3/dist/ScrollToPlugin.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="  crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/90623e284f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <style>
        body{
            font-family: "Poppins", sans-serif;
            font-style: normal;
            background-color: #f5f0f0;
        }

   



        .section-padding {
            padding: 80px 0;
        }



        /* .section-borders span.black-border {
            background: #333;
            width: 30px;
            margin: 0 6px;

        } */

        .client-testimonial-carousel .owl-dots button {
            height: 5px;
            background: #3980B8 !important;
            width: 20px;
            display: inline-block;
            margin: 5px;
            transition: .2s;
            border-radius: 2px;
        }

        .client-testimonial-carousel button.owl-dot.active {
            background: #000 !important;
            width: 30px;
        }

        .client-testimonial-carousel .owl-dots {
            text-align: center;
            margin-top: 25px
        }

        .single-testimonial-item {
            position: relative;
            box-shadow: 0 0 2px #dadfd3;
            margin: 2px;
            padding: 20px;
            padding-left: 85px;
        }

        .single-testimonial-item:before {
            font-family: "Font Awesome 5 Free";
            content: "\f10e";
            font-weight: 900;
            position: absolute;
            left: 20px;
            top: 50%;
            font-size: 20px;
            color: #3980B8;
            line-height: 30px;
            margin-top: -15px;
        }

        .single-testimonial-item:after {
            background: #ddd;
            content: "";
            height: 70%;
            left: 60px;
            position: absolute;
            top: 10%;
            width: 1px;
        }

        .single-testimonial-item h3 {
            /* font-size: 20px; */
            font-style: normal;
            margin-bottom: 0;
        }

        .single-testimonial-item h3 span {
            display: block;
            /* font-size: 12px; */
            font-weight: normal;
            margin-top: 5px;
        }



        /* swiper ------------------------------- */


        .swiper {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            /* font-size: 18px; */
            background: #fff;
         
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }




.divider
{
	position: relative;
	height: 1px;
}

.div-transparent:before
{
	content: "";
	position: absolute;
	top: 0;
	left: 5%;
	right: 5%;
	width: 90%;
	height: 1px;
	background-image: linear-gradient(to right, transparent, rgb(48,49,51), transparent);
}
    </style>
</head>

<body>
    @yield('product')
</body>





<script>
    gsap.set('.main', {
        // position: 'fixed',
        background: '#fff',
        width: '100%',
        maxWidth: '1200px',
        height: '100%',
        top: 0,
        left: '50%',
        x: '-50%'
    });
    gsap.set('.scrollDist', {
        width: '100%',
        height: '200%'
    })
    gsap.timeline({
            scrollTrigger: {
                trigger: '.scrollDist',
                start: 'top top',
                end: 'bottom bottom',
                scrub: 1
            }
        })
        .fromTo('.sky', {
            y: 0
        }, {
            y: -200
        }, 0)
        .fromTo('.cloud1', {
            y: 100
        }, {
            y: -800
        }, 0)
        .fromTo('.cloud2', {
            y: -150
        }, {
            y: -500
        }, 0)
        .fromTo('.cloud3', {
            y: -50
        }, {
            y: -650
        }, 0)
        .fromTo('.mountBg', {
            y: -10
        }, {
            y: -100
        }, 0)
        .fromTo('.mountMg', {
            y: -30
        }, {
            y: -250
        }, 0)
        .fromTo('.mountFg', {
            y: -50
        }, {
            y: -600
        }, 0)

    $('#arrowBtn').on('mouseenter', (e) => {
        gsap.to('.arrow', {
            y: 10,
            duration: 0.8,
            ease: 'back.inOut(3)',
            overwrite: 'auto'
        });
    });
    $('#arrowBtn').on('mouseleave', (e) => {
        gsap.to('.arrow', {
            y: 0,
            duration: 0.5,
            ease: 'power3.out',
            overwrite: 'auto'
        });
    });
    $('#arrowBtn').on('click', (e) => {
        gsap.to(window, {
            scrollTo: innerHeight,
            duration: 1.5,
            ease: 'power1.inOut'
        });
    });
</script>


<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 1,
      spaceBetween: 30,
      freeMode: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      breakpoints: {
        // When window width is >= 768px (desktop)
        768: {
          slidesPerView: 2,
          spaceBetween: 30,
        },
      },
    });
  </script>


@if (session('success'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                console.log("success")
                toastr.success('<?php echo session('success'); ?>');
            });
        </script>
    @endif


</html>
