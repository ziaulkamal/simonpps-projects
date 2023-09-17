-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2023 at 04:38 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

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

--
-- Dumping data for table `tb_dokumen`
--

INSERT INTO `tb_dokumen` (`id_dokumenDO`, `pkj_namaDO`, `ud_pprDO`, `IN13DO`, `IN2DO`, `IN14DO`, `jns_dokDO`, `ket_dokDO`, `updateDateDO`) VALUES
('DOK-16946766830', 'Proyek Berkasdinas Perikananuntuk Pembangunan DiBanda Aceh', 'UNDANGAN_PEMAPARAN_62703035766.pdf', 'IN13DO_FILE_89817863766.pdf', 'IN2DO_FILE_89817863766.pdf', '', 'selesai', 'Proyek telah dinyatakan selesai karena diselesaika', '2023-09-14'),
('DOK-16946766831', '', '', '', '', '', '', '', '2023-09-14'),
('DOK-16946766832', '', '', '', '', '', '', '', '2023-09-14'),
('DOK-16946766833', '', '', '', '', '', '', '', '2023-09-14'),
('DOK-16946766834', '', '', '', '', '', '', '', '2023-09-14'),
('DOK-16946766835', '', '', '', '', '', '', '', '2023-09-14'),
('DOK-16946766836', '', '', '', '', '', '', '', '2023-09-14'),
('DOK-16946766837', '', '', '', '', '', '', '', '2023-09-14'),
('DOK-16946766838', '', '', '', '', '', '', '', '2023-09-14'),
('DOK-16946766839', '', '', '', '', '', '', '', '2023-09-14'),
('DOK-16947644782023', 'Proyek Pembangunan Jembatan', 'UNDANGAN_PEMAPARAN_84738225477.pdf', 'IN13DO_FILE_28810995786.pdf', 'IN2DO_FILE_28810995786.pdf', '', 'selesai', 'Proyek telah dinyatakan selesai karena diselesaika', '2023-09-17');

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

--
-- Dumping data for table `tb_log`
--

INSERT INTO `tb_log` (`id_log`, `lvlAccess`, `username`, `activityProg`, `dateLog`, `sendMail`, `keteranganLog`) VALUES
(167, 'seksi-pps', 'pps@gmail.com', 0, '2023-09-14', 0, 'Dokumen telah ditindak lanjuti dengan nama pekerjaan Proyek Berkasdinas perikananuntuk pembangunan diBanda Aceh dari satuan kerja \"guest\".'),
(168, 'seksi-pps', 'pps@gmail.com', 0, '2023-09-14', 0, 'Dokumen IN.13 dan IN.2 telah dikirimkan untuk persetujuan dengan nama pekerjaan Proyek Berkasdinas perikananuntuk pembangunan diBanda Aceh dari satuan kerja \"guest\".'),
(169, 'guest', 'guest@gmail.com', 0, '2023-09-14', 0, 'Berhasil melakukan update progress pekerjaan. Kode Transaksi : PEM-16946766830'),
(170, 'guest', 'guest@gmail.com', 0, '2023-09-14', 0, 'Berhasil melakukan update progress pekerjaan. Kode Transaksi : PEM-16946766830'),
(171, 'guest', 'guest@gmail.com', 0, '2023-09-14', 0, 'Berhasil melakukan update progress pekerjaan. Kode Transaksi : PEM-16946766830'),
(172, 'seksi-pps', 'pps@gmail.com', 0, '2023-09-14', 0, 'Pekerjaan Proyek Berkasdinas perikananuntuk pembangunan diBanda Aceh dari satuan kerja \"guest\" telah dinyatakan selesai karna telah dituntaskan.'),
(173, 'guest', 'guest@gmail.com', 0, '2023-09-15', 0, 'Berhasil mengirimkan permohonan. Kode Transaksi : PEM-16947644782023'),
(174, 'seksi-pps', 'pps@gmail.com', 0, '2023-09-15', 0, 'Dokumen telah ditindak lanjuti dengan nama pekerjaan Proyek Pembangunan Jembatan dari satuan kerja \"guest\".'),
(175, 'seksi-pps', 'pps@gmail.com', 0, '2023-09-15', 0, 'Dokumen IN.13 dan IN.2 telah dikirimkan untuk persetujuan dengan nama pekerjaan Proyek Pembangunan Jembatan dari satuan kerja \"guest\".'),
(176, 'guest', 'guest@gmail.com', 0, '2023-09-15', 0, 'Berhasil melakukan update progress pekerjaan. Kode Transaksi : PEM-16947644782023'),
(177, 'guest', 'guest@gmail.com', 0, '2023-09-15', 0, 'Berhasil melakukan update progress pekerjaan. Kode Transaksi : PEM-16947644782023'),
(178, 'guest', 'guest@gmail.com', 0, '2023-09-15', 0, 'Berhasil melakukan update progress pekerjaan. Kode Transaksi : PEM-16947644782023'),
(179, 'seksi-pps', 'pps@gmail.com', 0, '2023-09-17', 0, 'Pekerjaan Proyek Pembangunan Jembatan dari satuan kerja \"guest\" telah dinyatakan selesai karna telah dituntaskan.');

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

