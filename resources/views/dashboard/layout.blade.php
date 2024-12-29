<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | Rafusoft</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" rel="stylesheet" />


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">


    {{-- -------- editor -------- --}}
    <link rel="stylesheet" href="{{ asset('editor/summernote/summernote-bs4.css') }}">

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

        #sidebar-overlay{
            display: none !important;
        }
    </style>


    @yield('meta')


    <link rel="shortcut icon" href="{{ asset('assets/img/dashboard/favicon.ico') }}" type="image/x-icon">

    {{-- toster  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    {{-- cropper  --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.css"
        integrity="sha512-087vysR/jM0N5cp13Vlp+ZF9wx6tKbvJLwPO8Iit6J7R+n7uIMMjg37dEgexOshDmDITHYY5useeSmfD1MYiQA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.js"
        integrity="sha512-lR8d1BXfYQuiqoM/LeGFVtxFyspzWFTZNyYIiE5O2CcAGtTCRRUMLloxATRuLz8EmR2fYqdXYlrGh+D6TVGp3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="{{asset('css/tailwind.js')}}"></script>
    <script src="{{asset('css/all.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/all.css')}}">

    {{-- <script src="https://unpkg.com/tinymce@5.3.0/tinymce.min.js"></script> --}}


    {{-- jquery  --}}
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/css/intlTelInput.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/libphonenumber-js/1.9.44/libphonenumber-js.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/intlTelInput-jquery.min.js"></script>


    <style>
        .iti--separate-dial-code{
            width: 100%;
        }


        
    </style>

</head>

<body class="hold-transition sidebar-mini layout-fixed">


    <?php
    date_default_timezone_set('Asia/Dhaka');
    $time = date('g:i A');

    $date = date('l, F j,  Y');
    ?>



<div class=" flex flex-col justify-center items-center bg-transparent h-[100vh] w-full fixed top-0 left-0 z-50" id="loader">
    <div class="bg-white   px-5 py-3" style="box-shadow: rgba(0, 0, 0, 0.636) 0px 5px 15px;">
        <p class="mb-2 text-center">Processing...</p>
        <img class="" src="{{ asset('assets/img/loading_bar.gif') }}" alt="AdminLTELogo">
    </div>
</div>


    <div class="wrapper">

        <aside class="main-sidebar sidebar-dark-primary elevation-4 z-50">
            <a href="/dashboard" class="brand-link">
                <img src="{{ asset('assets/img/rafusoft-logo.svg') }}" alt="AdminLTE Logo" 
                    style="opacity: .8">
            </a>

            @include('dashboard.common.sidebar')
            <div class="px-4 ">
                <p class="text-white text-[22px] font-medium">{{$time}}</p>
                <p class="text-white">{{$date}}</p>
            </div>
        </aside>

        <nav class="main-header navbar navbar-expand navbar-white navbar-ligh z-0">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/dashboard" class="nav-link"><i class="fa-solid fa-house"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/clear-route-cache" role="button">
                        <i class="fa-solid fa-hard-drive"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fa-solid fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                    <a href="/profile" class="dropdown-item">
                    <i class="fas fa-user mr-2"></i> Profile
                    </a>
                    <div class="dropdown-divider"></div>

                    <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item">
                        <i class="fa-solid fa-right-from-bracket mr-2"></i> Logout
                    </button>
                    </form>
                    </li>
            </ul>
        </nav>
        <div class="content-wrapper">
            <section class="content z-10">
                @yield('content')
            </section>
        </div>
        <aside class="control-sidebar control-sidebar-dark">
            
        </aside>
    </div>
    <script src="{{ asset('editor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('editor/select2/js/select2.full.min.js') }}"></script>


    <script>
        tinymce.init({
            content_css: [
                "{{ asset('editor/fontawesome-free/css/all.min.css') }}",
                'https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css',
                "{{ asset('editor/editor.css') }}",
                "{{ asset('editor/font.css') }}",
                'https://fonts.googleapis.com/css?family=Roboto|Lobster|Montserrat|Poppins'
            ],
            selector: ".tinymce",
            height: 400,
            relative_urls: false,
            remove_script_host: false,
            plugins: [
                "fullscreen advlist autolink link image lists charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking bootstrap4grid",
                "emoticons faicons table  directionality emoticons paste   code template"
            ],
            toolbar1: "emoticons | fullscreen | undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
            toolbar2: "link unlink anchor | image media | forecolor backcolor  | print preview code bootstrap4grid",
            toolbar3: " faicons template table tabledelete | tableprops tablerowprops tablecellprops | tableinsertrowbefore tableinsertrowafter tabledeleterow | tableinsertcolbefore tableinsertcolafter tabledeletecol customButton",
            faicons_default_color: 'c74848',
            faicons_default_size: 'fa-7x',
            image_advtab: true,
            external_plugins: {
                'bootstrap4grid': "{{ asset('editor/bootstrap4grid/plugin.min.js') }}",
            },
            setup(editor) {
                editor.ui.registry.addButton('customButton', {
                    text: 'Button', // Button text
                    onAction: function(_) {
                        // Your custom action when the button is clicked
                        // alert('Custom button clicked!');
                        let html = `<a class="button" href="#">Button</a>`;
                        editor.insertContent(html);
                    }
                });
            },
            font_formats: "Poppins=poppins,sans-serif;Arial=arial,helvetica,sans-serif;Courier New=courier new,courier,monospace;Roboto=roboto,sans-serif;Lobster=lobster,cursive;Montserrat=montserrat,sans-serif;HindiSiliGuriRegular=hindisiliguriregular,serif;Nilima=nilima;Bensen=bensen;NotoSansBangali=notosansbangali;BanglaKolom=banglakolom;LalSabuj=lalsabuj;Siyamrupali=siyamrupali;Kalpurush=kalpurush;"
        });
    </script>


    <script>
        window.addEventListener('load', function() {
            var preloader = document.getElementById('loader');
            preloader.style.display = 'none';
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
    @if (session('error'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                console.log("success")
                toastr.error('<?php echo session('error'); ?>');
            });
        </script>
    @endif


    {{-- editor  --}}
    <script src="{{ asset('editor/select2/js/select2.full.min.js') }}"></script>

    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/sparklines/sparkline.js') }}"></script>
    <script src="{{ asset('assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('assets/dist/js/adminlte.js') }}"></script>
    <script src="{{ asset('assets/dist/js/pages/dashboard.js') }}"></script>
</body>

</html>
