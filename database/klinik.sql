-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2023 at 03:51 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kelapasawit`
--

-- --------------------------------------------------------

--
-- Table structure for table `acces_groupmenu`
--

CREATE TABLE `acces_groupmenu` (
  `hakid` int(11) NOT NULL,
  `hakgroupid` int(11) DEFAULT NULL,
  `hakmenuid` varchar(30) DEFAULT NULL,
  `hakakses` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `acces_groupmenu`
--

INSERT INTO `acces_groupmenu` (`hakid`, `hakgroupid`, `hakmenuid`, `hakakses`) VALUES
(13, 2, 'admin_riwayat', '1'),
(12, 2, 'admin_konsultasi', '1'),
(11, 2, 'admin_gantifoto', '1'),
(10, 2, 'admin_beranda', '1'),
(9, 1, 'admin_riwayat', '1'),
(6, 1, 'admin_penyakit', '1'),
(5, 1, 'admin_gejala', '1'),
(4, 1, 'admin_user', '1'),
(2, 1, 'admin_gantifoto', '1'),
(144, 1, 'admin_konsultasi', '1'),
(142, 1, 'admin_rule', '1');

-- --------------------------------------------------------

--
-- Table structure for table `acces_grup`
--

CREATE TABLE `acces_grup` (
  `groupid` int(11) NOT NULL,
  `groupnama` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `acces_grup`
--

INSERT INTO `acces_grup` (`groupid`, `groupnama`) VALUES
(1, 'Admin'),
(2, 'Petani');

-- --------------------------------------------------------

--
-- Table structure for table `acces_menu`
--

CREATE TABLE `acces_menu` (
  `menuid` varchar(30) NOT NULL,
  `menunama` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `acces_menu`
--

INSERT INTO `acces_menu` (`menuid`, `menunama`) VALUES
('admin_riwayat', 'Riwayat Konsultasi'),
('admin_konsultasi', 'Konsultasi'),
('admin_rule', 'Rule'),
('admin_penyakit', 'Data Penyakit'),
('admin_user', 'Data Petani'),
('admin_gejala', 'Data Gejala'),
('admin_solusi', 'Data Penanganan');

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id_gejala` varchar(5) NOT NULL,
  `nama_gejala` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `nama_gejala`) VALUES
('G-001', 'Warna Daun Kecoklatan'),
('G-002', 'Daun Menjadi Rusak'),
('G-003', 'Daun mati seperti terbakar'),
('G-004', 'Produktivitas kelapa sawit menurun hingga 69%'),
('G-005', 'Daun muda yang tergulung lalu menguning dan mengering\r\n'),
('G-006', 'Tandan bunga membusuk dan tidak bisa menghasilkan buah'),
('G-007', 'Tanaman membusuk dan mati'),
('G-008', 'Buah kelapa sawit berlubang'),
('G-009', 'Bunga buah gugur dan gagal membentuk buah yang lubang kecil pada daun'),
('G-010', 'Daun berubah warna menjadi kekuningan'),
('G-011', 'Pelepah terbawah menguning mulai dari ujung \r\nmengarah ke pangkal, mengering dan nekrosis \r\nberwarna coklat.'),
('G-012', 'Kuncup tanaman membengkok atau melengkung.'),
('G-013', 'Jaringan pangkal batang menjadi nikrosis dan \r\nmengandung miselia jamur berwarna putih'),
('G-014', 'Daun mengering dan gugur'),
('G-015', 'Pada daun yang terdapat bercak-bercak lonjong \r\nberwarna kuning\r\n'),
('G-016', 'Terdapat bercak-bercak cokelat tua pada ujung \r\ndaun dan tepi daun\r\n'),
('G-017', 'Terdapat pelepah yang bengkok dan tidak \r\nmemiliki helai daun'),
('G-018', 'Helai daun mulai pertengahan sampai ujung \r\npelepah kecil-kecil, sobek, atau tidak ada sama \r\nsekali'),
('G-019', 'Munculnya bercak putih seperti benang putih\r\npada permukaan buah kelapa sawit.'),
('G-020', 'Buah berubah warna mejadi coklat muda, berbeda \r\njelas dengan warna buah sehat');

-- --------------------------------------------------------

--
-- Table structure for table `konsultasi`
--

