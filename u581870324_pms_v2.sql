-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2023 at 03:38 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u581870324_pms_v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `priority_level`
--

CREATE TABLE `priority_level` (
  `id` tinyint(4) NOT NULL,
  `priority_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `priority_level`
--

INSERT INTO `priority_level` (`id`, `priority_name`) VALUES
(1, 'Low'),
(2, 'Medium'),
(3, 'High');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `project_name` varchar(100) NOT NULL,
  `project_desc` varchar(100) NOT NULL,
  `client` varchar(100) DEFAULT NULL,
  `project_manager_id` int(11) NOT NULL,
  `project_status_id` tinyint(4) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `project_name`, `project_desc`, `client`, `project_manager_id`, `project_status_id`, `date_created`, `is_active`) VALUES
(8, 'Project 1', 'avawserwaasrw3erwesehgrhaweurhiweyurhiqwehruiwehwe', 'as', 4, 2, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `project_credentials`
--

CREATE TABLE `project_credentials` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project_credentials`
--

INSERT INTO `project_credentials` (`id`, `project_id`, `user_type`, `username`, `password`) VALUES
(1, 8, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `project_links`
--

CREATE TABLE `project_links` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `links` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project_links`
--

INSERT INTO `project_links` (`id`, `project_id`, `links`) VALUES
(1, 8, 'https://www.facebook.com/');

-- --------------------------------------------------------

--
-- Table structure for table `project_members`
--

CREATE TABLE `project_members` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project_members`
--

INSERT INTO `project_members` (`id`, `project_id`, `user_id`) VALUES
(3, 8, 3),
(4, 8, 5);

-- --------------------------------------------------------

--
-- Table structure for table `project_status`
--

CREATE TABLE `project_status` (
  `id` tinyint(4) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project_status`
--

INSERT INTO `project_status` (`id`, `status`) VALUES
(1, 'On Hold'),
(2, 'In Progress'),
(3, 'Completed'),
(4, 'Cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` tinyint(4) NOT NULL,
  `role_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role_name`) VALUES
(1, 'Developer'),
(2, 'Project Manager'),
(3, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` tinyint(4) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `task_name` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `priority_level_id` tinyint(4) DEFAULT NULL,
  `task_status_id` tinyint(4) DEFAULT NULL,
  `date_end` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `project_id`, `task_name`, `user_id`, `priority_level_id`, `task_status_id`, `date_end`) VALUES
(3, 8, 'a', 3, 3, 1, NULL),
(4, 8, 'task1', 5, 2, 2, NULL),
(5, 8, 'task2', 3, 3, 3, NULL),
(6, 8, 'task3', 3, 3, 4, NULL),
(7, 8, 'task4', 3, 3, 5, NULL),
(8, 8, 'task5', 3, 1, 7, '0000-00-00'),
(9, 8, 'task6', 3, 3, 6, '0000-00-00'),
(10, 8, 'task7', 3, 3, 7, '2023-04-21');

-- --------------------------------------------------------

--
-- Table structure for table `task_status`
--

CREATE TABLE `task_status` (
  `id` tinyint(4) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task_status`
--

INSERT INTO `task_status` (`id`, `status`) VALUES
(1, 'Pending'),
(2, 'On-Hold'),
(3, 'For Discussion'),
(4, 'For Fixing'),
(5, 'In QA'),
(6, 'In Progress'),
(7, 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `role_id` tinyint(4) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `middle_name`, `last_name`, `email`, `contact`, `role_id`, `is_active`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'a', 'a', 'a', 'a', 'a', 3, 1),
(3, 'tagarinomarvelousa@gmail.com', '4c7b6b1e08449c0b25d7b8e5bf7f5d16', 'Marvelous', 'Apellido', 'Tagarino', 'tagarinomarvelousa@gmail.com', '2147483647', 1, 1),
(4, 'rider@email.com', '4c7b6b1e08449c0b25d7b8e5bf7f5d16', 'Danilo', 'awrawea', 'Alegado', 'rider@email.com', '2147483647', 1, 1),
(5, 'juandelacruz@email.com', '4c7b6b1e08449c0b25d7b8e5bf7f5d16', 'Lina', 'B.', 'Alcantara', 'juandelacruz@email.com', '09043584257', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `priority_level`
--
ALTER TABLE `priority_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_manager_id` (`project_manager_id`),
  ADD KEY `project_status_id` (`project_status_id`);

--
-- Indexes for table `project_credentials`
--
ALTER TABLE `project_credentials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `project_links`
--
ALTER TABLE `project_links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `project_members`
--
ALTER TABLE `project_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `project_status`
--
ALTER TABLE `project_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `priority_level_id` (`priority_level_id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `task_status_id` (`task_status_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `task_status`
--
ALTER TABLE `task_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `priority_level`
--
ALTER TABLE `priority_level`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `project_credentials`
--
ALTER TABLE `project_credentials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `project_links`
--
ALTER TABLE `project_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `project_members`
--
ALTER TABLE `project_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `project_status`
--
ALTER TABLE `project_status`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `task_status`
--
ALTER TABLE `task_status`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`project_manager_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `project_ibfk_2` FOREIGN KEY (`project_status_id`) REFERENCES `project_status` (`id`);

--
-- Constraints for table `project_credentials`
--
ALTER TABLE `project_credentials`
  ADD CONSTRAINT `project_credentials_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`);

--
-- Constraints for table `project_links`
--
ALTER TABLE `project_links`
  ADD CONSTRAINT `project_links_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`);

--
-- Constraints for table `project_members`
--
ALTER TABLE `project_members`
  ADD CONSTRAINT `project_members_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`),
  ADD CONSTRAINT `project_members_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`priority_level_id`) REFERENCES `priority_level` (`id`),
  ADD CONSTRAINT `tasks_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`),
  ADD CONSTRAINT `tasks_ibfk_3` FOREIGN KEY (`task_status_id`) REFERENCES `task_status` (`id`),
  ADD CONSTRAINT `tasks_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
