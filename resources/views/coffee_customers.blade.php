<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All 👤 Customers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white mb-12 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('coffee.customers.store') }}">
                        @csrf
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ __('Add new customer') }}
                        </h2>
                        <div class="flex items-center justify-between mt-4">
                            <div>
                                <x-input id="name" class="block mt-1 border w-full text-sm p-2" type="text" name="name" placeholder="Customer name" :value="old('name')" required />
                            </div>
                            <div>
                                <x-input id="company" class="block mt-1 border w-full text-sm p-2" type="text" name="company" placeholder="Company name" :value="old('company')" required />
                            </div>
                            <div>
                                <x-input id="email" class="block mt-1 border w-full text-sm p-2" type="email" name="email" placeholder="Email" :value="old('email')" required />
                            </div>
                            <div>
                                <x-input id="phone" class="block mt-1 border w-full text-sm p-2" type="text" name="phone" placeholder="Phone" :value="old('phone')" required />
                            </div>
                            <x-button class="ml-3">
                                {{ __('Add customer') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>

            <x-table>
                <x-slot name="head">
                    <x-table-head-cell>
                        {{ __('Name') }}
                    </x-table-head-cell>
                    <x-table-head-cell>
                        {{ __('Company') }}
                    </x-table-head-cell>
                    <x-table-head-cell>
                        {{ __('Email') }}
                    </x-table-head-cell>
                    <x-table-head-cell>
                        {{ __('Phone') }}
                    </x-table-head-cell>
                </x-slot>
                <x-slot name="body">
                    @forelse ($customers as $customer)
                        <tr>
                            <x-table-body-cell>
                                {{ $customer->name }}
                            </x-table-body-cell>
                            <x-table-body-cell>
                                {{ $customer->company }}
                            </x-table-body-cell>
                            <x-table-body-cell>
                                {{ $customer->email }}
                            </x-table-body-cell>
                            <x-table-body-cell>
                                {{ $customer->phone }}
                            </x-table-body-cell>
                        </tr>
                    @empty
                        <x-table-body-cell colspan="4">
                            {{ __('No customers yet') }}
                        </x-table-body-cell>
                    @endforelse
                </x-slot>
            </x-table>
        </div>
    </div>
</x-app-layout>
