@extends('dashboard.layouts.index')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div class="col-lg-12">
                        <h5>FAQ</h5>
                        <strong>
                            <small>Frequently Ask Questions (Pertanyaan Umum)
                        </small>
                        </strong>
                    </div>

                    <div class="col-lg-12 mt-3">
                        <button class="btn w-100 bg-light text-start" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Apa perbedaan Menu Database Inovasi Daerah dengan Menu Lomba Inovasi Daerah
                        </button>
                        <ul class="dropdown-menu px-2 w-95">
                            <div class="p-3">
                                <small><p>Perbedaan antara Menu Database Inovasi Daerah dengan Menu Lomba Inovasi Daerah sebagai berikut :</p></small>
                                <small><p>a. Menu Database Inovasi Daerah terdiri atas submenu Profil Pemda dan Inovasi Daerah :</p></small>
                                <div class="px-3">
                                    <small><p>1. Profil Pemda merupakan submenu yang berfungsi sebagai pengelolaan semua data indikator aspek Satuan Pemerintah Daerah, pengeditan alamat Pemda, alamat email, nomor telephone dan nama admin pengelola</p></small>
                                    <small><p>2. Inovasi Daerah merupakan submenu yang berfungsi untuk mengupload data Inovasi Daerah baik oleh Akun Pemda maupun Akun OPD, mengelola seluruh data Inovasi dan Indikator Satuan Inovasi serta melihat statistik data terkait dengan jumlah Inovasi Daerah pertahapan.</p></small>
                                </div>
                                <small><p>b. Lomba Inovasi Daerah terdiri atas submenu Inovasi Pemerintah Daerah dan Inovasi Masyarakat :</p></small>
                                <div class="px-3">
                                    <small><p>1. Inovasi Pemerintah Daerah merupakan submenu yang berfungsi untuk menghimpun dan mengelola berbagai data Inovasi yang berasal dari Lomba Inovasi yang diadakan oleh Pemerintah Daerah terkait</p></small>
                                    <small><p>2. Inovasi Masyarakat merupakan submenu yang berfungsi untuk menghimpun dan mengelola berbagai Inovasi Daerah yang di inisiasi oleh Masyarakat secara mandiri</p></small>
                                </div>
                            </div>
                        </ul>
                    </div>

                    <div class="col-lg-12">
                        <button class="btn bg-light w-100 text-start" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Apa yang harus dilakukan jika saya terlanjur menginput data inovasi pada menu Lomba Inovasi Daerah ?
                        </button>
                        <ul class="dropdown-menu px-2 w-95">
                            <div class="p-3">
                                <small><p>Hal-hal yang perlu dilakukan apabila data inovasi daerah terlanjur tersimpan melalui menu Lomba Inovasi Daerah :</p></small>
                                <div class="px-3">
                                    <small><p>1. Data Inovasi yang terupload pada menu Lomba Inovasi Daerah dapat terinput kedalam menu Database Inovasi Daerah dengan klik icon “kirim”(origami pesawat) pada bar “Aksi” ;.</p></small>
                                    <small><p>2. Sebelum mengirimkan Data Inovasi Daerah pada Menu Lomba Inovasi, dimohon untuk kembali mengecek kelengkapan data pendukung serta kesesuaian parameter pada tiap-tiap indikator yang ada.</p></small>
                                </div>
                            </div>
                        </ul>
                    </div>

                    <div class="col-lg-12">
                        <button class="btn bg-light w-100 text-start" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Bagaimana cara untuk mengupload Inovasi Daerah?
                        </button>
                        <ul class="dropdown-menu px-2 w-95">
                            <div class="p-3">
                                <small><p>Setiap data Inovasi Daerah yang dikelola baik oleh Akun Pemda maupun Akun OPD dapat diupload kedalam sistem Indeks Inovasi Daerah dengan cara sebagai berikut :</p></small>
                                <div class="px-3">
                                    <small><p>1. Upload data Inovasi Data Inovasi Daerah dengan membuka Menu Database Inovasi Daerah;</p></small>
                                    <small><p>2. Selanjutnya klik icon “Tambah Inovasi Daerah” pada submenu Inovasi Daerah; dan</p></small>
                                    <small><p>3. Terkait dengan mekanisme pengisian data inovasi daerah secara mendetail dapat dilihat melalui Manual Book Aplikasi pada link berikut : https://res.tuxedovation.com/acebc60bfbebab0742af4bccd6455bd6dc7690bb.pdf</p></small>
                                </div>
                            </div>
                        </ul>
                    </div>

                    <div class="col-lg-12">
                        <button class="btn bg-light w-100 text-start" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Berapa umur Inovasi Daerah yang dipersyaratkan pada penilaian Indeks Inovasi Daerah tahun 2021?
                        </button>
                        <ul class="dropdown-menu px-2 w-95">
                            <div class="p-3">
                                <small><p>Inovasi Daerah yang akan dinilai pada sistem indeks inovasi daerah tahun 2021 adalah inovasi yang telah diterapkan dalam kurun waktu maksimal 2 tahun yakni pada tahun 2019 hingga tahun 2020 (1 Januari 2019 s.d. 31 Desember 2020).</p></small>
                            </div>
                        </ul>
                    </div>

                    <div class="col-lg-12">
                        <button class="btn bg-light w-100 text-start" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Apakah umur Inovasi Daerah yang tidak masuk persyaratan untuk IID tahun 2021 dapat diinput atau tidak?
                        </button>
                        <ul class="dropdown-menu px-2 w-95">
                            <div class="p-3">
                                <small><p>Inovasi Daerah yang telah diterapkan dalam kurun waktu lebih dari 2 tahun dapat dilaporkan kedalam aplikasi sistem indeks inovasi daerah dan akan terarsip di dalam database</p></small>
                            </div>
                        </ul>
                    </div>

                    <div class="col-lg-12">
                        <button class="btn bg-light w-100 text-start" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Bagaimana prosedur penginputan data Inovasi Daerah?
                        </button>
                        <ul class="dropdown-menu px-2 w-95">
                            <div class="p-3">
                                <small><p>Prosedur penginputan data Inovasi Daerah dapat mempedomani Surat Mendagri No. 002.6/3363/SJ tanggal 08 Juni 2021 Perihal Penilaian Indeks Inovasi Daerah dan Pemberian Penghargaan Innovative Government Award (IGA) 2021 dan buku panduan Aplikasi Pendaftaran, Pengukuran, dan Penilaian Inovasi Daerah yang dapat dilihat pada menu Manual Book yang tersedia untuk teknis aplikasi.</p></small>
                            </div>
                        </ul>
                    </div>

                    <div class="col-lg-12">
                        <button class="btn bg-light w-100 text-start" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Bagaimana cara mendapatkan akun IID untuk menginput data Inovasi Daerah?
                        </button>
                        <ul class="dropdown-menu px-2 w-95">
                            <div class="p-3">
                                <small><p>Password dan username menggunakan password dan username yang telah dipergunakan pada penginputan data inovasi sebelumnya. Apabila daerah belum memiliki password dan username maka dapat mengajukan permohonan dengan cara bersurat Sekretariat Innovative Government Award (IGA) beralamatkan di Pusat Litbang Inovasi Daerah Badan Penelitian dan Pengembangan Kementerian Dalam Negeri Jl. Kramat Raya No.140, RT.1/RW.9, Kenari, Kec. Senen, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10430.</p></small>
                                <br>
                                <small><p>Informasi lebih lanjut mengenai akses password dan username dapat menghubungi Sdr. Aldo Harjunanto pada nomor 0821-3870-2516.</p></small>
                            </div>
                        </ul>
                    </div>

                    <div class="col-lg-12">
                        <button class="btn bg-light w-100 text-start" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Bagaimana cara mendapatkan informasi yang lebih detail terkait dengan indeks inovasi Daerah?
                        </button>
                        <ul class="dropdown-menu px-2 w-95">
                            <div class="p-3">
                                <small><p>Untuk informasi lebih lanjut dapat menghubungi Badan Penelitian dan Pengembangan Kementerian Dalam Negeri, Jl. Kramat Raya No. 132 Jakarta Pusat Telepon/fax 021-3157116 atau narahubung melalui Sdri. Meisya Mardhatillah nomor HP 0812-9175-7043, Sdr. R. Kus Yoga Bimasakti nomor HP 0822-2604-0715, Sdr. Arzad Sectio nomor HP 0812-8390-9480, Sdri. Ray Septianis Kartika nomor HP 0896-1175-6331 atau dapat melalui email: puslitbangnovda@gmail.com.</p></small>
                            </div>
                        </ul>
                    </div>

                    <div class="col-lg-12">
                        <button class="btn bg-light w-100 text-start" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Apakah daerah dapat mengajukan revisi pelaporan indeks inovasi daerah?
                        </button>
                        <ul class="dropdown-menu px-2 w-95">
                            <div class="p-3">
                                <small><p>Pelaporan indeks inovasi hanya dapat dilakukan 1 kali dan tidak dapat dilakukan revisi setelah mengirimkan ke Kemendagri dan mendapatkan nomor registrasi(mohon admin/operator memastikan data yang akan dilaporkan merupakan data yang sudah final)</p></small>
                            </div>
                        </ul>
                    </div>

                    <div class="col-lg-12">
                        <button class="btn bg-light w-100 text-start" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Apakah daerah dapat mengajukan perubahan password dan username?
                        </button>
                        <ul class="dropdown-menu px-2 w-95">
                            <div class="p-3">
                                <small><p>Password dapat di reset, sedangkan perubahan username harus dilakukan dengan cara mengajukan permohonan kepada Kementerian Dalam Negeri. Informasi lebih lanjut mengenai perubahan password dan username dapat menghubungi Sdr. Aldo Harjunanto pada nomor 0821-3870-2516</p></small>
                            </div>
                        </ul>
                    </div>

                    <div class="col-lg-12">
                        <button class="btn bg-light w-100 text-start" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Siapa saja yang berhak mengakses password?
                        </button>
                        <ul class="dropdown-menu px-2 w-95">
                            <div class="p-3">
                                <small><p>Password hanya dapat diakses oleh admin yang terdaftar secara resmi di Kementerian Dalam Negeri</p></small>
                            </div>
                        </ul>
                    </div>

                    <div class="col-lg-12">
                        <button class="btn bg-light w-100 text-start" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Mengapa saya tidak bisa login di sistem Indeks Inovasi Daerah?
                        </button>
                        <ul class="dropdown-menu px-2 w-95">
                            <div class="p-3">
                                <small><p>Informasi lebih lanjut mengenai perubahan password dan username dapat menghubungi Sdr. Aldo Harjunanto pada nomor 0821-3870-2516</p></small>
                            </div>
                        </ul>
                    </div>

                    <div class="col-lg-12">
                        <button class="btn bg-light w-100 text-start" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Bagaimana cara mendapatkan nomor registrasi setelah mengirim data Inovasi Daerah?
                        </button>
                        <ul class="dropdown-menu px-2 w-95">
                            <div class="p-3">
                                <small><p>Setelah melakukan pengisian data Inovasi Daerah silahkan klik simbol  untuk mengajukan Nomor Registrasi ke Badan Penelitian dan Pengembangan Kemendagri, sebelum melakukan pengiriman Operator akan diminta mengisi form Pernyataan terkait kebenaran data berupa Nama Lengkap, Jabatan/Golongan, Instansi, No. HP dan e-mail</p></small>
                            </div>
                        </ul>
                    </div>

                    <div class="col-lg-12">
                        <button class="btn bg-light w-100 text-start" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Apa yang harus saya lakukan apabila terdapat kendala?
                        </button>
                        <ul class="dropdown-menu px-2 w-95">
                            <div class="p-3">
                                <small><p>Untuk informasi lebih lanjut dapat menghubungi Badan Penelitian dan Pengembangan Kementerian Dalam Negeri, Jl. Kramat Raya No. 132 Jakarta Pusat Telepon/fax 021-3157116 atau narahubung melalui Sdri. Meisya Mardhatillah nomor HP 0812-9175-7043, Sdr. R. Kus Yoga Bimasakti nomor HP 0822-2604-0715, Sdr. Arzad Sectio nomor HP 0812-8390-9480, Sdri. Ray Septianis Kartika nomor HP 0896-1175-6331 atau dapat melalui email: puslitbangnovda@gmail.com.</p></small>
                            </div>
                        </ul>
                    </div>

                    <div class="col-lg-12">
                        <button class="btn bg-light w-100 text-start" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Bagaimana cara untuk melaporkan data informasi Daerah Provinsi dan Kabupaten/Kota
                        </button>
                        <ul class="dropdown-menu px-2 w-95">
                            <div class="p-3">
                                <small><p>Pelaporan data informasi dilakukan oleh seluruh Litbang Daerah (Provinsi, Kabupaten dan Kota) Se-Indonesia guna pemutakhiran data pejabat/staf teknis yang menangani penginputan data Indeks Inovasi Daerah. Pelaporan data informasi dapat dilakukan dengan melengkapi data melalui link yang berada dibawah ini :</p></small>
                                <div class="px-3">
                                    <small><p>1. Data Provinsi http://bit.ly/PENGISANDATALITBANG_PROVINSI; dan</p></small>
                                    <small><p>2. Data Kabupaten/kota http://bit.ly/PENGISIANDATALITBANG_KABUPATENKOTA
                                    </p></small>
                                </div>
                            </div>
                        </ul>
                    </div>

                    <div class="col-lg-12">
                        <button class="btn bg-light w-100 text-start" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Bagaimana cara mendapatkan akun IID untuk menginput data Inovasi Daerah?
                        </button>
                        <ul class="dropdown-menu px-2 w-95">
                            <div class="p-3">
                                <small><p>Password dan username menggunakan password dan username yang telah dipergunakan pada penginputan data inovasi sebelumnya. Apabila daerah belum memiliki password dan username maka dapat mengajukan permohonan dengan cara bersurat Sekretariat Innovative Government Award (IGA) beralamatkan di Pusat Litbang Inovasi Daerah Badan Penelitian dan Pengembangan Kementerian Dalam Negeri Jl. Kramat Raya No.140, RT.1/RW.9, Kenari, Kec. Senen, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10430.</p></small><br>
                                <small><p>Informasi lebih lanjut mengenai akses password dan username dapat menghubungi Sdr. Aldo Harjunanto pada nomor 0821-3870-2516.</p></small>
                            </div>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

                  
