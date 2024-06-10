
@extends('frontend.master')
@section('frontend')
@section('meta')
<title>{{  $site==null? 'Laravel':  $site->title." Home" }}</title>
<link rel="icon" type="image/x-icon" href="{{ Storage::url($site->logo) }}">
<meta name="description" content="">
@endsection

<livewire:frontend.body.header lazy="on-load" />
@livewire('frontend.home.index',[
    'site'=>$site,
    'banner'=>$banner,
    ])
 @livewire('frontend.body.footer')

@endsection