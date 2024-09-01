-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2024 at 05:46 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fullname` varchar(259) DEFAULT NULL,
  `mobilenumber` bigint(11) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fullname`, `mobilenumber`, `email`, `username`, `password`, `creationDate`, `updationDate`) VALUES
(1, 'admin', 8956232356, 'admin@gmail.com', 'admin', 'e10adc3949ba59abbe56e057f20f883e\r\n', '2023-09-12 05:16:16', '18-10-2016 04:18:16'),
(2, 'admins', 96767779, 'admins@gmail.com', 'admins', 'e10adc3949ba59abbe56e057f20f883e', '2024-06-19 14:47:16', '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(255) DEFAULT NULL,
  `categoryDescription` longtext,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryName`, `categoryDescription`, `creationDate`, `updationDate`) VALUES
(11, 'Pedagogy ', 'only have one departments', '2024-06-07 08:45:40', '2024-06-19 14:50:56'),
(12, 'freshman course and computational science faculity', 'have two department', '2024-06-07 08:46:45', NULL),
(13, 'TVET Leadership and Governance Faculity', 'have three department', '2024-06-07 08:47:36', NULL),
(14, 'Textile and apparel fashion Technology', 'have three department', '2024-06-07 08:48:33', NULL),
(15, 'Agro processing Faculity', 'have three department', '2024-06-07 08:51:15', NULL),
(16, 'Electrical Electronics and ICT facility', 'have two department', '2024-06-07 08:52:23', NULL),
(18, 'fgjfkjfg', 'kddfkjd', '2024-06-19 14:55:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `complaintremark`
--

CREATE TABLE `complaintremark` (
  `id` int(11) NOT NULL,
  `complaintNumber` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `remark` mediumtext,
  `remarkDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaintremark`
--

INSERT INTO `complaintremark` (`id`, `complaintNumber`, `status`, `remark`, `remarkDate`) VALUES
(1, 3, 'in process', 'your ticket forward to associated team', '2023-09-15 13:05:38'),
(2, 3, 'closed', 'Ticket close in favor of user', '2023-09-15 13:06:31'),
(3, 5, 'in process', 'We are reviewing the complaint', '2023-10-01 04:12:48'),
(4, 5, 'closed', 'Issue resolved', '2023-10-01 04:13:12'),
(5, 39, 'in process', 'kklklkllkllllklklklklkl', '2024-06-09 07:12:28'),
(6, 39, 'closed', 'case fixed', '2024-06-09 07:14:44'),
(7, 40, 'in process', 'things will be fixed soon', '2024-06-09 09:15:19'),
(8, 42, 'in process', 'ggggggggg', '2024-06-13 07:37:16'),
(9, 42, 'closed', 'nnnnnnnnnnn', '2024-06-13 07:41:29'),
(10, 51, 'in process', 'case is in progress', '2024-06-19 14:23:11'),
(11, 51, 'closed', 'case fixed!', '2024-06-19 14:28:51'),
(12, 52, 'in process', 'dfjkdfjdk', '2024-06-19 14:35:51'),
(13, 52, 'closed', 'fgkjfkgjfkjg', '2024-06-19 14:35:58'),
(14, 53, 'in process', 'dkdkdkd', '2024-06-19 15:02:50'),
(15, 53, 'closed', 'kfdgkdfjgkdf', '2024-06-19 15:03:11');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `role` varchar(50) NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `gender`, `email`, `password`, `role`, `status`) VALUES
(14, 'Misker', 'Solomon', '', 'misker@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'ICT', 'active'),
(15, 'Dr Yoseph', 'Kiflu', '', 'jossi@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Electrical Electronics and ICT facility', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `director`
--

CREATE TABLE `director` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` enum('male','female','others') NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `director`
--

INSERT INTO `director` (`id`, `first_name`, `last_name`, `gender`, `email`, `password`, `status`) VALUES
(1, 'Lidiya', 'Birhanu', 'female', 'lidiya@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `slrdc`
--

CREATE TABLE `slrdc` (
  `id` int(11) NOT NULL,
  `type` text,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slrdc`
--

INSERT INTO `slrdc` (`id`, `type`, `creationDate`, `updationDate`) VALUES
(1, 'Security,Library,Registrar', '2024-06-08 19:45:17', NULL),
(2, 'Dormitary,Cafeteria', '2024-06-08 19:45:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `stateName` varchar(255) DEFAULT NULL,
  `stateDescription` tinytext,
  `postingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `stateName`, `stateDescription`, `postingDate`, `updationDate`) VALUES
(10, 'FDRE TVET Institute', 'Federal Technical and Vocational Training Institute', '2024-06-08 13:51:31', '2024-06-09 04:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `studentaffaris`
--

CREATE TABLE `studentaffaris` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` enum('male','female','others') NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `role` varchar(50) NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentaffaris`
--

INSERT INTO `studentaffaris` (`id`, `first_name`, `last_name`, `gender`, `email`, `password`, `role`, `status`) VALUES
(1, 'Eleni', 'Birhanu', 'male', 'eleni@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Dormitary,Cafeteria', 'active'),
(2, 'yeabtsega', 'Negash', 'female', 'Yeabtsega@gmail.com', 'c33367701511b4f6020ec61ded352059', 'Dormitary,Cafeteria', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `studentdean`
--

CREATE TABLE `studentdean` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `role` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentdean`
--

INSERT INTO `studentdean` (`id`, `first_name`, `last_name`, `gender`, `email`, `password`, `role`, `status`) VALUES
(10, 'Abebe', 'Lema', 'male', 'Abebe22@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Security,Library,Registrar', 'active'),
(11, 'Lidiya', 'M', 'female', 'lidiya@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Security,Library,Registrar', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `categoryid` int(11) DEFAULT NULL,
  `subcategory` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `categoryid`, `subcategory`, `creationDate`, `updationDate`) VALUES
(8, 9, 'Constriction Technology', '2024-06-07 08:54:36', NULL),
(9, 9, 'Surveying Technology', '2024-06-07 08:55:04', NULL),
(10, 9, 'Wood Technology', '2024-06-07 08:55:19', NULL),
(11, 9, 'Road Technology', '2024-06-07 08:55:46', NULL),
(12, 9, 'Water Technology', '2024-06-07 08:56:06', NULL),
(13, 9, 'Architecture Design Technology', '2024-06-07 08:56:37', NULL),
(14, 10, 'Manufacturing Technology', '2024-06-07 08:59:47', NULL),
(15, 10, 'Automotive Technology', '2024-06-07 09:00:02', NULL),
(16, 11, 'Pedagogy', '2024-06-07 09:00:21', NULL),
(17, 12, 'Social Science', '2024-06-07 09:00:42', NULL),
(18, 12, 'Mathematics', '2024-06-07 09:01:06', NULL),
(19, 12, 'Sport ', '2024-06-07 09:01:19', NULL),
(20, 12, 'English', '2024-06-07 09:01:31', NULL),
(21, 16, 'ICT', '2024-06-08 14:01:37', NULL),
(22, 16, 'Electrical Control', '2024-06-08 19:14:50', NULL),
(23, 16, 'Electrical Control', '2024-06-08 19:31:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblcomplaints`
--

CREATE TABLE `tblcomplaints` (
  `complaintNumber` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `category` text,
  `subcategory` varchar(255) DEFAULT NULL,
  `complaintType` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `noc` varchar(255) DEFAULT NULL,
  `complaintDetails` mediumtext,
  `complaintFile` varchar(255) DEFAULT NULL,
  `videoFile` varchar(255) DEFAULT NULL,
  `audioFile` varchar(255) DEFAULT NULL,
  `regDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(50) DEFAULT NULL,
  `lastUpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcomplaints`
--

INSERT INTO `tblcomplaints` (`complaintNumber`, `userId`, `category`, `subcategory`, `complaintType`, `state`, `noc`, `complaintDetails`, `complaintFile`, `videoFile`, `audioFile`, `regDate`, `status`, `lastUpdationDate`) VALUES
(45, 10, 'Agro processing Faculity', 'Sport', 'Delayed or lost exam results', 'FDRE TVET Institute', 'teaching is not nice', 'ssssssssssssssssssssssssssssssssssssssssssssssssss', '9e044ea0ed5817381b189680f392bafe.jpeg', 'a2214a14548d59aa84a5bb37ff33ecb9.mp4', 'f3b014a95d54068bcec3dd40ec6798d7.mp3', '2024-06-16 10:09:54', NULL, NULL),
(46, 10, 'Agro processing Faculity', 'Sport', 'Delayed or lost exam results', 'FDRE TVET Institute', 'teaching is not nice', 'ssssssssssssssssssssssssssssssssssssssssssssssssss', '9e044ea0ed5817381b189680f392bafe.jpeg', 'a2214a14548d59aa84a5bb37ff33ecb9.mp4', 'f3b014a95d54068bcec3dd40ec6798d7.mp3', '2024-06-16 10:12:01', NULL, NULL),
(47, 10, 'Agro processing Faculity', 'Sport', 'Delayed or lost exam results', 'FDRE TVET Institute', 'teaching is not nice', 'ssssssssssssssssssssssssssssssssssssssssssssssssss', '9e044ea0ed5817381b189680f392bafe.jpeg', 'a2214a14548d59aa84a5bb37ff33ecb9.mp4', 'f3b014a95d54068bcec3dd40ec6798d7.mp3', '2024-06-16 10:13:12', NULL, NULL),
(48, 10, 'Agro processing Faculity', 'Sport', 'Delayed or lost exam results', 'FDRE TVET Institute', 'teaching is not nice', 'ssssssssssssssssssssssssssssssssssssssssssssssssss', '9e044ea0ed5817381b189680f392bafe.jpeg', 'a2214a14548d59aa84a5bb37ff33ecb9.mp4', 'f3b014a95d54068bcec3dd40ec6798d7.mp3', '2024-06-16 10:14:54', NULL, NULL),
(49, 10, 'Agro processing Faculity', 'Sport', 'Delayed or lost exam results', 'FDRE TVET Institute', 'teaching is not nice', 'ssssssssssssssssssssssssssssssssssssssssssssssssss', '9e044ea0ed5817381b189680f392bafe.jpeg', 'a2214a14548d59aa84a5bb37ff33ecb9.mp4', 'f3b014a95d54068bcec3dd40ec6798d7.mp3', '2024-06-16 10:15:16', NULL, NULL),
(50, 8, 'Electrical Electronics and ICT facility', 'ICT', 'Unfair grading practices', 'FDRE TVET Institute', 'teaching is not nice', 'kjjhjhkjhjklhkhklhkjhkjhjklhkljhjkhjh', '44e145b0d88689a5a087ab9d3bd440c2.jpg', 'a2214a14548d59aa84a5bb37ff33ecb9.mp4', 'f3b014a95d54068bcec3dd40ec6798d7.mp3', '2024-06-16 10:21:37', NULL, NULL),
(51, 11, 'Electrical Electronics and ICT facility', 'ICT', 'Inadequate teaching methods', 'FDRE TVET Institute', 'ggjklsdfjgkljdfslkgjdfslkjgkldfjgkldfsjgkfdsklg', 'fdsgkjdfslkgjdfsljglkdfsjglkdfjsgkjdfslkgjdfslkgj', '6789d6d74a6e4b748dee4547603fb102.jpeg', '', 'f3b014a95d54068bcec3dd40ec6798d7.mp3', '2024-06-19 14:15:49', 'closed', '2024-06-19 14:28:51'),
(52, 11, 'Electrical Electronics and ICT facility', 'ICT', 'Lack of engagement or support from Teachers.', 'FDRE TVET Institute', 'emnet@gmail.comemnet@gmail.comemnet@gmail.com', 'emnet@gmail.comemnet@gmail.comemnet@gmail.com', '6789d6d74a6e4b748dee4547603fb102.jpeg', '', 'f3b014a95d54068bcec3dd40ec6798d7.mp3', '2024-06-19 14:17:25', 'closed', '2024-06-19 14:35:58'),
(53, 11, 'Electrical Electronics and ICT facility', 'Cafetria', 'Inadequate number of study rooms or quiet study areas ', 'FDRE TVET Institute', 'hvggggggggggggggggg', 'hjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '35e5b6dd6438db14534a2bc245dda9a1.jpeg', '', 'f3b014a95d54068bcec3dd40ec6798d7.mp3', '2024-06-19 14:59:40', 'closed', '2024-06-19 15:03:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `userEmail` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `contactNo` bigint(11) DEFAULT NULL,
  `address` tinytext,
  `State` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `Faculty` text,
  `Department` text NOT NULL,
  `pincode` int(6) DEFAULT NULL,
  `userImage` varchar(255) DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullName`, `userEmail`, `password`, `contactNo`, `address`, `State`, `country`, `Faculty`, `Department`, `pincode`, `userImage`, `regDate`, `updationDate`, `status`) VALUES
(8, 'Yeabtsega Negash', 'yeabtsega@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 912346545, NULL, NULL, NULL, 'Electrical Electronics and ICT facility', 'ICT', NULL, NULL, '2024-06-09 06:54:05', NULL, 1),
(9, 'Eman Jemal', 'Eman@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 987674774, NULL, NULL, NULL, 'Electrical Electronics and ICT facility', 'Electrical Control', NULL, NULL, '2024-06-09 06:55:06', NULL, 1),
(10, 'Hanna Teshome', 'Hanna@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 948754377, NULL, NULL, NULL, 'Agro processing Faculity', 'Pedagogy', NULL, NULL, '2024-06-09 06:56:21', NULL, 1),
(11, 'Emnet ', 'emnet@gmail.com', 'c33367701511b4f6020ec61ded352059', 956854978, NULL, NULL, NULL, 'Electrical Electronics and ICT facility', 'ICT', NULL, NULL, '2024-06-19 14:06:20', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaintremark`
--
ALTER TABLE `complaintremark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slrdc`
--
ALTER TABLE `slrdc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentaffaris`
--
ALTER TABLE `studentaffaris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentdean`
--
ALTER TABLE `studentdean`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcomplaints`
--
ALTER TABLE `tblcomplaints`
  ADD PRIMARY KEY (`complaintNumber`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `complaintremark`
--
ALTER TABLE `complaintremark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `director`
--
ALTER TABLE `director`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `slrdc`
--
ALTER TABLE `slrdc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `studentaffaris`
--
ALTER TABLE `studentaffaris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `studentdean`
--
ALTER TABLE `studentdean`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `tblcomplaints`
--
ALTER TABLE `tblcomplaints`
  MODIFY `complaintNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
