<div style="min-height: 830px;">
    @push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.css"
    integrity="sha512-Woz+DqWYJ51bpVk5Fv0yES/edIMXjj3Ynda+KWTIkGoynAMHrqTcDUQltbipuiaD5ymEo9520lyoVOo9jCQOCA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    @endpush
    <div >
        <div class="elementor-inner">
            <div class="elementor-section-wrap">
                 <header class="bg-site header px-4 md:px-0" style="background-color: rgb(43, 67, 103);height: 155px;position: fixed;width: 100%;" id="myHeader">
                    <nav class="navbar">
                        <div class="container" >
                            <ul>
                                <li><a href="{{ route('aboutus') }}" class="text-white " >About Us</a></li>
                                <li><a href="{{ route('facility') }}" class="text-white ">Our Facility</a></li>
                                <li><a href="{{ route('sustailability') }}" class="text-white">Sustainability</a></li>
                                <li><a href="{{ route('gallery') }}" class="text-white active">Gallery</a></li>
                                <li><a href="{{ route('career') }}" class="text-white">Career</a></li>
                                <li><a href="{{ route('contact') }}" class="text-white">Contact Us</a></li>
                            </ul>
                        </div>
                    </nav>

                </header>
                <section class="main-body pt-32" style="padding-top: 20vh;">
                    <div class="container-xl">
                        <h1 class="text-24 text-blue text-bold"><b> Gellery</b></h1>
                        <div class="gallery">
                            @foreach ($images as $image)
                            <a href="{{ Storage::url($image->path) }}" data-lightbox="models">
                                <img src="{{ Storage::url($image->path) }}">
                            </a>
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    @push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox-plus-jquery.js"
    integrity="sha512-0rYcJjaqTGk43zviBim8AEjb8cjUKxwxCqo28py38JFKKBd35yPfNWmwoBLTYORC9j/COqldDc9/d1B7dhRYmg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @endpush
    <div class="cursor sm:block hidden">
        <div class="cursor__ball cursor__ball--big">
            <svg height="30" width="30">
                <circle cx="15" cy="15" r="10" stroke-width="1"></circle>
            </svg>
        </div>
    </div>
</div>