<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Checkout') }} <span class="absulute mt-6" id="sidebarsizefixer" onclick="sidebarsizefixer()">
                &nbsp; &nbsp;<ion-icon name="menu-outline"></ion-icon>
            </span>
        </h2>
        
    </x-slot>

    <div class="bg-gray-100 py-10">
        <div class="mx-auto w-full">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-xl font-semibold text-gray-900">
                            Product Checkout Page Details
                        </h1>
                        <p class="mt-2 text-sm text-gray-700">
                            Use this form to update Product Checkout Page Details.
                        </p>
                    </div>
                </div>
                @push('css')
                    <link rel="stylesheet"
                        href="{{ asset('asset/ck_editor/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css') }}">
                @endpush
                @livewire('backend.general.product_checkout',['id'=>0])             
            </div>
        </div>
    </div>
</x-app-layout>
