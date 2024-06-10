<div class="mt-8 flex flex-col 2xl:w-[1480px]">
    <x-auth-session-status class="mb-4" :status="session('pendingOrder')" />
    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
            <label for="perPage">Show:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <select class="w-[70px]" name="perPage" id="perPage" wire:model="perPage" x-init="$('#perPage').on('change', function() {
            
                @this.set('perPage', $(this).val()); // Update the Livewire property
                $wire.call('perPagechange', $(this).val());
            });">
                <option value="3" {{ $perPage == 3 ? 'selected' : '' }} selected>3</option>
                <option value="25" {{ $perPage == 25 ? 'selected' : '' }}>25</option>
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

                    <thead class="bg-gray-50 m-5 p-5">
                        <tr>
                            <th scope="col"
                                class="py-5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6"
                                style="padding: 25px">
                                NO:
                            </th>
                            <th scope="col"
                            class="py-5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6"
                            style="padding: 25px">
                            Order ID:
                            </th>
                            <th scope="col"
                                class="py-5 pl-4 pr-5 text-left text-sm font-semibold text-gray-900 sm:pl-6 ">
                                Code
                            </th>
                            <th scope="col"
                                class="py-5 pl-4 pr-5 text-left text-sm font-semibold text-gray-900 sm:pl-6 ">
                                Name
                            </th>
                            <th scope="col"
                                class="py-5 pl-4 pr-5 text-left text-sm font-semibold text-gray-900 sm:pl-6 ">
                                Phone
                            </th>
                            <th scope="col"
                                class="py-5 pl-4 pr-5 text-left text-sm font-semibold text-gray-900 sm:pl-6 ">
                                Address
                            </th>
                           
                            <th scope="col"
                                class="py-5 pl-4 pr-5 text-left text-sm font-semibold text-gray-900 sm:pl-6 ">
                                Note
                            </th>
                            <th scope="col"
                                class="py-5 pl-4 pr-5 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                Cart Item
                            </th>
                            <th scope="col"
                                class="py-5 pl-4 pr-5 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                Order Complete Datetime
                            </th>
                            <th scope="col"
                                class="py-5 pl-4 pr-5 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                Quantity
                            </th>
                            <th scope="col"
                                class="py-5 pl-4 pr-5 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                Total
                            </th>
                            <th scope="col"
                                class="py-5 pl-4 pr-5 text-left text-sm font-semibold text-gray-900 sm:pl-6 ">
                                Delivery Charge
                            </th>                         
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        @foreach ($orders as $key => $order)
                            <tr>
                                <td class="text-center">{{ $key + 1 }}</td>
                                <td class="text-center">{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-xl text-gray-500">
                                    {{ $order->code }} 
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-xl text-gray-500">
                                    {{ $order->name }} 
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-xl text-gray-500">
                                    {{ $order->phone }} 
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-xl text-gray-500">
                                    {{ $order->address }} 
                                </td>
                                
                                <td class="whitespace-nowrap px-3 py-4 text-xl text-gray-500">
                                    {!! $order->note !!} 
                                </td>
                                <td
                                    class="whitespace-normal py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 text-left">
                                    @php
                                        $totalqty = 0; // Initialize total before the loop
                                    @endphp

                                    @foreach (unserialize($order->cart) as $cart)
                                        @php
                                            $totalqty += $cart->qty; // Accumulate the quantities
                                        @endphp
                                        <h1 class="text-neutral-950 text-left text-xl font-normal">
                                            {{ $cart->qty }}X{{ $cart->name }}</h1>
                                    @endforeach
                                </td>
                                <td
                                    class="whitespace-normal py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 text-left">
                                    {{ Carbon\Carbon::parse($order->order_complete_datetime)->format('D, M j, Y g:i A') }}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    <h1 class="text-neutral-950 text-left text-xl font-normal">
                                        {{ $totalqty }}
                                    </h1>
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-xl text-gray-500">
                                    {{ $order->total }} Taka
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-xl text-gray-500">
                                    {{ $order->deliverycharge }} Taka
                                </td>
                               
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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
        </div>
    </div>
</div>
