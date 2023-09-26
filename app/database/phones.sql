-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 26 sep 2023 om 14:03
-- Serverversie: 10.4.28-MariaDB
-- PHP-versie: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phones`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `applications`
--

CREATE TABLE `applications` (
  `applicationId` varchar(4) NOT NULL,
  `applicationCompanyId` varchar(4) NOT NULL,
  `applicationName` varchar(255) NOT NULL,
  `applicationUsage` varchar(100) NOT NULL,
  `applicationDateRelease` varchar(10) NOT NULL,
  `applicationRating` decimal(2,1) NOT NULL,
  `applicationPrice` decimal(6,2) NOT NULL,
  `applicationIsActive` tinyint(4) NOT NULL DEFAULT 1,
  `applicationDescription` text DEFAULT NULL,
  `applicationCreateDate` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `applications`
--

INSERT INTO `applications` (`applicationId`, `applicationCompanyId`, `applicationName`, `applicationUsage`, `applicationDateRelease`, `applicationRating`, `applicationPrice`, `applicationIsActive`, `applicationDescription`, `applicationCreateDate`) VALUES
('1', '1', 'Clash of clans', '100 MB', '21-09-2023', 3.0, 9.99, 1, NULL, '012982'),
('Objh', '1', 'Minecraft', '500 GB', '2023-09-23', 9.9, 20.00, 1, NULL, '1695304815');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `applicationshasdevelopers`
--

CREATE TABLE `applicationshasdevelopers` (
  `developerId` varchar(4) NOT NULL,
  `applicationId` varchar(4) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `applicationshasdevelopers`
--

INSERT INTO `applicationshasdevelopers` (`developerId`, `applicationId`, `isActive`) VALUES
('1', '1', 1),
('2', '1', 1),
('3', '1', 1),
('Glkq', '1', 1),
('Yz5d', '1', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `companies`
--

CREATE TABLE `companies` (
  `companyId` varchar(4) NOT NULL,
  `companyName` varchar(255) NOT NULL,
  `companyPhone` varchar(10) NOT NULL,
  `companyEmail` varchar(255) NOT NULL,
  `companyCity` varchar(255) NOT NULL,
  `companyIsActive` tinyint(4) NOT NULL DEFAULT 1,
  `companyDescription` text DEFAULT NULL,
  `companyCreateDate` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `companies`
--

INSERT INTO `companies` (`companyId`, `companyName`, `companyPhone`, `companyEmail`, `companyCity`, `companyIsActive`, `companyDescription`, `companyCreateDate`) VALUES
('1', 'mojang', '068187492', 'mojang@gmail.com', 'Utrecht', 1, NULL, '212004'),
('1xZK', 'werkt', '83932929', 'test123@gmail.com', 'wajow', 1, NULL, ''),
('2', 'Ubisoft', '06737347', 'ubisoft@gmail.com', 'Utrecht', 1, NULL, '78372'),
('3', 'Test', '0672891', 'test@gmail.com', 'Utrecht', 0, NULL, '212004'),
('Mz0J', 'test', '83932929', 'test123@gmail.com', 'wajow', 1, NULL, ''),
('YcvW', 'manm', '9695990', 'man@gmail.com', 'utrecht', 1, NULL, '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `contacts`
--

CREATE TABLE `contacts` (
  `contactId` varchar(4) NOT NULL,
  `contactPhoneId` varchar(4) NOT NULL,
  `contactFirstName` varchar(255) NOT NULL,
  `contactLastName` varchar(255) NOT NULL,
  `contactEmail` varchar(255) NOT NULL,
  `contactNumber` varchar(15) NOT NULL,
  `contactBirthdayDate` varchar(10) NOT NULL,
  `contactIsActive` tinyint(4) NOT NULL DEFAULT 1,
  `contactDescription` text DEFAULT NULL,
  `contactCreateDate` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `contacts`
--

INSERT INTO `contacts` (`contactId`, `contactPhoneId`, `contactFirstName`, `contactLastName`, `contactEmail`, `contactNumber`, `contactBirthdayDate`, `contactIsActive`, `contactDescription`, `contactCreateDate`) VALUES
('1', 'tOvb', 'Philip', 'Hage', 'philip@hage.cc', '06817723', '24-06-2003', 1, NULL, '35325'),
('2', 'xQiB', 'Peter', 'Klaassen', 'peter@gmail.com', '0688233', '10-20-', 1, NULL, '432532'),
('7F7C', 'xQiB', 'Ben', 'Koper', 'ben@gmail.com', '068186793', '20-8-2', 1, NULL, '1695046249'),
('AjKo', 'tOvb', 'Henkie', 'T', 'henkie@gmail.com', '06838428', '240620', 0, NULL, '1695721959'),
('nuJ3', 'pfrc', 'tweede', 'contact', 'tweede@gmail.com', '068182273', '20-10-', 1, NULL, '1695106502'),
('PzQv', 'xQiB', 'Werkt', 'dit', 'werkt@gmail.com', '0692818', '19-20-', 1, NULL, '1695106087'),
('V9OV', 'S7Cf', 'Jatoch', 'Papa', 'papa@gmail.com', '069818', '20-10-', 1, NULL, '1695719951'),
('VjkC', 'tOvb', 'tarik', 'z', 'tarik@gmail.com', '06818943', '2023-09-14', 1, NULL, '1695722939'),
('wJeJ', 'pfrc', 'eerste', 'Contact', 'eerste@gmail.com', '068717', '20-10-', 1, NULL, '1695106465');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `developers`
--

CREATE TABLE `developers` (
  `developerId` varchar(4) NOT NULL,
  `developerCompanyId` varchar(4) NOT NULL,
  `developerFirstName` varchar(255) NOT NULL,
  `developerLastName` varchar(255) NOT NULL,
  `developerIsActive` tinyint(4) NOT NULL DEFAULT 1,
  `developerDescription` text DEFAULT NULL,
  `developerCreateDate` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `developers`
--

INSERT INTO `developers` (`developerId`, `developerCompanyId`, `developerFirstName`, `developerLastName`, `developerIsActive`, `developerDescription`, `developerCreateDate`) VALUES
('0M42', '1', 'Philip', 'peter', 0, NULL, '1695302714'),
('1', '1', 'hij werkt', 'doet', 0, NULL, '78372'),
('2', '1', 'Peter', 'Pannekoek', 0, NULL, '78372'),
('3', '1', 'Romano', 'Wajow', 1, NULL, '78372'),
('Glkq', 'Mz0J', 'yoo', 'man', 1, NULL, '1695367545'),
('Yz5d', '1', 'Wajow', 'jezus', 1, NULL, '1695305596');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `manufacturers`
--

CREATE TABLE `manufacturers` (
  `manufacturerId` varchar(4) NOT NULL,
  `manufactureName` varchar(255) NOT NULL,
  `manufacturePhoneNumber` varchar(255) NOT NULL,
  `manufactureEmail` varchar(255) NOT NULL,
  `manufactureZipCode` varchar(100) NOT NULL,
  `manufactureCity` varchar(100) NOT NULL,
  `manufactureIsActive` tinyint(4) NOT NULL DEFAULT 1,
  `manufactureDescription` text DEFAULT NULL,
  `manufactureCreateDate` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `manufacturers`
--

INSERT INTO `manufacturers` (`manufacturerId`, `manufactureName`, `manufacturePhoneNumber`, `manufactureEmail`, `manufactureZipCode`, `manufactureCity`, `manufactureIsActive`, `manufactureDescription`, `manufactureCreateDate`) VALUES
('1', 'Philip', '0681867393', 'philip@hage.cc', '3992BK', 'Joeee', 1, NULL, '10-12-10'),
('2', 'je moeder', '06-818672346', 'doei@gmail.com', '3021BJ', 'Houten', 1, NULL, '10-20-30'),
('ErC7', 'deze', '068171671', 'wajoiw@gmail.com', '2929BJ', 'Utrecht', 1, NULL, ''),
('FeNn', 'man', '0681867393', 'man@gmail.com', '3992HA', 'Houten', 1, NULL, '1694694639'),
('MjWT', 'time', '0681867393', 'time@gmail.com', '3399BJ', 'Houten', 1, NULL, '1694694124'),
('Q7Vm', 'je moeder', '0681867393', 'werkt@gmail.com', '11111111', 'Houten', 0, NULL, '1695719801'),
('TjfA', 'Dat', '9553020', 'dit@gmail.com', '2711JK', 'Houten', 1, NULL, '1694699164');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `media`
--

CREATE TABLE `media` (
  `mediaId` varchar(4) NOT NULL,
  `mediaPhoneId` varchar(4) NOT NULL,
  `mediaType` varchar(100) NOT NULL,
  `mediaPath` varchar(255) NOT NULL,
  `mediaCreate` varchar(10) NOT NULL,
  `mediaIsActive` tinyint(4) NOT NULL DEFAULT 1,
  `mediaDescription` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `media`
--

INSERT INTO `media` (`mediaId`, `mediaPhoneId`, `mediaType`, `mediaPath`, `mediaCreate`, `mediaIsActive`, `mediaDescription`) VALUES
('1', 'xQiB', 'Mooi', 'path', '5r3324', 1, NULL),
('PKbb', 'tOvb', 'Geen', 'Mooi Ding', '1695724073', 1, NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `phones`
--

CREATE TABLE `phones` (
  `phoneId` varchar(4) NOT NULL,
  `phoneManufactureId` varchar(4) NOT NULL,
  `phoneName` varchar(50) NOT NULL,
  `phoneIsActive` tinyint(4) NOT NULL DEFAULT 1,
  `phoneDescription` text DEFAULT NULL,
  `phoneCreateDate` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `phones`
--

INSERT INTO `phones` (`phoneId`, `phoneManufactureId`, `phoneName`, `phoneIsActive`, `phoneDescription`, `phoneCreateDate`) VALUES
('1', '1', 'flauw', 1, NULL, '132010'),
('2', '2', 'galaxy7', 1, NULL, '25423'),
('3', 'FeNn', 'iphone 13', 0, NULL, '132010'),
('6', 'TjfA', 'iphone 4', 0, NULL, '132010'),
('7', 'TjfA', 'apple a7', 1, NULL, '132010'),
('8Cbr', 'TjfA', 'wauwie', 1, NULL, '1694772591'),
('9', 'MjWT', 'Samsung 10', 1, NULL, '132010'),
('BZ2M', 'TjfA', 'whatarethose', 1, NULL, '1694781727'),
('c9a4', '2', 'gave telefoon', 1, NULL, '1695719920'),
('IZKN', 'TjfA', 'AYO', 0, NULL, '1694780509'),
('pfrc', 'ErC7', 'Flip Flop 2', 1, NULL, '1695106346'),
('S7Cf', '2', 'kutje', 1, NULL, '1695719933'),
('tOvb', 'TjfA', 'Mooi telefoon', 1, NULL, '1694772549'),
('xQiB', 'TjfA', 'kaas telefoon', 1, NULL, '1694772437');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `specifications`
--

CREATE TABLE `specifications` (
  `specificationId` varchar(4) NOT NULL,
  `specificationPhoneId` varchar(4) NOT NULL,
  `specificationName` varchar(100) NOT NULL,
  `specificationValue` varchar(255) NOT NULL,
  `specificationIsActive` tinyint(4) NOT NULL DEFAULT 1,
  `specificationDescription` text DEFAULT NULL,
  `specificationCreateDate` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `specifications`
--

INSERT INTO `specifications` (`specificationId`, `specificationPhoneId`, `specificationName`, `specificationValue`, `specificationIsActive`, `specificationDescription`, `specificationCreateDate`) VALUES
('1', 'xQiB', 'Merk', 'Iphone', 1, NULL, ''),
('2', 'xQiB', 'Color', 'Yellow', 1, NULL, ''),
('2OVc', 'S7Cf', 'vechten', 'dood', 1, NULL, '1695719965'),
('aPCp', 'xQiB', 'stuur', 'deze', 1, NULL, '1695106618'),
('k3zm', 'xQiB', 'dood', 'ziek', 1, NULL, '1695048956'),
('sEtS', 'tOvb', 'Merk', 'Samsung', 1, NULL, '1695723266'),
('uhRa', 'xQiB', 'vechten', 'door', 0, NULL, '1695105733'),
('Vs1l', 'xQiB', 'stink', 'Hoeren', 1, NULL, '1695048903');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `stores`
--

CREATE TABLE `stores` (
  `storeId` varchar(4) NOT NULL,
  `storeName` varchar(255) NOT NULL,
  `storePhone` varchar(10) NOT NULL,
  `storeEmail` varchar(255) NOT NULL,
  `storeZipCode` varchar(8) NOT NULL,
  `storeCity` varchar(255) NOT NULL,
  `storeIsActive` tinyint(4) NOT NULL DEFAULT 1,
  `storeDescription` text DEFAULT NULL,
  `storeCreateDate` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `stores`
--

INSERT INTO `stores` (`storeId`, `storeName`, `storePhone`, `storeEmail`, `storeZipCode`, `storeCity`, `storeIsActive`, `storeDescription`, `storeCreateDate`) VALUES
('AHDF', 'Mediamarkt', '0683832', 'mediamarkt@outlook.com', '3992Bj', 'Houten', 1, NULL, '48848214'),
('fgR7', 'Kruidvat', '8392902', 'kruidvat@gmail.com', '2910JK', 'Houten', 1, NULL, '1694787177'),
('safs', 'Plus', '0683832', 'plus@gmail.com', '2991HJ', 'Houten', 1, NULL, '48848'),
('t99n', 'aplicatie', '0758834', 'applicatie@gmail.com', '3902HJ', 'Houten', 1, NULL, '1695135394'),
('Vrg1', 'Appie', '8948382', 'appie@gmail.com', '3929JK', 'Houten', 1, NULL, '1694787203');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `storeshasphones`
--

CREATE TABLE `storeshasphones` (
  `storeId` varchar(4) NOT NULL,
  `phoneId` varchar(4) NOT NULL,
  `phonePrice` decimal(7,2) NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `storeshasphones`
--

INSERT INTO `storeshasphones` (`storeId`, `phoneId`, `phonePrice`, `IsActive`) VALUES
('AHDF', '2', 30.00, 1),
('AHDF', '7', 10.00, 1),
('AHDF', '8Cbr', 1000.00, 1),
('AHDF', 'BZ2M', 2000.00, 1),
('AHDF', 'IZKN', 16.00, 1),
('AHDF', 'pfrc', 15.00, 0),
('AHDF', 'xQiB', 15.00, 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`applicationId`),
  ADD KEY `applicationCompanyId` (`applicationCompanyId`);

--
-- Indexen voor tabel `applicationshasdevelopers`
--
ALTER TABLE `applicationshasdevelopers`
  ADD PRIMARY KEY (`developerId`,`applicationId`),
  ADD KEY `developerId` (`developerId`),
  ADD KEY `applicationId` (`applicationId`);

--
-- Indexen voor tabel `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`companyId`);

