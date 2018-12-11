-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 11, 2018 at 08:23 PM
-- Server version: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_socialtren`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `kd_comment` int(11) NOT NULL,
  `kd_user` int(11) NOT NULL,
  `body_comment` text NOT NULL,
  `kd_post` int(11) NOT NULL,
  `is_reported` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`kd_comment`, `kd_user`, `body_comment`, `kd_post`, `is_reported`, `created_at`, `updated_at`, `deleted_at`, `is_deleted`) VALUES
(1, 2, 'Wow~ I Like it', 1, 0, '2018-12-01 14:22:17', '2018-12-02 04:41:44', NULL, 0),
(2, 4, 'Salam kenal Ya~', 2, 0, '2018-12-01 14:27:13', '2018-12-01 14:27:13', NULL, 0),
(3, 5, 'Wahh cantik yaa', 3, 0, '2018-12-01 14:29:29', '2018-12-01 14:29:29', NULL, 0),
(4, 3, 'iyaaa', 2, 1, '2018-12-01 14:30:01', '2018-12-05 03:38:33', '2018-12-02 05:10:34', 1),
(5, 4, 'Samaaa xD', 5, 0, '2018-12-01 14:49:33', '2018-12-02 04:41:50', NULL, 0),
(6, 6, 'sayang', 4, 0, '2018-12-03 02:18:03', '2018-12-03 02:18:03', NULL, 0),
(7, 6, 'saya cinta pak yan', 9, 0, '2018-12-03 02:20:56', '2018-12-03 02:20:56', NULL, 0),
(8, 7, 'harrrrrrrrr', 9, 0, '2018-12-03 05:18:21', '2018-12-03 05:18:21', NULL, 0),
(9, 3, 'tess', 11, 0, '2018-12-05 02:09:19', '2018-12-05 02:09:19', NULL, 0),
(10, 1, 'lapo', 12, 0, '2018-12-05 02:20:34', '2018-12-05 02:20:34', NULL, 0),
(11, 10, 'iyoo', 5, 0, '2018-12-05 02:23:41', '2018-12-05 02:23:41', NULL, 0),
(12, 3, 'Hi cantiekkk', 16, 0, '2018-12-05 05:52:01', '2018-12-05 05:52:01', NULL, 0),
(13, 14, 'kskskskskks', 16, 0, '2018-12-05 05:52:30', '2018-12-05 05:52:30', NULL, 0),
(14, 15, 'halooo', 17, 0, '2018-12-05 13:39:32', '2018-12-05 13:39:32', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `kd_user_followed` int(11) NOT NULL,
  `kd_user_following` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `followers`
--

INSERT INTO `followers` (`kd_user_followed`, `kd_user_following`) VALUES
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(3, 1),
(3, 2),
(3, 4),
(3, 5),
(3, 6),
(3, 10),
(3, 15),
(3, 16),
(4, 2),
(4, 3),
(4, 5),
(4, 8),
(5, 3),
(5, 10),
(5, 14),
(6, 3),
(6, 7),
(6, 9),
(7, 8),
(9, 3),
(9, 15),
(10, 3),
(14, 3);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `kd_post` int(11) NOT NULL,
  `kd_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`kd_post`, `kd_user`) VALUES
