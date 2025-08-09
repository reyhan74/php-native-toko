-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Agu 2025 pada 01.47
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_jualan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500'),
(2, 'admini', '$2y$10$mnQi27OkcHMNB0mwF/sQbOAzFZ/2L5UCsb7j1qdRoDPHoWidM.ZgK'),
(3, 'admini', '$2y$10$B7kFxrTz.Uvzqbc3X0gByudGW2Qqm4AP/6ltQmxj4VqjlRce/uKIG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id` int(11) NOT NULL,
  `id_pesanan` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`id`, `id_pesanan`, `id_produk`, `jumlah`, `harga`) VALUES
(1, 1, 1, 1, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id`, `nama`, `alamat`, `total`, `tanggal`) VALUES
(1, 'reyhandwiandika', 'kjn;l', 3, '2025-08-08 20:13:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL DEFAULT 0,
  `deskripsi` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `nama`, `harga`, `stok`, `deskripsi`, `foto`, `created_at`) VALUES
(3, 'olt', 50000000, 3, 'olt zte c300 gpon', '1754664948-download.jpg', '2025-08-08 14:55:48'),
(4, 'CCR2004-16G-2S+PC MIKROTIK', 6450000, 4, 'Cloud Core Router 2004-16G-2S+PC merupakan produk dari Mikrotik yang memiliki platform baru ARM 4 Core CPU @ 1.2Ghz dan dilengkapi dengan 4GB RAM Onboard. Perangkat ini tersedia dengan rackmount 1U memiliki 16 port Gigabit Ethernet, 2 port SFP+ 10G dan passive cooling.', '1754665059-besar.jpg', '2025-08-08 14:57:39'),
(5, 'CCR2116-12G-4S+ MIKROTIK Router Rackmount', 1837000000, 4, 'Cloud Core Router 2116-12G-4S+ merupakan produk dari Mikrotik yang memiliki platform baru ARM 16 Core CPU @ 2Ghz dan dilengkapi dengan 16GB RAM Onboard. Perangkat ini tersedia dengan rackmount 1U memiliki 13 port Gigabit Ethernet, 4 port SFP+ 10G dan redundant PSU.', '1754665169-besar (1).jpg', '2025-08-08 14:59:29'),
(6, 'CCR2004-16G-2S+ MIKROTIK', 6470000, 77, 'Cloud Core Router 2004-16G-2S+ merupakan produk dari Mikrotik yang memiliki performance hardware sangat tinggi yaitu platform baru ARM 4 Core CPU @ 1.7Ghz dan dilengkapi dengan 4GB RAM Onboard. Perangkat ini tersedia dengan rackmount 1U memiliki 16 port Gigabit Ethernet, 2 port SFP+ 10G dan dual redundant PSU.', '1754665235-besar (2).jpg', '2025-08-08 15:00:35'),
(7, 'CCR2004-1G-12S+2XS MIKROTIK', 8240000, 7, 'Cloud Core Router 2004-1G-12S+2XS merupakan produk unggulan baru dari Mikrotik yang memiliki performance hardware sangat tinggi yaitu platform baru ARM 4 Core CPU @ 1.7Ghz dan dilengkapi dengan 4GB RAM Onboard. Perangkat ini tersedia dengan rackmount 1U memiliki 12 port SFP+ 10G, 2 port SFP28 25G, 1 port Gigabit ethernet dan redundant PSU.\r\n', '1754665386-besar (3).jpg', '2025-08-08 15:03:06'),
(8, 'CCR2216-1G-12XS-2XQ MIKROTIK Router Rackmount', 45500000, 8, 'Cloud Core Router 2216-1G-12XS-2XQ merupakan produk dari Mikrotik yang memiliki platform baru ARM 64bit 16 Core CPU @ 2Ghz dan dilengkapi dengan 16GB RAM Onboard. Perangkat ini tersedia dengan rackmount 1U memiliki 1 port Gigabit Ethernet, 12 port SFP28 25G, 2 port QSFP28 100G, 2 slot M.2 dan redundant PSU.', '1754665457-besar (4).jpg', '2025-08-08 15:04:17'),
(9, 'ROSE Data Server (RDS) RDS2216-2XG-4S+4XS-2XQ Mikrotik', 33800000, 8, 'RDS adalah platform serba guna dengan performa tinggi yang menggabungkan penyimpanan, jaringan 100G, dan kontainer dalam satu solusi, dirancang khusus untuk lingkungan enterprise. Dilengkapi dengan 20 slot penyimpanan U.2 NVMe serta edisi khusus RouterOS untuk Storage & Compute (ROSE).', '1754665600-besar (5).jpg', '2025-08-08 15:06:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `nohp` varchar(20) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `bukti` varchar(255) DEFAULT NULL,
  `status_pembayaran` enum('Belum Bayar','Sudah Bayar') DEFAULT 'Belum Bayar',
  `status` enum('Menunggu','Diproses','Dikirim','Selesai') DEFAULT 'Menunggu',
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `produk_id`, `nama`, `alamat`, `nohp`, `qty`, `bukti`, `status_pembayaran`, `status`, `created_at`) VALUES
(1, 9, 'reyhandwiandika', 'sdfghjk', '23456789', 1, 'bukti_1754665957.jpg', 'Sudah Bayar', 'Diproses', '2025-08-08 22:12:37');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
