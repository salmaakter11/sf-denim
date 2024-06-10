<div>
	<div class=''>
		<div id='fullpage2' class=' fullpage-style font-body lg:pt-10 relative fullpage2-width mx-auto'>
            <div id='section1' class='section pt-0 font-body relative' style="background-color: rgb(43, 67, 103);">
				<div class='mx-auto box-section'>
					<div class='fullpage2-video-width overflow-hidden cover-box relative mx-auto mb-17'>
						<div class="" >
							<img  src="{{ asset('asstes/img/sflogo2website.png')  }}"
							class="attachment-full size-full" alt="" loading="lazy" />
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
    <script>
        setTimeout(function() {
            window.location.href = '{{ route('frontend.home.index') }}';
        }, 3000); // 3 seconds delay
    </script>
</div>
