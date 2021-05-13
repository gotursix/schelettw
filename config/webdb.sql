-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2021 at 04:01 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `points` int(100) NOT NULL,
  `difficulty` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`id`, `user_id`, `points`, `difficulty`) VALUES
(2, 1, 150, 'medium'),
(3, 17, 200, 'hard'),
(5, 1, 300, 'easy'),
(6, 17, 500, 'easy'),
(7, 19, 120, 'medium'),
(8, 19, 180, 'easy'),
(9, 19, 150, 'hard'),
(10, 20, 350, 'hard'),
(11, 20, 430, 'medium'),
(12, 20, 450, 'easy'),
(13, 21, 230, 'hard'),
(14, 21, 340, 'medium'),
(15, 21, 490, 'easy'),
(16, 22, 410, 'hard'),
(17, 22, 470, 'medium'),
(18, 22, 500, 'easy'),
(19, 23, 150, 'hard'),
(20, 23, 250, 'medium'),
(21, 23, 290, 'easy'),
(22, 24, 100, 'hard'),
(23, 24, 250, 'medium'),
(24, 24, 500, 'easy'),
(25, 25, 130, 'hard'),
(26, 25, 340, 'medium'),
(27, 25, 490, 'easy'),
(28, 26, 190, 'hard'),
(29, 26, 370, 'medium'),
(30, 26, 390, 'easy'),
(31, 27, 80, 'hard'),
(32, 27, 300, 'medium'),
(33, 27, 450, 'easy'),
(34, 28, 90, 'hard'),
(35, 28, 240, 'medium'),
(36, 28, 440, 'easy');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `fname` varchar(150) NOT NULL,
  `lname` varchar(150) NOT NULL,
  `acl` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `fname`, `lname`, `acl`) VALUES
(1, 'epicsteve', 'vly.2814@gmail.com', '$2y$10$.YDMxW04WWtTnrqDG3tLjObe2JKkmJpO.1B6yQEA4y5ldl3T7DFua', 'Valentin', 'Grigorean', NULL),
(17, 'lalala', 'vly.2814@gmail.com', '$2y$10$wvQ/iBpLPKrLxsPHsBCBDu7Ib/mYAG6AFHBhfIUBYkSxneLd5aDCC', 'Valentin', 'Grigorean', NULL),
(19, 'lt8nil', 'toni.kroos@yahoo.com', '$2y$10$AO5BzdwyyusnhQaAXHq.peppjKgEfGCj.BceL8VGIFEEjkcSmqwtC', 'Toni', 'Kroos', NULL),
(20, 'klaus123', 'klaus_iohannis@gmail.com', '$2y$10$2fQCp4x8b1RaJHT.Q/mzhe3.XVwhMqT5z2d9scqBBKR2c1gfwisqm', 'Klaus', 'Iohannis', NULL),
(21, 'aamariei', 'andrei.amariei@yahoo.com', '$2y$10$n1B.MIrTmNviUHB1vrJxw.kQM8V/VncoeGavWQ8sWcm/MgWRumhd2', 'Andrei', 'Amariei', NULL),
(22, 'eminescu1850', 'eminescu@yahoo.com', '$2y$10$DEoREkHOFwE7ED8L2oWPs.avgZvZ603pVfVeO8vgVegoMlL9lQi9O', 'Mihai', 'Eminescu', NULL),
(23, 'vladvlad', 'vlad_vlad@yahoo.com', '$2y$10$84jEEKjAFfiiqnF787NCS.w9En5LqJ9t1QMfWMcz8E6x2RETDZ9je', 'Vlad', 'Vlad', NULL),
(24, 'eusuntdorian', 'dorian.popa@gmail.com', '$2y$10$rG2eznLBwCVNbRqbAbtyaO1NJRbUQaIr/ohvA1im1NUcMn96nzQa.', 'Dorian', 'Popa', NULL),
(25, 'TomJerry', 'tom_jerry@movie.com', '$2y$10$6.v8QqduHxLAifN.5GKtmuCL7vueJBS33geJQUw9fdsA60ynU5y9e', 'Tom', 'Jerry', NULL),
(26, 'GameMaster1', 'game_master@games.com', '$2y$10$/xZrKgqTZKwm6xqxRYaBX.vBPzTOxrBjo3.MXEkAUqF7WTmbPXmqG', 'Game', 'Master', NULL),
(27, 'BeethovenComposer', 'beethoven@gmail.com', '$2y$10$xS8dxCgM7up/pf/3kG0SUeAjJ3wiV2Zf9IYkfdCuCEsNsqNV8liUC', 'Ludwig van', 'Beethoven', NULL),
(28, 'dornaapaplata', 'apa_plata@yahoo.com', '$2y$10$X968zYocxI3.s/4qkj..qO61.xHFr1J8xMcbqMLGkzxYJeAog9bjm', 'Apa', 'Plata', NULL),
(29, 'mergeoare', 'vly.2814@gmail.com', '$2y$10$9ZYWdxLyP5XnVGijx7HpbeRGrs9w.mDtsvxwtK0NMhvL2ZyBhza/G', 'Valentin', 'Grigorean', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_sessions`
--

CREATE TABLE `user_sessions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sessions`
--

INSERT INTO `user_sessions` (`id`, `user_id`, `session`, `user_agent`) VALUES
(72, 1, '7ed38ddf10d8317a38c5c5455e923f14', 'Mozilla (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit (KHTML, like Gecko) Version Mobile Safari'),
(77, 1, '44a388a46d1ac3ec45e78728ab191d79', 'Mozilla (Windows NT 10.0; Win64; x64) AppleWebKit (KHTML, like Gecko) Chrome Safari');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_sessions`
--
ALTER TABLE `user_sessions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user_sessions`
--
ALTER TABLE `user_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
