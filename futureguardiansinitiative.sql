-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2025 at 01:01 PM
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
(19, 'sharone234@gmail.com', 'Calvince Owino', 'now please can you tell me if this Raspberry Pi Zero 2 W will be enough for the development of the drone please that is autonomous and has the ability to interact with the environment in real time please that is to process the images arround please and avoid collition please and then can you tell me if I can add some external storage for the storage of the codes please and then tell me that does it have buit in wifi please so that I can make use of gps to know the location please then to add please more on the autonomic ability you know more than I do so please assist here please', 'Slovakia', '2024-12-08 03:23:48'),
(20, 'michaelwanjala@gmail.com', 'Michael Wanjala', 'Hey there I need you to pick some waste arround', 'Kenya', '2024-12-11 16:23:04'),
(21, 'michaelwanjala@gmail.com', 'Michael Wanjala', 'Hey there I need you to pick some waste arround', 'Kenya', '2024-12-11 16:24:25'),
(22, 'kioko@gmail.com', 'Daniel Kioko', 'Hey there please help me here I ahve some wastes arround', 'Kenya', '2024-12-13 17:03:02'),
(23, 'kioko@gmail.com', 'Daniel Kioko', 'Hey there please assist me help the environment', 'Kenya', '2024-12-13 17:06:59'),
(24, 'kioko@gmail.com', 'James Kioko', 'Hey there please help me here I am in need of making sth from my wastes at home', 'Kenya', '2024-12-14 05:07:40'),
(25, 'kioko@gmail.com', 'James Kioko', 'Hey there please help me here I am in need of making sth from my wastes at home', 'Kenya', '2024-12-14 05:08:02'),
(26, 'tle@gmail.com', 'tle/6291/25', 'Hey there please help me on how I can make the fertilizers from my kicthen refuse', 'Kenya', '2024-12-14 05:12:55'),
(27, 'tillen@gmail.com', 'James tillen', 'Hey there I am here to seek for sth like an advice', 'Ukraine', '2024-12-14 05:28:50'),
(28, 'tillen@gmail.com', 'James tillen', 'Hey there I am here to seek for sth like an advice', 'Ukraine', '2024-12-14 05:29:05'),
(29, 'LK-1111@gmail.com', 'ceojalsoft', 'Hey hello I am intrested in being one of the members', 'Austria', '2024-12-14 05:34:09'),
(30, 'murimi@gmail.com', 'James Murimi', 'Hey there just passing a greeting', 'Kenya', '2024-12-14 11:44:38'),
(31, 'sharon234@gmail.com', 'ceojalsoft', 'hey hello', 'Kenya', '2024-12-17 16:33:24'),
(32, 'murimi@gmail.com', 'James Murimi', 'Hey there please get this It is like I want to be the best in this field please can you help me on how I can make them feel that I am the best please It', 'Kenya', '2024-12-18 06:23:51'),
(33, 'sharon234@gmail.com', 'ceojalsoft', '&lt;script&gt;alert(&#039;XSS!&#039;);&lt;/script&gt;', 'Kenya', '2024-12-18 06:30:44'),
(34, 'sharon234@gmail.com', 'ceojalsoft', 'Hey hello there I am fine and you', 'Kenya', '2024-12-18 06:32:04'),
(35, 'sharon234@gmail.com', 'ceojalsoft', '&#039;; DROP TABLE users;--', 'Kenya', '2024-12-18 06:34:05'),
(36, 'sharon234@gmail.com', 'ceojalsoft', 'jjjjjjjjjj', 'Kenya', '2024-12-19 20:19:08'),
(37, 'parvel@gmail.com', 'ceojalsoft', 'Hey there pleasae can you help me get my account back to nomal please the account tell me that I am blocked by the admin please can you help me on how I can do this please', 'Uganda', '2024-12-22 11:55:15'),
(38, 'thui$@gmail.com', 'Calvince Owino Jalikoa Owaga Akoth', 'hey hello help me get a job please in here', 'Egypt', '2024-12-24 14:43:58'),
(39, 'sharon234@gmail.com', 'Jefter Okoth', 'Hey hello there my fellow members I ma here and it is like I am the man in the room please can you please help me here on how I can make the best of the things please and get to be detailed obn this please', 'Kenya', '2025-01-12 07:27:42'),
(40, 't313jalikoa@gmail.com', 'Calvince Owino Jalikoa', 'hey there fellow men can you please help me here on how I can make the men in the room to feel like I am the man in the main room please tell them all the best please', 'Kenya', '2025-01-16 08:53:34'),
(41, 't313jalikoa@gmail.com', 'ceojalsoft', 'hey I am here please and  I am like I need your help can you please help me in this please', 'Kenya', '2025-01-16 09:02:56'),
(42, 'dsijfidsoi@jka.com', 'dwjlhfodsh', 'Hey tehree', 'Kenya', '2025-01-16 09:14:55'),
(43, 'sharon234@gmail.com', 'Michael', 'Mafu', 'Jamaica', '2025-01-16 09:56:08'),
(44, 'sharon234@gmail.com', 'Michael', 'Hey men what is up', 'Jamaica', '2025-01-16 09:56:57');

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

