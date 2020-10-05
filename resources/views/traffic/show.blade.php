<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight uppercase">
            Check {{ $traffic->io }}: {{ $traffic->make }} {{ $traffic->model }} S/N:{{ $traffic->sn }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-2">
                <div class="lg:flex lg:items-center lg:justify-between">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                                <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900 uppercase">
                                        {{ $traffic->make }} {{ $traffic->model }} S/N:{{ $traffic->sn }}
                                    </h3>
                                    <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
                                    <div class="mt-2 flex items-center text-sm leading-5 text-gray-500">
                                        <!-- Heroicon name: calendar -->
                                        <svg class="h-5 w-5  text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                                            />
                                        </svg>
                                        <div class="pt-1 uppercase">
                                        @if(!is_null($traffic->hours)) {{ $traffic->hours }} hours @endif
                                        </div>
                                    </div>
                                    </p>
                                    <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
                                    <div class="mt-2 flex items-center text-sm leading-5 text-gray-500">
                                        <!-- Heroicon name: calendar -->
                                        <svg class="h-5 w-5  text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                        </svg>
                                        <div class="pt-1 uppercase">
                                            {{ $traffic->created_at->format('m/d/y \a\t g:i a') }} by {{ $enteredby->name }}
                                        </div>
                                    </div>
                                    </p>
                                </div>
                                <div>
                                    <dl>
                                        <div class="bg-gray-50 px-2 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
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
                                        <div class="bg-gray-50 px-2 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
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
                                        <div class="bg-gray-50 px-2 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
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
                                        <div class="{{ $traffic->damages == 'No' ? 'bg-gray-50' : 'bg-white' }} px-2 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
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
                            </div>

                        </div>
                        <div>
                            <div class="grid grid-cols-2">
                            @foreach($traffic->details as $detail)
                                    <div>
                                        <img src="{{ Storage::disk('details')->url($detail->name) }}">
                                    </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
