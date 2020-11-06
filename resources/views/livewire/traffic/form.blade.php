<form wire:submit.prevent="save" enctype="multipart/form-data" method="post">

    @csrf

    <x-input.dropdown field="salesman" leadingAddOn="Salesman" multipleDropdown>
        @foreach(Config::get('constants.salesman') as $user)
            <option value="{{ $user }}">{{ $user }}</option>
        @endforeach
    </x-input.dropdown>

    <x-input.dropdown field="branch" leadingAddOn="Branch">
        <option value="Grand Rapids">Grand Rapids</option>
        <option value="Lansing">Lansing</option>
        <option value="New Hudson">New Hudson</option>
        <option value="Richmond">Richmond</option>
        <option value="Saginaw">Saginaw</option>
        <option value="Traverse City">Traverse City</option>
    </x-input.dropdown>

    <x-input.dropdown field="rerent" leadingAddOn="ReRent?">
        <option value="No">No</option>
        <option value="Yes">Yes</option>
    </x-input.dropdown>

    <x-input.dropdown field="io" leadingAddOn="I/O?">
        <option value="In">In</option>
        <option value="Out">Out</option>
    </x-input.dropdown>

    <x-input.dropdown field="make" leadingAddOn="Make">
        <option value="Deere">Deere</option>
        <option value="Komatsu">Komatsu</option>
        <option value="JCB">JCB</option>
        <option value="JLG">JLG</option>
        <option value="Att.">Att.</option>
        <option value="Atlas Copco">Atlas Copco</option>
        <option value="Broce">Broce</option>
        <option value="Generac">Generac</option>
        <option value="Godwin">Godwin</option>
        <option value="Hamm">Hamm</option>
        <option value="Hitachi">Hitachi</option>
        <option value="Morooka">Morooka</option>
        <option value="Sakai">Sakai</option>
        <option value="Sky Track">Sky Track</option>
        <option value="SuperPac">SuperPac</option>
        <option value="Terex">Terex</option>
        <option value="Truck">Truck</option>
        <option value="Wirtgen">Wirtgen</option>
    </x-input.dropdown>

    <x-input.formtext field="model" leadingAddOn="Model" />

    <x-input.formtext field="sn" leadingAddOn="S/N:" />

    <x-input.formtext field="hours" leadingAddOn="Hours" />

    <x-input.formtext field="fuel" leadingAddOn="Fuel" />

    <x-input.formtext field="attachments" leadingAddOn="Attachments" />

    <x-input.dropdown field="damages" leadingAddOn="Damages">
        <option value="No">No</option>
        <option value="Yes">Yes</option>
    </x-input.dropdown>

    <x-input.formtext field="customer" leadingAddOn="Customer" />

    <x-input.formtext field="comments" leadingAddOn="Comments" />

    <x-input.filepond wire:model="details" :uploadedFile="$uploadedFile" multiple />

    <span class="inline-flex rounded-md shadow-sm">
        <button class="inline-flex items-center px-6 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
            <!-- Heroicon name: mail -->
            <svg class="-ml-1 mr-3 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
            </svg>
        Save Traffic
        </button>
    </span>

</form>
