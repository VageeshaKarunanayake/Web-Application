-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 08, 2019 at 09:40 AM
-- Server version: 10.3.18-MariaDB-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chamodpr_ccp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `username`, `password`, `mobile`, `email`) VALUES
('Admin', 'admin', '09253a0ceaf3b285ec2ce98377df5153', '0112413901', 'admin@sliit.lk'),
('Akarshani Amarasinghe', 'akarshani.a', '6e8d4508224aa84a0d13a082c1fe42bb', '0711000001', 'akarshani.a@sliit.lk'),
('Geethanjali Wimalaratne', 'geethanjali.w', 'fbc50ee74647706a0fa70494876ec7de', '0711000002', 'geethanjali.w@sliit.lk'),
('Manori Gamage', 'manori.g', '01939f1104d559d119ca5e6574393f92', '0711000003', 'manori.g@sliit.lk'),
('Shakila Kumari', 'shakila.k', 'fd3ff8982306f89c88c18c3b96a9b20c', '0711000004', 'shakila.k@sliit.lk'),
('Sunethra pieris', 'sunethra.p', '7bda4a48f2ccf3f5a490c76961d3fdd2', '0711000005', 'sunethra.p@sliit.lk');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `year` int(11) NOT NULL,
  `semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `year`, `semester`) VALUES
('COM', 'Computer Orientated Mathis', 2, 2),
('SLIIT001', 'First Year Common Group', 1, 2),
('SLIIT004', 'Object Oriented Programming', 2, 1),
('SLIIT005', 'Software Engineering I', 2, 1),
('SLIIT006', 'Database Management System', 2, 1),
('SLIIT008', 'Mobile Application Development', 2, 2),
('SLIIT009', 'Data Structure Algorithms', 2, 2),
('SLIIT010', 'Human Computer Interfaces', 3, 1),
('SLIIT011', 'Distributed Computing', 3, 1),
('SLIIT012', 'Capstone Computing Project I', 3, 1),
('SLIIT013', 'Software Engineering Testing', 3, 2),
('SLIIT014', 'Software Engineering Concepts', 3, 2),
('SLIIT015', 'Capstone Computing Project II', 3, 2),
('SLIIT016', 'Software Engineering II', 4, 1),
('SLIIT017', 'Operating Systems', 4, 1),
('SLIIT018', 'Programming Languages', 4, 1),
('SLIIT019', 'Information Technology Project', 4, 2),
('SLIIT020', 'Internet & Web Technology', 4, 2),
('SLIIT021', 'Software Process Model', 4, 2),
('WED', 'Web Application Development', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `year` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `student_count` int(11) NOT NULL,
  `course` varchar(100) NOT NULL,
  `prorata` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `year`, `semester`, `student_count`, `course`, `prorata`) VALUES
('SLIIT001-2019-1    ', 'SLIIT001-2019-1    ', 1, 2, 5, 'SLIIT001', 0),
('SLIIT001-2019-2    ', 'SLIIT001-2019-2    ', 1, 2, 4, 'SLIIT001', 0),
('SLIIT001-2019-3    ', 'SLIIT001-2019-3    ', 1, 2, 4, 'SLIIT001', 0),
('SLIIT001-2019-4    ', 'SLIIT001-2019-4    ', 1, 2, 3, 'SLIIT001', 0),
('SLIIT001-2019-5', 'SLIIT001-2019-5', 1, 2, 4, 'SLIIT001', 0),
('SLIIT008-2019-1    ', 'SLIIT008-2019-1    ', 2, 2, 3, 'SLIIT008', 1),
('SLIIT008-2019-2    ', 'SLIIT008-2019-2    ', 2, 2, 4, 'SLIIT008', 1),
('SLIIT008-2019-3', 'SLIIT008-2019-3', 2, 2, 6, 'SLIIT008', 0),
('SLIIT008-2019-4', 'SLIIT008-2019-4', 2, 2, 6, 'SLIIT008', 0),
('SLIIT008-2019-5', 'SLIIT008-2019-5', 2, 2, 6, 'SLIIT008', 0),
('SLIIT008-2019-6', 'SLIIT008-2019-6', 2, 2, 6, 'SLIIT008', 0),
('SLIIT008-2019-7', 'SLIIT008-2019-7', 2, 2, 6, 'SLIIT008', 0),
('SLIIT011-2019-1', 'SLIIT011-2019-1', 3, 1, 5, 'SLIIT011', 1),
('SLIIT011-2019-2', 'SLIIT011-2019-2', 3, 1, 5, 'SLIIT011', 1),
('SLIIT011-2019-3', 'SLIIT011-2019-3', 3, 1, 5, 'SLIIT011', 1),
('SLIIT011-2019-4', 'SLIIT011-2019-4', 3, 1, 5, 'SLIIT011', 1),
('SLIIT011-2019-5', 'SLIIT011-2019-5', 3, 1, 5, 'SLIIT011', 1),
('SLIIT011-2019-6', 'SLIIT011-2019-6', 3, 1, 5, 'SLIIT011', 1),
('SLIIT013-2019-1', 'SLIIT013-2019-1', 3, 2, 4, 'SLIIT013', 0),
('SLIIT013-2019-2    ', 'SLIIT013-2019-2    ', 3, 2, 3, 'SLIIT013', 0),
('SLIIT019-2019-1    ', 'SLIIT019-2019-1    ', 4, 2, 1, 'SLIIT019', 1),
('SLIIT019-2019-2', 'SLIIT019-2019-2', 4, 2, 6, 'SLIIT019', 1),
('SLIIT019-2019-3', 'SLIIT019-2019-3', 4, 2, 6, 'SLIIT019', 1),
('SLIIT019-2019-4', 'SLIIT019-2019-4', 4, 2, 6, 'SLIIT019', 1);

-- --------------------------------------------------------

--
-- Table structure for table `groups_students`
--

CREATE TABLE `groups_students` (
  `gid` varchar(100) NOT NULL,
  `sid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups_students`
--

INSERT INTO `groups_students` (`gid`, `sid`) VALUES
('SLIIT001-2019-2    ', 'IT17120004'),
('SLIIT001-2019-2    ', 'IT17120013'),
('SLIIT001-2019-2    ', 'IT17120014'),
('SLIIT001-2019-2    ', 'IT17120015'),
('SLIIT001-2019-3    ', 'IT17120018'),
('SLIIT001-2019-3    ', 'IT17120019'),
('SLIIT001-2019-3    ', 'IT17120020'),
('SLIIT001-2019-3    ', 'IT17120021'),
('SLIIT019-2019-1    ', 'IT17120380'),
('SLIIT019-2019-2', 'IT17120373'),
('SLIIT019-2019-2', 'IT17120400'),
('SLIIT019-2019-2', 'IT17120379'),
('SLIIT019-2019-2', 'IT17120398'),
('SLIIT019-2019-2', 'IT17120376'),
('SLIIT019-2019-2', 'IT17120382'),
('SLIIT019-2019-3', 'IT17120370'),
('SLIIT019-2019-3', 'IT17120374'),
('SLIIT019-2019-3', 'IT17120389'),
('SLIIT019-2019-3', 'IT17120387'),
('SLIIT019-2019-3', 'IT17120388'),
('SLIIT019-2019-3', 'IT17120395'),
('SLIIT019-2019-4', 'IT17120399'),
('SLIIT019-2019-4', 'IT17120394'),
('SLIIT019-2019-4', 'IT17120381'),
('SLIIT019-2019-4', 'IT17120390'),
('SLIIT019-2019-4', 'IT17120384'),
('SLIIT019-2019-4', 'IT17120391'),
('SLIIT008-2019-2    ', 'IT17120125'),
('SLIIT008-2019-2    ', 'IT17120126'),
('SLIIT008-2019-2    ', 'IT17120127'),
('SLIIT008-2019-2    ', 'IT17120128'),
('SLIIT011-2019-1', 'IT17120191'),
('SLIIT011-2019-1', 'IT17120195'),
('SLIIT011-2019-1', 'IT17120206'),
('SLIIT011-2019-1', 'IT17120194'),
('SLIIT011-2019-1', 'IT17120182'),
('SLIIT011-2019-2', 'IT17120203'),
('SLIIT011-2019-2', 'IT17120197'),
('SLIIT011-2019-2', 'IT17120202'),
('SLIIT011-2019-2', 'IT17120188'),
('SLIIT011-2019-2', 'IT17120209'),
('SLIIT011-2019-3', 'IT17120180'),
('SLIIT011-2019-3', 'IT17120205'),
('SLIIT011-2019-3', 'IT17120192'),
('SLIIT011-2019-3', 'IT17120186'),
('SLIIT011-2019-3', 'IT17120201'),
('SLIIT011-2019-4', 'IT17120200'),
('SLIIT011-2019-4', 'IT17120185'),
('SLIIT011-2019-4', 'IT17120190'),
('SLIIT011-2019-4', 'IT17120181'),
('SLIIT011-2019-4', 'IT17120183'),
('SLIIT011-2019-5', 'IT17120198'),
('SLIIT011-2019-5', 'IT17120189'),
('SLIIT011-2019-5', 'IT17120207'),
('SLIIT011-2019-5', 'IT17120187'),
('SLIIT011-2019-5', 'IT17120199'),
('SLIIT011-2019-6', 'IT17120208'),
('SLIIT011-2019-6', 'IT17120204'),
('SLIIT011-2019-6', 'IT17120193'),
('SLIIT011-2019-6', 'IT17120184'),
('SLIIT011-2019-6', 'IT17120196'),
('SLIIT008-2019-1    ', 'IT17120134'),
('SLIIT008-2019-1    ', 'IT17120135'),
('SLIIT008-2019-1    ', 'IT17120136'),
('SLIIT013-2019-1', 'IT17120211'),
('SLIIT013-2019-1', 'IT17120212'),
('SLIIT013-2019-1', 'IT17120213'),
('SLIIT013-2019-1', 'IT17120215'),
('SLIIT013-2019-1', 'IT17114798'),
('SLIIT013-2019-2    ', 'IT17120210'),
('SLIIT013-2019-2    ', 'IT17120214'),
('SLIIT013-2019-2    ', 'IT17120216'),
('SLIIT001-2019-1    ', 'IT17120025'),
('SLIIT001-2019-1    ', 'IT17120026'),
('SLIIT001-2019-1    ', 'IT17120027'),
('SLIIT001-2019-1    ', 'IT17120028'),
('SLIIT001-2019-1    ', 'IT17120029'),
('SLIIT008-2019-3', 'IT17120107'),
('SLIIT008-2019-3', 'IT17120100'),
('SLIIT008-2019-3', 'IT17120118'),
('SLIIT008-2019-3', 'IT17120097'),
('SLIIT008-2019-3', 'IT17120092'),
('SLIIT008-2019-3', 'IT17120098'),
('SLIIT008-2019-4', 'IT17120106'),
('SLIIT008-2019-4', 'IT17120093'),
('SLIIT008-2019-4', 'IT17120114'),
('SLIIT008-2019-4', 'IT17120091'),
('SLIIT008-2019-4', 'IT17120099'),
('SLIIT008-2019-4', 'IT17120113'),
('SLIIT008-2019-5', 'IT17120111'),
('SLIIT008-2019-5', 'IT17120096'),
('SLIIT008-2019-5', 'IT17120115'),
('SLIIT008-2019-5', 'IT17120094'),
('SLIIT008-2019-5', 'IT17120119'),
('SLIIT008-2019-5', 'IT17120101'),
('SLIIT008-2019-6', 'IT17120104'),
('SLIIT008-2019-6', 'IT17120102'),
('SLIIT008-2019-6', 'IT17120103'),
('SLIIT008-2019-6', 'IT17120109'),
('SLIIT008-2019-6', 'IT17120108'),
('SLIIT008-2019-6', 'IT17120117'),
('SLIIT008-2019-7', 'IT17120110'),
('SLIIT008-2019-7', 'IT17120116'),
('SLIIT008-2019-7', 'IT17120095'),
('SLIIT008-2019-7', 'IT17120090'),
('SLIIT008-2019-7', 'IT17120112'),
('SLIIT008-2019-7', 'IT17120105'),
('SLIIT001-2019-5', 'IT17120016'),
('SLIIT001-2019-5', 'IT17120001'),
('SLIIT001-2019-5', 'IT17120002'),
('SLIIT001-2019-5', 'IT17120003'),
('SLIIT001-2019-4    ', 'IT17120017'),
('SLIIT001-2019-4    ', 'IT17120022'),
('SLIIT001-2019-4    ', 'IT17120023');

-- --------------------------------------------------------

--
-- Table structure for table `groups_topics`
--

CREATE TABLE `groups_topics` (
  `gid` varchar(100) NOT NULL,
  `tid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups_topics`
--

INSERT INTO `groups_topics` (`gid`, `tid`) VALUES
('SLIIT001-2019-1    ', 'T5'),
('SLIIT001-2019-3    ', 'T2'),
('SLIIT019-2019-4', 'T7'),
('SLIIT019-2019-3', 'T7'),
('SLIIT001-2019-4    ', 'T2'),
('SLIIT001-2019-2    ', 'T3');

-- --------------------------------------------------------

--
-- Table structure for table `group_leader`
--

CREATE TABLE `group_leader` (
  `gid` varchar(100) NOT NULL,
  `lid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_leader`
--

INSERT INTO `group_leader` (`gid`, `lid`) VALUES
('SLIIT013-2019-1', 'IT17114798');

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE `lecturer` (
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`name`, `email`, `password`, `mobile`) VALUES
('Akarshani Amarasinghe', 'akarshani.a@sliit.lk', '9cdce2a14f14a4e20d382a5a9dbca802', '0712345678'),
('Geethanjali Wimalaratne', 'geethanjali.w@sliit.lk', 'fbc50ee74647706a0fa70494876ec7de', '0711000002'),
('Lecturer', 'lecturer@sliit.lk', '6e8d4508224aa84a0d13a082c1fe42bb', '0711000001'),
('Manori Gamage', 'manori.g@sliit.lk', '01939f1104d559d119ca5e6574393f92', '0711000003');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `year` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `prorata` tinyint(4) NOT NULL DEFAULT 0,
  `password` varchar(50) NOT NULL,
  `gpa` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `mobile`, `email`, `year`, `semester`, `prorata`, `password`, `gpa`) VALUES
('IT17091480', 'Chamod Priyamal K W', '0717908311', 'chammaofficial@gmail.com', 3, 1, 0, '696979d5845d1ab692041c45aa10aa5b', 3.5),
('IT17114798', 'Nadishka Jayashan', '0776959783', 'nadishka.jayashan@gmail.com', 3, 2, 0, '9616adaeeefee5c7723db5ba46c114ba', 3.6),
('IT17120001', 'Ameesha Karunanayaka', '711235058', 'Ameesha.Karunanayaka@gmail.com', 1, 2, 0, 'fb4b4060c2083d53e49530b8709f6a0b', 1.69),
('IT17120002', 'Amila Ponnamperuma', '711235059', 'Amila.Ponnamperuma@gmail.com', 1, 2, 0, '0e588ff49a52763f0b41fed83c7bb544', 3.23),
('IT17120003', 'Amindhi Hewawasam', '711235060', 'Amindhi.Hewawasam@gmail.com', 1, 2, 0, '3d038deab926643ab0757007fcf56a4f', 3.79),
('IT17120004', 'Amitha Bawa', '711235061', 'Amitha.Bawa@gmail.com', 1, 2, 0, 'd817fbfbed5593a9c3d47f135417f459', 2.13),
('IT17120005', 'Amrah Nimsara', '711235062', 'Amrah.Nimsara@gmail.com', 1, 2, 1, '4fba09fb77d0d5acbebb2c4e8657b8c6', 1.89),
('IT17120006', 'Anali Dharmakeerthi', '711235063', 'Anali.Dharmakeerthi@gmail.com', 1, 2, 1, '207ce8ed566d5713d0ce5aef58e6bc26', 3.38),
('IT17120007', 'Anam Nimsarah', '711235064', 'Anam.Nimsarah@gmail.com', 1, 2, 1, '99ecc01dcbfc75a903850f3682eff945', 3.15),
('IT17120008', 'Ananda Perera', '711235065', 'Ananda.Perera@gmail.com', 1, 2, 1, 'a2fa9785d9a712a7aff659245fc2d193', 2.54),
('IT17120009', 'Ananya Sugumar', '711235066', 'Ananya.Sugumar@gmail.com', 1, 2, 1, '2080c3e8963f0c0350ba18791d5948db', 3.57),
('IT17120010', 'Anders Saleem', '711235067', 'Anders.Saleem@gmail.com', 1, 2, 1, '73b061816890958c08fd4cca95e8a7bb', 2.31),
('IT17120011', 'Andre Zaki', '711235068', 'Andre.Zaki@gmail.com', 1, 2, 1, '7f440dcfb5d6bab23c16c0bc1fc21cdc', 3.8),
('IT17120012', 'Andrea Joachim', '711235069', 'Andrea.Joachim@gmail.com', 1, 2, 1, '7032fe27de74b75bc8bbcc6b2635774d', 2.42),
('IT17120013', 'Andrew Thanugi', '711235070', 'Andrew.Thanugi@gmail.com', 1, 2, 0, '786236f13596841cd1a7afd4b92fe6a9', 1.7),
('IT17120014', 'Aneeka Ghoues', '711235071', 'Aneeka.Ghoues@gmail.com', 1, 2, 0, '2a6a0eaaea8657a7ce81baec541e3416', 3.73),
('IT17120015', 'Aneesha Senathirajah', '711235072', 'Aneesha.Senathirajah@gmail.com', 1, 2, 0, '872e5a0210c21688e0225e9a581b6c83', 3.36),
('IT17120016', 'Angelo Ajwad', '711235073', 'Angelo.Ajwad@gmail.com', 1, 2, 0, 'b3c69b611fb2e785ed14933938cf2a5d', 1.07),
('IT17120017', 'Anil Athukorala', '711235074', 'Anil.Athukorala@gmail.com', 1, 2, 0, '6d848b3cae16b7aa039ccf6bb9f33a3e', 3.7),
('IT17120018', 'Anisha Amunugama', '711235075', 'Anisha.Amunugama@gmail.com', 1, 2, 0, '6f53dd00598bdeb2ad90d22cd73900ff', 2.45),
('IT17120019', 'Anjali Boralessa', '711235076', 'Anjali.Boralessa@gmail.com', 1, 2, 0, '37917ef73ca50d67733b97acd413cfde', 1.97),
('IT17120020', 'Anjalie Gunawardana', '711235077', 'Anjalie.Gunawardana@gmail.com', 1, 2, 0, 'f53ded0233f7d88144f18ef50411fdf1', 1.53),
('IT17120021', 'Anjana Hapugoda', '711235078', 'Anjana.Hapugoda@gmail.com', 1, 2, 0, 'dec28e7783ffa1bd2369d008bd0cf404', 2.85),
('IT17120022', 'Anjani Karunaratne', '711235079', 'Anjani.Karunaratne@gmail.com', 1, 2, 0, '271a77438f03b8919ab2c9d71fe2fcb2', 3.65),
('IT17120023', 'Anjelo Kulasinghe', '711235080', 'Anjelo.Kulasinghe@gmail.com', 1, 2, 0, 'd09b89e464dd4a9cbd7def576695dded', 1.43),
('IT17120024', 'Anjum Kulathunga', '711235081', 'Anjum.Kulathunga@gmail.com', 1, 2, 0, 'eb232f28e2394cfa21bd239f339b6d4a', 3.28),
('IT17120025', 'Anne Liyanage', '711235082', 'Anne.Liyanage@gmail.com', 1, 2, 0, 'eed71281e5c8e822d446b19c155963fa', 3.09),
('IT17120026', 'Annie Pathirana', '711235083', 'Annie.Pathirana@gmail.com', 1, 2, 0, 'b44238deab27d81d2b970aa845d81d2c', 2.4),
('IT17120027', 'Anoja Prasanna', '711235084', 'Anoja.Prasanna@gmail.com', 1, 2, 0, '82250f98740bd26784767e8ef1f2437a', 1.34),
('IT17120028', 'Anoma Tudawe', '711235085', 'Anoma.Tudawe@gmail.com', 1, 2, 0, 'baff12c11617cb17786b2c884e86f290', 3.76),
('IT17120029', 'Anoop Wickramasekara', '711235086', 'Anoop.Wickramasekara@gmail.com', 1, 2, 0, '05777c0aac40eb714e01c97b2ff5e3a3', 2.65),
('IT17120030', 'Antanett Wijetunga', '711235087', 'Antanett.Wijetunga@gmail.com', 2, 1, 0, '41852c0ef89b36d184694d3288ca447f', 3.3),
('IT17120031', 'Anthony Nanayakkara', '711235088', 'Anthony.Nanayakkara@gmail.com', 2, 1, 0, '4afdd686f71ae929c8c62b5a4273b87d', 3.07),
('IT17120032', 'Antoinette Weerasooriya', '711235089', 'Antoinette.Weerasooriya@gmail.com', 2, 1, 0, '47fb8794a7771c7b93175dd640f17af3', 1.98),
('IT17120033', 'Anton Chnadul', '711235090', 'Anton.Chnadul@gmail.com', 2, 1, 0, '0402a8026e3cc2b7bb5aa4c65d62e3b6', 1.04),
('IT17120034', 'Anuja Deepamithra', '711235091', 'Anuja.Deepamithra@gmail.com', 2, 1, 0, '5afa0e59c240787d36e7fdae495a3b38', 1.04),
('IT17120035', 'Anujaya Hettiarachchi', '711235092', 'Anujaya.Hettiarachchi@gmail.com', 2, 1, 0, '10bc39ea09f17403db11ef07f1cd0e1e', 1.89),
('IT17120036', 'Anuk Wijesinghe', '711235093', 'Anuk.Wijesinghe@gmail.com', 2, 1, 0, '6a2f796102be506bc4d5139e36fd5d53', 1.6),
('IT17120037', 'Anula Madan', '711235094', 'Anula.Madan@gmail.com', 2, 1, 0, '6bbdc8799eb562db21615e9c2a69cd87', 2.34),
('IT17120038', 'Anumi Shobanan', '711235095', 'Anumi.Shobanan@gmail.com', 2, 1, 0, 'e8f083e1c3c06c51d5ad8c2e07c709f5', 3.74),
('IT17120039', 'Anura Nawakumar', '711235096', 'Anura.Nawakumar@gmail.com', 2, 1, 0, '31260cb192031bb9155cb427d90536af', 3.57),
('IT17120040', 'Anuradha Ahlam', '711235097', 'Anuradha.Ahlam@gmail.com', 2, 1, 0, 'c2b20cae683cdee44ebb547dcf61911e', 3.74),
('IT17120041', 'Anurudda Akbar', '711235098', 'Anurudda.Akbar@gmail.com', 2, 1, 0, '5969cff245cad7a1b6e181327ee7a8de', 1.32),
('IT17120042', 'Anusas Azgar', '711235099', 'Anusas.Azgar@gmail.com', 2, 1, 0, 'df0ec10c7ccafa2633b2eb99b4283bc6', 1.4),
('IT17120043', 'Anush Thaufic', '711235100', 'Anush.Thaufic@gmail.com', 2, 1, 0, 'a98149afdae37946e1bce8f9e403711f', 2.67),
('IT17120044', 'Anusha Mariyam', '711235101', 'Anusha.Mariyam@gmail.com', 2, 1, 0, '55fe0c753fcc695857e5eba0326ffad1', 3.57),
('IT17120045', 'Anushadi Sallay', '711235102', 'Anushadi.Sallay@gmail.com', 2, 1, 0, '6b95748e52c77daa54b4aef38215f62e', 1.16),
('IT17120046', 'Anushka Gomesz', '711235103', 'Anushka.Gomesz@gmail.com', 2, 1, 0, '8e31e4bb3d7ebe31d8c219683747fafa', 2),
('IT17120047', 'Anuthini Cabral', '711235104', 'Anuthini.Cabral@gmail.com', 2, 1, 0, 'c9d83ce0a15c1360cf17489c98ba03b8', 2.66),
('IT17120048', 'Anya Gurusinghe', '711235105', 'Anya.Gurusinghe@gmail.com', 2, 1, 0, '9bc595a5fde50a44b0690770cfd2ce00', 2.58),
('IT17120049', 'Aparna Miranda', '711235106', 'Aparna.Miranda@gmail.com', 2, 1, 0, '53f966152520246d059a16b4571ec60f', 2.44),
('IT17120050', 'Apoorwa Peiris', '711235107', 'Apoorwa.Peiris@gmail.com', 2, 1, 0, 'e961d1d92867babc88ce7e5e489f9654', 3.39),
('IT17120051', 'Apsara Rajapakse', '711235108', 'Apsara.Rajapakse@gmail.com', 2, 1, 0, '9379823cdc286482db35db2d3b3974a7', 2.89),
('IT17120052', 'Arham Fernando', '711235109', 'Arham.Fernando@gmail.com', 2, 1, 0, 'fa1be47ca3b37dab9608a4af1f94ce4b', 2.22),
('IT17120053', 'Ariyadas Sandeepani', '711235110', 'Ariyadas.Sandeepani@gmail.com', 2, 1, 0, 'ea8b6e52d4f8bd032ba087f3d4c8acc8', 2.8),
('IT17120054', 'Arjun Athanayaka', '711235111', 'Arjun.Athanayaka@gmail.com', 2, 1, 0, '22b04990036b4ddb057768a1f10b539a', 1.51),
('IT17120055', 'Arjuna Balasooriya', '711235112', 'Arjuna.Balasooriya@gmail.com', 2, 1, 0, 'e872da5f1d5d4fd58e2c2077496e503a', 2.53),
('IT17120056', 'Arnold Premaratne', '711235113', 'Arnold.Premaratne@gmail.com', 2, 1, 0, '009976a1c7f6f67c5447989f8ad2d9be', 3.84),
('IT17120057', 'Arshani Weligodapola', '711235114', 'Arshani.Weligodapola@gmail.com', 2, 1, 0, 'a938face6289ac704cd7755ac4ab510f', 2.25),
('IT17120058', 'Arshaq Rukshan', '711235115', 'Arshaq.Rukshan@gmail.com', 2, 1, 0, '4d1d157bf24c5fcfbecdbe12ae935b76', 1.78),
('IT17120059', 'Arul Dilan', '711235116', 'Arul.Dilan@gmail.com', 2, 1, 0, '5008c108b2455516b40b46d12afe462c', 1),
('IT17120060', 'Arun Hendahewa', '711235117', 'Arun.Hendahewa@gmail.com', 2, 1, 1, 'b3a01ce53431aec8a06fe072b3fbf4a8', 3.45),
('IT17120061', 'Aruna Pieris', '711235118', 'Aruna.Pieris@gmail.com', 2, 1, 1, 'ec991d5c9c79ed0675a09bad98ddaa65', 2.88),
('IT17120062', 'Arunasiri Gamage', '711235119', 'Arunasiri.Gamage@gmail.com', 2, 1, 1, 'b0201614d93ceb692e1bb4be39628935', 2.84),
('IT17120063', 'Aruni Kumari', '711235120', 'Aruni.Kumari@gmail.com', 2, 1, 1, '5ff41ae8861dfb4fa4381a87e96e0099', 1.03),
('IT17120064', 'Arunika Upamal', '711235121', 'Arunika.Upamal@gmail.com', 2, 1, 1, '8f01e04f58e4e5311cc526752e0931f5', 3.85),
('IT17120065', 'Asanga Zahara', '711235122', 'Asanga.Zahara@gmail.com', 2, 1, 1, '044e8cf5da572f9a4b06f08bfbcd7b13', 2.62),
('IT17120066', 'Asangika Karunathilaka', '711235123', 'Asangika.Karunathilaka@gmail.com', 2, 1, 1, 'd878b16a1099e1acfff595814af10047', 2.87),
('IT17120067', 'Asanka Omar', '711235124', 'Asanka.Omar@gmail.com', 2, 1, 1, 'ba9e404c749f59fa492f64050359bc1f', 2.52),
('IT17120068', 'Asantha Gunathilaka', '711235125', 'Asantha.Gunathilaka@gmail.com', 2, 1, 1, 'f6af07a06c93ac77a67aa5d99f8fd388', 1.02),
('IT17120069', 'Asara Kannangara', '711235126', 'Asara.Kannangara@gmail.com', 2, 1, 1, '035ca3325d946301279a760098be744e', 2.37),
('IT17120070', 'Aseka Sunimal', '711235127', 'Aseka.Sunimal@gmail.com', 2, 1, 1, 'bd697d6bd9ac62a76d8debbbac1819af', 2.82),
('IT17120071', 'Asel Xavier', '711235128', 'Asel.Xavier@gmail.com', 2, 1, 1, 'f93764e9958df754ec79dc6dfc1541ca', 3.73),
('IT17120072', 'Asha Karlsson', '711235129', 'Asha.Karlsson@gmail.com', 2, 1, 1, '7f572e3fc5851693b440ec25335d3a88', 3.39),
('IT17120073', 'Ashan Candappa', '711235130', 'Ashan.Candappa@gmail.com', 2, 1, 1, '1cbbbcfa6ff399af8cde27603d1e1218', 2.86),
('IT17120074', 'Ashane David', '711235131', 'Ashane.David@gmail.com', 2, 1, 1, '11a42de661d8c48e5db12d4a74fca6e6', 2.29),
('IT17120075', 'Ashani Gnanamoney', '711235132', 'Ashani.Gnanamoney@gmail.com', 2, 1, 1, '91d2bcde08de8c5d6e6b4e6abd66fad5', 1.31),
('IT17120076', 'Ashanka Kittle', '711235133', 'Ashanka.Kittle@gmail.com', 2, 1, 1, 'faa9449e8e3093f09783287ab300e7de', 3.15),
('IT17120077', 'Ashanthi Madugalle', '711235134', 'Ashanthi.Madugalle@gmail.com', 2, 1, 1, '7556915c7712e9e19f2bd564adf2876f', 1.2),
('IT17120078', 'Ashen Loganathan', '711235135', 'Ashen.Loganathan@gmail.com', 2, 1, 1, '27dbf929dc7bc400f4b02977d8f3b0f6', 2.34),
('IT17120079', 'Ashika Dissanayaka', '711235136', 'Ashika.Dissanayaka@gmail.com', 2, 1, 1, 'b4c90c5ac524fdd1f6c3c3f639005d72', 2.75),
('IT17120080', 'Ashini Jayasooriya', '711235137', 'Ashini.Jayasooriya@gmail.com', 2, 1, 1, 'b8e525506213c5e0483d8292a4a3bbc5', 3.1),
('IT17120081', 'Ashkan Wijewardhana', '711235138', 'Ashkan.Wijewardhana@gmail.com', 2, 1, 1, 'fd5202015e645c4e88cdc79226489534', 1.24),
('IT17120082', 'Ashker Castle', '711235139', 'Ashker.Castle@gmail.com', 2, 1, 1, '751770e2c5ad0e75fa74bea46ec90c11', 2.7),
('IT17120083', 'Ashmi Thennakoon', '711235140', 'Ashmi.Thennakoon@gmail.com', 2, 1, 1, '443240b0c9b14af641464d4b6d6abe4b', 3.23),
('IT17120084', 'Ashmin Rathnaweera', '711235141', 'Ashmin.Rathnaweera@gmail.com', 2, 1, 1, 'b590338329f5cf7c52e667ec3c53b64f', 2.26),
('IT17120085', 'Ashok Raaymakers', '711235142', 'Ashok.Raaymakers@gmail.com', 2, 1, 1, 'fde17ded28f366d29c0b2e4b4218b887', 3.23),
('IT17120086', 'Ashoka Mendis', '711235143', 'Ashoka.Mendis@gmail.com', 2, 1, 1, '5d080678bf4f5fa7ea389fcab428e2eb', 1.85),
('IT17120087', 'Ashokan Shehana', '711235144', 'Ashokan.Shehana@gmail.com', 2, 1, 1, '1b5ac1917b9e02c786a8f09ad01f2490', 1.35),
('IT17120088', 'Ashraaq Jago', '711235145', 'Ashraaq.Jago@gmail.com', 2, 1, 1, '65a54344b7cb684129d0ddcc8076ee50', 3.04),
('IT17120089', 'Ashvienie Jayampathi', '711235146', 'Ashvienie.Jayampathi@gmail.com', 2, 1, 1, '258d8d02ba744102a62e3988b4f92981', 3.97),
('IT17120090', 'Ashvini Weerasinghe', '711235147', 'Ashvini.Weerasinghe@gmail.com', 2, 2, 0, '71efc3c0754f5323283e7ad191439556', 2.74),
('IT17120091', 'Ashwin Wickramasinghe', '711235148', 'Ashwin.Wickramasinghe@gmail.com', 2, 2, 0, '592d38ed3c9bddb65309d0ef563cd2d8', 2.43),
('IT17120092', 'Asitha Wijegunawardane', '711235149', 'Asitha.Wijegunawardane@gmail.com', 2, 2, 0, '69b579d255ba5cb5935e6284e7942766', 2.74),
('IT17120093', 'Asma Kundanmal', '711235150', 'Asma.Kundanmal@gmail.com', 2, 2, 0, '7abb946acfe22a7a1e915416ef6af24c', 1.8),
('IT17120094', 'Asoka Ekanayake', '711235151', 'Asoka.Ekanayake@gmail.com', 2, 2, 0, '38c9f1e7caf0a4ff962678888d01c707', 2.54),
('IT17120095', 'Assajee Wijesekara', '711235152', 'Assajee.Wijesekara@gmail.com', 2, 2, 0, '908939044d99a4ae5c25f153ab3ba890', 2.14),
('IT17120096', 'Athika Bhagya', '711235153', 'Athika.Bhagya@gmail.com', 2, 2, 0, 'd04795bbb114affbe0e63af1181a1256', 1.82),
('IT17120097', 'Athraja Abeygunasekara', '711235154', 'Athraja.Abeygunasekara@gmail.com', 2, 2, 0, '7baf669febe98eb981a17ef1767645a8', 2.3),
('IT17120098', 'Athula Abeysekara', '711235155', 'Athula.Abeysekara@gmail.com', 2, 2, 0, 'e85ff040f1b89a4bc40206ef94f6016e', 3.64),
('IT17120099', 'Aumanthi Totawatta', '711235156', 'Aumanthi.Totawatta@gmail.com', 2, 2, 0, '88e1a60eabb5f9dafc2d275553989e53', 2.78),
('IT17120100', 'Aurorra Munasinghe', '711235157', 'Aurorra.Munasinghe@gmail.com', 2, 2, 0, '46ff358951116134783d024bcad31e22', 1.68),
('IT17120101', 'Avan Wickramaarachchi', '711235158', 'Avan.Wickramaarachchi@gmail.com', 2, 2, 0, '33da9c2f90920a11e5ca0c27d4ce7962', 3.74),
('IT17120102', 'Avantha Alawattegama', '711235159', 'Avantha.Alawattegama@gmail.com', 2, 2, 0, '53acee283233e61d184d1a4342aaf900', 1.84),
('IT17120103', 'Aveesha Bandara', '711235160', 'Aveesha.Bandara@gmail.com', 2, 2, 0, '12ea86464d51d14b11ff832538dd5553', 2.13),
('IT17120104', 'Avinash Bannahake', '711235161', 'Avinash.Bannahake@gmail.com', 2, 2, 0, 'a0968e0b13bf32b297563d0387847aa1', 1.5),
('IT17120105', 'Avindu Jayalath', '711235162', 'Avindu.Jayalath@gmail.com', 2, 2, 0, 'a4e506c846275f8eae63911c2c772cf4', 3.84),
('IT17120106', 'Avishka Kottegoda', '711235163', 'Avishka.Kottegoda@gmail.com', 2, 2, 0, '0108ba8468183c14826c468231e787bf', 1.24),
('IT17120107', 'Awahnee Kumara', '711235164', 'Awahnee.Kumara@gmail.com', 2, 2, 0, '9a48e8b61e83ae05cf2be68185488d02', 1.18),
('IT17120108', 'Ayansa Rathnavibushana', '711235165', 'Ayansa.Rathnavibushana@gmail.com', 2, 2, 0, '859b8b20aa27abd1ea48da0e0a0ae704', 3.46),
('IT17120109', 'Ayanthi Rathnayaka', '711235166', 'Ayanthi.Rathnayaka@gmail.com', 2, 2, 0, 'eee84dae699a271eb2ce36f599271a5c', 2.54),
('IT17120110', 'Aydhin Serasinghe', '711235167', 'Aydhin.Serasinghe@gmail.com', 2, 2, 0, '9c54eca039d42c6e2265657124ed9b41', 1.53),
('IT17120111', 'Ayoma Peramunagamage', '711235168', 'Ayoma.Peramunagamage@gmail.com', 2, 2, 0, '4e0ce10731e5438a07c4f4ce279cafc1', 1.27),
('IT17120112', 'Ayomi Polonnowita', '711235169', 'Ayomi.Polonnowita@gmail.com', 2, 2, 0, '92474cfbbf915bf4059a0a0a741c33a2', 3.52),
('IT17120113', 'Ayona Jayasekara', '711235170', 'Ayona.Jayasekara@gmail.com', 2, 2, 0, '7cc28ab31ee0aae1fbdc8396ea1a9fbd', 3.68),
('IT17120114', 'Aysha Amarasinghe', '711235171', 'Aysha.Amarasinghe@gmail.com', 2, 2, 0, '09e3950806494b7c489b153b563ba4e7', 1.96),
('IT17120115', 'Azhar Priyadarshani', '711235172', 'Azhar.Priyadarshani@gmail.com', 2, 2, 0, '981975da7e00ce7f2e2b80000a3cbbcb', 2.11),
('IT17120116', 'Azmi Silva', '711235173', 'Azmi.Silva@gmail.com', 2, 2, 0, 'd6a86e1755fd2bd130f571b5c8a32b62', 1.85),
('IT17120117', 'Azra Weerasekara', '711235174', 'Azra.Weerasekara@gmail.com', 2, 2, 0, '030017befab495932b30def8e5a74a6f', 3.83),
('IT17120118', 'Baagya Seneviratne', '711235175', 'Baagya.Seneviratne@gmail.com', 2, 2, 0, 'b1e855d70d3b94f1d9078f2dbec1c87a', 1.87),
('IT17120119', 'Bagya Athuraliya', '711235176', 'Bagya.Athuraliya@gmail.com', 2, 2, 0, '75bef8c322c1a01247011bf55626a171', 3.45),
('IT17120120', 'Bandu Hample', '711235177', 'Bandu.Hample@gmail.com', 2, 2, 1, '664aa992fa646adb0d6f058793781684', 1.26),
('IT17120121', 'Bandula Bollonne', '711235178', 'Bandula.Bollonne@gmail.com', 2, 2, 1, 'cdc484dd5dcac7fb7a1842944d9ed5b0', 1.09),
('IT17120122', 'Baratha Payoe', '711235179', 'Baratha.Payoe@gmail.com', 2, 2, 1, 'fa47f9e2559a0350adc0b914490ca104', 2.15),
('IT17120123', 'Barathi Srivatsan', '711235180', 'Barathi.Srivatsan@gmail.com', 2, 2, 1, 'ed6a380d825365f1eb741156f289b63e', 2.09),
('IT17120124', 'Bede Induwara', '711235181', 'Bede.Induwara@gmail.com', 2, 2, 1, '3a80843c42494288e561302e2d13468b', 3.68),
('IT17120125', 'Belinda Kapukotuwa', '711235182', 'Belinda.Kapukotuwa@gmail.com', 2, 2, 1, 'c99b59bdbc53f3780ffb3ac5eadd682d', 1.76),
('IT17120126', 'Ben Sulthani', '711235183', 'Ben.Sulthani@gmail.com', 2, 2, 1, '0a72f732148c1664aa8af45be56278b4', 2.19),
('IT17120127', 'Benaca Wijeratne', '711235184', 'Benaca.Wijeratne@gmail.com', 2, 2, 1, '25bd03eef08d7b74ab8de18ead8474e6', 3.11),
('IT17120128', 'Benhey Sulaiman', '711235185', 'Benhey.Sulaiman@gmail.com', 2, 2, 1, '019c2af076450dc8d6efc894db645318', 2.74),
('IT17120129', 'Benil Handunnetti', '711235186', 'Benil.Handunnetti@gmail.com', 2, 2, 1, 'f5da961cf7cc36d3167d7c38801fd8a8', 1.32),
('IT17120130', 'Bernie Jayasinghe', '711235187', 'Bernie.Jayasinghe@gmail.com', 2, 2, 1, '29ac96e21cf00029aea2ca9912d3201f', 1.28),
('IT17120131', 'Bevani Karunathilake', '711235188', 'Bevani.Karunathilake@gmail.com', 2, 2, 1, 'db1d81874c693b4529bcaf901d0e17f2', 1.93),
('IT17120132', 'Bhagya Pandithage', '711235189', 'Bhagya.Pandithage@gmail.com', 2, 2, 1, 'a3ca80bdda9a2f1040f4cab2e0de68a6', 3.87),
('IT17120133', 'Bhasha Ahamed', '711235190', 'Bhasha.Ahamed@gmail.com', 2, 2, 1, '2240f9559ddf7691628910fc4c593a7d', 1.87),
('IT17120134', 'Bhuvi Prakash', '711235191', 'Bhuvi.Prakash@gmail.com', 2, 2, 1, '3c063e1dc4c2f4a25ff9c8c82ad17cbf', 3.77),
('IT17120135', 'Bibile Gamalatge', '711235192', 'Bibile.Gamalatge@gmail.com', 2, 2, 1, 'c8522245fa1b247e2b52b5841562e433', 3.5),
('IT17120136', 'Bilishiya Wijethunga', '711235193', 'Bilishiya.Wijethunga@gmail.com', 2, 2, 1, 'c3168cb588ef7b3c7bf5109b71e5cd49', 1.93),
('IT17120137', 'Billy Buddarage', '711235194', 'Billy.Buddarage@gmail.com', 2, 2, 1, '4a4e8d2bf91810749e2ac42e471ca30a', 2.91),
('IT17120138', 'Bimal Goonethillake', '711235195', 'Bimal.Goonethillake@gmail.com', 2, 2, 1, '4300beb5c2346db608a3f54b36ab082e', 2.19),
('IT17120139', 'Bimali Jayawardena', '711235196', 'Bimali.Jayawardena@gmail.com', 2, 2, 1, '9b872d1c6720c078b08ed0b2a85013e4', 3.38),
('IT17120140', 'Binaca Iroshini', '711235197', 'Binaca.Iroshini@gmail.com', 2, 2, 1, 'f69f2e5e66af6303054c144aaf62760e', 3.65),
('IT17120141', 'Binara Abeysinghe', '711235198', 'Binara.Abeysinghe@gmail.com', 2, 2, 1, '2647398e258fd7c64d020a4d63f42e8e', 3.34),
('IT17120142', 'Binguni Devapura', '711235199', 'Binguni.Devapura@gmail.com', 2, 2, 1, 'c8e7ad28ed9314c270c5f9e3f08432a2', 2.45),
('IT17120143', 'Binura Ratnayaka', '711235200', 'Binura.Ratnayaka@gmail.com', 2, 2, 1, '361e7a6e18f2e7921dcea470e4fe309f', 1.51),
('IT17120144', 'Borshan Withanage', '711235201', 'Borshan.Withanage@gmail.com', 2, 2, 1, '7b8e06dc5896920609cd9aaf8a5bb7ad', 1.96),
('IT17120145', 'Bradley Kalyananda', '711235202', 'Bradley.Kalyananda@gmail.com', 2, 2, 1, '904d9a7102dcef3f73f7a224a0215300', 1.11),
('IT17120146', 'Brian Ganga', '711235203', 'Brian.Ganga@gmail.com', 2, 2, 1, '339342136761b716a24ae5f060900445', 1.57),
('IT17120147', 'Buddhika Lokubalasuriya', '711235204', 'Buddhika.Lokubalasuriya@gmail.com', 2, 2, 1, '21edb58b27f362140be0207997ecde96', 2.8),
('IT17120148', 'Buddi Jayawardhana', '711235205', 'Buddi.Jayawardhana@gmail.com', 2, 2, 1, 'd89ebf537088a2ca3791753e6c5b8c08', 3.15),
('IT17120149', 'Buddika Masinghe', '711235206', 'Buddika.Masinghe@gmail.com', 2, 2, 1, '53078907c98f4d5385c1622ae87cd711', 3.69),
('IT17120150', 'Bushmith Deen', '711235207', 'Bushmith.Deen@gmail.com', 3, 1, 0, '1366fb0fe7c35b330db8228415e3eed8', 3.94),
('IT17120151', 'Candy Kadurugamuwa', '711235208', 'Candy.Kadurugamuwa@gmail.com', 3, 1, 0, '34018937c50623b6958be3d3eadccb48', 3.59),
('IT17120152', 'Careem Tillekeratne', '711235209', 'Careem.Tillekeratne@gmail.com', 3, 1, 0, 'a8c47ff6381e8dd9d5959b62e41e318a', 1.99),
('IT17120153', 'Carmal Randeniya', '711235210', 'Carmal.Randeniya@gmail.com', 3, 1, 0, '22237c9deeab6b27eefb601c1b355712', 3.98),
('IT17120154', 'Cecilia Opatha', '711235211', 'Cecilia.Opatha@gmail.com', 3, 1, 0, 'b7f3eec9ae51f8f80235d82000f2b21e', 1.14),
('IT17120155', 'Chagie Udayanga', '711235212', 'Chagie.Udayanga@gmail.com', 3, 1, 0, 'cc8f404a45dc695da218e3e5fd416414', 3.94),
('IT17120156', 'Chaluka Imanda', '711235213', 'Chaluka.Imanda@gmail.com', 3, 1, 0, 'fe6dc8dc93fa2610e6505deec404f7e7', 3.79),
('IT17120157', 'Chamaka Aadil', '711235214', 'Chamaka.Aadil@gmail.com', 3, 1, 0, '240e6de2e0002ee7763ec42dfe2610b1', 2.96),
('IT17120158', 'Chamali Enoon', '711235215', 'Chamali.Enoon@gmail.com', 3, 1, 0, '96171c4b5f3f8b2df19983b000145c3a', 3.42),
('IT17120159', 'Chamara Wijepala', '711235216', 'Chamara.Wijepala@gmail.com', 3, 1, 0, '8f463c09e8448aa600410c9f007915b0', 3.84),
('IT17120160', 'Chamari Casi', '711235217', 'Chamari.Casi@gmail.com', 3, 1, 0, '7bb31d72df25da35ae2ab054b68b2538', 2.93),
('IT17120161', 'Chamath Senaratne', '711235218', 'Chamath.Senaratne@gmail.com', 3, 1, 0, '73ff5637761a1f71f9f4b5af6a8ad189', 3.41),
('IT17120162', 'Chamathni Swarup', '711235219', 'Chamathni.Swarup@gmail.com', 3, 1, 0, 'f3958c30d12aec561f6b04d9406940fd', 1.35),
('IT17120163', 'Chamika Vitanachy', '711235220', 'Chamika.Vitanachy@gmail.com', 3, 1, 0, '794587cc3f812e13cdc699fa8e3cf412', 1.39),
('IT17120164', 'Chamila Jayawardane', '711235221', 'Chamila.Jayawardane@gmail.com', 3, 1, 0, 'c2f523b9436628aa96e786bd5913382a', 3.14),
('IT17120165', 'Chaminda Lelwela', '711235222', 'Chaminda.Lelwela@gmail.com', 3, 1, 0, '39d64cbb4fa23b64cf93df6d1e37b230', 2.08),
('IT17120166', 'Chamindra Wahab', '711235223', 'Chamindra.Wahab@gmail.com', 3, 1, 0, 'd2c9a8d03e02f2b4102f0573591a42eb', 1.86),
('IT17120167', 'Chamith Kariyawasam', '711235224', 'Chamith.Kariyawasam@gmail.com', 3, 1, 0, '6d8744f9e2329248f5b81e9abf6aead9', 2.86),
('IT17120168', 'Chamitha Casichetty', '711235225', 'Chamitha.Casichetty@gmail.com', 3, 1, 0, 'f3a88e4d45b9f67e06ae6f3c8cc74cd6', 2.82),
('IT17120169', 'Chamodi Devapriya', '711235226', 'Chamodi.Devapriya@gmail.com', 3, 1, 0, '06b5ce409656d07ed04b21355a59f130', 2.36),
('IT17120170', 'Champa Kuruppu', '711235227', 'Champa.Kuruppu@gmail.com', 3, 1, 0, 'e633028f07688fef1b50ed1fd87bc09d', 3.16),
('IT17120171', 'Champika Panabokke', '711235228', 'Champika.Panabokke@gmail.com', 3, 1, 0, '31953db67221c4e619ca35fc1004a97b', 3.02),
('IT17120172', 'Chamuditha Balasuriya', '711235229', 'Chamuditha.Balasuriya@gmail.com', 3, 1, 0, '817718478b62ec37120929b0c13d2ddf', 2.22),
('IT17120173', 'Chanaka Jaysinghe', '711235230', 'Chanaka.Jaysinghe@gmail.com', 3, 1, 0, 'a8cb460a4426ec89dc200a0c1d8e3944', 1.97),
('IT17120174', 'Chandana Subasinghe', '711235231', 'Chandana.Subasinghe@gmail.com', 3, 1, 0, 'd755ad932b6eb65b0d9b0ac62822cb33', 2.54),
('IT17120175', 'Chandani Weerakkody', '711235232', 'Chandani.Weerakkody@gmail.com', 3, 1, 0, 'f5286b2adad411fd6decf580429dae67', 3.1),
('IT17120176', 'Chandika Thero', '711235233', 'Chandika.Thero@gmail.com', 3, 1, 0, '848da6890ef96c5a74a488d81f17b1e1', 2.75),
('IT17120177', 'Chandima Rizwan', '711235234', 'Chandima.Rizwan@gmail.com', 3, 1, 0, '6c589d79365af59cb6b6b6a68678f392', 1.83),
('IT17120178', 'chandima Kuruppuarachchi', '711235235', 'chandima.Kuruppuarachchi@gmail.com', 3, 1, 0, 'afd20144d78a94848deda3fc3f98d20d', 3.56),
('IT17120179', 'Chandimal Nishantha', '711235236', 'Chandimal.Nishantha@gmail.com', 3, 1, 0, '17c8b40598750182f903bba82af86a76', 3.85),
('IT17120180', 'Chandita Ramasamy', '711235237', 'Chandita.Ramasamy@gmail.com', 3, 1, 1, 'e0c897ba98698134453d0f6b87446c90', 2.92),
('IT17120181', 'Chandra Vandort', '711235238', 'Chandra.Vandort@gmail.com', 3, 1, 1, '1378def7859312c5f0fec2f3ffc933e6', 2.1),
('IT17120182', 'Chandrajith Dulmitha', '711235239', 'Chandrajith.Dulmitha@gmail.com', 3, 1, 1, '2a68b57d1f71a51edc37bb2c28887661', 2.78),
('IT17120183', 'Chandralatha Thilakaratne', '711235240', 'Chandralatha.Thilakaratne@gmail.com', 3, 1, 1, '23e31ad3c06d0dd3c8fe8e22f1e6754e', 3.01),
('IT17120184', 'Chandrasekara Gotabaya', '711235241', 'Chandrasekara.Gotabaya@gmail.com', 3, 1, 1, '9347eda74e79949cb84c2cb7f7b13495', 2.25),
('IT17120185', 'Chandrasiri Mayadunne', '711235242', 'Chandrasiri.Mayadunne@gmail.com', 3, 1, 1, 'f080ddbc66e7d10f6452df591190931f', 1.61),
('IT17120186', 'Chandrik Rajapaksa', '711235243', 'Chandrik.Rajapaksa@gmail.com', 3, 1, 1, '06821cfdd2d83405c9e3998b68ef94d0', 2.24),
('IT17120187', 'Chandrika Thissera', '711235244', 'Chandrika.Thissera@gmail.com', 3, 1, 1, '4ea6b9639f998a4d532ec62c06d2806e', 2.91),
('IT17120188', 'Chandrima Ratnayake', '711235245', 'Chandrima.Ratnayake@gmail.com', 3, 1, 1, '1797eabc540e728e2eeb6e3a29fd10cc', 1.76),
('IT17120189', 'Chanduka Wickramasurendra', '711235246', 'Chanduka.Wickramasurendra@gmail.com', 3, 1, 1, '2a1311d2053be5ffbb729dd3fac8d2d9', 3.03),
('IT17120190', 'Chaniru Gunatillake', '711235247', 'Chaniru.Gunatillake@gmail.com', 3, 1, 1, '9ecda04eeed770aa4383136c153550ae', 1.14),
('IT17120191', 'Channa Zahir', '711235248', 'Channa.Zahir@gmail.com', 3, 1, 1, '8cc1e955d78d001624f68926efe00bba', 1.38),
('IT17120192', 'Charani Razeen', '711235249', 'Charani.Razeen@gmail.com', 3, 1, 1, 'aa516c2e1a83649f354e71c793ae4980', 3.6),
('IT17120193', 'Chari Jaleel', '711235250', 'Chari.Jaleel@gmail.com', 3, 1, 1, 'c033eb2fb094d5ba06ba1c5d6cc86af2', 2.36),
('IT17120194', 'Charini Hassan', '711235251', 'Charini.Hassan@gmail.com', 3, 1, 1, 'be4a31bf2cab40c9474ef4d0bfb9e922', 1.16),
('IT17120195', 'Charith Sandakelum', '711235252', 'Charith.Sandakelum@gmail.com', 3, 1, 1, 'e03d977f10e54e7e244a443257b61b6d', 2.88),
('IT17120196', 'Charitha Udawatta', '711235253', 'Charitha.Udawatta@gmail.com', 3, 1, 1, '7effb15d4a84903e0fdeb8f2a0a5f3ed', 1.23),
('IT17120197', 'Charles Samarasinghe', '711235254', 'Charles.Samarasinghe@gmail.com', 3, 1, 1, '56f61425003a7d0e21ca51ece46d3573', 1.48),
('IT17120198', 'Charmanie Ekanayaka', '711235255', 'Charmanie.Ekanayaka@gmail.com', 3, 1, 1, '3d7013e0cb88acecf530766f1210dc8c', 3.13),
('IT17120199', 'Charya Sidhartha', '711235256', 'Charya.Sidhartha@gmail.com', 3, 1, 1, '08f3d7d7b5342bb1d9c727527f89cb8a', 1.24),
('IT17120200', 'Chathu Anandappa', '711235257', 'Chathu.Anandappa@gmail.com', 3, 1, 1, '8d2aa99da912c97b63b2c1de0b2fb95e', 1.99),
('IT17120201', 'Chathuni Vonahagt', '711235258', 'Chathuni.Vonahagt@gmail.com', 3, 1, 1, '59a8d09b3979ef1e765fcad242e26aa3', 2.29),
('IT17120202', 'Chathura Lloyd', '711235259', 'Chathura.Lloyd@gmail.com', 3, 1, 1, 'ed9d1ac790783b204e58cc3e75f35500', 2.76),
('IT17120203', 'Chathuranga Barsenbech', '711235260', 'Chathuranga.Barsenbech@gmail.com', 3, 1, 1, '60419d83e40e965972548d98e534b504', 3.88),
('IT17120204', 'Chathurangani Thavarasa', '711235261', 'Chathurangani.Thavarasa@gmail.com', 3, 1, 1, '54e6199ff7ad3869f4c49ed70863512b', 1.02),
('IT17120205', 'Chathuri Felthman', '711235262', 'Chathuri.Felthman@gmail.com', 3, 1, 1, 'c43a49d8c857a63ab1bd446808c1a274', 1.86),
('IT17120206', 'Chaya Kothalawala', '711235263', 'Chaya.Kothalawala@gmail.com', 3, 1, 1, '461f64e751e8c089523251805f32e54e', 3.93),
('IT17120207', 'Chayne Kurian', '711235264', 'Chayne.Kurian@gmail.com', 3, 1, 1, '230d05a64d3bfecceec8ba05441b72f1', 2.89),
('IT17120208', 'Chelini Esufally', '711235265', 'Chelini.Esufally@gmail.com', 3, 1, 1, 'fd1a175a943f27fb2a4980b4b069ff01', 3.13),
('IT17120209', 'Chemika Gunapala', '711235266', 'Chemika.Gunapala@gmail.com', 3, 1, 1, '06a1bd57f2951ea0c62390a2507701ec', 2.41),
('IT17120210', 'Chenal Arasakularatne', '711235267', 'Chenal.Arasakularatne@gmail.com', 3, 2, 0, '52ca9c1666af5293c3641f785ce64be6', 3.78),
('IT17120211', 'Chenara Batuwantudawe', '711235268', 'Chenara.Batuwantudawe@gmail.com', 3, 2, 0, '25f5e6580c92d0602e097d0cf795af06', 3.48),
('IT17120212', 'Chenaya Thambugala', '711235269', 'Chenaya.Thambugala@gmail.com', 3, 2, 0, 'c5eebe807d40467fdfe4dcb8e0e014e5', 1.99),
('IT17120213', 'Cheng Senaviratne', '711235270', 'Cheng.Senaviratne@gmail.com', 3, 2, 0, 'bd12cd7db24f7a6997132c16dec2ad2c', 2.68),
('IT17120214', 'Chenitha Dayaratne', '711235271', 'Chenitha.Dayaratne@gmail.com', 3, 2, 0, '5bb74c3a8d6dc15f9ad08df5fa8b96ef', 1.5),
('IT17120215', 'Chenuli Obeysekara', '711235272', 'Chenuli.Obeysekara@gmail.com', 3, 2, 0, '735996312fd02d7177f34c729ead5c64', 2.36),
('IT17120216', 'Chethana Kulasekara', '711235273', 'Chethana.Kulasekara@gmail.com', 3, 2, 0, '4c601aea9aa2321f8823648c89d885d6', 2.08),
('IT17120217', 'chevonne Gunasekara', '711235274', 'chevonne.Gunasekara@gmail.com', 3, 2, 0, 'df8bce79f3a6bb2e5a025f652f0d3a4c', 2.75),
('IT17120218', 'Cheyne Dassanayake', '711235275', 'Cheyne.Dassanayake@gmail.com', 3, 2, 0, '5d111b93243e34ed2f1b1a31cb77d249', 1.41),
('IT17120219', 'Chinthaka Chanuwan', '711235276', 'Chinthaka.Chanuwan@gmail.com', 3, 2, 0, 'e35d574cb75c680ab509f09bacccbc4f', 2.18),
('IT17120220', 'Chinthani Hewavitharana', '711235277', 'Chinthani.Hewavitharana@gmail.com', 3, 2, 0, '433f7df24b9a98dde0a1a0922378d497', 1.15),
('IT17120221', 'Chirani Gallage', '711235278', 'Chirani.Gallage@gmail.com', 3, 2, 0, '11e9f75cc4f23315d7b3b5c4422cd067', 3.71),
('IT17120222', 'Chirantha Malalasekara', '711235279', 'Chirantha.Malalasekara@gmail.com', 3, 2, 0, '905375569e1f79d1c8a280938b78db20', 1.6),
('IT17120223', 'Chirath Waduge', '711235280', 'Chirath.Waduge@gmail.com', 3, 2, 0, 'ee3512949dee390f1ec479ce5982e68f', 2.26),
('IT17120224', 'Chithira Vithanachchi', '711235281', 'Chithira.Vithanachchi@gmail.com', 3, 2, 0, 'f776584d6037ef9ee2c04227e0ac642d', 1.21),
('IT17120225', 'Chithra Dasanayaka', '711235282', 'Chithra.Dasanayaka@gmail.com', 3, 2, 0, '9393336ec68ce34102cde40ff0700719', 1.44),
('IT17120226', 'Chithral Vimarsha', '711235283', 'Chithral.Vimarsha@gmail.com', 3, 2, 0, 'f549f18ca1c83775919c344e5f0492aa', 2.23),
('IT17120227', 'Chitra Abeysundara', '711235284', 'Chitra.Abeysundara@gmail.com', 3, 2, 0, '92ab476ee27521d69f0ac13f0950cf7b', 1.52),
('IT17120228', 'Chitralal Kuruneru', '711235285', 'Chitralal.Kuruneru@gmail.com', 3, 2, 0, '39466c8392a3ec7bc34d751ead61c90c', 2.98),
('IT17120229', 'Chris Goonathilake', '711235286', 'Chris.Goonathilake@gmail.com', 3, 2, 0, '3dd3b07c4db90c1cdbf200bc5803067b', 2.58),
('IT17120230', 'Chrishan Goonetilake', '711235287', 'Chrishan.Goonetilake@gmail.com', 3, 2, 0, 'f20e2778915d85568ce4eccc38b1d638', 2.2),
('IT17120231', 'Chrishanthi Weerasuriya', '711235288', 'Chrishanthi.Weerasuriya@gmail.com', 3, 2, 0, '9166e38a4d90a1eb6f87f345423fc7fa', 1.74),
('IT17120232', 'Christian Ratnasiri', '711235289', 'Christian.Ratnasiri@gmail.com', 3, 2, 0, '62c7ae48b312b8a97f43b0ed5f9d18bf', 2.09),
('IT17120233', 'Christine Denuwan', '711235290', 'Christine.Denuwan@gmail.com', 3, 2, 0, '4f57c1b8e9e69f06bc6e365e89ce6cbb', 3.45),
('IT17120234', 'Christoper Lakshika', '711235291', 'Christoper.Lakshika@gmail.com', 3, 2, 0, '856baa0a1675fa5c352c67c52452e01c', 3.29),
('IT17120235', 'Christy Weragoda', '711235292', 'Christy.Weragoda@gmail.com', 3, 2, 0, '1ce60e23e3f4e04dbb5949cfc53370a0', 3.63),
('IT17120236', 'Chulani Priyangani', '711235293', 'Chulani.Priyangani@gmail.com', 3, 2, 0, '6b803c0cf38182467d565787d25125eb', 1.23),
('IT17120237', 'Cicelia Siribaddana', '711235294', 'Cicelia.Siribaddana@gmail.com', 3, 2, 0, '6af8213fc942c98b05ae4d85c781a270', 1.51),
('IT17120238', 'Cicilia Samarawickrama', '711235295', 'Cicilia.Samarawickrama@gmail.com', 3, 2, 0, '6efd8d4140bcf32b820e3953d1be6987', 1.47),
('IT17120239', 'Cindy Weerasundara', '711235296', 'Cindy.Weerasundara@gmail.com', 3, 2, 0, '85e1c31d89c78df6ca82b83abd0a8ab8', 1.81),
('IT17120240', 'Claes Banadarage', '711235297', 'Claes.Banadarage@gmail.com', 3, 2, 1, 'cf32a4a73db5631b58a6caa19263808d', 1.58),
('IT17120241', 'Clifford Devarathna', '711235298', 'Clifford.Devarathna@gmail.com', 3, 2, 1, '337b53a27bf70dd4e59bc854ce1cc729', 3.57),
('IT17120242', 'Constantine Wickramaratne', '711235299', 'Constantine.Wickramaratne@gmail.com', 3, 2, 1, '4dfc058a2ed3f0bef8b98e54c55936f0', 1.19),
('IT17120243', 'Cristenia Nangallage', '711235300', 'Cristenia.Nangallage@gmail.com', 3, 2, 1, 'c16e59366b50833a7c751f93ceb91cbf', 3.44),
('IT17120244', 'Cristian Sooriyarachchi', '711235301', 'Cristian.Sooriyarachchi@gmail.com', 3, 2, 1, 'a6e37494734f3030e1ec8a059f9b67e9', 1.13),
('IT17120245', 'Cryshanthi Samantha', '711235302', 'Cryshanthi.Samantha@gmail.com', 3, 2, 1, '6184a806b905601e49410851d675eaea', 1.95),
('IT17120246', 'Crystal Srimal', '711235303', 'Crystal.Srimal@gmail.com', 3, 2, 1, '4cd5da7a8bcce486bdedbaa840a8aec8', 2.55),
('IT17120247', 'Cyril Alagiyawanna', '711235304', 'Cyril.Alagiyawanna@gmail.com', 3, 2, 1, '6501f8c8eb2f66bc5bdf60b397e09911', 2.03),
('IT17120248', 'Daham Athuruliya', '711235305', 'Daham.Athuruliya@gmail.com', 3, 2, 1, '1cc72d1015cc82335bd914056733acaa', 2.08),
('IT17120249', 'Dalal Hewage', '711235306', 'Dalal.Hewage@gmail.com', 3, 2, 1, 'f755ff48f09ee61635c0271db79adbff', 1.24),
('IT17120250', 'Damayanthi Alwis', '711235307', 'Damayanthi.Alwis@gmail.com', 3, 2, 1, '236d88e93b70d73a6453d2620149cb94', 2.87),
('IT17120251', 'Daminda Magenarachchi', '711235308', 'Daminda.Magenarachchi@gmail.com', 3, 2, 1, '09c788dbe6bf08e49e9a08843023cfb1', 1.18),
('IT17120252', 'Damini Rangedara', '711235309', 'Damini.Rangedara@gmail.com', 3, 2, 1, '355df8974abdfef403beb9603c6fdb4d', 3.16),
('IT17120253', 'Damith Costa', '711235310', 'Damith.Costa@gmail.com', 3, 2, 1, '7d169d2217059292f7e14f369996c86b', 2.71),
('IT17120254', 'Damitha Siriwardana', '711235311', 'Damitha.Siriwardana@gmail.com', 3, 2, 1, '47973bfcc27e747ffdf1557bb45bae4c', 1.05),
('IT17120255', 'Damithri Adikari', '711235312', 'Damithri.Adikari@gmail.com', 3, 2, 1, 'f44eed6547651cd468fa597486962cf2', 2.37),
('IT17120256', 'Dammi Leelaratne', '711235313', 'Dammi.Leelaratne@gmail.com', 3, 2, 1, '3b3b809e0ebd1bf428a2f8384b417629', 2.03),
('IT17120257', 'Dammika Mirando', '711235314', 'Dammika.Mirando@gmail.com', 3, 2, 1, '2c2dcbbbc4c9f3484b1c0b2e152d5465', 2.89),
('IT17120258', 'Damsilu Janaka', '711235315', 'Damsilu.Janaka@gmail.com', 3, 2, 1, '6e666ec1543feae1570de7d4daa4c7f4', 3.15),
('IT17120259', 'Dan Thambawita', '711235316', 'Dan.Thambawita@gmail.com', 3, 2, 1, '1d57fa7f332bf32219e70e1acb119b7b', 2.6),
('IT17120260', 'Danashi Navodya', '711235317', 'Danashi.Navodya@gmail.com', 3, 2, 1, 'afb5e4c7786b36d3321273253040dfd3', 2.73),
('IT17120261', 'Danica Fonseka', '711235318', 'Danica.Fonseka@gmail.com', 3, 2, 1, '03874e31884a43b97f2f060942bdf60b', 2.66),
('IT17120262', 'Danidu Rodrigo', '711235319', 'Danidu.Rodrigo@gmail.com', 3, 2, 1, 'eb0bbe7f9f9626a0aae7473d325c2aef', 3.87),
('IT17120263', 'Daniel Thudawage', '711235320', 'Daniel.Thudawage@gmail.com', 3, 2, 1, 'e31e2873616a33136f7ba8745675a3bf', 3.31),
('IT17120264', 'Danika Arachchige', '711235321', 'Danika.Arachchige@gmail.com', 3, 2, 1, '92ea06a6dc6e426612bc94956cd6b3dd', 3.57),
('IT17120265', 'Danushi Madurishani', '711235322', 'Danushi.Madurishani@gmail.com', 3, 2, 1, 'ab9384d5a37f199baee00d0d81953e86', 2.08),
('IT17120266', 'Danushka Jenkins', '711235323', 'Danushka.Jenkins@gmail.com', 3, 2, 1, '0d1f3d01b777c874461cd6ad89c5ca81', 2.06),
('IT17120267', 'Darshana Alakolange', '711235324', 'Darshana.Alakolange@gmail.com', 3, 2, 1, 'bf04284ad29c2177a4cfdc80f3398f87', 2.77),
('IT17120268', 'Darshika Namaratne', '711235325', 'Darshika.Namaratne@gmail.com', 3, 2, 1, '6aa80c0918cc506ff0ab67b9bd567d0e', 3.18),
('IT17120269', 'Dassanayake Ranathunga', '711235326', 'Dassanayake.Ranathunga@gmail.com', 3, 2, 1, '3c7e3c5b9542de36a206da2bf9902d93', 3.44),
('IT17120270', 'Dasun Erandika', '711235327', 'Dasun.Erandika@gmail.com', 4, 1, 0, 'c232aaa2429ab324bb47d895c1de4a73', 1.9),
('IT17120271', 'Dathri Wijesuriya', '711235328', 'Dathri.Wijesuriya@gmail.com', 4, 1, 0, '306c97f29eb04626d21665f06a39dbe1', 3.75),
('IT17120272', 'Dave Manawamma', '711235329', 'Dave.Manawamma@gmail.com', 4, 1, 0, '3ca7fa1732ae2e33f85b024b45b07ce2', 2.59),
('IT17120273', 'Daya Soysa', '711235330', 'Daya.Soysa@gmail.com', 4, 1, 0, '885d0256f7503403c9cf096c19f92e86', 2.1),
('IT17120274', 'Dayan Randima', '711235331', 'Dayan.Randima@gmail.com', 4, 1, 0, '24cd54e32658e995c0e01c9b5df0a521', 1.62),
('IT17120275', 'Dayani Lakvindi', '711235332', 'Dayani.Lakvindi@gmail.com', 4, 1, 0, '6f7afd22ffea101f829654a352b15f4f', 3.36),
('IT17120276', 'Deelaka Nethum', '711235333', 'Deelaka.Nethum@gmail.com', 4, 1, 0, '51ce4e43d4fd0a22edc7ad0c9a641c05', 3.3),
('IT17120277', 'Deen Akithma', '711235334', 'Deen.Akithma@gmail.com', 4, 1, 0, '7fb751ad8900ec301ada2aeab57779c6', 3.23),
('IT17120278', 'Deepal Kumarasinghe', '711235335', 'Deepal.Kumarasinghe@gmail.com', 4, 1, 0, 'f526459bcdca2f3ee57dda6b7dffe16a', 2.81),
('IT17120279', 'Deepika Daniel', '711235336', 'Deepika.Daniel@gmail.com', 4, 1, 0, '4729fadece56a1c15c801826cb9367eb', 2.82),
('IT17120280', 'Deepthi Atapattu', '711235337', 'Deepthi.Atapattu@gmail.com', 4, 1, 0, '40647fc367be5b2190d2ae6f6c886945', 2.32),
('IT17120281', 'Deepthini Sooriyamudali', '711235338', 'Deepthini.Sooriyamudali@gmail.com', 4, 1, 0, '8de47c2f9f75c542ea31e82e3eba630c', 1.98),
('IT17120282', 'Deethri Priyangika', '711235339', 'Deethri.Priyangika@gmail.com', 4, 1, 0, 'cf0706b6416b720a542215a14252ef66', 3.16),
('IT17120283', 'Dehami Methew', '711235340', 'Dehami.Methew@gmail.com', 4, 1, 0, '65ae1b3294a0f3398eb7c57eab0579f9', 3.24),
('IT17120284', 'Dehan Sam', '711235341', 'Dehan.Sam@gmail.com', 4, 1, 0, 'd35dcbd3fc67a33ec2f0282c4ccc0b6b', 3.21),
('IT17120285', 'Dehigaspitiya Lokuhetti', '711235342', 'Dehigaspitiya.Lokuhetti@gmail.com', 4, 1, 0, 'f7f6d329d6351bad5f2854f11a88e660', 3.57),
('IT17120286', 'Delano Javier', '711235343', 'Delano.Javier@gmail.com', 4, 1, 0, '08a195903dc506f900ce1a6e7018c483', 2.19),
('IT17120287', 'Delichelle Newns', '711235344', 'Delichelle.Newns@gmail.com', 4, 1, 0, '2953e60e6208e81eb78deff744cadaaa', 3.89),
('IT17120288', 'Delika Kodikara', '711235345', 'Delika.Kodikara@gmail.com', 4, 1, 0, '05fe1ef91729e8912097d34e10284f49', 1.79),
('IT17120289', 'Demintha Biding', '711235346', 'Demintha.Biding@gmail.com', 4, 1, 0, 'a4e42e4b5d7def1063ac962500242499', 3.58),
('IT17120290', 'Denise Thorne', '711235347', 'Denise.Thorne@gmail.com', 4, 1, 0, 'aa0af99ce48716248ab9feb10e16e1ff', 3.68),
('IT17120291', 'Denumi Greig', '711235348', 'Denumi.Greig@gmail.com', 4, 1, 0, '42b9110725f70fc2f14de001b9de9c40', 2.27),
('IT17120292', 'Derric Otte', '711235349', 'Derric.Otte@gmail.com', 4, 1, 0, '9929ac322dfe518ffe0a30acf9c4393c', 1.22),
('IT17120293', 'Derrik Anthony', '711235350', 'Derrik.Anthony@gmail.com', 4, 1, 0, 'd17cd15d0db6aa66495ec957ef920d17', 2.64),
('IT17120294', 'Deshaka Berenger', '711235351', 'Deshaka.Berenger@gmail.com', 4, 1, 0, 'daef3f5c0c65aa7cb7f42064d49968f0', 3.98),
('IT17120295', 'Deshan Rathnayake', '711235352', 'Deshan.Rathnayake@gmail.com', 4, 1, 0, 'ee28a74fe6b3c769f7ea8061a85a46e6', 2.81),
('IT17120296', 'Deva Suduwella', '711235353', 'Deva.Suduwella@gmail.com', 4, 1, 0, '87012bd2f292bd88c3118711bd9ac36e', 1.03),
('IT17120297', 'Devaansh Wickramawardene', '711235354', 'Devaansh.Wickramawardene@gmail.com', 4, 1, 0, 'b9eeda07de1faf556ee937650cc380c7', 3.6),
('IT17120298', 'Devan Carvalho', '711235355', 'Devan.Carvalho@gmail.com', 4, 1, 0, '09d5510cc537a10df3f82d8564465da9', 1.64),
('IT17120299', 'Devanash Johnpulle', '711235356', 'Devanash.Johnpulle@gmail.com', 4, 1, 0, '23a386caf145a9d745643df2de5ef4de', 2.65),
('IT17120300', 'Devansh Siriwardane', '711235357', 'Devansh.Siriwardane@gmail.com', 4, 1, 1, '756d4cd4458c3ac2f3e8a2b563e243f4', 1.82),
('IT17120301', 'Devaraja Wimalaratne', '711235358', 'Devaraja.Wimalaratne@gmail.com', 4, 1, 1, '79f0400386c3a52992f6375382ccdc47', 1.75),
('IT17120302', 'Deven Dias', '711235359', 'Deven.Dias@gmail.com', 4, 1, 1, 'e03e6ff417078dc93da6d3342d6fafae', 1.52),
('IT17120303', 'Devika Ruwan', '711235360', 'Devika.Ruwan@gmail.com', 4, 1, 1, 'be6bde0594c9924cd465d1db835de1bd', 2.3),
('IT17120304', 'Devinda Ranasinghe', '711235361', 'Devinda.Ranasinghe@gmail.com', 4, 1, 1, '85e0461fd9e44a1458c682d5a9910f22', 1.17),
('IT17120305', 'Devini Waniganayake', '711235362', 'Devini.Waniganayake@gmail.com', 4, 1, 1, 'e8df54563afb6806e67135eb32e96b37', 1.4),
('IT17120306', 'Devvni Samarasekara', '711235363', 'Devvni.Samarasekara@gmail.com', 4, 1, 1, '2f1115e48040d7880cd3c5989ffaee9d', 2.61),
('IT17120307', 'Dewmini Weerabaddana', '711235364', 'Dewmini.Weerabaddana@gmail.com', 4, 1, 1, 'fd303cf89acf98d05b840b399fefc66f', 1.01),
('IT17120308', 'Dewni Wijekoon', '711235365', 'Dewni.Wijekoon@gmail.com', 4, 1, 1, 'be27c8ad4fe822e2d76d8696e6aa23ec', 3.79),
('IT17120309', 'Dhamma Lindell', '711235366', 'Dhamma.Lindell@gmail.com', 4, 1, 1, '89ee2add161f2648cf0045cccc0cc1e6', 2.53),
('IT17120310', 'Dhanakshitha Lopez', '711235367', 'Dhanakshitha.Lopez@gmail.com', 4, 1, 1, '498df68756bdb384b637b75ce3c21a6a', 1.32),
('IT17120311', 'Dhanuka Thisal', '711235368', 'Dhanuka.Thisal@gmail.com', 4, 1, 1, '6e7ccf6653d28d66aa8b0b6f558ccdfe', 2.94),
('IT17120312', 'Dhanunjaya Meegahawatte', '711235369', 'Dhanunjaya.Meegahawatte@gmail.com', 4, 1, 1, '683c0c1ae8ab93ea83d27561a272678b', 3.72),
('IT17120313', 'Dhanushka Ratnasena', '711235370', 'Dhanushka.Ratnasena@gmail.com', 4, 1, 1, '34c0cfa96926fe754a96a104f111042e', 3.06),
('IT17120314', 'Dhanya Karunanayake', '711235371', 'Dhanya.Karunanayake@gmail.com', 4, 1, 1, '0f3cc14517c966e20fc84514e593e269', 3.4),
('IT17120315', 'Dharaka Muthukumarana', '711235372', 'Dharaka.Muthukumarana@gmail.com', 4, 1, 1, '5054cb6aac70f6e95455539e4e86c0d6', 1.55),
('IT17120316', 'Dharana Jayathilake', '711235373', 'Dharana.Jayathilake@gmail.com', 4, 1, 1, '54981f074863d51e47ef9deb917c2a4c', 3.28),
('IT17120317', 'Dharani Rupika', '711235374', 'Dharani.Rupika@gmail.com', 4, 1, 1, 'a850617399d7bf7e7d6fd27b95be586b', 1.89),
('IT17120318', 'Dharma Sri', '711235375', 'Dharma.Sri@gmail.com', 4, 1, 1, 'b8e587d1f449d7d2b2e9e3c4b6dc63e8', 1.47),
('IT17120319', 'Dharna Senevirathne', '711235376', 'Dharna.Senevirathne@gmail.com', 4, 1, 1, 'd860aadad08ee45b550ca4850ff0a50e', 3.45),
('IT17120320', 'Dharshani Mohotti', '711235377', 'Dharshani.Mohotti@gmail.com', 4, 1, 1, 'dfef0097e9a7fdaa4c3ebdd12ac30bc2', 1.45),
('IT17120321', 'Dharshi Samarajeewa', '711235378', 'Dharshi.Samarajeewa@gmail.com', 4, 1, 1, '16879d8bcbe7f63d8c72fe0841cf2165', 2.09),
('IT17120322', 'Dias Anuttara', '711235379', 'Dias.Anuttara@gmail.com', 4, 1, 1, '2595b7bea607685aa412d5eff684d3bd', 2.27),
('IT17120323', 'Diccon Dyaratne', '711235380', 'Diccon.Dyaratne@gmail.com', 4, 1, 1, '5eb8ed2de5ef6f6eb372f9fc6ee03529', 1.58),
('IT17120324', 'Dickman Augustine', '711235381', 'Dickman.Augustine@gmail.com', 4, 1, 1, '995550b4dc49d0e6c723fccdb4cfcd74', 2.76),
('IT17120325', 'Digeshini Aisheharya', '711235382', 'Digeshini.Aisheharya@gmail.com', 4, 1, 1, '2b6ac132c0d46012073b8ccd3b813e87', 1.73),
('IT17120326', 'Dihan Tissera', '711235383', 'Dihan.Tissera@gmail.com', 4, 1, 1, '221ccb1f8316cba3844dd2d2cc595720', 1.76),
('IT17120327', 'Dihen Sampath', '711235384', 'Dihen.Sampath@gmail.com', 4, 1, 1, 'cd886bac0bb7e5c017d9278a47a4626b', 1.88),
('IT17120328', 'Dilan Krishnakantha', '711235385', 'Dilan.Krishnakantha@gmail.com', 4, 1, 1, 'cfad9965fe2dbd00796011d93e42f31c', 2.42),
('IT17120329', 'Dilani Krishnakanthan', '711235386', 'Dilani.Krishnakanthan@gmail.com', 4, 1, 1, '2b43ad062c8a9f69a602595d78353961', 3.82),
('IT17120330', 'Dilantha Ellepola', '711235387', 'Dilantha.Ellepola@gmail.com', 4, 2, 0, '4c2e63cdd758dba760e4f2b455707f35', 2.31),
('IT17120331', 'Dileepan Paranavithana', '711235388', 'Dileepan.Paranavithana@gmail.com', 4, 2, 0, 'aea1fd689e9d6557e9998769743fbb4e', 3.79),
('IT17120332', 'Dilesh Shirani', '711235389', 'Dilesh.Shirani@gmail.com', 4, 2, 0, '26fd77cfc76d3224eaca0beae373d434', 3.57),
('IT17120333', 'Dilhan Wijesooriya', '711235390', 'Dilhan.Wijesooriya@gmail.com', 4, 2, 0, '10178041dc6cf19d9fec3ac8d2e5d993', 2.17),
('IT17120334', 'Dilhani Muthumala', '711235391', 'Dilhani.Muthumala@gmail.com', 4, 2, 0, '4d856eacf2170d20c161eb11089986a2', 1.05),
('IT17120335', 'Dilini Suraj', '711235392', 'Dilini.Suraj@gmail.com', 4, 2, 0, 'f51f8de4aeb5b99d1c839839fa43a896', 2.07),
('IT17120336', 'Dilipa Anujana', '711235393', 'Dilipa.Anujana@gmail.com', 4, 2, 0, '32f05fd9edec007b161f237b96bd30b5', 2.41),
('IT17120337', 'Dilki Wickramage', '711235394', 'Dilki.Wickramage@gmail.com', 4, 2, 0, 'c54a0999839480981bc06747b3dc8851', 3.32),
('IT17120338', 'Dilkie Suriya', '711235395', 'Dilkie.Suriya@gmail.com', 4, 2, 0, '5a7719f673f2f40d68d79d5411bb7714', 2),
('IT17120339', 'Dillon Kodituwakku', '711235396', 'Dillon.Kodituwakku@gmail.com', 4, 2, 0, '57396f225dfd51a5261de1a970810093', 2.67),
('IT17120340', 'Dilshan Sankalpa', '711235397', 'Dilshan.Sankalpa@gmail.com', 4, 2, 0, 'd56c205bd98edc69e1ae6195bddcd235', 1.08),
('IT17120341', 'Dilshani Senal', '711235398', 'Dilshani.Senal@gmail.com', 4, 2, 0, 'c3a76fa45248e3416b77d1251422bf49', 1.39),
('IT17120342', 'Dilupa Reddy', '711235399', 'Dilupa.Reddy@gmail.com', 4, 2, 0, '974c321a6014b3d992ed833b463cc043', 3.25),
('IT17120343', 'Dilusha Attygalle', '711235400', 'Dilusha.Attygalle@gmail.com', 4, 2, 0, 'abeca56042ed085f58667bea9997c853', 2.68),
('IT17120344', 'Dimantha Heshan', '711235401', 'Dimantha.Heshan@gmail.com', 4, 2, 0, '078ed726af506e89b476aa6fea7cd250', 3.7),
('IT17120345', 'Dimanthi Kodithuwakku', '711235402', 'Dimanthi.Kodithuwakku@gmail.com', 4, 2, 0, 'a2a0046cd283e471e55f88dde335bed9', 3.9),
('IT17120346', 'Dimitri Manimuttu', '711235403', 'Dimitri.Manimuttu@gmail.com', 4, 2, 0, 'e508d44e173eaa2882f05f35097e5a25', 3.67),
('IT17120347', 'Dimuthu Hemamalika', '711235404', 'Dimuthu.Hemamalika@gmail.com', 4, 2, 0, '64ff3d9d9674526e8c64a2aa94bff32a', 2.43),
('IT17120348', 'Dinal Rathnavali', '711235405', 'Dinal.Rathnavali@gmail.com', 4, 2, 0, '66704ff35c91e5a75531d378d63161eb', 2.79),
('IT17120349', 'Dinali Martin', '711235406', 'Dinali.Martin@gmail.com', 4, 2, 0, 'edd27b11ebafec253cb2c9035e1ca47b', 1.81),
('IT17120350', 'Dinasha Kahawatte', '711235407', 'Dinasha.Kahawatte@gmail.com', 4, 2, 0, '2d79674d379966f4c1d2de2d5e85927f', 1.37),
('IT17120351', 'Dineli Kenura', '711235408', 'Dineli.Kenura@gmail.com', 4, 2, 0, '836e53bc4663ebb9a7fede65be6fa85c', 3.67),
('IT17120352', 'Dinesh Senehas', '711235409', 'Dinesh.Senehas@gmail.com', 4, 2, 0, 'fbdb75a77a5dd2fd428b189e69fdaaf4', 1.82),
('IT17120353', 'Dinesha Bandaranayake', '711235410', 'Dinesha.Bandaranayake@gmail.com', 4, 2, 0, '7c287219af9f4d7afecffe5e50d7f19e', 3.79),
('IT17120354', 'Dineth Gunaratne', '711235411', 'Dineth.Gunaratne@gmail.com', 4, 2, 0, '10a206cdbdd08b953b54bd4ab56a7c4e', 3.91),
('IT17120355', 'Dinidu Thyagarajah', '711235412', 'Dinidu.Thyagarajah@gmail.com', 4, 2, 0, 'fafdb371a8439f017ec490c4cf3a8a53', 2.9),
('IT17120356', 'Dinith Dissanayake', '711235413', 'Dinith.Dissanayake@gmail.com', 4, 2, 0, '964e1a1562f9a4e77d8811b93527a660', 1.67),
('IT17120357', 'Dinithi Kanumule', '711235414', 'Dinithi.Kanumule@gmail.com', 4, 2, 0, '5dbac46690f3bb230e1fb32bebdaf285', 3.32),
('IT17120358', 'Dinod Siriwardhana', '711235415', 'Dinod.Siriwardhana@gmail.com', 4, 2, 0, 'acbdd14cc1dd54af732bc01ecb8c2dae', 1.26),
('IT17120359', 'Dinuja Vithanage', '711235416', 'Dinuja.Vithanage@gmail.com', 4, 2, 0, 'e5b8dfebb95c2817526170650f821aac', 1.02),
('IT17120360', 'Dinuki Gunawardane', '711235417', 'Dinuki.Gunawardane@gmail.com', 4, 2, 0, '5ce03f33191a4901b1ab50fd429e18de', 1.62),
('IT17120361', 'Dinula Liyanarachchi', '711235418', 'Dinula.Liyanarachchi@gmail.com', 4, 2, 0, 'ded3ce0ad716f4c3a5a0ce1de8b357d1', 2.62),
('IT17120362', 'Dinush Shanika', '711235419', 'Dinush.Shanika@gmail.com', 4, 2, 0, '0e27abf544fc60b628ecdada24cfe962', 1.85),
('IT17120363', 'Dinusha Wijesundara', '711235420', 'Dinusha.Wijesundara@gmail.com', 4, 2, 0, 'b5ded25d7a497cd32507377b0f61b4b6', 2.86),
('IT17120364', 'Dinuth Hendavitharana', '711235421', 'Dinuth.Hendavitharana@gmail.com', 4, 2, 0, '8387f7d848a67d5f87bfbbec6fe718a8', 3.8),
('IT17120365', 'Dion Koelmeyer', '711235422', 'Dion.Koelmeyer@gmail.com', 4, 2, 0, '7110b8fb405762e5139d38cebcba5e7f', 2.87),
('IT17120366', 'Dishan Gomez', '711235423', 'Dishan.Gomez@gmail.com', 4, 2, 0, '210c2c81ec6e3e8a7c049bbfe444bed4', 1.05),
('IT17120367', 'Dishnika Kalendra', '711235424', 'Dishnika.Kalendra@gmail.com', 4, 2, 0, '13865611c39ac98575ce66b7a06ff129', 3.85),
('IT17120368', 'Disna Sanjana', '711235425', 'Disna.Sanjana@gmail.com', 4, 2, 0, 'd0dab08a718365d774fd970eedfe25b3', 2.92),
('IT17120369', 'Diumin Tyson', '711235426', 'Diumin.Tyson@gmail.com', 4, 2, 0, '0097cdd5bf5b7b7fcb7dfcb1f3edd797', 3.08),
('IT17120370', 'Divanka Ramaneshwara', '711235427', 'Divanka.Ramaneshwara@gmail.com', 4, 2, 1, 'f4dd805221ae28ec099a51f516f5d2bb', 3.56),
('IT17120371', 'Divshi Samaratunga', '711235428', 'Divshi.Samaratunga@gmail.com', 4, 2, 1, '1078ec23943c01a559ed2899bbfddd7d', 1.41),
('IT17120372', 'Divya Hewagama', '711235429', 'Divya.Hewagama@gmail.com', 4, 2, 1, '6da3311b76a5ca9ace2004279aa03427', 3.7),
('IT17120373', 'Dolly Lakmal', '711235430', 'Dolly.Lakmal@gmail.com', 4, 2, 1, '46c6cf8ba64b5cd6a1d8bde8a2da20bf', 1.87),
('IT17120374', 'Don Pahathkumbura', '711235431', 'Don.Pahathkumbura@gmail.com', 4, 2, 1, 'a0ff0a7d68b53aa1789bdcaf9b13a914', 1.08),
('IT17120375', 'Donald Sandinu', '711235432', 'Donald.Sandinu@gmail.com', 4, 2, 1, '2430857f4ffbea4df275e54b1a33b7be', 1.14),
('IT17120376', 'Druvi Prabashwara', '711235433', 'Druvi.Prabashwara@gmail.com', 4, 2, 1, '4ea4563485d763015d7b8f2f7f2ad8c9', 2.6),
('IT17120377', 'Dubsy Prabsshwara', '711235434', 'Dubsy.Prabsshwara@gmail.com', 4, 2, 1, '27f9d23b1477f65069dc46a62d45218c', 2.73),
('IT17120378', 'Dulanga Hansani', '711235435', 'Dulanga.Hansani@gmail.com', 4, 2, 1, '51283f44d21355c39a9d815995e42389', 1.74),
('IT17120379', 'Dulani Udayana', '711235436', 'Dulani.Udayana@gmail.com', 4, 2, 1, 'ffc6736d0c3fff0e7824f338513de75f', 3.92),
('IT17120380', 'Duleeka Dasun', '711235437', 'chammaofficial@gmail.com', 4, 2, 1, 'e6de5f9d3f7bdbd3326fef322699e3f7', 3.27),
('IT17120381', 'Dulgani Rashmika', '711235438', 'Dulgani.Rashmika@gmail.com', 4, 2, 1, 'b08414daf94f46f0fbf576617fe36a1c', 2.6),
('IT17120382', 'Dulina Wickramarathne', '711235439', 'Dulina.Wickramarathne@gmail.com', 4, 2, 1, 'fe77fd0e0fdb87fe1cad2cb819176df5', 2.69),
('IT17120383', 'Dulip Nethsara', '711235440', 'Dulip.Nethsara@gmail.com', 4, 2, 1, '1b84b0e9ab83da3a8d992624c40a6cab', 1.33),
('IT17120384', 'Dulkith Warnakulasooriya', '711235441', 'Dulkith.Warnakulasooriya@gmail.com', 4, 2, 1, '7aae5086dceaae38e70138b7946ba12e', 3.48),
('IT17120385', 'Dulmini Jothilingam', '711235442', 'Dulmini.Jothilingam@gmail.com', 4, 2, 1, '695f81395eefb83cffb42bbf743b2a91', 2.92);
INSERT INTO `student` (`id`, `name`, `mobile`, `email`, `year`, `semester`, `prorata`, `password`, `gpa`) VALUES
('IT17120386', 'Duminda Ransaja', '711235443', 'Duminda.Ransaja@gmail.com', 4, 2, 1, '816f704d16d1c8c02dbcb98271c0a049', 1.13),
('IT17120387', 'Dumindu Jayanetti', '711235444', 'Dumindu.Jayanetti@gmail.com', 4, 2, 1, '34888708469e93fb2ad683f95aa86ffd', 3.23),
('IT17120388', 'Duralri Jayamanne', '711235445', 'Duralri.Jayamanne@gmail.com', 4, 2, 1, '49f0ae220dda2cea57f4274d0504f91e', 1.32),
('IT17120389', 'Dushal Kanagarathnam', '711235446', 'Dushal.Kanagarathnam@gmail.com', 4, 2, 1, '4d6baba0b5ef1fdcbeda62b4c3454b25', 3.59),
('IT17120390', 'Dushantha Galappatti', '711235447', 'Dushantha.Galappatti@gmail.com', 4, 2, 1, '23606de71416e472dccf16c221e17ddf', 2.59),
('IT17120391', 'Dushi Gunawardena', '711235448', 'Dushi.Gunawardena@gmail.com', 4, 2, 1, '560afe142e3748f39f1b5d33f20c4a69', 3.22),
('IT17120392', 'Dushyank Marapana', '711235449', 'Dushyank.Marapana@gmail.com', 4, 2, 1, 'e57bf1543e29ac6c4907cf7f5a458f3d', 3),
('IT17120393', 'Dushyantha Sachira', '711235450', 'Dushyantha.Sachira@gmail.com', 4, 2, 1, '34189c1f1bdf34e9d226c15d482760dc', 1.41),
('IT17120394', 'Duvindra Hadapangoda', '711235451', 'Duvindra.Hadapangoda@gmail.com', 4, 2, 1, '6ab38050fec2251190c34cdc794bf147', 2.59),
('IT17120395', 'Duvithri Jayawickrama', '711235452', 'Duvithri.Jayawickrama@gmail.com', 4, 2, 1, 'd5f904198734285f7d2612d98767b216', 3.36),
('IT17120396', 'Easha Herath', '711235453', 'Easha.Herath@gmail.com', 4, 2, 1, '069c54076d4600c93034f4ddd7718116', 2.48),
('IT17120397', 'Eastmen Vithanarachchi', '711235454', 'Eastmen.Vithanarachchi@gmail.com', 4, 2, 1, 'acc9bfc819f7a1e726363965634be575', 1.39),
('IT17120398', 'Ediriarachchi Bentotage', '711235455', 'Ediriarachchi.Bentotage@gmail.com', 4, 2, 1, '09dc7fbc49319c092411a5f2239b489f', 3.07),
('IT17120399', 'Ehab Peries', '711235456', 'Ehab.Peries@gmail.com', 4, 2, 1, '42efbd3cca7136d3ccbdaa8e3ed1e8c8', 3.1),
('IT17120400', 'Ekanayaka Weerakoon', '711235457', 'Ekanayaka.Weerakoon@gmail.com', 4, 2, 1, 'd674ae63bb7a496db62842a194b9c1a9', 2.64);

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `scount` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`id`, `name`, `course`, `description`, `scount`) VALUES
('T10', 'Create a Group Management System', 'WED', 'Create a Group Management System', 0),
('T11', 'Create a Web Server', 'WED', 'Create a Web Server', 0),
('T12', 'List Various Data structures', 'SLIIT009', 'List Various Data structures', 0),
('T13', 'Mathematics for Computer', 'COM', 'Mathematics for Computer', 0),
('T2', 'Library Management System', 'SLIIT001', 'A system for manage books in a library', 2),
('T3', 'Property Management System', 'SLIIT001', 'A system for property management company', 1),
('T4', 'Billing System', 'SLIIT001', 'A system for a shop', 0),
('T5', 'Pharmaceutical system', 'SLIIT001', 'A system for a  online pharmacy', 1),
('T6', 'Inventory System', 'SLIIT006', 'A system for a Database Managemt', 0),
('T7', 'Reasearch Project', 'SLIIT019', 'A system for Research ', 2),
('T8', 'Final project end', 'SLIIT020', 'about industrial project', 0),
('T9', 'Web site development', 'WED', 'web application development', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_groups_course` (`course`);

