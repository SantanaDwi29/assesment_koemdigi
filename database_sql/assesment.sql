-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 17, 2025 at 04:17 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assesment`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_user`
--

CREATE TABLE `db_user` (
  `idUser` int NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `NamaLengkap` varchar(50) NOT NULL,
  `Level` enum('admin','user') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `is_client` tinyint(1) NOT NULL DEFAULT '0',
  `foto_profil` varchar(255) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `db_user`
--

INSERT INTO `db_user` (`idUser`, `Username`, `Password`, `NamaLengkap`, `Level`, `is_client`, `foto_profil`) VALUES
(1, 'Santana', '$2y$10$JfV/CUsVqJb.lu8ij6DCHe6mfp7SAaNXAXr8AeAfEOtCqhQ2USXh2', 'Santana dwiananda', 'admin', 0, 'default.png'),
(2, 'Santana29', '$2y$10$Ayg2xDUYt5/OC5hdrdPnhusVdUvbjLs8.h8KhX955Ys7D0QQVqEdq', 'I Made Santana Dwiananda', 'user', 1, 'default.png'),
(3, 'Sananta29', '$2y$10$0sbD/pk8PbRiCJauQghlLedHxyejZZQZgzxKNGrWcqpikwmTFbDkO', 'I Made Santana Dwianandaa', 'user', 0, 'default.png'),
(4, 'Santana30', '$2y$10$KfBqfckW1GmCm5vuEOCjt.XV4QE36C.ZavODrox10DiTv.JnQDE3u', 'I Made Santana Dwiananda', 'user', 1, 'default.png'),
(6, 'Santana123', '$2y$10$m/FW4V6WhdhxJFFPm1xOmOFWJmHnMG0Bjuz.XG0E46rFvciXZRq0u', 'I Made Santana Dwianadaaa', 'user', 0, 'default.png'),
(7, 'Santanadwi299', '$2y$10$7MdNLdFkaEp3Lgr7ZPKz9O0EQNqkPTJCQz1W46OLo85Jv0dfzcbWe', 'I Made Santana Dwianande', 'user', 0, 'default.png'),
(8, 'Santanaa76', '$2y$10$JD/TUn07CiOJ6uA8wO4jW.9fBVw07d/8TnMUgS2ubvfvdFilXbmG.', 'I Made Santana Dwianayaa', 'user', 0, 'default.png'),
(9, 'tes123', '$2y$10$LM7xkSl4qQMHuTL3C4Z/keJmjWGQSpsRhWu1QDlNKfE4K0bFM.uMO', 'tess', 'user', 1, 'default.png'),
(10, 'Santana299', '$2y$10$IAuX7SEgTTXR5bahiLC4T.gg4juXsBdEpb3Q4t4ip4F5cMFs8lW02', 'I Made Santana Dwiananda', 'user', 1, 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_artikel`
--

CREATE TABLE `tb_artikel` (
  `id_artikel` int NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) DEFAULT 'default.jpg',
  `penulis` varchar(100) DEFAULT NULL,
  `tanggal_dibuat` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_artikel`
--

INSERT INTO `tb_artikel` (`id_artikel`, `judul`, `slug`, `isi`, `gambar`, `penulis`, `tanggal_dibuat`) VALUES
(3, 'Insom Coffee: Lebih dari Sekadar Kopi, Ini Rumah Para Pejuang Malam.', 'insom-coffee-lebih-dari-sekadar-kopi-ini-rumah-para-pejuang-malam', '<p>Pernahkah Anda merasa waktu paling produktif datang saat sebagian besar kota sudah terlelap? Di tengah sunyinya malam, saat ide-ide cemerlang dan inspirasi justru mengalir deras. Kami paham betul perasaan itu, karena <b>Insom Coffee</b> lahir dari keresahan yang sama.</p>\r\n<br>\r\n<p>Insom Coffee tidak hanya kami dirikan untuk menyajikan secangkir kopi. Lebih dari itu, kami ingin membangun sebuah <i>sanctuary</i>—sebuah ruang aman dan nyaman bagi para pejuang malam. Baik Anda seorang mahasiswa yang sedang berjuang dengan tugas akhir, seorang pekerja lepas yang mengejar tenggat waktu, atau seniman yang mencari ilham, tempat ini adalah untuk Anda.</p>\r\n<br>\r\n<p>Misi kami sederhana: menyediakan tiga hal yang paling Anda butuhkan di malam hari:</p>\r\n<p><b>1. Kafein Berkualitas:</b> Tentu saja, kopi adalah jantung kami. Barista kami siap meracik minuman terbaik untuk menjaga Anda tetap fokus dan bersemangat.<br>\r\n<b>2. Koneksi Tanpa Batas:</b> Dengan Wi-Fi super cepat dan stopkontak yang melimpah, Anda tidak perlu khawatir kehilangan koneksi atau kehabisan daya.<br>\r\n<b>3. Suasana yang Mendukung:</b> Kami menciptakan atmosfer yang tenang namun tetap hidup, tempat Anda bisa bekerja dengan nyaman tanpa merasa sendirian. Di sini, tidak ada yang akan melirik aneh jika Anda masih mengetik di laptop hingga larut malam.</p>\r\n<br>\r\n<p>Jadi, jika Anda mencari tempat di mana malam menjadi lebih hidup, datanglah ke Insom Coffee. Jadilah bagian dari komunitas kami. Mari kita begadang, berkarya, dan menaklukkan malam bersama.</p>', '1f687181b6afc7b8ae609aa283fde2f9.jpg', 'Santana', '2025-07-16 11:32:06'),
(4, 'Mengenal Perbedaan Kopi Robusta dan Arabika', 'mengenal-perbedaan-kopi-robusta-dan-arabika', '<p>Bagi para penikmat kopi, istilah <b>Arabika</b> dan <b>Robusta</b> tentu sudah tidak asing lagi. Namun, tahukah Anda apa perbedaan mendasar di antara keduanya? Memahami karakteristik masing-masing akan membantu Anda memilih kopi yang paling sesuai dengan selera.</p>\r\n<br>\r\n<p><b>Kopi Arabika (<i>Coffea arabica</i>)</b></p>\r\n<p>Arabika adalah jenis kopi yang paling populer dan menguasai sekitar 60% pasar kopi dunia. Biji kopi ini umumnya memiliki bentuk oval dan ditanam di dataran tinggi dengan iklim sejuk.</p>\r\n<p><i>Karakteristik utama Arabika:</i></p>\r\n<p><b>Aroma:</b> Memiliki wangi yang kompleks, seringkali beraroma buah-buahan atau bunga.<br><b>Rasa:</b> Cenderung lebih manis dan lembut, dengan tingkat keasaman (acidity) yang lebih tinggi dan menyegarkan.<br><b>Kafein:</b> Kadar kafein lebih rendah, sekitar 1.5% dari beratnya.</p>\r\n<br>\r\n<p><b>Kopi Robusta (<i>Coffea canephora</i>)</b></p>\r\n<p>Seperti namanya, Robusta lebih \"kuat\" dan tahan terhadap penyakit. Biji kopinya berbentuk lebih bulat dan bisa tumbuh di iklim yang lebih panas dan lembap.</p>\r\n<p><i>Karakteristik utama Robusta:</i></p>\r\n<p><b>Aroma:</b> Cenderung beraroma seperti kacang-kacangan atau cokelat gelap.<br><b>Rasa:</b> Memiliki rasa yang lebih kuat, pahit, dan pekat dengan aftertaste yang menempel.<br><b>Kafein:</b> Kadar kafeinnya jauh lebih tinggi, bisa mencapai 2.5% atau lebih, membuatnya jadi pilihan untuk \'tendangan\' energi ekstra.</p>\r\n<br>\r\n<p>Jadi, mana yang lebih baik? Tidak ada jawaban yang benar atau salah. Semuanya kembali ke preferensi pribadi Anda. Jika Anda menyukai kopi yang lembut dengan rasa yang kaya dan kompleks, <b>Arabika</b> adalah pilihan yang tepat. Namun, jika Anda mencari kopi yang kuat, pahit, dan berkafein tinggi, maka <b>Robusta</b> jawabannya.</p>\r\n<p>Selamat mencoba dan mengeksplorasi dunia kopi di Insom Coffee!</p>', '7891e6985fa03f01fe3855289141c223.jpeg', 'Santana', '2025-07-16 11:49:50');

-- --------------------------------------------------------

--
-- Table structure for table `tb_galeri_event`
--

CREATE TABLE `tb_galeri_event` (
  `id_event` int NOT NULL,
  `nama_event` varchar(255) NOT NULL,
  `tanggal_event` date NOT NULL,
  `deskripsi_event` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_galeri_event`
--

INSERT INTO `tb_galeri_event` (`id_event`, `nama_event`, `tanggal_event`, `deskripsi_event`) VALUES
(1, 'Workshop Barista', '2025-05-16', 'Pernah bermimpi bisa membuat secangkir latte art secantik di kafe favoritmu? Atau penasaran dengan rahasia di balik secangkir espresso yang nikmat? Inilah kesempatanmu! Insom Coffee membuka pintu bagi para pencinta kopi untuk belajar langsung dari ahlinya dalam workshop barista yang intensif, praktis, dan menyenangkan.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_galeri_foto`
--

CREATE TABLE `tb_galeri_foto` (
  `id_foto` int NOT NULL,
  `id_event` int NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `caption` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_galeri_foto`
--

INSERT INTO `tb_galeri_foto` (`id_foto`, `id_event`, `nama_file`, `caption`) VALUES
(1, 1, 'b79728370bff8b2ffd6c710c10425fd5.jpeg', NULL),
(2, 1, 'f80ddaea8170c9d9aa773b0ca7ef45db.jpg', NULL),
(3, 1, '3c617c600d7dbbd48d2a02203b580291.jpg', NULL),
(4, 1, '9904c6e37beec41b65ed4036d2ddff6c.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int NOT NULL,
  `nama_produk` varchar(150) NOT NULL,
  `deskripsi` text,
  `harga` int NOT NULL,
  `kategori` enum('Espresso Based','Signature','Manual Brew','Non-Coffee','Pastries') NOT NULL,
  `gambar` varchar(255) DEFAULT 'default.jpg',
  `status` enum('Tersedia','Habis') NOT NULL DEFAULT 'Tersedia',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `nama_produk`, `deskripsi`, `harga`, `kategori`, `gambar`, `status`, `created_at`) VALUES
(4, 'Americano', 'Espresso shot yang dipadukan dengan air dingin dan disajikan dengan es batu. Kopi hitam dingin yang menyegarkan.', 30000, 'Espresso Based', '6b5d966ad9f1bd5ed3668c8507a6911e.png', 'Tersedia', '2025-07-16 11:57:22'),
(7, 'Butter Croissants', 'Butter croissant adalah kue kering khas Prancis berbentuk bulan sabit, terkenal dengan teksturnya yang berlapis, renyah di luar, dan lembut di dalam. Ciri khasnya adalah rasa mentega yang kaya dan aroma yang menggugah selera.', 10000, 'Pastries', '6c97f222028c76330963d840339ebfca.png', 'Tersedia', '2025-07-17 01:28:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_user`
--
ALTER TABLE `db_user`
  ADD PRIMARY KEY (`idUser`);

--
-- Indexes for table `tb_artikel`
--
ALTER TABLE `tb_artikel`
  ADD PRIMARY KEY (`id_artikel`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `tb_galeri_event`
--
ALTER TABLE `tb_galeri_event`
  ADD PRIMARY KEY (`id_event`);

--
-- Indexes for table `tb_galeri_foto`
--
ALTER TABLE `tb_galeri_foto`
  ADD PRIMARY KEY (`id_foto`),
  ADD KEY `id_event` (`id_event`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `db_user`
--
ALTER TABLE `db_user`
  MODIFY `idUser` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_artikel`
--
ALTER TABLE `tb_artikel`
  MODIFY `id_artikel` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_galeri_event`
--
ALTER TABLE `tb_galeri_event`
  MODIFY `id_event` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_galeri_foto`
--
ALTER TABLE `tb_galeri_foto`
  MODIFY `id_foto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_galeri_foto`
--
ALTER TABLE `tb_galeri_foto`
  ADD CONSTRAINT `tb_galeri_foto_ibfk_1` FOREIGN KEY (`id_event`) REFERENCES `tb_galeri_event` (`id_event`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
