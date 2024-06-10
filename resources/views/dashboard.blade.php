<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }} <span class="absulute mt-6" id="sidebarsizefixer" onclick="sidebarsizefixer()">
                &nbsp; &nbsp;<ion-icon name="menu-outline"></ion-icon>
            </span>
        </h2>

    </x-slot>
    <div class="py-5">
        <div class="max-w-full mx-0">
            <div class=" bg-white dark:bg-gray-800  overflow-hidden shadow-xl sm:rounded-lg">
                <div
                    class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6 mx-auto  justify-center py-10 mb-10 max-w-6xl">
                    <a wire:navigate.hover href="{{ route('banner.index') }}"
                        class=" p-[10px] text-sm hover:bg-purple-700  rounded-lg">
                        <div class="p-4 rounded-md  bg-white-500 shadow-lg shadow-cyan-500/50">
                            <h1 class="text-xl font-semibold mb-2 text-black hover:text-white">
                                Banner
                            </h1>
                        </div>
                    </a>
                    <a href="{{ route('story.index') }}" class=" p-[10px] text-sm hover:bg-purple-700  rounded-lg">
                        <div class="p-4 rounded-md  bg-white-500 shadow-lg shadow-cyan-500/50">
                            <h1 class="text-xl font-semibold mb-2 text-black hover:text-white">
                                Story
                            </h1>

                        </div>
                    </a>
                    <a wire:navigate.hover href="{{ route('story.client') }}"
                        class=" p-[10px] text-sm hover:bg-purple-700  rounded-lg">
                        <div class="p-4 rounded-md  bg-white-500 shadow-lg shadow-cyan-500/50">
                            <h1 class="text-xl font-semibold mb-2 text-black hover:text-white">
                                Client
                            </h1>

                        </div>
                    </a>
                    <a wire:navigate.hover href="{{ route('purpose.index') }}"
                        class=" p-[10px] text-sm hover:bg-purple-700  rounded-lg">
                        <div class="p-4 rounded-md  bg-white-500 shadow-lg shadow-cyan-500/50">
                            <h1 class="text-xl font-semibold mb-2 text-black hover:text-white">
                                Purpose
                            </h1>

                        </div>
                    </a>
                    <a wire:navigate.hover href="{{ route('people.index') }}"
                        class=" p-[10px] text-sm hover:bg-purple-700  rounded-lg">
                        <div class="p-4 rounded-md  bg-white-500 shadow-lg shadow-cyan-500/50">
                            <h1 class="text-xl font-semibold mb-2 text-black hover:text-white">
                                People
                            </h1>

                        </div>
                    </a>


                    <a href="{{ route('sustailability.index') }}"
                        class=" p-[10px] text-sm hover:bg-purple-700  rounded-lg">
                        <div class="p-4 rounded-md  bg-white-500 shadow-lg shadow-cyan-500/50">
                            <h1 class="text-xl font-semibold mb-2 text-black hover:text-white">
                                Sustailability
                            </h1>

                        </div>
                    </a>

                    <a href="{{ route('facility.index') }}" class=" p-[10px] text-sm hover:bg-purple-700  rounded-lg">
                        <div class="p-4 rounded-md  bg-white-500 shadow-lg shadow-cyan-500/50">
                            <h1 class="text-xl font-semibold mb-2 text-black hover:text-white">
                                Facility
                            </h1>

                        </div>
                    </a>

                    <a wire:navigate.hover href="{{ route('career.index') }}"
                        class=" p-[10px] text-sm hover:bg-purple-700  rounded-lg">
                        <div class="p-4 rounded-md  bg-white-500 shadow-lg shadow-cyan-500/50">
                            <h1 class="text-xl font-semibold mb-2 text-black hover:text-white">
                                Career
                            </h1>
                        </div>
                    </a>
                    <a wire:navigate.hover href="{{ route('contact.index') }}"
                        class=" p-[10px] text-sm hover:bg-purple-700  rounded-lg">
                        <div class="p-4 rounded-md  bg-white-500 shadow-lg shadow-cyan-500/50">
                            <h1 class="text-xl font-semibold mb-2 text-black hover:text-white">
                                Contact
                            </h1>
                        </div>
                    </a>
                    <a wire:navigate.hover href="{{ route('sitesettings.index') }}"
                        class=" p-[10px] text-sm hover:bg-purple-700  rounded-lg">
                        <div class="p-4 rounded-md  bg-white-500 shadow-lg shadow-cyan-500/50">
                            <h1 class="text-xl font-semibold mb-2 text-black hover:text-white">
                                Site
                            </h1>
                        </div>
                    </a>
                    <a href="{{ route('aboutus.index') }}" class=" p-[10px] text-sm hover:bg-purple-700  rounded-lg">
                        <div class="p-4 rounded-md  bg-white-500 shadow-lg shadow-cyan-500/50">
                            <h1 class="text-xl font-semibold mb-2 text-black hover:text-white">
                                About us
                            </h1>
                        </div>
                    </a>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
