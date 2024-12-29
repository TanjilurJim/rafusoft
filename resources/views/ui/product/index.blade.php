@extends('ui.product.layout')

@section('meta')
    <meta name="description" content="{{ $product->meta_description }}">
    <meta name="keywords" content="{{ $product->meta_keywords }}" />
    <meta name="author" content="Developed by (www.rafusoft.com)">
    <title>{{ $product->title }}</title>
    <link rel="canonical" href="{{ URL::current() }}" />
    <link rel="shortcut icon" href="{{ $product->favicon }}" type="img/x-icon">
    <meta property="og:title" content="{{ $product->title }}">
    <meta property="og:site_name" content="Rafusoft">
    <meta property="og:url" content="{{ URL::current() }}">
    <meta property="og:description" content="{{ $product->meta_description }}">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ $product->og_image }}">

    <link rel="stylesheet" href="{{ asset('assets/css/faq.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/ref.css') }}">

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@rafusoft" />
    <meta name="twitter:title" content="{{ $product->title }}" />
    <meta name="twitter:description" content="{{ $product->meta_description }}" />
    <meta name="twitter:image" content="{{ $product->og_image }}" />
    <script type="application/ld+json">
        {
          "@context": "https://schema.org/",
          "@type": "Product",
          "name": "{{$product->title}}",
          "image": "{{$product->schema_image}}",
          "description": "{{$product->meta_description}}",
          "sku": "{{$product->id}}"
        }
    </script>


    <style>
        @keyframes bounce {

            0%,
            100% {
                transform: translateY(-25%);
                animation-timing-function: cubic-bezier(0.8, 0, 1, 1);
            }

            50% {
                transform: none;
                animation-timing-function: cubic-bezier(0, 0, 0.2, 1);
            }
        }

        .animate-bounce-cus {
            animation: bounce 2s infinite;
        }
    </style>
@endsection

