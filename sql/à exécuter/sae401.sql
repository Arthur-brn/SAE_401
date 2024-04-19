-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 19 avr. 2024 à 08:02
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sae401`
--

-- --------------------------------------------------------

--
-- Structure de la table `actor`
--

CREATE TABLE `actor` (
  `ActorId` int(11) NOT NULL,
  `ActorName` varchar(100) NOT NULL,
  `ActorPicture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `author`
--

CREATE TABLE `author` (
  `AuthorId` int(11) NOT NULL,
  `AuthorName` varchar(100) NOT NULL,
  `AuthorPicture` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `book`
--

CREATE TABLE `book` (
  `BookId` int(11) NOT NULL,
  `BookTitle` varchar(50) NOT NULL,
  `AuthorId` int(11) NOT NULL,
  `BookEditor` varchar(50) NOT NULL,
  `BookStyle` varchar(50) NOT NULL,
  `BookPageNumber` int(11) NOT NULL,
  `BookEditionDate` int(11) NOT NULL,
  `BookLoanNumber` int(11) NOT NULL,
  `BookType` varchar(50) NOT NULL,
  `BookSummary` text NOT NULL,
  `IsBooked` tinyint(1) NOT NULL,
  `IsBorrowed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `book_booking`
--

CREATE TABLE `book_booking` (
  `BookingId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `BookId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `book_langage`
--

CREATE TABLE `book_langage` (
  `BLId` int(11) NOT NULL,
  `BookId` int(11) NOT NULL,
  `LangageId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `book_loan`
--

CREATE TABLE `book_loan` (
  `LoanId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `BookId` int(11) NOT NULL,
  `LoanDate` date NOT NULL,
  `ReturnDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `book_notice`
--

CREATE TABLE `book_notice` (
  `NoticeId` int(11) NOT NULL,
  `NoticeContent` text NOT NULL,
  `NoticeMark` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `BookId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `casting`
--

CREATE TABLE `casting` (
  `CastingId` int(11) NOT NULL,
  `ActorId` int(11) NOT NULL,
  `FilmId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

CREATE TABLE `film` (
  `FilmId` int(11) NOT NULL,
  `FilmName` varchar(50) NOT NULL,
  `FilmDuration` int(11) NOT NULL,
  `FilmDirector` varchar(50) NOT NULL,
  `FilmYear` int(11) NOT NULL,
  `FilmAgeLimit` int(11) NOT NULL,
  `FilmSummary` text NOT NULL,
  `FilmLoanNumber` int(11) NOT NULL,
  `IsBooked` tinyint(1) NOT NULL,
  `IsBorrowed` tinyint(1) NOT NULL,
  `FilmPicture` varchar(50) NOT NULL,
  `CopyNumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `film_booking`
--

CREATE TABLE `film_booking` (
  `BookingId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `FilmId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `film_langage`
--

CREATE TABLE `film_langage` (
  `FLId` int(11) NOT NULL,
  `FilmId` int(11) NOT NULL,
  `LangageId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `film_loan`
--

CREATE TABLE `film_loan` (
  `LoanId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `FilmId` int(11) NOT NULL,
  `LoanDate` date NOT NULL,
  `ReturnDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `film_notice`
--

CREATE TABLE `film_notice` (
  `NoticeId` int(11) NOT NULL,
  `NoticeContent` text NOT NULL,
  `NoticeMark` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `FilmId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `langage`
--

CREATE TABLE `langage` (
  `LangageId` int(11) NOT NULL,
  `LangageName` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `subtitle`
--

CREATE TABLE `subtitle` (
  `SubtitleId` int(11) NOT NULL,
  `FilmId` int(11) NOT NULL,
  `LangageId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `UserId` int(11) NOT NULL,
  `UserFirstName` varchar(30) NOT NULL,
  `UserLastName` varchar(30) NOT NULL,
  `UserEmail` varchar(50) NOT NULL,
  `UserPassword` varchar(100) NOT NULL,
  `UserAdress` varchar(50) NOT NULL,
  `UserBirthday` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `actor`
--
ALTER TABLE `actor`
  ADD PRIMARY KEY (`ActorId`);

--
-- Index pour la table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`AuthorId`);

--
-- Index pour la table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`BookId`),
  ADD KEY `AuthorId` (`AuthorId`);

--
-- Index pour la table `book_booking`
--
ALTER TABLE `book_booking`
  ADD PRIMARY KEY (`BookingId`),
  ADD KEY `BookId` (`BookId`),
  ADD KEY `UserId` (`UserId`);

--
-- Index pour la table `book_langage`
--
ALTER TABLE `book_langage`
  ADD PRIMARY KEY (`BLId`),
  ADD KEY `BookId` (`BookId`),
  ADD KEY `LangageId` (`LangageId`);

--
-- Index pour la table `book_loan`
--
ALTER TABLE `book_loan`
  ADD PRIMARY KEY (`LoanId`),
  ADD KEY `BookId` (`BookId`),
  ADD KEY `UserId` (`UserId`);

--
-- Index pour la table `book_notice`
--
ALTER TABLE `book_notice`
  ADD PRIMARY KEY (`NoticeId`),
  ADD KEY `BookId` (`BookId`),
  ADD KEY `UserId` (`UserId`);

--
-- Index pour la table `casting`
--
ALTER TABLE `casting`
  ADD PRIMARY KEY (`CastingId`),
  ADD KEY `ActorId` (`ActorId`),
  ADD KEY `FilmId` (`FilmId`);

--
-- Index pour la table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`FilmId`);

--
-- Index pour la table `film_booking`
--
ALTER TABLE `film_booking`
  ADD PRIMARY KEY (`BookingId`),
  ADD KEY `FilmId` (`FilmId`),
  ADD KEY `UserId` (`UserId`);

--
-- Index pour la table `film_langage`
--
ALTER TABLE `film_langage`
  ADD PRIMARY KEY (`FLId`),
  ADD KEY `FilmId` (`FilmId`),
  ADD KEY `LangageId` (`LangageId`);

--
-- Index pour la table `film_loan`
--
ALTER TABLE `film_loan`
  ADD PRIMARY KEY (`LoanId`);

--
-- Index pour la table `film_notice`
--
ALTER TABLE `film_notice`
  ADD PRIMARY KEY (`NoticeId`),
  ADD KEY `FilmId` (`FilmId`),
  ADD KEY `UserId` (`UserId`);

--
-- Index pour la table `langage`
--
ALTER TABLE `langage`
  ADD PRIMARY KEY (`LangageId`);

--
-- Index pour la table `subtitle`
--
ALTER TABLE `subtitle`
  ADD PRIMARY KEY (`SubtitleId`),
  ADD KEY `FilmId` (`FilmId`),
  ADD KEY `LangageId` (`LangageId`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `actor`
--
ALTER TABLE `actor`
  MODIFY `ActorId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `author`
--
ALTER TABLE `author`
  MODIFY `AuthorId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `book`
--
ALTER TABLE `book`
  MODIFY `BookId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `book_booking`
--
ALTER TABLE `book_booking`
  MODIFY `BookingId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `book_langage`
--
ALTER TABLE `book_langage`
  MODIFY `BLId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `book_loan`
--
ALTER TABLE `book_loan`
  MODIFY `LoanId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `book_notice`
--
ALTER TABLE `book_notice`
  MODIFY `NoticeId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `casting`
--
ALTER TABLE `casting`
  MODIFY `CastingId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `film`
--
ALTER TABLE `film`
  MODIFY `FilmId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `film_booking`
--
ALTER TABLE `film_booking`
  MODIFY `BookingId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `film_langage`
--
ALTER TABLE `film_langage`
  MODIFY `FLId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `film_loan`
--
ALTER TABLE `film_loan`
  MODIFY `LoanId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `film_notice`
--
ALTER TABLE `film_notice`
  MODIFY `NoticeId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `langage`
--
ALTER TABLE `langage`
  MODIFY `LangageId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `subtitle`
--
ALTER TABLE `subtitle`
  MODIFY `SubtitleId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`AuthorId`) REFERENCES `author` (`AuthorId`);

--
-- Contraintes pour la table `book_booking`
--
ALTER TABLE `book_booking`
  ADD CONSTRAINT `book_booking_ibfk_1` FOREIGN KEY (`BookId`) REFERENCES `book` (`BookId`),
  ADD CONSTRAINT `book_booking_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserId`);

--
-- Contraintes pour la table `book_langage`
--
ALTER TABLE `book_langage`
  ADD CONSTRAINT `book_langage_ibfk_1` FOREIGN KEY (`BookId`) REFERENCES `book` (`BookId`),
  ADD CONSTRAINT `book_langage_ibfk_2` FOREIGN KEY (`LangageId`) REFERENCES `langage` (`LangageId`);

--
-- Contraintes pour la table `book_loan`
--
ALTER TABLE `book_loan`
  ADD CONSTRAINT `book_loan_ibfk_1` FOREIGN KEY (`BookId`) REFERENCES `book` (`BookId`),
  ADD CONSTRAINT `book_loan_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserId`);

--
-- Contraintes pour la table `book_notice`
--
ALTER TABLE `book_notice`
  ADD CONSTRAINT `book_notice_ibfk_1` FOREIGN KEY (`BookId`) REFERENCES `book` (`BookId`),
  ADD CONSTRAINT `book_notice_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserId`);

--
-- Contraintes pour la table `casting`
--
ALTER TABLE `casting`
  ADD CONSTRAINT `casting_ibfk_1` FOREIGN KEY (`ActorId`) REFERENCES `actor` (`ActorId`),
  ADD CONSTRAINT `casting_ibfk_2` FOREIGN KEY (`FilmId`) REFERENCES `film` (`FilmId`);

--
-- Contraintes pour la table `film_booking`
--
ALTER TABLE `film_booking`
  ADD CONSTRAINT `film_booking_ibfk_1` FOREIGN KEY (`FilmId`) REFERENCES `film` (`FilmId`),
  ADD CONSTRAINT `film_booking_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserId`);

--
-- Contraintes pour la table `film_langage`
--
ALTER TABLE `film_langage`
  ADD CONSTRAINT `film_langage_ibfk_1` FOREIGN KEY (`FilmId`) REFERENCES `film` (`FilmId`),
  ADD CONSTRAINT `film_langage_ibfk_2` FOREIGN KEY (`LangageId`) REFERENCES `langage` (`LangageId`);

--
-- Contraintes pour la table `film_notice`
--
ALTER TABLE `film_notice`
  ADD CONSTRAINT `film_notice_ibfk_1` FOREIGN KEY (`FilmId`) REFERENCES `film` (`FilmId`),
  ADD CONSTRAINT `film_notice_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserId`);

--
-- Contraintes pour la table `subtitle`
--
ALTER TABLE `subtitle`
  ADD CONSTRAINT `subtitle_ibfk_1` FOREIGN KEY (`FilmId`) REFERENCES `film` (`FilmId`),
  ADD CONSTRAINT `subtitle_ibfk_2` FOREIGN KEY (`LangageId`) REFERENCES `langage` (`LangageId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
