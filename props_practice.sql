-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2019 at 09:58 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `props_practice`
--

-- --------------------------------------------------------

--
-- Table structure for table `list_items`
--

CREATE TABLE `list_items` (
  `id` int(15) NOT NULL,
  `list_id` int(11) NOT NULL,
  `item_content` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list_items`
--

INSERT INTO `list_items` (`id`, `list_id`, `item_content`, `created_at`, `updated_at`) VALUES
(1, 1, 'abc', '2019-04-08 23:20:54', '2019-04-08 23:20:54'),
(2, 1, 'item 1', '2019-04-08 23:51:24', '2019-04-08 23:51:24'),
(3, 1, 'item 2', '2019-04-08 23:51:32', '2019-04-08 23:51:32'),
(4, 1, 'item 1', '2019-04-08 23:52:40', '2019-04-08 23:52:40'),
(5, 1, 'item 2', '2019-04-08 23:52:45', '2019-04-08 23:52:45');

-- --------------------------------------------------------

--
-- Table structure for table `todo_lists`
--

CREATE TABLE `todo_lists` (
  `id` int(20) NOT NULL,
  `Category_id` int(10) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `user_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `todo_lists`
--

INSERT INTO `todo_lists` (`id`, `Category_id`, `Title`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 2, 'Waypoints in Directions', 1, '2019-04-08 23:20:21', '2019-04-08 23:20:21'),
(2, 3, 'chicken roll', 1, '2019-04-08 23:48:47', '2019-04-08 23:48:47'),
(3, 2, 'Birthday', 1, '2019-04-08 23:51:13', '2019-04-08 23:51:13'),
(4, 1, 'london', 1, '2019-04-08 23:52:33', '2019-04-08 23:52:33'),
(5, 3, 'sdfsf', 1, '2019-04-08 23:53:16', '2019-04-08 23:53:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'marcs', 'marcs@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2019-04-08 23:18:59', '2019-04-08 23:18:59'),
(2, 'test123', 'test123@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2019-04-08 23:43:37', '2019-04-08 23:43:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `list_items`
--
ALTER TABLE `list_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `todo_lists`
--
ALTER TABLE `todo_lists`
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
-- AUTO_INCREMENT for table `list_items`
--
ALTER TABLE `list_items`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `todo_lists`
--
ALTER TABLE `todo_lists`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
