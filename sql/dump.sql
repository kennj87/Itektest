SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `answers` (
  `ID` int(16) NOT NULL,
  `sum` int(30) NOT NULL,
  `a1` int(2) NOT NULL,
  `a2` int(2) NOT NULL,
  `a3` int(2) NOT NULL,
  `a4` int(2) NOT NULL,
  `a5` int(2) NOT NULL,
  `a6` int(2) NOT NULL,
  `a7` int(2) NOT NULL,
  `a8` int(2) NOT NULL,
  `a9` int(2) NOT NULL,
  `a10` int(2) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `questions` (
  `ID` int(16) NOT NULL,
  `q1` varchar(100) NOT NULL,
  `p1` int(2) NOT NULL,
  `q2` varchar(100) NOT NULL,
  `p2` int(2) NOT NULL,
  `q3` varchar(100) NOT NULL,
  `p3` int(2) NOT NULL,
  `headline` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `test` (
  `ID` int(16) NOT NULL,
  `name` varchar(50) NOT NULL,
  `pass_threshold` int(2) NOT NULL,
  `start` int(16) NOT NULL,
  `teacher` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `testee` (
  `ID` int(16) NOT NULL,
  `username` varchar(32) NOT NULL,
  `time_start` int(16) NOT NULL,
  `time_end` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `answers`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `questions`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `test`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `testee`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `answers`
  MODIFY `ID` int(16) NOT NULL AUTO_INCREMENT;

ALTER TABLE `questions`
  MODIFY `ID` int(16) NOT NULL AUTO_INCREMENT;

ALTER TABLE `testee`
  MODIFY `ID` int(16) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
