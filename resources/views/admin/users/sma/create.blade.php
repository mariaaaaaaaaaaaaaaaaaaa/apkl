@extends('layouts.adminapp')
    @section('adminapp')
    <section class=" ">
        <div class="font-bold border-b border-gray-200 dark:border-gray-700">
            <div class="text-base p-2">
                Buat Data Akun Baru SMA
            </div>
        </div>
        <div class="rounded-lg bg-white">
            <form action="{{ route('admin.users.sma.store') }}" method="POST" id="create_form" class="py-2">
                @csrf
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div class="px-2">
                        <label for="npsn" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NPSN</label>
                        <input type="number" name="npsn" id="npsn" value="{{ old('npsn') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="contoh : 12345678" required>
                        <p class="text-sm text-red-600">{{ $errors->first('npsn') }}</p>
                    </div>
                    <div class="px-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Satuan Pendidikan</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="contoh : SMA Negeri 1 Semarang" required>
                        <p class="text-sm text-red-600">{{ $errors->first('name') }}</p>
                    </div>
                    <div class="px-2">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email Akun</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="contoh : sman1smg@user.com" required>
                        <p class="text-sm text-red-600">{{ $errors->first('email') }}</p>
                    </div>  
                    {{-- <div class="px-2">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input type="password" name="password" id="password" value="{{ old('password') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required>
                    </div> --}}
                    <div class="px-2">
                        <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Akun</label>
                        <input type="text" name="status" id="status" value="Aktif" class="bg-gray-50 border border-gray-300 text-gray-600 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled readonly>
                    </div>
                    {{-- <div class="px-2">
                        <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Peran Akun</label>
                        <input type="text" name="role" id="role" value="SMA" class="bg-gray-50 border border-gray-300 text-gray-600 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled readonly>
                    </div> --}}
                </div>
                <button type="submit" class="mx-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </form>
        </div>
    </section>
    @endsection