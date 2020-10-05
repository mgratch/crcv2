@csrf

<div class="pt-3">
    <div class="mt-1 flex rounded-md shadow-sm">
            <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
                <label style="visibility: none" for="salesman">Salesman</label>
            </span>
        <select multiple name="salesman[]" id="salesman" class="form-select block w-full pl-3 pr-10 py-2 text-base leading-6 rounded-l-none border-gray-300 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" value="{{ old('salesman') }}" autocomplete="off" autofocus>
            @foreach($users as $user)
                <option value="{{ $user }}" @if(in_array($user, $salesman)) selected="true" @endif>{{ $user }}</option>
            @endforeach
        </select>
    </div>
    @error('salesman')
    <p class="mt-2 text-sm text-red-600" id="error">{{ $message }}</p>
    @enderror
</div>

<div class="pt-3">
    <div class="mt-1 flex rounded-md shadow-sm">
    <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
        <label for="branch" class="block text-sm font-medium leading-5 text-gray-700" style="visibility: none">Branch</label>
    </span>
        <select name="branch" id="branch" class="form-select block w-full pl-3 pr-10 py-2 text-base leading-6 rounded-l-none border-gray-300 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
            <option value="Grand Rapids"
            @if(is_null($traffic->branch))
                {{ auth()->user()->branch == 'Grand Rapids' ? 'selected' : '' }}
                @else
                {{ $traffic->branch == 'Grand Rapids' ? 'selected' : '' }}
                @endif>Grand Rapids</option>
            <option value="Lansing"
            @if(is_null($traffic->branch))
                {{ auth()->user()->branch == 'Lansing' ? 'selected' : '' }}
                @else
                {{ $traffic->branch == 'Lansing' ? 'selected' : '' }}
                @endif>Lansing</option>
            <option value="New Hudson"
            @if(is_null($traffic->branch))
                {{ auth()->user()->branch == 'New Hudson' ? 'selected' : '' }}
                @else
                {{ $traffic->branch == 'New Hudson' ? 'selected' : '' }}
                @endif>New Hudson</option>
            <option value="Richmond"
            @if(is_null($traffic->branch))
                {{ auth()->user()->branch == 'Richmond' ? 'selected' : '' }}
                @else
                {{ $traffic->branch == 'Richmond' ? 'selected' : '' }}
                @endif>Richmond</option>
            <option value="Saginaw"
            @if(is_null($traffic->branch))
                {{ auth()->user()->branch == 'Saginaw' ? 'selected' : '' }}
                @else
                {{ $traffic->branch == 'Saginaw' ? 'selected' : '' }}
                @endif>Saginaw</option>
            <option value="Traverse City"
            @if(is_null($traffic->branch))
                {{ auth()->user()->branch == 'Traverse City' ? 'selected' : '' }}
                @else
                {{ $traffic->branch == 'Traverse City' ? 'selected' : '' }}
                @endif>Traverse City</option>
        </select>
    </div>
    @error('rerent')
    <p class="mt-2 text-sm text-red-600" id="error">{{ $message }}</p>
    @enderror
</div>

<div class="pt-3">
    <div class="mt-1 flex rounded-md shadow-sm">
    <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
        <label for="rerent" class="block text-sm font-medium leading-5 text-gray-700" style="visibility: none">ReRent?</label>
    </span>
        <select name="rerent" id="rerent" class="form-select block w-full pl-3 pr-10 py-2 text-base leading-6 rounded-l-none border-gray-300 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
            <option value="No" {{ $traffic->rerent == 'No' ? 'selected' : ''  }}>No</option>
            <option value="Yes" {{ $traffic->rerent == 'Yes' ? 'selected' : ''  }}>Yes</option>
        </select>
    </div>
    @error('rerent')
    <p class="mt-2 text-sm text-red-600" id="error">{{ $message }}</p>
    @enderror
</div>

