<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Dashboard</title>
</head>

<body>

    <ul class="flex flex-row justify-end gap-4 p-8">
        <li><a href="/dashboard">Dashboard</a></li>
        <li><a href="/chat">Chat</a></li>
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">
                    {{ __('Log Out') }}
                </button>
            </form>
        </li>
    </ul>

    <div class="pb-4">
        @yield('container')
    </div>

</body>

</html>