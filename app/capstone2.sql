-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2018 at 08:46 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capstone2`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `user_id`) VALUES
(1, 2),
(2, 3),
(3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `genre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `genre`) VALUES
(1, 'Action'),
(2, 'Adventure'),
(3, 'Comedy'),
(4, 'Drama'),
(5, 'Ecchi'),
(6, 'Harem'),
(7, 'Horror'),
(8, 'Mystery'),
(9, 'Psychological'),
(10, 'Romance'),
(11, 'Sci-Fi'),
(12, 'Slice of Life'),
(13, 'Supernatural');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `price` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `description`, `price`, `image`, `created_at`) VALUES
(1, 'Volume 01 - Rokujouma no Shinryakusha!?', 'Invaders of the Rokujyōma!? (六畳間の侵略者!? Rokujōma no Shinryakusha!?, lit. Invaders of the Six-Tatami Mat Room!?) is a Japanese light novel series written by Takehaya and illustrated by Poco. HJ Bunko has published seventeen volumes since 2009 under their HJ Bunko imprint, as well as two side story volumes. A manga adaptation with art by Tomosane Ariike is serialized in Hobby Japan\'s online seinen manga magazine Comic Dangan. A 12-episode anime television series adaptation by Silver Link aired between July 11 and September 26, 2014.', 75, 'Rokujouma_no_Shinryakusha_Volume_8.5.jpeg.jpeg', '2018-01-24 19:42:02'),
(2, 'Volume 01 - Overlord', 'Rule the other world', 100, 'Overlord_Volume_01.png', '2018-01-24 19:42:02'),
(4, 'Volume 01 - Zero no Tsukaima', 'balbla', 100, 'Zeronots1_01.jpg', '2018-01-25 10:43:29'),
(5, 'Volume 01 - Baka to Test to Shoukanjuu', 'Baka to Test to Shoukanjuu (Idiots, Tests, and Summoned Beasts), also known as Baka and Test: Summon the Beasts, is a Japanese light novel series created by Kenji Inoue and illustrated by Yui Haga.', 55, 'BakaTestV1cover.jpg', '2018-01-25 10:46:07'),
(7, 'Maria&#39;s Box', 'Discover the true horror', 78, 'UtsuroNoHako_vol1.jpg', '2018-01-25 10:50:25'),
(8, 'Volume 01 - Toaru Majutsu no Index', 'Toaru Majutsu no Index (lit. A Certain Magical Index) is a Japanese light novel series written by Kazuma Kamachi and illustrated by Kiyotaka Haimura.', 89, 'To_Aru_Majutsu_no_Index_new_cover.jpg', '2018-01-25 10:55:01');

-- --------------------------------------------------------

--
-- Table structure for table `items_genres`
--

CREATE TABLE `items_genres` (
  `id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `genre_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items_genres`
--

INSERT INTO `items_genres` (`id`, `item_id`, `genre_id`) VALUES
(6, 4, 1),
(7, 4, 2),
(8, 4, 3),
(9, 4, 4),
(10, 5, 3),
(11, 5, 5),
(12, 5, 10),
(14, 7, 7),
(15, 7, 8),
(16, 7, 9),
(17, 7, 13),
(18, 8, 1),
(19, 8, 11),
(20, 8, 13),
(22, 1, 3),
(23, 1, 10),
(59, 2, 1),
(60, 2, 2),
(61, 2, 7),
(62, 2, 13);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `order_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_admin` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `is_admin`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$BFZY8BBF16ayqFfBub8FMOIaMyvx/qUK3RFy7Iz88rYNRF5ibqWZe', '2018-01-24 19:27:49', 1),
(2, 'John Doe', 'jdoe@gmail.com', '$2y$10$uVzi4CPhVOF8ynGiVTa3uO7FNrYixZsEmLKxrnFDFnRo7C12dC53G', '2018-01-24 21:56:14', 0),
(3, 'Foo Bar', 'fbar@gmail.com', '$2y$10$9D673W94/KYU5Hk3UovvO.og/A2/C9mc5AKTC5356n37ZTGXJ9TmW', '2018-01-24 23:43:49', 0),
(4, 'Mary Jane', 'mjane@gmail.com', '$2y$10$qUsyLzk8l10Wz0DAG/zATOhCpzhJJeWE/Wk8AxSWcN33PJ0YHTxke', '2018-01-24 23:45:35', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items_genres`
--
ALTER TABLE `items_genres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `genre_id` (`genre_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `items_genres`
--
ALTER TABLE `items_genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `items_genres`
--
ALTER TABLE `items_genres`
  ADD CONSTRAINT `items_genres_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `items_genres_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
