-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2018 at 04:29 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(54, 'photoshop'),
(56, 'Blog'),
(57, 'You tube');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_Author` varchar(255) NOT NULL,
  `comment_email` text NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_Author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(1, 111, 'Rohini', 'Rohini45@gmail.com', 'dcbgcjm', 'approved', '2018-12-05'),
(2, 108, 'ak', 'Rohini45@gmail.com', 'saefgrshtfrh', 'approved', '2018-12-06'),
(3, 111, 'neha', 'nahapatil34@gmail.com', 'gujykyuglij', 'approved', '2018-12-06'),
(5, 111, 'neha', 'nahapatil34@gmail.com', 'gujykyuglij', 'approved', '2018-12-06');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(3) NOT NULL,
  `phone_number` int(12) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_cat_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` varchar(900) NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(3) NOT NULL,
  `post_status` varchar(255) NOT NULL,
  `post_views_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_cat_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_views_count`) VALUES
(109, 54, 'photoshop manipulation tutorial 1', 'rupeshedit', '2018-12-04', 'dgfhj.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n         ', 'photoshop', 2, 'published', 20),
(110, 54, 'photoshop manipulation tutorial 2', 'rupeshedit', '2018-12-04', 'Untitlesfddfd-1.jpg', '  onely Cat Enjoying in Summer Curabitur #mypage ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc,', 'photoshop', 1, 'published', 2),
(111, 54, 'photoshop manipulation tutorial 3', 'rupeshedit', '2018-12-04', 'dfgd.jpg', '  onely Cat Enjoying in Summer Curabitur #mypage ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, \r\n         ', 'photoshop', 4, 'published', 9),
(112, 54, 'photoshop manipulation tutorial 4', 'rupeshedit', '2018-12-04', 'sejal.jpg', '   onely Cat Enjoying in Summer Curabitur #mypage ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc,\r\n         ', 'photoshop', 1, 'published', 11),
(113, 54, 'photoshop manipulation tutorial 5', 'rupeshedit', '2018-12-04', 'jeevan.jpg', '   onely Cat Enjoying in Summer Curabitur #mypage ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc,\r\n         ', 'photoshop', 0, 'published', 1),
(116, 54, 'photoshop manipulation tutorial 7', 'rupeshedit', '2018-12-06', 'fghfhgj.jpg', '   hiii\r\n         ', 'photoshop', 0, 'published', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `role` varchar(255) NOT NULL,
  `randsalt` varchar(255) NOT NULL DEFAULT '$2y$10$iusesomecrazystring22'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `firstname`, `lastname`, `email`, `user_image`, `role`, `randsalt`) VALUES
(351, 'rupesh', '123', 'Rupesh', 'narkar', 'rupeshnarkar500@gmail.com', 'KBJP2275.JPG', 'admin', '$2y$10$iusesomecrazystring22');

-- --------------------------------------------------------

--
-- Table structure for table `user_online`
--

