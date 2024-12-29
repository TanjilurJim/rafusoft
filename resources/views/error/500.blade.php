<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page not Found</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body style="height: 100vh; display: flex; align-items: center">
    <div class="md:flex justify-between max-w-6xl mx-auto p-5" >
        <div>
            <Link href='/'><img  src='{{asset('assets/img/rafusoft-logo.svg')}}' class="w-[215px]" alt='rafusoft logo'></img></Link>
            <h1 style="font-size: 60px; font-weight: 800;">OOPS!</h1>
            <h4 style="font-size: 30px; font-weight: 800;">Internal Server Error</h4>
    
            <p style="font-size: 20px; font-weight: 500; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;" className='text-[#9598B4] mt-5 text-xl text-[22px]'>The page you&apos;re seeking may be unavailable. Ask Rafusoft for the active link you need.</p>
            <h4 style="font-size: 20px; font-weight: 700; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; margin-top: 50px;" className='my-10 text-2xl'>Explore - <a href='/' style="font-size: 20px; font-weight: 500; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; color: orangered;" >Rafusoft</a></h4>
        </div>
        <img  src='{{asset('assets/img/error/500.png')}}' alt='rafusoft 404 image'  class="w-[600px]" ></img>
    </div>
</body>
</html>