-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2020 at 08:55 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlymobidb`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id_korisnik` int(50) NOT NULL,
  `ime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `uloga_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id_korisnik`, `ime`, `username`, `email`, `password`, `uloga_id`) VALUES
(20, 'Dusan', 'dusan', 'dusan@mail.com', 'de2096cf5a6889a074ceac14cd9bae91', 1),
(21, 'Marko', 'marko', 'marko@mail.com', 'c28aa76990994587b0e907683792297c', 2),
(54, 'Test1', 'test123', 'test@mail.com', 'test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `korpa`
--

CREATE TABLE `korpa` (
  `id_korpa` int(50) NOT NULL,
  `korisnik_id` int(50) NOT NULL,
  `proizvod_id` int(50) NOT NULL,
  `kolicina` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `marka`
--

CREATE TABLE `marka` (
  `id_marka` int(10) NOT NULL,
  `naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `putanja` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `marka`
--

INSERT INTO `marka` (`id_marka`, `naziv`, `putanja`) VALUES
(1, 'Samsung', 'samsung.php'),
(2, 'Apple', 'apple.php'),
(3, 'Huawei', 'huawei.php'),
(8, 'Primer', 'primer.php'),
(9, 'Test', 'test.php');

-- --------------------------------------------------------

--
-- Table structure for table `proizvod`
--

