-- MySQL dump 10.13  Distrib 5.6.23, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: gunprodeal
-- ------------------------------------------------------
-- Server version	5.6.16

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `category_code` varchar(7) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `updated_by` varchar(45) DEFAULT NULL,
  `updated_date` date DEFAULT NULL,
  `status` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`category_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES ('ACSRIES','Accessories','1','2018-07-24',NULL,NULL,'A'),('ARCHERY','Archery','1','2018-07-24',NULL,NULL,'A'),('FIREARM','Firearms','1','2018-07-24',NULL,NULL,'A'),('FISHING','Fishing','1','2018-07-24',NULL,NULL,'A'),('GUNPRTS','Gun Parts','1','2018-07-24',NULL,NULL,'A'),('HUNTGER','Hunting Gear','1','2018-07-24',NULL,NULL,'A'),('KNIVESS','Knives','1','2018-07-24',NULL,NULL,'A'),('NFAITEM','NFA Items','1','2018-07-24',NULL,NULL,'A'),('NFAMGUN','NFA Machine Guns','1','2018-07-24',NULL,NULL,'A'),('NFASRIF','NFA Short Barreled Rifles','1','2018-07-24',NULL,NULL,'A'),('NFASUPP','NFA Suppressors','1','2018-07-24',NULL,NULL,'A'),('OPTICSS','Optics','1','2018-07-24',NULL,NULL,'A'),('RELOADS','Reloading','1','2018-07-24',NULL,NULL,'A');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `subject` varchar(150) DEFAULT NULL,
  `messages` text,
  `date_sent` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_image`
--

DROP TABLE IF EXISTS `product_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(45) DEFAULT NULL,
  `target` varchar(45) DEFAULT NULL,
  `image_url` varchar(100) DEFAULT NULL,
  `status` varchar(2) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_image`
--

