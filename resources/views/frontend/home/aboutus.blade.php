
@extends('frontend.master')
@section('frontend')
@section('meta')
<title>{{  $site==null? 'Laravel':  $site->title.' About' }}</title>
<link rel="icon" type="image/x-icon" href="{{ Storage::url($site->fav_icon) }}">
<meta name="description" content="">
@endsection
@livewire('frontend.body.header')
@livewire('frontend.home.aboutus',['site'=>$site])
@livewire('frontend.body.footer')

@endsection