-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Nov 27, 2026 at 01:28 PM
-- Server version: 11.4.14-MariaDB
-- PHP Version: 8.5.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edulms`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

DROP TABLE IF EXISTS `kategori`;
CREATE TABLE IF NOT EXISTS `kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `status` enum('aktif','nonaktif') DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `deskripsi`, `icon`, `status`, `created_at`) VALUES
(1, 'Programming', 'Belajar pemrograman dan teknologi.', 'bi-code-slash', 'aktif', '2026-11-27 04:36:19'),
(2, 'Database', 'Pelajari pengelolaan basis data.', 'bi-database', 'aktif', '2026-11-27 04:36:19'),
(3, 'Design', 'Pelajari desain grafis dan UI/UX.', 'bi-palette', 'aktif', '2026-11-27 04:36:19'),
(4, 'Data Science', 'Pelajari analisis dan pengolahan data.', 'bi-graph-up', 'aktif', '2026-11-27 04:36:19');

-- --------------------------------------------------------

--
-- Table structure for table `kursus`
--

DROP TABLE IF EXISTS `kursus`;
CREATE TABLE IF NOT EXISTS `kursus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_id` int(11) NOT NULL,
  `dosen_id` int(11) DEFAULT NULL,
  `judul` varchar(150) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `status` enum('draft','aktif','nonaktif') DEFAULT 'draft',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `kategori_id` (`kategori_id`),
  KEY `dosen_id` (`dosen_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kursus`
--

INSERT INTO `kursus` (`id`, `kategori_id`, `dosen_id`, `judul`, `deskripsi`, `gambar`, `status`, `created_at`) VALUES
(1, 1, NULL, 'Belajar Web Programming', 'Belajar HTML, CSS, JavaScript dan PHP dari dasar hingga mahir.', 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3', 'aktif', '2026-11-27 04:38:47'),
(2, 2, NULL, 'Belajar Database MySQL', 'Memahami database, SQL, relasi tabel, dan pengelolaan data.', 'https://images.unsplash.com/photo-1544383835-bda2bc66a55d', 'aktif', '2026-11-27 04:38:47'),
(3, 4, NULL, 'Belajar Data Analytics', 'Pelajari teknik analisis data dan visualisasi informasi.', 'https://images.unsplash.com/photo-1551288049-bebda4e38f71', 'aktif', '2026-11-27 04:38:47');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

DROP TABLE IF EXISTS `pendaftaran`;
CREATE TABLE IF NOT EXISTS `pendaftaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `kursus_id` int(11) NOT NULL,
  `tanggal_daftar` timestamp NULL DEFAULT current_timestamp(),
  `status` enum('pending','aktif','ditolak') DEFAULT 'pending',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`,`kursus_id`),
  KEY `kursus_id` (`kursus_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

DROP TABLE IF EXISTS `ulasan`;
CREATE TABLE IF NOT EXISTS `ulasan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `kursus_id` int(11) NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `komentar` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`,`kursus_id`),
  KEY `kursus_id` (`kursus_id`)
) ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','dosen','mahasiswa') NOT NULL,
  `status` enum('aktif','nonaktif') DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
