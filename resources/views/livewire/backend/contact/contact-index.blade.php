<div class="mt-8 flex flex-col">
    @push('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    @endpush
    <x-auth-session-status class="mb-4" :status="session('product_index')" />
    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

            <label for="perPage">Show:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <select class="w-[70px]" name="perPage" id="perPage" wire:model="perPage" x-init="$('#perPage').on('change', function() {
            
                @this.set('perPage', $(this).val()); // Update the Livewire property
                $wire.call('perPagechange', $(this).val());
            });">
                <option value="3" {{ $perPage == 3 ? 'selected' : '' }} selected>3</option>
                <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
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
                                Job Title
                            </th>
                            <th scope="col"
                                class="py-5 pl-4 pr-5 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                Full Name
                            </th>
                            <th scope="col"
                                class="py-5 pl-4 pr-5 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                Email
                            </th>
                            <th scope="col"
                                class="py-5 pl-4 pr-5 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                Address
                            </th>
                            <th scope="col"
                                class="py-5 pl-4 pr-5 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                Phone Number
                            </th>
                            <th scope="col"
                                class="py-5 pl-4 pr-5 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                Date of Birth
                            </th>
                            <th scope="col"
                                class="py-5 pl-4 pr-5 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                File
                            </th>                           
                            <th scope="col" class="relative py-5 pl-3 pr-4 sm:pr-6">Action</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200 bg-white">
                        @foreach ($contact as $key => $item)
                            <tr>
                                <td class="text-center">{{ $key + 1 + $start }}</td>
                                <td
                                    class="whitespace-normal py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 text-left">
                                    {{ $item->jobs->title }}
                                </td>
                                <td
                                    class="whitespace-normal py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 text-left">
                                    {{ $item->fullname }}
                                </td>
                                <td
                                    class="whitespace-normal py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 text-left">
                                    {{ $item->email }}
                                </td>
                                <td
                                    class="whitespace-normal py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 text-left">
                                    {{ $item->address }}
                                </td>

                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    {{ $item->tel }}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    {{ $item->date_of_birth }}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    @php
                                        $extension = pathinfo($item->file, PATHINFO_EXTENSION);
                                    @endphp
                                
                                    @if (strtolower($extension) === 'pdf')
                                        <i class="far fa-file-pdf"></i> <!-- Assuming you have Font Awesome for icons -->
                                    @elseif (in_array(strtolower($extension), ['doc', 'docx']))
                                        <i class="far fa-file-word"></i> <!-- Assuming you have Font Awesome for icons -->
                                    @else
                                        <i class="far fa-file"></i> <!-- Generic file icon for unknown types -->
                                    @endif
                                
                                    <a href="{{ Storage::url('/career/cv/'.$item->file ) }}" target="_blank">{{ $item->file }}</a>
                                </td>
                                <td
                                    class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                    <div class="grid items-center justify-center">
                                        <button wire:confirm.prompt="Are you sure?\n\nType DELETE to confirm|DELETE"
                                            wire:click="delete({{ $item->id }})"
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
            @if ($contact instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator)
                <div class="mb-5">
                    {{ $contact->links() }}
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
