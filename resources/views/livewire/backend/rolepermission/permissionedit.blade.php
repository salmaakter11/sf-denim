<div class="block justify-center ">
    <div class="flex flex-col">
        <x-auth-session-status class="mb-4" :status="session('permissionedit1')" />
        <div class="overflow-x-auto">
            <div class="inline-block py-2 align-middle md:px-3 lg:px-5 min-w-full">
                <div class="shadow-lg shadow-purple-500/50 ring-1 ring-black ring-opacity-5 md:rounded-lg ">
                    <div class="bg-purple-500 flex justify-between">
                        <h1 class="text-left text-slate-50 bg-purple-500 p-5">Edit Permission 
                        </h1>
                    </div>
                    <div class="bg-white inline-block py-2 align-middle md:px-3 lg:px-5 min-w-full">
                        <form wire:submit.prevent="update">
                        <div class="bg-white py-6 px-4 space-y-6 sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-6">
                                <label for="name" class="block text-sm font-medium text-gray-700 text-left">Permission Name:<span
                                        class="text-red-500">*</span></label>
                                <input wire:model="name" type="text" id="name" name="name" placeholder="Permission Name"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                                <div class="text-red-500">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3  text-right sm:px-6 flex justify-around">
                            <a href="{{ route('permission.index') }}" as="button"
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
                </div>
            </div>
            <x-auth-session-status class="mb-4" :status="session('permissionedit2')" />
            <div class="inline-block py-2 align-middle md:px-3 lg:px-5 min-w-full">
                <div class="shadow-lg shadow-purple-500/50 ring-1 ring-black ring-opacity-5 md:rounded-lg ">
                    <div class="bg-purple-500 flex justify-between">
                        <h1 class="text-left text-slate-50 bg-purple-500 p-5">Role that has this Permission
                        </h1>
                    </div>
                    <div class="bg-white inline-block py-2 align-middle md:px-3 lg:px-5 min-w-full">
                        <div class="flex justify-center my-3">
                            @if ($permission->roles)
                                @foreach ($permission->roles as $item)
                                <button wire:click="removeRole('{{ $item->id }}')"
                                    class="custom-button bg-blue-500 text-white px-5 py-2 border-none cursor-pointer relative overflow-hidden rounded-full m-1"
                                    type="submit">
                                    {{ $item->name }}
                                    <span wire:ignore
                                    class="cross-icon absolute top-0 right-[-30px] w-30 h-full bg-red-500 text-white flex justify-center items-center transition-right duration-300"
                                    title="Deallocate"><ion-icon name="close-outline"></ion-icon></span>
                                </button>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <x-auth-session-status class="mb-4" :status="session('permissionedit3')" />
            <div class="inline-block py-2 align-middle md:px-3 lg:px-5 min-w-full">
                <div class="shadow-lg shadow-purple-500/50 ring-1 ring-black ring-opacity-5 md:rounded-lg ">
                    <div class="bg-purple-500 flex justify-between">
                        <h1 class="text-left text-slate-50 bg-purple-500 p-5">Assignable Role
                        </h1>
                    </div>
                    <div class="bg-white inline-block py-2 align-middle md:px-3 lg:px-5 min-w-full">
                        @if ($roles)
                        @foreach ($roles as $item)                        
                                <button wire:click="assign_role('{{ $item->name }}')"
                                    class="custom-button bg-blue-500 text-white px-5 py-2 border-none cursor-pointer relative overflow-hidden rounded-full m-1"
                                    type="submit">
                                    {{ $item->name }}
                                    <span wire:ignore
                                        class="cross-icon absolute top-0 right-[-30px] w-30 h-full bg-green-500 text-white flex justify-center items-center transition-right duration-300"
                                        title="Assign"><ion-icon name="add-circle-outline"></ion-icon></span>
                                </button>
                        @endforeach
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
