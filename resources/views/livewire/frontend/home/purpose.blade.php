
<div>
    @push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.css"
    integrity="sha512-Woz+DqWYJ51bpVk5Fv0yES/edIMXjj3Ynda+KWTIkGoynAMHrqTcDUQltbipuiaD5ymEo9520lyoVOo9jCQOCA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    @endpush
    <div class="body-section" >
        <div class="elementor-inner">
            <div class="elementor-section-wrap" style=" max-height: 60vh;">
                <div class='sm:grid overflow-auto sm:grid-cols-11 flex flex-col h-full bg-site'
                    style=" max-height: 100vh;">
                    <div class='sm:col-span-3 sm:order-1 order-2 sm:py-37 py-20 sm:px-45 px-10' style=" min-height: 100vh;">
                        <div class='flex h-full sm:pt-0 pt-32 sm:px-0 px-15  sm:pb-0 pb-15 sm flex-col justify-between logo-lg xl:px-120'>
                            <div class='logo sm:block hidden max-w-127 mt-36 '>
                                <a class="hoverable js-hover-setup" href="{{ route('welcome') }}"><img
                                        class='w-full h-auto object-contain' src="{{ Storage::url($site->fav_icon) }}" /></a>
                            </div>

                        </div>
                    </div>
                    <div
                        class='vt-main-menu sm:col-span-8 sm:flex-none flex-auto sm:order-2 order-1 flex items-center sm:justify-start justify-center lg:pl-60 sm:py-37 pb-20 sm:px-45 px-10 bg-white'>
                        <div class="max-w-screen-lg mx-auto">
                            <div class="content">
                                <h1 class="text-38 text-blue">{{ $purpose->head }}</h1>
                                <p class="text-18">{!! $purpose->content !!}
                                </p>
                            </div>
                            <div class="mt-8">
                                <div class="gallery">
                                    @foreach ($images as $image)
                                    <a href="{{ Storage::url($image->path) }}" data-lightbox="models">
                                        <img src="{{ Storage::url($image->path) }}">
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
