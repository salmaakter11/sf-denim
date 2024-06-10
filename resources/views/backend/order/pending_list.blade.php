<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pending Order(অপেক্ষমান আদেশ)') }} <span class="absulute mt-6" id="sidebarsizefixer" onclick="sidebarsizefixer()">
                &nbsp; &nbsp;<ion-icon name="menu-outline"></ion-icon>
            </span>
        </h2>
        
    </x-slot>
    <div class="bg-gray-100 overflow-hidden" style="margin: 20px;">
        <div class="w-full justify-center grid grid-cols-1">
            <div class="p-5 w-full col-span-1">
                <div class="bg-gray-100 py-10">
                    <div class="mx-auto w-full">
                        <div class="px-4 sm:px-6 lg:px-8">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h1 class="text-xl font-semibold text-gray-900">
                                        Pending Order
                                    </h1>
                                    <p class="mt-2 text-sm text-gray-700">
                                        A list of all the pending order.
                                    </p>
                                </div>
                            </div>
                            <div class="p-5 w-full">
                                @livewire('backend.order.pending_order_list ')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
