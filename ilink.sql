-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Okt 2020 pada 18.10
-- Versi server: 10.1.39-MariaDB
-- Versi PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ilink`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `link`
--

CREATE TABLE `link` (
  `id_link` int(255) NOT NULL,
  `title` varchar(100) NOT NULL,
  `link` varchar(255) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `link`
--

INSERT INTO `link` (`id_link`, `title`, `link`, `username`) VALUES
(17, 'Whatsapp', 'wa.me/6289633414555', 'ajiaji11'),
(18, 'Facebook', 'www.facebook.com/yudantomo', 'ajiaji11'),
(20, 'Instagram', 'instagram.com/sukmaajiy', 'ajiaji11'),
(21, 'Instagram', 'instagram.com/mufid.1', 'KEMOOL'),
(22, 'youtube', 'youtube.com', 'saelsael'),
(23, 'instagram', 'www.instagram.com', 'saelsael'),
(32, 'Google Drive', 'https://docs.google.com/spreadsheets/d/1vq87Hdz_FkFSGjiV5ZUn59iJTKGaUPyVgRrg1Pfs9ps/edit?usp=sharing', 'ajiaji11'),
(36, '-', 'https://www.techiedelight.com/maximum-subarray-problem-kadanes-algorithm/', 'elsa'),
(37, 'ilnk', 'https://ilinkxyz.com/dashboard', 'elsa'),
(44, 'Tokopedia1', 'https://www.tokopedia.com/', 'kelompok2'),
(47, 'Line', 'line.me/ti/p/~tahid.12', 'KEMOOL'),
(48, 'Facebook', 'http://www.facebook.com/linggar.maretva', 'linggarm'),
(51, 'WhatsApp', 'wa.me/62895422350701', 'KEMOOL'),
(52, 'GitHub', 'github.com/KEMOOL', 'KEMOOL'),
(55, 'Instagram', 'instagram.com/definayt', 'definayt'),
(56, 'Twitter', 'twitter.com/defiafina', 'definayt'),
(57, 'Wawancara First Play', 'https://firstplayindonesia-wawancara.youcanbook.me', 'firstplay'),
(58, 'Coba', 'instagram.com/mufid.1', 'Fairuz');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_depan` varchar(20) NOT NULL,
  `nama_belakang` varchar(20) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.png',
  `token` varchar(255) NOT NULL,
  `aktiv` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `email`, `password`, `nama_depan`, `nama_belakang`, `image`, `token`, `aktiv`) VALUES
