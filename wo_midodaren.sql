-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Bulan Mei 2021 pada 14.14
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wo_midodaren`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_customer`
--

CREATE TABLE `data_customer` (
  `id_customer` int(11) NOT NULL,
  `ktp` varchar(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `telepon` int(11) NOT NULL,
  `vendor` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_customer`
--

INSERT INTO `data_customer` (`id_customer`, `ktp`, `nama`, `kota`, `tanggal`, `telepon`, `vendor`, `status`) VALUES
(5, '123456789', 'siti fatimah', 'malang', '2021-01-31', 2147483647, 'Paket 2', 'A'),
(7, '123456789', 'Putri Auliya', 'malang', '2021-01-30', 23456789, 'Paket 3', 'T'),
(8, '4567890', 'azizah', 'malang', '2021-01-30', 23456789, 'Paket 2', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pegawai`
--

CREATE TABLE `data_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `hak_akses` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_pegawai`
--

INSERT INTO `data_pegawai` (`id_pegawai`, `nama_pegawai`, `hak_akses`, `username`, `password`, `foto`) VALUES
(4, 'Putri Auliya Rahmah Bella Mauriftha', 2, 'putri', '4093fed663717c843bea100d17fb67c8', 'badung11.png'),
(5, 'Radha Hans Azizah', 1, 'azizah', 'c83127aaa949deeb6169d36f7c6a1cee', ''),
(6, 'Siti Fatimah', 2, 'fatim', '9957adb762f4d0a92b45d0f8eb835fd6', ''),
(13, 'admin', 1, 'admin', '21232f297a57a5a743894a0e4a801fc3', ''),
(14, 'pegawai', 2, 'pegawai', '047aeeb234644b9e2d4138ed3bc7976a', ''),
(16, 'ulum', 1, 'ulumx', '827ccb0eea8a706c4c34a16891f84e7b', ''),
(17, 'ulums', 1, 'ulumss', '2007', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id_akses` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `hak_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hak_akses`
--

INSERT INTO `hak_akses` (`id_akses`, `keterangan`, `hak_akses`) VALUES
(1, 'admin', 1),
(2, 'staff', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `id_paket` int(11) NOT NULL,
  `jenis_paket` varchar(11) NOT NULL,
  `nama_paket` varchar(24) NOT NULL,
  `harga` int(24) NOT NULL,
  `rias_busana` varchar(256) NOT NULL,
  `dekorasi_pelaminan` varchar(256) NOT NULL,
  `dokumentasi` varchar(256) NOT NULL,
  `dekorasi_tenda` varchar(256) NOT NULL,
  `support_acara` varchar(256) NOT NULL,
  `minimal_dp` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`id_paket`, `jenis_paket`, `nama_paket`, `harga`, `rias_busana`, `dekorasi_pelaminan`, `dokumentasi`, `dekorasi_tenda`, `support_acara`, `minimal_dp`) VALUES
(1, 'Rumah', 'Paket Rumah Rosella', 13000000, '    Rias akad nikah dan temu\n    Rias resepsi\n    Busana pengantin (3 pasang) - dipinjamkan\n    Rias dan busana ibu pengantin dan ibu besan (2 orang)\n    Rias dan busana untuk among tamu (2 orang)\n    Rias dan busana untuk pagar ayu (2 orang)\n    Bus', '    Pelaminan rumah 3-6 meter\n    panggung (t=40 cm) + karpet panggung\n    Sofa Pelaminan + 4 Kursi Ortu\n    Penjor dan pregola (pintu masuk)\n    Taman depan pelaminan\n    Standing flower (bunga hidup) + Lampu Sorot\n    Janur kembar mayang (4 unit)\n', '', '', '', 0),
(2, 'Rumah', 'Paket Ngunduh Mantu', 14000000, '\n\n    Paket Rias Pengantin – (1x Rias, 1x Retouch)\n    Paket Busana Pengantin – 2 Pasang Busana\n    Paket Rias Busana bapak-ibu besan (2 pasang)\n    Paket Rias busana among tamu (2 pasang)\n    Paket Ronce Melati Pengantin & Ortu\n\n', '\n\n    Pelaminan rumah 3-6 meter\n    panggung (t=40 cm) + karpet panggung\n    Sofa Pelaminan + 4 Kursi Ortu\n    Penjor dan pregola (pintu masuk)\n    Taman depan pelaminan\n    Standing flower (bunga hidup) + Lampu Sorot\n    Tombang Pundi Uang (2 unit)\n    Fr', 'Foto Unlimited', '\n\n    Tenda drefteri ukuran 4×6 meter (3 unit) + Lampu mercuri / setara\n    Kursi tamu dan cover (100 unit)\n    Meja + Cover ukuran (60×120 cm) 7 unit\n\n', '1 kru support acara', 0),
(3, 'Rumah', 'Paket Rumah Tulip', 15000000, '\n\n    Rias akad nikah dan temu\n    Rias resepsi\n    Busana pengantin (3 pasang) – dipinjamkan\n    Rias dan busana ibu pengantin dan ibu besan (2 orang)\n    Rias dan busana untuk among tamu (2 orang)\n    Rias dan busana untuk pagar ayu (2 orang)\n    Busana ', '\n\n    Pelaminan rumah 3-6 meter\n    panggung (t=40 cm) + karpet panggung\n    Sofa Pelaminan + 4 Kursi Ortu\n    Penjor dan pregola (pintu masuk)\n    Taman depan pelaminan\n    Standing flower (bunga hidup) + Lampu Sorot\n    Janur kembar mayang (4 unit)\n    T', '\n\n    Foto 3 roll + Soft File\n    Cetak 108 lembar 4R album magnetic large\n    Video HD liputan akad-resepsi\n\n', '', '\n\nProsesi Temu Panggih (MC, Kru Temu, SDP)\n\nFree 2 Kru Support Acara\n', 0),
(4, 'Rumah', 'Paket Rumah Krisan', 16000000, '\n\n    Rias akad nikah dan temu\n    Rias resepsi\n    Busana pengantin (3 pasang) – dipinjamkan\n    Rias dan busana ibu pengantin dan ibu besan (2 orang)\n    Rias dan busana untuk among tamu (2 orang)\n    Rias dan busana untuk pagar ayu (2 orang)\n    Busana ', '\n\n    Pelaminan rumah 3-6 meter\n    panggung (t=40 cm) + karpet panggung\n    Sofa Pelaminan + 4 Kursi Ortu\n    Penjor dan pregola (pintu masuk)\n    Taman depan pelaminan\n    Standing flower (bunga hidup) + Lampu Sorot\n    Janur kembar mayang (4 unit)\n    T', '', 'Tenda Semi VIP ukuran (4×6 m) 3 unit + Lampu\n\nKursi Tamu + Cover (100 unit)\n\nMeja + Cover ukuran (60×120 cm) 7 unit', '\n\n    Prosesi Temu Panggih (MC, Kru Temu, SDP)\n    Free : 2 Kru Support Acara\n\n', 0),
(5, 'Rumah', 'Paket Rumah Dahlia', 17000000, '\n\n    Rias akad nikah dan temu\n    Rias resepsi\n    Busana pengantin (3 pasang) – dipinjamkan\n    Rias dan busana ibu pengantin dan ibu besan (2 orang)\n    Rias dan busana untuk among tamu (2 orang)\n    Rias dan busana untuk pagar ayu (2 orang)\n    Busana ', '\n\n    Pelaminan rumah 3-6 meter\n    panggung 40 cm + karpet panggung\n    Sofa Pelaminan + 4 Kursi Ortu\n    Penjor dan pregola (pintu masuk)\n    Taman depan pelaminan\n    Standing flower (bunga hidup)\n    Janur kembar mayang (4 unit)\n    Tombang (2 unit) — ', 'Foto 3 roll + Soft File\n\nCetak 108 lembar 4R album magnetic large\n\nvideo HD Liputan akad sampai dengan resepsi', 'Tenda Semi VIP ukuran (4×6 m) 3 unit + Lampu\n\nKursi Tamu + Cover (100 unit)\n\nMeja + Cover ukuran (60×120 cm) 7 unit', 'Prosesi Temu Panggih (MC, Kru Temu, SDP)\nFree : 2 kru support acara', 0),
(6, 'Rumah', 'Paket Rumah Lavender', 18000000, '\n\n    Rias akad nikah dan temu\n    Rias resepsi\n    Busana pengantin (3 pasang) – dipinjamkan\n    Rias dan busana ibu pengantin dan ibu besan (2 orang)\n    Rias dan busana untuk among tamu (2 orang)\n    Rias dan busana untuk pagar ayu (2 orang)\n    Busana ', '\n\n    Pelaminan rumah 3-6 meter\n    panggung (t=40 cm) + karpet panggung\n    Sofa Pelaminan + 4 Kursi Ortu\n    Penjor dan pregola (pintu masuk)\n    Taman depan pelaminan\n    Standing flower (bunga hidup) + Lampu Sorot\n    Janur kembar mayang (4 unit)\n    T', '\n\n    Foto Unlimited + 120 cetak 4R album magnetic large\n    Soft file diberikan semua\n    Video HD liputan akad-resepsi\n\n', '\n\n    Tenda VIP ukuran 4×6 meter (1 unit) + Lampu Hias\n    Tenda Semi VIP ukuran 4×6 meter (2 unit) + Lampu\n    Tirai 12 Meter (untuk tenda pelaminan)\n    Kursi tamu dan cover (100 unit)\n    Meja + Cover ukuran (60×120 cm) 7 unit\n    Free : 1 Kipas Angin B', '\n\n    Prosesi Temu Panggih (MC, Kru Temu, SDP)\n    Electon (1 Player, 1 Singer)\n    Free : 2 Kru Support Acara\n\n', 0),
(7, 'Rumah', 'Paket Rumah VIP', 19000000, '\n\n    Rias akad nikah dan temu\n    Rias resepsi\n    Busana pengantin (3 pasang) – dipinjamkan\n    Rias dan busana ibu pengantin dan ibu besan (2 orang)\n    Rias dan busana untuk among tamu (2 orang)\n    Rias dan busana untuk pagar ayu (2 orang)\n    Busana ', '\n\n    Pelaminan rumah 3-6 meter\n    panggung (t=40 cm) + karpet panggung\n    Sofa Pelaminan + 4 Kursi Ortu\n    Penjor dan pregola (pintu masuk)\n    Taman depan pelaminan\n    Standing flower (bunga hidup) + Lampu Sorot\n    Janur kembar mayang (4 unit)\n    T', '\n\n    Foto Unlimited + 120 cetak 4R album magnetic large\n    Soft file diberikan semua\n    Video HD liputan akad-resepsi\n    Video Cinematic akad-resepsi\n    Free : Paket Foto Pre Wedding By @studiophotokhaela 5 tema\n\n', '\n\n    Tenda VIP ukuran 4×6 meter (3 unit) + 1 Lampu Hias + 2 Lampu Mercury\n    Tirai 36 Meter + Karpet 3 Plong + 3 Kipas Angin 30”\n    Kursi tamu dan cover (100 unit)\n    Meja + Cover ukuran (60×120 cm) 7 unit\n\n', '\n\n    Prosesi Temu Panggih (MC, Kru Temu, SDP)\n    Cucuk Lampah\n    Electon (1 Player, 1 Singer)\n    Free : 2 Kru Support Acara\n\n', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detail_order`
--

CREATE TABLE `tbl_detail_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) DEFAULT NULL,
  `produk` int(10) DEFAULT NULL,
  `qty` int(10) DEFAULT NULL,
  `harga` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_kategori` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id`, `nama_kategori`) VALUES
(1, 'Rumah'),
(2, 'Gedung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `pelanggan` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pelanggan`
--

CREATE TABLE `tbl_pelanggan` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `telp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id_produk` int(10) UNSIGNED NOT NULL,
  `nama_produk` varchar(50) DEFAULT NULL,
  `deskripsi` varchar(50) DEFAULT NULL,
  `rias_busana` text NOT NULL,
  `dekorasi_pelaminan` text NOT NULL,
  `dokumentasi` text NOT NULL,
  `dekorasi_tenda` text NOT NULL,
  `support_acara` text NOT NULL,
  `harga` varchar(10) DEFAULT NULL,
  `gambar` varchar(50) DEFAULT NULL,
  `kategori` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_produk`
--

INSERT INTO `tbl_produk` (`id_produk`, `nama_produk`, `deskripsi`, `rias_busana`, `dekorasi_pelaminan`, `dokumentasi`, `dekorasi_tenda`, `support_acara`, `harga`, `gambar`, `kategori`) VALUES
(1, 'Paket Rumah Rosella', '', '\n    Rias akad nikah dan temu\n    Rias resepsi\n    Busana pengantin (3 pasang) – dipinjamkan\n    Rias dan busana ibu pengantin dan ibu besan (2 orang)\n    Rias dan busana untuk among tamu (2 orang)\n    Rias dan busana untuk pagar ayu (2 orang)\n    Busana beskap untuk bapak dan bapak besan (2 orang)\n    Busana beskap untuk pagar bagus (2 orang)\n    Ronce melati segar lengkap untuk pengantin (di hari yang sama)\n    Bando melati segar buat ibu dan ibu besan (di hari yang sama)\n', '\n\n    Pelaminan rumah 3-6 meter\n    panggung (t=40 cm) + karpet panggung\n    Sofa Pelaminan + 4 Kursi Ortu\n    Penjor dan pregola (pintu masuk)\n    Taman depan pelaminan\n    Standing flower (bunga hidup) + Lampu Sorot\n    Janur kembar mayang (4 unit)\n    Tombang Pundi Uang (2 unit)\n\n', '', '', '', '3500000', 'paket-01.jpg', 1),
(2, 'Paket Ngunduh Mantu', '', '\n\n    Paket Rias Pengantin – (1x Rias, 1x Retouch)\n    Paket Busana Pengantin – 2 Pasang Busana\n    Paket Rias Busana bapak-ibu besan (2 pasang)\n    Paket Rias busana among tamu (2 pasang)\n    Paket Ronce Melati Pengantin & Ortu\n\n', '\n\n    Pelaminan rumah 3-6 meter\n    panggung (t=40 cm) + karpet panggung\n    Sofa Pelaminan + 4 Kursi Ortu\n    Penjor dan pregola (pintu masuk)\n    Taman depan pelaminan\n    Standing flower (bunga hidup) + Lampu Sorot\n    Tombang Pundi Uang (2 unit)\n    Free : Hand Bucker Fresh Flower\n\n', 'Foto Unlimited', '\n\n    Tenda drefteri ukuran 4×6 meter (3 unit) + Lampu mercuri / setara\n    Kursi tamu dan cover (100 unit)\n    Meja + Cover ukuran (60×120 cm) 7 unit\n\n', '1 kru support acara', '6250000', 'paket-02.jpg', 1),
(3, 'Paket Rumah Tulip', '', '\n\n    Rias akad nikah dan temu\n    Rias resepsi\n    Busana pengantin (3 pasang) – dipinjamkan\n    Rias dan busana ibu pengantin dan ibu besan (2 orang)\n    Rias dan busana untuk among tamu (2 orang)\n    Rias dan busana untuk pagar ayu (2 orang)\n    Busana beskap untuk bapak dan bapak besan (2 orang)\n    Busana beskap untuk pagar bagus (2 orang)\n    Ronce melati segar lengkap untuk pengantin (di hari yang sama)\n    Bando melati segar buat ibu dan ibu besan (di hari yang sama)\n\n', '\n\n    Pelaminan rumah 3-6 meter\n    panggung (t=40 cm) + karpet panggung\n    Sofa Pelaminan + 4 Kursi Ortu\n    Penjor dan pregola (pintu masuk)\n    Taman depan pelaminan\n    Standing flower (bunga hidup) + Lampu Sorot\n    Janur kembar mayang (4 unit)\n    Tombang Pundi Uang (2 unit)\n\n', '\n\n    Foto 3 roll + Soft File\n    Cetak 108 lembar 4R album magnetic large\n    Video HD liputan akad-resepsi\n\n', '', '\n\nProsesi Temu Panggih (MC, Kru Temu, SDP)\n\nFree 2 Kru Support Acara\n', '7250000', 'paket-03.jpg', 1),
(4, 'Paket Rumah Krisan', '', '\n\n    Rias akad nikah dan temu\n    Rias resepsi\n    Busana pengantin (3 pasang) – dipinjamkan\n    Rias dan busana ibu pengantin dan ibu besan (2 orang)\n    Rias dan busana untuk among tamu (2 orang)\n    Rias dan busana untuk pagar ayu (2 orang)\n    Busana beskap untuk bapak dan bapak besan (2 orang)\n    Busana beskap untuk pagar bagus (2 orang)\n    Ronce melati segar lengkap untuk pengantin (di hari yang sama)\n    Bando melati segar buat ibu dan ibu besan (di hari yang sama)\n\n', '\n\n    Pelaminan rumah 3-6 meter\n    panggung (t=40 cm) + karpet panggung\n    Sofa Pelaminan + 4 Kursi Ortu\n    Penjor dan pregola (pintu masuk)\n    Taman depan pelaminan\n    Standing flower (bunga hidup) + Lampu Sorot\n    Janur kembar mayang (4 unit)\n    Tombang Pundi Uang (2 unit)\n    FREE HAND BUCKET FRESH FLOWER\n\n', '', 'Tenda Semi VIP ukuran (4×6 m) 3 unit + Lampu\n\nKursi Tamu + Cover (100 unit)\n\nMeja + Cover ukuran (60×120 cm) 7 unit', '\n\n    Prosesi Temu Panggih (MC, Kru Temu, SDP)\n    Free : 2 Kru Support Acara\n\n', '3500000', 'paket-01.jpg', 1),
(5, 'Paket Rumah Dahlia', '', '\n\n    Rias akad nikah dan temu\n    Rias resepsi\n    Busana pengantin (3 pasang) – dipinjamkan\n    Rias dan busana ibu pengantin dan ibu besan (2 orang)\n    Rias dan busana untuk among tamu (2 orang)\n    Rias dan busana untuk pagar ayu (2 orang)\n    Busana beskap untuk bapak dan bapak besan (2 orang)\n    Busana beskap untuk pagar bagus (2 orang)\n    Ronce melati segar lengkap untuk pengantin (di hari yang sama)\n    Bando melati segar buat ibu dan ibu besan (di hari yang sama)\n\n', '\n\n    Pelaminan rumah 3-6 meter\n    panggung 40 cm + karpet panggung\n    Sofa Pelaminan + 4 Kursi Ortu\n    Penjor dan pregola (pintu masuk)\n    Taman depan pelaminan\n    Standing flower (bunga hidup)\n    Janur kembar mayang (4 unit)\n    Tombang (2 unit) — dipinjamkan\n\n', 'Foto 3 roll + Soft File\n\nCetak 108 lembar 4R album magnetic large\n\nvideo HD Liputan akad sampai dengan resepsi', 'Tenda Semi VIP ukuran (4×6 m) 3 unit + Lampu\n\nKursi Tamu + Cover (100 unit)\n\nMeja + Cover ukuran (60×120 cm) 7 unit', 'Prosesi Temu Panggih (MC, Kru Temu, SDP)\nFree : 2 kru support acara', '3500000', 'paket-01.jpg', 1),
(6, 'Paket Rumah Lavender', '', '\n\n    Rias akad nikah dan temu\n    Rias resepsi\n    Busana pengantin (3 pasang) – dipinjamkan\n    Rias dan busana ibu pengantin dan ibu besan (2 orang)\n    Rias dan busana untuk among tamu (2 orang)\n    Rias dan busana untuk pagar ayu (2 orang)\n    Busana beskap untuk bapak dan bapak besan (2 orang)\n    Busana beskap untuk pagar bagus (2 orang)\n    Ronce melati segar lengkap untuk pengantin (di hari yang sama)\n    Bando melati segar buat ibu dan ibu besan (di hari yang sama)\n\n', '\n\n    Pelaminan rumah 3-6 meter\n    panggung (t=40 cm) + karpet panggung\n    Sofa Pelaminan + 4 Kursi Ortu\n    Penjor dan pregola (pintu masuk)\n    Taman depan pelaminan\n    Standing flower (bunga hidup) + Lampu Sorot\n    Janur kembar mayang (4 unit)\n    Tombang Pundi Uang (2 unit)\n    Free : Hand Bucker Fresh Flower\n\n', '\n\n    Foto Unlimited + 120 cetak 4R album magnetic large\n    Soft file diberikan semua\n    Video HD liputan akad-resepsi\n\n', '\n\n    Tenda VIP ukuran 4×6 meter (1 unit) + Lampu Hias\n    Tenda Semi VIP ukuran 4×6 meter (2 unit) + Lampu\n    Tirai 12 Meter (untuk tenda pelaminan)\n    Kursi tamu dan cover (100 unit)\n    Meja + Cover ukuran (60×120 cm) 7 unit\n    Free : 1 Kipas Angin Besar 30”\n\n', '\n\n    Prosesi Temu Panggih (MC, Kru Temu, SDP)\n    Electon (1 Player, 1 Singer)\n    Free : 2 Kru Support Acara\n\n', '3500000', 'paket-01.jpg', 1),
(7, 'Paket Rumah VIP', '', '\n\n    Rias akad nikah dan temu\n    Rias resepsi\n    Busana pengantin (3 pasang) – dipinjamkan\n    Rias dan busana ibu pengantin dan ibu besan (2 orang)\n    Rias dan busana untuk among tamu (2 orang)\n    Rias dan busana untuk pagar ayu (2 orang)\n    Busana beskap untuk bapak dan bapak besan (2 orang)\n    Busana beskap untuk pagar bagus (2 orang)\n    Ronce melati segar lengkap untuk pengantin (di hari yang sama)\n    Bando melati segar buat ibu dan ibu besan (di hari yang sama)\n\n', '\n\n    Pelaminan rumah 3-6 meter\n    panggung (t=40 cm) + karpet panggung\n    Sofa Pelaminan + 4 Kursi Ortu\n    Penjor dan pregola (pintu masuk)\n    Taman depan pelaminan\n    Standing flower (bunga hidup) + Lampu Sorot\n    Janur kembar mayang (4 unit)\n    Tombang Pundi Uang (2 unit)\n    Free : Hand Bucker Fresh Flower\n\n', '\n\n    Foto Unlimited + 120 cetak 4R album magnetic large\n    Soft file diberikan semua\n    Video HD liputan akad-resepsi\n    Video Cinematic akad-resepsi\n    Free : Paket Foto Pre Wedding By @studiophotokhaela 5 tema\n\n', '\n\n    Tenda VIP ukuran 4×6 meter (3 unit) + 1 Lampu Hias + 2 Lampu Mercury\n    Tirai 36 Meter + Karpet 3 Plong + 3 Kipas Angin 30”\n    Kursi tamu dan cover (100 unit)\n    Meja + Cover ukuran (60×120 cm) 7 unit\n\n', '\n\n    Prosesi Temu Panggih (MC, Kru Temu, SDP)\n    Cucuk Lampah\n    Electon (1 Player, 1 Singer)\n    Free : 2 Kru Support Acara\n\n', '3500000', 'paket-01.jpg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(5, 'user', 'user@gmail.com', 'default.jpg', '$2y$10$9ngFbcmx4MjrSU0MKbxP5OLoEMD2WTsSWfoqEg0NhvQe5FYE2hDli', 2, 1, 1618705909),
(7, 'adminS', 'admin@gmail.com', 'lvl.jpg', '$2y$10$MKxEybip5n.QGWWNRus54e98yw9VqWQmWSjwZhcdfZFgyqeHLDWOi', 1, 1, 1618712717),
(8, 'user', 'user1@gmail.com', 'default.jpg', '$2y$10$YK330rKhCP0AcwmolPJfDu76mMcFnUneOo2L8SLs3FDCfZPhnHp7G', 2, 1, 1619151004);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(6, 1, 3),
(7, 1, 4),
(8, 2, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(4, 'Pemesanan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(8, 7, 'Paket', 'wedding', 'fas fa-list-alt', 1),
(10, 2, 'Paket', 'user/paket', 'fas fa-list-alt', 1),
(11, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(13, 1, 'Transaksi', 'admin/transaksi', 'fas fa-fw fa-user-tie', 1),
(14, 3, 'sub Menu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(18, 4, 'Pemesanan Paket', 'pemesanan', 'fas fa-fw fa-folder', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendor`
--

CREATE TABLE `vendor` (
  `id_vendor` int(11) NOT NULL,
  `vendor` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `vendor`
--

INSERT INTO `vendor` (`id_vendor`, `vendor`, `status`) VALUES
(4, 'Paket 1', ''),
(5, 'Paket 2', ''),
(7, 'Paket 3', ''),
(8, 'Paket 4', 'A');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_customer`
--
ALTER TABLE `data_customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indeks untuk tabel `data_pegawai`
--
ALTER TABLE `data_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indeks untuk tabel `tbl_detail_order`
--
ALTER TABLE `tbl_detail_order`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id_vendor`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_customer`
--
ALTER TABLE `data_customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `data_pegawai`
--
ALTER TABLE `data_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `paket`
--
ALTER TABLE `paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_detail_order`
--
ALTER TABLE `tbl_detail_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id_produk` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id_vendor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
