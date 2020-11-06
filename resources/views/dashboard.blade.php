<x-layouts.user>
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
                    <x-table.heading>Truck</x-table.heading>
                </x-slot>

                <x-slot name="body">
                    @foreach($truckings as $trucking)
                        <x-table.row
                            class="odd:bg-gray-100 hover:bg-blue-200"
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
                            <x-table.cell>{{ $trucking->truck }}</x-table.cell>
                        </x-table.row>
                    @endforeach
                </x-slot>
            </x-table>
        </div>

{{--    <div class="flex-col pt-2 pb-10">--}}
{{--        <x-table>--}}
{{--            <x-slot name="head">--}}
{{--                <x-table.heading>Date</x-table.heading>--}}
{{--                <x-table.heading>Branch</x-table.heading>--}}
{{--                <x-table.heading>I/O</x-table.heading>--}}
{{--                <x-table.heading>Make</x-table.heading>--}}
{{--                <x-table.heading>Model</x-table.heading>--}}
{{--                <x-table.heading>S/N</x-table.heading>--}}
{{--                <x-table.heading>Hours</x-table.heading>--}}
{{--                <x-table.heading>Fuel</x-table.heading>--}}
{{--                <x-table.heading>Attachments</x-table.heading>--}}
{{--                <x-table.heading>Damages</x-table.heading>--}}
{{--                <x-table.heading>Customer</x-table.heading>--}}
{{--            </x-slot>--}}

{{--            <x-slot name="body">--}}
{{--                @foreach($traffics as $traffic)--}}
{{--                    <x-table.row--}}
{{--                        class="odd:bg-gray-100 hover:bg-blue-200"--}}
{{--                    >--}}
{{--                        <x-table.cell></x-table.cell>--}}
{{--                        <x-table.cell>{{ $traffic->branch }}</x-table.cell>--}}
{{--                        <x-table.cell>{{ $traffic->io }}</x-table.cell>--}}
{{--                        <x-table.cell>{{ $traffic->make['id'] }}</x-table.cell>--}}
{{--                        <x-table.cell>{{ $traffic->model }}</x-table.cell>--}}
{{--                        <x-table.cell>{{ $traffic->sn }}</x-table.cell>--}}
{{--                        <x-table.cell>{{ $traffic->hours }}</x-table.cell>--}}
{{--                        <x-table.cell>{{ $traffic->fuel }}</x-table.cell>--}}
{{--                        <x-table.cell>{{ $traffic->attachments }}</x-table.cell>--}}
{{--                        <x-table.cell>{{ $traffic->damages }}</x-table.cell>--}}
{{--                        <x-table.cell>{{ $traffic->customer }}</x-table.cell>--}}
{{--                    </x-table.row>--}}
{{--                @endforeach--}}
{{--            </x-slot>--}}
{{--        </x-table>--}}
{{--    </div>--}}

</x-layouts.user>
