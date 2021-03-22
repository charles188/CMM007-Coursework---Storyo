

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `storyo`
--

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `mediaid` int(12) NOT NULL,
  `userid` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `audio` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postid` int(13) NOT NULL,
  `userid` int(11) NOT NULL,
  `mediaid` int(12) NOT NULL,
  `postdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `title` varchar(37) NOT NULL,
  `description` varchar(255) NOT NULL,
  `story` text NOT NULL,
  `location` varchar(50) NOT NULL,
  `category` varchar(30) NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `age` int(2) NOT NULL,
  `address` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `profession` varchar(30) NOT NULL,
  `usertype` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `firstname`, `lastname`, `email`, `password`, `gender`, `age`, `address`, `state`, `country`, `profession`, `usertype`) VALUES
(4, 'Guest', 'User', 'guestuser@gmail.com', 'guest', 'male', 29, '23 Martins Lane', 'Scotland', 'United Kingdom', 'Engineer', 'C'),
(5, 'Storyteller', 'User', 'storytelleruser@gmail.com', 'storyteller', 'male', 45, '16 George Street', 'Northern Ireland', 'United Kingdom', 'Archaeologist', 'B'),
(6, 'Azeez', 'Abdul', 'azeez@yahoo.com', 'azeez', 'male', 25, '3 Bode Thomas Surulere', 'Lagos', 'Nigeria', 'Pharmacologist', 'C'),
(7, 'Admin', 'User', 'adminuser@gmail.com', 'admin', 'male', 30, '16 George Street', 'Scotland', 'United Kingdom', 'Software Developer', 'A'),
(8, 'Tosin', 'Oluwadara', 'tosin@yahoo.com', 'tosin', 'female', 21, '14 Ikoyi Street', 'Lagos', 'Nigeria', 'Sales Representative', 'C'),
(9, 'Taofeek', 'Hammed', 'htolajide@yahoo.com', 'a6b944fc65c184ca6b096593a895ba76', 'male', 30, 'EMDI', 'Ondo', 'Nigeria', 'Developer', 'C'),
(10, 'Kabir', 'Hammed', 'kabir@yahoo.com', 'c1621fbecc04b7b7911b982fe585c8d8', 'male', 25, 'Iseyin', 'Oyo', 'Nigeria', 'Farmer', 'B');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`mediaid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `mediaid` (`mediaid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `mediaid` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postid` int(13) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`),
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`mediaid`) REFERENCES `media` (`mediaid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
