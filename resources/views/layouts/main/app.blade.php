<!DOCTYPE html>
<html lang="en">
    @include('layouts.main.head')
    <body>
        @include('layouts.main.navbar')
        <main>
            @yield('content')
        </main>
        @include('layouts.main.footer')

        @include('layouts.main.scripts')