--
-- Dumping data for table `discussions`
--

INSERT INTO `discussions` (`id`, `name`, `admin`, `image`, `about`, `type`, `whomess`, `created_at`) VALUES
(1, 'Jalsoft', '19', 'jalikoa.jpg', 'The discussion forum for the best of people with some knowledge in the environment', '0', '0', '2024-12-20 13:03:52'),
(2, 'Michieko', '6', 'hehehe.jpg', 'This is the discsussion forum that has stayed for months', '0', '0', '2024-12-20 13:05:36');

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

--
-- Dumping data for table `dissmembers`
--

INSERT INTO `dissmembers` (`id`, `user_id`, `discussion_id`, `role`, `typing`, `created_at`) VALUES
(1, '19', '1', '0', '2025-01-16 11:02:09', '2024-12-20 18:25:15'),
(2, '18', '1', '1', '2024-12-20 18:26:09', '2024-12-20 18:26:09'),
(3, '18', '2', '1', '2024-12-20 18:26:30', '2024-12-20 18:26:30'),
(4, '16', '2', '1', '2024-12-20 18:27:06', '2024-12-20 18:27:06'),
(5, '13', '1', '0', '2025-01-16 11:32:01', '2024-12-22 08:05:38'),
(6, '11', '1', '1', '2024-12-22 12:37:07', '2024-12-22 11:40:51'),
(7, '17', '1', '1', '2025-01-16 11:30:09', '2025-01-16 11:15:59');

-- --------------------------------------------------------

--
-- Table structure for table `jalikoa`
--

