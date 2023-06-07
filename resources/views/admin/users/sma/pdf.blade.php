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
    <h1 class="my-1 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white"><center>Daftar Akun (SMA)</center></h1>
    <center>Dicetak pada : {{ Carbon\Carbon::now(new DateTimeZone('Asia/Jakarta'))->format('d/m/Y H:i:s') }}</center>
    <div class="table-responsive mt-2 px-8">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="border-y text-xs uppercase dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 shadow-md">
                        No.
                    </th>
                    <th scope="col" class="px-6 py-3 shadow-md">
                        NPSN
                    </th>
                    <th scope="col" class="px-6 py-3 shadow-md">
                        Satuan Pendidikan
                    </th>
                    <th scope="col" class="px-6 py-3 shadow-md">
                        Email Akun
                    </th>
                    {{-- <th scope="col" class="px-6 py-3 shadow-md">
                        Bentuk Pendidikan
                    </th> --}}
                    <th scope="col" class="px-6 py-3 shadow-md">
                        Status Akun
                    </th>
                </tr>
            </thead>
            <tbody>
                @if (count($pdf) > 0)
                    @php $key = 1 @endphp
                    @foreach($pdf as $key=>$all)
                        <tr class="border-b text-black dark:bg-gray-800 dark:border-gray-700 dark:text-white">
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap shadow-md">{{ $key+1 }}.</th>
                            <td class="px-6 py-4 shadow-md">
                                {{-- @if($all->npsn == 0)
                                    -
                                @else --}}
                                    {{ $all->npsn }}
                                {{-- @endif --}}
                            </td>
                            <td class="px-6 py-4 shadow-md">{{ $all->name }}</td>
                            <td class="px-6 py-4 shadow-md">{{ $all->email }}</td>
                            {{-- <td class="px-6 py-4 shadow-md">
                                @if($all->role == 0)
                                    -
                                @elseif($all->role == 1)
                                    SMA
                                @elseif($all->role == 2)
                                    SMK
                                @elseif($all->role == 3)
                                    SLB
                                @endif
                            </td> --}}
                            <td class="px-8 py-4 shadow-md">
                                @if($all->status == 1)
                                    Tidak Aktif
                                @else
                                    Aktif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="h-12 text-center shadow-md">
                        <td colspan="5">No Data Found</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>
</html>