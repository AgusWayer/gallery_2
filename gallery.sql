-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Feb 2024 pada 05.53
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
-- Database: `gallery`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `album`
--

CREATE TABLE `album` (
  `albumid` int(11) NOT NULL,
  `namaalbum` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggaldibuat` date NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `album`
--

INSERT INTO `album` (`albumid`, `namaalbum`, `deskripsi`, `tanggaldibuat`, `userid`) VALUES
(1052, 'Destinasi', 'This is For Meme', '2024-02-16', 4196),
(1534, 'Meme', 'This is For Meme', '2024-02-16', 4196),
(1810, 'Aesthethic', 'Aesthethic', '2024-02-16', 4211),
(2236, 'Anime', 'This is Album for anime', '2024-02-15', 1487),
(2460, 'Random Meme', 'Keren', '2024-02-15', 1487),
(2806, 'Destinasi', 'Keren', '2024-02-16', 4196),
(2832, 'Random', 'Apalah itu', '2024-02-16', 1408),
(3740, 'Meme', 'Keren banget meme gwe', '2024-02-16', 4211);

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto`
--

CREATE TABLE `foto` (
  `fotoid` int(11) NOT NULL,
  `judulfoto` varchar(255) NOT NULL,
  `deskripsifoto` varchar(255) NOT NULL,
  `tanggalunggah` text NOT NULL,
  `lokasifile` varchar(255) NOT NULL,
  `albumid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `foto`
--

INSERT INTO `foto` (`fotoid`, `judulfoto`, `deskripsifoto`, `tanggalunggah`, `lokasifile`, `albumid`, `userid`) VALUES
(1034, 'Roit', 'keren', '16-02-2024', '2024-02-16OIP (9).jpg', 1052, 4196),
(1120, 'langit', 'kasljdaskl', '16-02-2024', '2024-02-16laura-vinck-Hyu76loQLdk-unsplash.jpg', 2832, 1408),
(1743, 'OFKORS', 'meme bejir', '16-02-2024', '2024-02-16hqdefault.jpg', 1534, 4196),
(1908, 'Kumala', 'kerjklasjdkl', '16-02-2024', '2024-02-16OIP (6).jpg', 3740, 4211),
(2190, 'mawar', 'mawar', '16-02-2024', '2024-02-16tirza-van-dijk-cNGUw-CEsp0-unsplash.jpg', 2806, 4196),
(2841, 'Meme Jokow', 'meme bejir', '16-02-2024', '2024-02-1665702ea9b47b79f97dd0a30501bfa624.jpg', 3740, 4211),
(3019, 'asdad', 'dasdas', '16-02-2024', '2024-02-16OIP (3).jpg', 2806, 4196),
(3070, 'Fokus woi', 'Komtol', '16-02-2024', '2024-02-16download (2).jpg', 2832, 1408),
(3120, 'Fokus woi', 'meme bejir', '16-02-2024', '2024-02-16OIP (7).jpg', 3740, 4211),
(3144, 'bg', 'ape neng sing!!', '15-02-2024', '2024-02-15download.jpg', 2460, 1487),
(3472, 'Meme Jokowi', 'kern', '16-02-2024', '2024-02-16OIP (6).jpg', 2460, 1487),
(3518, 'Ae', 'kern', '16-02-2024', '2024-02-16alexander-grey-NkQD-RHhbvY-unsplash.jpg', 2832, 1408),
(3547, 'Meme', 'Aapalah', '16-02-2024', '2024-02-1663f4da878661eaf57bde52542996e810.jpg', 1534, 4196),
(3579, 'Banana', 'Banan disini', '16-02-2024', '2024-02-16mike-dorner-sf_1ZDA1YFw-unsplash (1).jpg', 2832, 1408),
(3990, 'Roti', 'Roti Boy', '15-02-2024', '2024-02-15OIP (9).jpg', 2460, 1487),
(3991, 'Gunung', 'Aesthethic', '16-02-2024', '2024-02-16katie-moum-iRMUDX0kyOc-unsplash.jpg', 1810, 4211),
(4138, 'Dora the Rock', 'Hehehe', '15-02-2024', '2024-02-15547b90d356a7efd7693fa5f6d17e9065.jpg', 2460, 1487),
(4150, 'Gatau', 'ajsdklasjdkl', '16-02-2024', '2024-02-16neom-STV2s3FYw7Y-unsplash.jpg', 2806, 4196),
(4450, 'Balon', 'keren banget bejir', '16-02-2024', '2024-02-16ian-dooley-hpTH5b6mo2s-unsplash.jpg', 3740, 4211),
(4761, 'Ramaikan', 'kasjdlasjdkl', '16-02-2024', '2024-02-16download (1).jpg', 2806, 4196),
(5000, 'Aesthetic', 'Aesthethic', '16-02-2024', '2024-02-16alexander-grey-NkQD-RHhbvY-unsplash.jpg', 1810, 4211);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentarfoto`
--

CREATE TABLE `komentarfoto` (
  `komentarid` int(11) NOT NULL,
  `fotoid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `isikomentar` text NOT NULL,
  `tanggalkomentar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `komentarfoto`
--

INSERT INTO `komentarfoto` (`komentarid`, `fotoid`, `userid`, `isikomentar`, `tanggalkomentar`) VALUES
(3559, 2190, 4196, 'wew', '2024-02-16'),
(3560, 2190, 4196, '123', '2024-02-16'),
(3561, 2190, 4196, 'asd', '2024-02-16'),
(3562, 3070, 4196, 'woila', '2024-02-16'),
(3563, 3070, 4196, 'we', '2024-02-16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `likefoto`
--

CREATE TABLE `likefoto` (
  `likeid` int(11) NOT NULL,
  `fotoid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `tanggallike` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `likefoto`
--

INSERT INTO `likefoto` (`likeid`, `fotoid`, `userid`, `tanggallike`) VALUES
(1734, 3990, 1487, '2024-02-16'),
(3358, 2190, 1487, '2024-02-16'),
(4281, 3991, 4211, '2024-02-16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `namalengkap` varchar(255) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `profile`, `email`, `namalengkap`, `alamat`) VALUES
(1408, 'guswira', '123', '', 'guswir@gmail.com', 'Agus Wira', 'Belega'),
(1487, 'Admin1', '123', '2024-02-16547b90d356a7efd7693fa5f6d17e9065.jpg', 'becafuforever@gmail.com', 'Agus Wira', 'bogor'),
(4196, 'Sadhan', '123', '2024-02-16download (3).jpg', 'pentelaso10ygy@gmail.com', 'wirz', 'asd'),
(4211, 'asyu', '123', '2024-02-16alexander-grey-NkQD-RHhbvY-unsplash.jpg', 'becafuforever@gmail.com', 'KEREN', 'bogor'),
(4274, 'Tes', '123', '2024-02-162024-02-16OIP (7).jpg', 'gus@gmail.com', 'Gus Wirrr', 'Belega');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`albumid`),
  ADD KEY `album_ibfk_1` (`userid`);

--
-- Indeks untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`fotoid`),
  ADD KEY `foto_ibfk_1` (`albumid`),
  ADD KEY `foto_ibfk_2` (`userid`);

--
-- Indeks untuk tabel `komentarfoto`
--
ALTER TABLE `komentarfoto`
  ADD PRIMARY KEY (`komentarid`),
  ADD KEY `userid` (`userid`);

--
-- Indeks untuk tabel `likefoto`
--
ALTER TABLE `likefoto`
  ADD PRIMARY KEY (`likeid`),
  ADD KEY `likefoto_ibfk_1` (`userid`),
  ADD KEY `fotoid` (`fotoid`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `komentarfoto`
--
ALTER TABLE `komentarfoto`
  MODIFY `komentarid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3564;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `foto_ibfk_1` FOREIGN KEY (`albumid`) REFERENCES `album` (`albumid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foto_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `komentarfoto`
--
ALTER TABLE `komentarfoto`
  ADD CONSTRAINT `komentarfoto_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `likefoto`
--
ALTER TABLE `likefoto`
  ADD CONSTRAINT `likefoto_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likefoto_ibfk_2` FOREIGN KEY (`fotoid`) REFERENCES `foto` (`fotoid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
