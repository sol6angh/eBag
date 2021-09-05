-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2021 at 06:23 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my e-bag`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `admin_num` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `join_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `firstname`, `lastname`, `admin_num`, `password`, `join_date`) VALUES
(1, 'Sultan', 'Alghamdi', 1741157, '05512345', '2021-01-31 19:39:51'),
(2, 'Faris', 'Alghamdi', 1741938, '123456789', '2021-01-31 19:39:51'),
(3, 'Abdulrazaq', 'Alqarni', 1742752, 'qazwsxedc123', '2021-01-31 19:39:51');

-- --------------------------------------------------------

--
-- Table structure for table `bag`
--

CREATE TABLE `bag` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `document_id` int(11) NOT NULL,
  `is_rating` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bag`
--

INSERT INTO `bag` (`id`, `user_id`, `document_id`, `is_rating`) VALUES
(39, 62, 63, 1),
(40, 66, 74, 0),
(41, 62, 70, 0),
(42, 62, 66, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(1, 'Projects'),
(2, 'Slides'),
(3, 'Books'),
(4, 'Practice Questions'),
(5, 'Previous Exams'),
(6, 'Quizes'),
(7, 'Assignments');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `university_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `user_id`, `university_id`, `text`, `created_at`) VALUES
(7, 62, 9, 'Hello', '2021-04-09 23:07:01');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `document_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `user_id`, `title`, `email`, `description`, `time`) VALUES
(8, 61, 'restrict', 'f-gh707@hotmail.com', 'What is the problem?', '2021-04-08 22:53:49'),
(9, 62, 'suggestion', 'sol6angh@gmail.com', 'hello', '2021-04-09 23:18:02'),
(10, 62, 'restrict', 'sol6angh@gmail.com', 'why?', '2021-04-09 23:26:47');

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `university_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `file` varchar(500) NOT NULL,
  `is_free` tinyint(1) NOT NULL DEFAULT 1,
  `price` float DEFAULT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`id`, `user_id`, `university_id`, `faculty_id`, `category_id`, `number`, `title`, `description`, `image`, `file`, `is_free`, `price`, `uploaded_at`, `is_deleted`) VALUES
(62, 61, 1, 1, 7, 1340, 'CPCS-222', 'Discrete Structures Course Assignments', 'image2021_03_27_715052.jpg', '2021_03_27_848667.rar', 1, NULL, '2021-03-27 22:40:48', 0),
(63, 61, 1, 1, 7, 3149, 'CPIS-342', 'Data Warehousing and Mining', 'image2021_03_27_815797.jpg', '2021_03_27_328127.rar', 1, NULL, '2021-03-27 22:41:35', 1),
(64, 61, 1, 1, 7, 1182, 'CPIS-352', 'Enterprise Information System Architecture Course Assignments', 'image2021_03_27_389211.jpg', '2021_03_27_829852.rar', 0, 10, '2021-03-27 22:42:55', 0),
(65, 61, 1, 1, 3, 8002, 'JAVA Programming Language', 'JAVA Programming Language Course Book', 'image2021_03_27_528204.png', '2021_03_27_521116.pdf', 1, NULL, '2021-03-27 22:44:00', 0),
(66, 61, 1, 1, 3, 7652, 'CPIS-363', 'Intelligent Systems Course Book', 'image2021_03_27_267510.png', '2021_03_27_270983.pdf', 0, 20, '2021-03-27 22:45:05', 0),
(67, 61, 1, 1, 5, 4411, 'CPIS-357', 'Software Quality & Testing', 'image2021_03_27_294056.jpg', '2021_03_27_835925.rar', 1, NULL, '2021-03-27 22:46:17', 0),
(68, 61, 1, 1, 5, 4499, 'MRKT-260', 'Principles of Marketing ', 'image2021_03_27_411303.jpg', '2021_03_27_382119.zip', 1, NULL, '2021-03-27 22:47:43', 0),
(70, 61, 1, 1, 1, 5604, 'CPIS-351 prototype', 'Analysis & Design II prototype', 'image2021_03_27_816213.jpg', '2021_03_27_976790.rar', 0, 10, '2021-03-27 22:50:09', 0);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `university_id` int(11) NOT NULL,
  `faculty_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `university_id`, `faculty_name`) VALUES
(1, 1, 'Faculty of Computing and Information Technology'),
(2, 1, 'Faculty of Engineering'),
(3, 1, 'Faculty of Economics and Administration'),
(4, 2, 'College of Engineering'),
(5, 2, 'College of Computer and Information Sciences'),
(6, 2, 'College of Medicine'),
(7, 3, 'College of Computer Sciences and Engineering'),
(8, 3, 'College of Petroleum Engineering\r\n& Geosciences'),
(9, 3, 'College Of Engineering'),
(10, 4, 'Biological and Environmental Science and Engineering'),
(11, 4, 'Computer, Electrical and Mathematical Science and Engineering'),
(12, 4, 'Physical Science and Engineering'),
(13, 5, 'college of medicine'),
(14, 5, 'College of Engineering and Islamic Architecture'),
(15, 5, 'College of Computer and Information Systems'),
(16, 6, 'College of Engineering'),
(17, 6, 'College of Medicine'),
(18, 6, 'College of Computer and Information Sciences'),
(19, 7, 'College of Computer and Information Sciences'),
(20, 7, 'College of Medicine'),
(21, 7, 'College of Engineering'),
(22, 8, 'College of Science and Computer Engineering'),
(23, 8, 'College of Medicine'),
(24, 8, 'College of Engineering'),
(25, 9, 'Computer Sciences & Information'),
(26, 9, 'College of Engineering'),
(27, 9, 'College of Medicine');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `document_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `transaction_id` varchar(16) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `buyer_id`, `document_id`, `seller_id`, `transaction_id`, `order_date`) VALUES
(34, 62, 63, 61, '6070DD6F1D5BB', '2021-04-09 23:04:15'),
(35, 66, 74, 62, '6070DF8A2356F', '2021-04-09 23:13:14'),
(36, 62, 70, 61, '7DS613073R634751', '2021-04-09 23:34:41'),
(37, 62, 66, 61, '8PX691382W590960', '2021-04-09 23:36:09');

