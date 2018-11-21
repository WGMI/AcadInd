-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2018 at 09:04 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ai`
--

-- --------------------------------------------------------

--
-- Table structure for table `ideas`
--

CREATE TABLE `ideas` (
  `idea_id` int(11) NOT NULL,
  `ideaname` varchar(32) NOT NULL,
  `deadline` varchar(32) NOT NULL,
  `category` varchar(32) NOT NULL,
  `stage` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `target` text NOT NULL,
  `website` varchar(32) NOT NULL,
  `links` text NOT NULL,
  `continuation` text NOT NULL,
  `attachements` varchar(32) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ideas`
--

INSERT INTO `ideas` (`idea_id`, `ideaname`, `deadline`, `category`, `stage`, `description`, `target`, `website`, `links`, `continuation`, `attachements`, `user_id`) VALUES
(1, 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'q', 1),
(2, '', '2018-11-22', 'Research', 'Inception', 'Do things', 'Me', 'me.com', 'github.me', 'I need more me`', 'uploads/Academia Industry Projec', 39),
(3, 'other', '2018-11-29', 'Consultancy', 'Inception', 'q', 'q', 'w', 'w', 'w`', 'uploads/20180103 - BUSIA POST IM', 39);

-- --------------------------------------------------------

--
-- Table structure for table `industries`
--

CREATE TABLE `industries` (
  `industry_id` int(11) NOT NULL,
  `industry_name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` int(11) NOT NULL,
  `projectname` varchar(32) NOT NULL,
  `deadline` varchar(32) NOT NULL,
  `category` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `target` text NOT NULL,
  `website` varchar(32) NOT NULL,
  `links` text NOT NULL,
  `attachement` varchar(32) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `projectname`, `deadline`, `category`, `description`, `target`, `website`, `links`, `attachement`, `user_id`) VALUES
(1, 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'q', 1),
(2, 'Test title', '2018-11-20', 'Research', 'I need to test', 'ME me me', 'me.com', 'github.me\r\nlinkedin.me', 'uploads/20180103 - BUSIA POST IM', 39),
(3, 'Another one', '', 'Training', 'Test again', 'Me', 'us.com', 'Linkme.us', 'uploads/', 39);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `email` varchar(55) NOT NULL,
  `industry_id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `type` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `date_joined` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `industry_id`, `username`, `password`, `type`, `active`, `date_joined`) VALUES
(2, 'Muganda', 'Imo', '', 0, 'imo', '96e79218965eb72c92a549dd5a330112', 1, 1, 0),
(39, 'Will', 'Gabriel', '', 0, 'gabe', '96e79218965eb72c92a549dd5a330112', 3, 1, 1542002650),
(41, 'Will', 'Imo', 'will@gmail.com', 0, 'will', '1bbd886460827015e5d605ed44252251', 2, 1, 0),
(42, 'first', 'last', 'email', 1, 'user', 'pass', 2, 1, 0),
(43, 'John', 'Doe', 'j@d.com', 1, 'johndoe', '1bbd886460827015e5d605ed44252251', 2, 1, 1542438401);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ideas`
--
ALTER TABLE `ideas`
  ADD PRIMARY KEY (`idea_id`);

--
-- Indexes for table `industries`
--
ALTER TABLE `industries`
  ADD PRIMARY KEY (`industry_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ideas`
--
ALTER TABLE `ideas`
  MODIFY `idea_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `industries`
--
ALTER TABLE `industries`
  MODIFY `industry_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
