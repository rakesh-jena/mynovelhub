<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    
    <title>@yield('title','MyNovelHub | Free Chinese, Korean & Japanese WebNovels')</title>
    <meta name="keywords" content="@yield('meta_keywords','some default keywords')">
    <meta name="description" content="@yield('meta_description','default description')">
    <link rel="canonical" href="{{url()->current()}}"/>
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('images/favicon.ico') }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" id="odrin_fonts-css" href="https://fonts.googleapis.com/css?family=Mulish:200,300,regular,500,600,700,800,900,200italic,300italic,italic,500italic,600italic,700italic,800italic,900italic%7CCinzel+Decorative:regular,700,900%7CGentium+Basic:regular,italic,700,700italic&amp;subset=cyrillic,cyrillic-ext" type="text/css" media="all">
    <!-- Styles -->

    <link rel="stylesheet" href="{{ URL::asset('mdi/css/materialdesignicons.min.css') }}">
    
    <link href="{{ URL::asset('css/admin.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/web.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/owl.theme.default.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>
    
    <script data-ad-client="ca-pub-6766914808334879" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-9RJ4FHE7C5"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-9RJ4FHE7C5');
    </script>
    
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-T2LS7PK');</script>
    <!-- End Google Tag Manager -->

</head>

<body class="webpage">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T2LS7PK"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div class="webpage-container">
        <!-- Web Header -->
        @include('webpage.header')

        <div class="">

            <!-- Web Content Area -->
            <main class="main">
                <div class="main-wrapper">
                    @yield('content')
                </div>
            </main>
        </div>

        @include('webpage.footer')
    </div>
    <a href="#" class="scroll-top"><i class="mdi mdi-arrow-up-bold-circle"></i></a>
    @include('modals.login')
    @include('modals.register')
    
    
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-migrate-3.3.2.min.js"
        integrity="sha256-Ap4KLoCf1rXb52q+i3p0k2vjBsmownyBTE1EqlRiMwA=" crossorigin="anonymous"></script>

    <script src="{{ URL::asset('js/owl.carousel.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>    
    <script src="{{ URL::asset('js/custom.js') }}"></script>
    <script>
        $(document).ready(function () {
            $(window).scroll(function() {
                if ($(this).scrollTop()) {
                    $('.scroll-top').fadeIn();
                } else {
                    $('.scroll-top').fadeOut();
                }
            });
            $(".scroll-top").click(function() {
                $("html, body").animate({scrollTop: 0}, 1000);
            });
            $(".owl-carousel").owlCarousel({
                margin:10,
                loop:true,
                autoplay:true,
                autoplayHoverPause:true,
                responsiveClass:true,
                responsive:{
                    0:{
                        items:4,
                    },
                    600:{
                        items:6,
                    },
                    1000:{
                        items:7,
                    }
                }
            });
        });
    </script>
</body>

</html>
