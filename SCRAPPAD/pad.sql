-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2017 at 07:44 AM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pad`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `delpst` (IN `pcod` INT)  NO SQL
begin
delete from tbpst where pstcod=pcod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delreg` (IN `rcod` INT)  NO SQL
begin
delete from tbreg where regcod=rcod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delrep` (IN `rcod` INT)  NO SQL
begin
delete from tbrep where repcod=rcod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deltec` (IN `tcod` INT)  NO SQL
begin
delete from tbtec where teccod=tcod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `disppst` (IN `tcod` INT)  NO SQL
begin
select pstcod,psttit,pstdsc,pstatt,pstdat,regeml,pstrat,
(select count(*) from tbrep where reppstcod=a.pstcod) sts
from tbpst a,tbreg where pstrecod=regcod and pstteccod=tcod
order by pstdat desc;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dispreg` ()  NO SQL
begin
select * from tbreg;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `disprep` ()  NO SQL
begin
select * from tbrep;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `disptec` ()  NO SQL
begin
select * from tbtec;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `findpst` (IN `pcod` INT)  NO SQL
begin
select * from tbpst where pstcod=pcod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `findreg` (IN `rcod` INT)  NO SQL
begin
select * from tbreg where regcod=rcod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `findrep` (IN `rcod` INT)  NO SQL
begin
select * from tbrep where reppstcod=rcod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `findtec` (IN `tcod` INT)  NO SQL
begin
select * from tbtec where teccod=tcod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `inspst` (IN `pdat` DATETIME, IN `pregcod` INT, IN `pteccod` INT, IN `ptit` VARCHAR(100), IN `pdsc` VARCHAR(1000), IN `patt` VARCHAR(50), IN `prat` INT)  NO SQL
begin	
insert tbpst values(null,pdat,pregcod,pteccod,ptit,pdsc,patt,prat);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insreg` (IN `reml` VARCHAR(50), IN `rpwd` VARCHAR(50), IN `rdat` DATETIME)  NO SQL
begin
insert tbreg values(null,reml,rpwd,rdat);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insrep` (IN `rdat` DATETIME, IN `rpstcod` INT, IN `rdsc` VARCHAR(1000), IN `ratt` VARCHAR(50), IN `rregcod` INT)  NO SQL
begin
insert tbrep values(null,rdat,rpstcod,rdsc,ratt,rregcod);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `instec` (IN `tnam` VARCHAR(100))  NO SQL
begin
insert tbtec values(null,tnam);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `logincheck` (IN `unam` VARCHAR(100), IN `upwd` VARCHAR(100), OUT `cod` INT)  NO SQL
BEGIN
declare actpwd varchar(100);
select regpwd from tbreg where regeml=unam into @actpwd;
if @actpwd is null THEN
	set cod=-2;
else
if @actpwd=upwd then
select regcod from tbreg where regeml=unam into cod;
else
set cod=-1;
end if;
end if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updpst` (IN `pcod` INT, IN `prat` INT)  NO SQL
update tbpst set pstrat=prat where pstcod=pcod$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updreg` (IN `rcod` INT, IN `reml` VARCHAR(50), IN `rpwd` VARCHAR(50), IN `rdat` DATETIME)  NO SQL
begin
update tbreg set regeml=reml,regpwd=rpwd,regdat=rdat where regcod=rcod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updrep` (IN `rcod` INT, IN `rdat` DATETIME, IN `rpstcod` INT, IN `rdsc` VARCHAR(1000), IN `ratt` VARCHAR(50), IN `rregcod` INT)  NO SQL
begin
update tbrep set repdat=rdat,reppstcod=rpstcod,repdsc=rdsc,repatt=ratt,repregcod=rregcod where repcod=rcod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updtec` (IN `tcod` INT, IN `tnam` VARCHAR(100))  NO SQL
begin
update tbtec set tecnam=tnam where teccod=tcod;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbpst`
--

