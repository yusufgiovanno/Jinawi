-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Des 2021 pada 14.34
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jinawi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan`
--

CREATE TABLE `bahan` (
  `idBahan` int(11) NOT NULL,
  `KodeBahan` varchar(255) NOT NULL,
  `NamaBahan` varchar(255) NOT NULL,
  `BobotBahan` int(11) NOT NULL,
  `HargaBahan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bahan`
--

INSERT INTO `bahan` (`idBahan`, `KodeBahan`, `NamaBahan`, `BobotBahan`, `HargaBahan`) VALUES
(2, 'RSP', 'Rose Petal', 100, 10000),
(3, 'MRG', 'Moringa', 100, 10000),
(4, 'RBS', 'Robusta Coffee', 1000, 50000),
(5, 'ABC', 'Arabica Coffee', 100, 25000),
(7, 'LBR', 'Liberica Coffee', 1000, 35000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `idCustomer` int(11) NOT NULL,
  `NamaCustomer` varchar(255) NOT NULL,
  `DiskonCustomer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`idCustomer`, `NamaCustomer`, `DiskonCustomer`) VALUES
(2, 'Yusuf Giovanno', 25),
(3, 'Aldian Giovanno', 0),
(4, 'Bruce Wayne', 0),
(5, 'Oliver Queen', 0),
(6, 'Barry Allen', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keterangan`
--

CREATE TABLE `keterangan` (
  `id` int(11) NOT NULL,
  `Keterangan` varchar(255) NOT NULL,
  `Harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `keterangan`
--

INSERT INTO `keterangan` (`id`, `Keterangan`, `Harga`) VALUES
(1, 'Shopee JT', 97),
(2, 'Tokped AA', 95);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `idPenjualan` int(11) NOT NULL,
  `TanggalPenjualan` date NOT NULL,
  `CustomerId` int(11) NOT NULL,
  `ProdukId` int(11) NOT NULL,
  `Qty` int(11) NOT NULL,
  `KeteranganId` int(11) NOT NULL,
  `Harga` int(11) NOT NULL,
  `Total` int(11) NOT NULL,
  `StatusTransaksi` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`idPenjualan`, `TanggalPenjualan`, `CustomerId`, `ProdukId`, `Qty`, `KeteranganId`, `Harga`, `Total`, `StatusTransaksi`) VALUES
(1, '2021-11-23', 2, 2, 1, 1, 8250, 8003, 1),
(2, '2021-11-28', 3, 2, 3, 2, 13750, 39188, 1),
(3, '2021-11-28', 3, 3, 2, 2, 6000, 11400, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `idProduk` int(11) NOT NULL,
  `KodeProduk` varchar(255) NOT NULL,
  `NamaProduk` varchar(255) NOT NULL,
  `BiayaLabor` bigint(11) NOT NULL,
  `Packaging` int(11) NOT NULL,
  `Sticker` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`idProduk`, `KodeProduk`, `NamaProduk`, `BiayaLabor`, `Packaging`, `Sticker`) VALUES
(2, 'SMP1', 'Shampoo', 3000, 2000, 500),
(3, 'SB1', 'Sabun', 2500, 1000, 250);

-- --------------------------------------------------------

--
-- Struktur dari tabel `resep`
--

CREATE TABLE `resep` (
  `idResep` int(11) NOT NULL,
  `ProdukId` int(11) NOT NULL,
  `BahanId` int(11) NOT NULL,
  `Kuantitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `resep`
--

INSERT INTO `resep` (`idResep`, `ProdukId`, `BahanId`, `Kuantitas`) VALUES
(12, 3, 3, 10),
(13, 3, 4, 25),
(14, 2, 3, 20),
(15, 2, 5, 25);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`idBahan`),
  ADD UNIQUE KEY `KodeBahan` (`KodeBahan`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`idCustomer`);

--
-- Indeks untuk tabel `keterangan`
--
ALTER TABLE `keterangan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`idPenjualan`),
  ADD KEY `CustomerId` (`CustomerId`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`idProduk`),
  ADD UNIQUE KEY `KodeProduk` (`KodeProduk`);

--
-- Indeks untuk tabel `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`idResep`),
  ADD KEY `ProdukId` (`ProdukId`),
  ADD KEY `BahanId` (`BahanId`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bahan`
--
ALTER TABLE `bahan`
  MODIFY `idBahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `idCustomer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `keterangan`
--
ALTER TABLE `keterangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `idPenjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `idProduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `resep`
--
ALTER TABLE `resep`
  MODIFY `idResep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`CustomerId`) REFERENCES `customer` (`idCustomer`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `resep`
--
ALTER TABLE `resep`
  ADD CONSTRAINT `resep_ibfk_1` FOREIGN KEY (`BahanId`) REFERENCES `bahan` (`idBahan`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `resep_ibfk_2` FOREIGN KEY (`ProdukId`) REFERENCES `produk` (`idProduk`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