--
-- Dumping data for table `tb_pemohon`
--

INSERT INTO `tb_pemohon` (`id_pemohonPE`, `status_idPE`, `dokumen_idPE`, `asal_satkerPE`, `nama_pkjPE`, `sumber_pbyPE`, `pagu_aggPE`, `nil_kontrakPE`, `jw_StartpelaksanaanPE`, `jw_EndpelaksanaanPE`, `lokasi_pkjPE`, `timtah_pelakPE`, `t_berjalanPE`, `skp_straPE`, `pp_keberPE`, `s_permohonanPE`, `updateDatePE`) VALUES
('PEM-16946766830', 'STC169467810714092023', 'DOK-16946766830', 'guest', 'Proyek Berkasdinas perikananuntuk pembangunan diBanda Aceh', 'APBN', '304723446', '602555908', '2023-09-14', '2023-09-14', 'Banda Aceh', 'SAMPLE__1.pdf', 'Persiapan Berkas', 'SAMPLE__2.pdf', 'Example', 'SAMPLE__3.pdf', '2023-09-14'),
('PEM-16946766831', '', 'DOK-16946766831', 'guest', 'Proyek Berkasdinas pertanianuntuk pembangunan diTapak Tuan', 'APBN', '121793416', '337291055', '2023-09-14', '2023-09-14', 'Tapak Tuan', 'SAMPLE__1.pdf', 'Persiapan Berkas', 'SAMPLE__2.pdf', 'Example', 'SAMPLE__3.pdf', '2023-09-14'),
('PEM-16946766832', '', 'DOK-16946766832', 'guest', 'Proyek Berkasdinas komunikasiuntuk pembangunan diAceh Besar', 'APBN', '178605321', '202559496', '2023-09-14', '2023-09-14', 'Aceh Besar', 'SAMPLE__1.pdf', 'Persiapan Berkas', 'SAMPLE__2.pdf', 'Example', 'SAMPLE__3.pdf', '2023-09-14'),
('PEM-16946766833', '', 'DOK-16946766833', 'guest', 'Proyek Berkasdinas penerbanganuntuk pembangunan diTapak Tuan', 'APBN', '667582822', '700193695', '2023-09-14', '2023-09-14', 'Tapak Tuan', 'SAMPLE__1.pdf', 'Persiapan Berkas', 'SAMPLE__2.pdf', 'Example', 'SAMPLE__3.pdf', '2023-09-14'),
('PEM-16946766834', '', 'DOK-16946766834', 'guest', 'Proyek Berkasdinas PUuntuk pembangunan diBireun', 'APBN', '293924047', '604470973', '2023-09-14', '2023-09-14', 'Bireun', 'SAMPLE__1.pdf', 'Persiapan Berkas', 'SAMPLE__2.pdf', 'Example', 'SAMPLE__3.pdf', '2023-09-14'),
('PEM-16946766835', '', 'DOK-16946766835', 'guest', 'Proyek Berkasdinas komunikasiuntuk pembangunan diTapak Tuan', 'APBN', '304846265', '312840038', '2023-09-14', '2023-09-14', 'Tapak Tuan', 'SAMPLE__1.pdf', 'Persiapan Berkas', 'SAMPLE__2.pdf', 'Example', 'SAMPLE__3.pdf', '2023-09-14'),
('PEM-16946766836', '', 'DOK-16946766836', 'guest', 'Proyek Berkasdinas pertanianuntuk pembangunan diAceh Besar', 'APBN', '571426132', '656618692', '2023-09-14', '2023-09-14', 'Aceh Besar', 'SAMPLE__1.pdf', 'Persiapan Berkas', 'SAMPLE__2.pdf', 'Example', 'SAMPLE__3.pdf', '2023-09-14'),
('PEM-16946766837', '', 'DOK-16946766837', 'guest', 'Proyek Berkasdinas PUuntuk pembangunan diAceh Besar', 'APBN', '714850051', '177057469', '2023-09-14', '2023-09-14', 'Aceh Besar', 'SAMPLE__1.pdf', 'Persiapan Berkas', 'SAMPLE__2.pdf', 'Example', 'SAMPLE__3.pdf', '2023-09-14'),
('PEM-16946766838', '', 'DOK-16946766838', 'guest', 'Proyek Berkasdinas penerbanganuntuk pembangunan diAceh Besar', 'APBN', '758530183', '697339840', '2023-09-14', '2023-09-14', 'Aceh Besar', 'SAMPLE__1.pdf', 'Persiapan Berkas', 'SAMPLE__2.pdf', 'Example', 'SAMPLE__3.pdf', '2023-09-14'),
('PEM-16946766839', '', 'DOK-16946766839', 'guest', 'Proyek Berkasdinas perikananuntuk pembangunan diSigli', 'APBN', '819040787', '577398035', '2023-09-14', '2023-09-14', 'Sigli', 'SAMPLE__1.pdf', 'Persiapan Berkas', 'SAMPLE__2.pdf', 'Example', 'SAMPLE__3.pdf', '2023-09-14'),
('PEM-16947644782023', 'STC169495887317092023', 'DOK-16947644782023', 'guest', 'Proyek Pembangunan Jembatan', 'APBN', '100000000', '50000000', '2023-09-15', '2023-12-30', 'Sigli', 'TIMELINE_TAHAPAN_PELAKSANAAN_64401048141.pdf', 'Membeli bahan baku', 'SURAT_KEPUTUSAN_PROYEK_64401048141.pdf', 'Melakukan testing', 'SURAT_PERMOHONAN_64401048141.pdf', '2023-09-17');

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
(8, 'admin', 'ziaulkamal1109@gmail.com', '$2y$10$5jrhm.BO.K5aFIVDfk1T.e2cuAwOCzQTOfS92N2Ur0/otXIrxj1pG', 'admin', 1, '2023-09-05 12:03:16'),
(10, 'guest', 'guest@gmail.com', '$2y$10$k9/Yjd2Raf3o6GtInV6IBO9x0Pr1hVxe6iq1pNx9SK9haiEsLbRXy', 'guest', 1, '2023-09-05 15:52:41'),
(11, 'ppss', 'pps@gmail.com', '$2y$10$XSbdEp15qWlMzgtGtJki7.tta2sWbU8mDpPggwoEYRsQ5RR/5.Bci', 'seksi-pps', 1, '2023-09-05 15:54:16'),
(12, 'Dinas Kesehatan', 'rijalul', '$2y$10$aRTINIOiFbBMcZ.WVhySfODHomomJ9CG7gIKWKQZvEL4FGPbKBNiG', 'guest', 1, '2023-09-11 00:00:00'),
(13, 'dinas kelautan', 'person@gmail.com', '$2y$10$tSLn.9hPhRlqEpyIomYdY.fIC5AnVdhMklo5tyNUk9l8FNIMBhG.a', 'guest', 1, '2023-09-11 06:02:45'),
(15, 'dinas kelautan', 'budi@gmail.com', '$2y$10$lseUgB1vCj00ha0GrGEsC.FYsvwqdi5VvCXSbMpjSfSEgR914Bv0G', 'guest', 1, '2023-09-13 04:00:37');

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

