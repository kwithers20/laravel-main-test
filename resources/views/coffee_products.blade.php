<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All 📦 Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white mb-12 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('coffee.products.store') }}">
                        @csrf
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ __('Add new product') }}
                        </h2>
                        <div class="flex items-center justify-between mt-4">
                            <div class="flex items-center">
                                <div class="mr-2">
                                    <x-input id="name" class="block mt-1 border w-full text-sm p-2" type="text" name="name" placeholder="Product name" :value="old('name')" required />
                                </div>

                                <div>
                                    <x-input id="profit_margin" class="block mt-1 border w-full text-sm p-2" type="number" step="0.01" name="profit_margin" placeholder="Profit margin" :value="old('profit_margin')" required />
                                </div>
                            </div>
                            
                            <x-button class="ml-3">
                                {{ __('Add product') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>

            <x-table>
                <x-slot name="head">
                    <x-table-head-cell>
                        {{ __('Product Name') }}
                    </x-table-head-cell>
                    <x-table-head-cell>
                        {{ __('Profit Margin') }}
                    </x-table-head-cell>
                    <x-table-head-cell>
                        {{ __('Created At') }}
                    </x-table-head-cell>
                </x-slot>
                <x-slot name="body">
                    @forelse ($products as $product)
                        <tr>
                            <x-table-body-cell>
                                {{ $product->name }}
                            </x-table-body-cell>
                            <x-table-body-cell>
                                {{ number_format($product->profit_margin / 100, 2, '.', ',') }}
                            </x-table-body-cell>
                            <x-table-body-cell>
                                {{ $product->created_at->format('M d, Y') }}
                            </x-table-body-cell>
                        </tr>
                    @empty
                        <x-table-body-cell colspan="3">
                            {{ __('No products yet') }}
                        </x-table-body-cell>
                    @endforelse
                </x-slot>
            </x-table>
        </div>
    </div>
</x-app-layout>
