-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2025 at 07:19 PM
-- Server version: 8.0.37
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentperfomance`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `classID` int NOT NULL,
  `className` varchar(20) DEFAULT NULL,
  `studentID` int DEFAULT NULL,
  `teacherID` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `marksID` int NOT NULL,
  `grade` varchar(2) DEFAULT NULL,
  `scores` int DEFAULT NULL,
  `studentID` int DEFAULT NULL,
  `subjectID` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `userID` int NOT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `username` varchar(10) DEFAULT NULL,
  `UserRole` varchar(20) DEFAULT NULL,
  `gender` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `studentsdetails`
--

CREATE TABLE `studentsdetails` (
  `studentID` int NOT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `age` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `studentsdetails`
--

INSERT INTO `studentsdetails` (`studentID`, `firstname`, `lastname`, `gender`, `age`) VALUES
(1, 'Ark', 'Blessing', 'MALE', 25),
(2, 'mercy', 'Ampaire', 'FEMALE', 2222),
(3, 'Akandinda', 'Blessing', 'FEMALE', 50),
(4, 'Joel', 'Atuhe', 'MALE', 67),
(5, 'Joel', 'Mike', 'MALE', 12);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subjectID` int NOT NULL,
  `Subjectname` varchar(20) DEFAULT NULL,
  `teacherID` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teacherresponsible`
--

CREATE TABLE `teacherresponsible` (
  `teacherID` int NOT NULL,
  `teacherName` varchar(45) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Telephone` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `teacherresponsible`
--

INSERT INTO `teacherresponsible` (`teacherID`, `teacherName`, `Gender`, `Telephone`) VALUES
(1, 'John', 'MALE', 22222222),
(2, 'James', 'MALE', 555);

-- --------------------------------------------------------

--
-- Table structure for table `term`
--

CREATE TABLE `term` (
  `termID` int NOT NULL,
  `termName` varchar(20) DEFAULT NULL,
  `duration` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`classID`),
  ADD KEY `studentID` (`studentID`),
  ADD KEY `teacherID` (`teacherID`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`marksID`),
  ADD KEY `studentID` (`studentID`),
  ADD KEY `subjectID` (`subjectID`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `studentsdetails`
--
ALTER TABLE `studentsdetails`
  ADD PRIMARY KEY (`studentID`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subjectID`),
  ADD KEY `teacherID` (`teacherID`);

--
-- Indexes for table `teacherresponsible`
--
ALTER TABLE `teacherresponsible`
  ADD PRIMARY KEY (`teacherID`);

--
-- Indexes for table `term`
--
ALTER TABLE `term`
  ADD PRIMARY KEY (`termID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `classID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `marksID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `userID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `studentsdetails`
--
ALTER TABLE `studentsdetails`
  MODIFY `studentID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subjectID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacherresponsible`
--
ALTER TABLE `teacherresponsible`
  MODIFY `teacherID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `term`
--
ALTER TABLE `term`
  MODIFY `termID` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `studentsdetails` (`studentID`),
  ADD CONSTRAINT `class_ibfk_2` FOREIGN KEY (`teacherID`) REFERENCES `teacherresponsible` (`teacherID`);

--
-- Constraints for table `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `marks_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `studentsdetails` (`studentID`),
  ADD CONSTRAINT `marks_ibfk_2` FOREIGN KEY (`subjectID`) REFERENCES `subject` (`subjectID`);

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`teacherID`) REFERENCES `teacherresponsible` (`teacherID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
