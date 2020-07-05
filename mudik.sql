-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jul 2020 pada 04.34
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mudik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `perjalanan`
--

CREATE TABLE `perjalanan` (
  `Id_perjalanan` int(3) NOT NULL,
  `moda_transportasi` varchar(20) NOT NULL,
  `asal` varchar(25) NOT NULL,
  `tujuan` varchar(25) NOT NULL,
  `jadwal` datetime NOT NULL,
  `slot` int(3) NOT NULL,
  `jum_pendaftar` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `perjalanan`
--

INSERT INTO `perjalanan` (`Id_perjalanan`, `moda_transportasi`, `asal`, `tujuan`, `jadwal`, `slot`, `jum_pendaftar`) VALUES
(1, 'Bus', 'Jakarta', 'Bandung', '2020-07-07 10:00:00', 20, 0),
(2, 'Kapal', 'Bandung', 'Jakarta', '2020-07-20 13:30:00', 30, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tiket`
--

CREATE TABLE `tiket` (
  `Id_tiket` int(3) NOT NULL,
  `tiket` varchar(25) NOT NULL,
  `id_user` int(2) NOT NULL,
  `id_perjalanan` int(2) NOT NULL,
  `jum_orang` int(2) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `Id_user` int(3) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`Id_user`, `nama`, `email`, `password`, `level`) VALUES
(1, 'Dwiansyah Rhmadon', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 'admin'),
(2, 'Franklin', 'frank@gmail.com', '202cb962ac59075b964b07152d234b70', 'penumpang');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `perjalanan`
--
ALTER TABLE `perjalanan`
  ADD PRIMARY KEY (`Id_perjalanan`);

--
-- Indeks untuk tabel `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`Id_tiket`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `perjalanan`
--
ALTER TABLE `perjalanan`
  MODIFY `Id_perjalanan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `tiket`
--
ALTER TABLE `tiket`
  MODIFY `Id_tiket` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `Id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
