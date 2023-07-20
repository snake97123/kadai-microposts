<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Microposts</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Scripts -->
        @vite('resources/css/app.css')
    </head>
    
    <body>
        @include('commons.navbar')
        
        <div class="container mx-auto">
            @include('commons.error_messages')
            
            @yield('content')
        </div>
        
    </body>
</html>
