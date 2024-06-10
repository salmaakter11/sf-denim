
@extends('frontend.master')
@section('frontend')
@section('meta')
<title>{{  $site==null? 'Laravel':  $site->title }}</title>
<link rel="icon" type="image/x-icon" href="{{ Storage::url($site->fav_icon) }}">
<meta name="description" content="">
@endsection

@livewire('frontend.home.people',[
    'site'=>$site,
  
    ])
 <br><br>
 @livewire('frontend.body.footer')

@endsection