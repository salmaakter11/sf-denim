<div class="site-header" >
    <div class="top-site-menu" >
        <div class='fixed header-inner flex py-0 px-15 lg:px-45 left-0 top-0 items-center w-full justify-between' style="padding-left: 150px;z-index: 999;" id="myHeaderTwo"
            :class="{ 'fixed': atTop }">
            <div class='logo max-w-127'>
                <a class="hoverable js-hover-setup" href="{{ route('welcome') }}">
                    <img class='w-full h-auto object-contain' src="{{ Storage::url($site->fav_icon) }}" style="width:300px; height:100px;margin-top: 15px;"/>
                </a>
            </div>
            <div class='flex text-10 font-bold tracking-13 uppercase text-black items-center' style="margin-top: -3vh;">
                <div @click='openMenu=true;if(typeof fullpage_api !== "undefined"){fullpage_api.setAllowScrolling(false)}'
                    class='menu-icon cursor-pointer hoverable js-hover-setup'>
                    <img src="{{ asset('asstes/img/menu-icon.png') }}" alt="">
                </div>
            </div>
        </div>
        
        <div :class="{'visible opacity-100 scale-100': openMenu, 'opacity-0 invisible scale-95': !openMenu}"
                class='invisible opacity-0 menu bg-white transform transition-all duration-200 fixed left-0 top-0 w-full h-full z-50' style="z-index: 9999;">
                <div class='sm:grid overflow-auto sm:grid-cols-11 flex flex-col h-full'>
                    <div class='sm:col-span-3 sm:order-1 order-2 sm:py-37 py-20 sm:px-45 px-10'>
                        <div class='flex h-full sm:pt-0 pt-32 sm:px-0 px-15 sm:pb-0 pb-15 flex-col justify-between xl:px-120'>
                            <div class='logo sm:block hidden max-w-127'>
                                <a class="hoverable js-hover-setup" href="{{ route('welcome') }}"><img
                                        class='w-full h-auto object-contain' src="{{ Storage::url($site->logo) }}" /></a>
                            </div>
                            <!--<div>-->
                            <!--    <div class='social mb-20'>-->
                            <!--        <a target="_blank" class='hoverable js-hover-setup inline-block mx-10' -->
                            <!--            href="{{ $site->facebook }}">-->
                            <!--            <img src="asstes/img/facebook-logo.png" alt="" width="20">-->
                            <!--        </a>-->
                            <!--        <a target="_blank" class='hoverable js-hover-setup inline-block mr-10 mx-10' href="{{ $site->instagram }}">-->
                            <!--            <img src="asstes/img/instagram-logo.png" alt="" width="20">-->
                            <!--        </a>-->
                            <!--        <a target="_blank" class='hoverable js-hover-setup inline-block mx-10' href="{{ $site->youtube }}">-->
                            <!--            <img src="asstes/img/youtube-logo.png" alt="" width="20">-->
                            <!--        </a>-->
                            <!--        <a target="_blank" class='hoverable js-hover-setup inline-block mx-10' href="{{ $site->twitter }}">-->
                            <!--            <img src="asstes/img/twitter-logo.png" alt="" width="20">-->
                            <!--        </a>-->
                            <!--    </div>-->
                            <!--    <h6-->
                            <!--        class='text-12 font-bold tracking-13 uppercase text-white mb-17 hover:text-blue-5 transition-all duration-200'>-->
                            <!--        <a class="hoverable js-hover-setup text-black" href="{{ route('contact') }}">Contact us</a>-->
                            <!--    </h6>-->
                            <!--</div>-->
                        </div>
                    </div>
                    <div class='logo absolute left-20 top-24 sm:hidden max-w-127'>
                        <a class="hoverable js-hover-setup" href="{{ route('welcome') }}">
                            <img class='w-full h-auto object-contain' src="{{ Storage::url($site->logo) }}" />
                        </a>
                    </div>
                    <div
                    class='vt-main-menu sm:col-span-8 sm:flex-none flex-auto sm:order-2 order-1 flex items-center sm:justify-start justify-center lg:pl-188 sm:py-37 pt-107 pb-20 sm:px-45 px-10 bg-black '>
                    <ul id="menu-main-menu" class="sm:pl-80 md:pl-0 pl-10">
                        <li id="menu-item-2197"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2197 transition-all mb-8 duration-200 font-bold sm:text-20 text-18 tracking-13 uppercase text-black">
                            <a href="{{ route('aboutus') }}"
                                class="inline-block py-20 hoverable js-hover-setup text-white">About
                                Us</a>
                        </li>
                        <li id="menu-item-2196"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2196 transition-all mb-8 duration-200 font-bold sm:text-20 text-18 tracking-13 uppercase text-black">
                            <a href="{{ route('facility') }}"
                                class="inline-block py-20 hoverable js-hover-setup text-white">Our
                                Facilities </a>
                        </li>
                        <li id="menu-item-2196"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2196 transition-all mb-8 duration-200 font-bold sm:text-20 text-18 tracking-13 uppercase text-black">
                            <a href="{{ route('sustailability') }}"
                                class="inline-block py-20 hoverable js-hover-setup text-white">Sustainability</a>
                        </li>
                        <li id="menu-item-2200"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2200 transition-all mb-8 duration-200 font-bold sm:text-20 text-18 tracking-13 uppercase text-black">
                            <a href="gellery.html"
                                class="inline-block py-20 hoverable js-hover-setup text-white">Gellery</a>
                        </li>
                        <li id="menu-item-2198"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2198 transition-all mb-8 duration-200 font-bold sm:text-20 text-18 tracking-13 uppercase text-black">
                            <a href="{{ route('career') }}"
                                class="inline-block py-20 hoverable js-hover-setup text-white">careerr</a>
                        </li>
                        <li id="menu-item-2199"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2199 transition-all mb-8 duration-200 font-bold sm:text-20 text-18 tracking-13 uppercase text-black">
                            <a href="{{ route('contact') }}"
                                class="inline-block py-20 hoverable js-hover-setup text-white">
                                Contact Us</a>
                        </li>
                    </ul>
                </div>
                </div>
                <div @click='openMenu=false;if(typeof fullpage_api !== "undefined"){fullpage_api.setAllowScrolling(true)}'
                    class='hoverable js-hover-setup z-1 close-menu absolute sm:right-37 right-15 top-15 sm:top-28 p-10 cursor-pointer'>
                    <svg width="27" height="26" viewBox="0 0 27 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="3.45605" width="32" height="4" rx="2" transform="rotate(45 3.45605 0)" fill="white" />
                        <rect x="25.4561" y="3" width="32" height="4" rx="2" transform="rotate(135 25.4561 3)"
                            fill="white" />
                    </svg>
                </div>
            </div>
            <div class='fixed right-30 bottom-20 lg:block hidden' style="z-index: 10000;">
    
                <div class='flex items-center sm:text-left sm:justify-end justify-center text-center pr-40'>
                        <h6 class='mr-36 mb-0 text-10 font-medium text-black tracking-normal'>
                            &copy; 2024, SF . All Rights Reserved.</h6>
                            <div class='social sm:flex hidden mr-36'>
                                <a target="_blank" class='hoverable js-hover-setup inline-block mx-10'
                                    href="{{ $site->facebook }}">
                                    <img src="{{  asset('asstes/img/black-facebook-50.png')  }}" alt="black-facebook-50.png" width="20">
                                </a>
                                <a target="_blank" class='hoverable js-hover-setup inline-block mr-10 mx-10'
                                    href="{{ $site->instagram }}">
                                    <img src="{{   asset('asstes/img/black-instagram-50.png')  }}" alt="black-instagram-64.png" width="20">
                                </a>
                                <a target="_blank" class='hoverable js-hover-setup inline-block mx-10' href="{{ $site->youtube }}">
                                    <img src="{{ asset('asstes/img/black-youtube-50.png')  }}" alt="black-youtube-50.png" width="20">
                                </a>
                                <a target="_blank" class='hoverable js-hover-setup inline-block mx-10' href="{{ $site->twitter }}">
                                    <img src="{{  asset('asstes/img/black-twitter-50.png')  }}" alt="black-twitter-50.png" width="20">
                                </a>
                            </div>
                    </div>
                    <div class='contact-block sm:flex hidden items-center absolute -right-30 bottom-48 transform rotate-90'>
                        <a href="{{ route('contact') }}"
                            class=' text-12 transition-all duration-200 font-extrabold tracking-17 mb-0 mr-12' style="color: black">
                            CONTACT
                        </a>
                        <div class='h-3 w-24' style="background-color: black"></div>
                    </div>
                </div>
    </div>
</div>
