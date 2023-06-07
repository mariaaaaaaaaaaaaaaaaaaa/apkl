@extends('layouts.app')
@section('app')
    @include('partials.slb.navbar')
    <main>
        <div class="p-4 sm:ml-64 mt-14">
            @yield('bapp')
        </div>
    </main>
    @include('partials.footer')
@endsection