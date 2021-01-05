-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2019 at 08:42 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectallocation`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `id` int(10) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `pic` text NOT NULL,
  `role` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `surname`, `firstname`, `username`, `password`, `pic`, `role`, `status`) VALUES
(1, 'omopariola', 'kayode', 'admin', 'admin', 'uploads/admin2.jpg', 'Super Administrator', 'Activated'),
(3, 'Komolafe', 'Adekunle', 'Ade', 'TgZuWjtU0Q', 'uploads/admin2.jpg', 'Administrator', 'Activated'),
(5, 'sada', 'ismail', 'sada', 'B4N2QMGG22', 'uploads/admin2.jpg', 'Administrator', 'Activated');

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` int(10) NOT NULL,
  `lect_id` int(10) NOT NULL,
  `course_id` int(10) NOT NULL,
  `course_title` varchar(200) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `course_unit` int(5) NOT NULL,
  `level` varchar(10) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `assignment` text NOT NULL,
  `filename` text NOT NULL,
  `descr` text NOT NULL,
  `percent` int(3) NOT NULL,
  `datee` date NOT NULL,
  `timee` time NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`id`, `lect_id`, `course_id`, `course_title`, `course_code`, `course_unit`, `level`, `semester`, `assignment`, `filename`, `descr`, `percent`, `datee`, `timee`, `status`) VALUES
