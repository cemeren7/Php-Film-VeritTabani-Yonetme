-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 05 Nis 2025, 14:29:33
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `fılmler`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `fılm`
--

CREATE TABLE `fılm` (
  `Fılm_Id` int(11) NOT NULL,
  `Fılm_Adı` varchar(255) NOT NULL,
  `Tur` varchar(255) NOT NULL,
  `Ulke` varchar(255) NOT NULL,
  `Sure` text NOT NULL,
  `Puan` varchar(255) NOT NULL,
  `Dıl` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `fılm`
--

INSERT INTO `fılm` (`Fılm_Id`, `Fılm_Adı`, `Tur`, `Ulke`, `Sure`, `Puan`, `Dıl`) VALUES
(1, 'Esaretin Bedeli', 'Tarih', 'İngiltere', '150 dk', '9', 'İngilizce'),
(2, 'Kara Şövalye ', 'Aksiyon', 'Amerika', '150 Dk', '8', 'İngilizce'),
(3, 'Zor Ölüm', 'Aksiyon', 'Amerika', '130 dk', '6', 'İngilizce ');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `fılm`
--
ALTER TABLE `fılm`
  ADD PRIMARY KEY (`Fılm_Id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `fılm`
--
ALTER TABLE `fılm`
  MODIFY `Fılm_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
