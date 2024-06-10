<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Job Application') }} <span class="absulute mt-6" id="sidebarsizefixer" onclick="sidebarsizefixer()">
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
                            Job Application
                        </h1>
                        <p class="mt-2 text-sm text-gray-700">
                            List of all messages from the Job post.
                        </p>
                    </div>                
                </div>
                @livewire('backend.contact.contact_index')
            </div>
        </div>
    </div>
   
    <x-custom-modal name="Contact" title="Add a New Contact">
        <div>
            <x-slot:body>
        </div>
        <section class="bg-white dark:bg-gray-900">
            <div class="py-1 lg:py-1 px-4 mx-auto max-w-screen-2xl">
                <h2 class="mb-1 text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white">Add a
                    Contact Information</h2>
                {{-- @livewire('backend.general.Contact_create') --}}
            </div>
        </section>
        </x-slot>
    </x-custom-modal>
</x-app-layout>