CREATE TABLE `tbpst` (
  `pstcod` int(11) NOT NULL,
  `pstdat` datetime NOT NULL,
  `pstrecod` int(11) NOT NULL,
  `pstteccod` int(11) NOT NULL,
  `psttit` varchar(100) NOT NULL,
  `pstdsc` varchar(1000) NOT NULL,
  `pstatt` varchar(50) NOT NULL,
  `pstrat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpst`
--

INSERT INTO `tbpst` (`pstcod`, `pstdat`, `pstrecod`, `pstteccod`, `psttit`, `pstdsc`, `pstatt`, `pstrat`) VALUES
(1, '2017-07-02 00:00:00', 1, 1, 'a sdf sd f g dfg df  dfhhda', '                 WR AE RQW ERRQW TEQ WTR QWTR QWRT QER TQE RTQ \r\nWR\r\nASDG\r\nASG\r\nDG                                           ', 'trig.jpg', 4),
(2, '2017-07-07 00:00:00', 1, 2, 'rana', 'This is to certify that MAMTA KUMARI student of LR INSTITUTE OF MANAGEMENT SOLAN (HP) of MCA Roll No. 63MCL5013642 is undergoing industrial training in our firm CS SOFT SOLUTIONS PVT. LTD. from JAN 2017 to JUNE 2017 in ASP.NET-5.0.', 'kashmari_dance.jpg', 0),
(3, '2017-07-07 00:00:00', 1, 2, 'beeni', '                                 This is to certify that MAMTA KUMARI student of LR INSTITUTE OF MANAGEMENT SOLAN (HP) of MCA Roll No. 63MCL5013642 is undergoing industrial training in our firm CS SOFT SOLUTIONS PVT. LTD. from JAN 2017 to JUNE 2017 in ASP.NET-5.0.                           ', 'kerala_dance.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbreg`
--

CREATE TABLE `tbreg` (
  `regcod` int(11) NOT NULL,
  `regeml` varchar(50) NOT NULL,
  `regpwd` varchar(50) NOT NULL,
  `regdat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbreg`
--

INSERT INTO `tbreg` (`regcod`, `regeml`, `regpwd`, `regdat`) VALUES
(1, 'cs@cssoftsolutions.com', 'abc123#', '2017-07-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbrep`
--

CREATE TABLE `tbrep` (
  `repcod` int(11) NOT NULL,
  `repdat` datetime NOT NULL,
  `reppstcod` int(11) NOT NULL,
  `repdsc` varchar(1000) NOT NULL,
  `repatt` varchar(50) NOT NULL,
  `repregcod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbrep`
--

INSERT INTO `tbrep` (`repcod`, `repdat`, `reppstcod`, `repdsc`, `repatt`, `repregcod`) VALUES
(1, '2017-07-05 00:00:00', 1, 'asdas dfs df sdg adf gdsf g dzf gdf g dfg asd f sad fas dfg adf gd fg sdfg', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbtec`
--

CREATE TABLE `tbtec` (
  `teccod` int(11) NOT NULL,
  `tecnam` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbtec`
--

INSERT INTO `tbtec` (`teccod`, `tecnam`) VALUES
(1, 'Asp.Net'),
(2, 'PHP'),
(3, 'Java');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbpst`
--
ALTER TABLE `tbpst`
  ADD PRIMARY KEY (`pstcod`);

--
-- Indexes for table `tbreg`
--
ALTER TABLE `tbreg`
  ADD PRIMARY KEY (`regcod`),
  ADD UNIQUE KEY `regeml` (`regeml`);

--
-- Indexes for table `tbrep`
--
ALTER TABLE `tbrep`
  ADD PRIMARY KEY (`repcod`);

--
-- Indexes for table `tbtec`
--
ALTER TABLE `tbtec`
  ADD PRIMARY KEY (`teccod`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbpst`
--
ALTER TABLE `tbpst`
  MODIFY `pstcod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbreg`
--
ALTER TABLE `tbreg`
  MODIFY `regcod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbrep`
--
ALTER TABLE `tbrep`
  MODIFY `repcod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbtec`
--
ALTER TABLE `tbtec`
  MODIFY `teccod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