CREATE TABLE `jalikoa` (
  `id` int(11) NOT NULL
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

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `email`, `phone`, `country`, `role`, `registered_at`) VALUES
(1, 'James Kariuki', 'kariuki@gmail.com', '0799311413', 'Kenya', 'assischair', '2024-12-18 12:58:40'),
(2, 'Calvince Owino', 't313jalikoa@gmail.com', '+254798989878', 'Kenya', 'secretary', '2024-12-18 13:24:19'),
(3, 'Clintone', 'clintone@gmail.com', '0723767599', 'Austria', 'member', '2024-12-18 14:04:34'),
(4, 'Henry Peter', 'peter@gmail.com', '0712345678', 'Austia', 'member', '2024-12-18 14:30:23'),
(5, 'Henry Peter', 'peters@gmail.com', '0712345677', 'Austia', 'member', '2024-12-18 14:30:35'),
(6, 'Henry Peter', 'peters2@gmail.com', '0712345688', 'Austia', 'member', '2024-12-18 14:31:05'),
(7, 'CEO Jalsoft', 'ceojalsoft@gmail.com', '0712345666', 'Uganda', 'itsupport', '2024-12-18 14:31:46'),
(8, 'CEO Jalsoft', 'ceojalsof1t@gmail.com', '0712345660', 'Uganda', 'itsupport', '2024-12-18 14:32:04'),
(9, 'James Maini', 'maini@gmail.com', '+234799311413', 'Egypt', 'treasurer', '2024-12-18 14:58:09'),
(10, 'Jiko Omondi', 'jiko@gmail.com', '+204799311413', 'Nigeria', 'secretary', '2024-12-18 14:59:09'),
(11, 'Job Nyachia', 'nyachia@gmail.com', '+204799311090', 'Eritrea', 'chair', '2024-12-18 14:59:57'),
(12, 'Nancy Chore', 'chore@gmail.com', '+204799308090', 'South America', 'member', '2024-12-18 15:01:01'),
(13, 'Ouru Austine', 'ouru@gmail.com', '+204799308980', 'Canada', 'assischair', '2024-12-18 15:02:13'),
(14, 'Agustine Eto', 'agusi@gmail.com', '+204799768980', 'Argentina', 'treasurer', '2024-12-18 15:02:58'),
(15, 'Jalikoa Owaga Akoth', 'owagaakoth@gmail.com', '+34 929103442', 'France', 'secretary', '2024-12-18 15:04:22'),
(16, 'Otiende Kalulu', 'kalulu@gmail.com', '+254 789665623', 'Kenya', 'member', '2024-12-18 15:04:59'),
(17, 'Momanyi Elvince', 'momanyi@gmail.com', '0788988989', 'America', 'assischair', '2024-12-24 13:13:16');

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

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender`, `message`, `discussion`, `type`, `reply_to`, `created_at`) VALUES
(1, '19', 'Hey in here please can someone help on how I can manage the db please', '1', '0', '0', '2024-12-20 18:55:02'),
(2, '18', 'woza', '1', '0', '0', '2024-12-20 18:55:02'),
(3, '7', 'hello morning everyone', '1', '0', '0', '2024-12-20 18:55:02'),
(4, '16', 'Tuache ujinga', '1', '0', '0', '2024-12-20 18:55:02'),
(5, '19', 'Stupid fellos', '2', '0', '0', '2024-12-20 18:55:02'),
(6, '19', 'Tired with life help', '1', '0', '0', '2024-12-20 18:55:02'),
(7, '6', 'Bros let us help each other not good to leave sb sleeping', '1', '0', '0', '2024-12-20 18:55:02'),
(8, '20', 'Who can help me settle on programming please', '1', '0', '0', '2024-12-20 18:55:02'),
(9, '17', 'Mkoje wakuu', '1', '0', '0', '2024-12-20 18:55:02'),
(10, '10', 'Hey in here', '1', '0', '0', '2024-12-20 18:55:02'),
(11, '13', 'Hey there fellow I am like trying to make the guys to feel that I am in the top of the moods now you know please can you tell me on How I can make the best please then tell the guys that I am in the moods please and then tell the guys that please I am like the man in the bible that I can not even take the time to think of the main thing that I should be doing please and then can you now please tell me the man in the room that I am in the right house please and then tell them that I am in the main thing please and then tell them that as weel I need more security please and then as well please tell me the main thing that you think I can do pleasae in the main process please', '1', '0', '0', '2024-12-22 09:56:55'),
(12, '13', 'hey in here pleasae can someone give me a hint please', '1', '0', '0', '2024-12-22 10:05:58'),
(13, '11', 'Hey in here pleasea can you tell me on how I can learn the process of making the compost heaps please from nothing please on the kitchen refuse please and then please make sure that you be very detailed please', '1', '0', '0', '2024-12-22 11:42:27'),
(14, '13', 'Yes It is quite funny you know I do not think that it is possible to generate all this from nothing think that we must always use sth that is quite organic you know but let us try to make one from nothing and then see if it will work anyone who is willing to help please to intercept', '1', '0', '0', '2024-12-22 11:47:03'),
(15, '13', 'oooh by the way where did you get this idea from if I would just ask but not get angry with me please', '1', '0', '0', '2024-12-22 12:18:52'),
(16, '11', 'Which type of question if that you are trying to ask go as your mother stupid', '1', '0', '0', '2024-12-22 12:19:36'),
(17, '13', 'No I haf no bad intension any way is I offenced you please forget mmmh', '1', '0', '0', '2024-12-22 12:20:12'),
(18, '13', 'Hi anyone online who can get me there', '1', '0', '0', '2024-12-22 12:35:44'),
(19, '13', 'hello', '1', '0', '0', '2024-12-22 12:36:04'),
(20, '13', 'hello \nbros', '1', '0', '0', '2024-12-22 12:36:14'),
(21, '11', 'Yes what is up', '1', '0', '0', '2024-12-22 12:36:54'),
(22, '11', 'we are online like shit now tell what is up', '1', '0', '0', '2024-12-22 12:37:09'),
(23, '19', 'hey hello my niggers what is up on your side guys', '1', '0', '0', '2024-12-26 10:30:39'),
(24, '13', 'Nothing fello may be you tell us on your side bro', '1', '0', '0', '2024-12-26 10:31:34'),
(25, '19', 'like this side too there is nothing up fellows just chilling', '1', '0', '0', '2024-12-26 10:32:27'),
(26, '19', 'hey man mi niko sawa huku na wewe jeh', '1', '0', '0', '2024-12-26 10:37:59'),
(27, '13', 'mi pia niko best man nipeko mazuri', '1', '0', '0', '2024-12-26 10:38:35'),
(28, '19', 'Hey fellows I am in the room like the others please can you help me on how I can get started on the main thing please all the best my guys in this festive season', '1', '0', '0', '2024-12-26 10:48:16'),
(29, '13', 'Now what is that can you tell me like yesterday you were not online like to tell us all this shiet man', '1', '0', '0', '2024-12-26 10:49:21'),
(30, '19', 'Haaaa the room is now like flooded with laughter fellos so humurous fellows', '1', '0', '0', '2024-12-26 10:53:40'),
(31, '19', 'hey there can you now please tell me the main thing that has made you like to make this message please that you have made now you know this festive season is not the best as I thought it would be', '1', '0', '0', '2024-12-26 14:05:49'),
(32, '13', 'hey man nani ako best anisave na hela man niko vibaya huku please I only need money', '1', '0', '0', '2025-01-16 10:17:23'),
(33, '13', 'hey what is the way forward can someone help me on how I can make the men in the room to know more on the real time messaging please', '1', '0', '0', '2025-01-16 11:03:59'),
(34, '17', 'hello there', '1', '0', '0', '2025-01-16 11:17:16'),
(35, '17', 'How is going Mr Jalikoa✌️', '1', '0', '0', '2025-01-16 11:20:43'),
(36, '13', 'I am going well and you man', '1', '0', '0', '2025-01-16 11:21:51'),
(37, '13', 'now can you tell me what is up on your side man here there is nothing popping man', '1', '0', '0', '2025-01-16 11:22:16'),
(38, '17', 'I&#039;m also good man', '1', '0', '0', '2025-01-16 11:22:27'),
(39, '17', 'wow man ,im receiving the messages in the real time', '1', '0', '0', '2025-01-16 11:22:51'),
(40, '17', 'everthing is working perperfect  here', '1', '0', '0', '2025-01-16 11:23:19'),
(41, '13', 'great man that is nice man I can as well send you the messages in real time man', '1', '0', '0', '2025-01-16 11:24:28'),
(42, '13', 'it is great that it is working man', '1', '0', '0', '2025-01-16 11:24:47'),
(43, '17', 'Thats awesome  bro', '1', '0', '0', '2025-01-16 11:24:49'),
(44, '13', 'great man it is true this works man the only thing that is remaining is to update the ui man to make it more professional man', '1', '0', '0', '2025-01-16 11:25:26'),
(45, '13', 'then you have to know that all the meta information are captured man as you type this is updated in the database man then as well you onine status is updated in the database man so the only thing that is remaining is to make this to appear in the ui man', '1', '0', '0', '2025-01-16 11:26:39'),
(46, '17', 'yeah man ,if possible  we can implement  a voice note recording feature', '1', '0', '0', '2025-01-16 11:27:06'),
(47, '13', 'so you can see man how far I have gone with this man you think we can make it better together man', '1', '0', '0', '2025-01-16 11:27:16'),
(48, '13', 'yes man voice note and file sharing man', '1', '0', '0', '2025-01-16 11:27:33'),
(49, '13', 'all can be added man and more you can check the data that comes from the database man about the user in the console man', '1', '0', '0', '2025-01-16 11:28:12'),
(50, '17', 'yeah man i can see from the console', '1', '0', '0', '2025-01-16 11:29:33'),
(51, '17', 'and we can also add a  feature for sharing  file or images', '1', '0', '0', '2025-01-16 11:30:13'),
(52, '13', 'yes man I think you can see even the time the message was sent is in the json data man that is passed from the server man', '1', '0', '0', '2025-01-16 11:31:40'),
(53, '13', 'so collaboratedly man we can manage this man', '1', '0', '0', '2025-01-16 11:32:05');

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
(8, 'Henry', 'Peters', 'hepeters', '0714192260', 'peters@gmail.com', 'Egypt', 'I am a philanthropist', '2024-11-30 12:18:36', '0', '1', 'https://wa.me/xsdzq49vntzqcxyr', '', '9976', '$2y$10$pvw42j8PQcScS0J/Is.qwel.kH9N971r5m3pwKLzZPpl16R4/n0Oa', '2024-11-29 07:13:31'),
(9, 'Peter', 'Oloo', 'ceojalsoft', '08345768908', 'd34cal8vo@gmail.com', 'Kenya', 'I am a teacher', '2024-11-30 12:18:36', '0', '1', 'https://wa.me/xsdzq49vntzqcxyr', '', '8429', '$2y$10$R9Q6B/kLamaeWRp6hCtoUem5a1.dSVMNm8pb1HOMpX0CPMU4ESkHC', '2024-11-29 09:45:17'),
(10, 'Peter', 'Oloo', 'ceojalsoft', '0834576898', 'd34calo@gmail.com', 'Kenya', 'I am a teacher', '2024-11-30 12:18:36', '0', '1', 'https://wa.me/xsdzq49vntzqcxyr', '', '8975', '$2y$10$BUoP945fcX1rd2TkFTY3deSR2raCwntKvD6DqeUnVjj6stMmnyYlO', '2024-11-29 09:46:07'),
(11, 'Peter', 'Oloo', 'ceojalsoft', '083457698', 'd3calo@gmail.com', 'Kenya', 'I am a teacher', '2024-12-22 12:15:49', '1', '1', 'https://wa.me/xsdzq49vntzqcxyr', '', '8229', '$2y$10$O0hu4sC/Ornh8jq08JtbzOWz5nZ0KsVsABqJXCI0y9mwNfOonppOW', '2024-11-29 09:47:09'),
(12, 'Parvel', 'Teea', 'parvelous', '0789665535', 'parvel@gmail.com', 'Kenya', 'I am a dreams girl', '2024-12-19 06:10:49', '1', '0', 'http://localhost/fgi/public/register.html', '', '2676', '$2y$10$C5DAgCtK0H.673jgF0WgS.xzjPjgj5q7nAJ2AGAS8/dweqaaaU6FK', '2024-11-29 10:06:53'),
(13, 'Harry', 'Thuku', 'Hansjalikoa', '0714192298', 'thuku@gmail.com', 'Austria', 'I am a footballer in Kenya', '2025-01-16 10:25:36', '1', '1', 'https://thuku.github.io/jalikoa/', '', '8699', '$2y$10$nC5bi/6NVaXY2rMer7N7jeZvlT87tGUon9nIWCtyZtzK.aNx5mXiS', '2024-11-29 10:39:04'),
(14, 'Henrik', 'Opiyo', 'opis', '0986706757', 'opiyo@gmail.com', 'China', 'A Software Engineer', '2024-11-30 13:30:44', '1', '1', 'https://jemo.buy', '', '5947', '$2y$10$VNClPlIpUwnd3LQZDRlsc.fTQGAnHPCb75jPfaKjq1qQ2foWcHBGq', '2024-11-29 12:40:31'),
(15, 'Jack', 'Owino', 'jalsoft', '0789456765', 'jack@gmail.com', 'Malawi', 'A Software Engineer', '2024-11-30 12:18:36', '1', '1', 'https://jemo.buy.niko', '', '2555', '$2y$10$0k38Bep/5s3//YFlhbPf.e4jx3PJqm.RhX2senDqRhxPGP7lrfOxS', '2024-11-29 14:31:56'),
(16, 'T-Gun', 'Aoko', 'tgungoon', '0798765432', 'tgun@gmail.com', 'Kenya', 'I am at home', '2024-11-30 12:18:36', '1', '1', 'https://tgungoon.io', '', '8615', '$2y$10$1VVSzUiDQNDxuKJFtT41q.hsK61tuwer0irrBAdHcgwTQvwZFl2MG', '2024-11-30 06:17:17'),
(17, 'James', 'Kioko', 'jameskioko', '0799314987', 'kioko@gmail.com', 'Kenya', 'I am a mechanical Engineer', '2025-01-16 11:36:46', '1', '1', 'https://tgungoon.io', '', '4582', '$2y$10$GiEylRQU6lXSDQrrFaO7uO73/E9134z3dNHDv66nsfHXEcmdl96i2', '2024-12-13 13:50:07'),
(18, 'Daniel', 'Kioko', 'kiokoDaniell', '0789898989', 'kioko1@gmail.com', 'Kenya', 'I am an engineer', '2024-12-13 19:52:30', '1', '1', 'https://wa.mee/xsdzq49vntzqcxyr', '', '8315', '$2y$10$5ngdNj/d4Ab557mB1a824u12lK6CVNBx/J/LNDrE/jmF4SzBTBdEe', '2024-12-13 17:04:32'),
(19, 'James', 'Kioko', 'jameskioko', '0798899889', 'james001@gmail.com', 'Uganda', 'I am an Environmental Scientist', '2025-01-16 10:16:20', '1', '1', 'https://tgungoon.io/kl', '', '4626', '$2y$10$74/RPlKum1Ko8aZmgvxQO.bII6Xx0QXA4i81Zw70M89uGUto7auDC', '2024-12-14 05:10:04'),
(20, 'James', 'Tillen', 'Tillen0003', '0788998899', 'tillen@gmail.com', 'Ukraine', 'I am a physiologist', '2024-12-14 06:06:26', '1', '1', 'https://tgungoon.io/klk', '', '9699', '$2y$10$zRNXzrvbuS5yGSFSTt.Kdu6aqHENvsn3p.KA75BIt3ob6kXGrPtY2', '2024-12-14 05:30:29'),
(25, 'Calvince', 'Owino', 'owish', '0706067427', 't313jalikoa@gmail.com', 'Kenya', 'I am an engineer', '2025-01-16 10:08:41', '1', '1', 'https://tgungoon.io/kll', '', '3381', '$2y$10$T3lGCNjTPpkWFWcBYm603ektlpVcMZ4bgO1tVQc2FAwyAYV2zu2Nu', '2025-01-16 10:05:36'),
(26, 'Henry', 'Manio', 'owinojalikoa', '0784234657', 'www.owinocalvince@gmail.com', 'Kenya', 'I am an environmental Scientist', '2025-01-16 11:48:57', '1', '1', 'https://tgungoon.ipo/klk', '', '3263', '$2y$10$IcQiE7nnCbti.XkNlQFn8eNF1AoBteOaQ6u80lZ9LhJt7nHKMqJZm', '2025-01-16 11:45:43');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `discussions`
--
ALTER TABLE `discussions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dissmembers`
--
ALTER TABLE `dissmembers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
