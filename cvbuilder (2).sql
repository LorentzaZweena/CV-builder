-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2024 at 10:53 AM
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
-- Database: `cvbuilder`
--

-- --------------------------------------------------------

--
-- Table structure for table `certifications`
--

CREATE TABLE `certifications` (
  `id` int(11) NOT NULL,
  `cv_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `certifications`
--

INSERT INTO `certifications` (`id`, `cv_id`, `title`, `description`) VALUES
(1, 1, 'Web application, 2024', 'Lorem ipsum odor amet, consectetuer adipiscing elit. Lectus porta per aptent mus dictum platea sodales non pulvinar. Pulvinar tempor purus aliquet etiam fames. Metus platea inceptos laoreet sodales placerat platea placerat odio. Taciti eget imperdiet praesent sagittis condimentum porttitor gravida. Felis pharetra odio molestie dis eros ipsum vel massa. Posuere magnis iaculis cubilia fames, in metus finibus eget convallis. Class amet nec a conubia turpis penatibus ligula commodo. Quis est risus erat ex metus.'),
(2, 2, 'UI / UX Design, 2022', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(3, 1, 'C++ certifications, 2022', 'Lorem ipsum odor amet, consectetuer adipiscing elit. Quisque fusce faucibus senectus class ante. Ipsum per auctor ipsum netus condimentum et aliquam donec convallis. Commodo pulvinar feugiat fusce auctor eleifend. Massa lectus vulputate elementum facilisis leo cursus efficitur erat. Vehicula accumsan mi ultricies aliquam himenaeos dolor facilisi fringilla.'),
(4, 2, 'Web design certifications, 2023', 'Lorem ipsum odor amet, consectetuer adipiscing elit. Quisque fusce faucibus senectus class ante. Ipsum per auctor ipsum netus condimentum et aliquam donec convallis. Commodo pulvinar feugiat fusce auctor eleifend. Massa lectus vulputate elementum facilisis leo cursus efficitur erat. Vehicula accumsan mi ultricies aliquam himenaeos dolor facilisi fringilla.');

-- --------------------------------------------------------

--
-- Table structure for table `creative`
--

CREATE TABLE `creative` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobileno` varchar(20) DEFAULT NULL,
  `selfDescription` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `creative`
--

INSERT INTO `creative` (`id`, `full_name`, `designation`, `address`, `photo`, `email`, `mobileno`, `selfDescription`) VALUES
(1, 'Zweena Ariva', 'Web programmer', 'Sukaraja, bogor', 'images/creative.png', 'abc@gmail.com', '+62 123-456-7890', 'Lorem ipsum odor amet, consectetuer adipiscing elit. Lectus porta per aptent mus dictum platea sodales non pulvinar. Pulvinar tempor purus aliquet etiam fames. Metus platea inceptos laoreet sodales placerat platea placerat odio. Taciti eget imperdiet praesent sagittis condimentum porttitor gravida. Felis pharetra odio molestie dis eros ipsum vel massa. Posuere magnis iaculis cubilia fames, in metus finibus eget convallis. Class amet nec a conubia turpis penatibus ligula commodo. Quis est risus erat ex metus.'),
(2, 'Ariva Zweena', 'UI / UX Designer', 'Sukaraja, Jakarta', 'images/image2.png', 'xyz@gmail.com', '+1 234-567-8901', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(11) NOT NULL,
  `cv_id` int(11) DEFAULT NULL,
  `school` varchar(255) DEFAULT NULL,
  `degree` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `start_date` varchar(30) DEFAULT NULL,
  `end_date` varchar(30) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `cv_id`, `school`, `degree`, `city`, `start_date`, `end_date`, `description`) VALUES
(1, 1, 'SMK INFORMATIKA PESAT', 'software engineer', 'Bogor, Indonesia', '1995', '2007', 'Lorem ipsum odor amet, consectetuer adipiscing elit. Lectus porta per aptent mus dictum platea sodales non pulvinar. Pulvinar tempor purus aliquet etiam fames. Metus platea inceptos laoreet sodales placerat platea placerat odio. Taciti eget imperdiet praesent sagittis condimentum porttitor gravida. Felis pharetra odio molestie dis eros ipsum vel massa. Posuere magnis iaculis cubilia fames, in metus finibus eget convallis. Class amet nec a conubia turpis penatibus ligula commodo. Quis est risus erat ex metus.'),
(2, 2, 'SMA PESAT', 'Network computer engineering', 'Bogor', '2022', '2027', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\n'),
(3, 1, 'SMK INFOKOM', 'Software engineering technology', 'Jakarta, USA', '2019', '2022', 'Lorem ipsum odor amet, consectetuer adipiscing elit. Non id tellus eleifend sem potenti elementum dictumst tempor? Commodo ornare vel sociosqu dictum rhoncus sociosqu. Integer aptent massa consectetur curae per cursus justo. Faucibus enim erat nibh natoque ultrices bibendum urna.'),
(4, 2, 'SMAN 2 ', 'IPA', 'London, United Kingdom', '1203', '1780', 'Lorem ipsum odor amet, consectetuer adipiscing elit. Non id tellus eleifend sem potenti elementum dictumst tempor? Commodo ornare vel sociosqu dictum rhoncus sociosqu. Integer aptent massa consectetur curae per cursus justo.');

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

CREATE TABLE `experiences` (
  `id` int(11) NOT NULL,
  `cv_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `organization` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `start_date` varchar(30) DEFAULT NULL,
  `end_date` varchar(30) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`id`, `cv_id`, `title`, `organization`, `location`, `start_date`, `end_date`, `description`) VALUES
(1, 1, 'Full-stack programmer', 'SMK INFORMATIKA PESAT', 'Bogor, Indonesia', 'Mei', 'Desember 5087', 'Lorem ipsum odor amet, consectetuer adipiscing elit. Lectus porta per aptent mus dictum platea sodales non pulvinar. Pulvinar tempor purus aliquet etiam fames. Metus platea inceptos laoreet sodales placerat platea placerat odio. Taciti eget imperdiet praesent sagittis condimentum porttitor gravida. Felis pharetra odio molestie dis eros ipsum vel massa. Posuere magnis iaculis cubilia fames, in metus finibus eget convallis. Class amet nec a conubia turpis penatibus ligula commodo. Quis est risus erat ex metus.'),
(2, 2, 'UI / UX Designer', 'SMP PESAT', 'Jakarta, Indonesia', 'Februari', 'November 9058', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(3, 1, 'Web developer', 'Google', 'California, USA', 'Agustus', 'September 2090', 'Lorem ipsum odor amet, consectetuer adipiscing elit. Cursus vestibulum sapien a orci etiam proin in. Primis varius ullamcorper sagittis placerat turpis curae ut. Magnis ligula penatibus volutpat efficitur placerat laoreet est litora.'),
(4, 2, 'Game developer', 'Tesla.inc', 'Shurugwi, Zimbabwe', 'Juli', 'Januari 3080', 'Lorem ipsum odor amet, consectetuer adipiscing elit. Cursus vestibulum sapien a orci etiam proin in. Primis varius ullamcorper sagittis placerat turpis curae ut. Magnis ligula penatibus volutpat efficitur placerat laoreet est litora.');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `cv_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `cv_id`, `title`, `description`) VALUES
(1, 1, 'Sistem voting osis', 'Lorem ipsum odor amet, consectetuer adipiscing elit. Lectus porta per aptent mus dictum platea sodales non pulvinar. Pulvinar tempor purus aliquet etiam fames. Metus platea inceptos laoreet sodales placerat platea placerat odio. Taciti eget imperdiet praesent sagittis condimentum porttitor gravida. Felis pharetra odio molestie dis eros ipsum vel massa. Posuere magnis iaculis cubilia fames, in metus finibus eget convallis. Class amet nec a conubia turpis penatibus ligula commodo. Quis est risus erat ex metus.'),
(2, 2, 'CV builder', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(3, 1, 'Landing page', 'Lorem ipsum odor amet, consectetuer adipiscing elit. Cursus vestibulum sapien a orci etiam proin in. Primis varius ullamcorper sagittis placerat turpis curae ut. Magnis ligula penatibus volutpat efficitur placerat laoreet est litora.'),
(4, 2, 'Prototype mobile music app', 'Lorem ipsum odor amet, consectetuer adipiscing elit. Cursus vestibulum sapien a orci etiam proin in. Primis varius ullamcorper sagittis placerat turpis curae ut. Magnis ligula penatibus volutpat efficitur placerat laoreet est litora.');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `cv_id` int(11) DEFAULT NULL,
  `skill_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `cv_id`, `skill_name`) VALUES
(1, 1, 'PHP'),
(2, 2, 'React JS');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'ariva zweena', '$2y$10$/VPNVC3t8ear6n9yGkdiV.TtjbsWN1HF9tF0CkhdAiN9MJqZm1Vwq'),
(2, 'avira aneewz', '$2y$10$u1qFEzWd1s.OImKI0rBXbeSJLGeY53Z2Gu8KTJ385uQBnfRE9sQza');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `certifications`
--
ALTER TABLE `certifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cv_id` (`cv_id`);

--
-- Indexes for table `creative`
--
ALTER TABLE `creative`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cv_id` (`cv_id`);

--
-- Indexes for table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cv_id` (`cv_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cv_id` (`cv_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cv_id` (`cv_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `certifications`
--
ALTER TABLE `certifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `creative`
--
ALTER TABLE `creative`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `certifications`
--
ALTER TABLE `certifications`
  ADD CONSTRAINT `certifications_ibfk_1` FOREIGN KEY (`cv_id`) REFERENCES `creative` (`id`);

--
-- Constraints for table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `education_ibfk_1` FOREIGN KEY (`cv_id`) REFERENCES `creative` (`id`);

--
-- Constraints for table `experiences`
--
ALTER TABLE `experiences`
  ADD CONSTRAINT `experiences_ibfk_1` FOREIGN KEY (`cv_id`) REFERENCES `creative` (`id`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`cv_id`) REFERENCES `creative` (`id`);

--
-- Constraints for table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_ibfk_1` FOREIGN KEY (`cv_id`) REFERENCES `creative` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