(1, 2),
(1, 3),
(2, 3),
(2, 4),
(3, 3),
(3, 5),
(4, 2),
(4, 3),
(4, 6),
(5, 4),
(5, 10),
(6, 5),
(9, 6),
(11, 3),
(16, 3),
(16, 14),
(17, 15);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `kd_post` int(11) NOT NULL,
  `body` text NOT NULL,
  `photo` text,
  `is_reported` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `kd_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`kd_post`, `body`, `photo`, `is_reported`, `created_at`, `updated_at`, `deleted_at`, `is_deleted`, `kd_user`) VALUES
(1, 'Wallpaper ku~', '2018-12-01 21:21:18_wp1964824.png', 1, '2018-12-01 14:21:18', '2018-12-05 03:38:52', '2018-12-02 04:41:40', 1, 3),
(2, 'Sepi nih', NULL, 0, '2018-12-01 14:25:22', '2018-12-02 04:35:54', NULL, 0, 2),
(3, 'Late post', '2018-12-01 21:28:51_Katya Lischina.png', 0, '2018-12-01 14:28:51', '2018-12-02 04:41:39', NULL, 0, 4),
(4, 'Wah zaman jahiliyah nih', '2018-12-01 21:45:15_Crush.jpg', 0, '2018-12-01 14:45:15', '2018-12-03 02:18:59', NULL, 0, 2),
(5, 'Gabut XD', NULL, 0, '2018-12-01 14:49:10', '2018-12-01 14:49:10', NULL, 0, 3),
(6, 'I have a crush', NULL, 1, '2018-12-02 04:42:29', '2018-12-05 03:39:00', '2018-12-02 05:10:23', 1, 3),
(9, 'tiada har tanpa ngoding', '2018-12-03 09:20:33_profile.png', 0, '2018-12-03 02:20:33', '2018-12-05 04:36:44', NULL, 0, 6),
(10, 'anaknya linda', '2018-12-03 12:17:24_xabiruu.png', 0, '2018-12-03 05:17:24', '2018-12-05 03:39:07', '2018-12-03 05:17:50', 1, 7),
(11, 'Hallo', NULL, 1, '2018-12-05 02:08:36', '2018-12-05 03:39:12', '2018-12-05 02:13:01', 1, 9),
(12, 'suwung', NULL, 0, '2018-12-05 02:20:06', '2018-12-05 02:20:06', NULL, 0, 1),
(13, 'Hello Again', NULL, 0, '2018-12-05 03:44:43', '2018-12-05 03:44:49', '2018-12-05 03:44:49', 1, 9),
(14, 'ijknhb', NULL, 0, '2018-12-05 05:31:38', '2018-12-05 05:31:38', NULL, 0, 14),
(15, 'ahaha', '2018-12-05 12:47:52_WhatsApp Image 2018-12-04 at 11.43.08 AM (1).jpeg', 0, '2018-12-05 05:47:52', '2018-12-05 05:47:52', NULL, 0, 3),
(16, ' m', '2018-12-05 12:51:06_IMG_20140927_163436.jpg', 0, '2018-12-05 05:51:06', '2018-12-06 13:57:59', NULL, 0, 14),
(17, 'sembarang', '2018-12-05 20:38:57_WhatsApp Image 2018-12-04 at 11.43.08 AM (1).jpeg', 0, '2018-12-05 13:38:58', '2018-12-05 13:38:58', NULL, 0, 15);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `kd_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `photo_profil` varchar(50) NOT NULL DEFAULT 'default-profile.png',
  `is_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`kd_user`, `username`, `password`, `first_name`, `last_name`, `photo_profil`, `is_admin`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Daffa', 'Akbar', 'default-profile.png', 1),
(2, 'duwiani', 'a2d13fe1cc0088ad9f4e11891ab128a0', 'Duwi', 'Ani', '2018-12-01 21:23:05_zDhuwiey.jpg', 0),
(3, 'daffaputradamar', 'ab4146260a837a5e478961199bc58d25', 'Daffa', 'Damarriyanto', '2018-12-01 21:21:48_wp1964824.png', 0),
(4, 'katyaaa', '6b3dbad99021ee09d3671128d251bf30', 'Katya', 'Lischina', '2018-12-01 21:26:31_Katya Lischina.jpg', 0),
(5, 'daffaganteng14', '6563ef9ba4a946f9bfe935e63f4438cb', 'Akbar', 'Daffa', 'default-profile.png', 0),
(6, 'krisnaw', '81dc9bdb52d04dc20036dbd8313ed055', 'krisna', 'widi', '2018-12-03 09:21:36_profile.png', 0),
(7, 'billa', '202cb962ac59075b964b07152d234b70', 'sinta ayu', 'sabilla', 'default-profile.png', 0),
(8, 'dodon', '202cb962ac59075b964b07152d234b70', 'danathan', 'donut', '2018-12-03 12:19:37_21.PNG', 0),
(9, 'akbardaffa', '430a9e5b5fa11a91669ddfe40c76e11e', 'Akbar', 'Daffa', 'default-profile.png', 0),
(10, 'chintyadewi', 'cbc64d3ebd5d04a08df78bc390b3530a', 'chintya', 'dewi', 'default-profile.png', 0),
(11, 'assa', '9987d22788e810116a45109f2ea88648', 'as', 'sa', 'default-profile.png', 0),
(12, 'adda', 'd40617172258939a57fdb5617724fc55', 'ad', 'da', 'default-profile.png', 0),
(13, 'testes', '6e7906b7fb3f8e1c6366c0910050e595', 'Tes', 'Tes', 'default-profile.png', 0),
(14, 'AldiFloyd', 'd6abe0fa83460ca820337f6db4fe3403', 'Aldi Ganteng', 'Sangat Ganteng', '2018-12-05 12:50:41_IMG_20140928_070146.jpg', 0),
(15, 'deby', '94169b553688da79735f4a4a1dd781c1', 'deby', 'silvia', 'default-profile.png', 0),
(16, 'mmdiyul', '9261a05105e8c28615ccccc00bc52b48', 'Muhammad Aliyul', 'Murtadlo', 'default-profile.png', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`kd_comment`),
  ADD KEY `kd_user` (`kd_user`),
  ADD KEY `kd_post` (`kd_post`);

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`kd_user_followed`,`kd_user_following`),
  ADD KEY `kd_user_followed` (`kd_user_followed`),
  ADD KEY `kd_user_following` (`kd_user_following`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`kd_post`,`kd_user`),
  ADD KEY `kd_post` (`kd_post`),
  ADD KEY `kd_user` (`kd_user`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`kd_post`),
  ADD KEY `kd_user` (`kd_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`kd_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `kd_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `kd_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `kd_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `followers`
--
ALTER TABLE `followers`
  ADD CONSTRAINT `kd_user_followed_fk` FOREIGN KEY (`kd_user_followed`) REFERENCES `users` (`kd_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kd_user_following_fk` FOREIGN KEY (`kd_user_following`) REFERENCES `users` (`kd_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `kd_post_fk` FOREIGN KEY (`kd_post`) REFERENCES `posts` (`kd_post`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kd_user_fk` FOREIGN KEY (`kd_user`) REFERENCES `users` (`kd_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `kd_users_fk_post` FOREIGN KEY (`kd_user`) REFERENCES `users` (`kd_user`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
