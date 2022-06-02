-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2022 at 01:58 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surveydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(30) NOT NULL,
  `survey_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `answer` text NOT NULL,
  `question_id` int(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `survey_id`, `user_id`, `answer`, `question_id`, `date_created`) VALUES
(1, 1, 2, 'Sample Only', 4, '2020-11-10 14:46:07'),
(2, 1, 2, '[JNmhW],[zZpTE]', 2, '2020-11-10 14:46:07'),
(3, 1, 2, 'dAWTD', 1, '2020-11-10 14:46:07'),
(4, 1, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec in tempus turpis, sed fermentum risus. Praesent vitae velit rutrum, dictum massa nec, pharetra felis. Phasellus enim augue, laoreet in accumsan dictum, mollis nec lectus. Aliquam id viverra nisl. Proin quis posuere nulla. Nullam suscipit eget leo ut suscipit.', 4, '2020-11-10 15:59:43'),
(5, 1, 3, '[qCMGO],[JNmhW]', 2, '2020-11-10 15:59:43'),
(6, 1, 3, 'esNuP', 1, '2020-11-10 15:59:43'),
(7, 6, 5, 'tLzrh', 5, '2022-03-28 13:11:17'),
(8, 6, 5, '[ItMVE]', 6, '2022-03-28 13:11:17'),
(9, 6, 5, 'fsdfsdfgfgfgdfgdf', 7, '2022-03-28 13:11:17'),
(10, 7, 5, 'zxczxcz', 11, '2022-03-28 16:42:28'),
(11, 7, 5, 'zczxczx', 12, '2022-03-28 16:42:28'),
(12, 7, 5, 'xczczxcz', 13, '2022-03-28 16:42:28'),
(13, 9, 5, 'zxczxczcx', 14, '2022-03-28 16:43:51'),
(20, 10, 5, 'mUrgY', 19, '2022-03-28 19:52:58'),
(21, 10, 5, 'nWsva', 20, '2022-03-28 19:52:58'),
(22, 10, 5, 'ZOGWJ', 21, '2022-03-28 19:52:58');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(30) NOT NULL,
  `student_id` varchar(30) NOT NULL,
  `content` text NOT NULL,
  `app_status` varchar(10) NOT NULL,
  `reply` text NOT NULL,
  `app_date` datetime NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `student_id`, `content`, `app_status`, `reply`, `app_date`, `date_created`) VALUES
(7, '0', 'aaa', 'Accepted', '', '2022-04-26 18:01:00', '2022-04-26 18:01:20'),
(8, '0', 'aaa', 'Denied', '', '2022-04-26 18:01:00', '2022-04-26 18:01:44'),
(9, '0', 'cxvxcvxc', 'Accepted', '', '2022-04-26 18:01:00', '2022-04-26 18:06:29'),
(10, '0', 'cxvxcvxc', 'waiting', '', '2022-04-26 18:01:00', '2022-04-26 18:07:48'),
(11, 'dsfsdfs', 'cxvxcvxc', 'waiting', '', '2022-04-26 18:01:00', '2022-04-26 18:09:14'),
(26, '5', 'zxczxcxzczx', 'Accepted', '', '2022-04-27 20:40:00', '2022-04-26 20:40:36'),
(27, '8', 'exam', 'Accepted', '', '2022-06-02 15:20:00', '2022-06-01 15:20:43');

-- --------------------------------------------------------

--
-- Table structure for table `newsfeed`
--

CREATE TABLE `newsfeed` (
  `id` int(30) NOT NULL,
  `title` varchar(50) CHARACTER SET utf8 NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `uploads` varchar(50) CHARACTER SET utf8 NOT NULL,
  `author` varchar(30) CHARACTER SET utf8 NOT NULL,
  `dateposted` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newsfeed`
--

