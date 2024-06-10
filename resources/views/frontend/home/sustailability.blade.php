
@extends('frontend.master')
@section('frontend')
@section('meta')
<title>{{  $site==null? 'Laravel':  $site->title." Sustainability" }}</title>
<link rel="icon" type="image/x-icon" href="{{ Storage::url($site->fav_icon) }}">
<meta name="description" content="">
@endsection
@livewire('frontend.body.header')
@livewire('frontend.home.sustainability',[
    'site'=>$site,
    'sustailability'=>$sustailability,
    ])
<!--<div class="site-footer mt-36 bg-site" >-->
<!--    <div class='relative  pt-16 lg:pb-32 md:pb-28  md:px-45 px-15' style="background-color: rgb(43, 67, 103); padding-bottom: 17px;">-->
<!--        <div class="relative">-->
<!--            <div class='md:flex justify-between '>-->
<!--                <div class='md:mb-0 mb-20 sm:block hidden footer-menu-wrapper'></div>-->
<!--                <div class='flex sm:text-left sm:justify-start justify-center text-center sm:pr-40 items-center'>-->
<!--                    <h6 class='md:mr-36 mb-0 text-10 font-medium  tracking-normal' style="color: black;">-->
<!--                        &copy; SF 2024. All rights reserved by <a href="http://itsheba24.com/">IT Sheba Ltd</a></h6>-->
<!--                    <div class='social sm:flex hidden mr-36'>-->
<!--                        <a target="_blank" class='hoverable js-hover-setup inline-block mx-10'-->
<!--                            href="{{ $site->facebook }}">-->
<!--                            <img src="asstes/img/black-facebook-50.png" alt="" width="20">-->
<!--                        </a>-->
<!--                        <a target="_blank" class='hoverable js-hover-setup inline-block mr-10 mx-10'-->
<!--                            href="{{ $site->instagram }}">-->
<!--                            <img src="asstes/img/black-instagram-50.png" alt="" width="20">-->
<!--                        </a>-->
<!--                        <a target="_blank" class='hoverable js-hover-setup inline-block mx-10'-->
<!--                            href="{{ $site->youtube }}">-->
<!--                            <img src="asstes/img/black-youtube-50.png" alt="" width="20">-->
<!--                        </a>-->
<!--                        <a target="_blank" class='hoverable js-hover-setup inline-block mx-10'-->
<!--                            href="{{ $site->twitter }}">-->
<!--                            <img src="asstes/img/black-twitter-50.png" alt="" width="20">-->
<!--                        </a>-->
<!--                    </div>-->
<!--                </div>-->

<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
 @livewire('frontend.body.footer')
@endsection