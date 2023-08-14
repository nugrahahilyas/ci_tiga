-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Aug 14, 2023 at 07:24 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `id_buku` varchar(128) DEFAULT NULL,
  `id_penerbit` varchar(6) DEFAULT NULL,
  `judul_buku` varchar(255) DEFAULT NULL,
  `penulis` varchar(128) DEFAULT NULL,
  `harga` decimal(10,0) DEFAULT NULL,
  `diskon` decimal(3,3) DEFAULT NULL,
  `stok` int(4) DEFAULT '0',
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `id_buku`, `id_penerbit`, `judul_buku`, `penulis`, `harga`, `diskon`, `stok`, `total`) VALUES
(1, 'NUMED0001', 'NUMED', 'Keperawatan Maternitas', 'Erling Halland', '50000', '0.300', 9, 450000),
(2, 'NUMED0002', 'NUMED', 'Asuhan Kebidanan', 'Erik ten Hag', '60000', '0.400', 7, 420000),
(3, 'BURIL0001', 'BURIL', 'Farmakokinetik Klinik', 'David De Gea', '75000', '0.400', 7, 525000),
(4, 'BURIL0002', 'BURIL', 'Optimasi Dosis', 'Harry Kane', '65000', '0.300', 9, 585000),
(5, 'NUSAM0001', 'NUSAM', 'Hukum Pidana', 'Bruno Fernandes', '45000', '0.300', 4, 180000),
(6, 'NUSAM0002', 'NUSAM', 'Hukum Progresif', 'Martial', '35000', '0.400', 3, 105000),
(7, 'NUSAM003', 'NUSAM', 'Theory of Law', 'Oodegard', '67000', '0.500', 7, 469000),
(12, 'BURIL7', 'BURIL', 'Farmakoekonomi', 'Ivan Perisic', '45000', '0.300', 12, 540000),
(13, 'NUMED12', 'NUMED', 'Aplikasi Metodologi Penelitian Kesehatan', 'Luke Shaw', '60000', '0.400', 30, 1800000),
(14, 'NUSAM13', 'NUSAM', 'Tindak Pidana Korupsi', 'Onana', '60000', '0.300', 20, 1200000),
(16, 'BURIL15', 'BURIL', 'Interaksi Obat Vol 2', 'Pep Guardiola', '75000', '0.300', 20, 1500000),
(20, 'BURIL14', 'BURIL', 'Interaksi Obat Vol 1', 'Edison Cavani', '20000', '0.200', 2, 40000),
(23, 'BURIL20', 'BURIL', 'Sehat Ada di Lingkar Pinggang', 'Fredinho', '20000', '0.200', 20, 400000),
(24, 'BURIL23', 'BURIL', 'Metode Penelitian Epidemiologi', 'Varane', '30000', '0.200', 20, 600000),
(25, 'BURIL24', 'BURIL', 'Biologi Tanah', 'Aaron Wan Bissaka', '20000', '0.200', 20, 400000),
(26, 'NUMED25', 'NUMED', 'Demam Berdarah', 'Tyrel Malacia', '30000', '0.200', 30, 900000),
(27, 'NUSAM26', 'NUSAM', 'Kitab KUHP dan KUHAP', 'Casemiro', '40000', '0.200', 30, 1200000),
(29, 'PARAD28', 'PARAD', 'Filsafat Pancasila', 'Mctominay', '90000', '0.300', 10, 900000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id` int(11) NOT NULL,
  `id_penjualan` varchar(10) DEFAULT NULL,
  `id_buku` varchar(128) DEFAULT NULL,
  `jumlah` int(5) DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id`, `id_penjualan`, `id_buku`, `jumlah`, `subtotal`) VALUES
(1, 'COF0001', 'NUMED0001', 1, '50000.00'),
(2, 'COF0001', 'BURIL0001', 1, '75000.00');

--
-- Triggers `detail_penjualan`
--
DELIMITER $$
CREATE TRIGGER `tr_update_buku_stok` AFTER INSERT ON `detail_penjualan` FOR EACH ROW BEGIN
    DECLARE buku_stok INT;
    SELECT stok INTO buku_stok FROM buku WHERE id_buku = NEW.id_buku;
    UPDATE buku SET stok = buku_stok - NEW.jumlah WHERE id_buku = NEW.id_buku;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `id` int(11) NOT NULL,
  `id_pembeli` varchar(8) DEFAULT NULL,
  `nama_pembeli` varchar(50) DEFAULT NULL,
  `alamat` varchar(128) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `total_pembelian` decimal(10,2) DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`id`, `id_pembeli`, `nama_pembeli`, `alamat`, `no_hp`, `total_pembelian`) VALUES
