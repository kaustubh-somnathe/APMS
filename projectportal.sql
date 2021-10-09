-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2019 at 05:28 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(11) NOT NULL,
  `branch_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `user_id`, `project_id`, `created`) VALUES
(1, 'start coding from tomorrow itself.', 150, 2, '2019-02-21 00:35:55'),
(2, 'ok sir', 151, 2, '2019-02-21 00:37:10');

-- --------------------------------------------------------

--
-- Table structure for table `group_allot`
--

CREATE TABLE `group_allot` (
  `id` int(11) NOT NULL,
  `guide_id` int(11) NOT NULL,
  `leader_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_allot`
--

INSERT INTO `group_allot` (`id`, `guide_id`, `leader_id`, `group_id`, `project_id`) VALUES
(27, 149, 148, 0, 0),
(28, 150, 147, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `is_read` int(1) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `message`, `receiver_id`, `sender_id`, `is_read`, `created`) VALUES
(1, 'You have assigned to the Group of rehan pathan', 149, 0, 0, '2019-02-21 00:29:30'),
(2, 'You have assigned to the Group of nikhi; pradhan', 150, 0, 0, '2019-02-21 00:29:36'),
(3, 'You have assigned to the Project of inventory managment', 149, 0, 0, '2019-02-21 00:33:09'),
(4, 'You have assigned to the Project of library mangment', 150, 0, 0, '2019-02-21 00:33:17');

-- --------------------------------------------------------

--
-- Table structure for table `project_details`
--

CREATE TABLE `project_details` (
  `id` int(11) NOT NULL,
  `guide_id` int(11) NOT NULL,
  `project_name` varchar(100) NOT NULL,
  `project_description` varchar(500) NOT NULL,
  `percentage` varchar(10) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `project_domain` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_details`
--

