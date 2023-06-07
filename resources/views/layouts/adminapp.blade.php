@extends('layouts.app')
@section('app')
    @include('partials.admin.navbar')
    <main>
        <div class="p-4 sm:ml-64 mt-14">
            @yield('adminapp')
        </div>
    </main>
    @include('partials.footer')
@endsection