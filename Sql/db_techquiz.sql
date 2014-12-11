-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 20, 2013 at 05:22 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_techquiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `question_bank`
--

CREATE TABLE `question_bank` (
  `que_id` int(10) NOT NULL,
  `question` varchar(300) NOT NULL,
  `option1` varchar(150) NOT NULL,
  `option2` varchar(150) NOT NULL,
  `option3` varchar(150) NOT NULL,
  `option4` varchar(150) NOT NULL,
  `answer` char(1) NOT NULL,
  `category` int(1) NOT NULL,
  `isDeleted` int(1) NOT NULL,
  PRIMARY KEY  (`que_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_bank`
--

INSERT INTO `question_bank` (`que_id`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`, `category`, `isDeleted`) VALUES
(1, 'PHP is a widely used .................. scripting language that is especially suited for web development and can be embedded into html', 'Open source general purpose', 'Proprietary general purpose', 'Open source special purpose', 'Proprietary special purpose', 'A', 2, 0),
(2, ' Which of the following is not true?', 'PHP can be used to develop web applications.', ' PHP makes a website dynamic.', 'PHP applications can not be compiled.', 'PHP can not be embedded into html.', 'D', 2, 0),
(3, 'The most portable version of PHP tag that is compatible to embed in XML or XHTML too is:', '<? ?>', '<script language="php"> </script>', '<% %>', '<?php ?>', 'D', 2, 0),
(4, 'Which of the following variables is not a predefined variable?', '$get', '$ask', '$request', '$post', 'B', 2, 0),
(5, 'You can define a constant by using the define() function. Once a constant is defined', 'It can never be changed or undefined', 'It can never be changed but can be undefined', 'It can be changed but can not be undefined', 'It can be changed and can be undefined', 'A', 2, 0),
(6, 'Which of the following function returns the number of characters in a string variable?', 'count($variable)', 'len($variable)', 'strcount($variable)', 'strlen($variable)', 'D', 2, 0),
(7, 'When you need to obtain the ASCII value of a character which of the following function you apply in PHP?', 'chr( );', 'asc( );', 'ord( );', 'val( );', 'C', 2, 0),
(8, 'A variable $word is set to "HELLO WORLD", which of the following script returns in title case?', 'echo ucwords($word)', 'echo ucwords(strtolower($word)', 'echo ucfirst($word)', 'echo ucfirst(strtolower($word)', 'B', 2, 0),
(9, 'The difference between include() and require()', 'are different how they handle failure', 'both are same in every aspects', 'is include() produced a Fatal Error while require results in a Warning', 'none of above', 'A', 2, 0),
(10, 'When a file is included the code it contains, behave for variable scope of the line on which the include occurs', 'Any variable available at that line in the calling file will be available within the called file from that point', 'Any variable available at that line in the calling file will not be available within the called file', 'Variables are local in both called and calling files', 'None of above', 'A', 2, 0),
(11, 'Which of the following method sends input to a script via a URL?', 'Get', 'Post', 'Both', 'None', 'A', 2, 0),
(12, 'Which of the following mode of fopen() function opens a file only for writing. If a file with that name does not exist, attempts to create anew file. If the file exist, place the file pointer at the end of the file after all other data.', 'W', 'W+', 'A', 'A+', 'C', 2, 0),
(13, 'The function setcookie( ) is used to', 'Enable or disable cookie support', 'Declare cookie variables', 'Store data in cookie variable', 'All of above', 'C', 2, 0),
(14, 'To work with remote files in PHP you need to enable', 'allow_url_fopen', 'allow_remote_files', 'both of above', 'none of above', 'A', 2, 0),
(15, 'What PHP stands for?	', 'Hypertext Preprocessor', 'Pre Hypertext Processor', 'Pre Hyper Processor', 'Pre Hypertext Process', 'D', 2, 0),
(16, 'On which of the operating system below ASP.NET can run?', 'Windows XP Professional', 'Windows 2000 ', 'Both A and B', 'None of the Above', 'C', 1, 0),
(17, 'An organization has developed a web service in which the values of the forms are validated using ASP.NET application. Suppose this web service is got and used by a customer then in such a scenario which of the following is TRUE', 'Such a situation cannot happen at all ', 'The customer must be having technology that run ASP.', 'The customer can run on any platform.', 'None of the Above', 'C', 1, 0),
(18, 'Which of the following denote the web control associated with Table control function of ASP.NET?', 'DataList', 'ListBox', 'TableRow', 'All the Above', 'C', 1, 0),
(19, 'ASP.NET separates the HTML output from program logic using a feature named as', 'Exception', 'Code-behind', 'Code-front ', 'None of the above', 'C', 1, 0),
(20, 'If a developer of ASP.NET defines style information in a common location. Then that     location is called as  ', 'Master Page ', 'Theme', 'Customization ', 'None of the Above', 'B', 1, 0),
(21, 'In ASP.NET if you want to allows page developers a way to specify static connections in a content page then the class used is ', 'WebPartManager', 'ProxyWebPartManager', 'System.Activator ', 'None of the AboveNone of the Above', 'B', 1, 0),
(22, 'The feature in ASP.NET 2.0 that is used to fire a normal postback to a different page in the application is called ', 'Theme', 'Cross Page Posting ', 'Code-front', 'None of the above', 'B', 1, 0),
(23, 'In ASP.NET if one uses Windows authentication the current request attaches an object called as', 'Serialization', 'WindowsPrincipal ', 'WindowDatset   ', 'None of the Above', 'B', 1, 0),
(24, 'The GridView control in ASP.NET has which of the following features', 'Automatic data binding ', 'Automatic paging', 'Both A and B', 'None of the above', 'C', 1, 0),
(25, 'If one uses ASP.NET configuration system to restrict access which of the following is TRUE?', 'The access is restricted only to ASP.NET files', 'The access is restricted only to static files and non-ASP.NET resources.', 'Both A and B', 'None of the Above', 'A', 1, 0),
(26, 'Which of the following is true about session in ASP.NET?', 'Programmers has to take care of delete sessions after configurable timeout interval', 'ASP.NET automatically delete sessions after configurable timeout interval', 'The default time interval is 5 minutes', 'None of the Above', 'B', 1, 0),
(27, 'In ASP.NET what does the following return < % Response.Write(System.Environment.WorkingSet.ToString()) % >', 'None of the Above', 'Gives Error', 'Return Null value', 'Gives the memory working set', 'D', 1, 0),
(28, 'In ASP.NET if one wants to maintain session then which of the following is used?', 'In-process storage', 'Microsoft SQL Server ', 'Session State Service ', 'All the Above', 'D', 1, 0),
(29, 'To set page title dynamically in ASP.NET which of the following is used?', 'None of the above', '<sheet> section', '<tail> section', '<head> section', 'D', 1, 0),
(30, 'Which of the following can be used to debug .NET application?', 'Systems.Diagnostics classes', 'Runtime Debugger', 'Visual Studio .NET', 'All the Above', 'D', 1, 0),
(31, 'Data scrubbing is which of the following?', 'A process to reject data from the data warehouse and to create the necessary indexes', 'A process to load the data in the data warehouse and to create the necessary indexes', 'A process to upgrade the quality of data after it is moved into a data warehouse', 'A process to upgrade the quality of data before it is moved into a data warehouse', 'D', 3, 0),
(32, 'A goal of data mining includes which of the following?', 'To explain some observed event or condition', 'To confirm that data exists', 'To analyze data for expected relationships', 'To create a new data warehouse', 'A', 3, 0),
(33, 'An operational system is which of the following?', 'A system that is used to run the business in real time and is based on historical data.', 'A system that is used to run the business in real time and is based on current data.', 'A system that is used to support decision making and is based on current data.', 'A system that is used to support decision making and is based on historical data.', 'B', 3, 0),
(34, 'A data warehouse is which of the following?', 'Can be updated by end users.', 'Contains numerous naming conventions and formats.', 'Organized around important subject areas.', 'Contains only current data.', 'C', 3, 0),
(35, 'A snowflake schema is which of the following types of tables?', 'Fact', 'Dimension', 'Helper', 'All of the above', 'D', 3, 0),
(36, 'Fact tables are which of the following?', 'Completely denormalized', 'Partially denormalized', 'Completely normalized', 'Partially normalized', 'C', 3, 0),
(37, 'Data transformation includes which of the following?', 'A process to change data from a detailed level to a summary level', 'A process to change data from a summary level to a detailed level', 'Joining data from one source into various sources of data', 'Separating data from one source into various sources of data', 'A', 3, 0),
(38, 'A star schema has what type of relationship between a dimension and fact table?', 'Many-to-many', 'One-to-one', 'One-to-many', 'All of the above.', 'C', 3, 0),
(39, 'Reconciled data is which of the following?', 'Data stored in the various operational systems throughout the organization.', 'Current data intended to be the single source for all decision support systems.', 'Data stored in one operational system in the organization.', 'Data that has been selected and formatted for end-user support applications', 'B', 3, 0),
(40, 'The load and index is which of the following?', 'A process to reject data from the data warehouse and to create the necessary indexes', 'A process to load the data in the data warehouse and to create the necessary indexes', 'A process to upgrade the quality of data after it is moved into a data warehouse', 'A process to upgrade the quality of data before it is moved into a data warehouse', 'B', 3, 0),
(41, 'The extract process is which of the following?', 'Capturing all of the data contained in various operational systems', 'Capturing a subset of the data contained in various operational systems', 'Capturing all of the data contained in various decision support systems', 'Capturing a subset of the data contained in various decision support systems', 'B', 3, 0),
(42, 'Transient data is which of the following?', 'Data in which changes to existing records cause the previous version of the records to be eliminated', 'Data in which changes to existing records do not cause the previous version of the records to be eliminated', 'Data that are never altered or deleted once they have been added', 'Data that are never deleted once they have been added', 'A', 3, 0),
(43, 'A multifield transformation does which of the following?', 'Converts data from one field into multiple fields', 'Converts data from multiple fields into one field', 'Converts data from multiple fields into multiple fields', 'All of the above', 'D', 3, 0),
(44, 'What is ETL Stand for?', 'Execute tramit and load', 'Extract transform and load', 'Excute Transform and load', 'All the above', 'B', 3, 0),
(45, 'Data warehousing uses data from:', 'daily reports only.', 'diverse applications and locations', 'diverse applications, but one location.', 'many locations, but one application', 'B', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_info`
--

CREATE TABLE `quiz_info` (
  `quiz_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `date_time` datetime NOT NULL,
  `category` int(1) NOT NULL,
  `score` varchar(10) NOT NULL,
  PRIMARY KEY  (`quiz_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_info`
--

INSERT INTO `quiz_info` (`quiz_id`, `user_id`, `date_time`, `category`, `score`) VALUES
(1, 1, '2013-11-19 03:46:16', 2, '9 / 10'),
(2, 1, '2013-11-19 06:11:49', 2, '0 / 10');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(7) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(104) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `occupation` int(1) NOT NULL,
  `gender` enum('f','m') NOT NULL,
  `birth_date` date NOT NULL,
  `isActive` int(1) NOT NULL,
  `role` int(1) NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `username`, `password`, `first_name`, `last_name`, `occupation`, `gender`, `birth_date`, `isActive`, `role`) VALUES
(1, 'ushma.gajjar@gmail.com', '602310c867b248bb31e9d2da81e9a1dcc670fd1c', 'Ushma', 'Gajjar', 1, 'f', '1993-03-28', 1, 1),
(2, 'nishi.gajjar@gmail.com', '88a25545ceb4dfb8fedcc05fac328eaa7277f730', 'Nishi', 'Gajjar', 1, 'f', '2010-05-30', 1, 2),
(3, 'dhruvil.gajjar@yahoo.com', '0285964ac46a5521404b34c12d039578a14a5bbb', 'Dhruvil', 'Gajjar', 1, 'm', '2006-02-25', 1, 2),
(4, 'janvi.suthar@gmail.com', '0b8fe875ac590d37d7f0ac06586d4d1a3e6c3191', 'Janvi', 'Suthar', 1, 'f', '2000-07-17', 1, 2),
(5, 'aadi.gajjar@ymail.com', '7d4456af1b1cd61740100150df4cc9aac8a0fb2d', 'Aadi', 'Gajjar', 2, 'm', '2012-09-06', 1, 2),
(6, 'rudra.suthar@gmail.com', '31e77d8c147171c66a664542947872deb7f94b45', 'Rudra', 'Suthar', 3, 'm', '2000-01-28', 1, 2),
(7, 'rudra.suthar@gmail.com', '31e77d8c147171c66a664542947872deb7f94b45', 'Rudra', 'Suthar', 3, 'm', '2000-01-28', 1, 2),
(8, 'rudra.suthar@gmail.com', '31e77d8c147171c66a664542947872deb7f94b45', 'Rudra', 'Suthar', 3, 'm', '2000-01-28', 1, 2);
