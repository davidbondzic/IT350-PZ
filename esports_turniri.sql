-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2024 at 09:03 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `esports_turniri`
--

-- --------------------------------------------------------

--
-- Table structure for table `arena`
--

CREATE TABLE `arena` (
  `ID_arene` int(11) NOT NULL,
  `Drzava` varchar(255) DEFAULT NULL,
  `Grad` varchar(255) DEFAULT NULL,
  `Naziv` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `arena`
--

INSERT INTO `arena` (`ID_arene`, `Drzava`, `Grad`, `Naziv`) VALUES
(1, 'Nemacka', 'Keln', 'Keln Arena'),
(2, 'Danska', 'Kopenhagen', 'Kopenhagen Arena\r\n'),
(3, 'Portugal', 'Lisabon', 'Lisabon Arena'),
(4, 'Nemacka', 'Berlin', 'Berlin Arena'),
(5, 'Italija', 'Rim', 'Rim Arena'),
(6, 'Kina', 'Peking', 'Peking Arena\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `igrac`
--

CREATE TABLE `igrac` (
  `ID_igraca` int(11) NOT NULL,
  `Ime` varchar(255) DEFAULT NULL,
  `Prezime` varchar(255) DEFAULT NULL,
  `Pol` varchar(10) DEFAULT NULL,
  `Godine` int(11) DEFAULT NULL,
  `IGN` varchar(255) DEFAULT NULL,
  `ID_tima` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `igrac`
--

INSERT INTO `igrac` (`ID_igraca`, `Ime`, `Prezime`, `Pol`, `Godine`, `IGN`, `ID_tima`) VALUES
(1, 'Oleksandr', 'Kostilyev', 'M', 27, 's1mple', 2),
(2, 'Fredrik', 'Jorgensen', 'M', 28, 'roeJ', 4),
(3, 'Vladan', 'Radevic', 'M', 23, 'VLDN', 1),
(4, 'Vladan', 'Mandic', 'M', 21, 'Kind0', 1),
(5, 'Lotan', 'Giladi', 'M', 23, 'Spinx', 3),
(6, 'Ana', 'Maric', 'Z', 22, 'Anna', 5);

-- --------------------------------------------------------

--
-- Table structure for table `igrica`
--

CREATE TABLE `igrica` (
  `ID_igre` int(11) NOT NULL,
  `Naziv` varchar(255) DEFAULT NULL,
  `Godina_objavljivanja` int(11) DEFAULT NULL,
  `Izdavacka_kuca` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `igrica`
--

INSERT INTO `igrica` (`ID_igre`, `Naziv`, `Godina_objavljivanja`, `Izdavacka_kuca`) VALUES
(1, 'Counter-Strike Global Offensive', 2012, 'Valve'),
(2, 'League Of Legends', 2009, 'Riot');

-- --------------------------------------------------------

--
-- Table structure for table `nagrada`
--

CREATE TABLE `nagrada` (
  `ID_nagrade` int(11) NOT NULL,
  `Naziv` varchar(255) DEFAULT NULL,
  `Tip` varchar(255) DEFAULT NULL,
  `ID_sponzora` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nagrada`
--

INSERT INTO `nagrada` (`ID_nagrade`, `Naziv`, `Tip`, `ID_sponzora`) VALUES
(1, 'MVP', 'Najbolji igrac', 1),
(2, 'COTT', 'Najbolji clutch', 3),
(3, 'FPA', 'Fer play nagrada', 1);

-- --------------------------------------------------------

--
-- Table structure for table `osvajanje`
--

CREATE TABLE `osvajanje` (
  `id_tima` int(11) NOT NULL,
  `id_nagrade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `osvajanje`
--

INSERT INTO `osvajanje` (`id_tima`, `id_nagrade`) VALUES
(2, 1),
(2, 2),
(1, 3);

-- --------------------------------------------------------

--
-- Stand-in structure for view `prikazigracaitima`
-- (See below for the actual view)
--
CREATE TABLE `prikazigracaitima` (
`ID_igraca` int(11)
,`Ime` varchar(255)
,`Prezime` varchar(255)
,`Pol` varchar(10)
,`Godine` int(11)
,`IGN` varchar(255)
,`TimNaziv` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `racunar`
--

CREATE TABLE `racunar` (
  `ID_racunara` int(11) NOT NULL,
  `Graficka_kartica` varchar(255) DEFAULT NULL,
  `Procesor` varchar(255) DEFAULT NULL,
  `RAM` int(11) DEFAULT NULL,
  `IP_adresa` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `racunar`
--

INSERT INTO `racunar` (`ID_racunara`, `Graficka_kartica`, `Procesor`, `RAM`, `IP_adresa`) VALUES
(1, 'RTX 3090', 'R5 5600x', 32, '25.26.277.2'),
(2, 'RTX 2080', 'R7 3700x', 16, '29.999.21.11'),
(3, 'RX 6600xt', 'Intel i9 12900k', 32, '100.155.13.33'),
(4, 'RTX 3090TI', 'Intel i9 12900k', 64, '25.262.211.20');

-- --------------------------------------------------------

--
-- Table structure for table `sponzor`
--

CREATE TABLE `sponzor` (
  `ID_sponzora` int(11) NOT NULL,
  `Naziv` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sponzor`
--

INSERT INTO `sponzor` (`ID_sponzora`, `Naziv`) VALUES
(1, 'DHL'),
(2, 'Mercedes'),
(3, 'Razer'),
(4, 'Asus'),
(5, 'Logitech'),
(6, 'SteelSeries');

-- --------------------------------------------------------

--
-- Table structure for table `tim`
--

CREATE TABLE `tim` (
  `ID_tima` int(11) NOT NULL,
  `Naziv` varchar(255) DEFAULT NULL,
  `Broj_clanova_tima` int(11) DEFAULT NULL,
  `Godina_osnivanja` int(11) DEFAULT NULL,
  `Tag_tima` varchar(50) DEFAULT NULL,
  `ID_racunara` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tim`
--

INSERT INTO `tim` (`ID_tima`, `Naziv`, `Broj_clanova_tima`, `Godina_osnivanja`, `Tag_tima`, `ID_racunara`) VALUES
(1, 'iNacija', 2, 2001, 'iNAT', 1),
(2, 'Natus Vincere', 5, 2021, 'NaVi', 1),
(3, 'Team Vitality', 5, 2017, 'Vita', 1),
(4, 'fnatic', 6, 2000, 'fnatic', 3),
(5, 'G2', 7, 2021, 'G2', 3),
(6, 'Zero Tenacity', 4, 2022, 'ZTEN', 4),
(7, 'Ninjas In Pyjamas', 8, 2014, 'NIP', 2),
(10, 'Metropolitan12', 10, 2020, 'METT', 1);

-- --------------------------------------------------------

--
-- Table structure for table `turnir`
--

CREATE TABLE `turnir` (
  `ID_turnira` int(11) NOT NULL,
  `Naziv` varchar(255) DEFAULT NULL,
  `Broj_timova` int(11) DEFAULT NULL,
  `ID_arene` int(11) DEFAULT NULL,
  `ID_igre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `turnir`
--

INSERT INTO `turnir` (`ID_turnira`, `Naziv`, `Broj_timova`, `ID_arene`, `ID_igre`) VALUES
(1, 'IEM Keln', 16, 1, 1),
(2, 'BLAST Series Kopenhagen', 8, 2, 1),
(3, 'LCK', 16, 4, 2),
(4, 'IEM Major Peking', 2, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ucestvovanje`
--

CREATE TABLE `ucestvovanje` (
  `id_turnira` int(11) NOT NULL,
  `id_tima` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ucestvovanje`
--

INSERT INTO `ucestvovanje` (`id_turnira`, `id_tima`) VALUES
(4, 2),
(4, 5),
(4, 1),
(4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `voditelj`
--

CREATE TABLE `voditelj` (
  `ID_voditelja` int(11) NOT NULL,
  `Ime` varchar(255) DEFAULT NULL,
  `Prezime` varchar(255) DEFAULT NULL,
  `Pol` varchar(10) DEFAULT NULL,
  `JMBG` varchar(13) DEFAULT NULL,
  `Godine_iskustva` int(11) DEFAULT NULL,
  `Prethodna_takmicenja` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voditelj`
--

INSERT INTO `voditelj` (`ID_voditelja`, `Ime`, `Prezime`, `Pol`, `JMBG`, `Godine_iskustva`, `Prethodna_takmicenja`) VALUES
(1, 'Marko', 'Markovic', 'M', '1231231233211', 5, 'IEM Keln, LCK'),
(2, 'Pera', 'Peric', 'M', '2226662223321', 1, 'BLAST Series Kopenhagen, LCK'),
(3, 'Sara', 'Saric', 'Z', '5959595959595', 3, 'LCK, IEM Keln, BLAST Series Kopenhagen');

-- --------------------------------------------------------

--
-- Table structure for table `vodjenje`
--

CREATE TABLE `vodjenje` (
  `ID_turnira` int(11) NOT NULL,
  `ID_voditelja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vodjenje`
--

INSERT INTO `vodjenje` (`ID_turnira`, `ID_voditelja`) VALUES
(1, 1),
(1, 3),
(3, 2),
(3, 3),
(2, 2),
(2, 3),
(3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `zanrovi`
--

CREATE TABLE `zanrovi` (
  `ID_igre` int(11) NOT NULL,
  `Zanr` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `zanrovi`
--

INSERT INTO `zanrovi` (`ID_igre`, `Zanr`) VALUES
(1, 'Pucacina'),
(1, 'Tactical'),
(2, 'MOBA');

-- --------------------------------------------------------

--
-- Structure for view `prikazigracaitima`
--
DROP TABLE IF EXISTS `prikazigracaitima`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `prikazigracaitima`  AS SELECT `i`.`ID_igraca` AS `ID_igraca`, `i`.`Ime` AS `Ime`, `i`.`Prezime` AS `Prezime`, `i`.`Pol` AS `Pol`, `i`.`Godine` AS `Godine`, `i`.`IGN` AS `IGN`, `t`.`Naziv` AS `TimNaziv` FROM (`igrac` `i` left join `tim` `t` on(`i`.`ID_tima` = `t`.`ID_tima`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arena`
--
ALTER TABLE `arena`
  ADD PRIMARY KEY (`ID_arene`);

--
-- Indexes for table `igrac`
--
ALTER TABLE `igrac`
  ADD PRIMARY KEY (`ID_igraca`),
  ADD KEY `ID_tima` (`ID_tima`);

--
-- Indexes for table `igrica`
--
ALTER TABLE `igrica`
  ADD PRIMARY KEY (`ID_igre`);

--
-- Indexes for table `nagrada`
--
ALTER TABLE `nagrada`
  ADD PRIMARY KEY (`ID_nagrade`),
  ADD KEY `ID_sponzora` (`ID_sponzora`);

--
-- Indexes for table `osvajanje`
--
ALTER TABLE `osvajanje`
  ADD KEY `FK_osvajanjeTim` (`id_tima`),
  ADD KEY `FK_osvajanjeNagrada` (`id_nagrade`);

--
-- Indexes for table `racunar`
--
ALTER TABLE `racunar`
  ADD PRIMARY KEY (`ID_racunara`);

--
-- Indexes for table `sponzor`
--
ALTER TABLE `sponzor`
  ADD PRIMARY KEY (`ID_sponzora`);

--
-- Indexes for table `tim`
--
ALTER TABLE `tim`
  ADD PRIMARY KEY (`ID_tima`),
  ADD KEY `ID_racunara` (`ID_racunara`);

--
-- Indexes for table `turnir`
--
ALTER TABLE `turnir`
  ADD PRIMARY KEY (`ID_turnira`),
  ADD KEY `ID_arene` (`ID_arene`),
  ADD KEY `ID_igre` (`ID_igre`);

--
-- Indexes for table `ucestvovanje`
--
ALTER TABLE `ucestvovanje`
  ADD KEY `FK_ucestvovanjeTima` (`id_tima`),
  ADD KEY `FK_ucestvovanjeTurnir` (`id_turnira`);

--
-- Indexes for table `voditelj`
--
ALTER TABLE `voditelj`
  ADD PRIMARY KEY (`ID_voditelja`);

--
-- Indexes for table `vodjenje`
--
ALTER TABLE `vodjenje`
  ADD KEY `FK_turnir` (`ID_turnira`),
  ADD KEY `FK_voditelj` (`ID_voditelja`);

--
-- Indexes for table `zanrovi`
--
ALTER TABLE `zanrovi`
  ADD KEY `FK_zanr` (`ID_igre`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arena`
--
ALTER TABLE `arena`
  MODIFY `ID_arene` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `igrac`
--
ALTER TABLE `igrac`
  MODIFY `ID_igraca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `igrica`
--
ALTER TABLE `igrica`
  MODIFY `ID_igre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nagrada`
--
ALTER TABLE `nagrada`
  MODIFY `ID_nagrade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `racunar`
--
ALTER TABLE `racunar`
  MODIFY `ID_racunara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sponzor`
--
ALTER TABLE `sponzor`
  MODIFY `ID_sponzora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tim`
--
ALTER TABLE `tim`
  MODIFY `ID_tima` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `turnir`
--
ALTER TABLE `turnir`
  MODIFY `ID_turnira` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `voditelj`
--
ALTER TABLE `voditelj`
  MODIFY `ID_voditelja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `igrac`
--
ALTER TABLE `igrac`
  ADD CONSTRAINT `igrac_ibfk_1` FOREIGN KEY (`ID_tima`) REFERENCES `tim` (`ID_tima`);

--
-- Constraints for table `nagrada`
--
ALTER TABLE `nagrada`
  ADD CONSTRAINT `nagrada_ibfk_1` FOREIGN KEY (`ID_sponzora`) REFERENCES `sponzor` (`ID_sponzora`);

--
-- Constraints for table `osvajanje`
--
ALTER TABLE `osvajanje`
  ADD CONSTRAINT `FK_osvajanjeNagrada` FOREIGN KEY (`id_nagrade`) REFERENCES `nagrada` (`ID_nagrade`),
  ADD CONSTRAINT `FK_osvajanjeTim` FOREIGN KEY (`id_tima`) REFERENCES `tim` (`ID_tima`);

--
-- Constraints for table `tim`
--
ALTER TABLE `tim`
  ADD CONSTRAINT `tim_ibfk_1` FOREIGN KEY (`ID_racunara`) REFERENCES `racunar` (`ID_racunara`);

--
-- Constraints for table `turnir`
--
ALTER TABLE `turnir`
  ADD CONSTRAINT `turnir_ibfk_1` FOREIGN KEY (`ID_arene`) REFERENCES `arena` (`ID_arene`),
  ADD CONSTRAINT `turnir_ibfk_2` FOREIGN KEY (`ID_igre`) REFERENCES `igrica` (`ID_igre`);

--
-- Constraints for table `ucestvovanje`
--
ALTER TABLE `ucestvovanje`
  ADD CONSTRAINT `FK_ucestvovanjeTima` FOREIGN KEY (`id_tima`) REFERENCES `tim` (`ID_tima`),
  ADD CONSTRAINT `FK_ucestvovanjeTurnir` FOREIGN KEY (`id_turnira`) REFERENCES `turnir` (`ID_turnira`);

--
-- Constraints for table `vodjenje`
--
ALTER TABLE `vodjenje`
  ADD CONSTRAINT `FK_turnir` FOREIGN KEY (`ID_turnira`) REFERENCES `turnir` (`ID_turnira`),
  ADD CONSTRAINT `FK_voditelj` FOREIGN KEY (`ID_voditelja`) REFERENCES `voditelj` (`ID_voditelja`);

--
-- Constraints for table `zanrovi`
--
ALTER TABLE `zanrovi`
  ADD CONSTRAINT `FK_zanr` FOREIGN KEY (`ID_igre`) REFERENCES `igrica` (`ID_igre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