INSERT INTO `project_details` (`id`, `guide_id`, `project_name`, `project_description`, `percentage`, `created`, `project_domain`, `start_date`, `end_date`) VALUES
(1, 149, 'inventory managment', 'inventory managment website for an organisation.', '0', '2019-02-20 19:03:09', 'ERP', '2019-02-21', '2019-03-31'),
(2, 150, 'library mangment', 'collage library system', '10', '2019-02-20 19:11:39', 'application', '2019-02-21', '2019-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `project_group`
--

CREATE TABLE `project_group` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_leader` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_group`
--

INSERT INTO `project_group` (`id`, `group_id`, `user_id`, `is_leader`) VALUES
(706, 2019001, 148, 1),
(707, 2019001, 146, 0),
(708, 2019001, 145, 0),
(709, 2019001, 142, 0),
(710, 2019002, 147, 1),
(711, 2019002, 151, 0),
(712, 2019002, 143, 0),
(713, 2019002, 144, 0);

-- --------------------------------------------------------

--
-- Table structure for table `project_guides`
--

CREATE TABLE `project_guides` (
  `id` int(11) NOT NULL,
  `guide_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project_uploads`
--

CREATE TABLE `project_uploads` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `project_file_name` varchar(100) NOT NULL,
  `project_description` varchar(250) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_approved` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_uploads`
--

INSERT INTO `project_uploads` (`id`, `student_id`, `project_file_name`, `project_description`, `created`, `is_approved`) VALUES
(1, 147, 'header.php', 'header file ', '2019-02-20 19:11:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `que` varchar(150) NOT NULL,
  `ans` int(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_images`
--

CREATE TABLE `tbl_images` (
  `id` int(11) NOT NULL,
  `name` longblob NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_uploads`
--

CREATE TABLE `tbl_uploads` (
  `id` int(10) NOT NULL,
  `file` varchar(100) NOT NULL,
  `type` varchar(30) NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `profile_img` varchar(100) NOT NULL,
  `user_type` int(11) NOT NULL,
  `avgmarks` int(10) NOT NULL,
  `status` int(1) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `loggedin` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `profile_img`, `user_type`, `avgmarks`, `status`, `created`, `modified`, `loggedin`) VALUES
(141, 'admin', 'admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'Screenshot (1).png', 1, 0, 1, '2019-02-20 19:03:19', '2019-02-20 18:38:41', '2019-02-20 19:03:19'),
(142, 'First', 'pahila', 'first@mail.com', '6ad14ba9986e3615423dfca256d04e3f', '2880423.png', 3, 79, 1, '2019-02-20 18:51:23', '2019-02-20 18:45:20', '2019-02-20 18:45:20'),
(143, 'ram', 'verma', 'rv@gmail.com', '6ad14ba9986e3615423dfca256d04e3f', 'pexels-photo-220453.jpeg', 3, 80, 1, '2019-02-20 18:51:24', '2019-02-20 18:46:30', '2019-02-20 18:46:30'),
(144, 'nitesh', 'maliye', 'nm@mail.com', '6ad14ba9986e3615423dfca256d04e3f', '2880423.png', 3, 77, 1, '2019-02-20 18:51:24', '2019-02-20 18:48:20', '2019-02-20 18:48:20'),
(145, 'nilesh ', 'raj', 'nr@mail.com', '6ad14ba9986e3615423dfca256d04e3f', '2880423.png', 3, 82, 1, '2019-02-20 18:51:25', '2019-02-20 18:49:10', '2019-02-20 18:49:10'),
(146, 'sajid', 'sheikh', 'sk@mail.com', '6ad14ba9986e3615423dfca256d04e3f', '2880423.png', 3, 86, 1, '2019-02-20 18:51:27', '2019-02-20 18:49:36', '2019-02-20 18:49:36'),
(147, 'nikhi;', 'pradhan', 'np@mail.com', 'ba5ef51294fea5cb4eadea5306f3ca3b', '2880423.png', 3, 92, 1, '2019-02-20 19:10:58', '2019-02-20 18:50:08', '2019-02-20 19:10:58'),
(148, 'rehan', 'pathan', 'rp@mail.com', 'ba5ef51294fea5cb4eadea5306f3ca3b', '2880423.png', 3, 93, 1, '2019-02-20 18:51:20', '2019-02-20 18:50:48', '2019-02-20 18:50:48'),
(149, 'kaustubh', 'somnathe', 'ks@mail.com', 'ba5ef51294fea5cb4eadea5306f3ca3b', 'pexels-photo-220453.jpeg', 2, 0, 1, '2019-02-20 18:54:25', '2019-02-20 18:53:05', '2019-02-20 18:53:05'),
(150, 'rajat', 'akhare', 'ra@mail.com', 'ba5ef51294fea5cb4eadea5306f3ca3b', 'pexels-photo-220453.jpeg', 2, 0, 1, '2019-02-20 19:11:40', '2019-02-20 18:53:36', '2019-02-20 19:11:40'),
(151, 'sahil', 'daronde', 'sd@mail.com', 'ba5ef51294fea5cb4eadea5306f3ca3b', '2880423.png', 3, 86, 1, '2019-02-20 19:12:12', '2019-02-20 18:55:57', '2019-02-20 19:12:12');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `video_id` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `location` varchar(500) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_allot`
--
ALTER TABLE `group_allot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_details`
--
ALTER TABLE `project_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_group`
--
ALTER TABLE `project_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_guides`
--
ALTER TABLE `project_guides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_uploads`
--
ALTER TABLE `project_uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_images`
--
ALTER TABLE `tbl_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_uploads`
--
ALTER TABLE `tbl_uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`video_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `group_allot`
--
ALTER TABLE `group_allot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `project_details`
--
ALTER TABLE `project_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `project_group`
--
ALTER TABLE `project_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=714;

--
-- AUTO_INCREMENT for table `project_guides`
--
ALTER TABLE `project_guides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_uploads`
--
ALTER TABLE `project_uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_images`
--
ALTER TABLE `tbl_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_uploads`
--
ALTER TABLE `tbl_uploads`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `video_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
