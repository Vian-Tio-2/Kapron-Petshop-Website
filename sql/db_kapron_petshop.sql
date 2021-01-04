-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jan 2021 pada 15.16
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kapron_petshop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `nama`, `username`, `password`) VALUES
(2, 'Admin', 'admin1', 'e00cf25ad42683b3df678c61f42c6bda');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_customer`
--

CREATE TABLE `tb_customer` (
  `customer_id` int(11) NOT NULL,
  `login_id` varchar(255) NOT NULL,
  `login_password` varchar(255) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `gender` enum('Perempuan','Laki-Laki') DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone_number` bigint(12) DEFAULT NULL,
  `customer_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tb_customer`
--

INSERT INTO `tb_customer` (`customer_id`, `login_id`, `login_password`, `customer_name`, `email`, `gender`, `address`, `phone_number`, `customer_image`) VALUES
(6, 'user1', '$2y$10$BOMplFRATTJUKDSwvjl5VO8r7V5A9Oz6hcXTthM0YVRaObFox64MS', 'Vian Azis Tio Riwanto', 'v14nazis@gmail.com', 'Laki-Laki', 'Lingkungan Panji, Tegalgede, Sumbersari, Jember Regency, Jawa Timur [ 68124 ]', 81232782367, 'img/user-profile/6-5c22ba96331e6ba73485f7c2a90b0125-2021-01-01-13-15-28.png'),
(7, 'e31191848', '$2y$10$h/OTMk2lhFOYKle/6JGl8.dLdy7sWKvuGKxlBuLMpSPj6gbjir19K', 'Vian Azis Tio Riwanto', 'e31191848', 'Laki-Laki', 'Grenden, Puger, Jember', 8522131137, 'img/user-profile/7-6b006d96c3f8d79d2fba9f049f19040c-2021-01-04-12-26-48.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori_produk`
--

CREATE TABLE `tb_kategori_produk` (
  `product_type_id` int(11) NOT NULL,
  `product_type_name` varchar(45) NOT NULL,
  `product_type_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tb_kategori_produk`
--

INSERT INTO `tb_kategori_produk` (`product_type_id`, `product_type_name`, `product_type_description`) VALUES
(8, 'Makanan Peliharaan', 'Makanan Peliharaan adalah makanan khusus yang diberikan dan dikonsumsi oleh hewan peliharaan domestik maupun non-domestik.'),
(9, 'Kandang', 'Tersedia berbagai macam ukuran, bahan, dan jenis kandang untuk hewan peliharaan kesayangan anda.'),
(10, 'Obat dan Vitamin', 'Obat dan Vitamin khusus untuk merawat, mengobati, dan menjaga metabolisme hewan kesayangan anda.'),
(11, 'Mainan dan Aksesoris Peliharaan', 'Temukan aksesoris dan mainan agar hewan kesayangan anda tidak bosan, didesign khusus agar disukai oleh hewan peliharaan.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_keranjang`
--

CREATE TABLE `tb_keranjang` (
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `cart_amount_item` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_order`
--

CREATE TABLE `tb_order` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_bukti` varchar(255) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `order_status` enum('Pesanan Selesai','Pesanan Menunggu Pembayaran','Pesanan Diproses','Pesanan Dibatalkan','Pesanan Ditolak') DEFAULT 'Pesanan Menunggu Pembayaran'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tb_order`
--

INSERT INTO `tb_order` (`order_id`, `customer_id`, `order_bukti`, `order_date`, `order_status`) VALUES
(5, 6, NULL, '2021-01-13 20:39:54', 'Pesanan Ditolak'),
(6, 7, 'img/bukti/1.jpg', '2021-01-23 20:40:22', 'Pesanan Selesai'),
(7, 6, 'img/bukti/2.jpg', '2021-01-25 20:40:22', 'Pesanan Diproses'),
(8, 7, 'img/bukti/5.jpeg', '2021-01-16 20:40:22', 'Pesanan Menunggu Pembayaran'),
(9, 6, NULL, '2021-01-18 20:40:22', 'Pesanan Ditolak'),
(10, 7, NULL, '2021-01-02 20:40:22', 'Pesanan Dibatalkan'),
(11, 6, 'img/bukti/2.jpg', '2021-02-11 20:40:22', 'Pesanan Diproses'),
(12, 7, NULL, '2021-02-22 20:40:22', 'Pesanan Dibatalkan'),
(13, 6, NULL, '2021-03-17 20:40:22', 'Pesanan Dibatalkan'),
(14, 7, 'img/bukti/5.jpeg', '2021-03-19 20:40:22', 'Pesanan Menunggu Pembayaran'),
(15, 6, NULL, '2021-03-18 20:40:22', 'Pesanan Ditolak'),
(16, 7, 'img/bukti/2.jpg', '2021-03-11 20:40:22', 'Pesanan Menunggu Pembayaran'),
(17, 6, 'img/bukti/2.jpg', '2021-02-11 20:40:22', 'Pesanan Selesai'),
(18, 7, 'img/bukti/3.jpg', '2021-01-07 20:42:22', 'Pesanan Selesai'),
(19, 6, NULL, '2021-01-11 20:42:22', 'Pesanan Diproses'),
(20, 7, NULL, '2021-01-23 20:42:22', 'Pesanan Dibatalkan'),
(21, 6, NULL, '2021-01-31 20:42:22', 'Pesanan Selesai'),
(22, 7, 'img/bukti/5.jpeg', '2021-01-08 20:42:22', 'Pesanan Menunggu Pembayaran'),
(23, 6, NULL, '2021-01-12 20:42:22', 'Pesanan Dibatalkan'),
(24, 7, NULL, '2021-01-16 20:42:22', 'Pesanan Dibatalkan'),
(25, 6, 'img/bukti/3.jpg', '2021-01-18 20:42:22', 'Pesanan Diproses'),
(26, 7, 'img/bukti/3.jpg', '2021-01-23 20:42:22', 'Pesanan Diproses'),
(27, 6, NULL, '2021-01-17 20:42:22', 'Pesanan Selesai'),
(28, 7, NULL, '2021-02-11 20:43:14', 'Pesanan Menunggu Pembayaran'),
(29, 6, NULL, '2021-05-14 20:43:14', 'Pesanan Menunggu Pembayaran'),
(30, 7, NULL, '2021-02-15 20:43:14', 'Pesanan Diproses'),
(31, 6, NULL, '2021-02-18 20:43:14', 'Pesanan Diproses'),
(32, 7, NULL, '2021-02-19 20:43:14', 'Pesanan Selesai'),
(33, 6, NULL, '2021-02-19 20:43:14', 'Pesanan Diproses'),
(34, 7, NULL, '2021-02-22 20:43:14', 'Pesanan Diproses'),
(35, 6, NULL, '2021-02-15 20:43:14', 'Pesanan Selesai'),
(36, 7, NULL, '2021-03-13 20:43:14', 'Pesanan Menunggu Pembayaran'),
(37, 6, NULL, '2021-03-24 20:43:14', 'Pesanan Menunggu Pembayaran'),
(38, 7, NULL, '2021-02-26 20:43:14', 'Pesanan Dibatalkan'),
(39, 6, NULL, '2021-01-26 20:43:14', 'Pesanan Selesai'),
(40, 7, NULL, '2021-01-23 20:43:14', 'Pesanan Selesai'),
(41, 6, NULL, '2021-02-14 20:43:14', 'Pesanan Diproses'),
(42, 7, NULL, '2021-02-22 20:43:14', 'Pesanan Selesai'),
(43, 6, NULL, '2021-02-15 20:43:14', 'Pesanan Selesai'),
(44, 7, NULL, '2021-02-14 20:43:14', 'Pesanan Selesai'),
(45, 6, NULL, '2021-02-27 20:43:14', 'Pesanan Ditolak'),
(46, 7, NULL, '2021-01-08 20:44:37', 'Pesanan Dibatalkan'),
(47, 6, 'img/bukti/4.jpg', '2021-01-17 20:44:37', 'Pesanan Menunggu Pembayaran'),
(48, 7, NULL, '2021-01-22 20:44:37', 'Pesanan Diproses'),
(49, 6, 'img/bukti/4.jpg', '2021-01-21 20:44:37', 'Pesanan Diproses'),
(50, 7, NULL, '2021-01-21 20:44:37', 'Pesanan Menunggu Pembayaran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_order_item`
--

CREATE TABLE `tb_order_item` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_item_quantity` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tb_order_item`
--

INSERT INTO `tb_order_item` (`order_item_id`, `order_id`, `product_id`, `order_item_quantity`) VALUES
(0, 27, 24, 9),
(51, 38, 21, 24),
(52, 11, 22, 4),
(53, 33, 23, 5),
(54, 7, 24, 1),
(55, 48, 25, 8),
(56, 47, 26, 19),
(57, 14, 27, 24),
(58, 9, 21, 5),
(59, 28, 21, 11),
(60, 20, 23, 22),
(61, 41, 24, 7),
(62, 13, 25, 20),
(63, 17, 26, 18),
(64, 10, 27, 19),
(65, 37, 21, 5),
(66, 34, 22, 4),
(67, 22, 23, 1),
(68, 25, 24, 9),
(69, 28, 25, 18),
(70, 29, 26, 15),
(71, 8, 27, 18),
(72, 26, 21, 9),
(73, 30, 22, 9),
(74, 15, 23, 24),
(75, 36, 24, 9),
(77, 16, 26, 23),
(78, 49, 27, 22),
(79, 21, 21, 23),
(80, 24, 22, 22),
(82, 31, 24, 22),
(83, 44, 25, 13),
(84, 18, 26, 14),
(85, 23, 27, 6),
(87, 6, 22, 19),
(88, 40, 23, 10),
(89, 35, 24, 12),
(90, 19, 25, 3),
(91, 46, 26, 15),
(92, 42, 27, 22),
(93, 50, 21, 13),
(94, 32, 22, 5),
(95, 12, 23, 21),
(96, 27, 24, 9),
(97, 43, 25, 7),
(98, 5, 26, 1),
(99, 39, 27, 12),
(100, 45, 21, 24),
(1009, 38, 22, 5),
(1010, 11, 27, 7),
(1011, 33, 24, 3),
(1012, 7, 25, 2),
(1013, 48, 24, 3),
(1014, 47, 27, 7),
(1015, 14, 21, 7),
(1016, 9, 22, 5),
(1017, 20, 27, 5),
(1018, 41, 22, 4),
(1019, 13, 21, 23),
(1020, 17, 22, 11),
(1021, 10, 21, 32),
(1022, 37, 25, 3),
(1023, 34, 24, 6),
(1024, 22, 27, 7),
(1025, 25, 21, 4),
(1026, 28, 22, 13),
(1027, 29, 25, 2),
(1028, 8, 21, 4),
(1029, 26, 22, 5),
(1030, 30, 25, 2),
(1031, 15, 26, 1),
(1032, 36, 21, 3),
(1033, 16, 21, 2),
(1034, 49, 22, 1),
(1035, 21, 23, 2),
(1036, 24, 21, 3),
(1037, 31, 21, 4),
(1038, 44, 22, 5),
(1039, 18, 25, 6),
(1040, 23, 22, 2),
(1041, 6, 21, 1),
(1042, 40, 25, 3),
(1043, 35, 22, 1),
(1044, 19, 21, 2),
(1045, 46, 22, 4),
(1046, 42, 21, 5),
(1047, 50, 25, 1),
(1048, 32, 21, 2),
(1049, 12, 25, 2),
(1051, 43, 25, 7),
(1052, 5, 26, 1),
(1053, 39, 27, 12),
(1054, 45, 21, 24);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_payments`
--

CREATE TABLE `tb_payments` (
  `payment_id` int(11) NOT NULL,
  `payment_method_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `payment_date` datetime DEFAULT NULL,
  `payment_amount` bigint(18) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tb_payments`
--

INSERT INTO `tb_payments` (`payment_id`, `payment_method_id`, `order_id`, `payment_date`, `payment_amount`) VALUES
(51, 8, 29, NULL, 758690),
(52, 9, 42, NULL, 200922),
(53, 10, 44, NULL, 652608),
(54, 8, 9, NULL, 354485),
(55, 9, 7, NULL, 89449),
(57, 8, 37, NULL, 310268),
(58, 9, 17, NULL, 113075),
(59, 10, 25, NULL, 729520),
(60, 8, 20, NULL, 727931),
(61, 9, 38, NULL, 434170),
(62, 10, 32, NULL, 359395),
(63, 8, 39, NULL, 275856),
(64, 9, 31, NULL, 280498),
(65, 10, 16, NULL, 560000),
(66, 8, 45, NULL, 324612),
(67, 9, 21, NULL, 787449),
(69, 8, 28, NULL, 225152),
(70, 9, 36, NULL, 101838),
(71, 10, 8, NULL, 514346),
(72, 8, 6, NULL, 409574),
(73, 9, 34, NULL, 205845),
(74, 10, 50, NULL, 27748),
(75, 8, 10, NULL, 86872),
(76, 9, 49, NULL, 334603),
(77, 10, 43, NULL, 636176),
(78, 8, 26, NULL, 420887),
(79, 9, 13, NULL, 669747),
(80, 10, 11, NULL, 534179),
(81, 8, 24, NULL, 747832),
(82, 9, 47, NULL, 564005),
(83, 10, 48, NULL, 246727),
(84, 8, 12, NULL, 57796),
(87, 8, 19, NULL, 568565),
(88, 9, 27, NULL, 714835),
(89, 10, 35, NULL, 215972),
(90, 8, 18, NULL, 650107),
(91, 9, 30, NULL, 535115),
(92, 10, 46, NULL, 507258),
(93, 8, 22, NULL, 306492),
(94, 9, 23, NULL, 56361),
(95, 10, 40, NULL, 367442),
(96, 8, 14, NULL, 216564),
(97, 9, 41, NULL, 265304),
(98, 10, 15, NULL, 598930),
(99, 8, 33, NULL, 337485),
(100, 9, 5, NULL, 388671);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_payment_method`
--

CREATE TABLE `tb_payment_method` (
  `payment_method_id` int(11) NOT NULL,
  `payment_method_name` varchar(50) DEFAULT NULL,
  `payment_method_transfer_code` varchar(100) DEFAULT NULL,
  `payment_method_details` varchar(500) DEFAULT NULL,
  `payment_method_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tb_payment_method`
--

INSERT INTO `tb_payment_method` (`payment_method_id`, `payment_method_name`, `payment_method_transfer_code`, `payment_method_details`, `payment_method_image`) VALUES
(8, 'OVO Cash', '081287432634', 'Metode Pembayaran OVO Cash', 'img/bank/23811c908b281ecd1ef0ddd43518a1af-2021-01-04-12-50-46.png'),
(9, 'Transfer Bank Mandiri', '070-13-9832742-1', 'Metode Pembayaran Transfer Bank Mandiri', 'img/bank/bfdbc69a8d369ec324bbb34d9674203d-2021-01-04-12-52-33.png'),
(10, 'Transfer Bank BNI', '099 732 4812', 'Metode Pembayaran Transfer Bank BNI', 'img/bank/25144a06e07eea1692b2f3ad1e7e135e-2021-01-04-12-53-27.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_produk`
--

CREATE TABLE `tb_produk` (
  `product_id` int(11) NOT NULL,
  `product_type_id` int(11) NOT NULL,
  `product_name` varchar(45) DEFAULT NULL,
  `product_price` bigint(18) DEFAULT NULL,
  `product_color` varchar(45) DEFAULT NULL,
  `product_size` varchar(45) DEFAULT NULL,
  `product_weight` int(6) DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `product_short_description` varchar(400) DEFAULT NULL,
  `product_long_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tb_produk`
--

INSERT INTO `tb_produk` (`product_id`, `product_type_id`, `product_name`, `product_price`, `product_color`, `product_size`, `product_weight`, `product_image`, `product_short_description`, `product_long_description`) VALUES
(21, 8, 'Whiskas Rasa Tuna', 60000, '-', '-', 1200, 'img/product/cf682b73be1afad47d0f32559ac34627-2021-01-04-12-56-38.png', 'Whiskas Adult 1 – 6 Tahun Setelah menginjak 10 – 12 bulan, tambahkan makanan kucing dewasa WHISKAS 1+ sebagai campuran WHISKAS Junior guna melengkapi kebutuhan gizinya yang semakin kompleks. Sebagai hewan karnivora, kucing memerlukan protein 3,5 kali lipat lebih banyak serta berbagai elemen penting lainnya agar tetap sehat.', '-'),
(22, 8, 'Whiskas Wet Food', 6000, '-', '-', 85, 'img/product/f26b0d8f252a76f2f99337cced08314b-2021-01-04-13-01-54.png', '-', '-'),
(23, 9, 'Kandang Kucing/Anjing Besar', 450000, '-', '-', 5000, 'img/product/0d98dad3689d87a13bb0fef1e18629e0-2021-01-04-13-02-54.png', '-', '-'),
(24, 9, 'Kandang Kucing/Anjing Melingkar', 350000, '-', '-', 4000, 'img/product/4210ca147391331cc27600f77529ae94-2021-01-04-13-03-42.png', '-', '-'),
(25, 10, 'GNC Multivitamin Plus Chicken', 23000, '-', '-', 300, 'img/product/c67e5c10da581890bda28024e3f1711d-2021-01-04-13-04-34.png', '-', '-'),
(26, 11, 'Mainan Kucing Bulu-Bulu', 9000, 'Biru, Merah, Hijau', '-', 200, 'img/product/e8a244d523c128b1b104fe70433107b0-2021-01-04-13-05-14.png', '-', '-'),
(27, 11, 'Pajangan Kucing Lucu', 3000, 'Coklat, Putih, Oranye', '-', 300, 'img/product/7f5a687097048693a42312f58a583ef1-2021-01-04-13-06-03.png', '-', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_review`
--

CREATE TABLE `tb_review` (
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `review_text` varchar(400) DEFAULT NULL,
  `review_date` date DEFAULT NULL,
  `review_star` enum('1','2','3','4','5') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_review`
--

INSERT INTO `tb_review` (`customer_id`, `product_id`, `review_text`, `review_date`, `review_star`) VALUES
(6, 21, NULL, NULL, '2'),
(6, 22, NULL, NULL, '3'),
(6, 23, NULL, NULL, '3'),
(6, 25, NULL, NULL, '3'),
(6, 27, NULL, NULL, '4'),
(7, 21, NULL, NULL, '2'),
(7, 22, NULL, NULL, '1'),
(7, 23, NULL, NULL, '4'),
(7, 24, NULL, NULL, '4'),
(7, 26, NULL, NULL, '1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`customer_id`) USING BTREE,
  ADD UNIQUE KEY `login_id` (`login_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `tb_kategori_produk`
--
ALTER TABLE `tb_kategori_produk`
  ADD PRIMARY KEY (`product_type_id`) USING BTREE;

--
-- Indeks untuk tabel `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  ADD UNIQUE KEY `customer_id` (`customer_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indeks untuk tabel `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`order_id`) USING BTREE,
  ADD KEY `fk_customer_transaksi` (`customer_id`) USING BTREE;

--
-- Indeks untuk tabel `tb_order_item`
--
ALTER TABLE `tb_order_item`
  ADD PRIMARY KEY (`order_item_id`) USING BTREE,
  ADD KEY `fk_product_bt1` (`product_id`) USING BTREE,
  ADD KEY `fk_order_tr1` (`order_id`) USING BTREE;

--
-- Indeks untuk tabel `tb_payments`
--
ALTER TABLE `tb_payments`
  ADD PRIMARY KEY (`payment_id`) USING BTREE,
  ADD KEY `fk_order_py1` (`order_id`) USING BTREE,
  ADD KEY `fk_payment_method_py1` (`payment_method_id`) USING BTREE;

--
-- Indeks untuk tabel `tb_payment_method`
--
ALTER TABLE `tb_payment_method`
  ADD PRIMARY KEY (`payment_method_id`) USING BTREE;

--
-- Indeks untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`product_id`) USING BTREE,
  ADD KEY `fk_product_type_br1` (`product_type_id`) USING BTREE;

--
-- Indeks untuk tabel `tb_review`
--
ALTER TABLE `tb_review`
  ADD UNIQUE KEY `customer_id` (`customer_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_customer`
--
ALTER TABLE `tb_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori_produk`
--
ALTER TABLE `tb_kategori_produk`
  MODIFY `product_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT untuk tabel `tb_order_item`
--
ALTER TABLE `tb_order_item`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1055;

--
-- AUTO_INCREMENT untuk tabel `tb_payments`
--
ALTER TABLE `tb_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT untuk tabel `tb_payment_method`
--
ALTER TABLE `tb_payment_method`
  MODIFY `payment_method_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  ADD CONSTRAINT `tb_keranjang_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `tb_customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_keranjang_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `tb_produk` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_order`
--
ALTER TABLE `tb_order`
  ADD CONSTRAINT `tb_order_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `tb_customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_order_item`
--
ALTER TABLE `tb_order_item`
  ADD CONSTRAINT `tb_order_item_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `tb_order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_order_item_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `tb_produk` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_payments`
--
ALTER TABLE `tb_payments`
  ADD CONSTRAINT `tb_payments_ibfk_1` FOREIGN KEY (`payment_method_id`) REFERENCES `tb_payment_method` (`payment_method_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_payments_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `tb_order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD CONSTRAINT `tb_produk_ibfk_1` FOREIGN KEY (`product_type_id`) REFERENCES `tb_kategori_produk` (`product_type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_review`
--
ALTER TABLE `tb_review`
  ADD CONSTRAINT `tb_review_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `tb_customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_review_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `tb_produk` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
