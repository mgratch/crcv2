<html>
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>

{{--    <!-- Fonts -->--}}
{{--    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">--}}

    <!-- Styles -->
{{--    <link rel="stylesheet" href="{{ asset('css/app.css') }}">--}}
</head>
<body class="font-sans antialiased">
<div class="min-h-screen">
    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
</div>
</body>
</html>
