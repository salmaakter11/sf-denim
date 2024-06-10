
@extends('frontend.master')
@section('frontend')
@section('meta')
<title>{{  $site==null? 'Laravel':  $site->title." Facility" }}</title>
<link rel="icon" type="image/x-icon" href="{{ Storage::url($site->fav_icon) }}">
<meta name="description" content="">
@endsection
@livewire('frontend.body.header')
@livewire('frontend.home.facility',[
    'site'=>$site,
    'facility'=>$facility,
    ])
<!--<div class="site-footer mt-36 bg-site" >-->
<!--    <div class='relative  pt-16 lg:pb-32 md:pb-28  md:px-45 px-15' style="background-color: rgb(43, 67, 103); padding-bottom: 17px;">-->
<!--        <div class="relative">-->
<!--            <div class='md:flex justify-between '>-->
<!--                <div class='md:mb-0 mb-20 sm:block hidden footer-menu-wrapper'></div>-->
<!--                <div class='flex sm:text-left sm:justify-start justify-center text-center sm:pr-40 items-center'>-->
<!--                    <h6 class='md:mr-36 mb-0 text-10 font-medium text-white tracking-normal' style="color: black;">-->
<!--                        &copy; SF 2024. All rights reserved by </h6>-->
<!--                        <div class='social sm:flex hidden mr-36'>-->
<!--                            <a target="_blank" class='hoverable js-hover-setup inline-block mx-10'-->
<!--					href="{{ $site->facebook }}">-->
<!--					<img src="{{  asset('asstes/img/black-facebook-50.png')  }}" alt="black-facebook-50.png" width="20">-->
<!--				</a>-->
<!--				<a target="_blank" class='hoverable js-hover-setup inline-block mr-10 mx-10'-->
<!--					href="{{ $site->instagram }}">-->
<!--					<img src="{{   asset('asstes/img/black-instagram-50.png')  }}" alt="black-instagram-64.png" width="20">-->
<!--				</a>-->
<!--				<a target="_blank" class='hoverable js-hover-setup inline-block mx-10' href="{{ $site->youtube }}">-->
<!--					<img src="{{ asset('asstes/img/black-youtube-50.png')  }}" alt="black-youtube-50.png" width="20">-->
<!--				</a>-->
<!--				<a target="_blank" class='hoverable js-hover-setup inline-block mx-10' href="{{ $site->twitter }}">-->
<!--					<img src="{{  asset('asstes/img/black-twitter-50.png')  }}" alt="black-twitter-50.png" width="20">-->
<!--				</a>-->
<!--                        </div>-->
<!--                </div>-->
                

<!--            </div>-->
<!--                <div class='contact-block sm:flex hidden items-center absolute -right-30 bottom-48 transform rotate-90'>-->
<!--        <a href="contact.html"-->
<!--            class='text-12 transition-all duration-200  font-extrabold tracking-17 mb-0 mr-12'style="-->
<!--    color: black;">-->
<!--            CONTACT-->
<!--        </a>-->
<!--        <div class='h-3 w-24'style="-->
<!--    background-color: black;-->
<!--"></div>-->
<!--    </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
 @livewire('frontend.body.footer')
@endsection