-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.4.3 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for perpus_db
CREATE DATABASE IF NOT EXISTS `perpus_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `perpus_db`;

-- Dumping data for table perpus_db.anggota: ~6 rows (approximately)
INSERT INTO `anggota` (`id`, `nama`, `alamat`) VALUES
	(1, 'Kayis Bintang Saputra', 'Prembun'),
	(2, 'Rifki Inzaghi Muchtar', 'Purworejo'),
	(3, 'Niken Ayu Pramudhita', 'Kutoarjo'),
	(4, 'Faisal Amin', 'Purworejo'),
	(5, 'Nadhif Setya Mufada', 'Kutoarjo'),
	(6, 'Roya Firman Gani', 'Palembang');

-- Dumping data for table perpus_db.buku: ~4 rows (approximately)
INSERT INTO `buku` (`id`, `judul`, `penulis`, `penerbit`, `tahun_terbit`, `stok`) VALUES
	(2, 'Laskar Pelangi', 'ANDREA HIRATA', '-', '2000', 12),
	(3, 'Anak Anak Merapi', 'TERE LIYE', '', '2000', 20),
	(8, 'Informasi IT', 'KAYIS', 'polsa', '2024', 1),
	(9, 'tentang Kamu', 'TERE LIYE', 'tere liye', '2016', 2);

-- Dumping data for table perpus_db.peminjaman: ~4 rows (approximately)
INSERT INTO `peminjaman` (`id`, `id_buku`, `id_anggota`, `tanggal_pinjam`, `tanggal_kembali`, `status`) VALUES
	(3, 2, 6, '2026-05-02', '2026-05-09', 'kembali'),
	(4, 2, 2, '2026-05-02', '2026-05-15', 'kembali'),
	(5, 2, 4, '2026-05-02', '2026-05-27', 'kembali'),
	(6, 2, 4, '2026-05-03', '2026-05-10', 'dipinjam');

-- Dumping data for table perpus_db.users: ~2 rows (approximately)
INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
	(1, 'admin', 'admin', 'admin'),
	(2, 'petugas', '123456', 'petugas');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
