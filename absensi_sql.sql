-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2022 at 12:48 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_lengkap`, `username`, `password`, `foto`) VALUES
(1, 'Admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'muhammadiyah.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_guru`
--

CREATE TABLE `tb_guru` (
  `id_guru` int(11) NOT NULL,
  `nip` varchar(15) NOT NULL,
  `nama_guru` varchar(120) NOT NULL,
  `email` varchar(65) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_guru`
--

INSERT INTO `tb_guru` (`id_guru`, `nip`, `nama_guru`, `email`, `alamat`, `nohp`, `password`, `foto`, `status`) VALUES
(14, '001', 'M Khalid Akbar', 'text@gmail.com', 'bbbbbbbbbbbb', '082173646374', 'e193a01ecf8d30ad0affefd332ce934e32ffce72', 'no_photo.png', 'Y'),
(16, '002', 'Muhammad Rio Krisdianto', 'test@example.com', 'palembang', '082173828381', '6fc978af728d43c59faa400d5f6e0471ac850d4c', 'no_photo.png', 'Y'),
(18, '003', 'Redo Erliansyah', 'test@example.com', 'palembang', '086253716231', '221407c03ae5c73109cce71d27e24637824f3333', 'no_photo.png', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tb_master_mapel`
--

CREATE TABLE `tb_master_mapel` (
  `id_mapel` int(11) NOT NULL,
  `kode` varchar(15) NOT NULL,
  `mapel` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_master_mapel`
--

INSERT INTO `tb_master_mapel` (`id_mapel`, `kode`, `mapel`) VALUES
(20, 'MP-1654088545', 'Matematika'),
(21, 'MP-1654089101', 'IPA Fisika'),
(22, 'MP-1655042064', 'Bahasa Indonesia');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mengajar`
--

CREATE TABLE `tb_mengajar` (
  `id_mengajar` int(11) NOT NULL,
  `kode_pelajaran` varchar(30) NOT NULL,
  `hari` varchar(40) NOT NULL,
  `waktu_mulai` varchar(60) NOT NULL,
  `waktu_selesai` varchar(60) NOT NULL,
  `waktu_mulai2` varchar(60) NOT NULL,
  `waktu_selesai2` varchar(60) NOT NULL,
  `jamke` varchar(11) NOT NULL,
  `jamke2` varchar(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_mkelas` int(11) NOT NULL,
  `id_semester` int(11) NOT NULL,
  `id_thajaran` int(11) NOT NULL,
  `id_walikelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mengajar`
--

INSERT INTO `tb_mengajar` (`id_mengajar`, `kode_pelajaran`, `hari`, `waktu_mulai`, `waktu_selesai`, `waktu_mulai2`, `waktu_selesai2`, `jamke`, `jamke2`, `id_guru`, `id_mapel`, `id_mkelas`, `id_semester`, `id_thajaran`, `id_walikelas`) VALUES
(31, 'MPL-1654328343', 'Selasa', '07.00', '07.30', '', '', '1', '', 14, 20, 29, 17, 12, 17),
(40, 'MPL-1654658930', 'Rabu', '08.00', '09.00', '', '', '3', '', 14, 21, 30, 17, 12, 25),
(43, 'MPL-1655044769', 'Senin,Selasa', '07.00', '08.00', '09.15', '10.45', '1', '5', 14, 22, 30, 17, 12, 25),
(44, 'MPL-1655217280', 'Senin,Kamis', '07.00', '09.00', '09.45', '10.45', '1', '6', 16, 22, 29, 17, 12, 17),
(45, 'MPL-1657506330', 'Senin,Rabu', '07.00', '08.00', '09.45', '10.15', '1', '5', 14, 20, 31, 17, 12, 26),
(53, 'MPL-1658120916', 'Rabu', '07.00', '07.30', '10.15', '10.45', '1', '7', 16, 22, 30, 10, 12, 32);

-- --------------------------------------------------------

--
-- Table structure for table `tb_mkelas`
--

CREATE TABLE `tb_mkelas` (
  `id_mkelas` int(11) NOT NULL,
  `kd_kelas` varchar(40) NOT NULL,
  `nama_kelas` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mkelas`
--

INSERT INTO `tb_mkelas` (`id_mkelas`, `kd_kelas`, `nama_kelas`) VALUES
(29, 'K-1654322801', 'VII.1'),
(30, 'K-1654403049', 'VII.2'),
(31, 'K-1657506281', 'VII.3'),
(32, 'K-1657508320', 'VIII.1'),
(33, 'K-1657635607', 'VIII.2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_semester`
--

CREATE TABLE `tb_semester` (
  `id_semester` int(11) NOT NULL,
  `semester` varchar(45) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_semester`
--

INSERT INTO `tb_semester` (`id_semester`, `semester`, `status`) VALUES
(10, 'Ganjil', 1),
(17, 'Genap', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` varchar(60) NOT NULL,
  `nama_siswa` varchar(120) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` varchar(15) NOT NULL,
  `th_angkatan` year(4) NOT NULL,
  `id_mkelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `nis`, `nama_siswa`, `tempat_lahir`, `tgl_lahir`, `jk`, `alamat`, `password`, `foto`, `status`, `th_angkatan`, `id_mkelas`) VALUES
(35, '12312312', 'Redo Erliansyah', 'palembang', '2022-06-01', 'L', 'asdvaskdjsa', 'faec670ce75fe79cae1fa899617818031b1f201c', 'no_photo.png', '1', 2020, 32),
(36, '234234', 'Ivan Pangestu', 'palembang', '2022-06-01', 'L', 'asdvaskdjsa', '994b579fe9db3e4b8b4642b13f126b407c1d11e2', '', '1', 2021, 30),
(37, '345345', 'Khaska Razeth', 'palembang', '2022-06-01', 'L', 'asdsaas fsdfsafa', '011fe4d4b4e689dc04d1c88b010bfcdbd7676508', '', '1', 2021, 30),
(38, '00001', 'Afifa Nur Risky', 'Jakarta', '2016-02-02', 'P', 'Palembang', '9d97a5892b0bf1b1af208b53e6c9f35986a0b123', '', '1', 2019, 29),
(39, '00002', ' Aidil Fitrah', 'Jakarta', '2018-01-30', 'L', 'Palembang', '69a957ab57545037ce9a492ad0bd89c1d7e2220d', '', '1', 2019, 29),
(40, '00003', 'Alfin', 'palembang', '2022-07-01', 'L', 'palembang', '7293777f351f8d4527c1fe99be51a1c7868ea5f4', '', '1', 2019, 29),
(41, '00004', 'Aura Dwi Vanesa', 'palembang', '2022-07-01', 'P', 'palembang', '05919c1b7ea01ec8fdaff25c83c726aad6ab3143', '', '1', 2019, 29),
(42, '00005', ' Bima Arwana', 'palembang', '2022-07-01', 'L', 'palembang', '4a00afa2dd3d552ee13538aa2637489e647f4d59', '', '1', 2019, 29),
(43, '00006', 'Bungsu Putra Wijaya', 'palembang', '2022-07-01', 'L', 'palembang', 'e0f5495ca34f84daa9b1b96aedae516900061ed6', '', '1', 2019, 29),
(44, '00007', 'Daffa Juliansyah', 'palembang', '2022-07-01', 'L', 'palembang', 'c205d4725c254b22e83dfd658edc91957f7156dc', '', '1', 2019, 29),
(45, '00008', ' Desi Natalia', 'palembang', '2022-07-01', 'P', 'palembang', '1b5886b1c6dc1035d34df8b3cb83d1f55741018d', '', '1', 2019, 30),
(46, '00009', ' Dike Vanesa Putri', 'palembang', '2022-07-01', 'P', 'palembang', '7cfd4d470a141364ff35e878e2886483c863e1e7', '', '1', 2019, 30),
(47, '00010', 'Ferdi Jusen Rama', 'palembang', '2022-07-01', 'L', 'palembang', 'c205d4725c254b22e83dfd658edc91957f7156dc', '', '1', 2019, 29),
(48, '00011', ' Haikal Saputra', 'palembang', '0000-00-00', 'L', 'palembang', '0925dae4728f374a933e3cdbd597ee2648b1c79b', '', '1', 2019, 30),
(49, '00012', 'Ibra Sweda', 'palembang', '2022-07-01', 'L', 'palembang', 'f2777ec41a741fac2d6c1c113b26de2a21bc6c54', '', '1', 2019, 29),
(50, '00013', 'Indah Nur Fadillah', 'palembang', '2022-07-01', 'P', 'palembang', 'dcf3d5f1376dc6d08a51c39d4c17bb50e9731c79', '', '1', 2019, 30),
(51, '00014', ' Jasmin Kayla Ramadhani', 'palembang', '2022-07-01', 'P', 'palembang', '681b6d61a85229f443ae2fa6a5e6e085e0769804', '', '1', 2019, 30),
(52, '00015', 'Kanaya Aliva', 'palembang', '2022-07-01', 'P', 'palembang', 'd35c10debf5a826176e3ac8a575cf38bb075f235', '', '1', 2019, 30),
(53, '00016', ' M. Alviansyah', 'palembang', '2022-07-01', 'L', 'palembang', 'ff7ca437c82915e6c8c0a2bbb1d6ebeefe1ac5e8', '', '1', 2019, 30),
(54, '000017', 'Muhammad Khalid Akbar', 'palembang', '2022-07-01', 'L', 'palembang', 'cfbcb12b38c0dc0bb4d87d5338337ae20708221b', '', '1', 2019, 31);

-- --------------------------------------------------------

--
-- Table structure for table `tb_thajaran`
--

CREATE TABLE `tb_thajaran` (
  `id_thajaran` int(11) NOT NULL,
  `tahun_ajaran` varchar(30) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_thajaran`
--

INSERT INTO `tb_thajaran` (`id_thajaran`, `tahun_ajaran`, `status`) VALUES
(12, '2021/2022', 1),
(15, '2022/2023', 0),
(16, '2023/2024', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_walikelas`
--

CREATE TABLE `tb_walikelas` (
  `id_walikelas` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `id_mkelas` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_walikelas`
--

INSERT INTO `tb_walikelas` (`id_walikelas`, `id_guru`, `nama_lengkap`, `id_mkelas`, `username`, `password`, `foto`) VALUES
(17, 14, 'Muhammad Khalid Akbar', 29, '001', '6fc978af728d43c59faa400d5f6e0471ac850d4c', 'no_photo.png'),
(25, 16, 'Muhamad Rio Krisdianto', 30, '002', '6fc978af728d43c59faa400d5f6e0471ac850d4c', 'no_photo.png'),
(32, 18, '', 33, '003', '221407c03ae5c73109cce71d27e24637824f3333', '');

-- --------------------------------------------------------

--
-- Table structure for table `_logabsensi`
--

CREATE TABLE `_logabsensi` (
  `id_presensi` int(11) NOT NULL,
  `id_mengajar` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `tgl_absen` date NOT NULL,
  `ket` enum('H','I','S','T','A','C') NOT NULL,
  `pertemuan_ke` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_logabsensi`
--

INSERT INTO `_logabsensi` (`id_presensi`, `id_mengajar`, `id_siswa`, `tgl_absen`, `ket`, `pertemuan_ke`) VALUES
(371, 31, 35, '2022-07-10', 'H', '1'),
(372, 31, 38, '2022-07-10', 'H', '1'),
(373, 31, 39, '2022-07-10', 'H', '1'),
(374, 31, 40, '2022-07-10', 'H', '1'),
(375, 31, 41, '2022-07-10', 'H', '1'),
(376, 31, 42, '2022-07-10', 'H', '1'),
(377, 31, 43, '2022-07-10', 'H', '1'),
(378, 31, 44, '2022-07-10', 'H', '1'),
(379, 31, 47, '2022-07-10', 'H', '1'),
(380, 31, 49, '2022-07-10', 'H', '1'),
(381, 31, 35, '2022-07-09', 'S', '2'),
(382, 31, 38, '2022-07-09', 'H', '2'),
(383, 31, 39, '2022-07-09', 'H', '2'),
(384, 31, 40, '2022-07-09', 'H', '2'),
(385, 31, 41, '2022-07-09', 'H', '2'),
(386, 31, 42, '2022-07-09', 'S', '2'),
(387, 31, 43, '2022-07-09', 'H', '2'),
(388, 31, 44, '2022-07-09', 'A', '2'),
(389, 31, 47, '2022-07-09', 'H', '2'),
(390, 31, 49, '2022-07-09', 'H', '2'),
(391, 31, 35, '2022-07-08', 'I', '3'),
(392, 31, 38, '2022-07-08', 'H', '3'),
(393, 31, 39, '2022-07-08', 'H', '3'),
(394, 31, 40, '2022-07-08', 'S', '3'),
(395, 31, 41, '2022-07-08', 'H', '3'),
(396, 31, 42, '2022-07-08', 'H', '3'),
(397, 31, 43, '2022-07-08', 'S', '3'),
(398, 31, 44, '2022-07-08', 'H', '3'),
(399, 31, 47, '2022-07-08', 'A', '3'),
(400, 31, 49, '2022-07-08', 'H', '3'),
(401, 40, 36, '2022-07-10', 'I', '1'),
(402, 40, 37, '2022-07-10', 'H', '1'),
(403, 40, 45, '2022-07-10', 'H', '1'),
(404, 40, 46, '2022-07-10', 'A', '1'),
(405, 40, 48, '2022-07-10', 'H', '1'),
(406, 40, 50, '2022-07-10', 'H', '1'),
(407, 40, 51, '2022-07-10', 'H', '1'),
(408, 40, 52, '2022-07-10', 'I', '1'),
(409, 40, 53, '2022-07-10', 'H', '1'),
(410, 40, 36, '2022-07-09', 'S', '2'),
(411, 40, 37, '2022-07-09', 'A', '2'),
(412, 40, 45, '2022-07-09', 'H', '2'),
(413, 40, 46, '2022-07-09', 'H', '2'),
(414, 40, 48, '2022-07-09', 'H', '2'),
(415, 40, 50, '2022-07-09', 'H', '2'),
(416, 40, 51, '2022-07-09', 'S', '2'),
(417, 40, 52, '2022-07-09', 'H', '2'),
(418, 40, 53, '2022-07-09', 'H', '2'),
(419, 40, 36, '2022-07-08', 'S', '3'),
(420, 40, 37, '2022-07-08', 'H', '3'),
(421, 40, 45, '2022-07-08', 'H', '3'),
(422, 40, 46, '2022-07-08', 'A', '3'),
(423, 40, 48, '2022-07-08', 'H', '3'),
(424, 40, 50, '2022-07-08', 'H', '3'),
(425, 40, 51, '2022-07-08', 'I', '3'),
(426, 40, 52, '2022-07-08', 'H', '3'),
(427, 40, 53, '2022-07-08', 'H', '3'),
(428, 43, 36, '2022-07-10', 'I', '1'),
(429, 43, 37, '2022-07-10', 'H', '1'),
(430, 43, 45, '2022-07-10', 'S', '1'),
(431, 43, 46, '2022-07-10', 'H', '1'),
(432, 43, 48, '2022-07-10', 'H', '1'),
(433, 43, 50, '2022-07-10', 'H', '1'),
(434, 43, 51, '2022-07-10', 'I', '1'),
(435, 43, 52, '2022-07-10', 'H', '1'),
(436, 43, 53, '2022-07-10', 'H', '1'),
(437, 43, 36, '2022-07-09', 'H', '2'),
(438, 43, 37, '2022-07-09', 'H', '2'),
(439, 43, 45, '2022-07-09', 'S', '2'),
(440, 43, 46, '2022-07-09', 'H', '2'),
(441, 43, 48, '2022-07-09', 'I', '2'),
(442, 43, 50, '2022-07-09', 'H', '2'),
(443, 43, 51, '2022-07-09', 'H', '2'),
(444, 43, 52, '2022-07-09', 'H', '2'),
(445, 43, 53, '2022-07-09', 'H', '2'),
(446, 43, 36, '2022-07-08', 'S', '3'),
(447, 43, 37, '2022-07-08', 'A', '3'),
(448, 43, 45, '2022-07-08', 'H', '3'),
(449, 43, 46, '2022-07-08', 'H', '3'),
(450, 43, 48, '2022-07-08', 'I', '3'),
(451, 43, 50, '2022-07-08', 'S', '3'),
(452, 43, 51, '2022-07-08', 'H', '3'),
(453, 43, 52, '2022-07-08', 'H', '3'),
(454, 43, 53, '2022-07-08', 'H', '3'),
(455, 31, 35, '2022-07-06', 'H', '4'),
(456, 31, 38, '2022-07-06', 'H', '4'),
(457, 31, 39, '2022-07-06', 'H', '4'),
(458, 31, 40, '2022-07-06', 'H', '4'),
(459, 31, 41, '2022-07-06', 'H', '4'),
(460, 31, 42, '2022-07-06', 'H', '4'),
(461, 31, 43, '2022-07-06', 'H', '4'),
(462, 31, 44, '2022-07-06', 'H', '4'),
(463, 31, 47, '2022-07-06', 'H', '4'),
(464, 31, 49, '2022-07-06', 'H', '4'),
(465, 31, 35, '2022-07-05', 'H', '5'),
(466, 31, 38, '2022-07-05', 'H', '5'),
(467, 31, 39, '2022-07-05', 'H', '5'),
(468, 31, 40, '2022-07-05', 'H', '5'),
(469, 31, 41, '2022-07-05', 'H', '5'),
(470, 31, 42, '2022-07-05', 'H', '5'),
(471, 31, 43, '2022-07-05', 'H', '5'),
(472, 31, 44, '2022-07-05', 'H', '5'),
(473, 31, 47, '2022-07-05', 'H', '5'),
(474, 31, 49, '2022-07-05', 'H', '5'),
(475, 31, 35, '2022-07-04', 'H', '6'),
(476, 31, 38, '2022-07-04', 'I', '6'),
(477, 31, 39, '2022-07-04', 'H', '6'),
(478, 31, 40, '2022-07-04', 'H', '6'),
(479, 31, 41, '2022-07-04', 'H', '6'),
(480, 31, 42, '2022-07-04', 'H', '6'),
(481, 31, 43, '2022-07-04', 'H', '6'),
(482, 31, 44, '2022-07-04', 'H', '6'),
(483, 31, 47, '2022-07-04', 'H', '6'),
(484, 31, 49, '2022-07-04', 'H', '6'),
(485, 31, 35, '2022-07-03', 'H', '7'),
(486, 31, 38, '2022-07-03', 'H', '7'),
(487, 31, 39, '2022-07-03', 'H', '7'),
(488, 31, 40, '2022-07-03', 'H', '7'),
(489, 31, 41, '2022-07-03', 'H', '7'),
(490, 31, 42, '2022-07-03', 'H', '7'),
(491, 31, 43, '2022-07-03', 'H', '7'),
(492, 31, 44, '2022-07-03', 'H', '7'),
(493, 31, 47, '2022-07-03', 'H', '7'),
(494, 31, 49, '2022-07-03', 'H', '7'),
(495, 40, 36, '2022-07-06', 'H', '4'),
(496, 40, 37, '2022-07-06', 'H', '4'),
(497, 40, 45, '2022-07-06', 'H', '4'),
(498, 40, 46, '2022-07-06', 'H', '4'),
(499, 40, 48, '2022-07-06', 'H', '4'),
(500, 40, 50, '2022-07-06', 'H', '4'),
(501, 40, 51, '2022-07-06', 'H', '4'),
(502, 40, 52, '2022-07-06', 'H', '4'),
(503, 40, 53, '2022-07-06', 'H', '4'),
(504, 44, 35, '2022-07-10', 'H', '1'),
(505, 44, 38, '2022-07-10', 'H', '1'),
(506, 44, 39, '2022-07-10', 'H', '1'),
(507, 44, 40, '2022-07-10', 'H', '1'),
(508, 44, 41, '2022-07-10', 'H', '1'),
(509, 44, 42, '2022-07-10', 'H', '1'),
(510, 44, 43, '2022-07-10', 'H', '1'),
(511, 44, 44, '2022-07-10', 'H', '1'),
(512, 44, 47, '2022-07-10', 'H', '1'),
(513, 44, 49, '2022-07-10', 'H', '1'),
(514, 31, 35, '2022-07-11', 'S', '8'),
(515, 31, 38, '2022-07-11', 'S', '8'),
(516, 31, 39, '2022-07-11', 'S', '8'),
(517, 31, 40, '2022-07-11', 'H', '8'),
(518, 31, 41, '2022-07-11', 'H', '8'),
(519, 31, 42, '2022-07-11', 'H', '8'),
(520, 31, 43, '2022-07-11', 'H', '8'),
(521, 31, 44, '2022-07-11', 'H', '8'),
(522, 31, 47, '2022-07-11', 'H', '8'),
(523, 31, 49, '2022-07-11', 'H', '8'),
(524, 45, 54, '2022-07-13', 'H', '1'),
(525, 31, 38, '2022-07-18', 'H', '9'),
(526, 31, 39, '2022-07-18', 'H', '9'),
(527, 31, 40, '2022-07-18', 'H', '9'),
(528, 31, 41, '2022-07-18', 'H', '9'),
(529, 31, 42, '2022-07-18', 'H', '9'),
(530, 31, 43, '2022-07-18', 'H', '9'),
(531, 31, 44, '2022-07-18', 'H', '9'),
(532, 31, 47, '2022-07-18', 'H', '9'),
(533, 31, 49, '2022-07-18', 'H', '9');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `tb_master_mapel`
--
ALTER TABLE `tb_master_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `tb_mengajar`
--
ALTER TABLE `tb_mengajar`
  ADD PRIMARY KEY (`id_mengajar`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indexes for table `tb_mkelas`
--
ALTER TABLE `tb_mkelas`
  ADD PRIMARY KEY (`id_mkelas`);

--
-- Indexes for table `tb_semester`
--
ALTER TABLE `tb_semester`
  ADD PRIMARY KEY (`id_semester`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `tb_thajaran`
--
ALTER TABLE `tb_thajaran`
  ADD PRIMARY KEY (`id_thajaran`);

--
-- Indexes for table `tb_walikelas`
--
ALTER TABLE `tb_walikelas`
  ADD PRIMARY KEY (`id_walikelas`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indexes for table `_logabsensi`
--
ALTER TABLE `_logabsensi`
  ADD PRIMARY KEY (`id_presensi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_guru`
--
ALTER TABLE `tb_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_master_mapel`
--
ALTER TABLE `tb_master_mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_mengajar`
--
ALTER TABLE `tb_mengajar`
  MODIFY `id_mengajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tb_mkelas`
--
ALTER TABLE `tb_mkelas`
  MODIFY `id_mkelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tb_semester`
--
ALTER TABLE `tb_semester`
  MODIFY `id_semester` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tb_thajaran`
--
ALTER TABLE `tb_thajaran`
  MODIFY `id_thajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_walikelas`
--
ALTER TABLE `tb_walikelas`
  MODIFY `id_walikelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `_logabsensi`
--
ALTER TABLE `_logabsensi`
  MODIFY `id_presensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=534;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
