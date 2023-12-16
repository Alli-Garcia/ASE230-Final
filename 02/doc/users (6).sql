-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2023 at 11:43 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `awards`
--

CREATE TABLE `awards` (
  `id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `awards`
--

INSERT INTO `awards` (`id`, `year`, `description`) VALUES
(1, 2023, 'for being the best'),
(2, 2019, 'testing'),
(4, 2023, 'test'),
(5, 2023, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `contactrequests`
--

CREATE TABLE `contactrequests` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactrequests`
--

INSERT INTO `contactrequests` (`id`, `name`, `email`) VALUES
(1, 'Alli Garcia', '123@email.com'),
(2, 'Bob Dylan', 'bobd@email.com');

-- --------------------------------------------------------

--
-- Table structure for table `homes`
--

CREATE TABLE `homes` (
  `id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zipcode` varchar(10) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `homes`
--

INSERT INTO `homes` (`id`, `address`, `city`, `state`, `zipcode`, `image`) VALUES
(1, '3513 Hardman Road', 'Brattleboro', 'Vermont', '05301', 'https://generatorfun.com/code/uploads/Random-House-image-15.jpg'),
(2, '2103 Frank Avenue', 'Portland', 'Pennsylvania', '97205', 'https://generatorfun.com/code/uploads/Random-House-image-16.jpg'),
(3, '1478 Highland View Drive', 'Sacramento', 'California', '95814', 'https://generatorfun.com/code/uploads/Random-House-image-2.jpg'),
(4, '1991 Grove Street', 'Farmingdale', 'New York', '11735', 'https://generatorfun.com/code/uploads/Random-House-image-7.jpg'),
(5, '3004 Round Table Drive', 'Cincinnati', 'Ohio', '45202', 'https://generatorfun.com/code/uploads/Random-House-image-19.jpg'),
(6, '4845 Stoneybrook Rd.', 'Cincinnati', 'OH', '45244', 'https://www.google.com/imgres?imgurl=https%3A%2F%2Fwww.bhg.com%2Fthmb%2FH9VV9JNnKl-H1faFXnPlQfNprYw%3D%2F1799x0%2Ffilters%3Ano_upscale()%3Astrip_icc()%2Fwhite-modern-house-curved-patio-archway-c0a4a3b3-aa51b24d14d0464ea15d36e05aa85ac9.jpg&tbnid=OF6tvsY1WI');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `team_member` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `bio` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `is_admin`) VALUES
(1, 'alli', '', '$2y$10$.nMHmddmCaGyZoFxJS2wLe4tGuiCVdH/U9A1BiUuNfJuG8s9E.yH.', 1),
(4, 'Mary', '', '$2y$10$P4hNEZpsX.xc1G9I2CfWFuuM8KCDYrVeHEvIMl6XgdPyUQHKIY1o2', 1),
(5, 'George', '', '$2y$10$DSGj5Yt7u.3CEei6KHOpkedR9jrm/P6qF0Z.DKs.VhSaLB0PtTKDe', 0),
(12, 'Sally', '', '$2y$10$qTtQ8DVMnomHnZRndxYj2OABoXodAmNCHoxzLWr.wl56xmeuAIErO', 0),
(13, 'dan', '', '$2y$10$8TVSG7oaBwmJnaSFAr2Cg.fZeqEi3ANoF9q3YVk/z5AYURAjVS1c6', 1),
(14, 'tom', '', '$2y$10$60q4CahO.chG/llQ8K3bJ.HgYUYCN8NG/qrNjqVGSDqUHY807DeHy', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `awards`
--
ALTER TABLE `awards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactrequests`
--
ALTER TABLE `contactrequests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homes`
--
ALTER TABLE `homes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `awards`
--
ALTER TABLE `awards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contactrequests`
--
ALTER TABLE `contactrequests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `homes`
--
ALTER TABLE `homes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contactrequests`
--
ALTER TABLE `contactrequests`
  ADD CONSTRAINT `contactrequests_ibfk_1` FOREIGN KEY (`id`) REFERENCES `homes` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `team_ibfk_1` FOREIGN KEY (`id`) REFERENCES `contactrequests` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
