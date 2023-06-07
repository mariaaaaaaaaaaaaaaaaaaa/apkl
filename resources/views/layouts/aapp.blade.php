@extends('layouts.app')
@section('app')
    @include('partials.sma.navbar')
    <main>
        <div class="p-4 sm:ml-64 mt-14">
            @yield('aapp')
        </div>
    </main>
    @include('partials.footer')
@endsection