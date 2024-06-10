<div class="mb-8 flex justify-center">
    <form wire:submit.prevent="CreateOrUpdate" class="w-[99%]">
        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 space-y-6 sm:p-6">
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Update Site aboutus Page
                    </h3>
                    <p class="mt-1 text-sm text-gray-500">
                        Use this form to create or Update Site aboutus Page.
                    </p>
                </div>
                <x-auth-session-status class="mb-4" :status="session('sitesettings_aboutus')" />
                <div class="grid grid-cols-6 gap-6">
                    <div wire:ignore class="col-span-6">
                        <label for="aboutus" class="block text-sm font-medium text-gray-700">About us:<span class="text-red-500">*</span>
                        </label>
                        <div>
                            <textarea wire:model="aboutus" id="aboutus"></textarea>
                        </div>

                        <div class="text-red-500">
                            @error('aboutus')
                                {{ $message }}
                            @enderror
                        </div>
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
    @push('scripts')
        <script src="{{ asset('asset/ck_editor/ckeditor/ckeditor.js') }}"></script>
        <script src="{{ asset('asset/ck_editor/ckeditor/samples/js/sample.js') }}"></script>
        <script>
            CKEDITOR.replace('aboutus')
            CKEDITOR.replace('desc_en')
        </script>

        <script>
            var editor1 = CKEDITOR.instances['aboutus'];
            var editor2 = CKEDITOR.instances['desc_en'];
            editor1.on('change', function() {
                const value = editor1.getData();
                @this.set('aboutus', value);
            });
            editor2.on('change', function() {
                const value2 = editor2.getData();
                @this.set('desc_en', value2);
            });
        </script>
    @endpush
</div>
