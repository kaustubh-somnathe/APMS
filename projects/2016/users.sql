-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2016 at 06:04 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `user_type` int(11) NOT NULL,
  `branch_id` int(5) NOT NULL,
  `percentage` varchar(99) NOT NULL,
  `status` int(1) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `loggedin` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `user_type`, `branch_id`, `percentage`, `status`, `created`, `modified`, `loggedin`) VALUES
(2, 'Vishal ', 'Kothekar', 'vishalc7w@gmail.com', '202cb962ac59075b964b07152d234b70', 2, 1, '0', 1, '2016-02-24 06:31:31', '2016-02-15 09:46:08', '2016-02-24 06:31:31'),
(3, 'Ram', 'Ghonmode', 'ramc7w@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 1, '0', 1, '2016-03-03 07:19:42', '2016-02-15 09:58:53', '2016-03-03 07:19:42'),
(4, 'swati', 'Deshmukh', 'swati@gmail.com', '202cb962ac59075b964b07152d234b70', 3, 1, '25', 1, '2016-03-03 08:20:30', '2016-02-17 06:25:33', '2016-03-01 09:52:58'),
(5, 'Harish ', 'Chopkar', 'harry.harish333@gmail.com', '202cb962ac59075b964b07152d234b70', 3, 1, '65', 0, '2016-03-03 08:20:34', '2016-02-20 15:23:28', '2016-02-20 15:23:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
