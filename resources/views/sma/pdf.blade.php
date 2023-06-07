<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <link rel="icon" href="{{ asset('/img/logocabdindikwil1_small.png') }}" >
    <title>Cabang Dinas Pendidikan Wilayah 1 Provinsi Jawa Tengah</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css"  rel="stylesheet" />
</head>
<body>
    <h1 class="my-1 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white"><center>Daftar Prestasi Siswa di {{ Auth::user()->name }}</center></h1>
    <div class="text-lg"><center>NPSN = {{ Auth::user()->npsn }}</center></div>
    <center>Dicetak pada : {{ Carbon\Carbon::now(new DateTimeZone('Asia/Jakarta'))->format('d/m/Y H:i:s') }}</center>
    <div class="table-responsive mt-2">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="border-y text-xs uppercase dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 shadow-md">
                        No.
                    </th>
                    <th scope="col" class="px-6 py-3 shadow-md">
                        Nama Siswa
                    </th>
                    <th scope="col" class="px-6 py-3 shadow-md">
                        Nama Lomba
                    </th>
                    <th scope="col" class="px-6 py-3 shadow-md">
                        Penyelenggara
                    </th>
                    <th scope="col" class="px-6 py-3 shadow-md">
                        Prestasi yang Diraih
                    </th>
                    <th scope="col" class="px-6 py-3 shadow-md">
                        Waktu Penyelenggaraan
                    </th>
                    <th scope="col" class="px-6 py-3 shadow-md">
                        Tingkat
                    </th>
                    <th scope="col" class="px-6 py-3 shadow-md">
                        Jenis Lomba
                    </th>
                </tr>
            </thead>
            <tbody>
                @if (count($pdf) > 0)
                    @php $key = 1 @endphp
                    @foreach($pdf as $key=>$all)
                        <tr class="border-b text-black dark:bg-gray-800 dark:border-gray-700 dark:text-white">
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap shadow-md">{{ $key+1 }}.</th>
                            <td class="px-6 py-4 shadow-md">{{ $all->nama_siswa }}</td>
                            <td class="px-6 py-4 shadow-md">{{ $all->nama_lomba }}</td>
                            <td class="px-6 py-4 shadow-md">{{ $all->penyelenggara }}</td>
                            <td class="px-6 py-4 shadow-md">{{ $all->prestasi }}</td>
                            <td class="px-6 py-4 shadow-md">{{ Carbon\Carbon::parse($all->waktu)->isoFormat('D MMMM YYYY') }}</td>
                            <td class="px-6 py-4 shadow-md">
                                @if($all->tingkat == 0)
                                    Kabupaten/Kota
                                @elseif($all->tingkat == 1)
                                    Provinsi
                                @elseif($all->tingkat == 2)
                                    Nasional
                                @elseif($all->tingkat == 3)
                                    Internasional
                                @endif
                            </td>
                            <td class="px-8 py-4 shadow-md">
                                @if($all->jenis == 1)
                                    Tidak Berjenjang
                                @else
                                    Berjenjang
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="h-12 text-center shadow-md">
                        <td colspan="8">No Data Found</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>
</html>