<h1>Daftar Prestasi Siswa (SMK)</h1>
<h6>Dicetak pada : {{ Carbon\Carbon::now(new DateTimeZone('Asia/Jakarta'))->format('d/m/Y H:i:s') }}</h6><br/>
<table>
    <thead>
    <tr>
        <th>Satuan Pendidikan</th>
        <th>Nama Siswa</th>
        <th>Nama Lomba</th>
        <th>Penyelenggara</th>
        <th>Prestasi</th>
        <th>Waktu</th>
        <th>Tingkat</th>
        <th>Jenis Lomba</th>
    </tr>
    </thead>
    <tbody>
    @foreach($excels as $excel)
        <tr>
            <td>{{ $excel->name }}</td>
            <td>{{ $excel->nama_siswa }}</td>
            <td>{{ $excel->nama_lomba }}</td>
            <td>{{ $excel->penyelenggara }}</td>
            <td>{{ $excel->prestasi }}</td>
            <td>{{ Carbon\Carbon::parse($excel->waktu)->isoFormat('D MMMM YYYY') }}</td>
            <td>
                @if($excel->tingkat == 0)
                    Kabupaten/Kota
                @elseif($excel->tingkat == 1)
                    Provinsi
                @elseif($excel->tingkat == 2)
                    Nasional
                @elseif($excel->tingkat == 3)
                    Internasional
                @endif
            </td>
            <td>
                @if($excel->jenis == 1)
                    Tidak Berjenjang
                @else
                    Berjenjang
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>