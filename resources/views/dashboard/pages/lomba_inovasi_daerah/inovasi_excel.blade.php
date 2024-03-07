<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Export Excel</title>
</head>
<body>


    <table>
        <thead>
            <tr>
                <th>Data</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Nomor Registrasi</td>
                <td>-</td>
            </tr>
            <tr>
                <td>Nama Inovasi</td>
                <td>{{ $inovasi->nama_inovasi }}</td>
            </tr>
            <tr>
                <td>Dibuat Oleh</td>
                <td>{{ $inovasi->user->nama_lengkap }}</td>
            </tr>
            <tr>
                <td>Tahapan Inovasi</td>
                <td>{{ $inovasi->tahapan_inovasi->tahapan }}</td>
            </tr>
            <tr>
                <td>Inisiator Inovasi</td>
                <td>{{ $inovasi->inisiator_inovasi_daerah->inisiator }}</td>
            </tr>
            <tr>
                <td>Jenis Inovasi</td>
                <td>{{ $inovasi->jenis_inovasi->jenis }}</td>
            </tr>
            <tr>
                <td>Bentuk Inovasi Daerah</td>
                <td>{{ $inovasi->bentuk_inovasi_daerah->bentuk }}</td>
            </tr>
            <tr>
                <td>Kalster Covid 19</td>
                <td>-</td>
            </tr>
            <tr>
                <td>Urusan Inovasi Daerah</td>
                <td>{{ $inovasi->urusan_utama->urusan }}</td>
            </tr>
            <tr>
                <td>Rancang Bangun dan Pokok Perubahan Yang Dilakukan</td>
                <td>{{ strip_tags($inovasi->rancang_bangun) }}</td>
            </tr>
            <tr>
                <td>Tujuan Inovasi Daerah</td>
                <td>{{ strip_tags($inovasi->tujuan_inovasi) }}</td>
            </tr>
            <tr>
                <td>Manfaat Yang Diperoleh</td>
                <td>{{ strip_tags($inovasi->manfaat_diperoleh) }}</td>
            </tr>
            <tr>
                <td>Hasil Inovasi</td>
                <td>{{ strip_tags($inovasi->hasil_inovasi) }}</td>
            </tr>
            <tr>
                <td>Waktu Uji Coba Inovasi Daerah</td>
                <td>{{ $inovasi->waktu_uji_coba }}</td>
            </tr>
            <tr>
                <td>Waktu Implementasi Inovasi Daerah</td>
                <td>{{ $inovasi->waktu_penerapan }}</td>
            </tr>
            <tr>
                <td>Anggaran</td>
                <td>
                    @if($inovasi->anggaran)
                    {{ $inovasi->anggaran }}
                    @else   
                    -
                    @endif
                </td>
            </tr>
            <tr>
                <td>Profil Bisnis</td>
                <td>
                    @if($inovasi->profil_bisnis)
                    {{ $inovasi->profil_bisnis }}
                    @else   
                    -
                    @endif
                </td>
            </tr>
            <tr>
                <td>Kematangan</td>
                <td>
                    @if(!empty($kematangan))
                    {{ $kematangan->total }}
                    @else
                    -
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
    
</body>
</html>