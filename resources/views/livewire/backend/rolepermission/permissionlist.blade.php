<div class="block justify-center ">
    <div class="flex flex-col">
        <x-auth-session-status class="mb-4" :status="session('rolelist')" />
        <div class="overflow-x-auto">
            <div class="inline-block py-2 align-middle md:px-3 lg:px-5 min-w-full">
                <div class="shadow-lg shadow-purple-500/50 ring-1 ring-black ring-opacity-5 md:rounded-lg ">
                    <div class="bg-purple-500 flex justify-between">
                        <h1 class="text-left text-slate-50 bg-purple-500 p-5">Permission List <span
                                class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/10">{{ count($permissions) }}</span>
                        </h1>
                        <div wire:ignore class="flex items-center p-5">
                            <input type="text" id="search" name="search"
                                class="border rounded-l-md p-2 focus:outline-none focus:border-blue-500"
                                placeholder="Search..."
                                x-init="
                                        $('#search').on('input', function() {
                                        
                                        @this.set('search', $(this).val()); // Update the Livewire property
                                        $wire.call('fetchData', $(this).val());});
                                        "
                                >
                            <div class="bg-blue-500 p-3 text-white rounded-r-md h-[42px]">
                                <ion-icon name="search-outline"></ion-icon>
                            </div>
                        </div>
                    </div>
                    <div class="contents justify-center">
                        @if ($permissions)
                            @foreach ($permissions as $item)
                                <a href="{{ route('permissions.edit', $item) }}"> <button
                                        class="custom-button bg-blue-500 text-white px-5 py-2 border-none cursor-pointer relative overflow-hidden rounded-full m-1"
                                        type="submit">
                                        {{ $item->name }}
                                        <span wire:ignore
                                            class="cross-icon absolute top-0 right-[-30px] w-30 h-full bg-red-500 text-white flex justify-center items-center transition-right duration-300"
                                            title="Edit"><ion-icon name="create-outline"></ion-icon></span>
                                    </button>
                                </a>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