--
-- Dumping data for table `tb_progress_pekerjaan`
--

INSERT INTO `tb_progress_pekerjaan` (`id_progPR`, `pemohon_idPR`, `pkj_namaPR`, `rcn_progPR`, `rl_progPR`, `deviasiPR`, `rl_keuanPR`, `lp_bulanPR`, `it_pkjPR`, `waktuPR`, `updateDatePR`) VALUES
(37, 'PEM-16946766830', 'Proyek Berkasdinas Perikananuntuk Pembangunan DiBanda Aceh', 50, 45, -5, 200000, '2 lembar', '10/FILE-1694676890.jpg', '2023-11-23', '2023-09-14'),
(38, 'PEM-16947644782023', 'Proyek Pembangunan Jembatan', 15, 10, 5, 1000000, '1 dokumen', '10/FILE-1694765131.jpg', '2023-10-19', '2023-09-15');

-- --------------------------------------------------------

--
-- Table structure for table `tb_recover`
--

CREATE TABLE `tb_recover` (
  `idRec` int(11) NOT NULL,
  `mailRec` varchar(100) NOT NULL,
  `token` varchar(255) NOT NULL,
  `timeStamp` varchar(255) NOT NULL,
  `ip_addr` varchar(20) NOT NULL,
  `dateRequest` date NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

--
-- Dumping data for table `tb_status`
--

INSERT INTO `tb_status` (`id_statusST`, `IN17ST`, `IN2ST`, `IN16ST`, `pes_pebST`, `outputSts`, `surveyIdST`, `updateDateST`) VALUES
('STC169467810714092023', 'IN17ST_FILE_11862744726.pdf', 'IN2ST_FILE_11862744726.pdf', '', 'saya menyukai aplikasi ini', 1, 'IDS-1694678124', '2023-09-14'),
('STC169495887317092023', 'IN17ST_FILE_55933640786.pdf', 'IN2ST_FILE_55933640786.pdf', '', 'ini telah selesai', 1, '', '2023-09-17');

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

--
-- Dumping data for table `tb_survey`
--

INSERT INTO `tb_survey` (`idSurvey`, `statusIdS`, `ratingNum`, `pesanMasukan`, `statusSurvey`, `updateDaate`) VALUES
('IDS-1694678124', 'STC169467810714092023', 9, 'saya menyukai aplikasi ini', 1, '2023-09-14');

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
-- Dumping data for table `tb_trackprogress`
--

INSERT INTO `tb_trackprogress` (`trackId`, `idProgress`, `rcnProgress`, `rlProgress`, `deviasiProgress`, `rlKeuangan`, `lpBulanan`, `fotoPekerjaan`, `timeDateTrack`, `updateDateTrack`) VALUES
(40, 37, 20, 15, 5, 0, '1 lembar', '10/FILE-1694676777.jpg', '2023-09-14', '2023-09-14'),
(41, 37, 30, 20, 10, 0, '1 lembar', '10/FILE-1694676826.jpg', '2023-10-18', '2023-09-14'),
(42, 37, 50, 45, -5, 0, '2 lembar', '10/FILE-1694676890.jpg', '2023-11-23', '2023-09-14'),
(43, 38, 30, 20, 10, 0, '1 lembar', '10/FILE-1694764709.jpg', '2023-09-15', '2023-09-15'),
(44, 38, 15, 10, 5, 1000000, '1 dokumen', '10/FILE-1694765131.jpg', '2023-10-19', '2023-09-15');

--
-- Indexes for dumped tables
--

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
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_progress_pekerjaan`
--
ALTER TABLE `tb_progress_pekerjaan`
  MODIFY `id_progPR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tb_recover`
--
ALTER TABLE `tb_recover`
  MODIFY `idRec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_trackprogress`
--
ALTER TABLE `tb_trackprogress`
  MODIFY `trackId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
