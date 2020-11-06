<x-layouts.user>

    <div class="flex flex-col md:flex-row space-x-10">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
                <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-no-wrap">
                    <div class="ml-4 mt-4">
                        <h1 class="text-2xl font-bold leading-7 text-cool-gray-900 sm:leading-9 sm:truncate uppercase">
                            Check {{ $traffic->io }}: {{ $traffic->make }} {{ $traffic->model }} S/N:{{ $traffic->sn }}
                        </h1>
                        <div class="mt-2 flex items-center text-sm leading-5 text-gray-500">
                            <!-- Heroicon name: clock -->
                            <svg class="h-6 w-6 text-gray-500 pt-1 pl-px" viewBox="0 0 24 24" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                            </svg>
                            <div class="pt-1 uppercase">
                                @if(!is_null($traffic->hours)) {{ $traffic->hours }} hours @endif
                            </div>
                        </div>
                        <div class="mt-2 flex items-center text-sm leading-5 text-gray-500">
                            <!-- Heroicon name: calendar -->
                            <svg class="h-5 w-5  text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                            </svg>
                            <div class="pl-1 pt-1 uppercase">
                                {{ $traffic->date_for_display }} by <img class="h-5 w-5 -mt-1 rounded-full object-cover inline" src="{{ $enteredBy->profile_photo_url }}" alt="{{ $enteredBy->name }}" /> {{ $enteredBy->name }}
                            </div>
                        </div>
                    </div>
                    <div class="ml-4 mt-4 flex-shrink-0 flex">
                        <span class="inline-flex rounded-md shadow-sm">
                            <a href="{{ $traffic->id }}/pdf">
                            <button type="button" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-50 active:text-gray-800">
                                <!-- Heroicon name: phone -->
                                <svg class="-ml-1 mr-2 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5 4v3H4a2 2 0 00-2 2v3a2 2 0 002 2h1v2a2 2 0 002 2h6a2 2 0 002-2v-2h1a2 2 0 002-2V9a2 2 0 00-2-2h-1V4a2 2 0 00-2-2H7a2 2 0 00-2 2zm8 0H7v3h6V4zm0 8H7v4h6v-4z" clip-rule="evenodd" />
                                </svg>
                                <span>
                                PDF
                                </span>
                            </button>
                            </a>
                        </span>
                        <span class="ml-3 inline-flex rounded-md shadow-sm">
                            <button type="button" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-50 active:text-gray-800">
                                <!-- Heroicon name: mail -->
                                <x-icon.pencil class="-ml-1 mr-2 h-5 w-5 text-gray-400"/>
                                <span>
                                EDIT
                                </span>
                            </button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="flex flex-col lg:flex-row">
            <div class="w-full">
                <dl>
                    <div class="bg-gray-100 px-2 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm leading-5 font-medium text-gray-500 uppercase font-bold">
                            Branch
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2 uppercase">
                            {{ $traffic->branch }}
                        </dd>
                    </div>
                    <div class="bg-white px-2 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm leading-5 font-medium text-gray-500 uppercase font-bold">
                            Customer
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2 uppercase">
                            {{ $traffic->customer }}
                        </dd>
                    </div>
                    <div class="bg-gray-100 px-2 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm leading-5 font-medium text-gray-500 uppercase font-bold">
                            Salesman
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2 uppercase">
                            {{ $traffic->salesman }}
                        </dd>
                    </div>
                    <div class="bg-white px-2 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 uppercase">
                        <dt class="text-sm leading-5 font-medium text-gray-500 font-bold">
                            Fuel
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2 uppercase">
                            {{ $traffic->fuel }}
                        </dd>
                    </div>
                    <div class="bg-gray-100 px-2 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm leading-5 font-medium text-gray-500 uppercase font-bold">
                            Returned with key?
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2 uppercase">
                            Placeholder
                        </dd>
                    </div>
                    <div class="{{ $traffic->damages == 'No' ? 'bg-white' : 'bg-red-200' }} px-2 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 uppercase">
                        <dt class="text-sm leading-5 font-medium text-gray-500 font-bold">
                            Damages?
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2 uppercase">
                            {{ $traffic->damages }}
                        </dd>
                    </div>
                    @if($traffic->damages == 'Yes')
                    <div class="bg-red-100 px-2 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm leading-5 font-medium text-gray-500 uppercase font-bold">
                            List Damages
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2 uppercase">
                            Placeholder
                        </dd>
                    </div>
                    @endif
                    <div class="{{ $traffic->damages == 'No' ? 'bg-gray-100' : 'bg-white' }} px-2 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm leading-5 font-medium text-gray-500 uppercase font-bold">
                            Attachments
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            <ul class="border border-gray-200 rounded-md">
                                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm leading-5">
                                    <div class="w-0 flex-1 flex items-center">
                                        <!-- Heroicon name: paper-clip -->
                                        <svg class="flex-shrink-0 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                                        </svg>
                                        <span class="ml-2 flex-1 w-0 truncate uppercase">{{ $traffic->attachments }}</span>
                                    </div>
                                </li>
                                <li class="border-t border-gray-200 pl-3 pr-4 py-3 flex items-center justify-between text-sm leading-5">
                                    <div class="w-0 flex-1 flex items-center">
                                        <!-- Heroicon name: paper-clip -->
                                        <svg class="flex-shrink-0 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                                        </svg>
                                        <span class="ml-2 flex-1 w-0 truncate uppercase">coverletter_back_end_developer.pdf</span>
                                    </div>
                                </li>
                            </ul>
                        </dd>
                    </div>
                </dl>
            </div>
            <div class="w-full grid grid-cols-2">
                @foreach($traffic->details as $detail)
                    <div>
                        <img class="h-80 w-full object-cover object-center" src="{{ Storage::disk('details')->url($detail->name) }}">
                    </div>
                @endforeach
            </div>
            </div>
        </div>
    </div>

</x-layouts.user>
