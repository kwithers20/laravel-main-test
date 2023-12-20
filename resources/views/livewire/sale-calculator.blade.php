<div class="bg-white mb-12 overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 bg-white border-b border-gray-200">
        <form wire:submit="save">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Record a new sale') }}
            </h2>
            <div class="flex items-center justify-between mt-4">
                <div>
                    <x-select-input wire:model="product_id" wire:click.debounce.500ms="calculate" class="block mt-1 border w-full text-sm pr-8" name="product_id" :value="old('product_id')" required>
                        <option value="">Select a product</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </x-select-input>
                    @error('product_id') <span class="text-sm text-red-700 font-bold">{{ $message }}</span> @enderror
                </div>
                <div>
                    <x-input wire:model="quantity" wire:keyup.debounce.500ms="calculate" class="block mt-1 border w-full text-sm p-2" type="number" step="1" name="quantity" placeholder="Quantity" :value="old('name')" required />
                    @error('quantity') <span class="text-sm text-red-700 font-bold">{{ $message }}</span> @enderror
                </div>
                <div>
                    <x-input wire:model="unit_cost" wire:keyup.debounce.500ms="calculate" class="block mt-1 border w-full text-sm p-2" type="number" name="unit_cost" step="0.01" placeholder="Unit cost (£)" :value="old('unit_cost')" required />
                    @error('unit_cost') <span class="text-sm text-red-700 font-bold">{{ $message }}</span> @enderror
                </div>
                <div>
                    <span class="font-bold text-xs">Selling Price:</span><br>
                    {{ money($sellingPrice, 'GBP', true) }}
                </div>
                <div>
                    <x-select-input wire:model="customer_id" wire:click.debounce.500ms="calculate" class="block mt-1 border w-full text-sm pr-8" name="customer_id" :value="old('customer_id')" required>
                        <option value="">Select a customer</option>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                    </x-select-input>
                    @error('customer_id') <span class="text-sm text-red-700 font-bold">{{ $message }}</span> @enderror
                </div>
                <x-button class="ml-3">
                    {{ __('Record Sale') }}
                </x-button>
            </div>
        </form>
    </div>
</div>
