<div class="block justify-center ">
    <div class="flex flex-col">
        <x-auth-session-status class="mb-4" :status="session('rolelist')" />
        <div class="overflow-x-auto">
            <div class="inline-block py-2 align-middle md:px-3 lg:px-5">
                <div class="shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <table class="table-auto min-w-full mx-auto shadow-lg shadow-purple-500/50">
                        <thead class="bg-gray-50 m-5 p-5">
                            <tr>
                                <th scope="col"
                                    class="py-5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6"
                                    style="padding: 25px">
                                    NO:
                                </th>
                                <th scope="col"
                                    class="py-5 pl-4 pr-5 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                    Role Name
                                </th>
                                <th scope="col" class="relative py-5 pl-3 pr-4 sm:pr-6">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach ($roles as $key => $role)
                                <tr>
                                    <td class="text-center">{{ $key + 1 }}</td>
                                    <td
                                        class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                        {{ $role->name }}
                                    </td>
                                   
                                    <td
                                        class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                        <div class="flex items-center justify-between">
                                           
                                            <a wire:navigate.hover href="{{ route('role.edit' , $role) }}"
                                                as="button"
                                                class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto"
                                                style="margin: 5px">
                                                Edit
                                            </a>
                                           

                                            <button wire:confirm.prompt="Are you sure?\n\nType DELETE to confirm|DELETE"
                                                wire:click="delete({{ $role }})"
                                                class="inline-flex items-center justify-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:w-auto"
                                                style="margin: 5px">
                                                Delete
                                            </button>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-5" onclick="scrolLDown()">
                    {{ $roles->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
