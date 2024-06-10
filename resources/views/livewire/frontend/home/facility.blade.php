<div style="min-height: 830px;">
   
    <div >
        <div class="elementor-inner">
            <div class="elementor-section-wrap">
                 <header class="bg-site header px-4 md:px-0" style="background-color: rgb(43, 67, 103);height: 155px;position: fixed;width: 100%;" id="myHeader">
                    <nav class="navbar">
                        <div class="container" >
                            <ul>
                                <li><a href="{{ route('aboutus') }}" class="text-white " >About Us</a></li>
                                <li><a href="{{ route('facility') }}" class="text-white active">Our Facility</a></li>
                                <li><a href="{{ route('sustailability') }}" class="text-white">Sustainability</a></li>
                                <li><a href="{{ route('gallery') }}" class="text-white">Gallery</a></li>
                                <li><a href="{{ route('career') }}" class="text-white">Career</a></li>
                                <li><a href="{{ route('contact') }}" class="text-white">Contact Us</a></li>
                            </ul>
                        </div>
                    </nav>

                </header>
                <section class="main-body" style="padding-top: 20vh;">
                    <div class="container-xl">
                        <h1 class="text-24 text-blue text-bold"><b>Our Facilities
                        </b></h1>
                        <p> {!! $facility->content !!}</p>                      
                    </div>
                </section>
            </div>
        </div>
    </div>
    <div class="cursor sm:block hidden">
        <div class="cursor__ball cursor__ball--big">
            <svg height="30" width="30">
                <circle cx="15" cy="15" r="10" stroke-width="1"></circle>
            </svg>
        </div>
    </div>
</div>