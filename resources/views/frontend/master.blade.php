<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="stylesheet" href="{{ asset('asstes/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('asstes/css/tailwind.css') }}">
	<link rel="stylesheet" href="{{ asset('asstes/css/fontawesome.css') }}">
	<link rel="stylesheet" href="{{ asset('asstes/css/fullPage.css') }}">
	<link rel="stylesheet" href="{{ asset('asstes/css/elementor-icons.css') }}">
	<script type='text/javascript' src='{{ asset('asstes/js/jquery.minaf6c.js') }}'></script>
	<script type='text/javascript' src='{{ asset('asstes/js/jQuery-Migrat- v3.3.2.js') }}'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.5/cdn.min.js" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">
    @yield('meta')
    @stack('css')
</head>

<body class="font-body jet-desktop-menu-active" x-data="{ atTop: true, openMenu: false }"
	:class="{ 'overflow-hidden': openMenu }" x-on:scroll.window="atTop = (window.pageYOffset > 200) ? false : true; " style="min-height: 100vh;">


    @yield('frontend')
   
    @stack('modals')
    @livewireScripts

    <!-- all js here -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" data-navigate-track></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.5/cdn.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    
    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.options.timeOut = 10000;
                    toastr.info("{{ Session::get('message') }}");
                    var audio = new Audio('{{ asset('asset/audio/audio.mp3') }}');
                    audio.play();
                    break;
                case 'success':

                    toastr.options.timeOut = 10000;
                    toastr.success("{{ Session::get('message') }}");
                    var audio = new Audio('{{ asset('asset/audio/audio.mp3') }}');
                    audio.play();
                    break;
                case 'warning':

                    toastr.options.timeOut = 10000;
                    toastr.warning("{{ Session::get('message') }}");
                    var audio = new Audio('{{ asset('asset/audio/audio.mp3') }}');
                    audio.play();
                    break;
                case 'error':
                    toastr.options.timeOut = 10000;
                    toastr.error("{{ Session::get('message') }}");
                    var audio = new Audio('{{ asset('asset/audio/audio.mp3') }}');
                    audio.play();
                    break;
            }
        @endif
    </script>
    <script>
        window.addEventListener('popstate', function(event) {
            // Get the previous URL
            var previousUrl = document.referrer;

            // Redirect to the previous URL
            window.location.href = previousUrl;
        });
    </script>
    <script src="{{ asset('asstes/js/mobile-menu-item.js') }}"></script>
    <script type='text/javascript' src='{{ asset('asstes/js/jquery-ui-core-js.js') }}'></script>
    <script type='text/javascript' src='{{ asset('asstes/js/js1.js') }}'></script>
    <script type='text/javascript' src='{{ asset('asstes/js/js2.js') }}'></script>
    <script type='text/javascript' src='{{ asset('asstes/js/js4.js') }}'></script>
    <script type='text/javascript' src='{{ asset('asstes/js/js5.js') }}'></script>

    {{-- <script type='text/javascript' src='{{ asset('asstes/js2/splide.min.js') }}'></script> --}}
    
    <script type='text/javascript' src='{{ asset('asstes/js/easings-js.js') }}'></script>
    <script type='text/javascript' src='{{ asset('asstes/js/scrolloverflow-js.js') }}'></script>
    <script type='text/javascript' src='{{ asset('asstes/js/fullpage-js.js') }}'></script>
    
    <script type='text/javascript' src='{{ asset('asstes/js/letweb-js.js') }}'></script>
    <script type='text/javascript' src='{{ asset('asstes/js/nicescroll-js.js') }}'></script>
    <script type='text/javascript' src='{{ asset('asstes/js/fancybox-js.js') }}'></script>
    <script type='text/javascript' src='{{ asset('asstes/js/sticky-js.js') }}'></script>
    <script type='text/javascript' src='{{ asset('asstes/js/odometer-js.js') }}'></script>
    <script type='text/javascript' src='{{ asset('asstes/js/main-js.js') }}'></script>

    <script type='text/javascript' src='{{ asset('asstes/js/jet-vue-js.js') }}'></script>
    <script type='text/javascript' src='{{ asset('asstes/js/public-scripts-js.js') }}'></script>
    <script type='text/javascript' src='{{ asset('asstes/js/lw-bowser-js.js') }}'></script>
    <script type='text/javascript' src='{{ asset('asstes/js/lw-tracking-js.js') }}'></script>
    <script type='text/javascript' src='{{ asset('asstes/js/wp-embed-js.js') }}'></script>
    <script type='text/javascript' src='{{ asset('asstes/js/runtime-js.js') }}'></script>
    <script type='text/javascript' src='{{ asset('asstes/js/frontend-js.js') }}'></script>
    <script type='text/javascript' src='{{ asset('asstes/js/waypoints-js.js') }}'></script>
 
    <script type='text/javascript' src='{{ asset('asstes/js/swiper-js.js') }}'></script>
    <script type='text/javascript' src='{{ asset('asstes/js/share-link-js.js') }}'></script>
    <script type='text/javascript' src='{{ asset('asstes/js/dialog-js.js') }}'></script>
    <script type='text/javascript' src='{{ asset('asstes/js/frontend-modules-js.js') }}'></script>
    <script type='text/javascript' src='{{ asset('asstes/js/jet-menu.js') }}'></script>
    <script type='text/javascript' src='{{ asset('asstes/js/preloaded-modules-js.js') }}'></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
     <script>
        window.onscroll = function() {
            myFunction()
        };

        var header = document.getElementById("myHeader");
        var headertwo = document.getElementById("myHeaderTwo");
        var sticky = header.offsetTop + 100;
        

        function myFunction() {
            if (window.pageYOffset > sticky) {
                header.classList.add("sticky");
                headertwo.classList.add("stickyy");
            } else {
                header.classList.remove("sticky");
                headertwo.classList.remove("stickyy");
            }
        }
    </script>
    <script>
        window.addEventListener('scroll', function() {
            var heroContent = document.getElementById('heroContent');
            if (window.scrollY >= 400) {
                heroContent.style.opacity = '0';
                heroContent.style.pointerEvents = 'none';
            } else {
                heroContent.style.opacity = '1';
                heroContent.style.pointerEvents = 'auto';
            }
        });
    </script>
    @stack('js')
   
</body>

</html>
