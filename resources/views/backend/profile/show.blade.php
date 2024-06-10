<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Profile') }} <span class="absulute mt-6" id="sidebarsizefixer" onclick="sidebarsizefixer()">
                &nbsp; &nbsp;<ion-icon name="menu-outline"></ion-icon>
            </span>
        </h2>
        
    </x-slot>
    <div class="bg-gray-100" style="margin: 20px;">
        <div class="w-full justify-center grid grid-cols-1">
            <div class="mt-5 p-5 w-full col-span-1">
                @livewire('backend.profile.updateprofile')
            </div>
            <div class="mt-5 p-5 w-full col-span-1">
                @livewire('backend.profile.updatepassword')
            </div>
            <div class="mt-5 p-5 w-full col-span-1">
                @livewire('backend.profile.logoutothersession')
            </div>
        </div>
    </div>
</x-app-layout>
