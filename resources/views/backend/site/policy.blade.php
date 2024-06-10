<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Policy Setting(নীতি প্রণয়ন)') }}<span class="absulute mt-6" id="sidebarsizefixer" onclick="sidebarsizefixer()">
                &nbsp; &nbsp;<ion-icon name="menu-outline"></ion-icon>
            </span>
        </h2>
        
    </x-slot>
    <div class="bg-gray-100 py-10">
        <div class="mx-auto w-full">
            @livewire('backend.site.policy')
        </div>
    </div>
</x-app-layout>