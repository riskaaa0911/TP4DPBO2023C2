-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jun 2023 pada 17.40
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tp_mvc`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `join_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_profesi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `members`
--

INSERT INTO `members` (`id`, `name`, `email`, `phone`, `join_date`, `id_profesi`) VALUES
(17, 'Riska Nurohmah', 'riska.salawu5@gmail.com', '089652422727', '2023-06-02 20:46:38', 4),
(18, 'Bang Chan', 'bangchan@gmail.com', '089652422828', '2023-06-02 22:13:41', 1),
(19, 'Tere Liye', 'tereliyee@gmail.com', '089652422626', '2023-06-02 22:21:43', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `profesi`
--

CREATE TABLE `profesi` (
  `id_profesi` int(11) NOT NULL,
  `nama_profesi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `profesi`
--

INSERT INTO `profesi` (`id_profesi`, `nama_profesi`) VALUES
(1, 'Penyanyi'),
(4, 'Dokter Gigi'),
(5, 'Aktor'),
(6, 'Penulis');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_profesi` (`id_profesi`);

--
-- Indeks untuk tabel `profesi`
--
ALTER TABLE `profesi`
  ADD PRIMARY KEY (`id_profesi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `profesi`
--
ALTER TABLE `profesi`
  MODIFY `id_profesi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`id_profesi`) REFERENCES `profesi` (`id_profesi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
