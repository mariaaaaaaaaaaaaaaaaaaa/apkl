@extends('layouts.adminapp')
    @section('adminapp')
    <div class="text-3xl font-bold mb-1">Selamat Datang, {{ Auth::user()->name }}!</div><hr>
    <section class="counter_account py-3">
        <div class="card">
            <div class="card-header">Total Akun Terdaftar</div>
            <div class="card-body">
                <div class="grid w-full grid-cols-3 gap-16 px-2 text-center xl:grid-cols-2 2xl:grid-cols-3">
                    {{-- <div class="items-center justify-between p-4 px-1 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                        <div class="w-full">
                            <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">Admin</h3>
                            <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">{{ $admin }}</span>
                        </div>
                    </div> --}}
                    <div class="items-center justify-between p-4 px-1 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                        <div class="w-full">
                            <h3 class="text-xl font-normal text-gray-500 dark:text-gray-400">SMA</h3>
                            <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">{{ $sma }}</span>
                        </div>
                    </div>
                    <div class="items-center justify-between p-4 px-1 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                        <div class="w-full">
                            <h3 class="text-xl font-normal text-gray-500 dark:text-gray-400">SMK</h3>
                            <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">{{ $smk }}</span>
                        </div>
                    </div>
                    <div class="items-center justify-between p-4 px-1 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                        <div class="w-full">
                            <h3 class="text-xl font-normal text-gray-500 dark:text-gray-400">SLB</h3>
                            <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">{{ $slb }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="table_area pb-8">
        <div class="card">
            <div class="card-header">Data Prestasi Terbaru</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-white uppercase bg-blue-900 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    No.
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Satuan Pendidikan
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama Siswa
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama Lomba
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Prestasi yang Diraih
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Terakhir Kali Dimodifikasi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($latest_entries) > 0)
                                @foreach($latest_entries as $key=>$acv)
                                    <tr class="border-b text-black dark:bg-gray-800 dark:border-gray-700 dark:text-white">
                                        <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">{{ $key+1 }}.</th>
                                        <td class="px-6 py-4">{{ $acv->user->name }}</td>
                                        <td class="px-6 py-4">{{ $acv->nama_siswa }}</td>
                                        <td class="px-6 py-4">{{ $acv->nama_lomba }}</td>
                                        <td class="px-8 py-4">{{ $acv->prestasi}}</td>
                                        <td class="px-6 py-4">{{ Carbon\Carbon::parse($acv->updated_at)->diffForHumans() }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr class="h-12 text-center">
                                    <td colspan="6">No Data Found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    @endsection