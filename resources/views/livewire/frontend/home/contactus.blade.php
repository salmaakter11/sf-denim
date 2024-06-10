
<div style="min-height: 830px;">
    <div >
        <div class="elementor-inner">
            <div class="elementor-section-wrap">
                 <header class="bg-site header px-4 md:px-0" 
                 style="background-color: rgb(43, 67, 103);height: 155px;position: fixed;width: 100%;" id="myHeader">
                    <nav class="navbar">
                        <div class="container">
                            <ul>
                                <li><a href="{{ route('aboutus') }}" class="text-white " >About Us</a></li>
                                <li><a href="{{ route('facility') }}" class="text-white">Our Facility</a></li>
                                <li><a href="{{ route('sustailability') }}" class="text-white">Sustainability</a></li>
                                <li><a href="{{ route('gallery') }}" class="text-white">Gallery</a></li>
                                <li><a href="{{ route('career') }}" class="text-white">Career</a></li>
                                <li><a href="{{ route('contact') }}" class="text-white active">Contact Us</a></li>
                            </ul>
                        </div>
                    </nav>

                </header>
                <section class="main-body" style="padding-top: 20vh;">
                    <div class="container-xl">
                    <div class="elementor-widget-container">
                        
                            <div class="container z-1 relative h-full" style="margin-top: 250px;">
                                <div class='grid grid-cols-1 lg:grid-cols-2 text-black lg:gap-10 gap-30 items-center'
                                    style="margin-top: -150px;">
                                    <div>
                                        <div >
                                            <h1 class="text-32 text-blue text-bold"><b> Contact Us</b></h1>
                                            <p
                                                class='sm:mb-20 mb-10 text-16 font-bold text-black tracking-13 uppercase'>
                                               S. F. started its ready made garment manufacturing ventures in the nascent days of the industrial sector of Bangladesh in 1991. Since then on S. F. strides on the path of operational excellence through quality, efficiency and sustainability across its end to end apparel manufacturing process. Central to S. F.’s business philosophy remains its core commitment to environment and society.</p>
    
                                           <div  class="text-center">
                                            <h1 class="text-24 pt-32 text-blue text-bold"><b> Head Office</b></h1>
                                            <h1 class="text-24 pt-32 text-blue text-bold">
                                                S F</h1>
                                            <p class='text-16 tracking-wider  font-normal'>
                                                {{ $site->address }}</p>
                                            <p
                                                class='text-16 tracking-wider text-black hover:text-blue transition-all duration-200 font-normal'>
    
                                                <a class="js-hover-setup inline-block align-middle"
                                                    href="mailto:info@sai-tex.com">Contact:
                                                    {{ $site->phone1 }} <br> {{ $site->phone2 }}</a>
                                            </p>
                                            <p
                                                class='text-16 tracking-wider text-black hover:text-blue transition-all duration-200 font-normal'>
                                                <a class="js-hover-setup inline-block align-middle"
                                                    href="mailto: {{ $site->email }}"> Mail :{{ $site->email }}</a>
                                            </p>
    
                                           </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class='bg-white md:py-45 md:px-56 py-45 px-20'>
                                            <div role="form" lang="en-US" dir="ltr">
                                                <div class="screen-reader-response">
                                                    <p role="status" aria-live="polite" aria-atomic="true"></p>
                                                    <ul></ul>
                                                </div>
    
    
                                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.5583447178183!2d90.35034637605925!3d23.79873668691756!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c1ba65fff6c9%3A0x4bf2eb2f25349aeb!2sIT%20Sheba%2024!5e0!3m2!1sbn!2sbd!4v1714909156290!5m2!1sbn!2sbd" width="100%" height="450" style="border:0;border-radius: 100%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
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