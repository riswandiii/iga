-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 11, 2024 at 04:03 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inovasi_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bentuk__inovasi__daerahs`
--

CREATE TABLE `bentuk__inovasi__daerahs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bentuk` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bentuk__inovasi__daerahs`
--

INSERT INTO `bentuk__inovasi__daerahs` (`id`, `bentuk`, `created_at`, `updated_at`) VALUES
(1, 'Inovasi daerah lainnya sesuai denhgan urusan pemerintahan yang menjadi kewenangan daerah', NULL, NULL),
(2, 'Inovasi pelayanan public', NULL, NULL),
(3, 'Inovasi tata kelola pemerintahan daerah', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data__pendukungs`
--

CREATE TABLE `data__pendukungs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `inovasi_pemerintah_daerah_id` bigint(20) UNSIGNED NOT NULL,
  `indikator_id` bigint(20) UNSIGNED NOT NULL,
  `nomor_surat` varchar(100) DEFAULT NULL,
  `tanggal_surat` varchar(100) DEFAULT NULL,
  `tentang` varchar(100) DEFAULT NULL,
  `dokumen` varchar(100) DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data__pendukungs`
--

INSERT INTO `data__pendukungs` (`id`, `inovasi_pemerintah_daerah_id`, `indikator_id`, `nomor_surat`, `tanggal_surat`, `tentang`, `dokumen`, `link`, `created_at`, `updated_at`) VALUES
(14, 16, 1, '003', '2024-02-09', 'Dokumen pendukung', 'dokumen-pendukung/GWMSfmcEmgCkTh32otDhuiulgcg6fNjH6Ss4PkLc.pdf', NULL, '2024-02-09 11:39:28', '2024-02-09 11:39:28');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `footer_dashboards`
--

CREATE TABLE `footer_dashboards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis` text NOT NULL,
  `isi` text NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `copyright` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footer_dashboards`
--

INSERT INTO `footer_dashboards` (`id`, `jenis`, `isi`, `image`, `copyright`, `created_at`, `updated_at`) VALUES
(3, 'Indeks Inovasi Daerah 2023', 'Sistem ini digunakan untuk mengumpulkan seluruh Inovasi Daerah baik itu bidang Digital maupun Non Digital yang kemudian akan dilakukan pengukuran dan penilaian terhadap masing-masing inovasi yang dikirimkan ke Kemendagri.', 'image/ZLj4uQuTY5gvx6qjvd6XQ3Kh4GdTlgdJHvXOI5Sg.PNG', '2023 BSKDN Kemendagri\r\n\r\nAll rights reserved', '2024-02-06 00:32:03', '2024-02-06 00:32:03');

-- --------------------------------------------------------

--
-- Table structure for table `indikators`
--

CREATE TABLE `indikators` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `indikator` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `data_pendukung` varchar(255) NOT NULL,
  `jenis_file` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `indikators`
--

INSERT INTO `indikators` (`id`, `indikator`, `keterangan`, `data_pendukung`, `jenis_file`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Regulasi Inovasi Daerah\r\n \r\n', 'Regulasi yang menetapkan nama-nama inovasi daerah yang menjadi landasan operasional penerapan Inovasi Daerah.', 'Perda atau Perkada atau SK Kepala Daerah atau SK Kepala Perangkat Daerah serta halaman yang memuat nama inovasi yang sah dan valid serta sesuai pada tahun saat penerapan (pdf)', 'Dokumen PDF', 'surat', NULL, NULL),
(2, 'Ketersediaan SDM Terhadap Inovasi Daerah', 'Jumlah SDM yang mengelola inovasi daerah (Tahun Terakhir)', 'SK atau ST yang ditetapkan oleh Kepala Daerah/Kepala Perangkat Daerah pada tahun penerapan (pdf).', 'Dokumen PDF', 'surat', NULL, NULL),
(3, 'Dukungan Anggaran', 'Anggaran inovasi daerah dalam APBD dengan tahapan penerapan (penyediaan sarana prasarana, sumber daya manusia dan layanan, bimtek, urusan jenis layanan). Penerapan inovasi yang dilakukan sudah menjadi bagian dari kegiatan yang mendapatkan alokasi anggaran.', 'Dokumen anggaran yang memuat program dan kegiatan inovasi daerah sesuai dengan tahun anggaran (pdf)', 'Dokumen PDF', 'surat', NULL, NULL),
(4, 'Penggunaan IT', 'Penggunaan IT dalam pelaksanaan Inovasi yang diterapkan', 'Foto kegiatan/gambar screenshot layar (pdf/jpeg/jpg/png)', 'Dokumen/Foto/Gambar', 'pdf_gambar', NULL, NULL),
(5, 'Bimtek Inovasi', 'Peningkatan kapasitas dan kompetensi pelaksana inovasi daerah', 'SK Kegiatan/Surat Tugas, Daftar Hadir, dan Undangan bimtek atau kegiatan transfer pengetahuan (pdf) serta bukti dukung sejumlah frekuensi pelaksanaan bimtek.', 'Dokumen PDF', 'surat', NULL, NULL),
(6, 'Program dan kegiatan inovasi Perangkat Daerah dalam RKPD', 'Inovasi Perangkat Daerah telah dituangkan dalam program pembangunan daerah', 'Dokumen RKPD yang memuat program dan kegiatan inovasi daerah (pdf)', 'Dokumen PDF', 'surat', NULL, NULL),
(7, 'Keterlibatan aktor inovasi', 'Keikutsertaan unsur Stakeholder dalam pelaksanaan inovasi daerah (T-1 dan T-2)', 'Surat Keputusan Perangkat Daerah/Undangan rapat dalam 2 (dua) tahun terakhir (pdf)', 'Dokumen PDF', 'surat', NULL, NULL),
(8, 'Pelaksana Inovasi Daerah', 'Penetapan tim pelaksana inovasi daerah', 'SK Penetapan oleh Kepala Daerah/Kepala Perangkat Daerah dalam 2 (dua) tahun terakhir (pdf)\r\n', 'Dokumen PDF', 'surat', NULL, NULL),
(9, 'Jejaring Inovasi\r\n \r\n \r\n', 'Jumlah Perangkat Daerah yang terlibat dalam penerapan inovasi (dalam 2 tahun terakhir)', 'SK/ST tim pengelola penerapan inovasi daerah dalam 2 (dua) tahun terakhir (pdf)', 'Dokumen PDF', 'surat', NULL, NULL),
(10, 'Sosialisasi Inovasi Daerah', 'Penyebarluasan informasi kebijakan inovasi daerah (2 Tahun Terakhir)', 'Dokumentasi dan publikasi (foto kegiatan/seminar/display pameran inovasi atau screenshot konten pada media sosial/website atau pemberitaan media massa massa cetak/elektronik) (jpeg/jpg/png)', 'Dokumen/Foto/Gambar', 'pdf_gambar', NULL, NULL),
(11, 'Pedoman Teknis', 'Ketentuan dasar penggunaan inovasi daerah berupa buku petunjuk/manual book', 'Dokumen manual book/buku petunjuk elektronik (pdf) atau screenshot penggunaan inovasi daerah (jpg/jpeg/png)', 'Dokumen/Foto/Gambar', 'pdf_gambar', NULL, NULL),
(12, 'Kemudahan Informasi Layanan\r\n \r\n', 'Kemudahan mendapatkan informasi layanan', 'Nomor layanan telp/screenshot email/akun media sosial/nama aplikasi online/bagian dalam dari aplikasi online/dokumen foto buku tamu layanan (pdf/jpeg/jpg/png)', 'Dokumen/Foto/Gambar', 'pdf_gambar', NULL, NULL),
(13, 'Kemudahan Proses Inovasi Yang Dihasilkan', 'Waktu yang diperlukan untuk memperoleh proses penggunaan hasil inovasi', 'SOP pelaksanaan inovasi daerah yang memuat durasi waktu layanan (pdf).', 'Dokumen PDF', 'surat', NULL, NULL),
(14, 'Penyelesaian Layanan Pengaduan', 'Rasio penyelesaian pengaduan dalam tahun terakhir (jumlah pengaduan yang di tindakalnajuti/ jumlah pengaduan keseluruhan x100%)', 'Dokumen foto kegiatan penyelesaian pengaduan/screenshot media layanan pengaduan yang disertai dengan rekapitulasi pengaduan dan persentase rasio penyelesaian pengaduan (jpg, jpeg,', 'Dokumen/Foto/Gambar', 'pdf_gambar', NULL, NULL),
(15, 'Online Sistem', 'Jaringan prosedur yang dibuat secara daring ( 2 Tahun Terakhir)', 'Screenshot aplikasi layanan inovasi pada bagian beranda/halaman depan dan bagian proses layanan (jpg/jpeg/png)', 'Foto/Gambar', 'pdf_gambar', NULL, NULL),
(16, 'Replikasi\r\n \r\n \r\n', 'Inovasi Daerah telah direplikasi oleh daerah lain (T-2 sampai dengan T-1)', 'Dokumen PKS/MoU/Surat Pernyataan dari pemda yang mereplikasi /dokumen replikasi lainnya (pdf)', 'Dokumen PDF', 'surat', NULL, NULL),
(17, 'Kecepatan Inovasi', '\r\n \r\nSatuan waktu yang digunakan untuk menciptakan inovasi daerah', 'Dokumen/ laporan/proposal inovasi daerah yang memuat tahapan-tahapan proses dan durasi penciptaan inovasi daerah (pdf).', 'Dokumen PDF', 'pdf_gambar', NULL, NULL),
(18, 'Kemanfaatan Inovasi', 'Jumlah pengguna atau penerima manfaat inovasi daerah (2 tahun terakhir)', 'Daftar penerima manfaat inovasi (untuk layanan luring) (pdf) atau screenshot jumlah pengguna/penerima manfaat inovasi daerah (untuk layanan daring) (jpg/jpeg/png)', 'Dokumen/Foto/Gambar', 'pdf_gambar', NULL, NULL),
(19, 'Monitoring dan Evaluasi Inovasi Daerah\r\n \r\n', 'Kepuasan pelaksanaan penggunaan inovasi daerah (2 Tahun Terakhir)\r\n \r\n \r\n', 'Screenshot testimoni pengguna (jpeg/jpg/png) atau laporan survei kepuasan masyarakat/laporan hasil penelitian (pdf)', 'Dokumen/Foto/Gambar', 'pdf_gambar', NULL, NULL),
(20, 'Kualitas Inovasi Daerah', 'Kualitas inovasi dengan video yang memvisualisasikan 5 substansi:\r\n1. Latar belakang inovasi\r\n2. Penjaringan ide\r\n3. Pemilihan ide\r\n4. Manfaat inovasi\r\n5. Dampak inovasi \r\n', 'Video penerapan inovasi dengan durasi maksimal 5 menit (mp4/MOV) atau link google drive/ youtube\r\n', 'Upload Video .mp4', 'video', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inisiator__inovasi__daerahs`
--

CREATE TABLE `inisiator__inovasi__daerahs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `inisiator` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inisiator__inovasi__daerahs`
--

INSERT INTO `inisiator__inovasi__daerahs` (`id`, `inisiator`, `created_at`, `updated_at`) VALUES
(1, 'Kepala Daerah', NULL, NULL),
(2, 'Anggota DPRD', NULL, NULL),
(3, 'OPD', NULL, NULL),
(4, 'ASN', NULL, NULL),
(5, 'Masyarakat', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inovasi__pemerintah__daerahs`
--

CREATE TABLE `inovasi__pemerintah__daerahs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_inovasi` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tahapan_inovasi_id` bigint(20) UNSIGNED NOT NULL,
  `inisiator_inovasi_daerah_id` bigint(20) UNSIGNED NOT NULL,
  `jenis_inovasi_id` bigint(20) UNSIGNED NOT NULL,
  `bentuk_inovasi_daerah_id` bigint(20) UNSIGNED NOT NULL,
  `tematik_id` bigint(20) UNSIGNED NOT NULL,
  `urusan_utama_id` bigint(20) UNSIGNED NOT NULL,
  `urusan_lain_id` bigint(20) UNSIGNED NOT NULL,
  `waktu_uji_coba` date NOT NULL,
  `waktu_penerapan` date NOT NULL,
  `rancang_bangun` text NOT NULL,
  `tujuan_inovasi` text NOT NULL,
  `manfaat_diperoleh` text NOT NULL,
  `hasil_inovasi` text NOT NULL,
  `anggaran` varchar(100) DEFAULT NULL,
  `profil_bisnis` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inovasi__pemerintah__daerahs`
--

INSERT INTO `inovasi__pemerintah__daerahs` (`id`, `nama_inovasi`, `user_id`, `tahapan_inovasi_id`, `inisiator_inovasi_daerah_id`, `jenis_inovasi_id`, `bentuk_inovasi_daerah_id`, `tematik_id`, `urusan_utama_id`, `urusan_lain_id`, `waktu_uji_coba`, `waktu_penerapan`, `rancang_bangun`, `tujuan_inovasi`, `manfaat_diperoleh`, `hasil_inovasi`, `anggaran`, `profil_bisnis`, `created_at`, `updated_at`) VALUES
(16, 'Contoh inovai daerah', 1, 1, 1, 2, 2, 2, 2, 2, '2024-02-15', '2024-02-07', '<div>&lt;div&gt;Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt doloribus repudiandae in praesentium, fuga animi alias commodi pariatur totam iure necessitatibus. Fuga itaque error officia id nam nulla possimus quis sint rerum aut aperiam qui doloribus odio voluptate minus architecto voluptas, magnam exercitationem eos ex consequuntur cumque omnis deleniti non? Ipsam sequi soluta saepe, amet quasi odio incidunt tenetur doloribus debitis, omnis nemo animi distinctio facilis excepturi atque commodi aliquid, esse veniam sunt facere inventore adipisci. Saepe, consectetur ducimus laboriosam velit expedita harum et reiciendis a eligendi suscipit, ipsam officia enim qui, eum ea aperiam voluptates ut quaerat dolore repellendus soluta optio! Vero illum perferendis odit placeat corporis deserunt eligendi quisquam dignissimos iste ipsum provident cupiditate soluta explicabo unde voluptas, commodi accusantium iure, esse ipsa! Aut nisi suscipit laborum dignissimos obcaecati dolor, iure at unde voluptates architecto qui nostrum odio impedit doloribus quia eius deleniti. Fugit cumque repellendus tempora, corrupti ipsam autem aspernatur id vitae, eius iusto suscipit explicabo possimus quos cum ipsum, eveniet nam eaque laboriosam dolore amet ipsa! Expedita culpa ratione provident, aut esse at aspernatur, consectetur, deleniti molestias quas cum velit corporis eos explicabo quasi fugiat libero quaerat porro repudiandae harum ab sint soluta quia! Magnam, veniam. At iure quam explicabo cum eos magni tempore nam assumenda deserunt aliquid! Delectus laborum consequuntur optio? Nesciunt eius suscipit doloremque expedita quaerat corrupti labore quidem corporis ipsa neque fugit commodi reprehenderit odit molestias consequuntur magni quod dolor qui cumque, ipsum iusto, eveniet blanditiis? Vitae sint exercitationem perferendis totam quos quis harum architecto quas voluptatem aperiam consectetur inventore, voluptates fuga porro maiores sequi laudantium odio nisi consequatur magnam debitis itaque. Aspernatur, laudantium. Ex, omnis? Porro, eligendi! Iusto in, voluptas, dolorem fugit atque voluptatibus nam unde neque perferendis commodi, dicta totam facilis veniam sed perspiciatis quia quo quidem. Modi, nam quasi fuga voluptas aperiam enim distinctio. Veritatis, vero? Unde quas consequuntur in.&lt;/div&gt;</div>', '<div>&lt;div&gt;dsayudtsyutdsta&lt;/div&gt;</div>', '<div>&lt;div&gt;duoiurworuwur&lt;/div&gt;</div>', '<div>&lt;div&gt;79r79r7&lt;/div&gt;</div>', 'anggaran_pdf/gijaKyOHex4XQ79y32AtWProauK2Ewm2fi4NQHUe.pdf', NULL, '2024-02-09 09:14:16', '2024-02-10 01:58:41'),
(17, 'Aplikasi Marketplace BajuBodo (Belanja Langsung Melalui Order Online)', 1, 2, 5, 1, 2, 2, 2, 1, '2024-02-02', '2024-02-25', '<div>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Mollitia omnis, corrupti voluptatem est esse ad cumque harum delectus necessitatibus error voluptatibus blanditiis facilis eaque fugiat tempora aspernatur aliquid! Necessitatibus accusantium nesciunt in qui sed obcaecati, maxime ullam minima veritatis, eius incidunt amet pariatur. Quibusdam in eos sed atque voluptates voluptatum vero, odit tempora, rem voluptatibus facilis quo quasi? Fugiat nihil hic deserunt. Laudantium optio vero labore placeat. Accusamus, totam. Neque voluptatem magni quis incidunt sit culpa fugit expedita laudantium consectetur quas unde in, facilis itaque ipsa eum distinctio quidem soluta. Ducimus commodi assumenda debitis, ipsum voluptatum culpa. Magnam doloremque minima ut unde. Repellat quam, autem omnis temporibus nisi ratione nulla amet pariatur cum nihil laboriosam excepturi iste vitae veritatis tenetur incidunt explicabo, eaque quisquam eum? Mollitia, voluptas magnam asperiores, corporis tempore quia eligendi eius ad est aperiam architecto, unde excepturi veniam dicta. Soluta culpa magnam sint incidunt non! Modi eligendi nulla beatae nobis, exercitationem suscipit consequatur voluptate molestiae adipisci veritatis veniam eos fugit ipsum eveniet. Et tenetur voluptatem numquam laborum, nihil est, voluptas sequi nesciunt quam sit maxime deserunt perspiciatis voluptate corrupti quo molestias explicabo saepe eius vitae iure. Minus molestiae debitis tenetur non totam molestias magni sapiente eos! Voluptates assumenda veniam consectetur, dolor eos rem harum eum quae, consequuntur autem animi? Porro, maiores iure eligendi pariatur perspiciatis assumenda sint fuga maxime? Asperiores quibusdam nemo tempore sunt est, fuga nam! Ipsa impedit numquam aut ab debitis? Similique aperiam fugiat quam, provident quas, fuga dignissimos repellat minus sint earum ut, pariatur qui commodi cum. Illum consectetur pariatur molestiae soluta, natus placeat esse, iste numquam similique modi delectus? Explicabo ad necessitatibus aspernatur ipsam error voluptatem deserunt aliquam incidunt! Nostrum fuga esse ab. Eum enim incidunt non pariatur! Vero officiis quidem consequuntur nemo velit nisi! Sequi incidunt soluta laudantium facere iusto nesciunt odit optio, dicta reiciendis modi molestias quas fuga totam amet in!</div>', '<div>iryryryty</div>', '<div>ryiyty8y</div>', '<div>yryrytyr</div>', NULL, NULL, '2024-02-09 22:22:53', '2024-02-10 05:02:35');

-- --------------------------------------------------------

--
-- Table structure for table `jenis__inovasis`
--

CREATE TABLE `jenis__inovasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis__inovasis`
--

INSERT INTO `jenis__inovasis` (`id`, `jenis`, `created_at`, `updated_at`) VALUES
(1, 'Digital', NULL, NULL),
(2, 'Non Digital', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kematangans`
--

CREATE TABLE `kematangans` (
  `id` int(11) NOT NULL,
  `inovasi_pemerintah_daerah_id` int(11) NOT NULL,
  `indikator_id` int(11) NOT NULL,
  `parameter_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kematangans`
--

INSERT INTO `kematangans` (`id`, `inovasi_pemerintah_daerah_id`, `indikator_id`, `parameter_id`, `created_at`, `updated_at`) VALUES
(69, 16, 1, 1, '2024-02-09 11:39:43', '2024-02-09 11:39:43'),
(70, 16, 2, 5, '2024-02-09 11:39:52', '2024-02-09 11:39:52'),
(71, 16, 4, 11, '2024-02-10 02:08:06', '2024-02-10 02:08:06');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_01_22_071908_create_opds_table', 1),
(6, '2024_01_22_072010_create_uptds_table', 1),
(7, '2024_01_22_133308_create_inovasi__pemerintah__daerahs_table', 1),
(8, '2024_01_22_133334_create_tahapan__inovasis_table', 1),
(9, '2024_01_22_133419_create_inisiator__inovasi__daerahs_table', 1),
(10, '2024_01_22_133508_create_jenis__inovasis_table', 1),
(11, '2024_01_22_133523_create_bentuk__inovasi__daerahs_table', 1),
(12, '2024_01_22_133601_create_tematiks_table', 1),
(13, '2024_01_22_133625_create_urusan__pemerintahans_table', 1),
(14, '2024_01_22_133638_create_urusan__lains_table', 1),
(15, '2024_01_23_081518_create_footer_dashboards_table', 1),
(16, '2024_01_31_055636_create_parameters_table', 1),
(17, '2024_01_31_084050_create_indikators_table', 1),
(18, '2024_01_31_134100_create_parameters_table', 2),
(19, '2024_02_06_125922_create_kematangans_table', 3),
(20, '2024_02_07_141434_create_total_kematangans_table', 4),
(21, '2024_02_08_121615_create_data__pendukungs_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `opds`
--

CREATE TABLE `opds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `daerah` varchar(50) NOT NULL DEFAULT 'Provinsi Sulawesi Selatan',
  `nama_opd` varchar(150) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `opds`
--

INSERT INTO `opds` (`id`, `daerah`, `nama_opd`, `created_at`, `updated_at`) VALUES
(1, 'Provinsi Sulawesi Selatan', 'Dinas Perindustrian dan Perdagangan', '2024-02-03 16:00:58', '2024-02-05 05:25:13'),
(2, 'Provinsi Sulawesi Selatan', 'Dinas Pengelolaan Lingkungan Hidup dan Kehutanan', '2024-02-03 16:01:18', '2024-02-03 16:01:18'),
(3, 'Provinsi Sulawesi Selatan', 'Dinas Sumber Daya Air, Cipta Karya dan Tata Ruang', '2024-02-03 16:01:38', '2024-02-03 16:01:38'),
(4, 'Provinsi Sulawesi Selatan', 'Dinas Bina Marga dan Bina Konstruksi', '2024-02-03 16:01:55', '2024-02-03 16:01:55'),
(5, 'Provinsi Sulawesi Selatan', 'Balai Besar Industri Hasil Perkebunan', '2024-02-03 16:02:15', '2024-02-03 16:02:15'),
(6, 'Provinsi Sulawesi Selatan', 'Dinas Tanaman Pangan, Hortikultura dan Perkebunan', '2024-02-03 16:02:27', '2024-02-03 16:02:27'),
(7, 'Provinsi Sulawesi Selatan', 'Biro Pengadaan Barang/Jasa', '2024-02-03 16:02:40', '2024-02-03 16:02:40'),
(8, 'Provinsi Sulawesi Selatan', 'Biro Perekonomian dan Administrasi Pembangunan', '2024-02-03 16:02:53', '2024-02-03 16:02:53'),
(9, 'Provinsi Sulawesi Selatan', 'Dinas Pekerjaan Umum dan Tata Ruang', '2024-02-03 16:03:04', '2024-02-03 16:03:04'),
(10, 'Provinsi Sulawesi Selatan', 'Dinas Energi dan Sumber Daya Mineral', '2024-02-03 16:03:15', '2024-02-03 16:03:15'),
(11, 'Provinsi Sulawesi Selatan', 'Biro Administrasi Pimpinan', '2024-02-03 19:08:03', '2024-02-03 19:08:03'),
(12, 'Provinsi Sulawesi Selatan', 'Biro Umum', '2024-02-03 19:08:14', '2024-02-03 19:08:14'),
(13, 'Provinsi Sulawesi Selatan', 'Biro Organisasi', '2024-02-03 19:08:27', '2024-02-03 19:08:27'),
(14, 'Provinsi Sulawesi Selatan', 'Biro Hukum', '2024-02-03 19:08:37', '2024-02-03 19:08:37'),
(15, 'Provinsi Sulawesi Selatan', 'Biro Kesejahteraan Rakyat', '2024-02-03 19:08:47', '2024-02-03 19:08:47'),
(16, 'Provinsi Sulawesi Selatan', 'Biro Pemerintahan dan Otonomi Daerah', '2024-02-03 19:08:57', '2024-02-03 19:08:57'),
(17, 'Provinsi Sulawesi Selatan', 'Badan Kesatuan Bangsa dan Politik', '2024-02-03 19:09:06', '2024-02-03 19:09:06'),
(18, 'Provinsi Sulawesi Selatan', 'Rumah Sakit Sayang Rakyat', '2024-02-03 19:09:20', '2024-02-03 19:09:20'),
(19, 'Provinsi Sulawesi Selatan', 'Rumah Sakit Khusus Daerah Ibu dan Anak Sitti Fatimah', '2024-02-03 19:10:43', '2024-02-03 19:10:43'),
(20, 'Provinsi Sulawesi Selatan', 'Rumah Sakit Khusus Ibu dan Anak Pertiwi', '2024-02-03 19:10:59', '2024-02-03 19:10:59'),
(21, 'Provinsi Sulawesi Selatan', 'Rumah Sakit Khusus Daerah Dadi', '2024-02-03 19:11:13', '2024-02-03 19:11:13'),
(22, 'Provinsi Sulawesi Selatan', 'Rumah Sakit Umum Daerah Haji Makassar', '2024-02-03 19:11:27', '2024-02-03 19:11:27'),
(23, 'Provinsi Sulawesi Selatan', 'Rumah Sakit Umum Daerah Labuang Baji', '2024-02-03 19:11:36', '2024-02-03 19:11:36'),
(24, 'Provinsi Sulawesi Selatan', 'UPT RSK Gigi dan Mulut', '2024-02-03 19:11:46', '2024-02-03 19:11:46'),
(25, 'Provinsi Sulawesi Selatan', 'UPT Pelatihan Kesehatan', '2024-02-03 19:11:59', '2024-02-03 19:11:59'),
(26, 'Provinsi Sulawesi Selatan', 'UPT Transfusi Darah', '2024-02-03 19:12:10', '2024-02-03 19:12:10'),
(27, 'Provinsi Sulawesi Selatan', 'Dinas Perpustakaan dan Kearsipan', '2024-02-03 19:12:21', '2024-02-03 19:12:21'),
(28, 'Provinsi Sulawesi Selatan', 'Badan Keuangan dan Aset Daerah', '2024-02-03 19:12:30', '2024-02-03 19:12:30'),
(29, 'Provinsi Sulawesi Selatan', 'Sekretariat Dewan Perwakilan Rakyat Daerah', '2024-02-03 19:12:42', '2024-02-03 19:12:42'),
(30, 'Provinsi Sulawesi Selatan', 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu', '2024-02-03 19:12:54', '2024-02-03 19:12:54'),
(31, 'Provinsi Sulawesi Selatan', 'Dinas Kependudukan dan Pencatatan Sipil', '2024-02-03 19:13:05', '2024-02-03 19:13:05'),
(32, 'Provinsi Sulawesi Selatan', 'Dinas Pemberdayaan Perempuan, Perlindungan Anak, Pengendalian Penduduk, dan Keluarga Berencana', '2024-02-03 19:13:16', '2024-02-03 19:13:16'),
(33, 'Provinsi Sulawesi Selatan', 'Satuan Polisi Pamong Praja', '2024-02-03 19:13:27', '2024-02-03 19:13:27'),
(34, 'Provinsi Sulawesi Selatan', 'nspektorat Daerah', '2024-02-03 19:13:37', '2024-02-03 19:13:37'),
(35, 'Provinsi Sulawesi Selatan', 'Dinas Kepemudaan dan Olahraga', '2024-02-03 19:13:48', '2024-02-03 19:13:48'),
(36, 'Provinsi Sulawesi Selatan', 'Badan Penghubung Daerah', '2024-02-03 19:13:58', '2024-02-03 19:13:58'),
(37, 'Provinsi Sulawesi Selatan', 'Badan Perencanaan Pembangunan, Penelitian dan Pengembangan Daerah', '2024-02-03 19:14:07', '2024-02-03 19:14:07'),
(38, 'Provinsi Sulawesi Selatan', 'Badan Penanggulangan Bencana Daerah', '2024-02-03 19:14:16', '2024-02-03 19:14:16'),
(39, 'Provinsi Sulawesi Selatan', 'Badan Pengembangan Sumber Daya Manusia', '2024-02-03 19:14:27', '2024-02-03 19:14:27'),
(40, 'Provinsi Sulawesi Selatan', 'Badan Pendapatan Daerah', '2024-02-03 19:14:36', '2024-02-03 19:14:36'),
(41, 'Provinsi Sulawesi Selatan', 'Dinas Kebudayaan dan Kepariwisataan', '2024-02-03 19:14:57', '2024-02-03 19:14:57'),
(42, 'Provinsi Sulawesi Selatan', 'Dinas Koperasi, Usaha Kecil dan Menengah', '2024-02-03 19:15:06', '2024-02-03 19:15:06'),
(43, 'Provinsi Sulawesi Selatan', 'Dinas Perdagangan', '2024-02-03 19:15:18', '2024-02-03 19:15:18'),
(44, 'Provinsi Sulawesi Selatan', 'Dinas Perindustrian', '2024-02-03 19:15:27', '2024-02-03 19:15:27'),
(45, 'Provinsi Sulawesi Selatan', 'Dinas Kelautan dan Perikanan', '2024-02-03 19:15:36', '2024-02-03 19:15:36'),
(46, 'Provinsi Sulawesi Selatan', 'Dinas Pengelolaan Lingkungan Hidup', '2024-02-03 19:15:45', '2024-02-03 19:15:45'),
(47, 'Provinsi Sulawesi Selatan', 'Dinas Perumahan, Kawasan Pemukiman, dan Pertanahan', '2024-02-03 19:15:53', '2024-02-03 19:15:53'),
(48, 'Provinsi Sulawesi Selatan', 'Dinas Komunikasi, Informatika, Statistik dan Persandian', '2024-02-03 19:16:02', '2024-02-03 19:16:02'),
(49, 'Provinsi Sulawesi Selatan', 'Dinas Perhubungan', '2024-02-03 19:16:10', '2024-02-03 19:16:10'),
(50, 'Provinsi Sulawesi Selatan', 'Dinas Pemberdayaan Masyarakat dan Desa', '2024-02-03 19:16:21', '2024-02-03 19:16:21'),
(51, 'Provinsi Sulawesi Selatan', 'Dinas Tenaga Kerja Dan Transmigrasi', '2024-02-03 19:16:29', '2024-02-03 19:16:29'),
(52, 'Provinsi Sulawesi Selatan', 'Badan Kepegawaian Daerah', '2024-02-03 19:16:38', '2024-02-03 19:16:38'),
(53, 'Provinsi Sulawesi Selatan', 'Badan Kepegawaian Daerah', '2024-02-03 19:16:38', '2024-02-03 19:16:38'),
(54, 'Provinsi Sulawesi Selatan', 'Dinas Sosial', '2024-02-03 19:16:47', '2024-02-03 19:16:47'),
(55, 'Provinsi Sulawesi Selatan', 'Dinas Peternakan dan Kesehatan Hewan', '2024-02-03 19:16:55', '2024-02-03 19:16:55'),
(56, 'Provinsi Sulawesi Selatan', 'Dinas Ketahanan Pangan', '2024-02-03 19:17:04', '2024-02-03 19:17:04'),
(57, 'Provinsi Sulawesi Selatan', 'Dinas Kehutanan', '2024-02-03 19:17:12', '2024-02-03 19:17:12'),
(58, 'Provinsi Sulawesi Selatan', 'Dinas Kesehatan', '2024-02-03 19:17:21', '2024-02-03 19:17:21'),
(59, 'Provinsi Sulawesi Selatan', 'Dinas Pendidikan', '2024-02-03 19:17:29', '2024-02-03 19:17:29');

-- --------------------------------------------------------

--
-- Table structure for table `parameters`
--

CREATE TABLE `parameters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `indikator_id` int(11) NOT NULL,
  `bobot` int(11) NOT NULL,
  `parameter` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parameters`
--

INSERT INTO `parameters` (`id`, `indikator_id`, `bobot`, `parameter`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'SK Kepala Perangkat Daerah', NULL, NULL),
(2, 1, 6, 'SK Kepala Daerah', NULL, NULL),
(3, 1, 9, 'Peraturan Kepala Daerah / Peraturan Daerah', NULL, NULL),
(4, 2, 2, '1 - 10 SDM', NULL, NULL),
(5, 2, 4, '11 - 30 SDM', NULL, NULL),
(6, 2, 6, 'Lebih dari 30 SDM', NULL, NULL),
(7, 3, 2, 'Anggaran dialokasikan pada kegiatan penerapan inovasi di T-0 (tahun berjalan)', NULL, NULL),
(8, 3, 4, 'Anggaran dialokasikan pada kegiatan penerapan inovasi di T-1 atau T-2', NULL, NULL),
(9, 3, 6, 'Anggaran dialokasikan pada kegiatan penerapan inovasi di T-0, T-1 dan T-2', NULL, NULL),
(10, 4, 2, 'Pelaksanaan kerja secara manual / non elektronik', NULL, NULL),
(11, 4, 4, 'Pelaksanaan kerja secara elektronik', NULL, NULL),
(12, 4, 6, 'Pelaksanaan kerja sudah didukung sistem informasi online / daring', NULL, NULL),
(13, 5, 1, 'Dalam 2 tahun terakhir pernah 1 kali kegiatan transfer pengetahuan (bimtek, sharing, FGD, atau kegiatan transfer pengetahuan yang lain)', NULL, NULL),
(14, 5, 2, 'Dalam 2 tahun terakhir pernah 2 kali bimtek (bimtek, training, dan TOT)', NULL, NULL),
(15, 5, 3, 'Dalam 2 tahun terakhir pernah lebih dari 2 kali bimtek (bimtek, training, dan TOT)', NULL, NULL),
(16, 6, 2, 'Pemerintah daerah sudah menuangkan program inovasi daerah dalam RKPD T-1 atau T-2', NULL, NULL),
(17, 6, 4, 'Pemerintah daerah sudah menuangkan program inovasi daerah dalam RKPD T-1 dan T-2', NULL, NULL),
(18, 6, 6, 'Pemerintah daerah sudah menuangkan program inovasi daerah dalam RKPD T-1,  T-2 dan T-0 (T-0 adalah tahun berjalan)', NULL, NULL),
(19, 7, 1, 'Inovasi melibatkan 3 aktor', NULL, NULL),
(20, 7, 2, 'Inovasi melibatkan 4 aktor', NULL, NULL),
(21, 7, 3, 'Inovasi melibatkan 5 atau lebih aktor', NULL, NULL),
(22, 8, 1, 'Ada pelaksana namun tidak ditetapkan dengan SK Kepala Perangkat Daerah', NULL, NULL),
(23, 8, 2, 'Ada pelaksana dan ditetapkan dengan SK Kepala Perangkat Daerah', NULL, NULL),
(24, 8, 3, 'Ada pelaksana dan ditetapkan dengan SK Kepala Daerah', NULL, NULL),
(25, 9, 1, 'Inovasi melibatkan 1-2 Perangkat Daerah', NULL, NULL),
(26, 9, 2, 'Inovasi melibatkan 3-4 Perangkat Daerah', NULL, NULL),
(27, 9, 3, 'Inovasi melibatkan 5 Perangkat Daerah atau lebih', NULL, NULL),
(28, 10, 1, 'Foto kegiatan yang berlatar belakang spanduk kegiatan inovasi', NULL, NULL),
(29, 10, 2, 'Konten me Media Sosial', NULL, NULL),
(30, 10, 3, 'Media Berita', NULL, NULL),
(31, 11, 1, 'Telah terdapat pedoman teknis berupa buku manual', NULL, NULL),
(32, 11, 2, 'Telah terdapat pedoman teknis berupa buku dalam bentuk elektronik', NULL, NULL),
(33, 11, 3, 'Telah terdapat pedoman teknis berupa buku yang dapat diakses secara online', NULL, NULL),
(34, 12, 1, 'Layanan telepon atau tatap muka langsung/noken', NULL, NULL),
(35, 12, 2, 'Layanan Email/Media sosial', NULL, NULL),
(36, 12, 3, 'Layanan melalui aplikasi online', NULL, NULL),
(37, 13, 2, 'Hasil inovasi diperoleh dalam waktu 6 hari atau lebih', NULL, NULL),
(38, 13, 4, 'Hasil inovasi diperoleh dalam waktu 2-5 hari', NULL, NULL),
(39, 13, 6, 'Hasil inovasi diperoleh dalam waktu 1 hari', NULL, NULL),
(40, 14, 1, 'Kurang dari sama dengan 40% atau Tidak ada pengaduan', NULL, NULL),
(41, 14, 2, '40.01% s.d. 70.99%', NULL, NULL),
(42, 14, 3, 'Lebih dari sama dengan 71.00%', NULL, NULL),
(43, 15, 2, 'Ada dukungan melalui informasi website atau sosial media', NULL, NULL),
(44, 15, 4, 'Ada dukungan melalui web aplikasi', NULL, NULL),
(45, 15, 6, 'Ada dukungan melalui perangkat web aplikasi dan aplikasi mobile', NULL, NULL),
(46, 16, 3, 'Pernah 1 kali direplikasi di daerah lain', NULL, NULL),
(47, 16, 6, 'Pernah 2 kali direplikasi di daerah lain', NULL, NULL),
(48, 16, 9, 'Pernah 3 kali direplikasi di daerah lain', NULL, NULL),
(49, 17, 2, 'Inovasi dapat diciptakan dalam waktu 9 bulan atau lebih', NULL, NULL),
(50, 17, 4, 'Inovasi dapat diciptakan dalam waktu 5-8 bulan', NULL, NULL),
(51, 17, 6, 'Inovasi dapat diciptakan dalam waktu 1-4 bulan', NULL, NULL),
(52, 18, 3, 'Jumlah pengguna atau penerima manfaat 1-100 orang', NULL, NULL),
(53, 18, 6, 'Jumlah pengguna atau penerima manfaat 101-200 orang', NULL, NULL),
(54, 18, 9, 'Jumlah pengguna atau penerima manfaat 201 orang keatas', NULL, NULL),
(55, 19, 2, 'Hasil laporan monev internal Perangkat Daerah', NULL, NULL),
(56, 19, 4, 'Hasil Pengukuran kepuasan pengguna dari evaluasi Survei Kepuasan Masyarakat', NULL, NULL),
(57, 19, 6, 'Hasil laporan monev eksternal berdasarkan hasil penelitian', NULL, NULL),
(58, 20, 4, 'Memenuhi 1 atau 2 unsur substansi', NULL, NULL),
(59, 20, 8, 'Memenuhi 3 atau 4 unsur substansi', NULL, NULL),
(60, 20, 12, 'Memenuhi 5 unsur substansi', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tahapan__inovasis`
--

CREATE TABLE `tahapan__inovasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tahapan` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tahapan__inovasis`
--

INSERT INTO `tahapan__inovasis` (`id`, `tahapan`, `created_at`, `updated_at`) VALUES
(1, 'Inisiatif', NULL, NULL),
(2, 'Uji coba', NULL, NULL),
(3, 'Penerapan', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tematiks`
--

CREATE TABLE `tematiks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tematik` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tematiks`
--

INSERT INTO `tematiks` (`id`, `tematik`, `created_at`, `updated_at`) VALUES
(1, 'Digitalisasi  layanan pemerintahan', NULL, NULL),
(2, 'Penanggulanan kemiskinan', NULL, NULL),
(3, 'Kemudahan investasi', NULL, NULL),
(4, 'Prioritas aktual presiden', NULL, NULL),
(5, 'Non tematik', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `total_kematangans`
--

CREATE TABLE `total_kematangans` (
  `id` int(11) NOT NULL,
  `inovasi_pemerintah_daerah_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `total_kematangans`
--

INSERT INTO `total_kematangans` (`id`, `inovasi_pemerintah_daerah_id`, `total`, `created_at`, `updated_at`) VALUES
(15, 16, 11, '2024-02-10 10:08:06', '2024-02-10 02:08:06');

-- --------------------------------------------------------

--
-- Table structure for table `uptds`
--

CREATE TABLE `uptds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `opd_id` bigint(20) UNSIGNED NOT NULL,
  `nama_upt` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `uptds`
--

INSERT INTO `uptds` (`id`, `opd_id`, `nama_upt`, `created_at`, `updated_at`) VALUES
(1, 55, 'UPT Pembibitan Ternak dan Hijauan Pakan Ternak', '2024-02-03 19:20:37', '2024-02-03 19:20:37'),
(2, 54, 'UPT Pusat Pelayanan Sosial Lanjut Usia (PPSLU) Mappakasunggu', '2024-02-03 19:21:41', '2024-02-03 19:21:41'),
(3, 59, 'UPT SMA Negeri 4 Wajo', '2024-02-03 19:22:03', '2024-02-03 19:22:03'),
(4, 59, 'UPT SMK Negeri 3 Takalar', '2024-02-03 19:22:26', '2024-02-03 19:22:26'),
(5, 59, 'UPT SMA Negeri 5 Soppeng', '2024-02-03 19:22:41', '2024-02-03 19:22:41'),
(6, 59, 'UPT SMA Negeri 1 Soppeng', '2024-02-03 19:22:56', '2024-02-03 19:22:56');

-- --------------------------------------------------------

--
-- Table structure for table `urusan__lains`
--

CREATE TABLE `urusan__lains` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `urusan` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `urusan__lains`
--

INSERT INTO `urusan__lains` (`id`, `urusan`, `created_at`, `updated_at`) VALUES
(1, 'Pendidikan', NULL, NULL),
(2, 'Kesehatan', NULL, NULL),
(3, 'Pekerjaan umum dan penataan ruang', NULL, NULL),
(4, 'Perumahan rakyat dan kawasan pemukiman', NULL, NULL),
(5, 'Ketentraman, Ketertiban umum, dan perlindungan masyarakat', NULL, NULL),
(6, 'Sosial', NULL, NULL),
(7, 'Tenaga kerja', NULL, NULL),
(8, 'Pemberdayaan perempuan dan perlindungan anak', NULL, NULL),
(9, 'Pangan', NULL, NULL),
(10, 'Pertanahan', NULL, NULL),
(11, 'Lingkungan hidup', NULL, NULL),
(12, 'Adminitrasi kependudukan dan pencatatan sipil', NULL, NULL),
(13, 'Pemberdayaan masyarakat dan desa', NULL, NULL),
(14, 'Pengendalian penduduk dan keluarga berencana', NULL, NULL),
(15, 'Perhubungan', NULL, NULL),
(16, 'Koperasi, Usaha kecil dan menengah', NULL, NULL),
(17, 'Penanaman modal', NULL, NULL),
(18, 'Kepemudaan dan olahraga', NULL, NULL),
(19, 'Statistik', NULL, NULL),
(20, 'Persandian', NULL, NULL),
(22, 'Kebudayaan', NULL, NULL),
(23, 'Perpustakaan', NULL, NULL),
(24, 'Kearsipan', NULL, NULL),
(25, 'Kelautan dan perikanan', NULL, NULL),
(26, 'Pariwisata', NULL, NULL),
(27, 'Pertanian', NULL, NULL),
(28, 'Kehutanan', NULL, NULL),
(29, 'Energi dan sumber daya mineral', NULL, NULL),
(30, 'Perdagangan ', NULL, NULL),
(32, 'Transmigrasi', NULL, NULL),
(33, 'Perencanaan', NULL, NULL),
(34, 'Keuangan', NULL, NULL),
(35, 'Kepegawaian', NULL, NULL),
(36, 'Pendidikan dan pelatihan', NULL, NULL),
(37, 'Penelitian dan pengembangan', NULL, NULL),
(38, 'Fungsi lain sesuai dengan ketentuan peraturan perundang-undangan', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `urusan__pemerintahans`
--

CREATE TABLE `urusan__pemerintahans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `urusan` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `urusan__pemerintahans`
--

INSERT INTO `urusan__pemerintahans` (`id`, `urusan`, `created_at`, `updated_at`) VALUES
(1, 'Pendidikan', NULL, NULL),
(2, 'Kesehatan', NULL, NULL),
(3, 'Pekerjaan umum dan penataan ruang', NULL, NULL),
(4, 'Perumahan rakyat dan kawasan permukiman', NULL, NULL),
(5, 'Ketentraman, Ketertiban umum, dan perlindungan masyarakat', NULL, NULL),
(6, 'Sosial', NULL, NULL),
(7, 'Tenaga kerja', NULL, NULL),
(8, 'Pemberdayaan perempuan dan perlindungan anak', NULL, NULL),
(9, 'pangan', NULL, NULL),
(10, 'pertanahan', NULL, NULL),
(11, 'Lingkungan hidup', NULL, NULL),
(12, 'Adminitrasi kependudukan dan pencatatan sipil', NULL, NULL),
(13, 'Pemberdayaan masyarakat dan desa', NULL, NULL),
(14, 'Pengendalian penduduk dan keluarga berencana', NULL, NULL),
(15, 'Perhubungan', NULL, NULL),
(16, 'Komunikasi dan informatika', NULL, NULL),
(17, 'Koperasi, Usaha kecil, dan menengah', NULL, NULL),
(18, 'Penanaman modal', NULL, NULL),
(19, 'Kepemudaan dan olahraga', NULL, NULL),
(20, 'Statistik', NULL, NULL),
(21, 'Persandian', NULL, NULL),
(22, 'Kebudayaan', NULL, NULL),
(23, 'Perpustakaan', NULL, NULL),
(24, 'Kearsipan', NULL, NULL),
(25, 'Kelautan dan perikanan', NULL, NULL),
(26, 'Pariwisata', NULL, NULL),
(27, 'Pertanian', NULL, NULL),
(28, 'Kehutanan', NULL, NULL),
(29, 'Energi dan sumber daya mineral', NULL, NULL),
(30, 'Perdagangan', NULL, NULL),
(31, 'Perindustrian', NULL, NULL),
(32, 'Transmigrasi', NULL, NULL),
(33, 'Perencanaan', NULL, NULL),
(34, 'Keuangan', NULL, NULL),
(35, 'Kepegawaian', NULL, NULL),
(36, 'Pendidikan dan pelatihan', NULL, NULL),
(37, 'Penelitian dan pengembangan', NULL, NULL),
(38, 'Fungsi lain sesuai dengan ketentuan peraturan perundang-undangan', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `opd_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nama_lengkap` varchar(20) NOT NULL,
  `nama_panggilan` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(150) NOT NULL,
  `role` varchar(20) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `opd_id`, `nama_lengkap`, `nama_panggilan`, `email`, `username`, `password`, `role`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 2, 'Akun admin', 'Akun admin', 'admin@gmail.com', 'Akun admin', '$2y$12$HmsAB3yjF/LIaFmYfGMweeRTBYIo2z1er/reruXfr8MXnCeN6BqpK', 'Admin', NULL, NULL, '2024-02-03 19:28:11', '2024-02-05 05:25:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bentuk__inovasi__daerahs`
--
ALTER TABLE `bentuk__inovasi__daerahs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data__pendukungs`
--
ALTER TABLE `data__pendukungs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `footer_dashboards`
--
ALTER TABLE `footer_dashboards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indikators`
--
ALTER TABLE `indikators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inisiator__inovasi__daerahs`
--
ALTER TABLE `inisiator__inovasi__daerahs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inovasi__pemerintah__daerahs`
--
ALTER TABLE `inovasi__pemerintah__daerahs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis__inovasis`
--
ALTER TABLE `jenis__inovasis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kematangans`
--
ALTER TABLE `kematangans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opds`
--
ALTER TABLE `opds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parameters`
--
ALTER TABLE `parameters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tahapan__inovasis`
--
ALTER TABLE `tahapan__inovasis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tematiks`
--
ALTER TABLE `tematiks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `total_kematangans`
--
ALTER TABLE `total_kematangans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uptds`
--
ALTER TABLE `uptds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `urusan__lains`
--
ALTER TABLE `urusan__lains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `urusan__pemerintahans`
--
ALTER TABLE `urusan__pemerintahans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bentuk__inovasi__daerahs`
--
ALTER TABLE `bentuk__inovasi__daerahs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data__pendukungs`
--
ALTER TABLE `data__pendukungs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footer_dashboards`
--
ALTER TABLE `footer_dashboards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `indikators`
--
ALTER TABLE `indikators`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `inisiator__inovasi__daerahs`
--
ALTER TABLE `inisiator__inovasi__daerahs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `inovasi__pemerintah__daerahs`
--
ALTER TABLE `inovasi__pemerintah__daerahs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `jenis__inovasis`
--
ALTER TABLE `jenis__inovasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kematangans`
--
ALTER TABLE `kematangans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `opds`
--
ALTER TABLE `opds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `parameters`
--
ALTER TABLE `parameters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tahapan__inovasis`
--
ALTER TABLE `tahapan__inovasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tematiks`
--
ALTER TABLE `tematiks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `total_kematangans`
--
ALTER TABLE `total_kematangans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `uptds`
--
ALTER TABLE `uptds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `urusan__lains`
--
ALTER TABLE `urusan__lains`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `urusan__pemerintahans`
--
ALTER TABLE `urusan__pemerintahans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
