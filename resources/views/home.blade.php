<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="robots" content="noindex">
    
    <title>@yield('title','MyNovelHub')</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('images/favicon.ico') }}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" id="odrin_fonts-css" href="https://fonts.googleapis.com/css?family=Mulish:200,300,regular,500,600,700,800,900,200italic,300italic,italic,500italic,600italic,700italic,800italic,900italic%7CCinzel+Decorative:regular,700,900%7CGentium+Basic:regular,italic,700,700italic&amp;subset=cyrillic,cyrillic-ext" type="text/css" media="all">
    <!-- Styles -->

    <link rel="stylesheet" href="{{ URL::asset('mdi/css/materialdesignicons.min.css') }}">
    <link href="{{ URL::asset('css/admin.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>
    
    <!-- Javascripts -->
    

</head>

<body class="admin-dashboard">
    
    <div class="dashboard-container">
        <!-- Admin Header -->
        @include('inc.header')

        <div class="admin-content container-fluid page-body-wrapper position-fixed">
            <!-- Admin Sidebar -->
            @include('inc.sidebar')

            <!-- Admin Content Area -->
            <main class="main-panel">
                <div class="content-wrapper">
                    @include('inc.messages')
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
    <!--Genre Add Modal -->
    @include('modals.genre_add')

    <!-- Genre Edit Modal -->
    @include('modals.genre_edit')

    <!-- Genre Delete Modal -->
    @include('modals.genre_delete')

    <!-- Tags Add Modal -->
    @include('modals.tag_add')

    <!-- Tags Edit Modal -->
    @include('modals.tag_edit')

    <!-- Tag Delete Modal -->
    @include('modals.tag_delete')

    <!--Select Image-->
    @include('modals.select_image')

    <!-- Image Crop -->
    @include('modals.crop_image')

    <!--Delete-->
    @include('modals.delete')

    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-migrate-3.3.2.min.js"
        integrity="sha256-Ap4KLoCf1rXb52q+i3p0k2vjBsmownyBTE1EqlRiMwA=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>    
    <script src="{{ URL::asset('js/custom.js') }}"></script>
</body>

</html>