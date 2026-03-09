-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2026 at 09:34 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `7todo`
--

-- --------------------------------------------------------

--
-- Table structure for table `folders`
--

CREATE TABLE `folders` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(256) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `folders`
--

INSERT INTO `folders` (`id`, `name`, `user_id`, `created_at`) VALUES
(132, 'work', 84, '2026-01-07 22:54:08'),
(133, 'personal', 84, '2026-01-07 22:54:18'),
(134, 'activetys', 84, '2026-01-07 22:54:33'),
(136, 'ENG - lan', 84, '2026-01-07 22:55:01'),
(137, 'pro - lan', 84, '2026-01-07 22:55:11'),
(138, 'Network', 84, '2026-01-07 22:59:20'),
(155, 'activiteys', 84, '2026-01-08 01:12:08'),
(183, 'hoby', 84, '2026-01-08 19:12:22');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(512) CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `folder_id` int(11) NOT NULL,
  `is_don` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `user_id`, `folder_id`, `is_don`, `created_at`) VALUES
(38, 'homwork', 84, 132, 0, '2026-01-07 22:55:25'),
(39, 'wrriteng', 84, 132, 0, '2026-01-07 22:55:36'),
(40, 'topic', 84, 132, 1, '2026-01-07 22:55:42'),
(41, 'conversition', 84, 132, 0, '2026-01-07 22:55:57'),
(42, 'game', 84, 133, 0, '2026-01-07 22:56:07'),
(43, 'filme', 84, 133, 1, '2026-01-07 22:56:14'),
(44, 'internet', 84, 133, 0, '2026-01-07 22:56:22'),
(45, 'music', 84, 133, 0, '2026-01-07 22:56:34'),
(46, 'runing', 84, 134, 1, '2026-01-07 22:56:47'),
(47, 'take shower', 84, 134, 0, '2026-01-07 22:57:01'),
(48, 'football', 84, 134, 1, '2026-01-07 22:57:24'),
(49, 'creacit', 84, 134, 0, '2026-01-07 22:57:28'),
(50, 'firends funs', 84, 134, 0, '2026-01-07 22:57:42'),
(51, 'speaking', 84, 136, 0, '2026-01-07 22:58:05'),
(52, 'words', 84, 136, 0, '2026-01-07 22:58:14'),
(53, 'vidues', 84, 136, 1, '2026-01-07 22:58:29'),
(54, 'html', 84, 137, 1, '2026-01-07 22:58:39'),
(55, 'css', 84, 137, 1, '2026-01-07 22:58:41'),
(56, 'php', 84, 137, 0, '2026-01-07 22:58:45'),
(57, 'javaScript', 84, 137, 1, '2026-01-07 22:59:03'),
(58, 'bootstrap', 84, 137, 1, '2026-01-07 22:59:10'),
(59, 'network puse', 84, 138, 1, '2026-01-07 22:59:29'),
(60, 'ccna', 84, 138, 1, '2026-01-07 22:59:43'),
(61, 'ccnp', 84, 138, 0, '2026-01-07 22:59:55'),
(64, 'study at course', 84, 155, 1, '2026-01-08 01:13:02'),
(65, 'video', 84, 155, 0, '2026-01-08 01:13:13'),
(66, 'game', 84, 155, 0, '2026-01-08 01:13:45'),
(70, 'jhkhi', 0, 201, 1, '2026-01-10 23:56:11'),
(71, 'ssssss', 0, 202, 0, '2026-01-11 00:00:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(84, 'Z9-GPS', 'zamarodimatiullah@gmail.com', '$2y$10$GI5/220kyTgl2A0z0KY2HemVSaJpWGT.UUYxF45OawYpqh52azeoS', '2026-01-11 00:13:51'),
(88, 'matiullah', 'a@gmail.com', '$2y$10$fl8SQkU4SbZrzZEdo9A/HePtnGl0CMvJoyccWdWh8OR9ILD0m9nUu', '2026-01-11 00:28:20'),
(89, 'matiullah', 'a@gmail.com', '$2y$10$Qii4nROTPpndX6MblvVfGOTFmOQNXWSSKNqOynP4FkonM3KwfVSuu', '2026-01-11 00:31:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `folders`
--
ALTER TABLE `folders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid_fk` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `folders`
--
ALTER TABLE `folders`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
