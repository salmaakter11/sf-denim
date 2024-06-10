<div class="mb-8 flex justify-center">
    <form wire:submit.prevent="CreateOrUpdate">
        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 space-y-6 sm:p-6">
                <x-auth-session-status class="mb-4" :status="session('story_content')" />
                @push('css')            
                <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
                <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
                    rel="stylesheet" />
                @endpush
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-6">
                        <label for="head" class="block text-sm font-medium text-gray-700 text-left">Head Line:<span
                                class="text-red-500">*</span></label>
                        <input wire:model.blur="head" type="text" id="head" name="head"
                            placeholder="Head line "
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                        <div class="text-red-500">
                            @error('head')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                   
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
                    <div wire:ignore class="col-span-6 sm:col-span-6 lg:col-span-6">
                        <label for="image" class="block text-sm font-medium text-gray-700 text-left"> Image: <span
                                class="text-green-500">&nbsp; &nbsp; &nbsp; &nbsp; ***Image size must be 500*500 &
                                under
                                1mb & group maximum 2mb*** </span></label>
                        <input type="file" id="image" name="image" class="filepond" multiple
                            credits="false" data-max-files="10" x-init="const inputElement = document.querySelector('#image');
                            const pond = FilePond.create(inputElement, {
                                maxFileSize: '1MB',
                                maxTotalFileSize: '2MB',
                            });" />
                    </div>
                    @push('scripts')
                        <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
                        <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
                        <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
                        <script>
                            FilePond.registerPlugin(FilePondPluginFileValidateSize);
                            FilePond.registerPlugin(FilePondPluginImagePreview);
                            FilePond.setOptions({
                                server: {
                                    process: '/admin/generalsettings/temporary/image/upload',
                                    revert: '/admin/generalsettings/temporary/image/delete',
                                    headers: {
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                    },
                                },
                            });
                        </script>
                    @endpush
                    @forelse ($product_image as $item)
                        <div class="col-span-3 sm:col-span-3" style="position: relative;"
                            id="item_{{ $item->id }}">
                            <!-- Image container with relative positioning -->
                            <div style="position: relative;">
                                <!-- Delete button with absolute positioning -->
                                <a title="Delete" wire:click="imageDelete({{ $item->id }})"
                                    class="bg-transparent-600 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 my-auto"
                                    style="position: absolute; top: 0; right: 92%;">
                                    X
                                </a>
                                <!-- Image -->
                                <img id="show_image" style="width: 450px; height: 250px;"
                                    src="{{ Storage::url($item->path) }}" alt="User Avatar">
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6 flex justify-between">
                <a href="{{ route('story.index') }}" as="button"
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