@section('product')




    <section>
        <div class="scrollDist absolute"></div>
        <div class="main absolute">
            <svg viewBox="0 0 1200 700" xmlns="http://www.w3.org/2000/svg">
                <mask id="m">
                    <g class="cloud1">
                        <rect fill="#fff" width="100%" height="801" y="799" />
                        <image alt="Cloud mask" xlink:href="https://assets.codepen.io/721952/cloud1Mask.jpg" width="1200"
                            height="800" />
                    </g>
                </mask>

                <image class="sky" xlink:href="https://assets.codepen.io/721952/sky.jpg" width="1200" alt="skay"
                    height="590" />
                <image alt="mount-bg class="mountBg" xlink:href="https://assets.codepen.io/721952/mountBg.png"
                    width="1200" height="800" />
                <image alt="mount bg" class="mountMg" xlink:href="https://assets.codepen.io/721952/mountMg.png"
                    width="1200" height="800" />
                <image alt="aloud" class="cloud2" xlink:href="https://assets.codepen.io/721952/cloud2.png" width="1200"
                    height="800" />
                <image alt="mount fg" class="mountFg" xlink:href="https://assets.codepen.io/721952/mountFg.png"
                    width="1200" height="800" />
                <image alt="cloud" class="cloud1" xlink:href="https://assets.codepen.io/721952/cloud1.png" width="1200"
                    height="800" />
                <image alt="cloud" class="cloud3" xlink:href="https://assets.codepen.io/721952/cloud3.png" width="1200"
                    height="800" />
                {{-- <text fill="#fff" class="title" x="350" y="200">EXPLORE</text> --}}
                <polyline class="arrow animate-bounce" fill="#fff"
                    points="599,250 599,289 590,279 590,282 600,292 610,282 610,279 601,289 601,250" />


                <g mask="url(#m)">
                    <rect fill="#fff" width="100%" height="100%" />
                    {{-- <text x="350" y="200" class="title" fill="#162a43">FURTHER</text> --}}

                    <div class="pt-10 pb-20 bg-white">
                        <h1 class="text-4xl text-center font-bold">{{ $product->banner_h_one }}</h1>
                        <h2 class="text-3xl text-center mt-5">{{ $product->banner_h_two }}</h2>
                    </div>

                    <div class="grid md:grid-cols-2 px-5 bg-white py-10">
                        <div>
                            <h3 class="text-4xl font-bold">{{ $product->product_title }}</h3>
                            <p class="mt-5 mb-10">{{ $product->product_description }}</p>


                            <a href="{{ $product->shop_now }}" class="px-6 py-3 btn-orange rounded-3xl mt-5">Shop Now</a>
                        </div>
                        <div class="flex justify-end items-center">
                            <img src="{{ $product->product_image }}" alt="{{ $product->product_image }}">
                        </div>
                    </div>


                    <div class="wrapper">
                        <div class="divider div-transparent"></div>
                    </div>
                    <div class=" py-3 md:px-10 px-5 bg-white">
                        <h2 class="text-center text-4xl font-bold">Product Features</h2>
                        <p class="text-center  md:w-1/2 mx-auto">{{ $product->features_paragraph }}</p>

                        @php
                            $features = explode('//', $product->features_list);
                        @endphp

                        <section class="mt-10 md:flex justify-between items-center">
                            <div>
                                @foreach ($features as $item)
                                    <p class="my-3"><i class="fa-regular fa-hand-point-right"></i> {{ $item }}
                                    </p>
                                @endforeach


                                <div class="mt-10">
                                    <a href="{{ $product->shop_now }}" class="px-6 py-3 btn-orange rounded-3xl mt-5">Shop
                                        Now</a>
                                </div>
                            </div>
                            <img src="{{ $product->features_image }}" alt="{{ $product->features_image }}">
                        </section>
                    </div>


                    <div class="wrapper">
                        <div class="divider div-transparent"></div>
                    </div>



                    <section class="bg-white px-5 py-10">
                        {!! $product->content !!}
                    </section>

                    <div class="wrapper">
                        <div class="divider div-transparent"></div>
                    </div>



                    @if (count($faq) > 0)
                        <div class="py-10 bg-white md:px-10 px-5">
                            <h3 class="text-center text-4xl font-bold">Frequently asked questions</h3>


                            <div class="accordion mt-16">
                                @foreach ($faq as $item)
                                    <div class="flex justify-between gap-4 items-center">
                                        <div class="accordion-item border w-full">
                                            <div class="accordion-item-header">
                                                <span class="accordion-item-header-title">{{ $item->question }}</span>
                                                <i
                                                    class="fa-solid fa-chevron-down lucide lucide-chevron-down accordion-item-header-icon"></i>
                                            </div>
                                            <div class="accordion-item-description-wrapper">
                                                <div class="accordion-item-description">
                                                    <hr>
                                                    <p>{{ $item->ans }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    @endif

                    <div class="py-4 bg-white md:px-10 px-5">
                        <h3 class="text-center text-4xl font-bold">Our Customer Reviews</h3>
                        <p class="text-center mt-5 md:w-1/2 mx-auto">Sed venenatis pellentesque erat in faucibus. Nunc
                            laoreet leo eu nulla molestie lacinia. Curabitur sed sodales elit. Sed eget dignissim arcu</p>



                        @if (count($review) == 0)
                            <h4 class="text-center mb-5 mt-10 text-xl font-semibold text-slate-400">No Reviews Found</h4>
                        @else
                            <div class="swiper mySwiper section-padding">
                                <div class="swiper-wrapper owl-carousel client-testimonial-carousel">

                                    @foreach ($review as $item)
                                        <div class="swiper-slide single-testimonial-item">
                                            <p class="text-[15px]">{{ $item->description }}</p>
                                            <p class="mt-5">{{ $item->name }}</p>
                                            <p>{{ $item->date }}</p>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        @endif
                    </div>


                    <div class="wrapper">
                        <div class="divider div-transparent"></div>
                    </div>


                    <div class="flex justify-between items-end bg-white py-5 px-5 gap-10">
                        <div class="w-1/2">
                            <div>
                                <p>SKU: #{{ $product->id }}</p>
                                <p class="text-xl mt-3">Regular Price: <del class="text-red-500">1000</del> TK</p>
                                <p class="text-2xl mt-1">Offer Price: 850 TK</p>
                                <p class="text-2xl mt-1">Status: <span class="text-green-500">In Stock</span></p>
                                <p class="text-xl mt-1">Brand Name: <span class="text-green-500">SATA</span></p>
                                <div class="flex justify-start gap-3 my-3">
                                    <button class="btn rounded-sm btn-orange"><i class="fa-solid fa-phone"></i> Call
                                        Now</button>
                                    <button class="btn rounded-sm btn-success"><i class="fa-solid fa-bag-shopping"></i>
                                        Buy Now</button>
                                </div>
                                <div
                                    class="mt-3 bg-red-100 rounded p-2  border-dashed border-[1px] border-red-500 text-sm">
                                    <i class="fa-solid fa-circle-exclamation text-orange-700"></i>   </span> Actual product color and
                                    design may vary slightly from images due to monitor settings and lighting conditions.
                                </div>
                            </div>
                        </div>
                        <div class="w-1/2">
                            <h5 class="text-center">Enquire Now</h5>
                            <form action="/product/emquire/{{$product->slug}}/{{$product->id}}" method="POST">
                                @csrf
                                <div class="from-group mt-2">
                                    <label for="Name">Enter Your Name</label>
                                    <input type="text" name="name" class="form-control" required>
                                    @error('name')
                                        <p class="text-red-500 my-2">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="from-group mt-2">
                                    <label for="Name">Enter Your Email</label>
                                    <input type="email" name="email" class="form-control" required>
                                    @error('email')
                                        <p class="text-red-500 my-2">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="from-group mt-2">
                                    <label for="Name">Phone Number</label>
                                    <input type="text" name="phone" class="form-control" required>
                                    @error('phone')
                                        <p class="text-red-500 my-2">{{$message}}</p>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-orange mt-3">Send</button>
                            </form>
                        </div>
                    </div>

                </g>
                <footer>



                    <div class="bg-[#1F1F1F] py-10 pb-3 px-5">

                        <section class="grid md:grid-cols-3 grid-cols-1 gap-5">
                            <div>
                                <h5 class="text-white">Information</h5>
                                <p class="text-white mt-3">{{ $setting->name }}</p>
                                <p class="text-white">{{ $setting->address }}</p>
                                <p class="text-white">{{ $setting->full_address }}</p>
                                <p class="text-white">Phone: {{ $setting->phone }}</p>
                                <p class="text-white">Email: {{ $setting->email }}</p>
                            </div>

                            <div>
                                <h5 class="text-white">Importent Links</h5>
                                <a href='/product/privacy-policy/{{ $product->id }}'
                                    class='text-[#F15A29] hover:text-white block mt-3'>Privacy Policy</a>
                                <a href='/product/terms-and-condition/{{ $product->id }}'
                                    class='text-[#F15A29] hover:text-white block'>Terms & Conditions</a>
                                <a href='/product/refund-policy/{{ $product->id }}'
                                    class='text-[#F15A29] hover:text-white block'>Refund Policy</a>
                                <a href="{{ $setting->facebook }}" target="_blank"
                                    class="btn bg-primary text-white mt-3"><i class="fa-brands fa-facebook-f"></i>
                                    Facebook</a>
                            </div>


                            <div>
                                <h5 class="text-white">Map</h5>
                                <iframe src="{{ $setting->map }}" class="w-full h-40 rounded mt-4" style="border:0;"
                                    allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </section>


                        <hr class="bg-white my-6">
                        <p class="text-white text-center">© 2024 Powered by <strong
                                class="text-orange-600">Rafusoft</strong></p>
                    </div>
                </footer>
            </svg>



        </div>


        <style>
            a {
                color: orangered;
            }
        </style>

        <script>
            document.querySelectorAll(".accordion-item").forEach((item) => {
                item.querySelector(".accordion-item-header").addEventListener("click", () => {
                    item.classList.toggle("open");
                });
            });
        </script>
    </section>
@endsection
