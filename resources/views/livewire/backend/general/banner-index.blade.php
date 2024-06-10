<div class="p-10 flex justify-center">
    <form wire:submit.prevent="saveOrUpdate" class="w-full">
        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-10 px-4 space-y-6 sm:p-10">
                {{-- <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Add New product Information
                    </h3>
                    <p class="mt-1 text-sm text-gray-500">
                        Use this form to create a new product.
                    </p>
                </div> --}}
                <x-auth-session-status class="mb-4" :status="session('product_create')" />
                <div class="grid grid-cols-6 gap-6">

                    <div class="col-span-3 sm:col-span-3">
                        <label for="story" class="block text-sm font-medium text-gray-700 text-left">Our Story Banner: <span
                                class="text-green-500">&nbsp; &nbsp; &nbsp; &nbsp; ***Image size must be 500*500 &
                                under
                                1mb***</span></label>
                        <input wire:model.blur="story" accept="image/png, image/jpeg, image/webp" type="file"
                            id="image"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                        @error('story')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-span-3 sm:col-span-3 h-20">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-3">
                                @if ($oldstory)
                                    <h3 class="text-left">Old Image</h3>
                                    <img src="{{ Storage::url($oldstory) }}" alt="" class="h-20 w-20">
                                @endif
                            </div>
                            <div class="col-span-3">
                                @if ($story)
                                <h3 class="text-left">New Image</h3>
                                    <img class="rounded  block h-20 w-20" src="{{ $story->temporaryUrl() }}"
                                        alt="User Avatar">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-span-3 sm:col-span-3">
                        <label for="purpose" class="block text-sm font-medium text-gray-700 text-left"> Our Purpose Banner:
                            <span class="text-green-500">&nbsp; &nbsp; &nbsp; &nbsp; ***Image size must be 500*500 &
                                under
                                1mb***</span></label>
                        <input wire:model.blur="purpose" accept="image/png, image/jpeg, image/webp" type="file"
                            id="purpose"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                        @error('purpose')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-span-3 sm:col-span-3 h-20">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-3">
                                @if ($oldpurpose)
                                    <h3 class="text-left">Old Image</h3>
                                    <img src="{{ Storage::url($oldpurpose) }}" alt="" class="h-20 w-20">
                                @endif
                            </div>
                            <div class="col-span-3">
                                @if ($purpose)
                                <h3 class="text-left">New Image</h3>
                                    <img class="rounded block h-20 w-20" src="{{ $purpose->temporaryUrl() }}"
                                        alt="User Avatar">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-span-3 sm:col-span-3">
                        <label for="people" class="block text-sm font-medium text-gray-700 text-left">Our People Banner:
                            <span class="text-green-500">&nbsp; &nbsp; &nbsp; &nbsp; ***Image size must be 500*500 &
                                under
                                1mb***</span></label>
                        <input wire:model.blur="people" accept="image/png, image/jpeg, image/webp" type="file"
                            id="people"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                        @error('people')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-span-3 sm:col-span-3 h-20">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-3">
                                @if ($oldpeople)
                                    <h3 class="text-left">Old Image</h3>
                                    <img src="{{ Storage::url($oldpeople) }}" alt="" class="h-20 w-20">
                                @endif
                            </div>
                            <div class="col-span-3">
                                @if ($people)
                                <h3 class="text-left">New Image</h3>
                                    <img class="rounded block h-20 w-20" src="{{ $people->temporaryUrl() }}"
                                        alt="User Avatar">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit"
                class="bg-indigo-600 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Update
            </button>
        </div>
    </form>
</div>
