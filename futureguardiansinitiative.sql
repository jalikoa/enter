-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2024 at 12:34 PM
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
-- Database: `futureguardiansinitiative`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `content` varchar(100) NOT NULL,
  `bywho` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `country` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `email`, `name`, `message`, `country`, `created_at`) VALUES
(1, 'james@gmail.com', 'Calvince', 'Hey there I am in the moods', 'Uganda', '2024-11-28 18:06:47'),
(2, 'jef@gmail.com', 'ceojalsoft', 'Hey there I wanted to help please avail your contacts please', 'Kenya', '2024-11-28 18:08:41'),
(3, 'kariuki@gmail.com', 'Jefter Okoth', 'Hey hello can you people tell me the main aim why you came up with this project please', 'Uganda', '2024-11-28 18:10:19'),
(4, 'kariuki@gmail.com', 'Jefter Okoth', 'Hey hello can you people tell me the main aim why you came up with this project please', 'Uganda', '2024-11-28 18:10:25'),
(5, 'kariuki@gmail.com', 'Jefter Okoth', 'Hey hello can you people tell me the main aim why you came up with this project please', 'Uganda', '2024-11-28 18:14:24'),
(6, 'kariuki@gmail.com', 'Jefter Okoth', 'Hey hello can you people tell me the main aim why you came up with this project please', 'Uganda', '2024-11-28 18:17:29'),
(7, 'kariuki@gmail.com', 'Jefter Okoth', 'Hey hello can you people tell me the main aim why you came up with this project please', 'Uganda', '2024-11-29 03:54:28'),
(8, 't313jalikoa@jalsoft.com', 'Calvince Owino Jalikoa', 'Hey there I am hungry bros save me I am starving', 'America', '2024-11-29 06:03:26'),
(9, 'jef@gmail.com', 'Jefter Okoth', 'hey you stupid fellow what is up with you why dont you boost your security', 'America', '2024-11-29 06:53:26'),
(10, 'jalsoft@jalsoft.com', 'ceojalsoft', 'hey there my bro what is up it is like I am getting stranded on how I can make the best of the guys can you now help m in the \ne on how I can make the boys better please and then note that I am a software engineer and I need employment so please tell me on what should I do next please so that I can secure your heart please and if you think I am not in the moods please just feel like giving up for the guy in the room please so the rest of the things are not the best', 'Kenya', '2024-11-29 07:29:02'),
(11, 'sharone234@gmail.com', 'Calvince Owino', 'ggggggggg', 'Slovakia', '2024-11-29 09:15:41'),
(12, 'parvel@gmail.com', 'parvelous', 'Hey hello fellows I am happy to inform you that the best guy is this man who is very stupid in real scence so please make him very tired please and all will be fine man', 'Eritrea', '2024-11-29 12:35:20'),
(13, 'sharone234@gmail.com', 'Calvince Owino', 'hey I am happy tonight and be informed that I am happy for you', 'Slovakia', '2024-11-29 14:29:09'),
(14, 'jef@gmail.com', 'tle/6291/25', 'Hey I am happy to be here help me get the right one for me please', 'Burundi', '2024-11-30 04:31:19'),
(15, 'jef@gmail.com', 'tle/6291/25', 'Hey I am happy to be here help me get the right one for me please', 'Burundi', '2024-11-30 04:31:42'),
(16, 'sharone234@gmail.com', 'Calvince Owino', 'empty() ||', 'Slovakia', '2024-11-30 10:38:02'),
(17, 'jef@gmail.com', 'Jefter Okoth', 'Hey there bros can you help me on how I can get started on this please like how I can make manure online please', 'Kenya', '2024-11-30 13:46:41'),
(18, 'sharon234@gmail.com', 'Jefter Okoth', 'Hey helpe me here I am stranded small please', 'Kenya', '2024-11-30 13:47:21'),
(19, 'sharone234@gmail.com', 'Calvince Owino', 'now please can you tell me if this Raspberry Pi Zero 2 W will be enough for the development of the drone please that is autonomous and has the ability to interact with the environment in real time please that is to process the images arround please and avoid collition please and then can you tell me if I can add some external storage for the storage of the codes please and then tell me that does it have buit in wifi please so that I can make use of gps to know the location please then to add please more on the autonomic ability you know more than I do so please assist here please', 'Slovakia', '2024-12-08 03:23:48');

