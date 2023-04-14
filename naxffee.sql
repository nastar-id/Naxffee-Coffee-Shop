-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2023 at 11:31 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `naxffee`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(155) NOT NULL,
  `username` varchar(125) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `username`, `password`, `image`) VALUES
(8, 'Naxtarrr', 'davidhorison457@gmail.com', 'admin', '$2y$10$IdI2cF7J8H.xmpc1HCCKNe.xJXhHqGn22DnG1Uv56jqXAQ8tWHOlO', 'IMG_6439158e6d0d9.gif');

-- --------------------------------------------------------

--
-- Table structure for table `drinkmenu`
--

CREATE TABLE `drinkmenu` (
  `id` int(11) NOT NULL,
  `drinkname` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drinkmenu`
--

INSERT INTO `drinkmenu` (`id`, `drinkname`, `price`, `discount`, `description`, `image`) VALUES
(3, 'Americano', 75000, 30, 'America but no neg-', 'IMG_6430e7d6151eb.jpg'),
(4, 'Iced Frappe', 80000, 0, 'Cold, sweet, blended coffee.', 'IMG_6430e782deba1.jpg'),
(8, 'Espresso', 20000, 0, 'Strong, concentrated, pure shot. Classic.', 'IMG_64340b91e3bd4.jpg'),
(9, 'Capuccino', 60000, 5, 'Espresso, steamed milk, foam. Delicious!', 'IMG_64340d809bb90.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `foodmenu`
--

CREATE TABLE `foodmenu` (
  `id` int(11) NOT NULL,
  `foodname` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foodmenu`
--

INSERT INTO `foodmenu` (`id`, `foodname`, `price`, `discount`, `description`, `image`) VALUES
(1, 'Farhan Kebab', 20000, 0, 'Farhan Kebab khas Cianjur', 'IMG_6430e88145e4b.jpg'),
(2, 'Salak Ngawi', 12000, 0, 'Buah Salah asli Ngawi', 'IMG_6430e82f29cef.jpg'),
(3, 'Croissant', 25000, 10, 'Today I wanted to eat a Quaso', 'IMG_643406d58a173.jpg'),
(4, 'Ramen Ichiraku', 35000, 0, 'Ramen Ichiraku (Naruto pernah makan disini)', 'IMG_64340b2ae4f3e.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `image`) VALUES
(2, 'CEGC', 'IMG_642db4f86e48f.jpg'),
(8, 'Photo by Rod Long on Unsplash', 'IMG_6431c8cb716c5.jpg'),
(9, '', 'IMG_6431bd5c8c125.jpg'),
(13, 'Photo by Alisa Anton on Unsplash', 'IMG_6431c86186e77.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `news` text NOT NULL,
  `image` varchar(30) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `date` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `news`, `image`, `slug`, `date`) VALUES
(2, 'Shiina Mahiru', 'Shiina Mahiru is the female lead of The Angel Next Door Spoils Me Rotten. She is the next-door neighbor of Amane Fujimiya and attends the same high school.\r\n\r\nEvery part of Mahiru\'s appearance is synonymous with beautiful, and she is often inseparably described as such. Her blond hair is always straight, well-groomed, flaxen, silky smooth, and lustrous. Her large eyes are caramel colored, with long lashes, both top, and bottom. In addition, Mahiru possesses pale, milky-white, soft, perfect skin and a shapely nose.', 'IMG_643662184435e.jpg', 'shiina-mahiru', '12 - apr - 2023'),
(5, 'Misaki Mei', 'Misaki Mei is the female protagonist of Another and a student of Class 3-3 at Yomiyama North Middle School in 1998. She was labeled by her classmates as \"the one that does not exist.\"\r\n\r\nMei was born like the older of two twin girls, she was originally conceived by Mitsuyo Fujioka along with her twin Misaki Fujioka until one day Yukiyo Misaki, Mitsuyo\'s younger twin sister, also became pregnant but miscarried leaving her devastated. At the same time, Mei\'s family was experiencing financial problems. Because of this, along with the fact that Yukiyo was still trying to cope with the loss of her unborn child, Mitsuyo gave Mei to her sister to raise her as her own daughter.\r\n\r\nAt some point in her elementary school years, Mei learns that Misaki was her twin after her grandmother accidentally slipped it out resulting in Kirika having another mental breakdown. One night Mei found her \"mother\" crying and wanted to know the reason, to which Kirika tells her on that night that she was not allowed to meet her biological family, originating where Mei had a cellphone prior before the story began. Despite this, Mei secretly meets her twin sister, and also becomes close friends.\r\n\r\nOne and a half year before the calamity began, Mei witnessed an unknown assailant killing a young woman from across the river, which she still remembers prior to the story.', 'IMG_6436704847e49.jpg', 'misaki-mei', '12 - apr - 2023'),
(6, 'Morioka Moriko', 'Morioka Moriko is the main protagonist of the story. A 30-year old single female. After graduating college, she worked in the sales department for the company when she was 24 years old, then later, she decided to quit and become a NEET. She spends her days in a net game in search for the satisfaction that otherwise she can\'t obtain in real life.\r\n\r\nMoriko is a 30-year old female of medium height with waist-length bluish-purple hair that is seen tied up in various episodes and eyes that match, but it is in a lighter shade. Her skin is a bit pale, a distinctive mole near her mouth and her body is an average build.\r\n\r\nShe does not seem to know or even care about her looks outside her job, and after quitting Moriko\'s appearance became unkempt, her hair being long and at times unkept, bags under her eyes as well as eyebrows that haven\'t been tended too.\r\n\r\nHowever, after setting up plans to meet Homare Koiwai for drinks in episode 5, she seeks advice from Lily on how she should dress and style her hair, during which Lily and Kanbe get into a disagreement on if short or long hair is better before Moriko finally chose medium-length hair.\r\n\r\nIn the manga, she is noted to be very attractive and beautiful among her formerly male co-workers or public.', 'IMG_6436879eb1515.jpg', 'morioka-moriko', '12 - apr - 2023');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(27) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `title`, `image`) VALUES
(1, 'Photo by Patrick Tomasso on Unsplash', 'IMG_6430e37654755.jpg'),
(2, 'Photo by Nathan Dumlao on Unsplash', 'IMG_6430e3b0a8888.jpg'),
(4, 'Photo by Kris Atomic on Unsplash', 'IMG_6430e5532da1f.jpg'),
(7, 'Photo by Breakslow on Unsplash', 'IMG_6431646d9640b.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drinkmenu`
--
ALTER TABLE `drinkmenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foodmenu`
--
ALTER TABLE `foodmenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `drinkmenu`
--
ALTER TABLE `drinkmenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `foodmenu`
--
ALTER TABLE `foodmenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
