<div class="mb-8 flex justify-center">
    <form wire:submit.prevent="CreateOrUpdate" class="w-[99%]">
        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 space-y-6 sm:p-6">
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Update Site Data
                    </h3>
                    <p class="mt-1 text-sm text-gray-500">
                        Use this form to create or Update Site Data.
                    </p>
                </div>
                <x-auth-session-status class="mb-4" :status="session('sitesettings_general')" />
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-6">
                        <label for="title" class="block text-sm font-medium text-gray-700 text-left">Site
                            Name(Title):<span class="text-red-500">*</span></label>
                        <input wire:model.blur="title" type="text" id="title" name="title"
                            placeholder="Home Restu"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                        <div class="text-red-500">
                            @error('title')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                        <label for="phone1" class="block text-sm font-medium text-gray-700 text-left">Primary
                            Phone:<span class="text-red-500">*</span></label>
                        <input wire:model.blur="phone1" type="phone" name="phone1" id="phone1"
                            placeholder="Contact numner"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />

                        <div class="text-red-500">
                            @error('phone1')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                        <label for="phone2" class="block text-sm font-medium text-gray-700 text-left">Additional Phone
                            one:<span class="text-gray-500">(Optional)</span></label>
                        <input wire:model.blur="phone2" type="phone" name="phone2" id="phone2"
                            placeholder="Contact numner"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />

                        <div class="text-red-500">
                            @error('phone2')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                        <label for="phone3" class="block text-sm font-medium text-gray-700 text-left">Additional Phone
                            two:<span class="text-red-500">*</span></label>
                        <input wire:model.blur="phone3" type="phone" name="phone3" id="phone3"
                            placeholder="Contact numner"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />

                        <div class="text-red-500">
                            @error('phone3')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-2 sm:col-span-6 lg:col-span-2">
                        <label for="email" class="block text-sm font-medium text-gray-700 text-left">Primery
                            Email:<span class="text-red-500">*</span></label>
                        <input wire:model.blur="email" type="email" name="email" id="email"
                            placeholder="Site Email"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                        <div class="text-red-500">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-2 sm:col-span-6 lg:col-span-2">
                        <label for="email1" class="block text-sm font-medium text-gray-700 text-left">Additional Email
                            one:<span class="text-gray-500">(Optional)</span></label>
                        <input wire:model.blur="email1" type="email" name="email1" id="email1"
                            placeholder="Site Email"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                        <div class="text-red-500">
                            @error('email1')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-2 sm:col-span-6 lg:col-span-2">
                        <label for="email2" class="block text-sm font-medium text-gray-700 text-left">Additional Email
                            two:<span class="text-gray-500">(Optional)</span></label>
                        <input wire:model.blur="email2" type="email" name="email2" id="email2"
                            placeholder="Site Email"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                        <div class="text-red-500">
                            @error('email2')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-6 sm:col-span-6">
                        <label for="address" class="block text-sm font-medium text-gray-700 text-left">Address:<span
                                class="text-red-500">*</span></label>
                        <input wire:model.blur="address" type="text" id="address" name="address"
                            placeholder="Address"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                        <div class="text-red-500">
                            @error('address')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-2 sm:col-span-6 lg:col-span-3">
                        <label for="facebook" class="block text-sm font-medium text-gray-700 text-left">FaceBook
                            Link:<span class="text-red-500">*</span></label>
                        <input wire:model.blur="facebook" type="text" id="facebook" name="facebook"
                            placeholder="FaceBook Link"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                        <div class="text-red-500">
                            @error('facebook')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-2 sm:col-span-6 lg:col-span-3">
                        <label for="twitter" class="block text-sm font-medium text-gray-700 text-left">Twitter
                            Link:<span class="text-red-500">*</span></label>
                        <input wire:model.blur="twitter" type="text" id="twitter" name="twitter"
                            placeholder="Twitter Link"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                        <div class="text-red-500">
                            @error('twitter')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-2 sm:col-span-6 lg:col-span-3">
                        <label for="instagram" class="block text-sm font-medium text-gray-700 text-left">Instagram
                            Link:<span class="text-red-500">*</span></label>
                        <input wire:model.blur="instagram" type="text" id="instagram" name="instagram"
                            placeholder="instagram Link"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                        <div class="text-red-500">
                            @error('instagram')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-2 sm:col-span-6 lg:col-span-3">
                        <label for="youtube" class="block text-sm font-medium text-gray-700 text-left">Youtube
                            Link:<span class="text-red-500">*</span></label>
                        <input wire:model.blur="youtube" type="text" id="youtube" name="youtube"
                            placeholder="Youtube Link"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                        <div class="text-red-500">
                            @error('youtube')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-span-3 sm:col-span-3">
                        <label for="fav_icon" class="block text-sm font-medium text-gray-700 text-left">
                            Fav Icon: <span class="text-green-500">&nbsp; &nbsp; &nbsp; &nbsp; ***Image size must be
                                30px*30px & under 100KB
                                1mb***</span></label>
                        <input wire:model.blur="fav_icon" accept="image/png, image/jpeg, image/webp" type="file"
                            name="fav_icon" id="fav_icon"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                        @error('fav_icon')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-span-3 sm:col-span-3">
                        <label for="logo" class="block text-sm font-medium text-gray-700 text-left">
                            Logo: <span class="text-green-500">&nbsp; &nbsp; &nbsp; &nbsp; ***Image size must be
                                300*60 & under 1MB
                                1mb***</span></label>
                        <input wire:model.blur="logo" accept="image/png, image/jpeg, image/webp" type="file"
                            name="logo" id="logo"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                        @error('logo')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-span-3 sm:col-span-3 h-20">
                        @if ($oldfav_icon)
                            <h3>Old Image</h3>
                            <img src="{{ Storage::url($oldfav_icon) }}" alt="" class="h-10 w-10">
                        @endif
                        @if ($fav_icon)
                            <h3>New Image</h3>
                            <img src="{{ $fav_icon->temporaryUrl() }}" class="h-10 w-10">
                        @endif
                        
                    </div>
                    <div class="col-span-3 sm:col-span-3 h-20">
                        @if ($oldlogo)
                            <h3>Old Image</h3>
                            <img src="{{ Storage::url($oldlogo) }}" alt="" class="h-10 w-52">
                        @endif
                        @if ($logo)
                            <h3>New Image</h3>
                            <img src="{{ $logo->temporaryUrl() }}" class="h-10 w-10">
                        @endif
                    </div>
                </div>
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6 flex justify-between">
                <a href="{{ route('sitesettings.index') }}" as="button"
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
