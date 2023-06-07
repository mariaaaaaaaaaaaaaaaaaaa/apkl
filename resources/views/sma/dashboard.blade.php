@extends('layouts.aapp')
    @section('aapp')
        <div class="pb-1">
            <div class="relative overflow-x-auto sm:rounded-lg pb-3">
                <div class="text-3xl font-bold mb-1">Selamat Datang, {{ Auth::user()->name }}!</div>
                <hr class="pb-3">
                <div class="card">
                    <div class="card-header">Prestasi Siswa</div>
                    <div class="card-body">
                        <canvas id="myChart" height="100px"></canvas>
                    </div>
                </div>
                <div class="py-3">
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
                                                Terakhir Kali Dimodifikasi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($latest_entries) > 0)
                                            @foreach($latest_entries as $key=>$acv)
                                                <tr class="border-b text-black dark:bg-gray-800 dark:border-gray-700 dark:text-white">
                                                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">{{ $key+1 }}.</th>
                                                    <td class="px-6 py-4">{{ $acv->nama_siswa }}</td>
                                                    <td class="px-6 py-4">{{ $acv->nama_lomba }}</td>
                                                    <td class="px-6 py-4">{{ $acv->penyelenggara }}</td>
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
                </div>
            </div>
        </div>
    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script type="text/javascript">
        
            var labels =  {{ Js::from($labels) }};
            var users =  {{ Js::from($data) }};

            const data = {
            labels: labels,
            datasets: [{
                label: 'Perkembangan Prestasi Siswa Tahun 2023',
                backgroundColor: '#013366',
                borderColor: '#013366',
                data: users,
            }]
            };

            const config = {
            type: 'line',
            data: data,
            options: {}
            };

            const myChart = new Chart(
            document.getElementById('myChart'),
            config
            );

        </script>
    @endsection