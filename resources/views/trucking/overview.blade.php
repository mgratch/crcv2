@push('headscripts')
@endpush
<x-layouts.user>

    <div class="sm:hidden">
        <select aria-label="Selected tab" class="form-select block w-full pl-3 pr-10 py-2 text-base leading-6 border-gray-300 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 transition ease-in-out duration-150">
            <option>Applied</option>

            <option>Phone Screening</option>

            <option selected>Interview</option>

            <option>Offer</option>

            <option>Hired</option>
        </select>
    </div>
    <!-- Tabs at small breakpoint and up -->
    <div class="hidden sm:block">
        <nav class="-mb-px flex space-x-4 pb-2 flex-wrap">
            @foreach($data as $table)
                <a href="#{{ $table['driver'] }}" class="pb-4 px-0 border-b-2 border-transparent font-medium text-sm leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300">
                    {{ $table['driver'] }}
                </a>
            @endforeach
        </nav>
    </div>

    @foreach($data as $table)
        <div class="border-b border-blue-600">
            <a name="{{ $table['driver'] }}">
                <h1 class="text-lg leading-6 font-lg text-gray-900 uppercase">
                    {{ $table['driver'] }}
                </h1>
            </a>
        </div>
        <div class="flex-col pt-2 pb-10">
            <x-table>
                <x-slot name="head">
                    <x-table.heading>Date</x-table.heading>
                    <x-table.heading>Order</x-table.heading>
                    <x-table.heading>Status</x-table.heading>
                    <x-table.heading>Type</x-table.heading>
                    <x-table.heading>Model</x-table.heading>
                    <x-table.heading>SN</x-table.heading>
                    <x-table.heading>From</x-table.heading>
                    <x-table.heading>City</x-table.heading>
                    <x-table.heading>To</x-table.heading>
                    <x-table.heading>City</x-table.heading>
                </x-slot>

                <x-slot name="body">
                    @foreach($table['truckings'] as $trucking)
                        <x-table.row
                            class="odd:bg-gray-100 hover:bg-yellow-100"
                            title="{{ $trucking->note }}"
                        >
                        <x-table.cell>{{ $trucking->trucking_date_requested }}</x-table.cell>
                        <x-table.cell>{{ $trucking->order }}</x-table.cell>
                        <x-table.cell>
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ App\Models\Trucking::SORTING[$trucking->sorting] }}">
                                    {{ $trucking->status }}
                                </span>
                        </x-table.cell>
                        <x-table.cell>{{ $trucking->type }}</x-table.cell>
                        <x-table.cell>{{ $trucking->model }}</x-table.cell>
                        <x-table.cell>{{ $trucking->sn }}</x-table.cell>
                        <x-table.cell>{{ $trucking->from_name }}</x-table.cell>
                        <x-table.cell>{{ $trucking->from_city }}</x-table.cell>
                        <x-table.cell>{{ $trucking->to_name }}</x-table.cell>
                        <x-table.cell>{{ $trucking->to_city }}</x-table.cell>
                        </x-table.row>
                    @endforeach
                </x-slot>
            </x-table>
        </div>
    @endforeach

    @push('bodyscripts')
    @endpush

</x-layouts.user>
