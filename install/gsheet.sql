-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2017 at 07:42 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `dropler`
--

-- --------------------------------------------------------

--
-- Table structure for table `gsheet`
--

CREATE TABLE `gsheet` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `template` tinyint(1) UNSIGNED DEFAULT NULL,
  `datum` datetime DEFAULT NULL,
  `author` tinyint(1) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gsheet`
--

INSERT INTO `gsheet` (`id`, `name`, `url`, `content`, `template`, `datum`, `author`) VALUES
(1, 'drive to html insertion', 'https://docs.google.com/spreadsheets/d/1fQ4u38ELCax6qpXJIAKxl5jpuj-MQ0XAkvwKjbQcvYI/edit', '<p>https://docs.google.com/spreadsheets/d/1fQ4u38ELCax6qpXJIAKxl5jpuj-MQ0XAkvwKjbQcvYI/edit</p>\r\n', NULL, '2017-12-16 19:07:27', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gsheet`
--
ALTER TABLE `gsheet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gsheet`
--
ALTER TABLE `gsheet`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;