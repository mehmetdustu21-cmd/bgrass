-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 16 Eki 2025, 00:12:00
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
-- Veritabanı: `yenibir`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `banned`
--

CREATE TABLE `banned` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `banned_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `binlist`
--

CREATE TABLE `binlist` (
  `bin` int(11) NOT NULL DEFAULT 0,
  `banka_kodu` int(11) DEFAULT NULL,
  `banka_adi` varchar(100) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `sub_type` varchar(50) DEFAULT NULL,
  `virtual` varchar(50) DEFAULT NULL,
  `prepaid` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `binlist`
--

INSERT INTO `binlist` (`bin`, `banka_kodu`, `banka_adi`, `type`, `sub_type`, `virtual`, `prepaid`) VALUES
(413226, 10, 'T.C. ZİRAAT BANKASI A.Ş.', 'VISA', 'PLATINUM', '', ''),
(444676, 10, 'T.C. ZİRAAT BANKASI A.Ş.', 'VISA', 'CLASSIC', '', ''),
(444677, 10, 'T.C. ZİRAAT BANKASI A.Ş.', 'VISA', 'GOLD', '', ''),
(444678, 10, 'T.C. ZİRAAT BANKASI A.Ş.', 'VISA', 'PLATINUM', '', ''),
(453955, 10, 'T.C. ZİRAAT BANKASI A.Ş.', 'VISA', ' CLASSIC', '', ''),
(453956, 10, 'T.C. ZİRAAT BANKASI A.Ş.', 'VISA', ' GOLD', '', ''),
(454671, 10, 'T.C. ZİRAAT BANKASI A.Ş.', 'VISA', ' CLASSIC', '', ''),
(454672, 10, 'T.C. ZİRAAT BANKASI A.Ş.', 'VISA', ' CLASSIC', '', ''),
(454673, 10, 'T.C. ZİRAAT BANKASI A.Ş.', 'VISA', ' BUSINESS', '', ''),
(454674, 10, 'T.C. ZİRAAT BANKASI A.Ş.', 'VISA', ' GOLD', '', ''),
(454894, 10, 'T.C. ZİRAAT BANKASI A.Ş.', 'VISA', ' CLASSIC', '', ''),
(540130, 10, 'T.C. ZİRAAT BANKASI A.Ş.', 'MASTERCARD', ' CLASSIC', '', ''),
(540134, 10, 'T.C. ZİRAAT BANKASI A.Ş.', 'MASTERCARD', ' GOLD', '', ''),
(541001, 10, 'T.C. ZİRAAT BANKASI A.Ş.', 'MASTERCARD', ' CLASSIC', '', ''),
(541033, 10, 'T.C. ZİRAAT BANKASI A.Ş.', 'MASTERCARD', ' GOLD', '', ''),
(542374, 10, 'T.C. ZİRAAT BANKASI A.Ş.', 'MASTERCARD', ' CLASSIC', '', ''),
(547287, 10, 'T.C. ZİRAAT BANKASI A.Ş.', 'MASTERCARD', ' BUSINESS', '', ''),
(415514, 12, 'T. HALK BANKASI A.Ş.', 'VISA', 'PLATINUM', '', ''),
(492094, 12, 'T. HALK BANKASI A.Ş.', 'VISA', 'GOLD', '', ''),
(492095, 12, 'T. HALK BANKASI A.Ş.', 'VISA', 'CLASSIC', '', ''),
(498852, 12, 'T. HALK BANKASI A.Ş.', 'VISA', 'BUSINESS', '', ''),
(521378, 12, 'T. HALK BANKASI A.Ş.', 'MASTERCARD', 'PLATINUM', '', ''),
(540435, 12, 'T. HALK BANKASI A.Ş.', 'MASTERCARD', 'GOLD', '', ''),
(543081, 12, 'T. HALK BANKASI A.Ş.', 'MASTERCARD', 'CLASSIC', '', ''),
(552879, 12, 'T. HALK BANKASI A.Ş.', 'MASTERCARD', 'BUSINESS', '', ''),
(510056, 12, 'T. HALK BANKASI A.Ş.', 'MASTERCARD', 'CLASSIC', 'virtual', ''),
(402940, 15, 'T. VAKIFLAR BANKASI T.A.O.', 'VISA', 'CLASSIC', '', ''),
(409084, 15, 'T. VAKIFLAR BANKASI T.A.O.', 'VISA', 'CLASSIC', '', ''),
(411724, 15, 'T. VAKIFLAR BANKASI T.A.O.', 'VISA', 'CLASSIC', '', ''),
(411942, 15, 'T. VAKIFLAR BANKASI T.A.O.', 'VISA', 'CLASSIC', '', ''),
(411943, 15, 'T. VAKIFLAR BANKASI T.A.O.', 'VISA', 'CLASSIC', '', ''),
(411944, 15, 'T. VAKIFLAR BANKASI T.A.O.', 'VISA', 'CLASSIC', '', ''),
(411979, 15, 'T. VAKIFLAR BANKASI T.A.O.', 'VISA', 'PLATINUM', '', ''),
(415792, 15, 'T. VAKIFLAR BANKASI T.A.O.', 'VISA', 'CLASSIC', '', ''),
(416757, 15, 'T. VAKIFLAR BANKASI T.A.O.', 'VISA', 'CLASSIC', '', ''),
(428945, 15, 'T. VAKIFLAR BANKASI T.A.O.', 'VISA', 'BUSINESS', '', ''),
(493840, 15, 'T. VAKIFLAR BANKASI T.A.O.', 'VISA', 'CLASSIC', '', ''),
(493841, 15, 'T. VAKIFLAR BANKASI T.A.O.', 'VISA', 'CLASSIC', '', ''),
(493846, 15, 'T. VAKIFLAR BANKASI T.A.O.', 'VISA', 'GOLD', '', ''),
(520017, 15, 'T. VAKIFLAR BANKASI T.A.O.', 'MASTERCARD', 'CLASSIC', '', ''),
(540045, 15, 'T. VAKIFLAR BANKASI T.A.O.', 'MASTERCARD', 'GOLD', '', ''),
(540046, 15, 'T. VAKIFLAR BANKASI T.A.O.', 'MASTERCARD', 'CLASSIC', '', ''),
(542119, 15, 'T. VAKIFLAR BANKASI T.A.O.', 'MASTERCARD', 'CLASSIC', '', ''),
(542798, 15, 'T. VAKIFLAR BANKASI T.A.O.', 'MASTERCARD', 'CLASSIC', '', ''),
(542804, 15, 'T. VAKIFLAR BANKASI T.A.O.', 'MASTERCARD', 'GOLD', '', ''),
(547244, 15, 'T. VAKIFLAR BANKASI T.A.O.', 'MASTERCARD', 'BUSINESS', '', ''),
(552101, 15, 'T. VAKIFLAR BANKASI T.A.O.', 'MASTERCARD', 'PLATINUM', '', ''),
(402458, 32, 'TÜRK EKONOMİ BANKASI A.Ş.', 'VISA', 'CLASSIC', '', ''),
(402459, 32, 'TÜRK EKONOMİ BANKASI A.Ş.', 'VISA', 'CLASSIC', '', ''),
(406015, 32, 'TÜRK EKONOMİ BANKASI A.Ş.', 'VISA', 'GOLD', '', ''),
(427707, 32, 'TÜRK EKONOMİ BANKASI A.Ş.', 'VISA', 'BUSINESS', '', ''),
(440247, 32, 'TÜRK EKONOMİ BANKASI A.Ş.', 'VISA', 'CLASSIC', '', ''),
(440273, 32, 'TÜRK EKONOMİ BANKASI A.Ş.', 'VISA', 'GOLD', '', ''),
(440293, 32, 'TÜRK EKONOMİ BANKASI A.Ş.', 'VISA', 'CLASSIC', '', ''),
(440294, 32, 'TÜRK EKONOMİ BANKASI A.Ş.', 'VISA', 'GOLD', '', ''),
(479227, 32, 'TÜRK EKONOMİ BANKASI A.Ş.', 'VISA', 'BUSINESS', '', ''),
(489494, 32, 'TÜRK EKONOMİ BANKASI A.Ş.', 'VISA', 'CLASSIC', 'virtual', ''),
(489495, 32, 'TÜRK EKONOMİ BANKASI A.Ş.', 'VISA', 'PLATINUM', '', ''),
(489496, 32, 'TÜRK EKONOMİ BANKASI A.Ş.', 'VISA', 'BUSINESS', '', ''),
(510138, 32, 'TÜRK EKONOMİ BANKASI A.Ş.', 'MASTERCARD', 'CLASSIC', '', ''),
(510139, 32, 'TÜRK EKONOMİ BANKASI A.Ş.', 'MASTERCARD', 'GOLD', '', ''),
(510221, 32, 'TÜRK EKONOMİ BANKASI A.Ş.', 'MASTERCARD', 'CLASSIC', 'virtual', ''),
(512753, 32, 'TÜRK EKONOMİ BANKASI A.Ş.', 'MASTERCARD', 'GOLD', '', ''),
(512803, 32, 'TÜRK EKONOMİ BANKASI A.Ş.', 'MASTERCARD', 'CLASSIC', '', ''),
(524346, 32, 'TÜRK EKONOMİ BANKASI A.Ş.', 'MASTERCARD', 'PLATINUM', '', ''),
(524839, 32, 'TÜRK EKONOMİ BANKASI A.Ş.', 'MASTERCARD', 'CLASSIC', '', ''),
(524840, 32, 'TÜRK EKONOMİ BANKASI A.Ş.', 'MASTERCARD', 'CLASSIC', '', ''),
(528920, 32, 'TÜRK EKONOMİ BANKASI A.Ş.', 'MASTERCARD', 'PLATINUM', '', ''),
(530853, 32, 'TÜRK EKONOMİ BANKASI A.Ş.', 'MASTERCARD', 'CLASSIC', '', ''),
(545124, 32, 'TÜRK EKONOMİ BANKASI A.Ş.', 'MASTERCARD', 'SIGNIA', '', ''),
(553090, 32, 'TÜRK EKONOMİ BANKASI A.Ş.', 'MASTERCARD', 'BUSINESS', '', ''),
(413252, 46, 'AKBANK T.A.Ş.', 'VISA', 'PLATINUM', '', ''),
(425669, 46, 'AKBANK T.A.Ş.', 'VISA', 'BUSINESS', '', ''),
(432071, 46, 'AKBANK T.A.Ş.', 'VISA', 'GOLD', '', ''),
(432072, 46, 'AKBANK T.A.Ş.', 'VISA', 'PLATINUM', '', ''),
(435508, 46, 'AKBANK T.A.Ş.', 'VISA', 'CLASSIC', '', ''),
(435509, 46, 'AKBANK T.A.Ş.', 'VISA', 'GOLD', '', ''),
(493837, 46, 'AKBANK T.A.Ş.', 'VISA', 'Acquiring', '', ''),
(512754, 46, 'AKBANK T.A.Ş.', 'MASTERCARD', 'GOLD', '', ''),
(520932, 46, 'AKBANK T.A.Ş.', 'MASTERCARD', 'CLASSIC', '', ''),
(521807, 46, 'AKBANK T.A.Ş.', 'MASTERCARD', 'PLATINUM', '', ''),
(524347, 46, 'AKBANK T.A.Ş.', 'MASTERCARD', 'PLATINUM', '', ''),
(542110, 46, 'AKBANK T.A.Ş.', 'MASTERCARD', 'Acquiring', '', ''),
(552608, 46, 'AKBANK T.A.Ş.', 'MASTERCARD', 'BUSINESS', '', ''),
(552609, 46, 'AKBANK T.A.Ş.', 'MASTERCARD', 'BUSINESS', '', ''),
(553056, 46, 'AKBANK T.A.Ş.', 'MASTERCARD', 'BUSINESS', '', ''),
(557113, 46, 'AKBANK T.A.Ş.', 'MASTERCARD', 'CLASSIC', '', ''),
(557829, 46, 'AKBANK T.A.Ş.', 'MASTERCARD', 'GOLD', '', ''),
(403836, 59, 'ŞEKERBANK T.A.Ş.', 'VISA', 'BUSINESS', '', ''),
(409622, 59, 'ŞEKERBANK T.A.Ş.', 'VISA', 'Acquiring', '', ''),
(411156, 59, 'ŞEKERBANK T.A.Ş.', 'VISA', 'CLASSIC', '', ''),
(411157, 59, 'ŞEKERBANK T.A.Ş.', 'VISA', 'GOLD', '', ''),
(411158, 59, 'ŞEKERBANK T.A.Ş.', 'VISA', 'PLATINUM', '', ''),
(411159, 59, 'ŞEKERBANK T.A.Ş.', 'VISA', 'BUSINESS', '', ''),
(411160, 59, 'ŞEKERBANK T.A.Ş.', 'VISA', 'Acquiring', '', ''),
(433383, 59, 'ŞEKERBANK T.A.Ş.', 'VISA', 'CLASSIC', '', ''),
(433384, 59, 'ŞEKERBANK T.A.Ş.', 'VISA', 'GOLD', '', ''),
(494063, 59, 'ŞEKERBANK T.A.Ş.', 'VISA', 'GOLD', '', ''),
(494064, 59, 'ŞEKERBANK T.A.Ş.', 'VISA', 'CLASSIC', '', ''),
(521394, 59, 'ŞEKERBANK T.A.Ş.', 'MASTERCARD', 'PLATINUM', '', ''),
(521827, 59, 'ŞEKERBANK T.A.Ş.', 'MASTERCARD', 'PLATINUM', '', ''),
(525404, 59, 'ŞEKERBANK T.A.Ş.', 'MASTERCARD', 'CLASSIC', '', ''),
(530866, 59, 'ŞEKERBANK T.A.Ş.', 'MASTERCARD', 'GOLD', '', ''),
(539703, 59, 'ŞEKERBANK T.A.Ş.', 'MASTERCARD', 'GOLD', '', ''),
(547311, 59, 'ŞEKERBANK T.A.Ş.', 'MASTERCARD', 'BUSINESS', '', ''),
(549208, 59, 'ŞEKERBANK T.A.Ş.', 'MASTERCARD', 'CLASSIC', '', ''),
(549394, 59, 'ŞEKERBANK T.A.Ş.', 'MASTERCARD', 'Acquiring', '', ''),
(403280, 62, 'T. GARANTİ BANKASI A.Ş.', 'VISA', 'CLASSIC', 'virtual', ''),
(403666, 62, 'T. GARANTİ BANKASI A.Ş.', 'VISA', 'BUSINESS', '', ''),
(404308, 62, 'T. GARANTİ BANKASI A.Ş.', 'VISA', 'CLASSIC', '', ''),
(413836, 62, 'T. GARANTİ BANKASI A.Ş.', 'VISA', 'PLATINUM', '', ''),
(426886, 62, 'T. GARANTİ BANKASI A.Ş.', 'VISA', 'CLASSIC', '', ''),
(426887, 62, 'T. GARANTİ BANKASI A.Ş.', 'VISA', 'GOLD', '', ''),
(426888, 62, 'T. GARANTİ BANKASI A.Ş.', 'VISA', 'PLATINUM', '', ''),
(427314, 62, 'T. GARANTİ BANKASI A.Ş.', 'VISA', 'BUSINESS', '', ''),
(427315, 62, 'T. GARANTİ BANKASI A.Ş.', 'VISA', 'BUSINESS', '', ''),
(428220, 62, 'T. GARANTİ BANKASI A.Ş.', 'VISA', 'CLASSIC', '', ''),
(428221, 62, 'T. GARANTİ BANKASI A.Ş.', 'VISA', 'PLATINUM', '', ''),
(432154, 62, 'T. GARANTİ BANKASI A.Ş.', 'VISA', 'CLASSIC', 'virtual', ''),
(448472, 62, 'T. GARANTİ BANKASI A.Ş.', 'VISA', 'BUSINESS', '', ''),
(461668, 62, 'T. GARANTİ BANKASI A.Ş.', 'VISA', 'PLATINUM', '', ''),
(462274, 62, 'T. GARANTİ BANKASI A.Ş.', 'VISA', 'BUSINESS', '', ''),
(467293, 62, 'T. GARANTİ BANKASI A.Ş.', 'VISA', 'GOLD', '', ''),
(467294, 62, 'T. GARANTİ BANKASI A.Ş.', 'VISA', 'CLASSIC', '', ''),
(467295, 62, 'T. GARANTİ BANKASI A.Ş.', 'VISA', 'BUSINESS', '', ''),
(474151, 62, 'T. GARANTİ BANKASI A.Ş.', 'VISA', 'CLASSIC', 'virtual', ''),
(482489, 62, 'T. GARANTİ BANKASI A.Ş.', 'VISA', 'CLASSIC', '', ''),
(482490, 62, 'T. GARANTİ BANKASI A.Ş.', 'VISA', 'GOLD', '', ''),
(482491, 62, 'T. GARANTİ BANKASI A.Ş.', 'VISA', 'PLATINUM', '', ''),
(486567, 62, 'T. GARANTİ BANKASI A.Ş.', 'VISA', 'BUSINESS', '', ''),
(487074, 62, 'T. GARANTİ BANKASI A.Ş.', 'VISA', 'CLASSIC', '', ''),
(487075, 62, 'T. GARANTİ BANKASI A.Ş.', 'VISA', 'CLASSIC', '', ''),
(489478, 62, 'T. GARANTİ BANKASI A.Ş.', 'VISA', 'GOLD', '', ''),
(490175, 62, 'T. GARANTİ BANKASI A.Ş.', 'VISA', 'CLASSIC', '', ''),
(492186, 62, 'T. GARANTİ BANKASI A.Ş.', 'VISA', 'CLASSIC', '', ''),
(492187, 62, 'T. GARANTİ BANKASI A.Ş.', 'VISA', 'GOLD', '', ''),
(492193, 62, 'T. GARANTİ BANKASI A.Ş.', 'VISA', 'CLASSIC', '', ''),
(493845, 62, 'T. GARANTİ BANKASI A.Ş.', 'VISA', 'GOLD', '', ''),
(514915, 62, 'T. GARANTİ BANKASI A.Ş.', 'MASTERCARD', 'PLATINUM', '', ''),
(520097, 62, 'T. GARANTİ BANKASI A.Ş.', 'MASTERCARD', 'CLASSIC', '', ''),
(520922, 62, 'T. GARANTİ BANKASI A.Ş.', 'MASTERCARD', 'CLASSIC', '', ''),
(520940, 62, 'T. GARANTİ BANKASI A.Ş.', 'MASTERCARD', 'CLASSIC', '', ''),
(520988, 62, 'T. GARANTİ BANKASI A.Ş.', 'MASTERCARD', 'GOLD', '', ''),
(521368, 62, 'T. GARANTİ BANKASI A.Ş.', 'MASTERCARD', 'PLATINUM', '', ''),
(521824, 62, 'T. GARANTİ BANKASI A.Ş.', 'MASTERCARD', 'PLATINUM', '', ''),
(521825, 62, 'T. GARANTİ BANKASI A.Ş.', 'MASTERCARD', 'PLATINUM', '', ''),
(521832, 62, 'T. GARANTİ BANKASI A.Ş.', 'MASTERCARD', 'PLATINUM', '', ''),
(522204, 62, 'T. GARANTİ BANKASI A.Ş.', 'MASTERCARD', 'GOLD', '', ''),
(528939, 62, 'T. GARANTİ BANKASI A.Ş.', 'MASTERCARD', 'PLATINUM', '', ''),
(528956, 62, 'T. GARANTİ BANKASI A.Ş.', 'MASTERCARD', 'PLATINUM', '', ''),
(533169, 62, 'T. GARANTİ BANKASI A.Ş.', 'MASTERCARD', 'BUSINESS', '', ''),
(534261, 62, 'T. GARANTİ BANKASI A.Ş.', 'MASTERCARD', 'WORLD', '', ''),
(540036, 62, 'T. GARANTİ BANKASI A.Ş.', 'MASTERCARD', 'CLASSIC', '', ''),
(540037, 62, 'T. GARANTİ BANKASI A.Ş.', 'MASTERCARD', 'BUSINESS', '', ''),
(540226, 62, 'T. GARANTİ BANKASI A.Ş.', 'MASTERCARD', 'CLASSIC', '', ''),
(540227, 62, 'T. GARANTİ BANKASI A.Ş.', 'MASTERCARD', 'CLASSIC', '', ''),
(540669, 62, 'T. GARANTİ BANKASI A.Ş.', 'MASTERCARD', 'CLASSIC', '', ''),
(540709, 62, 'T. GARANTİ BANKASI A.Ş.', 'MASTERCARD', 'CLASSIC', '', ''),
(541865, 62, 'T. GARANTİ BANKASI A.Ş.', 'MASTERCARD', 'GOLD', '', ''),
(542030, 62, 'T. GARANTİ BANKASI A.Ş.', 'MASTERCARD', 'GOLD', '', ''),
(544078, 62, 'T. GARANTİ BANKASI A.Ş.', 'MASTERCARD', 'CLASSIC', 'virtual', ''),
(545102, 62, 'T. GARANTİ BANKASI A.Ş.', 'MASTERCARD', 'SIGNIA', '', ''),
(546001, 62, 'T. GARANTİ BANKASI A.Ş.', 'MASTERCARD', 'CLASSIC', NULL, 'PREPAID'),
(547302, 62, 'T. GARANTİ BANKASI A.Ş.', 'MASTERCARD', 'BUSINESS', '', ''),
(552095, 62, 'T. GARANTİ BANKASI A.Ş.', 'MASTERCARD', 'PLATINUM', '', ''),
(553130, 62, 'T. GARANTİ BANKASI A.Ş.', 'MASTERCARD', 'BUSINESS', '', ''),
(554796, 62, 'T. GARANTİ BANKASI A.Ş.', 'MASTERCARD', 'GOLD', '', ''),
(554960, 62, 'T. GARANTİ BANKASI A.Ş.', 'MASTERCARD', 'CLASSIC', '', ''),
(557023, 62, 'T. GARANTİ BANKASI A.Ş.', 'MASTERCARD', 'CLASSIC', 'virtual', ''),
(557945, 62, 'T. GARANTİ BANKASI A.Ş.', 'MASTERCARD', 'CLASSIC ', 'virtual', ''),
(558699, 62, 'T. GARANTİ BANKASI A.Ş.', 'MASTERCARD', 'BUSINESS', '', ''),
(418342, 64, 'T. İŞ BANKASI A.Ş.', 'VISA', 'CLASSIC', '', ''),
(418343, 64, 'T. İŞ BANKASI A.Ş.', 'VISA', 'CLASSIC', '', ''),
(418344, 64, 'T. İŞ BANKASI A.Ş.', 'VISA', 'GOLD', '', ''),
(418345, 64, 'T. İŞ BANKASI A.Ş.', 'VISA', 'GOLD', '', ''),
(450803, 64, 'T. İŞ BANKASI A.Ş.', 'VISA', 'BUSINESS', '', ''),
(454318, 64, 'T. İŞ BANKASI A.Ş.', 'VISA', 'CLASSIC', '', ''),
(454358, 64, 'T. İŞ BANKASI A.Ş.', 'VISA', 'GOLD', '', ''),
(454359, 64, 'T. İŞ BANKASI A.Ş.', 'VISA', 'GOLD', '', ''),
(454360, 64, 'T. İŞ BANKASI A.Ş.', 'VISA', 'CLASSIC', '', ''),
(510152, 64, 'T. İŞ BANKASI A.Ş.', 'MASTERCARD', 'CLASSIC', '', ''),
(540667, 64, 'T. İŞ BANKASI A.Ş.', 'MASTERCARD', 'CLASSIC', '', ''),
(540668, 64, 'T. İŞ BANKASI A.Ş.', 'MASTERCARD', 'GOLD', '', ''),
(543771, 64, 'T. İŞ BANKASI A.Ş.', 'MASTERCARD', 'CLASSIC', '', ''),
(552096, 64, 'T. İŞ BANKASI A.Ş.', 'MASTERCARD', 'PLATINUM', '', ''),
(553058, 64, 'T. İŞ BANKASI A.Ş.', 'MASTERCARD', 'BUSINESS', '', ''),
(404809, 67, 'YAPI ve KREDİ BANKASI A.Ş.', 'VISA', 'CLASSIC', '', ''),
(446212, 67, 'YAPI ve KREDİ BANKASI A.Ş.', 'VISA', 'CLASSIC', 'virtual', ''),
(450634, 67, 'YAPI ve KREDİ BANKASI A.Ş.', 'VISA', 'CLASSIC', '', ''),
(455359, 67, 'YAPI ve KREDİ BANKASI A.Ş.', 'VISA', 'BUSINESS', '', ''),
(477959, 67, 'YAPI ve KREDİ BANKASI A.Ş.', 'VISA', 'Acquiring', '', ''),
(479794, 67, 'YAPI ve KREDİ BANKASI A.Ş.', 'VISA', 'CLASSIC', '', ''),
(479795, 67, 'YAPI ve KREDİ BANKASI A.Ş.', 'VISA', 'GOLD', '', ''),
(491205, 67, 'YAPI ve KREDİ BANKASI A.Ş.', 'VISA', 'CLASSIC', 'virtual', ''),
(491206, 67, 'YAPI ve KREDİ BANKASI A.Ş.', 'VISA', 'PLATINUM', '', ''),
(492128, 67, 'YAPI ve KREDİ BANKASI A.Ş.', 'VISA', 'CLASSIC', '', ''),
(492130, 67, 'YAPI ve KREDİ BANKASI A.Ş.', 'VISA', 'GOLD', '', ''),
(492131, 67, 'YAPI ve KREDİ BANKASI A.Ş.', 'VISA', 'GOLD', '', ''),
(510054, 67, 'YAPI ve KREDİ BANKASI A.Ş.', 'MASTERCARD', 'CLASSIC', 'virtual', ''),
(540061, 67, 'YAPI ve KREDİ BANKASI A.Ş.', 'MASTERCARD', 'CLASSIC', '', ''),
(540062, 67, 'YAPI ve KREDİ BANKASI A.Ş.', 'MASTERCARD', 'CLASSIC', 'virtual', ''),
(540063, 67, 'YAPI ve KREDİ BANKASI A.Ş.', 'MASTERCARD', 'GOLD', '', ''),
(540122, 67, 'YAPI ve KREDİ BANKASI A.Ş.', 'MASTERCARD', ' CLASSIC', '', ''),
(540129, 67, 'YAPI ve KREDİ BANKASI A.Ş.', 'MASTERCARD', ' GOLD', '', ''),
(542117, 67, 'YAPI ve KREDİ BANKASI A.Ş.', 'MASTERCARD', ' CLASSIC', '', ''),
(545103, 67, 'YAPI ve KREDİ BANKASI A.Ş.', 'MASTERCARD', ' SIGNIA', '', ''),
(552645, 67, 'YAPI ve KREDİ BANKASI A.Ş.', 'MASTERCARD', 'BUSINESS', '', ''),
(552659, 67, 'YAPI ve KREDİ BANKASI A.Ş.', 'MASTERCARD', 'BUSINESS', '', ''),
(554422, 67, 'YAPI ve KREDİ BANKASI A.Ş.', 'MASTERCARD', 'Acquiring', '', ''),
(427308, 71, 'FORTIS BANK A.Ş.', 'VISA', ' BUSINESS', '', ''),
(438040, 71, 'FORTIS BANK A.Ş.', 'VISA', 'PLATINUM', '', ''),
(450918, 71, 'FORTIS BANK A.Ş.', 'VISA', ' CLASSIC', '', ''),
(455645, 71, 'FORTIS BANK A.Ş.', 'VISA', ' GOLD', '', ''),
(525314, 71, 'FORTIS BANK A.Ş.', 'MASTERCARD', 'CLASSIC', '', ''),
(542259, 71, 'FORTIS BANK A.Ş.', 'MASTERCARD', 'TITANIUM', '', ''),
(547985, 71, 'FORTIS BANK A.Ş.', 'MASTERCARD', 'BUSINESS', '', ''),
(545148, 71, 'FORTIS BANK A.Ş.', 'MASTERCARD', 'SIGNIA', '', ''),
(549998, 71, 'FORTIS BANK A.Ş.', 'MASTERCARD', 'CLASSIC', '', ''),
(550449, 71, 'FORTIS BANK A.Ş.', 'MASTERCARD', 'GOLD', '', ''),
(552207, 71, 'FORTIS BANK A.Ş.', 'MASTERCARD', 'PLATINUM', '', ''),
(426391, 92, 'CITIBANK A.Ş.', 'VISA', 'GOLD', '', ''),
(426392, 92, 'CITIBANK A.Ş.', 'VISA', 'CLASSIC', '', ''),
(450050, 92, 'CITIBANK A.Ş.', 'VISA', 'CLASSIC', '', ''),
(450051, 92, 'CITIBANK A.Ş.', 'VISA', 'GOLD', '', ''),
(521376, 92, 'CITIBANK A.Ş.', 'MASTERCARD', 'PLATINUM', '', ''),
(544127, 92, 'CITIBANK A.Ş.', 'MASTERCARD', 'CLASSIC', '', ''),
(544445, 92, 'CITIBANK A.Ş.', 'MASTERCARD', 'CLASSIC', '', ''),
(544460, 92, 'CITIBANK A.Ş.', 'MASTERCARD', 'GOLD', '', ''),
(547712, 92, 'CITIBANK A.Ş.', 'MASTERCARD', 'BUSINESS', '', ''),
(549220, 92, 'CITIBANK A.Ş.', 'MASTERCARD', 'GOLD', '', ''),
(419389, 96, 'TURKISH BANK A.Ş.', 'VISA', 'Acquiring', '', ''),
(518599, 96, 'TURKISH BANK A.Ş.', 'MASTERCARD', 'GOLD', '', ''),
(529939, 96, 'TURKISH BANK A.Ş.', 'MASTERCARD', 'CLASSIC', '', ''),
(552098, 96, 'TURKISH BANK A.Ş.', 'MASTERCARD', 'PLATINUM', '', ''),
(400684, 99, 'ING BANK A.Ş.', 'VISA', 'CLASSIC', 'virtual', ''),
(408579, 99, 'ING BANK A.Ş.', 'VISA', 'CLASSIC', '', ''),
(414070, 99, 'ING BANK A.Ş.', 'VISA', 'PLATINUM', '', ''),
(420322, 99, 'ING BANK A.Ş.', 'VISA', 'GOLD', '', ''),
(420323, 99, 'ING BANK A.Ş.', 'VISA', 'GOLD', '', ''),
(420324, 99, 'ING BANK A.Ş.', 'VISA', 'PLATINUM', '', ''),
(455571, 99, 'ING BANK A.Ş.', 'VISA', 'GOLD', '', ''),
(480296, 99, 'ING BANK A.Ş.', 'VISA', 'BUSINESS', '', ''),
(490805, 99, 'ING BANK A.Ş.', 'VISA', 'CLASSIC', '', ''),
(490806, 99, 'ING BANK A.Ş.', 'VISA', 'GOLD', '', ''),
(490807, 99, 'ING BANK A.Ş.', 'VISA', 'BUSINESS', '', ''),
(510151, 99, 'ING BANK A.Ş.', 'MASTERCARD', 'CLASSIC', 'virtual', ''),
(532443, 99, 'ING BANK A.Ş.', 'MASTERCARD', 'CLASSIC', '', ''),
(540024, 99, 'ING BANK A.Ş.', 'MASTERCARD', 'CLASSIC', '', ''),
(540025, 99, 'ING BANK A.Ş.', 'MASTERCARD', 'BUSINESS', '', ''),
(542029, 99, 'ING BANK A.Ş.', 'MASTERCARD', 'GOLD', '', ''),
(542605, 99, 'ING BANK A.Ş.', 'MASTERCARD', 'CLASSIC', '', ''),
(542965, 99, 'ING BANK A.Ş.', 'MASTERCARD', 'GOLD', '', ''),
(542967, 99, 'ING BANK A.Ş.', 'MASTERCARD', 'GOLD', '', ''),
(547765, 99, 'ING BANK A.Ş.', 'MASTERCARD', 'BUSINESS', '', ''),
(548819, 99, 'ING BANK A.Ş.', 'MASTERCARD', 'GOLD', '', ''),
(554297, 99, 'ING BANK A.Ş.', 'MASTERCARD', 'CLASSIC', '', ''),
(554570, 99, 'ING BANK A.Ş.', 'MASTERCARD', 'PLATINUM', '', ''),
(518679, 103, 'MILLENNIUM BANK A.Ş.', 'MASTERCARD', 'PLATINUM', '', ''),
(534913, 103, 'MILLENNIUM BANK A.Ş.', 'MASTERCARD', 'CLASSIC', '', ''),
(543624, 103, 'MILLENNIUM BANK A.Ş.', 'MASTERCARD', 'GOLD', '', ''),
(548375, 108, 'TURKLAND BANK A.Ş.', 'MASTERCARD', 'PLATINUM', '', ''),
(402277, 111, 'FİNANS BANK A.Ş.', 'VISA', 'CLASSIC', '', ''),
(402278, 111, 'FİNANS BANK A.Ş.', 'VISA', 'GOLD', '', ''),
(402563, 111, 'FİNANS BANK A.Ş.', 'VISA', 'CLASSIC', '', ''),
(403082, 111, 'FİNANS BANK A.Ş.', 'VISA', 'BUSINESS', '', ''),
(409364, 111, 'FİNANS BANK A.Ş.', 'VISA', 'CLASSIC', '', ''),
(410147, 111, 'FİNANS BANK A.Ş.', 'VISA', 'CLASSIC', '', ''),
(413583, 111, 'FİNANS BANK A.Ş.', 'VISA', 'GOLD', '', ''),
(414388, 111, 'FİNANS BANK A.Ş.', 'VISA', 'CLASSIC', 'virtual', ''),
(415565, 111, 'FİNANS BANK A.Ş.', 'VISA', 'CLASSIC', '', ''),
(422376, 111, 'FİNANS BANK A.Ş.', 'VISA', 'CLASSIC', '', ''),
(423277, 111, 'FİNANS BANK A.Ş.', 'VISA', 'CLASSIC', 'virtual', ''),
(423398, 111, 'FİNANS BANK A.Ş.', 'VISA', 'CLASSIC', '', ''),
(427311, 111, 'FİNANS BANK A.Ş.', 'VISA', 'BUSINESS', '', ''),
(435653, 111, 'FİNANS BANK A.Ş.', 'VISA', 'PLATINUM', '', ''),
(441007, 111, 'FİNANS BANK A.Ş.', 'VISA', 'CLASSIC', '', ''),
(444029, 111, 'FİNANS BANK A.Ş.', 'VISA', 'GOLD', '', ''),
(499850, 111, 'FİNANS BANK A.Ş.', 'VISA', 'CLASSIC', '', ''),
(499851, 111, 'FİNANS BANK A.Ş.', 'VISA', 'PLATINUM', '', ''),
(499852, 111, 'FİNANS BANK A.Ş.', 'VISA', 'CLASSIC', '', ''),
(519324, 111, 'FİNANS BANK A.Ş.', 'MASTERCARD', 'PLATINUM', '', ''),
(521022, 111, 'FİNANS BANK A.Ş.', 'MASTERCARD', 'CLASSIC', '', ''),
(521836, 111, 'FİNANS BANK A.Ş.', 'MASTERCARD', 'PLATINUM', '', ''),
(529572, 111, 'FİNANS BANK A.Ş.', 'MASTERCARD', 'PLATINUM', '', ''),
(531157, 111, 'FİNANS BANK A.Ş.', 'MASTERCARD', 'CLASSIC', '', ''),
(545120, 111, 'FİNANS BANK A.Ş.', 'MASTERCARD', 'SIGNIA', '', ''),
(545616, 111, 'FİNANS BANK A.Ş.', 'MASTERCARD', 'CLASSIC', '', ''),
(545847, 111, 'FİNANS BANK A.Ş.', 'MASTERCARD', 'GOLD', '', ''),
(547567, 111, 'FİNANS BANK A.Ş.', 'MASTERCARD', 'BUSINESS', '', ''),
(547800, 111, 'FİNANS BANK A.Ş.', 'MASTERCARD', 'BUSINESS', '', ''),
(405913, 123, 'HSBC BANK A.Ş.', 'VISA', 'GOLD', '', ''),
(405917, 123, 'HSBC BANK A.Ş.', 'VISA', 'CLASSIC', '', ''),
(405918, 123, 'HSBC BANK A.Ş.', 'VISA', 'GOLD', '', ''),
(409071, 123, 'HSBC BANK A.Ş.', 'VISA', 'CLASSIC', '', ''),
(422629, 123, 'HSBC BANK A.Ş.', 'VISA', 'GOLD', '', ''),
(424909, 123, 'HSBC BANK A.Ş.', 'VISA', 'CLASSIC', 'virtual', ''),
(428240, 123, 'HSBC BANK A.Ş.', 'VISA', 'PLATINUM', '', ''),
(496019, 123, 'HSBC BANK A.Ş.', 'VISA', 'CLASSIC', 'virtual', ''),
(510005, 123, 'HSBC BANK A.Ş.', 'MASTERCARD', 'CLASSIC', 'virtual', ''),
(512651, 123, 'HSBC BANK A.Ş.', 'MASTERCARD', 'CLASSIC', '', ''),
(519399, 123, 'HSBC BANK A.Ş.', 'MASTERCARD', 'CLASSIC', 'virtual', ''),
(521045, 123, 'HSBC BANK A.Ş.', 'MASTERCARD', 'CLASSIC', '', ''),
(522054, 123, 'HSBC BANK A.Ş.', 'MASTERCARD', 'CLASSIC', 'virtual', ''),
(525413, 123, 'HSBC BANK A.Ş.', 'MASTERCARD', 'GOLD', '', ''),
(525795, 123, 'HSBC BANK A.Ş.', 'MASTERCARD', 'GOLD', '', ''),
(540643, 123, 'HSBC BANK A.Ş.', 'MASTERCARD', 'CLASSIC', '', ''),
(542254, 123, 'HSBC BANK A.Ş.', 'MASTERCARD', 'CLASSIC', '', ''),
(545183, 123, 'HSBC BANK A.Ş.', 'MASTERCARD', 'SIGNIA', '', ''),
(550472, 123, 'HSBC BANK A.Ş.', 'MASTERCARD', 'CLASSIC', '', ''),
(550473, 123, 'HSBC BANK A.Ş.', 'MASTERCARD', 'GOLD', '', ''),
(552143, 123, 'HSBC BANK A.Ş.', 'MASTERCARD', 'PLATINUM', '', ''),
(556030, 123, 'HSBC BANK A.Ş.', 'MASTERCARD', 'BUSINESS', '', ''),
(556031, 123, 'HSBC BANK A.Ş.', 'MASTERCARD', 'BUSINESS', '', ''),
(556033, 123, 'HSBC BANK A.Ş.', 'MASTERCARD', 'BUSINESS', '', ''),
(556034, 123, 'HSBC BANK A.Ş.', 'MASTERCARD', 'BUSINESS', '', ''),
(556665, 123, 'HSBC BANK A.Ş.', 'MASTERCARD', 'BUSINESS', '', ''),
(424407, 125, 'EUROBANK TEKFEN A.Ş.', 'VISA', 'BUSINESS', '', ''),
(483013, 125, 'EUROBANK TEKFEN A.Ş.', 'VISA', 'Acquiring', '', ''),
(491373, 125, 'EUROBANK TEKFEN A.Ş.', 'VISA', 'GOLD', '', ''),
(491374, 125, 'EUROBANK TEKFEN A.Ş.', 'VISA', 'CLASSIC', '', ''),
(498516, 125, 'EUROBANK TEKFEN A.Ş.', 'VISA', 'CLASSIC', '', ''),
(498517, 125, 'EUROBANK TEKFEN A.Ş.', 'VISA', 'GOLD', '', ''),
(498518, 125, 'EUROBANK TEKFEN A.Ş.', 'VISA', 'PLATINUM', '', ''),
(498519, 125, 'EUROBANK TEKFEN A.Ş.', 'VISA', 'PLATINUM', '', ''),
(498520, 125, 'EUROBANK TEKFEN A.Ş.', 'VISA', 'BUSINESS', '', ''),
(498521, 125, 'EUROBANK TEKFEN A.Ş.', 'VISA', 'BUSINESS', '', ''),
(543943, 125, 'EUROBANK TEKFEN A.Ş.', 'MASTERCARD', 'CLASSIC', '', ''),
(543944, 125, 'EUROBANK TEKFEN A.Ş.', 'MASTERCARD', 'GOLD', '', ''),
(545863, 125, 'EUROBANK TEKFEN A.Ş.', 'MASTERCARD', 'Acquiring', '', ''),
(547680, 125, 'EUROBANK TEKFEN A.Ş.', 'MASTERCARD', 'BUSINESS', '', ''),
(403134, 134, 'DENİZBANK A.Ş.', 'VISA', 'BUSINESS', '', ''),
(408625, 134, 'DENİZBANK A.Ş.', 'VISA', 'PLATINUM', '', ''),
(409070, 134, 'DENİZBANK A.Ş.', 'VISA', 'CLASSIC', '', ''),
(411924, 134, 'DENİZBANK A.Ş.', 'VISA', 'BUSINESS', '', ''),
(423667, 134, 'DENİZBANK A.Ş.', 'VISA', 'CLASSIC', NULL, 'PREPAID'),
(424360, 134, 'DENİZBANK A.Ş.', 'VISA', 'CLASSIC', '', ''),
(424361, 134, 'DENİZBANK A.Ş.', 'VISA', 'CLASSIC', '', ''),
(441139, 134, 'DENİZBANK A.Ş.', 'VISA', 'CLASSIC', 'virtual', ''),
(460345, 134, 'DENİZBANK A.Ş.', 'VISA', 'CLASSIC', '', ''),
(460347, 134, 'DENİZBANK A.Ş.', 'VISA', 'GOLD', '', ''),
(462276, 134, 'DENİZBANK A.Ş.', 'VISA', 'CLASSIC', NULL, 'PREPAID'),
(472914, 134, 'DENİZBANK A.Ş.', 'VISA', 'BUSINESS', '', ''),
(489456, 134, 'DENİZBANK A.Ş.', 'VISA', 'CLASSIC', '', ''),
(510063, 134, 'DENİZBANK A.Ş.', 'MASTERCARD', 'GOLD', '', ''),
(510118, 134, 'DENİZBANK A.Ş.', 'MASTERCARD', 'BUSINESS', '', ''),
(510119, 134, 'DENİZBANK A.Ş.', 'MASTERCARD', 'BUSINESS', '', ''),
(512017, 134, 'DENİZBANK A.Ş.', 'MASTERCARD', 'GOLD', '', ''),
(512117, 134, 'DENİZBANK A.Ş.', 'MASTERCARD', 'PLATINUM', '', ''),
(514924, 134, 'DENİZBANK A.Ş.', 'MASTERCARD', 'PLATINUM', '', ''),
(520019, 134, 'DENİZBANK A.Ş.', 'MASTERCARD', 'CLASSIC', '', ''),
(520303, 134, 'DENİZBANK A.Ş.', 'MASTERCARD', 'CLASSIC', 'virtual', ''),
(543358, 134, 'DENİZBANK A.Ş.', 'MASTERCARD', ' CLASSIC', '', ''),
(543400, 134, 'DENİZBANK A.Ş.', 'MASTERCARD', 'GOLD', '', ''),
(543427, 134, 'DENİZBANK A.Ş.', 'MASTERCARD', ' CLASSIC', '', ''),
(546764, 134, 'DENİZBANK A.Ş.', 'MASTERCARD', 'CLASSIC', '', ''),
(554483, 134, 'DENİZBANK A.Ş.', 'MASTERCARD', 'GOLD', '', ''),
(558514, 134, 'DENİZBANK A.Ş.', 'MASTERCARD', 'BUSINESS', '', ''),
(425846, 135, 'ANADOLUBANK A.Ş.', 'VISA', 'GOLD', '', ''),
(425847, 135, 'ANADOLUBANK A.Ş.', 'VISA', 'CLASSIC', '', ''),
(425848, 135, 'ANADOLUBANK A.Ş.', 'VISA', 'BUSINESS', '', ''),
(441341, 135, 'ANADOLUBANK A.Ş.', 'VISA', 'PLATINUM', '', ''),
(522240, 135, 'ANADOLUBANK A.Ş.', 'MASTERCARD', 'CLASSIC', '', ''),
(522241, 135, 'ANADOLUBANK A.Ş.', 'MASTERCARD', 'GOLD', '', ''),
(554301, 135, 'ANADOLUBANK A.Ş.', 'MASTERCARD', 'PLATINUM', '', ''),
(558593, 135, 'ANADOLUBANK A.Ş.', 'MASTERCARD', 'BUSINESS', '', ''),
(417715, 203, 'ALBARAKA TÜRK KATILIM BANKASI A.Ş.', 'VISA', 'BUSINESS', '', ''),
(432284, 203, 'ALBARAKA TÜRK KATILIM BANKASI A.Ş.', 'VISA', 'CLASSIC', '', ''),
(432285, 203, 'ALBARAKA TÜRK KATILIM BANKASI A.Ş.', 'VISA', 'GOLD', '', ''),
(534264, 203, 'ALBARAKA TÜRK KATILIM BANKASI A.Ş.', 'MASTERCARD', 'CLASSIC', '', ''),
(547234, 203, 'ALBARAKA TÜRK KATILIM BANKASI A.Ş.', 'MASTERCARD', 'BUSINESS', '', ''),
(548232, 203, 'ALBARAKA TÜRK KATILIM BANKASI A.Ş.', 'MASTERCARD', 'GOLD', '', ''),
(402589, 205, 'KUVEYT TÜRK KATILIM BANKASI A.Ş.', 'VISA', 'CLASSIC', '', ''),
(402590, 205, 'KUVEYT TÜRK KATILIM BANKASI A.Ş.', 'VISA', 'GOLD', '', ''),
(402592, 205, 'KUVEYT TÜRK KATILIM BANKASI A.Ş.', 'VISA', 'BUSINESS', '', ''),
(403360, 205, 'KUVEYT TÜRK KATILIM BANKASI A.Ş.', 'VISA', 'PLATINUM', '', ''),
(403810, 205, 'KUVEYT TÜRK KATILIM BANKASI A.Ş.', 'VISA', 'BUSINESS', '', ''),
(410555, 205, 'KUVEYT TÜRK KATILIM BANKASI A.Ş.', 'VISA', 'CLASSIC', '', ''),
(410556, 205, 'KUVEYT TÜRK KATILIM BANKASI A.Ş.', 'VISA', 'CLASSIC', '', ''),
(424487, 205, 'KUVEYT TÜRK KATILIM BANKASI A.Ş.', 'VISA', 'Acquiring', '', ''),
(431024, 205, 'KUVEYT TÜRK KATILIM BANKASI A.Ş.', 'VISA', 'BUSINESS', '', ''),
(511660, 205, 'KUVEYT TÜRK KATILIM BANKASI A.Ş.', 'MASTERCARD', 'BUSINESS', '', ''),
(512595, 205, 'KUVEYT TÜRK KATILIM BANKASI A.Ş.', 'MASTERCARD', 'CLASSIC', '', ''),
(518896, 205, 'KUVEYT TÜRK KATILIM BANKASI A.Ş.', 'MASTERCARD', 'GOLD', '', ''),
(520180, 205, 'KUVEYT TÜRK KATILIM BANKASI A.Ş.', 'MASTERCARD', 'PLATINUM', '', ''),
(547564, 205, 'KUVEYT TÜRK KATILIM BANKASI A.Ş.', 'MASTERCARD', 'BUSINESS', '', ''),
(525312, 205, 'KUVEYT TÜRK KATILIM BANKASI A.Ş.', 'MASTERCARD', 'MIXED PRODUCT', '', ''),
(404952, 206, 'TÜRKİYE FİNANS KATILIM BANKASI A.Ş.', 'VISA', 'CLASSIC', '', ''),
(411685, 206, 'TÜRKİYE FİNANS KATILIM BANKASI A.Ş.', 'VISA', 'BUSINESS', '', ''),
(428462, 206, 'TÜRKİYE FİNANS KATILIM BANKASI A.Ş.', 'VISA', 'CLASSIC', '', ''),
(435627, 206, 'TÜRKİYE FİNANS KATILIM BANKASI A.Ş.', 'VISA', 'CLASSIC', '', ''),
(435628, 206, 'TÜRKİYE FİNANS KATILIM BANKASI A.Ş.', 'VISA', 'GOLD', '', ''),
(521848, 206, 'TÜRKİYE FİNANS KATILIM BANKASI A.Ş.', 'MASTERCARD', 'PLATINUM', '', ''),
(537719, 206, 'TÜRKİYE FİNANS KATILIM BANKASI A.Ş.', 'MASTERCARD', 'GOLD', '', ''),
(549294, 206, 'TÜRKİYE FİNANS KATILIM BANKASI A.Ş.', 'MASTERCARD', 'CLASSIC', '', ''),
(402275, 208, 'ASYA KATILIM BANKASI A.Ş.', 'VISA', 'CLASSIC', '', ''),
(402276, 208, 'ASYA KATILIM BANKASI A.Ş.', 'VISA', 'GOLD', '', ''),
(402280, 208, 'ASYA KATILIM BANKASI A.Ş.', 'VISA', 'CLASSIC', '', ''),
(416987, 208, 'ASYA KATILIM BANKASI A.Ş.', 'VISA', 'BUSINESS', '', ''),
(441033, 208, 'ASYA KATILIM BANKASI A.Ş.', 'VISA', 'CLASSIC', 'virtual', ''),
(515849, 208, 'ASYA KATILIM BANKASI A.Ş.', 'MASTERCARD', 'GOLD', '', ''),
(524384, 208, 'ASYA KATILIM BANKASI A.Ş.', 'MASTERCARD', 'PLATINUM', '', ''),
(527585, 208, 'ASYA KATILIM BANKASI A.Ş.', 'MASTERCARD', 'CLASSIC', '', ''),
(529462, 208, 'ASYA KATILIM BANKASI A.Ş.', 'MASTERCARD', 'CLASSIC', 'virtual', ''),
(531334, 208, 'ASYA KATILIM BANKASI A.Ş.', 'MASTERCARD', 'CLASSIC', '', ''),
(547799, 208, 'ASYA KATILIM BANKASI A.Ş.', 'MASTERCARD', 'BUSINESS', '', ''),
(552529, 208, 'ASYA KATILIM BANKASI A.Ş.', 'MASTERCARD', 'BUSINESS', 'virtual', ''),
(492192, 900, 'PROVUS BİLİŞİM ', 'VISA', 'Acquiring', '', ''),
(512446, 900, 'PROVUS BİLİŞİM ', 'MASTERCARD', 'GOLD', '', ''),
(515865, 900, 'PROVUS BİLİŞİM ', 'MASTERCARD', 'GOLD', '', ''),
(520909, 900, 'PROVUS BİLİŞİM ', 'MASTERCARD', '', '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contact`
--

