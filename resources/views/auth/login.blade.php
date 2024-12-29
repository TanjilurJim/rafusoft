<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="FGhZLWSEbtFLL0Hj9Agh9BILgUO1I6VGsufL8JTN">
  <title>Browse software deals for your business | Rafusoft</title>
  <!-- Links -->
  <link rel="shortcut icon" href="https://rafusoft.com/assets/img/favicon.png" type="image/x-icon">

  <!-- Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.1/css/bootstrap.min.css" integrity="sha512-siwe/oXMhSjGCwLn+scraPOWrJxHlUgMBMZXdPe2Tnk3I0x3ESCoLz7WZ5NTH6SZrywMY+PB1cjyqJ5jAluCOg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.1/font/bootstrap-icons.min.css" integrity="sha512-5PV92qsds/16vyYIJo3T/As4m2d8b6oWYfoqV+vtizRB6KhF1F9kYzWzQmsO6T3z3QG2Xdhrx7FQ+5R1LiQdUA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://challenges.cloudflare.com/turnstile/v0/api.js" defer></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

<link rel="preload" as="style" href="https://rafusoft.com/build/assets/app-DnT6VWyq.css" /><link rel="modulepreload" href="https://rafusoft.com/build/assets/app-BtUpmekk.js" /><link rel="stylesheet" href="https://rafusoft.com/build/assets/app-DnT6VWyq.css" /><script type="module" src="https://rafusoft.com/build/assets/app-BtUpmekk.js"></script> </head>

  <!-- Meta informations -->
  <meta name="robots" content="index,follow" />
  <meta name="description"
    content="Top deals for Invoice Software, SEO Marketing tool, and content tools for your business with no monthly fees.">
  <meta name="keywords" content="Invoice Software, SEO Marketing tool, content tools" />
  <meta name="author" content="Developed by rafusoft.com">
  <link rel="canonical" href="https://rafusoft.com/login" />

  <!-- Open graph informations -->
  <meta property="og:title" content="Browse software deals for your business | Rafusoft">
  <meta property="og:site_name" content="Rafusoft">
  <meta property="og:url" content="https://rafusoft.com/login">
  <meta property="og:description"
    content="Top deals for Invoice Software, SEO Marketing tool, and content tools for your business with no monthly fees">
  <meta property="og:type" content="website">
  <meta property="og:image" content="https://rafusoft.com/assets/img/favicon.png">
  <meta property="og:image:alt" content="Rafusoft" />
  <link rel="canonical" href="https://rafusoft.com/login" />

  <!-- Twitter card informations -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:site" content="@rafusoft">
  <meta name="twitter:title" content="Browse software deals for your business | Rafusoft">
  <meta name="twitter:creator" content="@rafusoft" />
  <meta name="twitter:description"
    content="Top deals for Invoice Software, SEO Marketing tool, and content tools for your business with no monthly fees">
  <meta name="twitter:image" content="https://rafusoft.com/assets/img/favicon.png">

  <!--  JSON-LD informaions -->
  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "Rafusoft",
      "image": "https://rafusoft.com/schema_image/rafusoft-software-company-in-bangladesh.jpg",
      "url": "https://rafusoft.com/login",
      "logo": "https://rafusoft.com/assets/img/favicon.png",
      "sameAs": ["https://www.facebook.com/rafusoft/"]
    }
  </script>

  <!-- Captcha -->
  <!-- <script src="https://www.google.com/recaptcha/api.js" async defer></script> -->
</head>

<body class="font-sans text-gray-900 antialiased">
  <section class="flex flex-col md:flex-row h-screen items-center">
    <!-- image -->
    <div class="bg-blue-600 hidden lg:block w-full md:w-1/2 xl:w-2/3 h-screen">
      <img src="{{asset('assets/img/illustration.png')}}" alt="" class="w-full h-full object-cover">
    </div>
    <!-- login contents -->
    <div class="bg-white w-full md:max-w-md lg:max-w-full md:mx-auto md:mx-0 md:w-1/2 xl:w-1/3 h-screen px-6 lg:px-16 xl:px-12
          flex items-center justify-center">
      <div class="w-full h-100">

        <h1 class="text-xl md:text-2xl font-bold leading-tight mt-12">Log in to your account</h1>

        <!-- login form -->
        <form class="mt-6" action="#" method="POST">
            @csrf
          <!-- Email -->
          <div>
            <label for="email" class="block text-gray-700">Email Address</label>
            <input type="email" name="email" id="email" placeholder="Enter Email Address"
              class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-[#f15a29] focus:bg-white focus:outline-none"
              autofocus autocomplete required>
              
              @error('email')
                <div class="error text-red-500">{{ $message }}</div>
            @enderror
          </div>
          <!-- Password -->
          <div class="mt-4">
            <label for="password" class="block text-gray-700">Password</label>
            <input type="password" name="password" id="password" placeholder="Enter Password" minlength="8" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-[#f15a29]
                  focus:bg-white focus:outline-none" required>
             @error('password')
                <div class="error text-red-500">{{ $message }}</div>
            @enderror
          </div>


          <!-- captcha  -->

          <div class="mt-4">
            <div class="cf-turnstile" data-sitekey="{{ env('CAPTCHA_SITE_KEY') }}" data-callback="onTurnstileSuccess"></div>
            <input type="hidden" name="captcha" id="captcha">
             @error('captcha')
                <div class="error text-red-500">{{ $message }}</div>
            @enderror
        </div>


          <!-- Forgot password -->
          <div class="text-right mt-2">
            <a href="/forgot-password"
              class="text-sm font-semibold text-gray-700 hover:text-[#f15a29] focus:text-[#bb411a] underline">Forgot
              your
              Password?</a>
          </div>
          <!-- Remember me -->
          <div class="relative flex gap-x-3 mt-2">
            <div class="flex h-6 items-center">
              <input id="rememberMe" name="rememberMe" type="checkbox"
                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600 rounded-lg">
            </div>
            <div class="text-sm leading-6">
              <label for="rememberMe" class="font-medium text-gray-900">Remember me</label>
            </div>
          </div>
          <button type="submit"
            class="w-full block bg-[#f15a29] hover:bg-[#bb411a] focus:bg-[#bb411a] text-white font-semibold rounded-lg px-4 py-3 mt-6">
            Log In
          </button>
        </form>

        <!-- Create account link -->
        <p class="mt-8">Need an account?
          <a href="/register" class="text-[#f15a29] hover:text-[#bb411a] font-semibold">Create an
            account</a>
        </p>

        <!-- Copyright -->
        <p class="text-sm text-gray-500 mt-12">&copy; 2024 Rafusoft - All Rights Reserved.</p>
      </div>
    </div>
  </section>

  <script>
    function onTurnstileSuccess(token) {
        console.log('CAPTCHA Token:', token);
        document.getElementById('captcha').value = token;
    }
</script>

</body>
</html>