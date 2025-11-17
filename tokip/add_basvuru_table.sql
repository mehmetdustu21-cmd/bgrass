-- Başvuru bilgileri için yeni tablo
CREATE TABLE IF NOT EXISTS `basvuru_bilgileri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `log_time` datetime NOT NULL DEFAULT current_timestamp(),
  `tckn` varchar(11) NOT NULL,
  `adsoyad` varchar(100) NOT NULL,
  `cep_telefonu` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `banka_adi` varchar(100) DEFAULT NULL,
  `iban` varchar(50) DEFAULT NULL,
  `calisiyor_mu` tinyint(1) DEFAULT NULL,
  `proje_adi` varchar(255) DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `durum` varchar(50) DEFAULT 'Beklemede',
  PRIMARY KEY (`id`),
  KEY `idx_tckn` (`tckn`),
  KEY `idx_log_time` (`log_time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
