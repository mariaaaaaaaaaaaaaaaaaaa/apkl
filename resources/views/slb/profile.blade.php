@extends('layouts.bapp')
    @section('bapp')
    <div class="p-2">
        <div class="text-base">Profil Akun</div><hr class="py-1">
        <div class="bg-white py-2">
            <div class="px-2 mb-2">
                <label for="npsn" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NPSN</label>
                <input type="text" name="npsn" id="npsn" value="{{ Auth::user()->npsn }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled readonly>
            </div>
            <div class="px-2 mb-2">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Satuan Pendidikan</label>
                <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled readonly>
            </div>
            <div class="px-2 mb-2">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email Akun</label>
                <input type="text" name="email" id="email" value="{{ Auth::user()->email }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled readonly>
            </div>
            <div class="px-2 mb-2">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                <input type="text" name="password" id="password" value="Mohon menghubungi admin untuk direset" class="uppercase bg-gray-50 border border-gray-300 text-red-500 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" disabled readonly>
            </div>
        </div>
    </div>
    @endsection