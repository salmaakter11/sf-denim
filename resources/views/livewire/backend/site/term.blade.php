<div class="mb-8 flex justify-center">
    <form wire:submit.prevent="CreateOrUpdate" class="w-[99%]">
        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 space-y-6 sm:p-6">
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Update Site Term Page
                    </h3>
                    <p class="mt-1 text-sm text-gray-500">
                        Use this form to create or Update Site Term Page.
                    </p>
                </div>
                <x-auth-session-status class="mb-4" :status="session('sitesettings_term')" />
                <div class="grid grid-cols-6 gap-6">
                    <div wire:ignore class="col-span-6">
                        <label for="term" class="block text-sm font-medium text-gray-700">Term:<span class="text-red-500">*</span>
                        </label>
                        <div>
                            <textarea wire:model="term" id="term"></textarea>
                        </div>

                        <div class="text-red-500">
                            @error('term')
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
            CKEDITOR.replace('term')
           
        </script>

        <script>
            var editor1 = CKEDITOR.instances['term'];
           
            editor1.on('change', function() {
                const value = editor1.getData();
                @this.set('term', value);
            });
        </script>
    @endpush
</div>