<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New ☕️ Sales') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @livewire('sale-calculator')

            <x-table>
                <x-slot name="head">
                    <x-table-head-cell>
                        {{ __('Product') }}
                    </x-table-head-cell>
                    <x-table-head-cell>
                        {{ __('Customer') }}
                    </x-table-head-cell>
                    <x-table-head-cell>
                        {{ __('Quantity') }}
                    </x-table-head-cell>
                    <x-table-head-cell>
                        {{ __('Unit cost') }}
                    </x-table-head-cell>
                    <x-table-head-cell>
                        {{ __('Selling price') }}
                    </x-table-head-cell>
                    <x-table-head-cell>
                        {{ __('Sold at') }}
                    </x-table-head-cell>
                </x-slot>
                <x-slot name="body">
                    @forelse ($sales as $sale)
                        <tr>
                            <x-table-body-cell>
                                {{ $sale->product->name }}
                            </x-table-body-cell>
                            <x-table-body-cell>
                                {{ $sale->customer->name }}
                            </x-table-body-cell>
                            <x-table-body-cell>
                                {{ $sale->quantity }}
                            </x-table-body-cell>
                            <x-table-body-cell>
                                {{ money($sale->unit_cost) }}
                            </x-table-body-cell>
                            <x-table-body-cell>
                                {{ money($sale->selling_price) }}
                            </x-table-body-cell>
                            <x-table-body-cell>
                                {{ $sale->created_at->format('Y-m-d H:i') }}
                            </x-table-body-cell>
                        </tr>
                    @empty
                        <x-table-body-cell colspan="6">
                            {{ __('No sales yet') }}
                        </x-table-body-cell>
                    @endforelse
                </x-slot>
            </x-table>
        </div>
    </div>
</x-app-layout>
