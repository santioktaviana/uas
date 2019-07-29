-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 03, 2019 at 11:51 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `unisbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbadmin`
--

CREATE TABLE IF NOT EXISTS `tbadmin` (
  `id_admin` int(10) NOT NULL auto_increment,
  `nik` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `no_telp_admin` varchar(20) NOT NULL,
  `alamat_admin` text NOT NULL,
  `level` varchar(10) NOT NULL,
  PRIMARY KEY  (`id_admin`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbadmin`
--

INSERT INTO `tbadmin` (`id_admin`, `nik`, `username`, `password`, `nama_admin`, `no_telp_admin`, `alamat_admin`, `level`) VALUES
(1, '123456', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'bu vero', '08123456789', 'jl jalan', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbjadwal`
--

CREATE TABLE IF NOT EXISTS `tbjadwal` (
  `id_jadwal` int(10) NOT NULL auto_increment,
  `id_mahasiswa` int(10) NOT NULL,
  `id_sertifikasi` int(10) NOT NULL,
  `tgl_sertifikasi` varchar(20) NOT NULL,
  `jam` varchar(10) NOT NULL,
  `lokasi` varchar(10) NOT NULL,
  PRIMARY KEY  (`id_jadwal`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbjadwal`
--

INSERT INTO `tbjadwal` (`id_jadwal`, `id_mahasiswa`, `id_sertifikasi`, `tgl_sertifikasi`, `jam`, `lokasi`) VALUES
(1, 1, 3, '07/03/2019', '17.00', 'Lab A'),
(2, 2, 1, '07/04/2019', '17.00', 'Lab D');

-- --------------------------------------------------------

--
-- Table structure for table `tblab`
--

CREATE TABLE IF NOT EXISTS `tblab` (
  `id_lab` int(10) NOT NULL auto_increment,
  `nama_lab` varchar(10) NOT NULL,
  PRIMARY KEY  (`id_lab`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tblab`
--

INSERT INTO `tblab` (`id_lab`, `nama_lab`) VALUES
(1, 'Lab A'),
(2, 'Lab B'),
(3, 'Lab C'),
(4, 'Lab D'),
(5, 'Lab E'),
(6, 'Lab F');

-- --------------------------------------------------------

--
-- Table structure for table `tbmahasiswa`
--

CREATE TABLE IF NOT EXISTS `tbmahasiswa` (
  `id_mahasiswa` int(10) NOT NULL auto_increment,
  `nim_mahasiswa` varchar(20) NOT NULL,
  `nama_mahasiswa` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `no_telp_mahasiswa` varchar(20) NOT NULL,
  `level` varchar(10) NOT NULL,
  PRIMARY KEY  (`id_mahasiswa`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbmahasiswa`
--

INSERT INTO `tbmahasiswa` (`id_mahasiswa`, `nim_mahasiswa`, `nama_mahasiswa`, `username`, `password`, `no_telp_mahasiswa`, `level`) VALUES
(1, '14.01.55.0042', 'Yossie Risang Adi P', 'yossie', '2f9772b2a6ac8d920f06744ec5b3cf00', '123333', 'mahasiswa'),
(2, '1111', 'nabila', 'nabila', '202cb962ac59075b964b07152d234b70', '123123123', 'mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `tbpeserta`
--

CREATE TABLE IF NOT EXISTS `tbpeserta` (
  `id_peserta` int(10) NOT NULL auto_increment,
  `id_mahasiswa` int(10) NOT NULL,
  `id_sertifikasi` int(10) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `bukti_bayar` varchar(100) NOT NULL,
  `status` varchar(15) NOT NULL,
  PRIMARY KEY  (`id_peserta`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbpeserta`
--

INSERT INTO `tbpeserta` (`id_peserta`, `id_mahasiswa`, `id_sertifikasi`, `tgl_bayar`, `bukti_bayar`, `status`) VALUES
(1, 1, 3, '2019-07-02', '6454704_stock-vector-mountain-logo.jpg', 'Done'),
(2, 2, 1, '2019-07-03', '252939-headphones-music-Audifonos.jpg', 'Done');

-- --------------------------------------------------------

--
-- Table structure for table `tbsertifikasi`
--

CREATE TABLE IF NOT EXISTS `tbsertifikasi` (
  `id_sertifikasi` int(10) NOT NULL auto_increment,
  `nama_sertifikasi` varchar(20) NOT NULL,
  PRIMARY KEY  (`id_sertifikasi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbsertifikasi`
--

INSERT INTO `tbsertifikasi` (`id_sertifikasi`, `nama_sertifikasi`) VALUES
(1, 'MTA-Database'),
(2, 'MTA-Jaringan'),
(3, 'Foresec');