INSERT INTO `newsfeed` (`id`, `title`, `content`, `uploads`, `author`, `dateposted`) VALUES
(30, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam iaculis risus quis lectus luctus rutrum. Aenean dignissim, sem id molestie malesuada, justo lorem auctor est, ut gravida lectus purus at tortor. Duis a ipsum eget lorem malesuada ornare. Vestibulum dapibus dolor vel vulputate tincidunt. Ut porttitor quis enim non suscipit. Proin et tellus magna. Integer rhoncus neque ac luctus dignissim. Vestibulum eu leo lorem. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Mauris nec dapibus erat. Nullam congue nulla a libero volutpat interdum.\r\n\r\n', 'assets/dist/uploads/967206lorem ipsum.png', 'Lorem Ipsum', '2022-04-30 13:14:01'),
(31, 'Lorem Ipsum', 'Aliquam consequat semper sapien id elementum. Sed euismod ipsum erat, eu venenatis diam lobortis eu. Nullam rhoncus dolor ac orci consectetur efficitur. Donec ultricies ex ut massa molestie sodales. Nulla dictum eros lacus, convallis luctus orci dapibus at. Curabitur feugiat felis vel arcu porta porta. Pellentesque eleifend iaculis rhoncus. Vestibulum porta mattis volutpat. Suspendisse potenti. Duis ut erat a urna egestas fringilla id quis purus. Sed consequat mollis pulvinar. Nunc ut egestas leo. Phasellus libero risus, vulputate in vestibulum a, venenatis et orci.\r\n\r\n', 'assets/dist/uploads/756359lorem ipsum.png', 'Lorem Ipsum', '2022-04-30 13:14:31'),
(32, 'Lorem Ipsum', 'Nam eleifend feugiat ipsum sodales dapibus. Integer tortor elit, facilisis id est a, condimentum eleifend turpis. Donec vel luctus quam, sed volutpat quam. Praesent facilisis, massa in rutrum mollis, eros est aliquet justo, sed eleifend turpis mauris volutpat felis. Pellentesque sollicitudin ante elit, eget accumsan tellus porttitor eget. Donec erat dolor, cursus non pellentesque ullamcorper, viverra a arcu. Phasellus sollicitudin leo id quam eleifend, sed fringilla elit mattis. In a dictum dolor, eu feugiat magna. Nulla facilisi. Maecenas elit dui, porttitor at commodo vel, ullamcorper at augue. Maecenas nisi tellus, auctor vel porta ac, molestie non ipsum. Suspendisse et eros a augue feugiat iaculis. Proin in tincidunt leo, luctus cursus nunc.\r\n\r\n', 'assets/dist/uploads/166185lorem ipsum.png', 'Lorem Ipsum', '2022-04-30 13:14:59'),
(33, 'Lorem Ipsum', 'Proin sodales interdum ex quis congue. Nunc dapibus elit ultrices nibh convallis pharetra. Suspendisse egestas condimentum mi, id facilisis dolor. Ut tincidunt elementum ligula eleifend blandit. Nam lacinia a nisi ac pharetra. Mauris sollicitudin quis est vitae consectetur. In rhoncus sollicitudin nunc, at maximus ligula molestie et.\r\n\r\n', 'assets/dist/uploads/684647lorem ipsum.png', 'Lorem Ipsum', '2022-04-30 15:12:12'),
(34, 'Lorem Ipsum', 'Sed sagittis diam non turpis mattis, a molestie lacus semper. Aliquam at tortor a arcu tempus accumsan in non nisl. Mauris molestie tempus ex, et molestie tellus sodales vel. Donec id sagittis turpis. Nunc posuere nunc nec lectus tristique, eu aliquam mauris pulvinar. Aliquam quis dignissim tellus. Nullam sit amet nibh mi. Nullam sed dignissim nisl. Vestibulum volutpat, erat quis elementum pretium, nisi massa auctor est, et sollicitudin neque turpis ac elit. Phasellus a magna eu dui convallis ornare eu vitae ligula. Ut sit amet nunc ut urna lacinia convallis in quis tellus. Aenean tincidunt accumsan rutrum. Quisque tempor porttitor metus, a imperdiet ex mattis quis. Sed ultrices ultricies nisl sit amet ultricies. Curabitur orci augue, tempor non fermentum ornare, commodo ut magna. Pellentesque vel egestas orci.\r\n\r\n', 'assets/dist/uploads/646400lorem ipsum.png', 'Lorem Ipsum', '2022-04-30 15:12:30');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(30) NOT NULL,
  `question` text NOT NULL,
  `frm_option` text NOT NULL,
  `type` varchar(50) NOT NULL,
  `order_by` int(11) NOT NULL,
  `survey_id` int(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `frm_option`, `type`, `order_by`, `survey_id`, `date_created`) VALUES
(1, 'Sample Survey Question using Radio Button', '{\"cKWLY\":\"Option 1\",\"esNuP\":\"Option 2\",\"dAWTD\":\"Option 3\",\"eZCpf\":\"Option 4\"}', 'radio_opt', 3, 1, '2020-11-10 12:04:46'),
(2, 'Question for Checkboxes', '{\"qCMGO\":\"Checkbox label 1\",\"JNmhW\":\"Checkbox label 2\",\"zZpTE\":\"Checkbox label 3\",\"dOeJi\":\"Checkbox label 4\"}', 'check_opt', 2, 1, '2020-11-10 12:25:13'),
(4, 'Sample question for the text field', '', 'textfield_s', 1, 1, '2020-11-10 13:34:21'),
(5, 'dasdasdas', '{\"rYaVh\":\"dasdasd\",\"tLzrh\":\"sadasdasd\"}', 'radio_opt', 0, 6, '2022-03-28 13:07:48'),
(6, 'zxczxczxczx', '{\"VcwZa\":\"zxczxczxc\",\"ItMVE\":\"zxczxcxc\"}', 'check_opt', 0, 6, '2022-03-28 13:07:59'),
(7, 'qweqeqweqweq', '', 'textfield_s', 0, 6, '2022-03-28 13:08:11'),
(8, 'asdasd', '{\"GDkTS\":\"asda\",\"LDSIj\":\"asdasdasdas\"}', 'check_opt', 0, 8, '2022-03-28 16:11:44'),
(9, 'dasdasd', '', 'textfield_s', 0, 8, '2022-03-28 16:11:53'),
(10, 'sdasdasd', '', 'textfield_s', 0, 8, '2022-03-28 16:12:09'),
(14, 'adasdsad', '', 'textfield_s', 0, 9, '2022-03-28 16:43:37'),
(15, 'P1', '', 'textfield_s', 0, 7, '2022-03-28 19:27:20'),
(16, 'P2', '', 'textfield_s', 0, 7, '2022-03-28 19:27:29'),
(18, 'P3', '', 'textfield_s', 0, 7, '2022-03-28 19:28:17'),
(19, '1. I can explain my actions:', '{\"oxgnj\":\"Almost Never\",\"HCeZW\":\"Rarely\",\"DCHJU\":\"Sometimes\",\"CGUcv\":\"Usually\",\"mUrgY\":\"Almost Always\"}', 'radio_opt', 0, 10, '2022-03-28 19:34:58'),
(20, '2. Other people don’t see me as I see myself:', '{\"RwYVi\":\"Almost Never\",\"wOFne\":\"Rarely\",\"gwnKE\":\"Sometimes\",\"LqMEK\":\"Usually\",\"nWsva\":\"Almost Always\"}', 'radio_opt', 0, 10, '2022-03-28 19:35:51'),
(21, '3. I understand the feedback that others give me:', '{\"zDrRA\":\"Almost Never\",\"RLUoE\":\"Rarely\",\"shvFz\":\"Sometimes\",\"rWHwG\":\"Usually\",\"ZOGWJ\":\"Almost Always\"}', 'radio_opt', 0, 10, '2022-03-28 19:36:39'),
(22, '1. Create two words using the following ten letters each once only. <br>\r\nClue: grand tune (4, 6) <br>\r\nMYSEVODLTA <br>', '', 'textfield_s', 1, 11, '2022-03-28 19:38:51'),
(24, '2. Which is the odd one out? <br>\r\nISTHMUS, FJORD, ATOLL, POLDER, ARCHIPELAGO', '', 'textfield_s', 2, 11, '2022-03-28 19:40:56'),
(25, 'Question1', '', 'textfield_s', 0, 12, '2022-04-01 12:02:28'),
(26, 'asdasd', '{\"IBVvt\":\"asda\",\"Hjnfw\":\"asdasd\"}', 'check_opt', 0, 13, '2022-04-07 19:30:41'),
(27, 'SDSAD', '', 'textfield_s', 0, 14, '2022-04-07 21:44:13'),
(28, 'asdasdas', '', 'textfield_s', 0, 15, '2022-04-23 13:56:56'),
(29, 'pipoipoipooipoi', '{\"OdQpr\":\"tyrtyrty\",\"CAjst\":\"xzczxczxc\",\"XyVBx\":\"mbnmbnmbnm\"}', 'check_opt', 0, 15, '2022-04-23 13:57:30'),
(30, 'fdfasdffaf', '{\"jhATG\":\"bnvbnb\",\"aNyIx\":\"vnvbnvbn\"}', 'radio_opt', 0, 15, '2022-04-23 13:57:44'),
(31, 'sdasdasd', '{\"ebCvY\":\"asdas\",\"aRmrW\":\"zxczxc\",\"FUCyl\":\"weqeqwe\"}', 'radio_opt', 0, 16, '2022-06-01 15:12:48'),
(32, 'qweqweqew', '{\"bdByF\":\"qweqwe\",\"xlGzp\":\"asdasd\",\"LuNEr\":\"zxcxzczxc\"}', 'check_opt', 0, 16, '2022-06-01 15:13:06'),
(33, 'zxczxcx', '', 'textfield_s', 0, 16, '2022-06-01 15:13:18');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(255) NOT NULL,
  `userid` int(30) NOT NULL,
  `studentname` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `school_id` varchar(255) NOT NULL,
  `paddress` text NOT NULL,
  `birthdate` date NOT NULL,
  `civilstatus` varchar(100) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `gradelevel` varchar(10) NOT NULL,
  `strand` varchar(10) NOT NULL,
  `mothersname` varchar(200) NOT NULL,
  `fathersname` varchar(200) NOT NULL,
  `parents_address` text NOT NULL,
  `parents_contact` int(30) NOT NULL,
  `nupload` varchar(50) NOT NULL,
  `dateupdated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `userid`, `studentname`, `gender`, `school_id`, `paddress`, `birthdate`, `civilstatus`, `religion`, `contact`, `gradelevel`, `strand`, `mothersname`, `fathersname`, `parents_address`, `parents_contact`, `nupload`, `dateupdated`) VALUES
(8, 8, 'leo', 'Male', 'C22-2022', 'asdasdasd', '2022-06-09', 'Single', 'Roman Catholic', '09123456789', 'g4', 'STEM', 'sdasd', 'asdasdas', 'asdasdads', 2147483647, 'assets/dist/uploads/91760images.jpg', '2022-06-01 19:00:46');

-- --------------------------------------------------------

--
-- Table structure for table `survey_set`
--

CREATE TABLE `survey_set` (
  `id` int(30) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `user_id` int(30) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `survey_set`
--

INSERT INTO `survey_set` (`id`, `title`, `description`, `user_id`, `start_date`, `end_date`, `date_created`) VALUES
(10, 'EQ Test', 'EQ Test', 0, '2022-03-22', '2022-03-31', '2022-03-28 19:32:53'),
(11, 'IQ Test', 'IQ Test', 0, '2022-03-16', '2022-03-31', '2022-03-28 19:37:44'),
(12, 'Exam1', 'Exam 1', 0, '2022-04-01', '2022-04-02', '2022-04-01 12:02:05'),
(13, 'asdasdsa', 'sdasdasdas', 0, '2022-04-20', '2022-04-21', '2022-04-07 19:28:26'),
(15, 'Student Test', 'sdasdlkasdjlaks', 0, '2022-04-20', '2022-04-27', '2022-04-23 13:55:51'),
(16, 'newtest', 'newtest', 0, '2022-06-01', '2022-06-30', '2022-06-01 15:12:24'),
(17, 'newtest3', 'dfsfsdf', 0, '2022-06-01', '2022-06-30', '2022-06-01 15:47:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `middlename` varchar(200) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 3 COMMENT '1=Admin,2 = Staff, 3= Student',
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `middlename`, `contact`, `address`, `email`, `password`, `type`, `date_created`) VALUES
(1, 'Admin', 'Admin', '', '+123456789', 'Sample address', 'admin@admin.com', '0192023a7bbd73250516f069df18b500', 1, '2020-11-10 08:43:06'),
(5, 'Christopher Christian', 'Cosingan', 'Beldeniza', '313213213213', 'asdasdadasd', 'cosingan@gmail.com', '48859d9b37bdc7bf17db8ae7e0e97282', 3, '2022-03-28 13:09:34'),
(6, 'Rastaman', 'Copium', 'D', '0913212332', 'Feelin High', 'rastman@gmail.com', '90c6dc47eb567341264b74fd45ca52a7', 3, '2022-03-28 19:15:20'),
(7, 'Christine', 'Cosingan', 'B', '093760465530', 'dasdasdasas', 'christine@gmail.com', '723e1489a45d2cbaefec82eee410abd5', 3, '2022-04-07 20:24:02'),
(8, 'Leo', 'Leo', 'Leo', '093760465530', 'dasdasasdsadsad', 'leo@gmail.com', '657b298b04e033810343842f993c9817', 3, '2022-06-01 15:07:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsfeed`
--
ALTER TABLE `newsfeed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `survey_set`
--
ALTER TABLE `survey_set`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `newsfeed`
--
ALTER TABLE `newsfeed`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `survey_set`
--
ALTER TABLE `survey_set`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `userid` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
