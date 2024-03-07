<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <table>

        <thead>
            <tr>
                <th>Judul Inovasi</th>
                <th>Pemda</th>
                <th>Admin OPD</th>
                <th>Bentuk Inovasi</th>
                <th>Jenis</th>
                <th>Inisiator</th>
                <th>Urusan Pemerintah</th>
                <th>Kematangan</th>
                <th>Tahapan Inovasi</th>
                <th>Tanggal Uji Coba</th>
                <th>Tanggal Penerapan</th>
                <th>Youtube</th>
             </tr>
        </thead>

        @if($datas->count() > 0)
            <tbody>
                @foreach ($datas as $row)
                    <tr>
                        <td>{{ $row->nama_inovasi }}</td>
                        <td>Provinsi Sulawesi Selatan</td>
                        <td>{{ $row->user->nama_lengkap }} ({{ $row->user->username }})</td>
                        <td>{{ $row->bentuk_inovasi_daerah->bentuk }}</td>
                        <td>{{ $row->jenis_inovasi->jenis }}</td>
                        <td>{{ $row->inisiator_inovasi_daerah->inisiator}}</td>
                        <td>{{ $row->urusan_utama->urusan }}</td>
                        <td>
                        <?php
                            $kematangan = \App\Models\TotalKematangan::where('inovasi_pemerintah_daerah_id', $row->id)->first();
                         ?>
                         @if(!empty($kematangan))
                         {{ $kematangan->total }}.00
                         @else 
                         0
                         @endif
                        </td>
                        <td>{{ $row->tahapan_inovasi->tahapan }}</td>
                        <td>{{ $row->waktu_uji_coba }}</td>
                        <td>{{ $row->waktu_penerapan }}</td>
                        <td>
                            <?php
                                $dokumens = \App\Models\Data_Pendukung::where('inovasi_pemerintah_daerah_id', $row->id)->get();
                            ?>
                        @if($dokumens->count() > 0)
                            @foreach ($dokumens as $doc)
                                {{ $doc->link }}
                            @endforeach
                        @else
                        Tidak Ada
                        @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        @endif

    </table>

</body>
</html>