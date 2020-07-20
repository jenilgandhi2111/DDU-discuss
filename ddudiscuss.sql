-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2020 at 06:57 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ddudiscuss`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(8) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` varchar(1255) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category`, `description`, `date_added`) VALUES
(1, 'Competetive programming', 'Competitive programming is a mind sport usually held over the Internet or a local network, involving participants trying to program according to provided specifications. Contestants are referred to as sport programmers. Here we could discuss problems', '2020-05-28 23:13:36'),
(3, 'C programming', 'C is a general-purpose, procedural computer programming language supporting structured programming, lexical variable scope, and recursion, with a static type system. By design, C provides constructs that map efficiently to typical machine instructions. ', '2020-05-29 12:16:51'),
(4, 'Java', 'Java is a general-purpose programming language that is class-based, object-oriented, and designed to have as few implementation dependencies as possible.This is one of earliest programming languages It is still used', '2020-05-30 12:04:43'),
(5, 'PHP', 'PHP is a popular general-purpose scripting language that is especially suited to web development. It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1994; the PHP reference implementation is now produced by The PHP Group', '2020-05-30 12:05:08'),
(6, '.NET', '.NET Framework is a software framework developed by Microsoft that runs primarily on Microsoft Windows. It includes a large class library called Framework Class Library and provides language interoperability across several programming languages', '2020-05-30 12:05:33'),
(8, 'Python', 'Python is an interpreted, high-level, general-purpose programming language. Created by Guido van Rossum and first released in 1991, Python\'s design philosophy emphasizes code readability with its notable use of significant whitespace.this is the most widely used language', '2020-06-01 10:53:50'),
(9, 'Machine Learning', 'Machine learning is the study of computer algorithms that improve automatically through experience. It is seen as a subset of artificial intelligence.this helps reducing human efforts by analyzing the given data and gives out certian predictions', '2020-06-03 15:13:45');

-- --------------------------------------------------------

--
-- Table structure for table `discussion_threads`
--

CREATE TABLE `discussion_threads` (
  `sr.no` int(123) NOT NULL,
  `user_id` int(123) NOT NULL,
  `answer` text NOT NULL,
  `thread_id` int(123) NOT NULL,
  `date_added` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `Srno` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `project_title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `link` text NOT NULL,
  `date-added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE `queries` (
  `Srno` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `Date-added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

CREATE TABLE `rules` (
  `Srno` int(100) NOT NULL,
  `Rule` text NOT NULL,
  `date-added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`Srno`, `Rule`, `date-added`) VALUES
(1, 'Bullying is strictly prohibited in this forum if found the user could be banned.', '2020-05-30 11:11:24'),
(2, 'Treat your fellow learners with respect', '2020-05-30 11:12:55'),
(3, 'Insulting, condescending, or abusive words will not be tolerated', '2020-05-30 11:13:12'),
(4, 'Do not harass other learners.', '2020-05-30 11:13:21'),
(5, 'Polite debate is welcome as long as you are discussing the ideas, not attacking the person.', '2020-05-30 11:13:34'),
(6, 'Remember that DDU-discuss is a  forum with learners from many different cultures and backgrounds.', '2020-05-30 11:13:46'),
(7, 'Be kind, thoughtful, and open-minded when discussing race, religion, gender, sexual orientation, or controversial topics since others likely have differing perspectives.', '2020-05-30 11:13:59'),
(8, 'Do not post copyrighted content.', '2020-05-30 11:15:32'),
(9, 'Do not advertise or promote outside products or organizations.', '2020-05-30 11:15:42'),
(10, 'Posts that violate this Code may be deleted or made invisible to other students by any forum moderator.', '2020-05-30 11:15:56'),
(11, 'Students who repeatedly break these rules may be removed from the site and/or may lose access to the DDU Discuss site.', '2020-05-30 11:16:30'),
(12, 'If someone is violating the Code of Conduct, you can report them by contacting us on the mail address confusedjogger01@gmail.com', '2020-05-30 11:17:10');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(8) NOT NULL,
  `thread_title` varchar(255) NOT NULL,
  `thread_desc` text NOT NULL,
  `thread_cat_id` int(255) NOT NULL,
  `thread_user_id` int(233) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp(),
  `code` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL DEFAULT 'admin',
  `Institution` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `role` varchar(100) DEFAULT NULL,
  `expert_in` varchar(255) NOT NULL DEFAULT '',
  `Answered` int(200) NOT NULL,
  `contact_info` varchar(100) NOT NULL,
  `date-added` datetime NOT NULL DEFAULT current_timestamp(),
  `photo` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `discussion_threads`
--
ALTER TABLE `discussion_threads`
  ADD PRIMARY KEY (`sr.no`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`Srno`);

--
-- Indexes for table `queries`
--
ALTER TABLE `queries`
  ADD PRIMARY KEY (`Srno`);

--
-- Indexes for table `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`Srno`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `discussion_threads`
--
ALTER TABLE `discussion_threads`
  MODIFY `sr.no` int(123) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `Srno` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `Srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rules`
--
ALTER TABLE `rules`
  MODIFY `Srno` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
