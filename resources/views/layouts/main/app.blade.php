<!DOCTYPE html>
<html lang="en">
    @include('layouts.main.head')
    <body>
        @include('layouts.main.navbar')

        <main style="min-height: 380px;">
            <div class="text-center main-div">
                @include('layouts.shared.alert')
            </div>
            @yield('content')
        </main>
        @include('layouts.main.footer')

        @include('layouts.main.scripts')