--
-- Indexes for table `groups_students`
--
ALTER TABLE `groups_students`
  ADD KEY `fk_groups_students_groups` (`gid`),
  ADD KEY `fk_groups_students_student` (`sid`);

--
-- Indexes for table `groups_topics`
--
ALTER TABLE `groups_topics`
  ADD KEY `fk_groups_topics_groups` (`gid`),
  ADD KEY `fk_groups_topics_topic` (`tid`);

--
-- Indexes for table `group_leader`
--
ALTER TABLE `group_leader`
  ADD KEY `fk_group_leader_groups` (`gid`),
  ADD KEY `fk_group_leader_student` (`lid`);

--
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_topic_course` (`course`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `fk_groups_course` FOREIGN KEY (`course`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `groups_students`
--
ALTER TABLE `groups_students`
  ADD CONSTRAINT `fk_groups_students_groups` FOREIGN KEY (`gid`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_groups_students_student` FOREIGN KEY (`sid`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `groups_topics`
--
ALTER TABLE `groups_topics`
  ADD CONSTRAINT `fk_groups_topics_groups` FOREIGN KEY (`gid`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_groups_topics_topic` FOREIGN KEY (`tid`) REFERENCES `topic` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `group_leader`
--
ALTER TABLE `group_leader`
  ADD CONSTRAINT `fk_group_leader_groups` FOREIGN KEY (`gid`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_group_leader_student` FOREIGN KEY (`lid`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `topic`
--
ALTER TABLE `topic`
  ADD CONSTRAINT `fk_topic_course` FOREIGN KEY (`course`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
