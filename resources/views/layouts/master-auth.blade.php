<!doctype html>
<html class="fixed"  lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <!-- Basic -->
        <meta charset="UTF-8">

        <title>NinhnghiaIT</title>
        <meta name="keywords" content="HTML5 Admin Template" />
        <meta name="description" content="JSOFT Admin - Responsive HTML5 Template">
        <meta name="author" content="JSOFT.net">

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <!-- Web Fonts  -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

        <!-- Vendor CSS -->
        <link rel="stylesheet" href="{{ asset('admin/assets/vendor/bootstrap/css/bootstrap.css') }}" />
        <link rel="stylesheet" href="{{ asset('admin/assets/vendor/font-awesome/css/font-awesome.css') }}" />
        <link rel="stylesheet" href="{{ asset('admin/assets/vendor/magnific-popup/magnific-popup.css') }}" />
        <link rel="stylesheet" href="{{ asset('admin/assets/vendor/bootstrap-datepicker/css/datepicker3.css') }}" />

        <!-- Specific Page Vendor CSS -->
        <link rel="stylesheet" href="{{ asset('admin/assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css') }}" />
        <link rel="stylesheet" href="{{ asset('admin/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css') }}" />
        <link rel="stylesheet" href="{{ asset('admin/assets/vendor/morris/morris.css') }}" />

        <!-- Theme CSS -->
        <link rel="stylesheet" href="{{ asset('admin/assets/stylesheets/theme.css') }}" />

        <!-- Skin CSS -->
        <link rel="stylesheet" href="{{ asset('admin/assets/stylesheets/skins/default.css') }}" />

        <!-- Theme Custom CSS -->
        <link rel="stylesheet" href="{{ asset('admin/assets/stylesheets/theme-custom.css') }}">
        @yield('header')
        <!-- Head Libs -->
        <script src="{{ asset('admin/assets/vendor/modernizr/modernizr.js') }}"></script>

    </head>

    <body>
        <section class="@yield('section-main', 'body')">
            <div class="center-sign">
                <a href="/" class="logo pull-left">
                    <img src="{{ asset('admin/assets/images/logo.png') }} " height="54" alt="Porto Admin" />
                </a>
                @yield('main')
                <p class="text-center text-muted mt-md mb-md">NinhnghiaIT</p>
            </div>
        </section>
    <!-- Vendor -->
    <script src="{{ asset('admin/assets/vendor/jquery/jquery.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/nanoscroller/nanoscroller.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/magnific-popup/magnific-popup.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/jquery-placeholder/jquery.placeholder.js') }}"></script>
    
    
    <!-- Theme Base, Components and Settings -->
    <script src="{{ asset('admin/assets/javascripts/theme.js') }}"></script>
    
    <!-- Theme Custom -->
    <script src="{{ asset('admin/assets/javascripts/theme.custom.js') }}"></script>
    
    <!-- Theme Initialization Files -->
    <script src="{{ asset('admin/assets/javascripts/theme.init.js') }}"></script>


    <!-- Examples -->
    <script src="{{ asset('admin/assets/javascripts/dashboard/examples.dashboard.js') }}"></script>
    @yield('footer')
    </body>
</html>