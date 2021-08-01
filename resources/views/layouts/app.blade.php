<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin-page.css')}}">
    @livewireStyles
</head>
<body>
    <main>
        @livewire('navigation-menu')
        {{ $slot }}
    </main>

    @stack('modals')
    <script src="https://kit.fontawesome.com/e385b2f067.js" crossorigin="anonymous"></script>
    <script src="{{asset('js/admin-page.js')}}" type="text/javascript"></script>
    @livewireScripts
</body>
</html>