LOCK TABLES `product_image` WRITE;
/*!40000 ALTER TABLE `product_image` DISABLE KEYS */;
INSERT INTO `product_image` VALUES (1,'1',NULL,'assets/product-image/1_gun.jpg','A',NULL,NULL),(2,'1',NULL,'assets/product-image/1_gun.jpg','A',NULL,NULL),(3,'1',NULL,'assets/product-image/1_gun2.jpg','A',NULL,NULL);
/*!40000 ALTER TABLE `product_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) DEFAULT NULL,
  `sku` varchar(100) DEFAULT NULL,
  `description` text,
  `price` decimal(10,2) DEFAULT NULL,
  `category_code` varchar(7) DEFAULT NULL,
  `sub_category_code` varchar(7) DEFAULT NULL,
  `image_url` varchar(300) DEFAULT NULL,
  `status` varchar(2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'.45 ACP','Calibre','{\"1\":\"ONE\",\"4\":\"FOUR\",\"2\":\"TWO\",\"3\":\"THREE\"}',1000.00,'ACSRIES',NULL,'IMAGE.JPG','A','2018-07-25 08:44:52','0000-00-00 00:00:00'),(2,'2title','2SKU',NULL,500.00,'FIREARM','HANDGUN','IMAGE.JPG','A','2018-07-25 08:41:32','0000-00-00 00:00:00'),(3,'1','1','{\"1\":\"S.A., Pistol, .45-inch Colt Automatic, Ball (1917) was the British designation used for American-manufactured ammunition. The Royal Navy had purchased a shipment of M1911 pistols in 1917 along with enough ammunition for evaluation, training and service purposes. It was never standardized by the Lists of Changes, but was mentioned in the Vocabulary of Priced Stores. It came in 7-round packets and was manufactured by Winchester.\",\"4\":\"S.A., .450-inch, Ball Mk IIz (1943-1956) was used for Australian-manufactured ammunition for use in the Pacific theater. It came in 24-round cartons.\",\"2\":\"S.A., .45-inch, Ball Mk Iz (1940-1945) was the designation used for American-manufactured ammunition and proposed British manufacture of .45 M1911 Ball. Lend-Lease ammunition came in commercial 42-round Winchester or 50-round Western Cartridge Company cartons. US military-issue ammunition came in 20-round cartons, shifting to larger 50-round cartons in early 1942. It was never manufactured in Britain because it was readily available from American forces.\",\"3\":\"S.A., .45-inch, Ball Mk IIz (1943) was a variant proposed for the Royal Navy, but never put into production.\"}',50.00,'ACSRIES',NULL,NULL,'A','2018-07-25 08:44:11','0000-00-00 00:00:00'),(4,'2','1','{\"1\":\"S.A., Pistol, .45-inch Colt Automatic, Ball (1917) was the British designation used for American-manufactured ammunition. The Royal Navy had purchased a shipment of M1911 pistols in 1917 along with enough ammunition for evaluation, training and service purposes. It was never standardized by the Lists of Changes, but was mentioned in the Vocabulary of Priced Stores. It came in 7-round packets and was manufactured by Winchester.\",\"4\":\"S.A., .450-inch, Ball Mk IIz (1943-1956) was used for Australian-manufactured ammunition for use in the Pacific theater. It came in 24-round cartons.\",\"2\":\"S.A., .45-inch, Ball Mk Iz (1940-1945) was the designation used for American-manufactured ammunition and proposed British manufacture of .45 M1911 Ball. Lend-Lease ammunition came in commercial 42-round Winchester or 50-round Western Cartridge Company cartons. US military-issue ammunition came in 20-round cartons, shifting to larger 50-round cartons in early 1942. It was never manufactured in Britain because it was readily available from American forces.\",\"3\":\"S.A., .45-inch, Ball Mk IIz (1943) was a variant proposed for the Royal Navy, but never put into production.\"}',50.00,'FIREARM','HANDGUN',NULL,'A','2018-07-27 03:02:45','0000-00-00 00:00:00'),(5,'3','1','{\"1\":\"S.A., Pistol, .45-inch Colt Automatic, Ball (1917) was the British designation used for American-manufactured ammunition. The Royal Navy had purchased a shipment of M1911 pistols in 1917 along with enough ammunition for evaluation, training and service purposes. It was never standardized by the Lists of Changes, but was mentioned in the Vocabulary of Priced Stores. It came in 7-round packets and was manufactured by Winchester.\",\"4\":\"S.A., .450-inch, Ball Mk IIz (1943-1956) was used for Australian-manufactured ammunition for use in the Pacific theater. It came in 24-round cartons.\",\"2\":\"S.A., .45-inch, Ball Mk Iz (1940-1945) was the designation used for American-manufactured ammunition and proposed British manufacture of .45 M1911 Ball. Lend-Lease ammunition came in commercial 42-round Winchester or 50-round Western Cartridge Company cartons. US military-issue ammunition came in 20-round cartons, shifting to larger 50-round cartons in early 1942. It was never manufactured in Britain because it was readily available from American forces.\",\"3\":\"S.A., .45-inch, Ball Mk IIz (1943) was a variant proposed for the Royal Navy, but never put into production.\"}',50.00,'FIREARM','HANDGUN',NULL,'A','2018-07-27 03:02:45','0000-00-00 00:00:00'),(6,'4','1','{\"1\":\"S.A., Pistol, .45-inch Colt Automatic, Ball (1917) was the British designation used for American-manufactured ammunition. The Royal Navy had purchased a shipment of M1911 pistols in 1917 along with enough ammunition for evaluation, training and service purposes. It was never standardized by the Lists of Changes, but was mentioned in the Vocabulary of Priced Stores. It came in 7-round packets and was manufactured by Winchester.\",\"4\":\"S.A., .450-inch, Ball Mk IIz (1943-1956) was used for Australian-manufactured ammunition for use in the Pacific theater. It came in 24-round cartons.\",\"2\":\"S.A., .45-inch, Ball Mk Iz (1940-1945) was the designation used for American-manufactured ammunition and proposed British manufacture of .45 M1911 Ball. Lend-Lease ammunition came in commercial 42-round Winchester or 50-round Western Cartridge Company cartons. US military-issue ammunition came in 20-round cartons, shifting to larger 50-round cartons in early 1942. It was never manufactured in Britain because it was readily available from American forces.\",\"3\":\"S.A., .45-inch, Ball Mk IIz (1943) was a variant proposed for the Royal Navy, but never put into production.\"}',50.00,'FIREARM','HANDGUN',NULL,'A','2018-07-27 03:02:45','0000-00-00 00:00:00'),(7,'5','1','{\"1\":\"S.A., Pistol, .45-inch Colt Automatic, Ball (1917) was the British designation used for American-manufactured ammunition. The Royal Navy had purchased a shipment of M1911 pistols in 1917 along with enough ammunition for evaluation, training and service purposes. It was never standardized by the Lists of Changes, but was mentioned in the Vocabulary of Priced Stores. It came in 7-round packets and was manufactured by Winchester.\",\"4\":\"S.A., .450-inch, Ball Mk IIz (1943-1956) was used for Australian-manufactured ammunition for use in the Pacific theater. It came in 24-round cartons.\",\"2\":\"S.A., .45-inch, Ball Mk Iz (1940-1945) was the designation used for American-manufactured ammunition and proposed British manufacture of .45 M1911 Ball. Lend-Lease ammunition came in commercial 42-round Winchester or 50-round Western Cartridge Company cartons. US military-issue ammunition came in 20-round cartons, shifting to larger 50-round cartons in early 1942. It was never manufactured in Britain because it was readily available from American forces.\",\"3\":\"S.A., .45-inch, Ball Mk IIz (1943) was a variant proposed for the Royal Navy, but never put into production.\"}',50.00,'FIREARM','HANDGUN',NULL,'A','2018-07-27 03:02:45','0000-00-00 00:00:00'),(8,'6','1','{\"1\":\"S.A., Pistol, .45-inch Colt Automatic, Ball (1917) was the British designation used for American-manufactured ammunition. The Royal Navy had purchased a shipment of M1911 pistols in 1917 along with enough ammunition for evaluation, training and service purposes. It was never standardized by the Lists of Changes, but was mentioned in the Vocabulary of Priced Stores. It came in 7-round packets and was manufactured by Winchester.\",\"4\":\"S.A., .450-inch, Ball Mk IIz (1943-1956) was used for Australian-manufactured ammunition for use in the Pacific theater. It came in 24-round cartons.\",\"2\":\"S.A., .45-inch, Ball Mk Iz (1940-1945) was the designation used for American-manufactured ammunition and proposed British manufacture of .45 M1911 Ball. Lend-Lease ammunition came in commercial 42-round Winchester or 50-round Western Cartridge Company cartons. US military-issue ammunition came in 20-round cartons, shifting to larger 50-round cartons in early 1942. It was never manufactured in Britain because it was readily available from American forces.\",\"3\":\"S.A., .45-inch, Ball Mk IIz (1943) was a variant proposed for the Royal Navy, but never put into production.\"}',50.00,'FIREARM','HANDGUN',NULL,'A','2018-07-27 03:02:45','0000-00-00 00:00:00'),(9,'6','1','{\"1\":\"S.A., Pistol, .45-inch Colt Automatic, Ball (1917) was the British designation used for American-manufactured ammunition. The Royal Navy had purchased a shipment of M1911 pistols in 1917 along with enough ammunition for evaluation, training and service purposes. It was never standardized by the Lists of Changes, but was mentioned in the Vocabulary of Priced Stores. It came in 7-round packets and was manufactured by Winchester.\",\"4\":\"S.A., .450-inch, Ball Mk IIz (1943-1956) was used for Australian-manufactured ammunition for use in the Pacific theater. It came in 24-round cartons.\",\"2\":\"S.A., .45-inch, Ball Mk Iz (1940-1945) was the designation used for American-manufactured ammunition and proposed British manufacture of .45 M1911 Ball. Lend-Lease ammunition came in commercial 42-round Winchester or 50-round Western Cartridge Company cartons. US military-issue ammunition came in 20-round cartons, shifting to larger 50-round cartons in early 1942. It was never manufactured in Britain because it was readily available from American forces.\",\"3\":\"S.A., .45-inch, Ball Mk IIz (1943) was a variant proposed for the Royal Navy, but never put into production.\"}',50.00,'FIREARM','HANDGUN',NULL,'A','2018-07-27 03:02:45','0000-00-00 00:00:00'),(10,'7','1','{\"1\":\"S.A., Pistol, .45-inch Colt Automatic, Ball (1917) was the British designation used for American-manufactured ammunition. The Royal Navy had purchased a shipment of M1911 pistols in 1917 along with enough ammunition for evaluation, training and service purposes. It was never standardized by the Lists of Changes, but was mentioned in the Vocabulary of Priced Stores. It came in 7-round packets and was manufactured by Winchester.\",\"4\":\"S.A., .450-inch, Ball Mk IIz (1943-1956) was used for Australian-manufactured ammunition for use in the Pacific theater. It came in 24-round cartons.\",\"2\":\"S.A., .45-inch, Ball Mk Iz (1940-1945) was the designation used for American-manufactured ammunition and proposed British manufacture of .45 M1911 Ball. Lend-Lease ammunition came in commercial 42-round Winchester or 50-round Western Cartridge Company cartons. US military-issue ammunition came in 20-round cartons, shifting to larger 50-round cartons in early 1942. It was never manufactured in Britain because it was readily available from American forces.\",\"3\":\"S.A., .45-inch, Ball Mk IIz (1943) was a variant proposed for the Royal Navy, but never put into production.\"}',50.00,'FIREARM','HANDGUN',NULL,'A','2018-07-27 03:02:45','0000-00-00 00:00:00'),(11,'8','1','{\"1\":\"S.A., Pistol, .45-inch Colt Automatic, Ball (1917) was the British designation used for American-manufactured ammunition. The Royal Navy had purchased a shipment of M1911 pistols in 1917 along with enough ammunition for evaluation, training and service purposes. It was never standardized by the Lists of Changes, but was mentioned in the Vocabulary of Priced Stores. It came in 7-round packets and was manufactured by Winchester.\",\"4\":\"S.A., .450-inch, Ball Mk IIz (1943-1956) was used for Australian-manufactured ammunition for use in the Pacific theater. It came in 24-round cartons.\",\"2\":\"S.A., .45-inch, Ball Mk Iz (1940-1945) was the designation used for American-manufactured ammunition and proposed British manufacture of .45 M1911 Ball. Lend-Lease ammunition came in commercial 42-round Winchester or 50-round Western Cartridge Company cartons. US military-issue ammunition came in 20-round cartons, shifting to larger 50-round cartons in early 1942. It was never manufactured in Britain because it was readily available from American forces.\",\"3\":\"S.A., .45-inch, Ball Mk IIz (1943) was a variant proposed for the Royal Navy, but never put into production.\"}',50.00,'FIREARM','HANDGUN',NULL,'A','2018-07-27 03:02:45','0000-00-00 00:00:00'),(12,'9','1','{\"1\":\"S.A., Pistol, .45-inch Colt Automatic, Ball (1917) was the British designation used for American-manufactured ammunition. The Royal Navy had purchased a shipment of M1911 pistols in 1917 along with enough ammunition for evaluation, training and service purposes. It was never standardized by the Lists of Changes, but was mentioned in the Vocabulary of Priced Stores. It came in 7-round packets and was manufactured by Winchester.\",\"4\":\"S.A., .450-inch, Ball Mk IIz (1943-1956) was used for Australian-manufactured ammunition for use in the Pacific theater. It came in 24-round cartons.\",\"2\":\"S.A., .45-inch, Ball Mk Iz (1940-1945) was the designation used for American-manufactured ammunition and proposed British manufacture of .45 M1911 Ball. Lend-Lease ammunition came in commercial 42-round Winchester or 50-round Western Cartridge Company cartons. US military-issue ammunition came in 20-round cartons, shifting to larger 50-round cartons in early 1942. It was never manufactured in Britain because it was readily available from American forces.\",\"3\":\"S.A., .45-inch, Ball Mk IIz (1943) was a variant proposed for the Royal Navy, but never put into production.\"}',50.00,'FIREARM','HANDGUN',NULL,'A','2018-07-27 03:02:45','0000-00-00 00:00:00'),(13,'10','1','{\"1\":\"S.A., Pistol, .45-inch Colt Automatic, Ball (1917) was the British designation used for American-manufactured ammunition. The Royal Navy had purchased a shipment of M1911 pistols in 1917 along with enough ammunition for evaluation, training and service purposes. It was never standardized by the Lists of Changes, but was mentioned in the Vocabulary of Priced Stores. It came in 7-round packets and was manufactured by Winchester.\",\"4\":\"S.A., .450-inch, Ball Mk IIz (1943-1956) was used for Australian-manufactured ammunition for use in the Pacific theater. It came in 24-round cartons.\",\"2\":\"S.A., .45-inch, Ball Mk Iz (1940-1945) was the designation used for American-manufactured ammunition and proposed British manufacture of .45 M1911 Ball. Lend-Lease ammunition came in commercial 42-round Winchester or 50-round Western Cartridge Company cartons. US military-issue ammunition came in 20-round cartons, shifting to larger 50-round cartons in early 1942. It was never manufactured in Britain because it was readily available from American forces.\",\"3\":\"S.A., .45-inch, Ball Mk IIz (1943) was a variant proposed for the Royal Navy, but never put into production.\"}',50.00,'FIREARM','HANDGUN',NULL,'A','2018-07-27 03:02:45','0000-00-00 00:00:00'),(14,'12','1','{\"1\":\"S.A., Pistol, .45-inch Colt Automatic, Ball (1917) was the British designation used for American-manufactured ammunition. The Royal Navy had purchased a shipment of M1911 pistols in 1917 along with enough ammunition for evaluation, training and service purposes. It was never standardized by the Lists of Changes, but was mentioned in the Vocabulary of Priced Stores. It came in 7-round packets and was manufactured by Winchester.\",\"4\":\"S.A., .450-inch, Ball Mk IIz (1943-1956) was used for Australian-manufactured ammunition for use in the Pacific theater. It came in 24-round cartons.\",\"2\":\"S.A., .45-inch, Ball Mk Iz (1940-1945) was the designation used for American-manufactured ammunition and proposed British manufacture of .45 M1911 Ball. Lend-Lease ammunition came in commercial 42-round Winchester or 50-round Western Cartridge Company cartons. US military-issue ammunition came in 20-round cartons, shifting to larger 50-round cartons in early 1942. It was never manufactured in Britain because it was readily available from American forces.\",\"3\":\"S.A., .45-inch, Ball Mk IIz (1943) was a variant proposed for the Royal Navy, but never put into production.\"}',50.00,'FIREARM','HANDGUN',NULL,'A','2018-07-27 03:02:45','0000-00-00 00:00:00'),(15,'13','1','{\"1\":\"S.A., Pistol, .45-inch Colt Automatic, Ball (1917) was the British designation used for American-manufactured ammunition. The Royal Navy had purchased a shipment of M1911 pistols in 1917 along with enough ammunition for evaluation, training and service purposes. It was never standardized by the Lists of Changes, but was mentioned in the Vocabulary of Priced Stores. It came in 7-round packets and was manufactured by Winchester.\",\"4\":\"S.A., .450-inch, Ball Mk IIz (1943-1956) was used for Australian-manufactured ammunition for use in the Pacific theater. It came in 24-round cartons.\",\"2\":\"S.A., .45-inch, Ball Mk Iz (1940-1945) was the designation used for American-manufactured ammunition and proposed British manufacture of .45 M1911 Ball. Lend-Lease ammunition came in commercial 42-round Winchester or 50-round Western Cartridge Company cartons. US military-issue ammunition came in 20-round cartons, shifting to larger 50-round cartons in early 1942. It was never manufactured in Britain because it was readily available from American forces.\",\"3\":\"S.A., .45-inch, Ball Mk IIz (1943) was a variant proposed for the Royal Navy, but never put into production.\"}',50.00,'FIREARM','HANDGUN',NULL,'A','2018-07-27 03:02:45','0000-00-00 00:00:00'),(16,'14','1','{\"1\":\"S.A., Pistol, .45-inch Colt Automatic, Ball (1917) was the British designation used for American-manufactured ammunition. The Royal Navy had purchased a shipment of M1911 pistols in 1917 along with enough ammunition for evaluation, training and service purposes. It was never standardized by the Lists of Changes, but was mentioned in the Vocabulary of Priced Stores. It came in 7-round packets and was manufactured by Winchester.\",\"4\":\"S.A., .450-inch, Ball Mk IIz (1943-1956) was used for Australian-manufactured ammunition for use in the Pacific theater. It came in 24-round cartons.\",\"2\":\"S.A., .45-inch, Ball Mk Iz (1940-1945) was the designation used for American-manufactured ammunition and proposed British manufacture of .45 M1911 Ball. Lend-Lease ammunition came in commercial 42-round Winchester or 50-round Western Cartridge Company cartons. US military-issue ammunition came in 20-round cartons, shifting to larger 50-round cartons in early 1942. It was never manufactured in Britain because it was readily available from American forces.\",\"3\":\"S.A., .45-inch, Ball Mk IIz (1943) was a variant proposed for the Royal Navy, but never put into production.\"}',50.00,'FIREARM','HANDGUN',NULL,'A','2018-07-27 03:02:45','0000-00-00 00:00:00'),(17,'15','1','{\"1\":\"S.A., Pistol, .45-inch Colt Automatic, Ball (1917) was the British designation used for American-manufactured ammunition. The Royal Navy had purchased a shipment of M1911 pistols in 1917 along with enough ammunition for evaluation, training and service purposes. It was never standardized by the Lists of Changes, but was mentioned in the Vocabulary of Priced Stores. It came in 7-round packets and was manufactured by Winchester.\",\"4\":\"S.A., .450-inch, Ball Mk IIz (1943-1956) was used for Australian-manufactured ammunition for use in the Pacific theater. It came in 24-round cartons.\",\"2\":\"S.A., .45-inch, Ball Mk Iz (1940-1945) was the designation used for American-manufactured ammunition and proposed British manufacture of .45 M1911 Ball. Lend-Lease ammunition came in commercial 42-round Winchester or 50-round Western Cartridge Company cartons. US military-issue ammunition came in 20-round cartons, shifting to larger 50-round cartons in early 1942. It was never manufactured in Britain because it was readily available from American forces.\",\"3\":\"S.A., .45-inch, Ball Mk IIz (1943) was a variant proposed for the Royal Navy, but never put into production.\"}',50.00,'FIREARM','HANDGUN',NULL,'A','2018-07-27 03:02:45','0000-00-00 00:00:00'),(18,'16','1','{\"1\":\"S.A., Pistol, .45-inch Colt Automatic, Ball (1917) was the British designation used for American-manufactured ammunition. The Royal Navy had purchased a shipment of M1911 pistols in 1917 along with enough ammunition for evaluation, training and service purposes. It was never standardized by the Lists of Changes, but was mentioned in the Vocabulary of Priced Stores. It came in 7-round packets and was manufactured by Winchester.\",\"4\":\"S.A., .450-inch, Ball Mk IIz (1943-1956) was used for Australian-manufactured ammunition for use in the Pacific theater. It came in 24-round cartons.\",\"2\":\"S.A., .45-inch, Ball Mk Iz (1940-1945) was the designation used for American-manufactured ammunition and proposed British manufacture of .45 M1911 Ball. Lend-Lease ammunition came in commercial 42-round Winchester or 50-round Western Cartridge Company cartons. US military-issue ammunition came in 20-round cartons, shifting to larger 50-round cartons in early 1942. It was never manufactured in Britain because it was readily available from American forces.\",\"3\":\"S.A., .45-inch, Ball Mk IIz (1943) was a variant proposed for the Royal Navy, but never put into production.\"}',50.00,'FIREARM','HANDGUN',NULL,'A','2018-07-27 03:02:45','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_category`
--

DROP TABLE IF EXISTS `sub_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sub_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_code` varchar(7) DEFAULT NULL,
  `sub_category_code` varchar(7) DEFAULT NULL,
  `list_name` varchar(45) DEFAULT NULL,
  `list_link` varchar(45) DEFAULT NULL,
  `create_by` varchar(45) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `updated_by` varchar(45) DEFAULT NULL,
  `updated_date` date DEFAULT NULL,
  `status` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_category`
--

LOCK TABLES `sub_category` WRITE;
/*!40000 ALTER TABLE `sub_category` DISABLE KEYS */;
INSERT INTO `sub_category` VALUES (1,'FIREARM','HANDGUN','Handguns',NULL,'1','2018-07-24',NULL,NULL,'A'),(2,'FIREARM','RIFLESS','Rifles',NULL,'1','2018-07-24',NULL,NULL,'A'),(3,'FIREARM','SHOTGUN','Shotguns',NULL,'1','2018-07-24',NULL,NULL,'A'),(4,'FIREARM','COMBOSS','Combos',NULL,'1','2018-07-24',NULL,NULL,'A'),(5,'FIREARM','NFA','NFA',NULL,'1','2018-07-24',NULL,NULL,'A'),(6,'OPTICSS','BINOCUL','Binoculars',NULL,'1','2018-07-24',NULL,NULL,'A'),(7,'OPTICSS','CAMERAS','Cameras',NULL,'1','2018-07-24',NULL,NULL,'A'),(8,'OPTICSS','NVISION','Night Vision',NULL,'1','2018-07-24',NULL,NULL,'A'),(9,'OPTICSS','DOTSRMR','Red Dots / RMR\'s',NULL,'1','2018-07-24',NULL,NULL,'A'),(10,'OPTICSS','SCOPES','Scopes',NULL,'1','2018-07-24',NULL,NULL,'A'),(11,'OPTICSS','SIGHTS','Sights',NULL,'1','2018-07-24',NULL,NULL,'A'),(12,'OPTICSS','THERMAL','Thermal',NULL,'1','2018-07-24',NULL,NULL,'A'),(13,'OPTICSS','1','1',NULL,'1','2018-07-24',NULL,NULL,'A'),(14,'OPTICSS','2','2',NULL,'1','2018-07-24',NULL,NULL,'A'),(15,'OPTICSS','3','3',NULL,'1','2018-07-24',NULL,NULL,'A'),(16,'OPTICSS','4','4',NULL,'1','2018-07-24',NULL,NULL,'A'),(17,'OPTICSS','5','5',NULL,'1','2018-07-24',NULL,NULL,'A'),(18,'OPTICSS','6','6',NULL,'1',NULL,NULL,NULL,'A'),(19,'OPTICSS','7','7',NULL,'1',NULL,NULL,NULL,'A'),(20,'OPTICSS','8','8',NULL,'1',NULL,NULL,NULL,'A'),(21,'OPTICSS','9','9',NULL,'1',NULL,NULL,NULL,'A'),(22,'OPTICSS','10','10',NULL,'1',NULL,NULL,NULL,'A'),(23,'OPTICSS','11','11',NULL,'1',NULL,NULL,NULL,'A'),(24,'OPTICSS','12','12',NULL,'1',NULL,NULL,NULL,'A'),(25,'OPTICSS','13','13',NULL,'1',NULL,NULL,NULL,'A'),(26,'OPTICSS','14','14',NULL,'1',NULL,NULL,NULL,'A'),(27,'OPTICSS','15','15',NULL,'1',NULL,NULL,NULL,'A'),(28,'OPTICSS','16','16',NULL,'1',NULL,NULL,NULL,'A'),(29,'OPTICSS','17','17',NULL,'1',NULL,NULL,NULL,'A'),(30,'OPTICSS','18','18',NULL,'1',NULL,NULL,NULL,'A');
/*!40000 ALTER TABLE `sub_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isconfirm` tinyint(1) DEFAULT NULL,
  `status` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Ronald Duque','23232322323','ronald@gcc.com.sa','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,'2018-07-16 07:17:17',NULL),(2,'JANEDOE','1234567890','NONE@NONE.COM','4297f44b13955235245b2497399d7a93',NULL,NULL,'2018-07-21 21:50:29',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-07-27 13:42:06
