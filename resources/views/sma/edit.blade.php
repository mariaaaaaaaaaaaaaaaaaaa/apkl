@extends('layouts.aapp')
    @section('aapp')
    @if (session('success'))
        <div id="success" class="flex p-4 mb-4 text-green-800 border border-green-300 ounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-40 dark:border-green-800" role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Info</span>
            <div class="ml-3 text-sm font-medium">
                {{ session('success') }}
            </div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#success" aria-label="Close">
              <span class="sr-only">Close</span>
              <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
          </div>
    @elseif(session('failed'))
        <div id="failed" class="flex p-4 mb-4 text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Info</span>
            <div class="ml-3 text-sm font-medium">
                {{ session('failed') }}
            </div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#failed" aria-label="Close">
              <span class="sr-only">Close</span>
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
          </div>
    @endif
    <div class="font-bold border-b border-gray-200 dark:border-gray-700">
        <div class="text-base p-2">
            Edit Data Prestasi Siswa
        </div>
    </div>
    <div class="rounded-lg bg-white">
        <form action="{{ route('aschool.achievements.update', ['id'=>$acvs->id]) }}" method="POST" id="edit_form" class="py-2">
            @csrf
            @method('PUT')
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div class="px-2">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Satuan Pendidikan</label>
                    <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" class="bg-gray-50 border border-gray-300 text-gray-600 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled readonly>
                </div>
                <div class="px-2">
                    <label for="nama_siswa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Siswa</label>
                    <input type="text" name="nama_siswa" id="nama_siswa" value="{{ $acvs->nama_siswa }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="contoh : Zalina Raine Wyllie" required>
                </div>
                <div class="px-2">
                    <label for="nama_lomba" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lomba/Kejuaraan</label>
                    <input type="text" name="nama_lomba" id="nama_lomba" value="{{ $acvs->nama_lomba }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="contoh : Kejuaraan Balap Karung RT 08" required>
                </div>
                <div class="px-2">
                    <label for="penyelenggara" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Penyelenggara Lomba/Kejuaraan</label>
                    <input type="text" name="penyelenggara" id="penyelenggara" value="{{ $acvs->penyelenggara }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="contoh : RT 08 Kelurahan Kuta" required>
                </div>
                <div class="px-2">
                    <label for="prestasi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prestasi yang Diraih</label>
                    <input type="text" name="prestasi" id="prestasi" value="{{ $acvs->prestasi }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="contoh : Harapan 1" required>
                </div>
                <div class="px-2">
                    <label for="waktu" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Waktu Penyelenggaraan Lomba/Kejuaraan</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                        </div>
                        <input datepicker datepicker-autohide type="text" name="waktu" id="waktu" value="{{ Carbon\Carbon::parse($acvs->waktu)->isoFormat('D MMMM YYYY') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ $acvs->waktu }}">
                    </div>
                </div>
                <div class="px-2">
                    <label for="tingkat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tingkat</label>
                    <fieldset class="pl-2">
                        <legend class="sr-only">Tingkat</legend>
                        <div class="flex items-center mb-2">
                            <input id="tingkat" type="radio" name="tingkat" value="0" {{ $acvs->tingkat == 0 ? 'checked' : ''}} class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
                            <label for="tingkat" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                Kabupaten/Kota
                            </label>
                        </div>
                        <div class="flex items-center mb-2">
                            <input id="tingkat" type="radio" name="tingkat" value="1" {{ $acvs->tingkat == 1 ? 'checked' : ''}}  class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
                            <label for="tingkat" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                Provinsi
                            </label>
                        </div>
                        <div class="flex items-center mb-2">
                            <input id="tingkat" type="radio" name="tingkat" value="2" {{ $acvs->tingkat == 2 ? 'checked' : ''}}  class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
                            <label for="tingkat" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                Nasional
                            </label>
                        </div>
                        <div class="flex items-center mb-2">
                            <input id="tingkat" type="radio" name="tingkat" value="3" {{ $acvs->tingkat == 3 ? 'checked' : ''}}  class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
                            <label for="tingkat" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                Internasional
                            </label>
                        </div>
                    </fieldset>
                </div>
                <div class="px-2">
                    <label for="jenis_lomba" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis</label>
                    <fieldset class="pl-2">
                        <legend class="sr-only">Jenis</legend>
                        <div class="flex items-center mb-2">
                            <input id="jenis_lomba" type="radio" name="jenis_lomba" value="0" {{ $acvs->jenis_lomba == 0 ? 'checked' : ''}} class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
                            <label for="jenis_lomba" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                Berjenjang
                            </label>
                        </div>
                        <div class="flex items-center mb-2">
                            <input id="jenis_lomba" type="radio" name="jenis_lomba" value="1" {{ $acvs->jenis_lomba == 1 ? 'checked' : ''}} class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
                            <label for="jenis_lomba" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                Tidak Berjenjang
                            </label>
                        </div>
                    </fieldset>
                </div>
            </div>
            <button type="submit" class="mx-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>
    </div>
    @endsection