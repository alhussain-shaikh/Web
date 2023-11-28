-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2021 at 07:02 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `umspsdb`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_adminchangepwd` (`newpwd` VARCHAR(120), `ldtime` VARCHAR(120), `uid` INT(5))  BEGIN
update tbladmin set Password=newpwd,updationDate=ldtime where id=uid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_admincurrentpwdvalidate` (`currentpwd` VARCHAR(120), `uid` INT(5))  BEGIN
select id from tbladmin where id=uid and Password=currentpwd;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_admindashboard` ()  BEGIN
select count(id) as totalusers,
COUNT(IF((date(RegDate)=CURDATE()),0,NULL)) as todayreguser,
COUNT(IF((date(RegDate)=CURDATE()-1),0,NULL)) as yesterdayreguser,
COUNT(IF((date(RegDate) BETWEEN CURDATE() - INTERVAL 7 DAY AND CURDATE()),0,NULL)) as lastsevendaysreguser,
COUNT(IF((date(RegDate) BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE()),0,NULL)) as lastthirtydaysreguser
from tblusers;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_adminlogin` (IN `username` VARCHAR(200), IN `adminpwd` VARCHAR(200))  BEGIN
select FullName,id,UserName	 from tbladmin where UserName=username and Password=adminpwd;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_adminpasswordrecovery` (`uname` VARCHAR(120), `adminemail` VARCHAR(200), `newpwd` VARCHAR(150), `ldtime` VARCHAR(120))  BEGIN
update tbladmin set Password=newpwd,updationDate=ldtime  where  UserName=uname and AdminEmail=adminemail;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_adminprofile` (`adminid` INT(5))  BEGIN
select * from tbladmin where id=adminid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_adminpwdrecoveryvalidation` (`uname` VARCHAR(120), `adminemail` VARCHAR(150))  BEGIN
select id from tbladmin where UserName=uname and AdminEmail=adminemail;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_allregisteredusers` ()  BEGIN
select * from tblusers;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_checkemailavailabilty` (`emalid` VARCHAR(150))  BEGIN
select EmailId from tblusers where EmailId=emalid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_recent15users` ()  BEGIN
select * from tblusers order by id desc limit 15;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_signup` (`fname` VARCHAR(120), `lname` VARCHAR(120), `emalid` VARCHAR(200), `inputpwd` VARCHAR(200), `isactve` INT(1))  BEGIN
insert into tblusers(FirstName,LastName,EmailId,UserPassword,IsActive) value(fname,lname,emalid,inputpwd,isactve);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_userchangepwd` (`newpwd` VARCHAR(120), `ldtime` VARCHAR(120), `uid` INT(5))  BEGIN
update tblusers set UserPassword=newpwd,LastUpdationDate=ldtime where id=uid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_usercurrentpwdvalidate` (`currentpwd` VARCHAR(120), `uid` INT(5))  BEGIN
select id from tblusers where id=uid and UserPassword=currentpwd;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_userdeletion` (`uid` INT(5))  BEGIN
delete  from tblusers where id=uid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_useremailupdation` (`newemail` VARCHAR(120), `ldtime` VARCHAR(120), `uid` INT(5))  BEGIN
update tblusers set EmailId=newemail,LastUpdationDate=ldtime where id=uid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_userlogin` (IN `uemailid` VARCHAR(200), IN `userpwd` VARCHAR(200))  BEGIN
select FirstName,LastName,id from tblusers where EmailId=uemailid and UserPassword=userpwd;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_userpasswordrecovery` (`lastname` VARCHAR(120), `useremailid` VARCHAR(200), `newpwd` VARCHAR(150), `ldtime` VARCHAR(120))  BEGIN
update tblusers set UserPassword=newpwd,LastUpdationDate=ldtime  where LastName=lastname and EmailId=useremailid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_userprofile` (`uid` INT(5))  BEGIN
select * from tblusers where id=uid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_userpwdrecoveryvalidation` (`lastname` VARCHAR(120), `useremail` VARCHAR(150))  BEGIN
select id from tblusers where LastName=lastname and EmailId=useremail;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_userupdateprofile` (`fname` VARCHAR(120), `lname` VARCHAR(120), `ldtime` VARCHAR(120), `uid` INT(5))  BEGIN
update tblusers set FirstName=fname,LastName=lname,LastUpdationDate=ldtime where id=uid;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `id` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `AdminEmail` varchar(120) DEFAULT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `FullName`, `AdminEmail`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'Anuj Kumar', 'phpgurukulofficial@gmail.com', 'admin', 'f925916e2754e5e03f75dd58a5733251', '17-01-2021 05:51:58 AM');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `FirstName` varchar(150) DEFAULT NULL,
  `LastName` varchar(150) DEFAULT NULL,
  `EmailId` varchar(255) DEFAULT NULL,
  `UserPassword` varchar(255) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `IsActive` int(1) DEFAULT NULL,
  `LastUpdationDate` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `FirstName`, `LastName`, `EmailId`, `UserPassword`, `RegDate`, `IsActive`, `LastUpdationDate`) VALUES
(2, 'Amit', 'Yadav', 'amity@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', '2020-12-27 12:48:57', 1, '16-01-2021 07:33:10 PM'),
(3, 'Rahul', 'Singh', 'rahl345@ttt.com', 'c20ad4d76fe97759aa27a0c99bff6710', '2020-12-28 17:38:14', 1, '17-01-2021 05:50:38 AM'),
(6, 'Anuj', 'kumar', 'anujk@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2020-12-28 17:41:00', 1, '17-01-2021 05:13:05 AM'),
(11, 'Sanjeev', 'Kumar', 'sanjv12345@gmail.com', '5c428d8875d2948607f3e3fe134d71b4', '2021-01-17 04:47:50', 1, '17-01-2021 05:49:26 AM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
