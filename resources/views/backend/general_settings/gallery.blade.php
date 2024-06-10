<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Banner') }} <span class="absulute mt-6" id="sidebarsizefixer" onclick="sidebarsizefixer()">
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
                          Gallery
                        </h1>
                        <p class="mt-2 text-sm text-gray-700">
                            Here you can add your gallery image content. . .
                        </p>
                    </div>
                </div>
                @livewire('backend.gallery.content')
            </div>
        </div>
    </div>
</x-app-layout>