CREATE TABLE `proizvod` (
  `id_proizvod` int(10) NOT NULL,
  `src` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nazivProizvod` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cena` int(10) NOT NULL,
  `marka_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `proizvod`
--

INSERT INTO `proizvod` (`id_proizvod`, `src`, `alt`, `nazivProizvod`, `cena`, `marka_id`) VALUES
(1, 'assets/images/samsung/s10plus.jpg', 'Samsung S10 plus', 'Samsung Galaxy S10 plus', 1099, 1),
(2, 'assets/images/samsung/s10.jpg', 'Samsung S10', 'Samsung Galaxy S10', 979, 1),
(3, 'assets/images/samsung/s9plus.jpg', 'Samsung S9plus', 'Samsung Galaxy S9 plus', 949, 1),
(4, 'assets/images/samsung/s9.jpg', 'Samsung S9', 'Samsung Galaxy S9', 829, 1),
(5, 'assets/images/samsung/a70.jpg', 'Samsung A70', 'Samsung A70', 590, 1),
(6, 'assets/images/samsung/a30.jpg', 'Samsung A30', 'Samsung A30', 225, 1),
(7, 'assets/images/apple/xsmax.jpg', 'Iphone Xs max', 'Apple Iphone XS Max', 1290, 2),
(8, 'assets/images/apple/xr.jpg', 'Iphone XR', 'Apple Iphone XR', 890, 2),
(9, 'assets/images/apple/x.jpg', 'Apple X', 'Apple Iphone X', 899, 2),
(10, 'assets/images/apple/11pro.jpg', 'Apple 11 pro', 'Apple Iphone 11 pro', 1339, 2),
(11, 'assets/images/apple/11.jpg', 'Apple 11', 'Apple Iphone 11', 1119, 2),
(12, 'assets/images/apple/6s.jpg', 'Apple 6s', 'Apple Iphone 6s', 199, 2),
(13, 'assets/images/huawei/y9prime.jpg', 'Huawei Y9prime', 'Huawei Y9 Prime', 299, 3),
(14, 'assets/images/huawei/p30pro.jpg', 'Huawei P30 pro', 'Huawei P30 Pro', 1389, 3),
(15, 'assets/images/huawei/p20lite.jpg', 'Huawei P20 lite', 'Huawei P20 lite', 689, 3),
(16, 'assets/images/huawei/mate30pro.jpg', 'Huawei Mate 30 pro', 'Huawei Mate 30 Pro', 1499, 3),
(17, 'assets/images/huawei/mate20pro.jpg', 'Huawei Mate 20 pro', 'Huawei Mate 20 Pro', 1299, 3),
(18, 'assets/images/huawei/mate10lite.jpg', 'Huawei Mate 10 lite', 'Huawei Mate 10 lite', 499, 3);

-- --------------------------------------------------------

--
-- Table structure for table `proizvod_info`
--

CREATE TABLE `proizvod_info` (
  `id_proizvod-info` int(50) NOT NULL,
  `text1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `proizvod_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `proizvod_info`
--

INSERT INTO `proizvod_info` (`id_proizvod-info`, `text1`, `text2`, `text3`, `text4`, `proizvod_id`) VALUES
(1, '1 TB, 12 GB RAM', 'Octa-core (2x2.73 GHz Mongoose M4 & 2x2.31 GHz Cortex-A75 & 4x1.95 GHz Cortex-A55)', 'Android 9.0 (Pie); One UI', 'Trostruka 12 MP, f/1.5-2.4, 26mm (wide), 1/2.55', 1),
(2, '512 GB, 8 GB RAM', 'Octa-core (2x2.73 GHz Mongoose M4 & 2x2.31 GHz Cortex-A75 & 4x1.95 GHz Cortex-A55)', 'Android 9.0 (Pie); One UI', 'Trostruka 12 MP, f/1.5-2.4, 26mm (wide), 1/2.55', 2),
(3, '64/128/256 GB, 6 GB RAM', 'Octa-core (4x2.8 GHz Mongoose M3 & 4x1.7 GHz Cortex-A55)', 'Android 8.0 (Oreo)', 'Dual: 12 MP (f/1.5-2.4, 26mm, 1/2.55', 3),
(4, '64/128/256 GB, 4 GB RAM', 'Octa-core (4x2.8 GHz Mongoose M3 & 4x1.7 GHz Cortex-A55)', 'Android 8.0 (Oreo)', '12 MP (f/1.5-2.4, 26mm, 1/2.5', 4),
(5, '128 GB, 6/8 GB RAM', 'Octa-core (2x2.0 GHz Kryo 460 Gold & 6x1.7 GHz Kryo 460 Silver)', 'Android 9.0 (Pie); One UI', '32 MP, f/1.7, PDAF 8 MP, f/2.2, 12mm (ultrawide) 5 MP, f/2.2, depth sensor', 5),
(6, '32 GB, 3GB RAM', 'Octa-core (2x1.8 GHz Cortex-A73 & 6x1.6 GHz Cortex-A53)', 'Android 9.0 (Pie)', 'dual 16 MP, f/1.7, PDAF 5 MP, f/2.2, 12mm, (ultrawide)', 6),
(7, '512 GB, 4 GB RAM', 'Hexa-core (2x Vortex + 4x Tempest)', 'iOS 12', '12 MP, f/1.8, 28mm, 1/2.55', 7),
(8, '256 GB, 3 GB RAM', 'Hexa-core (2x Vortex + 4x Tempest)', 'iOS 12', '12 MP, f/1.8, 26mm (wide), 1/2.55', 8),
(9, '64GB, 3 GB RAM', 'Hexa-core', 'iOS 11', 'Dual 12 MP, f/1.8 i f/2.4, phase detekcija autofokus, OIS, 2x optički zoom, quad-LED (dual nane) blic', 9),
(10, '512GB 4GB RAM', 'Hexa-core (2x2.65 GHz Lightning + 4x1.8 GHz Thunder)', 'iOS 13', 'Trostruka 12 MP, f/1.8, 26mm (wide), 1/2.55\", 1.4µm, PDAF, OIS 12 MP, f/2.0, 52mm (telephoto), 1/3.4\", 1.0µm, PDAF, OIS, 2x optical zoom 12 MP, f/2.4, 13mm (ultrawide)', 10),
(11, '256GB, 4GB RAM', 'Hexa-core (2x2.65 GHz Lightning + 4x1.8 GHz Thunder)', 'iOS 13', 'Dual 12 MP, f/1.8, 26mm (wide), 1/2.55\", 1.4µm, PDAF, OIS 12 MP, f/2.4, 13mm (ultrawide)', 11),
(12, '32GB, 2 GB RAM', 'Dual-core 1.84 GHz', 'iOS 9', '12 MP, 4032 x 3024 piksela, phase detekcija autofokus, dual-LED (dual nane) blic', 12),
(13, '128 GB, 6 GB RAM or 64 GB, 4 GB RAM', 'Octa-core (4x2.2 GHz Cortex-A73 & 4x1.7 GHz Cortex-A53)', 'Android 8.1 (Oreo)', 'dual 16 MP, f/2.0, PDAF 2 MP, f/2.4, depth sensor', 13),
(14, '256GB, 8 GB RAM', 'Octa-core (2x2.6 GHz Cortex-A76 & 2x1.92 GHz Cortex-A76 & 4x1.8 GHz Cortex-A55)', 'Android 9.0 (Pie); EMUI 9.1', 'Cetvorostruka 40 MP, f/1.6, 27mm (wide), 1/1.7', 14),
(15, '64GB, 4 GB RAM', 'Octa-core (4x2.36 GHz Cortex-A53 & 4x1.7 GHz Cortex-A53)', 'Android 8.0 (Oreo) - EMUI 8.0', 'Dual: 16 MP + 2 MP, f/2.2, phase detection autofocus, LED flash', 15),
(16, '128GB 8GB RAM, 256GB 8GB RAM, UFS3.0', 'Octa-core (2x2.86 GHz Cortex-A76 & 2x2.09 GHz Cortex-A76 & 4x1.86 GHz Cortex-A55)', 'Android 10; EMUI 10', 'Cetvorostruka 40 MP, f/1.6, 27mm (wide), 1/1.7', 16),
(17, '128 GB, 6 GB RAM or 8GB 256GB', 'Octa-core (2x2.6 GHz Cortex-A76 & 2x1.92 GHz Cortex-A76 & 4x1.8 GHz Cortex-A55)', 'Android 9.0 (Pie)', 'Trostruka 40 MP, f/1.8, 27mm (wide), 1/1.7', 17),
(18, '64 GB, 4 GB RAM', 'Octa-core (4x2.36 GHz Cortex-A53 & 4x1.7 GHz Cortex-A53)', 'Android 7.0 (Nougat)', 'Dual: 16 MP + 2 MP, phase detection autofocus, LED flash', 18);

-- --------------------------------------------------------

--
-- Table structure for table `uloga`
--

CREATE TABLE `uloga` (
  `id_uloga` int(10) NOT NULL,
  `naziv` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `uloga`
--

INSERT INTO `uloga` (`id_uloga`, `naziv`) VALUES
(1, 'korisnik'),
(2, 'administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id_korisnik`),
  ADD KEY `uloga_id` (`uloga_id`);