CREATE TABLE `konsultasi` (
  `id_konsultasi` char(5) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `umur` varchar(10) DEFAULT NULL,
  `jk` varchar(10) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `id_penyakit` varchar(5) DEFAULT NULL,
  `nm_penyakit` varchar(50) DEFAULT NULL,
  `ket` varchar(255) DEFAULT NULL,
  `hasil_max` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `konsultasi`
--

INSERT INTO `konsultasi` (`id_konsultasi`, `id`, `nama`, `umur`, `jk`, `alamat`, `tgl`, `id_penyakit`, `nm_penyakit`, `ket`, `hasil_max`) VALUES
('K-019', 1, 'Silvia yulita', '22', 'perempuan', 'Pessel', '2023-02-02', 'P-007', 'Penyakit Busuk Pangkal Batang', NULL, '97.976576'),
('K-020', 2, 'Petani', '30', 'Laki-laki', 'padang', '2023-02-02', 'P-001', 'Tungau (Oligonychus)\r', NULL, '56.32'),
('K-021', 6, 'dedi', '33', 'Laki-laki', 'air terjun', '2023-02-04', 'P-001', 'Tungau (Oligonychus)', NULL, '42.24'),
('K-022', 6, 'dedi', '33', 'Laki-laki', 'air terjun', '2023-02-04', NULL, NULL, NULL, NULL),
('K-023', 6, 'dedi', '33', 'Laki-laki', 'air terjun', '2023-02-04', 'P-001', 'Tungau (Oligonychus)', NULL, '76'),
('K-024', 1, 'Silvia Yulita', '22', 'perempuan', 'Pessel', '2023-02-06', 'P-007', 'Penyakit Busuk Pangkal Batang', NULL, '97.976576'),
('K-025', 6, 'dedi', '33', 'Laki-laki', 'air terjun', '2023-02-07', 'P-003', 'Nematoda Rhadinaphelenchus cocophilus', NULL, '100'),
('K-026', 6, 'dedi', '33', 'Laki-laki', 'air terjun', '2023-02-09', 'P-007', 'Penyakit Busuk Pangkal Batang', NULL, '97.976576'),
('K-027', 6, 'dedi', '33', 'Laki-laki', 'air terjun', '2023-02-10', 'P-001', 'Tungau (Oligonychus)', NULL, '76');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id_penyakit` char(5) NOT NULL,
  `nama_penyakit` varchar(50) DEFAULT NULL,
  `ket` varchar(255) DEFAULT NULL,
  `solusi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`id_penyakit`, `nama_penyakit`, `ket`, `solusi`) VALUES
