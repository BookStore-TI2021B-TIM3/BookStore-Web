-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jul 2024 pada 10.18
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

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
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `books`
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
-- Dumping data untuk tabel `books`
--

INSERT INTO `books` (`id`, `author`, `title`, `price`, `rating`, `synopsis`, `imageUrl`) VALUES
(1, 'Pramoedya Ananta Toer', 'Bumi Manusia', 'Rp. 67.000,00', 4.4, 'Roman Tetralogi Buru mengambil latar belakang dan cikal bakal nation Indonesia di awal abad ke-20. Dengan membacanya waktu kita dibalikkan sedemikian rupa dan hidup di era membibitnya pergerakan nasional mula-mula, juga pertautan rasa, kegamangan jiwa, percintaan, dan pertarungan kekuatan anonim para srikandi yang mengawal penyemaian bangunan nasional yang kemudian kelak melahirkan Indonesia modern.', 'bumi-manusia.jpg'),
(2, 'Eka Kurniawan', 'Cantik Itu Luka', 'Rp. 118.000,00', 5, 'Hidup di era kolonialisme bagi para wanita dianggap sudah setara seperti hidup di neraka. Terutama bagi para wanita berparas cantik yang menjadi incaran tentara penjajah untuk melampiaskan hasrat mereka. Itu lah takdir miris yang dilalui Dewi Ayu, demi menyelamatkan hidupnya sendiri Dewi harus menerima paksaan menjadi pelacur bagi tentara Belanda dan Jepang selama masa kedudukan mereka di Indonesia.', 'cantik-Itu-luka.jpg'),
(3, 'Abdul Malik Karim Amrullah (Buya Hamka)', 'Tenggelamnya Kapal Van Der Wijck', 'Rp. 81.000,00', 5, 'Zainuddin, seorang pemuda yang berdarah Minang dari ayah dan berdarah Bugis dari ibu–dengan hati penuh harapan dan angan akan sambutan gembira dari keluarga ayahnya–dari tanah kelahirannya, Mengkasar, pergi ke Padang Panjang, kampung halaman sang ayah. Namun, apa yang diinginkannya tidak terjadi. Di kampung halaman dan oleh keluarganya dia dianggap orang asing. Ketidaknyamanan hidup di kampung halamannya terobati karena perkenalannya dengan Hayati. Mereka saling jatuh cinta dalam keikhlasan dan kesucian jiwa.', 'van-der-wijck.jpg'),
(4, 'Leila S. Chudori', 'Laut Bercerita', 'Rp. 109.000,00', 4.6, 'Buku ini terdiri atas dua bagian. Bagian pertama mengambil sudut pandang seorang mahasiswa aktivis bernama Laut, menceritakan bagaimana Laut dan kawan-kawannya menyusun rencana, berpindah-pindah dalam pelarian, hingga tertangkap oleh pasukan rahasia. Sedangkan bagian kedua dikisahkan oleh Asmara, adik Laut. Bagian kedua mewakili perasaan keluarga korban penghilangan paksa, bagaimana pencarian mereka terhadap kerabat mereka yang tak pernah kembali.', 'laut-bercerita.jpg'),
(6, 'Andrea Hirata', 'Laskar Pelangi', 'Rp. 78.000,00', 3.5, 'sinopsis buku contoh', '7e89813cf1f731e9460e80d2f2268f66d94907f3.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
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
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `title`, `username`, `phone`, `price`, `date`, `address`, `status`, `arrival`) VALUES
(17, 'Bumi Manusia', 'aji', '+6285747356747', 'Rp. 90.000,00', '2024-06-28', 'salem', 'diproses', '2024-07-19'),
(18, 'Bumi Manusia', 'wendra', '+6285747356747', 'Rp. 90.000,00', '2024-06-28', 'salem', 'pending', '0000-00-00'),
(24, 'Bumi Manusia', 'jihan', '085747356747', 'Rp. 90.000,00', '2024-06-16', 'salem', 'diproses', '0000-00-00'),
(25, 'Bumi Manusia', 'jihan', '086745677654', 'Rp. 90.000,00', '2024-06-10', 'brebes', '', NULL),
(27, 'Bumi Manusia', 'aji', '085747356747', 'Rp. 90.000,00', '2024-06-23', 'Brebes', '', NULL),
(29, 'Bumi Manusia', 'aji', '000000000', 'Rp. 90.000,00', '2024-06-29', 'bsbsh', '', NULL),
(30, 'Bumi Manusia', 'aji', '085747356747', 'Rp. 90.000,00', '2024-06-29', 'salem', 'Diproses', NULL),
(32, 'Laskar Pelangi', 'aji', '085747356747', 'Rp. 81.000,00', '2024-06-16', 'salem', 'diproses', '0000-00-00'),
(33, 'Bumi Manusia', 'pysal', '085747356789', 'Rp. 90.000,00', '2024-06-29', 'Salem', 'Diproses', '2024-07-04'),
(39, 'Bumi Manusia', 'saya', '085747356747', 'Rp. 67.000,00', '2024-01-07', 'brebes', 'Diproses', '0000-00-00'),
(40, 'Laskar Pelangi', 'aji', '085747356747', 'Rp. 50.000,00', '2024-03-07', 'salem', 'dikirim', '2024-07-04'),
(41, 'Bumi Manusia', 'nanda', '08564567', 'Rp. 67.000,00', '2024-03-07', 'kuningan', 'diproses', '2024-07-04'),
(42, 'Cantik Itu Luka', 'aprillia', '083156686645', 'Rp. 118.000,00', '2024-03-07', 'kuningan', '', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `location`, `phone`) VALUES
(26, 'pysal', 'pysal@gmail.com', '2', 'Salem', '085747356789'),
(30, 'rina', 'rina@gmail.com', '111', 'kuningan', '07828727771'),
(34, 'nanda', 'nanda@gmail.com', '12345', '', ''),
(36, 'aji', 'aji@gmail.com', '12', 'brebes', '085747356747'),
(37, 'aji', '13@gmail.com', '1', '', ''),
(38, 'agung', 'agung@gmail.com', '1', '', ''),
(40, 'jihan', 'jihan@gmail.com', '12', '', ''),
(41, 'aji', 'aji@gmail.com', '123', '', ''),
(43, 'aji', 'aji1@gmail.com', '1', 'salem', '085747356747'),
(44, 'pulan', 'pulan@gmail.com', '1', 'kuningan', '089875674567'),
(45, 'kamu', 'kamu@gmail.com', 'kamu', 'hshs', '000'),
(46, 'dia', 'dia@gmail.com', 'dia', 'kuningan', '0000111'),
(47, 'saya', 'saya@gmail.com', 'saya', 'brebes', '085747356747'),
(48, 'diaz', 'diaz@gmail.com', '123', '', ''),
(49, 'uji', 'uji@gmail.com', '2', 'salem', '+6285747356747'),
(50, 'nanda', '12@gmail.com', '12', 'kuningan', '08564567'),
(51, 'aprillia', 'aprillia@gmail.com', 'april123', 'kuningan', '083156686645'),
(52, 'pab', 'pab@gmail.com', 'pab123', 'kuningan', '12345678'),
(54, 'exam', 'exam@gmail.com', '2', 'salem', '+6285747356747');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