--
-- Indexes for table `korpa`
--
ALTER TABLE `korpa`
  ADD PRIMARY KEY (`id_korpa`),
  ADD KEY `korisnik_id` (`korisnik_id`),
  ADD KEY `proizvod_id` (`proizvod_id`);

--
-- Indexes for table `marka`
--
ALTER TABLE `marka`
  ADD PRIMARY KEY (`id_marka`);

--
-- Indexes for table `proizvod`
--
ALTER TABLE `proizvod`
  ADD PRIMARY KEY (`id_proizvod`),
  ADD KEY `marka_id` (`marka_id`);

--
-- Indexes for table `proizvod_info`
--
ALTER TABLE `proizvod_info`
  ADD PRIMARY KEY (`id_proizvod-info`),
  ADD KEY `proizvod_id` (`proizvod_id`);

--
-- Indexes for table `uloga`
--
ALTER TABLE `uloga`
  ADD PRIMARY KEY (`id_uloga`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id_korisnik` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `korpa`
--
ALTER TABLE `korpa`
  MODIFY `id_korpa` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `marka`
--
ALTER TABLE `marka`
  MODIFY `id_marka` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `proizvod`
--
ALTER TABLE `proizvod`
  MODIFY `id_proizvod` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `proizvod_info`
--
ALTER TABLE `proizvod_info`
  MODIFY `id_proizvod-info` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `uloga`
--
ALTER TABLE `uloga`
  MODIFY `id_uloga` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `korisnik_ibfk_1` FOREIGN KEY (`uloga_id`) REFERENCES `uloga` (`id_uloga`);

--
-- Constraints for table `korpa`
--
ALTER TABLE `korpa`
  ADD CONSTRAINT `korpa_ibfk_1` FOREIGN KEY (`korisnik_id`) REFERENCES `korisnik` (`id_korisnik`),
  ADD CONSTRAINT `korpa_ibfk_2` FOREIGN KEY (`proizvod_id`) REFERENCES `proizvod` (`id_proizvod`);

--
-- Constraints for table `proizvod`
--
ALTER TABLE `proizvod`
  ADD CONSTRAINT `proizvod_ibfk_1` FOREIGN KEY (`marka_id`) REFERENCES `marka` (`id_marka`);

--
-- Constraints for table `proizvod_info`
--
ALTER TABLE `proizvod_info`
  ADD CONSTRAINT `proizvod_info_ibfk_1` FOREIGN KEY (`proizvod_id`) REFERENCES `proizvod` (`id_proizvod`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