-- --------------------------------------------------------

--
-- Table structure for table `paypal_api`
--

CREATE TABLE `paypal_api` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` varchar(300) NOT NULL,
  `secret_key` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paypal_api`
--

INSERT INTO `paypal_api` (`id`, `user_id`, `client_id`, `secret_key`) VALUES
(13, 61, 'AZYbjfJ1wmbz2a5AJdGL_b9aZwG1v-L0EyvrIW-irf5eA1PJXQp_FDwRRIRqGv3_FU2vGh1k57lx7GBQ', 'EK_21j8YkeKfhn8Q727XDMC9PXZW5proZwmRaPOexR3tqXJLCIIMkTJsEouocHiRT-wCkCsqj4f2o433');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `document_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `star` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `universities`
--

CREATE TABLE `universities` (
  `id` int(11) NOT NULL,
  `university_name` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `universities`
--

INSERT INTO `universities` (`id`, `university_name`, `img`) VALUES
(1, 'King Abdulaziz University', 'King Abdulaziz University.jpg'),
(2, 'King Saud University', 'King Saud University.jpg'),
(3, 'King Fahd University of Petroleum and Engineering', 'King Fahd University of Petroleum and Engineering.jpg'),
(4, 'King Abdullah University of Science and Technology', 'King Abdullah University of Science and Technology.jpg'),
(5, 'Umm Al Qura University', 'Umm Al Qura University.jpg'),
(6, 'Imam Muhammad Bin Saud Islamic University', 'Imam Muhammad Bin Saud Islamic University.jpg'),
(7, 'Princess Nora bint AbdulRahman University', 'Princess Nora bint AbdulRahman University.jpg'),
(8, 'Taibah University', 'Taibah University.png'),
(9, 'King Faisal University', 'King Faisal University.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `university_id` int(11) DEFAULT NULL,
  `faculty_id` int(11) DEFAULT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `secure_code` int(4) DEFAULT NULL,
  `balance_exist` tinyint(1) NOT NULL DEFAULT 0,
  `balance` float NOT NULL DEFAULT 0,
  `prev_balance` float NOT NULL DEFAULT 0,
  `is_activate` tinyint(1) NOT NULL DEFAULT 0,
  `is_restricted` tinyint(1) NOT NULL DEFAULT 0,
  `study_activate` tinyint(4) NOT NULL DEFAULT 0,
  `api_activate` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `university_id`, `faculty_id`, `firstname`, `lastname`, `username`, `email`, `password`, `phone_number`, `city`, `secure_code`, `balance_exist`, `balance`, `prev_balance`, `is_activate`, `is_restricted`, `study_activate`, `api_activate`, `created_at`) VALUES
(61, 2, 6, 'Sultan', 'Alghamdi', 'sultan', 'f707@hotmail.com', '05512345', '0551111111', 'Jeddah', 0, 1, 30, 10, 1, 0, 1, 1, '2021-03-27 16:22:38'),
(62, 9, 25, 'faris', 'alghamdi', 'faris', 'sultan@gmail.com', '111111', '0551111111', 'jeddah', 0, 0, 0, 0, 1, 0, 1, 0, '2021-04-09 00:13:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bag`
--
ALTER TABLE `bag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paypal_api`
--
ALTER TABLE `paypal_api`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `universities`
--
ALTER TABLE `universities`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bag`
--
ALTER TABLE `bag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `paypal_api`
--
ALTER TABLE `paypal_api`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `universities`
--
ALTER TABLE `universities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
