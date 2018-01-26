-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2018 at 08:25 AM
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
(2, 'Overlord', 'Overlord (オーバーロード Ōbārōdo) is a Japanese light novel series written by Kugane Maruyama and illustrated by so-bin. It began serialization online in 2010, before being acquired by Enterbrain. Twelve volumes have been published since July 30, 2012. A manga adaptation by Satoshi Ōshio, with art by Hugin Miyama, began serialization in Kadokawa Shoten&#39;s manga magazine Comp Ace from November 26, 2014. Both the light novels and the manga are licensed in North America by Yen Press, with a release date of November 8, 2016.', 100, 'Overlord_Volume_01.png', '2018-01-24 19:42:02'),
(4, 'Zero no Tsukaima', 'The Familiar of Zero (Japanese: ゼロの使い魔 Hepburn: Zero no Tsukaima) is a fantasy and comedy-oriented series of Japanese light novels written by Noboru Yamaguchi, with illustrations by Eiji Usatsuka. Media Factory published 20 volumes between June 2004 and February 2011. The series was left unfinished due to the author&#39;s death on April 4, 2013,[2] but the series was concluded in two volumes released in February 2016 and February 2017 with a different author, making use of notes left behind by the late Noboru Yamaguchi. The story features several characters from the second year class of a magic academy in a fictional magical world with the main characters being the inept mage Louise and her familiar from Earth, Saito Hiraga.', 100, 'Zeronots1_01.jpg', '2018-01-25 10:43:29'),
(5, 'Baka to Test to Shoukanjuu', 'Baka and Test (Japanese: バカとテストと召喚獣 Hepburn: Baka to Tesuto to Shōkanjū, lit. Idiots, Tests, and Summoned Beasts), also known as Baka and Test: Summon the Beasts, is a Japanese light novel series written by Kenji Inoue with illustrations by Yui Haga. Enterbrain published 18 novels from January 2007 to March 2015 under their Famitsu Bunko imprint.', 55, 'BakaTestV1cover.jpg', '2018-01-25 10:46:07'),
(7, 'Utsuro no Hako to Zero no Maria', 'The Empty Box and Zeroth Maria, known in Japan as Utsuro no Hako to Zero no Maria (空ろの箱と零のマリア, lit. The Hollow Box and the Maria of Zero) and colloquially referred to as Hakomari (箱マリ), is a Japanese light novel series written by Eiji Mikage (ja), with illustrations by Tetsuo.[2][a] ASCII Media Works published seven novels from January 2009 to June 2015 under their Dengeki Bunko imprint. The novels have been licensed for release in North America by Yen Press.', 78, 'UtsuroNoHako_vol1.jpg', '2018-01-25 10:50:25'),
(8, 'Toaru Majutsu no Index', 'A Certain Magical Index (とある魔術の禁書目録 インデックス Toaru Majutsu no Indekkusu) is a Japanese light novel series written by Kazuma Kamachi and illustrated by Kiyotaka Haimura, which has been published by ASCII Media Works under their Dengeki Bunko imprint since April 2004. The plot is set in a world where supernatural abilities exist. The light novels focus on Tōma Kamijō, a young high school student in Academy City who has an unusual ability, as he encounters an English nun named Index. His ability and relationship with Index proves dangerous to other magicians and espers who want to discover the secrets behind him, Index as well as the city.', 89, 'To_Aru_Majutsu_no_Index_new_cover.jpg', '2018-01-25 10:55:01'),
(10, 'Rokujouma no Shinryakusha!?', 'Invaders of the Rokujyōma!? (六畳間の侵略者!? Rokujōma no Shinryakusha!?, lit. Invaders of the Six-Tatami Mat Room!?) is a Japanese light novel series written by Takehaya and illustrated by Poco. HJ Bunko has published seventeen volumes since 2009 under their HJ Bunko imprint, as well as two side story volumes. A manga adaptation with art by Tomosane Ariike is serialized in Hobby Japan&#39;s online seinen manga magazine Comic Dangan. A 12-episode anime television series adaptation by Silver Link aired between July 11 and September 26, 2014.', 75, 'Rokujouma_no_Shinryakusha_Volume_8.5.jpeg.jpeg', '2018-01-25 16:23:54');

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
(14, 7, 7),
(15, 7, 8),
(16, 7, 9),
(17, 7, 13),
(70, 4, 1),
(71, 4, 2),
(72, 4, 3),
(73, 4, 4),
(74, 8, 1),
(75, 8, 11),
(76, 8, 13),
(77, 5, 3),
(78, 5, 5),
(79, 5, 10),
(86, 2, 1),
(87, 2, 2),
(88, 2, 7),
(89, 2, 13),
(90, 10, 3),
(91, 10, 10);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `items_genres`
--
ALTER TABLE `items_genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
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
