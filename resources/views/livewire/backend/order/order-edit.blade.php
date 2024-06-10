<div class="mb-8 flex justify-center">
    <form wire:submit.prevent="update">
        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 space-y-6 sm:p-6">
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Update Order Name Address Phone
                    </h3>
                    <p class="mt-1 text-sm text-gray-500">
                        Use this form to update order name address phone.
                    </p>
                </div>
                <x-auth-session-status class="mb-4" :status="session('orderEdit')" />
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-6">
                        <label for="name" class="block text-sm font-medium text-gray-700 text-left">Name:<span
                                class="text-red-500">*</span></label>
                        <input wire:model.blur="name" type="text" id="name" name="name"
                            placeholder="Name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                        <div class="text-red-500">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-6 sm:col-span-6">
                        <label for="phone" class="block text-sm font-medium text-gray-700 text-left">Phone:<span
                                class="text-red-500">*</span></label>
                        <input wire:model.blur="phone" type="text" id="phone" name="phone"
                            placeholder="phone  . . ."
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                        <div class="text-red-500">
                            @error('phone')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-6 sm:col-span-6">
                        <label for="address" class="block text-sm font-medium text-gray-700 text-left">Address:<span
                                class="text-red-500">*</span></label>
                        <input wire:model.blur="address" type="text" id="address" name="address"
                            placeholder="address  . . ."
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                        <div class="text-red-500">
                            @error('address')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-6 sm:col-span-6">
                        <label for="note" class="block text-sm font-medium text-gray-700 text-left">Note:<span
                                class="text-red-500">*</span></label>
                        
                            <textarea wire:model.blur="note" type="text" id="note" name="note"
                            placeholder="note  . . ."
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" ></textarea>
                        <div class="text-red-500">
                            @error('note')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-6">
                        <label for="deliverycharge" class="block text-sm font-medium text-gray-700">deliverycharge:(%)</label>
                        <input wire:model.blur="deliverycharge" type="number" id="deliverycharge"
                            placeholder="deliverycharge(মূল্য ছাড়) %" oninput="validity.valid||(value='0');" min="0"
                            max="100"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                        <span class="text-gray-400 text-xs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Integer( পূর্ণ সংখ্যা
                            )</span>
                        <div class="text-red-500">
                            @error('deliverycharge')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    
                    <div class="your-order-table table-responsive">
                        <table class="table min-w-[1000px]">
                            <thead>
                                <tr>
                                    <th class="product-name">Product</th>
                                    <th class="product-total">Subtotal</th>
                                </tr>
                            </thead>
                            @forelse (unserialize($carts) as $cart)
                                <tbody>
                                    <tr>
                                       
                                        <td class="product-name">
                                            
                                                <img src="{{ Storage::url($cart->options->image) }}" alt="" style="width: 100px;">
                                            @if(session()->get('language') == 'bangla') 
                                            <button wire:click="remove('{{ $cart->rowId }}')" class="bg-red-600 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" type="button" id="decrementBtn">X</button> {{ $cart->options->name_bn }} - ({{ $cart->options->code }}) ×  <button wire:click="decriment('{{ $cart->rowId }}')" class="bg-teal-600 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500" type="button" id="decrementBtn">-</button> {{ $cart->qty }}  <button wire:click="incriment('{{ $cart->rowId }}')" class="bg-green-600 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500" type="button" id="incrementBtn">+</button>
                                            @else 
                                            <button wire:click="remove('{{ $cart->rowId }}')" class="bg-red-600 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" type="button" id="decrementBtn">X</button> {{ $cart->name }} - ({{ $cart->options->code }}) ×  <button wire:click="decriment('{{ $cart->rowId }}')" class="bg-teal-600 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500" type="button" id="decrementBtn">-</button> {{ $cart->qty }}  <button wire:click="incriment('{{ $cart->rowId }}')" class="bg-green-600 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500" type="button" id="incrementBtn">+</button>
                                            @endif
                                        
                                        </td>
                                        @if ($cart->options->discount != null)
                                            @php
                                                $originalPrice = $cart->price;
                                                $discountPercentage = $cart->options->discount;                                            
                                                $discountedAmount = $originalPrice * ($discountPercentage / 100);                                            
                                                $discountedPrice = $originalPrice - $discountedAmount;                                             
                                                $discountedPrice = round($discountedPrice, 2);
                                            @endphp
                                            <td class="product-total">৳{{ round($discountedPrice) * $cart->qty }}</td>
                                        @else
                                            <td class="product-total">৳{{ $cart->price * $cart->qty }}</td>
                                        @endif
                                    </tr>
                                </tbody>
                            @empty
                            @endforelse
                            
                        </table>
                    </div>
                </div>
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6 flex justify-between">
                <a href="{{ route('pending.index') }}" as="button"
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
