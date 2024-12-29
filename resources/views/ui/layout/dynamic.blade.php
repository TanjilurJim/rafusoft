<!DOCTYPE html>
<html lang="en-us">

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
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('editor/fontawesome-free/css/all.min.css') }}">


    <script src="https://kit.fontawesome.com/90623e284f.js" crossorigin="anonymous"></script>


    @yield('meta')

    {{-- font  --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    {{-- font  --}}

    <script src="https://rafusoft.com/fontawesome/js/all.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('editor/font.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Lobster|Montserrat|Poppins">
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/57c57119e56cab650c797a59/default';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>



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

        body {
            font-family: "Poppins", sans-serif;
            font-weight: 400;
            font-style: normal;
        }

        #buttonnav {
            display: none;
        }


        @media only screen and (max-width: 600px) {
            .quote-button {
                display: none;
            }

            #buttonnav {
                display: block;
                background-color: white;
            }
        }



        .nav {
            display: block !important;
            list-style: none !important;
        }



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

</head>

<body class="relative">

    <div class="loader">
        <div class="loader-wrapper">
            <div>
                <img width="280" class="" src="{{ asset('assets/img/rafusoft-logo.svg') }}"
                    alt="Rpafusoft logo">

                <div id="loader">
                    <span style="font-size: 18px;" id="text">Loading...</span>
                    <span style="font-size: 18px;" id="percent"></span>
                    <div id="bar"></div>
                </div>
            </div>
        </div>
    </div>


    @php
        $public_menu = Menu::getByName('main');
        
    $menus = "";
    
  
    @endphp




    <div id="app" class="hide">

        <!-- title bar -->

        
        <nav class="title-bar">
            <div class="title-bar-wrapper container">
                <div class="title-bar-socials">
                    <p> <a href="https://www.facebook.com/rafusoft"><i
                                class="fa-brands title-bar-social-icon fa-facebook-f"></i></a> </p>
                    <p> <a href="https://twitter.com/rafusoft"><i
                                class="fa-brands title-bar-social-icon fa-x-twitter"></i></a></p>
                    <p> <a href="https://www.instagram.com/rafusoft"><i
                                class="fa-brands title-bar-social-icon fa-instagram"></i></a></p>
                    <p> <a href="https://www.youtube.com/rafusoft"><i
                                class="fa-brands title-bar-social-icon fa-youtube"></i></a></p>
                    <p> <a href="https://www.linkedin.com/in/rafusoft/"><i
                                class="fa-brands title-bar-social-icon fa-linkedin-in"></i></a></p>
                </div>
                <div class="title-bar-info">
                    <p><a class="title-bar-contact-info text-white" href="#"><i
                                lass="fa-solid mail fa-envelope"></i> info@rafusoft.com</a></p>
                    <p class="title-bar-contact-info"><img src="{{ asset('assets/img/belgium.svg') }}"
                            alt="Belgium Rafusoft"> +32498464176</p>
                    <p class="title-bar-contact-info"><img src="{{ asset('assets/img/vietnam.svg') }}"
                            alt="Vietnam Rafusift"> +84385402004</p>
                    <p class="title-bar-contact-info"><img src="{{ asset('assets/img/portugal.svg') }}"
                            alt="Portugal Rafusoft"> +351920330982</p>
                    <p class="title-bar-contact-info"><img src="{{ asset('assets/img/whatsapp.svg') }}"
                            alt="whatsapp Rafusoft"> +8801712552009</p>
                    <p class="title-bar-contact-info"><img src="{{ asset('assets/img/bangladesh.svg') }}"
                            alt="bangladesh Rafusoft"> +8801744333888
                    </p>
                </div>
            </div>
        </nav>
        <!-- navbar -->
        <nav class="nav">
            <div class="nav-container container">
                <a href="/" class="nav-logo"><img width="180px"
                        src="{{ asset('assets/img/rafusoft-logo.svg') }}" alt="Rafusoft-logo"></a>
                <div class="nav-wrap">
                    <div class="btn-menu">
                        <span></span>
                    </div>
                    <nav id="mainnav" class="mainnav nav-links">

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
                    <a href="/get-quote" class="btn btn-orange quote-button" style="color: #ffff;">Get Quote</a>
                    <button id="buttonnav" class="btn"><i class="fa-solid   fa-bars"></i></button>
                </div>
            </div>

            <section id="mobilenav" class="hide w-full">
                @if ($public_menu)
                    <ul class="w-full" style="list-style: none; padding: 0;">
                        @foreach ($public_menu as $menu)
                            <li
                                style="padding: 1rem  1.25rem; background-color: #0c0c0f; width: 100% !important; color: white;">
                                <div style="display: flex; justify-content: space-between; align-items: center;">
                                    <a class="text-white" href="{{ $menu['link'] }}">{{ $menu['label'] }}</a>

                                    @if (!empty($menu['child']))
                                        <button class="child-toggle btn text-white">
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
        
            <!-- footer -->
            <footer>
                <div class=" footer-wrapper">
                    <div class=" footer-socials">
                        <a class="" href="https://www.facebook.com/rafusoft"><i
                                class="fa-brands fa-facebook-f"></i></a>
                        <a class="" href="https://twitter.com/rafusoft"><i
                                class="fa-brands fa-x-twitter"></i></a>
                        <a class="" href="https://www.instagram.com/rafusoft"><i
                                class="fa-brands fa-instagram"></i></a>
                        <a class="" href="https://www.youtube.com/rafusoft"><i
                                class="fa-brands fa-youtube"></i></a>
                        <a class="" href="https://www.linkedin.com/in/rafusoft/"><i
                                class="fa-brands fa-linkedin-in"></i></a>
                    </div>

                    <div class='footer-info-one'>
                        <a href='/top-most-software-company-in-bangladesh' class="text-white">Top Most Software
                            Company in Bangladesh</a>
                    </div>
                    <div class="footer-info-two">
                        <a href="/dir/software-company-in-bangladesh" class="text-white">সফটওয়্যার কোম্পানি
                            বাংলাদেশ</a>
                    </div>

                    <div class='footer-review'>
                        <a href="https://g.page/r/CV46CyoD9xEVEB0/review">
                        </a>

                        <a target="_blank" rel="noopener noreferrer"
                            href="https://maps.app.goo.gl/o78NzK3CyHwFKx8dA">
                            <img width="180px" src="{{ asset('assets/img/stats/rafusoft-review.svg') }}"
                                alt="Rafusoft review" />
                        </a>
                    </div>

                    <div class="facebook-like-button footer-fb-like">
                        <iframe
                            src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Frafusoft&width=174&layout=button_count&action=like&size=large&share=true&height=46&appId=951450788914496"
                            width="174" height="30" scrolling="no" frameBorder="0" allowFullScreen="true"
                            allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                    </div>

                    <div class='footer-copyright'>
                        <p><a href='/privacy-policy' class=''>Privacy Policy</a></p>
                        <p class=''>|</p>
                        <p> <a href='/terms-and-conditions' class=''>Terms & Conditions</a></p>
                        <p class=''>|</p>
                        <p> <a href='/refund-policy' class=''>Refund Policy</a></p>
                        <p class=''>|</p>
                        <p class=''>© 2024 Rafusoft.com | Trade License: 525</p>
                        <p class=''>|</p>
                        <p><a href='https://basis.org.bd/company-profile/18-12-992' class=''>Basis License:
                                G992</a></p>
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
            content.classList.remove('hide')
            bcontent.classList.remove('hide')
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
            background-color: #000000;
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
</body>

</html>
