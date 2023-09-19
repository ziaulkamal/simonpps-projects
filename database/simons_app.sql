-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2023 at 11:01 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simon_apps`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('1sgb4g0clkfk39u9b7ilepscraoftaks', '::1', 1695112528, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639353131323532383b6d6173756b7c623a313b6e616d615f7361746b65727c733a353a2261646d696e223b6c6576656c7c733a393a2273656b73692d707073223b6d61696c7c733a32343a227a6961756c6b616d616c3131303940676d61696c2e636f6d223b69645f6c6576656c7c733a313a2232223b6c6f63616c657c733a313a2238223b737563636573737c733a36383a22446f6b756d656e2064656e67616e206e616d612070656b65726a61616e2050656d62616e67756e616e204a656d626174616e207375646168206469736574756a75692021223b5f5f63695f766172737c613a313a7b733a373a2273756363657373223b733a333a226f6c64223b7d),
('7cq5bv5qvee5p7g33pcvmen5u8sfp5mj', '::1', 1695113896, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639353131333839363b6d6173756b7c623a313b6e616d615f7361746b65727c733a353a2261646d696e223b6c6576656c7c733a393a2273656b73692d707073223b6d61696c7c733a32343a227a6961756c6b616d616c3131303940676d61696c2e636f6d223b69645f6c6576656c7c733a313a2232223b6c6f63616c657c733a313a2238223b),
('a3635rb1g70s9r0hjtsijq7s1spnj3uj', '::1', 1695110630, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639353131303633303b6572727c733a34333a223c7374726f6e673e476167616c21203c2f7374726f6e673e2054617574616e20746964616b2056616c6964223b5f5f63695f766172737c613a313a7b733a333a22657272223b733a333a226f6c64223b7d),
('fi7v9bik38nruaqmjphp3u6is6o0lu58', '::1', 1695111847, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639353131313537353b6d6173756b7c623a313b6e616d615f7361746b65727c733a31343a2264696e6173206b656c617574616e223b6c6576656c7c733a353a226775657374223b6d61696c7c733a32353a227a2e6961756c6b616d616c3131303940676d61696c2e636f6d223b69645f6c6576656c7c733a313a2233223b6c6f63616c657c733a323a223138223b),
('hkd4f1a653e6nmdlb5atb4vlmmqesce8', '::1', 1695113902, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639353131333930323b),
('mriufp8jffilvrco122aqfemmana2o3b', '::1', 1695111498, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639353131313439383b),
('ra2kjf35c8leu7kbjsotojvof3kth6a0', '::1', 1695112911, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639353131323931313b6d6173756b7c623a313b6e616d615f7361746b65727c733a353a2261646d696e223b6c6576656c7c733a393a2273656b73692d707073223b6d61696c7c733a32343a227a6961756c6b616d616c3131303940676d61696c2e636f6d223b69645f6c6576656c7c733a313a2232223b6c6f63616c657c733a313a2238223b),
('vu8lgf1esugvdtmunccn61mm2d6sh04a', '::1', 1695111192, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639353131313139323b737563636573737c733a37313a223c7374726f6e673e43656b20456d61696c21203c2f7374726f6e673e205065726d696e7461616e2072657365742070617373776f72642073756461682064696b6972696d6b616e223b5f5f63695f766172737c613a313a7b733a373a2273756363657373223b733a333a226f6c64223b7d);

-- --------------------------------------------------------

--
-- Table structure for table `tb_dokumen`
--

CREATE TABLE `tb_dokumen` (
  `id_dokumenDO` varchar(255) NOT NULL,
  `pkj_namaDO` varchar(255) NOT NULL,
  `ud_pprDO` varchar(100) NOT NULL,
  `IN13DO` varchar(100) NOT NULL,
  `IN2DO` varchar(100) NOT NULL,
  `IN14DO` varchar(100) NOT NULL,
  `jns_dokDO` varchar(50) NOT NULL,
  `ket_dokDO` varchar(50) NOT NULL,
  `updateDateDO` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_log`
--

