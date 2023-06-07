@extends('layouts.kapp')
    @section('kapp')
    <section class=" ">
        <div class="font-bold border-b border-gray-200 dark:border-gray-700">
            <div class="text-base p-2">
                Buat Data Prestasi Baru Siswa
            </div>
        </div>
        <div class="rounded-lg bg-white">
            @if ($errors->has('error'))
            <div class="alert alert-danger">
                {{ $errors->first('error') }}
            </div>
            @else
            <form action="{{ route('kschool.achievements.store') }}" method="POST" id="create_form" class="py-2">
                @csrf
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div class="px-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Satuan Pendidikan</label>
                        <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" class="bg-gray-50 border border-gray-300 text-gray-600 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled readonly>
                    </div>
                    <div class="px-2">
                        <label for="nama_siswa" class="{{ $errors->first('nama_siswa') ? 'text-red-700' : 'text-gray-900' }}block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Siswa</label>
                        <input type="text" name="nama_siswa" id="nama_siswa" value="{{ old('nama_siswa') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="contoh : Zalina Raine Wyllie" required>
                        <p class="text-sm text-red-600">{{ $errors->first('nama_siswa') }}</p>
                    </div>
                    <div class="px-2">
                        <label for="nama_lomba" class="{{ $errors->first('nama_lomba') ? 'text-red-700' : 'text-gray-900' }}block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lomba/Kejuaraan</label>
                        <input type="text" name="nama_lomba" id="nama_lomba" value="{{ old('nama_lomba') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="contoh : Cerdas Cermat" required>
                        <p class="text-sm text-red-600">{{ $errors->first('nama_lomba') }}</p>
                    </div>
                    <div class="px-2">
                        <label for="penyelenggara" class="{{ $errors->first('penyelenggara') ? 'text-red-700' : 'text-gray-900' }}block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Penyelenggara Lomba/Kejuaraan</label>
                        <input type="text" name="penyelenggara" id="penyelenggara" value="{{ old('penyelenggara') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="contoh : Sekolah X" required>
                        <p class="text-sm text-red-600">{{ $errors->first('penyelenggara') }}</p>
                    </div>
                    <div class="px-2">
                        <label for="prestasi" class="{{ $errors->first('prestasi') ? 'text-red-700' : 'text-gray-900' }}block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prestasi yang Diraih</label>
                        <input type="text" name="prestasi" id="prestasi" value="{{ old('prestasi') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="contoh : Harapan 1" required>
                        <p class="text-sm text-red-600">{{ $errors->first('prestasi') }}</p>
                    </div>
                    <div class="px-2">
                        <label for="waktu" class="{{ $errors->first('waktu') ? 'text-red-700' : 'text-gray-900' }}block mb-2 text-sm font-medium text-gray-900 dark:text-white">Waktu Penyelenggaraan Lomba/Kejuaraan</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                            </div>
                            <input datepicker datepicker-autohide type="text" name="waktu" id="waktu" value="{{ old('waktu') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="- Pilih Tanggal Pelaksanaan -">
                        </div>
                        <p class="text-sm text-red-600">{{ $errors->first('waktu') }}</p>
                    </div>
                    <div class="px-2">
                        <label for="tingkat" class="{{ $errors->first('tingkat') ? 'text-red-700' : 'text-gray-900' }}block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tingkat</label>
                        <fieldset class="pl-2">
                            <legend class="sr-only">Tingkat</legend>
                            <div class="flex items-center mb-2">
                                <input id="tingkat" type="radio" name="tingkat" value="0" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
                                <label for="tingkat" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    Kabupaten/Kota
                                </label>
                            </div>
                            <div class="flex items-center mb-2">
                                <input id="tingkat" type="radio" name="tingkat" value="1" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
                                <label for="tingkat" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    Provinsi
                                </label>
                            </div>
                            <div class="flex items-center mb-2">
                                <input id="tingkat" type="radio" name="tingkat" value="2" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
                                <label for="tingkat" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    Nasional
                                </label>
                            </div>
                            <div class="flex items-center mb-2">
                                <input id="tingkat" type="radio" name="tingkat" value="3" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
                                <label for="tingkat" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    Internasional
                                </label>
                            </div>
                        </fieldset>
                        <p class="text-sm text-red-600">{{ $errors->first('tingkat') }}</p>
                    </div>
                    <div class="px-2">
                        <label for="jenis_lomba" class="{{ $errors->first('jenis_lomba') ? 'text-red-700' : 'text-gray-900' }}block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis</label>
                        <fieldset class="pl-2">
                            <legend class="sr-only">Jenis</legend>
                            <div class="flex items-center mb-2">
                                <input id="jenis_lomba" type="radio" name="jenis_lomba" value="0" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
                                <label for="jenis_lomba" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    Berjenjang
                                </label>
                            </div>
                            <div class="flex items-center mb-2">
                                <input id="jenis_lomba" type="radio" name="jenis_lomba" value="1" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
                                <label for="jenis_lomba" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    Tidak Berjenjang
                                </label>
                            </div>
                        </fieldset>
                        <p class="text-sm text-red-600">{{ $errors->first('jenis_lomba') }}</p>
                    </div>
                </div>
                <button type="submit" class="mx-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </form>
            @endif
        </div>
    </section>
    @endsection