('P-001', 'Tungau (Oligonychus)', 'Biasanya jenis tungau yang menyerang adalah tungau merah', 'Untuk mengendalikan hama ini, Anda \r\nbisa menggunakan air sabun. Caranya \r\ndengan mencampurkan sabun cuci piring \r\ndan air lalu menyemprotkannya ke \r\ntanaman yang terserang hama'),
('P-002', 'Ulat Api ', 'Ulat api merupakan serangga yang berasal dari Ordo Lepidoptera dan famili limacodidae,ada 4 spesies  ulat api yang biasa menyerang kelapa sawit yaitu: setohosea asigna.setora nitens, darna trima, dan prasa lepida,', 'Untuk mengendalikannya, Anda bisa \r\nmelakukan sensus secara rutin dengan \r\nmengambil sampel daun yang paling \r\ntengah. Kemudian, penanaman tanaman \r\ninang ulat api, dengan membuat plot \r\ntanaman di pinggir jalan kebun dengan \r\nukuran bervariasi (sesuai kondisi areal), \r\nnamun umumnya ukuran plot antara 3 – 4 meter, dengan populasi tanaman inang \r\n300 – 400 bibit. Terakhir, melakukan \r\npengendalian secara mekanis dengan \r\ncara mengambil dan membunuh ulat api \r\nsecara langsung hama ulat api dan \r\npengendalian hayati dengan \r\nmenggunakan teknologi CHIPS® 3.1 \r\ndari PKT (Propadu Konair \r\nTarahubun/Plantation Key Technology).'),
('P-003', 'Nematoda Rhadinaphelenchus cocophilus', 'Hama ini menyerang bagian akar tanaman kelapa sawit. ', 'Memberikan natrium arsenit pada \r\ntanaman yang diserang hama. Anda juga \r\nperlu memberantas sumber infeksi \r\ndengan membakar tanaman yang telah \r\nmati.\r\n'),
('P-004', 'Kumbang Oryctes rhinoceros', 'Hama ini sangat berbahaya apabila menyerang kedalam daerah titik tumbuh dan memakan bagian yang lunak hal ini dapat menyebabkan tanaman menjadi mati,', 'Melakukan pengendalian kultur teknis \r\ndengan cara sanitasi yang merupakan \r\nmetode pengendalian efektif untuk \r\nmemutus siklus hidup kumbang tanduk. \r\nKemudian, pengendalian mekanik \r\ndengan melakukan pengendalian secara \r\nkontak langsung dengan cara memungut \r\nlarva yang terdapat pada batang yang \r\nsudah melapuk. Satu batang yang lapuk \r\nbiasanya terdapat 12-42 larva. Teknik ini tidak begitu efektif untuk kebun yang \r\nluas.'),
('P-005', 'Ngengat Tirathaba Mundella', 'Hama ini biasanya meletakkan telur nya pada tandan buah yang telah masak ataupun membusuk,setelah menetas ulat atau larva memakan dan melubangi buah muda .', 'Ulat Tirathaba dapat dikendalikan \r\ndengan racun kontak Dipterex atau \r\nThiodan. Thiodan sendiri juga terkenal \r\nsebagai racun tikus atau masuk golongan \r\nrottensida. Adapun cara aplikasinya \r\nadalah sebagai berikut : setengah \r\nkilogram Dipterex atau Thiodan \r\ndilarutkan dalam air sebanyak 360 liter \r\nair dan diaduk sampai merata, \r\nselanjutnya disemprotkan pada kelapa \r\nsawit yang terserang ulat Tirathaba \r\ntersebut. Dosis itu diperkirakan cukup \r\nuntuk sartu hektar tanaman kelapa sawit.\r\nPenyemprotan diulang pada tigapuluh \r\nhari berikutnya bila masih ditemukan \r\nserangan yang berarti\r\n'),
('P-006', 'Penyakit Akar/Busuk Akar Sawit(Blast disease)', 'Penyakit akar atau disebut juga Blast disease disebabkan oleh cendawan/jamur Rhizoctonia lamellifera dan Phytium sp.', 'Pengendalian penyakit ini dapat \r\ndilakukan dengan cara pencegahan yaitu \r\ndengan melakukan budidaya yang baik \r\ndan benar sesuai dengan prosedur \r\nbudidaya yang dianjurkan,Biasanya cara \r\nini dapat dilakukan dengan mengikuti \r\nberbagai program penyuluhan dari \r\npetugas Dinas terkait dan Mitra \r\nperkebunan rakyat.Selain itu tindakan \r\nyang paling efesien untuk mencegah \r\npenyakit akar sebaiknya dilakukan sejak \r\ndini yaitu sejak pemilihan bibit dan \r\npersemaian, menggunakan fungisida \r\nyang berbahan aktif benomil 20% dan \r\ntiram 20% seperti fungsida Benlate T \r\n20/20 WP dengan konsentrasi 20 mg/I \r\nair. Fungsida ditebarkan pada media tanam. Dapat pula menggunakan kapur \r\npertanian dengan konsentrasi 0,2%.\r\n'),
('P-007', 'Penyakit Busuk Pangkal Batang', 'Penyakit busuk pangkal batang adalah salah satu  penyakit yang menyerang tanaman kelapa sawit dan dapat mematikan tanaman, penyebabnya adalah  jamur patagenik dari genus ganoderma.', 'Mengaplikasikan CHIPS® guna \r\nmendukung pertumbuhan tanaman dan \r\nakar.Maka, disarankan untuk \r\nmenggunakan pupuk formulasi khusus \r\nseperti MOAF® yang dibutuhkan oleh \r\nkebun sawit. Sehingga penyerapan lebih \r\nefesien dan dapat digunakan oleh \r\ntanaman secara efektif yang tidak \r\nmenyebabkan kerusakan tanah'),
('P-008', 'Busuk kuncup (Spear rot)', 'Penyakit busuk kuncup atau dikenal dengan istilah Spear rot, adalah penyakit pada tanaman kelapa sawit yang menyerang bagian kuncup atau pucuk tanaman.', 'Melakukan kultur teknis, sanitasi, \r\npengendalian vektor, dan pengendalian hayati yang menggunakan CHIPS® \r\nformulasi khusus. Pengendalian hayati \r\ndilakukan dengan cara memotong \r\nkuncup yang terinfeksi kemudian \r\nmenaburkan CHIPS® pada bagian yang \r\ntelah dipotong, serta perlu diikuti dengan \r\naplikasi pupuk MOAF® yang dapat \r\nmembantu memperbaiki pertumbuhan \r\ntanaman agar normal Kembali'),
('P-009', 'Penyakit Garis Kuning (Pacth Yellow)', 'Penyakit ini disebut juga sebagai penyakit fusarium karena disebabkan oleh jamur Fusarium Oxiysporum.', 'Melakukan inokulasi atau pemindahan \r\njamur penyebab penyakit pada bibit dan \r\ntanaman muda'),
('P-010', 'Anthracnose', ' Penyakit antraknosa pada tanaman kelapa sawit disebabkan oleh beberapa jenis jamur, yaitu jamur Melanconium sp, Glomerella cingulata, dan Botryodiplodia palmarum.', 'Penanggulangan penyakit antraknosa \r\npada tanaman kelapa sawit dapat \r\ndilakukan dengan cara-cara sebagai \r\nberikut ;\r\n• Menggunakan bibit yang sehat \r\ndan berkualitas,\r\n• Pemeliharaan bibit yang baik \r\ndengan penyiraman dan \r\npemupukan yang teratur,\r\n• Mengatur jarak tanam dengan \r\nmenanam tidak terlalu rapat,\r\n• Menanam bibit dengan benar,\r\njangan sampai media semai \r\nrusak atau pecah saat melakukan \r\npenanaman'),
('P-011', 'Penyakit Tajuk (crown disease)', 'Penyakit tajuk daun (crown desease) adalah suatu jenis penyakit yang menyerang bagian tajuk daun tanaman.', 'Tindakan pencegahan yang dapat \r\ndilakukan untuk menanggulangi \r\npenyakit ini adalah sebagai berikut ;\r\n• Menggunakan bibit yang sehat \r\ndan berkualitas dan jelas asal –\r\nusulnya,\r\n• Menggunakan bibit bersertifikat \r\nyang sudah terbukti kualitasnya,\r\n• Menyingkirkan tanamantanaman yang memiliki gen \r\npanyakit tajuk'),
('P-012', 'Busuk buah', 'Busuk tandan buah diperkebunan kelapa sawit disebabkan oleh Marasmius palmivorus.', 'Menjaga jarak tanam, Melakukan \r\ntunasan sesuai rotasi, Menghindari buah \r\ntinggal di pokok saat panen, Membuang \r\nsemua buah busuk di batang, sedangkan \r\npengendalian secara kimia dapat \r\ndilakukan dengan menggunakan \r\nfungisida karena penyakit ini disebabkan \r\noleh jamur. Fungisida yang digunakan jenis yang efektif mengendalikan jamur \r\ngolongan Basidiomycetes');

