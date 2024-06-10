
	

	
	<div >
		<div class='lg:block md:hidden block fixed scroll-navigation-bar z-10 top-1/2 transform -translate-y-1/2'>
			<ul class='scroll-navigation md:block hidden relative'>
				<li data-key="1" class='cursor-pointer mb-8 hoverable active'>
					<span class='w-14 text-8 mr-36 font-bold tracking-13 uppercase '>
						 </span>
					<span class='text-8 font-bold uppercase tracking-13 '>
						_ _ _ _ </span>
				</li>
				<li data-key="2" class='cursor-pointer mb-8 hoverable '>
					<span class='w-14 text-8 mr-36 font-bold tracking-13 uppercase '>
						 </span>
					<span class='text-8 font-bold uppercase tracking-13 '>
						_ _ _ _ </span>
				</li>
				<li data-key="3" class='cursor-pointer mb-8 hoverable '>
					<span class='w-14 text-8 mr-36 font-bold tracking-13 uppercase '>
						 </span>
					<span class='text-8 font-bold uppercase tracking-13 '>
						_ _ _ _</span>
				</li>
	
				<div class='line mt-3 absolute top-1/2 -translate-y-1/2 transform bg-grey-2 left-30'></div>
			</ul>
		</div>
		<span
			class='flex flex-col justify-center items-center fixed left-1/2 transform -translate-x-1/2 sm:bottom-30 bottom-10 z-10 mb-0 sm:scale-100 scale-75'  style="z-index: 10002;">
			<div class="icon sm:mb-20 mb-5 slideUpAnimation transition-all duration-200">
				<!--<svg width="25" height="33" viewBox="0 0 25 33" fill="none" xmlns="http://www.w3.org/2000/svg">-->
				<!--	<path-->
				<!--		d="M12.4997 0C5.6074 0 0 5.29418 0 11.8014V21.1993C0 27.7058 5.6074 33 12.4997 33C19.3919 33 24.9993 27.7219 24.9993 21.2354V11.8014C24.9993 5.29418 19.3919 0 12.4997 0ZM22.6487 21.2354C22.6487 26.5173 18.096 30.8144 12.4997 30.8144C6.90334 30.8144 2.35058 26.5012 2.35058 21.1986V11.8014C2.35058 6.49881 6.90404 2.18561 12.4997 2.18561C18.0953 2.18561 22.6487 6.49881 22.6487 11.8014V21.2354Z"-->
				<!--		fill="white" />-->
				<!--	<path-->
				<!--		d="M12.4996 9.0332C12.1881 9.03405 11.8897 9.14943 11.6695 9.35412C11.4493 9.55882 11.3252 9.8362 11.3243 10.1257V13.9503C11.3118 14.1009 11.333 14.2521 11.3864 14.3947C11.4398 14.5373 11.5243 14.668 11.6347 14.7788C11.7451 14.8896 11.8788 14.9779 12.0277 15.0384C12.1765 15.0988 12.3371 15.13 12.4996 15.13C12.662 15.13 12.8226 15.0988 12.9714 15.0384C13.1203 14.9779 13.2541 14.8896 13.3644 14.7788C13.4748 14.668 13.5593 14.5373 13.6127 14.3947C13.6661 14.2521 13.6873 14.1009 13.6748 13.9503V10.1257C13.6739 9.8362 13.5498 9.55882 13.3296 9.35412C13.1094 9.14943 12.811 9.03405 12.4996 9.0332Z"-->
				<!--		fill="white" />-->
				<!--</svg>-->
			</div>
			<span class='inline-block max-w-127 text-12 uppercase hoverable  underline tracking-13 font-bold text-white'>
				SCROLL DOWN </span>
		</span>
		
		<div class=''>
			<div id='fullpage2' class=' fullpage-style font-body lg:pt-10 relative fullpage2-width mx-auto'>
				<div id='section' class='section pt-0 font-body relative' style="background-color: rgb(43, 67, 103);">
					<div class='mx-auto box-section'>
						<div class='fullpage2-video-width overflow-hidden cover-box relative mx-auto mb-17'>
							<div class="sfimagelogo">
								<img  src="{{ asset('asstes/img/sflogo2website.png')  }}"
								class="attachment-full size-full" alt="" loading="lazy" />
							</div>
						</div>					
					</div>
				</div>
				<div id='section1' class='section pt-0 font-body relative' style="background-color: rgb(43, 67, 103);">
					<div class='mx-auto box-section'>
						<div class='fullpage2-video-width overflow-hidden cover-box relative mx-auto mb-17'>
							<div class="" style="
    margin-left: 48px;
