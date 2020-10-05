@push('headscripts')
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
@endpush

<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create New Traffic
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10">
                <div class="container">

                    <livewire:traffic.form :traffic="null"/>

                </div>
            </div>
        </div>
    </div>

    @push('bodyscripts')
        <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    @endpush

</x-app-layout>
