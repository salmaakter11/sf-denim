<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @php
    $site = DB::table('sites')->find(1);
    $sitetitle = $site->title; 
    $fav_icon =$site->fav_icon; 
    @endphp
    @if ($site)
    <title>{{  $sitetitle==null? 'Laravel':  $sitetitle }}</title>
    <link rel="icon" type="image/x-icon" href="{{ Storage::url($fav_icon) }}">
    @else
    <title>Laravel</title>
    @endif
    
    <meta name="description"
        content="
    Indulge in the convenience of Home Restu, where we bring the exquisite flavors of restaurant-quality food directly to your doorstep. Explore a curated menu of delectable dishes prepared by our skilled chefs, ensuring a gourmet dining experience in the comfort of your own home. Elevate your culinary adventures with Home Restu's premium food delivery service – because exceptional meals deserve to be enjoyed without leaving your door. Order now and savor the luxury of fine dining, reimagined for your convenience.
    " />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="{{ asset('asset/custom_js/tailwindcss3.3.5.js') }}" data-navigate-track></script>
    
    <!-- Styles -->
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Philosopher:ital@1&display=swap" rel="stylesheet">
    <link href="{{ asset('asset/css/styletwo.css') }}" rel="stylesheet" />
</head>

<body class="antialiased">
    {{-- @include('frontend.body.header')
    @yield('mainpage')

    <footer>
        <div class="container">
            <p style="text-align: right;">&copy; 2013 ITSheba. All rights reserved. | Powered by ITSheba | IT Theme 2013
                developed by ITSheba</p>
        </div>
    </footer> --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" data-navigate-track></script>
    <script data-navigate-track>
        var navLinks = document.querySelector('.nav-links')

        function onToggleMenu(e) {
            e.name = e.name === 'menu' ? 'close' : 'menu'
            navLinks.classList.toggle('top-[9%]')
        }
    </script>
    <script>
        window.addEventListener('popstate', function(event) {
            // Get the previous URL
            var previousUrl = document.referrer;

            // Redirect to the previous URL
            window.location.href = previousUrl;
        });
    </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    {{-- <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}
    <script src="{{ asset('asset/js/script.js') }}"></script>
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
</body>

</html>
