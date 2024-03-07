<!
doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $inovasi->nama_inovasi }}</title>
    <style>
        #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
        }

        #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        }
        #qrCode{
            float: right;
            width: 25%; 
            position: relative;
            top: -4%;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
   
    <div class="container-fluid">
        <div class="container">

            <div class="row text-center">
                <div class="col-lg-12">
                   <center> <img src="{{ public_path('/public_path/logo.png') }}" alt="" style="height: 80px; margin-top:5px;" alt="g"></center>
                </div>
               <strong>
               <small>
                    KEMENTRIAN DALAM NEGERI
                    <br>
                    BADAN STRATEGI KEBIJAKAN DALAM NEGERI
                </p>
               </strong>
            </div>

            <div class="row py-4 text-center">
                <div class="col-lg-12">
                    <h3>LAPORAN INOVASI DAERAH</h3>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <strong><p>Pemerintah Daerah: Provinsi Sulawesi Selatan</p></strong>
                    <strong><small>Nomor Registrasi: - </small></strong>
                </div>
            </div>
            <div id="qrCode">
                <div class="visible-print text-center">
                    <img src="data:image/png;base64,{{ base64_encode($qrCode) }}" alt="QR Code">
                </div>
            </div>
            <br><br>
            <div class="row mt-4">
                <h4>1. PROFIL INOVASI</h4>
                <div class="px-4">
                    <strong><small>1.1. Nama Inovasi</small></strong><br>
                    <small>{{ $inovasi->nama_inovasi }}</small><br><br>
                    <strong><small>1.2. Dibuat Oleh</small></strong><br>
                    <small>{{ $inovasi->user->nama_lengkap }} ({{ $inovasi->user->username }})</small><br><br>
                    <strong> <small>1.3. Tahapan Inovasi</small></strong><br>
                    <small>{{ $inovasi->tahapan_inovasi->tahapan }}</small><br><br>
                    <strong> <small>1.4. Inisiator Inovasi Daerah</small></strong><br>
                    <small>{{ $inovasi->inisiator_inovasi_daerah->inisiator }}</small><br><br>
                    <strong> <small>1.5. Jenis Inovasi</small></strong><br>
                    <small>{{ $inovasi->jenis_inovasi->jenis }}</small><br><br>
                    <strong><small>1.6. Bentuk Inovasi Daerah</small></strong><br>
                    <small>{{ $inovasi->bentuk_inovasi_daerah->bentuk }}</small><br><br>
                    <strong><small>1.7. Urusan Inovasi Daerah</small></strong><br>
                    <small>{{ $inovasi->urusan_utama->urusan }}, {{ $inovasi->urusan_lain->urusan }}</small><br><br>
                    <strong> <small>1.8. Rancang Bangun dan Pokok Perubahan Yang Dilakukan</small></strong><br>
                    <small>{{ strip_tags($inovasi->rancang_bangun) }}</small><br><br>
                    <strong> <small>1.9. Tujuan Inovasi Daerah</small></strong><br>
                    <small>{{ strip_tags($inovasi->tujuan_inovasi) }}</small><br><br>
                    <strong><small>1.10. Manfaat Yang Diperoleh</small></strong><br>
                    <small>{{ strip_tags($inovasi->manfaat_diperoleh) }}</small><br><br>
                    <strong><small>1.11. Hasil Inovasi</small></strong><br>
                    <small>{{ $inovasi->nama_inovasi }}</small><br><br>
                    <strong> <small>1.12. Waktu Uji Coba Inovasi Daerah</small></strong><br>
                    <small>{{ $inovasi->waktu_uji_coba }}</small><br><br>
                    <strong><small>1.13. Waktu Implementasi</small></strong><br>
                    <small>{{ $inovasi->waktu_penerapan }}</small><br><br>
                    <strong><small>1.14. Anggaran</small></strong><br>
                    @if($inovasi->anggaran)
                    <small>{{ $inovasi->anggaran }}</small><br><br>
                    @else  
                    -<br>      
                    @endif   
                    <strong><small>1.15. Profil Bisnis</small></strong><br>
                    @if($inovasi->profil_bisnis)
                    <small>{{ $inovasi->profil_bisnis }}</small><br><br>
                    @else   
                    -<br>
                    @endif   
                    <strong><small>1.16. Kematangan</small></strong><br>
                    <small>{{ $inovasi->total_kematangan }}.00</small><br>   
                </div>
            </div>

            <div class="row mt-4">
                <h4>2. INDIKATOR INOVASI</h4>
                <small>
                <table id="customers">
                <tr>
                    <th>No.</th>
                    <th>Indikator SPD</th>
                    <th>Informasi</th>
                    <th>Bukti Dukung</th>
                </tr>
                @foreach ($indikators as $row)
                <tr>
                    <td>{{ $loop->iteration }}.</td>
                    <td>{{ $row->indikator }}</td>
                    <?php 
                        $kematangans = App\Models\Kematangan::where('inovasi_pemerintah_daerah_id', $inovasi->id)->where('indikator_id',$row->id)->get();
                        $dokumenPendukung = App\Models\Data_Pendukung::where('inovasi_pemerintah_daerah_id', $inovasi->id)->where('indikator_id', $row->id)->get();
                    ?>
                    @if($kematangans->count() > 0)
                    <td>
                        @foreach ($kematangans as $data)
                           {{ $data->parameter->parameter }}
                        @endforeach
                    </td>
                    @else
                    <td>-</td>
                    @endif
                    @if($dokumenPendukung->count() > 0)
                    <td>
                        @foreach ($dokumenPendukung as $dokumen)
                            {{ $dokumen->tentang }}
                        @endforeach
                    </td>
                    @else
                    <td>-</td>
                    @endif
                </tr>
                @endforeach
                </table>
                </small>
            </div>


        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>









                                        