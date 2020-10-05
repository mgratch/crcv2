@props([
    'leadingAddOn' => false,
    'field'
])

<div class="pt-3">
    <div class="mt-1 flex rounded-md shadow-sm">
        @if($leadingAddOn)
            <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
                <label for="{{ $field }}" class="block text-sm font-medium leading-5 text-gray-700" style="visibility: none">{{ $leadingAddOn }}</label>
            </span>
        @endif
        <input
            wire:model.debounce.500ms="{{ $field }}"
            name="{{ $field }}"
            id="{{ $field }}"
            class="{{ $leadingAddOn ? 'rounded-none rounded-r-md' : '' }} form-input flex-1 block w-full px-3 py-2 sm:text-sm sm:leading-5"
        >
    </div>
    @error('{{ $field }}')<div class="mt-1 text-sm text-red-600" id="error">{{ $message }}</div>@enderror
</div>
