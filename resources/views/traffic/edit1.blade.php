@push('headscripts')
    <link href="/css/font/font-fileuploader.css" rel="stylesheet">

    <!-- styles -->
    <link href="/css/jquery.fileuploader.min.css" media="all" rel="stylesheet">

    <!-- js -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>
    <script src="/js/jquery.fileuploader.min.js" type="text/javascript"></script>
    <script src="/js/custom.js" type="text/javascript"></script>
@endpush
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Traffic
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10">
                <div class="container">
                    <form action="/traffic/{{$traffic->id}}" enctype="multipart/form-data" method="post">
                        @method('PATCH')

                        @include('traffic.form')

                        <input type="file" name="filenames" class="files" data-fileuploader-files="{{ $preloadedFiles }}">

                        <span class="inline-flex rounded-md shadow-sm">
                            <button class="inline-flex items-center px-6 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
                                <!-- Heroicon name: mail -->
                                <svg class="-ml-1 mr-3 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                </svg>
                            Update Traffic
                            </button>
                        </span>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
