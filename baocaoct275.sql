-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: localhost    Database: baocaoct275
-- ------------------------------------------------------
-- Server version	8.0.31

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `chitiethoadon`
--

DROP TABLE IF EXISTS `chitiethoadon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chitiethoadon` (
  `id` int NOT NULL AUTO_INCREMENT,
  `so_luong` int NOT NULL,
  `sp_id` int NOT NULL,
  `hd_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sp_id` (`sp_id`),
  KEY `hd_id` (`hd_id`),
  CONSTRAINT `FK_chitiethoadon_hoadon` FOREIGN KEY (`hd_id`) REFERENCES `hoadon` (`id`),
  CONSTRAINT `FK_chitiethoadon_sanpham` FOREIGN KEY (`sp_id`) REFERENCES `sanpham` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chitiethoadon`
--

LOCK TABLES `chitiethoadon` WRITE;
/*!40000 ALTER TABLE `chitiethoadon` DISABLE KEYS */;
INSERT INTO `chitiethoadon` VALUES (59,1,2,54),(60,1,2,55),(61,1,10,56),(62,1,24,57),(63,1,15,58),(64,1,15,59),(65,1,20,60);
/*!40000 ALTER TABLE `chitiethoadon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `giohang`
--

DROP TABLE IF EXISTS `giohang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `giohang` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sp_id` int NOT NULL,
  `kh_id` int NOT NULL,
  `so_luong` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sp_id` (`sp_id`),
  KEY `kh_id` (`kh_id`),
  CONSTRAINT `FK__khachhang` FOREIGN KEY (`kh_id`) REFERENCES `khachhang` (`id`),
  CONSTRAINT `FK__sanpham` FOREIGN KEY (`sp_id`) REFERENCES `sanpham` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `giohang`
--

LOCK TABLES `giohang` WRITE;
/*!40000 ALTER TABLE `giohang` DISABLE KEYS */;
INSERT INTO `giohang` VALUES (50,2,3,1),(51,6,3,1),(52,18,3,1),(53,10,1,1),(54,15,3,1);
/*!40000 ALTER TABLE `giohang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hoadon`
--

DROP TABLE IF EXISTS `hoadon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hoadon` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ngaylap` date NOT NULL,
  `trangthai` char(1) DEFAULT '0',
  `kh_id` int NOT NULL,
  `thanhtien` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kh_id` (`kh_id`),
  CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`kh_id`) REFERENCES `khachhang` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hoadon`
--

LOCK TABLES `hoadon` WRITE;
/*!40000 ALTER TABLE `hoadon` DISABLE KEYS */;
INSERT INTO `hoadon` VALUES (54,'2023-04-15','0',3,180000),(55,'2023-04-15','0',1,180000),(56,'2023-04-15','0',1,140000),(57,'2023-04-15','0',1,70000),(58,'2023-04-15','0',3,150000),(59,'2023-04-15','0',3,150000),(60,'2023-04-15','0',3,350000);
/*!40000 ALTER TABLE `hoadon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `info_giohang`
--

DROP TABLE IF EXISTS `info_giohang`;
/*!50001 DROP VIEW IF EXISTS `info_giohang`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `info_giohang` AS SELECT 
 1 AS `id`,
 1 AS `tensanpham`,
 1 AS `so_luong`,
 1 AS `gia`,
 1 AS `hinh_anh`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `khachhang`
--

DROP TABLE IF EXISTS `khachhang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `khachhang` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `hoten` varchar(40) NOT NULL,
  `ngaysinh` date NOT NULL,
  `gioitinh` char(10) NOT NULL,
  `sdt` char(10) NOT NULL,
  `diachi` varchar(100) NOT NULL,
  `vai_tro` int DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `sdt` (`sdt`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `khachhang`
--

LOCK TABLES `khachhang` WRITE;
/*!40000 ALTER TABLE `khachhang` DISABLE KEYS */;
INSERT INTO `khachhang` VALUES (1,'lesac002@gmail.com','25d55ad283aa400af464c76d713c07ad','nguyễn lê sắc','2002-01-01','Nam','0707971402','hau giang',0),(2,'nguyenlesachgi@gmail.com','bbb8aae57c104cda40c93843ad5e6db8','Nguyễn Lê Sắc','2002-02-17','Nam','0707971403','Tân Long',1),(3,'nguyenthuthao.010102@gmail.com','25f9e794323b453885f5181f1b624d0b','Thu Thảo','2002-05-11','Nữ','0946053795','Cà Mau',0),(4,'me@example.com','25f9e794323b453885f5181f1b624d0b','nguyễn văn a','2002-01-09','Nam','0946053745','Cà Mau',0);
/*!40000 ALTER TABLE `khachhang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `loaisanpham`
--

DROP TABLE IF EXISTS `loaisanpham`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `loaisanpham` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tenloai` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loaisanpham`
--

LOCK TABLES `loaisanpham` WRITE;
/*!40000 ALTER TABLE `loaisanpham` DISABLE KEYS */;
INSERT INTO `loaisanpham` VALUES (1,'Đồ trang điểm'),(2,'Đồ chăm sóc da'),(3,'Đồ chăm sóc tóc'),(4,'Đồ chăm sóc cơ thể'),(5,'Đồ chăm sóc cá nhân');
/*!40000 ALTER TABLE `loaisanpham` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sanpham`
--

DROP TABLE IF EXISTS `sanpham`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sanpham` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tensanpham` varchar(100) NOT NULL,
  `gia` int unsigned NOT NULL,
  `kich_thuoc` varchar(50) NOT NULL,
  `mo_ta` text NOT NULL,
  `nhan_hieu` varchar(50) NOT NULL,
  `hinh_anh` varchar(100) DEFAULT 'no-image-available.png',
  `gioi_tinh` varchar(100) NOT NULL,
  `loai_id` int NOT NULL,
  `giam_gia` int DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `loai_id` (`loai_id`),
  CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`loai_id`) REFERENCES `loaisanpham` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sanpham`
--

LOCK TABLES `sanpham` WRITE;
/*!40000 ALTER TABLE `sanpham` DISABLE KEYS */;
INSERT INTO `sanpham` VALUES (1,'Nước rửa tay dưỡng ẩm',120000,'150ml','Nước rửa tay dưỡng ẩm cho da tay mềm mịn, rửa sạch bụi bẩn','Hazeline','20230408100254_San pham 5.png','Unisex',5,2),(2,'Toner',180000,'180ml','Toner dưỡng ẩm cho da','Klairs','20230408100424_San pham 6.jpg','Unisex',2,0),(3,'Son',300000,'3g','Dòng son cao cấp đến từ thương hiệu MAC nổi tiếng','MAC','20230408100911_San pham 7.png','Nữ',1,0),(4,'Sữa rửa mặt',250000,'400ml','Sữa rửa mặt giúp rửa sạch bụi bẩn bám trên da','La Roche-Posay','20230408101307_San pham 8.jpg','Unisex',2,2),(5,'Tẩy tế bào chết',350000,'30ml','Giúp tẩy đi lớp da chết','Paula\'s Choice','20230408101511_San pham 9.jpg','Unisex',2,0),(6,'Xịt chống muỗi',120000,'50ml','Giúp tránh muỗi','Remos','20230408101914_San pham 11.jpg','Unisex',5,0),(7,'Mặt nạ xông hơi mắt',110000,'50g','Giúp mắt được thư giãn','MegRhythm','20230408102432_San pham 12.jpg','Unisex',5,0),(8,'Muối tắm',160000,'60g','Tẩy tế bào chết trên cơ thể','Felina','San pham 1.jpg','Unisex',4,0),(9,'Sáp khử mùi',150000,'73g','Khử mùi cơ thể','Wolfthorn','San pham 2.jpg','Unisex',4,0),(10,'Phấn má hồng',140000,'20g','Giúp gương mặt trở nên tươi tắn','MAC','San pham 3.jpg','Nữ',1,0),(11,'Nước tẩy trang',155000,'400ml','Loại bỏ bụi bẩn, làm sạch da','LOreal','San pham 4.jpg','Unisex',2,0),(12,'Mặt nạ ủ tóc',120000,'50g','Giúp tóc trở nên mềm mượt','Tsubaki','20230408102607_San pham 13.jpg','Unisex',3,0),(14,'Băng cá nhân',80000,'50g','Dùng khi có vết thương, giúp bảo vệ vết thương khỏi  các tác động xấu','Nexcare','20230408102941_San pham 14.jpg','Unisex',5,0),(15,'Sữa tắm',150000,'400ml','Làm sạch cơ thể','Love Beauty & Planet','20230408103123_San pham 15.jpg','Unisex',4,0),(16,'Dầu gội',200000,'300ml','Làm sạch da đầu, giúp tóc mọc nhanh và dài','The Cocoon','20230418162601_sp22.jpg','Unisex',3,0),(17,'Dầu xả',180000,'350ml','Làm sạch tóc sau khi dùng dầu gội, đồng thời cấp ẩm giúp tóc trở nên mềm mại hơn','Tsubaki','20230408103507_San pham 17.jpg','Unisex',3,0),(18,'Dưỡng thể',170000,'350ml','Giúp da trắng sáng mịn màng','Vaseline','20230408103747_San pham 18.png','Unisex',4,0),(19,'Gel tạo kiểu tóc',120000,'120ml','Cố định kiểu tóc','Double Rich','20230408103915_San pham 19.jpg','Unisex',5,0),(20,'Kem chống nắng',350000,'50ml','Bảo vệ làn da khỏi tia UV','La Roche-Posay','20230408104123_San pham 20.jpg','Unisex',2,0),(21,'Bút kẻ mắt',120000,'2g','Giúp trang điểm cho đôi mắt','Shiseido','20230408104302_San pham 21.jpg','Unisex',1,0),(22,'Kem nền',200000,'30ml','Nâng tone da','Maybelline','20230408104424_San pham 22.jpg','Unisex',1,0),(23,'Kem dưỡng da tay',150000,'30ml','Dưỡng ẩm cho da tay','Frudia','20230408104540_San pham 23.jpg','Unisex',4,0),(24,'Khẩu trang',70000,'80g','Tránh bụi','Unicharm','20230408104716_San pham 24.jpg','Unisex',5,0),(25,'Mascara',170000,'10g','Giúp cho mi cong','Maybelline','20230408104842_San pham 25.jpg','Unisex',1,0);
/*!40000 ALTER TABLE `sanpham` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `info_giohang`
--

/*!50001 DROP VIEW IF EXISTS `info_giohang`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `info_giohang` AS select `g`.`id` AS `id`,`s`.`tensanpham` AS `tensanpham`,`g`.`so_luong` AS `so_luong`,`s`.`gia` AS `gia`,`s`.`hinh_anh` AS `hinh_anh` from ((`giohang` `g` join `khachhang` `k` on((`g`.`kh_id` = `k`.`id`))) join `sanpham` `s` on((`g`.`sp_id` = `s`.`id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-04-19 19:48:44