">
								<img  src="{{ Storage::url($banner->story) }}" style="border-radius: 100%; width:790px; height:790px;"
								class="attachment-full size-full" alt="" loading="lazy" />
							</div>
						</div>
						<div class='px-30 home-slide-content'>
							<div class='flex items-center text-black'>
								<h4 class='font-bold lg:text-50 md:text-48 sm:text-40 text-30 mb-0 text-white'></h4>
								
								<h3 class='text-16 mb-0 font-bold uppercase tracking-13 text-white text-center' style="padding-left: 40px;">
									Our Story</h3>
							</div>
							<h3
								class='lg:text-64 lg:leading-tight md:leading-tight sm:leading-tight leading-none md:text-6xl text-45 font-extrabold tracking-wider text-white max-w-md mb-30'></h3>
							<div class='lg:text-left text-center'>
								<a class='sm:py-16 hoverable sm:px-40 py-10 px-20  tracking-13 font-extrabold text-13 border-2 rounded-80 bg-white border-black text-black left-1/2 hover:text-white hover:bg-black'
									href="{{ route('story') }}">
									LEARN MORE
								</a>
							</div>
						</div>
					</div>
				</div>
				<div id='section2' class='section pt-0 font-body relative' style="background-color: rgb(43, 67, 103);">
					<div class='mx-auto box-section'>
						<div class='fullpage2-video-width overflow-hidden cover-box relative mx-auto'>
							<div class="" style="
    margin-left: 48px;
">
								<img  src="{{ Storage::url($banner->purpose) }}"
									class="attachment-full size-full" alt="" loading="lazy" style="border-radius: 100%; width:790px; height:790px; box-shadow: 0 0 8px 8px white inset;" />
							</div>
						</div>
						<div class='px-30 home-slide-content'>
							<div class='flex items-center text-black'>
								<h4 class='font-bold lg:text-50 md:text-48 sm:text-40 text-30 mb-0 text-white'>
									</h4>
								
								<h3 class='text-16 mb-0 font-bold uppercase tracking-13  text-white text-center' style="
    padding-left: 40px;
">
									Our purpose</h3>
							</div>
							<h3
								class='lg:text-64 lg:leading-tight md:leading-tight sm:leading-tight leading-none md:text-6xl text-45 font-extrabold tracking-wider text-white max-w-md mb-30'>
								</h3>
							<div class='lg:text-left text-center'>
								<a class='sm:py-16 hoverable sm:px-40 py-10 px-20  tracking-13 font-extrabold text-13 border-2 rounded-80 bg-white border-black text-black left-1/2 hover:text-white hover:bg-black'
									href="{{ route('purpose') }}">
									LEARN MORE
								</a>
							</div>
						</div>
					</div>
				</div>
				<div id='section3' class='section pt-0 font-body relative' style="background-color: rgb(43, 67, 103);">
					<div class='mx-auto box-section'>
						<div class='fullpage2-video-width overflow-hidden cover-box relative mx-auto'>
							<div class="" style="
    margin-left: 48px;
">
								<img src="{{ Storage::url($banner->people) }}"
									class="attachment-full size-full" alt="" loading="lazy" style="border-radius: 100%; width:790px; height:790px; box-shadow: 0 0 8px 8px white inset;"  />
							</div>
						</div>
						<div class='px-30 home-slide-content'>
							<div class='flex items-center text-black'>
								<h4 class='font-bold lg:text-50 md:text-48 sm:text-40 text-30 mb-0 text-white'>
									</h4>
								
								<h3 class='text-16 mb-0 font-bold uppercase tracking-13 text-white text-center' style="padding-left: 40px;">
									Our people</h3>
							</div>
							<h3
								class='lg:text-64 lg:leading-tight md:leading-tight sm:leading-tight leading-none md:text-6xl text-45 font-extrabold tracking-wider text-white max-w-md mb-30'>
								</h3>
							<div class='lg:text-left text-center'>
								<a class='sm:py-16 hoverable sm:px-40 py-10 px-20  tracking-13 font-extrabold text-13 border-2 rounded-80 bg-white border-black text-black left-1/2 hover:text-white hover:bg-black'
									href="{{ route('people') }}">
									LEARN MORE
								</a>
							</div>
						</div>
					</div>
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
	

