-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 29, 2018 at 12:37 AM
-- Server version: 5.7.20
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `question_name` text,
  `answer1` text,
  `answer2` text,
  `answer3` text,
  `answer4` text,
  `answer` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `category_id`, `question_name`, `answer1`, `answer2`, `answer3`, `answer4`, `answer`) VALUES
(1, 1, 'A train running at the speed of 60 km/hr crosses a pole in 9 seconds. What is the length of the train?', '120 metres', '180 metres', '324 metres', '150 metres', '150 metres'),
(2, 2, 'A train 125 m long passes a man, running at 5 km/hr in the same direction in which the train is going, in 10 seconds. The speed of the train is:', '45 km/hr', '50 km/hr', '54 km/hr', '55 km/hr', '50 km/hr'),
(3, 3, '	\r\nThe length of the bridge, which a train 130 metres long and travelling at 45 km/hr can cross in 30 seconds, is:', '220 m', '225 m', '245 m', '250 m', '245 m'),
(4, 4, 'Two trains running in opposite directions cross a man standing on the platform in 27 seconds and 17 seconds respectively and they cross each other in 23 seconds. The ratio of their speeds is:', '1 : 3', '3 : 2', '3 : 4', 'None of these', '3 : 2'),
(5, 5, 'A train passes a station platform in 36 seconds and a man standing on the platform in 20 seconds. If the speed of the train is 54 km/hr, what is the length of the platform?', '120 m', '240 m', '300 m', 'None of these', '240 m');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `phone_number` varchar(13) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `marks` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `username`, `phone_number`, `email`, `marks`) VALUES
(1, 'dfdf', '3424234234', 'dsd@fdf.sdf', 0),
(2, 'superadmin', '3535435355', 'bensr005@gmail.com', 0),
(3, 'fdfsd', '4353453555', 'df@dsfd.dsf', 0),
(4, 'dfdf', '3432442434', 'df@sdfd.dfd', 0),
(5, 'sfsfsf', '5354354354', 'sfds@sdf.dfd', 0),
(6, 'dfdsfs', '8347928341', 'sdfsdf@djj.fgfg', 0),
(7, 'dmfnmds', '3432423423', 'mnsbdfmn@nfd.dfdf', 0),
(8, 'sdfsdf', '2342342344', 'ffff@srfsf.lsdf', 0),
(9, 'sfsds', '3243243434', 'sdf@sd.dfd', 0),
(10, 'sfsds', '3243243434', 'sdf@sd.dfd', 0),
(70, 'testse', '4958094809', 'testing@gmail.com', 0),
(71, 'tst', '3534532553', 'dfds@nmns.fdf', 0),
(72, 'dsf', '0987978798', 'bnbn@jhjk.n', 0),
(73, 'tevasales', '8798987878', 'asdm@bn.aas', 0),
(74, 'fsdsfd', '3389579981', 'fdsfs@ndf.df', 0),
(75, 'dsfs', '9874987987', 'bmnm@nbm.dsf', 0),
(76, 'mbmn', '8979877987', 'bnbv@bvn.khj', 0),
(77, 'mmnb', '7858556556', 'nbnmbmn@nvgjg.bv', 0),
(78, 'xdfdf', '5345454555', 'dsds@gfdg.fgg', 0),
(79, 'NewData', '0938590893', 'gmbd@mdf.dsf', 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_question_answers`
--

CREATE TABLE `user_question_answers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `answer` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_question_answers`
--

INSERT INTO `user_question_answers` (`id`, `user_id`, `question_id`, `answer`) VALUES
(4, 67, 1, 'answer1'),
(5, 68, 1, 'answer1'),
(6, 69, 1, 'answer1'),
(7, 69, 5, 'answer1'),
(8, 79, 1, '150 metres'),
(9, 79, 2, '50 km/hr'),
(10, 79, 3, '245 m'),
(11, 79, 4, '3 : 2'),
(12, 79, 5, '240 m');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `username` (`username`),
  ADD KEY `phone_number` (`phone_number`),
  ADD KEY `email` (`email`),
  ADD KEY `marks` (`marks`);

--
-- Indexes for table `user_question_answers`
--
ALTER TABLE `user_question_answers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `user_question_answers`
--
ALTER TABLE `user_question_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
