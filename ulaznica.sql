-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2022 at 08:49 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ulaznica`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `idAdmin` int(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`idAdmin`, `user`, `password`) VALUES
(501, 'Bojan', 'ulaznicebojan1'),
(502, 'Marija', 'ulaznicemarija2');

-- --------------------------------------------------------

--
-- Table structure for table `dogadjaj`
--

CREATE TABLE `dogadjaj` (
  `idDogadjaj` int(50) NOT NULL,
  `naziv` varchar(50) NOT NULL,
  `broj_mesta` int(50) NOT NULL,
  `cenaUlaznice` int(50) NOT NULL,
  `slika` varchar(30) NOT NULL,
  `opis` varchar(500) NOT NULL,
  `kategorija_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dogadjaj`
--

INSERT INTO `dogadjaj` (`idDogadjaj`, `naziv`, `broj_mesta`, `cenaUlaznice`, `slika`, `opis`, `kategorija_id`) VALUES
(104, 'Koncert Ace Lukasa', 1000, 900, 'lukas.jpg', '   Folk superstar Aca Lukas najavljuje još jednu najveću žurku na Balkanu i još jedan koncert za pamć', 909),
(108, 'KK Crvena Zvezda - EFES', 2400, 1400, 'zvezda.jpg', ' KK Crvena Zvezda će 8.4 od 21h odigrati poslednju utakmicu evrolige u hali Aleksandar Nikolić , obez', 907),
(109, 'Koncert Beogradskog Sindikata', 10, 600, 'bs.jpg', '  Deset godina nakon spektakla pred prepunom beogradskom Arenom \"Beogradski sindikat\" se konačno sprem', 909),
(110, 'Romeo i Julija', 100, 400, 'atelje212.jpg', 'Premijera, četvrtak 26. jun 2021. / Velika scena. Balet u tri čina (devet slika s epilogom) po trage', 911),
(112, 'Serbia Open', 5000, 200, 'tenis.jpg', 'Svi ljubitelji tenisa će ovog proleća moći da uživaju u teniskim mečevima jer će Beograd ponovo biti domaćin Serbia Open 2022, prestižnog ATP turnira serije 250', 907),
(113, 'KK Mega Mozzart - KK Partizan NIS', 530, 500, 'mega.jpg', 'Karte za utakmicu će biti puštene u prodaju u sredu 6. aprila u svim poslovnicama Tickets.rs kao i online putem istog veb-sajta, a moći će da se kupe i na dan utakmice od 10 časova na biletarnici Hale sportova Ranko Žeravica po sledećim cenama:', 907),
(114, '2Cellos Koncert', 2000, 2500, '2cellos.jpg', 'Nakon što su proveli poslednjih deset godina zajedno kao 2CELLOS, objavili šest studijskih albuma, skupili milijarde strimova, nastupili na kultnim lokacijama širom sveta i prodali skoro milion karata za svoje električne nastupe uživo, duo Luka Šulić i HAUSER danas najavljuju sledeći deo svetske turneje i otkrivaju da će 2022. biti poslednja zajednička turneja pod nazivom 2CELLOS', 909);

-- --------------------------------------------------------

--
-- Table structure for table `kategorije`
--

CREATE TABLE `kategorije` (
  `idKategorija` int(30) NOT NULL,
  `naziv` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategorije`
--

INSERT INTO `kategorije` (`idKategorija`, `naziv`) VALUES
(907, 'Sport'),
(909, 'Koncerti'),
(910, 'Bioskop'),
(911, 'Pozoriste');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(50) NOT NULL,
  `ime` varchar(30) NOT NULL,
  `prezime` varchar(30) NOT NULL,
  `grad` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `lozinka` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `grad`, `email`, `username`, `lozinka`) VALUES
(10000, 'Marko', 'Markovic', 'Beograd', 'marko@gmail.rs', 'Marko', '123456'),
(10001, 'Stefan', 'Stefanovic', 'Novi Sad', 'Stefan@its.edu.rs', 'Stef', 'qwert'),
(10002, 'Petar', 'Pajovic', 'Nis', 'pero@gmail.rs', 'Perkan', '654321'),
(10003, 'Darko', 'Dragoviv', 'Zrenjanin', 'darko@gmail.rs', 'Draks', '123'),
(10004, 'Sanja', 'Savic', 'Subotica', 'sanja@gmail.rs', 'Sanjica', 'sanja1');

-- --------------------------------------------------------

--
-- Table structure for table `ulaznice`
--

CREATE TABLE `ulaznice` (
  `ulaznice_id` int(100) NOT NULL,
  `cena` int(100) NOT NULL,
  `kolicina` int(20) NOT NULL,
  `idKorisnik` int(50) NOT NULL,
  `idDogadjaj` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ulaznice`
--

INSERT INTO `ulaznice` (`ulaznice_id`, `cena`, `kolicina`, `idKorisnik`, `idDogadjaj`) VALUES
(1, 1600, 2, 10000, 106),
(2, 800, 2, 10000, 107),
(3, 900, 1, 10000, 104),
(4, 800, 2, 10000, 107),
(5, 400, 1, 10000, 107),
(6, 900, 1, 10000, 104),
(7, 800, 1, 10000, 106),
(8, 1800, 2, 10000, 104),
(9, 2400, 3, 10000, 106),
(10, 1800, 2, 10000, 104),
(11, 1400, 1, 10000, 108),
(12, 1800, 3, 10000, 109),
(13, 7200, 12, 10000, 109),
(14, 1800, 3, 10000, 109),
(15, 1800, 2, 10004, 104),
(16, 4200, 3, 10004, 108),
(17, 900, 1, 10000, 104),
(18, 1400, 1, 10000, 108),
(19, 1800, 3, 10000, 109);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `dogadjaj`
--
ALTER TABLE `dogadjaj`
  ADD PRIMARY KEY (`idDogadjaj`);

--
-- Indexes for table `kategorije`
--
ALTER TABLE `kategorije`
  ADD PRIMARY KEY (`idKategorija`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ulaznice`
--
ALTER TABLE `ulaznice`
  ADD PRIMARY KEY (`ulaznice_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dogadjaj`
--
ALTER TABLE `dogadjaj`
  MODIFY `idDogadjaj` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `kategorije`
--
ALTER TABLE `kategorije`
  MODIFY `idKategorija` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=913;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10006;

--
-- AUTO_INCREMENT for table `ulaznice`
--
ALTER TABLE `ulaznice`
  MODIFY `ulaznice_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
