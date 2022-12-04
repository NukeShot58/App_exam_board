-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 04 Gru 2022, 22:03
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `app`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `egzamin`
--

CREATE TABLE `egzamin` (
  `egzaminID` int(11) NOT NULL,
  `dataGodz` datetime DEFAULT NULL,
  `sala` varchar(10) DEFAULT NULL,
  `kwalifikacja` varchar(10) NOT NULL,
  `typ` tinytext NOT NULL,
  `techNauID` int(11) DEFAULT NULL,
  `zew_nauczyciel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `egzamin`
--

INSERT INTO `egzamin` (`egzaminID`, `dataGodz`, `sala`, `kwalifikacja`, `typ`, `techNauID`, `zew_nauczyciel`) VALUES
(3, NULL, NULL, 'inf.03', 'w', NULL, NULL),
(4, NULL, NULL, 'inf.03', 'w', NULL, NULL),
(5, NULL, NULL, 'inf.02', 'dk', NULL, NULL),
(6, NULL, NULL, 'inf.03', 'd', NULL, NULL),
(7, NULL, NULL, 'inf.03', 'd', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `komisja`
--

CREATE TABLE `komisja` (
  `egzaminID` int(11) NOT NULL,
  `nauczycielID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `nauczyciele`
--

CREATE TABLE `nauczyciele` (
  `nauczyciel_ID` int(11) NOT NULL,
  `imie` varchar(45) NOT NULL,
  `nazwisko` varchar(45) NOT NULL,
  `nr_tel` int(9) UNSIGNED NOT NULL,
  `id_przed` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `przedmiot`
--

CREATE TABLE `przedmiot` (
  `nazwaPrzed` varchar(45) NOT NULL,
  `zawdowy` text NOT NULL DEFAULT '"nie"'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `przedmiot`
--

INSERT INTO `przedmiot` (`nazwaPrzed`, `zawdowy`) VALUES
('Programowanie obiektowe', 'tak');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(45) NOT NULL,
  `haslo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `login`, `haslo`) VALUES
(1, 'test', '$2y$10$Gfj7FgO9V9p8oolTYZb.Vuu0eWoFkhx8/nwDWTnzXVbOIyMEJwdiG');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zew_nauczyciel`
--

CREATE TABLE `zew_nauczyciel` (
  `zew_nau_ID` int(11) NOT NULL,
  `imie` varchar(45) NOT NULL,
  `nazwisko` varchar(45) NOT NULL,
  `rola` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `egzamin`
--
ALTER TABLE `egzamin`
  ADD PRIMARY KEY (`egzaminID`),
  ADD KEY `techNauID` (`techNauID`);

--
-- Indeksy dla tabeli `komisja`
--
ALTER TABLE `komisja`
  ADD PRIMARY KEY (`egzaminID`);

--
-- Indeksy dla tabeli `nauczyciele`
--
ALTER TABLE `nauczyciele`
  ADD PRIMARY KEY (`nauczyciel_ID`),
  ADD KEY `id_przed` (`id_przed`);

--
-- Indeksy dla tabeli `przedmiot`
--
ALTER TABLE `przedmiot`
  ADD PRIMARY KEY (`nazwaPrzed`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `zew_nauczyciel`
--
ALTER TABLE `zew_nauczyciel`
  ADD PRIMARY KEY (`zew_nau_ID`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `egzamin`
--
ALTER TABLE `egzamin`
  MODIFY `egzaminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT dla tabeli `nauczyciele`
--
ALTER TABLE `nauczyciele`
  MODIFY `nauczyciel_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `zew_nauczyciel`
--
ALTER TABLE `zew_nauczyciel`
  MODIFY `zew_nau_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `egzamin`
--
ALTER TABLE `egzamin`
  ADD CONSTRAINT `egzamin_ibfk_1` FOREIGN KEY (`techNauID`) REFERENCES `nauczyciele` (`nauczyciel_ID`);

--
-- Ograniczenia dla tabeli `nauczyciele`
--
ALTER TABLE `nauczyciele`
  ADD CONSTRAINT `nauczyciele_ibfk_1` FOREIGN KEY (`id_przed`) REFERENCES `przedmiot` (`nazwaPrzed`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
