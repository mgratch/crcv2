@props([
    'leadingAddOn' => false,
    'multipleDropdown',
    'field'
])

<div class="pt-3">
    <div class="mt-1 flex rounded-md shadow-sm">
        @if($leadingAddOn)
            <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
                <label for="damages" class="block text-sm font-medium leading-5 text-gray-700" style="visibility: none">{{ $leadingAddOn }}</label>
            </span>
        @endif

        <select
            @isset($multipleDropdown) multiple @endif
            wire:model.lazy="{{ $field }}"
            name="{{ $field }}"
            id="{{ $field }}"
            class="form-select block w-full pl-3 pr-10 py-2 text-base leading-6 rounded-l-none border-gray-300 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"
        >
            {{ $slot }}
        </select>
    </div>
    @error('{{ $field }}')<div class="mt-2 text-sm text-red-600" id="error">{{ $message }}</div>@enderror
</div>
