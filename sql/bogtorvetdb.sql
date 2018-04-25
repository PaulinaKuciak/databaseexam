-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2018 at 10:33 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bogtorvetdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `id` int(11) NOT NULL,
  `fullname` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id`, `fullname`) VALUES
(1, 'Stephen King'),
(2, 'Mark Twain'),
(3, 'Carlton Mellick III '),
(4, 'Sarah Crossan'),
(5, 'Becky Albertalli'),
(6, 'Lucy Edmonds ');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `title` varchar(99) NOT NULL,
  `price` int(11) NOT NULL,
  `isbn` int(11) NOT NULL,
  `language` varchar(99) NOT NULL,
  `publishyear` varchar(99) NOT NULL,
  `author_id` int(11) NOT NULL,
  `publisher_id` int(11) NOT NULL,
  `bookstore_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `title`, `price`, `isbn`, `language`, `publishyear`, `author_id`, `publisher_id`, `bookstore_id`) VALUES
(1, 'It', 200, 19283746, 'English', '2000', 1, 1, 2),
(2, 'Murder on the orient express', 125, 1254795, 'English', '2007', 4, 3, 4),
(3, 'The Frozen Charlotte', 245, 167585343, 'Polish', '2015', 1, 3, 6),
(4, 'Aerie', 265, 21549541, 'Russian', '2012', 6, 6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `bookstore`
--

CREATE TABLE `bookstore` (
  `id` int(11) NOT NULL,
  `name` varchar(99) NOT NULL,
  `location` varchar(99) NOT NULL,
  `phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookstore`
--

INSERT INTO `bookstore` (`id`, `name`, `location`, `phone`) VALUES
(1, 'Saxo', 'Denmark', 38150510),
(2, 'Gyldendal', 'Denmark', 58200115),
(3, 'Empik', 'Poland', 1212121),
(4, 'Matras', 'Germany', 4545454),
(5, 'Bog og Ide', 'Sweden', 15478452),
(6, 'Bogen', 'Norway', 5698523);

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `id` int(11) NOT NULL,
  `name` varchar(99) NOT NULL,
  `phone` int(11) NOT NULL,
  `website` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`id`, `name`, `phone`, `website`) VALUES
(1, 'Modern Library', 12345678, 'http://www.modernlibrary.com/'),
(2, 'Viking Press', 87654321, 'http://www.penguin.com/publishers/vikingbooks/'),
(3, 'HarperCollins Publishers', 124578, 'wwww.harpercollins.com'),
(4, 'Bloomsbury Publishing PLC', 2547842, 'www.bloomsbury.com'),
(5, 'Eraserhead Press', 44444444, 'www.eraserhead.com'),
(6, 'Balzer + Bray', 8457458, 'www.balzarnbray.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `publisher_id` (`publisher_id`),
  ADD KEY `bookstore_id` (`bookstore_id`);

--
-- Indexes for table `bookstore`
--
ALTER TABLE `bookstore`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `bookstore`
--
ALTER TABLE `bookstore`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `author_book_FK` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `bookstore_book_FK` FOREIGN KEY (`bookstore_id`) REFERENCES `bookstore` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `publisher_book_FK` FOREIGN KEY (`publisher_id`) REFERENCES `publisher` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
