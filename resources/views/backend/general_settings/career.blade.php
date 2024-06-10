<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Career') }} <span class="absulute mt-6" id="sidebarsizefixer" onclick="sidebarsizefixer()">
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
                            Career
                        </h1>
                        <p class="mt-2 text-sm text-gray-700">
                            A list of all the Careers.
                        </p>
                    </div>
                    
                    <div>
                        <a x-data @click="$dispatch('open-modal',{name:'career'})"
                            class="bg-indigo-600 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Add a new career
                        </a>
                    </div>
                    
                </div>
                @livewire('backend.career.career_index')        
            </div>
        </div>
        @push('css')
            <link rel="stylesheet" href="{{ asset('asset/ck_editor/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css') }}">
            <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
            <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />
        @endpush
    </div>
   
    <x-custom-modal name="career" title="Add a New career">
        <div>
            <x-slot:body>
        </div>
        <section class="bg-white dark:bg-gray-900">
            <div class="py-1 lg:py-1 px-4 mx-auto max-w-screen-2xl">
                <h2 class="mb-1 text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white">Add a
                    career Information</h2>
                    @livewire('backend.career.career_create')
            </div>
        </section>
        </x-slot>
    </x-custom-modal>
</x-app-layout>