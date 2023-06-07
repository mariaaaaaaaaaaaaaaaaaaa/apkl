@extends('layouts.adminapp')
    @section('adminapp')
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
    <div class="p-2">
        <h3 class="font-bold uppercase pb-2">Daftar Prestasi Siswa : Semua</h3><hr>
        <div class="pt-2 relative overflow-x-auto shadow-md sm:rounded-lg">
            <div class="grid grid-cols-2 gap-6 p-4 bg-white">
                <div class=" ">
                    <form action="{{ route('admin.achievements') }}" method="GET" class="flex items-center">   
                        <label for="simple-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                            </div>
                            <input name="search" id="search" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari Nama Siswa" required>
                        </div>
                        <button type="submit" class="px-2 py-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </form>
                </div>
                <div class=" ">
                    {{-- <a href="{{ route('admin.achievements.pdf') }}" class="mr-6 absolute right-0 px-2 flex md:mb-0 text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm py-3 dark:bg-blue-600 dark:hover:bg-blue-700">Cetak PDF</a> --}}
                    {{-- <a href="{{ route('admin.users.create') }}" class="btn md:mb-0 text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm dark:bg-blue-600 dark:hover:bg-blue-700">Tambah Akun Baru</a> --}}
                    <button id="dropdownLeftEndButton" data-dropdown-toggle="dropdownLeftEnd" data-dropdown-placement="left-end" class="mr-6 absolute right-0 px-2 flex md:mb-0 text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm py-3 dark:bg-blue-600 dark:hover:bg-blue-700" type="button"><svg class="w-4 h-4 mr-2" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>Format Tampilan Cetak</button>
                    <!-- Dropdown menu -->
                    <div id="dropdownLeftEnd" class="z-20 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownLeftEndButton">
                            <li><a href="{{ route('admin.achievements.pdf') }}" class="block flex px-4 py-2 gap-3 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-pdf" viewBox="0 0 16 16"><title>PDF</title><path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/><path d="M4.603 12.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.701 19.701 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.187-.012.395-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.065.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.716 5.716 0 0 1-.911-.95 11.642 11.642 0 0 0-1.997.406 11.311 11.311 0 0 1-1.021 1.51c-.29.35-.608.655-.926.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.27.27 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.647 12.647 0 0 1 1.01-.193 11.666 11.666 0 0 1-.51-.858 20.741 20.741 0 0 1-.5 1.05zm2.446.45c.15.162.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.881 3.881 0 0 0-.612-.053zM8.078 5.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z"/></svg>
                                PDF
                            </a></li>
                            <li><a href="{{ route('admin.achievements.excel') }}" class="block flex px-4 py-2 gap-3 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                <svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="16" height="16"><title>Microsoft Excel</title><path d="M23 1.5q.41 0 .7.3.3.29.3.7v19q0 .41-.3.7-.29.3-.7.3H7q-.41 0-.7-.3-.3-.29-.3-.7V18H1q-.41 0-.7-.3-.3-.29-.3-.7V7q0-.41.3-.7Q.58 6 1 6h5V2.5q0-.41.3-.7.29-.3.7-.3zM6 13.28l1.42 2.66h2.14l-2.38-3.87 2.34-3.8H7.46l-1.3 2.4-.05.08-.04.09-.64-1.28-.66-1.29H2.59l2.27 3.82-2.48 3.85h2.16zM14.25 21v-3H7.5v3zm0-4.5v-3.75H12v3.75zm0-5.25V7.5H12v3.75zm0-5.25V3H7.5v3zm8.25 15v-3h-6.75v3zm0-4.5v-3.75h-6.75v3.75zm0-5.25V7.5h-6.75v3.75zm0-5.25V3h-6.75v3Z"/></svg>
                                Spreadsheet
                            </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="table-responsive mt-2">
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
                                Penyelenggara
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Prestasi yang Diraih
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Waktu Penyelenggaraan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tingkat
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Jenis Lomba
                            </th>
                            {{-- <th scope="col" class="px-6 py-3">
                                Action
                            </th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($acvs) > 0)
                            @foreach($acvs as $key=>$acv)
                                <tr class="border-b text-black dark:bg-gray-800 dark:border-gray-700 hover:bg-yellow-200 dark:hover:bg-gray-600 dark:text-white">
                                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">{{ $key+$acvs->firstItem() }}.</th>
                                    <td class="px-6 py-4">{{ $acv->user->name }}</td>
                                    <td class="px-6 py-4">{{ $acv->nama_siswa }}</td>
                                    <td class="px-6 py-4">{{ $acv->nama_lomba }}</td>
                                    <td class="px-6 py-4">{{ $acv->penyelenggara }}</td>
                                    <td class="px-8 py-4">{{ $acv->prestasi}}</td>
                                    <td class="px-6 py-4">{{ Carbon\Carbon::parse($acv->waktu)->isoFormat('D MMMM YYYY') }}</td>
                                    <td class="px-6 py-4">
                                        @if($acv->tingkat == 0)
                                            Kabupaten/Kota
                                        @elseif($acv->tingkat == 1)
                                            Provinsi
                                        @elseif($acv->tingkat == 2)
                                            Nasional
                                        @elseif($acv->tingkat == 3)
                                            Internasional
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        @if($acv->jenis_lomba == 1)
                                            Tidak Berjenjang
                                        @else
                                            Berjenjang
                                        @endif
                                    </td>
                                    <!--<td class="flex items-center px-6 py-4 space-x-3">
                                        <a href="{{ route('admin.users.edit', $acv->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                        {{-- <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline">Remove</a> --}}
                                        <button type="button" class="btn btn-primary" id="confirm-destroy-btn"><a href="#" id="confirm-destroy-link" class="text-white">YAKIN</a></button>
                                    </td>-->
                                </tr>
                            @endforeach
                        @else
                            <tr class="h-12 text-center">
                                <td colspan="9">No Data Found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <nav class="flex items-center justify-between p-4" aria-label="Table navigation">
                <div class="mx-auto" style="width: 200px;">
                    <div class="pagination">
                        @if($acvs->hasPages())
                            {{ $acvs->links() }}
                        @endif
                    </div>
                </div>
            </nav>
        </div>
    </div>
    @endsection