-- --------------------------------------------------------

--
-- Table structure for table `petani`
--

CREATE TABLE `petani` (
  `id` int(11) NOT NULL,
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `nama` varchar(32) DEFAULT NULL,
  `umur` int(11) DEFAULT NULL,
  `jk` varchar(32) DEFAULT NULL,
  `email` varchar(32) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `level` int(11) DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petani`
--

INSERT INTO `petani` (`id`, `username`, `password`, `nama`, `umur`, `jk`, `email`, `alamat`, `level`) VALUES
(1, 'root', '202cb962ac59075b964b07152d234b70', 'Silvia Yulita', 22, 'perempuan', 'silviayulita6@gmail.com', 'Pessel', 1),
(2, 'petani', '202cb962ac59075b964b07152d234b70', 'Petani', 30, 'Laki-laki', 'petani@gmail.com', 'padang', 2),
(5, 'petani2', '202cb962ac59075b964b07152d234b70', 'petani2', 0, 'Laki-laki', 'opj', 'jo', 2),
(6, 'dedi', '202cb962ac59075b964b07152d234b70', 'dedi', 33, 'Laki-laki', 'swdf@gmail.com', 'air terjun', 2);

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_detail`
--

CREATE TABLE `riwayat_detail` (
  `detail_id` int(11) NOT NULL,
  `id_konsultasi` char(5) DEFAULT NULL,
  `id_gejala` char(5) DEFAULT NULL,
  `detail_cf` float(2,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `riwayat_detail`
--

INSERT INTO `riwayat_detail` (`detail_id`, `id_konsultasi`, `id_gejala`, `detail_cf`) VALUES
(476, 'K-019', 'G-007', 0.8),
(477, 'K-019', 'G-011', 0.6),
(478, 'K-019', 'G-012', 1.0),
(479, 'K-019', 'G-013', 0.8),
(480, 'K-019', 'G-014', 0.6),
(481, 'K-020', 'G-001', 0.8),
(482, 'K-020', 'G-002', 0.4),
(486, 'K-021', 'G-001', 0.4),
(487, 'K-021', 'G-002', 0.6),
(488, 'K-021', 'G-003', 0.8),
(489, 'K-021', 'G-004', -1.0),
(490, 'K-022', 'G-001', -1.0),
(491, 'K-022', 'G-002', -1.0),
(492, 'K-022', 'G-003', -1.0),
(493, 'K-022', 'G-004', -1.0),
(494, 'K-022', 'G-005', -1.0),
(495, 'K-022', 'G-006', -1.0),
(496, 'K-022', 'G-007', -1.0),
(497, 'K-022', 'G-008', -1.0),
(498, 'K-022', 'G-009', -1.0),
(501, 'K-022', 'G-010', -1.0),
(502, 'K-022', 'G-011', -1.0),
(503, 'K-022', 'G-012', -1.0),
(504, 'K-022', 'G-013', -1.0),
(505, 'K-022', 'G-014', -1.0),
(506, 'K-022', 'G-015', -1.0),
(507, 'K-022', 'G-016', -1.0),
(508, 'K-022', 'G-017', -1.0),
(509, 'K-022', 'G-018', -1.0),
(510, 'K-022', 'G-019', -1.0),
(511, 'K-022', 'G-020', -1.0),
(512, 'K-023', 'G-001', 1.0),
(513, 'K-023', 'G-002', 1.0),
(514, 'K-023', 'G-005', 1.0),
(515, 'K-023', 'G-019', -1.0),
(516, 'K-023', 'G-020', -1.0),
(517, 'K-024', 'G-007', 0.8),
(518, 'K-024', 'G-011', 0.6),
(519, 'K-024', 'G-012', 1.0),
(520, 'K-024', 'G-013', 0.8),
(521, 'K-024', 'G-014', 0.6),
(522, 'K-025', 'G-001', 1.0),
(523, 'K-025', 'G-002', 1.0),
(524, 'K-025', 'G-003', 0.6),
(525, 'K-025', 'G-004', 0.4),
(526, 'K-025', 'G-005', 1.0),
(527, 'K-025', 'G-006', 1.0),
(528, 'K-025', 'G-007', 0.8),
(529, 'K-025', 'G-008', 0.6),
(530, 'K-025', 'G-009', -1.0),
(531, 'K-025', 'G-010', -1.0),
(532, 'K-025', 'G-011', 0.8),
(533, 'K-025', 'G-012', 0.8),
(534, 'K-025', 'G-013', -1.0),
(535, 'K-025', 'G-014', 0.8),
(536, 'K-025', 'G-015', -0.8),
(537, 'K-025', 'G-016', -1.0),
(538, 'K-025', 'G-017', 1.0),
(539, 'K-025', 'G-018', -1.0),
(540, 'K-025', 'G-019', 0.8),
(541, 'K-025', 'G-020', -1.0),
(542, 'K-026', 'G-007', 0.8),
(543, 'K-026', 'G-011', 0.6),
(544, 'K-026', 'G-012', 1.0),
(545, 'K-026', 'G-013', 0.8),
(546, 'K-026', 'G-014', 0.6),
(547, 'K-027', 'G-001', 1.0),
(548, 'K-027', 'G-002', 1.0),
(549, 'K-027', 'G-003', 0.4),
(550, 'K-027', 'G-004', 0.6);

-- --------------------------------------------------------

--
-- Table structure for table `rule`
--

CREATE TABLE `rule` (
  `rule_id` int(11) NOT NULL,
  `id_penyakit` char(5) DEFAULT NULL,
  `id_gejala` char(5) DEFAULT NULL,
  `rule_mb` float DEFAULT NULL,
  `rule_md` float DEFAULT NULL,
  `rule_cf` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rule`
--

INSERT INTO `rule` (`rule_id`, `id_penyakit`, `id_gejala`, `rule_mb`, `rule_md`, `rule_cf`) VALUES
(94, 'P-001', 'G-001', 0.8, 0.2, 0.6),
(96, 'P-001', 'G-002', 0.6, 0.2, 0.4),
(97, 'P-002', 'G-003', 0.8, 0.2, 0.6),
(98, 'P-002', 'G-004', 0.6, 0.2, 0.4),
(99, 'P-003', 'G-005', 1, 0, 1),
(100, 'P-003', 'G-006', 0.8, 0.2, 0.6),
(101, 'P-004', 'G-007', 1, 0, 1),
(102, 'P-005', 'G-008', 1, 0, 1),
(103, 'P-005', 'G-009', 0.9, 0.1, 0.8),
(104, 'P-006', 'G-010', 0.8, 0.2, 0.6),
(105, 'P-006', 'G-011', 1, 0, 1),
(106, 'P-006', 'G-002', 0.6, 0.2, 0.4),
(107, 'P-006', 'G-012', 0.9, 0.1, 0.8),
(108, 'P-007', 'G-012', 0.8, 0.2, 0.6),
(109, 'P-007', 'G-007', 0.8, 0.2, 0.6),
(110, 'P-007', 'G-013', 1, 0, 1),
(111, 'P-007', 'G-011', 0.8, 0.2, 0.6),
(112, 'P-007', 'G-014', 0.6, 0.2, 0.4),
(113, 'P-008', 'G-010', 1, 0, 1),
(114, 'P-008', 'G-007', 0.8, 0.2, 0.6),
(115, 'P-008', 'G-015', 0.6, 0.2, 0.4),
(116, 'P-009', 'G-016', 1, 0, 1),
(117, 'P-009', 'G-010', 0.8, 0.2, 0.6),
(118, 'P-009', 'G-017', 0.6, 0.2, 0.4),
(119, 'P-010', 'G-016', 0.8, 0.2, 0.6),
(120, 'P-010', 'G-018', 0.6, 0.2, 0.4),
(121, 'P-011', 'G-017', 0.8, 0.2, 0.6),
(122, 'P-011', 'G-018', 0.6, 0.2, 0.4),
(123, 'P-012', 'G-019', 0.8, 0.2, 0.6),
(124, 'P-012', 'G-020', 0.6, 0.2, 0.4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acces_groupmenu`
--
ALTER TABLE `acces_groupmenu`
  ADD PRIMARY KEY (`hakid`),
  ADD KEY `groupmenu_ibfk_1` (`hakmenuid`),
  ADD KEY `groupmenu_ibfk_2` (`hakgroupid`);

--
-- Indexes for table `acces_grup`
--
ALTER TABLE `acces_grup`
  ADD PRIMARY KEY (`groupid`);

--
-- Indexes for table `acces_menu`
--
ALTER TABLE `acces_menu`
  ADD PRIMARY KEY (`menuid`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indexes for table `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`id_konsultasi`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indexes for table `petani`
--
ALTER TABLE `petani`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayat_detail`
--
ALTER TABLE `riwayat_detail`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `detail_riwayat_id` (`id_konsultasi`),
  ADD KEY `detail_gejala_id` (`id_gejala`);

--
-- Indexes for table `rule`
--
ALTER TABLE `rule`
  ADD PRIMARY KEY (`rule_id`),
  ADD KEY `rule_gejala_gejala_id` (`id_gejala`),
  ADD KEY `id_penyakit` (`id_penyakit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acces_groupmenu`
--
ALTER TABLE `acces_groupmenu`
  MODIFY `hakid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `acces_grup`
--
ALTER TABLE `acces_grup`
  MODIFY `groupid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `petani`
--
ALTER TABLE `petani`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `riwayat_detail`
--
ALTER TABLE `riwayat_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=551;

--
-- AUTO_INCREMENT for table `rule`
--
ALTER TABLE `rule`
  MODIFY `rule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD CONSTRAINT `konsultasi_ibfk_1` FOREIGN KEY (`id`) REFERENCES `petani` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `riwayat_detail`
--
ALTER TABLE `riwayat_detail`
  ADD CONSTRAINT `riwayat_detail_ibfk_1` FOREIGN KEY (`id_konsultasi`) REFERENCES `konsultasi` (`id_konsultasi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `riwayat_detail_ibfk_2` FOREIGN KEY (`id_gejala`) REFERENCES `gejala` (`id_gejala`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rule`
--
ALTER TABLE `rule`
  ADD CONSTRAINT `rule_ibfk_2` FOREIGN KEY (`id_gejala`) REFERENCES `gejala` (`id_gejala`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rule_ibfk_3` FOREIGN KEY (`id_penyakit`) REFERENCES `penyakit` (`id_penyakit`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