<div class="pt-3">
    <div class="mt-1 flex rounded-md shadow-sm">
    <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
        <label for="io" class="block text-sm font-medium leading-5 text-gray-700" style="visibility: none">I/O?</label>
    </span>
        <select name="io" id="io" class="form-select block w-full pl-3 pr-10 py-2 text-base leading-6 rounded-l-none border-gray-300 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
            <option value="In" {{ $traffic->io == 'In' ? 'selected' : ''  }}>In</option>
            <option value="Out" {{ $traffic->io == 'Out' ? 'selected' : ''  }}>Out</option>
        </select>
    </div>
    @error('io')
    <p class="mt-2 text-sm text-red-600" id="error">{{ $message }}</p>
    @enderror
</div>

<div class="pt-3">
    <div class="mt-1 flex rounded-md shadow-sm">
    <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
        <label for="make" class="block text-sm font-medium leading-5 text-gray-700" style="visibility: none">Make</label>
    </span>
        <select name="make" id="make" class="form-select block w-full pl-3 pr-10 py-2 text-base leading-6 rounded-l-none border-gray-300 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
            <option value="Deere" {{ $traffic->make == 'Deere' ? 'selected' : ''  }}>Deere</option>
            <option value="Komatsu" {{ $traffic->make == 'Komatsu' ? 'selected' : ''  }}>Komatsu</option>
            <option value="JCB" {{ $traffic->make == 'JCB' ? 'selected' : ''  }}>JCB</option>
            <option value="JLG" {{ $traffic->make == 'JLG' ? 'selected' : ''  }}>JLG</option>
            <option value="Att." {{ $traffic->make == 'Att.' ? 'selected' : ''  }}>Att.</option>
            <option value="Atlas Copco" {{ $traffic->make == 'Atlas Copco' ? 'selected' : ''  }}>Atlas Copco</option>
            <option value="Broce" {{ $traffic->make == 'Broce' ? 'selected' : ''  }}>Broce</option>
            <option value="Generac" {{ $traffic->make == 'Generac' ? 'selected' : ''  }}>Generac</option>
            <option value="Godwin" {{ $traffic->make == 'Godwin' ? 'selected' : ''  }}>Godwin</option>
            <option value="Hamm" {{ $traffic->make == 'Hamm' ? 'selected' : ''  }}>Hamm</option>
            <option value="Hitachi" {{ $traffic->make == 'Hitachi' ? 'selected' : ''  }}>Hitachi</option>
            <option value="Morooka" {{ $traffic->make == 'Morooka' ? 'selected' : ''  }}>Morooka</option>
            <option value="Sakai" {{ $traffic->make == 'Sakai' ? 'selected' : ''  }}>Sakai</option>
            <option value="Sky Track" {{ $traffic->make == 'Sky Track' ? 'selected' : ''  }}>Sky Track</option>
            <option value="SuperPac" {{ $traffic->make == 'SuperPac' ? 'selected' : ''  }}>SuperPac</option>
            <option value="Terex" {{ $traffic->make == 'Terex' ? 'selected' : ''  }}>Terex</option>
            <option value="Truck" {{ $traffic->make == 'Truck' ? 'selected' : ''  }}>Truck</option>
            <option value="Wirtgen" {{ $traffic->make == 'Wirtgen' ? 'selected' : ''  }}>Wirtgen</option>
        </select>
    </div>
    @error('make')
    <p class="mt-2 text-sm text-red-600" id="error">{{ $message }}</p>
    @enderror
</div>

<div class="pt-3">
    <div class="mt-1 flex rounded-md shadow-sm">
    <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
        <label for="model" class="block text-sm font-medium leading-5 text-gray-700" style="visibility: none">Model</label>
    </span>
        <input name="model" id="model" class="form-input flex-1 block w-full px-3 py-2 rounded-none rounded-r-md sm:text-sm sm:leading-5" value="{{ old('model') ?? $traffic->model }}">
    </div>
    @error('model')
    <p class="mt-2 text-sm text-red-600" id="error">{{ $message }}</p>
    @enderror
</div>

