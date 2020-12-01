--
-- Database: `equipmentLogDB`
--
CREATE DATABASE IF NOT EXISTS `equipmentLogDB` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `equipmentLogDB`;

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

DROP TABLE IF EXISTS `equipment`;
CREATE TABLE IF NOT EXISTS `equipment` (
   `equipmentId` int(10) NOT NULL,
  `equipmentName` varchar(20) NOT NULL,
  `equipmentPrice` double NOT NULL,
  `equipmentQuantity` int(10) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------







