<div class="mb-8 flex justify-center">
    <form wire:submit.prevent="save">
        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 space-y-6 sm:p-6">
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Add New Backend Admin User
                    </h3>
                    <p class="mt-1 text-sm text-gray-500">
                        Use this form to create a new Admin User.
                    </p>
                </div>
                <x-auth-session-status class="mb-4" :status="session('backendusercreate')" />
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-6">
                        <label for="name" class="block text-sm font-medium text-gray-700 text-left">User Name:<span
                                class="text-red-500">*</span></label>
                        <input wire:model="name" type="text" id="name" name="name" placeholder="User Name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                        <div class="text-red-500">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-6 sm:col-span-6">
                        <label for="email" class="block text-sm font-medium text-gray-700 text-left">User Email:<span
                                class="text-red-500">*</span></label>
                        <input wire:model="email" type="email" name="email" id="email" placeholder="User Email"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />

                        <div class="text-red-500">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-6 sm:col-span-6">
                        <label for="phone" class="block text-sm font-medium text-gray-700 text-left">User Phone:<span
                                class="text-red-500">*</span></label>
                        <input wire:model="phone" type="phone" name="phone" id="phone" placeholder="User Phone"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />

                        <div class="text-red-500">
                            @error('phone')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div wire:ignore class="col-span-6 sm:col-span-6">
                        <label for="name" class="block text-sm font-medium text-gray-700 text-left">Select
                            Position:<span class="text-red-500">*</span></label>
                        <select wire:model="current_team_id" name="current_team_id" id="current_team_id" multiple
                            class="multiselect mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"  placeholder="Select Position"
                            multiselect-search="true" multiselect-select-all="true">
                            @forelse($roles as $role)
                                <option class="w-full text-left" value={{ $role->name }}>{{ $role->name }}</option>
                            @empty
                            @endforelse
                        </select>
                        <div class="text-red-500">
                            @error('current_team_id')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="col-span-6 sm:col-span-6">
                        <label for="password" class="block text-sm font-medium text-gray-700 text-left">User
                            Password:<span class="text-red-500">*</span></label>
                        <input wire:model="password" type="password" name="password" id="password"
                            placeholder="User Password"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                        <div class="text-red-500">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="col-span-6 sm:col-span-6">
                        <label for="profile_photo_path" class="block text-sm font-medium text-gray-700 text-left">
                            Image: <span class="text-green-500">&nbsp; &nbsp; &nbsp; &nbsp; ***Image size must be
                                300*300 & under
                                1mb***</span></label>
                        <input wire:model="profile_photo_path" accept="image/png, image/jpeg, image/webp" type="file"
                            name="profile_photo_path" id="profile_photo_path"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                        @error('profile_photo_path')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror

                    </div>
                    <div class="col-span-6 sm:col-span-6 h-20">
                        @if ($profile_photo_path)
                            <img class="rounded mt-5 block h-20 w-20" src="{{ $profile_photo_path->temporaryUrl() }}"
                                alt="User Avatar">
                        @endif
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="status" class="block text-sm font-medium text-gray-700 text-left">Status</label>
                        <div class="mt-1 text-left">
                            <label class="inline-flex items-center">
                                <input wire:model="status" type="checkbox" id="status" value="1"
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
                <a href="{{ route('adminuser.index') }}" as="button"
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