<div class="pt-3">
    <div class="mt-1 flex rounded-md shadow-sm">
    <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
        <label for="sn" class="block text-sm font-medium leading-5 text-gray-700" style="visibility: none">S/N:</label>
    </span>
        <input name="sn" id="sn" class="form-input flex-1 block w-full px-3 py-2 rounded-none rounded-r-md sm:text-sm sm:leading-5" value="{{ old('model') ?? $traffic->sn }}">
    </div>
    @error('sn')
    <p class="mt-2 text-sm text-red-600" id="error">{{ $message }}</p>
    @enderror
</div>

<div class="pt-3">
    <div class="mt-1 flex rounded-md shadow-sm">
    <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
        <label for="hours" class="block text-sm font-medium leading-5 text-gray-700" style="visibility: none">Hours</label>
    </span>
        <input name="hours" id="hours" class="form-input flex-1 block w-full px-3 py-2 rounded-none rounded-r-md sm:text-sm sm:leading-5" value="{{ old('model') ?? $traffic->hours }}">
    </div>
    @error('hours')
    <p class="mt-2 text-sm text-red-600" id="error">{{ $message }}</p>
    @enderror
</div>

<div class="pt-3">
    <div class="mt-1 flex rounded-md shadow-sm">
    <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
        <label for="fuel" class="block text-sm font-medium leading-5 text-gray-700" style="visibility: none">Fuel</label>
    </span>
        <input name="fuel" id="fuel" class="form-input flex-1 block w-full px-3 py-2 rounded-none rounded-r-md sm:text-sm sm:leading-5" value="{{ old('model') ?? $traffic->fuel }}">
    </div>
    @error('fuel')
    <p class="mt-2 text-sm text-red-600" id="error">{{ $message }}</p>
    @enderror
</div>

<div class="pt-3">
    <div class="mt-1 flex rounded-md shadow-sm">
    <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
        <label for="attachments" class="block text-sm font-medium leading-5 text-gray-700" style="visibility: none">Attachments</label>
    </span>
        <input name="attachments" id="attachments" class="form-input flex-1 block w-full px-3 py-2 rounded-none rounded-r-md sm:text-sm sm:leading-5" value="{{ old('model') ?? $traffic->attachments }}">
    </div>
    @error('attachments')
    <p class="mt-2 text-sm text-red-600" id="error">{{ $message }}</p>
    @enderror
</div>

<div class="pt-3">
    <div class="mt-1 flex rounded-md shadow-sm">
    <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
        <label for="damages" class="block text-sm font-medium leading-5 text-gray-700" style="visibility: none">Damages</label>
    </span>
        <select name="damages" id="damages" class="form-select block w-full pl-3 pr-10 py-2 text-base leading-6 rounded-l-none border-gray-300 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
            <option value="No" {{ $traffic->damages == 'No' ? 'selected' : ''  }}>No</option>
            <option value="Yes" {{ $traffic->damages == 'Yes' ? 'selected' : ''  }}>Yes</option>
        </select>
    </div>
    @error('damages')
    <p class="mt-2 text-sm text-red-600" id="error">{{ $message }}</p>
    @enderror
</div>

<div class="pt-3">
    <div class="mt-1 flex rounded-md shadow-sm">
    <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
        <label for="customer" class="block text-sm font-medium leading-5 text-gray-700" style="visibility: none">Customer</label>
    </span>
        <input name="customer" id="customer" class="form-input flex-1 block w-full px-3 py-2 rounded-none rounded-r-md sm:text-sm sm:leading-5" value="{{ old('model') ?? $traffic->customer }}">
    </div>
    @error('customer')
    <p class="mt-2 text-sm text-red-600" id="error">{{ $message }}</p>
    @enderror
</div>

<div class="pt-3">
    <div class="mt-1 flex rounded-md shadow-sm">
    <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
        <label for="comments" class="block text-sm font-medium leading-5 text-gray-700" style="visibility: none">Comments</label>
    </span>
        <input name="comments" id="comments" class="form-input flex-1 block w-full px-3 py-2 rounded-none rounded-r-md sm:text-sm sm:leading-5" value="{{ old('model') ?? $traffic->comments }}">
    </div>
    @error('comments')
    <p class="mt-2 text-sm text-red-600" id="error">{{ $message }}</p>
    @enderror
</div>