--
-- Indexen voor tabel `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contactId`),
  ADD KEY `contactPhoneId` (`contactPhoneId`);

--
-- Indexen voor tabel `developers`
--
ALTER TABLE `developers`
  ADD PRIMARY KEY (`developerId`),
  ADD KEY `developerCompanyId` (`developerCompanyId`);

--
-- Indexen voor tabel `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`manufacturerId`);

--
-- Indexen voor tabel `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`mediaId`),
  ADD KEY `mediaPhoneId` (`mediaPhoneId`);

--
-- Indexen voor tabel `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`phoneId`),
  ADD KEY `phoneManufactureId` (`phoneManufactureId`);

--
-- Indexen voor tabel `specifications`
--
ALTER TABLE `specifications`
  ADD PRIMARY KEY (`specificationId`),
  ADD KEY `specificationPhoneId` (`specificationPhoneId`);

--
-- Indexen voor tabel `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`storeId`);

--
-- Indexen voor tabel `storeshasphones`
--
ALTER TABLE `storeshasphones`
  ADD PRIMARY KEY (`storeId`,`phoneId`),
  ADD KEY `storeHasPhonesPhoneId` (`phoneId`),
  ADD KEY `storeHasPhonesStoreId` (`storeId`);

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applicationCompanyId` FOREIGN KEY (`applicationCompanyId`) REFERENCES `companies` (`companyId`);

--
-- Beperkingen voor tabel `applicationshasdevelopers`
--
ALTER TABLE `applicationshasdevelopers`
  ADD CONSTRAINT `applicationId` FOREIGN KEY (`applicationId`) REFERENCES `applications` (`applicationId`),
  ADD CONSTRAINT `developerId` FOREIGN KEY (`developerId`) REFERENCES `developers` (`developerId`);

--
-- Beperkingen voor tabel `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contactPhoneId` FOREIGN KEY (`contactPhoneId`) REFERENCES `phones` (`phoneId`);

--
-- Beperkingen voor tabel `developers`
--
ALTER TABLE `developers`
  ADD CONSTRAINT `developerCompanyId` FOREIGN KEY (`developerCompanyId`) REFERENCES `companies` (`companyId`) ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `mediaPhoneId` FOREIGN KEY (`mediaPhoneId`) REFERENCES `phones` (`phoneId`);

--
-- Beperkingen voor tabel `phones`
--
ALTER TABLE `phones`
  ADD CONSTRAINT `phoneManufactureId` FOREIGN KEY (`phoneManufactureId`) REFERENCES `manufacturers` (`manufacturerId`);

--
-- Beperkingen voor tabel `specifications`
--
ALTER TABLE `specifications`
  ADD CONSTRAINT `specificationPhoneId` FOREIGN KEY (`specificationPhoneId`) REFERENCES `phones` (`phoneId`);

--
-- Beperkingen voor tabel `storeshasphones`
--
ALTER TABLE `storeshasphones`
  ADD CONSTRAINT `storeHasPhonesPhoneId` FOREIGN KEY (`phoneId`) REFERENCES `phones` (`phoneId`),
  ADD CONSTRAINT `storeHasPhonesStoreId` FOREIGN KEY (`storeId`) REFERENCES `stores` (`storeId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
