-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Dec 05. 12:53
-- Kiszolgáló verziója: 10.4.28-MariaDB
-- PHP verzió: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `kornyezettudatos`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `energy_consumption`
--

CREATE TABLE `energy_consumption` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `consumed_quantity` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `energy_consumption`
--

INSERT INTO `energy_consumption` (`id`, `user_id`, `date`, `consumed_quantity`) VALUES
(11, 1, '2024-12-01 08:00:00', 120.5),
(12, 1, '2024-12-01 18:00:00', 95.7),
(13, 2, '2024-12-01 09:30:00', 200),
(14, 3, '2024-12-02 10:15:00', 150.25),
(15, 2, '2024-12-02 15:45:00', 180);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `energy_consumption_type`
--

CREATE TABLE `energy_consumption_type` (
  `id` int(11) NOT NULL,
  `energy_consumption_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'John Doe', 'john.doe@example.com', 'password123'),
(2, 'Jane Smith', 'jane.smith@example.com', 'password456'),
(3, 'Bob Johnson', 'bob.johnson@example.com', 'password789');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `waste_tracking`
--

CREATE TABLE `waste_tracking` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `quantity` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `waste_tracking`
--

INSERT INTO `waste_tracking` (`id`, `user_id`, `date`, `quantity`) VALUES
(1, 1, '2024-12-01 10:00:00', 5.5),
(2, 2, '2024-12-01 11:00:00', 3.2),
(3, 3, '2024-12-02 09:00:00', 7.1),
(4, 1, '2024-12-02 14:00:00', 8.3),
(5, 2, '2024-12-02 17:00:00', 4);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `waste_type`
--

CREATE TABLE `waste_type` (
  `id` int(11) NOT NULL,
  `waste_tracking_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `recycled` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `waste_type`
--

INSERT INTO `waste_type` (`id`, `waste_tracking_id`, `user_id`, `unit`, `recycled`) VALUES
(11, 1, 1, 'Papír', 1),
(12, 2, 2, 'Műanyag', 1),
(13, 3, 3, 'Üveg', 1),
(14, 4, 1, 'Fém', 0),
(15, 5, 2, 'Szerves hulladék', 1);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `energy_consumption`
--
ALTER TABLE `energy_consumption`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- A tábla indexei `energy_consumption_type`
--
ALTER TABLE `energy_consumption_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `energy_consumption_id` (`energy_consumption_id`),
  ADD KEY `user_id` (`user_id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `waste_tracking`
--
ALTER TABLE `waste_tracking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- A tábla indexei `waste_type`
--
ALTER TABLE `waste_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `waste_tracking_id` (`waste_tracking_id`),
  ADD KEY `user_id` (`user_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `energy_consumption`
--
ALTER TABLE `energy_consumption`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT a táblához `energy_consumption_type`
--
ALTER TABLE `energy_consumption_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `waste_tracking`
--
ALTER TABLE `waste_tracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `waste_type`
--
ALTER TABLE `waste_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `energy_consumption`
--
ALTER TABLE `energy_consumption`
  ADD CONSTRAINT `energy_consumption_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Megkötések a táblához `energy_consumption_type`
--
ALTER TABLE `energy_consumption_type`
  ADD CONSTRAINT `energy_consumption_type_ibfk_1` FOREIGN KEY (`energy_consumption_id`) REFERENCES `energy_consumption` (`id`),
  ADD CONSTRAINT `energy_consumption_type_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Megkötések a táblához `waste_tracking`
--
ALTER TABLE `waste_tracking`
  ADD CONSTRAINT `waste_tracking_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Megkötések a táblához `waste_type`
--
ALTER TABLE `waste_type`
  ADD CONSTRAINT `waste_type_ibfk_1` FOREIGN KEY (`waste_tracking_id`) REFERENCES `waste_tracking` (`id`),
  ADD CONSTRAINT `waste_type_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
