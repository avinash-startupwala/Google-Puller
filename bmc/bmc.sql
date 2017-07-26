-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2017 at 09:39 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bmc`
--

-- --------------------------------------------------------

--
-- Table structure for table `googleresults`
--

CREATE TABLE `googleresults` (
  `g_id` int(20) NOT NULL,
  `search_query` varchar(50) NOT NULL,
  `title` text NOT NULL,
  `url` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `googleresults`
--

INSERT INTO `googleresults` (`g_id`, `search_query`, `title`, `url`, `description`) VALUES
(1, 'query', 'Startupwala.com: Startup Registration | Company Registration ...', 'https://www.google.co.in/url?', '<em>Startupwala</em>.com is India\'s best Startup centric legal services company, focusing on company registration, trademark registration and ROC filings.'),
(2, 'query', 'Contact us', 'https://www.google.co.in/url?', 'CONTACT US ... Happy with Us:experience@startupwala.com ...<br>'),
(3, 'query', 'Payment', 'https://www.startupwala.com/payments.php', 'STARTUPWALA is a BMC Group Venture. Start Your Business ...<br>'),
(4, 'query', 'Startup Registration', 'https://www.startupwala.com/startup-registration.html', 'Startup Registration can be completed in India online and at ...<br>'),
(5, 'query', 'About Us', 'https://www.startupwala.com/about-us.html', '2.5 % Startup Registration in India is done by us ... What Startups ...<br>'),
(6, 'query', 'Reviews', 'https://www.startupwala.com/reviews.html', 'Startupwala.com Consumer Reviews and Experience ...<br>'),
(7, 'query', 'Careers', 'https://www.startupwala.com/careers.html', 'Startupwala.com is India\'s Best Startup Centric Business ...<br>'),
(8, 'query', 'Startupwala.com Reviews | Read Customer Service Reviews of ...', 'https://www.trustpilot.com/review/bmcgroup.in', '132 people have already reviewed <em>Startupwala</em>.com. Voice your opinion today and help build trust online. | bmcgroup.in.'),
(9, 'query', 'Startupwala - Register Startup - Android Apps on Google Play', 'https://play.google.com/store/apps/details?id=com.startupwala hl=en', '<em>Startupwala</em> App is India\'s First Startup Centric Legal Services Platform for Startup Registration, Trademark Registration, Company Registration, ROC Filings and&nbsp;...'),
(10, 'query', 'Startupwala - Home | Facebook', 'https://www.facebook.com/startupwala/', '<em>Startupwala</em>. 37K likes. <em>Startupwala</em>.com is India\'s 1st Startup &amp; SME Centric Online Legal Services Platform. Ranked No.1 Legal Provider in India.'),
(11, 'query', 'STARTUPWALA PRIVATE LIMITED - Company, directors and contact ...', 'https://www.zaubacorp.com/company/STARTUPWALA-PRIVATE-LIMITED/U74999PN2016PTC158556', '<span class=\"f\">Feb 6, 2017 - </span><em>Startupwala</em> Private Limited is a Private incorporated on 24 February 2016. It is classified as Non-govt company and is registered at Registrar of&nbsp;...'),
(12, 'query', 'Startupwala Mobile App is a Hit and Ranked #1 in Business Category ...', 'http://www.prnewswire.co.in/news-releases/startupwala-mobile-app-is-a-hit-and-ranked-1-in-business-category-on-google-playstore-575351001.html', '<span class=\"f\">Apr 12, 2016 - </span><em>Startupwala</em>.com is India\'s first startup-centric legal services platform for company registration, trademark registration and startup incorporation.'),
(13, 'query', 'Startupwala | LinkedIn', 'https://in.linkedin.com/company/startupwala', 'Learn about working at <em>Startupwala</em>. Join LinkedIn today for free. See who you know at <em>Startupwala</em>, leverage your professional network, and get hired.'),
(14, 'query', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `googleresults`
--
ALTER TABLE `googleresults`
  ADD PRIMARY KEY (`g_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `googleresults`
--
ALTER TABLE `googleresults`
  MODIFY `g_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
