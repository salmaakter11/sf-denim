@extends('frontend.master')
@section('frontend')
@section('meta')
    <title>{{ $site == null ? 'Laravel' : $site->title . ' Career' }}</title>
    <link rel="icon" type="image/x-icon" href="{{ Storage::url($site->logo) }}">
    <meta name="description" content="">
    <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}"></script>
    {{-- <script src="https://www.google.com/recaptcha/api.js"></script> --}}
@endsection

@livewire('frontend.body.header')
<style>
    .accordion {
        background-color: #0c0c0c;
        color: #fff;
        cursor: pointer;
        width: 100%;
        border: none;
        outline: none;
        font-size: 15px;
        transition: 0.4s;
    }
    .bg2 {
        background-color: #777;
    }
    button.accordion::after {
        content: '\002B';
        color: #cdcdcd;
        font-weight: bold;
        float: left;
        margin-left: 5px;
        margin-top: -48px;
        font-size: 27px;
    }
    .accordion:hover {
        background-color: #000000;
    }
    .panel {
        padding: 0 18px;
        display: none;
        background-color: white;
        overflow: hidden;
    }
    /* Style for table-like button */
    .button-table {
        display: table;
        width: 100%;
    }
    .button-table>div {
        display: table-row;
    }
    .button-table>div>span {
        display: table-cell;
        padding: 11px;
    }
    .button-table>button {
        display: table-cell;
        padding: 5px;
        border-bottom: 1px solid #ddd;
        background-color: inherit;
        color: inherit;
        border: none;
        cursor: pointer;
        font-size: 15px;
        text-align: left;
        outline: none;
    }
    .button-table>button::after {
        content: '\002B';
        color: #777;
        font-weight: bold;
        float: right;
        margin-left: 5px;
        margin-top: -29px;
    }
    
    .btn {
        background-color: rgb(63, 63, 202);
        border: 1px solid rgb(171, 171, 207);
        color: #fff;
        cursor: pointer;
        display: inline-block;
        line-height: 30px;
        font-weight: 400;
        padding: 4px 18px;
        border-radius: 8px;
        text-align: center;
        touch-action: manipulation;
        transition: .3s;
        vertical-align: middle;
        white-space: nowrap;
    }
</style>
@livewire('frontend.home.career')

<script>
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.display === "block") {
                panel.style.display = "none";               
                this.style.backgroundColor = "#000000";
            } else {
                panel.style.display = "block";
                this.style.backgroundColor = "#626262";
            }
        });
    }
</script>
<div class="cursor sm:block hidden">
    <div class="cursor__ball cursor__ball--big">
        <svg height="30" width="30">
            <circle cx="15" cy="15" r="10" stroke-width="1"></circle>
        </svg>
    </div>
</div>
@livewire('frontend.body.footer')
@endsection
