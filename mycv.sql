-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2018 at 04:10 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mycv`
--

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

CREATE TABLE `children` (
  `c_id` int(11) NOT NULL,
  `fname` varchar(40) DEFAULT NULL,
  `lname` varchar(40) DEFAULT NULL,
  `height` float DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `gender` varchar(2) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `active` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `children`
--

INSERT INTO `children` (`c_id`, `fname`, `lname`, `height`, `weight`, `gender`, `dob`, `user_id`, `active`) VALUES
(1, 'Ashwini', 'Khade', 50, 40.3, 'F', '2014-01-21', 1, 'active'),
(2, 'Tanvi', 'Limaye', 40, 32.5, 'F', '2013-05-01', 2, 'active'),
(3, 'Adwait', 'Kanade', 40, 50.2, 'M', '2015-11-21', 3, 'active'),
(4, 'Ashwini', 'Borkar', 40.1, 50.9, 'F', '2014-01-30', 4, 'active'),
(5, 'Sakshi', 'Pote', 45.6, 50.5, 'F', '2014-02-02', 5, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `given`
--

CREATE TABLE `given` (
  `c_id` int(11) DEFAULT NULL,
  `v_id` int(11) DEFAULT NULL,
  `vaccine_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `given`
--

INSERT INTO `given` (`c_id`, `v_id`, `vaccine_date`) VALUES
(1, 1, '2014-12-22'),
(2, 2, '2013-11-20'),
(3, 3, '2015-12-22'),
(4, 4, '2014-10-09'),
(5, 5, '2014-08-08');

-- --------------------------------------------------------

--
-- Table structure for table `sideeffects`
--

CREATE TABLE `sideeffects` (
  `s_id` int(11) NOT NULL,
  `sideeffect_name` varchar(1000) DEFAULT NULL,
  `v_id` int(11) DEFAULT NULL,
  `active` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sideeffects`
--

INSERT INTO `sideeffects` (`s_id`, `sideeffect_name`, `v_id`, `active`) VALUES
(1, 'Soreness,Headache,Fever,Nausea,Muscle Aches', 1, 'active'),
(2, 'Headache,Low Fever,Nausea', 2, 'active'),
(3, 'Redness,Low Fever,Nausea,Vomiting', 3, 'active'),
(4, 'Runny nose,Mild Fever,Vomiting', 4, 'active'),
(5, 'Tiredness,Mild Fever,Nausea,Muscle Aches', 5, 'active'),
(6, '1', 5, 'active'),
(7, '2', 6, 'active'),
(8, 'testing', 7, 'active'),
(9, '2', 8, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(40) DEFAULT NULL,
  `lname` varchar(40) DEFAULT NULL,
  `gender` varchar(2) DEFAULT NULL,
  `usertype` varchar(15) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `pwd` varchar(16) DEFAULT NULL,
  `active` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `gender`, `usertype`, `email`, `pwd`, `active`) VALUES
(1, 'Sayali', 'Khade', 'F', 'Guardian', 'sayalikhade@gmail.com', 'sayali1234', 'active'),
(2, 'Akash', 'Limaye', 'M', 'Guardian', 'akash.g.limaye@gmail.com', 'akash1234', 'active'),
(3, 'Ashutosh', 'Kanade', 'M', 'Guardian', 'ashutosh.kanade@gmail.com', 'ashutosh1234', 'active'),
(4, 'Tanmay', 'Borkar', 'M', 'Guardian', 'tanmay.borkar@gmail.com', 'tanmay1234', 'active'),
(5, 'Gandhali', 'Shastri', 'F', 'Admin', 'gandhali.shastri@gmail.com', 'gandhali1234', 'active'),
(6, 'Tejal', 'Pote', 'F', 'Guardian', 'tejal.pote@gmail.com', 'tejal1234', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `vaccine`
--

CREATE TABLE `vaccine` (
  `v_id` int(11) NOT NULL,
  `vaccine_name` varchar(40) DEFAULT NULL,
  `lot_num` int(11) DEFAULT NULL,
  `pharm_name` varchar(30) DEFAULT NULL,
  `dosage` float DEFAULT NULL,
  `active` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vaccine`
--

INSERT INTO `vaccine` (`v_id`, `vaccine_name`, `lot_num`, `pharm_name`, `dosage`, `active`) VALUES
(1, 'Influenza', 5, 'Abbott', 5, 'active'),
(2, 'MMR ', 10, 'Novartis', 6, 'active'),
(3, 'Polio', 30, 'Sanofi', 4, 'active'),
(4, 'RotaVirus', 6, 'Serum', 4, 'active'),
(5, 'Tetanus', 8, 'Sanofi', 5, 'active'),
(6, 't1', 0, '1', 1, 'active'),
(7, 'testing', 0, '2', 2, 'active'),
(8, '2', 2, '2', 2, 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `children`
--
ALTER TABLE `children`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `given`
--
ALTER TABLE `given`
  ADD KEY `c_id` (`c_id`),
  ADD KEY `v_id` (`v_id`);

--
-- Indexes for table `sideeffects`
--
ALTER TABLE `sideeffects`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `v_id` (`v_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vaccine`
--
ALTER TABLE `vaccine`
  ADD PRIMARY KEY (`v_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `children`
--
ALTER TABLE `children`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sideeffects`
--
ALTER TABLE `sideeffects`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vaccine`
--
ALTER TABLE `vaccine`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `children`
--
ALTER TABLE `children`
  ADD CONSTRAINT `children_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `given`
--
ALTER TABLE `given`
  ADD CONSTRAINT `given_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `children` (`c_id`),
  ADD CONSTRAINT `given_ibfk_2` FOREIGN KEY (`v_id`) REFERENCES `vaccine` (`v_id`);

--
-- Constraints for table `sideeffects`
--
ALTER TABLE `sideeffects`
  ADD CONSTRAINT `sideeffects_ibfk_1` FOREIGN KEY (`v_id`) REFERENCES `vaccine` (`v_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
