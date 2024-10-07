-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Okt 2024 pada 05.56
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistok`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `fakultas`
--

CREATE TABLE `fakultas` (
  `id_fakultas` int(11) NOT NULL,
  `kode_fakultas` varchar(3) NOT NULL,
  `nama_fakultas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `fakultas`
--

INSERT INTO `fakultas` (`id_fakultas`, `kode_fakultas`, `nama_fakultas`) VALUES
(2, '001', 'Fakultas Ilmu Kesehatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `nama_mahasiswa` varchar(255) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `fk_prodi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nim`, `nama_mahasiswa`, `jenis_kelamin`, `fk_prodi`) VALUES
(3, '1906200071', 'Yufridon Luttu', 'Laki-laki', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `map_unit`
--

CREATE TABLE `map_unit` (
  `id_map` int(11) NOT NULL,
  `fk_siswa` varchar(255) NOT NULL,
  `fk_unit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `map_unit`
--

INSERT INTO `map_unit` (`id_map`, `fk_siswa`, `fk_unit`) VALUES
(2, '65a5099d-3df7-4a9e-9314-b2b14153740a', 2),
(3, 'e7c522b1-d70e-4b6c-9c6b-4de701d80c9a', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengambilan_mahasiswa`
--

CREATE TABLE `pengambilan_mahasiswa` (
  `id_pengambilan` int(11) NOT NULL,
  `fk_mahasiswa` int(11) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `fk_stok` int(11) NOT NULL,
  `fk_ta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengambilan_mahasiswa`
--

INSERT INTO `pengambilan_mahasiswa` (`id_pengambilan`, `fk_mahasiswa`, `kelas`, `semester`, `fk_stok`, `fk_ta`) VALUES
(7, 3, 'A', 'Semester 1', 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengambilan_siswa`
--

CREATE TABLE `pengambilan_siswa` (
  `id_pengambilan` int(11) NOT NULL,
  `fk_siswa` int(11) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `fk_stok` int(11) NOT NULL,
  `fk_ta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengambilan_siswa`
--

INSERT INTO `pengambilan_siswa` (`id_pengambilan`, `fk_siswa`, `kelas`, `semester`, `fk_stok`, `fk_ta`) VALUES
(3, 0, 'A', 'Semester 1', 1, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(11) NOT NULL,
  `kode_prodi` varchar(6) NOT NULL,
  `nama_prodi` varchar(255) NOT NULL,
  `fk_fakultas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `kode_prodi`, `nama_prodi`, `fk_fakultas`) VALUES
(2, '14201', 'S1 - Keperawatan', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `restok_mahasiswa`
--

CREATE TABLE `restok_mahasiswa` (
  `id_restok` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('PER0','PER1','PEM0','PEM1','Selesai') NOT NULL DEFAULT 'PER0',
  `fk_typestok` int(11) NOT NULL,
  `fk_prodi` int(11) NOT NULL,
  `fk_ukuran` int(11) NOT NULL,
  `jumlah_stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `restok_mahasiswa`
--

INSERT INTO `restok_mahasiswa` (`id_restok`, `tanggal`, `status`, `fk_typestok`, `fk_prodi`, `fk_ukuran`, `jumlah_stok`) VALUES
(1, '2024-09-05 07:57:57', 'Selesai', 3, 2, 2, 51),
(3, '2024-09-05 07:57:57', 'Selesai', 5, 2, 2, 34),
(6, '2024-09-05 08:25:43', 'Selesai', 5, 2, 2, 20),
(7, '2024-09-11 07:53:31', 'Selesai', 3, 2, 2, 20),
(8, '2024-09-11 07:56:19', 'Selesai', 3, 2, 2, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `restok_siswa`
--

CREATE TABLE `restok_siswa` (
  `id_restok` int(11) NOT NULL,
  `tanggal` int(11) NOT NULL,
  `status` enum('PER0','PER1','PEM0','PEM1','Selesai') NOT NULL DEFAULT 'PER0',
  `fk_typestok` int(11) NOT NULL,
  `fk_unit` int(11) NOT NULL,
  `fk_ukuran` int(11) NOT NULL,
  `jumlah_stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `restok_siswa`
--

INSERT INTO `restok_siswa` (`id_restok`, `tanggal`, `status`, `fk_typestok`, `fk_unit`, `fk_ukuran`, `jumlah_stok`) VALUES
(2, 2024, 'Selesai', 3, 2, 2, 30),
(3, 2024, 'Selesai', 3, 2, 2, 10),
(4, 2024, 'Selesai', 3, 2, 2, 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` varchar(255) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `nama_siswa`, `jenis_kelamin`) VALUES
('e7c522b1-d70e-4b6c-9c6b-4de701d80c9a', '232114', 'Yufridon Luttu', 'Laki-laki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_mahasiswa`
--

CREATE TABLE `stok_mahasiswa` (
  `id_stok_mhs` int(11) NOT NULL,
  `fk_typestok` int(11) NOT NULL,
  `fk_prodi` int(11) NOT NULL,
  `fk_ukuran` int(11) NOT NULL,
  `jumlah_stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `stok_mahasiswa`
--

INSERT INTO `stok_mahasiswa` (`id_stok_mhs`, `fk_typestok`, `fk_prodi`, `fk_ukuran`, `jumlah_stok`) VALUES
(2, 5, 2, 2, 52),
(3, 3, 2, 2, 30);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_siswa`
--

CREATE TABLE `stok_siswa` (
  `id_stok_siswa` int(11) NOT NULL,
  `fk_typestok` int(11) NOT NULL,
  `fk_unit` int(11) NOT NULL,
  `fk_ukuran` int(11) NOT NULL,
  `jumlah_stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `stok_siswa`
--

INSERT INTO `stok_siswa` (`id_stok_siswa`, `fk_typestok`, `fk_unit`, `fk_ukuran`, `jumlah_stok`) VALUES
(1, 3, 2, 2, 49);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_ajar`
--

CREATE TABLE `tahun_ajar` (
  `id_ta` int(11) NOT NULL,
  `kode_ta` varchar(10) NOT NULL,
  `nama_ta` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tahun_ajar`
--

INSERT INTO `tahun_ajar` (`id_ta`, `kode_ta`, `nama_ta`, `deskripsi`) VALUES
(1, '20241', '2024-2025 1', '-'),
(10, '20242', '2024-2025 2', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `typestok`
--

CREATE TABLE `typestok` (
  `id_typestok` int(11) NOT NULL,
  `nama_typestok` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `typestok`
--

INSERT INTO `typestok` (`id_typestok`, `nama_typestok`) VALUES
(3, 'Seragam Olahraga'),
(5, 'Seragam Jurusan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ukuran`
--

CREATE TABLE `ukuran` (
  `id_ukuran` int(11) NOT NULL,
  `nama_ukuran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ukuran`
--

INSERT INTO `ukuran` (`id_ukuran`, `nama_ukuran`) VALUES
(2, 'S');

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit`
--

CREATE TABLE `unit` (
  `id_unit` int(11) NOT NULL,
  `kode_unit` varchar(10) NOT NULL,
  `nama_unit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `unit`
--

INSERT INTO `unit` (`id_unit`, `kode_unit`, `nama_unit`) VALUES
(2, '69896535', 'SMA Kristen Citra Bangsa Mandiri'),
(3, '69774750', 'SMP Kristen Citra Bangsa Mandiri'),
(4, '69727869', 'SD Kristen Citra Bangsa Mandiri'),
(5, '69857846', 'TK Kristen Citra Bangsa Mandiri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('administrator','admin','admin_s','admin_m','logistik','keuangan','user') NOT NULL,
  `aktifitas` enum('aktif','nonaktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `name`, `username`, `password`, `role`, `aktifitas`) VALUES
(2, 'administrator', 'administrator', '$2y$10$sxdyeM.bcR/TNL04V80eVezOZ4ZVtDiQtCMgrVJNxLmD80KOKZy7O', 'administrator', 'aktif'),
(62, 'admin', 'admin', '$2y$10$sAnaRqnUNHYT7.JRVq5MbuoLGe1DEx4lPL9FsCAfy0Bi7Q/Wtapmy', 'admin', 'aktif'),
(66, 'Frengky', 'logistik', '$2y$10$4XaOUCkiXR91d/XTkoI/GegdMFFykkiqebpS2eu3FGd1/bzPtlxvK', 'logistik', 'aktif'),
(67, 'Keuangan', 'keuangan', '$2y$10$/luq46l12JVBwwXceqSbE.rnYRw1sKviPkbHE/shISLNQ8OW40J2q', 'keuangan', 'aktif'),
(68, 'Melki', 'melki', '$2y$10$gjL05skp693tQ1MLK.6Sb.3aUIU6JAwGNpwT5ohdMTT0BbzZ0o/0C', 'admin_s', 'aktif'),
(69, 'Nius', 'nius', '$2y$10$2t3UxSLBK4Pa5A6qg.1u7e80b4.pICzl7Gca8.5Y.XGYoeoAjLTVm', 'admin_m', 'aktif');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`),
  ADD KEY `fk_prodi` (`fk_prodi`);

--
-- Indeks untuk tabel `map_unit`
--
ALTER TABLE `map_unit`
  ADD PRIMARY KEY (`id_map`),
  ADD KEY `fk_siswa` (`fk_siswa`),
  ADD KEY `fk_unit` (`fk_unit`);

--
-- Indeks untuk tabel `pengambilan_mahasiswa`
--
ALTER TABLE `pengambilan_mahasiswa`
  ADD PRIMARY KEY (`id_pengambilan`),
  ADD KEY `fk_id_mahasiswa` (`fk_mahasiswa`),
  ADD KEY `fk_id_typestok` (`fk_stok`),
  ADD KEY `fk_id_ta` (`fk_ta`);

--
-- Indeks untuk tabel `pengambilan_siswa`
--
ALTER TABLE `pengambilan_siswa`
  ADD PRIMARY KEY (`id_pengambilan`),
  ADD KEY `fk_id_siswa` (`fk_siswa`),
  ADD KEY `fk_id_typestok` (`fk_stok`),
  ADD KEY `fk_id_ta` (`fk_ta`);

--
-- Indeks untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`),
  ADD KEY `fk_fakultas` (`fk_fakultas`);

--
-- Indeks untuk tabel `restok_mahasiswa`
--
ALTER TABLE `restok_mahasiswa`
  ADD PRIMARY KEY (`id_restok`),
  ADD KEY `fk_prodi` (`fk_prodi`),
  ADD KEY `fk_ukuran` (`fk_ukuran`),
  ADD KEY `fk_typestok` (`fk_typestok`);

--
-- Indeks untuk tabel `restok_siswa`
--
ALTER TABLE `restok_siswa`
  ADD PRIMARY KEY (`id_restok`),
  ADD KEY `fk_unit` (`fk_unit`),
  ADD KEY `fk_ukuran` (`fk_ukuran`),
  ADD KEY `fk_typestok` (`fk_typestok`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `stok_mahasiswa`
--
ALTER TABLE `stok_mahasiswa`
  ADD PRIMARY KEY (`id_stok_mhs`),
  ADD KEY `fk_id_typestok` (`fk_typestok`),
  ADD KEY `fk_id_prodi` (`fk_prodi`),
  ADD KEY `fk_id_ukuran` (`fk_ukuran`);

--
-- Indeks untuk tabel `stok_siswa`
--
ALTER TABLE `stok_siswa`
  ADD PRIMARY KEY (`id_stok_siswa`),
  ADD KEY `fk_id_typestok` (`fk_typestok`),
  ADD KEY `fk_id_unit` (`fk_unit`),
  ADD KEY `fk_id_ukuran` (`fk_ukuran`);

--
-- Indeks untuk tabel `tahun_ajar`
--
ALTER TABLE `tahun_ajar`
  ADD PRIMARY KEY (`id_ta`);

--
-- Indeks untuk tabel `typestok`
--
ALTER TABLE `typestok`
  ADD PRIMARY KEY (`id_typestok`);

--
-- Indeks untuk tabel `ukuran`
--
ALTER TABLE `ukuran`
  ADD PRIMARY KEY (`id_ukuran`);

--
-- Indeks untuk tabel `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id_unit`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id_fakultas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `map_unit`
--
ALTER TABLE `map_unit`
  MODIFY `id_map` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pengambilan_mahasiswa`
--
ALTER TABLE `pengambilan_mahasiswa`
  MODIFY `id_pengambilan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pengambilan_siswa`
--
ALTER TABLE `pengambilan_siswa`
  MODIFY `id_pengambilan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `restok_mahasiswa`
--
ALTER TABLE `restok_mahasiswa`
  MODIFY `id_restok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `restok_siswa`
--
ALTER TABLE `restok_siswa`
  MODIFY `id_restok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `stok_mahasiswa`
--
ALTER TABLE `stok_mahasiswa`
  MODIFY `id_stok_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `stok_siswa`
--
ALTER TABLE `stok_siswa`
  MODIFY `id_stok_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tahun_ajar`
--
ALTER TABLE `tahun_ajar`
  MODIFY `id_ta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `typestok`
--
ALTER TABLE `typestok`
  MODIFY `id_typestok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `ukuran`
--
ALTER TABLE `ukuran`
  MODIFY `id_ukuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `unit`
--
ALTER TABLE `unit`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
