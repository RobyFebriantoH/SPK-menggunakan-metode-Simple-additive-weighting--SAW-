-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2025 at 05:18 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_saw_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `fasilitas` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '[]',
  `jenis_lapangan` enum('Lapangan Vinyl','Lapangan Rumput Sintetis','Lapangan Semen','Lapangan Parquette') NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `nama`, `harga`, `fasilitas`, `jenis_lapangan`, `deskripsi`, `gambar`) VALUES
(42, 'Abah Madja Futsal', 120000, '[\"Kamar Mandi\",\"Area Parkir\",\"Tempat Tunggu\",\"Tribun Penonton\",\"Minuman\\/Kantin\",\"Alat Futsal\",\"Ruang Sholat\",\"Jaring Lapangan\",\"Ruang Ganti\"]', 'Lapangan Rumput Sintetis', '<p><strong>Fasilitas </strong>: Kamar Mandi, Area Parkir, Ruang Ganti, Tempat Tunggu, Tribun Penonton, Minuman/Kantin, Alat Futsal (Bola, Rompi, dll.), Ruang Sholat, Jaring Lapangan</p><p><strong>Alamat </strong>: Awirarangan, Kuningan</p><p><strong>Jam Operasional : </strong>08:00 - 00.00</p><p><strong>Nomor HP</strong> :&nbsp;0896-4898-0145</p>', '[\"public\\/gambar\\/us1aytALzHpmam4SqPevMEXfQpdvoTXKYYoJQLcU.jpg\"]'),
(43, 'Grand Baraya', 100000, '[\"Kamar Mandi\",\"Area Parkir\",\"Tempat Tunggu\",\"Minuman\\/Kantin\",\"Alat Futsal\",\"Ruang Sholat\",\"Jaring Lapangan\"]', 'Lapangan Vinyl', '<p><strong>Fasilitas </strong>: Kamar Mandi, Area Parkir, Tempat Tunggu, Minuman, Alat Futsal, Ruang Sholat, Jaring</p><p><strong>Alamat : </strong>Ancaran, Sindangagung</p><p><strong>Jam Operasional : </strong>06:00 - 00.00</p><p><strong>Nomor HP</strong> : 0831-3982-4088</p>', '[\"public\\/gambar\\/4pWCAman700ZkpHYmbw3XJu78jVIKdcK7wrDxVSM.jpg\"]'),
(61, 'Gor Ewangga', 60000, '[\"Kamar Mandi\",\"Area Parkir\",\"Tempat Tunggu\",\"Tribun Penonton\",\"Alat Futsal\",\"Ruang Sholat\"]', 'Lapangan Parquette', '<p><strong>Fasilitas </strong>:Kamar Mandi, Area Parkir, Tempat Tunggu, Alat Futsal, Ruang Sholat, Tribun Penonton.</p><p><strong>Alamat : </strong>Kuningan</p><p><strong>Jam Operasional : </strong>06:00 - 00.00</p><p><strong>Nomor HP</strong> : 0881-5118-265</p>', '[\"public\\/gambar\\/1j6dNGatFU5ShYhYVeNHVEKunyGYZUhekQtNyKX4.jpg\"]'),
(62, 'NK Sport', 80000, '[\"Kamar Mandi\",\"Area Parkir\",\"Tempat Tunggu\",\"Minuman\\/Kantin\",\"Ruang Sholat\",\"Jaring Lapangan\"]', 'Lapangan Vinyl', '<p><strong>Fasilitas </strong>: Kamar Mandi, Area Parkir, Tempat Tunggu, Minuman, Alat Futsal, Ruang Sholat, Jaring.</p><p><strong>Alamat : </strong>Kramatmulya</p><p><strong>Jam Operasional : </strong>07:00 - 22.00</p><p><strong>Nomor HP</strong> : 0896-6183-5410</p>', '[\"public\\/gambar\\/Y0aEdlDqSCFLVqc4qhEtQ3kEQMAJ3LXIaLRgl8vz.jpg\"]'),
(63, 'Marshal Futsal Center', 110000, '[\"Kamar Mandi\",\"Area Parkir\",\"Tempat Tunggu\",\"Minuman\\/Kantin\",\"Alat Futsal\",\"Jaring Lapangan\"]', 'Lapangan Vinyl', '<p><strong>Fasilitas </strong>: Cukup Lengkap ( Kamar Mandi, Area Parkir, Tempat Tunggu, Minuman, Alat Futsal, Jaring.)</p><p><strong>Alamat : </strong>Ciporang</p><p><strong>Jam Operasional : </strong>09:00 - 22.00</p><p><strong>Nomor HP</strong> : 0877-2417-5588</p>', '[\"public\\/gambar\\/2TiwxTZuKy7MXwxJ9l5BvxHnoVlLP0cat0NkYXD2.jpg\"]'),
(75, 'Green Futsal Ciniru', 100000, '[\"Kamar Mandi\",\"Area Parkir\",\"Tempat Tunggu\",\"Minuman\\/Kantin\",\"Alat Futsal\",\"Ruang Sholat\",\"Jaring Lapangan\"]', 'Lapangan Rumput Sintetis', '<p><strong>Fasilitas </strong>: Kamar Mandi, Area Parkir, Tempat Tunggu, Minuman/Kantin, Alat Futsal (Bola, Rompi, dll.), Ruang Sholat, Jaring Lapangan</p><p><strong>Alamat </strong>: Ciniru</p><p><strong>Nomor HP</strong> :&nbsp;085024594341</p>', '[\"public\\/gambar\\/loDYXgcfndGIbhvvBhgZmCAcihQSEyX7FB7a6Dwj.jpg\"]'),
(76, 'Gandi Sport Center', 110000, '[\"Kamar Mandi\",\"Area Parkir\",\"Tempat Tunggu\",\"Minuman\\/Kantin\",\"Alat Futsal\",\"Ruang Sholat\",\"Jaring Lapangan\"]', 'Lapangan Vinyl', '<p><strong>Fasilitas </strong>: Kamar Mandi, Area Parkir, Tempat Tunggu, Minuman/Kantin, Alat Futsal (Bola, Rompi, dll.), Ruang Sholat, Jaring Lapangan</p><p><strong>Alamat </strong>: Jl. SMP, Bojong, Kec. Cilimus, Kabupaten Kuningan</p><p><strong>Nomor HP</strong> :&nbsp;0881-0238-9020</p>', '[\"public\\/gambar\\/1hp2TGBFO1lSyHV1P0nNrlZBvw587hy5nH2ciIqe.jpg\"]'),
(77, 'King Abd Aziz Futsal', 80000, '[\"Kamar Mandi\",\"Area Parkir\",\"Tempat Tunggu\",\"Alat Futsal\",\"Jaring Lapangan\"]', 'Lapangan Vinyl', '<p><strong>Fasilitas </strong>: Kamar Mandi, Area Parkir, Tempat Tunggu, Minuman/Kantin, Alat Futsal (Bola, Rompi, dll.), Jaring Lapangan</p><p><strong>Alamat </strong>: Winduhaji</p><p><strong>Nomor HP</strong> :&nbsp;085659820550</p>', '[\"public\\/gambar\\/PLpiWhgJGgEtM6EF3WKwqYaTiNHd6cOBQFmDWJGM.jpg\"]'),
(78, 'Lapangan Futsal Cipondok', 100000, '[\"Kamar Mandi\",\"Area Parkir\",\"Tempat Tunggu\",\"Minuman\\/Kantin\",\"Alat Futsal\",\"Jaring Lapangan\"]', 'Lapangan Parquette', '<p><strong>Fasilitas </strong>: Kamar Mandi, Area Parkir, Tempat Tunggu, Minuman/Kantin, Alat Futsal (Bola, Rompi, dll.), Jaring Lapangan</p><p><strong>Alamat </strong>: Cipondok, Kadugede</p><p><strong>Jam Operasional</strong> : jam 8 - 10 malam</p><p><strong>Nomor HP</strong> :&nbsp;082319773215</p>', '[\"public\\/gambar\\/M8rY2X88dVR2VRBGo3mxGHdie84x9ZD0Yifdffwd.jpg\"]'),
(79, 'Futsal Barokah', 110000, '[\"Kamar Mandi\",\"Area Parkir\",\"Tempat Tunggu\",\"Minuman\\/Kantin\",\"Alat Futsal\",\"Ruang Sholat\",\"Jaring Lapangan\",\"Ruang Ganti\"]', 'Lapangan Rumput Sintetis', '<p><strong>Fasilitas </strong>: Kamar Mandi, Area Parkir, Tempat Tunggu, Minuman/Kantin, Alat Futsal (Bola, Rompi, dll.), Ruang Sholat, Jaring Lapangan</p><p><strong>Alamat </strong>: Sembawa, Jalaksana</p><p><strong>Jam Operasional</strong> : jam 6 - jam 23</p><p><strong>Nomor HP</strong> :&nbsp;0896-2797-0885</p>', '[\"public\\/gambar\\/S01jBwx2j6F4m4TPpYUbw8RmkkyIkUze5YzZaPgm.jpg\"]'),
(80, 'Tiga Bintang Futsal', 100000, '[\"Kamar Mandi\",\"Area Parkir\",\"Tempat Tunggu\",\"Minuman\\/Kantin\",\"Alat Futsal\",\"Ruang Sholat\",\"Jaring Lapangan\"]', 'Lapangan Vinyl', '<p><strong>Fasilitas </strong>: Kamar Mandi, Area Parkir, Tempat Tunggu, Minuman/Kantin, Alat Futsal (Bola, Rompi, dll.), Ruang Sholat, Jaring Lapangan</p><p><strong>Alamat </strong>: Tambakbaya, Garawangi</p><p><strong>Jam Operasional</strong> : Jam 8 - 10 malam</p><p><strong>Nomor HP</strong> :&nbsp;0815-6493-7218</p>', '[\"public\\/gambar\\/Rej9sACJ3hF9vxrL9ajK9GQjmAXpRcCodswr2dH0.jpg\"]'),
(81, 'Manopa Futsal', 90000, '[\"Kamar Mandi\",\"Area Parkir\",\"Tempat Tunggu\",\"Minuman\\/Kantin\",\"Alat Futsal\",\"Jaring Lapangan\"]', 'Lapangan Vinyl', '<p><strong>Fasilitas </strong>: Kamar Mandi, Area Parkir, Tempat Tunggu, Minuman/Kantin, Alat Futsal (Bola, Rompi, dll.), Jaring Lapangan</p><p><strong>Alamat </strong>: Kahiyangan, Pancalang</p><p><strong>Jam Operasional</strong> : Jam 9 sampai jam 12 malam</p><p><strong>Nomor HP</strong> : 0851-0254-6547</p>', '[\"public\\/gambar\\/QRJXrioYYRlc76UTujLEvbxaWwpwc6hqE5PoEsGG.jpg\"]'),
(82, 'Mantari Futsal Club', 120000, '[\"Kamar Mandi\",\"Area Parkir\",\"Tempat Tunggu\",\"Minuman\\/Kantin\",\"Alat Futsal\",\"Ruang Sholat\",\"Jaring Lapangan\"]', 'Lapangan Vinyl', '<p><strong>Fasilitas </strong>: Kamar Mandi, Area Parkir, Tempat Tunggu, Minuman/Kantin, Alat Futsal (Bola, Rompi, dll.), Ruang Sholat, Jaring Lapangan</p><p><strong>Alamat </strong>: Caracas, Cilimus</p><p><strong>Jam Operasional</strong> : Jam 7 sampai jam 10 malam</p><p><strong>Nomor HP</strong> : 0858-6474-6068</p>', '[\"public\\/gambar\\/swU568zGSRwpTDu7ytqcl6tMj6CN5SXsFQH0lu5S.jpg\"]'),
(83, 'Kadaya Sport Center (KSC)', 90000, '[\"Kamar Mandi\",\"Area Parkir\",\"Tempat Tunggu\",\"Alat Futsal\",\"Jaring Lapangan\",\"Ruang Ganti\"]', 'Lapangan Rumput Sintetis', '<p><strong>Fasilitas </strong>: Kamar Mandi, Area Parkir, Ruang Ganti, Tempat Tunggu, Alat Futsal (Bola, Rompi, dll.), Jaring Lapangan</p><p><strong>Alamat </strong>: Jalan kadaya, Kertawana, Kec. Kalimanggis, Kabupaten Kuningan</p><p><strong>Jam Operasional</strong> : Buka 24 jam</p><p><strong>Nomor HP</strong> : 0812-8227-3954</p>', '[\"public\\/gambar\\/4Qq8xf3xURvun3okE16xbviuoOm0TTjGzMGnT7rW.jpg\"]'),
(84, 'Gor Surangga Jaya', 70000, '[\"Kamar Mandi\",\"Area Parkir\",\"Tempat Tunggu\",\"Tribun Penonton\",\"Alat Futsal\",\"Ruang Sholat\"]', 'Lapangan Semen', '<p><strong>Fasilitas </strong>: Kamar Mandi, Area Parkir, Ruang Ganti, Tempat Tunggu, Tribun Penonton, Alat Futsal (Bola, Rompi, dll.), Ruang Sholat</p><p><strong>Alamat </strong>: Margasari, Luragung, Kuningan</p><p><strong>Jam Operasional</strong> : jam 7 - 23.30</p><p><strong>Nomor HP</strong> : 0813-2603-9680</p>', '[\"public\\/gambar\\/Kmdp7a0IsZ1iAhXIW7j6ZMYpoG5aTOgt5nbX0W1d.jpg\"]'),
(85, 'Futsal Desa Peusing', 110000, '[\"Kamar Mandi\",\"Area Parkir\",\"Tempat Tunggu\",\"Minuman\\/Kantin\",\"Alat Futsal\",\"Ruang Sholat\",\"Jaring Lapangan\",\"Ruang Ganti\"]', 'Lapangan Rumput Sintetis', '<p><strong>Fasilitas </strong>: Kamar Mandi, Area Parkir, Ruang Ganti, Tempat Tunggu, Minuman/Kantin, Alat Futsal (Bola, Rompi, dll.), Jaring Lapangan</p><p><strong>Alamat </strong>: Peusing, Jalaksana, Kuningan</p><p><strong>Jam Operasional</strong> : Jam 8 hingga jam 9 malam</p><p><strong>Nomor HP</strong> : 0821-1351-1206</p>', '[\"public\\/gambar\\/M14ObYp87sacnjZbegbiAobOmlONOKcdv0EYPv9A.jpg\"]'),
(86, 'Lapangan Futsal Sukadana', 110000, '[\"Kamar Mandi\",\"Area Parkir\",\"Tempat Tunggu\",\"Minuman\\/Kantin\",\"Alat Futsal\",\"Ruang Sholat\",\"Jaring Lapangan\",\"Ruang Ganti\"]', 'Lapangan Rumput Sintetis', '<p><strong>Fasilitas </strong>: Kamar Mandi, Area Parkir, Ruang Ganti, Tempat Tunggu, Minuman/Kantin, Alat Futsal (Bola, Rompi, dll.), Ruang Sholat, Jaring Lapangan&nbsp;</p><p><strong>Alamat </strong>: Sukadana, Ciawigebang, Kuningan</p><p><strong>Jam Operasional</strong> : 110000</p><p><strong>Nomor HP</strong> : 089547512345</p>', '[\"public\\/gambar\\/DeutzpYgX8mkqmbK4a7eN77T06QCUb2OEr2iA51g.jpg\"]'),
(87, 'Futsal Ayong', 80000, '[\"Kamar Mandi\",\"Area Parkir\",\"Alat Futsal\",\"Jaring Lapangan\",\"Ruang Ganti\"]', 'Lapangan Parquette', '<p><strong>Fasilitas </strong>: Kamar Mandi, Area Parkir, Ruang Ganti, Alat Futsal (Bola, Rompi, dll.), Jaring Lapangan</p><p><strong>Alamat </strong>: Linggasana, Cilimus, Kuningan</p><p><strong>Jam Operasional</strong> : 8-10 malam</p><p><strong>Nomor HP</strong> : 082147896514</p>', '[\"public\\/gambar\\/sG65r8t4SIE6qE8XJMqTLqYkiYbosqNdMsDOBYZj.jpg\"]'),
(88, 'Lapang Futsal Tunas Muda', 100000, '[\"Kamar Mandi\",\"Area Parkir\",\"Tempat Tunggu\",\"Minuman\\/Kantin\",\"Alat Futsal\",\"Ruang Sholat\",\"Jaring Lapangan\"]', 'Lapangan Vinyl', '<p><strong>Fasilitas </strong>: Kamar Mandi, Area Parkir, Ruang Ganti, Tempat Tunggu, Alat Futsal (Bola, Rompi, dll.), Jaring Lapangan</p><p><strong>Alamat </strong>: Jalan Bubulak, Garatengah, Japara, Kuningan</p><p><strong>Jam Operasional</strong> : jam 9 sampai jam 10 malam</p><p><strong>Nomor HP</strong> : \'085321457853</p>', '[\"public\\/gambar\\/VKmk7INXkZFutatkOYNRngJRwVBdLhqBygouCqM2.jpg\"]'),
(89, 'Lapangan Futsal Sirnabaya', 90000, '[\"Kamar Mandi\",\"Area Parkir\",\"Tempat Tunggu\",\"Alat Futsal\",\"Jaring Lapangan\"]', 'Lapangan Rumput Sintetis', '<p><strong>Fasilitas </strong>: Kamar Mandi, Area Parkir, Ruang Ganti, Tempat Tunggu, Alat Futsal (Bola, Rompi, dll.), Jaring Lapangan</p><p><strong>Alamat </strong>: Mandirancan, Kuningan</p><p><strong>Jam Operasional</strong> : 9 - 10 malam</p><p><strong>Nomor HP</strong> : 089652384620</p>', '[\"public\\/gambar\\/QS2akri3T6jnG7FT09vUEnGOjnEWo3UuXZz1aJKV.jpg\"]'),
(90, 'Patra Futsal', 80000, '[\"Kamar Mandi\",\"Area Parkir\",\"Tempat Tunggu\",\"Alat Futsal\",\"Ruang Sholat\",\"Jaring Lapangan\"]', 'Lapangan Rumput Sintetis', '<p><strong>Fasilitas </strong>: Kamar Mandi, Area Parkir, Tempat Tunggu, Alat Futsal (Bola, Rompi, dll.), Ruang Sholat, Jaring Lapangan</p><p><strong>Alamat </strong>: Cijoho, Kuningan</p><p><strong>Jam Operasional</strong> : jam 8 sampai 10 malam</p><p><strong>Nomor HP</strong> : 0813-2603-9680</p>', '[\"public\\/gambar\\/5qN6D6Wv2C8Z7HhHXbNa5nwBVU9MhTzgMpwFYiak.jpg\"]');

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `id_alternatif`, `nilai`) VALUES
(1, 42, 0.59),
(2, 43, 0.6025),
(3, 61, 0.79),
(4, 62, 0.64),
(5, 63, 0.58),
(6, 75, 0.5525),
(7, 76, 0.58),
(8, 77, 0.58),
(9, 78, 0.4525),
(10, 79, 0.59),
(11, 80, 0.6025),
(12, 81, 0.64),
(13, 82, 0.58),
(14, 83, 0.59),
(15, 84, 0.615),
(16, 85, 0.59),
(17, 86, 0.59),
(18, 87, 0.37),
(19, 88, 0.6025),
(20, 89, 0.53),
(21, 90, 0.59);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `kode_kriteria` varchar(100) NOT NULL,
  `bobot` float NOT NULL,
  `jenis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `keterangan`, `kode_kriteria`, `bobot`, `jenis`) VALUES
(25, 'Harga sewa', 'C1', 45, 'Cost'),
(26, 'Fasilitas', 'C2', 30, 'Benefit'),
(27, 'Jenis Lapangan', 'C3', 25, 'Benefit');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `id_alternatif`, `id_kriteria`, `nilai`) VALUES
(131, 42, 25, 93),
(132, 42, 26, 94),
(133, 42, 27, 99),
(134, 43, 25, 92),
(135, 43, 26, 95),
(136, 43, 27, 98),
(137, 61, 25, 89),
(138, 61, 26, 95),
(139, 61, 27, 101),
(140, 62, 25, 91),
(141, 62, 26, 95),
(142, 62, 27, 98),
(143, 63, 25, 93),
(144, 63, 26, 95),
(145, 63, 27, 98),
(160, 75, 25, 92),
(161, 75, 26, 95),
(162, 75, 27, 99),
(163, 76, 25, 93),
(164, 76, 26, 95),
(165, 76, 27, 98),
(166, 77, 25, 91),
(167, 77, 26, 96),
(168, 77, 27, 98),
(169, 78, 25, 92),
(170, 78, 26, 95),
(171, 78, 27, 101),
(172, 79, 25, 93),
(173, 79, 26, 94),
(174, 79, 27, 99),
(175, 80, 25, 92),
(176, 80, 26, 95),
(177, 80, 27, 98),
(178, 81, 25, 91),
(179, 81, 26, 95),
(180, 81, 27, 98),
(181, 82, 25, 93),
(182, 82, 26, 95),
(183, 82, 27, 98),
(184, 83, 25, 91),
(185, 83, 26, 95),
(186, 83, 27, 99),
(187, 84, 25, 90),
(188, 84, 26, 95),
(189, 84, 27, 100),
(190, 85, 25, 93),
(191, 85, 26, 94),
(192, 85, 27, 99),
(193, 86, 25, 93),
(194, 86, 26, 94),
(195, 86, 27, 99),
(196, 87, 25, 93),
(197, 87, 26, 96),
(198, 87, 27, 101),
(199, 88, 25, 92),
(200, 88, 26, 95),
(201, 88, 27, 98),
(202, 89, 25, 91),
(203, 89, 26, 96),
(204, 89, 27, 99),
(205, 90, 25, 91),
(206, 90, 26, 95),
(207, 90, 27, 99);

-- --------------------------------------------------------

--
-- Table structure for table `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `id_sub_kriteria` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`id_sub_kriteria`, `id_kriteria`, `deskripsi`, `nilai`) VALUES
(89, 25, '(Rp50.000 - Rp64.999)', 0.2),
(90, 25, '(Rp65.000 - Rp79.999)', 0.4),
(91, 25, '(Rp80.000 - Rp94.999)', 0.6),
(92, 25, '(Rp95.000 - Rp109.999)', 0.8),
(93, 25, '(Rp110.000 - Rp120.000)', 1),
(94, 26, '8 - 9  Fasilitas', 1),
(95, 26, '6 - 7  Fasilitas', 0.8),
(96, 26, '4 - 5  Fasilitas', 0.6),
(97, 26, '2 - 3  Fasilitas', 0.4),
(98, 27, 'Lapangan Vinyl', 1),
(99, 27, 'Lapangan Rumput Sintetis', 0.8),
(100, 27, 'Lapangan Semen', 0.6),
(101, 27, 'Lapangan Parquette', 0.4),
(114, 26, '0 - 1  Fasilitas', 0.2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nomor_hp` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_user_level`, `nama`, `email`, `nomor_hp`, `username`, `password`) VALUES
(1, 1, 'Admin', 'admin@gmail.com', '088223021752', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(7, 2, 'User', 'user@gmail.com', '088223021750', 'user', 'ee11cbb19052e40b07aac0ca060c23ee'),
(31, 1, 'baru', 'baru@gmail.com', '0845610232174', 'baru', '5ef035d11d74713fcb36f2df26aa7c3d');

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `id_user_level` int(11) NOT NULL,
  `user_level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`id_user_level`, `user_level`) VALUES
(1, 'Administrator'),
(2, 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`),
  ADD KEY `id_alternatif` (`id_alternatif`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD KEY `id_alternatif` (`id_alternatif`),
  ADD KEY `id_kriteria` (`id_kriteria`),
  ADD KEY `nilai` (`nilai`),
  ADD KEY `id_alternatif_2` (`id_alternatif`);

--
-- Indexes for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`id_sub_kriteria`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_user_level` (`id_user_level`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id_user_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;

--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id_sub_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id_user_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hasil`
--
ALTER TABLE `hasil`
  ADD CONSTRAINT `hasil_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_ibfk_3` FOREIGN KEY (`nilai`) REFERENCES `sub_kriteria` (`id_sub_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD CONSTRAINT `sub_kriteria_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_user_level`) REFERENCES `user_level` (`id_user_level`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