(1, 'COF', 'Carlitos Teves', 'Argentinian', '082333444555', NULL),
(2, 'TBG', 'Gramedia Jensud', 'Jensud Yogyakarta', '083444555666', '0.00'),
(3, 'TBT', 'Togamas Malang', 'Malang', '084444555666', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE `penerbit` (
  `id` int(11) NOT NULL,
  `id_penerbit` varchar(6) DEFAULT NULL,
  `nama_penerbit` varchar(30) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `alamat` varchar(128) DEFAULT NULL,
  `jumlah_stok` int(4) DEFAULT '0',
  `omset` decimal(10,2) DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`id`, `id_penerbit`, `nama_penerbit`, `no_hp`, `alamat`, `jumlah_stok`, `omset`) VALUES
(1, 'NUMED', 'Nuha Medika', '081222333444', 'Yogyakarta', 76, '3570000.00'),
(2, 'BURIL', 'Bursa Ilmu', '083877583660', 'Yogyakarta', 110, '4590000.00'),
(3, 'NUSAM', 'Nusa Media', '082333444555', 'Bantul', 64, '3154000.00'),
(4, 'THAFA', 'Thafa Media', '081222333444', 'Kalasan', 0, '0.00'),
(5, 'PARAD', 'Paradigma', '082333444555', 'Wonosari', 10, '900000.00'),
(6, 'LINKAR', 'Lingkar Media', '083444555666', 'Kotagede', 10, '800000.00');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL,
  `id_penjualan` varchar(10) DEFAULT NULL,
  `id_pembeli` varchar(8) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `tgl_penjualan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id`, `id_penjualan`, `id_pembeli`, `total`, `tgl_penjualan`) VALUES
(1, 'COF0001', 'COF', '125000.00', '2023-08-11');

-- --------------------------------------------------------

--
-- Table structure for table `user`
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
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'HILYAS RIZA NUGRAHA, S.KOM', 'nuge@gmail.com', 'hilyas21.png', '$2y$10$hGYXYUivuWdTNgMplMJl2.gg6DALx6t2RNF.NV/pdqeforaSzvP7W', 1, 1, 1690335629),
(3, 'Gestik Arbi', 'gestik@gmail.com', 'profil.jpg', '$2y$10$R8UBGKyzbEjWLU/EjQuv8utvJ7tJKuYyqpQiwxW6eZhFOnf4dC7te', 2, 0, 1690336521),
(4, 'Ulfa Septi', 'ulfa@gmail.com', 'default.png', '$2y$10$O0xk1kk.nPZ.kH3kF77yVOTSKLkXbZDJuLBs8aVB1hE.cnRR0EUay', 2, 1, 1690342743),
(5, 'nina', 'nina@gmail.com', 'default.png', '$2y$10$vkzqnGbG54OgYc1P5ZYCNeHNkU9M0gmhk9pTTybiIAO1GEP0n6qVm', 2, 0, 1690868216);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(1) NOT NULL,
  `menu_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(6, 1, 4),
(7, 2, 4),
(10, 1, 5),
(11, 1, 3),
(12, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(4, 'Buku'),
(5, 'Penerbit');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'User\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'Profil', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Ubah Profil', 'user/edit', 'fas fa-fw fa-pen', 1),
(4, 3, 'Manajemen Menu', 'menu', 'fas fa-fw fa-folder-open', 1),
(5, 3, 'Manajemen Submenu', 'menu/submenu', 'fas fa-fw fa-list-ul', 1),
(7, 1, 'Akses', 'admin/akses', 'fas fa-fw fa-universal-access', 1),
(8, 2, 'Ganti Sandi', 'user/gantisandi', 'fas fa-fw fa-key', 1),
(9, 1, 'Data User', 'admin/user', 'fas fa-fw fa-users', 1),
(10, 4, 'Tabel Buku', 'buku', 'fas fa-fw fa-book', 1),
(12, 5, 'Tabel Penerbit', 'penerbit', 'fas fa-fw fa-truck', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_buku` (`id_buku`),
  ADD KEY `id_penerbit` (`id_penerbit`);

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_penjualan` (`id_penjualan`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_pembeli` (`id_pembeli`);

--
-- Indexes for table `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_penerbit` (`id_penerbit`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_penjualan` (`id_penjualan`),
  ADD KEY `id_pembeli` (`id_pembeli`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penerbit`
--
ALTER TABLE `penerbit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`id_penerbit`) REFERENCES `penerbit` (`id_penerbit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD CONSTRAINT `detail_penjualan_ibfk_1` FOREIGN KEY (`id_penjualan`) REFERENCES `penjualan` (`id_penjualan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_penjualan_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id_pembeli`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