('ajiaji11', 'sukmaaji11@gmail.com', '$2y$10$r9mqyY4GDoK9EknwiMhooumXt4/iYz..jetQdG6NHqTYghF6wUpJe', 'Sukma Aji', 'Yudantomo', 'C360_2015-07-17-16-43-28-453.jpg', '817352b855f211c1ad3e1960029d417030b8dfd2ab27dda415ede5c7e4169babca7ed5cf116c10094e58d185ed031b4ea8695db4bbbc4562817609ee3465b3f4', 1),
('azzam', 'azzamhanif01@gmail.com', '$2y$10$oZSFUnx9bbUPMDD9gpDe8Om77FRhfBolhC4j/dSxwbZDsTIX8db76', '', '', 'default.png', '53361a06ec90d2b8dc6bdc90abd3b562914829156c2175b227ae31cc1d1672e1973be53e00c74cf9a019d017144a41e5be3131a23f60f690b94fc637cd195f07', 1),
('Cikal Chai', 'cikalchairunissa35@gmail.com', '$2y$10$jJ99gUXmPd28gVRbgWn/gOdn.FWB1hdVJ8e.TEP0Fh47LO747Lpp2', '', '', 'default.png', '3bd4bfabc9b58bd3487f4e3f8d5a4621bf34e0e50e1cb28775d3bb15e07a54aa9d3ee5a6f8330d7eea662d4ac6c53bdaba1e6b0349ed7320573d1ba784d74bb2', 1),
('Cindyanaa', 'cindyanaputri99@gmail.com', '$2y$10$xm315pxlnPSImyPU1XRgfuCWZgy0nq56cJl3UDm3v.rvYVKoLN5/G', '', '', 'default.png', '150133fb44f5fb2f526132b4a4482cc4359687aad2a1b170065d7c6620fc8fe32c62d08637c8d083690dbdb31f5912fee75325c64f8689ad9b67b8c10ca05e84', 1),
('definayt', 'definasungels@gmail.com', '$2y$10$KfQ.uZVs7cOlKwP/Jy0G5eh.KgwT8IcR15/7qLICEj9pe0nDXNwNq', 'Defina', 'YT.', '5ff5843c8e25c6d3652df31baa7c6552.jpg', 'dc617db82daea009388749e5113799c64d7e5c3c3fda7f3013cc5a5857c4ed2468a99128491cefa1a0773a9081ee5e569a17b628980e3c2f7fd5fd7b4dcebe81', 1),
('Elanaila', 'elanaila99@gmail.com', '$2y$10$n2nBBaQIYrwBFD2io6zALe1Qc9pdUMO8.HRDpcjbEKkq49a60aKjK', '', '', 'default.png', '1fd83a7cb0b0b5e2beff561564a93cb51abdc7401b0aaf31c02cbc3801c800de77e784990c5ac0dc7a9d9fe52761cd869b7dadd064ffba6129e53bf6aaaea006', 1),
('elsa', 'elsadwiokta01@gmail.com', '$2y$10$HKgZlGJizK0oYAr1UfsSTukLkAjQfrMAviy5tpJr.sueGaD8JEc.O', 'dwi', 'dwio', 'sayur.jpg', 'cc18ba655658ad186fa45fb2fc7f75bf1b72ec65180f8608a0c29304763087e6be92a824505284303b5f1590c0933127fa4966da6d0cdeaa75ded5d9a0cedb96', 1),
('Fairuz', 'fairuzsani20@gmail.com', '$2y$10$.ZlFaxrqwyZalu8RM2NQbOXKBbHzEQid6tTAGExV4OsWqKwpTt41W', 'Fairuz', 'Sani', 'a986d31d20f1c90b5e491197da477618.jpg', '63489cfd8c38eb4080d0f50a990ae059f88609ce780369233c9e5ab7f06f8589dc99331e74418666412394bf4b210acc23e6905418c24b20bde28b29a038e91c', 1),
('firstplay', 'firstplayindonesia@gmail.com', '$2y$10$rkj0d9Sn51TNYX601tCCFuQBD7rR08HFIxT/AHrIOtjTtENSirl7y', 'First Play', 'Indonesia', 'logo.jpeg', 'fb2bd0250d05ef81d736c6d0b335a9b95b2df8679a79a9c7d56358646d2ef592989301fb613479eebcd45f5495ef69e1fc432416d5beb51a600d417553b021ea', 1),
('Indri', 'indrihastuti23@gmail.com', '$2y$10$ipkuF72253Hepd3vqdWk2.2KLVsvvhg3RXTCbVnqd4rFmPhfN5Q62', '', '', 'default.png', '778c6fb9a586714b96f316630fe0a39c35a896126d0cccd9daafbfc4d9b0b3d9c6738f61289eb69a9da1335fa5eaf419e52604d426a22f6635519bdccb5d3629', 0),
('kelompok2', 'xyz.ilink@gmail.com', '$2y$10$o3l0rJL69.FIiNlPi9qEcO7zHJBKPITLarM44jbCfI3THqZCa0yHK', 'kelompok', '123', 'default.png', '35cf685d6f2a47d3ca3d4901a951e109b3b7f771ed3946daa4f90003f1c6abf22217cf29f2713e6032ab1b9b4cc2a40e7c234c62bbb577499bc9111ff2418ce3', 1),
('KEMOOL', 'ahmadmufid06@gmail.com', '$2y$10$ajmN3lzjcq8PnH8OSX7dXelfGWPdlW6.iB9OoR20L/d9MImFd1WxO', '', '', 'default.png', 'a50b96240b792d6aeb1504ec0bf1bdcdf2c8dd27b2e938db633450570c276b8bda0fa6fbc9592e0ad112986fc2daf308c738349eb5321beddf67231fceacacd2', 1),
('linggarm', 'linggarmc@gmail.com', '$2y$10$C.gAJ7prrM8DoLwFbhr1j.jOt1cOYRetIbr8U0AOimUxqFpEcQ712', 'Linggar', 'Maretva', 'default.png', 'a4fbdd4e52a03893b1967c19d3df58887287caa71bf4ec7493d33b274bfa1354810c89beae096090b94a5a3811e86cc171974619c48d7bb0a913745aceb20b8b', 1),
('nuri', 'nuriyanah228@gmail.com', '$2y$10$VLdvEUQm3LCdFKSMrCXNCeW06h98b/HKpkarawQ/tRr0Iwb4Dnmh.', '', '', 'default.png', '99ea2a5a9dbba19c4485a33b7df62f00b04b67f78c9969815bd3695f4c67abc85488110ec65214b72e7b389c884915341eb2ca0ecb777997b1313fed06b0b4a8', 1),
('saelsael', '2oktaelsa@gmail.com', '$2y$10$ZcYzY8jBUZDxbln68qe7wOThDlWH3m95b5EGURnQN0IBgVQ6jEgY.', 'elsa', 'canteek', 'download.jpg', 'fb519cc80b2e7bae6113762846b6ecadc322cdfd322de43c3fc24b5e44a665de9fc1b4f26ae62c90ab73d6ea105a7fb6e37ad183deda0763e1dc18677522c51f', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `link`
--
ALTER TABLE `link`
  ADD PRIMARY KEY (`id_link`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `link`
--
ALTER TABLE `link`
  MODIFY `id_link` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
