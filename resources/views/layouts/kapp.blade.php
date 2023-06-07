@extends('layouts.app')
@section('app')
    @include('partials.smk.navbar')
    <main>
        <div class="p-4 sm:ml-64 mt-14">
            @yield('kapp')
        </div>
    </main>
    @include('partials.footer')
@endsection