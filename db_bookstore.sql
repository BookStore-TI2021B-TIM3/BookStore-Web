-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2024 at 09:52 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `author` varchar(225) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `rating` float NOT NULL,
  `synopsis` text NOT NULL,
  `imageUrl` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `author`, `title`, `price`, `rating`, `synopsis`, `imageUrl`) VALUES
(1, 'Pramoedya Ananta Toer', 'Bumi Manusia', 'Rp. 90.000,00', 4.7, 'Synopsis for Bumi Manusia', 'https://cdn.gramedia.com/uploads/items/bumi-manusia-edit.jpg'),
(2, 'Eka Kurniawan', 'Cantik Itu Luka', 'Rp. 163.900,00', 4.9, 'Synopsis for Cantik Itu Luka', 'https://www.gramedia.com/blog/content/images/2021/12/Cantik-itu-Luka-Cover-Besar.jpg'),
(3, 'Andrea Hirata', 'Laskar Pelangi', 'Rp. 81.000,00', 4.6, 'Synopsis for Laskar Pelangi', 'https://cdn.gramedia.com/uploads/items/img212.jpg'),
(4, 'Abdul Malik Karim Amrullah', 'Tenggelamnya Kapal Van der Wijck', 'Rp. 110.000,00', 4.8, 'Synopsis for Tenggelamnya Kapal Van der Wijck', 'https://www.gramedia.com/blog/content/images/2022/01/img067.jpg'),
(5, 'nannana', 'okee bangettt(author)', '89000', 3.8, 'sinopsis', '03d9f467bc6f15b2ce9113b873084c2668884301.jpeg'),
(6, 'pidi baiq', 'ancika ', '98000', 3.9, 'sinopsis ancika', 'WhatsApp Image 2024-06-12 at 13.44.00 (1).jpeg'),
(9, 'nandaaa okeeee', 'bukuuu', '56000', 3.5, 'oke gasih', 'c1d6144e3ae7b413e7c0e105b698c9f20e1136fc.jpeg'),
(10, 'sdfghjnm ygygygygy', 'asdfgh', '2435465', 4, 'qwdsfdfgb', '26d8021035f35c0f76068a67002beb6471e5b49b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `username` varchar(225) NOT NULL,
  `phone` varchar(225) NOT NULL,
  `price` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `arrival` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `title`, `username`, `phone`, `price`, `date`, `address`, `status`, `arrival`) VALUES
(10, 'Bumi Manusia', 'pysal', '+6285747356747', 'Rp. 90.000,00', NULL, '', '', NULL),
(11, 'Cantik Itu Luka', 'aji', '085747356747', 'Rp. 163.900,00', NULL, '', '', NULL),
(12, 'Bumi Manusia', 'aji', '+6285747356747', 'Rp. 90.000,00', '2024-06-16', 'salem', '', NULL),
(14, 'Bumi Manusia', 'aji', '+6285747356747', 'Rp. 90.000,00', '2024-06-28', 'salem', '', NULL),
(15, 'Bumi Manusia', 'aji', '+6285747356747', 'Rp. 90.000,00', '2024-06-28', 'salem', 'Terkirim', NULL),
(16, 'Tenggelamnya Kapal Van der Wijck', 'aji', '+6285747356747', 'Rp. 110.000,00', '2024-06-28', 'salem', 'Dikirim', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `location` varchar(225) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `location`, `phone`) VALUES
(26, 'pysal', 'pysal@gmail.com', '1', 'brebes', '0857473567'),
(30, 'rina', 'rina@gmail.com', '111', 'kuningan', '07828727771'),
(34, 'nanda', 'nanda@gmail.com', '12345', '', ''),
(36, 'aji', '12@gmail.com', '12', 'salem', '085747356747'),
(37, 'aji', '13@gmail.com', '1', '', ''),
(38, 'agung', 'agung@gmail.com', '1', '', ''),
(39, 'nanda', 'nanda@gmail.com', '123nanda', 'kuningan', '0987654321'),
(40, 'nanda', 'nanda@gmail.com', '123nanda', 'kuningan', '0987654321');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