CREATE TABLE `tb_log` (
  `id_log` int(11) NOT NULL,
  `lvlAccess` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `activityProg` tinyint(4) NOT NULL,
  `dateLog` date NOT NULL,
  `sendMail` tinyint(4) NOT NULL,
  `keteranganLog` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemohon`
--

CREATE TABLE `tb_pemohon` (
  `id_pemohonPE` varchar(255) NOT NULL,
  `status_idPE` varchar(255) NOT NULL,
  `dokumen_idPE` varchar(255) NOT NULL,
  `asal_satkerPE` varchar(100) NOT NULL,
  `nama_pkjPE` varchar(255) NOT NULL,
  `sumber_pbyPE` varchar(255) NOT NULL,
  `pagu_aggPE` varchar(255) NOT NULL,
  `nil_kontrakPE` varchar(255) NOT NULL,
  `jw_StartpelaksanaanPE` date NOT NULL,
  `jw_EndpelaksanaanPE` date NOT NULL,
  `lokasi_pkjPE` varchar(255) NOT NULL,
  `timtah_pelakPE` varchar(100) NOT NULL,
  `t_berjalanPE` varchar(255) NOT NULL,
  `skp_straPE` varchar(100) NOT NULL,
  `pp_keberPE` varchar(255) NOT NULL,
  `s_permohonanPE` varchar(100) NOT NULL,
  `updateDatePE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_satker` varchar(50) NOT NULL,
  `user` varchar(100) NOT NULL,
  `pass` varchar(80) NOT NULL,
  `level` varchar(50) NOT NULL,
  `is_activate` tinyint(2) NOT NULL,
  `terdaftar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_satker`, `user`, `pass`, `level`, `is_activate`, `terdaftar`) VALUES
(8, 'admin', 'ziaulkamal1109@gmail.com', '$2y$10$PyrMScfrAod.wWopwY7GN.cGrTGAWmxq6t9HrEziZjrxg6LvP82HO', 'seksi-pps', 1, '2023-09-05 12:03:16'),
(10, 'guest', 'guest@gmail.com', '$2y$10$k9/Yjd2Raf3o6GtInV6IBO9x0Pr1hVxe6iq1pNx9SK9haiEsLbRXy', 'guest', 1, '2023-09-05 15:52:41'),
(11, 'ppss', 'pps@gmail.com', '$2y$10$XSbdEp15qWlMzgtGtJki7.tta2sWbU8mDpPggwoEYRsQ5RR/5.Bci', 'seksi-pps', 1, '2023-09-05 15:54:16'),
(13, 'dinas kelautan', 'person@gmail.com', '$2y$10$tSLn.9hPhRlqEpyIomYdY.fIC5AnVdhMklo5tyNUk9l8FNIMBhG.a', 'guest', 1, '2023-09-11 06:02:45'),
(15, 'dinas kelautan', 'budi@gmail.com', '$2y$10$lseUgB1vCj00ha0GrGEsC.FYsvwqdi5VvCXSbMpjSfSEgR914Bv0G', 'guest', 1, '2023-09-13 04:00:37'),
(17, 'dinas pendidikan', 'shfdell@gmail.com', '$2y$10$wNDI7lPdbNW3Q0uE6VImWe7SPr/on9Ml6JBIFswFKPFw9GDBmiE7i', 'guest', 1, '2023-09-19 10:59:17'),
(18, 'dinas kelautan', 'z.iaulkamal1109@gmail.com', '$2y$10$dUiDLZzZFrdAk0zTGyyDTufxVXCL/sALsOXR.X8xK7Mf/SMFO5Lru', 'guest', 1, '2023-09-19 10:19:19');

-- --------------------------------------------------------

--
-- Table structure for table `tb_progress_pekerjaan`
--

CREATE TABLE `tb_progress_pekerjaan` (
  `id_progPR` int(11) NOT NULL,
  `pemohon_idPR` varchar(255) NOT NULL,
  `pkj_namaPR` varchar(100) NOT NULL,
  `rcn_progPR` double NOT NULL,
  `rl_progPR` double NOT NULL,
  `deviasiPR` double NOT NULL,
  `rl_keuanPR` float NOT NULL,
  `lp_bulanPR` varchar(100) NOT NULL,
  `it_pkjPR` varchar(100) NOT NULL,
  `waktuPR` date NOT NULL,
  `updateDatePR` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_recover`
--

CREATE TABLE `tb_recover` (
  `idRec` int(11) NOT NULL,
  `mailRec` varchar(100) NOT NULL,
  `token` varchar(255) NOT NULL,
  `timeStamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ip_addr` varchar(50) NOT NULL,
  `dateRequest` date NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_recover`
--

INSERT INTO `tb_recover` (`idRec`, `mailRec`, `token`, `timeStamp`, `ip_addr`, `dateRequest`, `status`) VALUES
(4, 'ziaulkamal1109@gmail.com', '3e501b6501e960a24398f5c1aafac25c', '2023-09-19 08:18:47', '180.241.47.55', '2023-09-19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_status`
--

CREATE TABLE `tb_status` (
  `id_statusST` varchar(255) NOT NULL,
  `IN17ST` varchar(255) NOT NULL,
  `IN2ST` varchar(255) NOT NULL,
  `IN16ST` varchar(255) NOT NULL,
  `pes_pebST` varchar(50) NOT NULL,
  `outputSts` tinyint(4) NOT NULL,
  `surveyIdST` varchar(255) NOT NULL,
  `updateDateST` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_survey`
--

CREATE TABLE `tb_survey` (
  `idSurvey` varchar(255) NOT NULL,
  `statusIdS` varchar(255) NOT NULL,
  `ratingNum` tinyint(4) NOT NULL,
  `pesanMasukan` text NOT NULL,
  `statusSurvey` tinyint(4) NOT NULL,
  `updateDaate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_trackprogress`
--

CREATE TABLE `tb_trackprogress` (
  `trackId` int(11) NOT NULL,
  `idProgress` int(11) NOT NULL,
  `rcnProgress` double NOT NULL,
  `rlProgress` double NOT NULL,
  `deviasiProgress` double NOT NULL,
  `rlKeuangan` float NOT NULL,
  `lpBulanan` text NOT NULL,
  `fotoPekerjaan` text NOT NULL,
  `timeDateTrack` varchar(20) NOT NULL,
  `updateDateTrack` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_dokumen`
--
ALTER TABLE `tb_dokumen`
  ADD PRIMARY KEY (`id_dokumenDO`);

--
-- Indexes for table `tb_log`
--
ALTER TABLE `tb_log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `tb_pemohon`
--
ALTER TABLE `tb_pemohon`
  ADD PRIMARY KEY (`id_pemohonPE`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `tb_progress_pekerjaan`
--
ALTER TABLE `tb_progress_pekerjaan`
  ADD PRIMARY KEY (`id_progPR`);

--
-- Indexes for table `tb_recover`
--
ALTER TABLE `tb_recover`
  ADD PRIMARY KEY (`idRec`);

--
-- Indexes for table `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`id_statusST`);

--
-- Indexes for table `tb_survey`
--
ALTER TABLE `tb_survey`
  ADD PRIMARY KEY (`idSurvey`);

--
-- Indexes for table `tb_trackprogress`
--
ALTER TABLE `tb_trackprogress`
  ADD PRIMARY KEY (`trackId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_log`
--
ALTER TABLE `tb_log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_progress_pekerjaan`
--
ALTER TABLE `tb_progress_pekerjaan`
  MODIFY `id_progPR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tb_recover`
--
ALTER TABLE `tb_recover`
  MODIFY `idRec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_trackprogress`
--
ALTER TABLE `tb_trackprogress`
  MODIFY `trackId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`simons`@`localhost` EVENT `clear_tb_recover_event` ON SCHEDULE EVERY 30 MINUTE STARTS '2023-09-19 10:44:49' ON COMPLETION NOT PRESERVE ENABLE DO TRUNCATE TABLE tb_recover$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
