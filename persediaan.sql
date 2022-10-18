-- phpMyAdmin SQL Dump
-- version 3.3.2deb1ubuntu1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 06, 2012 at 05:33 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.2-1ubuntu4.14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `persediaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblbarang`
--

CREATE TABLE IF NOT EXISTS `tblbarang` (
  `IDBarang` char(9) NOT NULL,
  `IDSupplier` char(6) NOT NULL,
  `NamaBarang` varchar(55) NOT NULL,
  `Jenis` varchar(50) NOT NULL,
  `Harga` int(11) NOT NULL,
  `PhotoBrg` varchar(200) NOT NULL,
  `Jml_min` int(11) NOT NULL,
  `Jml_max` int(11) NOT NULL,
  PRIMARY KEY (`IDBarang`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbarang`
--

INSERT INTO `tblbarang` (`IDBarang`, `IDSupplier`, `NamaBarang`, `Jenis`, `Harga`, `PhotoBrg`, `Jml_min`, `Jml_max`) VALUES
('001CRB001', 'CRB001', 'Mie goreng', 'Mie', 1000, '', 100, 300),
('002KNG001', 'KNG001', 'Pensil 2B', 'ATK', 1000, '', 10, 100),
('002CRB001', 'CRB001', 'Stof Maf', 'ATK', 78, '', 10, 100),
('001KNG001', 'KNG001', 'Kertas Double Folio', 'ATK', 25000, '', 50, 200),
('001JKT001', 'JKT001', 'KArtu Perdana AS', 'SIM', 3000, '', 15, 50),
('003CRB001', 'CRB001', 'Spidol Permanent Snowman', 'Spidol', 5000, '', 10, 75),
('004CRB001', 'CRB001', 'Pensil 2B', 'pensil', 10000, '', 15, 90),
('005CRB001', 'CRB001', 'jhkhas', 'jhfkj', 1000, '', 10, 50),
('001MJL001', 'MJL001', 'Sabun Lux', 'Sabun Mandi', 10000, '', 25, 150),
('006CRB001', 'CRB001', 'Tes', 'Tes', 12, '', 5, 15),
('007CRB001', 'CRB001', 'kjlkj', 'kjk', 1, '', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tblsupplier`
--

CREATE TABLE IF NOT EXISTS `tblsupplier` (
  `IDSupplier` char(6) NOT NULL,
  `NamaSupplier` varchar(35) NOT NULL,
  `AlamatSupplier` varchar(100) NOT NULL,
  `Telepon` varchar(13) NOT NULL,
  `web` varchar(100) NOT NULL,
  PRIMARY KEY (`IDSupplier`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsupplier`
--

INSERT INTO `tblsupplier` (`IDSupplier`, `NamaSupplier`, `AlamatSupplier`, `Telepon`, `web`) VALUES
('CRB001', 'Cirebon Bintag', 'JL. Tanjung No.75 Cirebon', '098987666', ''),
('JKT001', 'Anugerah Cellular', 'Jl. Penerangan No.45 Jakarta Utara', '021345909', ''),
('KNG001', 'CV Jakarta', 'Siliwangi', '878787', ''),
('JKT002', 'tESgggg', 'tesggggq\r\n', '86786', 'www.jkt.com'),
('MJL001', 'CV Maju Jaya', 'Jalan Ky. Ahmad Dahlan', '087997887', 'www.mjm.co.id');

-- --------------------------------------------------------

--
-- Table structure for table `tbltransaksi`
--

CREATE TABLE IF NOT EXISTS `tbltransaksi` (
  `IDTransaksi` int(11) NOT NULL AUTO_INCREMENT,
  `IDBarang` char(9) NOT NULL,
  `TglTransaksi` date NOT NULL,
  `Keterangan` varchar(50) NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `Status` enum('M','K') NOT NULL,
  PRIMARY KEY (`IDTransaksi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbltransaksi`
--

INSERT INTO `tbltransaksi` (`IDTransaksi`, `IDBarang`, `TglTransaksi`, `Keterangan`, `Jumlah`, `Status`) VALUES
(1, '002KNG001', '2012-02-29', '-', 20, 'M'),
(2, '004CRB001', '2012-02-29', '-', 30, 'M'),
(3, '002KNG001', '2012-03-02', '-', 10, 'K');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE IF NOT EXISTS `tbluser` (
  `IDUser` varchar(15) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `NamaUser` varchar(35) NOT NULL,
  `Level` enum('beli','sales','manajer') NOT NULL,
  PRIMARY KEY (`IDUser`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`IDUser`, `Password`, `NamaUser`, `Level`) VALUES
('divpembelian', '202cb962ac59075b964b07152d234b70', 'Anggun DP', 'beli'),
('divpenjualan', '202cb962ac59075b964b07152d234b70', 'Nurul Enda', 'sales'),
('managerial', '202cb962ac59075b964b07152d234b70', 'Anggia Ap', 'manajer');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_barang_supplier`
--
CREATE TABLE IF NOT EXISTS `v_barang_supplier` (
`IDBarang` char(9)
,`IDSupplier` char(6)
,`NamaBarang` varchar(55)
,`Jenis` varchar(50)
,`Harga` int(11)
,`PhotoBrg` varchar(200)
,`NamaSupplier` varchar(35)
,`AlamatSupplier` varchar(100)
,`Telepon` varchar(13)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `v_laporan_pembelian`
--
CREATE TABLE IF NOT EXISTS `v_laporan_pembelian` (
`IDTransaksi` int(11)
,`IDBarang` char(9)
,`TglTransaksi` date
,`Keterangan` varchar(50)
,`Jumlah` int(11)
,`NamaBarang` varchar(55)
,`Jenis` varchar(50)
,`Harga` int(11)
,`PhotoBrg` varchar(200)
,`NamaSupplier` varchar(35)
,`AlamatSupplier` varchar(100)
,`Telepon` varchar(13)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `v_laporan_penjualan`
--
CREATE TABLE IF NOT EXISTS `v_laporan_penjualan` (
`IDTransaksi` int(11)
,`IDBarang` char(9)
,`TglTransaksi` date
,`Keterangan` varchar(50)
,`Jumlah` int(11)
,`NamaBarang` varchar(55)
,`Jenis` varchar(50)
,`Harga` int(11)
,`PhotoBrg` varchar(200)
,`NamaSupplier` varchar(35)
,`AlamatSupplier` varchar(100)
,`Telepon` varchar(13)
);
-- --------------------------------------------------------

--
-- Structure for view `v_barang_supplier`
--
DROP TABLE IF EXISTS `v_barang_supplier`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_barang_supplier` AS select `tblbarang`.`IDBarang` AS `IDBarang`,`tblbarang`.`IDSupplier` AS `IDSupplier`,`tblbarang`.`NamaBarang` AS `NamaBarang`,`tblbarang`.`Jenis` AS `Jenis`,`tblbarang`.`Harga` AS `Harga`,`tblbarang`.`PhotoBrg` AS `PhotoBrg`,`tblsupplier`.`NamaSupplier` AS `NamaSupplier`,`tblsupplier`.`AlamatSupplier` AS `AlamatSupplier`,`tblsupplier`.`Telepon` AS `Telepon` from (`tblbarang` left join `tblsupplier` on((`tblsupplier`.`IDSupplier` = `tblbarang`.`IDSupplier`)));

-- --------------------------------------------------------

--
-- Structure for view `v_laporan_pembelian`
--
DROP TABLE IF EXISTS `v_laporan_pembelian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_laporan_pembelian` AS select `tbltransaksi`.`IDTransaksi` AS `IDTransaksi`,`tbltransaksi`.`IDBarang` AS `IDBarang`,`tbltransaksi`.`TglTransaksi` AS `TglTransaksi`,`tbltransaksi`.`Keterangan` AS `Keterangan`,`tbltransaksi`.`Jumlah` AS `Jumlah`,`tblbarang`.`NamaBarang` AS `NamaBarang`,`tblbarang`.`Jenis` AS `Jenis`,`tblbarang`.`Harga` AS `Harga`,`tblbarang`.`PhotoBrg` AS `PhotoBrg`,`tblsupplier`.`NamaSupplier` AS `NamaSupplier`,`tblsupplier`.`AlamatSupplier` AS `AlamatSupplier`,`tblsupplier`.`Telepon` AS `Telepon` from ((`tbltransaksi` left join `tblbarang` on((`tblbarang`.`IDBarang` = `tbltransaksi`.`IDBarang`))) left join `tblsupplier` on((`tblsupplier`.`IDSupplier` = `tblbarang`.`IDSupplier`))) where (`tbltransaksi`.`Status` = 'M');

-- --------------------------------------------------------

--
-- Structure for view `v_laporan_penjualan`
--
DROP TABLE IF EXISTS `v_laporan_penjualan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_laporan_penjualan` AS select `tbltransaksi`.`IDTransaksi` AS `IDTransaksi`,`tbltransaksi`.`IDBarang` AS `IDBarang`,`tbltransaksi`.`TglTransaksi` AS `TglTransaksi`,`tbltransaksi`.`Keterangan` AS `Keterangan`,`tbltransaksi`.`Jumlah` AS `Jumlah`,`tblbarang`.`NamaBarang` AS `NamaBarang`,`tblbarang`.`Jenis` AS `Jenis`,`tblbarang`.`Harga` AS `Harga`,`tblbarang`.`PhotoBrg` AS `PhotoBrg`,`tblsupplier`.`NamaSupplier` AS `NamaSupplier`,`tblsupplier`.`AlamatSupplier` AS `AlamatSupplier`,`tblsupplier`.`Telepon` AS `Telepon` from ((`tbltransaksi` left join `tblbarang` on((`tblbarang`.`IDBarang` = `tbltransaksi`.`IDBarang`))) left join `tblsupplier` on((`tblsupplier`.`IDSupplier` = `tblbarang`.`IDSupplier`))) where (`tbltransaksi`.`Status` = 'K');
