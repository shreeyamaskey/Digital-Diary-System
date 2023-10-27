-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 06, 2021 at 07:27 AM
-- Server version: 5.7.30
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Computer_IA`
--

-- --------------------------------------------------------

--
-- Table structure for table `Entries`
--

CREATE TABLE `Entries` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Entries`
--

INSERT INTO `Entries` (`id`, `title`, `image`, `body`, `created_at`) VALUES
(1, 'Test 1', 'photo_test_1.jpeg', 'N3FlWnA1eS9PN0FMSlhYQkIxOHVFdlBaa1N5TWVtejIwR0pjSjdHemFJcUhnUzhOWi9lcnhVbHJmWGEwZGZLclo4Y1VNampaUm50SFQ5ZktuUjlRWTJUNEFvOFBRSWMxYS9mdEdUdHBpMzQ9OjrKxD4wSIWSX4Izj3y70Gh9', '2021-04-05 05:49:13'),
(11, 'Test_2', 'photo_test_2.jpeg', 'aFdPaVFCMzNxdlRobHJPTHpBUXQ3ZG5ZS3NYMGliRUVkYzNXRVRxQWVEY09hYi9oRHdlVktOQ2taQlZzZmtzdDFkdGlyNDJqbXA5QkJiSkJ1NGsyVVZVdTdlbG40OFJnN2trbmM0a0J5bTg9OjrqmpnMQZh3qgzNcwa65LRg', '2021-04-06 13:07:15');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `start`, `end`) VALUES
(9, 'testing', '2021-04-13 00:00:00', '2021-04-16 00:00:00'),
(12, 'event', '2021-04-20 00:00:00', '2021-04-23 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `Expenses`
--

CREATE TABLE `Expenses` (
  `id` int(11) NOT NULL,
  `Month` varchar(20) NOT NULL,
  `Year` int(4) NOT NULL,
  `Savings` int(11) NOT NULL,
  `Expenses` int(11) NOT NULL,
  `FinalSavings` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Expenses`
--

INSERT INTO `Expenses` (`id`, `Month`, `Year`, `Savings`, `Expenses`, `FinalSavings`) VALUES
(2, 'March', 2021, 600, 300, 300),
(3, 'February', 2019, 300, 150, 150),
(6, 'June', 2020, 400, 200, 200);

-- --------------------------------------------------------

--
-- Table structure for table `help`
--

CREATE TABLE `help` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `help`
--

INSERT INTO `help` (`id`, `title`, `info`) VALUES
(1, 'Entries (Create)', '<p>To create an entry in the Digital Diary, you need to use the \"Add Entry\' button</p> <br> <p>You can choose whether to add an image to your entry or not, however only the files with extensions \'png\', \'jpg\' and \'jpeg\'.</p>'),
(2, 'Entries (Search and Sort)', '<p>You can search for the entries you have created by entering the title of the entry in the search field titled \"Search for title\". You can as well search for the expenses by entering the time and/or date in the search field \"Search for time/date\"</p> <br> <p> You can as well sort the headings of the table by clicking on it. For example, if you want to access the title of the entries in an ascending order, you can just click on the heading \"Title\".</p>'),
(3, 'Entries (Edit and Delete)', '<p>To edit or delete the entries, you can click on the buttons named \"edit\" or \"delete\" under the \"Manage Entries\" button.</p> <br> <p>If you are updating your entry, your previous or new image should be chosen again in order for the updated entry to have an image.</p>'),
(4, 'Expenses (Save)', '<p>Under the expenses section, you can enter the data in the form and click on \"Save\". It will show the new inserted data in the table below.</p> <br> <p>There is also the calculation function where you can enter the first number and the second number, in order to calculate through the dropdown button to the side.</p>'),
(5, 'Expenses (Search and Sort)', '<p>You can search for the expenses you have created by entering the month of the expense in the search field titled \\\"Search for months\\\". You can as well search for the expenses by entering the year in the search field \\\"Search for year..\\\"</p> <br> <p> You can as well sort the headings of the table by clicking on it. For example, if you want to access the Savings in an ascending order, you can just click on the heading \\\"Savings\\\".</p>'),
(6, 'Expenses (Edit and Delete)', '<p>To edit or delete the expenses, you can click on the buttons named \"update\" or \"delete\"</p>'),
(7, 'Expenses Planner (Add)', '<p>You can click on the day you want to add your event to and name it. You can as well drag to resize the event and choose more than one day.</p>'),
(8, 'Planner (Update)', '<p>You can easily update your planner through drag and drop as it updates itself by itself.</p>'),
(9, 'Planner (Delete)', '<p>Once you add or update the events, you should once reload the planner in order to delete it by clicking on the event as it gives you the confirmation box to delete it.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Birthdate` date NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`id`, `Name`, `Birthdate`, `Username`, `Password`) VALUES
(1, 'Test', '2021-04-01', 'Test', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08'),
(6, 'Username', '2021-04-05', 'Username', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8'),
(10, 'Test123', '2021-04-06', 'Test123', '9b8769a4a742959a2d0298c36fb70623f2dfacda8436237df08d8dfd5b37374c');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Entries`
--
ALTER TABLE `Entries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Expenses`
--
ALTER TABLE `Expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `help`
--
ALTER TABLE `help`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Entries`
--
ALTER TABLE `Entries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `Expenses`
--
ALTER TABLE `Expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `help`
--
ALTER TABLE `help`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