CREATE TABLE `user_online` (
  `id` int(3) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_online`
--

INSERT INTO `user_online` (`id`, `session`, `time`) VALUES
(1, 'j4nkci1jbubm8olp4rn3i6ph94', 1537603480),
(2, 'ubqr4cm6mqe02qorrd0ueq76e4', 1537600049),
(3, 'ka5246ie45b0rpl8vjju3n8kp4', 1537600137),
(4, 'dme2lrn5naddmuj115efb0l286', 1537600717),
(5, 'rjagahlr47qg1jp2sacaq5var2', 1537610057),
(6, '', 1537607215),
(7, '970ise8vs3d2cqcgfvbvtckb01', 1537608292),
(8, 'njrk9ntfg9jioqlch4rpt49gr7', 1537623954),
(9, 'acqf92mi49rpthg9n1c0nphq23', 1537623948),
(10, 'ivjgfrr0tb3j99ar82e9knmie7', 1537624048),
(11, 'n7h54sgcqe3oo3td7231le7nq4', 1537624408),
(12, 'oqt6qiv1os143ugnaf54oi0s52', 1537626122),
(13, 'j413unk72t9emt1mp8h5a2sku6', 1537683901),
(14, 'qc6vim4c502hu2o1ccd8gnoim4', 1537689147),
(15, 'a0dcsgj1gsp1hilgghl545dap7', 1537689006),
(16, '8rcf2ngn3363l4sal7bqt9qeo3', 1537689431),
(17, 't11iih84t82ipovuco6k3qrl73', 1537689412),
(18, 'n65ojca8bninksrvm1ujbem5p7', 1537811770),
(19, 'qot958d6j4k5hcclkahua85903', 1537796705),
(20, 'rv5acafr7u87ienaf4aiiu84s0', 1537811814),
(21, 'mans801v61mecuuuv6ae9clnr4', 1537841608),
(22, 'i5f18kld01mrjf0hptvg0km302', 1537849796),
(23, '7n7av13nrlcd28dm1mma9m5c67', 1537849384),
(24, 'tovn5dpg9i4vd8cn6q49i1n7j3', 1537851617),
(25, '51se56k12he4bj8f3tn8148vo6', 1537850533),
(26, 'm750bfei5aht0hfupv9lh472p4', 1537852986),
(27, 'otmuilv6agnp25kn74ipvurq23', 1537876413),
(28, '4vmt9vthuv7cr5aavbsnjpn8s6', 1537876631),
(29, 'itsqe156adut2kdeug5ibglrc7', 1537876621),
(30, '5shf7t1j7pipt1u75s7fvid8u6', 1537878752),
(31, '4edid5kv4g5ohtf9uds8bfqom0', 1537884201),
(32, 'p3kn5v36rrf7mq038mna05frk5', 1537934397),
(33, '5oencvshnufmjl80crjrobpml6', 1537935552),
(34, 'u5er0cp0432u0gfvpi4le5jjf1', 1537936651),
(35, 'apmfih0n6o2mvgfsju50i0j5k3', 1537940223),
(36, 'o6h7ndqplc4ac1jirrvdnhl5n2', 1537960424),
(37, 'odioo6729jgnah4khg514sna51', 1537963630),
(38, 'oftra109jq8pe1dqvv60i6ctg2', 1537966030),
(39, 'la3acs177ckmc01tb3gv69cqr7', 1537966677),
(40, '6vtqnraesmpdbifqme7pidgbk6', 1537971202),
(41, '5cs6ftjdc62u2tgjjn9n3d1b62', 1537981629),
(42, '4dqd9o27mac0h215g06ee7h052', 1537982225),
(43, '4vlpr6c0hg976l683u0adb2ag4', 1537982733),
(44, 'di8ogvm3hcq7p2ag1h603k7kc5', 1538020471),
(45, 'i6h5ob5qeerfldjd0nfu3qd034', 1538056891),
(46, '9n49hrvpd90qcf8lnk6cj5mba7', 1538057970),
(47, '58s853scp0m1gpmvoqf1bhf2a0', 1538067372),
(48, '69nf76na1jvfk4imoitb5ivjo0', 1538073611),
(49, 'l3e0j1t4jbu9p8ehk756nbjt26', 1538069412),
(50, 'ejig6h7q8gl9h6qv2b4kq7p1o0', 1538104163),
(51, '7l91827n4hcubpk3t6f8cbk0v5', 1538105210),
(52, '249c02vnae3vi27lb73i90cir3', 1538107116),
(53, 'fo343a5jst3o95767av2mln5s6', 1538124271),
(54, 'obtt8k3ljmr6bj5pe9jb4m5fd6', 1538125689),
(55, 'qt802lnsmlk40em596kin9i246', 1538126290),
(56, 'odm62o3je3tuqp9nrkeufpjhu7', 1538126706),
(57, 'ac9hvalrn69n6pi66nneavb8g0', 1538126819),
(58, 'do4lrd9cvmj1a7r73gtdv88230', 1538126905),
(59, '2g566964ldnd0brc9qmuhbs6m1', 1538127960),
(60, 'e80gjv6g8na34dlituief4d3o2', 1538147597),
(61, 'amv6heqcc2jc8ggl7jfk99u865', 1538195555),
(62, 'q2c26m3uktg5b3qfnim5ft5h80', 1538195952),
(63, '9p4egbmhscfmngglivobus5s43', 1538207811),
(64, '3ccm8tvuguv4cni7onf0rm1cs3', 1538209134),
(65, 'jopc20p8jg86n808f3quv91ln4', 1538212672),
(66, 'd3ni9k01l9tb5v9vc7c206jbcm', 1543850298),
(67, 'h2p5mspstc2qc5l38k882pj0ac', 1543855184),
(68, '5u4gbom2f69eu4behb8pu4uf2t', 1543856856),
(69, 'qes8nsgkcae4lubrl72jplf0dg', 1543857609),
(70, 'g4b3cg0am06588jk3h8up73hec', 1543926887),
(71, 'v8rfmv522gafvohqtlgu6o3ajq', 1543929463),
(72, '2dile6ao0qp11sglm57pi24s9o', 1543942245),
(73, 'hl83bi9m5cto46dk1dqf4nt9ae', 1543944630),
(74, '2ni22pfo12clsimsr5u64hjlvk', 1543982114),
(75, 'ta320sp9trlmi8p9uov501t5t6', 1544024749),
(76, '1urr9v3bjloi18a7ipdrsjj1u3', 1544031377),
(77, 'pfgp4f95kk1607gqmo2q76rros', 1544031725),
(78, 'lmge3piqnahuf6j92d4isbnstt', 1544032250),
(79, '0cr21cjrvt3hucm9av6o8vggaj', 1544068051),
(80, 'lj60dmutqk9grsr2l2hcqg4fp4', 1544067726),
(81, '3vn6u00e0kvroc7p30via6h1j3', 1544072662),
(82, '10crdp5s2c71m0k4c878g6ru69', 1544099796),
(83, '9kkqsu5jljo797g83ffoo9rr72', 1544153107);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_online`
--
ALTER TABLE `user_online`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=352;

--
-- AUTO_INCREMENT for table `user_online`
--
ALTER TABLE `user_online`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
