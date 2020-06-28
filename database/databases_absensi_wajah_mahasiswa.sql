-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.21 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table databases_2019_absensi_wajah_mahasiswa.data_absensi
CREATE TABLE IF NOT EXISTS `data_absensi` (
  `id_absensi` varchar(12) NOT NULL,
  `id_jadwal` varchar(12) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` varchar(10) NOT NULL,
  `id_mahasiswa` varchar(20) NOT NULL,
  `status` varchar(100) NOT NULL,
  `jenis_absensi` enum('masuk','keluar') NOT NULL,
  PRIMARY KEY (`id_absensi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table databases_2019_absensi_wajah_mahasiswa.data_absensi: ~0 rows (approximately)
/*!40000 ALTER TABLE `data_absensi` DISABLE KEYS */;
INSERT INTO `data_absensi` (`id_absensi`, `id_jadwal`, `tanggal`, `jam`, `id_mahasiswa`, `status`, `jenis_absensi`) VALUES
	('ABS001', 'JAD1905003', '2019-10-02', '07:26:14am', 'GUR1906001', 'hadir', 'masuk');
/*!40000 ALTER TABLE `data_absensi` ENABLE KEYS */;

-- Dumping structure for table databases_2019_absensi_wajah_mahasiswa.data_admin
CREATE TABLE IF NOT EXISTS `data_admin` (
  `id_admin` varchar(12) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table databases_2019_absensi_wajah_mahasiswa.data_admin: ~0 rows (approximately)
/*!40000 ALTER TABLE `data_admin` DISABLE KEYS */;
INSERT INTO `data_admin` (`id_admin`, `username`, `password`) VALUES
	('ADM001', 'admin', '21232f297a57a5a743894a0e4a801fc3');
/*!40000 ALTER TABLE `data_admin` ENABLE KEYS */;

-- Dumping structure for table databases_2019_absensi_wajah_mahasiswa.data_aplikasi
CREATE TABLE IF NOT EXISTS `data_aplikasi` (
  `id_aplikasi` varchar(15) NOT NULL,
  `nama_aplikasi` varchar(100) NOT NULL,
  `objek` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table databases_2019_absensi_wajah_mahasiswa.data_aplikasi: ~0 rows (approximately)
/*!40000 ALTER TABLE `data_aplikasi` DISABLE KEYS */;
INSERT INTO `data_aplikasi` (`id_aplikasi`, `nama_aplikasi`, `objek`) VALUES
	('APL1906001', 'ABSENSI WAJAH', 'STMIK NUSA MANDIRI');
/*!40000 ALTER TABLE `data_aplikasi` ENABLE KEYS */;

-- Dumping structure for table databases_2019_absensi_wajah_mahasiswa.data_jadwal
CREATE TABLE IF NOT EXISTS `data_jadwal` (
  `id_jadwal` varchar(12) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `jam_masuk` varchar(20) NOT NULL,
  `jam_keluar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table databases_2019_absensi_wajah_mahasiswa.data_jadwal: ~6 rows (approximately)
/*!40000 ALTER TABLE `data_jadwal` DISABLE KEYS */;
INSERT INTO `data_jadwal` (`id_jadwal`, `hari`, `jam_masuk`, `jam_keluar`) VALUES
	('JAD1904001', 'senin', '7:30:00', '15:30:00'),
	('JAD1905002', 'selasa', '7:30:00', '15:30:00'),
	('JAD1905003', 'rabu', '7:30:00', '15:30:00'),
	('JAD1905004', 'kamis', '7:30:00', '15:30:00'),
	('JAD1905005', 'jumat', '7:30:00', '15:30:00'),
	('JAD1905006', 'sabtu', '7:30:00', '15:30:00');
/*!40000 ALTER TABLE `data_jadwal` ENABLE KEYS */;

-- Dumping structure for table databases_2019_absensi_wajah_mahasiswa.data_mahasiswa
CREATE TABLE IF NOT EXISTS `data_mahasiswa` (
  `id_mahasiswa` varchar(12) NOT NULL,
  `nim` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `agama` varchar(50) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `kode_face_recognition` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table databases_2019_absensi_wajah_mahasiswa.data_mahasiswa: ~0 rows (approximately)
/*!40000 ALTER TABLE `data_mahasiswa` DISABLE KEYS */;
INSERT INTO `data_mahasiswa` (`id_mahasiswa`, `nim`, `nama`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `no_telepon`, `kode_face_recognition`) VALUES
	('GUR1906001', '4556465', 'ali', 'jambi\r\n', 'jambi\r\n', '2019-06-26', 'laki-laki', 'islam', '0853698458455', '4556465-ali');
/*!40000 ALTER TABLE `data_mahasiswa` ENABLE KEYS */;

-- Dumping structure for table databases_2019_absensi_wajah_mahasiswa.data_profil
CREATE TABLE IF NOT EXISTS `data_profil` (
  `id_profil` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `no_telepon` int(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table databases_2019_absensi_wajah_mahasiswa.data_profil: ~0 rows (approximately)
/*!40000 ALTER TABLE `data_profil` DISABLE KEYS */;
/*!40000 ALTER TABLE `data_profil` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