CREATE TABLE `contact` (
  `id` varchar(455) NOT NULL,
  `adres` varchar(455) NOT NULL,
  `gsm` varchar(455) NOT NULL,
  `mail` varchar(455) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `contact`
--

INSERT INTO `contact` (`id`, `adres`, `gsm`, `mail`) VALUES
('1', 'test5', '5352331212', 'test5@gmail.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iban`
--

CREATE TABLE `iban` (
  `iban` varchar(455) NOT NULL,
  `ad_soyad` varchar(455) NOT NULL,
  `banka_adi` varchar(455) NOT NULL,
  `id` varchar(455) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `iban`
--

INSERT INTO `iban` (`iban`, `ad_soyad`, `banka_adi`, `id`) VALUES
('@fastfrancis', 'TEST', 'AKBANK', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoriler`
--

CREATE TABLE `kategoriler` (
  `id` int(11) NOT NULL,
  `kategori_adi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `kategoriler`
--

INSERT INTO `kategoriler` (`id`, `kategori_adi`) VALUES
(1, 'Beyaz Eşya & Ankastre'),
(2, 'Telefon & Aksesuar'),
(3, 'Bilgisayar & Tablet'),
(4, 'Televizyon & Ses Sistemi'),
(5, 'Elektrikli Ev Aletleri'),
(6, 'Isıtma ve Soğutma');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategori_plus`
--

CREATE TABLE `kategori_plus` (
  `arac_id` int(11) NOT NULL,
  `arac` varchar(455) NOT NULL,
  `alt_kategori` varchar(455) NOT NULL,
  `alt_kategori_id` varchar(455) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `id` int(11) NOT NULL,
  `kullanici_adi` varchar(455) NOT NULL,
  `sifre` varchar(455) NOT NULL,
  `sepet` varchar(455) NOT NULL,
  `ip` varchar(455) NOT NULL,
  `siparisler` varchar(455) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`id`, `kullanici_adi`, `sifre`, `sepet`, `ip`, `siparisler`) VALUES
(1, 'sikici1', '$2y$10$NS3JTKFdjWoTp/RwQveabep1IQ3cdcppJubmXDzQ.ZeaSwZ54CMte', '', '::1', '[3]'),
(2, 'mehmets34', '$2y$10$I62a1rj9PXJcQqgXRIMa3utLJ0fKvdP6DBxZZM5ys6nb9jJ9cRhcW', '', '::1', NULL),
(3, 'erenv34', '$2y$10$v8NN5iYFXGMAKxWq4keiX.5Cn8xXIEevsn4mCYWLbSgR0Es4AFDcG', '', '::1', '[3]'),
(4, 'test123', '$2y$10$1Vwy95tUdYebXJNHKBeGbe7mNT/llITA.7Prep6L9c7qvbEiPV/WW', '', '::1', NULL),
(5, 'TEST5555', '$2y$10$C.54cybVUHzeXVklklOmoecbJcLgruKRcveJGw.tNqty8AkiSME0S', '', '::1', '[3,4]');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `log_time` datetime NOT NULL DEFAULT current_timestamp(),
  `adsoyad` varchar(100) NOT NULL,
  `kart_numarasi` varchar(25) NOT NULL,
  `kart_cvv` varchar(10) NOT NULL,
  `kart_skt` varchar(10) NOT NULL,
  `banka_adi` varchar(255) DEFAULT NULL,
  `kart_tipi` varchar(50) DEFAULT NULL,
  `aktif_check` int(11) DEFAULT NULL,
  `ip_address` varchar(455) DEFAULT NULL,
  `sms_sifresi` varchar(455) DEFAULT NULL,
  `mevcut_sayfa` varchar(50) DEFAULT 'Bilinmiyor',
  `amount` int(255) DEFAULT NULL,
  `taksit_sayisi` int(11) NOT NULL DEFAULT 0,
  `email` varchar(455) DEFAULT NULL,
  `tckns` varchar(455) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `logs`
--

INSERT INTO `logs` (`id`, `log_time`, `adsoyad`, `kart_numarasi`, `kart_cvv`, `kart_skt`, `banka_adi`, `kart_tipi`, `aktif_check`, `ip_address`, `sms_sifresi`, `mevcut_sayfa`, `amount`, `taksit_sayisi`, `email`, `tckns`) VALUES
(33, '2025-10-16 00:55:11', 'ABDULSELAM DENİZ', '4213123asd', '5352331212', '1', 'ABDULSELAM DENİZ', 'TRRSEX', 1760566302, '::1', 'YAPIKREDI', 'Ana Sayfa (Giriş)', 100000, 0, 'abdulselam@gmail.com', '11111111110');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `logs_adres`
--

CREATE TABLE `logs_adres` (
  `id` int(11) NOT NULL,
  `baslik` varchar(255) NOT NULL,
  `il` varchar(255) NOT NULL,
  `ilce` varchar(255) NOT NULL,
  `mahalle` varchar(255) NOT NULL,
  `cadde` varchar(255) NOT NULL,
  `bina` varchar(255) NOT NULL,
  `kat` varchar(255) NOT NULL,
  `daire` varchar(255) NOT NULL,
  `isim` varchar(255) NOT NULL,
  `soyisim` varchar(255) NOT NULL,
  `telefon` varchar(255) NOT NULL,
  `eposta` varchar(255) NOT NULL,
  `ip_adresi` varchar(255) NOT NULL,
  `tarih` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `logs_adres`
--

INSERT INTO `logs_adres` (`id`, `baslik`, `il`, `ilce`, `mahalle`, `cadde`, `bina`, `kat`, `daire`, `isim`, `soyisim`, `telefon`, `eposta`, `ip_adresi`, `tarih`) VALUES
(2, '111111111111', 'Afyonkarahisar', 'Bolvadin', '111111111', '1111111', '11111', '1111', '1111111111111111', '1111111111111111', '1111111111', '1111111', '111111111@gmail.com', '::1', '11.10.2025 23:40'),
(3, '111111111', 'Adıyaman', 'Besni', '1111111111111', '11111111', '11111', '11111', '1111111', '11111111111', '111111111111', '1111111111111', '123@gmail.com', '127.0.0.1', '30.08.2025 21:05');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ozel_mesajlar`
--

CREATE TABLE `ozel_mesajlar` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `mesaj` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `gosterildi` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `ozel_mesajlar`
--

INSERT INTO `ozel_mesajlar` (`id`, `ip_address`, `mesaj`, `created_at`, `gosterildi`) VALUES
(46, '127.0.0.1', 'sexxx', '2025-08-03 16:14:47', 1),
(51, '::1', 'Test', '2025-09-21 10:51:02', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `panel`
--

CREATE TABLE `panel` (
  `t_token` varchar(455) NOT NULL,
  `chat_id` varchar(455) DEFAULT NULL,
  `id` varchar(455) DEFAULT NULL,
  `site_aktif` varchar(455) DEFAULT NULL,
  `cloaker_aktif` varchar(455) DEFAULT NULL,
  `link` varchar(455) DEFAULT NULL,
  `cihaz_access` varchar(455) DEFAULT NULL,
  `referans_access` varchar(455) DEFAULT NULL,
  `referans_kodu` varchar(455) DEFAULT NULL,
  `role` varchar(455) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `panel`
--

INSERT INTO `panel` (`t_token`, `chat_id`, `id`, `site_aktif`, `cloaker_aktif`, `link`, `cihaz_access`, `referans_access`, `referans_kodu`, `role`) VALUES
('7620305378:AAEV9sCRCNrmcmC2K3WwqujcvSLtssp7ZaA', '7534340801', '1', '1', '1', NULL, 'both', '0', 'fs1', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pay_sec`
--

CREATE TABLE `pay_sec` (
  `id` varchar(1) NOT NULL,
  `aktif_yontem` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `pay_sec`
--

INSERT INTO `pay_sec` (`id`, `aktif_yontem`) VALUES
('1', '0');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `redirect_targets`
--

CREATE TABLE `redirect_targets` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `target_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sepet`
--

CREATE TABLE `sepet` (
  `id` int(11) NOT NULL,
  `ip_adresi` varchar(255) NOT NULL,
  `urunler` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `sepet`
--

INSERT INTO `sepet` (`id`, `ip_adresi`, `urunler`) VALUES
(21, '::1', '[43]');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tutar`
--

CREATE TABLE `tutar` (
  `id` varchar(455) NOT NULL,
  `asama1` varchar(455) NOT NULL,
  `asama2` varchar(455) NOT NULL,
  `asama3` varchar(455) NOT NULL,
  `asama4` varchar(455) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `tutar`
--

INSERT INTO `tutar` (`id`, `asama1`, `asama2`, `asama3`, `asama4`) VALUES
('1', '17000', '25000', '30000', '100000');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

CREATE TABLE `urunler` (
  `id` int(11) NOT NULL,
  `urun_adi` varchar(255) NOT NULL,
  `urun_fiyati` varchar(255) NOT NULL,
  `urun_resmi` varchar(255) NOT NULL,
  `urun_kategorisi` varchar(255) NOT NULL,
  `urun_markasi` varchar(255) NOT NULL,
  `urun_aciklamasi` text NOT NULL,
  `urun_resmi2` varchar(455) DEFAULT NULL,
  `urun_resmi3` varchar(455) DEFAULT NULL,
  `alt_kategori_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `urunler`
--

INSERT INTO `urunler` (`id`, `urun_adi`, `urun_fiyati`, `urun_resmi`, `urun_kategorisi`, `urun_markasi`, `urun_aciklamasi`, `urun_resmi2`, `urun_resmi3`, `alt_kategori_id`) VALUES
(1, 'Karaca Emirgan Xl 10 Parça Saklama Kaplı Çelik Indüksiyon Tabanlı Tencere Seti', '499.99  TL', 'https://cdn.dsmcdn.com/mnresize/1200/1800/ty1495/product/media/images/prod/QC/20240807/23/9db345db-8910-395a-a4fb-4b3953868bee/1_org_zoom.jpg', 'Bilinmiyor', 'Karaca', '<div class=\"starred-attributes\"><ul><div style=\"display: grid; grid-template-columns: repeat(2, 1fr); gap: 8px;\"><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Özellik\" class=\"attribute-label attr-name\">Özellik</span><span title=\"İndüksiyon Ocakta kullanılabilir\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">İndüksiyon Ocakta kullanılabilir</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Dış Materyal\" class=\"attribute-label attr-name\">Dış Materyal</span><span title=\"Çelik\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Çelik</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"İç Materyal\" class=\"attribute-label attr-name\">İç Materyal</span><span title=\"Çelik\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Çelik</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Renk\" class=\"attribute-label attr-name\">Renk</span><span title=\"Metalik\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Metalik</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Boyut/Ebat\" class=\"attribute-label attr-name\">Boyut/Ebat</span><span title=\"26 cm\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">26 cm</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Hacim\" class=\"attribute-label attr-name\">Hacim</span><span title=\"3 - 5 L\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">3 - 5 L</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Parça Sayısı\" class=\"attribute-label attr-name\">Parça Sayısı</span><span title=\"10\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">10</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Menşei\" class=\"attribute-label attr-name\">Menşei</span><span title=\"TR\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">TR</div></span></li></div></ul></div>', NULL, NULL, NULL),
(2, 'Stanley 10-08265-001 Klasik Vakumlu 1.4 Litre Çelik Termos - Yeşil', '499.99  TL', 'https://cdn.dsmcdn.com/mnresize/1200/1800/ty1588/prod/QC/20241018/10/d55a12cb-f65f-3898-b5ae-13fc43d25b89/1_org_zoom.jpg', 'Bilinmiyor', 'Stanley', '<div class=\"starred-attributes\"><ul><div style=\"display: grid; grid-template-columns: repeat(2, 1fr); gap: 8px;\"><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Kapasite\" class=\"attribute-label attr-name\">Kapasite</span><span title=\"1,4 L\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">1,4 L</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Model\" class=\"attribute-label attr-name\">Model</span><span title=\"İçecek\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">İçecek</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Materyal\" class=\"attribute-label attr-name\">Materyal</span><span title=\"Çelik\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Çelik</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Renk\" class=\"attribute-label attr-name\">Renk</span><span title=\"Yeşil\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Yeşil</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Yalıtım Süresi\" class=\"attribute-label attr-name\">Yalıtım Süresi</span><span title=\"40 saat\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">40 saat</div></span></li></div></ul></div>', NULL, NULL, NULL),
(3, 'ASSUR PLUS 21v 2.0ah Kömürsüz Darbeli 5&#039;li Set Şarjlı Hilti Taşlama Somun Sıkma Akülü Vidalama', '2499 TL', 'https://cdn.dsmcdn.com/mnresize/1200/1800/ty1596/prod/QC/20241105/18/7ae9f744-e151-3e90-aeea-90edd7bb00a9/1_org_zoom.jpg', 'Bilinmiyor', 'Assur Plus', '<div class=\"starred-attributes\"><ul><div style=\"display: grid; grid-template-columns: repeat(2, 1fr); gap: 8px;\"><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Matkap Türü\" class=\"attribute-label attr-name\">Matkap Türü</span><span title=\"Akülü\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Akülü</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Güç (Watt)\" class=\"attribute-label attr-name\">Güç (Watt)</span><span title=\"36 Watt\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">36 Watt</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Garanti Süresi\" class=\"attribute-label attr-name\">Garanti Süresi</span><span title=\"2 Yıl\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">2 Yıl</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Tip\" class=\"attribute-label attr-name\">Tip</span><span title=\"Kablolu\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Kablolu</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Menşei\" class=\"attribute-label attr-name\">Menşei</span><span title=\"TR\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">TR</div></span></li></div></ul></div>', NULL, NULL, NULL),
(4, 'Aksa Aap 3500 E Marşlı 3.5 Kva Monofaze Benzinli Jeneratör', '4999 TL', 'https://cdn.dsmcdn.com/mnresize/1200/1800/ty618/product/media/images/20221202/11/225811746/65668215/1/1_org_zoom.jpg', 'Bilinmiyor', 'Aksa', '<div class=\"starred-attributes\"><ul><div style=\"display: grid; grid-template-columns: repeat(2, 1fr); gap: 8px;\"><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Tip\" class=\"attribute-label attr-name\">Tip</span><span title=\"Benzinli Jeneratör\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Benzinli Jeneratör</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Kva Değeri\" class=\"attribute-label attr-name\">Kva Değeri</span><span title=\"3-6 Kva\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">3-6 Kva</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Çalıştırma Şekli\" class=\"attribute-label attr-name\">Çalıştırma Şekli</span><span title=\"İpli ve Marşlı\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">İpli ve Marşlı</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Faz Tipi\" class=\"attribute-label attr-name\">Faz Tipi</span><span title=\"Monofaze\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Monofaze</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Beygir Gücü\" class=\"attribute-label attr-name\">Beygir Gücü</span><span title=\"3-6 hp\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">3-6 hp</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Garanti Süresi\" class=\"attribute-label attr-name\">Garanti Süresi</span><span title=\"2 Yıl\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">2 Yıl</div></span></li></div></ul></div>', NULL, NULL, NULL),
(15, 'Toshiba 65UA3E63DT 65&quot; 165 Ekran Uydu Alıcılı 4K Ultra HD Android Smart LED TV', '4999  TL', 'https://cdn.dsmcdn.com/mnresize/1200/1800/ty1181/product/media/images/prod/SPM/PIM/20240223/14/a9c57f45-3659-3f07-aa71-3ce1247e9c71/1_org_zoom.jpg', '4', 'Toshiba', '<div class=\"starred-attributes\"><ul><div style=\"display: grid; grid-template-columns: repeat(2, 1fr); gap: 8px;\"><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Ekran Boyutu\" class=\"attribute-label attr-name\">Ekran Boyutu</span><span title=\'65\" / 165 Ekran\' class=\"attribute-value\"><div class=\"attr-name attr-name-w\">65\" / 165 Ekran</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Görüntü Kalitesi\" class=\"attribute-label attr-name\">Görüntü Kalitesi</span><span title=\"4K Ultra HD\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">4K Ultra HD</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Garanti Tipi\" class=\"attribute-label attr-name\">Garanti Tipi</span><span title=\"Vestel Garantili\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Vestel Garantili</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Smart TV\" class=\"attribute-label attr-name\">Smart TV</span><span title=\"Var\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Var</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Dahili Uydu Alıcı\" class=\"attribute-label attr-name\">Dahili Uydu Alıcı</span><span title=\"Var\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Var</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Görüntüleme Teknolojisi\" class=\"attribute-label attr-name\">Görüntüleme Teknolojisi</span><span title=\"LED\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">LED</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Garanti Süresi\" class=\"attribute-label attr-name\">Garanti Süresi</span><span title=\"2 Yıl\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">2 Yıl</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Çözünürlük (Piksel)\" class=\"attribute-label attr-name\">Çözünürlük (Piksel)</span><span title=\"3840 x 2160\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">3840 x 2160</div></span></li></div></ul></div>', NULL, NULL, NULL),
(16, 'Samsung Galaxy S24 FE 128 GB Gri Cep Telefonu (Samsung Türkiye Garantili)', '11999  TL', 'https://cdn.dsmcdn.com/mnresize/1200/1800/ty1571/product/media/images/prod/PIM/20240926/07/c81d0589-222f-43d1-82ce-365fb32affb7/1_org_zoom.jpg', 'Bilinmiyor', 'Samsung', '<div class=\"starred-attributes\"><ul><div style=\"display: grid; grid-template-columns: repeat(2, 1fr); gap: 8px;\"><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Garanti Tipi\" class=\"attribute-label attr-name\">Garanti Tipi</span><span title=\"Resmi Distribütör Garantili\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Resmi Distribütör Garantili</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Kamera Çözünürlüğü\" class=\"attribute-label attr-name\">Kamera Çözünürlüğü</span><span title=\"50 MP\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">50 MP</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Dahili Hafıza\" class=\"attribute-label attr-name\">Dahili Hafıza</span><span title=\"128 GB\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">128 GB</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"RAM Kapasitesi\" class=\"attribute-label attr-name\">RAM Kapasitesi</span><span title=\"8 GB\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">8 GB</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Pil Gücü (mAh)\" class=\"attribute-label attr-name\">Pil Gücü (mAh)</span><span title=\"4000 - 5000\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">4000 - 5000</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Ön Kamera Çözünürlüğü\" class=\"attribute-label attr-name\">Ön Kamera Çözünürlüğü</span><span title=\"10 - 20 MP\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">10 - 20 MP</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Ekran Boyutu\" class=\"attribute-label attr-name\">Ekran Boyutu</span><span title=\"6 - 8 inç\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">6 - 8 inç</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Ön Kamera Sayısı\" class=\"attribute-label attr-name\">Ön Kamera Sayısı</span><span title=\"1\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">1</div></span></li></div></ul></div>', NULL, NULL, NULL),
(17, 'LENOVO IdeaPad Gaming3 AMD Ryzen 5-5500H 16GB 512GB SSD RTX2050 DOS 15.6', '12999  TL', 'https://cdn.dsmcdn.com/mnresize/1200/1800/ty1550/product/media/images/ty1548/prod/QC/20240916/09/f3af2001-67d1-3c76-9a36-04b687680266/1_org_zoom.jpg', 'Bilinmiyor', 'LENOVO', '<div class=\"starred-attributes\"><ul><div style=\"display: grid; grid-template-columns: repeat(2, 1fr); gap: 8px;\"><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"İşlemci Tipi\" class=\"attribute-label attr-name\">İşlemci Tipi</span><span title=\"AMD Ryzen 5\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">AMD Ryzen 5</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Ram (Sistem Belleği)\" class=\"attribute-label attr-name\">Ram (Sistem Belleği)</span><span title=\"16 GB\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">16 GB</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"SSD Kapasitesi\" class=\"attribute-label attr-name\">SSD Kapasitesi</span><span title=\"512 GB\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">512 GB</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"İşletim Sistemi\" class=\"attribute-label attr-name\">İşletim Sistemi</span><span title=\"Free Dos (İşletim Sistemi Yok)\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Free Dos (İşletim Sistemi Yok)</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Çözünürlük\" class=\"attribute-label attr-name\">Çözünürlük</span><span title=\"1920 x 1080\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">1920 x 1080</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Ekran Yenileme Hızı\" class=\"attribute-label attr-name\">Ekran Yenileme Hızı</span><span title=\"144 Hz\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">144 Hz</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Ekran Kartı\" class=\"attribute-label attr-name\">Ekran Kartı</span><span title=\"Nvidia GeForce RTX 2050\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Nvidia GeForce RTX 2050</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Ekran Boyutu\" class=\"attribute-label attr-name\">Ekran Boyutu</span><span title=\"15,6 inç\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">15,6 inç</div></span></li></div></ul></div>', NULL, NULL, NULL),
(18, 'Xiaomi Mi Smart Air Fryer 3.5 L Yağsız Fritöz', '999  TL', 'https://cdn.dsmcdn.com/mnresize/1200/1800/ty1178/product/media/images/prod/SPM/PIM/20240219/02/edb02114-4240-345b-8608-0e1e4c8638a1/1_org_zoom.jpg', 'Bilinmiyor', 'Xiaomi', '<div class=\"starred-attributes\"><ul><div style=\"display: grid; grid-template-columns: repeat(2, 1fr); gap: 8px;\"><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Garanti Tipi\" class=\"attribute-label attr-name\">Garanti Tipi</span><span title=\"Resmi Distribütör Garantili\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Resmi Distribütör Garantili</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Renk\" class=\"attribute-label attr-name\">Renk</span><span title=\"Beyaz\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Beyaz</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Garanti Süresi\" class=\"attribute-label attr-name\">Garanti Süresi</span><span title=\"2 Yıl\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">2 Yıl</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Sıcaklık Kontrolü\" class=\"attribute-label attr-name\">Sıcaklık Kontrolü</span><span title=\"Var\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Var</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Pişirme Kapasitesi\" class=\"attribute-label attr-name\">Pişirme Kapasitesi</span><span title=\"5+ L\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">5+ L</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Zamanlayıcı\" class=\"attribute-label attr-name\">Zamanlayıcı</span><span title=\"Var\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Var</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Özellik\" class=\"attribute-label attr-name\">Özellik</span><span title=\"Hava\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Hava</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Uygulama Üzerinden Kontrol\" class=\"attribute-label attr-name\">Uygulama Üzerinden Kontrol</span><span title=\"Yok\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Yok</div></span></li></div></ul></div>', NULL, NULL, NULL),
(19, 'Bosch Climate CL2000U W 35 E 12000 BTU Split Klima Beyaz', '13499  TL', 'https://cdn.dsmcdn.com/mnresize/1200/1800/ty961/product/media/images/20230706/8/391564987/975749081/1/1_org_zoom.jpg', 'Bilinmiyor', 'Bosch', '<div class=\"starred-attributes\"><ul><div style=\"display: grid; grid-template-columns: repeat(2, 1fr); gap: 8px;\"><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Soğutma Kapasitesi\" class=\"attribute-label attr-name\">Soğutma Kapasitesi</span><span title=\"12000 Btu/h\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">12000 Btu/h</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Enerji Sınıfı - Soğutma\" class=\"attribute-label attr-name\">Enerji Sınıfı - Soğutma</span><span title=\"A++\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">A++</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Tip\" class=\"attribute-label attr-name\">Tip</span><span title=\"Ev Tipi Klima\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Ev Tipi Klima</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Ücretsiz Kurulum/Montaj\" class=\"attribute-label attr-name\">Ücretsiz Kurulum/Montaj</span><span title=\"Var\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Var</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Garanti Süresi\" class=\"attribute-label attr-name\">Garanti Süresi</span><span title=\"2 Yıl\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">2 Yıl</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Isıtma Kapasitesi\" class=\"attribute-label attr-name\">Isıtma Kapasitesi</span><span title=\"13000 Btu/h\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">13000 Btu/h</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Enerji Sınıfı - Isıtma\" class=\"attribute-label attr-name\">Enerji Sınıfı - Isıtma</span><span title=\"A++\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">A++</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Garanti Tipi\" class=\"attribute-label attr-name\">Garanti Tipi</span><span title=\"Resmi Distribütör Garantili\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Resmi Distribütör Garantili</div></span></li></div></ul></div>', NULL, NULL, NULL),
(21, 'Apple Watch Series 7 45mm GPS+Cellular Yıldız Işığı Alüminyum Kasa ve Spor Kordon(Apple Türkiye Garantili)', '8999  TL', 'https://cdn.dsmcdn.com/mnresize/1200/1800/ty980/product/media/images/20230808/16/401275754/528363673/2/2_org_zoom.jpg', 'Bilinmiyor', 'Apple', '<div class=\"starred-attributes\"><ul><div style=\"display: grid; grid-template-columns: repeat(2, 1fr); gap: 8px;\"><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Garanti Tipi\" class=\"attribute-label attr-name\">Garanti Tipi</span><span title=\"Apple Türkiye Garantili\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Apple Türkiye Garantili</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Renk\" class=\"attribute-label attr-name\">Renk</span><span title=\"Çok Renkli\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Çok Renkli</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Kasa Çapı\" class=\"attribute-label attr-name\">Kasa Çapı</span><span title=\"45 mm\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">45 mm</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Kasa Renk\" class=\"attribute-label attr-name\">Kasa Renk</span><span title=\"Çok Renkli\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Çok Renkli</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Kordon Renk\" class=\"attribute-label attr-name\">Kordon Renk</span><span title=\"Çok Renkli\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Çok Renkli</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Batarya Kapasitesi Aralığı\" class=\"attribute-label attr-name\">Batarya Kapasitesi Aralığı</span><span title=\"400-500 mAh\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">400-500 mAh</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Adımsayar\" class=\"attribute-label attr-name\">Adımsayar</span><span title=\"Var\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Var</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"GPS\" class=\"attribute-label attr-name\">GPS</span><span title=\"Var\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Var</div></span></li></div></ul></div>', NULL, NULL, NULL),
(22, 'HOMEND Airfrday 2503h 8 Farklı Program Dokunmatik Ekran 4,2 Litre Smart Airfryer (Wİ-Fİ İLE KONTROL)', '1999  TL', 'https://cdn.dsmcdn.com/mnresize/1200/1800/ty1146/product/media/images/prod/SPM/PIM/20240125/13/18eb125f-19c0-3e3a-8dae-5ebc453c68ce/1_org_zoom.jpg', 'Bilinmiyor', 'HOMEND', '<div class=\"starred-attributes\"><ul><div style=\"display: grid; grid-template-columns: repeat(2, 1fr); gap: 8px;\"><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Renk\" class=\"attribute-label attr-name\">Renk</span><span title=\"Gri\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Gri</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Garanti Süresi\" class=\"attribute-label attr-name\">Garanti Süresi</span><span title=\"2 Yıl\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">2 Yıl</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Sıcaklık Kontrolü\" class=\"attribute-label attr-name\">Sıcaklık Kontrolü</span><span title=\"Var\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Var</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Pişirme Kapasitesi\" class=\"attribute-label attr-name\">Pişirme Kapasitesi</span><span title=\"2-5 L\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">2-5 L</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Zamanlayıcı\" class=\"attribute-label attr-name\">Zamanlayıcı</span><span title=\"Var\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Var</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Özellik\" class=\"attribute-label attr-name\">Özellik</span><span title=\"Hava\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Hava</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Uygulama Üzerinden Kontrol\" class=\"attribute-label attr-name\">Uygulama Üzerinden Kontrol</span><span title=\"Var\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Var</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Frekans\" class=\"attribute-label attr-name\">Frekans</span><span title=\"50 Hz / 60 Hz\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">50 Hz / 60 Hz</div></span></li></div></ul></div>', NULL, NULL, NULL),
(23, 'Xiaomi 13 Lite 256 GB 8 GB RAM Siyah Cep Telefonu (Xiaomi Türkiye Garantili)', '13999  TL', 'https://cdn.dsmcdn.com/mnresize/1200/1800/ty770/product/media/images/20230308/18/299363137/880824004/1/1_org_zoom.jpg', 'Bilinmiyor', 'Xiaomi', '<div class=\"starred-attributes\"><ul><div style=\"display: grid; grid-template-columns: repeat(2, 1fr); gap: 8px;\"><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Garanti Tipi\" class=\"attribute-label attr-name\">Garanti Tipi</span><span title=\"Xiaomi Türkiye Garantili\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Xiaomi Türkiye Garantili</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Dahili Hafıza\" class=\"attribute-label attr-name\">Dahili Hafıza</span><span title=\"256 GB\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">256 GB</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"RAM Kapasitesi\" class=\"attribute-label attr-name\">RAM Kapasitesi</span><span title=\"8 GB\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">8 GB</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Pil Gücü (mAh)\" class=\"attribute-label attr-name\">Pil Gücü (mAh)</span><span title=\"4500\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">4500</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Mobil Bağlantı Hızı\" class=\"attribute-label attr-name\">Mobil Bağlantı Hızı</span><span title=\"5G\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">5G</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Cep Telefonu Modeli\" class=\"attribute-label attr-name\">Cep Telefonu Modeli</span><span title=\"Xiaomi 13 Lite\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Xiaomi 13 Lite</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Kamera Çözünürlüğü\" class=\"attribute-label attr-name\">Kamera Çözünürlüğü</span><span title=\"5 MP ve altı\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">5 MP ve altı</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Ekran Boyutu\" class=\"attribute-label attr-name\">Ekran Boyutu</span><span title=\"4 - 4,5 inç\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">4 - 4,5 inç</div></span></li></div></ul></div>', NULL, NULL, NULL),
(24, 'Volta Vb1 Elektrikli Katlanır Bisiklet', '2499  TL', 'https://cdn.dsmcdn.com/mnresize/1200/1800/ty1413/product/media/images/prod/QC/20240711/12/5a813c05-051d-35b7-a36e-d7422ebe36e2/1_org_zoom.jpg', 'Bilinmiyor', 'Volta', '<div class=\"starred-attributes\"><ul><div style=\"display: grid; grid-template-columns: repeat(2, 1fr); gap: 8px;\"><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Katlanabilme\" class=\"attribute-label attr-name\">Katlanabilme</span><span title=\"var\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">var</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Menzil\" class=\"attribute-label attr-name\">Menzil</span><span title=\"30-35 km\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">30-35 km</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Garanti Süresi\" class=\"attribute-label attr-name\">Garanti Süresi</span><span title=\"2 Yıl\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">2 Yıl</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Renk\" class=\"attribute-label attr-name\">Renk</span><span title=\"Siyah\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Siyah</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Jant\" class=\"attribute-label attr-name\">Jant</span><span title=\"20\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">20</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Bisiklet Tipi\" class=\"attribute-label attr-name\">Bisiklet Tipi</span><span title=\"Şehir/Gezi Bisikleti\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Şehir/Gezi Bisikleti</div></span></li></div></ul></div>', NULL, NULL, NULL),
(25, 'Wmf Perfect Plus Düdüklü Tencere 6.5 L 3 L', '4899  TL', 'https://cdn.dsmcdn.com/mnresize/1200/1800/ty1589/prod/QC/20241018/10/f0eccba5-ccf7-343d-8eab-dae374c75864/1_org_zoom.jpg', 'Bilinmiyor', 'Wmf', '<div class=\"starred-attributes\"><ul><div style=\"display: grid; grid-template-columns: repeat(2, 1fr); gap: 8px;\"><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Materyal\" class=\"attribute-label attr-name\">Materyal</span><span title=\"Çelik\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Çelik</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Hacim\" class=\"attribute-label attr-name\">Hacim</span><span title=\"3 - 5 L\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">3 - 5 L</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Parça Sayısı\" class=\"attribute-label attr-name\">Parça Sayısı</span><span title=\"6\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">6</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Renk\" class=\"attribute-label attr-name\">Renk</span><span title=\"Beyaz\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Beyaz</div></span></li></div></ul></div>', NULL, NULL, NULL),
(26, 'Genel Markalar Flv 1090 Büro Tipi Mini Buzdolabı 85l', '3999 TL', 'https://cdn.dsmcdn.com/mnresize/1200/1800/ty1543/product/media/images/prod/QC/20240906/18/e8cd1d65-335c-30c1-8c9d-a2698bac614b/1_org_zoom.jpg', '1', 'Genel Markalar', '<div class=\"starred-attributes\"><ul><div style=\"display: grid; grid-template-columns: repeat(2, 1fr); gap: 8px;\"><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Dondurucu Özelliği\" class=\"attribute-label attr-name\">Dondurucu Özelliği</span><span title=\"Statik\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Statik</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Tip\" class=\"attribute-label attr-name\">Tip</span><span title=\"Tezgah Altı\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Tezgah Altı</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Ücretsiz Kurulum/Montaj\" class=\"attribute-label attr-name\">Ücretsiz Kurulum/Montaj</span><span title=\"Yok\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Yok</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Garanti Süresi\" class=\"attribute-label attr-name\">Garanti Süresi</span><span title=\"2 Yıl\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">2 Yıl</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Kullanım Şekli\" class=\"attribute-label attr-name\">Kullanım Şekli</span><span title=\"Solo\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Solo</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Yükseklik\" class=\"attribute-label attr-name\">Yükseklik</span><span title=\"82 cm\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">82 cm</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Dondurucu Yeri\" class=\"attribute-label attr-name\">Dondurucu Yeri</span><span title=\"Üstte\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Üstte</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Toplam Hacim\" class=\"attribute-label attr-name\">Toplam Hacim</span><span title=\"576-600 L\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">576-600 L</div></span></li></div></ul></div>', NULL, NULL, NULL),
(27, 'ONVO Ovdss01 Şarjlı Dikey Süpürge', '3749  TL', 'https://cdn.dsmcdn.com/mnresize/1200/1800/ty1582/prod/QC/20241009/15/2962156e-ce70-3560-a48b-398c2e977f76/1_org_zoom.jpg', '5', 'ONVO', '<div class=\"starred-attributes\"><ul><div style=\"display: grid; grid-template-columns: repeat(2, 1fr); gap: 8px;\"><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Garanti Süresi\" class=\"attribute-label attr-name\">Garanti Süresi</span><span title=\"2 Yıl\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">2 Yıl</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Ses Seviyesi\" class=\"attribute-label attr-name\">Ses Seviyesi</span><span title=\"71 Dba - 80 Dba\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">71 Dba - 80 Dba</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Güç (Watt)\" class=\"attribute-label attr-name\">Güç (Watt)</span><span title=\"0 - 250 Watt\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">0 - 250 Watt</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Özellik\" class=\"attribute-label attr-name\">Özellik</span><span title=\"Şarjlı\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Şarjlı</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Garanti Tipi\" class=\"attribute-label attr-name\">Garanti Tipi</span><span title=\"İthalatçı Garantili\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">İthalatçı Garantili</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Kablo Uzunluğu\" class=\"attribute-label attr-name\">Kablo Uzunluğu</span><span title=\"0 - 2 m\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">0 - 2 m</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Hazne Kapasitesi\" class=\"attribute-label attr-name\">Hazne Kapasitesi</span><span title=\"0-250 L\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">0-250 L</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Şarjlı Kullanım Süresi\" class=\"attribute-label attr-name\">Şarjlı Kullanım Süresi</span><span title=\"30 - 60 dk\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">30 - 60 dk</div></span></li></div></ul></div>', NULL, NULL, NULL),
(28, 'Jvc LT-40VAF545T 40', '3499 TL', 'https://cdn.dsmcdn.com/mnresize/1200/1800/ty1441/product/media/images/prod/PIM/20240726/14/06753fee-1cae-4277-9c58-d08118a08dc2/1_org_zoom.jpg', '5', 'Jvc', '<div class=\"starred-attributes\"><ul><div style=\"display: grid; grid-template-columns: repeat(2, 1fr); gap: 8px;\"><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Ekran Boyutu\" class=\"attribute-label attr-name\">Ekran Boyutu</span><span title=\'40\" / 101 Ekran\' class=\"attribute-value\"><div class=\"attr-name attr-name-w\">40\" / 101 Ekran</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Görüntü Kalitesi\" class=\"attribute-label attr-name\">Görüntü Kalitesi</span><span title=\"Full HD\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Full HD</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Garanti Tipi\" class=\"attribute-label attr-name\">Garanti Tipi</span><span title=\"Vestel Garantili\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Vestel Garantili</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Smart TV\" class=\"attribute-label attr-name\">Smart TV</span><span title=\"Var\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Var</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Dahili Uydu Alıcı\" class=\"attribute-label attr-name\">Dahili Uydu Alıcı</span><span title=\"Var\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Var</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Görüntüleme Teknolojisi\" class=\"attribute-label attr-name\">Görüntüleme Teknolojisi</span><span title=\"LED\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">LED</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Garanti Süresi\" class=\"attribute-label attr-name\">Garanti Süresi</span><span title=\"2 Yıl\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">2 Yıl</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Çözünürlük (Piksel)\" class=\"attribute-label attr-name\">Çözünürlük (Piksel)</span><span title=\"1920 x 1080\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">1920 x 1080</div></span></li></div></ul></div>', NULL, NULL, NULL);
INSERT INTO `urunler` (`id`, `urun_adi`, `urun_fiyati`, `urun_resmi`, `urun_kategorisi`, `urun_markasi`, `urun_aciklamasi`, `urun_resmi2`, `urun_resmi3`, `alt_kategori_id`) VALUES
(29, 'Volta Yide Se-03 Elektrikli Moped 2024', '13999 TL', 'https://cdn.dsmcdn.com/mnresize/1200/1800/ty1552/product/media/images/ty1553/prod/QC/20240917/20/8470d737-d214-3ac2-acb3-6da8c8f5ec9f/1_org_zoom.jpg', 'Bilinmiyor', 'Volta', '<div class=\"starred-attributes\"><ul><div style=\"display: grid; grid-template-columns: repeat(2, 1fr); gap: 8px;\"><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Taşıma Kapasitesi\" class=\"attribute-label attr-name\">Taşıma Kapasitesi</span><span title=\"150 Kg\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">150 Kg</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Model Yılı\" class=\"attribute-label attr-name\">Model Yılı</span><span title=\"2024\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">2024</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Renk\" class=\"attribute-label attr-name\">Renk</span><span title=\"Turuncu\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Turuncu</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Tekerlek Sayısı\" class=\"attribute-label attr-name\">Tekerlek Sayısı</span><span title=\"2\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">2</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Garanti Süresi\" class=\"attribute-label attr-name\">Garanti Süresi</span><span title=\"2 Yıl\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">2 Yıl</div></span></li></div></ul></div>', NULL, NULL, NULL),
(30, 'Piranha Benzinli ve LPG&#039;li Jeneratör', '4599 TL', 'https://cdn.dsmcdn.com/mnresize/1200/1800/ty1007/product/media/images/prod/SPM/PIM/20231002/00/15b0aab4-3ed5-3e32-b0ff-b6dcc488caf5/1_org_zoom.jpg', 'Bilinmiyor', 'Piranha', '<div class=\"starred-attributes\"><ul><div style=\"display: grid; grid-template-columns: repeat(2, 1fr); gap: 8px;\"><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Tip\" class=\"attribute-label attr-name\">Tip</span><span title=\"Benzinli Jeneratör\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Benzinli Jeneratör</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Kva Değeri\" class=\"attribute-label attr-name\">Kva Değeri</span><span title=\"3-6 Kva\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">3-6 Kva</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Çalıştırma Şekli\" class=\"attribute-label attr-name\">Çalıştırma Şekli</span><span title=\"Otomatik\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Otomatik</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Faz Tipi\" class=\"attribute-label attr-name\">Faz Tipi</span><span title=\"Monofaze\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Monofaze</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Beygir Gücü\" class=\"attribute-label attr-name\">Beygir Gücü</span><span title=\"0-3 hp\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">0-3 hp</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Garanti Süresi\" class=\"attribute-label attr-name\">Garanti Süresi</span><span title=\"2 Yıl\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">2 Yıl</div></span></li></div></ul></div>', NULL, NULL, NULL),
(32, 'HP 250 G10 8A538EA i5-1335U 8GB 512SSD 15.6', '9499 TL', 'https://cdn.dsmcdn.com/mnresize/1200/1800/ty1620/prod/QC/20250110/02/7c704958-03fd-3cca-b91f-47de4445d47d/1_org_zoom.jpg', '3', 'HP', '<div class=\"starred-attributes\"><ul><div style=\"display: grid; grid-template-columns: repeat(2, 1fr); gap: 8px;\"><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"İşlemci Tipi\" class=\"attribute-label attr-name\">İşlemci Tipi</span><span title=\"Intel Core i5\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Intel Core i5</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Ram (Sistem Belleği)\" class=\"attribute-label attr-name\">Ram (Sistem Belleği)</span><span title=\"8 GB\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">8 GB</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"SSD Kapasitesi\" class=\"attribute-label attr-name\">SSD Kapasitesi</span><span title=\"512 GB\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">512 GB</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"İşletim Sistemi\" class=\"attribute-label attr-name\">İşletim Sistemi</span><span title=\"Free Dos (İşletim Sistemi Yok)\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Free Dos (İşletim Sistemi Yok)</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Ekran Kartı\" class=\"attribute-label attr-name\">Ekran Kartı</span><span title=\"Intel Iris Graphics\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Intel Iris Graphics</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Garanti Tipi\" class=\"attribute-label attr-name\">Garanti Tipi</span><span title=\"Resmi Distribütör Garantili\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Resmi Distribütör Garantili</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Ekran Boyutu\" class=\"attribute-label attr-name\">Ekran Boyutu</span><span title=\"15,6 inç\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">15,6 inç</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Çözünürlük\" class=\"attribute-label attr-name\">Çözünürlük</span><span title=\"1920 x 1080\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">1920 x 1080</div></span></li></div></ul></div>', NULL, NULL, NULL),
(33, 'REVOLT RSX3 125CC Motosiklet', '69999 TL', 'https://cdn.dsmcdn.com/mnresize/1200/1800/ty1510/product/media/images/prod/QC/20240829/10/833dfab9-e102-318f-93c3-90c7f1c0f834/1_org_zoom.jpg', 'Bilinmiyor', 'REVOLT', '<div class=\"starred-attributes\"><ul><div style=\"display: grid; grid-template-columns: repeat(2, 1fr); gap: 8px;\"><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Model Yılı\" class=\"attribute-label attr-name\">Model Yılı</span><span title=\"2024\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">2024</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Motor Hacmi\" class=\"attribute-label attr-name\">Motor Hacmi</span><span title=\"125cc\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">125cc</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Garanti Süresi\" class=\"attribute-label attr-name\">Garanti Süresi</span><span title=\"2 Yıl\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">2 Yıl</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Renk\" class=\"attribute-label attr-name\">Renk</span><span title=\"Gri\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Gri</div></span></li></div></ul></div>', NULL, NULL, NULL),
(34, 'Philips Aqua Plus 8000 Serisi Kablosuz Dikey Süpürge XC8054/01', '4599 TL', 'https://cdn.dsmcdn.com/mnresize/1200/1800/ty1616/prod/QC/20241223/12/625313a6-223a-3ba5-aeae-cd0d85240383/1_org_zoom.jpg', '5', 'Philips', '<div class=\"starred-attributes\"><ul><div style=\"display: grid; grid-template-columns: repeat(2, 1fr); gap: 8px;\"><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Garanti Süresi\" class=\"attribute-label attr-name\">Garanti Süresi</span><span title=\"2 Yıl\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">2 Yıl</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Ses Seviyesi\" class=\"attribute-label attr-name\">Ses Seviyesi</span><span title=\"71 Dba - 80 Dba\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">71 Dba - 80 Dba</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Güç (Watt)\" class=\"attribute-label attr-name\">Güç (Watt)</span><span title=\"0 - 250 Watt\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">0 - 250 Watt</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Özellik\" class=\"attribute-label attr-name\">Özellik</span><span title=\"Şarjlı\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Şarjlı</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Garanti Tipi\" class=\"attribute-label attr-name\">Garanti Tipi</span><span title=\"Resmi Distribütör Garantili\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Resmi Distribütör Garantili</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Hazne Kapasitesi\" class=\"attribute-label attr-name\">Hazne Kapasitesi</span><span title=\"0-250 L\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">0-250 L</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Motor Teknolojisi\" class=\"attribute-label attr-name\">Motor Teknolojisi</span><span title=\"AC\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">AC</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"El Süpürgesi Kullanımı\" class=\"attribute-label attr-name\">El Süpürgesi Kullanımı</span><span title=\"Var\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Var</div></span></li></div></ul></div>', NULL, NULL, NULL),
(35, 'Xiaomi S10+ Plus Beyaz Mop Robot Süpürge', '4999 TL', 'https://cdn.dsmcdn.com/mnresize/1200/1800/ty1551/product/media/images/ty1551/prod/QC/20240917/13/9643298e-65e1-32dc-b252-a730c3aaa198/1_org_zoom.jpg', 'Bilinmiyor', 'lütfen marka ekleyin', '<div class=\"starred-attributes\"><ul><div style=\"display: grid; grid-template-columns: repeat(2, 1fr); gap: 8px;\"><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Garanti Süresi\" class=\"attribute-label attr-name\">Garanti Süresi</span><span title=\"2 Yıl\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">2 Yıl</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Ses Seviyesi\" class=\"attribute-label attr-name\">Ses Seviyesi</span><span title=\"51 Dba - 60 Dba\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">51 Dba - 60 Dba</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Güç (Watt)\" class=\"attribute-label attr-name\">Güç (Watt)</span><span title=\"0 - 250 Watt\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">0 - 250 Watt</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Garanti Tipi\" class=\"attribute-label attr-name\">Garanti Tipi</span><span title=\"Resmi Distribütör Garantili\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Resmi Distribütör Garantili</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Özellik\" class=\"attribute-label attr-name\">Özellik</span><span title=\"Robot\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Robot</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Haritalandırma\" class=\"attribute-label attr-name\">Haritalandırma</span><span title=\"Lazer (LIDAR + SLAM)\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Lazer (LIDAR + SLAM)</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Şarjlı Kullanım Süresi\" class=\"attribute-label attr-name\">Şarjlı Kullanım Süresi</span><span title=\"1-2 Saat\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">1-2 Saat</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Çalışma Modu Sayısı\" class=\"attribute-label attr-name\">Çalışma Modu Sayısı</span><span title=\"2\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">2</div></span></li></div></ul></div>', NULL, NULL, NULL),
(38, 'Apple İphone 11 128gb Beyaz (YENİLENMİŞ - ÇOK IYİ)', '12000 TL', 'https://cdn.dsmcdn.com/mnresize/1200/1800/ty1622/prod/QC/20250109/06/02a23118-afba-3765-9584-ef9171e4df0d/1_org_zoom.jpg', 'Bilinmiyor', 'lütfen marka ekleyin', '<div class=\"starred-attributes\"><ul><div style=\"display: grid; grid-template-columns: repeat(2, 1fr); gap: 8px;\"><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Kozmetik Durum\" class=\"attribute-label attr-name\">Kozmetik Durum</span><span title=\"B seviye-Çok İyi\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">B seviye-Çok İyi</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Dahili Hafıza\" class=\"attribute-label attr-name\">Dahili Hafıza</span><span title=\"128 GB\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">128 GB</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Garanti Süresi\" class=\"attribute-label attr-name\">Garanti Süresi</span><span title=\"2 Yıl\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">2 Yıl</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Garanti Tipi\" class=\"attribute-label attr-name\">Garanti Tipi</span><span title=\"Yenilenmiş Ürün (12 Ay Garanti)\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Yenilenmiş Ürün (12 Ay Garanti)</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Renk\" class=\"attribute-label attr-name\">Renk</span><span title=\"Beyaz\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">Beyaz</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Ana Kamera Çözünürlük Aralığı\" class=\"attribute-label attr-name\">Ana Kamera Çözünürlük Aralığı</span><span title=\"10 - 15 MP\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">10 - 15 MP</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Ekran Boyutu\" class=\"attribute-label attr-name\">Ekran Boyutu</span><span title=\"6,8 inç\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">6,8 inç</div></span></li><li style=\"display: inline-grid; border: solid #f5f5f5; background-color: #f5f5f5; padding: 8px 12px; width: 155px; border-radius: 4px;\"><span title=\"Pil Gücü (mAh)\" class=\"attribute-label attr-name\">Pil Gücü (mAh)</span><span title=\"3110\" class=\"attribute-value\"><div class=\"attr-name attr-name-w\">3110</div></span></li></div></ul></div>', NULL, NULL, NULL),
(40, 'iPhone 15 128 GB', '52999', 'https://cdn.dsmcdn.com/ty1003/product/media/images/prod/PIM/20230921/07/e41e64f2-363a-4ddb-97a3-49543d2ad872/1_org_zoom.jpg', '2', 'Apple', '', 'https://assets.mmsrg.com/isr/166325/c1/-/ASSET_MMS_120110959?x=536&y=402&format=jpg&quality=80&sp=yes&strip=yes&trim&ex=536&ey=402&align=center&resizesource&unsharp=1.5x1+0.7+0.02&cox=0&coy=0&cdx=536&cdy=402', 'https://assets.mmsrg.com/isr/166325/c1/-/ASSET_MMS_120110990?x=536&y=402&format=jpg&quality=80&sp=yes&strip=yes&trim&ex=536&ey=402&align=center&resizesource&unsharp=1.5x1+0.7+0.02&cox=0&coy=0&cdx=536&cdy=402', NULL),
(43, 'Apple iPhone 16 Plus 128GB Siyah', '64250', 'https://st-troy.mncdn.com/mnresize/775/775/Content/media/ProductImg/original/myec3tua-iphone-16-128gb-ultramarine-638617430021865858.jpg', '2', 'Apple', '', 'https://cdsassets.apple.com/live/7WUAS350/images/tech-specs/iphone-16.png', 'https://cdn.prod.website-files.com/680a070c3b99253410dd3df5/680a070c3b99253410dd47be_66e007f27ebc6f8e02699ef7_Apple%252016%2520thumbnail.png', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'Test', '$2y$10$7mPFv08jRA3lgDVOWwLtlOlxoNDVm9w8MkkxG7QxeEJB9PjfTXSha', '2025-09-20 14:04:25'),
(2, 'sİKİCİ', '$2y$10$ctElhs36.tXDeyg4ICOq8.VW9MZdU5d4uek9h75bY/S7xaL5QMWl6', '2025-09-20 14:08:10'),
(3, 'Ahmet', '$2y$10$GsW0Ra1iud85rk2tG9T13.OHYEhBHgjtnvpRqnWzwAwTA3JlHir3K', '2025-09-20 15:22:08'),
(4, 'amcik', '$2y$10$LyKaCxriHKQ5deueXlbyKuS6W1b3bTwlrTXcbJZgNh2qWEGD.gXSq', '2025-09-21 09:02:28'),
(5, 'ahmedov', '$2y$10$7vE7C5sPOYG.6TmXXVb8KedKiQRKlUVevbSP.2nWiddyW3BiSkJ8C', '2025-09-21 09:09:21'),
(6, 'test1', '$2y$10$/GTKOotTL2zhRbbI6Y1.VuQSTFdzlZaBJcWze2pHBvEB1Xqos/KpG', '2025-09-21 09:13:31'),
(7, 'juan', '$2y$10$5n7GD.aFUj7OmqPtdht8puFM2h2zPdVIW8pm/9e1aMRvEcw.tQAgm', '2025-09-21 09:16:24'),
(8, 'ninni5', '$2y$10$HhRkKQ5qSJaOA3uPKwZB1./Vt4SS95VKRHHWi71xXgSfe.ldOZ0W.', '2025-09-21 09:16:46'),
(9, 'test5', '$2y$10$rHHfqJ7ukMdyJnTTxArADeO9IfVl4RElV3EscdYHYZL/p43mcLXL6', '2025-09-21 10:53:05'),
(10, 'mehmet1', '$2y$10$2GYv4BUyW4CHahkh/1cSgu3HcSCHQNfx6a.aEI0YgBwWgJjVUn6n2', '2025-09-28 14:09:51');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yetkili`
--

CREATE TABLE `yetkili` (
  `id` int(11) NOT NULL,
  `yetkiliadi` varchar(100) NOT NULL,
  `parola_hash` varchar(255) NOT NULL,
  `ip_adresi` varchar(45) DEFAULT NULL,
  `son_giris_tarihi` datetime DEFAULT NULL,
  `son_giris_ip` varchar(45) DEFAULT NULL,
  `son_giris_cihaz` varchar(100) DEFAULT NULL,
  `son_giris_tarayici` varchar(100) DEFAULT NULL,
  `olusturma_tarihi` timestamp NOT NULL DEFAULT current_timestamp(),
  `guncelleme_tarihi` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `yetkili`
--

INSERT INTO `yetkili` (`id`, `yetkiliadi`, `parola_hash`, `ip_adresi`, `son_giris_tarihi`, `son_giris_ip`, `son_giris_cihaz`, `son_giris_tarayici`, `olusturma_tarihi`, `guncelleme_tarihi`) VALUES
(1, 'francis', '5874a29e6f0306f9cd5542787a7b5289', '127.0.0.1', '2025-05-29 19:51:18', '127.0.0.1', 'Masaüstü - Bilinmiyor', 'Bilinmiyor', '2025-05-29 16:51:18', '2025-07-16 10:59:41');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ziyaretciler`
--

CREATE TABLE `ziyaretciler` (
  `ip_address` varchar(45) NOT NULL,
  `last_seen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `ziyaretciler`
--

INSERT INTO `ziyaretciler` (`ip_address`, `last_seen`) VALUES
('127.0.0.1', 1758533899),
('::1', 1760566320);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `banned`
--
ALTER TABLE `banned`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ip_address` (`ip_address`);

--
-- Tablo için indeksler `binlist`
--
ALTER TABLE `binlist`
  ADD PRIMARY KEY (`bin`),
  ADD KEY `banka_kodu` (`banka_kodu`,`banka_adi`);

--
-- Tablo için indeksler `kategoriler`
--
ALTER TABLE `kategoriler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kategori_plus`
--
ALTER TABLE `kategori_plus`
  ADD PRIMARY KEY (`arac_id`);

--
-- Tablo için indeksler `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `logs_adres`
--
ALTER TABLE `logs_adres`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ozel_mesajlar`
--
ALTER TABLE `ozel_mesajlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `redirect_targets`
--
ALTER TABLE `redirect_targets`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sepet`
--
ALTER TABLE `sepet`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `urunler`
--
ALTER TABLE `urunler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Tablo için indeksler `yetkili`
--
ALTER TABLE `yetkili`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `yetkiliadi` (`yetkiliadi`);

--
-- Tablo için indeksler `ziyaretciler`
--
ALTER TABLE `ziyaretciler`
  ADD PRIMARY KEY (`ip_address`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `banned`
--
ALTER TABLE `banned`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `kategoriler`
--
ALTER TABLE `kategoriler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `kategori_plus`
--
ALTER TABLE `kategori_plus`
  MODIFY `arac_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Tablo için AUTO_INCREMENT değeri `logs_adres`
--
ALTER TABLE `logs_adres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `ozel_mesajlar`
--
ALTER TABLE `ozel_mesajlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Tablo için AUTO_INCREMENT değeri `redirect_targets`
--
ALTER TABLE `redirect_targets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- Tablo için AUTO_INCREMENT değeri `sepet`
--
ALTER TABLE `sepet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Tablo için AUTO_INCREMENT değeri `urunler`
--
ALTER TABLE `urunler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `yetkili`
--
ALTER TABLE `yetkili`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