(1, 1, 3, 'PHP SCRIPTNG LANGUAGESSS', 'COM 425', 3, 'HND2', 'Second', 'assignments/C++ PROGRAMMIMG.docx', 'C++ Programming language', 'mid semester assignments', 20, '2017-05-20', '06:05:55', 'Active'),
(2, 1, 6, 'C++ Programming Language', 'COM 313', 3, 'HND1', 'First', 'assignments/SEMINAR TOPICS IN COMPUTER SCIENCE.docx', 'seminar', 'seminar assignment', 10, '2017-05-20', '06:05:28', 'Active'),
(3, 2, 12, 'DATABASE MANAGEMENT 1', 'COM 312', 3, 'HND1', 'First', 'assignments/SEMINAR TOPICS IN COMPUTER SCIENCE.docx', 'assignment 1', 'how to login', 10, '2017-05-30', '05:05:14', 'Active'),
(4, 2, 12, 'DATABASE MANAGEMENT 1', 'COM 312', 3, 'HND1', 'First', 'assignments/Tutorial preparations.doc', 'assignment2', 'how to create a database', 10, '2017-05-30', '05:05:20', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `assign_course`
--

CREATE TABLE `assign_course` (
  `id` int(10) NOT NULL,
  `lec_id` int(10) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `course_id` int(10) NOT NULL,
  `course_title` varchar(50) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `course_unit` varchar(3) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `level` varchar(5) NOT NULL,
  `session` varchar(30) NOT NULL,
  `datee` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign_course`
--

INSERT INTO `assign_course` (`id`, `lec_id`, `surname`, `firstname`, `course_id`, `course_title`, `course_code`, `course_unit`, `semester`, `level`, `session`, `datee`, `status`) VALUES
(1, 1, 'KAYODE', 'OMOPARIOLA', 3, 'PHP SCRIPTNG LANGUAGESSS', 'COM 425', '3', 'Second', 'HND2', '2016/2017 ', '2017-05-19', 'Assigned'),
(2, 1, 'KAYODE', 'OMOPARIOLA', 6, 'C++ Programming Language', 'COM 313', '3', 'First', 'HND1', '2016/2017 ', '2017-05-19', 'Assigned'),
(5, 1, 'KAYODE', 'OMOPARIOLA', 9, 'Artificial Intelligence', 'COM 423', '3', 'First', 'ND1', '2016/2017 ', '2017-05-28', 'Assigned'),
(6, 2, 'EZEKIEL', 'OLAYINKA', 12, 'DATABASE MANAGEMENT 1', 'COM 312', '3', 'First', 'HND1', '2016/2017 ', '2017-05-30', 'Assigned');

-- --------------------------------------------------------

--
-- Table structure for table `assign_students`
--

CREATE TABLE `assign_students` (
  `assignId` int(10) NOT NULL,
  `studentId` varchar(20) NOT NULL,
  `lecturerId` varchar(255) NOT NULL,
  `session` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL,
  `dateReg` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign_students`
--

INSERT INTO `assign_students` (`assignId`, `studentId`, `lecturerId`, `session`, `status`, `dateReg`) VALUES
(3, 'HCSF/15/0009', 'ola', '2016/2017 ', 'Assigned', '2019-05-29');

-- --------------------------------------------------------

--
-- Table structure for table `blog_table`
--

CREATE TABLE `blog_table` (
  `sn` int(10) NOT NULL,
  `category` varchar(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `pic` text NOT NULL,
  `blog_text` text NOT NULL,
  `datee` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_table`
--

INSERT INTO `blog_table` (`sn`, `category`, `title`, `description`, `pic`, `blog_text`, `datee`, `time`) VALUES
(1, 'Sport', 'Manchester United spank Chelsea 2-0.', 'A Premier league game between Manchester United F.C.  and Chelsea F.C. at Old Trafford on Sunday, April 16th 2017 (Easter Sunday).', '', 'A Premier league game between Manchester United F.C.  and Chelsea F.C. at Old Trafford on Sunday, April 16th 2017 (Easter Sunday).Transportation Minister, Mr. Rotimi Amaechi, has given Messrs. Femi Fani-Kayode and Lere Olayinka a seven-day ultimatum to tender an unreserved apology over their claims that he is the owner of the $43 million found by the Economic and Financial Crimes Commission (EFCC) in an apartment at Osborne Towers on Bourdillon Road, Ikoyi, Lagos. The duo also alleged on Twitter that the apartment is owned by Mr. Amaechi, while Mr. Olayinka, a media aide to Mr. Ayodele Fayose of Ekiti State, alleged that Mr. Amaechi is involved in an adulterous relationship.', '0000-00-00', '00:00:00'),
(2, 'Sport', 'Manchester United spank Chelsea 2-0.', 'A Premier league game between Manchester United F.C.  and Chelsea F.C. at Old Trafford on Sunday, April 16th 2017 (Easter Sunday).', 'aughlaas.jpg', 'A Premier league game between Manchester United F.C.  and Chelsea F.C. at Old Trafford on Sunday, April 16th 2017 (Easter Sunday).', '0000-00-00', '00:00:00'),
(3, 'Advert', 'Manchester United spank Chelsea 2-0.', 'A Premier league game between Manchester United F.C.  and Chelsea F.C. at Old Trafford on Sunday, April 16th 2017 (Easter Sunday).', 'aughlaas.jpg', 'A Premier league game between Manchester United F.C.  and Chelsea F.C. at Old Trafford on Sunday, April 16th 2017 (Easter Sunday).', '0000-00-00', '00:00:00'),
(4, 'Sport', 'Manchester United spank Chelsea 2-0.', 'A Premier league game between Manchester United F.C.  and Chelsea F.C. at Old Trafford on Sunday, April 16th 2017 (Easter Sunday).', '', 'A Premier league game between Manchester United F.C.  and Chelsea F.C. at Old Trafford on Sunday, April 16th 2017 (Easter Sunday).', '0000-00-00', '00:00:00'),
(5, 'Sport', 'Manchester United 2 Chelsea 0', 'A Premier league game between Manchester United F.C.  and Chelsea F.C. at Old Trafford on Sunday, April 16th 2017 (Easter Sunday).', '', 'A Premier league game between Manchester United F.C.  and Chelsea F.C. at Old Trafford on Sunday, April 16th 2017 (Easter Sunday).', '0000-00-00', '00:00:00'),
(6, 'Politics', 'Manchester United spank Chelsea 2-0.', 'A Premier league game between Manchester United F.C.  and Chelsea F.C. at Old Trafford on Sunday, April 16th 2017 (Easter Sunday).', '', 'A Premier league game between Manchester United F.C.  and Chelsea F.C. at Old Trafford on Sunday, April 16th 2017 (Easter Sunday).', '2017-04-16', '00:00:00'),
(7, 'Sport', 'Manchester United spank Chelsea 2-0.', 'A Premier league game between Manchester United F.C.  and Chelsea F.C. at Old Trafford on Sunday, April 16th 2017 (Easter Sunday).', '', 'A Premier league game between Manchester United F.C.  and Chelsea F.C. at Old Trafford on Sunday, April 16th 2017 (Easter Sunday).', '2017-04-16', '00:00:00'),
(8, 'Advert', 'Manchester United 2 Chelsea 0', 'A Premier league game between Manchester United F.C.  and Chelsea F.C. at Old Trafford on Sunday, April 16th 2017 (Easter Sunday).', '', 'A Premier league game between Manchester United F.C.  and Chelsea F.C. at Old Trafford on Sunday, April 16th 2017 (Easter Sunday).', '2017-04-16', '23:16:13'),
(9, 'Entertainment', 'Happy Birthday King Sunny Ade..!', 'King Sunny Ade was congratulated by family and friends on his 70th birthday.', '', 'King Sunny Ade was congratulated by family and friends on his 70th birthday, as well entertainers home and abroad.\r\nInnocent Idibia pka 2face or 2baba led his Nigerian counterparts to congratulate KSA with a glamorous plague.', '2017-04-17', '03:05:02'),
(11, 'Sport', 'jghkhj', 'kkjkj', '', 'gfdff', '2017-04-17', '10:07:39'),
(13, 'Entertainment', 'Nobody Is Equal to Me, Wizkid Boasts', 'Nobody Is Equal to Me, Wizkid Boasts', '', 'Nobody Is Equal to Me, Wizkid Boasts', '2017-04-17', '10:10:13'),
(14, 'Entertainment', 'jjjjjjjjjA Premier league game between Manchester United F.C.  and Chelsea F.C. at Old Trafford on Sunday, April 16th 2017 (Easter Sunday).', 'A Premier league game between Manchester United F.C.  and Chelsea F.C. at Old Trafford on Sunday, April 16th 2017 (Easter Sunday).', 'aughlaas.jpg', 'Transportation Minister, Mr. Rotimi Amaechi, has given Messrs. Femi Fani-Kayode and Lere Olayinka a seven-day ultimatum to tender an unreserved apology over their claims that he is the owner of the $43 million found by the Economic and Financial Crimes Commission (EFCC) in an apartment at Osborne Towers on Bourdillon Road, Ikoyi, Lagos. The duo also alleged on Twitter that the apartment is owned by Mr. Amaechi, while Mr. Olayinka, a media aide to Mr. Ayodele Fayose of Ekiti State, alleged that Mr. Amaechi is involved in an adulterous relationship.                                                                \n\nThe minister''s demand for an apology and compensation was made in letters addressed to Messrs. Fani-Kayode, spokesperson to former President Goodluck Jonathan Campaign Organization, and Olayinka by his lawyers, Lateef Fagbemi and Co. Dated 14 April, both letters said the Transport Minister wants the withdrawal of the tweet using @realFFK to claim: "The $43 million is Rotimi Amaechi''s. He owns the flat it was found in too. NIA story is fake news! NIA does not keep cash in Minister''s flats!"\n\nThe $43 million is Rotimi Amaechi''s.He owns the flat it was found in too.NIA story is fake news! NIA does not keep cash in Minister''s flats!\n\n— Femi Fani-Kayode (@realFFK) April 14, 2017\n                           \nMr. Olayinka''s Facebook posts, noted Mr. Amaechi''s lawyers, said: "The Osborne Towers, a luxury residential complex in Ikoyi, Lagos, where the EFCC said it found $43,447,947,27, 000 pounds (sic) and N23,218, 000 on Wednesday, is owned by Minister of Transportation, Rotimi Amaechi. The house was built by Alhaji Adamu Muazu, the former Chairman of PDP through a loan from GTBank. He could not repay the loan so GTB took over the house and allocated the penthouse to Muazu and two flats. Rotimi Amaechi bought  TWO of the flats (7A and 7B). He then gave 7A to Mo Abudu, the TV presenter; who is suspected to be his girlfriend."        \n\nFor Mr. Fani-Kayode, Mr. Amaechi noted that as a lawyer, the spokesperson to ex-President Goodluck Jonathan''s campaign organization should know that anyone desirous of finding out the ownership of a property, "especially in a world class land documentation system and facilities like Lagos State should avail himself of the facilities by conducting a diligent  search in the land registry".        \n\n"You intentionally failed to do so as to achieve your malicious aim. For the umpteenth time, let it be known that our client,  Hon. Rotimi Chibuike Amaechi, has no house anywhere in Lagos," the letter stated.  \n\nMr. Amaechi''s lawyers noted that Mr. Fani-Kayode''s tweet on 14 April was viewed 316,000 followers, retweeted 1,209 times and favorited by 434 followers at the time they wrote the letter, noting that the numbers were still rising, a condition required for a successful defamation case.          \n\nOn account of these, Mr. Amaechi''s lawyers, on the instruction of their client, gave a seven-day ultimatum to Mr. Fani-Kayode to issue an apology to be published in five major national newspapers and payment of N500 million in compensatory damages to avoid litigation.                                  \n\nFor Mr. Olayinka, the lawyers reckoned that his position as a government official should imbue him with the knowledge of processes of property checks. The lawyers noted that Mr. Olayinka''s Facebook posts of 13 April was viewed by 5,000 friends, with 47 likes, 84 comments and 43 shares. Mr. Amaechi''s lawyers also noted that their client is innocent of the allegation of adultery brought against him by Mr. Olayinka, noting that his posts provide a valid ground for defamation.              \n\n"In light of the foregoing and in the spirit of second chance, we have our client''s instructions to give you an ultimatum of seven days from the receipt of this letter to issue an apology in five national  dailies and your Twitter handle. Your apology, which should be heartfelt, must be a total withdrawal of your claim and its imputation, must also contain an expression of deep regret for this unwarranted attack and must also contain a retraction of the false statement of yours," said Mr. Amaechi''s lawyers.                                                                            \n\nIn addition, they are also demanding the sum of N750 million, which could increase if the publication is not immediately retracted. Failure to meet the demands, warned the lawyers, would attract litigation. Transportation Minister, Mr. Rotimi Amaechi, has given Messrs. Femi Fani-Kayode and Lere Olayinka a seven-day ultimatum to tender an unreserved apology over their claims that he is the owner of the $43 million found by the Economic and Financial Crimes Commission (EFCC) in an apartment at Osborne Towers on Bourdillon Road, Ikoyi, Lagos. The duo also alleged on Twitter that the apartment is owned by Mr. Amaechi, while Mr. Olayinka, a media aide to Mr. Ayodele Fayose of Ekiti State, alleged that Mr. Amaechi is involved in an adulterous relationship.                                                                \n\nThe minister''s demand for an apology and compensation was made in letters addressed to Messrs. Fani-Kayode, spokesperson to former President Goodluck Jonathan Campaign Organization, and Olayinka by his lawyers, Lateef Fagbemi and Co. Dated 14 April, both letters said the Transport Minister wants the withdrawal of the tweet using @realFFK to claim: "The $43 million is Rotimi Amaechi''s. He owns the flat it was found in too. NIA story is fake news! NIA does not keep cash in Minister''s flats!"\n\nThe $43 million is Rotimi Amaechi''s.He owns the flat it was found in too.NIA story is fake news! NIA does not keep cash in Minister''s flats!\n\n— Femi Fani-Kayode (@realFFK) April 14, 2017\n                           \nMr. Olayinka''s Facebook posts, noted Mr. Amaechi''s lawyers, said: "The Osborne Towers, a luxury residential complex in Ikoyi, Lagos, where the EFCC said it found $43,447,947,27, 000 pounds (sic) and N23,218, 000 on Wednesday, is owned by Minister of Transportation, Rotimi Amaechi. The house was built by Alhaji Adamu Muazu, the former Chairman of PDP through a loan from GTBank. He could not repay the loan so GTB took over the house and allocated the penthouse to Muazu and two flats. Rotimi Amaechi bought  TWO of the flats (7A and 7B). He then gave 7A to Mo Abudu, the TV presenter; who is suspected to be his girlfriend."        \n\nFor Mr. Fani-Kayode, Mr. Amaechi noted that as a lawyer, the spokesperson to ex-President Goodluck Jonathan''s campaign organization should know that anyone desirous of finding out the ownership of a property, "especially in a world class land documentation system and facilities like Lagos State should avail himself of the facilities by conducting a diligent  search in the land registry".        \n\n"You intentionally failed to do so as to achieve your malicious aim. For the umpteenth time, let it be known that our client,  Hon. Rotimi Chibuike Amaechi, has no house anywhere in Lagos," the letter stated.  \n\nMr. Amaechi''s lawyers noted that Mr. Fani-Kayode''s tweet on 14 April was viewed 316,000 followers, retweeted 1,209 times and favorited by 434 followers at the time they wrote the letter, noting that the numbers were still rising, a condition required for a successful defamation case.          \n\nOn account of these, Mr. Amaechi''s lawyers, on the instruction of their client, gave a seven-day ultimatum to Mr. Fani-Kayode to issue an apology to be published in five major national newspapers and payment of N500 million in compensatory damages to avoid litigation.                                  \n\nFor Mr. Olayinka, the lawyers reckoned that his position as a government official should imbue him with the knowledge of processes of property checks. The lawyers noted that Mr. Olayinka''s Facebook posts of 13 April was viewed by 5,000 friends, with 47 likes, 84 comments and 43 shares. Mr. Amaechi''s lawyers also noted that their client is innocent of the allegation of adultery brought against him by Mr. Olayinka, noting that his posts provide a valid ground for defamation.              \n\n"In light of the foregoing and in the spirit of second chance, we have our client''s instructions to give you an ultimatum of seven days from the receipt of this letter to issue an apology in five national  dailies and your Twitter handle. Your apology, which should be heartfelt, must be a total withdrawal of your claim and its imputation, must also contain an expression of deep regret for this unwarranted attack and must also contain a retraction of the false statement of yours," said Mr. Amaechi''s lawyers.                                                                            \n\nIn addition, they are also demanding the sum of N750 million, which could increase if the publication is not immediately retracted. Failure to meet the demands, warned the lawyers, would attract litigation. ', '2017-04-18', '01:10:35'),
(15, 'Advert', 'gdvghdbkjfd', 'hjfshjdhjdghdgkh', '', 'Transportation Minister, Mr. Rotimi Amaechi, has given Messrs. Femi Fani-Kayode and Lere Olayinka a seven-day ultimatum to tender an unreserved apology over their claims that he is the owner of the $43 million found by the Economic and Financial Crimes Commission (EFCC) in an apartment at Osborne Towers on Bourdillon Road, Ikoyi, Lagos. The duo also alleged on Twitter that the apartment is owned by Mr. Amaechi, while Mr. Olayinka, a media aide to Mr. Ayodele Fayose of Ekiti State, alleged that Mr. Amaechi is involved in an adulterous relationship.                                                                \n\nThe minister''s demand for an apology and compensation was made in letters addressed to Messrs. Fani-Kayode, spokesperson to former President Goodluck Jonathan Campaign Organization, and Olayinka by his lawyers, Lateef Fagbemi and Co. Dated 14 April, both letters said the Transport Minister wants the withdrawal of the tweet using @realFFK to claim: "The $43 million is Rotimi Amaechi''s. He owns the flat it was found in too. NIA story is fake news! NIA does not keep cash in Minister''s flats!"\n\nThe $43 million is Rotimi Amaechi''s.He owns the flat it was found in too.NIA story is fake news! NIA does not keep cash in Minister''s flats!\n\n— Femi Fani-Kayode (@realFFK) April 14, 2017\n                           \nMr. Olayinka''s Facebook posts, noted Mr. Amaechi''s lawyers, said: "The Osborne Towers, a luxury residential complex in Ikoyi, Lagos, where the EFCC said it found $43,447,947,27, 000 pounds (sic) and N23,218, 000 on Wednesday, is owned by Minister of Transportation, Rotimi Amaechi. The house was built by Alhaji Adamu Muazu, the former Chairman of PDP through a loan from GTBank. He could not repay the loan so GTB took over the house and allocated the penthouse to Muazu and two flats. Rotimi Amaechi bought  TWO of the flats (7A and 7B). He then gave 7A to Mo Abudu, the TV presenter; who is suspected to be his girlfriend."        \n\nFor Mr. Fani-Kayode, Mr. Amaechi noted that as a lawyer, the spokesperson to ex-President Goodluck Jonathan''s campaign organization should know that anyone desirous of finding out the ownership of a property, "especially in a world class land documentation system and facilities like Lagos State should avail himself of the facilities by conducting a diligent  search in the land registry".        \n\n"You intentionally failed to do so as to achieve your malicious aim. For the umpteenth time, let it be known that our client,  Hon. Rotimi Chibuike Amaechi, has no house anywhere in Lagos," the letter stated.  \n\nMr. Amaechi''s lawyers noted that Mr. Fani-Kayode''s tweet on 14 April was viewed 316,000 followers, retweeted 1,209 times and favorited by 434 followers at the time they wrote the letter, noting that the numbers were still rising, a condition required for a successful defamation case.          \n\nOn account of these, Mr. Amaechi''s lawyers, on the instruction of their client, gave a seven-day ultimatum to Mr. Fani-Kayode to issue an apology to be published in five major national newspapers and payment of N500 million in compensatory damages to avoid litigation.                                  \n\nFor Mr. Olayinka, the lawyers reckoned that his position as a government official should imbue him with the knowledge of processes of property checks. The lawyers noted that Mr. Olayinka''s Facebook posts of 13 April was viewed by 5,000 friends, with 47 likes, 84 comments and 43 shares. Mr. Amaechi''s lawyers also noted that their client is innocent of the allegation of adultery brought against him by Mr. Olayinka, noting that his posts provide a valid ground for defamation.              \n\n"In light of the foregoing and in the spirit of second chance, we have our client''s instructions to give you an ultimatum of seven days from the receipt of this letter to issue an apology in five national  dailies and your Twitter handle. Your apology, which should be heartfelt, must be a total withdrawal of your claim and its imputation, must also contain an expression of deep regret for this unwarranted attack and must also contain a retraction of the false statement of yours," said Mr. Amaechi''s lawyers.                                                                            \n\nIn addition, they are also demanding the sum of N750 million, which could increase if the publication is not immediately retracted. Failure to meet the demands, warned the lawyers, would attract litigation. ', '2017-04-18', '01:26:21'),
(16, 'Advert', 'jdghA Premier league game between Manchester United F.C.  and Chelsea F.C. at Old Trafford on Sunday, April 16th 2017 (Easter Sunday).', 'fhgngfjjn fjhn', 'aughlaas.jpg', 'Transportation Minister, Mr. Rotimi Amaechi, has given Messrs. Femi Fani-Kayode and Lere Olayinka a seven-day ultimatum to tender an unreserved apology over their claims that he is the owner of the $43 million found by the Economic and Financial Crimes Commission (EFCC) in an apartment at Osborne Towers on Bourdillon Road, Ikoyi, Lagos. The duo also alleged on Twitter that the apartment is owned by Mr. Amaechi, while Mr. Olayinka, a media aide to Mr. Ayodele Fayose of Ekiti State, alleged that Mr. Amaechi is involved in an adulterous relationship.                                                                \n\nThe minister''s demand for an apology and compensation was made in letters addressed to Messrs. Fani-Kayode, spokesperson to former President Goodluck Jonathan Campaign Organization, and Olayinka by his lawyers, Lateef Fagbemi and Co. Dated 14 April, both letters said the Transport Minister wants the withdrawal of the tweet using @realFFK to claim: "The $43 million is Rotimi Amaechi''s. He owns the flat it was found in too. NIA story is fake news! NIA does not keep cash in Minister''s flats!"\n\nThe $43 million is Rotimi Amaechi''s.He owns the flat it was found in too.NIA story is fake news! NIA does not keep cash in Minister''s flats!\n\n— Femi Fani-Kayode (@realFFK) April 14, 2017\n                           \nMr. Olayinka''s Facebook posts, noted Mr. Amaechi''s lawyers, said: "The Osborne Towers, a luxury residential complex in Ikoyi, Lagos, where the EFCC said it found $43,447,947,27, 000 pounds (sic) and N23,218, 000 on Wednesday, is owned by Minister of Transportation, Rotimi Amaechi. The house was built by Alhaji Adamu Muazu, the former Chairman of PDP through a loan from GTBank. He could not repay the loan so GTB took over the house and allocated the penthouse to Muazu and two flats. Rotimi Amaechi bought  TWO of the flats (7A and 7B). He then gave 7A to Mo Abudu, the TV presenter; who is suspected to be his girlfriend."        \n\nFor Mr. Fani-Kayode, Mr. Amaechi noted that as a lawyer, the spokesperson to ex-President Goodluck Jonathan''s campaign organization should know that anyone desirous of finding out the ownership of a property, "especially in a world class land documentation system and facilities like Lagos State should avail himself of the facilities by conducting a diligent  search in the land registry".        \n\n"You intentionally failed to do so as to achieve your malicious aim. For the umpteenth time, let it be known that our client,  Hon. Rotimi Chibuike Amaechi, has no house anywhere in Lagos," the letter stated.  \n\nMr. Amaechi''s lawyers noted that Mr. Fani-Kayode''s tweet on 14 April was viewed 316,000 followers, retweeted 1,209 times and favorited by 434 followers at the time they wrote the letter, noting that the numbers were still rising, a condition required for a successful defamation case.          \n\nOn account of these, Mr. Amaechi''s lawyers, on the instruction of their client, gave a seven-day ultimatum to Mr. Fani-Kayode to issue an apology to be published in five major national newspapers and payment of N500 million in compensatory damages to avoid litigation.                                  \n\nFor Mr. Olayinka, the lawyers reckoned that his position as a government official should imbue him with the knowledge of processes of property checks. The lawyers noted that Mr. Olayinka''s Facebook posts of 13 April was viewed by 5,000 friends, with 47 likes, 84 comments and 43 shares. Mr. Amaechi''s lawyers also noted that their client is innocent of the allegation of adultery brought against him by Mr. Olayinka, noting that his posts provide a valid ground for defamation.              \n\n"In light of the foregoing and in the spirit of second chance, we have our client''s instructions to give you an ultimatum of seven days from the receipt of this letter to issue an apology in five national  dailies and your Twitter handle. Your apology, which should be heartfelt, must be a total withdrawal of your claim and its imputation, must also contain an expression of deep regret for this unwarranted attack and must also contain a retraction of the false statement of yours," said Mr. Amaechi''s lawyers.                                                                            \n\nIn addition, they are also demanding the sum of N750 million, which could increase if the publication is not immediately retracted. Failure to meet the demands, warned the lawyers, would attract litigation. ', '2017-04-18', '01:34:45'),
(17, 'Entertainment', 'About usA Premier league game between Manchester United F.C.  and Chelsea F.C. at Old Trafford on Sunday, April 16th 2017 (Easter Sunday).', 'Nobody Is Equal to Me, Wizkid Boasts', 'aughlaas.jpg', 'Defamation: Amaechi Seeks Apology, N1.2b Compensation From Fani-Kayode, Fayose''s Aide\n\n\n\n\nThe duo also alleged on Twitter that the apartment is owned by Mr. Amaechi, while Mr. Olayinka, a media aide to Mr. Ayodele Fayose of Ekiti State, alleged that Mr. Amaechi is involved in an adulterous relationship.\n\n\n\n\n\n\n\n\nTransportation Minister, Mr. Rotimi Amaechi, has given Messrs. Femi Fani-Kayode and Lere Olayinka a seven-day ultimatum to tender an unreserved apology over their claims that he is the owner of the $43 million found by the Economic and Financial Crimes Commission (EFCC) in an apartment at Osborne Towers on Bourdillon Road, Ikoyi, Lagos. The duo also alleged on Twitter that the apartment is owned by Mr. Amaechi, while Mr. Olayinka, a media aide to Mr. Ayodele Fayose of Ekiti State, alleged that Mr. Amaechi is involved in an adulterous relationship.                                                                \n\nThe minister''s demand for an apology and compensation was made in letters addressed to Messrs. Fani-Kayode, spokesperson to former President Goodluck Jonathan Campaign Organization, and Olayinka by his lawyers, Lateef Fagbemi and Co. Dated 14 April, both letters said the Transport Minister wants the withdrawal of the tweet using @realFFK to claim: "The $43 million is Rotimi Amaechi''s. He owns the flat it was found in too. NIA story is fake news! NIA does not keep cash in Minister''s flats!"\n\nThe $43 million is Rotimi Amaechi''s.He owns the flat it was found in too.NIA story is fake news! NIA does not keep cash in Minister''s flats!\n\n— Femi Fani-Kayode (@realFFK) April 14, 2017\n                           \nMr. Olayinka''s Facebook posts, noted Mr. Amaechi''s lawyers, said: "The Osborne Towers, a luxury residential complex in Ikoyi, Lagos, where the EFCC said it found $43,447,947,27, 000 pounds (sic) and N23,218, 000 on Wednesday, is owned by Minister of Transportation, Rotimi Amaechi. The house was built by Alhaji Adamu Muazu, the former Chairman of PDP through a loan from GTBank. He could not repay the loan so GTB took over the house and allocated the penthouse to Muazu and two flats. Rotimi Amaechi bought  TWO of the flats (7A and 7B). He then gave 7A to Mo Abudu, the TV presenter; who is suspected to be his girlfriend."        \n\nFor Mr. Fani-Kayode, Mr. Amaechi noted that as a lawyer, the spokesperson to ex-President Goodluck Jonathan''s campaign organization should know that anyone desirous of finding out the ownership of a property, "especially in a world class land documentation system and facilities like Lagos State should avail himself of the facilities by conducting a diligent  search in the land registry".        \n\n"You intentionally failed to do so as to achieve your malicious aim. For the umpteenth time, let it be known that our client,  Hon. Rotimi Chibuike Amaechi, has no house anywhere in Lagos," the letter stated.  \n\nMr. Amaechi''s lawyers noted that Mr. Fani-Kayode''s tweet on 14 April was viewed 316,000 followers, retweeted 1,209 times and favorited by 434 followers at the time they wrote the letter, noting that the numbers were still rising, a condition required for a successful defamation case.          \n\nOn account of these, Mr. Amaechi''s lawyers, on the instruction of their client, gave a seven-day ultimatum to Mr. Fani-Kayode to issue an apology to be published in five major national newspapers and payment of N500 million in compensatory damages to avoid litigation.                                  \n\nFor Mr. Olayinka, the lawyers reckoned that his position as a government official should imbue him with the knowledge of processes of property checks. The lawyers noted that Mr. Olayinka''s Facebook posts of 13 April was viewed by 5,000 friends, with 47 likes, 84 comments and 43 shares. Mr. Amaechi''s lawyers also noted that their client is innocent of the allegation of adultery brought against him by Mr. Olayinka, noting that his posts provide a valid ground for defamation.              \n\n"In light of the foregoing and in the spirit of second chance, we have our client''s instructions to give you an ultimatum of seven days from the receipt of this letter to issue an apology in five national  dailies and your Twitter handle. Your apology, which should be heartfelt, must be a total withdrawal of your claim and its imputation, must also contain an expression of deep regret for this unwarranted attack and must also contain a retraction of the false statement of yours," said Mr. Amaechi''s lawyers.                                                                            \n\nIn addition, they are also demanding the sum of N750 million, which could increase if the publication is not immediately retracted. Failure to meet the demands, warned the lawyers, would attract litigation. ', '2017-04-18', '01:39:21'),
(20, 'Advert', 'Advertising our Products', 'its all about us', 'good.jpg', 'eat,sleep and code', '2017-04-21', '01:26:23');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(10) NOT NULL,
  `course_title` varchar(50) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `course_unit` int(2) NOT NULL,
  `level` varchar(10) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `course_title`, `course_code`, `course_unit`, `level`, `semester`, `status`) VALUES
(3, 'PHP SCRIPTNG LANGUAGESSS', 'COM 425', 3, 'HND2', 'Second', 'Activated'),
(5, 'INTRODUCTION TO COMPUTING', 'COM 111', 3, 'ND1', 'First', 'Activated'),
(6, 'C++ Programming Language', 'COM 313', 3, 'HND1', 'First', 'Activated'),
(9, 'Artificial Intelligence', 'COM 423', 3, 'HND2', 'Second', 'Activated'),
(12, 'DATABASE MANAGEMENT 1', 'COM 312', 3, 'HND1', 'First', 'Activated');

-- --------------------------------------------------------

--
-- Table structure for table `group_name_table`
--

CREATE TABLE `group_name_table` (
  `sn` int(5) NOT NULL,
  `group_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_name_table`
--

INSERT INTO `group_name_table` (`sn`, `group_name`) VALUES
(1, 'Robotics'),
(2, 'Programming');

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE `lecturer` (
  `id` int(10) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pic` text NOT NULL,
  `phone` varchar(12) NOT NULL,
  `password` varchar(50) NOT NULL,
  `staffType` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`id`, `surname`, `firstname`, `sex`, `username`, `pic`, `phone`, `password`, `staffType`, `status`) VALUES
(1, 'KAYODE', 'OMOPARIOLA', 'Male', 'ola', 'uploads/lecturer.jpg', '080987466477', 'ola', 'Full Time', 'Activated'),
(2, 'EZEKIEL', 'OLAYINKA', 'Male', 'kayode', 'uploads/lecturer.jpg', '080987466477', 'ada', 'Full Time', 'Activated'),
(3, 'OLA', 'OLA', 'Male', 'olamide', 'uploads/lecturer.jpg', '080987466477', 'olamide', 'Full Time', 'Activated'),
(6, 'Owolabi', 'Thomas', 'Male', 'owolabithomas@yahoo.com', 'uploads/lecturer.jpg', '09067637637', 'owo', 'Part Time', 'Activated');

-- --------------------------------------------------------

--
-- Table structure for table `lecturer_login`
--

CREATE TABLE `lecturer_login` (
  `id` int(10) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `staffType` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecturer_login`
--

INSERT INTO `lecturer_login` (`id`, `surname`, `firstname`, `username`, `password`, `staffType`) VALUES
(1, 'KAYODE', 'OMOPARIOLA', 'ola', 'ola', 'Full Time'),
(2, 'EZEKIEL', 'OLAYINKA', 'kayode', 'kayode', 'Full Time'),
(3, 'OLA', 'OLA', 'olamide', 'olamide', 'Full Time'),
(4, 'ahmed', 'sodiq', 'ola', 'olaa', 'Part Time'),
(5, 'Kemi', 'vkhbk', 'ahmedsodiq7@gmail.com', 'aaa', 'Part Time');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(5) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(10) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `surname`, `firstname`, `username`, `password`) VALUES
(2, 'AHMED', 'SODIQ', 'OLA', 'OLA'),
(3, 'omopariola', 'kayode', 'kay', 'kay'),
(5, 'Omolodun', 'Gbolahan', 'dan', 'dan'),
(9, 'omopariola', 'tolu', 'tolu', 'tolu'),
(10, 'ajao', 'sodiq', 'good', 'good');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `messageId` int(10) NOT NULL,
  `studentId` varchar(255) NOT NULL,
  `lecturerId` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `dateSent` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project_chapters`
--

CREATE TABLE `project_chapters` (
  `projChapId` int(10) NOT NULL,
  `studentId` varchar(50) NOT NULL,
  `topicId` int(10) NOT NULL,
  `lecturerId` varchar(10) NOT NULL,
  `chapter` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `status2` varchar(50) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `dateActivated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_chapters`
--

INSERT INTO `project_chapters` (`projChapId`, `studentId`, `topicId`, `lecturerId`, `chapter`, `status`, `status2`, `startDate`, `endDate`, `dateActivated`) VALUES
(1, 'HCSF/15/0049', 3, 'ola', 'Chapter One', 'Activated', 'Completed', '2019-05-31', '2019-06-08', '2019-05-31'),
(2, 'HCSF/15/0049', 3, 'ola', 'Chapter Two', 'Activated', 'Ongoing', '2019-06-28', '2019-07-18', '2019-06-05'),
(4, 'HCSF/15/0009', 2, 'ola', 'Chapter One', 'Activated', 'Completed', '2019-07-10', '2019-07-12', '2019-07-09'),
(5, 'HCSF/15/0009', 2, 'ola', 'Chapter Two', 'Activated', 'Ongoing', '2019-07-17', '2019-07-17', '2019-07-09');

-- --------------------------------------------------------

--
-- Table structure for table `project_writeups`
--

CREATE TABLE `project_writeups` (
  `projWriteupId` int(10) NOT NULL,
  `studentId` varchar(255) NOT NULL,
  `lecturerId` varchar(255) NOT NULL,
  `topicId` int(10) NOT NULL,
  `chapterId` varchar(255) NOT NULL,
  `writeup` text NOT NULL,
  `descr` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `lecturersComment` text NOT NULL,
  `dateSubmitted` date NOT NULL,
  `dateApproved` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_writeups`
--

INSERT INTO `project_writeups` (`projWriteupId`, `studentId`, `lecturerId`, `topicId`, `chapterId`, `writeup`, `descr`, `status`, `lecturersComment`, `dateSubmitted`, `dateApproved`) VALUES
(1, 'HCSF/15/0049', 'ola', 3, '1', 'writeups/Bakare_RealCV.docx', '', 'Approved', 'Approved Proceed to chapter two write up. don exceed project timeline nThanks', '2019-06-04', '2019-06-05'),
(2, 'HCSF/15/0049', 'ola', 3, '1', 'writeups/Bakare_RealCV.docx', '', 'Rejected', 'dcadca', '2019-06-04', '2019-06-05'),
(3, 'HCSF/15/0049', 'ola', 3, '1', 'writeups/Akinola Adebayo CV.pdf', 'hfngnfgn', 'Rejected', 'dasdas', '2019-06-04', '2019-06-05'),
(4, 'HCSF/15/0009', 'ola', 2, '4', 'writeups/576.pdf', 'firts', 'Approved', 'good ', '2019-07-09', '2019-07-09');

-- --------------------------------------------------------

--
-- Table structure for table `research_topic_table`
--

CREATE TABLE `research_topic_table` (
  `sn` int(5) NOT NULL,
  `group_name` varchar(50) NOT NULL,
  `manager_name` varchar(50) NOT NULL,
  `research_topic` varchar(100) NOT NULL,
  `research_status` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `research_topic_table`
--

INSERT INTO `research_topic_table` (`sn`, `group_name`, `manager_name`, `research_topic`, `research_status`) VALUES
(2, 'Mechanics', 'Omopariola Kayode', 'How to design a Beebot architecture', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `software`
--

CREATE TABLE `software` (
  `id` int(5) NOT NULL,
  `studentId` text NOT NULL,
  `link` varchar(50) NOT NULL,
  `dateReg` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `software`
--

INSERT INTO `software` (`id`, `studentId`, `link`, `dateReg`) VALUES
(4, 'HCSF/15/0009', 'https://github.com/sawdyk/BirthandDeathMgtSyst.git', '2019-07-09');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `othername` varchar(50) NOT NULL,
  `matricno` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `pic` text NOT NULL,
  `level` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `surname`, `firstname`, `othername`, `matricno`, `password`, `sex`, `pic`, `level`, `status`) VALUES
(3, 'omopariola', 'kayode', 'ezekiel', 'HCSF/15/0009', 'kay', 'Male', 'uploads/IMG_0138.PNG', 'HND2', 'Activated'),
(5, 'Omolodun', 'Gbolahan', 'Daniel', 'NCSF/15/0008', 'dan', 'Male', 'uploads/student.jpg', 'ND2', 'Activated'),
(9, 'omopariola', 'tolu', 'josh', 'NCSF/15/0032', 'tolu', 'Male', 'uploads/student.jpg', 'ND2', 'Activated'),
(12, 'BAMIDELE', 'MOBOLA', 'ZAINAB', 'HCSF/15/0001', 'EW2OS', 'Female', 'uploads/student.jpg', 'HND1', 'Activated'),
(18, 'GAMBARI', 'KAZEEM', 'OLAYIWOLA', 'HCSF/15/0003', 'akanni4real', 'Male', 'uploads/20.jpg', 'HND2', 'Activated'),
(19, 'SALISU', 'RASAQ', 'ADEKUNLE', 'HCSF/15/0032', 'vuShI', 'Male', 'uploads/student.jpg', 'HND2', 'Activated'),
(22, 'adfaaa', 'adad', 'adfa', 'HCSF/15/0022', '1212', 'Female', 'uploads/student.jpg', 'HND2', 'Activate');

-- --------------------------------------------------------

--
-- Table structure for table `student_topics`
--

CREATE TABLE `student_topics` (
  `stdTopicId` int(10) NOT NULL,
  `studentId` varchar(50) NOT NULL,
  `topicId` int(15) NOT NULL,
  `status` varchar(50) NOT NULL,
  `proposal` text NOT NULL,
  `lecturersComment` text NOT NULL,
  `dateReg` date NOT NULL,
  `dateApproved` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_topics`
--

INSERT INTO `student_topics` (`stdTopicId`, `studentId`, `topicId`, `status`, `proposal`, `lecturersComment`, `dateReg`, `dateApproved`) VALUES
(3, 'HCSF/15/0049', 3, 'Approved', 'proposals/Bakare_RealCV.docx', 'This Topic has been approved, u may continue with chapter one', '2019-05-30', '2019-06-05'),
(9, 'HCSF/15/0049', 6, 'Pending', 'proposals/Bakare_RealCV.docx', 'asdad', '2019-05-30', '2019-06-05'),
(10, 'HCSF/15/0049', 5, 'Pending', 'proposals/Bakare_RealCV.docx', 'dede', '2019-05-30', '2019-06-05'),
(11, 'HCSF/15/0009', 2, 'Approved', 'proposals/402.pdf', 'Proceed with this topic', '2019-07-09', '2019-07-09'),
(12, 'HCSF/15/0009', 4, 'Pending', 'proposals/105.pdf', '', '2019-07-09', '0000-00-00'),
(14, 'HCSF/15/0009', 5, 'Pending', 'proposals/Cooperatives API Endpoints (3).pdf', '', '2019-07-09', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `sub_assignments`
--

CREATE TABLE `sub_assignments` (
  `id` int(11) NOT NULL,
  `lect_id` int(10) NOT NULL,
  `asgnid` int(5) NOT NULL,
  `stud_matricno` varchar(20) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `course_title` varchar(1000) NOT NULL,
  `assignment` text NOT NULL,
  `filename` varchar(100) NOT NULL,
  `descr` varchar(100) NOT NULL,
  `sub_assignment` text NOT NULL,
  `datesub` date NOT NULL,
  `timesub` time NOT NULL,
  `status` varchar(20) NOT NULL,
  `percent` int(10) NOT NULL,
  `score` int(10) NOT NULL,
  `remark` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_assignments`
--

INSERT INTO `sub_assignments` (`id`, `lect_id`, `asgnid`, `stud_matricno`, `course_code`, `course_title`, `assignment`, `filename`, `descr`, `sub_assignment`, `datesub`, `timesub`, `status`, `percent`, `score`, `remark`) VALUES
(1, 1, 2, 'HCSF/16/0067', 'COM 313', 'C++ Programming Language', 'assignments/SEMINAR TOPICS IN COMPUTER SCIENCE.docx', 'seminar', 'seminar assignment', 'assignments/ _STUDENT ID.pdf', '2017-05-30', '06:05:13', 'Submitted', 10, 0, ''),
(2, 2, 3, 'HCSF/16/0067', 'COM 312', 'DATABASE MANAGEMENT 1', 'assignments/SEMINAR TOPICS IN COMPUTER SCIENCE.docx', 'assignment 1', 'how to login', 'assignments/ _STUDENT ID.pdf', '2017-05-30', '06:05:35', 'Submitted', 10, 5, ''),
(3, 2, 4, 'HCSF/16/0067', 'COM 312', 'DATABASE MANAGEMENT 1', 'assignments/Tutorial preparations.doc', 'assignment2', 'how to create a database', 'assignments/0c91a05522b1c4a156f110606a3d3bb0.jpg', '2017-05-30', '06:05:07', 'Submitted', 10, 8, '');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `topicId` int(12) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topicId`, `name`, `code`, `status`) VALUES
(2, 'Design and Implementation of Online Voting System', 'VOTE112', 'Activated'),
(3, 'Design and Implementation of Online Car Rental Management System', 'CARRENTAL111', 'Activated'),
(4, 'Design and Implementation of Online Banking System', 'BNKPRO690', 'Activated'),
(5, 'Design and Implementation of Online Shopping System', 'SHOP111', 'Activated');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_course`
--
ALTER TABLE `assign_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_students`
--
ALTER TABLE `assign_students`
  ADD PRIMARY KEY (`assignId`);

--
-- Indexes for table `blog_table`
--
ALTER TABLE `blog_table`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`,`course_code`);

--
-- Indexes for table `group_name_table`
--
ALTER TABLE `group_name_table`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecturer_login`
--
ALTER TABLE `lecturer_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`messageId`);

--
-- Indexes for table `project_chapters`
--
ALTER TABLE `project_chapters`
  ADD PRIMARY KEY (`projChapId`);

--
-- Indexes for table `project_writeups`
--
ALTER TABLE `project_writeups`
  ADD PRIMARY KEY (`projWriteupId`);

--
-- Indexes for table `research_topic_table`
--
ALTER TABLE `research_topic_table`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `software`
--
ALTER TABLE `software`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_topics`
--
ALTER TABLE `student_topics`
  ADD PRIMARY KEY (`stdTopicId`);

--
-- Indexes for table `sub_assignments`
--
ALTER TABLE `sub_assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topicId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `assign_course`
--
ALTER TABLE `assign_course`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `assign_students`
--
ALTER TABLE `assign_students`
  MODIFY `assignId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `blog_table`
--
ALTER TABLE `blog_table`
  MODIFY `sn` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `group_name_table`
--
ALTER TABLE `group_name_table`
  MODIFY `sn` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `lecturer`
--
ALTER TABLE `lecturer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `lecturer_login`
--
ALTER TABLE `lecturer_login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `messageId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `project_chapters`
--
ALTER TABLE `project_chapters`
  MODIFY `projChapId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `project_writeups`
--
ALTER TABLE `project_writeups`
  MODIFY `projWriteupId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `research_topic_table`
--
ALTER TABLE `research_topic_table`
  MODIFY `sn` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `software`
--
ALTER TABLE `software`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `student_topics`
--
ALTER TABLE `student_topics`
  MODIFY `stdTopicId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `sub_assignments`
--
ALTER TABLE `sub_assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `topicId` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
