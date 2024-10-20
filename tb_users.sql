-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 20 Okt 2024 pada 10.31
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_php`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nohp` char(13) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `email` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_users`
--

INSERT INTO `tb_users` (`id`, `nama`, `alamat`, `nohp`, `jenis_kelamin`, `email`, `foto`) VALUES
(1, 'Ari Putra', 'Menjangan Bojong', '085742014272', 'Laki-laki', 'ariputra20@gmail.com', 'foto_jng.png'),
(2, 'Maharani', 'Binagriya Pekalongan', '085742117576', 'Perempuan', 'maharani02@gmail.com', 'foto_cntk.png'),
(3, 'Megantara Wati', 'Wiradesa', '081322456678', 'Perempuan', 'wati204@gmail.com', 'foto_can.png'),
(4, 'Rina Sedya', 'Podosugih Pekalongan', '081322659247', 'Perempuan', 'rina268@gmail.com', 'foto_indh.jpg'),
(6, 'Wildan', 'Tirto Pekalongan', '081657236784', 'Laki-laki', 'wildanrizky2005@gmail.com', 'foto_gan.jpg'),
(8, 'Vidi Aldiano', 'Jakarta Barat', '081657236732', 'Laki-laki', 'vidialdiano9@gmail.com', 'Vidi_Aldiano_in_2020.png'),
(10, 'Cahyani Sujay', 'Bintaro Jakarta', '081657236861', 'Laki-laki', 'cahya01@gmail.com', 'foto_kren.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
