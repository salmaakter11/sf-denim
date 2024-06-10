@extends('frontend.master')
@section('frontend')
@section('meta')
    <title>{{ $site == null ? 'Laravel' : $site->title . ' Contact' }}</title>
    <link rel="icon" type="image/x-icon" href="{{ Storage::url($site->logo) }}">
    <meta name="description" content="">
    <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}"></script>
@endsection

@livewire('frontend.body.header')
@livewire('frontend.home.contactus',['site'=>$site])
<div class="cursor sm:block hidden">
    <div class="cursor__ball cursor__ball--big">
        <svg height="30" width="30">
            <circle cx="15" cy="15" r="10" stroke-width="1"></circle>
        </svg>
    </div>
</div>
</div>
@livewire('frontend.body.footer')
@endsection