-- --------------------------------------------------------

--
-- Table structure for table `discussions`
--

CREATE TABLE `discussions` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `admin` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `about` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `whomess` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dissmembers`
--

CREATE TABLE `dissmembers` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `discussion_id` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `typing` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `country` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `registered_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender` varchar(100) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `discussion` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `reply_to` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `bywho` varchar(100) NOT NULL,
  `ratings` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `country` varchar(50) NOT NULL,
  `bio` varchar(100) NOT NULL,
  `last_seen` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `fblink` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `otp` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `registered_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `phone`, `email`, `country`, `bio`, `last_seen`, `status`, `role`, `fblink`, `image`, `otp`, `password`, `registered_at`) VALUES
(1, 'Calvince', 'Owino', 'LK-1111', '0799311413', 'calvo@gmail.com', 'Kenya', 'I am an engineer', '2024-11-30 12:29:48', '0', '1', 'http://localhost/fgi/public/register.html', '', '7827', '$2y$10$FYCr5G5jL5z.Zf0wqRL0Je7ijmHwzgJHnTJ84WfsomTZXq.ZKoW.O', '2024-11-28 13:11:27'),
(3, 'Calvince', 'Owino', 'ceojalsoft', '0702821801', 'calv@gmail.com', 'Kenya', 'I am an engineer', '2024-11-30 12:18:36', '0', '1', 'http://localhost/fgi/public/register.html', '', '7315', '$2y$10$ksiMGM3.7i6c9DHIRCf.FeRubqUHTPoJMp4lc9JK84vy0oiGiO86a', '2024-11-28 13:24:12'),
(4, 'Henry', 'Omboga', 'cemrush', '0700234567', 'alfred@gmail.com', 'Kenya', '09ue8du', '2024-11-30 12:18:36', '0', '1', 'http://localhost/phpmyadmin/index.php?route=/sql&amp;pos=0&amp;db=futureguardiansinitiative&amp;tabl', '', '8543', '$2y$10$WyoshFy9dOia89MXnCE6M.iiYQ0n3GdbrRQ6Vmw2eYB8dwxjBeY6i', '2024-11-28 13:29:18'),
(5, 'Sharon', 'Aoko', 'sharoneee', '0789234543', 'sharon234@gmail.com', 'Kenya', 'I am a designer', '2024-12-08 05:02:11', '2', '1', 'https://wa.me/xsdzq49vntzqcxyr', '', '9413', '$2y$10$bw681ectN300uJeyeZziLusGKdmsjuBQ.DR1ATgeCt8Q9BwuYV8Xi', '2024-11-29 03:53:59'),
(6, 'Jalsoft', 'Ceo', 'hans', '0745698712', 't313jalikoa@gmail.com', 'Kenya', 'ceojalsoft', '2024-12-08 08:52:56', '1', '1', 'http://localhost/fgi/public/register.html', '', '5353', '$2y$10$rXeMuyfLq7TjGE9dG9LzmuNToh7my90yRi87v7HaUe6kKOb33IRDO', '2024-11-29 04:12:43'),
(8, 'Henry', 'Peters', 'hepeters', '0714192260', 'peters@gmail.com', 'Egypt', 'I am a philanthropist', '2024-11-30 12:18:36', '0', '1', 'https://wa.me/xsdzq49vntzqcxyr', '', '9976', '$2y$10$pvw42j8PQcScS0J/Is.qwel.kH9N971r5m3pwKLzZPpl16R4/n0Oa', '2024-11-29 07:13:31'),
(9, 'Peter', 'Oloo', 'ceojalsoft', '08345768908', 'd34cal8vo@gmail.com', 'Kenya', 'I am a teacher', '2024-11-30 12:18:36', '0', '1', 'https://wa.me/xsdzq49vntzqcxyr', '', '8429', '$2y$10$R9Q6B/kLamaeWRp6hCtoUem5a1.dSVMNm8pb1HOMpX0CPMU4ESkHC', '2024-11-29 09:45:17'),
(10, 'Peter', 'Oloo', 'ceojalsoft', '0834576898', 'd34calo@gmail.com', 'Kenya', 'I am a teacher', '2024-11-30 12:18:36', '0', '1', 'https://wa.me/xsdzq49vntzqcxyr', '', '8975', '$2y$10$BUoP945fcX1rd2TkFTY3deSR2raCwntKvD6DqeUnVjj6stMmnyYlO', '2024-11-29 09:46:07'),
(11, 'Peter', 'Oloo', 'ceojalsoft', '083457698', 'd3calo@gmail.com', 'Kenya', 'I am a teacher', '2024-11-30 12:18:36', '1', '1', 'https://wa.me/xsdzq49vntzqcxyr', '', '8229', '$2y$10$O0hu4sC/Ornh8jq08JtbzOWz5nZ0KsVsABqJXCI0y9mwNfOonppOW', '2024-11-29 09:47:09'),
(12, 'Parvel', 'Teea', 'parvelous', '0789665535', 'parvel@gmail.com', 'Kenya', 'I am a dreams girl', '2024-12-08 08:46:51', '1', '1', 'http://localhost/fgi/public/register.html', '', '2676', '$2y$10$C5DAgCtK0H.673jgF0WgS.xzjPjgj5q7nAJ2AGAS8/dweqaaaU6FK', '2024-11-29 10:06:53'),
(13, 'Harry', 'Thuku', 'thurue', '0714192298', 'thuku@gmail.com', 'Austria', 'I am a footballer in Kenya', '2024-11-30 15:53:56', '1', '1', 'https://thuku.github.io/jalikoa/', '', '8699', '$2y$10$nC5bi/6NVaXY2rMer7N7jeZvlT87tGUon9nIWCtyZtzK.aNx5mXiS', '2024-11-29 10:39:04'),
(14, 'Henrik', 'Opiyo', 'opis', '0986706757', 'opiyo@gmail.com', 'China', 'A Software Engineer', '2024-11-30 13:30:44', '1', '1', 'https://jemo.buy', '', '5947', '$2y$10$VNClPlIpUwnd3LQZDRlsc.fTQGAnHPCb75jPfaKjq1qQ2foWcHBGq', '2024-11-29 12:40:31'),
(15, 'Jack', 'Owino', 'jalsoft', '0789456765', 'jack@gmail.com', 'Malawi', 'A Software Engineer', '2024-11-30 12:18:36', '1', '1', 'https://jemo.buy.niko', '', '2555', '$2y$10$0k38Bep/5s3//YFlhbPf.e4jx3PJqm.RhX2senDqRhxPGP7lrfOxS', '2024-11-29 14:31:56'),
(16, 'T-Gun', 'Aoko', 'tgungoon', '0798765432', 'tgun@gmail.com', 'Kenya', 'I am at home', '2024-11-30 12:18:36', '1', '1', 'https://tgungoon.io', '', '8615', '$2y$10$1VVSzUiDQNDxuKJFtT41q.hsK61tuwer0irrBAdHcgwTQvwZFl2MG', '2024-11-30 06:17:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discussions`
--
ALTER TABLE `discussions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `dissmembers`
--
ALTER TABLE `dissmembers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `discussions`
--
ALTER TABLE `discussions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dissmembers`
--
ALTER TABLE `dissmembers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
