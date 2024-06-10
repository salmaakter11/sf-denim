<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Role Settings') }} <span class="absulute mt-6" id="sidebarsizefixer" onclick="sidebarsizefixer()">
                &nbsp; &nbsp;<ion-icon name="menu-outline"></ion-icon>
            </span>
        </h2>
        
    </x-slot>
    <div class="bg-gray-100" style="margin: 20px;">
        <div class="w-full justify-center grid grid-cols-1  2xl:grid-cols-6">
            <div class="p-5 w-full col-span-1   2xl:col-span-4">
                @livewire('backend.rolepermission.rolelist')
            </div>
            <div class="p-5 lg:w-11/12 col-span-1 sm:w-full 2xl:col-span-2">
                @livewire('backend.rolepermission.rolecreate')               
            </div>
        </div>
    </div>
</x-app-layout>