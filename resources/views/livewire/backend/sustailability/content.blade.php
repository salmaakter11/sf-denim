<div class="mb-8 flex justify-center">
    <form wire:submit.prevent="CreateOrUpdate">
        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 space-y-6 sm:p-6">
                <x-auth-session-status class="mb-4" :status="session('story_content')" />
                <div class="grid grid-cols-6 gap-6">
                    
                    {{-- <div class="col-span-3 sm:col-span-3">
                        <label for="image" class="block text-sm font-medium text-gray-700">Image: <span
                                class="text-green-500">&nbsp; &nbsp; &nbsp; &nbsp; ***Image size must be 500*500 &
                                under
                                1mb***</span></label>
                        <input wire:model.blur="image" accept="image/png, image/jpeg, image/webp" type="file"
                            id="image"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                        @error('image')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-span-3 sm:col-span-3 h-20">
                        <div class="grid grid-cols-6 gap-6">
                            @if ($oldImage)
                                <div class="col-span-3 sm:col-span-3">
                                    <h3>Old Image</h3>
                                    <img src="{{ Storage::url($oldImage) }}" alt="" class="h-20 w-20">
                                </div>
                            @endif
                            @if ($image)
                                <div class="col-span-3 sm:col-span-3">
                                    <h3>New Image</h3>
                                    <img class="rounded mt-5 block h-20 w-20" src="{{ $image->temporaryUrl() }}"
                                        alt="User Avatar">
                                </div>
                            @endif
                        </div>
                    </div> --}}
                    <div wire:ignore class="col-span-6">
                        <label for="content" class="block text-sm font-medium text-gray-700 text-left">Content:<span
                                class="text-red-500">*</span>
                        </label>
                        <div>
                            <textarea wire:model="content" id="content"></textarea>
                        </div>

                        <div class="text-red-500">
                            @error('content')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    @push('scripts')
                        <script src="{{ asset('asset/ck_editor/ckeditor/ckeditor.js') }}"></script>
                        <script src="{{ asset('asset/ck_editor/ckeditor/samples/js/sample.js') }}"></script>
                        <script>
                            CKEDITOR.replace('content')                          
                        </script>
                        <script>
                            var editor1 = CKEDITOR.instances['content'];                        
                            editor1.on('change', function() {
                                const value = editor1.getData();
                                @this.set('content', value);
                            });                       
                        </script>
                    @endpush
                </div>
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6 flex justify-between">
                <a href="{{ route('sustailability.index') }}" as="button"
                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Cancel
                </a>
                <button type="submit"
                    class="bg-indigo-600 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Update
                </button>
            </div>
        </div>
    </form>
</div>
