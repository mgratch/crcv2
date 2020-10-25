@push('headscripts')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
@endpush
<x-layouts.user>

    <livewire:traffic-table>

    @push('bodyscripts')
            <script src="https://unpkg.com/moment"></script>
            <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
    @endpush

</x-layouts.user>
