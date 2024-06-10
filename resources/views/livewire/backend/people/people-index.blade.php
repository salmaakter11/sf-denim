<div class="mt-8 flex flex-col">
    <x-auth-session-status class="mb-4" :status="session('people_index')" />
    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

            <label for="perPage">Show:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <select class="w-[70px]" name="perPage" id="perPage" wire:model="perPage" x-init="$('#perPage').on('change', function() {
            
                @this.set('perPage', $(this).val()); // Update the Livewire property
                $wire.call('perPagechange', $(this).val());
            });">
                <option value="10" {{ $perPage == 10 ? 'selected' : '' }} selected>10</option>
                <option value="50" {{ $perPage == 50 ? 'selected' : '' }}>50</option>
                <option value="100" {{ $perPage == 100 ? 'selected' : '' }}>100</option>
            </select>

            <div class="grid grid-cols-6 gap-6 mb-5">
                <div class="col-span-3 sm:col-span-3 flex justify-start">
                    <p class="text-sm text-gray-700 leading-5">
                        <span>Showing</span>
                        <span class="font-medium">{{ $start + 1 }}</span>
                        <span>to</span>
                        <span class="font-medium">{{ $end > $total ? $total : $end }}</span>
                        <span>of</span>
                        <span class="font-medium">{{ $total }}</span>
                        <span>results</span>
                    </p>
                </div>

                <div class="pagination flex justify-end col-span-3 sm:col-span-3 gap-1">
                    @if ($total > $perPage)
                        @if ($currentPage > 3)
                            <button wire:click="paginate(0)"
                                class="{{ $start / $perPage == 0 ? 'bg-gray-600' : 'bg-indigo-600' }} inline-flex items-center justify-center rounded-md border border-transparent px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                                1
                            </button>
                        @endif
                        @for ($i = max(0, $currentPage - 3); $i < min($currentPage + 3, ceil($total / $perPage)); $i++)
                            <button wire:click="paginate({{ $i }})"
                                class="{{ $start / $perPage == $i ? 'bg-gray-600' : 'bg-indigo-600' }} inline-flex items-center justify-center rounded-md border border-transparent  px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                                {{ $i + 1 }}
                            </button>
                        @endfor
                        @if ($total / $perPage > $currentPage + 3)
                            <button wire:click="paginate({{ ceil($total / $perPage) - 1 }})"
                                class="{{ $start / $perPage == ceil($total / $perPage) - 1 ? 'bg-gray-600' : 'bg-indigo-600' }} inline-flex items-center justify-center rounded-md border border-transparent px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                                {{ ceil($total / $perPage) }}
                            </button>
                        @endif

                    @endif
                </div>

            </div>
            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                <table class="min-w-full divide-y divide-gray-300 m-25 p-25">
                    <div class="w-full flex justify-center">
                    </div>
                    <thead class="bg-gray-50 m-5 p-5">
                        <tr>
                            <th scope="col"
                                class="py-5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6"
                                style="padding: 25px">
                                NO:
                            </th>
                            <th scope="col"
                                class="py-5 pl-4 pr-5 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                Name
                            </th>
                            <th scope="col"
                                class="py-5 pl-4 pr-5 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                Designation
                            </th>
                            <th scope="col"
                                class="py-5 pl-4 pr-5 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                Group
                            </th>
                            <th scope="col"
                                class="py-5 pl-4 pr-5 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                Image
                            </th>
                            <th scope="col"
                                class="py-5 pl-4 pr-5 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                Priority
                            </th>
                            <th scope="col" class="relative py-5 pl-3 pr-4 sm:pr-6">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        @foreach ($people as $key => $people)
                            <tr>
                                <td class="text-center">{{ $key + 1 + $start }}</td>
                                <td
                                    class="whitespace-normal py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 text-left">
                                    {{ $people->name }}
                                </td>
                                <td
                                class="whitespace-normal py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 text-left">
                                {{ $people->designation }}
                            </td>
                            <td
                                class="whitespace-normal py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 text-left">
                                {{ ucfirst($people->group) }}
                            </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    @if ($people->image == '' || $people->image == null)
                                        <img src="{{ asset('upload/no_image.jpg') }}" style="height: 50px; width:70px;"
                                            alt="No Image">
                                    @else
                                        <img src="{{ URL::to('storage/' . $people->image) }}"
                                            style="height: 50px; width:70px;">
                                    @endif
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $people->priority }}
                                </td>
                                <td
                                    class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                    <div class="flex items-center justify-center">

                                        @if ($people->status == 1)
                                            <button wire:click="activate({{ $people->id }})"
                                                class="inline-flex items-center justify-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:w-auto"
                                                style="margin: 5px">
                                                DEACTIVATE
                                            </button>
                                        @else
                                            <button wire:click="activate({{ $people->id }})"
                                                class="inline-flex items-center justify-center rounded-md border border-transparent bg-green-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 sm:w-auto"
                                                style="margin: 5px">
                                                ACTIVATE
                                            </button>
                                        @endif


                                        <a href="{{ route('people.edit', $people->id) }}" as="button"
                                            class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto"
                                            style="margin: 5px">
                                            Edit
                                        </a>


                                        <button wire:confirm.prompt="Are you sure?\n\nType DELETE to confirm|DELETE"
                                            wire:click="delete({{ $people->id }})"
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

            @if ($people instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator)
                <div class="mb-5">
                    {{ $people->links() }}
                </div>
            @endif
            <div>
                <p class="text-sm text-gray-700 leading-5">
                    <span>Showing</span>
                    <span class="font-medium">{{ $start + 1 }}</span>
                    <span>to</span>
                    <span class="font-medium">{{ $end > $total ? $total : $end }}</span>
                    <span>of</span>
                    <span class="font-medium">{{ $total }}</span>
                    <span>results</span>
                </p>
            </div>
            <div class="pagination flex justify-center col-span-3 sm:col-span-3 gap-1">
                @if ($total > $perPage)
                    @if ($currentPage > 3)
                        <button wire:click="paginate(0)"
                            class="{{ $start / $perPage == 0 ? 'bg-gray-600' : 'bg-indigo-600' }} inline-flex items-center justify-center rounded-md border border-transparent px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                            1
                        </button>
                    @endif

                    @for ($i = max(0, $currentPage - 3); $i < min($currentPage + 3, ceil($total / $perPage)); $i++)
                        <button wire:click="paginate({{ $i }})"
                            class="{{ $start / $perPage == $i ? 'bg-gray-600' : 'bg-indigo-600' }} inline-flex items-center justify-center rounded-md border border-transparent  px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                            {{ $i + 1 }}
                        </button>
                    @endfor
                    @if ($total / $perPage > $currentPage + 3)
                        <button wire:click="paginate({{ ceil($total / $perPage) - 1 }})"
                            class="{{ $start / $perPage == ceil($total / $perPage) - 1 ? 'bg-gray-600' : 'bg-indigo-600' }} inline-flex items-center justify-center rounded-md border border-transparent px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                            {{ ceil($total / $perPage) }}
                        </button>
                    @endif
                @endif
            </div>
        </div>
    </div>
</div>
