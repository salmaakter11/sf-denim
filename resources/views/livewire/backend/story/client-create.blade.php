<div class="mb-8 flex justify-center">
    <form wire:submit.prevent="save">
        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 space-y-6 sm:p-6">
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Add New client
                    </h3>
                    <p class="mt-1 text-sm text-gray-500">
                        Use this form to create a new client.
                    </p>
                </div>
                <x-auth-session-status class="mb-4" :status="session('client_create')" />
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-6">
                        <label for="name" class="block text-sm font-medium text-gray-700 text-left">Name:<span
                                class="text-red-500">*</span></label>
                        <input wire:model.blur="name" type="text" id="name" name="name" placeholder="client Name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                        <div class="text-red-500">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-6 sm:col-span-6">
                        <label for="priority" class="block text-sm font-medium text-gray-700 text-left">Priority:</label>
                        <input wire:model.blur="priority" type="text" id="priority" name="priority" placeholder="Priority Descending Order" oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                        <div class="text-red-500">
                            @error('priority')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-span-6 sm:col-span-6">
                        <label for="image" class="block text-sm font-medium text-gray-700 text-left">
                            Image: <span class="text-green-500">&nbsp; &nbsp;***Image size must be
                                1400px X 550px & under
                                1mb***</span></label>
                        <input wire:model.blur="image" accept="image/png, image/jpeg, image/webp" type="file"
                            name="image" id="image"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                        @error('image')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror

                    </div>
                    <div class="col-span-6 sm:col-span-6 h-20 w-full">
                        @if ($image)
                            <img class="rounded mt-5 block h-20 w-full" src="{{ $image->temporaryUrl() }}"
                                alt="User Avatar">
                        @endif
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="status" class="block text-sm font-medium text-gray-700 text-left">Status</label>
                        <div class="mt-1 text-left">
                            <label class="inline-flex items-center">
                                <input wire:model.blur="status" type="checkbox" id="status" value="1"
                                    class="form-checkbox h-10 w-10 text-indigo-600">
                                <span class="ml-2 text-gray-700">Active</span>
                            </label>
                        </div>
                        <div class="text-red-500">
                            @error('status')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6 flex justify-between">
                <a href="{{ route('story.client') }}" as="button"
                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Cancel
                </a>
                <button type="submit"
                    class="bg-indigo-600 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Save
                </button>
            </div>
        </div>
    </form>
</div>
