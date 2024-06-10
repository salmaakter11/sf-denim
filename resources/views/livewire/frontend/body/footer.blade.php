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
